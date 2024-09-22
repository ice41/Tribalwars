<?php
if ($_GET['action'] === 'new_forum' && count($_POST) > 0) {
	if ($_GET['h'] == $session['hkey']) {
		//Walidacja
		$ftypes = array(0,1,2);
		$ftype = floor((int)$_POST['trust_priv']);
		if (!in_array($ftype,$ftypes)) {
			$ftype = 0;
			}
			
		$_POST['title'] = cmp_str($_POST['title'],4,25);
			
		if ($_POST['title'] === 'SHORT') {
			$error = 'Tytu� nowego forum musi ska�ada� si� co najmniej z 4 znak�w.';
			}
		elseif ($_POST['title'] === 'LONG') {
			$error = 'Tytu� nowego forum mo�e sk�ada� si� z maksymalnie 25 znak�w.';
			}
		elseif ($_POST['title'] === 'SPACES') {
			$error = 'Tytu� nowego forum nie mo�e sk�ada� si� z samych spacji.';
			} else {
			$_POST['title'] = parse($_POST['title']);
			
			$counts = sql("SELECT COUNT(id) FROM `fora` WHERE `plemie` = '".$user['ally']."' AND `nazwa` = '".$_POST['title']."'","array");
			if ($counts > 0) {
				$error = 'Istnieje ju� forum z takim tytu�em, wybierz inny tytu�.';
				} else {
				$forum->add_forum($_POST['title'],$ftype);
				header("location: $_BASE_LINK&sm=admin");
				exit;
				}
			}	
		} else {
		$error = 'B��d podczas wykonywania akcji';
		}
	}
	
if ($_GET['action'] === 'edit_forum' && isset($_GET['fid']) && count($_POST) > 0) {
	if ($_GET['h'] == $session['hkey']) {
		//Walidacja:
		$_GET['fid'] = (int)$_GET['fid'];
		$_GET['fid'] = floor($_GET['fid']);
		if ($_GET['fid'] < 0) {
			$_GET['fid'] = 0;
			}
			
		$counts = sql("SELECT COUNT(id) FROM `fora` WHERE `plemie` = '".$user['ally']."' AND `id` = '".$_GET['fid']."'","array");
		if ($counts > 0) {
			$_POST['title'] = cmp_str($_POST['title'],4,25);
			
			if ($_POST['title'] === 'SHORT') {
				$error = 'Tytu� forum musi ska�ada� si� co najmniej z 4 znak�w.';
				}
			elseif ($_POST['title'] === 'LONG') {
				$error = 'Tytu� forum mo�e sk�ada� si� z maksymalnie 25 znak�w.';
				}
			elseif ($_POST['title'] === 'SPACES') {
				$error = 'Tytu� forum nie mo�e sk�ada� si� z samych spacji.';
				} else {
				$_POST['title'] = parse($_POST['title']);
				mysql_query("UPDATE `fora` SET `nazwa` = '".$_POST['title']."' WHERE `id` = '".$_GET['fid']."'");
				header("location: $_BASE_LINK&sm=admin");
				exit;
				}
			} else {
			$error = 'Takie forum nie istnieje';
			}
		} else {
		$error = 'B��d podczas wykonywania akcji';
		}
	}

if ($_GET['action'] === 'make_private' && isset($_GET['fid'])) {
	if ($_GET['h'] == $session['hkey']) {
		//Walidacja:
		$_GET['fid'] = (int)$_GET['fid'];
		$_GET['fid'] = floor($_GET['fid']);
		if ($_GET['fid'] < 0) {
			$_GET['fid'] = 0;
			}
			
		$counts = sql("SELECT COUNT(id) FROM `fora` WHERE `plemie` = '".$user['ally']."' AND `id` = '".$_GET['fid']."'","array");
		if ($counts > 0) {
			(int)$fetype = sql("SELECT `visible` FROM `fora` WHERE `id` = '".$_GET['fid']."'","array");
			if ($fetype == 0) {
				$nfetype = 1;
				}
			if ($fetype == 1) {
				$nfetype = 2;
				}
			if ($fetype == 2) {
				$nfetype = 0;
				}
			mysql_query("UPDATE `fora` SET `visible` = '$nfetype' WHERE `id` = '".$_GET['fid']."'");
			header("location: $_BASE_LINK&sm=admin");
			exit;
			} else {
			$error = 'Takie forum nie istnieje';
			}
		} else {
		$error = 'B��d podczas wykonywania akcji';
		}
	}
	
if ($_GET['action'] === 'del_forum' && isset($_GET['fid'])) {
	if ($_GET['h'] == $session['hkey']) {
		//Walidacja:
		$_GET['fid'] = (int)$_GET['fid'];
		$_GET['fid'] = floor($_GET['fid']);
		if ($_GET['fid'] < 0) {
			$_GET['fid'] = 0;
			}
			
		$counts = sql("SELECT COUNT(id) FROM `fora` WHERE `plemie` = '".$user['ally']."' AND `id` = '".$_GET['fid']."'","array");
		if ($counts > 0) {
			if ($_POST['confirm'] === 'true') {
				$forum_counts = sql("SELECT COUNT(id) FROM `fora` WHERE `plemie` = '".$user['ally']."'","array");
				if ($forum_counts <= 1) {
					$error = 'Nie mo�na usun�� ostatniego forum';
					} else {
					mysql_query("DELETE FROM `fora` WHERE `id` = '".$_GET['fid']."'");
					mysql_query("DELETE FROM `tematy` WHERE `forum` = '".$_GET['fid']."'");
					mysql_query("DELETE FROM `posty` WHERE `forum` = '".$_GET['fid']."'");
					mysql_query("DELETE FROM `czytanie` WHERE `fid` = '".$_GET['fid']."'");
					mysql_query("DELETE FROM `f_ankiety` WHERE `fid` = '".$_GET['fid']."'");
					header("location: $_BASE_LINK&sm=admin");
					exit;
					}
				} else {
				$error = 'Nie potwierdzono wykonania akcji';
				}
			} else {
			$error = 'Takie forum nie istnieje';
			}
		} else {
		$error = 'B��d podczas wykonywania akcji';
		}
	}

$forum_array = $forum->get_forum_array_admin();

$tpl->assign("ally_forum_arr",$forum_array);
?>