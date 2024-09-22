<?php
$user['ally_rang'] = sql("SELECT `rank` FROM `ally` WHERE `id` = '".$user['id']."'",'array');

if (!isset($_GET['page'])) {
	if ($user['ally'] == '-1') {
		$_GET['page'] = 0;
		} else {
		$_GET['page'] = floor(($user['ally_rang'] - 1)/ 20);
		if ($_GET['page'] < 0) {
			$_GET['page'] = 0;
			}
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
		
		$sql = mysql_query("SELECT id,short,points,rank,best_points,members,villages FROM `ally` WHERE `short` REGEXP '".$_POST['search']."' ORDER BY `rank`");
		while ($ainfo = mysql_fetch_assoc($sql)) {
			$ally_rangs[$ainfo['id']]['id'] = $ainfo['id'];
			$ally_rangs[$ainfo['id']]['rang'] = $ainfo['rank'];
			$ally_rangs[$ainfo['id']]['short'] = entparse($ainfo['short']);
			$ally_rangs[$ainfo['id']]['points'] = $ainfo['points'];
			$ally_rangs[$ainfo['id']]['best_points'] = $ainfo['best_points'];
			$ally_rangs[$ainfo['id']]['members'] = $ainfo['members'];
			if ($ainfo['members'] > 0) {
				$ally_rangs[$ainfo['id']]['sr_pkt_na_gracza'] = round($ainfo['points'] / $ainfo['members']);
				} else {
				$ally_rangs[$ainfo['id']]['sr_pkt_na_gracza'] = 0;
				}
			$ally_rangs[$ainfo['id']]['villages'] = $ainfo['villages'];
			if ($ainfo['villages'] > 0) {
				$ally_rangs[$ainfo['id']]['sr_pkt_na_wioske'] = round($ainfo['points'] / $ainfo['villages']);
				} else {
				$ally_rangs[$ainfo['id']]['sr_pkt_na_wioske'] = 0;
				}
			}
		}
	} else {
	$is_search = false;
	$sql = mysql_query("SELECT id,short,points,rank,best_points,members,villages FROM `ally` ORDER BY `rank` LIMIT $RA_Limit , 20");
	while ($ainfo = mysql_fetch_assoc($sql)) {
		$ally_rangs[$ainfo['id']]['id'] = $ainfo['id'];
		$ally_rangs[$ainfo['id']]['rang'] = $ainfo['rank'];
		$ally_rangs[$ainfo['id']]['short'] = entparse($ainfo['short']);
		$ally_rangs[$ainfo['id']]['points'] = $ainfo['points'];
		$ally_rangs[$ainfo['id']]['best_points'] = $ainfo['best_points'];
		$ally_rangs[$ainfo['id']]['members'] = $ainfo['members'];
		if ($ainfo['members'] > 0) {
			$ally_rangs[$ainfo['id']]['sr_pkt_na_gracza'] = round($ainfo['points'] / $ainfo['members']);
			} else {
			$ally_rangs[$ainfo['id']]['sr_pkt_na_gracza'] = 0;
			}
		$ally_rangs[$ainfo['id']]['villages'] = $ainfo['villages'];
		if ($ainfo['villages'] > 0) {
			$ally_rangs[$ainfo['id']]['sr_pkt_na_wioske'] = round($ainfo['points'] / $ainfo['villages']);
			} else {
			$ally_rangs[$ainfo['id']]['sr_pkt_na_wioske'] = 0;
			}
		}
	}
	
$tpl->assign('error',$error);
$tpl->assign('aktu_page_ra',$_GET['page']);
$tpl->assign('from',$from);
$tpl->assign('aktu',$user['ally_rang']);
$tpl->assign('is_search',$is_search);
$tpl->assign('ally',$user['ally']);
$tpl->assign('ally_rangs',$ally_rangs);
?>