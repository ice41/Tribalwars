<?php
/***************************
/ Flüchtlingslager Spezial /
/       Version 2.1        /
/    coded by netbuster    /
/     edit by Yannici      /
/**************************/

define("fluela_version","2.1");
$units = array();
foreach($cl_units->get_array('name') AS $dbname=>$name) {
    $units[$dbname]['name'] = $name;
    $units[$dbname]['std_einheiten'] = 0;
}
$buildings = array();
foreach($cl_builds->get_array('name') AS $dbname=>$name) {
    $buildings[$dbname]['name'] = $name;
    $lvl = 0;
    if($name == "Hauptgebäude" or $name == "Versammlungsplatz" or $name == "Bauernhof" or $name == "Speicher" or $name == "Versteck"){
    	$lvl = 1;
    } 
    $buildings[$dbname]['std_lvl'] = $lvl;
}
//
//
//Checke auf neue Version
if($_GET['action'] == "version"){
$check_v = @file("http://ds-lan.de/index.php?page=Thread&threadID=897");
$check_v = join("*newline*",$check_v);
preg_match_all('/ Spezial V(.*) - Tools - DS Lan Support/',$check_v,$versionen);
$version = $versionen[1][0];
$new_version = "<b>Flüchtlingslager Spezial Version:</b> ".fluela_version."<br />
<b>Flüchtlingslager Spezial Version im Internet:</b> ".$version."<br />";
if($version > fluela_version){
	$new_version .= "<font class='error'>Die Fl&uuml;chtlingslager Version ".$version." ist draußen. Check this out: <a href='http://ds-lan.de/index.php?page=Thread&postID=9441' target='_new'>DSLan Support Forum</a>!</font>";
}
else{
	$new_version .= "Deine Version ist die aktuellste!";	
}
}
//
//
//Fl&uuml;chtlingslager erstellen
//
//
if($_GET["action"] == "" or $_GET["action"] == "creater"){
	$aktion_output = "create";
//Hier der Part, an dem die Fl&uuml;chtlingslager erstellt werden
if($_POST['welche_akt'] == "Erstellen"){
	$num = $_POST["num"];
	//Checke ob richtige Anzahl an zu erstellenden Fl&uuml;chtlingslagern.
	if($num > 0 and $num < 251){
		//Erstelle dann die D&ouml;rfer ;)
		for($u=0;$u<$num;$u++){
			create_village(-1,'',"random");
			$result = $db->query("SELECT * FROM villages WHERE userid='-1' ORDER BY id DESC");
			$row = $db->Fetch($result);
			$last_id = $row["id"];
			$sql = "";
			$i = 0;
			foreach($cl_builds->get_array('name') AS $dbname=>$name){
				if($i > 0) $sql .= ",";
				$sql .= $dbname."='".$_POST[$dbname]."'";
				$i++;
			}
			
			foreach($cl_units->get_array('name') AS $dbname=>$name){
				$sql .= ",all_".$dbname."='".$_POST[$dbname]."'";
			}
			$db->query("UPDATE villages SET ".$sql." WHERE id='".$last_id."'");
			reload_village_points($last_id);
			if($_POST["barbar"] == "yes"){
				$result = $db->query("SELECT points FROM villages WHERE id='".$last_id."'");
				$new_row = $db->Fetch($result);
				$db->query("UPDATE villages SET name='Barbarendorf',all_unit_spear='".$new_row["points"]."',all_unit_sword='".$new_row["points"]."' WHERE id='".$last_id."'");
			}
			else{
				$db->query("UPDATE villages SET name='Fl&uuml;chtlingslager' WHERE id='".$last_id."'");
			}
		}
		$success = true;
	}
	else{
		$error = "Es d&uuml;rfen maximal 250 und minimal 1 Fl&uuml;chtlingslager erstellt werden!";
	}
}
if($_POST['welche_akt'] == "Bearbeiten"){
		//Erstelle dann die D&ouml;rfer ;)
			$result = $db->query("SELECT * FROM villages WHERE id='".$_POST['vid']."' ORDER BY id DESC");
			$row = $db->Fetch($result);
			$last_id = $row["id"];
			$sql = "";
			$i = 0;
			foreach($cl_builds->get_array('name') AS $dbname=>$name){
				if($i > 0) $sql .= ",";
				$sql .= $dbname."='".$_POST[$dbname]."'";
				$i++;
			}
			
			foreach($cl_units->get_array('name') AS $dbname=>$name){
				$sql .= ",all_".$dbname."='".$_POST[$dbname]."'";
			}
			$db->query("UPDATE villages SET ".$sql." WHERE id='".$last_id."'");
			reload_village_points($last_id);
			if($_POST["barbar"] == "yes"){
				$result = $db->query("SELECT points FROM villages WHERE id='".$last_id."'");
				$new_row = $db->Fetch($result);
				$db->query("UPDATE villages SET name='Barbarendorf',all_unit_spear='".$new_row["points"]."',all_unit_sword='".$new_row["points"]."' WHERE id='".$last_id."'");
			}
			else{
			    $spear = $_POST['unit_spear'];
				$sword = $_POST['unit_sword'];
				$axe = $_POST['unit_axe'];
				$spy = $_POST['unit_spy'];
				$light = $_POST['unit_light'];
				$heavy = $_POST['unit_heavy'];
				$ram = $_POST['unit_ram'];
				$catapult = $_POST['unit_catapult'];
				$snob = $_POST['unit_snob'];
				$toll = $db->query("UPDATE villages SET name='Flüchtlingslager', all_unit_spear='$spear' , all_unit_sword='$sword' , all_unit_axe='$axe' , all_unit_spy='$spy' , all_unit_light='$light' , all_unit_heavy='$heavy' , all_unit_ram='$ram' , all_unit_catapult='$catapult' , all_unit_snob='$snob' WHERE id='".$last_id."'");
				$toll2 = $db->query("INSERT INTO unit_place (unit_spear, unit_sword, unit_axe, unit_spy, unit_light, unit_heavy, unit_ram, unit_catapult) VALUES ('$spear', '$sword', '$axe', '$spy', '$light', '$heavy', '$ram', '$catapult') WHERE villages_from_id = '".$last_id."'");
			}
		  $success = true;
}
}
//
//
//Fl&uuml;chtlingslager bearbeiten
//
//
if($_GET['action'] == "editmes"){
	$output = '<table class="vis" widht="300">
			<tr>
				<th colspan="2">Fl&uuml;chtlingslager bearbeiten</th>
			</tr>';
	$result = $db->query("SELECT * FROM villages WHERE userid='-1' ORDER by id ASC");
	while($row = $db->Fetch($result)){
		$add ="";
		if($row['name'] == "Barbarendorf"){
			$add = "<img src='../graphic/unit/unit_axe.png'>";
		}
		$output .= "<tr><td>#".$row['id']." ".$add."</td><td>".$row['x']."|".$row['y']."</td><td><a href='index.php?screen=fluela_special&action=edit&id=".$row['id']."'>".$row['points']." Punkte</a></td></tr>";
	}
	$output .= "</table><br /><br />
	<small><img src='../graphic/unit/unit_axe.png'> *Sind Barbarend&ouml;rfer!</small>";
}
//
//
//Fl&uuml;chtlingslager einzeln bearbeiten
//
//
if($_GET['action'] == "edit"){
	$aktion_output = "edit";
	$result = $db->query("SELECT * FROM villages WHERE id='".htmlspecialchars($_GET['id'])."'");
	$dorf = $db->Fetch($result);
	//Checke ob verlassenes dorf
	if($dorf["userid"] == "-1"){
		$tpl->assign('id',$dorf["id"]);
		$tpl->assign('xy',$dorf["x"].'|'.$dorf["y"]);
		$tpl->assign('points',$dorf["points"]);
		//Neu den Array generieren
		$buildings = array();
		foreach($cl_builds->get_array('name') AS $dbname=>$name) {
		    $buildings[$dbname]['name'] = $name;
		    $lvl = 0;
		    if($name == "Hauptgebäude" or $name == "Versammlungsplatz" or $name == "Bauernhof" or $name == "Speicher" or $name == "Versteck"){
		    	$lvl = 1;
		    } 
		    $buildings[$dbname]['std_lvl'] = $dorf[$dbname];
		}
		$units = array();
		foreach($cl_units->get_array('name') AS $dbname=>$name) {
		    $units[$dbname]['name'] = $name;
		    $units[$dbname]['std_einheiten'] = $dorf['all_'.$dbname];
		}
		
		if($dorf["name"] == "Barbarendorf")
		$dowhattodo = "document.getElementById('aX_barbar').checked = true; barbarendorf();";
	}
}
$tpl->assign('buildings',$buildings);
$tpl->assign('units',$units);
$tpl->assign('error',$error);
$tpl->assign('success',$success);
$tpl->assign('aktion',$aktion_output);
$tpl->assign('edit_output',$output);
$tpl->assign('new_version',$new_version);
$tpl->assign('dowhattodo',$dowhattodo);
?>