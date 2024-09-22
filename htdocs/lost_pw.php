<?
	require_once('inc/config.inc.php');
	require_once('inc/class/swmail.class.php');
	ob_start();

	if($_GET['action'] == 'send'){
		$username = $_POST['username'];
		$mail = $_POST['mail'];

		$check = $db->num($db->query("SELECT * FROM `users` WHERE `username` = '".$func->parse($_POST['username'])."' AND `mail` = '{$mail}'"));
		if($check != 1){
			$error = 'Os dados informados s&atilde;o invalidos!';
		}
		if(empty($error)){
			$passwd = $func->cod(12);
			$db->query("UPDATE `users` SET `password` = '".$func->pass($passwd)."' WHERE `username` = '".$func->parse($_POST['username'])."' AND `mail` = '{$mail}'");

			$server = 'Speed Wars';

			$swmail = new SwMail();
			$swmail->Servidor = smtp_host;
			$swmail->Porta = smtp_port;
			$swmail->Autenticado = true;
			$swmail->Usuario = mail_username;
			$swmail->Senha = mail_password;
			$swmail->EmailDe = mail_from;
			$swmail->EmailDeVisual = "Speed Wars";
			$swmail->EmailPara = $mail;
			$swmail->Assunto = "Speed Wars - Senha perdida?";
			$swmail->Corpo = "<html>
			<head>
			<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
			<meta name=\"author\" content=\"Speed Wars\" />
			</head>
			<body>
			<div align=\"center\">
			<div style=\"background: #fff; border: 7px solid #6c6c6c; padding: 1px; width: 500px;\">
			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"500px\">
			<tr>
			<td colspan=\"2\"><h1 align=\"left\">Senha perdida?</h1></td>
			</tr>
			<tr>
			<td colspan=\"2\" style=\"padding: 10px; font-family: Tahoma; font-size: 10px;\" align=\"left\">Ol&aacute; <strong>{$username}</strong>,<br /><br />
			Como foi requisitada pelo jogador {$username}, foi feito um reset de sua senha e uma nova senha foi gerada para acesso à sua conta. Segue abaixo os dados para o acesso de sua conta.<br /><br />
			<strong>Nome de usu&aacute;rio:</strong> {$username}<br />
			<strong>E-mail:</strong> <a href=\"mailto: {$mail}\">{$mail}</a><br />
			<strong>Nova senha:</strong> {$passwd}<br /><br />
			<div align=\"center\"><b>Obrigado pela aten&ccedil;&atilde;o, equipe {$server}.</b></div></td>
			</tr>
			<tr>
			<td colspan=\"2\"><div style=\"padding: 1px; background-color: #eaeaea;\"></div></td>
			</tr>
			<tr>
			<td align=\"left\" style=\"padding: 5px; font-family: Tahoma; font-size: 10px;\"><b>&copy; 2009 - ".date('Y')." | Equipe {$server}.</b></td>
			<td align=\"right\" style=\"padding: 5px; font-family: Tahoma; font-size: 10px;\"><a href=\"http://www.speedwars.net\" title=\"{$server} | Jogo da era medieval!\">{$server}</a></td>
			</tr>
			</table>
			</div>
			</div>
			</body>
			</html>";
			if($swmail->Enviar() == true){
				$succes = 'Foi enviado um e-mail para <strong>'.$mail.'</strong> com as instru&ccedil;&otilde;es para recuperar o acesso a sua conta. Verifique sua caixa de spam!';
				header('Location: lost_pw.php?succes='.$func->parse($succes));
			}else{
				$error = 'N&atilde;o foi possivel enviar o e-mail.';
				header('Location: lost_pw.php?error='.$func->parse($error));
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>Speed Wars | Jogo da Era Medieval!</title>
	<link rel="shortcut icon" href="graphic/icons/rabe.png" type="image/x-icon" />
	<style>
		@import url('css/layout.css');		// -- Cascading Style Sheet
	</style>
	<script type="text/javascript">
		    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
	    try{
	    var pageTracker = _gat._getTracker("UA-10303532-1");
	    pageTracker._trackPageview();
	    } catch(err) {}
	</script>
</head>
<body class="gid-br port-0">
<div id="lost_pw">
	<div id="contentt">
		<div class="box b1">
			<form id="forgotten_password_form" action="lost_pw.php?action=send" method="post">
				<div class="formbox">
					<? if(!empty($error) || !empty($_GET['succes']) || !empty($_GET['error'])){ ?>
						<? if(!empty($error)){ ?>
					<div id="message" style="position: inherit; opcity: 0;" class="message error"><?=$error;?></div>
						<? } ?>
						<? if(!empty($_GET['error'])){ ?>
					<div id="message" style="position: inherit; opcity: 0;" class="message error"><?=$func->entparse($_GET['error']);?></div>
						<? } ?>
						<? if(!empty($_GET['succes'])){ ?>
					<div id="message" style="position: inherit; opcity: 0;" class="message info"><?=$func->entparse($_GET['succes']);?></div>
						<? } ?>
					<? }else{ ?>
					<div class="row">
						<div class="text"><label for="username">* Nome de usu&aacute;rio:</label></div>
						<div class="field"><input name="username" id="username" type="text" size="35" /></div>
					</div>
					<div class="row">
						<div class="text"><label for="mail">* Email (v&aacute;lido):</label></div>
						<div class="field"><input name="mail" id="mail" type="text" size="35" /></div>
					</div>
					<div class="buttonrow">
						<span style="float:right;"><input type="submit" name="enviar" id="enviar" value="Enviar" /></span>
					</div>

					<? } ?>
				</div><!-- .formbox -->
			</form>
		</div>
	</div>
</div>
</body>
</html>