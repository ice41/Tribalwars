<?php // Sicherheits Ausführungscheck:
if ($ACTIONS_MASSIVKEY_HIGHAAASSDD!='sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL') {
	die("Ação - execução executiva!");
}

// Absender blockieren:
if (isset($_GET['action']) && $_GET['action']=='block_name') {
	// HKEY überprüfen:
	if ($session['hkey']!=$_GET['h'])
		die("Caminhada inválida!");

	// spieler auslesen:
	$player = parse(@$_POST['tribe_name']);
	
	$result = $db->query("SELECT COUNT(id) AS count,username,id from users where username='".$player."' GROUP BY username,id");
	$row = $db->Fetch($result);
	
	if (empty($error) && $row['count']==0) {
		$error = $lang->grab("error", "player_not_found");
	}
	
	if (empty($error) && $row['id']==$user['id']) {
		$error = $lang->grab("error", "block_own");
	}
	
	// Schauen, ob Jogador noch nicht blockiert wurde:
	if (empty($error)) {
		$result = $db->query("SELECT COUNT(id)AS count from mail_block where userid=".$user['id']." AND blocked_id=".$row['id']."");
		$check = $db->Fetch($result);
		if ($check['count']==1) {
			$error = $lang->grab("error", "already_blocked");
		}
	}
	
	// Wenn kein Fehler aufgetreten ist, dann User hinzufügen:
	if (empty($error)) {
		$db->query("INSERT into mail_block (userid,blocked_id,blocked_name) VALUES (".$user['id'].",".$row['id'].",'".$row['username']."')");
		HEADER("LOCATION: game.php?village=".$village['id']."&screen=mail&mode=block");
	}
}

// Absender blockieren (ID):
if (isset($_GET['action']) && $_GET['action']=='block_id') {
	// HKEY überprüfen:
	if ($session['hkey']!=$_GET['h'])
		die("Caminhada inválida!");

	// spieler auslesen:
	$id = (int)parse(@$_GET['id']);
	
	$result = $db->query("SELECT COUNT(id) AS count,username from users where id='".$id."' GROUP BY username");
	$row = $db->Fetch($result);
	
	if (empty($error) && $row['count']==0) {
		$error = $lang->grab("error", "player_not_found");;
	}
	
	if (empty($error) && $id==$user['id']) {
		$error = $lang->grab("error", "block_own");
	}
	
	// Schauen, ob Jogador noch nicht blockiert wurde:
	if (empty($error)) {
		$result = $db->query("SELECT COUNT(id)AS count from mail_block where userid=".$user['id']." AND blocked_id=".$id."");
		$check = $db->Fetch($result);
		if ($check['count']==1) {
			$error = $lang->grab("error", "already_blocked");
		}
	}
	
	// Wenn kein Fehler aufgetreten ist, dann User hinzufügen:
	if (empty($error)) {
		$db->query("INSERT into mail_block (userid,blocked_id,blocked_name) VALUES (".$user['id'].",".$id.",'".$row['username']."')");
		HEADER("LOCATION: game.php?village=".$village['id']."&screen=mail&mode=block");
	}
}

// Absender entsperren:
if (isset($_GET['action']) && $_GET['action']=='unblock') {
	// HKEY überprüfen:
	if ($session['hkey']!=$_GET['h'])
		die("Caminhada inválida!");
		
	// spieler auslesen:
	$id = (int)parse(@$_GET['from_id']);
	$db->query("DELETE from mail_block where userid=".$user['id']." AND blocked_id=".$id."");
	HEADER("LOCATION: game.php?village=".$village['id']."&screen=mail&mode=block");
}


// Blockierte Absender auslesen
$blocked = array();
$result = $db->query("SELECT id,blocked_id,blocked_name from mail_block where userid=".$user['id']."");
while($row=$db->Fetch($result)) {
	$blocked[$row['id']]['blocked_id'] = $row['blocked_id'];
	$blocked[$row['id']]['blocked_name'] = entparse($row['blocked_name']);
}


$tpl->assign("blocked",$blocked);
$tpl->assign("error",@$error); ?>