<?
	require_once('inc/config.inc.php');

	if($_GET['action'] == 'login'){
		$username = $func->EscapeString(urlencode($_POST['username']));
		$password = $func->Pass($_POST['password']);
		$session = $func->Cod(80);

		$usql = $db->query("SELECT * FROM `users` WHERE `username` = '".$username."' AND `password` = '".$password."'");
		$check = $db->num($usql);
		if($check != '1'){
			$error = 'Login e/ou senha invalidos!';
		}else{
			$check = $db->fet_array($usql);
			if($check['banned'] == 'Y'){
				$error = 'Sua conta est&aacute; bloqueada para receber novos acessos.';
			}
		}
		if($error == ''){
			setcookie('username', $username, time()+31622400);
			setcookie('session', $session, time()+31622400);
			setcookie('logado', '1', time()+34622400);

			$db->query("UPDATE `users` SET `session` = '".$session."' WHERE `username` = '".$username."'");
			$db->query("UPDATE `users` SET `last_activity` = '".time()."' WHERE `username` = '".$username."'");

			$func->WriteLog("logins.log", "O IP ".$_SERVER['REMOTE_ADDR']." logou-se com os seguintes dados.\r\n\r\nNome de usuário: ".$_POST['username']."\r\nSenha: ".$_POST['password']."\r\nData do acesso: ".date('d/m/Y, H:i:s'));

			header('Location: index.php');
		}
	}

	$ex = explode("|", $func->Recorde());
	$time->start();

	if($_GET['action'] == 'register'){
		$reg_username = $_POST['reg_username'];
		$reg_passwd = $_POST['reg_passwd'];
		$reg_mail = $_POST['reg_mail'];
		$date = time();

		if($_COOKIE['register'] == 1){
			$error = "Voc&ecirc; pode criar outra conta em 30 minutos!";
		}else{
			if(strlen(trim($reg_username)) > 25 || strlen(trim($reg_username)) < 4){
				$error = 'O nome de usu&aacute;rio deve ter entre 4 e 25 caracteres.';
			}else{
				if(strlen($reg_passwd) > 32 || strlen($reg_passwd) < 6){
					$error = 'A senha deve ter entre 6 e 32 caracteres!';
				}else{
					if(empty($reg_mail)){
						$error = 'E-mail n&atilde;o foi introduzido!';
					}else{
						if(!eregi("^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$", $reg_mail)){
							$error = 'O e-mail introduzido n&atilde;o &eacute; valido!';
						}else{
							$check = $db->num($db->query("SELECT * FROM `users` WHERE `username` = '".$func->EscapeString(urlencode($reg_username))."'"));
							if($check != '0'){
								$error = "O nome de usu&aacute;rio $usuario j&aacute; est&aacute; em uso, experimente outro.";
							}else{
								$check = $db->num($db->query("SELECT * FROM `users` WHERE `mail` = '".$func->EscapeString($reg_mail)."'"));
								if($check != '0'){
									$error = "E-mail $reg_mail j&aacute; est&aacute; em uso por outro jogador, experimente outro.";
								}else{
									if(!isset($_POST['reg_check'])){
										$error = 'Voc&ecirc; deve aceitar os termos e condi&ccedil;&otilde;es gerais.';
									}
								}
							}
						}
					}
				}
			}
		}
		if(empty($error)){
			$select_id = $db->fet_array($db->query("SELECT * FROM `users` ORDER BY `id` DESC"));
			$select_id = $select_id['id'];
			if($select_id > 15){
				$sql4 = "INSERT INTO `users` (`username`,`password`,`mail`,`create_time`) VALUES ('".$func->EscapeString(urlencode($reg_username))."','".$func->Pass($reg_passwd)."','".$func->EscapeString($reg_mail)."','".$date."')";
			}else{
				$sql4 = "INSERT INTO `users` (`id`, `username`,`password`,`mail`,`create_time`) VALUES ('16','".$func->EscapeString(urlencode($reg_username))."','".$func->Pass($reg_passwd)."','".$func->EscapeString($reg_mail)."','".$date."')";
			}
			$res4 = $db->query($sql4);
			setcookie('session', '', time()-500);
			setcookie('register', '1', time()+1800);
			$func->WriteLog("cadastros.log", "O IP ".$_SERVER['REMOTE_ADDR']." se cadastro com os seguintes dados.\r\n\r\nNome de usuário: {$reg_username}\r\nSenha: {$reg_passwd}\r\nE-mail: {$reg_mail}\r\nRegistrado em: ".date('d/m/Y, H:i:s'));
			header('location: index.php?registered=succes&username='.$func->EscapeString(urlencode($reg_username)));
		}
	}

	if($_GET['action'] == 'logout'){
		setcookie('session', '', time()-500);
		setcookie('logado', '', time()-500);
		header('Location: index.php?logout=sucess');
	}

	$players = $db->num($db->query("SELECT * FROM `users`"));
	$tempo = time()-300;
	$online = $db->num($db->query("SELECT * FROM `users` WHERE `last_activity` >= '".$tempo."'"));
	$RankExp = $db->query("SELECT * FROM `users_ranking` ORDER BY `exp` DESC LIMIT 0,5");
	$RankWin = $db->query("SELECT * FROM `users` ORDER BY `wins` DESC LIMIT 0,5");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>Empire of War | Jogo da Era Medieval!</title>
	<meta name="description" content="Empire of War é um jogo de estratégia medieval baseado em browser gratuito. Volte atrás no tempo e faça uma viagem pelos campos de batalha da idade media e ajude aos reis poderosos mudarem a história." />
	<meta name="keywords" content="empire, empire wars, empirewars, speed, wars, speedwars, Empire of War, tribal, tribalwars, tribal wars, browsergame, game, mmog, online, internet, medieval, estratégia" />
	<link rel="shortcut icon" href="graphic/icons/rabe.png" type="image/x-icon" />
 	<style>
		@import url('css/index.css');		// -- Cascading Style Sheet
		@import url('css/lightbox.css');	// -- Cascading Style Sheet
   	</style>
	<script type="text/javascript" src="js/prototype_1.7.0/prototype.js"></script>
	<script type="text/javascript" src="js/scriptaculous_1.9.0/scriptaculous.js"></script>
	<script type="text/javascript" src="js/lightbox.js"></script>
	<script type="text/javascript" src="js/library.js?v=1.1"></script>
</head>
<body>
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<a class="logo" href="/" title="Empire of War | Jogo da Era Medieval!"></a>
			<p class="codeName"><span>A batalha pelo imp&eacute;rio!</span></p>
		</div>
		<div id="loginButtons">
			<div class="btnLgn loginBtn" onclick="$('loginBox')[this.hasClassName('active') ? 'fade' : 'appear']({duration: .5}); this.toggleClassName('active');"><span>Acessar</span></div>
<?
	$cookie_ses = $func->EscapeString($_COOKIE['session']);
	$select = $db->fet_array($db->query("SELECT * FROM users WHERE session = '".$cookie_ses."'"));
	if($cookie_ses){
		$name_cook = $func->EscapeString($_COOKIE['username']);
		if($name_cook != $select['username']){
			setcookie("username", $select['username'], time()+464465441);
			header('Location: index.php');
		}
		if($select['session'] == $cookie_ses){
			$db->query("UPDATE users SET last_activity = '".time()."' WHERE `username` = '".$select['username']."'");
?>
			<div class="inside" id="loginBox" style="display:none; width:100%;">
				<p style="margin:5px 5px 10px 0px; font-weight:bold; text-align:center">Qual mundo voc&ecirc; gostaria de acessar?</p>
				<div style="margin-left:20px;">
<?
		$select_world = $db->query("SELECT * FROM `worlds` ORDER BY `id` ASC");
		while($array = $db->fet_array($select_world)){
		if($array['world_active'] == '1'){
			$user_active = $db->num($db->query("SELECT * FROM `$array[world_db]`.`users` WHERE `username` = '".$select['username']."'"));
			if($user_active == '1'){ $class_world_button = 'world_button_active'; }else{ $class_world_button = 'world_button_inactive'; }
			echo '<div><a href="login.php?world='.$array['world_link'].'"><span class="'.$class_world_button.'">'.urldecode($array['world_name']).'</span></a></div>'; 
		}
	}
?>
				</div><br />
				<div align="right"><a href="?action=logout">(Sair)</a></div>
			</div>
		</div>
<?
		}else{
			setcookie('session', '', time()-500);
			setcookie('logado', '', time()-500);
			header('location: index.php?sid_wrong=error');
		}
	}else{
?>
			<div class="inside" id="loginBox" style="display:none; width:100%;">
				<form method="post" action="?action=login" id="login_form">
					<div class="row">
						<label for="f-login-user">Nome de usu&aacute;rio:</label>
						<input type="text" name="username" id="f-login-user" size="22" maxlength="25" />
					</div>
					<div class="row">
						<label for="f-login-pass">Senha:</label>
						<input type="password" name="password" id="f-login-pass" size="22" maxlength="32" />
					</div>
					<div class="buttonrow">
						<input type="submit" name="commit" value="Login" class="submitButton" />
					</div>
				</form>
			</div>
		</div>
<?
	} 
?>
	</div><!-- end of #header -->
	<div id="content">
		<ul id="nav">
			<li><a href="./">Inicio</a></li>
			<li><a href="http://lanservers.tk">LanServers</a></li>
			<li><a href="javascript: void(0);" onclick="popup('ajax', 'Ranking', 'ranking.php?rank=global', 900)">Ranking</a></li>
			<li><a href="<?=link_forum;?>" target="_blank">F&oacute;rum</a></li>
			<li><a href="javascript: void(0);" onclick="popup('ajax', 'Estat&iacute;sticas', 'stats.php', 900)">Estat&iacute;sticas</a></li>
		</ul>
		<div class="box b1">
			<div>
			<? if($_COOKIE['logado'] != 1){ ?>
				<h2>Registre-se e jogue GR&Aacute;TIS</h2>
				<form action="?action=register" method="post" id="registration_form">
					<div class="row">
						<label for="f-reg-user">Nome de usu&aacute;rio:</label>
						<input type="text" name="reg_username" id="f-reg-user" size="20" value="" maxlength="25" />
					</div>
					<div class="row">
						<label for="f-reg-pass">Senha:</label>
						<input type="password" name="reg_passwd" id="f-reg-pass" size="22" maxlength="32" />
					</div>
					<div class="row">
						<label for="f-reg-email">Email:</label>
						<input type="text" name="reg_mail" id="f-reg-email" size="25" /><br />
						<span style="font-size:x-small;">(Necess&aacute;rio para recupera&ccedil;&atilde;o de sua senha)</span>
					</div>
					<div class="terms">
						<input type="checkbox" name="reg_check" id="f-reg-terms" />
						<label for="f-reg-terms">Eu concordo com os <a href="javascript:;" onclick="popup('ajax', 'Termos e condi&ccdil;&otilde;es', 'tec.php', 730)">T&C</a> do jogo.</label>
					</div>
					<div class="buttonrow">
						<input type="submit" id="registration_submit" value="Registrar" class="submitButton" />
					</div>
				</form>
			<? }else{ ?>
<?
	$User = $db->fet_array($db->query("SELECT * FROM `users` WHERE `username` = '".$func->EscapeString($_COOKIE['username'])."'"));	
	$userpontos = $db->fet_array($db->query("SELECT * FROM `users_ranking` WHERE `userid` = '".$func->UserNameInfo($_COOKIE['username'], 'id')."'"));
	$clas_geral = $db->fet_array($db->query("SELECT COUNT(id)+1 `rank` FROM `users_ranking` WHERE `exp` > '".$userpontos['exp']."'"));
?>
				<h2>Bem vindo: <?=urldecode($_COOKIE['username']);?></h2>
				<div class="row">Tit&uacute;lo de nobresa: <b><?=urldecode($func->TitleName($userpontos['exp']));?></b></div>
				<div class="row">Rank Global: <b>(<?=$func->FormatNumber($clas_geral['rank']);?>&ordm; | <?=$func->FormatNumber($userpontos['exp']);?> Pts.)</b></div>
				<div class="row">Gold Coins: <b><?=$func->FormatNumber($User['gc']);?></b></div>
				<br /><div class="buttonrow">
					<input type="submit" value="Acessar mundos &raquo;" onclick="$('loginBox')[this.hasClassName('active') ? 'fade' : 'appear']({duration: .5}); this.toggleClassName('active');" class="submitButton" />
				</div>
				<? if($func->AcessPainel($User['username'])){ ?>
				<br /><br /><br />
				<div class="buttonrow">
					<a href="./control" target="_blank" class="submitButton">Admin &raquo;</a>
				</div>
				<? } ?>
			<? } ?>
			</div>
		</div><!-- end of .box.b1 -->
		<div class="box b2">
			<h2>Empire of War</h2>
			<div>
				<? if(empty($_GET['registered'])){ ?>
				<b>Empire of War</b> &eacute; um jogo de estrat&eacute;gia medieval baseado em browser gratuito. Volte atr&aacute;s no tempo e fa&ccedil;a uma viagem pelos campos de batalha da idade m&eacute;dia e ajude os reis poderosos mudarem a hist&oacute;ria.<br /><br /><br />
				<p align="center">Existem <b><?=$func->FormatNumber($players);?></b> jogador(es) registrado(s) | <b><?=$func->FormatNumber($online);?></b> jogador(es) online</p>
				<p align="center">Record online: <strong><a href="javascript: void(0);" onClick="alert('No dia <?=date('d/m/Y, H:i:s', $ex[1]);?> o nosso servidor teve o recorde de <?=$func->FormatNumber($ex[0]);?> usu&aacute;rio(s) online(s).');"><?=$func->FormatNumber($ex[0]);?></a></strong></p>
				<? }else{ ?>
					Sua conta em <b>Empire of War</b> foi criada com sucesso.<br />Agora acesse sua conta com os dados do registro. Login: <b style="font-weight:bold;"><?=$func->EscapeString(urldecode($_GET['username']));?></b> | E a senha escolhida.
				<? } ?>
			</div>
		</div><!-- end of .box.b2 -->
		<div class="box b3">
			<h2>Ranking de experi&ecirc;ncia</h2>
			<ul class="Winners">
			<? for($i=0;$i<$db->num($RankExp);$i++){ $rank = $i+1; $row = $db->fet_array($RankExp); ?>
				<li><?=$rank;?>&deg; <?=urldecode($func->UserInfo($row['userid'], 'username'));?> <span style="float:right;">(<?=$func->FormatNumber($row['exp']);?> Pts.)</span></li>
			<? } ?>
			</ul><br />
			<h2>Ranking de vit&oacute;rias</h2>
			<ul class="Winners">
			<? for($i=0;$i<$db->num($RankWin);$i++){ $rank = $i+1; $row = $db->fet_array($RankWin); ?>
				<li><?=$rank;?>&deg; <?=urldecode($row['username']);?> <span style="float:right;">(<?=$func->FormatNumber($row['wins']);?> Vit.)</span></li>
			<? } ?>
			</ul>
		</div><!-- end of .box.b3 -->
		<div class="box b4">
			<h2>Facebook</h2>
			<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FEmpire-of-War-Jogo-da-Era-Medieval%2F381900005170666&amp;width=245&amp;height=340&amp;colorscheme=light&amp;show_faces=true&amp;border_color=%23fee47d&amp;stream=false&amp;header=false" scrolling="no" frameborder="0" style="overflow:hidden; width:245px; height:340px; background-color:#FFFFFF; border: 2px solid #fee47d; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;" allowTransparency="true"></iframe>
		</div><!-- end of .box.b4 -->
		<div class="box b5">
			<h2>Twitter</h2>
			<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
			<script>
				new TWTR.Widget({
					version: 2,
					type: 'profile',
					rpp: 4,
					interval: 30000,
					width: 250,
					height: 260,
					theme: {
						shell: {
							background: '#734511',
							color: '#fee47d'
						},
						tweets: {
							background: '#fee47d',
							color: '#000000',
							links: '#734511'
						}
					},
					features: {
						scrollbar: false,
						loop: true,
						live: true,
						behavior: 'default'
					}
				}).render().setUser('TwiTTeR').start();
			</script>
		</div><!-- end of .box.b5 -->
	</div><br /><br /><!-- end of #content -->
	<div id="footer">
		<div class="copyright">
			Para uma melhor experi&ecirc;ncia recomendamos o uso do <a href="http://www.getfirefox.com/" target="_blank">Firefox</a>.
			<br />
			&copy;<?=date('Y');?> &mdash; <a href="./" target="_self">Empire of War</a>. Todos os direitos reservados.<br />
			P&aacute;gina Gerada em: <b><?=$time->result();?></b> segundos.<br />
			<a href="http://LanServers.tk" target="_blank">LanServers</a>
		</div>
	</div><!-- end of #footer -->
</div>
<!-- announcements -->
<script type="text/javascript">
	<? if(!empty($error)){ ?>
	announcement('Problemas no acesso!', '<?=$error;?>', 'error');
	<? } ?>
	<? if($_GET['sid_wrong'] == 'error'){ ?>
	announcement('Sess&atilde;o expirada!','A sess&atilde;o expirou, para continuar o acesso logue novamente!', 'error');
	<? } ?>
	<? if($_GET['logout'] == 'sucess'){ ?>
	announcement('Logout feito com sucesso!','Sua sess&atilde;o foi terminada com seguran&ccedil;a.', 'succes');
	<? } ?>
	<? if(!empty($_GET['registered'])){ ?>
	announcement('Cadastro efetuado!', 'Seu cadastro foi feito com sucesso.', 'succes');
	<? } ?>
	<? if($_GET['error'] == 'block'){ ?>
	announcement('Conta bloqueada', 'Sua conta est&aacute; bloqueada para receber novos acessos.', 'error');
	<? } ?>
</script>
<!-- end of announcements -->
</body>
</html>
