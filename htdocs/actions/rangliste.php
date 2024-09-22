<?php
include('include/config.php');

$set_player = $config['set_player'];

$seite = $_GET["seite"];
if(!isset($seite))
   {
   $seite = 1;
   }
//User Rangliste
$start = $seite * $eintraege_pro_seite - $eintraege_pro_seite;
$users = array();
$query = $db->query("SELECT username, rang, points, id FROM users ORDER BY 'rang' LIMIT $set_player");
while($row = $db->fetch($query))
   {
    $users[] = $row;
   }

//Stamm Rangliste
$stamm = array();
$query_st = $db->query("SELECT * FROM ally ORDER BY 'rank' LIMIT $set_player");
while($row1 = $db->fetch($query_st))
   {
    $stamm[] = $row1;
   }

$tpl->assign('userInfo', $users);
$tpl->assign('stammInfo', $stamm);
?>