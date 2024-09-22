<html>
<head>
<title>
Das Erforschungs-Tool!
</title>
</head>
<body>
<div align="center">
<?php
$village_id = $_GET["village"];

$verbindung = mysql_connect("localhost","root","");

mysql_select_db("lan");

$aendern = "UPDATE villages Set unit_spear_tec_level='1' WHERE id LIKE $village_id";
$update = mysql_query($aendern);

$aendern = "UPDATE villages Set unit_sword_tec_level='1' WHERE id LIKE $village_id";
$update = mysql_query($aendern);

$aendern = "UPDATE villages Set unit_axe_tec_level='1' WHERE id LIKE $village_id";
$update = mysql_query($aendern);

$aendern = "UPDATE villages Set unit_spy_tec_level='1' WHERE id LIKE $village_id";
$update = mysql_query($aendern);

$aendern = "UPDATE villages Set unit_light_tec_level='1' WHERE id LIKE $village_id";
$update = mysql_query($aendern);

$aendern = "UPDATE villages Set unit_heavy_tec_level='1' WHERE id LIKE $village_id";
$update = mysql_query($aendern);

$aendern = "UPDATE villages Set unit_ram_tec_level='1' WHERE id LIKE $village_id";
$update = mysql_query($aendern);

$aendern = "UPDATE villages Set unit_catapult_tec_level='1' WHERE id LIKE $village_id";
$update = mysql_query($aendern);

echo "
         <html>
         <head>
         <meta http-equiv=\"refresh\" content=\"0; URL=/game.php?village=$village_id&screen=smith\">
         </head>
         </html>";
?>
<br></a>
</div>
</body>


</html>