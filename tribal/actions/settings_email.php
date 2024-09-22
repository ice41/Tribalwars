<?php
//Po³¹czyæ z centraln¹ baz¹ danych:
cdb_central();

$email = entparse(sql("SELECT `email` FROM `gracze` WHERE `id` = '".$user['tw_id']."'",'array'));

if ($_GET['action'] === 'change_email' and count($_POST) > 0) {
	if ($_GET['h'] == $session['hkey']) {
		//Wbierz has³o
		$tw_user_pass = sql("SELECT `haslo` FROM `gracze` WHERE `id` = '".$user['tw_id']."'",'array');
		
		
		//Zakoduj stare has³o
		$_POST['passwd'] = md5($_POST['passwd']);
		
		if ($tw_user_pass === $_POST['passwd']) {
			//PrzeprowadŸ walidacjê stringu:
			$_POST['new_email'] = cmp_str($_POST['new_email'],4,75);
			
			if ($_POST['new_email'] === 'SHORT') {
				$error = 'E-mail deve ser enviado em uma composição de pelo menos 4 caracteres';
				}
			if ($_POST['new_email'] === 'LONG') {
				$error = 'E-mail pode sk enviados em um máximo de 75 caracteres';
				}
			if ($_POST['new_email'] === 'SPACES') {
				$error = 'E-mail não pode ser enviado em uma composição do mesmo espaço';
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
		$error = 'B³¹d wykonywania akcji.';
		}
	}
		
//Z powrotem po³¹cz z baz¹ tego serwera
cdb_server();

$tpl->assign('email',$email);
$tpl->assign('error',$error);
?>