<?php
if ($_GET['action'] === 'delete' and count($_POST) > 0) {
	if ($_GET['h'] == $session['hkey']) {
		//Po��czy� z centraln� baz� danych:
		cdb_central();

		//Wybierz has�o
		$tw_user = sql("SELECT haslo,serwery_gry FROM `gracze` WHERE `id` = '".$user['tw_id']."'",'assoc');

		//Zakoduj stare has�o
		if (!empty($_POST['password'])) {
			$_POST['password'] = md5($_POST['password']);
			}
			
		if ($tw_user['haslo'] === $_POST['password'] && !empty($_POST['password'])) {
			$_ARRAY = explode(';',$tw_user['serwery_gry']);
		
			foreach ($_ARRAY as $_VAL) {
				if	($_VAL != $config['__SERVER__ID'] && !empty($_VAL)) {
					$_NEW_ARRAY[] = $_VAL;
					}
				}
			
			$str = implode(';',$_NEW_ARRAY);
		
			mysql_query("UPDATE `gracze` SET `serwery_gry` = '$str' WHERE `id` = '".$user['tw_id']."'");
			}
		
		//Z powrotem po��cz z baz� tego serwera
		cdb_server();
		
		if ($tw_user['haslo'] === $_POST['password'] && !empty($_POST['password'])) {
			//Wykona� obliczenie dla nast�pnego zadania
            $ilosc_1 = mysql_query("SELECT * FROM users");
            $ilosc_2 = mysql_num_rows($ilosc_1);
            $ilosc_new = $ilosc_2 - 1;				
		    //Doda� nowego u�ytkownika dla statystyk �wiata
		    mysql_query("INSERT INTO gracze(ilosc,time) VALUES('$ilosc_new','".date("U")."')");		
			mysql_query("DELETE FROM `users` WHERE `id` = '".$user['id']."'");
			mysql_query("DELETE FROM `czytanie` WHERE `graczid` = '".$user['id']."'");
			mysql_query("DELETE FROM `history` WHERE `graczid` = '".$user['id']."'");
			mysql_query("DELETE FROM `logins` WHERE `userid` = '".$user['id']."'");
			mysql_query("DELETE FROM `odznaczenia` WHERE `od_gracza` = '".$user['id']."'");
			mysql_query("DELETE FROM `odznaczenia` WHERE `do_gracza` = '".$user['id']."'");
			mysql_query("DELETE FROM `reports` WHERE `receiver_userid` = '".$user['id']."'");
			mysql_query("DELETE FROM `rezerwacje` WHERE `od_gracza` = '".$user['id']."'");
			mysql_query("DELETE FROM `sessions` WHERE `userid` = '".$user['id']."'");
			mysql_query("DELETE FROM `ulubione` WHERE `gracz` = '".$user['id']."'");
			mysql_query("DELETE FROM `f_ankiety` WHERE `uid` = '".$user['id']."'");
			
			//Usu� plemie je�li gracz jest ostatnim cz�onkiem
			$members = mysql_query("SELECT `members` FROM `ally` WHERE `id` = '".$user['ally']."'");
			if($members == 1) delte_empty_ally();
			
			//Ustaw brak za�o�yciela w plemieniu je�li gracz by� za�o�ycielem
			if($user['ally_found'] == 1 && $members > 1) {
			mysql_query("UPADTE `ally` SET `none_found` = '1' WHERE `id` = '".$user['ally']."'");
			}

				//Zmieni� nazwy wszystkich wiosek kt�re do niego nale�a�y
			mysql_query("UPDATE `villages` SET `userid` = '-1' , `name` = '".$config['left_name']."' WHERE `userid` = '".$user['id']."'");
			header('location: index.php');
			exit;
			} else {
			$error = 'Apresente o passe correta.';
			}
		} else {
		$error = 'Estará realizando ações.';
		}
	}
	
$tpl->assign('error',$error);
?>