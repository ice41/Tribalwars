<?
	$mode = $_GET['mode'];
	if(!$mode){
		$mode = 'in';
	}else{
		$mode = $_GET['mode'];
	}
	$tpl->assign('mode', $mode);
?> 