<?
	require_once('inc/config.inc.php');
	ob_start();

	$world = $func->EscapeString($_GET['world']);

	$check_db = mysql_query("SELECT * FROM `$world`.`users`");
	if(!$check_db){ 
		header('Location: ./'); 
	}else{
		$time = time();
		$ip = $_SERVER['REMOTE_ADDR'];
		$sid = $func->Cod(32);
		$hkey = $func->Cod(4);
		$session = $func->EscapeString($_COOKIE['session']);
		$user = $db->fet_array($db->query("SELECT * FROM `users` WHERE `session` = '".$session."'"));

		$World = $db->fet_array($db->query("SELECT * FROM `worlds` WHERE `world_db` = '".$world."'"));
		if($World['world_active'] == 1){
			if(empty($session)){ 
				header('Location: ./'); 
			}else{
				if($user['banned'] == 'Y'){
					header('Location: ./index.php?error=block'); 
				}else{
					$quser = $db->query("SELECT * FROM `$world`.`users` WHERE `id` = '".$user['id']."' AND `username` = '".$user['username']."'");
					$User = $db->fet_array($quser);
					if($db->num($quser) != 0){
						$check_session = $db->num($db->query("SELECT * FROM `$world`.`sessions` WHERE `userid` = '".$user['id']."' AND `username` = '".$user['username']."'"));
						if($User['banned'] == 'Y' || $User['ban_end'] > time()){
							if($User['ban_end'] <= time()){
								$db->query("UPDATE `$world`.`users` SET `banned` = 'N', `ban_start` = '0'  WHERE `id` = '".$User['id']."'");
								$db->query("UPDATE `$world`.`users` SET `ban_end` = '0', `ban_por` = ''  WHERE `id` = '".$User['id']."'");
								header('Location: login.php?world='.$world);
							}else{
								$banned = true;
							}
						}else{
							if($check_session == '0'){
								setcookie('session', $sid, 0, '/'.$world.'/');
								$db->query("INSERT INTO `$world`.`sessions` (`userid`, `sid`,`hkey`,`username`) VALUES ('".$user['id']."','".$sid."','".$hkey."','".$user['username']."')");
								$db->query("INSERT INTO `$world`.`logins` (`username`, `time`,`ip`,`userid`) VALUES ('".$user['username']."','".$time."','".$ip."','".$user['id']."')");
								$db->query("INSERT INTO `logins` (`username`, `time`,`ip`,`userid`,`world`) VALUES ('".$user['username']."','".$time."','".$ip."','".$user['id']."','".$world."')");
							}else{
								$mysql1 = $db->fet_array($db->query("SELECT * FROM `$world`.`sessions` WHERE `username` = '".$user['username']."'"));
								if($mysql1['userid'] != $user['id']){ 
									$db->query("UPDATE `$world`.`sessions` SET `userid` = '".$user['id']."' WHERE `username` = '".$user['username']."'");
								}
								$db->query("UPDATE `$world`.`sessions` SET `sid` = '".$sid."', `hkey` = '".$hkey."'  WHERE `userid` = '".$user['id']."'");
								$db->query("INSERT INTO `$world`.`logins` (`username`, `time`,`ip`,`userid`) VALUES ('".$user['username']."','".$time."','".$ip."','".$user['id']."')");
								$db->query("INSERT INTO `logins` (`username`, `time`,`ip`,`userid`,`world`) VALUES ('".$user['username']."','".$time."','".$ip."','".$user['id']."','".$world."')");
							}
							setcookie('session', $sid, 0, '/'.$world.'/');
							header('Location: '.$world.'/game.php');
						}
					}else{
						if($_GET['action'] == 'create'){
							$sql4 = $db->query("INSERT INTO `$world`.`users` (`id`,`username`) VALUES ('".$user['id']."','".$user['username']."')");
							header('Location: login.php?world='.$world);
						}
					}
				}
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
	<title><? if($banned){ ?>Banido<? }else{ ?>Participar<? } ?> - <?=urldecode($World['world_name']);?> | Empire of War</title>
	<link rel="stylesheet" href="css/game.css" type="text/css" />
	<link rel="icon" href="graphic/icons/rabe.png" type="image/x-icon"> 
	<link rel="shortcut icon" href="graphic/icons/rabe.png" type="image/x-icon" />
</head>
<body>
<? if($banned){ ?>
<table class="main" align="center" width="50%">
	<tr>
		<td>
			<h2>Conta Banida!</h2>
			<p>Sua conta est&aacute; banida neste mundo, portanto voc&ecirc; n&atilde;o poder&aacute; acessa-l&aacute;. Caso deseje mais informa&ccedil;&otilde;es sobre o banimento entre em contato atrav&eacute;s de nosso <a href="<?=link_forum;?>">f&oacute;rum</a>.</p>
			<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D;">
				<tr><th colspan="2" style="font-size:18px; height:20px;">&raquo; Informa&ccedil;&otilde;es do banimento</th></tr>
				<tr><th>&raquo; Inicio:</th><td align="center"><b><?=date('d.m.Y H:i', $User['ban_start']);?></b></td></tr>
				<tr><th>&raquo; Fim:</th><td align="center"><b><?=date('d.m.Y H:i', $User['ban_end']);?></b></td></tr>
				<tr><th>&raquo; Motivo:</th><td align="center"><b><?=$func->EscapeString(urldecode($User['ban_motivo']));?></b></td></tr>
				<tr><th>&raquo; Banido por:</th><td align="center"><b><?=$func->EscapeString(urldecode($User['ban_por']));?></b></td></tr>
			</table>
			<h2 align="center">
				<span style="float:left;"><a href="./">&laquo; Sair</a></span>
				<span style="float:right;"><a href="<?=link_forum;?>">Ir para o f&oacute;rum &raquo;</a></span>
			</h2>
		</td>
	</tr>
</table>
<?
	}else{
		require_once($world.'/include/config.php');
		require_once($world.'/include/configs/farm_limits.php');
		require_once($world.'/include/configs/max_storage.php');
?>
<table class="main" align="center" width="50%">
	<tr>
		<td>
			<h2 align="left" style="margin-left:5px;"><img src="graphic/icons/rabe_38x40.png" alt="" /> Participar</h2>
			<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D;">
				<tr><th colspan="2" style="font-size:18px; height:20px;">&raquo; Informa&ccedil;&otilde;es</th></tr>
				<tr><th>&raquo; Inicio:</th><td align="center"><b><?=date("d.m.Y", $World['world_start']);?></b></td></tr>
				<tr><th>&raquo; Fim:</th><td align="center"><b><?=date("d.m.Y", $World['world_end']);?></b></td></tr>
				<tr><th>&raquo; Speed:</th><td align="center"><b><?=$func->FormatNumber($config['speed']);?>x</b></td></tr>
				<tr><th>&raquo; Peso:</th><td align="center"><b><?=$World['world_peso'];?></b></td></tr>
				<tr><th>&raquo; Fazenda:</th><td align="center"><b><?=$func->FormatNumber($arr_farm[$config['max_level_farm']]);?></b></td></tr>
				<tr><th>&raquo; Armaz&eacute;n:</th><td align="center"><b><?=$func->FormatNumber($arr_maxstorage[$config['max_level_storage']]);?></b></td></tr>
				<tr><th>&raquo; Prote&ccedil;&atilde;o:</th><td align="center"><b><?=$config['noob_protection_v1'];?> minutos</b></td></tr>
				<? if($config['members_ally']){ ?>
				<tr><th>&raquo; Membros por tribo:</th><td align="center"><b><?=$config['members_ally'];?> membro(s)</b></td></tr>
				<? } ?>
				<? if($config['village_limit']){ ?>
				<tr><th>&raquo; Limite de aldeias:</th><td align="center"><b><?=$func->FormatNumber($config['villages_limit']);?> aldeia(s)</b></td></tr>
				<? } ?>
				<tr><th>&raquo; Premia&ccedil;&atilde;o:</th><td align="center"><b><?=$func->FormatNumber($World['world_bonus']);?> PP's</b></td></tr>
			</table><br />
			<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D;">
				<tr><th style="text-align:center;"><h2>Deseja Participar do <?=urldecode($World['world_name']);?>?</h2></th></tr>
			</table>
			<h2 align="center"><a href="login.php?world=<?=$world;?>&action=create">&raquo; Sim &laquo;</a> | <a href="./">&raquo; N&atilde;o &laquo;</a></h2>
		</td>
	</tr>
</table>
<? } ?>
<center><a href="http://LanServers.tk" target="_blank">LanServers</a></center>
</body>
</html>