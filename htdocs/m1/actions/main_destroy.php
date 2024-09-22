<?php
	$result = $db->query("SELECT * FROM `villages` WHERE `id` = '".$village['id']."'");
	$data = $db->fetch($result);
	if($village['main'] < 15){
		header('Location: game.php?village='.$village['id'].'screen=main');
	}

	// Abreissen
	if($_GET['action'] == 'destroy'){
		$building = mysql_real_escape_string($_GET['id']);

		$query = $db->query("SELECT * FROM `destroy` WHERE `villageid` = '".$village['id']."'");
		$num = $db->numrows($query);
		if($village[$building] > 0 && $_GET['h'] == $session['hkey'] && in_array($building, $cl_builds->get_array('dbname')) && $num == 0){
			// Zeit
			$time = time();
			$time_b = $cl_builds->get_time($villdata['main'], $building, $villdata[$building]-1);
			$end_time = $time + $time_b;
			// In die DB schreiben
			$destroy = $db->query("INSERT INTO `destroy` (`build`, `villageid`, `stage`, `start_time`, `end_time`) VALUES ('".$building."', '".$village['id']."', '".($village[$building]-1)."', '".$time."', '".$end_time."')");
			if($destroy){
				header('Location: game.php?village='.$village['id'].'&screen=main&mode=destroy');
				exit();
			}
		}else{
			$err = 'J&aacute; existe uma demoli&ccedil;&atilde;o em andamento.';
		}
	}

	// Abbrechen
	if($_GET['action'] == 'cancel' AND $_GET['h'] == $session['hkey'] AND $_GET['id'] != ''){
		$query = $db->query("SELECT * FROM `destroy` WHERE `id` = '".parse($_GET['id'])."'");
		$data = $db->fetch($query);
		if($data['villageid'] == $village['id']) {
			$db->query("DELETE FROM `destroy` WHERE `id` = '".parse($_GET['id'])."'");
			header('Location: game.php?village='.$village['id'].'&screen=main&mode=destroy');
			exit();
		}
	}
  
	// Laufende Aufträge
	$query = $db->query("SELECT * FROM `destroy` WHERE `villageid` = '".parse($_GET['village'])."'");
	if($db->numrows($query) > 0){
		$task = $db->fetch($query);
		$tpl->assign('t', $task);
		$tpl->assign('task', true);
	}

	$tpl->assign('err', $err);
	$tpl->assign('cl_builds', $cl_builds);
?>