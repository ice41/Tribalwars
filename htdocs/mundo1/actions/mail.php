<?php

//Start klasy bb_interpreter();
$bb_interpreter = new bb_interpreter($cl_builds,$cl_units,$pl);
$pl_trans = array(
	"in" => "Skrzynka odbiorcza",
	"out" => "Skrzynka nadawcza",
	"arch" => "Archiwum",
	"new" => "Napisz wiadomo��",
	"block" => "Zablokuj nadawc�");

$tpl->assign('pl_trans',$pl_trans);

// Sicherheits Ausf�hrungscheck:
if ($ACTIONS_MASSIVKEY_HIGHAAASSDD!='sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL') {
	die("Ação - execução executiva!");
}

if (!isset($_GET['mode']))
	$_GET['mode'] = "in";

// Alle Links im Men�
$links = array(
	$lang->grab("mail", "in") => "in",
	$lang->grab("mail", "out") => "out",
	$lang->grab("mail", "arch") => "arch",
	$lang->grab("mail", "new") => "new",
	$lang->grab("mail", "block") => "block"
);

// Welche mods d�rfen aufgerufen werden:
$allow_mods = array("in","out","new","block","arch");

if (in_array($_GET['mode'],$allow_mods)) {
	include("mail_".$_GET['mode'].".php");
}
else
{
	exit;
}

if($user['new_mail']==1) {
	$db->query("UPDATE users SET new_mail='0' where id='".$user['id']."'");
}

$tpl->assign("allow_mods", $allow_mods);
$tpl->assign("mode", $_GET['mode']);
$tpl->assign("links", $links);
?>