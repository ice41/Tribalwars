<?php
require('lib/configs.php');
require('configs/config.php');
require('lib/smarty/smarty.class.php');

$tpl = new smarty();

$tpl->assign('linki',$config->get_cfg("top_menu_links"));
$tpl->display('PL-Lan.tpl');




?>