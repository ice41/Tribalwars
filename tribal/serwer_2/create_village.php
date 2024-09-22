<?php
/*****************************************/
/*=======================================*/
/*     PLIK: create_village.php   		 */
/*     DATA: 14.12.2011r        		 */
/*     ROLA: Mo¿liwoœæ utorzenia wioski  */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

/*MA£E ZABESPIECZENIE PLEMION PRZED HAKERAMI :)*/

class GLOBALS {
	var $defined_globals = array();
	
	function define_global($globalname) {
		if (is_array($globalname)) {
			foreach ($globalname as $globalne) {
				$this->defined_globals[$globalne] = TRUE;
				}
			} else {
			$this->defined_globals[$globalname] = TRUE;
			}
		}
		
	function unregister_undefined_globals() {		
		$HTTP_GETS = $_GET;
		
		foreach ($HTTP_GETS as $HTTP_KEY => $HTTP_VAL) {
			unset($GLOBALS[$HTTP_KEY]);
			}
		}
	}
	
/*ZDEFINIUJ ZMIENNE POCHODZ¥CE OD USERA, KTÓRE MOG¥ BYÆ AKCEPTOWANE*/
$DS_USER_GLOBALS = new GLOBALS;
$DS_USER_GLOBALS->define_global('village');
$DS_USER_GLOBALS->define_global('id');
$DS_USER_GLOBALS->define_global('x');
$DS_USER_GLOBALS->define_global('y');
$DS_USER_GLOBALS->define_global('screen');
$DS_USER_GLOBALS->define_global('mode');
$DS_USER_GLOBALS->define_global('type');
$DS_USER_GLOBALS->define_global('target');
$DS_USER_GLOBALS->define_global('action');
$DS_USER_GLOBALS->define_global('h');
$DS_USER_GLOBALS->define_global('strona');
$DS_USER_GLOBALS->define_global('page');
$DS_USER_GLOBALS->define_global('rlog');
$DS_USER_GLOBALS->define_global('sort');
$DS_USER_GLOBALS->define_global('order');
$DS_USER_GLOBALS->define_global('filter');
$DS_USER_GLOBALS->define_global('akcja');
$DS_USER_GLOBALS->define_global('group');
$DS_USER_GLOBALS->define_global('try');
$DS_USER_GLOBALS->define_global('view');
$DS_USER_GLOBALS->define_global('item_name');
$DS_USER_GLOBALS->define_global('unit');
$DS_USER_GLOBALS->unregister_undefined_globals();

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
		if ($create_vg['okrag'] < 705) {
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
			
		if ($create_vg['okrag'] < 705) {
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