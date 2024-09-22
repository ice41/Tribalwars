<?php
if (isset($_POST['x']) && isset($_POST['y']) && $_GET['action'] === 'dodaj_do_ulub') {
	$_POST['x'] = floor((int)$_POST['x']);
	$_POST['y'] = floor((int)$_POST['y']);
	if ($_POST['x'] < 0) $_POST['x'] = 0;
	if ($_POST['y'] < 0) $_POST['y'] = 0;
	if ($_POST['x'] > 999) $_POST['x'] = 999;
	if ($_POST['y'] > 999) $_POST['y'] = 999;
	$_GET['id'] = sql("SELECT `id` FROM `villages` WHERE `x` = '".$_POST['x']."' AND `y` = '".$_POST['y']."'","array");
	}
	
if ($_GET['action'] === 'dodaj_do_ulub') {
	if ($_GET['h'] == $session['hkey']) {
		$_GET['id'] = floor((int)$_GET['id']);
		if ($_GET['id'] < 0) $_GET['id'] = 0;
		
		$village_exists = sql("SELECT COUNT(id) FROM `villages` WHERE `id` = '".$_GET['id']."'","array");
		if ($village_exists) {
			$can_add = sql("SELECT COUNT(id) FROM `ulubione` WHERE `gracz` = '".$user['id']."'","array");
			if ($can_add > 50) {
				$error = 'Max pode armazenar 50 aldeias.';
				} else {
				$counts = sql("SELECT COUNT(id) FROM `ulubione` WHERE `gracz` = '".$user['id']."' AND `wioska` = '".$_GET['id']."'","array");
				if ($counts) {
					$error = 'Esta aldeia já está como favorita';
					} else {
					mysql_query("INSERT INTO ulubione(gracz,wioska) VALUES ('".$user['id']."','".$_GET['id']."')");
					
					header('location: game.php?village='.$village['id'].'&screen=ulubione');
					exit;
					}
				}
			} else {
			$error = 'A aldeia não existe.';
			}
		} else {
		$error = 'B³¹d wykonywania akcji.';
		}
	}
	
if ($_GET['action'] === 'usun_ulub' && isset($_GET['id'])) {
	if ($_GET['h'] == $session['hkey']) {
		$_GET['id'] = floor((int)$_GET['id']);
		if ($_GET['id'] < 0) $_GET['id'] = 0;
		
		$counts = sql("SELECT COUNT(id) FROM `ulubione` WHERE `gracz` = '".$user['id']."' AND `wioska` = '".$_GET['id']."'","array");
		
		if ($counts > 0) {
			mysql_query("DELETE FROM `ulubione` WHERE `gracz` = '".$user['id']."' AND `wioska` = '".$_GET['id']."'");
				
			header('location: game.php?village='.$village['id'].'&screen=ulubione');
			exit;
			} else {
			$error = 'A aldeia não existe.';
			}
		} else {
		$error = 'B³¹d wykonywania akcji.';
		}
	}
	
$sql = mysql_query("SELECT `wioska` FROM `ulubione` WHERE `gracz` = '".$user['id']."'");
while ($array = mysql_fetch_assoc($sql)) {
	$vinfo = sql("SELECT name,continent,x,y FROM `villages` WHERE `id` = '".$array['wioska']."'",'assoc');
		
	$ulubs_arr[$array['wioska']] = entparse($vinfo['name']) . ' (' . $vinfo['x'] . '|' . $vinfo['y'] . ') K' . $vinfo['continent'];
	}
	
$tpl->assign('error',$error);
$tpl->assign('ulubione',$ulubs_arr);
?>