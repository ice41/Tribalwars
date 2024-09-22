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

eaccelerator_load('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'); ?>