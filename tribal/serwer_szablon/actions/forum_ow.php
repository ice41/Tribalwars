<?php
if (!isset($_GET['aktu_fid'])) {
	$forums = array_keys($forum->user_forums_can_see);
	$_GET['aktu_fid'] = $forums[0];
	}
	
$_GET['aktu_fid'] = floor((int)$_GET['aktu_fid']);

$counts = $forum->can_see_fid($_GET['aktu_fid']);

if ($counts > 0) {
	$pokazac_tematy = true;
	$forumname = entparse(sql("SELECT `nazwa` FROM `fora` WHERE `id` = '".$_GET['aktu_fid']."'","array"));
	
	if ($_GET['action'] === 'mark_read') {
		if ($_GET['h'] == $session['hkey']) {
			mysql_query("DELETE FROM `czytanie` WHERE `graczid` = '".$user['id']."' AND `fid` = '".$_GET['aktu_fid']."'");
			header("location: $_BASE_LINK&sm=ow&aktu_fid=".$_GET['aktu_fid']);
			exit;
			} else {
			$error = 'B³¹d podczas wykonywania akcji';
			}
		}
		
	if ($_GET['action'] === 'mark_read_all') {
		if ($_GET['h'] == $session['hkey']) {
			mysql_query("DELETE FROM `czytanie` WHERE `graczid` = '".$user['id']."'");
			header("location: $_BASE_LINK&sm=ow&aktu_fid=".$_GET['aktu_fid']);
			exit;
			} else {
			$error = 'B³¹d podczas wykonywania akcji';
			}
		}
	
	if ($_GET['action'] === 'mod' && count($_POST) > 0 && $forum->is_moderator()) {
		if ($_GET['h'] == $session['hkey']) {
			if (is_array($_POST['thread_ids'])) {
				if (isset($_POST['close_x']) && isset($_POST['close_y'])) {
					$selected_theaders = array();
					}
					
				foreach ($_POST['thread_ids'] as $tid => $stat) {
					//Walidacja dla bezpieczeñstwa skryptu:
					$tid = floor((int)$tid);
					$is_in_thread = sql("SELECT COUNT(id) FROM `tematy` WHERE `id` = '$tid' AND `forum` = '".$_GET['aktu_fid']."'","array");
					if ($is_in_thread) {
						if (isset($_POST['del_x']) && isset($_POST['del_y'])) {
							mysql_query("DELETE FROM `tematy` WHERE `id` = '$tid'");
							
							mysql_query("DELETE FROM `posty` WHERE `temat` = '".$tid."'");
							mysql_query("DELETE FROM `czytanie` WHERE `tid` = '".$tid."'");
							mysql_query("DELETE FROM `f_ankiety` WHERE `tid` = '".$tid."'");
							}
						if (isset($_POST['close_x']) && isset($_POST['close_y'])) {
							$t_status = sql("SELECT `is_close` FROM `tematy` WHERE `id` = '$tid'","array");
							if ($t_status == 0) {
								$n_status = 1;
								}
							if ($t_status == 1) {
								$n_status = 0;
								}
							mysql_query("UPDATE `tematy` SET `is_close` = '$n_status' WHERE `id` = '$tid'");
							}
						if (isset($_POST['move_x']) && isset($_POST['move_y'])) {
							$selected_theaders[] = $tid;
							}
						}
					}
				
				if (isset($_POST['move_x']) && isset($_POST['move_y'])) {
					$string = implode(";",$selected_theaders);
					if (!empty($string)) {
						header("location: $_BASE_LINK&sm=replace&fid=".$_GET['aktu_fid']."&tid=$string");
						exit;
						} else {
						header("location: $_BASE_LINK&sm=ow&aktu_fid=".$_GET['aktu_fid']);
						exit;
						}
					} else {
					header("location: $_BASE_LINK&sm=ow&aktu_fid=".$_GET['aktu_fid']);
					exit;
					}
				} else {
				$error = 'Nie wybrano ¿adnych tematów';
				}
			} else {
			$error = 'B³¹d podczas wykonywania akcji';
			}
		}
	
	$threads_arr = $forum->get_threads($_GET['aktu_fid']);
	} else {
	$pokazac_tematy = false;
	}
	
$tpl->assign('aktu_fid',$_GET['aktu_fid']);
$tpl->assign('threads_arr',$threads_arr);
$tpl->assign('pok_tem',$pokazac_tematy);
$tpl->assign('forumname',$forumname);
?>