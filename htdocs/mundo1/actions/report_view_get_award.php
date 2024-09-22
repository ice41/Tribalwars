<?php
$_GET['view'] = (int)$_GET['view'];
$report_info = $awards->dec_vars(sql("SELECT hives FROM `reports` WHERE `id` = '".$_GET['view']."'",'array'),$village['id']);
$tpl->assign('hives',$report_info);
?>