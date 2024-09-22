<?php 
if ($_GET['action'] === 'accept_invite') {
	if ($_GET['h'] == $session['hkey']) {
		//Walidacja:
		$_GET['id'] = floor((int)$_GET['id']);
		if ($_GET['id'] < 0) {
			$_GET['id'] = 0;
			}
			
		$inv_info = sql("SELECT to_userid,from_ally,id FROM `ally_invites` WHERE `id` = '".$_GET['id']."'","assoc");
		if (is_array($inv_info) && $user['id'] == $inv_info['to_userid']) {
			mysql_query("UPDATE `users` SET `ally` = '".$inv_info['from_ally']."',`ally_found` = '0',`ally_lead` = '0',`ally_invite` = '0',`ally_diplomacy` = '0',`ally_mass_mail` = '0',`ally_mod_forum` = '0',`ally_forum_switch` = '0',`ally_forum_trust` = '0',`ally_titel` = '' WHERE `id` = '".$user['id']."'");
			
			//Reload ranking�w:
			reload_all_rangs();
			
			//Usu� inne zaproszenia:
			mysql_query("DELETE FROM `ally_invites` WHERE `to_userid` = '".$user['id']."'");
			
			//Dodaj nowy event do sojuszu:
			$title = '<a href="game.php?village=;&screen=info_player&id='.$user['id'].'">' . entparse($user['username']). '</a> aceite o convite para a tribo.';
			add_allyevent($inv_info['from_ally'],$title);
			//Sprawd�, czy plemi� ma wiadomo�� powitaln�:
			$powitalna = sql("SELECT igm,short FROM `ally` WHERE `id` = '".$inv_info['from_ally']."'");
			if (!empty($powitalna['igm'])) {
			$wiadomosc = $powitalna['igm'];
			$temat = 'Witamy w '.$powitalna['short'];
			send_mail(-1,plemi�,$user['id'],$user['username'],parse($temat),parse($wiadomosc),false);			
			}
			//Dodaj forum dla gracza jako nie przeczytane:
			$sql = mysql_query("SELECT id,visible FROM `fora` WHERE `plemie` = '".$inv_info['from_ally']."'");
			while ($id = mysql_fetch_array($sql)) {
				if ($id[1] == 0) {
					$sql_thr = mysql_query("SELECT `id` FROM `tematy` WHERE `forum` = '".$id[0]."'");
					while($tid = mysql_fetch_array($sql_thr)) {
						mysql_query("INSERT INTO czytanie(graczid,fid,tid) VALUES('".$user['id']."','".$id[0]."','".$tid[0]."')");
						}
					}
				}
			
			header('location: game.php?village='.$village['id'].'&screen=ally');
			exit;
			} else {
			$error = "Não existe esse convite";
			}
		} else {
		$error = 'Falha na execução da ação.';
		}
	}
	
if ($_GET['action'] === 'accept') {
	if ($_GET['h'] == $session['hkey']) {
		header('location: game.php?village='.$village['id'].'&screen=ally');
		exit;
		} else {
		$error = 'Falha na execução da ação.';
		}
	}
	
if ( $ACTIONS_MASSIVKEY_HIGHAAASSDD != "sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL" )
{
    exit( );
}
if ( isset( $_GET['action'] ) && $_GET['action'] == "create" )
{

   
 
    if ( $session['hkey'] != $_GET['h'] )
    {
        $error = "Invalid hkey!";
    }
    do
    {
        if ( $config['create_ally'] )
            break;
        $error = "A criação da tribo foi desativada!";
    } while( 0 );
    $_POST['name'] = trim( $_POST['name'] );
    $_POST['tag'] = trim( $_POST['tag'] );
    if ( empty( $error ) && strlen( $_POST['name'] ) < 4 )
    {
        $error = "O nome deve ter no mínimo 4 caracteres!";
    }
    if ( empty( $error ) && 32 < strlen( $_POST['name'] ) )
    {
        $error = "O nome pode ter no máximo 32 caracteres!";
    }
    if ( empty( $error ) && strlen( $_POST['tag'] ) < 2 )
    {
        $error = "A abreviação deve ter pelo menos 2 caracteres!";
    }
    if ( empty( $error ) && 6 < strlen( $_POST['tag'] ) )
    {
        $error = "A abreviação deve ter no máximo 6 caracteres!";
    }
    $result = mysql_query( "SELECT count(id) AS count from ally where name='".( $_POST['name'] )."'" );
    $row = mysql_Fetch_array( $result );
    if ( empty( $error ) && 0 < $row['count'] )
    {
        $error = "Nome em uso!";
    }
    $result = mysql_query( "SELECT count(id) AS count from ally where short='".( $_POST['tag'] )."'" );
    $row = mysql_Fetch_array( $result );
    if ( empty( $error ) && 0 < $row['count'] )
    {
        $error = "Skr�t zaj�ty";
    }
    if ( $user['ally'] != -1 )
    {
        $error = "Já está em uma tribo!";
    }
    if ( empty( $error ) )
    {
        $intern_text = ( "Entre em contato se tiver alguma dúvida ".( $user['username'] )."\n\nEste texto pode ser alterado pela liderança da tribo." );
        $description = ( $_POST['name']." wurde von ".( $user['username'] )." gegr�ndet\nEntre em contato se tiver alguma dúvida ".( $user['username'] )."\n\nEste texto pode ser alterado pelos diplomatas da tribo." );
        mysql_query( "INSERT into ally (short,name,intern_text,description) VALUES ('".( $_POST['tag'] )."','".( $_POST['name'] ).( "','".$intern_text."','$description')" ) );
        $nazwa = $_POST['name'];
		$id = $db->getLastId();
        mysql_query( "UPDATE users SET ally=".$id.",ally_titel='',ally_found='1',ally_lead='1',ally_invite='1',ally_diplomacy='1',ally_mass_mail='1' where id=".$user['id']."" );
        ( $id );
        reload_ally_rangs( );
        add_allyevent( $id, "A tribo foi fundada por <a href=\"game.php?village=;&screen=info_player&id=".$user['id']."\">".( $user['username'] )."</a>" );
        header( "LOCATION: game.php?village=".$village['id']."&screen=ally" );
       
    }

}

$invites = array( );
$result = mysql_query( "SELECT from_ally,id from ally_invites where to_userid=".$user['id']."" );
while ( $row = mysql_Fetch_array( $result ) )
{
    $invites[$row['id']]['from_ally'] = $row['from_ally'];
    $res = mysql_query( "SELECT short from ally where id=".$row['from_ally']."" );
    $r = mysql_Fetch_array( $res );
    $invites[$row['id']]['tag'] = ( $r['short'] );
}
$tpl->assign( "invites", $invites );
$tpl->assign( "error", $error );
?>