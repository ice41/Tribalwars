<?php
/*****************************************/
/*=======================================*/
/*     PLIK: admin_index.php   		 	 */
/*     DATA: 15.12.2011r        		 */
/*     ROLA: akcja - admin				 */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

if ($config->get_cfg('admin_key') == 'actions_massiv_keyaaassd') {
	if ($_GET['akcja'] == 'dodaj_ogloszenie' and isset($_POST)) {
		if (strlen($_POST['ogl_val']) < 10) {
			$err = 'Og³oszenie jest za krótkie (min. 10 zanków)';
			} else {
			if (strlen($_POST['ogl_val']) > 1500) {
				$_POST['ogl_val'] = urlencode($_POST['ogl_val']);
				$err = 'Og³oszenie jest za d³ugie (maks. 1500 znaków)';
				} else {
				mysql_query("INSERT INTO ogloszenia(data,text) VALUES('".date("U")."','".$_POST['ogl_val']."')");
				header('LOCATION: admin.php?screen=index');
				exit;
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
		header('LOCATION: admin.php?screen=index');
		exit;
		}
		
	$query['big_arr'] = mysql_query("SELECT * FROM `ogloszenia` ORDER BY data DESC LIMIT 30");
	while ($og_info = mysql_fetch_array($query['big_arr'])) {
		$ogloszenia[$og_info['id']]['text'] = urldecode($og_info['text']);
		$ogloszenia[$og_info['id']]['data'] = formatuj_date($og_info['data']);
		}
		
	$tpl->assign('ogloszenia',$ogloszenia);
	$tpl->assign('err',$err);
	}
?>