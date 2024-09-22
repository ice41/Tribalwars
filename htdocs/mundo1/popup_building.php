<?php
require_once("./include.inc.php");
  
$building = @$_GET['building'];

if (!in_array($building, $cl_builds->get_array('dbname'))) {
	die("Not Found!");
}

$tpl = new smarty();
$tpl->assign('building', $building);
$tpl->assign('cl_builds', $cl_builds);
$tpl->display('popup_building.tpl');
?>
