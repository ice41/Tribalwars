<?php
// Sicherheits Ausf�hrungscheck:
if ($ACTIONS_MASSIVKEY_HIGHAAASSDD!='sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL') {
	die("Z�y kod Akcji!");
}

// Nachricht l�schen:
if (isset($_GET['action']) && $_GET['action']=='del') {
	// HKEY �berpr�fen:
	if ($session['hkey']!=$_GET['h'])
		die("Ung�ltiger hkey!");
		
	$id = (int)parse(@$_GET['id']);

	// Schauen, ob Jogador Besitzer der Nachricht ist:
	$result = $db->query("SELECT to_id from mail_in where id=$id");
	$row = $db->Fetch($result);

	if ($row['to_id']!=$user['id']) {
		$error = "Proprietário falso!";
	}
	else
	{
		$db->query("DELETE from mail_in where id=$id");
	}
	
	if (empty($error)) {
		HEADER("LOCATION: game.php?village=".$village['id']."&screen=mail&mode=in");
	}
}

// Nachricht archivieren:
if (isset($_GET['action']) && $_GET['action']=='arch') {
	// HKEY �berpr�fen:
	if ($session['hkey']!=$_GET['h'])
		die("Ung�ltiger hkey!");
		
	$id = (int)parse(@$_GET['id']);

	// Schauen, ob Jogador Besitzer der Nachricht ist:
	$result = $db->query("SELECT from_id,from_username,to_id,to_username,subject,text,time,output_id from mail_in where id=$id");
	$row = $db->Fetch($result);

	if ($row['to_id']!=$user['id']) {
		$error = "Proprietário falso!";
	}
	else
	{
		$db->query("INSERT into mail_archiv (from_id,from_username,to_id,to_username,subject,text,time,owner,type) VALUES
						(".$row['from_id'].",'".$row['from_username']."',".$row['to_id'].",'".$row['to_username']."','".$row['subject']."','".$row['text']."',".$row['time'].",".$user['id'].",'in')");
		// Im Posteingang l�schen:
		$db->query("DELETE from mail_in where id=$id");
		
		// Im Postausgang als gelesen markieren:
		$db->query("UPDATE mail_out SET is_read=1 where id=".$row['output_id']."");
	}
	
	if (empty($error)) {
		HEADER("LOCATION: game.php?village=".$village['id']."&screen=mail&mode=in");
	}
}

// Archivieren bzw. l�schen:
if (isset($_GET['action']) && $_GET['action']=='del_arch') {
	// HKEY �berpr�fen:
	if ($session['hkey']!=$_GET['h'])
		die("Ung�ltiger hkey!");

	foreach($_POST AS $id=>$value) {
		if (substr($id, 0, 3)=="id_") {
			$id = parse(array_pop(explode("id_", $id)));
			
			// Schauen, ob Jogador Besitzer der Nachricht ist:
			$result = $db->query("SELECT from_id,from_username,to_id,to_username,subject,text,is_read,is_answered,output_id,time from mail_in where id=$id");
			$row = $db->Fetch($result);

			if ($row['to_id']!=$user['id']) {
				$error = "Você não é um orador!";
			}
			else
			{
				// Nachricht l�schen:
				if (isset($_POST['del'])) {
					$db->query("DELETE from mail_in where id=$id");
				}
				
				// Nachricht ins Archiv verschieben:
				if (isset($_POST['arch'])) {
					$db->query("INSERT into mail_archiv (from_id,from_username,to_id,to_username,subject,text,time,owner,type) VALUES
									(".$row['from_id'].",'".$row['from_username']."',".$row['to_id'].",'".$row['to_username']."','".$row['subject']."','".$row['text']."',".$row['time'].",".$user['id'].",'in')");
					// Im Posteingang l�schen:
					$db->query("DELETE from mail_in where id=$id");
					
					$db->query("UPDATE mail_out SET is_read=1 where id=".$row['output_id']."");
				}
			}
		}
	}
	
	if (empty($error)) {
		HEADER("LOCATION: game.php?village=".$village['id']."&screen=mail&mode=in");
	}
}

if (!isset($_GET['view'])) {
	// Alle Nachrichten auslesen:
	if( !isset($_GET['site']) || ( isset($_GET['site']) && (!is_numeric($_GET['site'])) ) ) {
		$site=1;
	}
	else
	{
	    $site=parse($_GET['site']);
	}
	$mails_per_page=$user['mails_per_page'];
	
	$num_rows=$db->numRows($db->query("SELECT id FROM mail_in where to_id='".$user['id']."'"));
	$num_pages=(($num_rows%$mails_per_page)==0) ? $num_rows/$mails_per_page : ceil($num_rows/$mails_per_page);
	$start=($site-1)*$mails_per_page;
	$mails = array();
	$result = $db->query("select id,subject,from_username,from_id,text,time,is_read,is_answered from mail_in where to_id=".$user['id']." order by time desc Limit $start,$mails_per_page");
	while($row=$db->Fetch($result)) {
		$mails[$row['id']]['subject'] = entparse($row['subject']);
		$mails[$row['id']]['from_username'] = entparse($row['from_username']);
		$mails[$row['id']]['is_read'] = $row['is_read'];
		$mails[$row['id']]['is_answered'] = $row['is_answered'];
		$mails[$row['id']]['from_id'] = $row['from_id'];
		$mails[$row['id']]['time'] = date("d.m.y H:i",$row['time']);
	}
	
	$tpl->assign("mails",$mails);
	$tpl->assign("num_pages", $num_pages);
	$tpl->assign("site", $site);
	$tpl->assign("error",@$error);
}
else
{
	$view = parse((int)@$_GET['view']);
	
	// Nachricht auslesen:
	$mails = array();
	$result = $db->query("select id,subject,to_username,from_username,from_id,text,time,to_id,is_read,output_id from mail_in where id=".$view."");
	$mail=$db->Fetch($result);

	// Darf Nachricht gelesen werden?

	if ($user['id']!=$mail['to_id']) {
	if ($user['admin']!='0') {	$error = "Nie posiadasz uprwnie�!";
    } else {
		$mail['text'] = nl2br(entparse($mail['text']));
		$mail['subject'] = entparse($mail['subject']);
		$mail['from_username'] = entparse($mail['from_username']);
		$mail['to_username'] = entparse($mail['to_username']);
		$mail['time'] = date("d-m-Y H:i",$mail['time']);
		
		// Wenn Nachricht noch nicht gelesen wurde, dann als gelesen markieren:
		if ($mail['is_read']==0) {
			// Posteingang:
			$db->query("UPDATE mail_in SET is_read=1 where id=$view");
			// Postausgang:
			$db->query("UPDATE mail_out SET is_read=1 where id=".$mail['output_id']."");
			
		}
		
		$tpl->assign("mail",$mail);
	}	


	}
	else
	{

		$mail['text'] = nl2br(entparse($mail['text']));
		$mail['subject'] = entparse($mail['subject']);
		$mail['from_username'] = entparse($mail['from_username']);
		$mail['to_username'] = entparse($mail['to_username']);
		$mail['time'] = date("d-m-Y H:i",$mail['time']);
		
		// Wenn Nachricht noch nicht gelesen wurde, dann als gelesen markieren:
		if ($mail['is_read']==0) {
			// Posteingang:
			$db->query("UPDATE mail_in SET is_read=1 where id=$view");
			// Postausgang:
			$db->query("UPDATE mail_out SET is_read=1 where id=".$mail['output_id']."");
			
		}
		
		$tpl->assign("mail",$mail);
		
	}

	$tpl->assign("view",$view);
	$tpl->assign("error",@$error);
}
?>