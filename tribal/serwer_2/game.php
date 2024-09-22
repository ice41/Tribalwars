<?php
/*****************************************/
/*=======================================*/
/*     PLIK: game.php   				 */
/*     DATA: 17.12.2011r        		 */
/*     ROLA: Mo¿liwoœæ odpalenia gry	 */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

/*MA£E ZABESPIECZENIE PLEMION PRZED HAKERAMI :)*/

class GLOBALS {
	var $defined_globals = array();
	
	function define_global($globalname) {
		if (is_array($globalname)) {
			foreach ($globalname as $globalne) {
				$this->defined_globals[$globalne] = TRUE;
				}
			} else {
			$this->defined_globals[$globalname] = TRUE;
			}
		}
		
	function unregister_undefined_globals() {		
		$HTTP_GETS = $_GET;
		
		foreach ($HTTP_GETS as $HTTP_KEY => $HTTP_VAL) {
			unset($GLOBALS[$HTTP_KEY]);
			}
		}
	}
	
/*ZDEFINIUJ ZMIENNE POCHODZ¥CE OD USERA, KTÓRE MOG¥ BYÆ AKCEPTOWANE*/
$DS_USER_GLOBALS = new GLOBALS;
$DS_USER_GLOBALS->define_global('village');
$DS_USER_GLOBALS->define_global('id');
$DS_USER_GLOBALS->define_global('x');
$DS_USER_GLOBALS->define_global('y');
$DS_USER_GLOBALS->define_global('screen');
$DS_USER_GLOBALS->define_global('mode');
$DS_USER_GLOBALS->define_global('type');
$DS_USER_GLOBALS->define_global('target');
$DS_USER_GLOBALS->define_global('action');
$DS_USER_GLOBALS->define_global('h');
$DS_USER_GLOBALS->define_global('strona');
$DS_USER_GLOBALS->define_global('page');
$DS_USER_GLOBALS->define_global('rlog');
$DS_USER_GLOBALS->define_global('sort');
$DS_USER_GLOBALS->define_global('order');
$DS_USER_GLOBALS->define_global('filter');
$DS_USER_GLOBALS->define_global('akcja');
$DS_USER_GLOBALS->define_global('group');
$DS_USER_GLOBALS->define_global('try');
$DS_USER_GLOBALS->define_global('view');
$DS_USER_GLOBALS->define_global('item_name');
$DS_USER_GLOBALS->define_global('unit');
$DS_USER_GLOBALS->unregister_undefined_globals();

require ('include.inc.php');

require ('lib/pl.php');

$sid = new sid();
$tpl = new smarty();
$awards = new awards();

if ($config['awards']) {
	$awards->reload_day_awards();
	}

if (file_exists("rangs_reloader/lastrel.txt")) {
	$nxt_rel = file_get_contents("rangs_reloader/lastrel.txt");
	if (date("U") > $nxt_rel) {
		reload_all_rangs();
		$f = fopen("rangs_reloader/lastrel.txt",'w');
		fputs($f,date("U") + 1800);
		fclose($f);
		}
	}

if ($sicher) {	
	if ($config['rozwoj_barbar_wiosek']) {
		$config['rozwoj_barabar_punkty'] = (int)$config['rozwoj_barabar_punkty'];
		if ($config['rozwoj_barabar_punkty'] < 0) {
			$config['rozwoj_barabar_punkty'] = 0;
			}
		
		$config['bot_barbar_rad'] = (int)$config['bot_barbar_rad'];
		if ($config['bot_barbar_rad'] < 1) {
			$config['bot_barbar_rad'] = 1;
			}
			
		if ($config['bot_barbar_rad'] > 500) {
			$config['bot_barbar_rad'] = 500;
			}
			
		//Utworzyæ tablicê losowych budynków:
		foreach ($cl_builds->get_array("dbname") as $bname) {
			$for_loop = ceil($cl_builds->get_maxstage($bname) / 10);
			for ($i = 1; $i <= $for_loop; $i++) {
				$builds_randoms[] = $bname;
				}
			}
			
		$count_random_builds = count($builds_randoms) - 1;
			
		for ($i = 1; $i <= $config['bot_barbar_rad']; $i++) {
			$rand_village = sql("SELECT `id` FROM `villages` WHERE `points` < '".$config['rozwoj_barabar_punkty']."' AND `userid` = '-1' ORDER BY RAND() LIMIT 1",'array');
			if (!empty($rand_village)) {
				$rand_village = (int)$rand_village;
				
				$vcounter = 1;
				for ($a = 1; $a <= $vcounter; $a++) {
					$RandBuild = $builds_randoms[rand(0,$count_random_builds)];
					$Vinfo = sql("SELECT $impl_builds from `villages` WHERE `id` = '$rand_village'","assoc");
					
					$Vbuild_full_lev = $Vinfo[$RandBuild] + sql("SELECT COUNT(id) FROM `build` WHERE `villageid` = '$rand_village' AND `building` = '$RandBuild'","array");
						
					if ($Vbuild_full_lev < $cl_builds->get_maxstage($RandBuild)) {
						if ($cl_builds->check_needed($RandBuild,$Vinfo)) {
							$bot_points = $cl_builds->get_points_stage($RandBuild,$Vbuild_full_lev + 1);
							$bot_bh = $cl_builds->get_bh($RandBuild,$Vbuild_full_lev + 1);
							mysql_query("UPDATE `villages` SET `$RandBuild` = `$RandBuild` + '1',`points` = `points` + '$bot_points',`r_bh` = `r_bh` + '$bot_bh' WHERE `id` = '$rand_village'");
							} else {
							if ($vcounter < 500) {
								$vcounter++;
								}
							}
						} else {
						if ($vcounter < 500) {
							$vcounter++;
							}
						}
					}
				}
			}
		}
		
	//Biblioteka ProBot:
	require ("ProBot/Bot.php");
	
	$user_sid = $sid->check_sid($_COOKIE['session']);
	if (is_array($user_sid)) {
		if ($config['awards']) {
			$awards->reload_user_awards($user_sid['userid']);
			}
		
		$user = sql("SELECT id,username,villages,points,ally,ally_titel,ally_found,ally_lead,ally_invite,ally_diplomacy,ally_mass_mail,rang,attacks,new_report,new_mail,do_action,last_activity,window_width,show_toolbar,dyn_menu,confirm_queue,map_size,aktu_vpage,o_labels,o_style,o_anims,monety,paladins,pala_name,pala_train,pala_items,pala_vill,pala_to_next_item,pala_aktu_item,rezerwacje_nstr,award_rang,groups,aktu_group,villages_per_page,image,classic_graphics,toolbar,tw_id,last_move,start_gaming,ally_mod_forum,ally_forum_switch,ally_forum_trust FROM `users` WHERE `id` = '".$user_sid['userid']."'","assoc");

		$session = $user_sid;
		
		if ($user['attacks'] < 0) {
			mysql_query("UPDATE `users` SET `attacks` = '0' WHERE `id` = '".$user['id']."'");
			}
	
		mysql_query("UPDATE `users` SET `last_activity` = '".date("U")."' WHERE `id` = '".$user['id']."'");
	
		if ($user['villages'] < 1) {
			header('LOCATION: create_village.php');
			exit;
			}
		
		if (!isset($_GET['village'])) {
			$_GET['village'] = get_first_village_group($user['id']);
			}
		
		$_GET['village'] = (int)$_GET['village'];
	
		$vcounts = sql("SELECT COUNT(id) FROM `villages` WHERE `id` = '".$_GET['village']."'",'array');
		if ($vcounts < 1) {
			$first_village = get_first_village_group($user['id']);
			header('LOCATION: game.php?village='.$first_village);
			exit;
			}
	
		reload_vdata($_GET['village'],date('U'));
	
		$village = sql("SELECT * FROM `villages` WHERE `id` = '".$_GET['village']."'",'assoc');
		
		if ($_GET['action'] == 'change_group' and isset($_GET['group'])) {
			require('actions/groups_bar.php');
			}
		
		if ($village['attacks'] < 0) {
			mysql_query("UPDATE `villages` SET `attacks` = '0' WHERE `id` = '".$_GET['village']."'");
			}
	
		if ($village['userid'] != $user['id']) {
			$first_village = get_first_village_group($user['id']);
			header('LOCATION: game.php?village='.$first_village);
			exit;
			}
		
		if (!isset($_GET['screen'])) {
			$_GET['screen'] = 'overview';
			}
	
		$d = new do_action($user['id'],$user_sid['hkey']);
	
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
		
		if ($village['bonus'] == 1) {
			$maxmag *= $bonus->bonusy[$village['bonus']]['modifer'] + 1;
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
		
		//Tworzenie zapytania do mysqla wiosek z grupami:
		if ($user['aktu_group'] === 'all') {
			$villages_query_extends = '';
			} else {
			$villages_query_extends = "AND `group` = '".$user['aktu_group']."'";
			}
	
		//Prze³¹czanie siê pomiêdzy w³asnymi wioskami:
		$wioska_arr_pasek['wstecz'] = sql("SELECT id FROM `villages` WHERE `userid` = '".$user['id']."' $villages_query_extends AND ((`name` = '".$village['name']."' AND `id` < '".$village['name']."') OR (`name` < '".$village['name']."')) AND `id` != '".$village['id']."' ORDER BY name DESC,id DESC LIMIT 1",'array');
			
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
				
		$wioska_arr_pasek['next'] = sql("SELECT id FROM `villages` WHERE `userid` = '".$user['id']."' $villages_query_extends AND ((`name` = '".$village['name']."' AND `id` > '".$village['id']."') OR (`name` > '".$village['name']."')) AND `id` != '".$village['id']."' ORDER BY name,id LIMIT 1",'array');
			
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
			'memo','stable','garage','train','statue',
			'edytuj_kolory_graczy','ulubione'
			);
		
		$allow_screens = array('map','snob','overview','main','overview_villages','settings',
			'barracks','wood','stone','iron','farm','storage','hide','statue',
			'wall','smith','place','info_village','report','info_command', 
			'ranking','market','mail','ally', 'info_player','info_ally','info_member',
			'memo','stable','garage','place_confirm','place_units_try_back','train',
			'edytuj_kolory_graczy','market_confirm_send','ulubione'
			);
			
		if ($user['aktu_group'] === 'all') {
			$u_group_villges = $user['villages'];
			} else {
			$u_group_villges = sql("SELECT COUNT(id) FROM `villages` WHERE `userid` = '".$user['id']."' AND `group` = '".$user['aktu_group']."'",'array');
			}
		
		//Sekcja stron:
		$_STRONY = floor($u_group_villges / $user['villages_per_page']);
		$start_licznik_limit = $user['aktu_vpage'] * $user['villages_per_page'];
			
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
				$_GET['strona'] = floor($_GET['strona']);
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
					$_SEKCJA_OSADY .= '<b>&gt;'.$SEKCJA_STR.'&lt;</b>  ';
					} else {
					$_SEKCJA_OSADY .= '<a href="'.$SEKCJA_OSADY_LINK.'&action=zmien_aktulna_strone&strona='.$i.'"/>['.$SEKCJA_STR.']</a>  ';
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
		$wioski_gracza = mysql_query("SELECT id,x,y,continent,name FROM `villages` WHERE `userid` = '".$user['id']."' $villages_query_extends ORDER by name LIMIT $start_licznik_limit , ".$user['villages_per_page']);
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
		$user['attacks'] = sql("SELECT COUNT(id) FROM `movements` WHERE `send_to_user` = '".$user['id']."' AND `type` = 'attack'",'array');
		
		$pl = new pl();
		
		if (!is_array($wioski_usera)) {
			$wioski_usera = array();
			}
			
		$toolbar_array = unserialize($user['toolbar']);
		if (!is_array($toolbar_array)) $toolbar_array = array();
		
		$i = 0;
		
		foreach ($toolbar_array as $key => $tool) {
			if ($i == 0) {
				$toolbar_array[$key]['first'] = true;
				} else {
				$toolbar_array[$key]['first'] = false;
				}
			$toolbar_array[$key]['link'] = $awards->dec_vars($toolbar_array[$key]['link'],$village['id']);
			$i++;
			}
			
		$i = 0;
		
		if (in_array($_GET['screen'],$screens)) {
			require ('actions/'.$_GET['screen'].'.php');
			}
		
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
			
		if ($user['aktu_group'] !== 'all') {
			$group_first_village['id'] = sql("SELECT `id` FROM `villages` WHERE `userid` = '".$user['id']."' AND `group` = '".$user['aktu_group']."' ORDER BY `name` LIMIT 1",'array');
			if (!empty($group_first_village['id'])) {
				$group_first_village['link'] = 'game.php?village='.$group_first_village['id'];
				$group_first_village['link'] .= '&screen='.$_GET['screen'];
				if (isset($_GET['mode'])) {
					$group_first_village['link'] .= '&mode='.$_GET['mode'];
					}
				if (isset($_GET['type'])) {
					$group_first_village['link'] .= '&type='.$_GET['type'];
					}
				if (isset($_GET['target'])) {
					$group_first_village['link'] .= '&target='.$_GET['target'];
					}
				if (isset($_GET['x'])) {
					$group_first_village['link'] .= '&x='.$_GET['x'];
					}
				if (isset($_GET['y'])) {
					$group_first_village['link'] .= '&y='.$_GET['y'];
					}
				if (isset($_GET['id'])) {
					$group_first_village['link'] .= '&id='.$_GET['id'];
					}
				}
			} else {
			$group_first_village['id'] = '';
			}
			
		//Pasek przewijania grup:
		$groups_array = unserialize($user['groups']);
		if (!is_array($groups_array)) $groups_array = array();
		$groups_array = del_emptys($groups_array);
		if (!is_array($groups_array)) $groups_array = array();
		
		if (count($groups_array) > 0 && $user['aktu_group'] !== 'all') {
			$_DISPLAY_GROUPS['isset'] = TRUE;
			
			foreach ($groups_array as $key => $group) {
				if ($group === $user['aktu_group']) {
					$aktu_group_key = $key;
					}
				}

			$_LAST_GROUP = $groups_array[$aktu_group_key - 1];
			$_NEXT_GROUP = $groups_array[$aktu_group_key + 1];
			
			
			$_GROUP_LINK_EXTENDS = 'game.php?village='.$village['id'];
			$_GROUP_LINK_EXTENDS .= '&screen='.$_GET['screen'];
			if (isset($_GET['mode'])) {
				$_GROUP_LINK_EXTENDS .= '&mode='.$_GET['mode'];
				}
			if (isset($_GET['type'])) {
				$_GROUP_LINK_EXTENDS .= '&type='.$_GET['type'];
				}
			if (isset($_GET['target'])) {
				$_GROUP_LINK_EXTENDS .= '&target='.$_GET['target'];
				}
			if (isset($_GET['x'])) {
				$_GROUP_LINK_EXTENDS .= '&x='.$_GET['x'];
				}
			if (isset($_GET['y'])) {
				$_GROUP_LINK_EXTENDS .= '&y='.$_GET['y'];
				}
			if (isset($_GET['id'])) {
				$_GROUP_LINK_EXTENDS .= '&id='.$_GET['id'];
				}
			
			if (!empty($_LAST_GROUP)) {
				$_DISPLAY_GROUPS['left'] = true;
				$_DISPLAY_GROUPS['left_link'] = $_GROUP_LINK_EXTENDS.'&action=change_group&group='.base64_encode($_LAST_GROUP).'&h='.$user_sid['hkey'];
				$_DISPLAY_GROUPS['left_group'] = $_LAST_GROUP;
				} else {
				$_DISPLAY_GROUPS['left'] = false;
				}
				
			if (!empty($_NEXT_GROUP)) {
				$_DISPLAY_GROUPS['right'] = true;
				$_DISPLAY_GROUPS['right_link'] = $_GROUP_LINK_EXTENDS.'&action=change_group&group='.base64_encode($_NEXT_GROUP).'&h='.$user_sid['hkey'];
				$_DISPLAY_GROUPS['right_group'] = $_NEXT_GROUP;
				} else {
				$_DISPLAY_GROUPS['right'] = false;
				}
			} else {
			$_DISPLAY_GROUPS['isset'] = FALSE;
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
		$tpl->assign('display_awards',$config['awards']);
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
		$tpl->assign('group_first_village',$group_first_village);
		$tpl->assign('groups_options',$_DISPLAY_GROUPS);
		$tpl->assign('users_online',sql("SELECT COUNT(id) FROM `sessions`",'array'));
		$tpl->assign('toolbar',$toolbar_array);
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