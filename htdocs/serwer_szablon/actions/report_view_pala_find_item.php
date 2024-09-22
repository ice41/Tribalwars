<?php
$report_info = sql("SELECT pala_find_item,att_pala_name FROM `reports` WHERE `id` = '".$_GET['view']."'",'assoc');
$tpl->assign('pala_name',entparse($report_info['att_pala_name']));
$tpl->assign('item_name',$pala_bonus[$report_info['pala_find_item']][2]);
$tpl->assign('image_item','graphic/inventory/'.$report_info['pala_find_item'].'_rep.png');
?>