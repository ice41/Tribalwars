<?php
/**
 * DSLan Plugin Admin
 * 
 * @author Alexander Thiemann <mail@agrafix.net>
 * @version 1.1
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
 * Class for plugin admin
 */
class plugin_admin_decompile {
	/**
	 * Saves the spliter (do not EDIT!)
	 *
	 * @var string
	 */
	var $_spliter = "||xxAGRAFIXxx||";
	
	/**
	 * Parse an Aplugin
	 *
	 * @param string $script
	 * @return boolean
	 */
	function parse($script) {
		$s = gzuncompress(base64_decode($script));
		$parts = explode($this->_spliter, $s);
		
		if(count($parts) != 7) {
			return false;
		}
		
		/*
		 * [0] => name of plugin
		 * [1] => screenname of plugin
		 * [2] => author of plugin
		 * [3] => authors emailadress
		 * [4] => Sourcecode
		 * [5] => Template code
		 * [6] => version
		 */
		
		// now filenames:
		$fn["em"] = "extern_modules/".urlencode($parts[1]).".php";
		$fn["ac"] = "actions/".urlencode($parts[1]).".php";
		$fn["tp"] = "templates/index_".urlencode($parts[1]).".tpl";
		
		// extern_modules file:
		if(!$this->extern_modules($parts, $fn)) {
			return false;
		}
		
		// actions & tp
		# ac
		@chmod("actions", 0777);
		if(file_exists($fn["ac"])) {
			@chmod($fn["ac"], 0777);
		}
		$fp = @fopen($fn["ac"], "w+");
		if(!$fp) {
			return false;
		}
		fwrite($fp, base64_decode($parts[4]));
		fclose($fp);
		
		# tp
		@chmod("templates", 0777);
		if(file_exists($fn["tp"])) {
			@chmod($fn["tp"], 0777);
		}
		$fp = @fopen($fn["tp"], "w+");
		if(!$fp) {
			return false;
		}
		fwrite($fp, base64_decode($parts[5]));
		fclose($fp);
		
		// done
		return $parts[0];
	}
	
	/**
	 * Handle extern modules
	 *
	 * @param array $parts
	 * @param array $fn
	 * @return boolean
	 */
	function extern_modules($parts, $fn) {
		$template = '<?php
/**
 * %s
 * 
 * @author %s
 * @version %s
 */

$toolname = "%s";
$screenname = "%s";

/**
 * Zusätzliche Plugin Informationen
 *
 * Installiert am '.date("d.m.Y \u\m H:i:s").' Uhr
 */
?>';
		$filled = sprintf($template, $parts[0], $parts[2]." <".$parts[3].">", $parts[6], str_replace('"', '\"', $parts[0]), urlencode($parts[1]));
		
		@chmod("extern_modules", 0777);
		if(file_exists($fn["em"])) {
			@chmod($fn["em"], 0777);
		}
		
		$fp = @fopen($fn["em"], "w+");
		if(!$fp) {
			return false;
		}
		fwrite($fp, $filled);
		fclose($fp);
		
		return true;
	}
}

/**
 * Init Class
 */
$dslan_plugin = new dslan_plugin;
$dslan_plugin->init($db, &$tpl);

/**
 * Handle Code
 */
if(isset($_POST["input"])) {
	$p = new plugin_admin_decompile;
	$_POST["input"] = stripslashes($_POST["input"]);
	$_POST["input"] = trim($_POST["input"]);
	$_POST["input"] = str_replace("\n", "", $_POST["input"]);
	$_POST["input"] = str_replace(" ", "", $_POST["input"]);
	
	$r = $p->parse($_POST["input"]);
	if($r == false) {
		$dslan_plugin->display_action("Fehler bei der Installation.", "error");
	}
	else {
		$dslan_plugin->display_action("Installation/Update vom Plugin <b><i>".htmlentities($r)."</i></b> erfolgreich", "ok");
	}
}

/**
 * Upload
 */
if(isset($_POST["upload"]) && is_uploaded_file($_FILES["filen"]["tmp_name"])) {
	$code = implode("", file($_FILES["filen"]["tmp_name"]));
	
	$p = new plugin_admin_decompile;
	$code = stripslashes($code);
	$code = trim($code);
	$code = str_replace("\n", "", $code);
	$code = str_replace(" ", "", $code);
	
	$r = $p->parse($code);
	if($r == false) {
		$dslan_plugin->display_action("Fehler bei der Installation.", "error");
	}
	else {
		$dslan_plugin->display_action("Installation/Update vom Plugin <b><i>".htmlentities($r)."</i></b> erfolgreich", "ok");
	}
}

/**
 * Finish off
 */
$dslan_plugin->finish();
?>