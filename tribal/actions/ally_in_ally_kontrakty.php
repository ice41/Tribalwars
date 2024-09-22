<?php
if ($user['ally_diplomacy'] == 1 || $user['ally_lead'] == 1 || $user['ally_found'] == 1) {
	$dyplomata = true;
	
	if ($_GET['action'] == 'add_contract' and isset($_POST)) {
		if ($_GET['h'] == $session['hkey']) {
			$_POST['tag'] = parse($_POST['tag']);
			$count = sql("SELECT COUNT(id) FROM `ally` WHERE `short` = '".$_POST['tag']."'",'array');
			if ($count > 0) {
				$ally_id = sql("SELECT `id` FROM `ally` WHERE `short` = '".$_POST['tag']."'",'array');
				if ($ally_id == $user['ally']) {
					$error = 'Nie mo¿na dodaæ w³asnego plemienia!';
					} else {
					$count_add = sql("SELECT COUNT(id) FROM `kontrakty` WHERE `od_plemienia` = '".$user['ally']."' AND `do_plemienia` = '".$ally_id."'",'array');
					if ($count_add > 0) {
						$error = 'Plemiê '.entparse($_POST['tag']).' nawi¹zuje ju¿ z twoim plemieniem kontrakt dyplomatyczny!';
						} else {
						$con_types = array('partner','nap','enemy');
						if (!in_array($_POST['type'],$con_types)) {
							$_POST['type'] = 'partner';
							}
						mysql_query("INSERT INTO kontrakty(od_plemienia,do_plemienia,typ) VALUES('".$user['ally']."','$ally_id','".$_POST['type']."')");
						header('LOCATION: game.php?village='.$village['id'].'&screen=ally&mode=kontrakty');
						exit;
						}
					}
				} else {
				$error = 'Nie ma takiego plemienia!';
				}
			} else {
			$error = 'B³êdny hkey!';
			}
		}
	
	if ($_GET['action'] == 'cancel_contract' && isset($_GET['id'])) {
		if ($_GET['h'] == $session['hkey']) {
			$_GET['id'] = (int)$_GET['id'];
			if ($_GET['id'] < 0) {
				$_GET['id'] = 0;
				}
			$count = sql("SELECT COUNT(id) FROM `kontrakty` WHERE `id` = '".$_GET['id']."'",'array');
			if ($count > 0) {
				$count_czy_wk = sql("SELECT COUNT(id) FROM `kontrakty` WHERE `id` = '".$_GET['id']."' AND `od_plemienia` = '".$user['ally']."'",'array');
				if ($count_czy_wk > 0) {
					mysql_query("DELETE FROM `kontrakty` WHERE `id` = '".$_GET['id']."'");
					header('LOCATION: game.php?village='.$village['id'].'&screen=ally&mode=kontrakty');
					exit;
					} else {
					$error = 'kontrakt nie nale¿y do twojego plemienia!';
					}
				} else {
				$error = 'Nie ma takiego kontraktu!';
				}
			} else {
			$error = 'B³êdny hkey!';
			}
		}
	} else {
	$dyplomata = false;
	}
	
$kontrakty_query = mysql_query("SELECT id,do_plemienia,typ FROM `kontrakty` WHERE `od_plemienia` = '".$user['ally']."'");
while ($kontrakt = mysql_fetch_assoc($kontrakty_query)) {
	$do_plemienia_info = sql("SELECT points,name,short FROM `ally` WHERE `id` = '".$kontrakt['do_plemienia']."'",'assoc');
	$kontrakty[$kontrakt['typ']][$kontrakt['id']]['do_plemienia_tag'] = entparse($do_plemienia_info['name']) . ' ('.entparse($do_plemienia_info['short']).')' . ' ('.number_format($do_plemienia_info['points']) . ' punktów)';
	$kontrakty[$kontrakt['typ']][$kontrakt['id']]['do_plemienia'] = $kontrakt['do_plemienia'];
	$kontrakty[$kontrakt['typ']][$kontrakt['id']]['id'] = $kontrakt['id'];
	}
	
$tpl->assign('dyplomata',$dyplomata);	
$tpl->assign('kontrakty',$kontrakty);
$tpl->assign('err',$error);
?>