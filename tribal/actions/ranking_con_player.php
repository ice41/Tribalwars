<?php
$continent = $village['continent'];

if (isset($_POST['continent'])) {
	$_POST['continent'] = (int)$_POST['continent'];
	$_POST['continent'] = floor($_POST['continent']);
	
	if ($_POST['continent'] > 99) {
		$_POST['continent'] = 99;
		}
	if ($_POST['continent'] < 0) {
		$_POST['continent'] = 0;
		}
		
	$continent = $_POST['continent'];
	}
	
if (isset($_GET['con'])) {
	$_GET['con'] = (int)$_GET['con'];
	$_GET['con'] = floor($_GET['con']);
	
	if ($_GET['con'] > 99) {
		$_GET['con'] = 99;
		}
	if ($_GET['con'] < 0) {
		$_GET['con'] = 0;
		}
		
	$continent = $_GET['con'];
	}

//Wybierz unikatowe rekordy z bazy:
$sql = mysql_query("SELECT distinct(userid) FROM `villages` WHERE `continent` = '$continent'");

while($ui = mysql_fetch_array($sql)) {
	if ($ui[0] != '-1') {
		$sum_points = sql("SELECT SUM(points) FROM `villages` WHERE `userid` = '".$ui[0]."' AND `continent` = '$continent'",'array');
		$ranking[$ui[0]] = $sum_points;
		}
	}

//Przesortuj tablicê asocjacyjn¹:
if (is_array($ranking)) {
	arsort($ranking);
	}

$rang = 0;

if (is_array($ranking)) {
	foreach ($ranking as $uid => $pts) {
		$rang++;
	
		if ($uid == $user['id']) {
			$user['continent_rang'] = $rang;
			}
		
		$con_r[$rang] = array($uid,$pts);
		}
	}
	
//Wybierz stronê:
if (!isset($_GET['page'])) {
	$_GET['page'] = floor(($user['continent_rang'] - 1)/ 20);
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
	
$RA_Limit_min = ($_GET['page'] * 20) + 1;
$RA_Limit_max = ($_GET['page'] + 1) * 20;

if ($RA_Limit_min < 0) {
	$RA_Limit_min = 0;
	}
	
if ($RA_Limit_max < 0) {
	$RA_Limit_max = 0;
	}

if (isset($_POST['search'])) {
	$_POST['search'] = parse($_POST['search']);
	$_POST['search'] = validate_reg($_POST['search']);
	if (strlen($_POST['search']) < 3) {
		$error = 'string musi sk³adaæ siê co najmniej z trzech liter.';
		} else {
		$is_search = true;
		
		if (is_array($con_r)) {
			foreach ($con_r as $rang => $uinfo) {
				$uname = sql("SELECT `username` FROM `users` WHERE `id` = '".$uinfo[0]."'",'array');
				if (preg_match('/'.$_POST['search'].'/',$uname)) {
					$uinfo = sql("SELECT villages,ally FROM `users` WHERE `id` = '".$uinfo[0]."'",'assoc');
					$continent_rangs[$rang]['id'] = $uinfo[0];
					$continent_rangs[$rang]['points'] = $uinfo[1];
					$continent_rangs[$rang]['username'] = entparse($uname);
					$continent_rangs[$rang]['villages'] = $uinfo['villages'];
					$continent_rangs[$rang]['ally'] = $uinfo['ally'];
					$continent_rangs[$rang]['allyshort'] = entparse(sql("SELECT `short` FROM `ally` WHERE `id` = '".$uinfo['ally']."'",'array'));
					$continent_rangs[$rang]['villages_con'] = sql("SELECT COUNT(id) FROM `villages` WHERE `userid` = '".$uinfo[0]."' AND `continent` = '$continent'",'array');
					}
				}
			}
		}
	} else {
	$is_search = false;
	for ($i = $RA_Limit_min; $i <= $RA_Limit_max; $i++) {
		$user_info = $con_r[$i];
		if (is_array($user_info)) {
			$uinfo = sql("SELECT villages,ally,username FROM `users` WHERE `id` = '".$user_info[0]."'",'assoc');
			$continent_rangs[$i]['id'] = $user_info[0];
			$continent_rangs[$i]['points'] = $user_info[1];
			$continent_rangs[$i]['username'] = entparse($uinfo['username']);
			$continent_rangs[$i]['villages'] = $uinfo['villages'];
			$continent_rangs[$i]['ally'] = $uinfo['ally'];
			$continent_rangs[$i]['allyshort'] = entparse(sql("SELECT `short` FROM `ally` WHERE `id` = '".$uinfo['ally']."'",'array'));
			$continent_rangs[$i]['villages_con'] = sql("SELECT COUNT(id) FROM `villages` WHERE `userid` = '".$user_info[0]."' AND `continent` = '$continent'",'array');
			}
		}
	}

$tpl->assign('error',$error);
$tpl->assign('aktu_page_ra',$_GET['page']);
$tpl->assign('RA_continent',$continent);
$tpl->assign('continent_rangs',$continent_rangs);
$tpl->assign('aktu',$user['continent_rang']);
$tpl->assign('from',$from);
$tpl->assign('ally',$user['ally']);
?>