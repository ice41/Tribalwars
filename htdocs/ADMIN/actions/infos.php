<?php
/*************************/
/*Alle Informationen v0.2*/
/*////////Made by////////*/
/*////////Yannici////////*/
/*************************/

//DATEN DER DÖRFER HOLEN
$vill = array();
$query_v = $db->query("SELECT * FROM `villages` ORDER BY id");
while($ent = $db->fetch($query_v))
   {
    $ent['name'] = entparse($ent['name']);
	$vill[] = $ent;
   }
//DATEN DER SPIELER HOLEN
$users = array();
$query_u = $db->query("SELECT * FROM users ORDER BY id");
while($row1 = $db->fetch($query_u))
   {
    $users[] = $row1;
   }
//DATEN DER TRUPPEN HOLEN
$unit = array();
$query_t = $db->query("SELECT * FROM unit_place ORDER BY villages_from_id");
while($row2 = $db->fetch($query_t))
   {
    $unit[] = $row2;
   }

//DATEN DER STÄMME HOLEN
$ally = array();
$query_a = $db->query("SELECT * FROM ally ORDER BY id");
while($blu = $db->fetch($query_a))
   {
    $blu['description'] = entparse($blu['description']);
	$blu['start'] = entparse($blu['start']);
	$blu['end'] = entparse($blu['end']);
    $blu['name'] = entparse($blu['name']);
	$ally[] = $blu;
   }
//GEPSEICHERTE RUNDEN HOLEN
$round = array();
$query_r = $db->query("SELECT * FROM save_rounds ORDER BY id");
while($bli = $db->fetch($query_r))
   {
    $bli['description'] = entparse($bli['description']);
	$bli['start'] = entparse($bli['start']);
	$bli['end'] = entparse($bli['end']);
    $bli['name'] = entparse($bli['name']);
	$bli['name'] = entparse($bli['name']);
	$round[] = $bli;
   }
   
//DATEN AN DAS TEMPLATE SENDEN
$tpl->assign("villInfo", $vill);
$tpl->assign("userInfo", $users);
$tpl->assign("unitInfo", $unit);
$tpl->assign("allyInfo", $ally);
$tpl->assign("saveInfo", $round);
?>