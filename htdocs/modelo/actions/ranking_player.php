<?php
if (!isset($_GET['page'])) {
	$_GET['page'] = floor(($user['rang'] - 1)/ 20);
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
		
		$sql = mysql_query("SELECT username,rang,id,ally,points,villages FROM `users` WHERE `username` REGEXP '".$_POST['search']."' ORDER BY `rang`");
		while ($uinfo = mysql_fetch_assoc($sql)) {
			$user_rangs[$uinfo['id']]['id'] = $uinfo['id'];
			$user_rangs[$uinfo['id']]['rang'] = $uinfo['rang'];
			$user_rangs[$uinfo['id']]['username'] = entparse($uinfo['username']);
			$user_rangs[$uinfo['id']]['ally'] = $uinfo['ally'];
			$user_rangs[$uinfo['id']]['points'] = $uinfo['points'];
			$user_rangs[$uinfo['id']]['villages'] = $uinfo['villages'];
			$user_rangs[$uinfo['id']]['allyshort'] = entparse(sql("SELECT `short` FROM `ally` WHERE `id` = '".$uinfo['ally']."'",'array'));
			if ($uinfo['villages'] > 0) {
				$user_rangs[$uinfo['id']]['srednia_pkt_na_vg'] = round($uinfo['points'] / $uinfo['villages']);
				} else {
				$user_rangs[$uinfo['id']]['srednia_pkt_na_vg'] = 0;
				}
			}
		}
	} else {
	$is_search = false;
	$sql = mysql_query("SELECT username,rang,id,ally,points,villages FROM `users` ORDER BY `rang` LIMIT $RA_Limit , 20");
	while ($uinfo = mysql_fetch_assoc($sql)) {
		$user_rangs[$uinfo['id']]['id'] = $uinfo['id'];
		$user_rangs[$uinfo['id']]['rang'] = $uinfo['rang'];
		$user_rangs[$uinfo['id']]['username'] = entparse($uinfo['username']);
		$user_rangs[$uinfo['id']]['ally'] = $uinfo['ally'];
		$user_rangs[$uinfo['id']]['points'] = $uinfo['points'];
		$user_rangs[$uinfo['id']]['villages'] = $uinfo['villages'];
		$user_rangs[$uinfo['id']]['allyshort'] = entparse(sql("SELECT `short` FROM `ally` WHERE `id` = '".$uinfo['ally']."'",'array'));
		if ($uinfo['villages'] > 0) {
			$user_rangs[$uinfo['id']]['srednia_pkt_na_vg'] = round($uinfo['points'] / $uinfo['villages']);
			} else {
			$user_rangs[$uinfo['id']]['srednia_pkt_na_vg'] = 0;
			}
		}
	}
	
$tpl->assign('error',$error);
$tpl->assign('aktu_page_ra',$_GET['page']);
$tpl->assign('from',$from);
$tpl->assign('aktu',$user['rang']);
$tpl->assign('is_search',$is_search);
$tpl->assign('ally',$user['ally']);
$tpl->assign('user_rangs',$user_rangs);
?>