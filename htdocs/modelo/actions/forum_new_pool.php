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
					$error = 'Pode Adicionar 20 Respostas no maximo';
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
					$error = 'O texto deve ter medo de pelo menos 3 marca.';
					$tpl->assign('preview_bb',$old_msg);
					$tpl->assign('subject',$old_tname);
					}
				elseif ($_POST['message'] === 'LONG') {
					$error = 'O texto pode consistir em um máximo de 5.000 sinais.';
					$tpl->assign('preview_bb',$old_msg);
					$tpl->assign('subject',$old_tname);
					}
				elseif ($_POST['message'] === 'SPACES') {
					$error = 'O texto pode não consistir nos próprios espaços.';
					$tpl->assign('preview_bb','');
					$tpl->assign('subject',$old_tname);
					} else {
					if (isset($_POST['send'])) {
						$_POST['subject'] = cmp_str($_POST['subject'],3,64);
						if ($_POST['subject'] === 'SHORT') {
							$error = 'O nome do tópico deve ser escalado por pelo menos 3 marcações.';
							$tpl->assign('preview_bb',$_POST['message']);
							$tpl->assign('subject',$old_tname);
							}
						elseif ($_POST['subject'] === 'LONG') {
							$error = 'O nome do tópico pode consistir em um máximo de 64 sinais.';
							$tpl->assign('preview_bb',$_POST['message']);
							$tpl->assign('subject',$old_tname);
							}
						elseif ($_POST['subject'] === 'SPACES') {
							$error = 'O nome do tópico não pode consistir nos próprios espaços.';
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
	mysql_query("UPDATE `users` SET `new_post` = '1' WHERE `ally` = '".$user['ally']."'");									
								header("location: $_BASE_LINK&sm=s_thread&aktu_fid=".$_GET['aktu_fid']."&aktu_tid=$tid");
								exit;
								} else {
								$error = "A quantidade de resposta à pesquisa deve ser pelo menos 2";
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
			$error = 'B��d enquanto executa ações';
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