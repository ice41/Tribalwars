<?php
/**
 * @author Alexander Thiemann
 */

/**
 * Lib
 */
/**
 * adds a debug entry
 *
 * @param string $entry
 */
function add_debug_entry($entry) {
	global $debug;
	
	$debug .= "village_editor&gt; ".$entry."\n";
}

$debug = "";

/**
 * Buildings
 */
$needed = array("Hauptgebäude" => "main",
				"Kaserne" => "barracks",
				"Stall" => "stable",
				"Werkstatt" => "garage",
				"Schmiede" => "smith",
				"Adelshof" => "snob",
				"Platz" => "place",
				"Markt" => "market",
				"Holzfäller" => "wood",
				"Lehmgrube" => "stone",
				"Eisenmiene" => "iron",
				"Speicher" => "storage",
				"Bauernhof" => "farm",
				"Versteck" => "hide",
				"Wall" => "wall");

$tpl->assign("needed", $needed);

/**
 * Config
 */
$sql_tpl = "UPDATE 
				`villages` 
		SET 
				`wood` = '%s', 
				`iron` = '%s', 
				`stone` = '%s', 
				`storage` = '%s', 
				`farm` = '%s', 
				`barracks` = '%s',
				`stable` = '%s',
				`wall` = '%s',
				`market` = '%s',
				`main` = '%s',
				`smith` = '%s',
				`place` = '%s',
				`hide` = '%s',
				`garage` = '%s',
				`snob` = '%s'
		WHERE 
				`name` = '%s'";

add_debug_entry("SQL-Template: $sql_tpl");

/**
 * Add maximum stages
 */
$tpl->assign("max_lvl", $cl_builds->max_stage);

/**
 * Add all Villages to Template
 */
$r = $db->query("SELECT * FROM `villages` GROUP BY `name`");
$v = array();
while($row = $db->fetch($r)) {
	$v[] = $row;
}

$tpl->assign("v", $v);

/**
 * Execute
 */
if($_GET["action"] == "edit") {	
	foreach($needed AS $key) {
		add_debug_entry("Mounted checking $key (Value: ".htmlentities($_POST[$key]).")");
		
		// dont change
		if(!isset($_POST[$key]) OR !is_numeric($_POST[$key])) {
			if($key != "snob") {
				$sql_tpl = str_replace("`$key` = '%s',", "", $sql_tpl);
				add_debug_entry("Removed <i>`$key` = '%s',</i>");
			}
			else {
				$sql_tpl = eregi_replace(",([^`]+)`snob` = '%s'", "", $sql_tpl);
				add_debug_entry("Sn0b Removal");
			}
		}
		
		// change
		else {
			$sql_tpl = str_replace("`$key` = '%s'", "`$key` = '".$_POST[$key]."'", $sql_tpl);
			add_debug_entry("Value Setting. (`$key` = '%s' <=> `$key` = '".$_POST[$key]."'");
		}
	}
	
	add_debug_entry("Updating name");
	$sql_tpl = str_replace("`name` = '%s'", "`name` = '".urlencode($_POST["name"])."'", $sql_tpl);
	
	add_debug_entry("mySQL-query: $sql_tpl");
	$db->query($sql_tpl);
	add_debug_entry("mySQL: ".$db->lastError);
	$tpl->assign("result", "Änderungen erfolgreich.");
	$tpl->assign("sql_query", $sql_tpl);
	$tpl->assign("v_debug", $debug);
}
?>