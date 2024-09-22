<?php
//Infos des Dorfes
$getInfos = $db->query("SELECT * FROM villages WHERE id = ".$report['to_village']."");
$result = $db->fetch($getInfos);
$string = sprintf($lang->grab("report_view_attack_visit", "visit"), $_GET['village'], $report['to_village'], entparse($result['name']), $result['x'], $result['y']);
$tpl->assign("string", $string);
?>
