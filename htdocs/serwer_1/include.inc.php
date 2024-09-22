<?php
/*****************************************/
/*=======================================*/
/*     PLIK: include.inc.php   		 	 */
/*     DATA: 15.12.2011r        		 */
/*     ROLA: Plik ³aduj¹cy klasy		 */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

//Poka¿ 20 cyfr po przecinku:
ini_set('precision','20');

require ('lib/parse_time.php');
$ParseTime = new parse_time();
$ParseTime->start();

if (!isset($_DB_CONNECT)) {
	//Kody dostêpu do pliku game.php - nie usuwaæ!
	$DWSWxABRcFGKnrkrvhgIWKimsfhQBAEZVrRTD = 'FSrBaQAIzLsYrdAUEMrhUefQjAxQqOPCI';
	$ejzrpJHCoQCHTDzDjoReBpmMHuDQmXyM = 'GLuGYJhHTjcYjQZoMiAgUthZbSihvDrsB';
	$afhRcSSvCkOfJckpCsYKaQhrdFFxMZkhAzU = 'ioaosetXVzjnxGDZNLQchbzkCbljTpygs';
	$OYTtShpnZUfRKQMMHKsAylLibPKAEigpZ = 'uJczAAJPAMYURnzNuSYyJoFuwUsYlRLyjEh';
	$pQIQxhJmlHDkcKUuELOQPUQtVBQLStvaB = 'hMzdGaucjWJZFckNKoXhQduaJIdaBEA';
	$UAQixDGrDpKFAjqSIJWQfvgRSUPJHPZiD = 'GyhkrYKMvDDEbjvJbrzKEGVVyPURdQ';
	$lsLrRczVefePQWsEYpvrKEMpKmDMVihBZEv = 'FlUiZRjJqGjPReTGNTgASaEuXOsJPGMgz';
	$nKvvmHnMHTkCRgdBqzmavDhFjmrHoAcRde = 'egKXfdPPVnCeyNbIUPXYcHNZdtgtDaUwHag';
	$ofaZsvdVoIzygdckmSXKbSAsBsAfZNZ = 'pcuuhGCjHpNbRkZrdhXLhGdDGYofQCQTW';
	$dqKusarYFDnqPuEmjngxFbzDSyrkMwZdT = 'bQztplgLtRtvHtPyYGwzNzOnLolnkthASNzctz';
	$SvvJfdGbZPGRszawBjiEfHmKjXdERerZSSEghuGYGYI = 'IJaSmmmKKK333333333333333333333333333333333DXXEXEZZW';

	$sicherABCdkd8338dJK = 'skjdjhsdudJJJSHdndnjJJSHJKSAHDKJASHDjhz984z45tdshfpsd';
	require 'include/config.php';
	require 'lib/smarty/smarty.class.php';
	}

require 'lib/functions.php';

require 'lib/DB.php';

require 'lib/bonus.php';

$db = new db_mysql();
$db->connect($config['db_host'],$config['db_user'],$config['db_pw'],$config['db_name']);
	
require 'lib/GetVillageData.php';

require 'lib/GetUserData.php';

require 'lib/sid.php';
	
require 'lib/techs.php';

require 'lib/builds.php';

require 'lib/units.php';

require 'lib/do_action.php';

require 'include/configs/buildings.php';

require 'include/configs/raw_material_production.php';

require 'include/configs/farm_limits.php';

require 'include/configs/max_storage.php';

require 'include/configs/max_hide.php';

require 'include/configs/builds_starts_by_one.php';

require 'include/configs/units.php';

require 'include/configs/techs.php';

require 'include/configs/bonus.php';

require 'include/configs/max_wall_bonus.php';

require 'include/configs/dealers.php';

require 'lib/add_report.php';

$cl_reports = new add_report();

require 'lib/awards.php';
?>