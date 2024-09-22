<?php
if ($_GET['action'] === 'change_passwd' and count($_POST) > 0) {
	if ($_GET['h'] == $session['hkey']) {
		// lida com o banco de dados central:
		cdb_central();
		
		// entre no caso
		$tw_user_pass = sql("SELECT `haslo` FROM `gracze` WHERE `id` = '".$user['tw_id']."'",'array');
		
		// entra no velho tem �o
		$_POST['old_passwd'] = md5($_POST['old_passwd']);
		
		if ($tw_user_pass === $_POST['old_passwd']) {
			if ($_POST['new_passwd'] === $_POST['new_passwd_rpt']) {
				if (strlen($_POST['new_passwd']) < 4) {
					$error = 'O novo teve pelo menos 4 marcações.';
					} else {
					$_POST['new_passwd'] = md5($_POST['new_passwd']);
					mysql_query("UPDATE `gracze` SET `haslo` = '".$_POST['new_passwd']."' WHERE `id` = '".$user['tw_id']."'");
					header('location: game.php?village='.$village['id'].'&screen=settings&mode=change_passwd');
					exit;
					}
				} else {
				$error = 'O novo tem `` deve ser idêntico ao campo repetido.';
				}
			} else {
			$error = 'Apresente o passe correta.';
			}
		
		// de volta da base deste servidor
		cdb_server();
		} else {
		$error = 'B��d wykonywania akcji.';
		}
	}
	
$tpl->assign('error',$error);
?>