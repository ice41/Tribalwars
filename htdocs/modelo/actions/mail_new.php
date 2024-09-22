<?php
// Sicherheits Ausführungscheck:
if ($ACTIONS_MASSIVKEY_HIGHAAASSDD!='sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL') {
	die("Ação - execução executiva!");
}

$inputs = array();	// Eingaben in den Federn.

// Vorschau anzeigen?
$preview = false;

// Nachricht senden:
if(isset($_GET['action']) && $_GET['action']=='send') {
	if (@$session['hkey']!=$_GET['h']) {
		$error = "Invalid hkey!";
	}
	
	// Betreff mind. 2 Zeichen:
	if (empty($error) && strlen(@$_POST['subject'])<2) {
		$error = $lang->grab("error", "subj_min");
	}
	
	// Text mind. 3 Zeichen:
	if (empty($error) && strlen(@$_POST['text'])<3) {
		$error = $lang->grab("error", "text_min");
	}	
	
	// Text max. 5000 Zeichen
	if (empty($error) && strlen(@$_POST['text'])>5000) {
		$error = $lang->grab("error", "text_max");
	}
	
	if (!empty($_GET['answer_mail_id']) && $_GET['answer_mail_id']!=0) {
		$result = $db->query("select to_id from mail_in where id=".parse($_GET['answer_mail_id'])."");
		$mail=$db->Fetch($result);
	
		// Darf Nachricht gelesen werden?
		if ($user['id']!=$mail['to_id']) {
			die("Você não pode...");
		}
	}
	
	// Empfänger überprüfen:
	if (!isset($_POST['to'])) {
		$_POST['to'] = "";
	}
	$tos = explode(";",$_POST['to']);
	$count = 0;
	$send_to = array();
	foreach($tos AS $to) {
		if (!empty($to)) {
			$count++;
			// Schauen, ob Empfänger existiert:
			$to = parse($to);
			$res = $db->query("SELECT count(id) AS count,id,username from users where username='".$to."' GROUP BY id,username");
			$count_user = $db->Fetch($res);
			if ($count_user['count']==0) {

				$error = sprintf($lang->grab("error", "receiver_not_found"), entparse($to));
			}
			else
			{
				// Schauen ob Empfänger den Absender nicht blokiert hat:
				$res_bl = $db->query("SELECT COUNT(id) AS count from mail_block where userid=".$count_user['id']." AND blocked_id=".$user['id']."");
				$check_bl = $db->Fetch($res_bl);
				
				if (empty($error) && $check_bl['count']==1) {
					$error = sprintf("Jesteś zablokowany przez tego użytkownika!", entparse($to));
				}
				else
				{
					if (!in_array($count_user['username'].";".$count_user['id'],$send_to)) {
						$send_to[] = $count_user['username'].";".$count_user['id'];
					}
				}
			}
		}
	}
	if (empty($error) && $count<1) {
		$error = $lang->grab("error", "receiver_max");
	}

	// Wenn alles passt, dann Nachricht verschicken:
	if (isset($_POST['send'])) {
		if (empty($error)) {
			$subject = parse($_POST['subject']);
			$text = $bb_interpreter->compile_bb_code($_POST['text'],$user['id']);
			
			foreach($send_to AS $userdata) {
				$to_user = explode(";",$userdata);
        
				send_mail($user['id'],$user['username'],$to_user[1],$to_user[0],$subject,$text,true);
			}
			// Mail updaten, dass sie beantortet wurde:
			if (!empty($_GET['answer_mail_id']) && $_GET['answer_mail_id']!=0) {
				$db->query("UPDATE mail_in set is_answered=1 where id=".((int)parse($_GET['answer_mail_id']))."");
			}
			// Zum Posteingang:
			HEADER("LOCATION: game.php?village=".$village['id']."&screen=mail");
		}
	}
	
	// Wenn alles passt, dann Vorschau anzeigen:
	if (isset($_POST['preview'])) {
		if (empty($error)) {
			$preview = true;
			$preview_message = nl2br(parse($_POST['text']));
			$tpl->assign("preview_message",$preview_message);
		}
	}
	
	$inputs['to'] = htmlspecialchars($_POST['to']);
	$inputs['subject'] = htmlspecialchars($_POST['subject']);
	$inputs['text'] = "\n".parse($_POST['text']);
}

if (!isset($_GET['action']) && isset($_GET['reply'])) {
	// Auslesen:
	$reply = parse((int)@$_GET['reply']);
	$error = "";
	
	// Nachricht auslesen:
	// Posteingang:
	if (empty($_GET['type'])) {
		$result = $db->query("select to_id,subject,from_username,text from mail_in where id=".$reply."");
		$mail=$db->Fetch($result);
	
		// Darf Nachricht gelesen werden?
		if ($user['id']!=$mail['to_id']) {
			$inputs['to'] = "Keine Berechtigung";
			$inputs['subject'] = "Keine Berechtigung";
			$inputs['text'] = "--- Keine Berechtigung ---";
		}
		else
		{
			if (isset($_GET['forward'])) {
				$inputs['to'] = '';
				$inputs['subject'] = "".entparse($mail['subject']);
			}
			else
			{
				$inputs['to'] = entparse($mail['from_username']);
				$inputs['subject'] = "".entparse($mail['subject']);
			}
			
			
		}
	}
	elseif ($_GET['type']=='out') 	// Saída da postagem:
	{
		$result = $db->query("select from_id,subject,to_username,from_username,text from mail_out where id=".$reply."");
		$mail=$db->Fetch($result);
	
		//A mensagem pode ser lida?
		if ($user['id']!=$mail['from_id']) {
			$inputs['to'] = "Keine Berechtigung";
			$inputs['subject'] = "Keine Berechtigung";
			$inputs['text'] = "--- Keine Berechtigung ---";
		}
		else
		{
			if (isset($_GET['forward'])) {
				$inputs['to'] = '';
				$inputs['subject'] = "Fw: ".entparse($mail['subject']);
			}
			else
			{
				$inputs['to'] = entparse($mail['to_username']);
				$inputs['subject'] = "Re: ".entparse($mail['subject']);
			}
			$inputs['text'] = "\n\n\n".entparse($mail['from_username'])." schrieb:\n-->\n".nl2br(entparse($mail['text']));
			
		}	
	}
	elseif ($_GET['type']=='arch') 	// Archiv:
	{
		$result = $db->query("select type,owner,from_id,subject,to_username,from_username,text from mail_archiv where id=".$reply."");
		$mail=$db->Fetch($result);
	
		// Darf Nachricht gelesen werden?
		if ($user['id']!=$mail['owner']) {
			$inputs['to'] = "Keine Berechtigung";
			$inputs['subject'] = "Keine Berechtigung";
			$inputs['text'] = "--- Keine Berechtigung ---";
		}
		else
		{
			if (isset($_GET['forward'])) {
				$inputs['to'] = '';
				$inputs['subject'] = "Fw: ".entparse($mail['subject']);
				$inputs['text'] = "\n\n\n".entparse($mail['from_username'])." schrieb:\n-->\n".nl2br(entparse($mail['text']));
			}
			else
			{
				if ($mail['type']=='in') {
					$inputs['to'] = entparse($mail['from_username']);
					$inputs['text'] = "\n\n\n".entparse($mail['from_username'])." schrieb:\n-->\n".nl2br(entparse($mail['text']));
				}
				else
				{
					$inputs['to'] = entparse($mail['to_username']);
					$inputs['text'] = "\n\n\n".entparse($mail['to_username'])." schrieb:\n-->\n".nl2br(entparse($mail['text']));
				}
				$inputs['subject'] = "Re: ".entparse($mail['subject']);
			}
			
		}	
	}
}

if (isset($_GET['player'])) {
	$res = $db->query("SELECT username from users where id='".((int)parse(@$_GET['player']))."'");
	$row = $db->Fetch($res);

	$inputs['to'] = entparse($row['username']);
}

if(!empty($inputs['text'])) {
	$inputs['text'] = ereg_replace("<br />","", $inputs['text']);
}

$tpl->assign("error",@$error);
$tpl->assign("view",@(int)$_GET['reply']);
$tpl->assign("inputs",@$inputs);
$tpl->assign("preview",$preview);
?>