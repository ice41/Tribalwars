<?php
/* 
Original DS-LAN wurde Programmiert von DBGTMaster.

Dieses Programm steht unter der GPL.
Es wurde Programmiert von Vorcers (alias spam4ms/Mighty)

Ich übernehme keine Haftung für evtl. Schäden die dieses Programm verursacht.


*/



//INCLUDE("../lib/smarty/Smarty.class.php");

//Dateien
//global $file_units; global $file_techs;
global $file_units;
global $file_tech;
$file_units = "../../include/configs/units.php";
$file_tech = "../../include/configs/techs.php";

/* Verschiedene Wichtige Arrays */ 

//Spezifikation der Truppen Fortbewegungsarten
$arr_unit_group = array();
$arr_unit_group[0] = "foot"; //Fußtruppen (dazu Zählen auch Belagerungswaffen)
$arr_unit_group[1] = "cav"; //Kavalarie
$arr_unit_group[2] = "foot"; //Belagerungswaffen

//Spezifikation der Truppen Fortbewegungsarten
$arr_unit_tech_group = array();
$arr_unit_tech_group[0] = "Infanterie"; //Fußtruppen (dazu Zählen auch Belagerungswaffen)
$arr_unit_tech_group[1] = "Kavallerie"; //Kavalarie
$arr_unit_tech_group[2] = "Belagerungswaffen"; //Belagerungswaffen // NUR FÜR function add_unit_tec_config()


//Spezifikation für das Ausbilden, "wo"
$arr_unit_recruit_in = array();
$arr_unit_recruit_in[0] = "barracks"; //Kaserne
$arr_unit_recruit_in[1] = "stable"; //Stall
$arr_unit_recruit_in[2] = "garage"; //Werkstatt
$arr_unit_recruit_in[3] = "snob";  //Adelshof !! Achtung! Bei Benutzung des Adelshofes für zusätzliche Einheiten AUßER dem Adelsgeschlecht führt dies zu Fehlern!

$arr_error = array();
$arr_error[100] = "Es wurde mindestens 1 Wert in \"add_unit_config\" nicht &uuml;bergeben, bzw. leer &uuml;bergeben.";

/* Funktionen */

// Allgemeines //

//Relikt von Delphi ^^
function showmessage($msg)
{
	echo "<script type=\"text/javascript\">";
	echo "alert(\"$msg\");";
	echo "</script>";
}

// DS-Spezifisch

//Unit-Add Funktionen für config

function create_string_needed($building,$level)
{
	$string = "\"$building\"=>\"$level\"";
	return $string;
}

function add_unit_config($name,$descr, //beschreibungen
			$wood,$stone,$iron,$bh,$time, //Preise
			$att,$def,$defcav,$defarcher,$speed,$booty, //Stärken
			$needed,$recruit_in, //Sonstiges
			$specials, //Keine Ahnung
			$group, //Was ist es
			$extdescr) //ausführliche beschreibung
{
	$error = -1;
	//Bitte nicht über die überprüfung beschweren, das ist simpel und sicher :-P
	if ($name == "") $error = 100;
	if ($descr == "") $error = 100;
	if ($wood == "") $error = 100;
	if ($stone == "") $error = 100;
	if ($iron == "") $error = 100;
	if ($bh == "") $error = 100;
	if ($time == "") $error = 100;
	if ($att == "") $error = 100;
	if ($def == "") $error = 100;
	if ($defcav == "") $error = 100;
	if ($speed == "") $error = 100;
	if ($booty == "") $error = 100;
	//if ($needed == "") $error = 100;
	if ($recruit_in == "") $error = 100;
	//if ($specials == "") $error = 100;
	if ($group == "") $error = 100;

	if ($error == -1)
	{
		//Datei einlesen
		$new_unit = file($GLOBALS['file_units']);
		
		for ($I = 0; $I <= count($new_unit); $I++)
			if (!(strpos($new_unit[$I],"?>") === false))	
				unset($new_unit[$I]);
		
		$new_unit[] = "\n\n";
		$new_unit[] = '$cl_units->add_unit("'.$descr.'","unit_'.$name.'");'."\n";
		$new_unit[] = '$cl_units->set_woodprice("'.$wood.'");'."\n";
		$new_unit[] = '$cl_units->set_stoneprice("'.$stone.'");'."\n";
		$new_unit[] = '$cl_units->set_ironprice("'.$iron.' ");'."\n";
		$new_unit[] = '$cl_units->set_bhprice("'.$bh.'");'."\n";
		$new_unit[] = '$cl_units->set_time("'.$time.'");'."\n";
		$new_unit[] = '$cl_units->set_att("'.$att.'","1.045");'."\n";
		$new_unit[] = '$cl_units->set_def("'.$def.'","1.045");'."\n";
		$new_unit[] = '$cl_units->set_defcav("'.$defcav.'","1.045");'."\n";
		$new_unit[] = '$cl_units->set_defarcher("'.$defarcher.'","1.045");'."\n";
		$new_unit[] = '$cl_units->set_speed("'.$speed.'");'."\n";
		$new_unit[] = '$cl_units->set_booty("'.$booty.'");'."\n";
		$new_unit[] = '$cl_units->set_needed(array('.$needed.'));'."\n";
		$new_unit[] = '$cl_units->set_recruit_in("'.$recruit_in.'");'."\n";
		$new_unit[] = '$cl_units->set_specials(array("'.$specials.'"));'."\n";
		$new_unit[] = '$cl_units->set_group("'.$group.'");'."\n";
		if ($recruit_in == "barracks")	$new_unit[] = '$cl_units->set_col("A");'."\n";	
		if ($recruit_in == "stable")	$new_unit[] = '$cl_units->set_col("B");'."\n";
		if ($recruit_in == "garage")	$new_unit[] = '$cl_units->set_col("C");'."\n";
		if ($recruit_in == "snob")	$new_unit[] = '$cl_units->set_col("D");'."\n";
		$new_unit[] = '$cl_units->set_description("'.$extdescr.'");'."\n";
		$new_unit[] = "\n";
		$new_unit[] = '?>';

		//return nl2br(implode("", $new_unit));
		$body = implode("", $new_unit);
		$handle = fopen($GLOBALS["file_units"],"w");
		fputs($handle,$body);
		fclose ($handle);

		
	}
	else
		return $error;
}

//$group ist mit $arr_unit_tech_group[] zu benutzen
function add_unit_tec_config(	$short_descr,$name,$group,
				$wood,$stone,$iron,$time,
				$maxstage,$needed)
{
	$error = -1;
	//Bitte nicht über die überprüfung beschweren, das ist simpel und sicher :-P
	if ($short_descr == "") $error = 100;
	if ($name == "") $error = 100;
	if ($group == "") $error = 100;
	if ($wood == "") $error = 100;
	if ($stone == "") $error = 100;
	if ($iron == "") $error = 100;
	if ($time == "") $error = 100;
	if ($maxstage == "") $error = 100;
	if ($needed == "") $error = 100;
	
	if ($error == -1)
	{
		//Datei einlesen
		$new_unit_tech = file($GLOBALS['file_tech']);
		
		for ($I = 0; $I <= count($new_unit_tech); $I++)
			if (!(strpos($new_unit_tech[$I],"?>") === false))	
				unset($new_unit_tech[$I]);
		
		$new_unit_tech[] = "\n\n";
		$new_unit_tech[] = '$cl_techs->add_tech("'.$short_descr.'","'.$name.'");'."\n";
		$new_unit_tech[] = '$cl_techs->set_group("'.$group.'");'."\n";
		$new_unit_tech[] = '$cl_techs->set_woodprice("'.$wood.'","1.6");'."\n";
		$new_unit_tech[] = '$cl_techs->set_stoneprice("'.$stone.'","1.6");'."\n";
		$new_unit_tech[] = '$cl_techs->set_ironprice("'.$iron.'","1.6");'."\n";
		$new_unit_tech[] = '$cl_techs->set_time("'.$time.'","1.75");'."\n";
		$new_unit_tech[] = '$cl_techs->set_maxStage("'.$maxstage.'");'."\n";
		$new_unit_tech[] = '$cl_techs->set_needed(array('.$needed.'));'."\n";
		$new_unit_tech[] = '$cl_techs->set_description("");'."\n";
		$new_unit_tech[] = "\n";
		$new_unit_tech[] = '?>';

		$body = implode("", $new_unit_tech);
		$handle = fopen($GLOBALS["file_tech"],"w");
		fputs($handle,$body);
		fclose ($handle);
		//return nl2br(implode("", $new_unit_tech));
	} else
		return $error;
}


/* MAIN */

if ($_GET["action"] == "install")
{
	chmod ($file_units, 0777);
	chmod ($file_tech, 0777);
	chmod ("../../graphic/unit", 0777);
	echo "Die Rechte wurden gesetzt.<br>";
	echo "<a href=\"../index.php?screen=create_new_units\">Z&uuml;r&uuml;ck</a>";

}

if ($_GET["action"] == "edit")
{
	INCLUDE("../../include.inc.php");	

	if ($_POST["unit_needed_main"] != 0 && $_POST["unit_needed_main"] != "")
		$needed_here = '"main"=>"'.$_POST["unit_needed_main"].'",';
	if ($_POST["unit_needed_barracks"] != 0 && $_POST["unit_needed_barracks"] != "")
		$needed_here = $needed_here.'"barracks"=>"'.$_POST["unit_needed_barracks"].'",';
	if ($_POST["unit_needed_stable"] != 0 && $_POST["unit_needed_stable"] != "")
		$needed_here = $needed_here.'"stable"=>"'.$_POST["unit_needed_stable"].'",';
	if ($_POST["unit_needed_garage"] != 0 && $_POST["unit_needed_garage"] != "")
		$needed_here = $needed_here.'"garage"=>"'.$_POST["unit_needed_garage"].'",';
	if ($_POST["unit_needed_smith"] != 0 && $_POST["unit_needed_smith"] != "")
		$needed_here = $needed_here.'"smith"=>"'.$_POST["unit_needed_smith"].'",';
	$needed_here[strlen($needed_here)-1] = " ";

	add_unit_config($_POST['unit_name'],$_POST['unit_descr'],
			$_POST['unit_wood'],$_POST['unit_stone'],$_POST['unit_iron'],$_POST['unit_bh'],$_POST['unit_time'],
			$_POST['unit_att'],$_POST['unit_def'],$_POST['unit_defcav'],$_POST['unit_defarcher'],
			$_POST['unit_speed'],$_POST['unit_booty'],
			$needed_here,$arr_unit_recruit_in[$_POST['unit_recruit_in']],$_POST['unit_specials'],
			$arr_unit_group[$_POST["unit_group"]],$_POST['unit_extdescr']);

	add_unit_tec_config($_POST['unit_tech_name'],$_POST['unit_name'],$arr_unit_tech_group[$_POST["unit_group"]],
			  	$_POST['unit_tech_wood'],$_POST['unit_tech_stone'],$_POST['unit_tech_iron'],$_POST['unit_tech_time'],
				$_POST['unit_tech_maxstage'],$needed_here);



	mysql_query("ALTER TABLE `unit_place` ADD `unit_".$_POST['unit_name']."` INT( 11 ) NULL DEFAULT '0';") or die(mysql_error());
	mysql_query("ALTER TABLE `villages` ADD `unit_".$_POST['unit_name']."_tec_level` INT( 11 ) NULL DEFAULT '0';") or die(mysql_error());
	mysql_query("ALTER TABLE `villages` ADD `all_unit_".$_POST['unit_name']."` INT( 6 ) NULL DEFAULT '0';") or die(mysql_error());

	move_uploaded_file($_FILES['unit_mini_image']['tmp_name'],"../graphic/unit/unit_".$_POST['unit_name'].".png");

	echo "Die Einheit wurde angelegt.<br>";
	echo "<a href=\"index.php?screen=create_new_units\">Z&uuml;r&uuml;ck</a>";

}





?> 
