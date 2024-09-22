<?php
$grocusto_array = unserialize($user['grocusto']);
if (!is_array($grocusto_array)) $grocusto_array = array();
$grocusto_array = del_emptys($grocusto_array);
if (!is_array($grocusto_array)) $grocusto_array = array();

if ($_GET['action'] === 'create_group' and count($_POST) > 0) {
	if ($_GET['h'] == $session['hkey']) {
		$_POST['group_name'] = cmp_str($_POST['group_name'],4,25);
		
		if ($_POST['group_name'] === 'SHORT') {
			$error = 'O nome do grupo deve marcar pelo menos 4 marcações.';
			}
		elseif ($_POST['group_name'] === 'LONG') {
			$error = 'O nome do grupo pode consistir em um máximo de 25 sinais.';
			}
		elseif ($_POST['group_name'] === 'SPACES') {
			$error = 'O nome do grupo não pode consistir nos próprios espaços.';
			} else {
			if (!in_array($_POST['group_name'],$grocusto_array)) {
				$grocusto_array[] = $_POST['group_name'];
				$user['grocusto'] = serialize($grocusto_array);
					
				mysql_query("UPDATE `users` SET `grocusto` = '".$user['grocusto']."' WHERE `id` = '".$user['id']."'");
					
				header('location: game.php?village='.$village['id'].'&screen='.$_GET['screen'].'&mode='.$_GET['mode']);
				exit;
				} else {
				$error = 'Já existe um grupo chamado "'.$_POST['group_name'].'"';
				}
			}
		} else {
		$error = 'Vai executar ação.';
		}
	}
	
if ($_GET['action'] === 'del_group' and isset($_GET['group'])) {
	if ($_GET['h'] == $session['hkey']) {
		$_GET['group'] = base64_decode($_GET['group']);
		foreach ($grocusto_array as $group_name) {
			if ($group_name !== $_GET['group']) {
				$out_grocusto_arr[] = $group_name;
				}
			}
			
		if ($user['aktu_group'] == $_GET['group']) {
			mysql_query("UPDATE `users` SET `aktu_group` = 'all' WHERE `id` = '".$user['id']."'");
			mysql_query("UPDATE `villages` SET `group` = 'all' WHERE `userid` = '".$user['id']."' AND `group` = '".$_GET['group']."'");
			}
		
		$user['grocusto'] = serialize($out_grocusto_arr);
		
		mysql_query("UPDATE `users` SET `grocusto` = '".$user['grocusto']."' WHERE `id` = '".$user['id']."'");
					
		header('location: game.php?village='.$village['id'].'&screen='.$_GET['screen'].'&mode='.$_GET['mode']);
		exit;
		} else {
		$error = 'Estará realizando ações.';
		}
	}
	
if ($_GET['action'] === 'change_group' and isset($_GET['group'])) {
	if ($_GET['h'] == $session['hkey']) {
		$_GET['group'] = base64_decode($_GET['group']);
		if (in_array($_GET['group'],$grocusto_array) || $_GET['group'] === 'all') {
			mysql_query("UPDATE `users` SET `aktu_group` = '".$_GET['group']."' WHERE `id` = '".$user['id']."'");
			mysql_query("UPDATE `users` SET `aktu_vpage` = '0' WHERE `id` = '".$user['id']."'");
					
			header('location: game.php?village='.$village['id'].'&screen='.$_GET['screen'].'&mode='.$_GET['mode']);
			exit;
			} else {
			$error = 'Não existe esse grupo.';
			}
		} else {
		$error = 'Estará realizando ações.';
		}
	}
	
if (is_object($tpl)) {
	$tpl->assign('user_grocusto',$grocusto_array);
	$tpl->assign('error',$error);
	}
?>