<?php
if ($_GET['action'] === 'move' and count($_POST) > 0) {
	if ($_GET['h'] == $session['hkey']) {
		//Po³¹czyæ z centraln¹ baz¹ danych:
		cdb_central();

		//Wbierz has³o
		$tw_user_pass = sql("SELECT `haslo` FROM `gracze` WHERE `id` = '".$user['tw_id']."'",'array');
		
		//Z powrotem po³¹cz z baz¹ tego serwera
		cdb_server();

		
		
		//Zakoduj stare has³o
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
				$error = 'Reinicie a possibilidade pode apenas se você tiver exatamente um aldeia.';
				}
			} else {
			$error = 'Digite a senha correta o';
			}
		} else {
		$error = 'B³¹d wykonywania akcji.';
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