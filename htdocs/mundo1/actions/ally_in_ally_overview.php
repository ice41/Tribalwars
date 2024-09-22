<?php 
//Start klasy bb_interpreter();
$bb_interpreter = new bb_interpreter($cl_builds,$cl_units,$pl);

if ($_GET['action'] === 'exit') {
	if ($_GET['h'] == $session['hkey']) {
		mysql_query("DELETE FROM `czytanie` WHERE `graczid` = '".$user['id']."'");
		mysql_query("DELETE FROM `rezerwacje` WHERE `od_gracza` = '".$user['id']."'");
		mysql_query("DELETE FROM `f_ankiety` WHERE `uid` = '".$user['id']."'");
		} else {
		$error = 'Erro hkey!';
		}
	}
	
if ($_GET['action'] === 'edit_intern') {
	if ($_GET['h'] == $session['hkey']) {
		header('location: game.php?village='.$village['id'].'&screen=ally&mode=overview');
		exit;
		} else {
		$error = 'Erro hkey!';
		}
	}
	
if ($_GET['action'] === 'edit_intern_text' && count($_POST) > 0 && $user['ally_found']) {
	if ($_GET['h'] == $session['hkey']) {
		$old_msg = $_POST['message'];
			
		//Walidacja stringu:
		$_POST['message'] = cmp_str($_POST['message'],0,5000);
			
		if ($_POST['message'] === 'LONG') {
			$error = 'O texto pode ter até 5.000 caracteres.';
			$text_ally_wew_bb = $old_msg;
			}
		elseif ($_POST['message'] === 'SPACES') {
			$error = 'O texto não pode consistir apenas em espaços.';
			} else {
			if (isset($_POST['edit'])) {			
				//Zinterpretuj bb codes:
				$compiled_msg = $bb_interpreter->compile_bb_code($_POST['message'],$user['id']);
				
				mysql_query("UPDATE `ally` SET `intern_text` = '$compiled_msg' , `intern_text_bb` = '".$_POST['message']."' WHERE `id` = '".$user['ally']."'");
$user_id = $user['id'];
$user_name = $user['username'];


$tekst = 'Gracz <a href="game.php?village=;&screen=info_player&id='.$user_id.'>'.$user_name.'</a> zmieni� tekst wewn�trzny!';
				mysql_query("INSERT INTO ally_events(time,ally,message) VALUES('".date("U")."','".$user['ally']."','".$tekst."')");				
				header('location: game.php?village='.$village['id'].'&screen=ally&mode=overview');
				exit;
				} else {
				$text_ally_wew_bb = $_POST['message'];
				$compiled_msg = $bb_interpreter->compile_bb_code($_POST['message'],$user['id']);
				$tpl->assign('previews',$bb_interpreter->load_bb($compiled_msg,$village['id']));
				}
			}
		} else {
		$error = 'Erro hkey!';
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
$cu_ce4 = Array("Se tiver uma pergunta, consulte ","<br/><br/><i>Este texto pode ser alterado pelos administradores da tribo.</i>");
$text_wew = str_replace($ce4,$cu_ce4,$text_wew);
$tpl->assign('tekst_wew',$bb_interpreter->load_bb($text_wew,$village['id']));
	





// Stamm verlassen
if (isset($_GET['action']) && $_GET['action']=='exit') {
	// Hash Key
	if (@$session['hkey']!=$_GET['h']) {
		$error = "Invalid hkey!";
	}
	$error=$cl_ally->leave();
	if(empty($error)) 
	{
		HEADER("LOCATION: game.php?village=".$village['id']."&screen=ally");
		exit;
	}
}

// Interne Ank?ndigung ?ndern:
if (isset($_GET['action']) && $_GET['action']=='edit_intern' && $user['ally_found']==1) {
	// Hash Key
	if (@$session['hkey']!=$_GET['h']) {
		$error = "Invalid hkey!";
	}
    if(($tmp_ret=$cl_ally->edit_intern($ally,$_POST['preview'], $_POST['intern'], $_POST['edit'], $error))===true) {	
    HEADER("LOCATION: game.php?village=".$village['id']."&screen=ally");
	exit;
    }else{
    	$preview=$tmp_ret['preview'];
    	$ally=$tmp_ret['ally'];
    }
}

// Ereignisse auslesen:
if( !isset($_GET['site']) || ( isset($_GET['site']) && (!is_numeric($_GET['site'])) ) ) {
	$site=1;
}
else
{
    $site=parse($_GET['site']);
}
$events_per_page=10;
$events=$cl_ally->fetch_events($site,$events_per_page,$user['ally']);

$tpl->assign("preview",@$preview);
$tpl->assign("num_pages",$num_pages);
$tpl->assign("events",$events);
$tpl->assign("site",$site);
?>

