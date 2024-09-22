<?php
if ($_GET['akcja'] == 'dodaj_gracza' && isset($_POST) && $_GET['h'] == $session['hkey']) {
	$counts_odz = sql("SELECT COUNT(id) FROM `odznaczenia` WHERE `od_gracza` = '".$user['id']."'",'array');
	if ($counts_odz < 50) {
		$_POST['gracz'] = cmp_str($_POST['gracz'],4,75);
		
		if ($_POST['gracz'] === 'SHORT') {
			$error = 'Não existe tal jogador';
			}
		if ($_POST['gracz'] === 'LONG') {
			$error = 'Não existe tal jogador';
			}
		if ($_POST['gracz'] === 'SPACES') {
			$error = 'Não existe tal jogador';
			}
		
		$_POST['gracz'] = parse($_POST['gracz']);
		
		if (empty($error)) {
			$counts = sql("SELECT COUNT(id) FROM `users` WHERE `username` = '".$_POST['gracz']."'",'array');
			}
		
		if ($counts > 0 && empty($error)) {
			$cel_ussrid = sql("SELECT `id` FROM `users` WHERE `username` = '".$_POST['gracz']."'",'array');
			$counts2 = sql("SELECT COUNT(id) FROM `odznaczenia` WHERE `od_gracza` = '".$user['id']."' AND `do_gracza` = '$cel_ussrid'",'array');
			if ($counts2 > 0) {
				$error = 'Já marcou esse jogador!';
				} else {
				if ($cel_ussrid == $user['id']) {
					$error = 'Não pode se desmarcar!';
					} else {
					$_POST['color_picker_r'] = (INT)$_POST['color_picker_r'];
					$_POST['color_picker_g'] = (INT)$_POST['color_picker_g'];
					$_POST['color_picker_b'] = (INT)$_POST['color_picker_b'];
					$_POST['color_picker_r'] = floor($_POST['color_picker_r']);
					$_POST['color_picker_g'] = floor($_POST['color_picker_g']);
					$_POST['color_picker_b'] = floor($_POST['color_picker_b']);
					if ($_POST['color_picker_r'] < 0) {
						$_POST['color_picker_r'] = 0;
						}
					if ($_POST['color_picker_r'] > 255) {
						$_POST['color_picker_r'] = 255;
						}
					if ($_POST['color_picker_g'] < 0) {
						$_POST['color_picker_g'] = 0;
						}
					if ($_POST['color_picker_g'] > 255) {
						$_POST['color_picker_g'] = 255;
						}
					if ($_POST['color_picker_b'] < 0) {
						$_POST['color_picker_b'] = 0;
						}
					if ($_POST['color_picker_b'] > 255) {
						$_POST['color_picker_b'] = 255;
						}
					$kolor = $_POST['color_picker_r'].','.$_POST['color_picker_g'].','.$_POST['color_picker_b'];
					mysql_query("INSERT INTO odznaczenia(od_gracza,do_gracza,kolor) VALUES('".$user['id']."','$cel_ussrid','$kolor')");
					header("LOCATION: game.php?village=".$village['id']."&screen=edytuj_kolory_graczy");
					exit;
					}
				}
			} else {
			$error = 'Não existe tal jogador';
			}
		} else {
		$error = 'Um máximo de 50 jogadores podem ser marcados';
		}
	}
	
if ($_GET['akcja'] == 'usun_gracza') {
	$_GET['id'] = (int)$_GET['id'];
	if ($_GET['id'] < 0) {
		$_GET['id'] = 0;
		}
	if ($_GET['id'] > 99999999) {
		$_GET['id'] = 99999999;
		}
	$_GET['id'] = floor($_GET['id']);
	$czy_jest_takie_odznaczenie = sql("SELECT `id` FROM `odznaczenia` WHERE `id` = '".$_GET['id']."' AND `od_gracza` = '".$user['id']."'",'array');
	if ($czy_jest_takie_odznaczenie == $_GET['id']) {
		mysql_query("DELETE FROM `odznaczenia` WHERE `id` = '".$_GET['id']."'");
		header("LOCATION: game.php?village=".$village['id']."&screen=edytuj_kolory_graczy");
		exit;
		} else {
		$error = 'Não existe tal distintivo';
		}
	}
	
$odz_query = mysql_query("SELECT id,kolor,do_gracza FROM `odznaczenia` WHERE `od_gracza` = '".$user['id']."'");
while ($odz = mysql_fetch_assoc($odz_query)) {
	$odznaczenia[$cid]['do_gracz_name'] = entparse(sql("SELECT `username` FROM `users` WHERE `id` = '".$odz['do_gracza']."'",'array'));
	$odznaczenia[$cid]['kolor'] = $odz['kolor'];
	$odznaczenia[$cid]['id'] = $odz['id'];
	$odznaczenia[$cid]['do_gracz_id'] = $odz['do_gracza'];
	$cid++;
	}
	
if (isset($_GET['player']) && !empty($_GET['player'])) {
	$_GET['player'] = (int)$_GET['player'];
	$_GET['player'] = floor($_GET['player']);
	$uname = entparse(sql("SELECT `username` FROM `users` WHERE `id` = '".$_GET['player']."'","array"));
	} else {
	$uname = '';
	}
	
$tpl->assign('odznaczeni',$odznaczenia);
$tpl->assign('error',$error);
$tpl->assign('value',$uname);
?>