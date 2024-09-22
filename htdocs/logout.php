<?php 
require('lib/configs.php');
require('configs/config.php');
require('lib/smarty/smarty.class.php');

$tpl = new smarty();

$tpl->assign('linki',$linki);
$tpl->display('logout.tpl');
?>
