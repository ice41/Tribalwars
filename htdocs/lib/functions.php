<?
/*****************************************/
/*=======================================*/
/*     PLIK: functions.php   		 */
/*     DATA: 13.12.2011r                 */
/*     ROLA: funkcje do indexu i register*/
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

function sql($sql,$typ) {
    switch($typ) {
	    case 'array':
		$query = mysql_query($sql);
     	$one = mysql_fetch_array($query);
	    return $one[0];
		case 'assoc':
		$query = mysql_query($sql);
	    $one = mysql_fetch_assoc($query);
	    return $one;
	    }
    }

//Nie zmienia� kodu!!!!Zmiana mo�e doprowadzi� do uszkodzenia rejestracji!!
function kod($value) { 
   $caracts = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUWXYZ1234567890";
    
for ($car = 0; $car < $value; $car++) {
   $var = $caracts[mt_rand(0,strlen($caracts)-1)];
  
}
return $var;
}

######################################
#Przyk�adowy ka partir de:AbrA494FGhk2K69Mj8 #
######################################




function zakladaj_konto($date_reg,$nazwa,$haslo,$haslo_powt,$email,$potwierdzenie_owu) {
	if ($potwierdzenie_owu != 1) {
		$return = 'Deve confirmar as <a href="rules.php">Regras</a>!';
		} else {
		if (strlen($haslo) < 4) {
			$return = 'A senha deve conter pelo menos 4 caracteres';
			} else {
			if ($haslo !== $haslo_powt) {
				$return = 'Os campos senha e senha repetida devem ser idênticos';
				} else {
				$nazwa = cmp_str($nazwa,4,75);
				$email = cmp_str($email,4,75);
				
				if ($nazwa === 'SHORT') {
					$return = 'O nome deve conter pelo menos 4 caracteres';
					}
				if ($nazwa === 'LONG') {
					$return = 'O nome pode conter até 75 caracteres';
					}
				if ($nazwa === 'SPACES') {
					$return = 'O nome não pode conter apenas espaços';
					}
					
					
				if ($email === 'SHORT') {
					$return = 'O endereço de e-mail deve conter pelo menos 4 caracteres';
					}
				if ($email === 'LONG') {
					$return = 'O endereço de e-mail pode conter até 75 caracteres';
					}
				if ($email === 'SPACES') {
					$return = 'Um endere�o de e-mail não pode consistir apenas em espa�os';
					}
				if ($email === 'NO@') {
					$return = 'O endereço de e-mail não está correto';
					}

				if (empty($return)) {
					$email = parse($email);
					$counts_email = sql("SELECT COUNT(id) FROM `gracze` WHERE `email` = '".$email."'",'array');
					if ($counts_email > 0) {
						$return = 'O E-mail encontra-se em uso!';}}


				if (empty($return)) {
					$nazwa = parse($nazwa);
					$counts_players = sql("SELECT COUNT(id) FROM `gracze` WHERE `nazwa` = '".$nazwa."'",'array');
					if ($counts_players > 0) {
						$return = 'Existe um jogador com esse nome. Escolha um nome diferente.';
						} else {
						$haslo = md5($haslo);
						$email = parse($email);
                              $date_reg = date("U"); ($date_reg);
		$ip_reg = $_SERVER['REMOTE_ADDR']; ($ip_reg);
                                               
$kod1 = Kod(80);
$kod2 = Kod(80);
$kod3 = Kod(80);
$kod4 = Kod(80);
$kod5 = Kod(80);
$kod6 = Kod(80);
$kod7 = Kod(80);
$kod8 = Kod(80);
$kod9 = Kod(80);
$kod10 = Kod(80);
$kod11 = Kod(80);
$kod12 = Kod(80);
$kod13 = Kod(80);
$kod14 = Kod(80);
$kod15 = Kod(80);
$kod16 = Kod(80);
$kod17 = Kod(80);
$kod18 = Kod(80);
$kod_caly = $kod1."".$kod2."".$kod3."".$kod4."".$kod5."".$kod6."".$kod7."".$kod8."".$kod9."".$kod10."".$kod11."".$kod12."".$kod13."".$kod14."".$kod15."".$kod16."".$kod14."".$kod18;

						mysql_query("INSERT INTO gracze(nazwa,haslo,email,date_reg,ip_reg,kod) value('".$nazwa."','".$haslo."','".$email."','".$date_reg."','".$ip_reg."','".$kod_caly."')");
							
						$return = sql("SELECT `id` FROM `gracze` WHERE `nazwa` = '$nazwa'",'array');
						}
					}
				}
			}
		}
	return $return;
	}

function GetClientIP() { 
	if ($_SERVER['HTTP_X_FORWARDED_FOR']) { 
		$clientip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
		} else { 
		$clientip = $_SERVER['REMOTE_ADDR']; 
		}
	return $clientip; 
	} 

function zaloguj($gracz,$haslo) {
	$gracz = urlencode($gracz);
	$haslo = md5($haslo);
	$counts_players = mysql_num_rows(mysql_query("SELECT COUNT(id) FROM `gracze` WHERE `nazwa` = '".$gracz."'"));
	if ($counts_players > 0) {
		$user = sql("SELECT id,haslo FROM `gracze` WHERE `nazwa` = '".$gracz."'",'assoc');
		if ($haslo == $user['haslo']) {
		
				mysql_query("INSERT INTO zalogowani(client_ip,client_id) VALUES('".GetClientIP()."','".$user['id']."')");
				
			$return = array($user['id'],urldecode($gracz),$_all_logs);
			} else {
			$return = 'Senha incorreta';
			}
		} else {
		$return = 'Não existe nenhum jogador com este nome';
		}
	return $return;
	}

function wyloguj() {
	mysql_query("DELETE FROM `zalogowani` WHERE `client_ip` = '".GetClientIP()."'");
	header("LOCATION: index.php");
	exit;
	}

	
	
function zaloguj_na_serwer($userinfo,$form_pass,$form_user,$form_serwer) {
	global $serwery;
	
	if (!in_array($form_serwer,$serwery)) {
		header ('LOCATION: index.php');
		exit;
		}
		
	if ($form_pass != $userinfo['haslo']) {
		header ('LOCATION: index.php');
		exit;
		}
		
	if ($form_user != $userinfo['id']) {
		header ('LOCATION: index.php');
		exit;
		}

	if (in_array($form_serwer,$userinfo['serwery_gry'])) {	
		//Start sesji i dodanie jej do COOKIE'S
		session_start();
		setcookie('session',session_id());
		$hkey = mt_rand(1000,9999);
		setcookie('hkey',$hkey);
		setcookie('aktu_serwer',$form_serwer);
		
		require ('mundo'.$form_serwer.'/lib/config.php');
		//Po��czy� z baz� danych serwera docelowego:
		$db_server_lan_cnnct_var = mysql_connect($config['db_host'],$config['db_user'],$config['db_pw'],'');
		mysql_select_db($config['db_name'],$db_server_lan_cnnct_var);
		
		//Pobra� info o graczu z bazy danych serwera docelowego
		$user_lan_info = sql("SELECT * FROM `users` WHERE `tw_id` = '".$userinfo['id']."'",'assoc');
		
		//Usun�� wszystkie sesje:
		mysql_query("DELETE FROM `sessions` WHERE (`sid` = '".session_id()."') OR (`userid` = '".$user_lan_info['id']."')");
		
		//Doda� sesj� do bazy danych serwera docelowego
		mysql_query("INSERT INTO sessions(userid,sid,hkey) VALUES('".$user_lan_info['id']."','".session_id()."','".$hkey."')");
		
		//Akcja specialna serwera - nowe logowanie - zaktualizowa� HKey u�ytkownika
		mysql_query("UPDATE `users` SET `hkey` = '".session_id()."' WHERE `id` = '".$user_lan_info['id']."'");
		
		//Doda� zalogowanie
		mysql_query("INSERT INTO logins(userid,username,time,ip) VALUES('".$user_lan_info['id']."','".$user_lan_info['username']."','".date("U")."','".GetClientIP()."')");
		
		
		if ($user_lan_info['villages'] > 0) {
			//Znajd� pierwsz� wiosk� kr�ta nale�y do gracza:
			$first_village = sql("SELECT `id` FROM `villages` WHERE `userid` = '".$user_lan_info['id']."' ORDER BY name LIMIT 1",'array');
			header ('LOCATION: mundo'.$form_serwer.'/game.php?village='.$first_village.'&screen=welcome');
			exit;
			} else {
			header ('LOCATION: mundo'.$form_serwer.'/create_village.php');
			exit;
			}
		mysql_close();
		} else {
		//Start sesji i dodanie jej do COOKIE'S
		session_start();
		setcookie('session',session_id());
		setcookie('ord_un',parse($userinfo['nazwa']));
		setcookie('ord_id',$form_user);
		setcookie('ord_pa',$form_pass);
		setcookie('aktu_serwer',$form_serwer);

		// header ('LOCATION: pl'.$form_serwer.'/uczestnictwo.php');
		header ('LOCATION: mundo'.$form_serwer.'/uczestnictwo.php');
		exit;
		}
	}
	
function change_pass($nazwa_usera,$email,$new_pass) {
	$nazwa_usera = parse($nazwa_usera);
	$email = parse($email);
	
	if (strlen($new_pass) < 4) {
		$return = 'A senha deve conter pelo menos 4 caracteres';
		} else {
		$user_counts = sql("SELECT COUNT(id) FROM `gracze` WHERE `nazwa` = '".$nazwa_usera."'",'array');
		if ($user_counts > 0) {
			$user_info = sql("SELECT id,email FROM `gracze` WHERE `nazwa` = '".$nazwa_usera."'","assoc");
			if ($email != $user_info['email']) {
				$return = 'Wprowad� poprawny adres email';
				} else {
				$new_pass = md5($new_pass);
				mysql_query("UPDATE `gracze` SET `haslo` = '$new_pass' WHERE `id` = '".$user_info['id']."'");
				$return = 'Has�o zosta�o zmienione.';
				}
			} else {
			$return = 'Não existe nenhum jogador com este nome';
			}
		}
	return $return;
	}
	
function formatuj_date($czas) {
    return date("Y-m-d H:i", $czas);
    }
	

function kopiuj($sciezka, $docelowy) {
	if ( !is_dir($docelowy)) {
		mkdir($docelowy, 0777);
		}
		
	$katalog = opendir($sciezka);
	while (false !== ($plik = readdir($katalog))) {
		if ($plik=="." || $plik=="..") {
			continue;
			}
		if (is_dir("$sciezka/$plik")) {
			mkdir("$docelowy/$plik", 0777);
			kopiuj("$sciezka/$plik","$docelowy/$plik");
			} else {
			copy("$sciezka/$plik", "$docelowy/$plik");
			}
		}
	closedir($katalog);
	}
	
function parse($str) {
	$str = urlencode($str);
	$str = htmlspecialchars($str);
	$str = trim($str);
	return $str;
	}
	
function entparse($str) {
	$str = urldecode($str);
	return $str;
	}
	
/*FUNKCJE WALIDACYJNE*/

function get_validete_reg() {
	return '/[^A-Za-z0-9_�꿟���ʯ�ӌ���\.\/\:\;\[\]\=\+\-\)\(\*\&\^\%\$\#\@\!\~\`\n\| \?\,\{\}]/';
	}
	
function str_validator($str) {
	//Wywal wszystkie niedozwoloze znaki
	$str = preg_replace(get_validete_reg(),'',$str);
	return $str;
	}

function cmp_str($str,$min,$max) {
	$str = str_validator($str);
	$len = strlen($str);
	
	if ($len < $min) {
		return 'SHORT';
		} else {
		if ($len > $max) {
			return 'LONG';
			} else {
			if (substr_count($str," ") == $len) {
				return 'SPACES';
				} else {
				return $str;
				}
			}
		}
	}
	
function rrmdir($dir) {
    $fp = opendir($dir);
    if ($fp) {
        while ($f = readdir($fp)) {
            $file = $dir . "/" . $f;
            if ($f == "." || $f == "..") {
                continue;
				}
            else if ( is_dir($file) ) {
                rrmdir($file);
				} else {
                unlink($file);
				}
			}
        closedir($fp);
        rmdir($dir);
		}
	}

?>