<?php // Sicherheits Ausführungscheck:
if ($ACTIONS_MASSIVKEY_HIGHAAASSDD!='sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL') {
	die("Ação - execução executiva!");
}

// Nachricht löschen:
if (isset($_GET['action']) && $_GET['action']=='del') {
	// HKEY überprüfen:
	if ($session['hkey']!=$_GET['h'])
		die("Caminhada inválida!");
		
	$id = (int)parse(@$_GET['id']);

	// Schauen, ob Jogador Besitzer der Nachricht ist:
	$result = $db->query("SELECT owner from mail_archiv where id=$id");
	$row = $db->Fetch($result);

	if ($row['owner']!=$user['id']) {
		$error = $lang->grab("error", "wrong_owner");
	}
	else
	{
		$db->query("DELETE from mail_archiv where id=$id");
	}
	
	if (empty($error)) {
		HEADER("LOCATION: game.php?village=".$village['id']."&screen=mail&mode=arch");
	}
}

// Nachrichten löschen:
if (isset($_GET['action']) && $_GET['action']=='del_arch') {
	// HKEY überprüfen:
	if ($session['hkey']!=$_GET['h'])
		die("Caminhada inválida!");

	foreach($_POST AS $id=>$value) {
		if (substr($id, 0, 3)=="id_") {
			$id = parse(array_pop(explode("id_", $id)));
			
			// Schauen, ob Jogador Besitzer der Nachricht ist:
			$result = $db->query("SELECT from_id,from_username,to_id,to_username,subject,text,time,owner from mail_archiv where id=$id");
			$row = $db->Fetch($result);

			if ($row['owner']!=$user['id']) {
				$error = $lang->grab("error", "wrong_owner");
			}
			else
			{
				// Nachricht löschen:
				if (isset($_POST['del'])) {
					$db->query("DELETE from mail_archiv where id=$id");
				}
			}
		}
	}
	
	if (empty($error)) {
		HEADER("LOCATION: game.php?village=".$village['id']."&screen=mail&mode=arch");
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
	
	$num_rows=$db->numRows($db->query("SELECT id FROM mail_archiv where owner='".$user['id']."'"));

	$num_pages=(($num_rows%$mails_per_page)==0) ? $num_rows/$mails_per_page : ceil($num_rows/$mails_per_page);
	$start=($site-1)*$mails_per_page;
	$mails = array();
	$result = $db->query("select id,subject,to_username,to_id,from_username,from_id,text,time from mail_archiv where owner=".$user['id']." order by time desc Limit $start,$mails_per_page");
	while($row=$db->Fetch($result)) {
		$mails[$row['id']]['subject'] = entparse($row['subject']);
		$mails[$row['id']]['to_username'] = entparse($row['to_username']);
		$mails[$row['id']]['to_id'] = $row['to_id'];
		$mails[$row['id']]['from_username'] = entparse($row['from_username']);
		$mails[$row['id']]['from_id'] = $row['from_id'];
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
	$result = $db->query("select owner,id,subject,to_username,from_username,from_id,text,time,to_id from mail_archiv where id=".$view."");
	$mail=$db->Fetch($result);

	// Darf Nachricht gelesen werden?
	if ($user['id']!=$mail['owner']) {
		$error = $lang->grab("error", "not_allowed");
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