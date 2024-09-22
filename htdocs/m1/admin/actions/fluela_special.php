<?php
/***************************
/ Flüchtlingslager Spezial /
/       Version 2.1        /
/    coded by netbuster    /
/**************************/
$buildings = array();
foreach($cl_builds->get_array('name') AS $dbname=>$name) {
    $buildings[$dbname]['name'] = $name;
    $lvl = 0;
    if($name == "Cladirea principala" or $name == "Piata centrala" or $name == "Ferma" or $name == "Magazie" or $name == "Ascunzatoare"){
    	$lvl = 1;
    } 
    $buildings[$dbname]['std_lvl'] = $lvl;
}

if($_GET["action"] == "" or $_GET["action"] == "creater"){
	$aktion_output = "create";
if($_POST['welche_akt'] == "Erstellen"){
	$num = $_POST["num"];
	if($num > 0 and $num < 10000){
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
			$db->query("UPDATE villages SET ".$sql." WHERE id='".$last_id."'");
			reload_village_points($last_id);
			if($_POST["barbar"] == "yes"){
				$result = $db->query("SELECT points FROM villages WHERE id='".$last_id."'");
				$new_row = $db->Fetch($result);
				$db->query("UPDATE villages SET name='Sat parasit! :)',all_unit_spear='".$new_row["points"]."',all_unit_sword='".$new_row["points"]."' WHERE id='".$last_id."'");
			}
			else{
				$db->query("UPDATE villages SET name='Sat parasit! :)' WHERE id='".$last_id."'");
			}
		}
		$success = true;
	}
	else{
		$error = "Maximul de sate care poate fi adaugat este 10.000 si minimul 1! :)";
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

			$db->query("UPDATE villages SET ".$sql." WHERE id='".$last_id."'");
			reload_village_points($last_id);
			if($_POST["barbar"] == "yes"){
				$result = $db->query("SELECT points FROM villages WHERE id='".$last_id."'");
				$new_row = $db->Fetch($result);
				$db->query("UPDATE villages SET name='Sat parasit! :)',all_unit_spear='".$new_row["points"]."',all_unit_sword='".$new_row["points"]."' WHERE id='".$last_id."'");
			}
			else{
				$db->query("UPDATE villages SET name='Sat parasit! :)' WHERE id='".$last_id."'");
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
				<th colspan="2">Adaugare sate parasite /Editati</th>
			</tr>';
	$result = $db->query("SELECT * FROM villages WHERE userid='-1' ORDER by id ASC");
	while($row = $db->Fetch($result)){
		$add ="";
		if($row['name'] == "Barbarendorf"){
			$add = "<img src='../graphic/unit/unit_axe.png'>";
		}
		$output .= "<tr><td>#".$row['id']." ".$add."</td><td>".$row['x']."|".$row['y']."</td><td><a href='index.php?screen=fluela_special&action=edit&id=".$row['id']."'>".$row['points']." Puncte</a></td></tr>";
	}
	$output .= "</table><br /><br />
	<small><img src='../graphic/unit/unit_axe.png'> *Aici apar doar satele parasite!</small>";
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
		    if($name == "Cladirea principala" or $name == "Piata centrala" or $name == "Ferma" or $name == "Magazie" or $name == "Ascunzatoare"){
		    	$lvl = 1;
		    } 
		    $buildings[$dbname]['std_lvl'] = $dorf[$dbname];
		}
		$units = array();
		foreach($cl_units->get_array('name') AS $dbname=>$name) {
		    $units[$dbname]['name'] = $name;
		    $units[$dbname]['std_einheiten'] = $dorf['all_'.$dbname];
		}
		
	}
}
$tpl->assign('buildings',$buildings);
$tpl->assign('error',$error);
$tpl->assign('success',$success);
$tpl->assign('aktion',$aktion_output);
$tpl->assign('edit_output',$output);
$tpl->assign('new_version',$new_version);
$tpl->assign('dowhattodo',$dowhattodo);
?>