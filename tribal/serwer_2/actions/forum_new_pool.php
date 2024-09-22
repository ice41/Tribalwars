<?php
$_GET['aktu_fid'] = floor((int)$_GET['aktu_fid']);

$counts = $forum->can_see_fid($_GET['aktu_fid']);
if ($counts > 0) {
	$pokazac_tematy = true;
	$forumname = entparse(sql("SELECT `nazwa` FROM `fora` WHERE `id` = '".$_GET['aktu_fid']."'","array"));
	
	if ($_GET['action'] === 'write' && count($_POST) > 0) {
		if ($_GET['h'] == $session['hkey']) {
			if ($_POST['addnew'] == 1) {
				if (count($_POST['poll_options']) > 20) {
					$error = 'Maksymalnie mo¿na dodaæ 20 odpowiedzi';
					} else {
					$_POST['poll_options'][] = "";
					}
				$options = $_POST['poll_options'];
				
				$tpl->assign("subject",$_POST['subject']);
				
				if (isset($_POST['important'])) {
					$tpl->assign("important",true);
					}
					
				if (isset($_POST['show_result'])) {
					$tpl->assign("show_result",true);
					}
					
				$tpl->assign("preview_bb",$_POST['message']);
					
				} else {
				foreach ($_POST['poll_options'] as $option) {
					$option = cmp_str($option,1,100);
					if ($option !== 'SHORT' && $option !== 'LONG' && $option !== 'SPACES') {
						$options[] = $option;
						$options_validated[] = $option;
						$no_empty_options++;
						} else {
						$options[] = "";
						}
					}
						
				if (isset($_POST['important'])) {
					$tpl->assign("important",true);
					}
					
				if (isset($_POST['show_result'])) {
					$tpl->assign("show_result",true);
					}
						
				//Walidacja stringu:
				$old_msg = $_POST['message'];
				$old_tname = $_POST['subject'];
					
				$_POST['message'] = cmp_str($_POST['message'],3,5000);
					
				if ($_POST['message'] === 'SHORT') {
					$error = 'Tekst musi ska³adaæ siê co najmniej z 3 znaków.';
					$tpl->assign('preview_bb',$old_msg);
					$tpl->assign('subject',$old_tname);
					}
				elseif ($_POST['message'] === 'LONG') {
					$error = 'Tekst mo¿e sk³adaæ siê z maksymalnie 5000 znaków.';
					$tpl->assign('preview_bb',$old_msg);
					$tpl->assign('subject',$old_tname);
					}
				elseif ($_POST['message'] === 'SPACES') {
					$error = 'Tekst nie mo¿e sk³adaæ siê z samych spacji.';
					$tpl->assign('preview_bb','');
					$tpl->assign('subject',$old_tname);
					} else {
					if (isset($_POST['send'])) {
						$_POST['subject'] = cmp_str($_POST['subject'],3,64);
						if ($_POST['subject'] === 'SHORT') {
							$error = 'Nazwa tematu musi ska³adaæ siê co najmniej z 3 znaków.';
							$tpl->assign('preview_bb',$_POST['message']);
							$tpl->assign('subject',$old_tname);
							}
						elseif ($_POST['subject'] === 'LONG') {
							$error = 'Nazwa tematu mo¿e sk³adaæ siê z maksymalnie 64 znaków.';
							$tpl->assign('preview_bb',$_POST['message']);
							$tpl->assign('subject',$old_tname);
							}
						elseif ($_POST['subject'] === 'SPACES') {
							$error = 'Nazwa tematu nie mo¿e sk³adaæ siê z samych spacji.';
							$tpl->assign('preview_bb',$_POST['message']);
							$tpl->assign('subject','');
							} else {
							if ($no_empty_options > 1) {
								$sub = parse($_POST['subject']);
								$msg = $bb_interpreter->compile_bb_code($_POST['message'],$user['id']);
							
								if (isset($_POST['important'])) {
									$is_important = true;
									} else {
									$is_important = false;
									}
									
								if (isset($_POST['show_result'])) {
									$show_results = true;
									} else {
									$show_results = false;
									}
									
								$tid = $forum->create_pool($sub,$msg,$_POST['message'],$_GET['aktu_fid'],$is_important,$show_results,$options_validated);
									
								header("location: $_BASE_LINK&sm=s_thread&aktu_fid=".$_GET['aktu_fid']."&aktu_tid=$tid");
								exit;
								} else {
								$error = "Iloœæ odpowiedzi do ankiety musi wynosiæ co najmniej 2";
								}
							}
						} else {
						$compiled_msg = $bb_interpreter->compile_bb_code($_POST['message'],$user['id']);
						$tpl->assign('preview',$bb_interpreter->load_bb($compiled_msg,$village['id']));
						$tpl->assign('preview_bb',$_POST['message']);
						$tpl->assign('thread_name',$old_tname);
						}
					}
				}
			} else {
			$error = 'B³¹d podczas wykonywania akcji';
			}
		}
	} else {
	$pokazac_tematy = false;
	}
	
if (!isset($options)) {
	$options[] = "";
	$options[] = "";
	$options[] = "";
	}
	
$tpl->assign('aktu_fid',$_GET['aktu_fid']);
$tpl->assign('pok_tem',$pokazac_tematy);
$tpl->assign('options',$options);
?>