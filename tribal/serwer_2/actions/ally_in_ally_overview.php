<?php 
//Start klasy bb_interpreter();
$bb_interpreter = new bb_interpreter($cl_builds,$cl_units,$pl);

if ($_GET['action'] === 'exit') {
	if ($_GET['h'] == $session['hkey']) {
		mysql_query("DELETE FROM `czytanie` WHERE `graczid` = '".$user['id']."'");
		mysql_query("DELETE FROM `rezerwacje` WHERE `od_gracza` = '".$user['id']."'");
		mysql_query("DELETE FROM `f_ankiety` WHERE `uid` = '".$user['id']."'");
		} else {
		$error = 'B³¹d hkey!';
		}
	}
	
if ($_GET['action'] === 'edit_intern') {
	if ($_GET['h'] == $session['hkey']) {
		header('location: game.php?village='.$village['id'].'&screen=ally&mode=overview');
		exit;
		} else {
		$error = 'B³¹d hkey!';
		}
	}
	
if ($_GET['action'] === 'edit_intern_text' && count($_POST) > 0 && $user['ally_found']) {
	if ($_GET['h'] == $session['hkey']) {
		$old_msg = $_POST['message'];
			
		//Walidacja stringu:
		$_POST['message'] = cmp_str($_POST['message'],0,5000);
			
		if ($_POST['message'] === 'LONG') {
			$error = 'Tekst mo¿e sk³adaæ siê z maksymalnie 5000 znaków.';
			$text_ally_wew_bb = $old_msg;
			}
		elseif ($_POST['message'] === 'SPACES') {
			$error = 'Tekst nie mo¿e sk³adaæ siê z samych spacji.';
			} else {
			if (isset($_POST['edit'])) {			
				//Zinterpretuj bb codes:
				$compiled_msg = $bb_interpreter->compile_bb_code($_POST['message'],$user['id']);
				
				mysql_query("UPDATE `ally` SET `intern_text` = '$compiled_msg' , `intern_text_bb` = '".$_POST['message']."' WHERE `id` = '".$user['ally']."'");
				
				header('location: game.php?village='.$village['id'].'&screen=ally&mode=overview');
				exit;
				} else {
				$text_ally_wew_bb = $_POST['message'];
				$compiled_msg = $bb_interpreter->compile_bb_code($_POST['message'],$user['id']);
				$tpl->assign('previews',$bb_interpreter->load_bb($compiled_msg,$village['id']));
				}
			}
		} else {
		$error = 'B³¹d hkey!';
		}
	}
	
if (!isset($text_ally_wew_bb)) {
	$bb_txt_wew = entparse(sql("SELECT `intern_text_bb` FROM `ally` WHERE `id` = '".$user['ally']."'","array"));
	$tpl->assign('tekst_wew_bb',$bb_txt_wew);
	} else {
	$tpl->assign('tekst_wew_bb',$text_ally_wew_bb);
	}
	

$text_wew = sql("SELECT `intern_text` FROM `ally` WHERE `id` = '".$user['ally']."'","array");
$ce4 = Array("Wendet+euch+bei+Fragen+an+","%0A%0ADieser+Text+kann+von+der+Stammesf%FChrung+ge%E4ndert+werden.");
$cu_ce4 = Array("Jeœli masz pytanie, skieruj siê do ","<br/><br/><i>Ten tekst mog¹ zmieniæ administratorzy plemienia.</i>");
$text_wew = str_replace($ce4,$cu_ce4,$text_wew);
$tpl->assign('tekst_wew',$bb_interpreter->load_bb($text_wew,$village['id']));
	
eaccelerator_load('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');
?>