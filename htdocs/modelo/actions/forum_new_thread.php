<?php
$_GET['aktu_fid'] = floor((int)$_GET['aktu_fid']);

$counts = $forum->can_see_fid($_GET['aktu_fid']);
if ($counts > 0) {
	$pokazac_tematy = true;
	$forumname = entparse(sql("SELECT `nazwa` FROM `fora` WHERE `id` = '".$_GET['aktu_fid']."'","array"));
	
	if ($_GET['action'] === 'write' && count($_POST) > 0) {
		if ($_GET['h'] == $session['hkey']) {
			$old_msg = $_POST['message'];
			$old_tname = $_POST['subject'];
			
			//Walidacja stringu:
			$_POST['message'] = cmp_str($_POST['message'],3,5000);
			
			if ($_POST['message'] === 'SHORT') {
				$error = 'O texto deve pontuar pelo menos 3 marcações.';
				$tpl->assign('preview_bb',$old_msg);
				$tpl->assign('thread_name',$old_tname);
				}
			elseif ($_POST['message'] === 'LONG') {
				$error = 'O texto pode consistir em um máximo de 5.000 caracteres.';
				$tpl->assign('preview_bb',$old_msg);
				$tpl->assign('thread_name',$old_tname);
				}
			elseif ($_POST['message'] === 'SPACES') {
				$error = 'O texto não pode consistir nos próprios espaços.';
				$tpl->assign('preview_bb','');
				$tpl->assign('thread_name',$old_tname);
				} else {
				if (isset($_POST['send'])) {
					$_POST['subject'] = cmp_str($_POST['subject'],3,64);
					if ($_POST['subject'] === 'SHORT') {
						$error = 'O nome do tópico deve ser escalado por pelo menos 3 marca.';
						$tpl->assign('preview_bb',$_POST['message']);
						$tpl->assign('thread_name',$old_tname);
						}
					elseif ($_POST['subject'] === 'LONG') {
						$error = 'O nome do tópico pode consistir em um máximo de 64 sinais.';
						$tpl->assign('preview_bb',$_POST['message']);
						$tpl->assign('thread_name',$old_tname);
						}
					elseif ($_POST['subject'] === 'SPACES') {
						$error = 'O nome do tópico não pode consistir nos próprios espaços.';
						$tpl->assign('preview_bb',$_POST['message']);
						$tpl->assign('thread_name','');
						} else {
						$sub = parse($_POST['subject']);
						$msg = $bb_interpreter->compile_bb_code($_POST['message'],$user['id']);
						
						if (isset($_POST['important'])) {
							$is_important = true;
							} else {
							$is_important = false;
							}
						
						$tid = $forum->write_new_thread($sub,$msg,$_POST['message'],$_GET['aktu_fid'],$is_important);
mysql_query("UPDATE `users` SET `new_post` = '1' WHERE `ally` = '".$user['ally']."'");							
						header("location: $_BASE_LINK&sm=s_thread&aktu_fid=".$_GET['aktu_fid']."&aktu_tid=$tid");
						exit;
						}
						
					$tpl->assign('preview_bb',$_POST['message']);
					} else {
					$compiled_msg = $bb_interpreter->compile_bb_code($_POST['message'],$user['id']);
					$tpl->assign('preview',$bb_interpreter->load_bb($compiled_msg,$village['id']));
					$tpl->assign('preview_bb',$_POST['message']);
					$tpl->assign('thread_name',$old_tname);
					}
				}
			} else {
			$error = 'B��d enquanto executa ações';
			}
		}
	} else {
	$pokazac_tematy = false;
	}
	
$tpl->assign('aktu_fid',$_GET['aktu_fid']);
$tpl->assign('pok_tem',$pokazac_tematy);
?>