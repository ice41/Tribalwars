<?php
if (!isset($_GET['page'])) {
	$_GET['page'] = floor(($user['award_rang'] - 1)/ 20);
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
		$error = 'string musi sk³adaæ siê co najmniej z trzech liter.';
		} else {
		$is_search = true;
		
		$sql = mysql_query("SELECT username,award_rang,id,ally,awards_points_all FROM `users` WHERE `username` REGEXP '".$_POST['search']."' ORDER BY `award_rang`");
		while ($uinfo = mysql_fetch_assoc($sql)) {
			$user_award_rangs[$uinfo['id']]['id'] = $uinfo['id'];
			$user_award_rangs[$uinfo['id']]['rang'] = $uinfo['award_rang'];
			$user_award_rangs[$uinfo['id']]['username'] = entparse($uinfo['username']);
			$user_award_rangs[$uinfo['id']]['ally'] = $uinfo['ally'];
			$user_award_rangs[$uinfo['id']]['points'] = $uinfo['awards_points_all'];
			$user_award_rangs[$uinfo['id']]['allyshort'] = entparse(sql("SELECT `short` FROM `ally` WHERE `id` = '".$uinfo['ally']."'",'array'));
			$user_award_rangs[$uinfo['id']]['awards'] = $awards->get_user_awards_mini($uinfo['id'],$user['id'],'rangs');
			}
		}
	} else {
	$is_search = false;
	$sql = mysql_query("SELECT username,award_rang,id,ally,awards_points_all FROM `users` ORDER BY `award_rang` LIMIT $RA_Limit , 20");
	while ($uinfo = mysql_fetch_assoc($sql)) {
		$user_award_rangs[$uinfo['id']]['id'] = $uinfo['id'];
		$user_award_rangs[$uinfo['id']]['rang'] = $uinfo['award_rang'];
		$user_award_rangs[$uinfo['id']]['username'] = entparse($uinfo['username']);
		$user_award_rangs[$uinfo['id']]['ally'] = $uinfo['ally'];
		$user_award_rangs[$uinfo['id']]['points'] = $uinfo['awards_points_all'];
		$user_award_rangs[$uinfo['id']]['allyshort'] = entparse(sql("SELECT `short` FROM `ally` WHERE `id` = '".$uinfo['ally']."'",'array'));
		$user_award_rangs[$uinfo['id']]['awards'] = $awards->get_user_awards_mini($uinfo['id'],$user['id'],'rangs');
		}
	}
	
$tpl->assign('error',$error);
$tpl->assign('aktu_page_ra',$_GET['page']);
$tpl->assign('from',$from);
$tpl->assign('aktu',$user['award_rang']);
$tpl->assign('is_search',$is_search);
$tpl->assign('ally',$user['ally']);
$tpl->assign('user_award_rangs',$user_award_rangs);
?>