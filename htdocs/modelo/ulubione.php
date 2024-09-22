<?php
/****************************************************/
/*==================================================*/
/*     PLIK: history.php   				            */
/*     DATA: 18.03.2012r        				    */
/*     ROLA: pokazuje historiê atakowanych wiosek	*/
/*     AUTOR: SIR ROLAND               				*/
/*==================================================*/
/****************************************************/

/*MA£E ZABESPIECZENIE PLEMION PRZED HAKERAMI :)*/

class GLOBALS {
	var $defined_globals = array();
	
	function define_global($globalname) {
		if (is_array($globalname)) {
			foreach ($globalname as $globalne) {
				$this->defined_globals[$globalne] = TRUE;
				}
			} else {
			$this->defined_globals[$globalname] = TRUE;
			}
		}
		
	function unregister_undefined_globals() {		
		$HTTP_GETS = $_GET;
		
		foreach ($HTTP_GETS as $HTTP_KEY => $HTTP_VAL) {
			unset($GLOBALS[$HTTP_KEY]);
			}
		}
	}
	
/*ZDEFINIUJ ZMIENNE POCHODZ¥CE OD USERA, KTÓRE MOG¥ BYÆ AKCEPTOWANE*/
$DS_USER_GLOBALS = new GLOBALS;
$DS_USER_GLOBALS->unregister_undefined_globals();
	
require ("include.inc.php");	

$sid = new sid();
$user_sid = $sid->check_sid($_COOKIE['session']);
	
if (is_array($user_sid)) {
	$sql = mysql_query("SELECT wioska FROM `ulubione` WHERE `gracz` = '".$user_sid['userid']."'");
	while ($array = mysql_fetch_assoc($sql)) {
		$vinfo = sql("SELECT name,continent,x,y FROM `villages` WHERE `id` = '".$array['wioska']."'",'assoc');
		$links_arr[] = '<a href="#" onclick="insertNumId('."'x'".','."'".$vinfo['x']."'".');insertNumId('."'y'".','."'".$vinfo['y']."'".');javascript:inlinePopupClose()">' .
			entparse($vinfo['name']) . ' (' . $vinfo['x'] . '|' . $vinfo['y'] . ') K' . $vinfo['continent'] . '<a>';
		}
	} else {
	header('LOCATION: sid_wrong.php');
	exit;
	}
?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<center>
	<table class="vis padding2" width="100%">
		<tr>
			<th height="20px">Wioski dodane do ulubionych:</th>
		</tr>
		<? if (is_array($links_arr)): ?>
			<? foreach ($links_arr as $link): ?>
				<tr>
					<td height="18px"><? echo $link; ?></td>
				</tr>
			<? endforeach; ?>
		<? endif; ?>								
	</table>
</center>