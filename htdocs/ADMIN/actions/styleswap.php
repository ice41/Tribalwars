<?php
/**
 * DSLan Plugin - Actions@StyleSwap
 * 
 * @package dslan_styleswap
 * @copyright 2008 by Agrafix
 * @author Agrafix <mail@agrafix.net>
 */

class ds_styleswap {
	/**
	 * save styles
	 *
	 * @var array
	 */
	var $styles = array();
	
	/**
	 * Load the styles into array
	 *
	 */
	function load_styles() {
		$handle = opendir ("at_styles");
		while ($file = readdir ($handle)) {
			if ($file != "." && $file != "..") {
			    $this->styles[] = $file;	
			}
				
		}
		closedir($handle);
	}
	
	/**
	 * Updating .css
	 *
	 * @return array
	 */
	function write_to_css() {
		if (isset($_POST["local"]) && $_POST["local"] != "--") {
			$fg = file_get_contents("at_styles/".$_POST["local"]);
		}
		else {
			$fg = file_get_contents($_POST["extern"]);
		}
		
		if(!empty($fg)) {
			@chmod("../stamm.css", 0777);
			$fp = @fopen("../stamm.css", "w+");
			@fwrite($fp, $fg);
			@fclose($fp);
			
			if (!$fp) {
				return array("text" => "Dateischreibefehler", "type" => "error");
			}
			else {
				return array("text" => "Änderung erfolgreich", "type" => "ok");
			}
		}
		else {
			return array("text" => "Dateilesefehler", "type" => "error");
		}
	}
}

$swap = new ds_styleswap;
$swap->load_styles();

$tpl->assign("styles", $swap->styles);

if(isset($_GET["action"]) && $_GET["action"] == "change") {
	$tpl->assign("msg", $swap->write_to_css());
}
?>