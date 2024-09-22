<?php
$l_sm = array(
	'Wszystkie' => 'all',
	'Tylko dane IP' => 'ip',

	);
	
	
if (!in_array($_GET['sm'],$l_sm)) {
	$_GET['sm'] = 'all';
	}
	
	
$tpl->assign('l_sm',$l_sm);


 function formatuj_date($czas) {
    return date("Y-m-d H:i", $czas);
    } 
if (!isset($_GET['page'])) {
	$_GET['page'] = floor(($logowanie['id'] - 1)/ 45);
	if ($_GET['page'] < 0) {
		$_GET['page'] = 0;
		}
	}
	
$_GET['page'] = (int)$_GET['page'];
$_GET['page'] = floor($_GET['page']);

if (isset($_POST['from'])) {
	$_POST['from'] = (int)$_POST['from'];
	$_POST['from'] = floor($_POST['from']);
	
	$_GET['page'] = floor(($_POST['from'] - 1)/ 45);
	if ($_GET['page'] < 0) {
		$_GET['page'] = 0;
		}
	$from = $_POST['from'];
	}
	
$RA_Limit = $_GET['page'] * 45;


if ($_GET['sm'] == all){

	$query['big_arr'] = mysql_query("SELECT * FROM `logins` ORDER BY `id` LIMIT $RA_Limit , 25");
	while ($og_info = mysql_fetch_array($query['big_arr'])) {
		$logowania[$og_info['id']]['id'] = urldecode($og_info['id']);
		$logowania[$og_info['id']]['username'] = urldecode($og_info['username']);
	        $logowania[$og_info['id']]['userid'] = urldecode($og_info['userid']);
	        $logowania[$og_info['id']]['ip'] = urldecode($og_info['ip']);
	        $logowania[$og_info['id']]['time'] = formatuj_date ($og_info['time']);
		}
		
$tpl->assign('aktu_page_ra',$_GET['page']);
$tpl->assign('from',$from);
$tpl->assign('aktu',$user['rang']);
$tpl->assign('logowania',$logowania);
} elseif ($_GET['sm'] == 'ip') {

$ip = $_GET['ip'];

	$query['big_arr'] = mysql_query("SELECT * FROM `logins` WHERE `ip` = '".$ip."'  ORDER BY `id` LIMIT $RA_Limit , 25");
	while ($og_info = mysql_fetch_array($query['big_arr'])) {
		$logowania[$og_info['id']]['id'] = urldecode($og_info['id']);
		$logowania[$og_info['id']]['username'] = urldecode($og_info['username']);
	        $logowania[$og_info['id']]['userid'] = urldecode($og_info['userid']);
	        $logowania[$og_info['id']]['ip'] = urldecode($og_info['ip']);
	        $logowania[$og_info['id']]['time'] = formatuj_date ($og_info['time']);
		}
		
$tpl->assign('aktu_page_ra',$_GET['page']);
$tpl->assign('from',$from);
$tpl->assign('aktu',$user['rang']);
$tpl->assign('logowania',$logowania);

}


$text = 'Esta página permite que visualize e rastreie facilmente Multiaccounts - mostra <b>Todas os logins</b> dos jogadores que já ocorreram!';

$tpl->assign('text_tut',$text);
?>