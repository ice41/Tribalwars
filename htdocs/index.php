<?php
/*****************************************/
/*=======================================*/
/*     PLIK: index.php   		 		 */
/*     DATA: 10.12.2011r        		 */
/*     ROLA: Mo�liwo�� zalogownia si�	 */
/*     AUTOR: SIR ROLAND 
                */
/*=======================================*/
/*****************************************/

require ('include.ini.php');


if ($_GET['action'] == 'login' and isset($_POST)) {
	//Walidacja:
	$_POST['user'] = cmp_str($_POST['user'],0,100);

	
	$efekt = zaloguj($_POST['user'],$_POST['password']);
	if (is_array($efekt)) {
		if ($efekt[2] == 1) {
			$speedlogin = true;
			} else {
			$speedlogin = false;
			}
		} else {
		$error = $efekt;
		}
	}
	


$counts_loged_players = sql("SELECT COUNT(id) FROM `zalogowani` WHERE `client_ip` = '".GetClientIP()."'",'array');
if ($counts_loged_players > 0 || $speedlogin == true) {
	$loging = false;
	if ($speedlogin == true) {
		$userid = $efekt[0];
		$wybiez_swiat = true;
		} else {
		$userid = sql("SELECT `client_id` FROM `zalogowani` WHERE `client_ip` = '".GetClientIP()."' LIMIT 1",'array');
		$wybiez_swiat = false;
		}

$user_info = sql("SELECT * FROM `gracze` WHERE `id` = '".$userid."'",'assoc');
$us_id = $user_info['id'];
 //Dodaj sesj� w supporcie:
//Funkcja Losuj�ca kod sesji:
 function WoW($value) { 
   $caracts = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUWXYZ";
    
for ($car = 0; $car < $value; $car++) {
   $var = $caracts[mt_rand(0,strlen($caracts)-1)];
  
}
return $var;
}
		$session1 = WoW(80);
		$session2 = WoW(80);
		$session = $session1."-".$session2;
		setcookie("sesja_plemiona", $session, time()+31622400);
		$db = mysql_query("UPDATE gracze SET session = '$session' WHERE id = '$us_id'");	
	//Je�li gracz ma admina, dodaj jego sesj� w Panelu administraotra:
if($user_info['admin'] == '0') {
setcookie('admin_isset','H2KeYaaDmiinIS');
}
	$user_info['serwery_gry'] = explode(';',$user_info['serwery_gry']);
	$user_info['nazwa'] = entparse($user_info['nazwa']);
	if ($_GET['action'] == 'wyloguj') {
		wyloguj();
		}
	if ($_GET['action'] == 'wybierz_swiat' and isset($_POST)) {
		$wybiez_swiat = true;
		}
		
	if ($_GET['action'] == 'zaloguj') {

		if (empty($_POST['user']) || empty($_POST['password']) || empty($_GET['serwer'])) {
		die ('ERROR!');
		}		
		//Usun�� potencjalnie niebezpieczne znaki ze zmiennych:		
		$_POST['user'] = cmp_str($_POST['user'],0,100);
		$_POST['password'] = cmp_str($_POST['password'],0,100);
	    $_GET['serwer'] = cmp_str($_GET['serwer'],1,4);

		zaloguj_na_serwer($user_info,$_POST['password'],$_POST['user'],$_GET['serwer']);
		}
	$tpl->assign('user_info',$user_info);
	$tpl->assign('wybierz_swiat',$wybiez_swiat);
	} else {
	$loging = true;

    
	$l_val = sql("SELECT nazwa FROM `gracze` WHERE `id` = '".$_GET['gracz']."'",'assoc');
	$l_val2 = $l_val['nazwa'];
	$tpl->assign('l_val',str_validator($l_val2));
	}
	
//Pobra� og�oszenia z bazy danych:
$query['big_arr'] = mysql_query("SELECT * FROM `ogloszenia` ORDER BY data DESC LIMIT 30");
while ($og_info = mysql_fetch_array($query['big_arr'])) {
	$_ocounter += 1;
	$ogloszenia[$og_info['id']]['text'] = urldecode($og_info['text']);
	$ogloszenia[$og_info['id']]['typ'] = urldecode($og_info['typ']);
	$ogloszenia[$og_info['id']]['nazwa'] = urldecode($og_info['nazwa']);
	$ogloszenia[$og_info['id']]['data'] = formatuj_date($og_info['data']);
	$ogloszenia[$og_info['id']]['counter'] = $_ocounter;
	}
	$ogl = sql("SELECT typ FROM `ogloszenia` WHERE `id` = '".$userid."'",'assoc');



$tpl->assign('username',$username);
	

//Sprawdzi� wymaganie Aktywacji konta
if ($configs['aktywacja'] == 'true') {
$wa = 'true';
}




if($_GET['action'] == 'login') {
$p_l = true;
} else {
$p_l = false;
}



$tpl->assign('serwer',$serwer);
$tpl->assign('wa',$wa);
$tpl->assign('error',$error);

$tpl->assign('mode',$mode);

// $handle=fopen("http://plemiona-silnik.zz.mu/wersja.php", 'r');
// $check=fgetcsv($handle,1024);
// fclose($handle);
// $nw = $check[0];


//Pobra� ilo�� graczy z bazy danych:
$players = mysql_num_rows(mysql_query("select * from gracze"));
if(empty($_GET['server'])) {
$serwer = $serwery[(count($serwery) - 1)];
} else {
$serwer = $_GET['server'];
$serwer = str_replace('mundo','',$serwer);
}
	
$admin = mysql_query("SELECT * FROM gracze WHERE admin != '1'");
$admins = mysql_num_rows($admin);
$tpl->assign('lock',$lock);
$tpl->assign('nw',$nw);
$tpl->assign('admins',$admins);
$tpl->assign('serwer',$serwer);
$tpl->assign('wa',$wa);
$tpl->assign('p_l',$p_l);	
$tpl->assign('players',$players);	
$tpl->assign('ogloszenia',$ogloszenia);
$tpl->assign('toplisty',$toplisty);
$tpl->assign('speedlogin',$speedlogin);
if ($speedlogin == true) {
	$tpl->assign('user_arr',$efekt);
	}
	$tpl->assign('p_s',$p_s);	
$tpl->assign('can_log',$loging);
$tpl->assign('error',$error);
$tpl->assign('serwery',$serwery);
$tpl->assign('linki',$linki);
$tpl->assign('ns',$conf['nazwa_serwera']);
ob_end_flush();

$tpl->display('index.tpl');?>



