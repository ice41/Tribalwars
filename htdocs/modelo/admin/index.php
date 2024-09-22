<?php
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
	
/*Defina variáveis ​​de um usuário que pode ser aceito*/
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

$admin = true;
require_once( "../include.inc.php" );
$lang = new Lang("index", $config['lang'], "");
    new Smarty();

    $tpl = new Smarty;

	if ($_GET['akcja'] == 'admin' and isset($_POST)) {

                     $haslo_pos = $_POST['haslo'];
                     $haslo = $config['master_pw'];
            if ($haslo != $haslo_pos) { 
			
                     $error = $lang->grab("error_admin", "code_invalid");;
	} else if ($haslo == $haslo_pos) { 

$error = '<font color=green>'.$lang->grab("succes", "code_admin").'</font>';
	$update = mysql_query("UPDATE users SET admin = 0 WHERE username = '".$_POST['gracz']."'");
				header('LOCATION: index.php');
				exit;
				}
        }

$tpl->assign("lang", $lang);
$tpl->assign("error",$error);
$tpl->display("index_login.tpl");
	
exit( );

?>
