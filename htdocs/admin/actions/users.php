<?php
//******************//
//COPYRIGHT BY pL4n3//
//******************//

$id = $_GET['id']; //Überprüfen, ob die ID vorhanden ist 
$name = $_GET['name']; //Den Namen bei der Bearbeitung übergeben
if ($_GET['screen'] == 'users') {
$users = array();
//Daten der User aus der Datenbank holen
$query = $db->query("SELECT username, id, villages, rang, points, ally FROM users");
 while($row = $db->fetch($query))
    {
     $users[] = $row;
    }
}
if ($_GET['action'] == 'edit' && !empty($_POST['username']) && $_GET['mode'] == 'change_name') {
$name = $_POST['username'];
$id = $_GET['id'];
$user = $db->query("UPDATE users SET username = '$name' WHERE id = $id");
}
//USER AUS DEM SPIEL KICKEN
if ($_GET['action'] == 'edit' && $_GET['mode'] == 'kick') {
$id = $_GET['id'];
$kick = $db->query("DELETE FROM sessions WHERE userid = $id");
}
//USER LÖSCHEN
if ($_GET['action'] == 'edit' && $_GET['mode'] == 'delete') {
$id = $_GET['id'];
$delete = $db->query("DELETE FROM users WHERE id = $id");
}
//USER AUS SEINEM STAMM KICKEN
if ($_GET['action'] == 'edit' && $_GET['mode'] == 'kick_tribe') {
$id = $_GET['id'];
$kick_tribe = $db->query("UPDATE users SET ally = -1 WHERE id = $id");
}
//VILLAGES DER USER HOLEN
if ($_GET['screen'] == 'users' && $_GET['action'] == 'edit') {
$id = $_GET['id'];
$villages = array();
$village = $db->query("SELECT id, x, y, name, points, continent FROM villages WHERE userid = $id");
 while ($bla = $db->fetch($village)) {
         $bla['name'] = entparse($bla['name']);
         $villages[] = $bla;
      }
 }
 if ($_GET['screen'] == 'users' && $_GET['action'] == 'edit' && $_GET['mode'] == 'village') {
 $village_id = $_GET['village_id'];
 $village_gone = $db->query("UPDATE villages SET userid = -1 WHERE id = $village_id");
 }
//ID und die User an tpl übergeben
$tpl->assign('id', $id);
$tpl->assign('userInfo', $users);
$tpl->assign('username', $name);
$tpl->assign('villages', $villages);
?>
