<?php
/**
 * DSLan AntiCheat Script
 * 
 * @author Alexander Thiemann <mail@agrafix.net>
 * @version 1.1
 */

/**
 * The AntiCheat class
 *
 */
class dslan_anticheat {
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
	 * Update ban state of user
	 *
	 * @param int $userid
	 * @param enum $state (Y|N)
	 */
	function update_ban_state($userid, $state="N") {
		if(!is_numeric($userid)) {
			$this->display_error("security", "Param \$userid is not numeric!");
		}
		$this->db->query("UPDATE `users` SET `banned` = '$state' WHERE `id` = '$userid'");
		
		// Session kill
		$this->db->query("DELETE FROM `sessions` WHERE `userid` = '$userid'");
	}
	
	/**
	 * Removes random village
	 *
	 * @param int $userid
	 * @return boolean
	 */
	function remove_village($userid) {
		if(!is_numeric($userid)) {
			$this->display_error("security", "Param \$userid is not numeric!");
		}
		$result = $this->db->query("SELECT * FROM `villages` WHERE `userid` = '$userid'");
		
		$vil = array();
		
		if($this->db->numrows($result) == 0) {
			return false;
		}
		while($v = $this->db->fetch($result)) {
			$vil[] = $v;
		}
		
		
		$max = count($vil)-1;
		$rnd = rand(0, $max);
		$this->db->query("UPDATE `villages` SET `userid` = -1 AND `name` = '".urlencode("|AntiCheatDorf|")."' WHERE `id` = ".$vil[$rnd]["id"]);
		$this->db->query("UPDATE `users` SET `villages` = `villages`-1 WHERE `id` = '$userid'");
		reload_player_points($userid);
		
		return true;
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
		$str = "<ul>";
		foreach($this->actions AS $a) {
			$str .= "<li>".$a."</li>";
		}
		$str .= "</ul>";
		
		$this->tpl->assign("action_text", $str);
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
$anti_cheat = new dslan_anticheat;
$anti_cheat->init($db, &$tpl);

/**
 * Handle Actions
 */
switch(@$_GET["do"]) {
	case "ban":
		if(count($_GET["user"]) < 1) {
			$anti_cheat->display_error("fatal", "No userids given!");
		}
		
		foreach($_GET["user"] AS $uid) {
			$anti_cheat->update_ban_state($uid, "Y");
			$anti_cheat->display_action("Spieler #$uid gebannt.", "ok");
		}
		
		break;
	
	case "remove_village":
		if(count($_GET["user"]) < 1) {
			$anti_cheat->display_error("fatal", "No userids given!");
		}
		
		foreach($_GET["user"] AS $uid) {
			if($anti_cheat->remove_village($uid)) {
				$anti_cheat->display_action("Spieler #$uid ein Dorf weggenommen.", "ok");
			}
			else {
				$anti_cheat->display_action("Fehler. Spieler #$uid hat keine D&ouml;rfer!", "error");
			}
		}
		
		break;
		
	case "change_ban_state":
		if(!is_numeric($_GET["id"])) {
			$anti_cheat->display_error("fatal", "ID not numeric!");
		}
		
		if($_POST["state"] != "N" AND $_POST["state"] != "Y") {
			$anti_cheat->display_error("fatal", "Wrong ENUM!");
		}
		
		$anti_cheat->update_ban_state($_GET["id"], $_POST["state"]);
		$anti_cheat->display_action("Spieler bearbeitet.", "ok");
		break;
}

/**
 * Find Multis
 */
$result = $db->query("SELECT * FROM `users`");
$v = array();
$multis_found = "N";

while($row = $db->fetch($result)) {
	$row["logins"] = array();
	$row["ip"] = "";
	$row["multi"]["enum"] = "N";
	$row["multi"]["userid"] = 0;
	$row["multi"]["username"] = "-";
	
	$yesterday = mktime(23, 59, 59, date("m"), date("d"), date("Y")) - 60 * 60 * 24;
	$uid_result = $db->query("SELECT * FROM `logins` WHERE `userid` = '".$row["id"]."' AND `time` > ".$yesterday);
	while($logins = $db->fetch($uid_result)) {
		$row["logins"][] = $logins;
		$row["ip"] = $logins["ip"];
		
		$nomulti_result = $db->query("SELECT * FROM `logins` WHERE `ip` = '".$logins["ip"]."' AND `userid` != '".$row["id"]."' AND `time` > ".$yesterday." LIMIT 1");
		if($db->numrows($nomulti_result) == 1) {
			$multi_user = $db->fetch($nomulti_result);
			$row["multi"]["enum"] = "Y";
			$row["multi"]["userid"] = $multi_user["userid"];
			$row["multi"]["username"] = $multi_user["username"];
			$multis_found = "Y";
		}
	}
	
	$v[] = $row;
}

$anti_cheat->finish();
$tpl->assign("users", $v);
$tpl->assign("multis_found", $multis_found);
?>