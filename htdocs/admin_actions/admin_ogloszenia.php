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
	if ($_GET['akcja'] == 'dodaj_ogloszenie' and isset($_POST)) {
		if (strlen($_POST['ogl_val']) < 5) {
			$err = 'Og³oszenie jest za krótkie (min. 5 znaków)';
			} else {
			if (strlen($_POST['ogl_val']) > 5000) {
				$_POST['ogl_val'] = urlencode($_POST['ogl_val']);
				$err = 'Og³oszenie jest za d³ugie (Max. 5000 znaków)'; 

				} else {
			if (strlen($_POST['ogl_nazwa']) > 6) {
				$_POST['ogl_nazwa'] = urlencode($_POST['ogl_nazwa']);
				$err = 'W nazwie musi byæ najwy¿ej 6 znaków!';  
			} else {
				mysql_query("INSERT INTO ogloszenia(data,text,typ,nazwa) VALUES('".date("U")."','".$_POST['ogl_val']."','".$_POST['ogl_typ']."','".$_POST['ogl_nazwa']."')");
				header('LOCATION: admin.php?screen=ogloszenia');
				exit;
				}
			}
		}
      }
		
	if ($_GET['akcja'] == 'usun_ogloszenie' and isset($_GET['oid'])) {
		$_GET['oid'] = (int)$_GET['oid'];
		if ($_GET['oid'] < 0) {
			$_GET['oid'] = 0;
			}
		$_GET['oid'] = floor($_GET['oid']);
		$counts = sql("SELECT COUNT(id) FROM  `ogloszenia` WHERE `id` = '".$_GET['oid']."'",'array');
		if ($counts > 0) {
			mysql_query("DELETE FROM `ogloszenia` WHERE `id` = '".$_GET['oid']."'");
			}
		header('LOCATION: admin.php?screen=ogloszenia');
		exit;
		}
		
	$query['big_arr'] = mysql_query("SELECT * FROM `ogloszenia` ORDER BY data DESC LIMIT 30");
	while ($og_info = mysql_fetch_array($query['big_arr'])) {
		$ogloszenia[$og_info['id']]['text'] = urldecode($og_info['text']);
		$ogloszenia[$og_info['id']]['data'] = formatuj_date($og_info['data']);
	$ogloszenia[$og_info['id']]['typ'] = urldecode($og_info['typ']);
	$ogloszenia[$og_info['id']]['nazwa'] = urldecode($og_info['nazwa']);
		}
		
	$tpl->assign('ogloszenia',$ogloszenia);
	$tpl->assign('err',$err);
	}
?>
