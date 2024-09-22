<?php
/*****************************************/
/*=======================================*/
/*     PLIK: memo.php   	         */
/*     DATA: 03.09.2013r                 */
/*     ROLA: akcja - admin		 */
/*     AUTOR:BARTEKST221                 */
/*=======================================*/
/*****************************************/

if ($conf['admin_key'] == 'actions_massiv_keyaaassd') {
	if ($_GET['akcja'] == 'dodaj_notke' and isset($_POST)) {
		if (strlen($_POST['nazwa']) < 5) {
			$err = 'Nazwa jest za krótka!(minimum 5 znaków)';
			} else {
			if (strlen($_POST['nazwa']) > 25) {
				$_POST['nazwa'] = urlencode($_POST['nazwa']);
				$err = 'Nazwa jest za d³uga!(maksimum 25 znaków)'; 

				} else {
			if (strlen($_POST['tworca']) > 50) {
				$_POST['tworca'] = urlencode($_POST['tworca']);
				$err = 'Nick w³aœciciela notatki jest za d³ugi!(max. 50 znaków)';  
				} else {
			if (strlen($_POST['tekst']) < 5) {
				$_POST['tekst'] = urlencode($_POST['tekst']);
				$err = 'Tekst jest za krótki!';  
				} else {
			if (strlen($_POST['tekst']) > 50000) {
				$_POST['tekst'] = urlencode($_POST['tekst']);
				$err = 'Tekst jest za d³ugi, max. 50.000 znaków!';  
			} else {
				mysql_query("INSERT INTO admin_memo(date,nazwa,tworca,tekst) VALUES('".date("U")."','".$_POST['nazwa']."','".$_POST['tworca']."','".$_POST['tekst']."')");
				header('LOCATION: admin.php?screen=memo');
				exit;
				}
			}
		}
      }
   }
}		
	if ($_GET['akcja'] == 'usun_notke' and isset($_GET['oid'])) {
		$_GET['oid'] = (int)$_GET['oid'];
		if ($_GET['oid'] < 0) {
			$_GET['oid'] = 0;
			}
		$_GET['oid'] = floor($_GET['oid']);
		$counts = sql("SELECT COUNT(id) FROM  `admin_memo` WHERE `id` = '".$_GET['oid']."'",'array');
		if ($counts > 0) {
			mysql_query("DELETE FROM `admin_memo` WHERE `id` = '".$_GET['oid']."'");
			}
		header('LOCATION: admin.php?screen=memo');
		exit;
		}
		
	$query['big_arr'] = mysql_query("SELECT * FROM `admin_memo` ORDER BY date DESC LIMIT 30");
	while ($mo_info = mysql_fetch_array($query['big_arr'])) {
		$notki[$mo_info['id']]['id'] = urldecode($mo_info['id']);
		$notki[$mo_info['id']]['date'] = formatuj_date($mo_info['date']);
	        $notki[$mo_info['id']]['tworca'] = urldecode($mo_info['tworca']);
	        $notki[$mo_info['id']]['tekst'] = urldecode($mo_info['tekst']);
	        $notki[$mo_info['id']]['nazwa'] = urldecode($mo_info['nazwa']);
		}
		
	$tpl->assign('notki',$notki);
	$tpl->assign('err',$err);
	}
?>