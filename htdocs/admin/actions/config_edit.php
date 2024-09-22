<?php
/**
 * DSLan ConfigEdit
 * 
 * @author Alexander Thiemann <mail@agrafix.net>
 * @version 1.0
 */
/**
 * Handles DSLan Plugins
 *
 */
class dslan_plugin {
	/**
	 * Database class
	 *
	 * @var db
	 */
	var $db = null;
	
	/**
	 * Template class
	 *
	 * @var Smarty
	 */
	var $tpl = null;
	
	/**
	 * Saves actions
	 * 
	 * @var array
	 */
	var $actions = array();
	
	/**
	 * Init anticheat class
	 *
	 * @param db $db
	 * @param Smarty $tpl
	 */
	function init($db, &$tpl) {
		$this->db = $db;
		$this->tpl = &$tpl;
	}
	
	/**
	 * Displays an action result to user
	 *
	 * @param string $content
	 * @param enum $col (normal|error|ok)
	 */
	function display_action($content, $col="normal") {
		//$this->tpl->assign("action_show", "Y");
		
		switch($col) {
			case "normal":
				$color = "#000000";
				break;
				
			case "ok":
				$color = "#0A5F06";
				break;
				
			case "error":
				$color = "#AF0A11"; 
				break;
		}
		
		$this->actions[] = "<span style='color:$color;'>$content</span>";
	}
	
	function finish() {
		if(count($this->actions) != 0) {
			$str = "<ul>";
			foreach($this->actions AS $a) {
				$str .= "<li>".$a."</li>";
			}
			$str .= "</ul>";
			
			$this->tpl->assign("action_text", $str);
		}
	}
	
	/**
	 * Generate error and die script
	 *
	 * @param string $type
	 * @param string $content
	 */
	function display_error($type, $content) {
		$msg = "DSLan AntiCheat ";
		
		switch(@$type) {
			case "security":
				$msg .= "Security Error: ";
				break;
				
			case "fatal":
				$msg .= "Fatal Error: ";
				break;
				
			case "general":
				$msg .= "General Error: ";
				break;
				
			default:
				$msg .= "Default Error: ";
				break;
		}
		
		$msg .= $content;
		
		die($msg);
	}	
}

/**
 * Init Class
 */
$dslan_plugin = new dslan_plugin;
$dslan_plugin->init($db, &$tpl);


$keys = array_keys($config);
$to_cfg = array();
$desc = parse_ini_file("at_data/config_keys.ini", true);

foreach($desc AS $group => $array) {
	foreach($array AS $key => $value) {
		$array[$key] = utf8_decode($value);
	}
	
	$desc[$group] = $array;
}

$contents = file_get_contents("../include/config.php");

foreach($keys AS $k) {
	if(isset($desc[$k])) {
		// ----- HANDLE
		if(isset($_GET["update"]) && $_GET["update"] == "y") {
			$new_val = $_POST[$k];
			
			if($desc[$k]["type"] == "text") {
				$new_val = "'$new_val'";
			}
			
			if($desc[$k]["type"] == "select") {
				if($new_val == "b") {
					$new_val = 1;
				}
				else {
					$new_val = 0;
				}
			}
			
			if($desc[$k]["type"] == "numeric" AND !is_numeric($new_val)) {
				$dslan_plugin->display_error("security", "Für <b>".htmlspecialchars($desc[$k]["desc"])."</b> nur numerische Angaben machen...");
			}
			
			$contents = preg_replace("#\['".$k."'\] = (.*)#i", "['".$k."'] = ".$new_val.";", $contents);
			
			//$dslan_plugin->display_action(htmlentities($contents), "normal");
		}
		
		// ----- DISPLAY
		$array = $desc[$k];
		$array["default"] = $config[$k];
		$array["name"] = $k;
		
		if($array["type"] == "select") {
			
			if($array["default"] === true || $array["default"] === 1) {
				$array["default"] = "b";
			}
			
			if($array["default"] === false || $array["default"] === 0) {
				$array["default"] = "a";		
			}
			
			
		}
		
		
		$to_cfg[] = $array;
	}
}

if(isset($_GET["update"]) && $_GET["update"] == "y") {
	$fp = @fopen("../include/config.php", "w+");
	@fwrite($fp, $contents);
	@fclose($fp);
	
	if($fp) {
		$dslan_plugin->display_action("Änderungen erfolgreich<script type='text/javascript'>alert('Änderung erfolgreich');top.location.href='index.php?screen=config_edit';</script>", "ok");
	}
	else {
		$dslan_plugin->display_action("Änderungen fehlgeschlagen", "error");
	}
}

$tpl->assign("to_cfg", $to_cfg);

/**
 * Finish off
 */
$dslan_plugin->finish();
?>