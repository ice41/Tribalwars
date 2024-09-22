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
		$sum_villages = sql("SELECT COUNT(id) FROM `villages` WHERE `userid` = '".$ui[0]."' AND `continent` = '$continent'",'array');
		$ally = sql("SELECT `ally` FROM `users` WHERE `id` = '".$ui[0]."'",'array');
		if ($ally != '-1') {
			$ally_continent_points[$ally] += $sum_points;
			$ally_villages[$ally] += $sum_villages;
			}
		}
	}
	
//Przesortuj tablicê asocjacyjn¹:
if (is_array($ally_continent_points)) {
	arsort($ally_continent_points);
	}

$rang = 0;

if (is_array($ally_continent_points)) {
	foreach ($ally_continent_points as $aid => $pts) {
		$rang++;
	
		if ($aid == $user['ally'] && $user['ally'] != '-1') {
			$user['continent_rang'] = $rang;
			}
		
		$con_r[$rang] = array($aid,$pts);
		}
	}
	
//Wybierz stronê:
if (!isset($_GET['page'])) {
	if ($user['ally'] != '-1') {
		$_GET['page'] = floor(($user['continent_rang'] - 1)/ 20);
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
			foreach ($con_r as $rang => $ainfo) {
				$ashort = sql("SELECT `short` FROM `ally` WHERE `id` = '".$ainfo[0]."'",'array');
				if (preg_match('/'.$_POST['search'].'/',$ashort)) {
					$continent_rangs[$rang]['id'] = $ainfo[0];
					$continent_rangs[$rang]['short'] = entparse(sql("SELECT `short` FROM `ally` WHERE `id` = '".$ainfo[0]."'",'array'));
					$continent_rangs[$rang]['points'] = $ainfo[1];
					$continent_rangs[$rang]['villages'] = $ally_villages[$ainfo[0]];
					}
				}
			}
		}
	} else {
	$is_search = false;
	for ($i = $RA_Limit_min; $i <= $RA_Limit_max; $i++) {
		$ally_info = $con_r[$i];
		if (is_array($ally_info)) {
			$continent_rangs[$i]['id'] = $ally_info[0];
			$continent_rangs[$i]['short'] = entparse(sql("SELECT `short` FROM `ally` WHERE `id` = '".$ally_info[0]."'",'array'));
			$continent_rangs[$i]['points'] = $ally_info[1];
			$continent_rangs[$i]['villages'] = $ally_villages[$ally_info[0]];
			}
		}
	}

$tpl->assign('error',$error);
$tpl->assign('aktu_page_ra',$_GET['page']);
$tpl->assign('RA_continent',$continent);
$tpl->assign('continent_rangs',$continent_rangs);
$tpl->assign('from',$from);
$tpl->assign('ally',$user['ally']);
?>