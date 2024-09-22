<?php
require_once("./include.inc.php");
  
$unit = @$_GET['unit'];

// Existiert die Einheit?
if (!in_array($unit, $cl_units->get_array('dbname'))) {
	die("Not Found!");
}

$tpl = new smarty();;

$tpl->assign('unit', $unit);
$tpl->assign('cl_units', $cl_units);
$tpl->assign('cl_builds', $cl_builds);
$tpl->display('popup_unit.tpl');
?>
