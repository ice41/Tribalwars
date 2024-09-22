<?php function formatuj_date($czas) {
    return date("Y-m-d H:i", $czas);
    } ?>
<?php 
	$query['big_arr'] = mysql_query("SELECT * FROM `reports` ORDER BY time DESC LIMIT 35");
	while ($og_info = mysql_fetch_array($query['big_arr'])) {
		$raporty[$og_info['id']]['id'] = urldecode($og_info['id']);
		$raporty[$og_info['id']]['title'] = urldecode($og_info['title']);
	$raporty[$og_info['id']]['title_image'] = urldecode($og_info['title_image']);
	$raporty[$og_info['id']]['time'] = formatuj_date($og_info['time']);
	$raporty[$og_info['id']]['a_units'] = urldecode($og_info['a_units']);
		}
		
	$tpl->assign('raporty',$raporty);
?>