<?php
$__SMARTY_MODIFER = 0;

$mody = array(
	'Kombinowany' => 'combined',
	'Produkcja' => 'prod',
	'Transporty' => 'trader',
	'Wojska' => 'units',
	'Rozkazy' => 'commands',
	'Przybywaj¹ce' => 'incomings',
	'Budynki' => 'buildings',
	'Technologia' => 'tech',
	'Grupy' => 'groups'
	);

if (!in_array($_GET['mode'],$mody)) {
	$_GET['mode'] = 'prod';
	}
	
require ('actions/groups_edit.php');
require ('actions/groups_bar.php');
require ('actions/villages_per_page.php');
	
if ($_GET['mode'] === 'prod') {
	foreach ($wioski_usera as $wioska) {
		reload_vdata($wioska['id'],date('U'));
		$wioska_info = sql("SELECT r_wood,r_stone,r_iron,attacks,points,storage,r_bh,farm,bonus FROM `villages` WHERE `id` = '".$wioska['id']."'",'assoc');
		
		$__SMARTY_MODIFER++;
		if ($__SMARTY_MODIFER % 2 == 0) {
			$over_villages[$wioska['id']]['parzysta_liczba'] = true;
			} else {
			$over_villages[$wioska['id']]['parzysta_liczba'] = false;
			}
		
		$over_villages[$wioska['id']]['r_wood'] = floor($wioska_info['r_wood']);
		$over_villages[$wioska['id']]['r_stone'] = floor($wioska_info['r_stone']);
		$over_villages[$wioska['id']]['r_iron'] = floor($wioska_info['r_iron']);
		$over_villages[$wioska['id']]['id'] = $wioska['id'];
		$over_villages[$wioska['id']]['x'] = $wioska['x'];
		$over_villages[$wioska['id']]['y'] = $wioska['y'];
		$over_villages[$wioska['id']]['name'] = $wioska['name'];
		$over_villages[$wioska['id']]['continent'] = $wioska['continent'];
		$over_villages[$wioska['id']]['points'] = number_format($wioska_info['points']);
		$over_villages[$wioska['id']]['attacks'] = $wioska_info['attacks'];
		$over_villages[$wioska['id']]['bonus'] = $wioska_info['bonus'];
		if ($wioska_info['bonus'] == 1) {
			$over_villages[$wioska['id']]['max_storage'] = floor($arr_maxstorage[$wioska_info['storage']] * ($bonus->bonusy[$wioska_info['bonus']]['modifer'] + 1));
			} else {
			$over_villages[$wioska['id']]['max_storage'] = floor($arr_maxstorage[$wioska_info['storage']]);
			}
		$over_villages[$wioska['id']]['r_bh'] = number_format($wioska_info['r_bh']);
		if ($wioska_info['bonus'] == 9) {
			$over_villages[$wioska['id']]['max_farm'] = number_format(floor($arr_farm[$wioska_info['farm']] * ($bonus->bonusy[$wioska_info['bonus']]['modifer'] + 1)));
			} else {
			$over_villages[$wioska['id']]['max_farm'] = number_format($arr_farm[$wioska_info['farm']]);
			}
		$count_build = sql("SELECT COUNT(id) FROM `build` WHERE `villageid` = '".$wioska['id']."'",'array');
		if ($count_build > 0) {
			$over_villages[$wioska['id']]['first_build']['buildname'] = sql("SELECT `building` FROM `build` WHERE `villageid` = '".$wioska['id']."' ORDER BY `end_time` LIMIT 1",'array');
			}
		$count_tec = sql("SELECT COUNT(id) FROM `research` WHERE `villageid` = '".$wioska['id']."'",'array');
		if ($count_tec > 0) {
			$over_villages[$wioska['id']]['first_tec']['tecname'] = sql("SELECT `research` FROM `research` WHERE `villageid` = '".$wioska['id']."' ORDER BY `end_time` LIMIT 1",'array');
			}
			
		$over_villages[$wioska['id']]['recruits'] = array();
		$recs_query = mysql_query("SELECT unit,num_unit,num_finished FROM `recruit` WHERE `villageid` = '".$wioska['id']."' ORDER BY `time_finished` LIMIT 10");
		while($recs_effect = mysql_fetch_assoc($recs_query)) {
			$idr += 1;
			$over_villages[$wioska['id']]['recruits'][$idr]['dbname'] = $recs_effect['unit'];
			$over_villages[$wioska['id']]['recruits'][$idr]['unit'] = $cl_units->get_name($recs_effect['unit']);
			$over_villages[$wioska['id']]['recruits'][$idr]['num'] = $recs_effect['num_unit'] - $recs_effect['num_finished'];
			}
		}
	$tpl->assign('villages',$over_villages);
	}
if ($_GET['mode'] === 'combined') {
	$query_string = '';

	foreach ($cl_units->get_array('dbname') as $key => $unit) {
		$units[$unit] = $key;
		}
		
	foreach ($wioski_usera as $wioska) {
		reload_vdata($wioska['id'],date('U'));
		$unv = sql("SELECT * FROM `unit_place` WHERE `villages_from_id` = '".$wioska['id']."' AND `villages_to_id` = '".$wioska['id']."'",'assoc');
		$wioska_info = sql("SELECT farm,dealers_outside,market,barracks,stable,garage,smith,r_bh,attacks,bonus FROM `villages` WHERE `id` = '".$wioska['id']."'",'assoc');
		$__SMARTY_MODIFER++;
		if ($__SMARTY_MODIFER % 2 == 0) {
			$over_villages[$wioska['id']]['parzysta_liczba'] = true;
			} else {
			$over_villages[$wioska['id']]['parzysta_liczba'] = false;
			}
		$over_villages[$wioska['id']]['id'] = $wioska['id'];
		$over_villages[$wioska['id']]['x'] = $wioska['x'];
		$over_villages[$wioska['id']]['y'] = $wioska['y'];
		$over_villages[$wioska['id']]['name'] = $wioska['name'];
		$over_villages[$wioska['id']]['continent'] = $wioska['continent'];
		$over_villages[$wioska['id']]['bonus'] = $wioska_info['bonus'];
		foreach ($units as $key => $unit) {
			$over_villages[$wioska['id']][$key] = $unv[$key];
			}
		if ($wioska_info['bonus'] == 9) {
			$over_villages[$wioska['id']]['wolni'] = number_format(($arr_farm[$wioska_info['farm']] * ($bonus->bonusy[$wioska_info['bonus']]['modifer'] + 1)) - $wioska_info['r_bh']);
			} else {
			$over_villages[$wioska['id']]['wolni'] = number_format($arr_farm[$wioska_info['farm']] - $wioska_info['r_bh']);
			}
			
		$over_villages[$wioska['id']]['farm'] = $wioska_info['farm'];
		if ($wioska_info['bonus'] == 1) {
			$over_villages[$wioska['id']]['dealers']['max_dealers'] = floor($arr_dealers[$wioska_info['market']] * ($bonus->bonusy[$wioska_info['bonus']]['modifer'] + 1));
			} else {
			$over_villages[$wioska['id']]['dealers']['max_dealers'] = $arr_dealers[$wioska_info['market']];
			}

		$over_villages[$wioska['id']]['dealers']['in_village'] = $over_villages[$wioska['id']]['dealers']['max_dealers'] - $wioska_info['dealers_outside'];
		$count_build = sql("SELECT COUNT(id) FROM `build` WHERE `villageid` = '".$wioska['id']."'",'array');
		if ($count_build > 0) {
			$over_villages[$wioska['id']]['first_build']['buildname'] = 1;
			}
		$over_villages[$wioska['id']]['barracks'] = $wioska_info['barracks'];
		$over_villages[$wioska['id']]['stable'] = $wioska_info['stable'];
		$over_villages[$wioska['id']]['garage'] = $wioska_info['garage'];
		$over_villages[$wioska['id']]['smith'] = $wioska_info['garage'];
		$over_villages[$wioska['id']]['attacks'] = $wioska_info['attacks'];
		$count_tec = sql("SELECT COUNT(id) FROM `research` WHERE `villageid` = '".$wioska['id']."'",'array');
		if ($count_tec > 0) {
			$over_villages[$wioska['id']]['first_tec']['tecname'] = 1;
			}
		$count_recr = sql("SELECT COUNT(id) FROM `recruit` WHERE `villageid` = '".$wioska['id']."' AND `building` = 'barracks'",'array');
		if ($count_recr > 0) {
			$over_villages[$wioska['id']]['barracks_prod'] = 1;
			}
		$count_recr = sql("SELECT COUNT(id) FROM `recruit` WHERE `villageid` = '".$wioska['id']."' AND `building` = 'stable'",'array');
		if ($count_recr > 0) {
			$over_villages[$wioska['id']]['stable_prod'] = 1;
			}
		$count_recr = sql("SELECT COUNT(id) FROM `recruit` WHERE `villageid` = '".$wioska['id']."' AND `building` = 'garage'",'array');
		if ($count_recr > 0) {
			$over_villages[$wioska['id']]['garage_prod'] = 1;
			}
		}
		
	$tpl->assign('unit',$units);
	$tpl->assign('villages',$over_villages);
	}
if ($_GET['mode'] === 'units') {
	$query_string = '';

	$i = 0;
	foreach ($cl_units->get_array('dbname') as $key => $unit) {
		$units[$unit] = $key;
		$units_keyid[$i] = $unit;
		$query_string .= ',all_'. $unit;
		$i += 1;
		}
	unset($i);
		
	foreach ($wioski_usera as $wioska) {
		reload_vdata($wioska['id'],date('U'));
		$over_villages[$wioska['id']]['id'] = $wioska['id'];
		$over_villages[$wioska['id']]['x'] = $wioska['x'];
		$over_villages[$wioska['id']]['y'] = $wioska['y'];
		$over_villages[$wioska['id']]['name'] = $wioska['name'];
		$over_villages[$wioska['id']]['continent'] = $wioska['continent'];
		$__SMARTY_MODIFER++;
		if ($__SMARTY_MODIFER % 2 == 0) {
			$over_villages[$wioska['id']]['parzysta_liczba'] = true;
			} else {
			$over_villages[$wioska['id']]['parzysta_liczba'] = false;
			}
		
		$unv = sql("SELECT * FROM `unit_place` WHERE `villages_from_id` = '".$wioska['id']."' AND `villages_to_id` = '".$wioska['id']."'",'assoc');
		
		foreach ($units as $key => $unit) {
			$over_villages[$wioska['id']]['own_units'][$key] = $unv[$key];
			}
			
		$wioska_info = sql("SELECT id$query_string FROM `villages` WHERE `id` = '".$wioska['id']."'",'assoc');
		foreach ($units as $key => $unit) {
			$over_villages[$wioska['id']]['outward'][$key] = $wioska_info['all_'.$key] - $unv[$key];
			}
			
		foreach ($units as $key => $unit) {
			$over_villages[$wioska['id']]['all_units'][$key] = $unv[$key] + sql("SELECT sum($key) FROM `unit_place` WHERE `villages_to_id` = '".$wioska['id']."' AND `villages_to_id` != `villages_from_id`",'array');
			}
		}
		
	$tpl->assign('unit',$units);
	$tpl->assign('villages',$over_villages);
	}
if ($_GET['mode'] === 'commands') {
	$query_string = '';

	$i = 0;
	foreach ($cl_units->get_array('dbname') as $key => $unit) {
		$units[$unit] = $key;
		$units_keyid[$i] = $unit;
		$i += 1;
		}
	unset($i);
	
	$wlasne_rokazy_count = sql("SELECT COUNT(id) FROM `movements` WHERE `send_from_user` = '".$user['id']."'","array");	
	$max_pages = floor($wlasne_rokazy_count / 30);
	
	if ($_GET['page'] > $max_pages) {
		$_GET['page'] = $max_pages;
		}
		
	$_GET['page'] = floor($_GET['page']);
		
	$start_licznik_limit = $_GET['page'] * 30;
		
	if ($max_pages > 0) {
		if (isset($_GET['page'])) {
			$_GET['page'] = (int)$_GET['page'];
		
			if ($_GET['page'] < 0) {
				$_GET['page'] = 0;
				}
			} else {
			$_GET['page'] = 0;
			}
			
		$_SEKCJA_ROZKAZY_LINK = 'game.php?village='.$village['id'].'&screen=overview_villages&mode=commands&page=';
		
		for ($i = 0; $i <= $max_pages; $i++) {
			$assign_str = $i + 1;
			if ($i == $_GET['page']) {
				$_SEKCJA_ROZKAZY_CONTENT .= '<b>&gt;'.$assign_str.'&lt;</b>  ';
				} else {
				$_SEKCJA_ROZKAZY_CONTENT .= '<a href="'.$_SEKCJA_ROZKAZY_LINK.$i.'">['.$assign_str.']<a>  ';
				}
			}
		$sekcja_rozkazy = true;
		} else {
		$_GET['page'] = 0;
		$sekcja_rozkazy = false;
		}
		
	$commands_pl = array(
		'attack' => 'Atak na',
		'back' => 'Wycofane z',
		'cancel' => 'Anulowany atak na',
		'other_back' => 'Anulowana pomoc do',
		'return' => 'Powrót z',
		'support' => 'Pomoc do',
		);
	
	$movs_query = mysql_query("SELECT units,send_from_village,send_to_village,type,end_time,id FROM `movements` WHERE `send_from_user` = '".$user['id']."' ORDER BY `end_time` LIMIT ".$start_licznik_limit." , 30");
	while($wlasny_rozkaz = mysql_fetch_assoc($movs_query)) {
		$units_array = explode(';',$wlasny_rozkaz['units']);
		foreach ($units_keyid as $key => $unit) {
			$my_movements[$wlasny_rozkaz['id']]['units'][$unit] = $units_array[$key];
			}
		$_info_pochodzenie_wioska = sql("SELECT name,x,y,continent FROM `villages` WHERE `id` = '".$wlasny_rozkaz['send_from_village']."'",'assoc');
		$my_movements[$wlasny_rozkaz['id']]['homevillagename'] = entparse($_info_pochodzenie_wioska['name']) . ' (' .$_info_pochodzenie_wioska['x']. '|' .$_info_pochodzenie_wioska['y']. ') K' .$_info_pochodzenie_wioska['continent'];
		$my_movements[$wlasny_rozkaz['id']]['arrival_in'] = $wlasny_rozkaz['end_time'];
		$my_movements[$wlasny_rozkaz['id']]['id'] = $wlasny_rozkaz['id'];
		$my_movements[$wlasny_rozkaz['id']]['homevillageid'] = $wlasny_rozkaz['send_from_village'];
		$__SMARTY_MODIFER++;
		if ($__SMARTY_MODIFER % 2 == 0) {
			$my_movements[$wlasny_rozkaz['id']]['parzysta_liczba'] = true;
			} else {
			$my_movements[$wlasny_rozkaz['id']]['parzysta_liczba'] = false;
			}
		$_info_cel_wioska = sql("SELECT name,x,y,continent FROM `villages` WHERE `id` = '".$wlasny_rozkaz['send_to_village']."'",'assoc');
		$my_movements[$wlasny_rozkaz['id']]['message'] = '<img src="/ds_graphic/command/'.$wlasny_rozkaz['type'].'.png"/>&nbsp;' .$commands_pl[$wlasny_rozkaz['type']]. ' ' . entparse($_info_cel_wioska['name']) . ' (' .$_info_cel_wioska['x']. '|' .$_info_cel_wioska['y']. ') K' .$_info_cel_wioska['continent'];
		}
		
	
	
	$tpl->assign('sekcja_rozkazy',$sekcja_rozkazy);
	$tpl->assign('sekcja_rozkazy_content',$_SEKCJA_ROZKAZY_CONTENT);
	$tpl->assign('unit',$units);
	$tpl->assign('my_movements',$my_movements);
	}
if ($_GET['mode'] === 'incomings') {
	$inne_rokazy_count = sql("SELECT COUNT(id) FROM `movements` WHERE `send_to_user` = '".$user['id']."' AND (`type` = 'support' OR `type` = 'attack')","array");
	$max_pages = floor($inne_rokazy_count / 30);
	
	if ($_GET['page'] > $max_pages) {
		$_GET['page'] = $max_pages;
		}
		
	$_GET['page'] = floor($_GET['page']);
		
	$start_licznik_limit = $_GET['page'] * 30;
		
	if ($max_pages > 0) {
		if (isset($_GET['page'])) {
			$_GET['page'] = (int)$_GET['page'];
		
			if ($_GET['page'] < 0) {
				$_GET['page'] = 0;
				}
			} else {
			$_GET['page'] = 0;
			}
			
		$_SEKCJA_ROZKAZY_LINK = 'game.php?village='.$village['id'].'&screen=overview_villages&mode=incomings&page=';
		
		for ($i = 0; $i <= $max_pages; $i++) {
			$assign_str = $i + 1;
			if ($i == $_GET['page']) {
				$_SEKCJA_ROZKAZY_CONTENT .= '<b>&gt;'.$assign_str.'&lt;</b>  ';
				} else {
				$_SEKCJA_ROZKAZY_CONTENT .= '<a href="'.$_SEKCJA_ROZKAZY_LINK.$i.'">['.$assign_str.']<a>  ';
				}
			}
		$sekcja_rozkazy = true;
		} else {
		$_GET['page'] = 0;
		$sekcja_rozkazy = false;
		}
		
	$commands_pl = array(
		'attack' => 'Atak na',
		'support' => 'Pomoc do',
		);
	
	$movs_query = mysql_query("SELECT send_to_village,type,end_time,id,send_from_user FROM `movements` WHERE `send_to_user` = '".$user['id']."' AND (`type` = 'support' OR `type` = 'attack') ORDER BY `end_time` LIMIT ".$start_licznik_limit." , 30");
	while($inny_rozkaz = mysql_fetch_assoc($movs_query)) {
		$_info_cel_wioska = sql("SELECT name,x,y,continent FROM `villages` WHERE `id` = '".$inny_rozkaz['send_to_village']."'",'assoc');
		$other_movements[$inny_rozkaz['id']]['message'] = '<img src="/ds_graphic/command/'.$inny_rozkaz['type'].'.png"/>&nbsp;' .$commands_pl[$inny_rozkaz['type']]. ' ' . entparse($_info_cel_wioska['name']);
		$other_movements[$inny_rozkaz['id']]['to_villagename'] = entparse($_info_cel_wioska['name']) . ' (' .$_info_cel_wioska['x']. '|' .$_info_cel_wioska['y']. ') K' .$_info_cel_wioska['continent'];
		$other_movements[$inny_rozkaz['id']]['to_village'] = $inny_rozkaz['send_to_village'];
		$other_movements[$inny_rozkaz['id']]['id'] = $inny_rozkaz['id'];
		$other_movements[$inny_rozkaz['id']]['send_from_user'] = $inny_rozkaz['send_from_user'];
		$other_movements[$inny_rozkaz['id']]['send_from_username'] = entparse(sql("SELECT `username` FROM `users` WHERE `id` = '".$inny_rozkaz['send_from_user']."'",'array'));
		$other_movements[$inny_rozkaz['id']]['end_time'] = $inny_rozkaz['end_time'];
		$other_movements[$inny_rozkaz['id']]['arrival_in'] = $inny_rozkaz['end_time'] - date("U");
		$__SMARTY_MODIFER++;
		if ($__SMARTY_MODIFER % 2 == 0) {
			$other_movements[$inny_rozkaz['id']]['parzysta_liczba'] = true;
			} else {
			$other_movements[$inny_rozkaz['id']]['parzysta_liczba'] = false;
			}
		}
	$tpl->assign('sekcja_rozkazy',$sekcja_rozkazy);
	$tpl->assign('sekcja_rozkazy_content',$_SEKCJA_ROZKAZY_CONTENT);
	$tpl->assign('other_movements',$other_movements);
	}
if ($_GET['mode'] === 'groups') {
	foreach ($wioski_usera as $wioska) {
		reload_vdata($wioska['id'],date('U'));
		$wioska_info = sql("SELECT `r_bh`,`group`,`farm`,`points`,`bonus` FROM `villages` WHERE `id` = '".$wioska['id']."'",'assoc');
		
		$__SMARTY_MODIFER++;
		if ($__SMARTY_MODIFER % 2 == 0) {
			$over_villages[$wioska['id']]['parzysta_liczba'] = true;
			} else {
			$over_villages[$wioska['id']]['parzysta_liczba'] = false;
			}
		
		$over_villages[$wioska['id']]['id'] = $wioska['id'];
		$over_villages[$wioska['id']]['x'] = $wioska['x'];
		$over_villages[$wioska['id']]['y'] = $wioska['y'];
		$over_villages[$wioska['id']]['name'] = $wioska['name'];
		$over_villages[$wioska['id']]['continent'] = $wioska['continent'];
		$over_villages[$wioska['id']]['points'] = number_format($wioska_info['points']);
		$over_villages[$wioska['id']]['bonus'] = $wioska_info['bonus'];
		$over_villages[$wioska['id']]['r_bh'] = number_format($wioska_info['r_bh']);
		$over_villages[$wioska['id']]['group'] = $wioska_info['group'];
		if ($wioska_info['bonus'] == 9) {
			$over_villages[$wioska['id']]['max_farm'] = number_format(floor($arr_farm[$wioska_info['farm']] * ($bonus->bonusy[$wioska_info['bonus']]['modifer'] + 1)));
			} else {
			$over_villages[$wioska['id']]['max_farm'] = number_format($arr_farm[$wioska_info['farm']]);
			}
		}
	
	if ($_GET['action'] == 'edit_groups' && count($_POST) > 0) {
		if ($_GET['h'] == $session['hkey']) {
			if (!is_array($groups_array)) $groups_array = array();

			$_POST['selected_group'] = base64_decode($_POST['selected_group']);
			
			if (in_array($_POST['selected_group'],$groups_array)) {
				$in_group_array = true;
				} else {
				$in_group_array = false;
				}

			foreach ($wioski_usera as $wioska) {
				if (strlen($_POST['village_ids_'.$wioska['id']]) > 0) {
					if (isset($_POST['add_to_group']) && $in_group_array) {
						if ($wioska['group'] !== $_POST['selected_group']) {
							mysql_query("UPDATE `villages` SET `group` = '".$_POST['selected_group']."' WHERE `id` = '".$wioska['id']."'");
							}
						}
					if (isset($_POST['remove_from_group'])) {
						if ($wioska['group'] !== 'all') {
							mysql_query("UPDATE `villages` SET `group` = 'all' WHERE `id` = '".$wioska['id']."'");
							}
						}
					}
				}
			header('location: game.php?village='.$village['id'].'&screen=overview_villages&mode=groups');
			exit;
			} else {
			$error = 'B³¹d wykonywania akcji.';
			}
		}
		
	$tpl->assign('villages',$over_villages);
	}
if ($_GET['mode'] === 'trader') {
	$inne_transporty_count = sql("SELECT COUNT(id) FROM `dealers` WHERE `from_userid` = '".$user['id']."' OR (`to_userid` = '".$user['id']."' AND `type` = 'to')","array");
	$max_pages = floor($inne_transporty_count / 30);
	
	if ($_GET['page'] > $max_pages) {
		$_GET['page'] = $max_pages;
		}
		
	$_GET['page'] = floor($_GET['page']);
		
	$start_licznik_limit = $_GET['page'] * 30;
		
	if ($max_pages > 0) {
		if (isset($_GET['page'])) {
			$_GET['page'] = (int)$_GET['page'];
		
			if ($_GET['page'] < 0) {
				$_GET['page'] = 0;
				}
			} else {
			$_GET['page'] = 0;
			}
			
		$_SEKCJA_TRANSPORTY_LINK = 'game.php?village='.$village['id'].'&screen=overview_villages&mode=trader&page=';
		
		for ($i = 0; $i <= $max_pages; $i++) {
			$assign_str = $i + 1;
			if ($i == $_GET['page']) {
				$_SEKCJA_TRANSPORTY_CONTENT .= '<b>&gt;'.$assign_str.'&lt;</b>  ';
				} else {
				$_SEKCJA_TRANSPORTY_CONTENT .= '<a href="'.$_SEKCJA_TRANSPORTY_LINK.$i.'">['.$assign_str.']<a>  ';
				}
			}
		$sekcja_transporty = true;
		} else {
		$_GET['page'] = 0;
		$sekcja_transporty = false;
		}
		
	$commands_pl = array(
		'to' => 'Transport do',
		'back' => 'Powrót z',
		);
	
	$movs_query = mysql_query("SELECT id,from_userid,from_village,to_village,wood,stone,iron,end_time,dealers,type FROM `dealers` WHERE `from_userid` = '".$user['id']."' OR (`to_userid` = '".$user['id']."' AND `type` = 'to') ORDER BY `end_time` LIMIT ".$start_licznik_limit." , 30");
	while($transport = mysql_fetch_assoc($movs_query)) {
		$_info_cel_wioska = sql("SELECT name,x,y,continent FROM `villages` WHERE `id` = '".$transport['to_village']."'",'assoc');
		if ($user['id'] == $transport['from_userid']) {
			$transporty[$transport['id']]['message'] = '<img src="/ds_graphic/overview/'.$transport['type'].'.png"/>&nbsp;' .$commands_pl[$transport['type']]. ' ' . entparse($_info_cel_wioska['name']);
			} else {
			$transporty[$transport['id']]['message'] = '<img src="/ds_graphic/overview/to_other.png"/>&nbsp;Transport z ' . entparse($_info_cel_wioska['name']);
			}
		
		$transporty[$transport['id']]['to_villagename'] = entparse($_info_cel_wioska['name']) . ' (' .$_info_cel_wioska['x']. '|' .$_info_cel_wioska['y']. ') K' .$_info_cel_wioska['continent'];
		$transporty[$transport['id']]['to_village'] = $transport['to_village'];
		$transporty[$transport['id']]['id'] = $transport['id'];
		$transporty[$transport['id']]['from_userid'] = $transport['from_userid'];
		$transporty[$transport['id']]['from_username'] = entparse(sql("SELECT `username` FROM `users` WHERE `id` = '".$transport['from_userid']."'",'array'));
		$transporty[$transport['id']]['end_time'] = $transport['end_time'];
		$transporty[$transport['id']]['arrival_in'] = $transport['end_time'] - date("U");
		$transporty[$transport['id']]['wood'] = $transport['wood'];
		$transporty[$transport['id']]['stone'] = $transport['stone'];
		$transporty[$transport['id']]['iron'] = $transport['iron'];
		$transporty[$transport['id']]['dealers'] = $transport['dealers'];
		$__SMARTY_MODIFER++;
		if ($__SMARTY_MODIFER % 2 == 0) {
			$transporty[$transport['id']]['parzysta_liczba'] = true;
			} else {
			$transporty[$transport['id']]['parzysta_liczba'] = false;
			}
		}
		
	$tpl->assign('sekcja_transporty',$sekcja_transporty);
	$tpl->assign('sekcja_transporty_content',$_SEKCJA_TRANSPORTY_CONTENT);
	$tpl->assign('user_transports',$transporty);
	}
if ($_GET['mode'] === 'buildings') {
	foreach ($wioski_usera as $wioska) {
		$wioska_info = sql("SELECT bonus,attacks,points,$impl_builds FROM `villages` WHERE `id` = '".$wioska['id']."'",'assoc');
		
		$__SMARTY_MODIFER++;
		if ($__SMARTY_MODIFER % 2 == 0) {
			$over_villages[$wioska['id']]['parzysta_liczba'] = true;
			} else {
			$over_villages[$wioska['id']]['parzysta_liczba'] = false;
			}
		
		$over_villages[$wioska['id']]['id'] = $wioska['id'];
		$over_villages[$wioska['id']]['x'] = $wioska['x'];
		$over_villages[$wioska['id']]['y'] = $wioska['y'];
		$over_villages[$wioska['id']]['name'] = $wioska['name'];
		$over_villages[$wioska['id']]['continent'] = $wioska['continent'];
		$over_villages[$wioska['id']]['points'] = number_format($wioska_info['points']);
		$over_villages[$wioska['id']]['attacks'] = $wioska_info['attacks'];
		$over_villages[$wioska['id']]['bonus'] = $wioska_info['bonus'];
		
		$build_list_query = mysql_query("SELECT `building` FROM `build` WHERE `villageid` = '".$wioska['id']."' ORDER BY `end_time` LIMIT 15");
		while ($building = mysql_fetch_array($build_list_query)) {
			$build_list[] = $building[0];
			}
			
		$destroy_list_query = mysql_query("SELECT `build` FROM `destory` WHERE `villageid` = '".$wioska['id']."' ORDER BY `end_time` LIMIT 15");
		while ($building = mysql_fetch_array($destroy_list_query)) {
			$destroy_list[] = $building[0];
			}
			
		foreach ($cl_builds->get_array("dbname") as $building) {
			$over_villages[$wioska['id']]['buildings'][$building] = $wioska_info[$building];
			}

		$over_villages[$wioska['id']]['build_list'] = $build_list;
		$over_villages[$wioska['id']]['destroy_list'] = $destroy_list;
		
		unset($build_list);
		unset($destroy_list);
		}
	$tpl->assign('villages',$over_villages);
	$tpl->assign('cl_builds',$cl_builds);
	}
if ($_GET['mode'] === 'tech') {
	$impl_tech = array();
	foreach ($cl_techs->get_array("dbname") as $tech) {
		$impl_tech[] = 'unit_'.$tech.'_tec_level';
		$points_max += $cl_techs->get_maxstage($tech);
		}
		
	$impl_tech = implode(',',$impl_tech);
		
	foreach ($wioski_usera as $wioska) {
		$wioska_info = sql("SELECT bonus,attacks,points,$impl_tech FROM `villages` WHERE `id` = '".$wioska['id']."'",'assoc');
		
		$__SMARTY_MODIFER++;
		if ($__SMARTY_MODIFER % 2 == 0) {
			$over_villages[$wioska['id']]['parzysta_liczba'] = true;
			} else {
			$over_villages[$wioska['id']]['parzysta_liczba'] = false;
			}
		
		$over_villages[$wioska['id']]['id'] = $wioska['id'];
		$over_villages[$wioska['id']]['x'] = $wioska['x'];
		$over_villages[$wioska['id']]['y'] = $wioska['y'];
		$over_villages[$wioska['id']]['name'] = $wioska['name'];
		$over_villages[$wioska['id']]['continent'] = $wioska['continent'];
		$over_villages[$wioska['id']]['points'] = number_format($wioska_info['points']);
		$over_villages[$wioska['id']]['attacks'] = $wioska_info['attacks'];
		$over_villages[$wioska['id']]['bonus'] = $wioska_info['bonus'];
		$over_villages[$wioska['id']]['points_max'] = $points_max;
		
		$research_list_query = mysql_query("SELECT `research` FROM `research` WHERE `villageid` = '".$wioska['id']."' ORDER BY `end_time`");
		while ($tech = mysql_fetch_array($research_list_query)) {
			$research_list[] = $tech[0];
			}
			
		foreach ($cl_techs->get_array("dbname") as $tech) {
			$over_villages[$wioska['id']]['techs'][$tech] = $wioska_info['unit_'.$tech.'_tec_level'];
			$over_villages[$wioska['id']]['points_min'] += $wioska_info['unit_'.$tech.'_tec_level'];
			}

		$over_villages[$wioska['id']]['research_list'] = $research_list;
		
		unset($research_list);
		}
	$tpl->assign('villages',$over_villages);
	$tpl->assign('cl_techs',$cl_techs);
	}
	
$tpl->assign('links',$mody);
?>