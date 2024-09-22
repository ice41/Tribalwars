<?php 
/***************************************
* Za�adowa� dodatkowe funkcje php:     *
***************************************/
require ('lib/command.php');

/***************************************
* Start klasy bb_interpreter():        *
***************************************/
$bb_interpreter = new bb_interpreter($cl_builds,$cl_units,$pl);

/***************************************
* Akcja  rozwi��  istniej�cy  sojusz:  *
***************************************/

if ($_GET['action'] === 'close_ally') {
	if ($_GET['h'] == $session['hkey'] && $user['ally_found']) {
		if (!$config['close_ally']) {
		
			//Zdefiniuj wa�ne zmienne:
			$time = date("U");
			$title = "Sua tribo foi dissolvida por " . parse($user["username"]);
			$from_uid = $user['id'];
			$from_uname = parse($user["username"]);
			
			//Pobierz tablic� cz�onk�w z twojego plemienia:
			$sql = mysql_query("SELECT `id` FROM `users` WHERE `ally` = '".$user['ally']."'");
			while ($id = mysql_fetch_array($sql)) {
				//Dodaj raporty dla graczy o tym, �e plemi� zosta�o rozwi�zane:
				mysql_query ("INSERT into reports (
					title,time,type,in_group,receiver_userid,from_username,from_user
					) VALUES (
					'$title','$time','ally_clear','other','".$id[0]."','$from_uname','$from_uid'
					)");
					
				//Ustaw sojusz u gracza z rozwi�zanego sojuszu na -1
				mysql_query("UPDATE `users` SET `ally` = '-1',`ally_found` = '0',`ally_lead` = '0',`ally_invite` = '0',`ally_diplomacy` = '0',`ally_mass_mail` = '0',`ally_mod_forum` = '0',`ally_forum_switch` = '0',`ally_forum_trust` = '0',`ally_titel` = '' WHERE `id` = '".$id[0]."'");
				
				mysql_query("UPDATE `users` SET `new_report` = '1' WHERE `id` = '".$id[0]."'");
				}
				
			//Usu� zaproszenia do sojuszu docelowego:
			mysql_query("DELETE FROM `ally_invites` WHERE `from_ally` = '".$user['ally']."'");
				
			//Usu� eventy z sojuszu docelowego:
			mysql_query("DELETE FROM `ally_events` WHERE `ally` = '".$user['ally']."'");
			
			//Usu� sojusz:
			mysql_query("DELETE FROM `ally` WHERE `id` = '".$user['ally']."'");
			
			//Usu� rezerwacje:
			mysql_query("DELETE FROM `rezerwacje` WHERE `od_plemienia` = '".$user['ally']."'");
			mysql_query("DELETE FROM `rezerwacje_log` WHERE `plemie` = '".$user['ally']."'");
			
			//Usu� dzielenie rezerwacji:
			mysql_query("DELETE FROM `dzielenie_rezerwacji` WHERE `od_plemienia` = '".$user['ally']."'");
			mysql_query("DELETE FROM `dzielenie_rezerwacji` WHERE `do_plemienia` = '".$user['ally']."'");
			
			//Usu� forum sojuszu:
			$sql = mysql_query("SELECT id FROM `fora` WHERE `plemie` = '".$user['ally']."'");
			while ($id = mysql_fetch_array($sql)) {
				$fid = $id[0];
				mysql_query("DELETE FROM `fora` WHERE `id` = '$fid'");
				mysql_query("DELETE FROM `tematy` WHERE `forum` = '$fid'");
				mysql_query("DELETE FROM `posty` WHERE `forum` = '$fid'");
				mysql_query("DELETE FROM `czytanie` WHERE `fid` = '$fid'");
				mysql_query("DELETE FROM `f_ankiety` WHERE `fid` = '$fid'");
				}
				
			//Usu� kontrakty:
			mysql_query("DELETE FROM `kontrakty` WHERE `od_plemienia` = '".$user['ally']."'");
			mysql_query("DELETE FROM `kontrakty` WHERE `do_plemienia` = '".$user['ally']."'");
			
			//Reload ranking�w:
			reload_all_rangs();
			
			header('location: game.php?village='.$village['id'].'&screen=ally&mode=properties');
			exit;
			} else {
			$error = 'A opção de dissolver uma tribo foi desativada';
			}
		} else {
		$error = 'Falha na execução da ação.';
		}
	}
	
if ($_GET['action'] === 'close') {
	if ($_GET['h'] == $session['hkey'] && $user['ally_found']) {
		header('location: game.php?village='.$village['id'].'&screen=ally&mode=properties');
		exit;
		} else {
		$error = 'Falha na execução da ação.';
		}
	}
	
/***************************************
* Akcja zmie� zewn�trzny opis sojuszu: *
***************************************/

if ($_GET['action'] === 'change_description' && count($_POST) > 0) {
	if ($_GET['h'] == $session['hkey'] && $user['ally_diplomacy']) {
		$old_msg = $_POST['message'];
			
		//Walidacja stringu:
		$_POST['message'] = cmp_str($_POST['message'],0,5000);
			
		if ($_POST['message'] === 'LONG') {
			$error = 'O texto pode ter até 5.000 caracteres.';
			$text_ally_wew_bb = $old_msg;
			}
		elseif ($_POST['message'] === 'SPACES') {
			$error = 'O texto não pode consistir apenas em espaços.';
			} else {
			if (isset($_POST['edit'])) {			
				//Zinterpretuj bb codes:
				$compiled_msg = $bb_interpreter->compile_bb_code($_POST['message'],$user['id']);
				
				mysql_query("UPDATE `ally` SET `description` = '$compiled_msg' , `description_bb` = '".$_POST['message']."' WHERE `id` = '".$user['ally']."'");

$user_id = $user['id'];
$user_name = $user['username'];


$tekst = 'O jogador <a href="game.php?village=;&screen=info_player&id='.$user_id.'">'.$user_name.'</a> mudou a descrição da tribo!';
				add_allyevent($user['ally'],$tekst);

				
				header('location: game.php?village='.$village['id'].'&screen=ally&mode=properties');
				exit;
				} else {
				$ally_desc_bb = $_POST['message'];
				$compiled_msg = $bb_interpreter->compile_bb_code($_POST['message'],$user['id']);
				$tpl->assign('previews',$bb_interpreter->load_bb($compiled_msg,$village['id']));
				}
			}
		} else {
		$error = 'Falha na execução da ação.';
		}
	}

if ($_GET['action'] === 'change_desc' && count($_POST) > 0) {
	if ($_GET['h'] == $session['hkey'] && $user['ally_diplomacy']) {

		header('location: game.php?village='.$village['id'].'&screen=ally&mode=properties');
		exit;
		} else {
		$error = 'Falha na execução da ação.';
		}
	}
	
if (!isset($ally_desc_bb)) {
	$ally_desc_txt_bb = entparse(sql("SELECT `description_bb` FROM `ally` WHERE `id` = '".$user['ally']."'","array"));
	$tpl->assign('ally_desc_bb',$ally_desc_txt_bb);
	} else {
	$tpl->assign('ally_desc_bb',$ally_desc_bb);
	}





$ally_desc = sql("SELECT `description` FROM `ally` WHERE `id` = '".$user['ally']."'","array");
$ce4 = Array("+wurde+von+","+gegr%FCndet%0AWendet+euch+bei+Fragen+an+","%0A%0ADieser+Text+kann+von+den+Diplomaten+des+Stammes+ge%E4ndert+werden.");
$cu_ce4 = Array(" foi fundado por ",". Se tiver uma pergunta, consulte ","<br/><br/><i>Este texto pode ser alterado pelos diplomatas da tribo.<i>");
$ally_desc = str_replace($ce4,$cu_ce4,$ally_desc);
$tpl->assign('ally_desc',$bb_interpreter->load_bb($ally_desc,$village['id']));


if ( $ACTIONS_MASSIVKEY_HIGHAAASSDD != "sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL" )
{
    exit( );
}
if ( isset( $_GET['action'] ) && $_GET['action'] == "change" && $user['ally_found'] == 1 )
{
    if ( $session['hkey'] != $_GET['h'] )
    {
        $error = "Invalid hkey!";
    }
    $new_name = "";
    $name = trim( $_POST['name'] );
    if ( empty( $error ) && ( $name ) != $ally['name'] )
    {
        if ( empty( $error ) && strlen( $name ) < 4 )
        {
            $error = "O nome deve ter pelo menos 4 caracteres!";
        }
        if ( empty( $error ) && 32 < strlen( $name ) )
        {
            $error = "O nome deve ter no máximo 32 caracteres!";
        }
        $result = mysql_query( "SELECT count(id) AS count from ally where name='".( $name )."'" );
        $row = mysql_fetch_array( $result );
        if ( empty( $error ) && 0 < $row['count'] )
        {
            $error = "Nome Em uso!";
        }
        $new_name = ($name);
    }
    $new_tag = "";
    $tag = trim( $_POST['tag'] );
    if ( empty( $error ) && ( $tag ) != $ally['short'] )
    {
        if ( empty( $error ) && strlen( $tag ) < 2 )
        {
            $error = "A abreviação deve conter no mínimo 2 caracteres!";
        }
        if ( empty( $error ) && 6 < strlen( $tag ) )
        {
            $error = "A abreviação deve conter no máximo 6 caracteres!";
        }
        $result = mysql_query( "SELECT count(id) AS count from ally where short='".( $tag )."'" );
        $row = mysql_fetch_array( $result );
        if ( empty( $error ) && 0 < $row['count'] )
        {
            $error = "Abreviatura em uso!";
        }
        $new_tag = ( $tag );
    }
    $hp = trim( $_POST['homepage'] );
    if ( empty( $error ) && 128 < strlen( $hp ) )
    {
        $error = "A página da tribo deve ter um endereço com no máximo 128 caracteres!";
        $hp = ( $hp );
    }
    $irc = trim( $_POST['irc-channel'] );
    if ( empty( $error ) && 128 < strlen( $irc ) )
    {
        $error = "O canal IRC deve ter no máximo 128 caracteres!";
        $irc = ( $irc );
    }
    if ( empty( $error ) )
    {
        $querys = array( );
		$ally_id = $user['ally'];
		$hope = $_POST['homepage'];
		$ir = $_POST['irc'];
		@mysql_query("UPDATE ally SET homepage = '$hope' WHERE id = '$ally_id'");
		@mysql_query("UPDATE ally SET irc = '$ir' WHERE id = '$ally_id'");
		$name = $_POST['name'];		
		@mysql_query("UPDATE ally SET name = '$name' WHERE id = '$ally_id'");
		        $tag = $_POST['tag'];		
		@mysql_query("UPDATE ally SET short = '$tag' WHERE id = '$ally_id'");		

        do
        {
            if ( isset( $new_name ) )
                break;
		$ally_id = $user['ally'];	
        

        } while( 0 );
        do
        {
            if ( isset( $new_tag ) )
                break;
		$ally_id = $user['ally'];	
		
            $new_tag[$querys] = "short='".$new_tag."'";
        } while( 0 );
        mysql_fetch_array( "UPDATE ally SET ".implode( ",", $querys )." where id=".$user['ally']."" );

        header( "LOCATION: game.php?village=".$_GET['village']."&screen=ally&mode=properties" );
    }
}
if ( isset( $_GET['action'] ) && $_GET['action'] == "close" && $user['ally_found'] == 1 )
{
    if ( $session['hkey'] != $_GET['h'] )
    {
        $error = "Invalid hkey!";
    }
    do
    {
        if ( $config['close_ally'] )
            break;
        $error = "A dissolução de tribos está desativada!";
    } while( 0 );
    if ( empty( $error ) )
    {
        $result = mysql_query( "SELECT id from users where ally=".$user['ally']."" );
        while ( $row = mysql_fetch_array( $result ) )
        {
            mysql_query( $user['username'], $user['id'], $row['id'] );
            mysql_query( "UPDATE users SET ally=-1 where id=".$row['id']."" );
        }
        mysql_query( "DELETE from ally_invites where from_ally=".$user['ally']."" );
        mysql_query( "DELETE from ally_events where ally=".$user['ally']."" );
        mysql_query( "DELETE from ally where id=".$user['ally']."" );
        reload_ally_rangs( );
        
        header( "LOCATION: game.php?village=".$_GET['village']."&screen=ally" );
    }
}

if ( isset( $_GET['action'] ) && $_GET['action'] == "ally_image" && $user['ally_diplomacy'] == 1 )
{
    if ( $session['hkey'] != $_GET['h'] )
    {
        $error = "Invalid hkey!";
    }
    do
    {
        if ( !( $_POST['del_image'] == "on" ) || isset( $ally['image'] ) )
            break;
        mysql_query( "UPDATE ally SET image='' where id=".$user['ally']."" );
        @unlink( "./graphic/ally/".$ally['image'] );
        if ( isset( $_FILES['image']['name'] ) )
        {
            
            header( "LOCATION: game.php?village=".$village['id']."&screen=ally&mode=properties" );
            exit( );
        }
        $ally['image'] = "";
    } while( 0 );
    do
    {
        if ( isset( $_FILES['image']['name'] ) )
            break;
        $image = $_FILES['image'];
        $valid_types = array( "image/jpeg", "image/pjpeg", "image/png", "image/gif" );
        do
        {
            if ( !isset( $error ) || in_array( $image['type'], $valid_types ) )
                break;
            $error = "Formato de arquivo inválido. JPEG, JPG, PNG e GIF são permitidos!";
        } while( 0 );
        if ( isset( $error ) || 242144 < $image['size'] )
        {
            $error = "O brasão pode ter no máximo 256kByte!";
        }
        $size_coords = getimagesize( $image['tmp_name'] );
        if ( isset( $error ) || ( 300 < $size_coords[0] && 200 < $size_coords[1] ) )
        {
            $error = "A imagem deve ter dimensões iguais ou menores que 300x200 px!";
        }
        if ( isset( $error ) )
        {
            do
            {
                if ( isset( $ally['image'] ) )
                    break;
                mysql_query( "UPDATE ally SET image='' where id=".$user['ally']."" );
                @unlink( "./graphic/ally/".$ally['image'] );
            } while( 0 );
            $filename = $user['ally'];
            $rand = rand( 1, 9999999 );
            if ( $image['type'] == "image/jpeg" && $image['type'] == "image/pjpeg" )
            {
                copy( $image['tmp_name'], "graphic/ally/".$filename."-".$rand.".jpeg" );
                $file = $filename."-".$rand.".jpeg";
            }
            if ( $image['type'] == "image/png" )
            {
                copy( $image['tmp_name'], "graphic/ally/".$filename."-".$rand.".png" );
                $file = $filename."-".$rand.".png";
            }
            if ( $image['type'] == "image/gif" )
            {
                copy( $image['tmp_name'], "graphic/ally/".$filename."-".$rand.".gif" );
                $file = $filename."-".$rand.".gif";
            }
            mysql_query( "UPDATE ally SET image='".$file."' where id='".$user['ally']."'" );
           
            header( "LOCATION: game.php?village=".$village['id']."&screen=ally&mode=properties" );
        }
        exit( );
    } while( 0 );
    if ( isset( $error ) )
    {
        $error = "Nenhuma imagem tribal selecionada!";
    }
}
$tpl->assign( "preview", $preview );

?>