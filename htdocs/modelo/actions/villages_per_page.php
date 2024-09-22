<?php
if ($_GET['action'] === 'change_villages_per_page' and isset($_POST['sub'])) {
	if ($_GET['h'] == $session['hkey']) {
		$_POST['value'] = (int)$_POST['value'];
		$_POST['value'] = floor($_POST['value']);
		if ($_POST['value'] < 10 || $_POST['value'] > 500) {
			$error = 'O número de aldeias por página pode estar entre 10 e 500.';
			} else {
			mysql_query("UPDATE `users` SET `villages_per_page` = '".$_POST['value']."' WHERE `id` = '".$user['id']."'");
			mysql_query("UPDATE `users` SET `aktu_vpage` = '0' WHERE `id` = '".$user['id']."'");
			
			header('location: game.php?village='.$village['id'].'&screen='.$_GET['screen'].'&mode='.$_GET['mode']);
			exit;
			}
		} else {
		$error = 'Vai executar ação.';
		}
	}

if (is_object($tpl)) {
	$tpl->assign('user_villages_per_page',$user['villages_per_page']);
	$tpl->assign('error',$error);
	}
?>