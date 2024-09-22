<?
	$vill = $village['id'];
	$timp = time();
	$timp_cfg = $timp+($config['new_begin_time']*60);

	if($_GET['do'] == "new_begin"){
		$User = $db->fetch($db->query("SELECT * FROM `login`.`users` WHERE `id` = '".$user['id']."'"));
		$passwd = md5(crc32(md5($_POST['password'])));
		if($passwd == $User['password']){
			$db->query("UPDATE users SET villages = '0' WHERE id = '".$user['id']."' LIMIT 1");
			$db->query("SELECT * FROM villages WHERE userid = '".$user['id']."'");
			$db->query("UPDATE villages SET userid = '-1', snob_recruit = '0' WHERE userid = '".$user['id']."'");
			$db->query("UPDATE users SET ennobled_by = '' WHERE id = '".$user['id']."'");
			$db->query("UPDATE users SET coins = '0' WHERE id = '".$user['id']."'");
			$db->query("UPDATE users SET coins_n = '0' WHERE id = '".$user['id']."'");
			$db->query("UPDATE users SET nextsnob = '0' WHERE id = '".$user['id']."'");
			$db->query("UPDATE users SET new_begin_time = '".$timp_cfg."' WHERE id = '".$user['id']."'");
			reload_all_village_points();
			reload_all_ally_points();
			reload_all_player_points();
			reload_ally_rangs();
			reload_player_rangs();
			header("Location: game.php");
		}else{
			$error = "Senha invalida.";
		}
	}
	$tpl->assign("error", $error);
	$Userr = $db->fetch($db->query("SELECT * FROM `users` WHERE `id` = '".$user['id']."'"));
	$new_begin_time = $Userr['new_begin_time']-$timp;
	$tpl->assign("new_begin_time", $new_begin_time);
?>