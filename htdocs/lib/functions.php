<?
/*****************************************/
/*=======================================*/
/*     PLIK: functions.php   		 	 */
/*     DATA: 13.12.2011r        		 */
/*     ROLA: funkcje do indexu i admina	 */
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

function zakladaj_konto($nazwa,$haslo,$haslo_powt,$email,$potwierdzenie_owu) {
	if ($potwierdzenie_owu != 1) {
		$return = 'Musisz potwierdziæ OWU i ZOD';
		} else {
		if (strlen($haslo) < 4) {
			$return = 'Has³o musi sk³adaæ siê z co najmniej 4 znaków';
			} else {
			if ($haslo != $haslo_powt) {
				$return = 'Pola has³o i powtórz has³o musz¹ byæ identyczne';
				} else {
				if (strlen($nazwa) < 4) {
					$return = 'Nazwa musi sk³adaæ siê z co najmniej 4 znaków';
					} else {
					if (strlen($email) < 4) {
						$return = 'Adres e-mail musi sk³adaæ siê z co najmniej 4 znaków';
						} else {
						$counts_players = 0;
						$nazwa = urlencode($nazwa);
						$counts_players = sql("SELECT COUNT(id) FROM `gracze` WHERE `nazwa` = '".$nazwa."'",'array');
						if ($counts_players > 0) {
							$return = 'Gracz o takiej nazwie ju¿ istnieje. Wybierz inn¹ nazwê.';
							} else {
							$haslo = md5($haslo);
							$email = urlencode($email);
							mysql_query("INSERT INTO gracze(nazwa,haslo,email) value('".$nazwa."','".$haslo."','".$email."')");
							
							$return = sql("SELECT `id` FROM `gracze` WHERE `nazwa` = '$nazwa'",'array');
							}
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

function zaloguj($gracz,$haslo,$bez_przerwy) {
	$gracz = urlencode($gracz);
	$haslo = md5($haslo);
	$counts_players = sql("SELECT COUNT(id) FROM `gracze` WHERE `nazwa` = '".$gracz."'",'array');
	if ($counts_players > 0) {
		$user = sql("SELECT id,haslo FROM `gracze` WHERE `nazwa` = '".$gracz."'",'assoc');
		if ($haslo == $user['haslo']) {
			if ($bez_przerwy == 1) {
				mysql_query("INSERT INTO zalogowani(client_ip,client_id) VALUES('".GetClientIP()."','".$user['id']."')");
				$_all_logs = 0;
				} else {
				$_all_logs = 1;
				}
			$return = array($user['id'],urldecode($gracz),$_all_logs);
			} else {
			$return = 'B³êdne has³o';
			}
		} else {
		$return = 'Nie ma gracza o tej nazwie';
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
		
		require ('serwer_'.$form_serwer.'/include/config.php');
		//Po³¹czyæ z baz¹ danych serwera docelowego:
		$db_server_lan_cnnct_var = mysql_connect($config['db_host'],$config['db_user'],$config['db_pw'],'');
		mysql_select_db($config['db_name'],$db_server_lan_cnnct_var);
		
		//Pobraæ info o graczu z bazy danych serwera docelowego
		$user_lan_info = sql("SELECT id,villages,username FROM `users` WHERE `tw_id` = '".$userinfo['id']."'",'assoc');
		
		//Usun¹æ wszystkie sesje:
		mysql_query("DELETE FROM `sessions` WHERE (`sid` = '".session_id()."') OR (`userid` = '".$user_lan_info['id']."')");
		
		//Dodaæ sesjê do bazy danych serwera docelowego
		mysql_query("INSERT INTO sessions(userid,sid,hkey) VALUES('".$user_lan_info['id']."','".session_id()."','".$hkey."')");
		
		//Dodaæ zalogowanie
		mysql_query("INSERT INTO logins(userid,username,time,ip) VALUES('".$user_lan_info['id']."','".$user_lan_info['username']."','".date("U")."','".GetClientIP()."')");
		
		
		if ($user_lan_info['villages'] > 0) {
			//Pierwsza wioska:
			$first_village = sql("SELECT `id` FROM `villages` WHERE `userid` = '".$user_lan_info['id']."' ORDER BY name LIMIT 1",'array');
			header ('LOCATION: serwer_'.$form_serwer.'/game.php?village='.$first_village.'&screen=overview');
			exit;
			} else {
			header ('LOCATION: serwer_'.$form_serwer.'/create_village.php');
			exit;
			}
		mysql_close();
		} else {
		//Start sesji i dodanie jej do COOKIE'S
		session_start();
		setcookie('session',session_id());
		setcookie('ord_un',$userinfo['nazwa']);
		setcookie('ord_id',$form_user);
		setcookie('ord_pa',$form_pass);
		setcookie('aktu_serwer',$form_serwer);

		header ('LOCATION: serwer_'.$form_serwer.'/uczestnictwo.php');
		exit;
		}
	}
	
function change_pass($nazwa_usera,$email,$new_pass) {
	$nazwa_usera = urlencode($nazwa_usera);
	$email = urlencode($email);
	
	if (strlen($new_pass) < 4) {
		$return = 'Has³o musi sk³adaæ siê z co najmniej 4 znaków';
		} else {
		$user_counts = sql("SELECT COUNT(id) FROM `gracze` WHERE `nazwa` = '".$nazwa_usera."'",'array');
		if ($user_counts > 0) {
			$user_info = sql("SELECT id,email FROM `gracze` WHERE `nazwa` = '".$nazwa_usera."'","assoc");
			if ($email != $user_info['email']) {
				$return = 'WprowadŸ poprawny adres email';
				} else {
				$new_pass = md5($new_pass);
				mysql_query("UPDATE `gracze` SET `haslo` = '$new_pass' WHERE `id` = '".$user_info['id']."'");
				$return = 'Has³o zosta³o zmienione.';
				}
			} else {
			$return = 'Nie ma gracza o tej nazwie';
			}
		}
	return $return;
	}
	
function formatuj_date($czas) {
    return date("Y-m-d H:i:s", $czas);
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
	
function entparse($str) {
	$str = urldecode($str);
	$str = htmlspecialchars($str);
	$str = trim($str);
	return $str;
	}
?>