<?php
/*****************************************/
/*=======================================*/
/*     PLIK: include.inc.php   		 	 */
/*     DATA: 15.12.2011r        		 */
/*     ROLA: Plik ³aduj¹cy klasy		 */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

//Poka¿ 20 cyfr po przecinku:
ini_set('precision','20');

require ('lib/parse_time.php');
$ParseTime = new parse_time();
$ParseTime->start();

$sicher = true;
	
require 'lib/config.php';
	
require 'lib/smarty/smarty.class.php';

require 'lib/functions.php';

require 'lib/DB.php';

require 'lib/bonus.php';

$db = new db_mysql();
$db->connect($config['db_host'],$config['db_user'],$config['db_pw'],$config['db_name']);
	
require 'lib/GetVillageData.php';

require 'lib/GetUserData.php';

require 'lib/sid.php';
	
require 'lib/techs.php';

require 'lib/builds.php';

require 'lib/units.php';

require 'lib/do_action.php';

require 'lib/bb_interpreter.php';

require 'lib/add_report.php';

$cl_reports = new add_report();

require 'lib/awards.php';

//Zdefiniuj wa¿ne zmienne:
$impl_units = implode(",",$cl_units->get_array("dbname"));
$impl_units_all = implode(",all_",$cl_units->get_array("dbname"));
$impl_units_all = 'all_'.$impl_units_all;
$impl_builds = implode(",",$cl_builds->get_array("dbname"));

require 'lib/events.php';
require ('lib/command.php');
?>