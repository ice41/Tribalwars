<?php
/*****************************************/
/*=======================================*/
/*     PLIK: events.php   		 		 */
/*     DATA: 18.01.2012r        		 */
/*     ROLA: System ewent�w              */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

function kalkuluj_morale($punkty_obroncy,$punkty_napastnika) {
    global $config;
    $morale = floor((($punkty_obroncy / $punkty_napastnika) * 3 + 0.25) * 100);
	if ($morale > 100) {
	    $morale = 100;
	    }
	if ($morale < $config['min_moral']) {
	    $morale = $config['min_moral'];
	    }
	return $morale;
    }
	
function pora_dnia($czas) {
	$sek_d = $czas % 86400;
	
	if ($sek_d < 25200) {
	    $noc = true;
	    } else {
		$noc = false;
		}
	return $noc;
	}
	
function max_lup($d,$k,$r,$max) {
	$stosunek = $max /($d+$k+$r);
	
	$lup_d = round($d * $stosunek);
	$lup_k = round($k * $stosunek);
	$lup_r = round($r * $stosunek);
	
	$suma = $lup_d + $lup_k + $lup_r;
	if ($max > $suma) {
		$reszta = $max - $suma;
		if ($reszta == 1) {
			$lup_d++;
			}
		if ($reszta == 2) {
			$lup_d++;
			$lup_k++;
			}
		}
		
	return array($lup_d,$lup_k,$lup_r);
	}
	
function check_builds($id) {
	global $cl_builds;
	
	$build_arr = sql("SELECT building,villageid FROM `build` WHERE `id` = '$id'","assoc");
	
	$wioska_info = sql("SELECT ".$build_arr['building'].",userid FROM `villages` WHERE `id` = '".$build_arr['villageid']."'",'assoc');
	$wioska_info[$build_arr['building']]++;
	
	if ($cl_builds->get_maxstage($build_arr['building']) >= $wioska_info[$build_arr['building']]) {
		$points = $cl_builds->get_points($build_arr['building'],$wioska_info[$build_arr['building']]) - $cl_builds->get_points($build_arr['building'],$wioska_info[$build_arr['building']] - 1);
		mysql_query("UPDATE `villages` SET `points` = `points` + '$points',`".$build_arr['building']."` = '".$wioska_info[$build_arr['building']]."' WHERE `id` = '".$build_arr['villageid']."'");
		$return = true;
		} else {
		$return = false;
		}
		
	mysql_query("DELETE FROM `build` WHERE `id` = '$id'");
	mysql_query("DELETE FROM `events` WHERE `event_id` = '$id' AND `event_type` = 'build'");
	
	if ($wioska_info['userid'] != '-1' && $return) {
		mysql_query("UPDATE `users` SET `points` = `points` + '$points' WHERE `id` = '".$wioska_info['userid']."'");
		}
		
	return $return;
	}
	
function check_tech($id) {
	$tech_arr = sql("SELECT research,villageid FROM `research` WHERE `id` = '$id'",'assoc');
	mysql_query("DELETE FROM `research` WHERE `id` = '$id'");
	mysql_query("DELETE FROM `events` WHERE `event_id` = '$id' AND `event_type` = 'research'");
	mysql_query("UPDATE `villages` SET `unit_".$tech_arr['research']."_tec_level` = `unit_".$tech_arr['research']."_tec_level` + '1',`smith_tec` = '' WHERE `id` = '".$tech_arr['villageid']."'");
	}
	
function check_mov_attack($id) {
	global $config,$cl_units,$impl_units,$impl_builds,$impl_units_all,$cl_builds,$pala_bonus,$arr_maxhide;
	$attack_arr = sql("SELECT start_time,end_time,building,send_from_village,send_from_user,send_to_user,send_to_village,units FROM `movements` WHERE `id` = '$id'","assoc");
	
	reload_vdata($attack_arr['send_to_village'],$attack_arr['end_time']);
	
	if (!in_array($attack_arr['building'],$cl_builds->get_array("dbname"))) {
		$attack_arr['building'] = 'main';
		}
	
	$cel_wioska_info = sql("SELECT userid,wall,name,".$attack_arr['building'].",points,r_wood,r_stone,r_iron,x,y,continent,hide,agreement FROM `villages` WHERE `id` = '".$attack_arr['send_to_village']."'",'assoc');
	$od_wioska_info = sql("SELECT userid,name,x,y,continent FROM `villages` WHERE `id` = '".$attack_arr['send_from_village']."'",'assoc');
	$attack_arr['send_to_user'] = $cel_wioska_info['userid'];
	$attack_arr['send_from_user'] = $od_wioska_info['userid'];
	
	$cel_gracz_info = sql("SELECT username,points,pala_aktu_item,pala_name,ally FROM `users` WHERE `id` = '".$attack_arr['send_to_user']."'",'assoc');
	$od_gracz_info = sql("SELECT username,points,pala_aktu_item,pala_name,pala_to_next_item,pala_items,ally FROM `users` WHERE `id` = '".$attack_arr['send_from_user']."'",'assoc');
	
	$morale = kalkuluj_morale($cel_gracz_info['points'],$od_gracz_info['points']);

	if ($morale < $config['min_moral']) $morale = $config['min_moral'];
	
	if ($attack_arr['send_to_user'] == '-1') $morale = 100;
	
	$noc = pora_dnia($attack_arr['end_time']);
	
	$szczescie = mt_rand('-25','25');
	
	$jednostki_odwnn = explode(';',$attack_arr['units']);
	$jid = 0;
	
	foreach ($cl_units->get_array("dbname") as $jname) {
		$jednostki_od[$jname] = $jednostki_odwnn[$jid];
		$jid++;
		}
		
	$jednostki_do = $cl_units->read_units('',$attack_arr['send_to_village']);
		
	unset($jid);
	
	if ($jednostki_od['unit_paladin'] < 1) {
		$od_gracz_info['pala_aktu_item'] = 0;
		}

	if ($jednostki_do['unit_paladin'] < 1) {
		$cel_gracz_info['pala_aktu_item'] = 0;
		}
		
	$sim_effect = sim_battle($jednostki_do,$jednostki_od,$cel_wioska_info['wall'],$cel_wioska_info[$attack_arr['building']],$szczescie,$morale,$noc,$attack_arr['building'],$od_gracz_info['pala_aktu_item'],$cel_gracz_info['pala_aktu_item']);
	
	if ($sim_effect['czy_punkty_minus']) {
		mysql_query("UPDATE `villages` SET `points` = `points` - '".$sim_effect['strata_punktow']."' , `r_bh` = `r_bh` - '".$sim_effect['strata_osadnicy']."' , `wall` = '".$sim_effect['mur_nowy_lvl']."' , `".$attack_arr['building']."` = '".$sim_effect['ktpc_nowy_lvl']."' WHERE `id` = '".$attack_arr['send_to_village']."'");
		mysql_query("UPDATE `users` SET `points` = `points` - '".$sim_effect['strata_punktow']."' WHERE `id` = '".$attack_arr['send_to_user']."'");
		}
		
	$zniszczone_poziomy_budynkow_suma = ($sim_effect['mur_stary_lvl'] - $sim_effect['mur_nowy_lvl']) + ($sim_effect['ktpc_stary_lvl'] - $sim_effect['ktpc_nowy_lvl']);
	if ($zniszczone_poziomy_budynkow_suma > 0) {
		mysql_query("UPDATE `users` SET `zniszczone_bud` = `zniszczone_bud` + '".($sim_effect['ktpc_stary_lvl'] - $sim_effect['ktpc_nowy_lvl'])."' , `zniszczone_mury` = `zniszczone_mury` + '".($sim_effect['mur_stary_lvl'] - $sim_effect['mur_nowy_lvl'])."' WHERE `id` = '".$attack_arr['send_from_user']."'");
		}
		
	if ($attack_arr['send_to_user'] != '-1' && $attack_arr['send_to_user'] != $attack_arr['send_from_user']) {
		mysql_query("UPDATE `users` SET `attacked_players` = `attacked_players` + '1' WHERE `id` = '".$attack_arr['send_from_user']."'");
		}
		
	foreach ($cl_units->get_array("dbname") as $jname) {
		if ($sim_effect['jednostki_att_straty'][$jname] > 0) {
			mysql_query("UPDATE `villages` SET `all_$jname` = `all_$jname` - '".$sim_effect['jednostki_att_straty'][$jname]."' WHERE `id` = '".$attack_arr['send_from_village']."'");
			}
		}
		
	if ($sim_effect['att_osadnicy_straty'] > 0) {
		mysql_query("UPDATE `villages` SET `r_bh` = `r_bh` - '".$sim_effect['att_osadnicy_straty']."' WHERE `id` = '".$attack_arr['send_from_village']."'");
		}
	
	if ($sim_effect['stosunek_deff'] > 1) {
		$sim_effect['stosunek_deff'] = 1;
		}
	
	$wynik = mysql_query("SELECT * FROM `unit_place` WHERE `villages_to_id` = '".$attack_arr['send_to_village']."'");
	
	if ($sim_effect['stosunek_deff'] >= 1) $sim_effect['stosunek_deff'] = 1;
	if ($sim_effect['stosunek_deff'] <= 0) $sim_effect['stosunek_deff'] = 0;
	
	if ($sim_effect['wygral'] === 'napastnik') {
		$sim_effect['stosunek_deff'] = 1;
		}
	
	while ($tbl = mysql_fetch_assoc($wynik)) {
		foreach ($cl_units->get_array("dbname") as $jname) {
			$straty[$jname] = round($tbl[$jname] * $sim_effect['stosunek_deff']);
			$cale_wojsko[] = $tbl[$jname];
			$odj_bh += $straty[$jname] * $cl_units->get_bhprice($jname);
			if ($straty[$jname] > 0) {
				mysql_query("UPDATE `villages` SET `all_$jname` = `all_$jname` - '".$straty[$jname]."' WHERE `id` = '".$tbl['villages_from_id']."'");
				mysql_query("UPDATE `unit_place` SET `$jname` = `$jname` - '".$straty[$jname]."' WHERE `villages_from_id` = '".$tbl['villages_from_id']."' AND `villages_to_id` = '".$attack_arr['send_to_village']."'");
				}
			$straty_cnt += $straty[$jname];
			}
			
		if ($odj_bh > 0) {
			mysql_query("UPDATE `villages` SET `r_bh` = `r_bh` - '$odj_bh' WHERE `id` = '".$tbl['villages_from_id']."'");
			}
		$pokonani_przeciwnicy += $odj_bh;
		
		if ($tbl['villages_from_id'] != $tbl['villages_to_id']) {
			$wsp_winfo = sql("SELECT userid,x,y,name,continent FROM `villages` WHERE `id` = '".$tbl['villages_from_id']."'",'assoc');
			mysql_query("UPDATE `users` SET `zab_jed_wwsp` = `zab_jed_wwsp` + '".array_sum($straty)."' , `wspieranie_inngr` = `wspieranie_inngr` + '1' WHERE `id` = '".$wsp_winfo['userid']."'");
			$uname = sql("SELECT `username` FROM `users` WHERE `id` = '".$wsp_winfo['userid']."'",'array');
			$wsp_winfo_fr = sql("SELECT `userid` FROM `villages` WHERE `id` = '".$tbl['villages_from_id']."'",'array');
			if ($sim_effect['stosunek_deff'] >= 1) {
				$title_image = 'graphic/dots/red.png';
				mysql_query("DELETE FROM `unit_place` WHERE `villages_from_id` = '".$tbl['villages_from_id']."' AND `villages_to_id` = '".$attack_arr['send_to_village']."'");
				} else {
				if ($straty_cnt > 0) {
					$title_image = 'graphic/dots/yellow.png';
					} else {
					$title_image = 'graphic/dots/green.png';
					}
				}
				
			$title = 'Twoja pomoc z '.entparse($wsp_winfo['name']).' ('.$wsp_winfo['x'].'|'.$wsp_winfo['y'].') K'.$wsp_winfo['continent'].' do gracza '.entparse($uname).' zosta�a zaatakowana';
			
			$cale_wojsko = implode(';',$cale_wojsko);
			$straty = implode(';',$straty);
			
			if ($wsp_winfo_fr == '') {
				$wsp_winfo_fr = '-1';
				}
				
			if ($wsp_winfo['userid'] == '') {
				$wsp_winfo['userid'] = '-1';
				}
			
			mysql_query("INSERT INTO reports(
				title_image,title,time,type,a_units,
				b_units,to_user,from_user,to_village,from_village,
				receiver_userid,in_group
				) VALUES (
				'$title_image','$title','".$attack_arr['end_time']."','supportAttack','$cale_wojsko',
				'$straty','$wsp_winfo_fr','".$wsp_winfo['userid']."','".$tbl['villages_from_id']."','".$tbl['villages_to_id']."',
				'".$wsp_winfo['userid']."','defense')
				");
				
			mysql_query("UPDATE `users` SET `new_report` = '1' WHERE `id` = '".$wsp_winfo['userid']."'");
			}
			
		unset($cale_wojsko);
		unset($straty);
		$odj_bh = 0;
		$straty_cnt = 0;
		}
	
	if ($pokonani_przeciwnicy > 0) {
		mysql_query("UPDATE `users` SET `killed_units_att` = `killed_units_att` + '$pokonani_przeciwnicy' , `day_pok_att` = `day_pok_att` + '$pokonani_przeciwnicy' , `killed_units_altogether` = `killed_units_altogether` + '$pokonani_przeciwnicy' , `zabite_jednostki` = `zabite_jednostki` + '".array_sum($sim_effect['jednsotki_def_straty'])."' WHERE `id` = '".$attack_arr['send_from_user']."'");
		}
		
	if ($sim_effect['att_osadnicy_straty'] > 0) {
		mysql_query("UPDATE `users` SET `killed_units_def` = `killed_units_def` + '".$sim_effect['att_osadnicy_straty']."' , `killed_units_altogether` = `killed_units_altogether` + '".$sim_effect['att_osadnicy_straty']."' , `day_pok_def` = `day_pok_def` + '".$sim_effect['att_osadnicy_straty']."' , `zabite_jednostki` = `zabite_jednostki` + '".array_sum($sim_effect['jednostki_att_straty'])."' WHERE `id` = '".$attack_arr['send_to_user']."'");
		}
		
	//Przej�cie wioski:
	
	$podbicie = false;
	$grabienie = true;
		
	if ($sim_effect['wygral'] === 'napastnik' && $sim_effect['zbicie_poparcia']) {
	
		//Loswa warto�� zbijanego poparcia:
		$rand_pop_minus = mt_rand(20,35);
		if ($od_gracz_info['pala_aktu_item'] === 'unit_snob') {
			$rand_pop_minus = mt_rand(30,35);
			}
			
		$rand_pop_minus = (int)$rand_pop_minus;
		//$rand_pop_minus = 100;
		
		$cel_wioska_info['agreement'] = round($cel_wioska_info['agreement']);
		$cel_wioska_info['agreement'] = (int)$cel_wioska_info['agreement'];
		
		if (($cel_wioska_info['agreement'] - $rand_pop_minus) == 1) {
			mysql_query("UPDATE `users` SET `pech_szlachta` = '1' WHERE `id` = '".$attack_arr['send_from_user']."'");
			}
		if (($cel_wioska_info['agreement'] - $rand_pop_minus) == 0) {
			mysql_query("UPDATE `users` SET `szcz_szlachta` = '1' WHERE `id` = '".$attack_arr['send_from_user']."'");
			}
		
		if ($rand_pop_minus >= $cel_wioska_info['agreement']) {
			if ($attack_arr['send_from_user'] == $attack_arr['send_to_user']) {
				mysql_query("UPDATE `users` SET `podbicie_siebie` = '1' WHERE `id` = '".$attack_arr['send_from_user']."'");
				}
			$grabienie = false;
			$podbicie = true;
			$zmniejszenie_pop_raport = floor($cel_wioska_info['agreement']).";".floor($cel_wioska_info['agreement'] - $rand_pop_minus);
			
			mysql_query("UPDATE `villages` SET `agreement` = '25' WHERE `id` = '".$attack_arr['send_to_village']."'");
			
			$punkty_przejmowanej_wioski = sql("SELECT `points` FROM `villages` WHERE `id` = '".$attack_arr['send_to_village']."'",'array');
			
			//Zmie� w�a�ciciela wioski:
			mysql_query("UPDATE `villages` SET `userid` = '".$attack_arr['send_from_user']."' WHERE `id` = '".$attack_arr['send_to_village']."'");
			
			if ($attack_arr['send_to_user'] != $attack_arr['send_from_user']) {
				//Dodaj punkty:
				mysql_query("UPDATE `users` SET `points` = `points` + '$punkty_przejmowanej_wioski' , `villages` = `villages` + '1' , `day_podbicia` = `day_podbicia` + '1' WHERE `id` = '".$attack_arr['send_from_user']."'");
				
				if ($attack_arr['send_to_user'] != '-1') {	
					mysql_query("UPDATE `users` SET `points` = `points` - '$punkty_przejmowanej_wioski' , `villages` = `villages` - '1' , `ennobled_by` = '".$od_gracz_info['username']."' WHERE `id` = '".$attack_arr['send_to_user']."'");
					}
				}
				
			//Je�li wioska jest zarezerwowana, to to usu� rezerwacj� i dodaj raport:
			$is_reserved = sql("SELECT COUNT(id) FROM `rezerwacje` WHERE `do_wioski` = '".$attack_arr['send_to_village']."' AND `od_plemienia` = '".$od_gracz_info['ally']."' AND `od_gracza` = '".$attack_arr['send_from_user']."'",'array');
			if ($is_reserved > 0) {
				mysql_query("INSERT INTO reports(title,time,type,receiver_userid,in_group,to_village) VALUES (
				'Rezerwacja wioski zrealizowana','".$attack_arr['end_time']."','rezerwacja','".$attack_arr['send_from_user']."','other','".$attack_arr['send_to_village']."')");
				
				$reservation_id = sql("SELECT `id` FROM `rezerwacje` WHERE `do_wioski` = '".$attack_arr['send_to_village']."' AND `od_plemienia` = '".$od_gracz_info['ally']."' AND `od_gracza` = '".$attack_arr['send_from_user']."' LIMIT 1",'array');
				
				mysql_query("DELETE FROM `rezerwacje` WHERE `id` = '$reservation_id'");
				mysql_query("DELETE FROM `events` WHERE `event_id` = '$reservation_id' AND `event_type` = 'rezerwacja'");
				mysql_query("UPDATE `rezerwacje_log` SET `proces` = '3' , `last_edit` = '".date("U")."' WHERE `id` = '$reservation_id'");
				
				mysql_query("UPDATE `users` SET `udane_rezerwacje` = `udane_rezerwacje` + '1' WHERE `id` = '".$attack_arr['send_from_user']."'");
				}
			
			if ($attack_arr['send_to_user'] != '-1') {
				//Zmie� w�a�ciciela w eventach pochodz�cych od tej wioski:
				mysql_query("UPDATE `movements` SET `send_to_user` = '".$attack_arr['send_from_user']."' WHERE `send_to_village` = '".$attack_arr['send_to_village']."'");
				mysql_query("UPDATE `movements` SET `send_from_user` = '".$attack_arr['send_from_user']."' WHERE `send_from_village` = '".$attack_arr['send_to_village']."'");
				mysql_query("UPDATE `offers` SET `userid` = '".$attack_arr['send_from_user']."' WHERE `from_village` = '".$attack_arr['send_to_village']."'");
				mysql_query("UPDATE `dealers` SET `from_userid` = '".$attack_arr['send_from_user']."' WHERE `from_village` = '".$attack_arr['send_to_village']."'");
				mysql_query("UPDATE `dealers` SET `to_userid` = '".$attack_arr['send_from_user']."' WHERE `to_village` = '".$attack_arr['send_to_village']."'");
				mysql_query("UPDATE `recruit` SET `userid` = '".$attack_arr['send_from_user']."' WHERE `villageid` = '".$attack_arr['send_to_village']."'");
				mysql_query("UPDATE `events` SET `user_id` = '".$attack_arr['send_from_user']."' WHERE `villageid` = '".$attack_arr['send_to_village']."'");
				}
				
			//Zabierz jednego szlachcica:
			mysql_query("UPDATE `villages` SET `all_unit_snob` = `all_unit_snob` - '1' , `r_bh` = `r_bh` - '".$cl_units->get_bhprice('unit_snob')."' WHERE `id` = '".$attack_arr['send_from_village']."'");
			
			//Dodaj jednostki jako pomoc:
			foreach ($cl_units->get_array("dbname") as $jname) {
				$jednostki_pomoc[$jname] = $jednostki_od[$jname] - $sim_effect['jednostki_att_straty'][$jname];
				}
			
			$jednostki_pomoc['unit_snob'] -= 1;
			
			mysql_query("INSERT INTO unit_place($impl_units,villages_from_id,villages_to_id) VALUES('".implode("','",$jednostki_pomoc)."','".$attack_arr['send_from_village']."','".$attack_arr['send_to_village']."')");
			
			foreach ($cl_units->get_array("dbname") as $jname) {
				$jednostki_po_za_wioska[] = sql("SELECT `all_$jname` FROM `villages` WHERE `id` = '".$attack_arr['send_to_village']."'",'array');
				}
			
			//Usu� event:
			mysql_query("DELETE FROM `movements` WHERE `id` = '$id'");
			mysql_query("DELETE FROM `events` WHERE `event_id` = '$id' AND `event_type` = 'movement'");
			} else {
			$grabienie = true;
			$podbicie = false;
			$zmniejszenie_pop_raport = floor($cel_wioska_info['agreement']).";".floor($cel_wioska_info['agreement'] - $rand_pop_minus);
			
			mysql_query("UPDATE `villages` SET `agreement` = `agreement` - '$rand_pop_minus' WHERE `id` = '".$attack_arr['send_to_village']."'");
			}
		}
		
	//Rycerz - znajdywanie przedmiot�w:
	if ($jednostki_od['unit_paladin'] > 0 && ($jednostki_od['unit_paladin'] - $sim_effect['jednostki_att_straty']['unit_paladin']) == $jednostki_od['unit_paladin']) {
		if ($attack_arr['send_to_user'] == '-1' && !$podbicie) {
			$pala_items_arr = explode(';',$od_gracz_info['pala_items']);
			$pala_items_arr = del_emptys($pala_items_arr);
		
			if (count($pala_bonus) > count($pala_items_arr)) {
				if ($od_gracz_info['pala_to_next_item'] >= 50) {
					foreach ($pala_bonus as $bname => $binfo) {
						if (!in_array($bname,$pala_items_arr)) {
							$mozliwe_items[] = $bname;
							}
						}
						
					//Wybierz losowy przedmiot:
					$los = array_rand($mozliwe_items);
					$pala_items_arr[] = $mozliwe_items[$los];
					$impl_pala_items_str = implode(';',$pala_items_arr);
					
					$raport_pala_finditem = $mozliwe_items[$los];
					
					mysql_query("INSERT INTO reports(title,time,type,receiver_userid,in_group,att_pala_name,pala_find_item) 
						VALUES (
						'Tw�j rycerz znalaz� przedmiot!','".$attack_arr['end_time']."','pala_find_item',
						'".$attack_arr['send_from_user']."','other','".$od_gracz_info['pala_name']."','".$mozliwe_items[$los]."'
						)");
						
					mysql_query("UPDATE `users` SET `pala_to_next_item` = '1' , `pala_items` = '$impl_pala_items_str' WHERE `id` = '".$attack_arr['send_from_user']."'");
					} else {
					mysql_query("UPDATE `users` SET `pala_to_next_item` = `pala_to_next_item` + '1' WHERE `id` = '".$attack_arr['send_from_user']."'");
					}
				}
			}
		}
		
	//Zreloaduj usera, je�li straci rycerza:
	
	if ($sim_effect['jednostki_att_straty']['unit_paladin'] > 0) {
		mysql_query("UPDATE `users` SET `paladins` = '0' WHERE `id` = '".$attack_arr['send_from_user']."'");
		}
		
	if ($sim_effect['jednsotki_def_straty']['unit_paladin'] > 0) {
		mysql_query("UPDATE `users` SET `paladins` = '0' WHERE `id` = '".$attack_arr['send_to_user']."'");
		}
		
	$lupy = array();
	
	//�upy, je�li wygra� napastnik:
	if ($sim_effect['wygral'] === 'napastnik' && $grabienie) {
		$max_hide_size = $arr_maxhide[$cel_wioska_info['hide']];
		
		$cel_wioska_info['r_wood'] -= $max_hide_size;
		if ($cel_wioska_info['r_wood'] < 0) $cel_wioska_info['r_wood'] = 0;
		$cel_wioska_info['r_stone'] -= $max_hide_size;
		if ($cel_wioska_info['r_stone'] < 0) $cel_wioska_info['r_wood'] = 0;
		$cel_wioska_info['r_iron'] -= $max_hide_size;
		if ($cel_wioska_info['r_iron'] < 0) $cel_wioska_info['r_wood'] = 0;
	
		$surowce_do_zlupienia = $cel_wioska_info['r_wood'] + $cel_wioska_info['r_stone'] + $cel_wioska_info['r_iron'];
	
		if ($surowce_do_zlupienia > $sim_effect['maks_lup']) {
			$lupy = max_lup($cel_wioska_info['r_wood'],$cel_wioska_info['r_stone'],$cel_wioska_info['r_iron'],$sim_effect['maks_lup']);
			
			$spz[] = floor($cel_wioska_info['r_wood'] - $lupy[0]);
			
			$spz[] = floor($cel_wioska_info['r_stone'] - $lupy[1]);
			
			$spz[] = floor($cel_wioska_info['r_iron'] - $lupy[2]);
			
			$lupy[] = $lupy[0] + $lupy[1] + $lupy[2];
			$lupy[] = $sim_effect['maks_lup'];
			} else {
			$lupy = array(floor($cel_wioska_info['r_wood']),floor($cel_wioska_info['r_stone']),floor($cel_wioska_info['r_iron']),floor($surowce_do_zlupienia),$sim_effect['maks_lup']);
			$spz = array(0,0,0);
			}
			
		mysql_query("UPDATE `villages` SET `r_wood` = `r_wood` - '".$lupy[0]."' , `r_stone` = `r_stone` - '".$lupy[1]."' , `r_iron` = `r_iron` - '".$lupy[2]."' WHERE `id` = '".$attack_arr['send_to_village']."'");
		}
		
	if (($lupy[0] + $lupy[1] + $lupy[2]) > 0) {
		mysql_query("UPDATE `users` SET `sfarmione_wioski` = `sfarmione_wioski` + '1' , `day_sfarmione_wioski` = `day_sfarmione_wioski` + '1' WHERE `id` = '".$attack_arr['send_from_user']."'");
		}
		
	if ($sim_effect['jednostki_att_straty']['unit_snob'] > 0) {
		mysql_query("UPDATE `users` SET `zab_szlachta` = `zab_szlachta` + '".$sim_effect['jednostki_att_straty']['unit_snob']."' WHERE `id` = '".$attack_arr['send_to_user']."'");
		}
		
	if ($sim_effect['jednsotki_def_straty']['unit_snob'] > 0) {
		mysql_query("UPDATE `users` SET `zab_szlachta` = `zab_szlachta` + '".$sim_effect['jednsotki_def_straty']['unit_snob']."' WHERE `id` = '".$attack_arr['send_from_user']."'");
		}
		
	//Wybierz rysunek raportu:
		
	if ($sim_effect['wygral'] == 'obronca') {
		if ($sim_effect['tylko_szpiegowanie']) {
			if ($sim_effect['szpiegowanie']) {
				$raport_image_title_att = "graphic/dots/blue.png";
				$raport_image_title_def = "graphic/dots/blue.png";
				} else {
				$raport_image_title_att = "graphic/dots/red.png";
				$raport_image_title_def = "graphic/dots/green.png";
				}
			} else {
			if ($sim_effect['def_osadnicy_straty'] > 0) {
				if ($sim_effect['szpiegowanie']) {
					$raport_image_title_att = "graphic/dots/blue.png";
					} else {
					$raport_image_title_att = "graphic/dots/red.png";
					}
				$raport_image_title_def = "graphic/dots/yellow.png";
				} else {
				if ($sim_effect['szpiegowanie']) {
					$raport_image_title_att = "graphic/dots/blue.png";
					} else {
					$raport_image_title_att = "graphic/dots/red.png";
					}
				$raport_image_title_def = "graphic/dots/green.png";	
				}
			}
		} else {
		if ($sim_effect['att_osadnicy_straty'] > 0) {
			$raport_image_title_att = "graphic/dots/yellow.png";
			$raport_image_title_def = "graphic/dots/red.png";
			} else {
			$raport_image_title_att = "graphic/dots/green.png";
			$raport_image_title_def = "graphic/dots/red.png";
			}
		}
		
	if ($attack_arr['send_from_user'] == $attack_arr['send_to_user']) {
		$suma_str_jed = array_sum($sim_effect['jednostki_att_straty']) + array_sum($sim_effect['jednsotki_def_straty']);
		mysql_query("UPDATE `users` SET `pok_ownunits` = `pok_ownunits` + '$suma_str_jed' WHERE `id` = '".$attack_arr['send_from_user']."'");
		}
		
	//Utwurz tytu� raportu:
	
	$title_report = entparse($od_gracz_info['username']) 
		. ' (' . entparse($od_wioska_info['name']) . ')';
		if ($podbicie) { $title_report .= ' podbija '; } else { $title_report .= ' atakuje '; }
		$title_report .= entparse($cel_wioska_info['name'])
		. ' (' . $cel_wioska_info['x'] . '|' . $cel_wioska_info['y'] . ') '
		. 'K' . $cel_wioska_info['continent'];
		
	$raport_czas = $attack_arr['end_time'];
	$raport_typ = 'attack';
	
	$units_a = implode(';',$jednostki_od);
	$units_b = implode(';',$sim_effect['jednostki_att_straty']);
	
	$units_c = implode(';',$jednostki_do);
	$units_d = implode(';',$sim_effect['jednsotki_def_straty']);
	
	if ($podbicie) {
		$units_e = implode(';',$jednostki_po_za_wioska);
		$report_msg = 'Napastnik przej� wiosk�!';
		}
		
	if ($sim_effect['zbicie_poparcia']) {
		$zmniejszenie_pop_raport;
		} else {
		$zmniejszenie_pop_raport = "100;100";
		}
		
	if ($noc) {
		$rep_noc = 1;
		} else {
		$rep_noc = 0;
		}
		
	$raport_taran_u = $sim_effect['mur_stary_lvl'].';'.$sim_effect['mur_nowy_lvl'];
	$raport_kata_u = $sim_effect['ktpc_stary_lvl'].';'.$sim_effect['ktpc_nowy_lvl'].';'.$attack_arr['building'];
	
	if ($sim_effect['wygral'] === 'napastnik') {
		$raport_wygrana = 'att';
		$raport_zobacz_wojsko_obroncy = '1';
		if (array_sum($jednostki_do) > 0) {
			mysql_query("UPDATE `users` SET `zniszczone_armie` = `zniszczone_armie` + '1' WHERE `id` = '".$attack_arr['send_from_user']."'");
			}
		} else {
		$raport_wygrana = 'def';
		$raport_zobacz_wojsko_obroncy = '0';
		mysql_query("UPDATE `users` SET `zniszczone_armie` = `zniszczone_armie` + '1' WHERE `id` = '".$attack_arr['send_to_user']."'");
		}
		
	if ($sim_effect['szpiegowanie']) {
		$raport_szpieg_budynki = sql("SELECT $impl_builds,r_wood,r_stone,r_iron FROM `villages` WHERE `id` = '".$attack_arr['send_to_village']."'",'assoc');
		
		//Szpieguj surowce:
		$max_hide_size = $arr_maxhide[$cel_wioska_info['hide']];
		$spz_info = floor($raport_szpieg_budynki['r_wood'] - $max_hide_size).';'.floor($raport_szpieg_budynki['r_stone'] - $max_hide_size).';'.floor($raport_szpieg_budynki['r_iron'] - $max_hide_size);
		
		unset($raport_szpieg_budynki['r_wood']);
		unset($raport_szpieg_budynki['r_stone']);
		unset($raport_szpieg_budynki['r_iron']);
		//Szpieguj budynki:
		$raport_szpieg_budynki = implode(';',$raport_szpieg_budynki);
		//Szpieguj jednostki:
		$jednostki_all = sql("SELECT $impl_units_all FROM `villages` WHERE `id` = '".$attack_arr['send_to_village']."'",'assoc');
		$jednostki_ww = sql("SELECT $impl_units FROM `unit_place` WHERE `villages_from_id` = '".$attack_arr['send_to_village']."' AND `villages_from_id` = '".$attack_arr['send_to_village']."'",'assoc');
		
		foreach ($cl_units->get_array("dbname") as $jname) {
			$jednostki_po_za_wioskas[] = $jednostki_all[$jname] - $jednostki_ww[$jname];
			}
			
		$jednostki_po_za_wioskas = implode(';',$jednostki_po_za_wioskas);
		}
		
	if ($attack_arr['send_from_user'] != '-1') {
		mysql_query("INSERT INTO reports(
			title_image,title,time,type,a_units,
			b_units,c_units,d_units,e_units,agreement,
			ram,catapult,message,to_user,from_user,
			to_village,from_village,receiver_userid,in_group,luck,
			moral,wins,hives,see_def_units,sorowce_poz,
			budynki,f_units,att_pala_item,def_pala_item,att_pala_name,
			def_pala_name,pala_find_item,bonus_noc
			) VALUES (
			'$raport_image_title_att','$title_report','$raport_czas','$raport_typ','$units_a',
			'$units_b','$units_c','$units_d','$units_e','$zmniejszenie_pop_raport',
			'$raport_taran_u','$raport_kata_u','$report_msg','".$attack_arr['send_to_user']."','".$attack_arr['send_from_user']."',
			'".$attack_arr['send_to_village']."','".$attack_arr['send_from_village']."','".$attack_arr['send_from_user']."','$raport_typ','$szczescie',
			'$morale','$raport_wygrana','".implode(';',$lupy)."','$raport_zobacz_wojsko_obroncy','$spz_info',
			'$raport_szpieg_budynki','$jednostki_po_za_wioskas','".$od_gracz_info['pala_aktu_item']."','".$cel_gracz_info['pala_aktu_item']."','".$od_gracz_info['pala_name']."',
			'".$cel_gracz_info['pala_name']."','$raport_pala_finditem','$rep_noc'
			)");
			
		mysql_query("UPDATE `users` SET `new_report` = '1' WHERE `id` = '".$attack_arr['send_from_user']."'");
		}
		
	if ($attack_arr['send_to_user'] != '-1') {
		mysql_query("INSERT INTO reports(
			title_image,title,time,type,a_units,
			b_units,c_units,d_units,e_units,agreement,
			ram,catapult,message,to_user,from_user,
			to_village,from_village,receiver_userid,in_group,luck,
			moral,wins,hives,see_def_units,sorowce_poz,
			budynki,f_units,att_pala_item,def_pala_item,att_pala_name,
			def_pala_name,pala_find_item,bonus_noc
			) VALUES (
			'$raport_image_title_def','$title_report','$raport_czas','$raport_typ','$units_a',
			'$units_b','$units_c','$units_d','$units_e','$zmniejszenie_pop_raport',
			'$raport_taran_u','$raport_kata_u','$report_msg','".$attack_arr['send_to_user']."','".$attack_arr['send_from_user']."',
			'".$attack_arr['send_to_village']."','".$attack_arr['send_from_village']."','".$attack_arr['send_to_user']."','$raport_typ','$szczescie',
			'$morale','$raport_wygrana','".implode(';',$lupy)."',1,'$spz_info',
			'$raport_szpieg_budynki','$jednostki_po_za_wioskas','".$od_gracz_info['pala_aktu_item']."','".$cel_gracz_info['pala_aktu_item']."','".$od_gracz_info['pala_name']."',
			'".$cel_gracz_info['pala_name']."','$raport_pala_finditem','$rep_noc'
			)");
			
		mysql_query("UPDATE `users` SET `new_report` = '1' WHERE `id` = '".$attack_arr['send_to_user']."'");
		}
	
	if ($attack_arr['send_to_user'] != '-1') {
		mysql_query("UPDATE `users` SET `new_report` = '1' WHERE `id` = '".$attack_arr['send_to_user']."'");
		}
	
	if ($attack_arr['send_from_user'] != '-1') {
		mysql_query("UPDATE `users` SET `new_report` = '1' WHERE `id` = '".$attack_arr['send_from_user']."'");
		}
		
	if (!$podbicie && $jednostki_od['unit_spy'] == $sim_effect['jednostki_att_straty']['unit_spy'] && $jednostki_od['unit_spy'] > 0) {
		mysql_query("UPDATE `users` SET `def_spy_attacks` = `def_spy_attacks` + '1' WHERE `id` = '".$attack_arr['send_to_user']."'");
		}
		
	if (!$podbicie) {
		if ($sim_effect['wygral'] === 'napastnik') {
			foreach ($cl_units->get_array("dbname") as $jname) {
				$pozosta�e_jed[] = $jednostki_od[$jname] - $sim_effect['jednostki_att_straty'][$jname];
				}

			mysql_query("UPDATE `movements` SET
				`from_village` = '".$attack_arr['send_to_village']."' ,
				`to_village` = '".$attack_arr['send_from_village']."' ,
				`units` = '".implode(';',$pozosta�e_jed)."' ,
				`type` = 'return' ,
				`start_time` = '".$attack_arr['end_time']."' ,
				`end_time` = '".(($attack_arr['end_time'] - $attack_arr['start_time']) + $attack_arr['end_time'])."' ,
				`from_userid` = '".$attack_arr['send_to_user']."' ,
				`to_userid` = '".$attack_arr['send_from_user']."' ,
				`wood` = '".$lupy[0]."' ,
				`stone` = '".$lupy[1]."' ,
				`iron` = '".$lupy[2]."',
				`to_hidden` = '1'
				WHERE `id` = '$id'
				");
				
			mysql_query("UPDATE `events` SET `event_time` = '".(($attack_arr['end_time'] - $attack_arr['start_time']) + $attack_arr['end_time'])."' WHERE `event_id` = '$id' AND `event_type` = 'movement'");
			} else {
			if ($sim_effect['szpiegowanie']) {
				foreach ($cl_units->get_array("dbname") as $jname) {
					$pozosta�e_jed[] = $jednostki_od[$jname] - $sim_effect['jednostki_att_straty'][$jname];
					}

				mysql_query("UPDATE `movements` SET
					`from_village` = '".$attack_arr['send_to_village']."' ,
					`to_village` = '".$attack_arr['send_from_village']."' ,
					`units` = '".implode(';',$pozosta�e_jed)."' ,
					`type` = 'return' ,
					`start_time` = '".$attack_arr['end_time']."' ,
					`end_time` = '".(($attack_arr['end_time'] - $attack_arr['start_time']) + $attack_arr['end_time'])."' ,
					`from_userid` = '".$attack_arr['send_to_user']."' ,
					`to_userid` = '".$attack_arr['send_from_user']."' ,
					`wood` = '".$lupy[0]."' ,
					`stone` = '".$lupy[1]."' ,
					`iron` = '".$lupy[2]."',
					`to_hidden` = '1'
					WHERE `id` = '$id'
					");
				} else {
				mysql_query("DELETE FROM `movements` WHERE `id` = '$id'");
				mysql_query("DELETE FROM `events` WHERE `event_id` = '$id' AND `event_type` = 'movement'");
				}
			}
		}
	}
	
function check_mov($id) {
	$mov_type = sql("SELECT `type` FROM `movements` WHERE `id` = '$id'",'array');
	
	if ($mov_type == 'attack') {
		check_mov_attack($id);
		}
	if ($mov_type == 'support') {
		check_mov_support($id);
		}
	if ($mov_type == 'return') {
		check_mov_return($id);
		}
	if ($mov_type == 'back') {
		check_mov_return($id);
		}
	if ($mov_type == 'cancel') {
		check_mov_return($id);
		}
	}
	
function check_mov_return($id) {
	global $cl_units,$impl_units;
	$return_arr = sql("SELECT units,send_from_village,wood,stone,iron,send_from_user,end_time FROM `movements` WHERE `id` = '$id'","assoc");
	
	mysql_query("DELETE FROM `movements` WHERE `id` = '$id'");
	mysql_query("DELETE FROM `events` WHERE `event_id` = '$id' AND `event_type` = 'movement'");
	
	$support_arr['units'] = explode(';',$return_arr['units']);
	$jid = 0;
	
	foreach ($cl_units->get_array("dbname") as $jname) {
		mysql_query("UPDATE `unit_place` SET `$jname` = `$jname` + '".$support_arr['units'][$jid]."' WHERE `villages_from_id` = '".$return_arr['send_from_village']."' AND `villages_to_id` = '".$return_arr['send_from_village']."'");
		$jid++;
		}
		
	$v_query = "UPDATE `villages` SET ";
		
	if ($return_arr['wood'] > 0) {
		$v_query .= "`r_wood` = `r_wood` + '".$return_arr['wood']."' ,";
		} else {
		$v_query .= "`r_wood` = `r_wood` + '0' ,";
		}
		
	if ($return_arr['stone'] > 0) {
		$v_query .= "`r_stone` = `r_stone` + '".$return_arr['stone']."' ,";
		} else {
		$v_query .= "`r_stone` = `r_stone` + '0' ,";
		}
		
	if ($return_arr['iron'] > 0) {
		$v_query .= "`r_iron` = `r_iron` + '".$return_arr['iron']."'";
		} else {
		$v_query .= "`r_iron` = `r_iron` + '0'";
		}
		
	$v_query .= " WHERE `id` = '".$return_arr['send_from_village']."'";
	
	mysql_query($v_query);
	
	$res_sum = $return_arr['wood'] + $return_arr['stone'] + $return_arr['iron'];
	
	if ($res_sum > 0) {
		mysql_query("UPDATE `users` SET `zlupione_sur` = `zlupione_sur` + '$res_sum' , `day_zlupione_sur` = `day_zlupione_sur` + '$res_sum' WHERE `id` = '".$return_arr['send_from_user']."'");
		}
	}

function check_mov_support($id) {
	global $cl_units,$impl_units;
	$support_arr = sql("SELECT end_time,units,send_from_village,send_from_user,send_to_user,send_to_village FROM `movements` WHERE `id` = '$id'","assoc");
	
	mysql_query("DELETE FROM `movements` WHERE `id` = '$id'");
	mysql_query("DELETE FROM `events` WHERE `event_id` = '$id' AND `event_type` = 'movement'");
	
	$jednostki_napomoc = explode(';',$support_arr['units']);
	$jid = 0;
	
	foreach ($cl_units->get_array("dbname") as $jname) {
		$jednostki_pomoc[$jname] = $jednostki_napomoc[$jid];
		if ($jednostki_pomoc[$jname] > 0) {
			$tblc++;
			}
		$jid++;
		}
		
	$v_counts = sql("SELECT COUNT(id) FROM `unit_place` WHERE `villages_from_id` = '".$support_arr['send_from_village']."' AND `villages_to_id` = '".$support_arr['send_to_village']."'",'array');
	
	if ($v_counts > 0) {
		if (array_suma($jednostki_pomoc) > 0) {
			$sql_vq .= "UPDATE `unit_place` SET ";
			
			$i = 1;
			foreach ($cl_units->get_array("dbname") as $jname) {
				if ($jednostki_pomoc[$jname] > 0) {
					if ($i == $tblc) {
						$sql_vq .= "`$jname` = `$jname` + '".$jednostki_pomoc[$jname]."' ";
						} else {
						$sql_vq .= "`$jname` = `$jname` + '".$jednostki_pomoc[$jname]."', ";
						}
					$i++;
					}	
				}
			$sql_vq .= "WHERE `villages_from_id` = '".$support_arr['send_from_village']."' AND `villages_to_id` = '".$support_arr['send_to_village']."'";
			
			mysql_query($sql_vq);
			}
		} else {
		//Dodaj wsparcie do wioski:
		mysql_query("INSERT INTO unit_place($impl_units,villages_from_id,villages_to_id) VALUES('".implode("','",$jednostki_pomoc)."','".$support_arr['send_from_village']."','".$support_arr['send_to_village']."')");
		}
		
	//Dodaj raporty:
	$info_wioska_cel = sql("SELECT x,y,continent,name FROM `villages` WHERE `id` = '".$support_arr['send_to_village']."'",'assoc');
	
	$title = entparse(sql("SELECT `username` FROM `users` WHERE `id` = '".$support_arr['send_from_user']."'",'array'))
		. ' ('.entparse(sql("SELECT `name` FROM `villages` WHERE `id` = '".$support_arr['send_from_village']."'",'array')).') pomaga dla '
		. entparse(sql("SELECT `username` FROM `users` WHERE `id` = '".$support_arr['send_to_user']."'",'array'))
		. ' ' . entparse($info_wioska_cel['name']) . ' (' . $info_wioska_cel['x'] . '|' . $info_wioska_cel['y'] .') K'.$info_wioska_cel['continent'];
		
	mysql_query("INSERT INTO reports(
		title,time,type,a_units,to_user,
		from_user,to_village,from_village,receiver_userid,in_group
		) VALUES (
		'$title','".$support_arr['end_time']."','support','".$support_arr['units']."','".$support_arr['send_to_user']."',
		'".$support_arr['send_from_user']."','".$support_arr['send_to_village']."','".$support_arr['send_from_village']."','".$support_arr['send_to_user']."','support'
		)");
		
	mysql_query("UPDATE `users` SET `new_report` = '1' WHERE `id` = '".$support_arr['send_to_user']."'");
		
	if ($support_arr['send_from_user'] != '-1' && $support_arr['send_from_user'] != $support_arr['send_to_user']) {
		mysql_query("INSERT INTO reports(
			title,time,type,a_units,to_user,
			from_user,to_village,from_village,receiver_userid,in_group
			) VALUES (
			'$title','".$support_arr['end_time']."','support','".$support_arr['units']."','".$support_arr['send_to_user']."',
			'".$support_arr['send_from_user']."','".$support_arr['send_to_village']."','".$support_arr['send_from_village']."','".$support_arr['send_from_user']."','support'
			)");
			
		mysql_query("UPDATE `users` SET `new_report` = '1' WHERE `id` = '".$support_arr['send_from_user']."'");
		}
	}
	
function check_dealers($id) {
	$dealers_arr = sql("SELECT end_time,dealers,wood,stone,iron,type,from_village,to_village,start_time,end_time,from_userid,to_userid,is_offer FROM `dealers` WHERE `id` = '$id'","assoc");
	
	if ($dealers_arr['type'] == 'to') {
		$end_time = ($dealers_arr['end_time'] - $dealers_arr['start_time']) + $dealers_arr['end_time'];
		$start_time = $dealers_arr['end_time'];
		mysql_query("UPDATE `dealers` SET `wood` = '0',`stone` = '0',`iron` = '0',`start_time` = '$start_time',`end_time` = '$end_time',`type` = 'back' WHERE `id` = '$id'");
		mysql_query("UPDATE `events` SET `can_knot` = '0',`event_time` = '$end_time', `cid` = '0' WHERE `event_id` = '$id' AND `event_type` = 'dealers'");
		mysql_query("UPDATE `villages` SET `r_wood` = `r_wood` + '".$dealers_arr['wood']."' , `r_stone` = `r_stone` + '".$dealers_arr['stone']."' , `r_iron` = `r_iron` + '".$dealers_arr['iron']."'WHERE `id` = '".$dealers_arr['to_village']."'");
		
		//Reload danych wioski:
		reload_vdata($dealers_arr['to_village'],$dealers_arr['end_time']);
		
		//Dodaj raport:
		$informacje['wioska_od_nazwa'] = entparse(sql("SELECT `name` FROM `villages` WHERE `id` = '".$dealers_arr['from_village']."'",'array'));
		$informacje['gracz_od_nazwa'] = entparse(sql("SELECT `username` FROM `users` WHERE `id` = '".$dealers_arr['from_userid']."'",'array'));
		$informacje['gracz_do_nazwa'] = entparse(sql("SELECT `username` FROM `users` WHERE `id` = '".$dealers_arr['to_userid']."'",'array'));
		$informacje['wioska_do_info'] = sql("SELECT name,x,y,continent FROM `villages` WHERE `id` = '".$dealers_arr['to_village']."'",'assoc');
		
		$title = $informacje['gracz_od_nazwa'] 
			. ' (' . $informacje['wioska_od_nazwa'] . ')'
			. ' dostarcza surowce dla '
			. $informacje['gracz_do_nazwa']
			. ' ' . entparse($informacje['wioska_do_info']['nazwa'])
			. ' (' . $informacje['wioska_do_info']['x'] . '|'  . $informacje['wioska_do_info']['y'] . ') K' 
			. $informacje['wioska_do_info']['continent'];
				
		mysql_query("INSERT INTO reports(
			title,time,type,to_user,from_user,
			to_village,from_village,receiver_userid,in_group,hives
			) VALUES (
			'$title','$start_time','sendRess','".$dealers_arr['to_userid']."','".$dealers_arr['from_userid']."',
			'".$dealers_arr['to_village']."','".$dealers_arr['from_village']."','".$dealers_arr['from_userid']."','trade','".floor($dealers_arr['wood']).";".floor($dealers_arr['stone']).";".floor($dealers_arr['iron'])."'
			)");
			
		if ($dealers_arr['to_userid'] != '-1' && $dealers_arr['to_userid'] != $dealers_arr['from_userid']) {
			mysql_query("INSERT INTO reports(
				title,time,type,to_user,from_user,
				to_village,from_village,receiver_userid,in_group,hives
				) VALUES (
				'$title','$start_time','sendRess','".$dealers_arr['to_userid']."','".$dealers_arr['from_userid']."',
				'".$dealers_arr['to_village']."','".$dealers_arr['from_village']."','".$dealers_arr['to_userid']."','trade','".floor($dealers_arr['wood']).";".floor($dealers_arr['stone']).";".floor($dealers_arr['iron'])."'
				)");
			}
			
		if ($dealers_arr['to_userid'] != '-1') {
			mysql_query("UPDATE `users` SET `new_report` = '1' WHERE `id` = '".$dealers_arr['to_userid']."'");
			}
	
		if ($dealers_arr['from_userid'] != '-1') {
			mysql_query("UPDATE `users` SET `new_report` = '1' WHERE `id` = '".$dealers_arr['from_userid']."'");
			}
			
		if ($dealers_arr['is_offer'] == 1) {
			mysql_query("UPDATE `users` SET `a_oferty` = `a_oferty` + '1' WHERE `id` = '".$dealers_arr['from_userid']."'");
			}
		}
	if ($dealers_arr['type'] == 'back') {
		mysql_query("DELETE FROM `dealers` WHERE `id` = '$id'");
		mysql_query("DELETE FROM `events` WHERE `event_id` = '$id' AND `event_type` = 'dealers'");
		
		mysql_query("UPDATE `villages` SET `dealers_outside` = `dealers_outside` - '".$dealers_arr['dealers']."' WHERE `id` = '".$dealers_arr['from_village']."'");
		}
	}
	
function koniec_rezerwacji($id) {
	mysql_query("DELETE FROM `rezerwacje` WHERE `id` = '$id'");
	mysql_query("DELETE FROM `events` WHERE `event_id` = '$id' AND `event_type` = 'rezerwacja'");
	mysql_query("UPDATE `rezerwacje_log` SET `proces` = '1' , `last_edit` = '".date("U")."' WHERE `id` = '$id'");
	}
	
function check_all_events() {
	global $serwer;
	$all_events_query = mysql_query("SELECT event_type,event_id,can_knot FROM `events` WHERE `event_time` <= '".date("U")."' ORDER BY `event_time`");
	while ($event = mysql_fetch_assoc($all_events_query)) {
		if ($event['event_type'] === 'build') {
			check_builds($event['event_id']);
			}
		if ($event['event_type'] === 'dealers') {
			if ($event['can_knot'] == '0') {
				check_dealers($event['event_id']);
				} else {
				mysql_query("DELETE FROM `events` WHERE `event_id` = '".$event['event_id']."' AND `event_type` = 'dealers' AND `can_knot` = '1'");
				}
			}
		if ($event['event_type'] === 'movement') {
			check_mov($event['event_id']);
			}
		if ($event['event_type'] === 'research') {
			check_tech($event['event_id']);
			}
		if ($event['event_type'] === 'rezerwacja') {
			koniec_rezerwacji($event['event_id']);
			}
		}
		
	if (file_exists("../serwer_$serwer/rangs_reloader/lastrel.txt")) {
		$nxt_rel = file_get_contents("../serwer_$serwer/rangs_reloader/lastrel.txt");
		if (date("U") > $nxt_rel) {
			$f = fopen("../serwer_$serwer/rangs_reloader/lastrel.txt",'w');
			fputs($f,date("U") + 1800);
			fclose($f);
		
			//Reload punkt�w plemion:
			$aaq = mysql_query("SELECT `id` FROM `ally`");
			while ($si = mysql_fetch_array($aaq)) {
				$villages_ally = sql("SELECT SUM(villages) FROM `users` WHERE `ally` = '".$si[0]."'",'array');
				$mem_ally = sql("SELECT COUNT(id) FROM `users` WHERE `ally` = '".$si[0]."'",'array');
				$points_ally = sql("SELECT SUM(points) FROM `users` WHERE `ally` = '".$si[0]."'",'array');
				$points_ally_40 = sql("SELECT SUM(points) FROM `users` WHERE `ally` = '".$si[0]."' ORDER BY points DESC LIMIT 40",'array');
			
				mysql_query("UPDATE `ally` SET `points` = '$points_ally' , `best_points` = '$points_ally_40' , `villages` = '$villages_ally' , `villages` = '$mem_ally' WHERE `id` = '".$si[0]."'");
				}
			
			$rang = 0;
			
			//Reload ranking�w plemion:
			$query = mysql_query("SELECT id FROM `ally` ORDER BY points DESC");
			while($id = mysql_fetch_array($query)) {
				$rang++;
				mysql_query("UPDATE `ally` SET `rang` = '$rang' WHERE `id` = '".$id[0]."'");
				}
		
			$rang = 0;
		
			//Reload ranking�w graczy:
			$query = mysql_query("SELECT id FROM `users` ORDER BY points DESC");
			while($id = mysql_fetch_array($query)) {
				$rang++;
				mysql_query("UPDATE `users` SET `rang` = '$rang' WHERE `id` = '".$id[0]."'");
				}
				
			$rang = 0;
		
			//Reload ranking�w odznacze�:
			$query = mysql_query("SELECT id FROM `users` ORDER BY awards_points_all DESC");
			while($id = mysql_fetch_array($query)) {
				$rang++;
				mysql_query("UPDATE `users` SET `award_rang` = '$rang' WHERE `id` = '".$id[0]."'");
				}
			
			$rang = 0;
			
			//Reload ranking�w - pokonanych jako obro�ca graczy:
			$query = mysql_query("SELECT id FROM `users` ORDER BY killed_units_def DESC");
			while($id = mysql_fetch_array($query)) {
				$rang++;
				mysql_query("UPDATE `users` SET `killed_units_def_rank` = '$rang' WHERE `id` = '".$id[0]."'");
				}
			
			$rang = 0;
		
			//Reload ranking�w - pokonanych jako napastnik graczy:
			$query = mysql_query("SELECT id FROM `users` ORDER BY killed_units_att DESC");
			while($id = mysql_fetch_array($query)) {
				$rang++;
				mysql_query("UPDATE `users` SET `killed_units_att_rank` = '$rang' WHERE `id` = '".$id[0]."'");
				}
			
			$rang = 0;
		
			//Reload ranking�w - pokonanych ��cznie graczy:
			$query = mysql_query("SELECT id FROM `users` ORDER BY killed_units_altogether DESC");
			while($id = mysql_fetch_array($query)) {
				$rang++;
				mysql_query("UPDATE `users` SET `killed_units_altogether_rank` = '$rang' WHERE `id` = '".$id[0]."'");
				}
			}
		}
	}
	
class awards {
	var $awards_configs = array (
		'odznaczenie_punkty' => array(
			array(100,5000,100000,10000000),
			4,
			'Kr�l punkt�w',
			'Zdoby�e� ju� %s punkt�w!',
			'Zdob�d� %s punkt�w!'
			),
		'odznaczenie_lupy' => array(
			array(500,10000,1000000,100000000),
			4,
			'Rabu�',
			'Zrabowa�e� ju� %s surowc�w!',
			'Spl�druj %s surowc�w'
			),
		'odznaczenie_farmienie' => array(
			array(10,100,1000,10000),
			4,
			'Grabie�ca',
			'Liczba udanych pl�drowa�: %s!',
			'Spl�druj %s innych wiosek!'
			),
		'odznaczenie_podbicia' => array(
			array(5,50,500,1000),
			4,
			'Podb�j',
			'Ilo�� podbitych do tej pory wiosek: %s!',
			'Musisz podbi� nast�puj�c� ilo�� wiosek: %s!'
			),
		'odznaczenie_zabite_jednostki' => array(
			array(10000,100000,1000000,20000000),
			4,
			'Przyw�dca',
			'Pokona�e� ju� %s wrogich jednostek!',
			'Pokonaj %s wrogich jednostek!'
			),
		'odznaczenie_zabjed_wwsp' => array(
			array(100,1000,10000,100000),
			4,
			'�mier� bohatera',
			'Liczba twoich jednostek, kt�re ponios�y honorow� �mier� wspieraj�c inne wioski: %s!',
			'Stra� 1.000 jednostek pomagaj�c innym wioskom!'
			),
		'odznaczenie_ranking' => array(
			array(1000,100,20,1),
			4,
			'Najlepszy zdobywca',
			'Dosta�e� si� do czo�owej %s tego �wiata!',
			'Dosta� si� do czo�owej %s tego �wiata!'
			),
		'odznaczenie_rycerz' => array(
			array(1),
			1,
			'Pot�ga rycerza',
			'Znalaz�e� wszystkie przedmioty rycerza!',
			'Znajd� wszystkie przedmioty rycerza!'
			),
		'odznaczenie_szczescie' => array(
			array(1),
			1,
			'Szczesciarz',
			'Poparcie wioski wynosi�o 0 po jej podbiciu!',
			'Poparcie wioski musi wynosi� 0 po jej podbiciu!'
			),
		'odznaczenie_pech' => array(
			array(1),
			1,
			'Pechowiec',
			'Poparcie wioski spad�o do +1 po jednym z Twoich atak�w!',
			'Poparcie wioski musi spa�� do +1 po jednym z twoich atak�w!'
			),
		'odznaczenie_zmartwychstanie' => array(
			array(5),
			1,
			'Zmartwychwstanie',
			'Zaczynasz ju� poraz pi�ty gr� na tym �wiecie!',
			'Zacznij od nowa 5 razy w tym �wiecie!'
			),
		'odznaczenie_pok_wlasne_jed' => array(
			array(10,100,1000,10000),
			4,
			'Samob�j',
			'Zaatakowa�e� samego siebie i straci�e� w bitwie ponad %s jednostek!',
			'Zaatakowa�e� samego siebie i straci�e� w bitwie ponad %s jednostek!'
			),
		'odznaczenie_podbicie_siebie' => array(
			array(1),
			1,
			'Podb�j samego siebie',
			'Podbi�e� samego siebie!',
			'Podbij samego siebie!'
			),
		'odznaczenie_podbite_rezerwacje' => array(
			array(5,25,50,100),
			4,
			'Rezerwacja wioski udana',
			'Ilo�� podbitych do tej pory zarezerwowanych wiosek: %s!',
			'Podbij %s zarezerwowanych wiosek!'
			),
		'odznaczenie_dni_w_sojuszu' => array(
			array(30,60,180,360),
			4,
			'Towarzysz broni',
			'Jeste� cz�onkiem swojego plemienia ju� od %s dni!',
			'B�d� cz�onkiem plemienia przez %s dni!'
			),
		'odznaczenie_destory_builds' => array(
			array(25,250,2500,10000),
			4,
			'Cz�owiek Demolka',
			'Do tej pory uda�o ci si� zniszczy� %s poziom�w budynk�w!',
			'Zniszcz %s poziom�w budynk�w!'
			),
		'odznaczenie_oferty' => array(
			array(10,100,500,1000),
			4,
			'Cz�owiek interesu',
			'Wymieni�e� towary na rynku ju� %s razy!',
			'Wymie� towary na rynku %s razy!'
			),
		'odznaczenie_zniszczone_armie' => array(
			array(25,250,1500,2500),
			4,
			'Rze�nik',
			'Uda�o ci si� ca�kowicie zniszczy� ju� %s wrogich armii!',
			'Zniszcz ca�kowicie %s wrogich armii!'
			),
		'odznaczenie_zniszczona_szlachta' => array(
			array(15,100,350,700),
			4,
			'Pogromca szlachty',
			'Do tej pory uda�o ci si� zabi� %s szlachcic�w!',
			'Zabij %s szlachcic�w!'
			),
		'odznaczenie_wspieranie_innego_gracza' => array(
			array(50,100,500,3000),
			4,
			'Pewny dow�dca',
			'Wspar�e� innych graczy w bitwach %s razy!',
			'Wesprzyj innego gracza w %s bitwach!'
			),
		'odznaczenie_def_spy_att' => array(
			array(25,50,250,500),
			4,
			'Pogromca zwiadowc�w',
			'Uda�o ci si� ju� obroni� przed %s atakami zwiadowc�w!',
			'Odeprzyj %s atak�w zwiadowc�w!'
			),
		'odznaczenie_att_users' => array(
			array(10,25,100,250),
			4,
			'Hetman',
			'Zaatakowa�e� ju� %s r�nych graczy!',
			'Zaatakuj %s r�nych graczy!'
			),
		'odznaczenie_monety' => array(
			array(50,500,5000,50000),
			4,
			'Krezus',
			'Uda�o ci si� wybi� ju� %s z�otych monet!',
			'Wybij %s z�otych monet!'
			),
		'odznaczenie_destory_walls' => array(
			array(25,250,2500,10000),
			4,
			'Niszczyciel mur�w',
			'Uda�o ci si� zniszczy� ju� %s poziom�w mur�w obronnych!',
			'Zniszcz %s poziom�w mur�w obronnych!'
			)
		);
		
	var $day_awards_configs = array (
		'day_lupy' => array(
			'Rabu� dnia',
			'Dnia %d zrabowa�e� najwi�cej surowc�w na tym �wiecie (%s surowc�w)!',
			'Do p�nocy spl�druj najwi�cej surowc�w na tym �wiecie!'
			),
		'day_att_kill' => array(
			'Agresor dnia',
			'Dnia %d pokona�e� jako napastnik najwi�cej jednostek na tym �wiecie (%s jednostek)!',
			'Do p�nocy pokonaj jako agresor najwi�cej jednostek na tym �wiecie!'
			),
		'day_def_kill' => array(
			'Obro�ca dnia',
			'Dnia %d pokona�e� jako obro�ca najwi�cej jednostek na tym �wiecie (%s jednostek)!',
			'Do p�nocy pokonaj jako obro�ca najwi�cej jednostek na tym �wiecie!'
			),
		'day_snob_vills' => array(
			'Mocarstwo dnia',
			'dnia %d przej��e� najwi�cej wiosek na tym �wiecie (%s wiosek)!',
			'Do p�nocy podbij najwi�cej wiosek na tym �wiecie!'
			),
		'day_farmed_vills' => array(
			'Grabie�ca dnia',
			'dnia %d spl�drowa�e� najwi�cej wiosek na tym �wiecie (%s wiosek)!',
			'Do p�nocy spl�druj najwi�cej wiosek na tym �wiecie!'
			),
		);
		
	var $mysql_get_awards_data = array(
		'odznaczenie_punkty' => 'points',
		'odznaczenie_lupy' => 'zlupione_sur',
		'odznaczenie_farmienie' => 'sfarmione_wioski',
		'odznaczenie_podbicia' => 'villages',
		'odznaczenie_zabite_jednostki' => 'zabite_jednostki',
		'odznaczenie_zabjed_wwsp' => 'zab_jed_wwsp',
		'odznaczenie_ranking' => 'rang',
		'odznaczenie_rycerz' => 'rycek_all_items',
		'odznaczenie_szczescie' => 'szcz_szlachta',
		'odznaczenie_pech' => 'pech_szlachta',
		'odznaczenie_zmartwychstanie' => 'razy_rozp_nwg',
		'odznaczenie_pok_wlasne_jed' => 'pok_ownunits',
		'odznaczenie_podbicie_siebie' => 'podbicie_siebie',
		'odznaczenie_dni_w_sojuszu' => 'dni_w_plemieniu',
		'odznaczenie_podbite_rezerwacje' => 'udane_rezerwacje',
		'odznaczenie_destory_builds' => 'zniszczone_bud',
		'odznaczenie_oferty' => 'a_oferty',
		'odznaczenie_zniszczone_armie' => 'zniszczone_armie',
		'odznaczenie_zniszczona_szlachta' => 'zab_szlachta',
		'odznaczenie_wspieranie_innego_gracza' => 'wspieranie_inngr',
		'odznaczenie_def_spy_att' => 'def_spy_attacks',
		'odznaczenie_att_users' => 'attacked_players',
		'odznaczenie_monety' => 'monety',
		'odznaczenie_destory_walls' => 'zniszczone_mury',
		);
		
	var $mysql_get_day_data = array(
		'day_lupy' => 'day_zlupione_sur',
		'day_att_kill' => 'day_pok_att',
		'day_def_kill' => 'day_pok_def',
		'day_snob_vills' => 'day_podbicia',
		'day_farmed_vills' => 'day_sfarmione_wioski'
		);
		
	var $level_compiler = array (
		'1' => 'Drewno',
		'2' => 'Br�z',
		'3' => 'Srebro',
		'4' => 'Z�oto'
		);
		
	function save($val = null) {
		global $serwer;
		$f = fopen("../serwer_$serwer/rangs_reloader/day_awards_lr.txt",'w');
		fputs($f,$val);
		fclose($f);
		}
	
	function awards_files() {
		global $serwer;
		if (!file_exists("../serwer_$serwer/rangs_reloader/day_awards_lr.txt")) $this->save();
		}
		
	function get_last_reload_day() {
		global $serwer;
		$last_reload = file_get_contents("../serwer_$serwer/rangs_reloader/day_awards_lr.txt");
		return $last_reload;
		}
		
	function get_unix_day() {
		$day = floor(date("U") / 86400);
		return $day;
		}
		
	function reload_day_awards() {
		$this->awards_files();
		
		$last_reload_day = $this->get_last_reload_day();
		
		if ($this->get_unix_day() > $last_reload_day) {
			foreach ($this->mysql_get_day_data as $award_name => $mysql_query) {
				$rekord_info = sql("SELECT id,$mysql_query,dzienne_odznaczenia FROM `users` ORDER BY `$mysql_query` DESC LIMIT 1",'assoc');
				if ($rekord_info[$mysql_query] > 0) {
					$user_awards_array_info = unserialize($rekord_info['dzienne_odznaczenia']);
					if (!empty($user_awards_array_info[$award_name])) {
						$user_awards_array_info[$award_name]['razy'] += 1;
						$user_awards_array_info[$award_name]['data'] = date("d-m-Y",date("U"));
						$user_awards_array_info[$award_name]['ilosc'] = $rekord_info[$mysql_query];
						$user_awards_array_info[$award_name]['tekst'] = str_replace(array('%d','%s'),array($user_awards_array_info[$award_name]['data'],format_number($user_awards_array_info[$award_name]['ilosc'])),$this->day_awards_configs[$award_name][1]);
						} else {
						$user_awards_array_info[$award_name]['razy'] = 1;
						$user_awards_array_info[$award_name]['data'] = date("d-m-Y",date("U"));
						$user_awards_array_info[$award_name]['ilosc'] = $rekord_info[$mysql_query];
						$user_awards_array_info[$award_name]['tekst'] = str_replace(array('%d','%s'),array($user_awards_array_info[$award_name]['data'],format_number($user_awards_array_info[$award_name]['ilosc'])),$this->day_awards_configs[$award_name][1]);
						}
					$user_awards_str = serialize($user_awards_array_info);
					mysql_query("UPDATE `users` SET `dzienne_odznaczenia` = '$user_awards_str' , `$mysql_query` = '0' , `day_aw_points` = `day_aw_points` + '4' , `awards_points_all` = `day_aw_points` + `awards_points` WHERE `id` = '".$rekord_info['id']."'");
					
					$report_title = 'Otrzymane odznaczenie dzienne: '.$this->day_awards_configs[$award_name][0];
					$report_time = date("U");
					$report_user = $rekord_info['id'];
					$report_tit2 = str_replace(array('%d','%s'),array($user_awards_array_info[$award_name]['data'],format_number($user_awards_array_info[$award_name]['ilosc'])),$this->day_awards_configs[$award_name][1]);
					$report_hives .= '<h3>'.$this->day_awards_configs[$award_name][0].'</h3>';
					$report_hives .= '<div class="award level4" style="float: left; margin-right: 10px;">';
					$report_hives .= '<img src="graphic/awards/'.$award_name.'.png" alt="">';
					$report_hives .= '</div>';
					$report_hives .= '<p>'.$report_tit2.'</p>';
					$report_hives .= '<p><a href="game.php?village=[akuvillage]&amp;screen=info_player&amp;id='.$report_user.'">Zobacz swoje odznaczenia</a></p>';
					
					mysql_query("INSERT INTO reports(
						title,time,type,receiver_userid,hives,
						in_group
						) VALUES(
						'$report_title','$report_time','get_award','$report_user','$report_hives',
						'other'
						)");
						
					mysql_query("UPDATE `users` SET `new_report` = '1' WHERE `id` = '$report_user'");
					}
				$report_hives = '';
				}
				
			$this->save($this->get_unix_day());
			}
		}
	}
?>