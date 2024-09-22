<?php // Sicherheits Ausführungscheck:
if ($ACTIONS_MASSIVKEY_HIGHAAASSDD!='sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL') {
	die("Aktions - Ausführung EXEC!");
}

// Nachricht löschen:
if (isset($_GET['action']) && $_GET['action']=='del') {
	// HKEY überprüfen:
	if ($session['hkey']!=$_GET['h'])
		die("Caminhada inválida!");
		
	$id = (int)parse(@$_GET['id']);

	// Schauen, ob Jogador Besitzer der Nachricht ist:
	$result = $db->query("SELECT from_id from mail_out where id=$id");
	$row = $db->Fetch($result);

	if ($row['from_id']!=$user['id']) {
		$error = "Proprietário falso!";
	}
	else
	{
		$db->query("DELETE from mail_out where id=$id");
	}
	
	if (empty($error)) {
		HEADER("LOCATION: game.php?village=".$village['id']."&screen=mail&mode=out");
	}
}

// Nachricht archivieren:
if (isset($_GET['action']) && $_GET['action']=='arch') {
	// HKEY überprüfen:
	if ($session['hkey']!=$_GET['h'])
		die("Caminhada inválida!");
		
	$id = (int)parse(@$_GET['id']);

	// Schauen, ob Jogador Besitzer der Nachricht ist:
	$result = $db->query("SELECT from_id,from_username,to_id,to_username,subject,text,time from mail_out where id=$id");
	$row = $db->Fetch($result);

	if ($row['from_id']!=$user['id']) {
		$error = "Proprietário falso!";
	}
	else
	{
		$db->query("INSERT into mail_archiv (from_id,from_username,to_id,to_username,subject,text,time,owner,type) VALUES
						(".$row['from_id'].",'".$row['from_username']."',".$row['to_id'].",'".$row['to_username']."','".$row['subject']."','".$row['text']."',".$row['time'].",".$user['id'].",'out')");
		// Im Posteingang löschen:
		$db->query("DELETE from mail_out where id=$id");
	}
	
	if (empty($error)) {
		HEADER("LOCATION: game.php?village=".$village['id']."&screen=mail&mode=out");
	}
}

// Archivieren bzw. löschen:
if (isset($_GET['action']) && $_GET['action']=='del_arch') {
	// HKEY überprüfen:
	if ($session['hkey']!=$_GET['h'])
		die("Caminhada inválida!");

	foreach($_POST AS $id=>$value) {
		if (substr($id, 0, 3)=="id_") {
			$id = parse(array_pop(explode("id_", $id)));
			
			// Schauen, ob Jogador Besitzer der Nachricht ist:
			$result = $db->query("SELECT from_id,from_username,to_id,to_username,subject,text,time from mail_out where id=$id");
			$row = $db->Fetch($result);

			if ($row['from_id']!=$user['id']) {
				$error = "Proprietário falso!";
			}
			else
			{
				// Nachricht löschen:
				if (isset($_POST['del'])) {
					$db->query("DELETE from mail_out where id=$id");
				}
				
				// Nachricht ins Archiv verschieben:
				if (isset($_POST['arch'])) {
					$db->query("INSERT into mail_archiv (from_id,from_username,to_id,to_username,subject,text,time,owner,type) VALUES
									(".$row['from_id'].",'".$row['from_username']."',".$row['to_id'].",'".$row['to_username']."','".$row['subject']."','".$row['text']."',".$row['time'].",".$user['id'].",'out')");
					// Im Posteingang löschen:
					$db->query("DELETE from mail_out where id=$id");
				}
			}
		}
	}
	
	if (empty($error)) {
		HEADER("LOCATION: game.php?village=".$village['id']."&screen=mail&mode=out");
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
	$mails_per_page=12;
	
	$num_rows=$db->numRows($db->query("SELECT id FROM mail_out where from_id='".$user['id']."'"));

	$num_pages=(($num_rows%$mails_per_page)==0) ? $num_rows/$mails_per_page : ceil($num_rows/$mails_per_page);
	$start=($site-1)*$mails_per_page;
	$mails = array();
	$result = $db->query("select id,subject,to_username,to_id,text,time,is_read from mail_out where from_id=".$user['id']." order by time desc Limit $start,$mails_per_page");
	while($row=$db->Fetch($result)) {
		$mails[$row['id']]['subject'] = entparse($row['subject']);
		$mails[$row['id']]['to_username'] = entparse($row['to_username']);
		$mails[$row['id']]['is_read'] = $row['is_read'];
		$mails[$row['id']]['to_id'] = $row['to_id'];
		$mails[$row['id']]['time'] = date("j.n.y H:i",$row['time']);
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
	$result = $db->query("select id,subject,to_username,from_username,from_id,text,time,to_id,is_read from mail_out where id=".$view."");
	$mail=$db->Fetch($result);

	// Darf Nachricht gelesen werden?
	if ($user['id']!=$mail['from_id']) {
		$error = "Nenhuma autorização para ler esta mensagem!";
	}
	else
	{

		$mail['text'] = nl2br(entparse($mail['text']));
		$mail['subject'] = entparse($mail['subject']);
		$mail['from_username'] = entparse($mail['from_username']);
		$mail['to_username'] = entparse($mail['to_username']);
		$mail['time'] = date("j.n.y H:i",$mail['time']);
		
		$tpl->assign("mail",$mail);
		
	}

	$tpl->assign("view",$view);
	$tpl->assign("error",@$error);
} ?>