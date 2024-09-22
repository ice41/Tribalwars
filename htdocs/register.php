<?php
/*****************************************/
/*=======================================*/

/*     PLIK: register.php   		 */

/*     DATA: 11.12.2011r        	 */

/*     ROLA: Zarejestrowanie gracza	 */

/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/


/*MA�E ZABESPIECZENIE PLEMION PRZED HAKERAMI :)*/



require ('include.ini.php');
require('configs/serwery.php');


$all_mods = array('rejestracja','powodzenie');


if (!in_array($_GET['mode'],$all_mods)) {
	

$mode = 'rejestracja';
	} else {
	$mode = $_GET['mode'];
	}


if ($mode == 'rejestracja') {
	if ($_GET['action'] == 'create' && isset($_POST)) {
		$wynik = zakladaj_konto('".date_reg("d.m.Y")."',$_POST['name'],$_POST['password'],$_POST['password_confirm'],$_POST['email'],$_POST['agb']);
		if (is_numeric($wynik)) {
			header('LOCATION: register.php?mode=powodzenie&gracz='.$wynik);
			exit;
			} else {
			$error = $wynik;
			}
		}
	}
if ($mode == 'powodzenie') {
	if (empty($_GET['gracz'])) {
		$pokaz = false;
		} else {
		$_GET['gracz'] = cmp_str($_GET['gracz'],0,100);
		$username = entparse(sql("SELECT `nazwa` FROM `gracze` WHERE `id` = '".$_GET['gracz']."'",'array'));
	
$kod = entparse(sql("SELECT `kod` FROM `gracze` WHERE `id` = '".$_GET['gracz']."'",'array'));
		$pokaz = true;
		}
	

$p_admin = $configs['pierwszy_admin'];

$tpl->assign('pokaz',$pokaz);
	
$tpl->assign('p_admin',$p_admin);

$tpl->assign('username',$username);
	
$tpl->assign('kod',$kod);


}

if(empty($_GET['server'])) {
$serwer = $serwery[(count($serwery) - 1)];
} else {
$serwer = $_GET['server'];
$serwer = str_replace('pl','',$serwer);
}
	
mysql_close();

if ($configs['aktywacja'] == 'true') {
$wa = 'true';
}
if (isset($_GET['ajax'])) {
$ajax = true;
} else {
$ajax = false;
}
$tpl->assign('ajax',$ajax);
$tpl->assign('serwer',$serwer);
$tpl->assign('wa',$wa);
$tpl->assign('error',$error);

$tpl->assign('mode',$mode);
$tpl->assign('linki',$linki);

$tpl->display('register.tpl');
?>



			<script type="text/javascript">
			//<![CDATA[
			Register.messages = {
				name_too_short : 'O Nome deve conter pelo menos quatro caracteres!',
				name_too_long : 'O Nome pode conter até vinte e quatro caracteres!',
				name_contains_invalid_chars : 'Nome inválido',
				name_is_taken : 'Nome já em uso!'
			};

			$(document).ready(function() {
				Register.checkName($('#name').val());
							});
			GAPageTracking.track({ page_identifier : "reg_form", page_type : "game"});
			//]]>
			</script>