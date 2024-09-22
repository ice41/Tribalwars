<?php
//Jeœli w³amano siê bezpoœrednio do tego pliku, to oddaj error:
if (!is_object($bonus)) {
	die("B³¹d dostêpu!");
	}
	
$dispaly_footer = true;

if ($_GET['try'] === 'confirm_send' && count($_POST) > 0 && isset($_POST['x']) && isset($_POST['y'])) {

	//Utworzyæ tablicê surowców
	$res_array = array(
		'stone' => $_POST["stone"],
		'wood' => $_POST["wood"],
		'iron' => $_POST["iron"]
		);
		
	$effect = compare_send_dealer($_POST['x'],$_POST['y'],$res_array,$village['id']);
	if (is_array($effect)) {
		$dispaly_footer = false;
		$_GET['screen'] = 'market_confirm_send';
		
		$to_vinfo = sql("SELECT id,userid,name FROM `villages` WHERE `x` = '".$effect[0]."' AND `y` = '".$effect[1]."'","assoc");
		$send_array['to_villageid'] = $to_vinfo['id'];
		$send_array['to_villagename'] = entparse($to_vinfo['name']);
		$send_array['to_x'] = $effect[0];
		$send_array['to_y'] = $effect[1];
		$send_array['to_userid'] = $to_vinfo['userid'];
		$send_array['to_username'] = entparse(sql("SELECT `username` FROM `users` WHERE `id` = '".$to_vinfo['userid']."'","array"));
		$send_array['stone'] = $effect[2]['stone'];
		$send_array['wood'] = $effect[2]['wood'];
		$send_array['iron'] = $effect[2]['iron'];
		$send_array['dealers'] = ceil(($send_array['stone'] + $send_array['wood'] + $send_array['iron']) / 1000);
		//Obliczyæ czas drogi kupców:
		$send_array['dealer_running'] = get_dealer_time($village['x'],$village['y'],$effect[0],$effect[1]);
		$send_array['time_to'] = $pl->format_date(date("U") + $send_array['dealer_running']);
		$send_array['time_back'] = $pl->format_date(date("U") + (2 * $send_array['dealer_running']));
		$send_array['dealer_running'] = format_time(2 * $send_array['dealer_running']);
		
		$tpl->assign("confirm",$send_array);
		} else {
		$error = $effect;
		}
	}
	
if ($_GET['action'] === 'send' && isset($_POST['x']) && isset($_POST['y'])) {
	if ($_GET['h'] == $session['hkey']) {
		//Utworzyæ tablicê surowców
		$res_array = array(
			'stone' => $_POST["stone"],
			'wood' => $_POST["wood"],
			'iron' => $_POST["iron"]
			);
			
		$effect = compare_send_dealer($_POST['x'],$_POST['y'],$res_array,$village['id']);
		if (is_array($effect)) {
			$to_vid = sql("SELECT `id` FROM `villages` WHERE `x` = '".$effect[0]."' AND `y` = '".$effect[1]."'","array");
		
			wyslij_kupcow($to_vid,$village['id'],$effect[2]);
			
			mysql_query("UPDATE `users` SET `last_command` = '".$effect[0].';'.$effect[1]."' WHERE `id` = '".$user['id']."'");
			add_history($to_vid,$user['id']);
			
			header('location: game.php?village='.$village['id'].'&screen=market&mode=send');
			exit;
			} else {
			$error = $effect;
			}
		} else {
		$error = 'B³¹d wykonywania akcji.';
		}
	}
	
if ($dispaly_footer) {
	if ($_GET['action'] === 'cancel' && isset($_GET['id'])) {
		if ($_GET['h'] == $session['hkey']) {
			$_GET['id'] = floor((int)$_GET['id']);
			if ($_GET['id'] < 0) {
				$_GET['id'] = 0;
				}
				
			$czy_wlasny = sql("SELECT COUNT(id) FROM `dealers` WHERE `from_village` = '".$village['id']."' AND `id` = '".$_GET['id']."' AND `type` = 'to'","array");
			if ($czy_wlasny > 0) {
				$transport_info = sql("SELECT start_time FROM `dealers` WHERE `id` = '".$_GET['id']."'","assoc");
				
				$trn_time_as_start = date("U") - $transport_info['start_time'];
				if ($trn_time_as_start > ($config['cancel_dealers'] * 60)) {
					$error = 'Nie mo¿na zawróciæ danego transportu';
					} else {
					$start_time = date("U");
					$end_time = $start_time + $trn_time_as_start;
					mysql_query("UPDATE `dealers` SET
						`type` = 'back' ,
						`end_time` = '$end_time' ,
						`start_time` = '$start_time'
						WHERE `id` = '".$_GET['id']."'");
						
					mysql_query("UPDATE `events` SET `event_time` = '$end_time' WHERE `event_id` = '".$_GET['id']."' AND `event_type` = 'dealers'");
					
					header('location: game.php?village='.$village['id'].'&screen=market&mode=send');
					exit;
					}
				} else {
				$error = 'Transport nie istnieje';
				}
			} else {
			$error = 'B³¹d wykonywania akcji.';
			}
		}
		
	$can_send = $inside_dealers * 1000;
	$res_sum = $village["r_wood"] + $village["r_stone"] + $village["r_iron"];

	$max = array();

	if ($can_send >= $res_sum) {
		$max["stone"] = $village["r_stone"];
		$max["wood"] = $village["r_wood"];
		$max["iron"] = $village["r_iron"];
		} else {
		$max["stone"] = $can_send;
		$max["wood"] = $can_send;
		$max["iron"] = $can_send;
		}
		
	//Walidacja get'ów
	if (isset($_GET['target'])) {
		$_GET['target'] = (int)$_GET['target'];
		$_GET['target'] = floor($_GET['target']);
		if ($_GET['target'] < 0) {
			$_GET['target'] = 0;
			}
		if ($_GET['target'] > 10000000) {
			$_GET['target'] = 10000000;
			}
				
		$values = sql("SELECT x,y FROM `villages` WHERE `id` = '".$_GET['target']."' LIMIT 1",'assoc');
		}
		
	$tpl->assign("max",$max);
	$tpl->assign('coords',$values);
	
	//W³asne transporty:
	$sql = mysql_query("SELECT id,type,to_village,wood,stone,iron,start_time,end_time,dealers FROM `dealers` WHERE `from_village` = '".$village['id']."'");
	while ($array = mysql_fetch_assoc($sql)) {
		$to_vill_info = sql("SELECT x,y,name,continent FROM `villages` WHERE `id` = '".$array['to_village']."'","assoc");
		$own[$array["id"]]["villagename"] = entparse($to_vill_info["name"]) . " (" . $to_vill_info["x"] . "|" . $to_vill_info["y"] . ") K" . $to_vill_info["continent"];
		$own[$array["id"]]["villageid"] = $array['to_village'];
		$own[$array["id"]]["type"] = $array['type'];
		$own[$array["id"]]["wood"] = $array['wood'];
		$own[$array["id"]]["stone"] = $array['stone'];
		$own[$array["id"]]["iron"] = $array['iron'];
		$own[$array["id"]]["dealers"] = $array['dealers'];
		$own[$array["id"]]["duration"] = format_time(($array['end_time'] - $array['start_time']) * 2);
		$own[$array["id"]]["arrival"] = $pl->format_date($array['end_time']);
		$own[$array["id"]]["arrival_in_sek"] = $array['end_time'] - date("U");
		$own[$array["id"]]["arrival_in"] = format_time($array['end_time'] - date("U"));
		if ($array['type'] === "to") {
			$trn_time_as_start = date("U") - $array['start_time'];
			if ($trn_time_as_start > ($config['cancel_dealers'] * 60)) {
				$own[$array["id"]]['can_cancel'] = false;
				} else {
				$own[$array["id"]]['can_cancel'] = true;
				}
			}
		}
		
	$tpl->assign('own',$own);
	
	//Przychodz¹ce transporty:
	$sql = mysql_query("SELECT id,from_village,wood,stone,iron,end_time,from_userid FROM `dealers` WHERE `to_village` = '".$village['id']."' AND `type` = 'to'");
	while ($array = mysql_fetch_assoc($sql)) {
		$from_vill_info = sql("SELECT x,y,name,continent FROM `villages` WHERE `id` = '".$array['from_village']."'","assoc");
		$others[$array["id"]]["villagename"] = entparse($from_vill_info["name"]) . " (" . $from_vill_info["x"] . "|" . $from_vill_info["y"] . ") K" . $from_vill_info["continent"];
		$others[$array["id"]]["villageid"] = $array['from_village'];
		
		$others[$array["id"]]["see_ress"] = true;
		$others[$array["id"]]["iron"] = $array['iron'];
		$others[$array["id"]]["wood"] = $array['wood'];
		$others[$array["id"]]["stone"] = $array['stone'];

		$others[$array["id"]]["arrival"] = $pl->format_date($array['end_time']);
		$others[$array["id"]]["arrival_in_sek"] = $array['end_time'] - date("U");
		$others[$array["id"]]["arrival_in"] = format_time($array['end_time'] - date("U"));
		}
		
	$tpl->assign('others',$others);
	
	$last_command = sql("SELECT `last_command` FROM `users` WHERE `id` = '".$user['id']."'",'array');
	$last_command = explode(';',$last_command);
	$last_command = array('x' => $last_command[0],'y' => $last_command[1]);
	
	$tpl->assign('last_command',$last_command);
	}
	
$tpl->assign("error",$error);
?>