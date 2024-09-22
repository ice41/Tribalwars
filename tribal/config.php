<?
//Login-Datenbank
$server = "localhost"; //Server
$user = "root";        //Datenbankuser
$password = "plemionka";        //Datenbankpasswort
$datenbank = "index_tw";        //Datenbank zum Login server!
$connect = mysql_connect($server, $user, $password);
if(!$i) {
mysql_select_db($datenbank, $connect) or header("Location: install");
}
include "mconf.php";
?>