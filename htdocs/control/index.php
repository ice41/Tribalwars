<?
	require_once("../inc/config.inc.php");

	$username = $func->EscapeString(urlencode($_POST['username']));
	$pass = $func->Pass($_POST['pass']);
	$session = $func->Cod(30);
	if($_GET['action'] == 'login' && $_POST['login']){
		$sql = $db->query("SELECT * FROM `admin` WHERE `username` = '".$username."' AND `password` = '".$pass."'");
		$check = $db->num($sql);
		if($check != 1){
			$error = 'Acesso negado!';
		}else{
			$check = $db->fet_array($sql);
			if($check['level'] <= 0){
				$error = 'Seu acesso está restrito!';
			}
		}
		if(empty($error)){
			setcookie("admname", $username);
			setcookie("session", $session);
			$db->query("UPDATE `admin`  SET `session` = '".$session."', `last_visit` = '".time()."',`last_ip` = '".$_SERVER['REMOTE_ADDR']."' WHERE `username` = '".$username."'");
			header("Location: menu.php");
		}
	}

	$admname = $func->EscapeString($_COOKIE['admname']);
	$session = $func->EscapeString($_COOKIE['session']);
	if(!empty($admname) && !empty($session)){
		$check = $db->fet_array($db->query("SELECT * FROM `admin` WHERE `username` = '".$admname."'"));
		if($check['session'] == $session){
			die(header("Location: menu.php"));
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>Painel Administrativo - Empire of War</title>
	<link rel="stylesheet" href="../css/game.css" type="text/css" />
	<link rel="icon" href="../graphic/icons/rabe.png" type="image/x-icon"> 
	<link rel="shortcut icon" href="../graphic/icons/rabe.png" type="image/x-icon">
	<script type="text/javascript" src="../js/script.js"></script>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/func.js"></script>
</head>
<body>
<table class="main" width="840" align="center">
	<tr>
		<td>
			<form action="index.php?action=login" method="post">
				<table class="vis" align="center" width="50%" style="border-spacing:1px; background-color:#FEE47D;">
					<h2 align="center">Painel Administrativo</h2>
					<tr><th colspan="2">Painel administrativo - Acesso</th></tr>
					<? if(!empty($error)){ ?>
					<tr><td colspan="2"><div class="error"><?=$error;?></div></td></tr>
					<? } ?>
					<tr><td><b>Nome de usu&aacute;rio:</b></td><td><input type="text" name="username" size="30" /></td></tr>
					<tr><td><b>Senha:</b></td><td><input type="password" name="pass" size="30" /></td></tr>
					<tr><th colspan="2"><span style="float:right;"><input type="submit" name="login" value="Acessar" class="button" /></span></th></tr>
				</table>
			</form>
		</td>
	</tr>
</table>
</body>
</html>