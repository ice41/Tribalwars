<?php
$groups_array = unserialize($user['groups']);
if (!is_array($groups_array)) $groups_array = array();
$groups_array = del_emptys($groups_array);
if (!is_array($groups_array)) $groups_array = array();

if ($_GET['action'] === 'create_group' and count($_POST) > 0) {
	if ($_GET['h'] == $session['hkey']) {
		$_POST['group_name'] = cmp_str($_POST['group_name'],4,25);
		
		if ($_POST['group_name'] === 'SHORT') {
			$error = 'Nazwa grupy musi ska³adaæ siê co najmniej z 4 znaków.';
			}
		elseif ($_POST['group_name'] === 'LONG') {
			$error = 'Nazwa grupy mo¿e sk³adaæ siê z maksymalnie 25 znaków.';
			}
		elseif ($_POST['group_name'] === 'SPACES') {
			$error = 'Nazwa grupy nie mo¿e sk³adaæ siê z samych spacji.';
			} else {
			if (!in_array($_POST['group_name'],$groups_array)) {
				$groups_array[] = $_POST['group_name'];
				$user['groups'] = serialize($groups_array);
					
				mysql_query("UPDATE `users` SET `groups` = '".$user['groups']."' WHERE `id` = '".$user['id']."'");
					
				header('location: game.php?village='.$village['id'].'&screen='.$_GET['screen'].'&mode='.$_GET['mode']);
				exit;
				} else {
				$error = 'Istnieje ju¿ grupa o nazwie "'.$_POST['group_name'].'"';
				}
			}
		} else {
		$error = 'B³¹d wykonywania akcji.';
		}
	}
	
if ($_GET['action'] === 'del_group' and isset($_GET['group'])) {
	if ($_GET['h'] == $session['hkey']) {
		$_GET['group'] = base64_decode($_GET['group']);
		foreach ($groups_array as $group_name) {
			if ($group_name !== $_GET['group']) {
				$out_groups_arr[] = $group_name;
				}
			}
			
		if ($user['aktu_group'] == $_GET['group']) {
			mysql_query("UPDATE `users` SET `aktu_group` = 'all' WHERE `id` = '".$user['id']."'");
			mysql_query("UPDATE `villages` SET `group` = 'all' WHERE `userid` = '".$user['id']."' AND `group` = '".$_GET['group']."'");
			}
		
		$user['groups'] = serialize($out_groups_arr);
		
		mysql_query("UPDATE `users` SET `groups` = '".$user['groups']."' WHERE `id` = '".$user['id']."'");
					
		header('location: game.php?village='.$village['id'].'&screen='.$_GET['screen'].'&mode='.$_GET['mode']);
		exit;
		} else {
		$error = 'B³¹d wykonywania akcji.';
		}
	}
	
if ($_GET['action'] === 'change_group' and isset($_GET['group'])) {
	if ($_GET['h'] == $session['hkey']) {
		$_GET['group'] = base64_decode($_GET['group']);
		if (in_array($_GET['group'],$groups_array) || $_GET['group'] === 'all') {
			mysql_query("UPDATE `users` SET `aktu_group` = '".$_GET['group']."' WHERE `id` = '".$user['id']."'");
			mysql_query("UPDATE `users` SET `aktu_vpage` = '0' WHERE `id` = '".$user['id']."'");
					
			header('location: game.php?village='.$village['id'].'&screen='.$_GET['screen'].'&mode='.$_GET['mode']);
			exit;
			} else {
			$error = 'Nie ma takiej grupy.';
			}
		} else {
		$error = 'B³¹d wykonywania akcji.';
		}
	}
	
if (is_object($tpl)) {
	$tpl->assign('user_groups',$groups_array);
	$tpl->assign('error',$error);
	}
?>