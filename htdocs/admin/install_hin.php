<?php

mysql_connect("localhost", "root", "");
mysql_select_db("lan");

$query1 = mysql_query("CREATE TABLE `hinweise` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `date` varchar(100) collate latin1_general_ci NOT NULL,
  `betreff` varchar(100) collate latin1_general_ci NOT NULL,
  `hinweis` text collate latin1_general_ci NOT NULL,
  `owner` varchar(50) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`))");
 
if($query1 == true)
   {
    echo "Erfolgreich Installiert! <br><br><a href='index.php?screen=hinweis'><< Zur&uuml;ck</a>";
   }
   else
   {
   echo "Bereits installiert, oder ein Fehler ist aufgetreten! <br><br><a href='index.php?screen=hinweis'><< Nochmal versuchen</a>";
   }

?>