<?php
class do_action {
	var $uid;
	var $hash;
	function do_action($userid) {
		$this->uid = $userid;
		$this->hash = $hkey;
		}
		
	function close() {
		mysql_query("UPDATE `users` SET do_action = '".date("U")."' WHERE `id` = '".$this->uid."'");
		}
		
	function open() {
		mysql_query("UPDATE `users` SET do_action = '".date("U")."' WHERE `id` = '".$this->uid."'");
		}
		
	function open_new() {
		mysql_query("UPDATE `users` SET do_action = '".date("U")."' WHERE `id` = '".$this->uid."'");
		}
		
	function close_new() {
		mysql_query("UPDATE `users` SET do_action = '".date("U")."' WHERE `id` = '".$this->uid."'");
		}
		
	function reload_action() {
		if (isset($_GET['action'])) {
			mysql_query("UPDATE `users` SET `do_action` = '".date("U")."' WHERE `id` = '".$this->uid."'");
			}
		}
		
	function do_act() {
		if (sql("SELECT `do_action` FROM `users` WHERE `id` = '".$this->uid."'",'array') == date("U")) {
			header ('LOCATION: game.php?screen='.$_GET['screen']);
			}
		}
	}
?>