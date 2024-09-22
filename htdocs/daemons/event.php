<?php
/*****************************************/
/*=======================================*/
/*     PLIK: index.php   		 		 */
/*     DATA: 18.01.2012r        		 */
/*     ROLA: Reload eventów na serwerach */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

require ('../configs/serwery.php');

require '../serwer_szablon/lib/builds.php';

require '../serwer_szablon/lib/units.php';

require '../serwer_szablon/lib/functions.php';

require '../serwer_szablon/lib/bonus.php';

require ('../lib/SYSTEM_BITWY.PHP');

require '../lib/events.php';

foreach ($serwery as $serwer) {
	require ("../serwer_$serwer/include/config.php");
	
	require '../serwer_'.$serwer.'/include/configs/buildings.php';
	
	require '../serwer_'.$serwer.'/include/configs/raw_material_production.php';

	require '../serwer_'.$serwer.'/include/configs/farm_limits.php';

	require '../serwer_'.$serwer.'/include/configs/max_storage.php';

	require '../serwer_'.$serwer.'/include/configs/max_hide.php';

	require '../serwer_'.$serwer.'/include/configs/units.php';

	require '../serwer_'.$serwer.'/include/configs/max_wall_bonus.php';
	
	require '../serwer_'.$serwer.'/include/configs/bonus.php';
	
	$impl_units = implode(",",$cl_units->get_array("dbname"));
	$impl_units_all = implode(",all_",$cl_units->get_array("dbname"));
	$impl_units_all = 'all_'.$impl_units_all;
	$impl_builds = implode(",",$cl_builds->get_array("dbname"));

	$db_server_lan_cnnct_var = mysql_connect($config['db_host'],$config['db_user'],$config['db_pw'],'');
	mysql_select_db($config['db_name'],$db_server_lan_cnnct_var);
	
	$czas = date('U');
	$count = sql("SELECT COUNT(id) FROM `events` WHERE `event_time` <= '$czas' LIMIT 1",'array');
	
	if ($count > 0) {
		check_all_events();
		}
		
	$count = sql("SELECT COUNT(id) FROM `events` WHERE `event_time` <= '$czas' LIMIT 1",'array');
	
	if ($count > 0) {
		check_all_events();
		}
		
	$awards = new awards();
	$awards->reload_day_awards();
	}
?>