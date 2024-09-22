<?php
// Sicherheits Ausf�hrungscheck:
if ($ACTIONS_MASSIVKEY_HIGHAAASSDD!='sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL') {
	die("Ação - Exec!");
}

/** Verluste der Unterst�tzende Truppen **/

// An Jogador:
$result = $db->query("SELECT username from users where id='".$report['to_user']."'");
$arr=$db->Fetch($result);
$report['to_username'] = entparse($arr['username']);

// Von Dorf:
$result = $db->query("SELECT name,x,y from villages where id='".$report['from_village']."'");
$arr=$db->Fetch($result);
$report['from_villagename'] = entparse($arr['name']);
$report['from_x'] = $arr['x'];
$report['from_y'] = $arr['y'];

// An Dorf:
$result = $db->query("SELECT name,x,y from villages where id='".$report['to_village']."'");
$arr=$db->Fetch($result);
$report['to_villagename'] = entparse($arr['name']);
$report['to_x'] = $arr['x'];
$report['to_y'] = $arr['y'];

// Verteidigungseinheiten
$report_units['units_a'] = explode(";", $report['a_units']);

// gestorbene Verteidigung:
$report_units['units_b'] = explode(";", $report['b_units']);

$tpl->assign('cl_units', $cl_units);
$tpl->assign('report_units', $report_units);

?>