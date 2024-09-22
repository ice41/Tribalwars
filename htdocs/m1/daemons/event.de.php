<?php
function msec(){
    list($msec, $sec) = explode(' ', microtime());
    return ($sec%3600)*1000+$msec*1000;
}
function gets_ms($a){
    global $load_msec;
    echo "$a: ".(msec()-$load_msec)."<br />";
}
error_reporting(E_ALL ^ E_NOTICE);
set_time_limit(0);
$time = time();
$load_msec = msec();
require("../include/config.php");
require("../lib/functions.php");
require("../lib/DB.php");
$time = time();
$db = new DB_MySql();
$db->connect($config['db_host'], $config['db_user'], $config['db_pw'], $config['db_name'], "MySql");
if($time + 5 < time()){
    exit("Datenbank Zeitüberschreitung! Bitte aktualisieren!");
}
require("../lib/GetVillageData.php");
require("../lib/login.php");
require("../lib/sid.php");
require("../lib/map.php");
require("../lib/builds.php");
require("../lib/units.php");
require("../lib/techs.php");
require("../lib/ramHarm.php");
require("../lib/catapultHarm.php");
require("../lib/add_report.php");
require("../lib/do_action.php");
require("../lib/con_map.php");
require("../lib/events.php");
require("../include/configs/buildings.php");
require("../include/configs/raw_material_production.php");
require("../include/configs/farm_limits.php");
require("../include/configs/max_storage.php");
require("../include/configs/max_hide.php");
require("../include/configs/builds_starts_by_one.php");
require("../include/configs/units.php");
require("../include/configs/techs.php");
require("../include/configs/max_wall_bonus.php");
require("../include/configs/ram_harm.php");
require("../include/configs/catapult_harm.php");
require("../include/configs/dealers.php");
$run_key = generate_key();
$cl_reports = new add_report();
echo "Ereignissystem ist nun am laufen... Dieses Fenster bitte nicht schließen, da sonst die LAN steht :-).";
while(true){
	$last = time();
	check_events();
	if($last == time()){}
		sleep( 1 );
	}
?>
