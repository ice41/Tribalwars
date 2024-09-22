<?php
require('lib/configs.php');
require('configs/config.php');
require('lib/smarty/smarty.class.php');
require('configs/serwery.php');

$tpl = new smarty();

$serwer = $serwery[(count($serwery) - 1)];

$tpl->assign('serwer',$serwer);
$tpl->assign('serwery',$serwery);
$tpl->assign('linki',$config->get_cfg("top_menu_links"));
$tpl->display('world.tpl');
?>