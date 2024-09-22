<?php
/**
 * Gespeicherte Runden Löschen
 * 
 * @author Alexander Thiemann <mail@agrafix.net>
 * @version 1.0
 */

if(isset($_GET["action"]) && $_GET["action"] == "delete") {
	if(!is_numeric($_POST["round_id"])) {
		$tpl->assign("action_text", "Rundennummer nicht numerisch!");
	}
	else {
		$id = $_POST["round_id"];
		$db->query("DELETE FROM `save_players` WHERE `round_id` = '".$id."'");
		$db->query("DELETE FROM `save_rounds` WHERE `id` = '".$id."'");
		$tpl->assign("action_text", "Runde Nr. ".$id." gel&ouml;scht.");
	}
}
 
if(isset($_GET["action"]) && $_GET["action"] == "delete_all") {
	$query = "TRUNCATE TABLE `save_players`";
	$db->query($query);
	$query = "TRUNCATE TABLE `save_rounds` ";
	$db->query($query);
	$tpl->assign("action_text", "Alle gespeicherten Runden gel&ouml;scht.");
}
?>