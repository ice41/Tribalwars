<?php
$id = $_GET['id'];
$name = $_GET['name'];
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * 20;
$sql = "SELECT COUNT(id) FROM users"; 
$rs_result = mysql_query($sql); 
$row = mysql_fetch_row($rs_result); 
$total_records = $row[0];
$total_pages = ceil($total_records / 20);

for ($i=1; $i<=$total_pages; $i++) { 
$page = $i;
$tpl->assign('page', $page);
}; 

if ($_GET['screen'] == 'users') {
$users = array();
//ARR//
$query = $db->query("SELECT delete_acc,last_activity,data_inregistrare,banned,username, id, villages, rang, points, ally FROM users ORDER BY rang LIMIT $start_from,20");
 while($row = $db->fetch($query))
    {
     $users[] = $row;
    }
}
//ACTION//
if ($_GET['action'] == 'edit' && !empty($_POST['username']) && $_GET['mode'] == 'change_name') {
$name = urlencode($_POST['username']);
$id = $_GET['id'];
$user = $db->query("UPDATE users SET username = '$name' WHERE id = $id");
}

//KICK//
if ($_GET['action'] == 'edit' && $_GET['mode'] == 'kick') {
$id = $_GET['id'];
$kick = $db->query("DELETE FROM sessions WHERE userid = $id");
}

//DELETE//
if ($_GET['action'] == 'edit' && $_GET['mode'] == 'delete') {
$id = $_GET['id'];
$delete = $db->query("DELETE FROM users WHERE id = $id");
$delete = $db->query("UPDATE villages SET userid = '-1' WHERE userid = $id");
}

//DEBANARE//
if ($_GET['debanare'] == 'user') {
$id = $_GET['id'];
$debanare = $db->query("UPDATE users SET banned = 'N' WHERE id = '$id'");
$debanare = $db->query("UPDATE users SET banned_for = '' WHERE id = '$id'");
header("Location: index.php?screen=users");
}

//BANAT//
if ($_GET['banat'] == 'user') {
header("Location: index.php?screen=users");
$id = $_GET['id'];
$for = $_POST['for'];
if (strlen($for) >= 5)
{
$banat = $db->query("UPDATE users SET banned = 'Y' WHERE id = $id");
$banat = $db->query("UPDATE users SET banned_for = '$for' WHERE id = $id");

}
else
{

}
}

//DELETE EASY//
if ($_GET['delete'] == 'user') {
$id = $_GET['id'];
$delete = $db->query("DELETE FROM users WHERE id = $id");
$delete = $db->query("UPDATE villages SET userid = '-1' WHERE userid = $id");
header("Location:index.php?screen=users");
}

//KICK TRIBE//
if ($_GET['action'] == 'edit' && $_GET['mode'] == 'kick_tribe') {
$id = $_GET['id'];
$kick_tribe = $db->query("UPDATE users SET ally = -1 WHERE id = $id");
}

//KICK VILLAGES//
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
 
$tpl->assign('err', $err);
$tpl->assign('id', $id);
$tpl->assign('userInfo', $users);
$tpl->assign('username', $name);
$tpl->assign('villages', $villages);
?>
