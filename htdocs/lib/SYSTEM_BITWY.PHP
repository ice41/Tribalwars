<?php
/*****************************************/
/*=======================================*/
/*     PLIK: SYSTEM_BITWY.PHP   		 */
/*     DATA: 15.01.2012r        		 */
/*     ROLA: System bitwy na plemionach  */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

$pala_bonus = array (
	'unit_spear' => array(1.3,1.2,'Halabarda szwajcarska'),
	'unit_sword' => array(1.4,1.3,'D³ugi miecz Ulricha'),
	'unit_axe' => array(1.4,1.3,'Wojowniczy topór Thorgarda'),
	'unit_archer' => array(1.3,1.2,'Wielki ³uk Edwarda'),
	'unit_spy' => array(1,1,'Luneta Kalida'),
	'unit_light' => array(1.3,1.2,'Lanca Mieszka'),
	'unit_marcher' => array(1.3,1.2,'£uk refleksyjny Khana'),
	'unit_heavy' => array(1.3,1.2,'Flaga Baptysty'),
	'unit_ram' => array(1,1,'Wekiera Carlosa'),
	'unit_catapult' => array(1,10,'Ogieñ olimpijski'),
	'unit_snob' => array(1.3,1.2,'Ber³o Vasca'),
	);

function reload_vdata($osadaid,$czas) {
	global $arr_production,$config,$arr_maxstorage,$bonus;
	
	if (date("U") > $czas) {
		$czas = date("U");
		}
		
	//Reload surowców w wiosce:
	$osadainfo = sql("SELECT stone,wood,iron,r_stone,r_wood,r_iron,storage,last_prod_aktu,agreement,userid,bonus FROM `villages` WHERE id = '$osadaid'",'assoc');
	
	$wood_mod = 1;
	$stone_mod = 1;
	$iron_mod = 1;
	
	if ($osadainfo['last_prod_aktu'] != date("U")) {
		if ($osadainfo['bonus'] == 2) {
			$wood_mod += $bonus->bonusy[$osadainfo['bonus']]['modifer'];
			$stone_mod += $bonus->bonusy[$osadainfo['bonus']]['modifer'];
			$iron_mod += $bonus->bonusy[$osadainfo['bonus']]['modifer'];
			}
			
		if ($osadainfo['bonus'] == 3) {
			$wood_mod += $bonus->bonusy[$osadainfo['bonus']]['modifer'];
			}
			
		if ($osadainfo['bonus'] == 4) {
			$stone_mod += $bonus->bonusy[$osadainfo['bonus']]['modifer'];
			}
			
		if ($osadainfo['bonus'] == 5) {
			$iron_mod += $bonus->bonusy[$osadainfo['bonus']]['modifer'];
			}
			
		(int)$prod['drewno'] = $osadainfo['r_wood'] + $arr_production[$osadainfo['wood']] * $config['speed'] * $wood_mod * (($czas - $osadainfo['last_prod_aktu']) / 3600);
		(int)$prod['kamienie'] = $osadainfo['r_stone'] + $arr_production[$osadainfo['stone']] * $config['speed'] * $stone_mod *(($czas - $osadainfo['last_prod_aktu']) / 3600);
		(int)$prod['ruda'] = $osadainfo['r_iron'] + $arr_production[$osadainfo['iron']] * $config['speed'] * $iron_mod * (($czas - $osadainfo['last_prod_aktu']) / 3600);
		(int)$prod['maxmag'] = $arr_maxstorage[$osadainfo['storage']];
		
		if ($osadainfo['bonus'] == 1) {
			$prod['maxmag'] *= $bonus->bonusy[$osadainfo['bonus']]['modifer'] + 1;
			}
		
		if ($prod['drewno'] > $prod['maxmag']) {
			$prod['drewno'] = $prod['maxmag'];
			}
		
		if ($prod['kamienie'] > $prod['maxmag']) {
			$prod['kamienie'] = $prod['maxmag'];
			}
		
		if ($prod['ruda'] > $prod['maxmag']) {
			$prod['ruda'] = $prod['maxmag'];
			}
		
		//Reload poparcia w wiosce:
		$new_agreement = $config['agreement_per_hour'] * $config['speed'] * (($czas - $osadainfo['last_prod_aktu']) / 3600);
		$new_agreement += $osadainfo['agreement'];
		if ($new_agreement > 100) $new_agreement = 100;
	
		//Reload treningu jednostek w wiosce:
		$mysql_trening_zap = mysql_query("SELECT unit,num_unit,num_finished,time_start,time_finished,time_per_unit,id FROM `recruit` WHERE `villageid` = '$osadaid' AND `time_start` <= '$czas'");
		while ($rec_arr = mysql_fetch_assoc($mysql_trening_zap)) {
			if ($czas >= $rec_arr['time_finished']) {
				$czas_od_startu = $rec_arr['time_finished'] - $rec_arr['time_start'];
				$jednostki_add = floor($rec_arr['num_unit'] - $rec_arr['num_finished']);
				mysql_query("UPDATE `unit_place` SET `".$rec_arr['unit']."` = `".$rec_arr['unit']."` + '$jednostki_add' WHERE `villages_from_id` = '".$osadaid."' AND `villages_to_id` = '".$osadaid."'");
				mysql_query("UPDATE `villages` SET `all_".$rec_arr['unit']."` = `all_".$rec_arr['unit']."` + '$jednostki_add' WHERE `id` = '".$osadaid."'");
				mysql_query("DELETE FROM `recruit` WHERE `id` = '".$rec_arr['id']."'");
				if ($jednostki_add > 0 && $rec_arr['unit'] == 'unit_paladin') {
					$vuser = sql("SELECT `userid` FROM `villages` WHERE `id` = '$osadaid'",'array');
					mysql_query("UPDATE `users` SET `paladins` = '1' , `pala_train` = '0' , `pala_vill` = '$osadaid' WHERE `id` = '$vuser'");
					}
				} else {
				$czas_od_startu = $czas - $rec_arr['time_start'];
				$jednostki_add = floor($czas_od_startu / $rec_arr['time_per_unit']) - $rec_arr['num_finished'];
				mysql_query("UPDATE `unit_place` SET `".$rec_arr['unit']."` = `".$rec_arr['unit']."` + '$jednostki_add' WHERE `villages_from_id` = '".$osadaid."' AND `villages_to_id` = '".$osadaid."'");
				mysql_query("UPDATE `villages` SET `all_".$rec_arr['unit']."` = `all_".$rec_arr['unit']."` + '$jednostki_add' WHERE `id` = '".$osadaid."'");
				mysql_query("UPDATE `recruit` SET `num_finished` = `num_finished` + '$jednostki_add' WHERE `id` = '".$rec_arr['id']."'");
				if ($jednostki_add > 0 && $rec_arr['unit'] == 'unit_paladin') {
					$vuser = sql("SELECT `userid` FROM `villages` WHERE `id` = '$osadaid'",'array');
					mysql_query("UPDATE `users` SET `paladins` = '1' , `pala_train` = '0' , `pala_vill` = '$osadaid' WHERE `id` = '$vuser'");
					}
				}
			}
			
		//Reload ataków na wioskê:
		$ilosc_atakow_na_wioske = sql("SELECT COUNT(id) FROM `movements` WHERE `send_to_village` = '".$osadaid."' AND `type` = 'attack'",'array');
		$ilosc_atakow_na_gracza = sql("SELECT COUNT(id) FROM `movements` WHERE `send_to_user` = '".$osadainfo['userid']."' AND `type` = 'attack'",'array');
		mysql_query("UPDATE `users` SET `attacks` = '$ilosc_atakow_na_gracza' WHERE `id` = '".$osadainfo['userid']."'");
	
		//Zapisaæ zmiany:
		mysql_query("UPDATE `villages` SET `r_stone` = '".$prod['kamienie']."' , `r_wood` = '".$prod['drewno']."' , `r_iron` = '".$prod['ruda']."' , `last_prod_aktu` = '".$czas."' , `agreement` = '$new_agreement' , `attacks` = '$ilosc_atakow_na_wioske' WHERE id = '".$osadaid."'");
		}
	}

function save2($file,$value) {
	$p = fopen($file,'w');
	fputs($p,$value);
	fclose($p);
	}
	
function sim_battle($wojsko_obroncy,$wojsko_napastnika,$mor_level,$cel_katapolt_level,$szeczescie,$morale,$noc,$cel_budynek_nazwa = null,$att_pala_item,$def_pala_item) {
	global $cl_units,$config,$arr_wall_bonus,$arr_basic_defense,$cl_builds,$pala_bonus;
	
	if ($config['moral_activ'] === true) {
		$morale = floor($morale) / 100;
		} else {
		$morale = 1;
		}
		
	$szeczescie /= 100;
	$szeczescie++;
	$suma_j_att = 0;
	
	foreach ($cl_units->get_array("dbname") as $jname) {
		if (entparse($def_pala_item) == $jname) {
			$def_modifer = $pala_bonus[$jname][1];
			} else {
			$def_modifer = 1;
			}
			
		$sila_obrony_piechota += $wojsko_obroncy[$jname] * $cl_units->get_def($jname,1) * $def_modifer;
		
		if (entparse($att_pala_item) == $jname) {
			$aktuunit_att = $cl_units->get_att($jname,1) * $pala_bonus[$jname][0];
			} else {
			$aktuunit_att = $cl_units->get_att($jname,1);
			}
		
		$sila_ataku += $wojsko_napastnika[$jname] * $aktuunit_att;
		$suma_j_att += $wojsko_napastnika[$jname];
		
		if ($cl_units->get_group($jname) == 'foot') {
			$wojsko['foot'] += $wojsko_napastnika[$jname];
			}
		if ($cl_units->get_group($jname) == 'cav') {
			$wojsko['cav'] += $wojsko_napastnika[$jname];
			}
		if ($cl_units->get_group($jname) == 'archer') {
			$wojsko['archer'] += $wojsko_napastnika[$jname];
			}
		}
		
	$sila_ataku *= $szeczescie;
	$sila_ataku *= $morale;
	
	if ($noc) {
		$sila_obrony_piechota *= 2;
		}
		
	$sila_obrony_piechota += $config['reason_defense'];
	$sila_obrony_piechota += $arr_basic_defense[$mor_level];
	$sila_obrony_piechota *= $arr_wall_bonus[$mor_level] + 1;

	if ($sila_ataku < 1) {
		$sila_ataku = 1;
		}
	if ($sila_obrony_piechota < 1) {
		$sila_obrony_piechota = 1;
		}
	
	$stosunki['att_as_deff'] = pow($sila_ataku,"1.5") / pow($sila_obrony_piechota,"1.5");
	
	if ($stosunki['att_as_deff'] > 1) {
		$stosunki['att_as_deff'] = 1;
		}
		
	$tarany = $wojsko_napastnika['unit_ram'];
	$nowy_mur_level = $mor_level;
	if ($tarany > 0) {
		$ram_damage = $tarany;
		if ($att_pala_item == 'unit_ram') {
			$ram_damage *= 2;
			}
		$ram_damage *= $stosunki['att_as_deff'];
		$ram_damage = floor($ram_damage);
		
		$wall_hp = $mor_level * 22;
		
		if ($ram_damage > $wall_hp) {
			$nowy_mur_level = 0;
			} else {
			$nowy_mur_level = round(($wall_hp - $ram_damage) / 22);
			}
		}
		
	unset($wall_hp);
	unset($ram_damage);
	unset($tarany);
		
	$katapulty = $wojsko_napastnika['unit_catapult'];
	$nowy_ktpc_level = $cel_katapolt_level;
	if ($katapulty > 0) {
		$catapult_damage = $katapulty;
		if ($att_pala_item == 'unit_catapult') {
			$catapult_damage *= 2;
			}
		$catapult_damage *= $stosunki['att_as_deff'];
		$catapult_damage = floor($catapult_damage);
		
		$ktpc_hp = $cel_katapolt_level * 22;
		
		if ($catapult_damage > $ktpc_hp) {
			$nowy_ktpc_level = 0;
			} else {
			$nowy_ktpc_level = round(($ktpc_hp - $catapult_damage) / 22);
			}
		}
		
	unset($ktpc_hp);
	unset($catapult_damage);
	unset($katapulty);
	
	unset($stosunki);
	
	if ($sila_ataku < 1) {
		$sila_ataku = 1;
		}
	if ($sila_obrony_piechota < 1) {
		$sila_obrony_piechota = 1;
		}
	
	$sila_obrony_piechota /= $arr_wall_bonus[$mor_level] + 1;
	$sila_obrony_piechota -= $arr_basic_defense[$mor_level];
	
	$_diff_wall = round(($mor_level - $nowy_mur_level) / 2) + $nowy_mur_level;
	
	$sila_obrony_piechota *= $arr_wall_bonus[$_diff_wall] + 1;
	$sila_obrony_piechota += $arr_basic_defense[$_diff_wall];

	unset($_diff_wall);
	
	$sila_obrony_piechota = pow($sila_obrony_piechota,"1.5");
	
	$sila_ataku = pow($sila_ataku,"1.5");
	
	if ($sila_ataku < 1) {
		$sila_ataku = 1;
		}
	if ($sila_obrony_piechota < 1) {
		$sila_obrony_piechota = 1;
		}

	$stosunki['att_as_deff_foot'] = $sila_ataku / $sila_obrony_piechota;
	$stosunki['deff_foot_as_att'] = $sila_obrony_piechota / $sila_ataku;
	
	if ($stosunki['att_as_deff_foot'] > 1) {
		$wygral = "napastnik";
		$stosunek_straty['piechota'] = $stosunki['deff_foot_as_att'];
		if ($stosunek_straty['piechota'] > 1) {
			$stosunek_straty['piechota'] = 1;
			}
		} else {
		$wygral = "obronca";
		$stosunek_straty['wszystko'] = $stosunki['att_as_deff_foot'];
		}
		
	$szpiegowanie = false;
	
	foreach ($cl_units->get_array("dbname") as $jname) {
		if ($wygral == "napastnik") {
			if ($jname == 'unit_spy') {
				$szpieg_pow_ilosc_att = pow($wojsko_napastnika[$jname] * 2,'1.5');
				$szpieg_pow_ilosc_def = pow($wojsko_obroncy[$jname],'1.5');
				if ($szpieg_pow_ilosc_att > $szpieg_pow_ilosc_def) {
					$szpiegowanie = true;
					$napastnik_straty[$jname] = round($wojsko_napastnika[$jname] * ($szpieg_pow_ilosc_def / $szpieg_pow_ilosc_att));
					} else {
					$szpiegowanie = false;
					$napastnik_straty[$jname] = $wojsko_napastnika[$jname];
					}
				$obronca_straty[$jname] = $wojsko_obroncy[$jname];
				$nap_os_straty += $cl_units->get_bhprice($jname) * $napastnik_straty[$jname];
				$obr_os_straty += $cl_units->get_bhprice($jname) * $obronca_straty[$jname];
				$maks_lup += $cl_units->get_booty($jname) * ($wojsko_napastnika[$jname] - $napastnik_straty[$jname]);
				} else {
				$napastnik_straty[$jname] = round($wojsko_napastnika[$jname] * $stosunek_straty['piechota']);
				$obronca_straty[$jname] = $wojsko_obroncy[$jname];
				$nap_os_straty += $cl_units->get_bhprice($jname) * $napastnik_straty[$jname];
				$obr_os_straty += $cl_units->get_bhprice($jname) * $obronca_straty[$jname];
				$maks_lup += $cl_units->get_booty($jname) * ($wojsko_napastnika[$jname] - $napastnik_straty[$jname]);
				}
			}
		if ($wygral == "obronca") {
			if ($jname == 'unit_spy') {
				$szpieg_pow_ilosc_att = pow($wojsko_napastnika[$jname] * 2,'1.5');
				$szpieg_pow_ilosc_def = pow($wojsko_obroncy[$jname],'1.5');
				if ($szpieg_pow_ilosc_att > $szpieg_pow_ilosc_def) {
					$szpiegowanie = true;
					$napastnik_straty[$jname] = round($wojsko_napastnika[$jname] * ($szpieg_pow_ilosc_def / $szpieg_pow_ilosc_att));
					} else {
					$szpiegowanie = false;
					$napastnik_straty[$jname] = $wojsko_napastnika[$jname];
					}
				$obronca_straty[$jname] = round($wojsko_obroncy[$jname] * $stosunek_straty['wszystko']);
				$nap_os_straty += $cl_units->get_bhprice($jname) * $napastnik_straty[$jname];
				$obr_os_straty += $cl_units->get_bhprice($jname) * $obronca_straty[$jname];
				} else {
				$napastnik_straty[$jname] = $wojsko_napastnika[$jname];
				$obronca_straty[$jname] = round($wojsko_obroncy[$jname] * $stosunek_straty['wszystko']);
				$nap_os_straty += $cl_units->get_bhprice($jname) * $napastnik_straty[$jname];
				$obr_os_straty += $cl_units->get_bhprice($jname) * $obronca_straty[$jname];
				}
			}
		}
		
	if ($wygral === "napastnik") {
		$_szlachta_pozostala = $wojsko_napastnika['unit_snob'] - $napastnik_straty['unit_snob'];
		if ($_szlachta_pozostala > 0) {
			$pop_minus = true;
			} else {
			$pop_minus = false;
			}
		} else {
		$pop_minus = false;
		}
		
	if (($mor_level != $nowy_mur_level) || ($cel_katapolt_level != $nowy_ktpc_level)) {
		$czy_punkty_minus = true;
		$stracone_punkty += $cl_builds->get_points('wall',$mor_level) - $cl_builds->get_points('wall',$nowy_mur_level);
		$nowy_mur_levelmod = $nowy_mur_level + 1;
		for ($i = $nowy_mur_levelmod; $i <= $mor_level; $i++) {
			$stracone_os += $cl_builds->get_bh('wall',$i);
			}
		if ($cel_budynek_nazwa !== null) {
			$stracone_punkty += $cl_builds->get_points($cel_budynek_nazwa,$cel_katapolt_level) - $cl_builds->get_points($cel_budynek_nazwa,$nowy_ktpc_level);
			$nowy_ktpc_level_mod = $nowy_ktpc_level + 1;
			for ($i = $nowy_ktpc_level_mod; $i <= $cel_katapolt_level; $i++) {
				$stracone_os += $cl_builds->get_bh($cel_budynek_nazwa,$i);
				}
			}
		} else {
		$czy_punkty_minus = false;
		}

	if ($suma_j_att == $wojsko_napastnika['unit_spy']) {
		$tylko_szpiegowanie = true;
		} else {
		$tylko_szpiegowanie = false;
		}
		
	$output_array = array(
		'jednostki_att_straty' => $napastnik_straty,
		'jednsotki_def_straty' => $obronca_straty,
		'wygral' => $wygral,
		'mur_nowy_lvl' => $nowy_mur_level,
		'mur_stary_lvl' => $mor_level,
		'ktpc_nowy_lvl' => $nowy_ktpc_level,
		'ktpc_stary_lvl' => $cel_katapolt_level,
		'att_osadnicy_straty' => $nap_os_straty,
		'def_osadnicy_straty' => $obr_os_straty,
		'strata_punktow' => $stracone_punkty,
		'strata_osadnicy' => $stracone_os,
		'czy_punkty_minus' => $czy_punkty_minus,
		'zbicie_poparcia' => $pop_minus,
		'szpiegowanie' => $szpiegowanie,
		'tylko_szpiegowanie' => $tylko_szpiegowanie,
		'maks_lup' => $maks_lup,
		'stosunek_deff' => $stosunek_straty['wszystko']
		);
		
	return $output_array;
	}
	
	
function sim_battle_wrong($wojsko_obroncy,$wojsko_napastnika,$mor_level,$cel_katapolt_level,$szeczescie,$morale,$noc,$cel_budynek_nazwa = null,$att_pala_item = 0,$def_pala_item = 0) {
	global $cl_units,$config,$arr_wall_bonus,$arr_basic_defense,$cl_builds,$pala_bonus;
	
	if ($config['moral_activ'] === true) {
		$morale = floor($morale) / 100;
		} else {
		$morale = 1;
		}
		
	$szeczescie /= 100;
	$szeczescie++;
	$suma_j_att = 0;
	
	foreach ($cl_units->get_array("dbname") as $jname) {
		if ($def_pala_item == $jname) {
			$def_modifer = $pala_bonus[$jname][1];
			} else {
			$def_modifer = 1;
			}
			
		$sila_obrony_piechota += $wojsko_obroncy[$jname] * $cl_units->get_def($jname,1) * $def_modifer;
		$sila_obrony_kon += $wojsko_obroncy[$jname] * $cl_units->get_defcav($jname,1) * $def_modifer;
		$sila_obrony_luk += $wojsko_obroncy[$jname] * $cl_units->get_defarcher($jname,1) * $def_modifer;
		
		if ($att_pala_item == $jname) {
			$aktuunit_att = $cl_units->get_att($jname,1) * $pala_bonus[$jname][0];
			} else {
			$aktuunit_att = $cl_units->get_att($jname,1);
			}
		
		$sila_ataku += $wojsko_napastnika[$jname] * $aktuunit_att;
		$suma_j_att += $wojsko_napastnika[$jname];
		}
		
	if ($sila_obrony_piechota == 0) {
		$sila_obrony_piechota = 1;
		}
		
	$sila_ataku *= $szeczescie;
	$sila_ataku *= $morale;
	
	if ($noc) {
		$sila_obrony_piechota *= 2;
		$sila_obrony_kon *= 2;
		$sila_obrony_luk *= 2;
		}
		
	$sila_obrony_piechota += $config['reason_defense'];
	$sila_obrony_piechota += $arr_basic_defense[$mor_level];
	$sila_obrony_piechota *= $arr_wall_bonus[$mor_level] + 1;
	$sila_obrony_kon += $config['reason_defense'];
	$sila_obrony_kon += $arr_basic_defense[$mor_level];
	$sila_obrony_kon *= $arr_wall_bonus[$mor_level] + 1;
	$sila_obrony_luk += $config['reason_defense'];
	$sila_obrony_luk += $arr_basic_defense[$mor_level];
	$sila_obrony_luk *= $arr_wall_bonus[$mor_level] + 1;
	
	if ($sila_ataku < 1) {
		$sila_ataku = 1;
		}
	if ($sila_obrony_piechota < 1) {
		$sila_obrony_piechota = 1;
		}
	if ($sila_obrony_kon < 1) {
		$sila_obrony_kon = 1;
		}
	if ($sila_obrony_luk < 1) {
		$sila_obrony_luk = 1;
		}
	
	$stosunki['att_as_deff'] = pow($sila_ataku,"1.5") / max(array(pow($sila_obrony_piechota,"1.5"), pow($sila_obrony_kon,"1.5"),pow($sila_obrony_luk,"1.5")));
	
	if ($stosunki['att_as_deff'] > 1) {
		$stosunki['att_as_deff'] = 1;
		}
		
	$tarany = $wojsko_napastnika['unit_ram'];
	$nowy_mur_level = $mor_level;
	if ($tarany > 0) {
		$ram_damage = $tarany;
		if ($att_pala_item == 'unit_ram') {
			$ram_damage *= 2;
			}
		$ram_damage *= $stosunki['att_as_deff'];
		$ram_damage = floor($ram_damage);
		
		$wall_hp = $mor_level * 22;
		
		if ($ram_damage > $wall_hp) {
			$nowy_mur_level = 0;
			} else {
			$nowy_mur_level = round(($wall_hp - $ram_damage) / 22);
			}
		}
		
	unset($wall_hp);
	unset($ram_damage);
	unset($tarany);
		
	$katapulty = $wojsko_napastnika['unit_catapult'];
	$nowy_ktpc_level = $cel_katapolt_level;
	if ($katapulty > 0) {
		$catapult_damage = $katapulty;
		if ($att_pala_item == 'unit_catapult') {
			$catapult_damage *= 2;
			}
		$catapult_damage *= $stosunki['att_as_deff'];
		$catapult_damage = floor($catapult_damage);
		
		$ktpc_hp = $cel_katapolt_level * 22;
		
		if ($catapult_damage > $ktpc_hp) {
			$nowy_ktpc_level = 0;
			} else {
			$nowy_ktpc_level = round(($ktpc_hp - $catapult_damage) / 22);
			}
		}
		
	unset($ktpc_hp);
	unset($catapult_damage);
	unset($katapulty);
	
	unset($stosunki);
	
	if ($sila_ataku < 1) {
		$sila_ataku = 1;
		}
	if ($sila_obrony_piechota < 1) {
		$sila_obrony_piechota = 1;
		}
	if ($sila_obrony_kon < 1) {
		$sila_obrony_kon = 1;
		}
	if ($sila_obrony_luk < 1) {
		$sila_obrony_luk = 1;
		}
	
	$sila_obrony_piechota /= $arr_wall_bonus[$mor_level] + 1;
	$sila_obrony_piechota -= $arr_basic_defense[$mor_level];
	$sila_obrony_kon /= $arr_wall_bonus[$mor_level] + 1;
	$sila_obrony_kon -= $arr_basic_defense[$mor_level];
	$sila_obrony_luk /= $arr_wall_bonus[$mor_level] + 1;
	$sila_obrony_luk -= $arr_basic_defense[$mor_level];
	
	$_diff_wall = round(($mor_level - $nowy_mur_level) / 2) + $nowy_mur_level;
	
	$sila_obrony_piechota *= $arr_wall_bonus[$_diff_wall] + 1;
	$sila_obrony_piechota += $arr_basic_defense[$_diff_wall];
	$sila_obrony_kon *= $arr_wall_bonus[$_diff_wall] + 1;
	$sila_obrony_kon += $arr_basic_defense[$_diff_wall];
	$sila_obrony_luk *= $arr_wall_bonus[$_diff_wall] + 1;
	$sila_obrony_luk += $arr_basic_defense[$_diff_wall];
	
	unset($_diff_wall);
	
	$sila_obrony_piechota = pow($sila_obrony_piechota,"1.5");
	$sila_obrony_kon = pow($sila_obrony_kon,"1.5");
	$sila_obrony_luk = pow($sila_obrony_luk,"1.5");
	
	$sila_ataku = pow($sila_ataku,"1.5");
	
	if ($sila_ataku < 1) {
		$sila_ataku = 1;
		}
	if ($sila_obrony_piechota < 1) {
		$sila_obrony_piechota = 1;
		}
	if ($sila_obrony_kon < 1) {
		$sila_obrony_kon = 1;
		}
	if ($sila_obrony_luk < 1) {
		$sila_obrony_luk = 1;
		}
	
	$stosunki['att_as_deff_foot'] = $sila_ataku / $sila_obrony_piechota;
	$stosunki['deff_foot_as_att'] = $sila_obrony_piechota / $sila_ataku;
	$stosunki['att_as_deff_cav'] = $sila_ataku / $sila_obrony_kon;
	$stosunki['deff_cav_as_att'] = $sila_obrony_kon / $sila_ataku;
	$stosunki['att_as_deff_archer'] = $sila_ataku / $sila_obrony_luk;
	$stosunki['deff_archer_as_att'] = $sila_obrony_luk / $sila_ataku;
	
	if ($stosunki['att_as_deff_foot'] > 1 || $stosunki['att_as_deff_cav'] > 1 || $stosunki['att_as_deff_archer'] > 1) {
		$wygral = "napastnik";
		$stosunek_straty['piechota'] = $stosunki['deff_foot_as_att'];
		$stosunek_straty['konie'] = $stosunki['deff_cav_as_att'];
		$stosunek_straty['luczniki'] = $stosunki['deff_archer_as_att'];
		if ($stosunek_straty['piechota'] > 1) {
			$stosunek_straty['piechota'] = 1;
			}
		if ($stosunek_straty['konie'] > 1) {
			$stosunek_straty['konie'] = 1;
			}
		if ($stosunek_straty['luczniki'] > 1) {
			$stosunek_straty['luczniki'] = 1;
			}
		} else {
		$wygral = "obronca";
		$stosunek_straty['wszystko'] = max(array($stosunki['att_as_deff_foot'],$stosunki['att_as_deff_cav'],$stosunki['att_as_deff_archer']));
		}
		
	$szpiegowanie = false;
	
	foreach ($cl_units->get_array("dbname") as $jname) {
		if ($wygral == "napastnik") {
			if ($jname == 'unit_spy') {
				$szpieg_pow_ilosc_att = pow($wojsko_napastnika[$jname] * 2,'1.5');
				$szpieg_pow_ilosc_def = pow($wojsko_obroncy[$jname],'1.5');
				if ($szpieg_pow_ilosc_att > $szpieg_pow_ilosc_def) {
					$szpiegowanie = true;
					$napastnik_straty[$jname] = round($wojsko_napastnika[$jname] * ($szpieg_pow_ilosc_def / $szpieg_pow_ilosc_att));
					} else {
					$szpiegowanie = false;
					$napastnik_straty[$jname] = $wojsko_napastnika[$jname];
					}
				$obronca_straty[$jname] = $wojsko_obroncy[$jname];
				$nap_os_straty += $cl_units->get_bhprice($jname) * $napastnik_straty[$jname];
				$obr_os_straty += $cl_units->get_bhprice($jname) * $obronca_straty[$jname];
				$maks_lup += $cl_units->get_booty($jname) * ($wojsko_napastnika[$jname] - $napastnik_straty[$jname]);
				} else {
				if ($cl_units->get_group($jname) == 'foot') {
					$napastnik_straty[$jname] = round($wojsko_napastnika[$jname] * $stosunek_straty['piechota']);
					}
				if ($cl_units->get_group($jname) == 'cav') {
					$napastnik_straty[$jname] = round($wojsko_napastnika[$jname] * $stosunek_straty['konie']);
					}
				if ($cl_units->get_group($jname) == 'archer') {
					$napastnik_straty[$jname] = round($wojsko_napastnika[$jname] * $stosunek_straty['luczniki']);
					}
				$obronca_straty[$jname] = $wojsko_obroncy[$jname];
				$nap_os_straty += $cl_units->get_bhprice($jname) * $napastnik_straty[$jname];
				$obr_os_straty += $cl_units->get_bhprice($jname) * $obronca_straty[$jname];
				$maks_lup += $cl_units->get_booty($jname) * ($wojsko_napastnika[$jname] - $napastnik_straty[$jname]);
				}
			}
		if ($wygral == "obronca") {
			if ($jname == 'unit_spy') {
				$szpieg_pow_ilosc_att = pow($wojsko_napastnika[$jname] * 2,'1.5');
				$szpieg_pow_ilosc_def = pow($wojsko_obroncy[$jname],'1.5');
				if ($szpieg_pow_ilosc_att > $szpieg_pow_ilosc_def) {
					$szpiegowanie = true;
					$napastnik_straty[$jname] = round($wojsko_napastnika[$jname] * ($szpieg_pow_ilosc_def / $szpieg_pow_ilosc_att));
					} else {
					$szpiegowanie = false;
					$napastnik_straty[$jname] = $wojsko_napastnika[$jname];
					}
				$obronca_straty[$jname] = round($wojsko_obroncy[$jname] * $stosunek_straty['wszystko']);
				$nap_os_straty += $cl_units->get_bhprice($jname) * $napastnik_straty[$jname];
				$obr_os_straty += $cl_units->get_bhprice($jname) * $obronca_straty[$jname];
				} else {
				$napastnik_straty[$jname] = $wojsko_napastnika[$jname];
				$obronca_straty[$jname] = round($wojsko_obroncy[$jname] * $stosunek_straty['wszystko']);
				$nap_os_straty += $cl_units->get_bhprice($jname) * $napastnik_straty[$jname];
				$obr_os_straty += $cl_units->get_bhprice($jname) * $obronca_straty[$jname];
				}
			}
		}
		
	if ($wygral === "napastnik") {
		$_szlachta_pozostala = $wojsko_napastnika['unit_snob'] - $napastnik_straty['unit_snob'];
		if ($_szlachta_pozostala > 0) {
			$pop_minus = true;
			} else {
			$pop_minus = false;
			}
		} else {
		$pop_minus = false;
		}
		
	if (($mor_level != $nowy_mur_level) || ($cel_katapolt_level != $nowy_ktpc_level)) {
		$czy_punkty_minus = true;
		$stracone_punkty += $cl_builds->get_points('wall',$mor_level) - $cl_builds->get_points('wall',$nowy_mur_level);
		if ($cel_budynek_nazwa !== null) {
			$stracone_punkty += $cl_builds->get_points($cel_budynek_nazwa,$cel_katapolt_level) - $cl_builds->get_points($cel_budynek_nazwa,$nowy_ktpc_level);
			}
		} else {
		$czy_punkty_minus = false;
		}
		
	if ($suma_j_att == $wojsko_napastnika['unit_spy']) {
		$tylko_szpiegowanie = true;
		} else {
		$tylko_szpiegowanie = false;
		}
		
	$output_array = array(
		'jednostki_att_straty' => $napastnik_straty,
		'jednsotki_def_straty' => $obronca_straty,
		'wygral' => $wygral,
		'mur_nowy_lvl' => $nowy_mur_level,
		'mur_stary_lvl' => $mor_level,
		'ktpc_nowy_lvl' => $nowy_ktpc_level,
		'ktpc_stary_lvl' => $cel_katapolt_level,
		'att_osadnicy_straty' => $nap_os_straty,
		'def_osadnicy_straty' => $obr_os_straty,
		'strata_punktow' => $stracone_punkty,
		'czy_punkty_minus' => $czy_punkty_minus,
		'zbicie_poparcia' => $pop_minus,
		'szpiegowanie' => $szpiegowanie,
		'tylko_szpiegowanie' => $tylko_szpiegowanie,
		'maks_lup' => $maks_lup,
		'stosunek_deff' => $stosunek_straty['wszystko']
		);
		
	return $output_array;
	}
?>