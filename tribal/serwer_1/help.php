<?php 
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

//Help.php
require ('include.inc.php');

$tpl = new smarty();
$awards = new awards();
$awards->reload_day_awards();

if (file_exists("rangs_reloader/lastrel.txt")) {
	$nxt_rel = file_get_contents("rangs_reloader/lastrel.txt");
	if (date("U") > $nxt_rel) {
		reload_all_rangs();
		$f = fopen("rangs_reloader/lastrel.txt",'w');
		fputs($f,date("U") + 1800);
		fclose($f);
		}
	}
	
$modes = array(
	'Pierwsze kroki' => 'intro',
	'PuŸny stary' => 'late_start',
	'Jednostki' => 'units',
	'Budynki' => 'buildings',
	'Walka' => 'fight',
	'Technologie' => 'techs',
	'Mapa' => 'map',
	'Raporty' => 'reports',
	'Tabela punktów' => 'points',
	'Kody BB' => 'bb',
	'Info serwera' => 'server_info',
	'Wojsko' => 'units_faq',
	'Plemiê' => 'ally_faq'
	);
	
if (!in_array($_GET['mode'],$modes)) {
	$_GET['mode'] = 'intro';
	}
	
if ($_GET['mode'] === 'buildings') {
	$tpl->assign('cl_builds',$cl_builds);
	}
if ($_GET['mode'] === 'points') {
	$tpl->assign('cl_builds',$cl_builds);
	$tpl->assign('builds',$cl_builds->get_array("dbname"));
	$tpl->assign('max_stage',$cl_builds->get_highest_stage());
	}
if ($_GET['mode'] === 'units') {
	$tpl->assign('cl_units',$cl_units);
	}
if ($_GET['mode'] === 'techs') {
	$tpl->assign('cl_techs',$cl_techs);
	$tpl->assign('cl_units',$cl_units);
	$tpl->assign('cl_builds',$cl_builds);
	}
if ($_GET['mode'] === 'server_info') {
	$tpl->assign('speed',$config['speed']);
	$tpl->assign('units_speed',$config['movement_speed']);
	$tpl->assign('buildings_destroy',$config['destroy_mode_main']);
	$tpl->assign('morals',$config['moral_activ']);
	$tpl->assign('basic_village_defense',$config['reason_defense']);
	$tpl->assign('max_tech_level',max($cl_techs->maxStage));
	$tpl->assign('display_awards',$config['awards']);
	$tpl->assign('bot_barbar_disp',$config['rozwoj_barbar_wiosek']);
	$tpl->assign('bot_barbar_limit',$config['rozwoj_barabar_punkty']);
	$tpl->assign('noc',$config['noc']);
	$tpl->assign('time_att_pz',$config['cancel_movement']);
	$tpl->assign('cancel_dealers',$config['noc']);
	if ($config['noob_protection'] == '-1') {
		$tpl->assign('protect_new_users','-1');
		} else {
		$tpl->assign('protect_new_users',$config['noob_protection'] / 1440);
		}
	if (!empty($cl_units->name['unit_archer']) || !empty($cl_units->name['unit_cav_archer'])) {
		$tpl->assign('archers',true);
		} else {
		$tpl->assign('archers',false);
		}
	if (!empty($cl_units->name['unit_paladin'])) {
		$tpl->assign('paladin',true);
		} else {
		$tpl->assign('paladin',false);
		}
	if ($config['ag_style'] == 0) { 
		$tpl->assign('snob_text','Suma poziomów pa³aców');
		}
	elseif ($config['ag_style'] == 1) {
		$tpl->assign('snob_text','Z³ote monety');
		} else {
		$tpl->assign('snob_text','Brak danych');
		}
	$tpl->assign('snob_range',$config['snob_range']);
	$tpl->assign('pop_min',$config['pop_min']);
	$tpl->assign('pop_max',$config['pop_max']);
	$tpl->assign('pop_per_hour',round($config['agreement_per_hour'] * $config['speed']));
	$tpl->assign('village_choose_direction',$config['village_choose_direction']);
	if (file_exists('rangs_reloader/serwer_start.txt')) {
		$tpl->assign('server_start',date("Y-m-d",file_get_contents('rangs_reloader/serwer_start.txt')));
		} else {
		save2('rangs_reloader/serwer_start.txt',date("U"));
		$tpl->assign('server_start',date("Y-m-d",file_get_contents('rangs_reloader/serwer_start.txt')));
		}
	$tpl->assign('village_choose_direction',$config['village_choose_direction']);
	}
	
$tpl->assign('serwerid',$config['__SERVER__ID']);
$tpl->assign('modes',$modes);
$tpl->assign('mode',$_GET['mode']);

$tpl->display('help.tpl');
?>