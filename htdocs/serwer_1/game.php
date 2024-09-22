<?php
/*****************************************/
/*=======================================*/
/*     PLIK: game.php   				 */
/*     DATA: 17.12.2011r        		 */
/*     ROLA: Mo¿liwoœæ odpalenia gry	 */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

require ('include.inc.php');

require ('lib/pl.php');

$sid = new sid();
$tpl = new smarty();
$awards = new awards();

if ($sicherABCdkd8338dJK == 'skjdjhsdudJJJSHdndnjJJSHJKSAHDKJASHDjhz984z45tdshfpsd') {
	if ($DWSWxABRcFGKnrkrvhgIWKimsfhQBAEZVrRTD == 'FSrBaQAIzLsYrdAUEMrhUefQjAxQqOPCI' &&
		$ejzrpJHCoQCHTDzDjoReBpmMHuDQmXyM == 'GLuGYJhHTjcYjQZoMiAgUthZbSihvDrsB' &&
		$afhRcSSvCkOfJckpCsYKaQhrdFFxMZkhAzU == 'ioaosetXVzjnxGDZNLQchbzkCbljTpygs' &&
		$OYTtShpnZUfRKQMMHKsAylLibPKAEigpZ == 'uJczAAJPAMYURnzNuSYyJoFuwUsYlRLyjEh' &&
		$pQIQxhJmlHDkcKUuELOQPUQtVBQLStvaB == 'hMzdGaucjWJZFckNKoXhQduaJIdaBEA' &&
		$UAQixDGrDpKFAjqSIJWQfvgRSUPJHPZiD == 'GyhkrYKMvDDEbjvJbrzKEGVVyPURdQ' &&
		$lsLrRczVefePQWsEYpvrKEMpKmDMVihBZEv == 'FlUiZRjJqGjPReTGNTgASaEuXOsJPGMgz' &&
		$nKvvmHnMHTkCRgdBqzmavDhFjmrHoAcRde == 'egKXfdPPVnCeyNbIUPXYcHNZdtgtDaUwHag' &&
		$ofaZsvdVoIzygdckmSXKbSAsBsAfZNZ == 'pcuuhGCjHpNbRkZrdhXLhGdDGYofQCQTW' &&
		$dqKusarYFDnqPuEmjngxFbzDSyrkMwZdT == 'bQztplgLtRtvHtPyYGwzNzOnLolnkthASNzctz' &&
		$SvvJfdGbZPGRszawBjiEfHmKjXdERerZSSEghuGYGYI == 'IJaSmmmKKK333333333333333333333333333333333DXXEXEZZW') {
		} else {
		die ('Brak dostêpu do bazy danych');
		}
		
	if ($config['rozwoj_barbar_wiosek']) {
		$config['rozwoj_barabar_punkty'] = (int)$config['rozwoj_barabar_punkty'];
		if ($config['rozwoj_barabar_punkty'] < 0) {
			$config['rozwoj_barabar_punkty'] = 0;
			}
			
		if ($config['rozwoj_barabar_punkty'] > 9999999) {
			$config['rozwoj_barabar_punkty'] = 9999999;
			}
			
		$config['rozwoj_barabar_punkty'] = floor($config['rozwoj_barabar_punkty']);
			
		$czas_ostatni = date("U") - 21600;
		
		$config['bot_barbar_rad'] = (int)$config['bot_barbar_rad'];
		if ($config['bot_barbar_rad'] < 1) {
			$config['bot_barbar_rad'] = 1;
			}
			
		if ($config['bot_barbar_rad'] > 100) {
			$config['bot_barbar_rad'] = 100;
			}
			
		$config['bot_barbar_rad'] = floor($config['bot_barbar_rad']);
			
		$_bot_V_builds = $cl_builds->get_array("dbname");
		
		function czy_spelniono_wymagania($wymagania,$budynki) {
			$a = 0;
			foreach ($wymagania as $budynek => $poziom) {
				if ($poziom >= $budynki[$budynek]) {
					$a += 1;
					}
				}
				
			if ($a == count($wymagania)) {
				$return = true;
				} else {
				$return = false;
				}
				
			return $return;
			}
		
		$losb = array(0,0,0,0,1,1,1,2,2,2,3,3,4,5,5,5,8,8,8,9,9,9,9,10,10,10,10,10,11,11,11,11,12,12,12,12,13,13,13,13,14,14,15,15);
		for ($i = 1; $i <= $config['bot_barbar_rad']; $i++) {
			$random_village = sql("SELECT `id` FROM `villages` WHERE `points` < '".$config['rozwoj_barabar_punkty']."' AND `userid` = '-1' AND '$czas_ostatni' > `last_barbar_build` LIMIT 1",'array');
			echo $random_village;
			if (!empty($random_village)) {
				$random_village = (int)$random_village;
				$rand_build = $_bot_V_builds[$losb[rand(0,43)]];
				for ($u = 1; $u <= 1; $u ++) {
					$bot_losbud_level = sql("SELECT $rand_build FROM `villages` WHERE `id` = '$random_village'",'array');
					$max_stage = $cl_builds->get_maxstage($rand_build);
					$needs = $cl_builds->get_needed($rand_build);
					if (count($needs) > 0) {
						$needsq = implode(',',$needs);
						$need_builds = sql("SELECT $needsq FROM `villages` WHERE `id` = '$random_village'",'assoc');
						$czy_spelniono_wymagania = czy_spelniono_wymagania($needs,$need_builds);
						} else {
						$czy_spelniono_wymagania = true;
						}
						
					if ($max_stage > $bot_losbud_level && $czy_spelniono_wymagania) {
						$new_level = $bot_losbud_level + 1;
						$plus_points = $cl_builds->get_points($rand_build,$new_level) - $cl_builds->get_points($rand_build,$new_level - 1);
						$plus_bh = $cl_builds->get_bh($rand_build,$new_level);
						mysql_query("UPDATE `villages` SET `$rand_build` = '$new_level',`points` = `points` + '$plus_points',`r_bh` = `r_bh` + '$plus_bh' WHERE `id` = '$random_village'");
						} else {
						if ($u < 200) {
							$u += 1;
							}
						}
					}
				mysql_query("UPDATE `villages` SET `last_barbar_build` = '".date("U")."' WHERE `id` = '$random_village'");
				}
			}
		}
		
	$user_sid = $sid->check_sid($_COOKIE['session']);
	if (is_array($user_sid)) {
		$awards->reload_user_awards($user_sid['userid']);
		
		$user = sql("SELECT id,username,villages,points,ally,ally_titel,ally_found,ally_lead,ally_invite,ally_diplomacy,ally_mass_mail,rang,attacks,new_report,new_mail,market_sell,market_buy,market_ratio_max,do_action,last_activity,birthday,personal_text,window_width,show_toolbar,dyn_menu,confirm_queue,map_size,memo,aktu_vpage,o_labels,o_style,o_anims,monety,paladins,pala_name,pala_train,pala_items,pala_vill,pala_to_next_item,pala_aktu_item,rezerwacje_nstr,killed_units_att_rank,killed_units_def_rank,killed_units_altogether_rank,award_rang FROM `users` WHERE `id` = '".$user_sid['userid']."'","assoc");

		if ($user['attacks'] < 0) {
			mysql_query("UPDATE `users` SET `attacks` = '0' WHERE `id` = '".$user['id']."'");
			}
	
		mysql_query("UPDATE `users` SET `last_activity` = '".date("U")."' WHERE `id` = '".$user['id']."'");
	
		if ($user['villages'] < 1) {
			header('LOCATION: create_village.php');
			exit;
			}
		
		if (!isset($_GET['village'])) {
			$_GET['village'] = getfirstvillage($user['id']);
			}
		
		$_GET['village'] = (int)$_GET['village'];
	
		$vcounts = sql("SELECT COUNT(id) FROM `villages` WHERE `id` = '".$_GET['village']."'",'array');
		if ($vcounts < 1) {
			$first_village = getfirstvillage($user['id']);
			header('LOCATION: game.php?village='.$first_village);
			exit;
			}
	
		reload_vdata($_GET['village'],date('U'));
	
		$village = sql("SELECT * FROM `villages` WHERE `id` = '".$_GET['village']."'",'assoc');
		
		if ($village['attacks'] < 0) {
			mysql_query("UPDATE `villages` SET `attacks` = '0' WHERE `id` = '".$_GET['village']."'");
			}
	
		if ($village['userid'] != $user['id']) {
			$first_village = getfirstvillage($user['id']);
			header('LOCATION: game.php?village='.$first_village);
			exit;
			}
		
		if (!isset($_GET['screen'])) {
			$_GET['screen'] = 'overview';
			}
	
		$d = new do_action($user['id'],$user_sid['hkey']);
		$session = $user_sid;
	
		//Kod pozwalaj¹cy na otworzenie akcji, proszê go nie usuwaæ, ani nie zmieniaæ!
		$ACTIONS_MASSIVKEY_HIGHAAASSDD = 'sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL';
	
		if ($user_sid['is_vacation']) {
			$user['vacation_accept'] = true;
			} else {
			if ($_GET['action'] == 'logout') {
				require ('actions/logout.php');
				}
			}
	
		$village['r_wood'] = floor($village['r_wood']);
		$village['r_stone'] = floor($village['r_stone']);
		$village['r_iron'] = floor($village['r_iron']);
	
		$r_wood_comma = $arr_production[$village['wood']] * $config['speed'];
		$r_stone_comma = $arr_production[$village['stone']] * $config['speed'];
		$r_iron_comma = $arr_production[$village['iron']] * $config['speed'];
		$maxfarm = $arr_farm[$village['farm']];
		$maxmag = $arr_maxstorage[$village['storage']];
		
		//Interpretacja bonusów w danej wiosce:
		
		$arr_dealers_normal = $arr_dealers;
		
		if ($village['bonus'] == 1) {
			$maxmag *= $bonus->bonusy[$village['bonus']]['modifer'] + 1;
			$arr_dealers = pow_array($arr_dealers,($bonus->bonusy[$village['bonus']]['modifer'] + 1));
			}
			
		if ($village['bonus'] == 2) {
			$r_wood_comma *= $bonus->bonusy[$village['bonus']]['modifer'] + 1;
			$r_stone_comma *= $bonus->bonusy[$village['bonus']]['modifer'] + 1;
			$r_iron_comma *= $bonus->bonusy[$village['bonus']]['modifer'] + 1;
			}
			
		if ($village['bonus'] == 3) {
			$r_wood_comma *= $bonus->bonusy[$village['bonus']]['modifer'] + 1;
			}
			
		if ($village['bonus'] == 4) {
			$r_stone_comma *= $bonus->bonusy[$village['bonus']]['modifer'] + 1;
			}
			
		if ($village['bonus'] == 5) {
			$r_iron_comma *= $bonus->bonusy[$village['bonus']]['modifer'] + 1;
			}
			
		if ($village['bonus'] == 9) {
			$maxfarm *= $bonus->bonusy[$village['bonus']]['modifer'] + 1;
			}
			
		$r_wood_comma = floor($r_wood_comma);
		$r_stone_comma = floor($r_stone_comma);
		$r_iron_comma = floor($r_iron_comma);
		$maxfarm = floor($maxfarm);
		$maxmag = floor($maxmag);
	
		$userdatas = new getuserdata();
		$villagedatas = new getvillagedata();
	
		//Prze³¹czanie siê pomiêdzy w³asnymi wioskami:
		$wioska_arr_pasek['wstecz'] = sql("SELECT id FROM `villages` WHERE `userid` = '".$user['id']."' AND ((`name` = '".$village['name']."' AND `id` < '".$village['name']."') OR (`name` < '".$village['name']."')) AND `id` != '".$village['id']."' ORDER BY name DESC,id DESC LIMIT 1",'array');
			
		if (!empty($wioska_arr_pasek['wstecz'])) {
			$wioska_arr_pasek['wstecz_link']  = 'game.php?village='.$wioska_arr_pasek['wstecz'].'&screen='.$_GET['screen'];
			if(isset($_GET['mode'])) {
				$wioska_arr_pasek['wstecz_link'] .= '&mode='.$_GET['mode'];
				}
			if(isset($_GET['id'])) {
				$wioska_arr_pasek['wstecz_link'] .= '&id='.$_GET['id'];
				}
			if(isset($_GET['target'])) {
				$wioska_arr_pasek['wstecz_link'] .= '&target='.$_GET['target'];
				}
			}
				
		$wioska_arr_pasek['next'] = sql("SELECT id FROM `villages` WHERE `userid` = '".$user['id']."' AND ((`name` = '".$village['name']."' AND `id` > '".$village['id']."') OR (`name` > '".$village['name']."')) AND `id` != '".$village['id']."' ORDER BY name,id LIMIT 1",'array');
			
		if (!empty($wioska_arr_pasek['next'])) {
			$wioska_arr_pasek['next_link']  = 'game.php?village='.$wioska_arr_pasek['next'].'&screen='.$_GET['screen'];
			if(isset($_GET['mode'])) {
				$wioska_arr_pasek['next_link'] .= '&mode='.$_GET['mode'];
				}
			if(isset($_GET['id'])) {
				$wioska_arr_pasek['next_link'] .= '&id='.$_GET['id'];
				}
			if(isset($_GET['target'])) {
				$wioska_arr_pasek['next_link'] .= '&target='.$_GET['target'];
				}
			}
		
		$village['name'] = entparse($village['name']);
	
		//Tablica screenów:
		$screens = array('map','snob','overview','main','overview_villages','settings',
			'barracks','wood','stone','iron','farm','storage','hide', 
			'wall','smith','place','info_village','report','info_command', 
			'ranking','market','mail','ally', 'info_player','info_ally','info_member',
			'memo','stable','garage','masowa_rekrutacja','statue',
			'edytuj_kolory_graczy'
			);
		
		$allow_screens = array('map','snob','overview','main','overview_villages','settings',
			'barracks','wood','stone','iron','farm','storage','hide','statue',
			'wall','smith','place','info_village','report','info_command', 
			'ranking','market','mail','ally', 'info_player','info_ally','info_member',
			'memo','stable','garage','place_confirm','place_units_try_back','masowa_rekrutacja',
			'edytuj_kolory_graczy','market_confirm_send'
			);
		
		//Sekcja stron:
		$_STRONY = floor($user['villages'] / 30);
		$start_licznik_limit = $user['aktu_vpage'] * 30;
			
		if ($_STRONY > 0) {
			$SEKCJA_OSADY_LINK = 'game.php?village='.$_GET['village'].'&screen='.$_GET['screen'];
			if (isset($_GET['mode'])) {
				$SEKCJA_OSADY_LINK .= '&mode='.$_GET['mode'];
				}
			if (isset($_GET['type'])) {
				$SEKCJA_OSADY_LINK .= '&type='.$_GET['type'];
				}
			if (isset($_GET['target'])) {
				$SEKCJA_OSADY_LINK .= '&target='.$_GET['target'];
				}
			if (isset($_GET['x'])) {
				$SEKCJA_OSADY_LINK .= '&x='.$_GET['x'];
				}
			if (isset($_GET['y'])) {
				$SEKCJA_OSADY_LINK .= '&y='.$_GET['y'];
				}
			if (isset($_GET['id'])) {
				$SEKCJA_OSADY_LINK .= '&id='.$_GET['id'];
				}
					
			if ($_GET['action'] == 'zmien_aktulna_strone') {
				$_GET['strona'] = (int)$_GET['strona'];
				if ($_GET['strona'] < 0) {
					$_GET['strona'] = 0;
					}
				if ($_GET['strona'] > $_STRONY) {
					$_GET['strona'] = $_STRONY;
					}
			
				mysql_query("UPDATE `users` SET `aktu_vpage` = '".$_GET['strona']."' WHERE `id` = '".$user['id']."'");
				header("location: $SEKCJA_OSADY_LINK");
				exit;
				}
				
			for ($i = 0; $i <= $_STRONY; $i ++) {
				$SEKCJA_STR = $i + 1;
				if ($i == $user['aktu_vpage']) {
					$_SEKCJA_OSADY .= '<b>'.$SEKCJA_STR.'</b>  ';
					} else {
					$_SEKCJA_OSADY .= '<a href="'.$SEKCJA_OSADY_LINK.'&action=zmien_aktulna_strone&strona='.$i.'">'.$SEKCJA_STR.'<a>  ';
					}
				}
			$_SEKCJA = true;
			} else {
			$_SEKCJA = false;
			}
		
		$link_vgs_start = 'game.php?village=';
		$link_vgs_end = '&screen='.$_GET['screen'];
		if (isset($_GET['mode'])) {
			$link_vgs_end .= '&mode='.$_GET['mode'];
			}
		if (isset($_GET['type'])) {
			$link_vgs_end .= '&type='.$_GET['type'];
			}
		if (isset($_GET['target'])) {
			$link_vgs_end .= '&target='.$_GET['target'];
			}
		if (isset($_GET['x'])) {
			$link_vgs_end .= '&x='.$_GET['x'];
		}
		if (isset($_GET['y'])) {
			$link_vgs_end .= '&y='.$_GET['y'];
			}
		if (isset($_GET['id'])) {
			$link_vgs_end .= '&id='.$_GET['id'];
			}
	
		$wioski_usera = array();
		$wioski_gracza = mysql_query("SELECT id,x,y,continent,name FROM `villages` WHERE `userid` = '".$user['id']."' ORDER by name LIMIT $start_licznik_limit , 30");
		while ($wioska = mysql_fetch_assoc($wioski_gracza)) {
			$wioska['name'] = entparse($wioska['name']);
			$wioski_usera[$wioska['id']]['link'] = '<a href="'.$link_vgs_start.$wioska['id'].$link_vgs_end.'">'.$wioska['name'].' ('.$wioska['x'].'|'.$wioska['y'].') K'.$wioska['continent'].'</a>';
			$wioski_usera[$wioska['id']]['id'] = $wioska['id'];
			$wioski_usera[$wioska['id']]['x'] = $wioska['x'];
			$wioski_usera[$wioska['id']]['y'] = $wioska['y'];
			$wioski_usera[$wioska['id']]['continent'] = $wioska['continent'];
			$wioski_usera[$wioska['id']]['name'] = $wioska['name'];
			}
			
		$user['supports'] = sql("SELECT COUNT(id) FROM `movements` WHERE `send_to_user` = '".$user['id']."' AND `type` = 'support'",'array');
		
		if (in_array($_GET['screen'],$screens)) {
			require ('actions/'.$_GET['screen'].'.php');
			}
		
		$pl = new pl();
		
		$user['right_tbl_width'] = 25;
		
		if ($user['attacks'] > 0) {
			$user['right_tbl_width'] += 65;
			if ($user['attacks'] > 1000) {
				$user['right_tbl_width'] += 20;
				}
			}
		if ($user['supports'] > 0) {
			$user['right_tbl_width'] += 65;
			if ($user['supports'] > 1000) {
				$user['right_tbl_width'] += 20;
				}
			}
		
		
		$tpl->assign('hkey',$user_sid['hkey']);
		$tpl->assign('village',$village);
		$tpl->assign('user',$user);
		$tpl->assign('allow_screens',$allow_screens);
		$tpl->assign('screen',$_GET['screen']);
		$tpl->assign('wood_per_hour',$r_wood_comma);
		$tpl->assign('stone_per_hour',$r_stone_comma);
		$tpl->assign('iron_per_hour',$r_iron_comma);
		$tpl->assign('max_storage',$maxmag);
		$tpl->assign('max_bh',$maxfarm);
		$tpl->assign('village_array',$wioska_arr_pasek);
		$tpl->assign('mode',$_GET['mode']);
		$tpl->assign('load_msec',msec());
		$tpl->assign('servertime',set_server_time(date('U')));
		$tpl->assign('sekcja_wiosek',$_SEKCJA_OSADY);
		$tpl->assign('sekcja',$_SEKCJA);
		$tpl->assign('wioski_gracza',$wioski_usera);
		$tpl->assign('awards',$awards);
		$tpl->assign('pl',$pl);
		$tpl->assign('bonus',$bonus);
		$tpl->assign('ParseTime',$ParseTime);
		$tpl->assign('serwerid',$config['__SERVER__ID']);
		$tpl->assign('users_online',sql("SELECT COUNT(id) FROM `sessions`",'array'));
		$tpl->display('game.tpl');
		} else {
		header('LOCATION: sid_wrong.php');
		exit;
		}
	} else {
	die ('Nie mo¿na poprawnie za³adowaæ pliku include.inc.php');
	}

mysql_close();
?>