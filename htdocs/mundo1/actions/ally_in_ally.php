<?php
if ( $ACTIONS_MASSIVKEY_HIGHAAASSDD != "sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL" )
{
    exit( );
}

if (empty($_GET['mode'])) {
$_GET['mode'] == 'overview';
}
$links['Übersicht'] = "overview";
$links['Profil'] = "Perfile";
$links['Mitglieder'] = "members";
if ( $user['ally_lead'] == 1 || $user['ally_found'] == 1 || $user['ally_invite'] == 1 )
{
    $links['Einladungen'] = "invite";
}
if ( $user['ally_lead'] == 1 || $user['ally_found'] == 1 || $user['diplomacy'] == 1 )
{
    $links['Ustawienia'] = "properties";
}
if ( $user['ally_mass_mail'] == 1 )
{
    $links['Eigenschaften'] = "mass_mail";
	}
$result = mysql_query( "SELECT * from ally where id=".$user['ally']."" );
$ally = mysql_fetch_assoc( $result );
$ally['edit_intern_text'] = ( $ally['intern_text'] );
$ally['intern_text'] = nl2br( ( $ally['intern_text'] ) );
$ally['edit_description'] = ( $ally['description'] );
$ally['description'] = nl2br( ( $ally['description'] ) );
$ally['name'] = ( $ally['name'] );
$ally['short'] = ( $ally['short'] );
$ally['homepage'] = ( $ally['homepage'] );
$ally['irc'] = ( $ally['irc'] );
if (in_array($_GET['mode'],$links ))
{
    include( "ally_in_ally_".$_GET['mode'].".php" );
}
if ( $_GET['mode'] == "rights" )
{
    include( "ally_in_ally_rights.php" );
}
$tpl->assign("mode",$_GET['mode']);
$tpl->assign("links",$links);
$tpl->assign("ally",$ally);
$tpl->assign("error",$error);


if ($_GET['mode'] == 'intro_igm') {
	require ('actions/ally_in_ally_intro_igm.php');
	}
if ($_GET['mode'] == 'kontrakty') {
	require ('actions/ally_in_ally_kontrakty.php');
	}
if ($_GET['mode'] == 'reservations') {
	require ('actions/ally_in_ally_reservations.php');
	}
	

if ($_GET['mode'] == 'forum') {
	$base_link = "game.php?village=".$village['id']."&screen=ally&mode=forum";
	require ('actions/ally_in_ally_forum.php');
	}




?>