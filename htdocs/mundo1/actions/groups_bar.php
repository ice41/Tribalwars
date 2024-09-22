<?php
if (!is_array($grocusto_array)) {
	$grocusto_array = unserialize($user['grocusto']);
	if (!is_array($grocusto_array)) $grocusto_array = array();
	$grocusto_array = del_emptys($grocusto_array);
	if (!is_array($grocusto_array)) $grocusto_array = array();
	}

$grocusto_array_as_all = $grocusto_array;
$grocusto_array_as_all[] = 'all';

if (empty($__link)) {
	$__link = 'game.php?village='.$village['id'].'&screen='.$_GET['screen'].'&mode='.$_GET['mode'];
	}

if ($_GET['action'] === 'change_group' and isset($_GET['group'])) {
	if ($_GET['h'] == $session['hkey']) {
		$_GET['group'] = base64_decode($_GET['group']);
		if (in_array($_GET['group'],$grocusto_array_as_all)) {
			mysql_query("UPDATE `users` SET `aktu_group` = '".$_GET['group']."' WHERE `id` = '".$user['id']."'");
			mysql_query("UPDATE `users` SET `aktu_vpage` = '0' WHERE `id` = '".$user['id']."'");
			
			header('location: '.$__link);
			exit;
			} else {
			$error = 'Não existe esse grupo.';
			}
		} else {
		$error = 'Estará realizando ações.';
		}
	}
	
if (is_object($tpl)) {
	$tpl->assign('user_grocusto_all',$grocusto_array_as_all);
	}
?>