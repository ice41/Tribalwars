<?php
// Sicherheits Ausf�hrungscheck:
if ($ACTIONS_MASSIVKEY_HIGHAAASSDD!='sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL') {
	die("Ação - Exec!");
}

/** ANGRIFFSBERICHT **/

// Von Jogador:
$result = $db->query("SELECT username from users where id='".$report['from_user']."'");
$arr=$db->Fetch($result);
$report['from_username'] = entparse($arr['username']);

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

// Einheiten Angreifer
$report_units['units_a'] = explode(";", $report['a_units']);

// Einheiten Angreifer Verluste
$report_units['units_b'] = explode(";", $report['b_units']);

// Einheiten Verteidiger
$report_units['units_c'] = explode(";", $report['c_units']);

// Einheiten Verteidiger Verluste
$report_units['units_d'] = explode(";", $report['d_units']);

// Einheiten Unterwegs
$report_units['units_e'] = explode(";", $report['e_units']);

// Beute:
$ex = explode(";", $report['hives']);
$report_ress['wood'] = $ex['0'];
$report_ress['stone'] = $ex['1'];
$report_ress['iron'] = $ex['2'];
$report_ress['sum'] = $ex['3'];
$report_ress['max'] = $ex['4'];

// Ramme:
$ex = explode(";", $report['ram']);
$report_ram['from'] = $ex['0'];
$report_ram['to'] = $ex['1'];

// Katapultschaden:
$ex = explode(";", $report['catapult']);
$report_catapult['from'] = $ex['0'];
$report_catapult['to'] = $ex['1'];
$report_catapult['building'] = $ex['2'];

// Zustimmung:
$ex = explode(";", $report['agreement']);
$report_agreement['from'] = $ex['0'];
$report_agreement['to'] = $ex['1'];

// Verteidigungstruppen sehen?
$see_def_units = ($report['see_def_units']==1)?true:false;

$tpl->assign('cl_units', $cl_units);
$tpl->assign("cl_builds", $cl_builds);
$tpl->assign('moral_activ', $config['moral_activ']);
$tpl->assign('report_units', $report_units);
$tpl->assign('see_def_units', $see_def_units);
$tpl->assign('report_ress', $report_ress);
$tpl->assign('report_ram', $report_ram);
$tpl->assign("damage_ram", '', $report_ram['from'], $report_ram['to']);
$tpl->assign("agreement_change", '', $report_agreement['from'], $report_agreement['to']);
$tpl->assign("damage_catapult", '', $report_catapult['from'], $report_catapult['to']);
$tpl->assign('report_catapult', $report_catapult);
$tpl->assign('report_agreement', $report_agreement);
?>