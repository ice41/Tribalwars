<?php
//Akcje:
if ($user['ally_found'] || $user['ally_lead']) {
	if ($_GET['action'] === 'mod' && count($_POST) > 0) {
		if ($_GET['h'] == $session['hkey']) {
			$_POST['sel_player_id'] = floor((int)$_POST['sel_player_id']);
			if ($_POST['sel_player_id'] < 0) {
				$_POST['sel_player_id'] = 0;
				}
				
			$count = sql("SELECT COUNT(id) FROM `users` WHERE `id` = '".$_POST['sel_player_id']."' AND `ally` = '".$user['ally']."'",'array');
			if ($count > 0) {
				if ($_POST['ally_action'] === 'kick') {
					if ($_POST['sel_player_id'] != $user['id']) {
						$sel_found = sql("SELECT `ally_found` FROM `users` WHERE `id` = '".$_POST['sel_player_id']."'","array");
						$sel_admin = sql("SELECT `ally_lead` FROM `users` WHERE `id` = '".$_POST['sel_player_id']."'","array");
						if ($sel_found && !$user['ally_found']) {
							$error = "Nie mo¿na wyprosiæ gracza o wy¿szym stopniu";
							} else {
							if ($sel_admin && $user['ally_lead'] && !$user['ally_found']) {
								$error = "Nie mo¿na wyprosiæ gracza o wy¿szym stopniu";
								} else {
								mysql_query("DELETE FROM `czytanie` WHERE `graczid` = '".$_POST['sel_player_id']."'");
								mysql_query("DELETE FROM `rezerwacje` WHERE `od_gracza` = '".$_POST['sel_player_id']."'");
								mysql_query("DELETE FROM `f_ankiety` WHERE `uid` = '".$_POST['sel_player_id']."'");
								mysql_query("UPDATE `users` SET `ally` = '-1' WHERE `id` = '".$_POST['sel_player_id']."'");
								
								//Dodaj nowy event do sojuszu:
								$pname = sql("SELECT `username` FROM `users` WHERE `id` = '".$_POST['sel_player_id']."'","array");
								$title = '<a href="game.php?village=;&screen=info_player&id='.$_POST['sel_player_id'].'">' . entparse($pname). '</a>' . ' zosta³ wyproszony z plemienia przez ' .
									'<a href="game.php?village=;&screen=info_player&id='.$user['id'].'">' . entparse($user['username']). '</a>';
								add_allyevent($user['ally'],$title);
								
								header('location: game.php?village='.$village['id'].'&screen=ally&mode=members');
								exit;
								}
							}
						} else {
						$error = "Nie mo¿na wyprosiæ z sojuszu samego siebie";
						}
					}
				if ($_POST['ally_action'] === 'rights') {
					header('location: game.php?village='.$village['id'].'&screen=ally&mode=rights&uid='.$_POST['sel_player_id']);
					exit;
					}
				} else {
				$error = 'Nie wybrano ¿adnego gracza';
				}
			} else {
			$error = 'B³¹d podczas wykonywania akcji';
			}
		}
		
	if ($_GET['action'] === 'edit_rights' && count($_POST) > 0) {
		if ($_GET['h'] == $session['hkey']) {
			$sql = mysql_query("SELECT `id` FROM `users` WHERE `ally` = '".$user['ally']."'");
			while ($uinfo = mysql_fetch_array($sql)) {
				$uid = $uinfo[0];
				
				$sel_found = sql("SELECT `ally_found` FROM `users` WHERE `id` = '$uid'","array");
				$sel_admin = sql("SELECT `ally_lead` FROM `users` WHERE `id` = '$uid'","array");
				
				if ($sel_found && !$user['ally_found']) {
					$error = "Nie mo¿na wyprosiæ gracza o wy¿szym stopniu";
					} else {
					if ($sel_admin && $user['ally_lead'] && !$user['ally_found']) {
						$error = "Nie mo¿na wyprosiæ gracza o wy¿szym stopniu";
						} else {
						$query = array();
						
						$found_counts = sql("SELECT COUNT(id) FROM `users` WHERE `ally` = '".$user['ally']."' AND `ally_found` = '1'",'array');
					    if ($found_counts <= 1 && $sel_found && !isset($_POST['player_id'][$uid]['found'])) {
							$error = 'Musi zostaæ co najmniej jeden za³o¿yciel.';
							} else {
							if (isset($_POST['player_id'][$uid]['found'])) {
								$_POST['player_id'][$uid]['lead'] = true;
								}
							if (isset($_POST['player_id'][$uid]['lead'])) {
								$_POST['player_id'][$uid]['invite'] = true;
								$_POST['player_id'][$uid]['diplomacy'] = true;
								$_POST['player_id'][$uid]['mass_mail'] = true;
								$_POST['player_id'][$uid]['forum_mod'] = true;
								}
							if (isset($_POST['player_id'][$uid]['forum_mod'])) {
								$_POST['player_id'][$uid]['internal_forum'] = true;
								$_POST['player_id'][$uid]['trusted_member'] = true;
								}
								
							if (isset($_POST['player_id'][$uid]['found'])) {
								$query[] .= "`ally_found` = '1'";
								} else {
								$query[] .= "`ally_found` = '0'";
								}
							if (isset($_POST['player_id'][$uid]['lead'])) {
								$query[] .= "`ally_lead` = '1'";
								} else {
								$query[] .= "`ally_lead` = '0'";
								}
							if (isset($_POST['player_id'][$uid]['invite'])) {
								$query[] .= "`ally_invite` = '1'";
								} else {
								$query[] .= "`ally_invite` = '0'";
								}
							if (isset($_POST['player_id'][$uid]['diplomacy'])) {
								$query[] .= "`ally_diplomacy` = '1'";
								} else {
								$query[] .= "`ally_diplomacy` = '0'";
								}
							if (isset($_POST['player_id'][$uid]['mass_mail'])) {
								$query[] .= "`ally_mass_mail` = '1'";
								} else {
								$query[] .= "`ally_mass_mail` = '0'";
								}
							if (isset($_POST['player_id'][$uid]['forum_mod'])) {
								$query[] .= "`ally_mod_forum` = '1'";
								} else {
								$query[] .= "`ally_mod_forum` = '0'";
								}
							if (isset($_POST['player_id'][$uid]['internal_forum'])) {
								$query[] .= "`ally_forum_switch` = '1'";
								} else {
								$query[] .= "`ally_forum_switch` = '0'";
								}
							if (isset($_POST['player_id'][$uid]['trusted_member'])) {
								$query[] .= "`ally_forum_trust` = '1'";
								} else {
								$query[] .= "`ally_forum_trust` = '0'";
								}
							$query = implode(',',$query);
							
							mysql_query("UPDATE `users` SET $query WHERE `id` = '$uid'");
							}
						}
					}
				}
				
			header('location: game.php?village='.$village['id'].'&screen=ally&mode=members');
			exit;
			} else {
			$error = 'B³¹d podczas wykonywania akcji';
			}
		}
	}
	
//Struktura:
$rank = 0;
$date_arr = explode("-",date("Y-m-d",date("U")));

$sql = mysql_query("SELECT rang,banned,vacation_id,vacation_name,last_activity,id,username,points,villages,ally_titel,ally_found,ally_lead,ally_invite,ally_diplomacy,ally_mass_mail,ally_mod_forum,ally_forum_switch,ally_forum_trust,b_day,b_month,b_year FROM `users` WHERE `ally` = '".$user['ally']."' ORDER BY `points` DESC");
while ($uinfo = mysql_fetch_assoc($sql)) {
	$ausers[$uinfo['id']]['username'] = entparse($uinfo['username']);
	$rank++;
	$ausers[$uinfo['id']]['rank'] = format_number($rank);
	$ausers[$uinfo['id']]['points'] = format_number($uinfo['points']);
	$ausers[$uinfo['id']]['villages'] = format_number($uinfo['villages']);
	$ausers[$uinfo['id']]['rang'] = format_number($uinfo['rang']);
	
	if ($user['ally_found'] || $user['ally_lead']) {
		//Stopnie w sojuszu:
		$ausers[$uinfo['id']]['ally_titel'] = entparse($uinfo['ally_titel']);
		$ausers[$uinfo['id']]['ally_found'] = $uinfo['ally_found'];
		$ausers[$uinfo['id']]['ally_lead'] = $uinfo['ally_lead'];
		$ausers[$uinfo['id']]['ally_invite'] = $uinfo['ally_invite'];
		$ausers[$uinfo['id']]['ally_diplomacy'] = $uinfo['ally_diplomacy'];
		$ausers[$uinfo['id']]['ally_mass_mail'] = $uinfo['ally_mass_mail'];
		$ausers[$uinfo['id']]['ally_mod_forum'] = $uinfo['ally_mod_forum'];
		$ausers[$uinfo['id']]['ally_forum_switch'] = $uinfo['ally_forum_switch'];
		$ausers[$uinfo['id']]['ally_forum_trust'] = $uinfo['ally_forum_trust'];
		
		$ausers[$uinfo['id']]['vacation_id'] = $uinfo['vacation_id'];
		$ausers[$uinfo['id']]['vacation_name'] = entparse($uinfo['vacation_name']);
		
		$ausers[$uinfo['id']]['icons'] = array();
		
		if ($date_arr[1] == $uinfo['b_month'] && $date_arr[2] == $uinfo['b_day']) {
			$ausers[$uinfo['id']]['icons'][] = 'birthday';
			}
			
		$time_inactiv = date("U") - $uinfo['last_activity'];
		if ($time_inactiv < 172800) {
			$ausers[$uinfo['id']]['icons'][] = 'green';
			} else {
			if ($time_inactiv < 604800) {
				$ausers[$uinfo['id']]['icons'][] = 'yellow';
				} else {
				$ausers[$uinfo['id']]['icons'][] = 'red';
				}
			}
			
		if ($uinfo['banned'] === 'Y') {
			$ausers[$uinfo['id']]['icons'][] = 'banned';
			}
			
		if (!empty($uinfo['vacation_name'])) {
			$ausers[$uinfo['id']]['icons'][] = 'vacation';
			}
		}
	}
	
$tpl->assign('members',$ausers);
?>