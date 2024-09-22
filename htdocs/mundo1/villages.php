<?php
/*****************************************/
/*=======================================*/
/*     PLIK: villages.php   			 */
/*     DATA: 29.12.2011r        		 */
/*     ROLA: pokazuje wioski gracza		 */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

/*MA�E ZABESPIECZENIE PLEMION PRZED HAKERAMI :)*/

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
	
/*DEFINIR VARIÁVEIS DE USUÁRIO QUE PODEM SER ACEITAS*/
$DS_USER_GLOBALS = new GLOBALS;
$DS_USER_GLOBALS->define_global('village');
$DS_USER_GLOBALS->define_global('villages');
$DS_USER_GLOBALS->define_global('id');
$DS_USER_GLOBALS->define_global('x');
$DS_USER_GLOBALS->define_global('y');
$DS_USER_GLOBALS->define_global('screen');
$DS_USER_GLOBALS->define_global('mode');
$DS_USER_GLOBALS->define_global('type');
$DS_USER_GLOBALS->define_global('target');
$DS_USER_GLOBALS->define_global('action');
$DS_USER_GLOBALS->define_global('h');
$DS_USER_GLOBALS->define_global('strona');
$DS_USER_GLOBALS->define_global('page');
$DS_USER_GLOBALS->define_global('rlog');
$DS_USER_GLOBALS->define_global('sort');
$DS_USER_GLOBALS->define_global('order');
$DS_USER_GLOBALS->define_global('filter');
$DS_USER_GLOBALS->define_global('akcja');
$DS_USER_GLOBALS->define_global('group');
$DS_USER_GLOBALS->define_global('try');
$DS_USER_GLOBALS->define_global('view');
$DS_USER_GLOBALS->define_global('item_name');
$DS_USER_GLOBALS->define_global('unit');
$DS_USER_GLOBALS->unregister_undefined_globals();
	
require ("include.inc.php");	

$sid = new sid();
$user_sid = $sid->check_sid($_COOKIE['session']);
	
if (is_array($user_sid)) {
	$user = sql("SELECT id,villages,aktu_vpage,grocusto,aktu_group,villages_per_page FROM `users` WHERE `id` = '".$user_sid['userid']."'","assoc");
	
	//Consultando aldeias mysql com grupos:
	if ($user['aktu_group'] === 'all') {
		$villages_query_extends = '';
		$u_group_villges = $user['villages'];
		} else {
		$villages_query_extends = "AND `group` = '".$user['aktu_group']."'";
		$u_group_villges = sql("SELECT COUNT(id) FROM `villages` WHERE `userid` = '".$user['id']."' AND `group` = '".$user['aktu_group']."'",'array');
		}
		
	//Seção de páginas:
	$_STRONY = floor($u_group_villges / $user['villages_per_page']);
	$start_licznik_limit = $user['aktu_vpage'] * $user['villages_per_page'];
			
	if ($_STRONY > 0) {			
		if ($_GET['action'] == 'zmien_aktulna_strone') {
			$_GET['strona'] = (int)$_GET['strona'];
			$_GET['strona'] = floor($_GET['strona']);
			if ($_GET['strona'] < 0) {
				$_GET['strona'] = 0;
				}
			if ($_GET['strona'] > $_STRONY) {
				$_GET['strona'] = $_STRONY;
				}
			
			mysql_query("UPDATE `users` SET `aktu_vpage` = '".$_GET['strona']."' WHERE `id` = '".$user['id']."'");
			header("location: villages.php");
			exit;
			}
				
		for ($i = 0; $i <= $_STRONY; $i ++) {
			$SEKCJA_STR = $i + 1;
			if ($i == $user['aktu_vpage']) {
				$_SEKCJA_OSADY .= '<b>&gt;'.$SEKCJA_STR.'&lt;</b>  ';
				} else {
				$_SEKCJA_OSADY .= '<a href="#" onclick="return inlinePopup(event, '."'bookmark'".', '."'villages.php?action=zmien_aktulna_strone&strona=".$i."'".', popup_options)">['.$SEKCJA_STR.']</a>  ';
				}
			}
		$_SEKCJA = true;
		} else {
		$_SEKCJA = false;
		}
	
	$wioski_usera = array();
	$wioski_gracza = mysql_query("SELECT id,x,y,continent,name FROM `villages` WHERE `userid` = '".$user['id']."' $villages_query_extends ORDER by name LIMIT $start_licznik_limit , ".$user['villages_per_page']);
	while ($wioska = mysql_fetch_assoc($wioski_gracza)) {
		$wioska['name'] = entparse($wioska['name']);
		$wioski_usera[$wioska['id']]['link'] = '<a href="#" onclick="insertNumId('."'x'".','."'".$wioska['x']."'".');insertNumId('."'y'".','."'".$wioska['y']."'".');javascript:inlinePopupClose()">'.$wioska['name'].' ('.$wioska['x'].'|'.$wioska['y'].') K'.$wioska['continent'].'</a>';
		$wioski_usera[$wioska['id']]['id'] = $wioska['id'];
		$wioski_usera[$wioska['id']]['x'] = $wioska['x'];
		$wioski_usera[$wioska['id']]['y'] = $wioska['y'];
		$wioski_usera[$wioska['id']]['continent'] = $wioska['continent'];
		$wioski_usera[$wioska['id']]['name'] = $wioska['name'];
		}
		
	$session = $user_sid;
	$__link = 'villages.php';
		
	require ('actions/groups_bar.php');

	} else {
	header('LOCATION: sid_wrong.php');
	exit;
	}
?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<center>
	<div class="vis_item" align="center">
		<? if (is_array($grocusto_array_as_all)): ?>
			<? foreach ($grocusto_array_as_all as $group): ?>
				<? if ($group == $user['aktu_group']): ?>
					<strong class="group_tooltip">&gt;<? if ($group === 'all'): echo 'Todas'; else: echo $group; endif;?>&lt; </strong>
				<? else: ?>
					<a class="group_tooltip" href="#" onclick="return inlinePopup(event, 'bookmark', 'villages.php?action=change_group&group=<? echo base64_encode($group);?>&h=<? echo $user_sid['hkey'];?>', popup_options)">[<? if ($group === 'all'): echo 'Todas'; else: echo $group; endif;?>]</a>
				<? endif; ?>	
			<? endforeach; ?>
		<? endif; ?>	
	</div>
	
	<? if ($_SEKCJA): ?>
		<table class="vis padding2" width="100%">
			<tr>
				<td>
					<? echo $_SEKCJA_OSADY;?>
				</td>
			</tr>
		</table>
	<? endif; ?>
									
	<table class="vis padding2" width="100%">
		<tr>
			<th height="20px">Suas aldeias:</th>
		</tr>
		<? if (is_array($wioski_usera)): ?>
			<? foreach ($wioski_usera as $wioska): ?>
				<tr>
					<td height="18px"><? echo $wioska['link']; ?></td>
				</tr>
			<? endforeach; ?>
		<? endif; ?>								
	</table>
</center>