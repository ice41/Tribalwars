<?php
$seite = $_GET["view"];  //Abfrage auf welcher Seite man ist

//Wenn man keine Seite angegeben hat, ist man automatisch auf Seite 1
if(!isset($seite))
   {
   $seite = 1;
   }

//Verbindung zu Datenbank aufbauen

include("include/config.php");


//Einträge pro Seite: Hier 15 pro Seite
$eintraege_pro_seite = 15;

//Ausrechen welche Spalte man zuerst ausgeben muss:

$start = $seite * $eintraege_pro_seite - $eintraege_pro_seite;


//Tabelle Abfragen
//Tabelle hei&szlig;t hier einfach: Tabelle
$abfrage = "SELECT id FROM reports LIMIT $start, $eintraege_pro_seite";
$ergebnis = mysql_query($abfrage);
while($row = mysql_fetch_object($ergebnis))
    {
   echo $row->id."<br>"; // Hier die Ausgabe der Einträge
   }


//Jetzt kommt das "Inhaltsverzeichnis",
//sprich dort steht jetzt: Seite: 1 2 3 4 5


//Wieviele Einträge gibt es überhaupt

//Wichtig! Hier muss die gleiche Abfrage sein, wie bei der Ausgabe der Daten
//also der gleiche Text wie in der Variable $abfrage, blo&szlig; das hier das LIMIT fehlt
//Sonst funktioniert die Blätterfunktion nicht richtig,
//und hier kann nur 1 Feld abgefragt werden, also id

$result = mysql_query("SELECT id FROM reports");
$menge = mysql_num_rows($result);

//Errechnen wieviele Seiten es geben wird
$wieviel_seiten = $menge / $eintraege_pro_seite;

//Ausgabe der Links zu den Seiten
for($a=0; $a < $wieviel_seiten; $a++)
   {
   $b = $a + 1;
   $tpl->assign("info", $b);
   }

$tpl->assign("info", $b);
?> 