<?php
$configs['pierwszy_admin'] = 'true';
$configs['aktywacja'] = 'false';
require ('mysql.php');

$conf['db_edit'] = '1';
$conf['id_pierwszego_admina'] = '2';
$conf['nazwa_serwera'] = 'Tribos';

//Linki na top menu:
$linki = array (
	
		"rules.php" => "Regras",
		"team.php" => "Equipa",
		"hall_of_fame.php" => "Hall da Fama",
		);
//Wersja silnika:
$conf['version'] = '8.3'; 

//Klucz akcji admina:
$conf['admin_key'] = 'actions_massiv_keyaaassd';

require ('typ.php');
?>
