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
				$error = 'Tekst musi ska³adaæ siê co najmniej z 3 znaków.';
				$tpl->assign('preview_bb',$old_msg);
				$tpl->assign('thread_name',$old_tname);
				}
			elseif ($_POST['message'] === 'LONG') {
				$error = 'Tekst mo¿e sk³adaæ siê z maksymalnie 5000 znaków.';
				$tpl->assign('preview_bb',$old_msg);
				$tpl->assign('thread_name',$old_tname);
				}
			elseif ($_POST['message'] === 'SPACES') {
				$error = 'Tekst nie mo¿e sk³adaæ siê z samych spacji.';
				$tpl->assign('preview_bb','');
				$tpl->assign('thread_name',$old_tname);
				} else {
				if (isset($_POST['send'])) {
					$_POST['subject'] = cmp_str($_POST['subject'],3,64);
					if ($_POST['subject'] === 'SHORT') {
						$error = 'Nazwa tematu musi ska³adaæ siê co najmniej z 3 znaków.';
						$tpl->assign('preview_bb',$_POST['message']);
						$tpl->assign('thread_name',$old_tname);
						}
					elseif ($_POST['subject'] === 'LONG') {
						$error = 'Nazwa tematu mo¿e sk³adaæ siê z maksymalnie 64 znaków.';
						$tpl->assign('preview_bb',$_POST['message']);
						$tpl->assign('thread_name',$old_tname);
						}
					elseif ($_POST['subject'] === 'SPACES') {
						$error = 'Nazwa tematu nie mo¿e sk³adaæ siê z samych spacji.';
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
			$error = 'B³¹d podczas wykonywania akcji';
			}
		}
	} else {
	$pokazac_tematy = false;
	}
	
$tpl->assign('aktu_fid',$_GET['aktu_fid']);
$tpl->assign('pok_tem',$pokazac_tematy);
?>