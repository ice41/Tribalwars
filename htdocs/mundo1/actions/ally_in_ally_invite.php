<?php

if ( $_GET['action'] == "invite" ){
    new do_action($user['id']);
    $c = new do_action;

    $username = $_POST['name'];
    $result = mysql_query( "SELECT id,username,ally from users where username='$username'" );
	$row = mysql_fetch_array($result);
    if ( $user['ally'] == $row['ally'] )
    {
        $error = $lang['error']['player_in_ally']."lol";
    }
    if ( empty( $error ) && empty( $row['id'] ) )
    {
        $error = $lang['error']['not_player']."lol";
    }
    $result = mysql_query( "SELECT count(id) AS count from ally_invites where to_userid='".$row['id']."' AND from_ally=".$user['ally']."" );
    $invite_row = mysql_fetch_array( $result );	
    if ( 0 < $invite_row['count'] )
    {
        $error = $lang['error']['player_invited']."lol2";
    }
    if ( empty( $error ) )
    {
        mysql_query( "INSERT into ally_invites (time,from_ally,to_userid,to_username) VALUES (".time( ).",".$user['ally'].",".$row['id'].",'".$row['username']."')" );
        add_allyevent($user['ally'],"<a href=\"game.php?village=;&screen=info_player&id=".$row['id']."\">".( $row['username'] )."</a> foi convidado por <a href=\"game.php?village=;&screen=info_player&id=".$user['id']."\">".( $user['username'] )."</a>.");
        header( "LOCATION: game.php?village=".$village['id']."&screen=ally&mode=invite" );
        exit( );
    }
}   

if ($_GET['action'] == "invite_id" )
{

    $result = mysql_query( "SELECT id,username,ally from users where id='".( $id = ( integer )( $_GET['id'] ) )."'" );
    $row = mysql_Fetch_array( $result );
    if ( $user['ally'] == $row['ally'] )
    {
        $error = $lang['error']['player_in_ally'];
    }
    if ( empty( $error ) && empty( $row['id'] ) )
    {
        $error = $lang['error']['not_player'];
    }
    $result = mysql_query( "SELECT count(id) AS count from ally_invites where to_userid='".$row['id']."' AND from_ally=".$user['ally']."" );
    $invite_row = mysql_fetch_array( $result );
    if ( 0 < $invite_row['count'] )
    {
        $error = $lang['error']['player_invite'];
    }
    if ( empty( $error ) )
    {
        mysql_query( "INSERT into ally_invites (time,from_ally,to_userid,to_username) VALUES (".time( ).",".$user['ally'].",".$row['id'].",'".$row['username']."')" );
        add_allyevent($user['ally'],"<a href=\"game.php?village=;&screen=info_player&id=".$row['id']."\">".( $row['username'] )."</a> foi convidado por <a href=\"game.php?village=;&screen=info_player&id=".$user['id']."\">".( $user['username'] )."</a>.");
        header( "LOCATION: game.php?village=".$village['id']."&screen=ally&mode=invite" );
        exit( );
    }
    
}
if ( $_GET['action'] == "cancel_invitation" )
{
    new do_action( $user['id'] );
    $c = new do_action;
 
    $result = mysql_query( "SELECT from_ally,to_userid from ally_invites where id='".( $id = ( $_GET['id'] ) )."'" );
    $row = mysql_Fetch_array( $result );
    if ( empty( $error ) && $row['from_ally'] != $user['ally'] )
    {
        $error = $lang['error']['not_in_ally'];
    }
    if ( empty( $error ) )
    {
        mysql_query( "DELETE from ally_invites where id=".$id );

            mysql_query( $user['id'], $row['to_userid'], $user['ally'], $ally['name'] );
            $result = mysql_query( "SELECT * from users where id=".$row['to_userid']."" );
            $row = mysql_Fetch_array( $result );
        add_allyevent($user['ally'],"Convite do jogador <a href='game.php?village=;&screen=info_playerid=".$row['id']."\'>".( $row['username'] )."</a> foi revogado por <a href='game.php?village=;&screen=info_player&id=".$user['id']."'>".( $user['username'] )."</a>.");
            header( "LOCATION: game.php?village=".$village['id']."&screen=ally&mode=invite" );
            exit( );
        
    }

}

$invites = array( );
$result = mysql_query( "SELECT id,to_username,to_userid,time from ally_invites where from_ally=".$user['ally']." order by time" );
while ( $row = mysql_Fetch_array( $result ) )
{
    $invites[$row['id']]['to_username'] = ( $row['to_username'] );
    $invites[$row['id']]['to_userid'] = $row['to_userid'];
    $invites[$row['id']]['time'] = format_date($row['time'] );
}
	$tpl->assign("invites", $invites );
?>
