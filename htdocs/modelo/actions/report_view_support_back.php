<?php
$_GET['view'] = (int)$_GET['view'];
$report_array = sql("SELECT a_units,from_village,to_village FROM `reports` WHERE `id` = '".$_GET['view']."'","assoc");

$support_units = explode(';',$report_array['a_units']);

$support_owner['vid'] = $report_array['from_village'];
$vinfo = sql("SELECT x,y,name,continent,userid FROM `villages` WHERE `id` = '".$support_owner['vid']."'",'assoc');
$support_owner['uid'] = $vinfo['userid'];
if ($support_owner['uid'] != '-1') {
	$support_owner['username'] = entparse(sql("SELECT `username` FROM `users` WHERE `id` = '".$support_owner['uid']."'",'array'));
	}
$support_owner['villagename'] = entparse($vinfo['name']);
$support_owner['x'] = $vinfo['x'];
$support_owner['y'] = $vinfo['y'];
$support_owner['continent'] = $vinfo['continent'];

$support_target['vid'] = $report_array['to_village'];
$vinfo = sql("SELECT x,y,name,continent,userid FROM `villages` WHERE `id` = '".$support_target['vid']."'",'assoc');
$support_target['uid'] = $vinfo['userid'];
if ($support_target['uid'] != '-1') {
	$support_target['username'] = entparse(sql("SELECT `username` FROM `users` WHERE `id` = '".$support_target['uid']."'",'array'));
	}
$support_target['villagename'] = entparse($vinfo['name']);
$support_target['x'] = $vinfo['x'];
$support_target['y'] = $vinfo['y'];
$support_target['continent'] = $vinfo['continent'];

$tpl->assign('support_target',$support_target);
$tpl->assign('support_owner',$support_owner);
$tpl->assign('support_units',$support_units);
$tpl->assign('cl_units',$cl_units);
?>