<?php
/*//////////////////////*/
//CALL-ME-THE-VILLAGE-ID//
////////ADMIN-TOOL////////
////BY INGAME: Yannici////
//////YANNIC SCHNETZ//////
/*//////////////////////*/

//Holen der Userdaten aus der MySQL Tabelle.
$users = array();
$queryuser = $db->query("SELECT * FROM users");
while($row = $db->fetch($queryuser))
   {
    $users[] = $row;
   }

//Holen der Dorfdaten aus der MySQL Tabelle.
$village = array();
$queryvillage = $db->query("SELECT * FROM villages ORDER BY userid");
while($row = $db->fetch($queryvillage))
   {
    $row['name'] = entparse($row['name']);
    $village[] = $row;
   }
//Daten an das Template weitergeben.
$tpl->assign('userInfo', $users);
$tpl->assign('villageInfo', $village);
?>