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
			$error = 'O título do novo fórum deve ter pelo menos 4 caracteres.';
			}
		elseif ($_POST['title'] === 'LONG') {
			$error = 'O título do novo fórum pode ter até 25 caracteres.';
			}
		elseif ($_POST['title'] === 'SPACES') {
			$error = 'O título do novo fórum não pode ser todo em espaços.';
			} else {
			$_POST['title'] = parse($_POST['title']);
			
			$counts = sql("SELECT COUNT(id) FROM `fora` WHERE `plemie` = '".$user['ally']."' AND `nazwa` = '".$_POST['title']."'","array");
			if ($counts > 0) {
				$error = 'Já existe uma tribo com este título, escolha um título diferente.';
				} else {
				mysql_query("UPDATE `users` SET `new_post` = '1' WHERE `ally` = '".$user['ally']."'");
				$forum->add_forum($_POST['title'],$ftype);
				header("location: $_BASE_LINK&sm=admin");
				exit;
				}
			}	
		} else {
		$error = 'Erro ao executar a ação';
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
				$error = 'O título do fórum deve ter pelo menos 4 caracteres.';
				}
			elseif ($_POST['title'] === 'LONG') {
				$error = 'O título do fórum pode ter até 25 caracteres.';
				}
			elseif ($_POST['title'] === 'SPACES') {
				$error = 'O título do fórum não pode conter apenas espaços.';
				} else {
				$_POST['title'] = parse($_POST['title']);
				mysql_query("UPDATE `users` SET `new_post` = '1' WHERE `ally` = '".$user['ally']."'");
				mysql_query("UPDATE `fora` SET `nazwa` = '".$_POST['title']."' WHERE `id` = '".$_GET['fid']."'");
				header("location: $_BASE_LINK&sm=admin");
				exit;
				}
			} else {
			$error = 'Esse fórum não existe';
			}
		} else {
		$error = 'Erro ao executar a ação';
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
			mysql_query("UPDATE `users` SET `new_post` = '1' WHERE `ally` = '".$user['ally']."'");
			mysql_query("UPDATE `fora` SET `visible` = '$nfetype' WHERE `id` = '".$_GET['fid']."'");
			header("location: $_BASE_LINK&sm=admin");
			exit;
			} else {
			$error = 'Erro Esse fórum não existe';
			}
		} else {
		$error = 'Erro ao executar a ação';
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
					$error = 'O último fórum não pode ser excluído';
					} else {
					mysql_query("DELETE FROM `fora` WHERE `id` = '".$_GET['fid']."'");
					mysql_query("DELETE FROM `tematy` WHERE `forum` = '".$_GET['fid']."'");
					mysql_query("DELETE FROM `posty` WHERE `forum` = '".$_GET['fid']."'");
					mysql_query("DELETE FROM `czytanie` WHERE `fid` = '".$_GET['fid']."'");
					mysql_query("DELETE FROM `f_ankiety` WHERE `fid` = '".$_GET['fid']."'");
					mysql_query("UPDATE `users` SET `new_post` = '1' WHERE `ally` = '".$user['ally']."'");
					header("location: $_BASE_LINK&sm=admin");
					exit;
					}
				} else {
				$error = 'A execução da ação não foi confirmada';
				}
			} else {
			$error = 'Erro Esse fórum não existe';
			}
		} else {
		$error = 'Erro ao executar a ação';
		}
	}

$forum_array = $forum->get_forum_array_admin();

$tpl->assign("ally_forum_arr",$forum_array);
?>