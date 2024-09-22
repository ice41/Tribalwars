<?php
$village = $_GET['village'];

$query = $db->query("SELECT * FROM villages WHERE id = '".$village."'");
$row = $db->fetch($query);

if($_GET['delete'] == 'unit_spear')
   {
	 
	$db->query("UPDATE villages SET r_bh = r_bh - '".$row['all_unit_spear']."' WHERE id = '$village'");
	
	$db->query("UPDATE villages SET all_unit_spear = '0' WHERE id = '".$village."'");
	$db->query("UPDATE unit_place SET unit_spear = '0' WHERE villages_from_id = '".$village."'");
	$db->query("UPDATE unit_place SET unit_spear = '0' WHERE villages_to_id = '".$village."'");
	Header("Location: game.php?village=$village&screen=overview");
	exit();
   }

if($_GET['delete'] == 'unit_sword')
   {
	 
	$db->query("UPDATE villages SET r_bh = r_bh - '".$row['all_unit_sword']."' WHERE id = '$village'");
	
	$db->query("UPDATE unit_place SET unit_sword = '0' WHERE villages_from_id = '".$village."'");
	$db->query("UPDATE unit_place SET unit_sword = '0' WHERE villages_to_id = '".$village."'");
	$db->query("UPDATE villages SET all_unit_sword = '0' WHERE id = '".$village."'");
	Header("Location: game.php?village=$village&screen=overview");
	exit();
   }

if($_GET['delete'] == 'unit_axe')
   {
	 
	$db->query("UPDATE villages SET r_bh = r_bh - '".$row['all_unit_axe']."' WHERE id = '$village'");
	
	$db->query("UPDATE unit_place SET unit_axe = '0' WHERE villages_from_id = '".$village."'");
	$db->query("UPDATE unit_place SET unit_axe = '0' WHERE villages_to_id = '".$village."'");
	$db->query("UPDATE villages SET all_unit_axe = '0' WHERE id = '".$village."'");
	Header("Location: game.php?village=$village&screen=overview");
	exit();
   }

if($_GET['delete'] == 'unit_spy')
   {
	$spy = $row['all_unit_spy'] * 2;
	$db->query("UPDATE villages SET r_bh = r_bh - '".$spy."' WHERE id = '$village'");
	
	$db->query("UPDATE unit_place SET unit_spy = '0' WHERE villages_from_id = '".$village."'");
	$db->query("UPDATE unit_place SET unit_spy = '0' WHERE villages_to_id = '".$village."'");
	$db->query("UPDATE villages SET all_unit_spy = '0' WHERE id = '".$village."'");
	Header("Location: game.php?village=$village&screen=overview");
	exit();
   }

if($_GET['delete'] == 'unit_light')
   {
	$light = $row['all_unit_light'] * 4;
	$db->query("UPDATE villages SET r_bh = r_bh - '".$light."' WHERE id = '$village'");
	
	$db->query("UPDATE unit_place SET unit_light = '0' WHERE villages_from_id = '".$village."'");
	$db->query("UPDATE unit_place SET unit_light = '0' WHERE villages_to_id = '".$village."'");
	$db->query("UPDATE villages SET all_unit_light = '0' WHERE id = '".$village."'");
	Header("Location: game.php?village=$village&screen=overview");
	exit();
   }

if($_GET['delete'] == 'unit_heavy')
   {
	$heavy = $row['all_unit_heavy'] * 6;
	$db->query("UPDATE villages SET r_bh = r_bh - '".$heavy."' WHERE id = '$village'");
	
	$db->query("UPDATE unit_place SET unit_heavy = '0' WHERE villages_from_id = '".$village."'");
	$db->query("UPDATE unit_place SET unit_heavy = '0' WHERE villages_to_id = '".$village."'");
	$db->query("UPDATE villages SET all_unit_heavy = '0' WHERE id = '".$village."'");
	Header("Location: game.php?village=$village&screen=overview");
	exit();
   }

if($_GET['delete'] == 'unit_ram')
   {
	$ram = $row['all_unit_ram'] * 5;
	$db->query("UPDATE villages SET r_bh = r_bh - '".$ram."' WHERE id = '$village'");
	
	$db->query("UPDATE unit_place SET unit_ram = '0' WHERE villages_from_id = '".$village."'");
	$db->query("UPDATE unit_place SET unit_ram = '0' WHERE villages_to_id = '".$village."'");
	$db->query("UPDATE villages SET all_unit_ram = '0' WHERE id = '".$village."'");
	Header("Location: game.php?village=$village&screen=overview");
	exit();
   }

if($_GET['delete'] == 'unit_catapult')
   {
	$catapult = $row['all_unit_catapult'] * 8;
	$db->query("UPDATE villages SET r_bh = r_bh - '".$catapult."' WHERE id = '$village'");
	
	$db->query("UPDATE unit_place SET unit_catapult = '0' WHERE villages_from_id = '".$village."'");
	$db->query("UPDATE unit_place SET unit_catapult = '0' WHERE villages_to_id = '".$village."'");
	$db->query("UPDATE villages SET all_unit_catapult = '0' WHERE id = '".$village."'");
	Header("Location: game.php?village=$village&screen=overview");
	exit();
   }

if($_GET['delete'] == 'unit_snob')
   {
    $db->query("UPDATE villages SET recruited_snobs = recruited_snobs - '".$row['all_unit_snob']."' WHERE id = '$village'");
	
	$snob = $row['all_unit_snob'] * 100;
	$db->query("UPDATE villages SET r_bh = r_bh - '".$snob."' WHERE id = '$village'");
	
	$db->query("UPDATE unit_place SET unit_snob = '0' WHERE villages_from_id = '".$village."'");
	$db->query("UPDATE unit_place SET unit_snob = '0' WHERE villages_to_id = '".$village."'");
	$db->query("UPDATE villages SET all_unit_snob = '0' WHERE id = '".$village."'");
	Header("Location: game.php?village=$village&screen=overview");
	exit();
   }
?>