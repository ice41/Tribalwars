<?php
$awards_user_settings = sql("SELECT hide_own_awards,hide_own_wtwaw FROM `users` WHERE `id` = '".$user['id']."'",'assoc');

if ($_GET['action'] === 'h_set') {
	if ($_GET['h'] == $session['hkey']) {
		//Walidacja:
		if (isset($_POST['hide_own_awards'])) {
			$_POST['hide_own_awards'] = true;
			} else {
			$_POST['hide_own_awards'] = false;
			}
			
		if (isset($_POST['hide_own_wtwaw'])) {
			$_POST['hide_own_wtwaw'] = true;
			} else {
			$_POST['hide_own_wtwaw'] = false;
			}
			
		mysql_query("UPDATE `users` SET `hide_own_awards` = '".$_POST['hide_own_awards']."' , 
			`hide_own_wtwaw` = '".$_POST['hide_own_wtwaw']."' WHERE `id` = '".$user['id']."'");
			
		header('location: game.php?village='.$village['id'].'&screen=settings&mode=award');
		exit;
		} else {
		$error = 'Vai executar ação.';
		}
	}
	
$tpl->assign('setts',$awards_user_settings);
$tpl->assign('error',$error);
?>