<?php
$__SMARTY_MODIFER = 0;
$mody = array('Kombinowany' => 'combined','Produkcja' => 'prod','Wojsko' => 'units','W³asne rozkazy' => 'commands','Ruchy wojska' => 'incomings');

if (!in_array($_GET['mode'],$mody)) {
	$_GET['mode'] = 'prod';
	}
	
if ($_GET['mode'] == 'prod') {
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
if ($_GET['mode'] == 'combined') {
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
			$over_villages[$wioska['id']]['dealers']['max_dealers'] = floor($arr_dealers_normal[$wioska_info['market']] * ($bonus->bonusy[$wioska_info['bonus']]['modifer'] + 1));
			} else {
			$over_villages[$wioska['id']]['dealers']['max_dealers'] = $arr_dealers_normal[$wioska_info['market']];
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
if ($_GET['mode'] == 'units') {
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
if ($_GET['mode'] == 'commands') {
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
				$_SEKCJA_ROZKAZY_CONTENT .= '<b>'.$assign_str.'</b>  ';
				} else {
				$_SEKCJA_ROZKAZY_CONTENT .= '<a href="'.$_SEKCJA_ROZKAZY_LINK.$i.'">'.$assign_str.'<a>  ';
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
		$my_movements[$wlasny_rozkaz['id']]['message'] = '<img src="graphic/command/'.$wlasny_rozkaz['type'].'.png"/>&nbsp;' .$commands_pl[$wlasny_rozkaz['type']]. ' ' . entparse($_info_cel_wioska['name']) . ' (' .$_info_cel_wioska['x']. '|' .$_info_cel_wioska['y']. ') K' .$_info_cel_wioska['continent'];
		}
		
	
	
	$tpl->assign('sekcja_rozkazy',$sekcja_rozkazy);
	$tpl->assign('sekcja_rozkazy_content',$_SEKCJA_ROZKAZY_CONTENT);
	$tpl->assign('unit',$units);
	$tpl->assign('my_movements',$my_movements);
	}
if ($_GET['mode'] == 'incomings') {
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
				$_SEKCJA_ROZKAZY_CONTENT .= '<b>'.$assign_str.'</b>  ';
				} else {
				$_SEKCJA_ROZKAZY_CONTENT .= '<a href="'.$_SEKCJA_ROZKAZY_LINK.$i.'">'.$assign_str.'<a>  ';
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
		$other_movements[$inny_rozkaz['id']]['message'] = '<img src="graphic/command/'.$inny_rozkaz['type'].'.png"/>&nbsp;' .$commands_pl[$inny_rozkaz['type']]. ' ' . entparse($_info_cel_wioska['name']);
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
	
$tpl->assign('links',$mody);
?>