<?php
// Sicherheits Ausf�hrungscheck:
if ($ACTIONS_MASSIVKEY_HIGHAAASSDD!='sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL') {
	die("Aktions - Ausf�hrung EXEC!");
}

$columns = array('id','username','points','rang','ally','b_day','b_month','b_year','sex','home','image','personal_text');
$id = $_GET['id'];

  $result = $db->query("SELECT * FROM users WHERE id = $id");
  $info_user=$db->Fetch($result);

if (!$info_user) {
	die("<b>O jogador não existe!</b>");
}
$info_user['username'] = entparse(@$info_user['username']);

// Stamm auslesen:
$result = $db->query("SELECT short,id from ally where id='".@$info_user['ally']."'");
$info_ally = $db->Fetch($result);
$info_ally['short'] = entparse($info_ally['short']);

// Alle D�rfer auslesen:
$villages = array();
$result = $db->query("SELECT name,id,points,x,y from villages where userid=".$info_user['id']." order by name,id -- limit 100");
while($row=$db->Fetch($result)) {
	$villages[$row['id']]['name'] = entparse($row['name']);
	$villages[$row['id']]['x'] = $row['x'];
	$villages[$row['id']]['y'] = $row['y'];
	$villages[$row['id']]['points'] = $row['points'];
}

// Kann Jogador eingeladen werden?
if ($user['ally_invite']==1) {
	if ($info_user['ally']!=$user['ally']) {
		// Schauen, ob Jogador noch keine Einladung hat:
		$result = $db->query("SELECT count(id) AS count from ally_invites where to_userid='".$info_user['id']."' AND from_ally=".$user['ally']."");
		$invite_row = $db->Fetch($result);
		if ($invite_row['count']==1) {
			$can_invite = false;
		}
		else
		{
			$can_invite = true;
		}
	}
	else
	{
		$can_invite = false;
	}
}
else
{
	$can_invite = false;
}

// Alter
if ($info_user['b_day']>0) {
	$age = date("Y")-$info_user['b_year']-1;
	// Schauen, ob er schon Geburtstag hatte:
	if (date("n")>=$info_user['b_month']) {
		if (date("n")==$info_user['b_month']) {
			if (date("j")>=$info_user['b_day']) {
				$age++;
			}
		}
		else
		{
			$age++;
		}
	}
}
else
{
	$age = -1;
}

// Geschlecht
if ($info_user['sex']=='m') {
	$sex = $lang->grab("info_player", "Homem");
}
elseif ($info_user['sex']=='f') {
	$sex = $lang->grab("info_player", "Mulher");
}
else
{
	$sex = -1;
}

// Wohnort
$info_user['home'] = entparse(@$info_user['home']);

// Pers�nlicher Text
$info_user['personal_text'] = nl2br(entparse(@$info_user['personal_text']));


$tpl->assign("info_user",$info_user);
$tpl->assign("villages",$villages);
$tpl->assign("info_ally",$info_ally);
$tpl->assign("age",$age);
$tpl->assign("sex",$sex);
$tpl->assign("can_invite",$can_invite);
?>