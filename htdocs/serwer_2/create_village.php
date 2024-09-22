<?php
/*****************************************/
/*=======================================*/
/*     PLIK: create_village.php   		 */
/*     DATA: 14.12.2011r        		 */
/*     ROLA: Mo¿liwoœæ utorzenia wioski  */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

require('include.inc.php');

if ($config['not_more_villages'] == true) {
	header('LOCATION: not_more_villages.php');
	exit;
	}
	
$sid = new sid();
$tpl = new smarty();

$user = $sid->check_sid($_COOKIE['session']);

if (!is_array($user)) {
	header('LOCATION: sid_wrong.php');
	exit;
	} else {
	$userinfo = sql("SELECT villages,username,ennobled_by FROM `users` WHERE `id` = '".$user['userid']."'",'assoc');
	if ($userinfo['villages'] > 0) {
		header('LOCATION: game.php');
		exit;
		} else {
		$create_vg = sql("SELECT * FROM `twozenie_osady`",'assoc');
		if ($create_vg['okrag'] < 703) {
			if ($config['create_users_and_villages'] === true) {
				if ($config['village_choose_direction'] === true) {
					if ($_GET['action'] == 'create' and isset($_POST)) {
						create_vill_for_player($user['userid'],$_POST['direction']);
						mysql_query("UPDATE `users` SET `razy_rozp_nwg` = `razy_rozp_nwg` + '1' WHERE `id` = '".$user['userid']."'");
						header('LOCATION: game.php');
						exit;
						}
					}
				if ($config['village_choose_direction'] === false) {
					create_vill_for_player($user['userid'],$_POST['direction']);
					mysql_query("UPDATE `users` SET `razy_rozp_nwg` = `razy_rozp_nwg` + '1' WHERE `id` = '".$user['userid']."'");
					header('LOCATION: game.php');
					exit;
					}
				}
			}
			
		if ($create_vg['okrag'] < 703) {
			$can_create_village = true;
			} else {
			$can_create_village = false;
			}
		$tpl->assign('can_create_village',$can_create_village);
		$tpl->assign('create_users_and_villages',$config['create_users_and_villages']);
		$tpl->assign('ennobled_by',$userinfo['ennobled_by']);
		$tpl->display('createvillage.tpl');
		}
	}
?>