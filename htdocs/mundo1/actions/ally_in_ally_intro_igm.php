<?php
if ( $ACTIONS_MASSIVKEY_HIGHAAASSDD != "sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL" )
{
    exit( );
}
$getIntroIgm = $db->query( "SELECT intro_igm FROM ally WHERE id = '".$user['ally']."'" );
while ( $row = $db->Fetch( $getIntroIgm ) )
{
    $allyIgm = $row['intro_igm'];
}
if ( $allyIgm != "" )
{
    $text = true;
}
else
{
    $text = false;
}
$tpl->assign( "allyIgm", $allyIgm );
if ( !isset( $_POST['text'] ) && isset( $_GET['action'] ) || $_GET['action'] == "intro_igm" )
{
    $db->query( "UPDATE ally SET intro_igm = '".$_POST['text']."' WHERE id = '".$user['ally']."'" );
    header( "LOCATION: game.php?village=".$_GET['village']."&screen=ally&mode=intro_igm" );
}
?>
