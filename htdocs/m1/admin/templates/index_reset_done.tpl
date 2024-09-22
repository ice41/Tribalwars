{php}
if ($_GET['do'] == 'soft')
{
mysql_query("TRUNCATE TABLE org1.groups");
mysql_query("UPDATE users SET noob_protection = '0'");
}
{/php}
<h2>Server resetat cu succes!</h2>

Serverul a fost resetat cu succes!

<a href="index.php?screen=reset">Inapoi</a>