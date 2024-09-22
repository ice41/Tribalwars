

<?php

$Szenarien = '
  <h4>Szenario laden</h4>
  <form action="Szenarien/SzenarioL.php" method="post">
  <input type="text" size="17" name="Inhalt">
  <br><br>
  <center>
  <input type="submit" value="OK">
  </center>
  </form>
  <hr>
  <h4>Szenario erstellen</h4>
  <form action="Szenarien/SzenarioC.php" method="post">
  <input type="text" size="17" name="Inhalt">
  <br><br>
  <center>
  <input type="submit" value="OK">
  </center>
  </form>
';

if(isset($_POST['submit'])) {

include 'config.php';
include 'opendb.php';

$tableName  = 'dslan';
$backupFile = '.sql';
$query      = "LOAD DATA INFILE 'backupFile' INTO TABLE $tableName";
$result = mysql_query($query);

include 'closedb.php';

    exit;
}
$tpl->assign('szenarien', $Szenarien);
?>