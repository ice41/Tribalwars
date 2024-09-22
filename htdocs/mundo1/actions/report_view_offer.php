<?php
// Sicherheits Ausf�hrungscheck:
if ($ACTIONS_MASSIVKEY_HIGHAAASSDD!='sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL') {
	die("Ação - Exec!");
}

/** Resses an Zieldorf angekommen **/

// An Jogador:
$result = $db->query("SELECT username from users where id='".$report['to_user']."'");
$arr=$db->Fetch($result);
$report['to_username'] = entparse($arr['username']);

// Von Jogador:
$result = $db->query("SELECT username from users where id='".$report['from_user']."'");
$arr=$db->Fetch($result);
$report['from_username'] = entparse($arr['username']);

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

// Ressis -> hives hei�t zwar Beute, aber sonst muss ich noch eine Spalte in der DB erstellen :-).
list($report['buy'],$report['sell'],$report['buy_ress'],$report['sell_ress']) = explode(";", $report['hives']);

?>