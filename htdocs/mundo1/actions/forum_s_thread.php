<?php
//Walidacja liczb:
$_GET['aktu_fid'] = floor((int)$_GET['aktu_fid']);
$_GET['aktu_tid'] = floor((int)$_GET['aktu_tid']);

$counts_fid = $forum->can_see_fid($_GET['aktu_fid']);
$counts_tid = sql("SELECT COUNT(id) FROM `tematy` WHERE `forum` = '".$_GET['aktu_fid']."' AND `id` = '".$_GET['aktu_tid']."'","array");

if ($counts_fid > 0 && $counts_tid > 0) {
	$pokazac_posty = true;
	$forum->przeczytano($_GET['aktu_fid'],$_GET['aktu_tid']);
	
	$tinfo = $forum->get_thread_info($_GET['aktu_tid']);
	
	$tinfo['nazwa'] = entparse($tinfo['nazwa']);
	
	if ($tinfo['important'] == 1 && $tinfo['typ'] == 1) {
		if ($tinfo['important'] == 1) {
			$tinfo['nazwa'] = 'Enquete: ' . $tinfo['nazwa'];
			}
		} else {
		if ($tinfo['important'] == 1) {
			$tinfo['nazwa'] = 'importante: ' . $tinfo['nazwa'];
			}
		if ($tinfo['typ'] == 1) {
			$tinfo['nazwa'] = 'Questionário: ' . $tinfo['nazwa'];
			}
		}
	if ($tinfo['is_close'] == 1) {
		$tinfo['nazwa'] = $tinfo['nazwa'] . ' (fechado)';
		}
	
	
		
	if (!isset($_GET['page'])) {
		$_GET['page'] = 0;
		$max_pages = floor($tinfo['odpowiedzi'] / 30);
		} else {
		$_GET['page'] = floor((int)$_GET['page']);
		$max_pages = floor($tinfo['odpowiedzi'] / 30);
		
		if ($_GET['page'] < 0) {
			$_GET['page'] = 0;
			}
		if ($_GET['page'] > $max_pages) {
			$_GET['page'] = $max_pages;
			}
		}
		
	if ($_GET['try'] === 'write' && $tinfo['is_close'] == 0) {
		$_GET['aktu_pid'] = floor((int)$_GET['aktu_pid']);
		$counts = sql("SELECT COUNT(id) FROM `posty` WHERE `temat` = '".$_GET['aktu_tid']."' AND `id` = '".$_GET['aktu_pid']."'","array");
		if ($counts > 0) {
			$post_info = sql("SELECT gracznazwa,msg_bb FROM `posty` WHERE `id` = '".$_GET['aktu_pid']."'","assoc");
			$_action_name = 'write_new';
			$_action_value = '[quote='.$post_info['gracznazwa'].']'.$post_info['msg_bb'].'[/quote]';
			} else {
			$_action_name = 'write_new';
			}
		}
		
	if ($_GET['try'] === 'edit' && $tinfo['is_close'] == 0) {
		$_GET['aktu_pid'] = floor((int)$_GET['aktu_pid']);
		$counts = sql("SELECT COUNT(id) FROM `posty` WHERE `temat` = '".$_GET['aktu_tid']."' AND `id` = '".$_GET['aktu_pid']."'","array");
		if ($counts > 0) {
			$post_info = sql("SELECT msg_bb,graczid FROM `posty` WHERE `id` = '".$_GET['aktu_pid']."'","assoc");
			if ($forum->is_moderator() || $forum->user_info['id'] == $post_info['graczid']) {
				$_action_name = 'edit_post';
				$_action_value = $post_info['msg_bb'];
				mysql_query("UPDATE `users` SET `new_post` = '1' WHERE `ally` = '".$user['ally']."'");
				$tpl->assign("edit_pid",$_GET['aktu_pid']);
				}
			}
		}
		
	if ($_GET['action'] === 'vote' && count($_POST) > 0 && $tinfo['typ'] == 1) {
		if ($_GET['h'] == $session['hkey']) {
			$_POST['vote'] = floor((int)$_POST['vote']);
			
			$forum->vote($_GET['aktu_fid'],$_GET['aktu_tid'],$_POST['vote']);
			
			$_link = "location: $_BASE_LINK&sm=s_thread&aktu_fid=".$_GET['aktu_fid']."&aktu_tid=".$_GET['aktu_tid']."&page=".$_GET['page'];
			header ($_link);
			exit;
			} else {
			$error = 'B��d enquanto executa ações';
			}
		}
		
	if ($_GET['action'] === 'write_new' && count($_POST) > 0 && $tinfo['is_close'] == 0) {
		if ($_GET['h'] == $session['hkey']) {
			$start_msg = $_POST['message'];
			$_POST['message'] = cmp_str($_POST['message'],3,5000);
			if ($_POST['message'] === 'SHORT') {
				$error = 'O texto deve pontuar pelo menos 3 marcações.';
				}
			if ($_POST['message'] === 'LONG') {
				$error = 'O texto pode consistir em um máximo de 5.000 caracteres.';
				}
			if ($_POST['message'] === 'SPACES') {
				$error = 'O texto não pode consistir nos próprios espaços.';
				}
				
			if (!empty($error)) {
				$_action_name = 'write_new';
				$_action_value = $start_msg;
				} else {
				if (isset($_POST['preview'])) {
					$_action_name = 'write_new';
					$_action_value = $_POST['message'];
					$tpl->assign('post_preview',$bb_interpreter->load_bb($bb_interpreter->compile_bb_code($_POST['message'],$user['id']),$village['id']));
					} else {
					$msg = $bb_interpreter->compile_bb_code($_POST['message'],$user['id']);
					
					$forum->add_answer($msg,$_POST['message'],$_GET['aktu_fid'],$_GET['aktu_tid']);
					mysql_query("UPDATE `users` SET `new_post` = '1' WHERE `ally` = '".$user['ally']."'");
					$_link = "location: $_BASE_LINK&sm=s_thread&aktu_fid=".$_GET['aktu_fid']."&aktu_tid=".$_GET['aktu_tid']."&page=".$_GET['page'];
					header ($_link);
					exit;
					}
				}
			} else {
			$error = 'B��d enquanto executa ações';
			}
		}
		
	if ($_GET['action'] === 'del_posts' && count($_POST) > 0 && $tinfo['is_close'] == 0 && $forum->is_moderator()) {
		if ($_GET['h'] == $session['hkey']) {
			if (is_array($_POST['chk_del_posts'])) {
			
				foreach ($_POST['chk_del_posts'] as $val) {
					$val = floor((int)$val);
					
					$counts = sql("SELECT COUNT(id) FROM `posty` WHERE `temat` = '".$_GET['aktu_tid']."' AND `id` = '".$val."'","array");
					if ($counts > 0 && $val != $tinfo['pierwszy_post_id']) {
						$v_array[] = $val;
						}
					}
						
				if (is_array($v_array)) {
					$p_minus = 0;
					foreach ($v_array as $val) {
						mysql_query("DELETE FROM `posty` WHERE `id` = '".$val."'");
						$p_minus++;
						}
					mysql_query("UPDATE `users` SET `new_post` = '1' WHERE `ally` = '".$user['ally']."'");	
					mysql_query("UPDATE `tematy` SET `odpowiedzi` = `odpowiedzi` - '$p_minus' WHERE `id` = '".$_GET['aktu_tid']."'");
					}
						
				$_link = "location: $_BASE_LINK&sm=s_thread&aktu_fid=".$_GET['aktu_fid']."&aktu_tid=".$_GET['aktu_tid']."&page=".$_GET['page'];
				header ($_link);
				exit;
				} else {
				$error = 'Deve selecionar pelo menos um campo';
				}
			} else {
			$error = 'B��d enquanto executa ações';
			}
		}
		
	//Akcja usu� post:
	if ($_GET['action'] === 'del_post' && $tinfo['is_close'] == 0) {
		if ($_GET['h'] == $session['hkey']) {
			$_GET['aktu_pid'] = floor((int)$_GET['aktu_pid']);
			if ($tinfo['pierwszy_post_id'] == $_GET['aktu_pid']) {
				$post_info = sql("SELECT `graczid` FROM `posty` WHERE `id` = '".$_GET['aktu_pid']."'","assoc");
				
				if ($forum->is_moderator() || $forum->user_info['id'] == $post_info['graczid']) {
					mysql_query("UPDATE `users` SET `new_post` = '1' WHERE `ally` = '".$user['ally']."'");
					mysql_query("DELETE FROM `posty` WHERE `id` = '".$_GET['aktu_pid']."'");
					mysql_query("UPDATE `tematy` SET `odpowiedzi` = `odpowiedzi` - '1' WHERE `id` = '".$_GET['aktu_tid']."'");
				
					$_link = "location: $_BASE_LINK&sm=s_thread&aktu_fid=".$_GET['aktu_fid']."&aktu_tid=".$_GET['aktu_tid']."&page=".$_GET['page'];
					header ($_link);
					exit;
					} else {
					$error = 'Esse tipo de ação só pode ser executado pelo moderador do fórum';
					}
				} else {
				$error = 'Não pode remover o primeiro post do tópico';
				}
			} else {
			$error = 'B��d enquanto executa ações';
			}
		}
		
	//Akcja edytuj post:
	if ($_GET['action'] === 'edit_post' && count($_POST) > 0  && $tinfo['is_close'] == 0) {
		if ($_GET['h'] == $session['hkey']) {
			$start_msg = $_POST['message'];
			$_POST['message'] = cmp_str($_POST['message'],3,5000);
			if ($_POST['message'] === 'SHORT') {
				$error = 'O texto deve pontuar pelo menos 3 marcações.';
				}
			if ($_POST['message'] === 'LONG') {
				$error = 'O texto pode consistir em um máximo de 5.000 caracteres.';
				}
			if ($_POST['message'] === 'SPACES') {
				$error = 'O texto não pode consistir nos próprios espaços.';
				}
				
			$_GET['aktu_pid'] = floor((int)$_GET['aktu_pid']);
				
			if (!empty($error)) {
				$_action_name = 'edit_post';
				$_action_value = $start_msg;
				$tpl->assign("edit_pid",$_GET['aktu_pid']);
				} else {
				if (isset($_POST['preview'])) {
					$_action_name = 'edit_post';
					$_action_value = $_POST['message'];
					$tpl->assign('post_preview',$bb_interpreter->load_bb($bb_interpreter->compile_bb_code($_POST['message'],$user['id']),$village['id']));
					$tpl->assign("edit_pid",$_GET['aktu_pid']);
					} else {
					$post_info = sql("SELECT `graczid` FROM `posty` WHERE `id` = '".$_GET['aktu_pid']."'","assoc");
					if ($forum->is_moderator() || $forum->user_info['id'] == $post_info['graczid']) {
						//Pobra� nazw� usera z bazy:
						$name_u = entparse(sql("SELECT `username` FROM `users` WHERE `id` = '".$forum->user_info['id']."'","array"));
		
						$_POST['message'] .= "\n\n[i]do utilizador $name_u editou o post ".$pl->format_date(date("U"))."[/i]";
						$msg = $bb_interpreter->compile_bb_code($_POST['message'],$user['id']);
						mysql_query("UPDATE `users` SET `new_post` = '1' WHERE `ally` = '".$user['ally']."'");
						mysql_query("UPDATE `posty` SET `msg` = '$msg' , `msg_bb` = '".$_POST['message']."' WHERE `id` = '".$_GET['aktu_pid']."'");
			
						$_link = "location: $_BASE_LINK&sm=s_thread&aktu_fid=".$_GET['aktu_fid']."&aktu_tid=".$_GET['aktu_tid']."&page=".$_GET['page'];
						header ($_link);
						exit;
						} else {
						$error = 'Esse tipo de ação só pode ser executado pelo moderador do fórum';
						}
					}
				}
			} else {
			$error = 'B��d enquanto executa ações';
			}
		}
		
	if ($_GET['action'] === 'close_thread' && $forum->is_moderator()) {
		if ($_GET['h'] == $session['hkey']) {
			if ($tinfo['is_close'] == 0) {
				$n_status = 1;
				}
			if ($tinfo['is_close'] == 1) {
				$n_status = 0;
				}
			mysql_query("UPDATE `users` SET `new_post` = '1' WHERE `ally` = '".$user['ally']."'");	
			mysql_query("UPDATE `tematy` SET `is_close` = '$n_status' WHERE `id` = '".$_GET['aktu_tid']."'");
			$_link = "location: $_BASE_LINK&sm=s_thread&aktu_fid=".$_GET['aktu_fid']."&aktu_tid=".$_GET['aktu_tid']."&page=".$_GET['page'];
			header ($_link);
			exit;
			} else {
			$error = 'B��d enquanto executa ações';
			}
		}
		
	if ($_GET['action'] === 'del_thread' && $forum->is_moderator()) {
		if ($_GET['h'] == $session['hkey']) {
			if ($t_status == 0) {
				$n_status = 1;
				}
			if ($t_status == 1) {
				$n_status = 0;
				}
				
			$tid = $_GET['aktu_tid'];
			mysql_query("DELETE FROM `tematy` WHERE `id` = '$tid'");				
			mysql_query("DELETE FROM `posty` WHERE `temat` = '".$tid."'");
			mysql_query("DELETE FROM `czytanie` WHERE `tid` = '".$tid."'");
			mysql_query("DELETE FROM `f_ankiety` WHERE `tid` = '".$tid."'");
			mysql_query("UPDATE `users` SET `new_post` = '1' WHERE `ally` = '".$user['ally']."'");
			$_link = "location: $_BASE_LINK&sm=ow&aktu_fid=".$_GET['aktu_fid'];
			header ($_link);
			exit;
			} else {
			$error = 'B��d enquanto executa ações';
			}
		}
		
	$sekcja_posty = '';
		
	//Sekcja stron na forum:
	for ($i = 0; $i <= $max_pages; $i++) {
		$next_i = $i + 1;
		if ($i == $_GET['page']) {
			$sekcja_posty .= '<b>&gt;'.$next_i.'&lt;</b>  ';
			} else {
			$sekcja_posty .= '<a href="'.$_BASE_LINK.'&sm=s_thread&aktu_fid='.$_GET['aktu_fid'].'&aktu_tid='.$_GET['aktu_tid'].'&page='.$i.'"/>['.$next_i.']</a>  ';
			}
		}
		
	$posts_array = $forum->get_posts($_GET['aktu_tid'],$_GET['page'],$village['id']);
	
	$tpl->assign("sekcja_posty",$sekcja_posty);	
	$tpl->assign("show_write_action",$_action_name);	
	$tpl->assign("write_action_value",$_action_value);	
	$tpl->assign("thread_title",$tinfo['nazwa']);
	$tpl->assign("is_close",$tinfo['is_close']);
	$tpl->assign("post_page",$_GET['page']);
	$tpl->assign("posty",$posts_array);
	$tpl->assign("aktuuser",$forum->user_info['id']);
	$tpl->assign("thread_start_pid",$tinfo['pierwszy_post_id']);
	$tpl->assign("is_pool",$tinfo['typ']);
	} else {
	$pokazac_posty = false;
	}
	
$tpl->assign('pok_pos',$pokazac_posty);
$tpl->assign('aktu_fid',$_GET['aktu_fid']);
$tpl->assign('aktu_tid',$_GET['aktu_tid']);
?>