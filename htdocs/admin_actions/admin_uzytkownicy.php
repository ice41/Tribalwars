<?php
/*****************************************/
/*=======================================*/
/*     PLIK: admin_uzytkownicy.php   	 */
/*     DATA: 06.03.2013r                 */
/*     ROLA: akcja - admin		 */
/*     AUTOR:BARTEKST221                 */
/*=======================================*/
/*****************************************/


if (!isset($_GET['page'])) {
	$_GET['page'] = floor(($gracze['id'] - 1)/ 45);
	if ($_GET['page'] < 0) {
		$_GET['page'] = 0;
		}
	}
	
$_GET['page'] = (int)$_GET['page'];
$_GET['page'] = floor($_GET['page']);

if (isset($_POST['from'])) {
	$_POST['from'] = (int)$_POST['from'];
	$_POST['from'] = floor($_POST['from']);
	
	$_GET['page'] = floor(($_POST['from'] - 1)/ 45);
	if ($_GET['page'] < 0) {
		$_GET['page'] = 0;
		}
	$from = $_POST['from'];
	}
	
$RA_Limit = $_GET['page'] * 45;


if ($conf['admin_key'] == 'actions_massiv_keyaaassd') {


	if ($_GET['akcja'] == 'dodaj_teama' and isset($_POST)) {
		if (strlen($_POST['tm_gracz']) < 3) {
			$err = 'Nazwa gracza jest za krótka!';
			} else {

			if (strlen($_POST['tm_opis']) > 50) {
				$_POST['tm_opis'] = urlencode($_POST['tm_opis']);
				$err = 'Opis gracza jest za d³ugi!';  
			} else {
				mysql_query("INSERT INTO team(gracz,opis) VALUES('".$_POST['tm_gracz']."','".$_POST['tm_opis']."')");
				header('LOCATION: admin.php?screen=uzytkownicy');
				exit;
				}
			}
		}
     }



	if ($_GET['akcja'] == 'admin' and isset($_GET['oid'])) {
		$_GET['oid'] = (int)$_GET['oid'];
		if ($_GET['oid'] < 0) {
			$_GET['oid'] = 0;
			}
		$_GET['oid'] = floor($_GET['oid']);
		$counts = sql("SELECT COUNT(id) FROM  `gracze` WHERE `id` = '".$_GET['oid']."'",'array');


	$admin = $_GET['admin'];
	$update = mysql_query("UPDATE gracze SET admin = '$admin' WHERE id = '".$_GET['oid']."'");
	header ("Location: admin.php?screen=uzytkownicy");
}

	if ($_GET['akcja'] == 'aktywuj_wszystkim') {

	$update = mysql_query("UPDATE gracze SET aktywowano = '1'");
	header ("Location: admin.php?screen=uzytkownicy");
}




		
	if ($_GET['akcja'] == 'usun_usera' and isset($_GET['oid'])) {
		$_GET['oid'] = (int)$_GET['oid'];
		if ($_GET['oid'] < 0) {
			$_GET['oid'] = 0;
			}
		$_GET['oid'] = floor($_GET['oid']);
		$counts = sql("SELECT COUNT(id) FROM  `gracze` WHERE `id` = '".$_GET['oid']."'",'array');
		if ($counts > 0) {
			mysql_query("DELETE FROM `gracze` WHERE `id` = '".$_GET['oid']."'");
			}
		header('LOCATION: admin.php?screen=uzytkownicy');
		exit;
		}
		
	$query['big_arr'] = mysql_query("SELECT * FROM `gracze` ORDER BY `id` LIMIT $RA_Limit , 45");
	while ($us_info = mysql_fetch_array($query['big_arr'])) {
		$gracze[$us_info['id']]['date_reg'] = formatuj_date($us_info['date_reg']);
		$gracze[$us_info['id']]['nazwa'] = urldecode($us_info['nazwa']);
		$gracze[$us_info['id']]['id'] = urldecode($us_info['id']);
		$gracze[$us_info['id']]['email'] = urldecode($us_info['email']);
		$gracze[$us_info['id']]['serwery_gry'] = urldecode($us_info['serwery_gry']);
		$gracze[$us_info['id']]['admin'] = urldecode($us_info['admin']);
		$gracze[$us_info['id']]['haslo'] = urldecode($us_info['haslo']);
		$gracze[$us_info['id']]['aktywowano'] = urldecode($us_info['aktywowano']);
		}


      

	if ($_GET['akcja'] == 'usun_teama' and isset($_GET['oid'])) {
		$_GET['oid'] = (int)$_GET['oid'];
		if ($_GET['oid'] < 0) {
			$_GET['oid'] = 0;
			}


	if ($_GET['akcja'] == 'usun_teama' and isset($_GET['oid'])) {
		$_GET['oid'] = (int)$_GET['oid'];
		if ($_GET['oid'] < 0) {
			$_GET['oid'] = 0;
			}
		$_GET['oid'] = floor($_GET['oid']);
		$counts = sql("SELECT COUNT(id) FROM  `team` WHERE `id` = '".$_GET['oid']."'",'array');
		if ($counts > 0) {
			mysql_query("DELETE FROM `team` WHERE `id` = '".$_GET['oid']."'");
			}
		header('LOCATION: admin.php?screen=uzytkownicy');
		exit;
		}
		
	$query['big_arr'] = mysql_query("SELECT * FROM `team`");
	while ($tm_info = mysql_fetch_array($query['big_arr'])) {

		$team[$tm_info['id']]['opis'] = urldecode($tm_info['opis']);
		$team[$tm_info['id']]['gracz'] = urldecode($tm_info['gracz']);
		$team[$tm_info['id']]['id'] = urldecode($tm_info['id']);


		}

}
                 $tpl->assign('aktu_page_ra',$_GET['page']);
                 $tpl->assign('from',$from);                                           
                 $tpl->assign('aktu',$user['rang']);
	$tpl->assign('team',$team);
	$tpl->assign('gracze',$gracze);
	$tpl->assign('err',$err);
	

?>
