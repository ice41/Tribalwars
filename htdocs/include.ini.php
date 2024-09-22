<?php
ob_start();

/*MAŁE ZABESPIECZENIE PLEMION PRZED HAKERAMI :)*/

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
	
/*ZDEFINIUJ ZMIENNE POCHODZĄCE OD USERA, KTÓRE MOGĄ BYĆ AKCEPTOWANE*/
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
//Na sam początek sprawdź - czy instalacja już się odbyła?
@include ('configs/install.php');
//Jeśli nie znajduje pliku - dodaj funkcję flase
if (empty($install)) {
$install = false;
}
//Dodatkowa funkcja
if (empty($pakiet)) {
$pakiet = false;
}
//Sprawdź, czy zrobić przekierowanie do instalatora czy nie
if (!$install) {
die ('Nie zainstalowałeś jeszcze pakietu! Przejdz do strony <a href="install.php">instalacji</a> aby go zainstalowac!');
}
//Dodatkowe opcje
if ($pakiet) {
$conf['strona'] = "http://plemiona-silnik.zz.mu/";
$handle=fopen("http://plemiona-silnik.zz.mu/checked_license.php?license=".$pakiet, 'r');
$check=fgetcsv($handle,1024);
fclose($handle);
$licencja = $check[0];
if ($licencja == 'false' && !$panel_admina) {
die ('Usługi premium które wykupiłeś dla strony nie istnieją lub wygasły! Przejdź do <a href="admin.php">Panelu admina</a> aby je wyłaczyć!');
}
}

// Funções, classes e configuração
require('lib/configs.php');
require('configs/config.php');
require('configs/serwery.php');
require('lib/functions.php');
require('lib/smarty/smarty.class.php');


//Klasa Smarty - tpl
$tpl = new smarty();

// Conectar-se ao banco de dados geral:
$connect = mysql_connect($conf['db_host'],$conf['db_user'],$conf['db_pass'],'');
mysql_select_db($conf['db_name'],$connect);
?>