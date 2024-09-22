<?php

if (!isset($_GET['page'])) {
	$_GET['page'] = floor(($gracze['id'] - 1)/ 45);
	if ($_GET['page'] < 0) {
		$_GET['page'] = 0;
		}
	}
	
$_GET['page'] = (int)$_GET['page'];
$_GET['page'] = floor($_GET['page']);

if (isset($_POST['from'])) {
	$_POST['from'] = (int)$_POST['from'];
	$_POST['from'] = floor($_POST['from']);
	
	$_GET['page'] = floor(($_POST['from'] - 1)/ 45);
	if ($_GET['page'] < 0) {
		$_GET['page'] = 0;
		}
	$from = $_POST['from'];
	}
	
$RA_Limit = $_GET['page'] * 45;

		
	$query['big_arr'] = mysql_query("SELECT * FROM `users` ORDER BY `id` LIMIT $RA_Limit , 45");
	while ($og_info = mysql_fetch_array($query['big_arr'])) {
		$gracze[$og_info['id']]['id'] = urldecode($og_info['id']);
		$gracze[$og_info['id']]['username'] = urldecode($og_info['username']);

      		}

	


      
if($_GET['strona'] == 'mail') {
$strona_mail = true;
} elseif ($_GET['strona'] == 'edit') {
$strona_edit = true;
}
	  
    $tpl->assign('aktu_page_ra',$_GET['page']);
    $tpl->assign('from',$from);                                           
    $tpl->assign('aktu',$user['rang']);
	$tpl->assign('gracze',$gracze);
	$tpl->assign('strona_mail',$strona_mail);
	$tpl->assign('strona_edit',$strona_edit);	

?>
