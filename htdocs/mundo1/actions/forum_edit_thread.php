<?php
//Walidacja liczb:
$_GET['aktu_fid'] = floor((int)$_GET['aktu_fid']);
$_GET['aktu_tid'] = floor((int)$_GET['aktu_tid']);

$counts_fid = $forum->can_see_fid($_GET['aktu_fid']);
$counts_tid = sql("SELECT COUNT(id) FROM `tematy` WHERE `forum` = '".$_GET['aktu_fid']."' AND `id` = '".$_GET['aktu_tid']."'","array");

if ($counts_fid > 0 && $counts_tid > 0) {
	$t_info = $forum->get_thread_info($_GET['aktu_tid']);
	
	if ($_GET['action'] === 'edit' && count($_POST) > 0) {
		if ($_GET['h'] == $session['hkey']) {
			//Walidacja elementu important:
			if (isset($_POST['important'])) {
				$important = true;
				} else {
				$important = false;
				}
				
			//Walidacja nazwy tematu:
			
			$_POST['subject'] = cmp_str($_POST['subject'],3,64);
			if ($_POST['subject'] === 'SHORT') {
				$error = 'O nome do tópico deve ter pelo menos 3 caracteres.';
				}
			elseif ($_POST['subject'] === 'LONG') {
				$error = 'O nome do tópico pode conter até 64 caracteres.';
				}
			elseif ($_POST['subject'] === 'SPACES') {
				$error = 'O nome do tópico não pode consistir apenas em espaços.';
				} else {
				$_POST['subject'] = parse($_POST['subject']);
				mysql_query("UPDATE `tematy` SET `nazwa` = '".$_POST['subject']."' , `important` = '$important' WHERE `id` = '".$_GET['aktu_tid']."'");

				mysql_query("UPDATE `users` SET `new_post` = '1' WHERE `ally` = '".$user['ally']."'");
				
				//Przekieruj u�ytkownika na stron� tematu:
				$_link = "location: $_BASE_LINK&sm=s_thread&aktu_fid=".$_GET['aktu_fid']."&aktu_tid=".$_GET['aktu_tid'];
				header ($_link);
				exit;
				}
			} else {
			$error = 'Erro ao executar a ação';
			}
		}
		
	$t_info['nazwa'] = entparse($t_info['nazwa']);
	$tpl->assign('tname',$t_info['nazwa']);
	$tpl->assign('important',$t_info['important']);
	$pokazac_posty = true;
	} else {
	$pokazac_posty = false;
	}
	
$tpl->assign('error',$error);
$tpl->assign('pok_pos',$pokazac_posty);
$tpl->assign('aktu_fid',$_GET['aktu_fid']);
$tpl->assign('aktu_tid',$_GET['aktu_tid']);
?>