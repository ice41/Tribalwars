<?php /*This encoded file was generated using PHPCoder (http://phpcoder.sourceforge.net/) and eAccelerator (http://eaccelerator.sourceforge.net/)*/ //if (!is_callable("eaccelerator_load") && !@dl("eAccelerator.so")) { die("This PHP script has been encoded using the excellent eAccelerator Optimizer, to run it you must install <a href=\"http://eaccelerator.sourceforge.net/\">eAccelerator or the eLoader</a>"); }eaccelerator_load('eJx9VltT20YU3pVEoKExhF6YcklF2jgkJPY0vYNwsbFSPEMCxZk+dNpR19Ji7yCvXGlVwq/ta39EH7qXIyxsgx60q3O+7+zut2fPym8eHvrH/lnz3ckZchBCGNlzshlmNESWaZQZoWVknuZ9+fKwjWXjqpd3HxUPtj9QXBamiWBD2tJQGQZAFoDm5Zu+H8VJRH9RdiwdGKtYXf0pIbZs5di4qgw2xo6lkUgjURnpwGwNVNoc63RxIsqcMliOHGO5IsNpt2Vh/K8NX5aDzBde1KNIb2Pxesb2gnz1qciCYSZNRc/oUoG1dx/A6tT0CP4JPpWnAtNR4sQJiQIta7dS0uzajJ9WDA+fLgHNBFxQn0iuwVaT2nW9pUL0kgiaY0/FtJbM+h1bR5F6W5aJJ0Ww76n96aVuvbGtcaixDDM3Cszpzp8wXGhpms4SP2geH2uDjbVIfvD25F3n0F+0jMSW3dS7b+lN8yyIKzfCVkPRNE3SIKWjJBWM95u2Ti1cCOfZJXxF76UIVGIFMRsy4c2jYo5GAeXqzpckUQZcnS9SyFuZIChxuiuzdgdXVwpW5xOYgWprtTrjYZxHtB4m/Jz1a6PBaKHzKUA+NpCY9ernOQ8FS3hmEKuAeDBGtFva5a3NWsba1DLWigm11yFxlOLtVvDmqvtX7Cujg1b3VCtZN73760Wy4IXuOoRWuxH1cHXd5IGDuhs3PXv6W6WcklCul9NQ/L4Bm6LS7J6xSx3wH4XdUskwryMEgyQTLeXYt5RLc61buNYEN89oClyr4Nq3cO2CO2e4o0tg2gXTuYXpTIzKiaxbhqtcTd01cbWSqrOvjHNatYXTzcmNwpsIio2CeJugvF3CfLRpjodj72gwrp880jv6Su0ZEZT3CL9wf6NM/NejaRYOUtnNeX/LbTEhqEsuRE5iljGaUr7V2YLk+mycXD9T8SuLY9KnMh4xOfgYYMtjWJz0GTfeL0oHDbwZi4zvybRvSEbGVwXfw7Gvl7M4gsR/Oj1ozpkA7/a0V9BwAN5n4F0Ze1MyPCLp0Pifg3917A/lakd5LMagnZvHV4FIFEHVMZAX08c3SgKiz69BvJyeicyi4FqE+rQI9G/Ki2V+BW53VgnJjF6yAAL6FaBrs9EpuZQDC5oyEgejNIny0kS/Bu7j2dxzKYupnjDWN3fjh+R9kIkklXlk8N8C/vPb8QMWAfg7AO/csexMxiepvFF7V0HCgfg9EDdmE0sJ9MPdyFIy/QjIJ7fP/JLEcdBLeA6U3bsXK3MxGFzn2R6Av5wNLhKzxPCA8Wg2I6IkloffXBINKCPqkvgQqd8RTlOZBMEFveo2oAapGpbmXNlwVRnNfXGg6xy21Q/SOPV9bXZO9lRrO86kf/8AhlR3xgGMoCBhDIgMVw+QuTuc7ZYuYFS+fVms+pxl2VUm6NBlmXB5zl0ydGOSn1Neq9XcNqMZzdzXlEtM6vZ0VeMsHAhXVruY0X8of+FGxM3kDSrciFH3uPnWlWCJ2H35rBa29cxMSU1zutPWMwk8vyTU9W3ql4p0TDKBq36hjvf6eplG2XBAw4vAnN7To1IkTfSOZtTzh8ooY8l6rgn4rNlB+ldG/72obgeNf2XUvZDFlI6eH8veWeMNKv5/1fM/MwX/wA=='); ?>
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