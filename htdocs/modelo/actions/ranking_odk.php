<?php

		

	$query['big_arr'] = mysql_query("SELECT * FROM `odkrycia` ORDER BY id ");
	while ($og_info = mysql_fetch_array($query['big_arr'])) {
	$odkrycia[$og_info['id']]['id'] = urldecode($og_info['id']);
	$odkrycia[$og_info['id']]['wioska'] = urldecode($og_info['wioska']);
	$odkrycia[$og_info['id']]['typ'] = urldecode($og_info['typ']);
		}
	$odk = mysql_num_rows(mysql_query("select * from odkrycia"));	
	$tpl->assign('odk',$odk);
	$tpl->assign('odkrycia',$odkrycia);
	

	$query2['big_arr'] = mysql_query("SELECT * FROM `users` ORDER BY id ");
	while ($og_info = mysql_fetch_array($query2['big_arr'])) {
	$gracze[$og_info['id']]['id'] = urldecode($og_info['id']);
	$gracze[$og_info['id']]['ally'] = urldecode($og_info['ally']);
	$gracze[$og_info['id']]['username'] = urldecode($og_info['username']);
		}

	$tpl->assign('gracze',$gracze);	
	
	$query3['big_arr'] = mysql_query("SELECT * FROM `villages` ORDER BY id ");
	while ($og_info = mysql_fetch_array($query3['big_arr'])) {
	$wioski[$og_info['id']]['id'] = urldecode($og_info['id']);
	$wioski[$og_info['id']]['x'] = urldecode($og_info['x']);
	$wioski[$og_info['id']]['y'] = urldecode($og_info['y']);
	$wioski[$og_info['id']]['name'] = urldecode($og_info['name']);
	$wioski[$og_info['id']]['continent'] = urldecode($og_info['coninent']);	
		}

	$tpl->assign('wioski',$wioski);	
	
	$query4['big_arr'] = mysql_query("SELECT * FROM `ally` ORDER BY id ");
	while ($og_info = mysql_fetch_array($query4['big_arr'])) {
	$plemienia[$og_info['id']]['id'] = urldecode($og_info['id']);
	$plemienia[$og_info['id']]['shot'] = urldecode($og_info['shot']);
	$plemienia[$og_info['id']]['name'] = urldecode($og_info['name']);
		}

	$tpl->assign('plemienia',$plemienia);	
?>