<?php
//Po��czy� z centraln� baz� danych:
cdb_central();

$email = entparse(sql("SELECT `email` FROM `gracze` WHERE `id` = '".$user['tw_id']."'",'array'));

if ($_GET['action'] === 'change_email' and count($_POST) > 0) {
	if ($_GET['h'] == $session['hkey']) {
		//Wbierz has�o
		$tw_user_pass = sql("SELECT `haslo` FROM `gracze` WHERE `id` = '".$user['tw_id']."'",'array');
		
		
		//Zakoduj stare has�o
		$_POST['passwd'] = md5($_POST['passwd']);
		
		if ($tw_user_pass === $_POST['passwd']) {
			//Przeprowad� walidacj� stringu:
			$_POST['new_email'] = cmp_str($_POST['new_email'],4,75);
			
			if ($_POST['new_email'] === 'SHORT') {
				$error = 'E-mail deve ser enviado em uma composi��o de pelo menos 4 caracteres';
				}
			if ($_POST['new_email'] === 'LONG') {
				$error = 'E-mail pode sk enviados em um m�ximo de 75 caracteres';
				}
			if ($_POST['new_email'] === 'SPACES') {
				$error = 'E-mail n�o pode ser enviado em uma composi��o do mesmo espa�o';
				}
			
			if (empty($error)) {
				$_POST['new_email'] = parse($_POST['new_email']);
				
				mysql_query("UPDATE `gracze` SET `email` = '".$_POST['new_email']."' WHERE `id` = '".$user['tw_id']."'");
				
				header('location: game.php?village='.$village['id'].'&screen=settings&mode=email');
				exit;
				}
			} else {
			$error = 'Digite a senha correta';
			}
		} else {
		$error = 'B��d wykonywania akcji.';
		}
	}
		
//Z powrotem po��cz z baz� tego serwera
cdb_server();

$tpl->assign('email',$email);
$tpl->assign('error',$error);
?>