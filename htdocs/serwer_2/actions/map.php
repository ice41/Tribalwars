<?php
if ($_GET['action'] == 'zapisz_rozmiar_mapy' and !empty($_POST['map_size'])) {
	$_POST['map_size'] = (int)$_POST['map_size'];
	if ($_POST['map_size'] < 7) {
	    $_POST['map_size'] = 7;
		}
	if ($_POST['map_size'] > 31) {
	    $_POST['map_size'] = 31;
		}
	mysql_query("UPDATE `users` SET `map_size` = '".$_POST['map_size']."' WHERE `id` = '".$user['id']."'");
    $user['map_size'] = $_POST['map_size'];
	}
		
if ($_GET['action'] == 'bigMapOnclick' && !empty($_POST['minimapa_x']) && !empty($_POST['minimapa_y'])) {
	//OBLICZ CENTRUM OBRAZKA:
	$width_cent = $_POST['imgwidth'] / 2;
	$height_cent = $_POST['imgheight'] / 2;
		
	//Oblicz odleg�o�� od centrum:
	$x_odl = $_POST['minimapa_x'] - $width_cent;
	$y_odl = $_POST['minimapa_y'] - $height_cent;
		
    //Oblicz ilo�� p�l od centrum:
	$x_odlp = $x_odl / ($_POST['rozmiar_px_mm']);
	$y_odlp = $y_odl / ($_POST['rozmiar_px_mm']);
		
	//Oblicz nowe koordynacje:
	$new['x'] = floor($_GET['x'] + $x_odlp) ;
	$new['y'] = floor($_GET['y'] + $y_odlp);
		
	$_GET['x'] = $new['x'];
	$_GET['y'] = $new['y'];
	}
		
if (isset($_POST['x']) && isset($_POST['y'])) {
	$_POST['x'] = (int)$_POST['x'];
	$_POST['y'] = (int)$_POST['y'];
	if ($_POST['x'] > 999) {
		$_POST['x'] = 999;
		}
	if ($_POST['x'] < 0) {
		$_POST['x'] = 0;
		}
	if ($_POST['y'] > 999) {
		$_POST['y'] = 999;
		}
	if ($_POST['y'] < 0) {
		$_POST['y'] = 0;
		}
	$_GET['x'] = floor($_POST['x']);
	$_GET['y'] = floor($_POST['y']);
	}
		
if (!isset($_GET['x'])) {
	$_GET['x'] = $village['x'];
    }
	
if (!isset($_GET['y'])) {
	$_GET['y'] = $village['y'];
    }
	
$_GET['x'] = (int)$_GET['x'];
$_GET['y'] = (int)$_GET['y'];
	
if ($_GET['x'] < 0) {
	$_GET['x'] = 0;
    }
	
if ($_GET['x'] > 999) {
	$_GET['x'] = 999;
	}
	
if ($_GET['y'] < 0) {
	$_GET['y'] = 0;
    }
	
if ($_GET['y'] > 999) {
	$_GET['y'] = 999;
	}
	
$_GET['y'] = floor($_GET['y']);
$_GET['x'] = floor($_GET['x']);
		
$mapa['kontynent'] = przydziel_osadzie_kontynent($_GET['x'],$_GET['y']);
$mapa['x'] = $_GET['x'];
$mapa['y'] = $_GET['y'];
$mapa['polowa'] = floor($user['map_size'] / 2);
$mapa['min_x'] = $mapa['x'] - $mapa['polowa'];
$mapa['max_x'] = $mapa['x'] + $mapa['polowa'];
$mapa['min_y'] = $mapa['y'] - $mapa['polowa'];
$mapa['max_y'] = $mapa['y'] + $mapa['polowa'];
	
for ($i = $mapa['min_y']; $i <= $mapa['max_y']; $i ++) {
	$mapa['y_coordy'][$i] = $i; 
	}
		
for ($i = $mapa['min_x']; $i <= $mapa['max_x']; $i ++) {
    $mapa['x_coordy'][$i] = $i;
	}
	
if (file_exists('graphic/continent/'.$user['id'].'.png')) {
	unlink('graphic/continent/'.$user['id'].'.png');
	}
	
//Za�aduj klas� mapa:
require ('lib/mapa.php');
	
$kl_mapa = new mapa($mapa['min_x'],$mapa['max_x'],$mapa['min_y'],$mapa['max_y'],$user['ally'],$user['id']);
	
$pul_rozmiarux = floor($kl_mapa->mm_sektoryw / 2 );
$pul_rozmiaruy = floor($kl_mapa->mm_sektoryh / 2 );
$_minimapa['minx'] = $_GET['x'] - $pul_rozmiarux;
$_minimapa['maxx'] = $_GET['x'] + $pul_rozmiarux;
$_minimapa['miny'] = $_GET['y'] - $pul_rozmiaruy;
$_minimapa['maxy'] = $_GET['y'] + $pul_rozmiaruy;

$bigMapRectTop = ($pul_rozmiaruy - $mapa['polowa']) * $kl_mapa->minimapy_px;
$bigMapRectLeft = ($pul_rozmiarux - $mapa['polowa']) * $kl_mapa->minimapy_px;
$_mwidth = ($user['map_size'] * $kl_mapa->minimapy_px) - 1;
	
$kl_mapa->minimapa($_minimapa['minx'],$_minimapa['maxx'],$_minimapa['miny'],$_minimapa['maxy']);
	
//Narysuj minimap�:
$kl_mapa->rysuj_minimape($_GET['x'],$_GET['y'],$pul_rozmiarux,$pul_rozmiaruy,$kl_mapa->minimapy_px,$village['id'],$user['id'],$user['ally']);

$odz_query = mysql_query("SELECT id,kolor,do_gracza FROM `odznaczenia` WHERE `od_gracza` = '".$user['id']."'");
while ($odz = mysql_fetch_assoc($odz_query)) {
	$odznaczenia[$cid]['do_gracz_name'] = entparse(sql("SELECT `username` FROM `users` WHERE `id` = '".$odz['do_gracza']."'",'array'));
	$odznaczenia[$cid]['kolor'] = $odz['kolor'];
	$odznaczenia[$cid]['id'] = $odz['id'];
	$odznaczenia[$cid]['do_gracz_id'] = $odz['do_gracza'];
	$cid++;
	}
	
$tpl->assign('odznaczeni',$odznaczenia);
$tpl->assign('kl_mapa',$kl_mapa);
$tpl->assign('pul_rozmiarux',$pul_rozmiarux);
$tpl->assign('pul_rozmiaruy',$pul_rozmiaruy);
$tpl->assign('mapa',$mapa);
$tpl->assign('bigMapRectTop',$bigMapRectTop);
$tpl->assign('bigMapRectLeft',$bigMapRectLeft);
$tpl->assign('mwidth',$_mwidth);
$tpl->assign('y_coords',$mapa['y_coordy']);
$tpl->assign('x_coords',$mapa['x_coordy']);
?>