<?php
$_GET['view'] = (int)$_GET['view'];
$report_info = sql("SELECT to_village FROM `reports` WHERE `id` = '".$_GET['view']."'",'assoc');
$v_info = sql("SELECT name,continent,x,y FROM `villages` WHERE `id` = '".$report_info['to_village']."'",'assoc');

$link = entparse($v_info['name']) . ' (' . $v_info['x'] . '|' . $v_info['y'] . ') K' . $v_info['continent'];
$link = '<a href="game.php?village='.$village['id'].'&screen=info_village&id='.$report_info['to_village'].'"/>'.$link.'</a>';

$tpl->assign('village_link',$link);
?>