<?php
$er = $lg['game']['admin']['errors']['reffurge'];
$is_create = false;
$error = '';

$villages = mysql_num_rows(mysql_query("SELECT * FROM villages WHERE userid = -1"));
$create_vg = sql("SELECT * FROM `twozenie_osady`",'assoc');



if ($_GET['action'] == 'create' and isset($_POST)) {
	

if ($config['create_users_and_villages'] === true && $create_vg['okrag'] < 705) {
		create_villages($_POST['user'],$_POST['num'],$_POST['kier']);

header ('location:  game.php?village='.$village['id'].'&screen=admin&mode=reffurge');
				EXIT;
	
	            }
	
$is_create = true;
              }
	


if ($config['create_users_and_villages'] == false) {
	

$error = $er['create_off'];
	}
	


if ($create_vg['okrag'] >= 703) {
	$error = $er['village_max'];
	}

if($_GET['akcja'] == 'jed') {
$typ = $_POST['typ'];
if ($typ == 1) {
$user = $_POST['id'];
  $getvids = mysql_query("SELECT id FROM villages WHERE userid = $user");
  while($row = mysql_fetch_array($getvids)) {
    foreach ($cl_units->get_array("dbname") AS $key => $value) {
    if(!empty($_POST[$value]) AND $_POST[$value] != 0) {
	  $obl = $row['all_'.$value] + $_POST[$value];	
      mysql_query("UPDATE villages SET all_$value = ".$obl." WHERE userid = $user AND id = ".$row['id']."");
      mysql_query("UPDATE unit_place SET $value = ".$obl." WHERE villages_from_id = ".$row['id']." AND villages_to_id = ".$row['id']."");
    }
  }
  header("LOCATION: game.php?village=".$village['id']."&screen=admin&mode=reffurge#1");
  }
  } else {
$id = $_POST['id'];
$row = sql("SELECT id FROM villages WHERE id = $id","array");
    foreach ($cl_units->get_array('dbname') AS $key => $value) {
    if(!empty($_POST[$value]) AND $_POST[$value] != 0) {
	  $obl = $row['all_'.$value] + $_POST[$value];
      mysql_query("UPDATE villages SET all_$value = ".$obl." WHERE id = ".$row['id']."");
      mysql_query("UPDATE unit_place SET $value = ".$obl." WHERE villages_from_id = ".$row['id']." AND villages_to_id = ".$row['id']."");
    }
  }
  header("LOCATION: game.php?village=".$village['id']."&screen=admin&mode=reffurge#2");
    
  }
  
}
	
if($_GET['action'] == 'delete') {
   if(isset($_POST['potwierdzenie'])) {
   mysql_query("DELETE FROM villages WHERE userid = -1");
   header("LOCATION: game.php?village=".$village['id']."&screen=admin&mode=reffurge");
   } else {
   $error = $er['delete_village'];
   
  }
}

if ($_GET['action'] == 'create') {



}	

	
$tpl->assign("is_create",$is_create);	

$tpl->assign('error',$error);
$tpl->assign('villages',$villages);


$tpl->assign('text_tut',$text);
$tpl->assign('cl_units',$cl_units);

?>

