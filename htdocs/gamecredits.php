<?php
require ('include.ini.php');

//pobierz team�w z bazy danych:
	$query['big_arr'] = mysql_query("SELECT * FROM `team`");
	while ($tm_info = mysql_fetch_array($query['big_arr'])) {

		// $team[$tm_info['id']]['opis'] = urldecode($tm_info['opis']);
		// $team[$tm_info['id']]['gracz'] = urldecode($tm_info['gracz']);



		}

	


$tpl->assign('team',$team);
$tpl->assign('linki',$linki);
$tpl->display('team.tpl');




?>