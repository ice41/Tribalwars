<?php
if ($_GET['action'] === 'change_settings' && count($_POST) > 0) {
	if ($_GET['h'] == $session['hkey']) {
		//Walidacja:
		$_POST['window_width'] = (int)$_POST['window_width'];
		if ($_POST['window_width'] < 500) {
			$_POST['window_width'] = 500;
			}
		if ($_POST['window_width'] > 9999) {
			$_POST['window_width'] = 9999;
			}
		$_POST['window_width'] = floor($_POST['window_width']);
		
		$_POST['map_size'] = (int)$_POST['map_size'];
		if ($_POST['map_size'] < 7) {
			$_POST['map_size'] = 7;
			}
		if ($_POST['map_size'] > 50) {
			$_POST['map_size'] = 50;
			}
		$_POST['map_size'] = floor($_POST['map_size']);
		
		if (isset($_POST['classic_graphics'])) {
			$_POST['classic_graphics'] = true;
			} else {
			$_POST['classic_graphics'] = false;
			}
			
		if (isset($_POST['confirm_queue'])) {
			$_POST['confirm_queue'] = false;
			} else {
			$_POST['confirm_queue'] = true;
			}
			
		if (isset($_POST['dyn_menu'])) {
			$_POST['dyn_menu'] = true;
			} else {
			$_POST['dyn_menu'] = false;
			}
			
		if (isset($_POST['show_toolbar'])) {
			$_POST['show_toolbar'] = true;
			} else {
			$_POST['show_toolbar'] = false;
			}
			
		mysql_query("UPDATE `users` SET `window_width` = '".$_POST['window_width']."' , 
			`map_size` = '".$_POST['map_size']."' , `classic_graphics` = '".$_POST['classic_graphics']."' ,
			`dyn_menu` = '".$_POST['dyn_menu']."' , `show_toolbar` = '".$_POST['show_toolbar']."' ,
			`confirm_queue` = '".$_POST['confirm_queue']."' WHERE `id` = '".$user['id']."'");
			
		header('location: game.php?village='.$village['id'].'&screen=settings&mode=settings');
		exit;
		} else {
		$error = 'B³¹d podczas wykonywania akcji';
		}
	}

$tpl->assign('error',$error);
?>