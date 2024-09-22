<?php 
$gracz = $_GET['gracz'];

$gr = sql("SELECT * FROM `users` WHERE `id` = '".$gracz."'","assoc");

	if ($_GET['akcja'] == 'zbanuj') {

    $id1 = sql("SELECT * FROM `users` WHERE `username` = '".$_POST['id']."'","assoc");
	if (empty($id1)) {
	die ('ERROR');
	}
	$id = $id1['id'];
    $p = $_POST['powod'];
    $koniec = $_POST['koniec'];	
    $czas = $_POST['czas'];		
	mysql_query("UPDATE users SET banned = '0' WHERE `id` = ".$id."");
	mysql_query("UPDATE users SET powod_banu = '".$p."' WHERE `id` = ".$id."");
	mysql_query("UPDATE users SET poczotek_banu = '".date("U")."' WHERE `id` = ".$id."");	
	mysql_query("UPDATE users SET koniec_banu = ".(time() + $koniec*$czas)." WHERE `id` = ".$id."");
	$id1['koniec_banu'] = time() + $koniec*$czas;	
header('LOCATION: game.php?village='.$village['id'].'&screen=admin&mode=bany');

	}

	$query['big_arr'] = mysql_query("SELECT * FROM `users` WHERE `banned` = 0 ORDER BY koniec_banu");
	while ($og_info = mysql_fetch_array($query['big_arr'])) {
		$bany[$og_info['id']]['id'] = urldecode($og_info['id']);
		$bany[$og_info['id']]['username'] = urldecode($og_info['username']);
	        $bany[$og_info['id']]['powod_banu'] = urldecode($og_info['powod_banu']);
           	$bany[$og_info['id']]['poczatek_banu'] = urldecode($og_info['poczatek_banu']);
           	$bany[$og_info['id']]['koniec_banu'] = urldecode($og_info['koniec_banu']);

      		}
		
	$tpl->assign('bany',$bany);	
$text = "Esta página permite que visualize todos os banimentos neste mundo e banir/desbanir jogadores :)";
	$tpl->assign('text_tut',$text);
	$tpl->assign('gracz',$gracz);
	$tpl->assign('gr',$gr);		
?>


	 