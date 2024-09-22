<?php
if ($user['ally'] != '-1') {
	if ($user['ally_found'] || $user['ally_lead']) {
		mysql_query("UPDATE `users` SET `ally_mod_forum` = '1',`ally_forum_switch` = '1',`ally_forum_trust` = '1' WHERE `id` = '".$user['id']."'");
		$user['ally_mod_forum'] = 1;
		$user['ally_forum_trust'] = 1;
		$user['ally_forum_switch'] = 1;
		}
	}

if ( $ACTIONS_MASSIVKEY_HIGHAAASSDD != "sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL" )
{
    exit( );
}
if ( $user['ally'] == -1 )
{
    include( "ally_no_ally.php" );
}
else
{
    include( "ally_in_ally.php" );
}
?>