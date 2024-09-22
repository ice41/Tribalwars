<?php
if($_GET['action'] == "loeschen")
   {
    $village = $_GET['village'];

    $query = $db->query("SELECT * FROM villages WHERE id = '".$village."'");
    $row = $db->fetch($query);
	
    $anzahl_unit_spear = $_POST['unit_spear'];
	$anzahl_unit_sword = $_POST['unit_sword'];
	$anzahl_unit_axe = $_POST['unit_axe'];
	$anzahl_unit_spy = $_POST['unit_spy'];
	$anzahl_unit_light = $_POST['unit_light'];
	$anzahl_unit_heavy = $_POST['unit_heavy'];
	$anzahl_unit_ram = $_POST['unit_ram'];
	$anzahl_unit_catapult = $_POST['unit_catapult'];
	$anzahl_unit_snob = $_POST['unit_snob'];
	
	if($row['all_unit_spear'] > $anzahl_unit_spear OR $row['all_unit_spear'] = $anzahl_unit_spear AND $row['all_unit_sword'] > $anzahl_unit_sword OR $row['all_unit_sword'] = $anzahl_unit_sword AND $row['all_unit_axe'] > $anzahl_unit_axe OR $row['all_unit_axe'] = $anzahl_unit_axe AND $row['all_unit_spy'] > $anzahl_unit_spy OR $row['all_unit_spy'] = $anzahl_unit_spy AND $row['all_unit_light'] > $anzahl_unit_light OR $row['all_unit_light'] = $anzahl_unit_light AND $row['all_unit_heavy'] > $anzahl_unit_heavy OR $row['all_unit_heavy'] = $anzahl_unit_heavy AND $row['all_unit_ram'] > $anzahl_unit_ram OR $row['all_unit_ram'] = $anzahl_unit_ram AND $row['all_unit_catapult'] > $anzahl_unit_catapult OR $row['all_unit_catapult'] = $anzahl_unit_catapult AND $row['all_unit_snob'] > $anzahl_unit_snob OR $row['all_unit_snob'] = $anzahl_unit_snob)
	   {
	$db->query("UPDATE villages SET r_bh = r_bh - '".$anzahl_unit_spear."' WHERE id = '$village'");
	
	$db->query("UPDATE villages SET all_unit_spear = all_unit_spear - ".$anzahl_unit_spear." WHERE id = '".$village."'");
	$db->query("UPDATE unit_place SET unit_spear = unit_spear - ".$anzahl_unit_spear." WHERE villages_from_id = '".$village."'");
	$db->query("UPDATE unit_place SET unit_spear = unit_spear - ".$anzahl_unit_spear." WHERE villages_to_id = '".$village."'");
	
	
	$db->query("UPDATE villages SET r_bh = r_bh - '".$anzahl_unit_sword."' WHERE id = '$village'");
	
	$db->query("UPDATE unit_place SET unit_sword = unit_sword - ".$anzahl_unit_sword." WHERE villages_from_id = '".$village."'");
	$db->query("UPDATE unit_place SET unit_sword = unit_sword - ".$anzahl_unit_sword." WHERE villages_to_id = '".$village."'");
	$db->query("UPDATE villages SET all_unit_sword = all_unit_sword - ".$anzahl_unit_sword." WHERE id = '".$village."'");
	
	
	$db->query("UPDATE villages SET r_bh = r_bh - '".$anzahl_unit_axe."' WHERE id = '$village'");
	
	$db->query("UPDATE unit_place SET unit_axe = unit_axe - ".$anzahl_unit_axe." WHERE villages_from_id = '".$village."'");
	$db->query("UPDATE unit_place SET unit_axe = unit_axe - ".$anzahl_unit_axe." WHERE villages_to_id = '".$village."'");
	$db->query("UPDATE villages SET all_unit_axe = all_unit_axe - ".$anzahl_unit_axe." WHERE id = '".$village."'");
	
	
	$spy = $anzahl_unit_spy * 2;
	$db->query("UPDATE villages SET r_bh = r_bh - '".$spy."' WHERE id = '$village'");
	
	$db->query("UPDATE unit_place SET unit_spy = unit_spy - ".$anzahl_unit_spy." WHERE villages_from_id = '".$village."'");
	$db->query("UPDATE unit_place SET unit_spy = unit_spy - ".$anzahl_unit_spy." WHERE villages_to_id = '".$village."'");
	$db->query("UPDATE villages SET all_unit_spy = all_unit_spy - ".$anzahl_unit_spy." WHERE id = '".$village."'");
	
	
	$light = $anzahl_unit_light * 4;
	$db->query("UPDATE villages SET r_bh = r_bh - '".$light."' WHERE id = '$village'");
	
	$db->query("UPDATE unit_place SET unit_light = unit_light - ".$anzahl_unit_light." WHERE villages_from_id = '".$village."'");
	$db->query("UPDATE unit_place SET unit_light = unit_light - ".$anzahl_unit_light." WHERE villages_to_id = '".$village."'");
	$db->query("UPDATE villages SET all_unit_light = all_unit_light - ".$anzahl_unit_light." WHERE id = '".$village."'");
	
	
	$heavy = $anzahl_unit_heavy * 6;
	$db->query("UPDATE villages SET r_bh = r_bh - '".$heavy."' WHERE id = '$village'");
	
	$db->query("UPDATE unit_place SET unit_heavy = unit_heavy - ".$anzahl_unit_heavy." WHERE villages_from_id = '".$village."'");
	$db->query("UPDATE unit_place SET unit_heavy = unit_heavy - ".$anzahl_unit_heavy." WHERE villages_to_id = '".$village."'");
	$db->query("UPDATE villages SET all_unit_heavy = all_unit_heavy - ".$anzahl_unit_heavy." WHERE id = '".$village."'");
	
	
	$ram = $anzahl_unit_ram * 5;
	$db->query("UPDATE villages SET r_bh = r_bh - '".$ram."' WHERE id = '$village'");
	
	$db->query("UPDATE unit_place SET unit_ram = '0' WHERE villages_from_id = '".$village."'");
	$db->query("UPDATE unit_place SET unit_ram = '0' WHERE villages_to_id = '".$village."'");
	$db->query("UPDATE villages SET all_unit_ram = '0' WHERE id = '".$village."'");
	
	
	$catapult = $anzahl_unit_catapult * 8;
	$db->query("UPDATE villages SET r_bh = r_bh - '".$catapult."' WHERE id = '$village'");
	
	$db->query("UPDATE unit_place SET unit_catapult = unit_catapult - ".$anzahl_unit_catapult." WHERE villages_from_id = '".$village."'");
	$db->query("UPDATE unit_place SET unit_catapult = unit_catapult - ".$anzahl_unit_catapult." WHERE villages_to_id = '".$village."'");
	$db->query("UPDATE villages SET all_unit_catapult = all_unit_catapult - ".$anzahl_unit_catapult." WHERE id = '".$village."'");
	
	
	$db->query("UPDATE villages SET recruited_snobs = recruited_snobs - '".$anzahl_unit_snob."' WHERE id = '$village'");
	
	$snob = $anzahl_unit_snob * 100;
	$db->query("UPDATE villages SET r_bh = r_bh - '".$snob."' WHERE id = '$village'");
	
	$db->query("UPDATE unit_place SET unit_snob = unit_snob - ".$anzahl_unit_snob." WHERE villages_from_id = '".$village."'");
	$db->query("UPDATE unit_place SET unit_snob = unit_snob - ".$anzahl_unit_snob." WHERE villages_to_id = '".$village."'");
	$db->query("UPDATE villages SET all_unit_snob = all_unit_snob - ".$anzahl_unit_snob." WHERE id = '".$village."'");
	
	   }
	   else
	   {
	   echo "<font color='red'>Nicht gen&uuml;gend Einheiten vorhanden!</font>";
	   }
	}
?>