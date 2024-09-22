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
	
$merged_user = sql("SELECT killed_units_att,killed_units_att_rank,killed_units_def,killed_units_def_rank,killed_units_altogether,killed_units_altogether_rank FROM `users` WHERE `id` = '".$user['id']."'","assoc");
	
$r_type_decoder = array (
	'att' => 'killed_units_att',
	'def' => 'killed_units_def',
	'all' => 'killed_units_altogether'
	);
	
$db_type_name = $r_type_decoder[$_GET['type']];
$db_type_rang = $db_type_name.'_rank';
	
if (!isset($_GET['page'])) {
	$_GET['page'] = floor(($merged_user[$db_type_rang] - 1)/ 20);
	if ($_GET['page'] < 0) {
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
		$error = 'String deve ser pelo menos três letras.';
		} else {
		$is_search = true;
		
		$sql = mysql_query("SELECT username,id,ally,$db_type_rang,$db_type_name FROM `users` WHERE `username` REGEXP '".$_POST['search']."' ORDER BY `$db_type_rang`");
		while ($uinfo = mysql_fetch_assoc($sql)) {
			$user_rangs[$uinfo['id']]['id'] = $uinfo['id'];
			$user_rangs[$uinfo['id']]['rang'] = $uinfo[$db_type_rang];
			$user_rangs[$uinfo['id']]['score'] = $uinfo[$db_type_name];
			$user_rangs[$uinfo['id']]['username'] = entparse($uinfo['username']);
			$user_rangs[$uinfo['id']]['ally'] = $uinfo['ally'];
			$user_rangs[$uinfo['id']]['allyshort'] = entparse(sql("SELECT `short` FROM `ally` WHERE `id` = '".$uinfo['ally']."'",'array'));
			}
		}
	} else {
	$is_search = false;
	$sql = mysql_query("SELECT username,id,ally,$db_type_rang,$db_type_name FROM `users` ORDER BY `$db_type_rang` LIMIT $RA_Limit , 20");
	while ($uinfo = mysql_fetch_assoc($sql)) {
		$user_rangs[$uinfo['id']]['id'] = $uinfo['id'];
			$user_rangs[$uinfo['id']]['rang'] = $uinfo[$db_type_rang];
			$user_rangs[$uinfo['id']]['score'] = $uinfo[$db_type_name];
			$user_rangs[$uinfo['id']]['username'] = entparse($uinfo['username']);
			$user_rangs[$uinfo['id']]['ally'] = $uinfo['ally'];
			$user_rangs[$uinfo['id']]['allyshort'] = entparse(sql("SELECT `short` FROM `ally` WHERE `id` = '".$uinfo['ally']."'",'array'));
		}
	}
	
$tpl->assign('error',$error);
$tpl->assign('aktu_page_ra',$_GET['page']);
$tpl->assign('from',$from);
$tpl->assign('aktu',$merged_user[$db_type_rang]);
$tpl->assign('is_search',$is_search);
$tpl->assign('ally',$user['ally']);
$tpl->assign('user_rangs',$user_rangs);
?>