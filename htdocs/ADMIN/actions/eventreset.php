<?php	
if ($_GET['action'] == "reset") {
mysql_query("TRUNCATE TABLE build");   
mysql_query("TRUNCATE TABLE events"); 
mysql_query("TRUNCATE TABLE dealers");
mysql_query("TRUNCATE TABLE recruit");
mysql_query("TRUNCATE TABLE movement");
mysql_query("TRUNCATE TABLE run_evens");
mysql_query("TRUNCATE TABLE research");
$tpl->assign("resetet", "rs");
};
