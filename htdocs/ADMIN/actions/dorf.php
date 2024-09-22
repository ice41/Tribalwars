<?php
/*-------------------------------+
| Script by Manuel Mannhardt     |
| Ingame/Forum SlimShady95       |
+-------------------------------*/
include("http://localhost/include.inc.php");
$users = array();
$query = $db->query("SELECT username, id FROM users");
while($row = $db->fetch($query))
 {
  $row["username"] = entparse($row["username"]);
  $users[] = $row;
 }
$tpl->assign('id', $id);
$tpl->assign('userInfo', $users);
$tpl->assign('username', $name);
if($_GET["action"] == "mach")
 {
  if($_POST["anzahl1"] != "" AND $_POST["userid1"] != "")
   {
    $anzahl = $_POST["anzahl1"];
    $i = 0;
    while($i<$anzahl)
     {
      create_village($_POST["userid1"], $username=$_POST["name1"], $_POST["direction1"]);
      $i++;
     }
   }
  if($_POST["anzahl2"] != "" AND $_POST["userid2"] != "")
   {
    $anzahl = $_POST["anzahl2"];
    $i = 0;
    while($i<$anzahl)
     {
      create_village($_POST["userid2"], $username=$_POST["name2"], $_POST["direction2"]);
      $i++;
     }
   }
  if($_POST["anzahl3"] != "" AND $_POST["userid3"] != "")
   {
    $anzahl = $_POST["anzahl3"];
    $i = 0;
    while($i<$anzahl)
     {
      create_village($_POST["userid3"], $username=$_POST["name3"], $_POST["direction3"]);
      $i++;
     }
   }
  if($_POST["anzahl4"] != "" AND $_POST["userid4"] != "")
   {
    $anzahl = $_POST["anzahl4"];
    $i = 0;
    while($i<$anzahl)
     {
      create_village($_POST["userid4"], $username=$_POST["name4"], $_POST["direction4"]);
      $i++;
     }
   }
  if($_POST["anzahl5"] != "" AND $_POST["userid5"] != "")
   {
    $anzahl = $_POST["anzahl5"];
    $i = 0;
    while($i<$anzahl)
     {
      create_village($_POST["userid5"], $username=$_POST["name5"], $_POST["direction5"]);
      $i++;
     }
   }
 	reload_all_village_points();
	reload_all_ally_points();
	reload_all_player_points();
	reload_ally_rangs();
	reload_player_rangs();
 }
?>
