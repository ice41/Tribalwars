<?php
require ("ProBot/ProBot_admin_game_class.php");

$ProBotAdmin = new ProBot_admin();

$BotUsers = $ProBotAdmin->get_control_users();

if ($_GET["action"] === "add_user" && count($_POST) > 0) {
	$_POST["uname"] = str_validator($_POST["uname"]);
	$counts = sql("SELECT `id` FROM `users` WHERE `username` = '".parse($_POST["uname"])."'","array");
	if ($counts > 0) {
		if (!in_array($_POST["uname"],$BotUsers)) {
			$ProBotAdmin->add_user($_POST["uname"]);
			header('LOCATION: game.php?village='.$village['id'].'&screen=admin&mode=bot#ustawiony');
			exit;
			} else {
			$error = "Este jogador já é controlado por um bot!";
			}
		} else {
		$error = "Não há nenhum jogador com este nome!";
		}
	}
	
if ($_GET["action"] === "del_user" && isset($_GET["id"])) {
	$_GET["id"] = (int)$_GET["id"];
	$ProBotAdmin->del_user($_GET["id"],true);
	header('LOCATION: game.php?village='.$village['id'].'&screen=admin&mode=bot#usuniety');
	exit;
	}
	
$tpl->assign("BotUsers",$BotUsers);
$tpl->assign("error",$error);
?>