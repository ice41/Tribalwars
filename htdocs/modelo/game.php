
<?php
/*****************************************/
/*=======================================*/
/*     PLIK: game.php   		 */
/*     DATA: 17.12.2011r        	 */
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
	
require ('lib/pl.php');

require ('lib/bb-code.php');
$admin = false;		
require ('include.inc.php');
		$pl = new pl();
		$bbc = new bbc();
//Reload wszystkich rankingów
reload_all_rangs();


$sid = new sid();

$awards = new awards();
$select_banned = $selected['banned'];
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
		
$user = sql("SELECT * FROM `users` WHERE `id` = '".$user_sid['userid']."'","assoc");
//Po³¹cz z baz¹ serwera g³ównego
cdb_central();
$graacz = sql("SELECT * FROM `gracze` WHERE `id` = '".$user['tw_id']."'","assoc");
$user['premium_p'] = $graacz['premium_p'];
//Przeliæ pozosta³e kody
$kod1 = mysql_query("SELECT * FROM kody WHERE wykorzystany != 'N' AND typ = '1'");
$kodb['1'] = mysql_num_rows($kod1);
$kod2 = mysql_query("SELECT * FROM kody WHERE wykorzystany != 'Y' AND typ = '2'");
$kodb['2'] = mysql_num_rows($kod2);
$kod3 = mysql_query("SELECT * FROM kody WHERE wykorzystany != 'Y' AND typ = '3'");
$kodb['3'] = mysql_num_rows($kod3);

		$tpl->assign('kodb',$kodb);

	

//Wróæ do bazy œwiata
cdb_server();

		$session = $user_sid;
	    if ($user['startowa'] == 'N') {
		$nadawca = $config['mail']['nadawca'];
		$temat = $config['mail']['temat'];	
        $text = $config['mail']['text'];			
		$id = $user['id'];
				send_mail(-1,$nadawca,$id,$user['username'],parse($temat),parse($text),false);
				mysql_query("UPDATE `users` SET `startowa` = 'Y' WHERE `id` = $id");
		}
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
			$_GET['village'] = $first_village;
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
			$_GET['village'] = $first_village;
			
			exit;
			}
		
		if (!isset($_GET['screen'])) {
			$_GET['screen'] = 'welcome';
			}

	
		
	
		//Kod pozwalaj¹cy na otworzenie akcji, proszê go nie usuwaæ, ani nie zmieniaæ!
		$ACTIONS_MASSIVKEY_HIGHAAASSDD = 'sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL';

if ($_GET['screen']) {
$sc = true;
} else {
$sc = false;
    if ($_GET['ajax']) {
$ajaxs = true;

    }
}

	
//Pobraæ iloœæ zalogowanych graczy z bazy danych:
$zalogowani = mysql_num_rows(mysql_query("select * from sessions"));

	
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
	
		//$userdatas = new getuserdata();
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
		$screens = array('map','snob','overview','main','church','overview_villages','welcome','settings','barracks','wood','stone','czat','admin','iron','farm','storage','hide', 
			'wall','smith','place','info_village','report','info_command', 
			'ranking','market','mail','ally', 'info_player','info_ally','info_member',
			'memo','stable','garage','train','statue',
			'edytuj_kolory_graczy','ulubione','friends','map_s','kody','api'
			);
	
		
		$allow_screens = array('support','church','map','map_s','snob','overview','main','overview_villages','welcome','settings',
			'barracks','wood','stone','czat','iron','farm','storage','hide','statue','admin','friends',
			'wall','smith','place','info_village','report','info_command', 
			'ranking','market','mail','ally', 'info_player','info_ally','info_member',
			'memo','stable','garage','place_confirm','place_units_try_back','train',
			'edytuj_kolory_graczy','market_confirm_send','ulubione','ajax_q1','kody','api'
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
		$grocusto_array = unserialize($user['grocusto']);
		if (!is_array($grocusto_array)) $grocusto_array = array();
		$grocusto_array = del_emptys($grocusto_array);
		if (!is_array($grocusto_array)) $grocusto_array = array();
		
		if (count($grocusto_array) > 0 && $user['aktu_group'] !== 'all') {
			$_DISPLAY_GROUPS['isset'] = TRUE;
			
			foreach ($grocusto_array as $key => $group) {
				if ($group === $user['aktu_group']) {
					$aktu_group_key = $key;
					}
				}

			$_LAST_GROUP = $grocusto_array[$aktu_group_key - 1];
			$_NEXT_GROUP = $grocusto_array[$aktu_group_key + 1];
			
			
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

		$village['r_wood'] = floor($village['r_wood']);
		$village['r_stone'] = floor($village['r_stone']);
		$village['r_iron'] = floor($village['r_iron']);
	
		$r_wood_s = $arr_production[$village['wood']] * $config['speed'] / 3600;
		$r_stone_s = $arr_production[$village['stone']] * $config['speed'] / 3600;
		$r_iron_s = $arr_production[$village['iron']] * $config['speed'] / 3600;		
//Pobraæ iloœæ graczy z bazy MySql:
		$gracze = mysql_num_rows(mysql_query("select * from users"));
//Odbanuj gracza po zakoñczeniu siê banu!
		if($user['koniec_banu'] < time()){
		mysql_query("update users set koniec_banu = '0', powod_banu = '' where id = ".$user['id']."");
		mysql_query("update users set banned = '1' where id = ".$user['id']."");		
		$user['koniec_banu'] = 0;
	}	

if ($_GET['screen'] == 'admin') {
$panel_administratora = true;
} else {
$panel_administratora = false;
}
        $user['css'] = entparse($user['css']);
		$tpl->assign('p_adm',$panel_administratora);
		$tpl->assign('premium',$config['premium']);
		$tpl->assign('gracze',$gracze);
		$tpl->assign('config',$config);			
		$tpl->assign('powitalna',$config['powitalna']);			
		$tpl->assign('event_p',$event_p);
		$tpl->assign('kod',$config['kod']);				
		$tpl->assign('po_za_wioska',$config['wiekszy_zwiad']);		
		$tpl->assign('db1',$config['db_user']);
		$tpl->assign('db2',$config['db_pw']);
		$tpl->assign('sc',$sc);
		$tpl->assign('ajaxs',$ajaxs);
		$tpl->assign('wood_s',$r_wood_s);
		$tpl->assign('stone_s',$r_stone_s);
		$tpl->assign('iron_s',$r_iron_s);		
		$tpl->assign('hkey',$user_sid['hkey']);
		$tpl->assign('village',$village);
		$tpl->assign('user',$user);
		$tpl->assign('pozosta³o',$pozosta³o);
		$tpl->assign('allow_screens',$allow_screens);
		$tpl->assign('screen',$_GET['screen']);
		$tpl->assign('wood_per_hour',$r_wood_comma);
		$tpl->assign('stone_per_hour',$r_stone_comma);
		$tpl->assign('iron_per_hour',$r_iron_comma);
		$tpl->assign('max_storage',$maxmag);
		$tpl->assign('max_bh',$maxfarm);
		$tpl->assign('ajax',$_GET['ajax']);
		$tpl->assign('display_awards',$config['awards']);
		$tpl->assign('village_array',$wioska_arr_pasek);
		$tpl->assign('mode',$_GET['mode']);
		$tpl->assign('load_msec',msec());
		$tpl->assign('servertime',set_server_time(data('U')));
		$tpl->assign('sekcja_wiosek',$_SEKCJA_OSADY);
		$tpl->assign('sekcja',$_SEKCJA);
		$tpl->assign('wioski_gracza',$wioski_usera);
		$tpl->assign('awards',$awards);
		$tpl->assign('pl',$pl);
		$tpl->assign('bbc',$bbc);		
		$tpl->assign('zalogowani',$zalogowani);
		$tpl->assign('bonus',$bonus);
		$tpl->assign('ParseTime',$ParseTime);
		$tpl->assign('serwerid',$config['__SERVER__ID']);
		$tpl->assign('group_first_village',$group_first_village);
		$tpl->assign('grocusto_options',$_DISPLAY_GROUPS);
		$tpl->assign('users_online',sql("SELECT COUNT(id) FROM `sessions`",'array'));
		$tpl->assign('toolbar',$toolbar_array);
		$tpl->assign('news_img',$config['wsk_tyg_img']);
		$tpl->assign('news_txt',$config['wsk_tyg_text']);
        $tpl->assign('ilosc_sz',$user['premium_p']);		
    if($user['banned'] == '1') {
	    if ($screen != 'api') {
		$tpl->display('game.tpl');
		}
	} else {
        $tpl->display('ban.tpl');
    	
	}
    } else {
	header('LOCATION: sid_wrong.php');
	}
	
	} else {
	die ('Nie mo¿na poprawnie za³adowaæ pliku include.inc.php');
	}





mysql_close();
?>



<?php if (!$ajax) { ?>

<script type="text/javascript">
//<![CDATA[

var rtl = false;

var tutorial = {
	place: function() {
				var top = $('#content_value').position().top + $('#content_value').height() / 2;
		var left = $('#content_value').position().left + $('#content_value').width() / 2;

		$('#tutorial_box')[0].style.top = (top - $('#tutorial_box').height() / 2) + 'px';
		$('#tutorial_box')[0].style.left = (left - $('#tutorial_box').width() / 2) + 'px';

		
		
		
		

		setTimeout('tutorial.place()', 500);
	},


	init: function() {
		this.place();
	},

	head_clicked: function() {
		if( $('#tutorial_head')[0].has_clicked == 1 ) {
			$('#tutorial_tooltip').fadeIn(200);
			$('#tutorial_head')[0].has_clicked = 0;
			$('#tutorial_head').unbind('mouseenter mouseleave');
			return false;
		}
		$('#tutorial_tooltip').fadeOut(200);
		$('#tutorial_head').hover(function(){$('#tutorial_tooltip').fadeIn(200);}, function(){$('#tutorial_tooltip').fadeOut(200);});
		$('#tutorial_head')[0].has_clicked = 1;
		return false;
	},

	arrow: {
		type: '',
		cur: null,

		focus: function(x, y, type) {
			if( this.cur != null ) {
				if( type == this.type && x == parseInt(this.cur[0].style.left) && y == parseInt(this.cur[0].style.top) && this._ie_sucks == 1)
					return; // no change
				this._ie_sucks = 1;

				this.cur.hide();
				this.cur = null;
			}
			var el = $('#tutorial_arrow_'+type);
			if( !el.length )
				return;

			if( type == 'down' ) {
				x -= el.outerWidth() / 2;
				y -= el.outerHeight();
			} else if( type == 'down_small' ) {
				x -= el.outerWidth() / 2;
				y -= el.outerHeight() - 8;
			} else if( type == 'left' ) {
				y -= el.outerHeight() / 2;
				if (jQuery.browser.mozilla)
					x -= 15;
			}


			el[0].style.top = y + 'px';
			el[0].style.left = x + 'px';
			el.show();
			this.cur = el;
			this.type = type;
			this._grab_attention(2);
		},

		focus_el: function(el, type) {
			el = $(el);
			if( !el || !el.length )
				return;

			var x = el.offset().left;
			var y = el.offset().top;

			if( type == 'down' ) {
				x += el.outerWidth() / 2;
				y -= 2;
			} else if( type == 'left' ) {
				x += el.outerWidth() + 10;
				y += el.outerHeight() / 2;
			}

			return this.focus(x, y, type);
		},

		focus_building: function(building, type) {
			var el = $('#map_'+building);
			if( !el.length )
				return;
			var coords = el[0].coords.split(',');
			var min_x = 1000, max_x = 0, min_y = 1000, max_y = 0;
			for( var i = 0; i < coords.length; i += 2) {
				var x = parseInt(coords[i]), y = parseInt(coords[i+1]);
				if( x < min_x ) min_x = x;
				if( x > max_x ) max_x = x;
				if( y < min_y ) min_y = y;
				if( y > max_y ) max_y = y;
			}
			var use_x = (min_x + max_x) / 2, use_y = (min_y + max_y) / 2;

			if( type == 'down' ) {
				use_y -= 20;
			} else if( type == 'left' ) {
				use_x += 15;
			}
			use_x += $('#buildings_visual').position().left;
			use_y += $('#buildings_visual').position().top;

			return this.focus(use_x,use_y, type);
		},

		focus_village: function(village_id, type) {
			var el = $('#map_village_'+village_id).parent().find('img:last');
			if( !el || !el.length )
				return;

			var arrow_el = $('#tutorial_arrow_'+type);
			if( !arrow_el.length )
				return;

			arrow_el.show();
			arrow_el = arrow_el[0];

			if( arrow_el.parentNode.id != 'map_container' ) {
				arrow_el.parentNode.removeChild(arrow_el);
				document.getElementById('map_container').appendChild(arrow_el);
			}

			var village_el = document.getElementById('map_village_'+village_id);
			if( !village_el )
				return;
			arrow_el.style.left = (parseInt(village_el.style.left)+$(village_el).width()/2-$(arrow_el).width()/2-5) + 'px';
			arrow_el.style.top = (parseInt(village_el.style.top)-$(arrow_el).height()) + 'px';
		},

		_grab_attention: function(flag) {
			if( !jQuery.browser.mozilla )
				return; // STFU

			if( this._last_attention_object && flag == 2 ) {
				this._last_attention_object.stop(true, true);
			}
			this._last_attention_object = this.cur;

			var v;
			var el = this.cur;
			if( el[0].id == 'tutorial_arrow_down' || el[0].id == 'tutorial_arrow_down_small' )
				v = flag ? {top:'-=5'} : {top:'+=5'};
			else if( el[0].id == 'tutorial_arrow_left' )
				v = flag ? {left:'-=5'} : {left:'+=5'};
			el.animate(v, 1000, function(){tutorial.arrow._grab_attention(!flag)});
		}
	}
};

tutorial.init();




//]]>
</script>

	<script type="text/javascript">

	//<![CDATA[
	var TribeWidget = {

		init: function() {
			$("#all").show();

			$("#tab_all").click(this.showAll);
			$("#tab_forum_activity").click(this.showForumActivity);
			$("#tab_villages").click(this.showVillages);

			$(".show_more").click(this.showHiddenEvents);
		},

		showAll: function(e) {
			e.preventDefault();
			TribeWidget.hideOthers();
			$("#all").show();
			$("#tab_all").addClass('selected');
		},
		showForumActivity: function(e) {
			e.preventDefault();
			TribeWidget.hideOthers();
			$("#forum_activity").show();
			$("#tab_forum_activity").addClass('selected');
		},
		showVillages: function(e) {
			e.preventDefault();
			TribeWidget.hideOthers();
			$("#villages").show();
			$("#tab_villages").addClass('selected');
		},

		showHiddenEvents: function(e) {
			e.preventDefault();
			$(".event_hidden").show();
			$(".show_more").hide();
		},

		hideOthers: function() {
			$("#tribe-activity").find('.widget-tabs > li > a').removeClass('selected');
			$("#all,#forum_activity,#villages").hide();
			$(".event_hidden").hide();
			$(".show_more").show();
		}
	};
	TribeWidget.init();
	//]]>

	</script>
<script type="text/javascript">
//<![CDATA[
	$(function() {
		UnitPopup.unit_data = null;
		UnitPopup.init();
			});
//]]>
</script><?php } ?>