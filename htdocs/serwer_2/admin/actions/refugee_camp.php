<?php
$error = '';

$create_vg = sql("SELECT * FROM `twozenie_osady`",'assoc');

if ($_GET['action'] == 'create' and isset($_POST)) {
	if ($config['create_users_and_villages'] === true && $create_vg['okrag'] < 703) {
		create_villages('-1',$_POST['num'],'R');
		header('location: index.php?screen=refugee_camp');
		EXIT;
		}
	}
	
if ($config['create_users_and_villages'] == false) {
	$error = 'Wy³¹czono tworzenie wiosek i graczy';
	}
	
if ($create_vg['okrag'] >= 703) {
	$error = 'Osi¹gniêto maksymaln¹ liczbê wiosek na tym serwerze';
	}
	
$tpl->assign('error',$error);
?>