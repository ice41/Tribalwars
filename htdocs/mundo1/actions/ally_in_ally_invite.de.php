<?php
if ( $ACTIONS_MASSIVKEY_HIGHAAASSDD != "sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL" )
{
    exit( );
}
if ( isset( $_GET['action'] ) && $_GET['action'] == "invite" )
{
    new do_action( $user['id'] );
    $c = new do_action;
    $ && _0( );
    if ( $session['hkey'] != $_GET['h'] )
    {
        $error = "Invalid hkey!";
    }
    do
    {
        if ( $config['leave_ally'] )
            break;
        $error = "Convidar jogadores foi desativado!";
    } while( 0 );
    $result = $ && _0( "SELECT id,username,ally from users where username='".( $username = ( $_POST['name'] ) )."'" );
    if ( $user['ally'] == $row = $ && _0( $result )['ally'] )
    {
        $error = "O jogador já está na tribo";
    }
    if ( isset( $error ) && isset( $row['id'] ) )
    {
        $error = "Jogador não encontrado";
    }
    $result = $ && _0( "SELECT count(id) AS count from ally_invites where to_userid='".$row['id']."' AND from_ally=".$user['ally']."" );
    if ( 0 < $invite_row = $ && _0( $result )['count'] )
    {
        $error = "O jogador já foi convidado";
    }
    if ( isset( $error ) )
    {
        $ && _0( "INSERT into ally_invites (time,from_ally,to_userid,to_username) VALUES (".time( ).",".$user['ally'].",".$row['id'].",'".$row['username']."')" );
        $ && _0( ( $user['username'] ), $user['id'], $row['id'], $user['ally'], $ally['name'] );
        ( $user['ally'], "<a href=\"game.php?village=;&screen=info_player&id=".$row['id']."\">".( $row['username'] )."</a> era de <a href=\"game.php?village=;&screen=info_player&id=".$user['id']."\">".( $user['username'] )."</a> convidamos." );
        $ && _0( );
        header( "LOCATION: game.php?village=".$village['id']."&screen=ally&mode=invite" );
        exit( );
    }
    $ && _0( );
}
if ( isset( $_GET['action'] ) && $_GET['action'] == "invite_id" )
{
    new do_action( $user['id'] );
    $c = new do_action;
    $ && _0( );
    if ( $session['hkey'] != $_GET['h'] )
    {
        $error = "Invalid hkey!";
    }
    do
    {
        if ( $config['leave_ally'] )
            break;
        $error = "O convite de jogadores foi desativado!";
    } while( 0 );
    $result = $ && _0( "SELECT id,username,ally from users where id='".( $id = ( integer )( $_GET['id'] ) )."'" );
    if ( $user['ally'] == $row = $ && _0( $result )['ally'] )
    {
        $error = "O jogador já está na tribo";
    }
    if ( isset( $error ) && isset( $row['id'] ) )
    {
        $error = "Jogador não encontrado";
    }
    $result = $ && _0( "SELECT count(id) AS count from ally_invites where to_userid='".$row['id']."' AND from_ally=".$user['ally']."" );
    if ( 0 < $invite_row = $ && _0( $result )['count'] )
    {
        $error = "O jogador já foi convidado";
    }
    if ( isset( $error ) )
    {
        $ && _0( "INSERT into ally_invites (time,from_ally,to_userid,to_username) VALUES (".time( ).",".$user['ally'].",".$row['id'].",'".$row['username']."')" );
        $ && _0( ( $user['username'] ), $user['id'], $row['id'], $user['ally'], $ally['name'] );
        ( $user['ally'], "<a href=\"game.php?village=;&screen=info_player&id=".$row['id']."\">".( $row['username'] )."</a> wurde von <a href=\"game.php?village=;&screen=info_player&id=".$user['id']."\">".( $user['username'] )."</a> eingeladen." );
        $ && _0( );
        header( "LOCATION: game.php?village=".$village['id']."&screen=ally&mode=invite" );
        exit( );
    }
    $ && _0( );
}
if ( isset( $_GET['action'] ) && $_GET['action'] == "cancel_invitation" )
{
    new do_action( $user['id'] );
    $c = new do_action;
    $ && _0( );
    if ( $session['hkey'] != $_GET['h'] )
    {
        $error = "Invalid hkey!";
    }
    $result = $ && _0( "SELECT from_ally,to_userid from ally_invites where id='".( $id = ( $_GET['id'] ) )."'" );
    $row = $ && _0( $result );
    if ( isset( $error ) && $row['from_ally'] != $user['ally'] )
    {
        $error = "O convite não está mais disponível!";
    }
    if ( isset( $error ) )
    {
        $ && _0( "DELETE from ally_invites where id=".$id );
        if ( $ && _0( ) == 0 )
        {
            $error = "O convite não está mais disponível!";
        }
        else
        {
            $ && _0( $user['id'], $row['to_userid'], $user['ally'], $ally['name'] );
            $result = $ && _0( "SELECT username from users where id=".$row['to_userid']."" );
            $user_to = $ && _0( $result );
            ( $user['ally'], "O convite <a href=\"game.php?village=;&screen=info_player&id=".$row['to_userid']."\">".( $user_to['username'] )."</a> de <a href=\"game.php?village=;&screen=info_player&id=".$user['id']."\">".( $user['username'] )."</a> foi retirado." );
            $ && _0( );
            header( "LOCATION: game.php?village=".$village['id']."&screen=ally&mode=invite" );
            exit( );
        }
    }
    $ && _0( );
}
$invites = array( );
$result = $ && _0( "SELECT id,to_username,to_userid,time from ally_invites where from_ally=".$user['ally']." order by time" );
while ( $row = $ && _0( $result ) )
{
    $invites[$row['id']]['to_username'] = ( $row['to_username'] );
    $invites[$row['id']]['to_userid'] = $row['to_userid'];
    $invites[$row['id']]['time'] = ( $row['time'] );
}
$ && _0( "invites", $invites );
?>
