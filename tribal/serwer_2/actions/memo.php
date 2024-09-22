<?php
//Start klasy bb_interpreter();
$bb_interpreter = new bb_interpreter($cl_builds,$cl_units,$pl);

if ($_GET['action'] === 'edit' && count($_POST) > 0) {
	if ($_GET['h'] == $session['hkey']) {
		$str_err = cmp_str($_POST['memo'],0,5000);
		
		if ($str_err === 'LONG') {
			$error = 'Tekst mo¿e maksymalnie sk³adaæ siê z 5000 znaków';
			}
		elseif ($str_err === 'SPACES') {
			$error = 'Tekst nie mo¿e sk³adaæ siê z samych spacji';
			} else {
			$str_comp_bb = $bb_interpreter->compile_bb_code($str_err,$user['id']);
			$str_err = parse($str_err);
			
			mysql_query("UPDATE `users` SET `memo` = '".$str_comp_bb."' , `memo_bb` = '".$str_err."' WHERE `id` = '".$user['id']."'");
			
			header('location: game.php?village='.$village['id'].'&screen=memo');
			exit;
			}
		} else {
		$error = 'B³¹d podczas wykonywania akcji';
		}
	}

$user_memo = sql("SELECT memo,memo_bb FROM `users` WHERE `id` = '".$user['id']."'","assoc");
$tpl->assign('memo_viev',$bb_interpreter->load_bb($user_memo['memo'],$village['id']));
$tpl->assign('memo_bb',entparse($user_memo['memo_bb']));
$tpl->assign('error',$error);
?>