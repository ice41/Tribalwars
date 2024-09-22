<?php
// An Dorf:
$result = $db->query("SELECT name,x,y from villages where id='".$report['to_village']."'");
$arr=$db->Fetch($result);
$report['to_villagename'] = entparse($arr['name']);
$report['to_x'] = $arr['x'];
$report['to_y'] = $arr['y'];

// Von Jogador:
$result = $db->query("SELECT username from users where id='".$report['from_user']."'");
$arr=$db->Fetch($result);
$report['from_username'] = entparse($arr['username']);
?>