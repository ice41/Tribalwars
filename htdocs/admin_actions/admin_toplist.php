<?php
/*****************************************/
/*=======================================*/
/*     PLIK: admin_ogloszenia.php   	 */
/*     DATA: 15.12.2011r                 */
/*     ROLA: akcja - admin		 */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

if ($conf['admin_key'] == 'actions_massiv_keyaaassd') {
	if ($_GET['akcja'] == 'dodaj_topke' and isset($_POST)) {
		if (strlen($_POST['link']) < 10) {
			$err = 'Podany link jest za krótki!';
			} else {
			if (strlen($_POST['link']) > 120) {
				$_POST['link'] = urlencode($_POST['link']);
				$err = 'Podany link jest za d³ugi!'; 
			} else {
			if (strlen($_POST['obraz']) > 120) {
				$_POST['obraz'] = urlencode($_POST['obraz']);
				$err = 'Link do obrazka jest za d³ugi!'; 


			} else {
				mysql_query("INSERT INTO toplisty(data,link,obraz) VALUES('".date("U")."','".$_POST['link']."','".$_POST['obraz']."')");
				header('LOCATION: admin.php?screen=toplist');
				exit;
				}
			}
		}
      }
		
	if ($_GET['akcja'] == 'usun_topke' and isset($_GET['oid'])) {
		$_GET['oid'] = (int)$_GET['oid'];
		if ($_GET['oid'] < 0) {
			$_GET['oid'] = 0;
			}
		$_GET['oid'] = floor($_GET['oid']);
		$counts = sql("SELECT COUNT(id) FROM  `toplisty` WHERE `id` = '".$_GET['oid']."'",'array');
		if ($counts > 0) {
			mysql_query("DELETE FROM `toplisty` WHERE `id` = '".$_GET['oid']."'");
			}
		header('LOCATION: admin.php?screen=toplist');
		exit;
		}
		
	$query['big_arr'] = mysql_query("SELECT * FROM `toplisty` ORDER BY data DESC LIMIT 30");
	while ($tp_info = mysql_fetch_array($query['big_arr'])) {
		$toplisty[$tp_info['id']]['data'] = formatuj_date($tp_info['data']);
		$toplisty[$tp_info['id']]['link'] = urldecode($tp_info['link']);
		$toplisty[$tp_info['id']]['obraz'] = urldecode($tp_info['obraz']);

		}
		
	$tpl->assign('toplisty',$toplisty);
	$tpl->assign('err',$err);
	}
?>
