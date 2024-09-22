<?php
// Sicherheits Ausf�hrungscheck:
if ($ACTIONS_MASSIVKEY_HIGHAAASSDD!='sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL') {
	die("Ação - Exec!");
}

// Von Jogador:
$result = $db->query("SELECT username from users where id='".$report['from_user']."'");
$arr=$db->Fetch($result);
$report['from_username'] = entparse($arr['username']);

// Stamm auslesen:
$result = $db->query("SELECT COUNT(id) AS count from ally where id='".$report['ally']."'");
$arr = $db->Fetch($result);
$report['ally_exist'] = $arr['count'];
$report['allyname'] = entparse($report['allyname']);

if($report['ally_exist'] == 0) {
  $invite = sprintf($lang->grab("report_view_ally_invite", "no_ally"), $village['id'],
                                $report['from_user'], entparse($report['from_username']),
                                entparse($report['allyname']));
}
else {
  $invite = sprintf($lang->grab("report_view_ally_invite", "ally"), $village['id'],
                                $report['from_user'], entparse($report['from_username']),
                                $village['id'], $report['ally'], entparse($report['allyname']));
}
$tpl->assign("invite", $invite);
?>