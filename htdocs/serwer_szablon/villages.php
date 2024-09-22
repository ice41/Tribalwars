<?php
/*****************************************/
/*=======================================*/
/*     PLIK: villages.php   			 */
/*     DATA: 29.12.2011r        		 */
/*     ROLA: pokazuje wioski gracza		 */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

require ('include.inc.php');

$tpl = new smarty();
$sid = new sid();

if ($sicherABCdkd8338dJK == 'skjdjhsdudJJJSHdndnjJJSHJKSAHDKJASHDjhz984z45tdshfpsd') {
	if ($DWSWxABRcFGKnrkrvhgIWKimsfhQBAEZVrRTD == 'FSrBaQAIzLsYrdAUEMrhUefQjAxQqOPCI' &&
		$ejzrpJHCoQCHTDzDjoReBpmMHuDQmXyM == 'GLuGYJhHTjcYjQZoMiAgUthZbSihvDrsB' &&
		$afhRcSSvCkOfJckpCsYKaQhrdFFxMZkhAzU == 'ioaosetXVzjnxGDZNLQchbzkCbljTpygs' &&
		$OYTtShpnZUfRKQMMHKsAylLibPKAEigpZ == 'uJczAAJPAMYURnzNuSYyJoFuwUsYlRLyjEh' &&
		$pQIQxhJmlHDkcKUuELOQPUQtVBQLStvaB == 'hMzdGaucjWJZFckNKoXhQduaJIdaBEA' &&
		$UAQixDGrDpKFAjqSIJWQfvgRSUPJHPZiD == 'GyhkrYKMvDDEbjvJbrzKEGVVyPURdQ' &&
		$lsLrRczVefePQWsEYpvrKEMpKmDMVihBZEv == 'FlUiZRjJqGjPReTGNTgASaEuXOsJPGMgz' &&
		$nKvvmHnMHTkCRgdBqzmavDhFjmrHoAcRde == 'egKXfdPPVnCeyNbIUPXYcHNZdtgtDaUwHag' &&
		$ofaZsvdVoIzygdckmSXKbSAsBsAfZNZ == 'pcuuhGCjHpNbRkZrdhXLhGdDGYofQCQTW' &&
		$dqKusarYFDnqPuEmjngxFbzDSyrkMwZdT == 'bQztplgLtRtvHtPyYGwzNzOnLolnkthASNzctz' &&
		$SvvJfdGbZPGRszawBjiEfHmKjXdERerZSSEghuGYGYI == 'IJaSmmmKKK333333333333333333333333333333333DXXEXEZZW') {
		} else {
		die ('Brak dostêpu do bazy danych');
		}
		
	$user_sid = $sid->check_sid($_COOKIE['session']);
	
	if (is_array($user_sid)) {
		mysql_query("UPDATE `users` SET = `last_activity` = '".date("U")."' WHERE `id` = '".$user_sid['userid']."'");
		
		$user = sql("SELECT id,villages,aktu_vpage FROM `users` WHERE `id` = '".$user_sid['userid']."'","assoc");
		
		//Sekcja stron:
		$_STRONY = floor($user['villages'] / 30);
		$start_licznik_limit = $user['aktu_vpage'] * 30;
			
		if ($_STRONY > 0) {
			$SEKCJA_OSADY_LINK = 'villages.php';
					
			if ($_GET['action'] == 'zmien_aktulna_strone') {
				$_GET['strona'] = (int)$_GET['strona'];
				if ($_GET['strona'] < 0) {
					$_GET['strona'] = 0;
					}
				if ($_GET['strona'] > $_STRONY) {
					$_GET['strona'] = $_STRONY;
					}
			
				mysql_query("UPDATE `users` SET `aktu_vpage` = '".$_GET['strona']."' WHERE `id` = '".$user['id']."'");
				header("location: $SEKCJA_OSADY_LINK");
				exit;
				}
				
			for ($i = 0; $i <= $_STRONY; $i ++) {
				$SEKCJA_STR = $i + 1;
				if ($i == $user['aktu_vpage']) {
					$_SEKCJA_OSADY .= '<b>'.$SEKCJA_STR.'</b>  ';
					} else {
					$_SEKCJA_OSADY .= '<a href="'.$SEKCJA_OSADY_LINK.'?action=zmien_aktulna_strone&strona='.$i.'">'.$SEKCJA_STR.'<a>  ';
					}
				}
			$_SEKCJA = true;
			} else {
			$_SEKCJA = false;
			}
	
		$wioski_usera = array();
		$wioski_gracza = mysql_query("SELECT id,x,y,continent,name FROM `villages` WHERE `userid` = '".$user['id']."' ORDER by name LIMIT $start_licznik_limit , 30");
		while ($wioska = mysql_fetch_assoc($wioski_gracza)) {
			$wioska['name'] = entparse($wioska['name']);
			$wioski_usera[$wioska['id']]['link'] = '<span onclick="propagateTarget( '.$wioska['x'].', '.$wioska['y'].');" style="cursor: pointer; font-weight:bold; color: #804000;"/>'.$wioska['name'].' ('.$wioska['x'].'|'.$wioska['y'].') K'.$wioska['continent'].'</span>';
			$wioski_usera[$wioska['id']]['id'] = $wioska['id'];
			$wioski_usera[$wioska['id']]['x'] = $wioska['x'];
			$wioski_usera[$wioska['id']]['y'] = $wioska['y'];
			$wioski_usera[$wioska['id']]['continent'] = $wioska['continent'];
			$wioski_usera[$wioska['id']]['name'] = $wioska['name'];
			}
			
		$tpl->assign('sekcja_wiosek',$_SEKCJA_OSADY);
		$tpl->assign('sekcja',$_SEKCJA);
		$tpl->assign('wioski_gracza',$wioski_usera);
		
		$tpl->display('villages.tpl');
		} else {
		header('LOCATION: sid_wrong.php');
		exit;
		}
	} else {
	die ('Nie mo¿na poprawnie za³adowaæ pliku include.inc.php');
	}
?>