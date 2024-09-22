<?php
	$sms = array (
		'Kontrolujodk' => 'kodk',
		'Odk' => 'odk',
			
		);
		
	if (!in_array($_GET['sm'],$sms)) {
		$_GET['sm'] = 'odk';
		}
		
	require ('actions/place_odk_'.$_GET['sm'].'.php');
		
	$tpl->assign('sm',$_GET['sm']);
	$tpl->assign('allow_sm',$sms);
	



	

?>