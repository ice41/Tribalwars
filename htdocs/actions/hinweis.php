<?php
include('include/config.php');
//Alle Hinweise holen

$hinweise = array();
$qu = $db->query("SELECT date, hinweis, betreff, owner FROM lan.hinweise ORDER BY date DESC");
while($row = mysql_fetch_assoc($qu))
   {
    $hinweise[] = $row;
   }

$tpl->assign("hinweisInfo", $hinweise);
?>