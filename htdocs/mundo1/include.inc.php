<?php
/*****************************************/
/*=======================================*/
/*     PLIK: include.inc.php   		 	 */
/*     DATA: 15.12.2011r        		 */
/*     ROLA: Plik ³aduj¹cy klasy		 */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

//Ustaw czas na poprawny:

//Poka¿ 20 cyfr po przecinku:
ini_set('precision','20');

require 'lib/lonczenie_new.php';

require ('lib/parse_time.php');
$ParseTime = new parse_time();
$ParseTime->start();

$sicher = true;
	
require 'lib/config.php';
	
require 'lib/smarty/smarty.class.php';

require 'lib/builds.php';

require 'lib/units.php';

require ('lib/class/Lang.class.php');
$lang = empty($config['lang']) ? "pl" : $config['lang'];
$lang_ = empty($config['lang']) ? "pl" : $config['lang'];
// Jêzyk
$lang = new Lang("index", $lang);
//Zdefiniuj wa¿ne zmienne:
$impl_units = implode(",",$cl_units->get_array("dbname"));
$impl_units_all = implode(",all_",$cl_units->get_array("dbname"));
$impl_units_all = 'all_'.$impl_units_all;
$impl_builds = implode(",",$cl_builds->get_array("dbname"));

require 'lib/functions.php';

require 'lib/bonus.php';

require 'lib/class/DB_MySQL.class.php';

$db = new DB_MySQL();

$db->connect($config['db_host'], $config['db_user'], $config['db_pw'], $config['db_name']);
	

	
require 'lib/class/Village.class.php';

require 'lib/GetUserData.php';

require 'lib/sid.php';
	
require 'lib/techs.php';

require 'lib/do_action.php';

require 'lib/bb_interpreter.php';

require 'lib/add_report.php';

$cl_reports = new add_report();

require 'lib/awards.php';

require 'lib/events.php';

require 'lib/command.php';

require 'lib/class/Ally.class.php';	

$cl_ally=new Ally();

if ($admin) {
require '../../lang/'.$lang_.'.php';
} else {
require '../lang/'.$lang_.'.php';
}

$tpl = new smarty();
$tpl->assign('lang',$lg['game']);
$cl_reports = new add_report();

?>