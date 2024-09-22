<?php
//Alle bereits vorhandenen Hinweise holen!

$qu1 = $db->query("SHOW TABLES LIKE 'hinweise'");
$ft = mysql_num_rows($qu1);

if($ft != "0") { $hinweise = array(); 
$qu = $db->query("SELECT * FROM hinweise ORDER BY date DESC");
while($row = $db->fetch($qu))
  {
   $hinweise[] = $row;
  }

$tpl->assign("info", $hinweise);

}

//Einen neuen Hinweis Eintragen

if($_GET['action'] == "new")
   {
    $betreff = $_POST['betreff'];
	$owner = $_POST['owner'];
	$hinweis = htmlspecialchars($_POST['hinweis']);
	$time = time();
	$date = date("d.m.Y", $time);
	$zeit = date("H:i", $time);
    if($betreff AND $owner AND $hinweis != "")
	   {
	    $db->query("INSERT INTO hinweise (date, betreff, hinweis, owner) VALUES ('".$date." - ".$zeit."', '".$betreff."', '".$hinweis."', '".$owner."')");
	   }
	   else
	   {
	   Header("Location: index.php?screen=hinweis&action=false");
	   }
	}
if($_GET['action'] == "delete")
   {
    $id = $_GET['id'];
	$db->query("DELETE FROM hinweise WHERE id = '".$id."'");
   }
?>