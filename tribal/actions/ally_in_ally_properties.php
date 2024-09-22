<?php 
/***************************************
* Za³adowaæ dodatkowe funkcje php:     *
***************************************/
require ('lib/command.php');

/***************************************
* Start klasy bb_interpreter():        *
***************************************/
$bb_interpreter = new bb_interpreter($cl_builds,$cl_units,$pl);

/***************************************
* Akcja  rozwi¹¿  istniej¹cy  sojusz:  *
***************************************/

if ($_GET['action'] === 'close_ally') {
	if ($_GET['h'] == $session['hkey'] && $user['ally_found']) {
		if ($config['close_ally']) {
		
			//Zdefiniuj wa¿ne zmienne:
			$time = date("U");
			$title = "Twoje plemiê zosta³o rozwi¹zane przez " . parse($user["username"]);
			$from_uid = $user['id'];
			$from_uname = parse($user["username"]);
			
			//Pobierz tablicê cz³onków z twojego plemienia:
			$sql = mysql_query("SELECT `id` FROM `users` WHERE `ally` = '".$user['ally']."'");
			while ($id = mysql_fetch_array($sql)) {
				//Dodaj raporty dla graczy o tym, ¿e plemiê zosta³o rozwi¹zane:
				mysql_query ("INSERT into reports (
					title,time,type,in_group,receiver_userid,from_username,from_user
					) VALUES (
					'$title','$time','ally_clear','other','".$id[0]."','$from_uname','$from_uid'
					)");
					
				//Ustaw sojusz u gracza z rozwi¹zanego sojuszu na -1
				mysql_query("UPDATE `users` SET `ally` = '-1',`ally_found` = '0',`ally_lead` = '0',`ally_invite` = '0',`ally_diplomacy` = '0',`ally_mass_mail` = '0',`ally_mod_forum` = '0',`ally_forum_switch` = '0',`ally_forum_trust` = '0',`ally_titel` = '' WHERE `id` = '".$id[0]."'");
				
				mysql_query("UPDATE `users` SET `new_report` = '1' WHERE `id` = '".$id[0]."'");
				}
				
			//Usuñ zaproszenia do sojuszu docelowego:
			mysql_query("DELETE FROM `ally_invites` WHERE `from_ally` = '".$user['ally']."'");
				
			//Usuñ eventy z sojuszu docelowego:
			mysql_query("DELETE FROM `ally_events` WHERE `ally` = '".$user['ally']."'");
			
			//Usuñ sojusz:
			mysql_query("DELETE FROM `ally` WHERE `id` = '".$user['ally']."'");
			
			//Usuñ rezerwacje:
			mysql_query("DELETE FROM `rezerwacje` WHERE `od_plemienia` = '".$user['ally']."'");
			mysql_query("DELETE FROM `rezerwacje_log` WHERE `plemie` = '".$user['ally']."'");
			
			//Usuñ dzielenie rezerwacji:
			mysql_query("DELETE FROM `dzielenie_rezerwacji` WHERE `od_plemienia` = '".$user['ally']."'");
			mysql_query("DELETE FROM `dzielenie_rezerwacji` WHERE `do_plemienia` = '".$user['ally']."'");
			
			//Usuñ forum sojuszu:
			$sql = mysql_query("SELECT id FROM `fora` WHERE `plemie` = '".$user['ally']."'");
			while ($id = mysql_fetch_array($sql)) {
				$fid = $id[0];
				mysql_query("DELETE FROM `fora` WHERE `id` = '$fid'");
				mysql_query("DELETE FROM `tematy` WHERE `forum` = '$fid'");
				mysql_query("DELETE FROM `posty` WHERE `forum` = '$fid'");
				mysql_query("DELETE FROM `czytanie` WHERE `fid` = '$fid'");
				mysql_query("DELETE FROM `f_ankiety` WHERE `fid` = '$fid'");
				}
				
			//Usuñ kontrakty:
			mysql_query("DELETE FROM `kontrakty` WHERE `od_plemienia` = '".$user['ally']."'");
			mysql_query("DELETE FROM `kontrakty` WHERE `do_plemienia` = '".$user['ally']."'");
			
			//Reload rankingów:
			reload_all_rangs();
			
			header('location: game.php?village='.$village['id'].'&screen=ally&mode=properties');
			exit;
			} else {
			$error = 'Opcja rozwi¹zania sojuszu zosta³a wy³¹czona';
			}
		} else {
		$error = 'B³¹d wykonania akcji.';
		}
	}
	
if ($_GET['action'] === 'close') {
	if ($_GET['h'] == $session['hkey'] && $user['ally_found']) {
		header('location: game.php?village='.$village['id'].'&screen=ally&mode=properties');
		exit;
		} else {
		$error = 'B³¹d wykonania akcji.';
		}
	}
	
/***************************************
* Akcja zmieñ zewnêtrzny opis sojuszu: *
***************************************/

if ($_GET['action'] === 'change_description' && count($_POST) > 0) {
	if ($_GET['h'] == $session['hkey'] && $user['ally_diplomacy']) {
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
				
				mysql_query("UPDATE `ally` SET `description` = '$compiled_msg' , `description_bb` = '".$_POST['message']."' WHERE `id` = '".$user['ally']."'");
				
				header('location: game.php?village='.$village['id'].'&screen=ally&mode=properties');
				exit;
				} else {
				$ally_desc_bb = $_POST['message'];
				$compiled_msg = $bb_interpreter->compile_bb_code($_POST['message'],$user['id']);
				$tpl->assign('previews',$bb_interpreter->load_bb($compiled_msg,$village['id']));
				}
			}
		} else {
		$error = 'B³¹d wykonania akcji.';
		}
	}

if ($_GET['action'] === 'change_desc' && count($_POST) > 0) {
	if ($_GET['h'] == $session['hkey'] && $user['ally_diplomacy']) {
		header('location: game.php?village='.$village['id'].'&screen=ally&mode=properties');
		exit;
		} else {
		$error = 'B³¹d wykonania akcji.';
		}
	}
	
if (!isset($ally_desc_bb)) {
	$ally_desc_txt_bb = entparse(sql("SELECT `description_bb` FROM `ally` WHERE `id` = '".$user['ally']."'","array"));
	$tpl->assign('ally_desc_bb',$ally_desc_txt_bb);
	} else {
	$tpl->assign('ally_desc_bb',$ally_desc_bb);
	}
	

$ally_desc = sql("SELECT `description` FROM `ally` WHERE `id` = '".$user['ally']."'","array");
$ce4 = Array("+wurde+von+","+gegr%FCndet%0AWendet+euch+bei+Fragen+an+","%0A%0ADieser+Text+kann+von+den+Diplomaten+des+Stammes+ge%E4ndert+werden.");
$cu_ce4 = Array(" zosta³o za³o¿one przez ",". Jeœli masz pytanie, skieruj siê do ","<br/><br/><i>Ten tekst mog¹ zmieniæ dyplomaci plemienia.<i>");
$ally_desc = str_replace($ce4,$cu_ce4,$ally_desc);
$tpl->assign('ally_desc',$bb_interpreter->load_bb($ally_desc,$village['id']));

eaccelerator_load('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');
?>