<?php
// lida com o banco de dados central:
cdb_central();

$email = entparse(sql("SELECT `email` FROM `gracze` WHERE `id` = '".$user['tw_id']."'",'array'));

if ($_GET['action'] === 'change_email' and count($_POST) > 0) {
	if ($_GET['h'] == $session['hkey']) {
		// entre no caso
		$tw_user_pass = sql("SELECT `haslo` FROM `gracze` WHERE `id` = '".$user['tw_id']."'",'array');
		
		
		// entra no velho tem �o
		$_POST['passwd'] = md5($_POST['passwd']);
		
		if ($tw_user_pass === $_POST['passwd']) {
			// przeprowad� walidacj� stringuishes:
			$_POST['new_email'] = cmp_str($_POST['new_email'],4,75);
			
			if ($_POST['new_email'] === 'SHORT') {
				$error = 'O endereço de e-mail deve consistir em pelo menos 4 sinais';
				}
			if ($_POST['new_email'] === 'LONG') {
				$error = 'O endereço de e-mail pode consistir em 75 sinais';
				}
			if ($_POST['new_email'] === 'SPACES') {
				$error = 'O endereço de e-mail pode não consistir nos próprios espaços';
				}
			
			if (empty($error)) {
				$_POST['new_email'] = parse($_POST['new_email']);
				
				mysql_query("UPDATE `gracze` SET `email` = '".$_POST['new_email']."' WHERE `id` = '".$user['tw_id']."'");
				
				header('location: game.php?village='.$village['id'].'&screen=settings&mode=email');
				exit;
				}
			} else {
			$error = 'Apresente o passe correto.';
			}
		} else {
		$error = 'Vai executar ação.';
		}
	}
		
// de volta da base deste servidor
cdb_server();

$tpl->assign('email',$email);
$tpl->assign('error',$error);
?>