<?php
$modes_types = array (
	'Jako agresor' => 'att',
	'Jako obro�ca' => 'def',
	'Razem' => 'all'
	);
	
$tpl->assign('modes_types',$modes_types);
	
if (!in_array($_GET['type'],$modes_types)) {
	$_GET['type'] = 'att';
	}

$tpl->assign('type',$_GET['type']);
	
$merged_ally = sql("SELECT killed_units_att_rang,killed_units_def_rang,killed_units_altogether_rang FROM `ally` WHERE `id` = '".$user['ally']."'","assoc");
	
$r_type_decoder = array (
	'att' => 'killed_units_att',
	'def' => 'killed_units_def',
	'all' => 'killed_units_altogether'
	);
	
$db_type_name = $r_type_decoder[$_GET['type']];
$db_type_rang = $db_type_name.'_rang';
	
if (!isset($_GET['page'])) {
	if ($user['ally'] != '-1') {
		$_GET['page'] = floor(($merged_ally[$db_type_rang] - 1)/ 20);
		if ($_GET['page'] < 0) {
			$_GET['page'] = 0;
			}
		} else {
		$_GET['page'] = 0;
		}
	}
	
$_GET['page'] = (int)$_GET['page'];
$_GET['page'] = floor($_GET['page']);

if (isset($_POST['from'])) {
	$_POST['from'] = (int)$_POST['from'];
	$_POST['from'] = floor($_POST['from']);
	
	$_GET['page'] = floor(($_POST['from'] - 1)/ 20);
	if ($_GET['page'] < 0) {
		$_GET['page'] = 0;
		}
	$from = $_POST['from'];
	}
	
$RA_Limit = $_GET['page'] * 20;
	
if (isset($_POST['search'])) {
	$_POST['search'] = parse($_POST['search']);
	$_POST['search'] = validate_reg($_POST['search']);
	if (strlen($_POST['search']) < 3) {
		$error = 'A string deve ter pelo menos três letras.';
		} else {
		$is_search = true;
		
		$sql = mysql_query("SELECT id,name,$db_type_rang,$db_type_name FROM `ally` WHERE `name` REGEXP '".$_POST['search']."' ORDER BY `$db_type_rang`");
		while ($ainfo = mysql_fetch_assoc($sql)) {
			$ally_rangs[$ainfo['id']]['id'] = $ainfo['id'];
			$ally_rangs[$ainfo['id']]['name'] = entparse($ainfo['name']);
			$ally_rangs[$ainfo['id']]['rang'] = $ainfo[$db_type_rang];
			$ally_rangs[$ainfo['id']]['score'] = $ainfo[$db_type_name];
			}
		}
	} else {
	$is_search = false;
	$sql = mysql_query("SELECT id,name,$db_type_rang,$db_type_name FROM `ally` ORDER BY `$db_type_rang` LIMIT $RA_Limit , 20");
	while ($ainfo = mysql_fetch_assoc($sql)) {
		$ally_rangs[$ainfo['id']]['id'] = $ainfo['id'];
		$ally_rangs[$ainfo['id']]['name'] = entparse($ainfo['name']);
		$ally_rangs[$ainfo['id']]['rang'] = $ainfo[$db_type_rang];
		$ally_rangs[$ainfo['id']]['score'] = $ainfo[$db_type_name];
		}
	}
	
$tpl->assign('error',$error);
$tpl->assign('aktu_page_ra',$_GET['page']);
$tpl->assign('from',$from);
$tpl->assign('aktu',$merged_ally[$db_type_rang]);
$tpl->assign('is_search',$is_search);
$tpl->assign('ally',$user['ally']);
$tpl->assign('ally_rangs',$ally_rangs);
?>