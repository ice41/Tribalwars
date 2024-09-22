<?php
	$query['big_arr'] = mysql_query("SELECT * FROM `odkrycia` ORDER BY id ");
	while ($og_info = mysql_fetch_array($query['big_arr'])) {
	$odkrycia[$og_info['id']]['id'] = urldecode($og_info['id']);
	$odkrycia[$og_info['id']]['wioska'] = urldecode($og_info['wioska']);
	$odkrycia[$og_info['id']]['typ'] = urldecode($og_info['typ']);
		}
		
	$tpl->assign('odkrycia',$odkrycia);

	

?>