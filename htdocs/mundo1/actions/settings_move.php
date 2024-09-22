<?php
if ($_GET['action'] === 'move' and count($_POST) > 0) {
	if ($_GET['h'] == $session['hkey']) {
		// lida com o banco de dados central:
		cdb_central();

		// entre no caso
		$tw_user_pass = sql("SELECT `haslo` FROM `gracze` WHERE `id` = '".$user['tw_id']."'",'array');
		
		// de volta da base deste servidor
		cdb_server();

		
		
		// entra no velho tem �o
		if (!empty($_POST['password'])) {
			$_POST['password'] = md5($_POST['password']);
			}
		
		if ($tw_user_pass === $_POST['password'] && !empty($_POST['password'])) {
			if ($user['villages'] == 1) {
				$rel_time = date("U");
				
				mysql_query("UPDATE `users` SET `villages` = '0' , `points` = '0' , `paladins` = '0', `ennobled_by` = '' , `attacks` = '' , `last_move` = '$rel_time' WHERE `id` = '".$user['id']."'");
				mysql_query("UPDATE `villages` SET `userid` = '-1' , `name` = '".$config['left_name']."' WHERE `userid` = '".$user['id']."'");
				header('location: create_village.php');
				exit;
				
				} else {
				$error = 'O reinício só é possível se tiver uma aldeia.';
				}
			} else {
			$error = 'Apresente o correto.';
			}
		} else {
		$error = 'Estará realizando ações.';
		}
	}
	

$next_can_move = date("U") - 259200;

if ($next_can_move >= $user['last_move']) {
	$form = true;
	} else {
	$form = false;
	$tpl->assign('mozliwe_o',$pl->format_date($user['last_move'] + 259200));
	}

$tpl->assign('error',$error);
$tpl->assign('form',$form);
?>