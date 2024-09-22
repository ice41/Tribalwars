<?php
if ($user['ally_found'] || $user['ally_lead']) {
	$_GET['uid'] = floor((int)$_GET['uid']);
	
	if ($_GET['uid'] < 0) {
		$_GET['uid'] = 0;
		}
		
	$counts = sql("SELECT COUNT(id) FROM `users` WHERE `id` = '".$_GET['uid']."' AND `ally` = '".$user['ally']."'","array");
	if ($counts > 0) {
		$user_rights = sql("SELECT id,username,ally_titel,ally_found,ally_lead,ally_invite,ally_diplomacy,ally_mass_mail,ally_mod_forum,ally_forum_switch,ally_forum_trust FROM `users` WHERE `id` = '".$_GET['uid']."'",'assoc');
		$user_rights['username'] = entparse($user_rights['username']);
		$user_rights['ally_titel'] = entparse($user_rights['ally_titel']);
		
		if ($_GET['action'] === 'edit_rights' && count($_POST) > 0) {
			if ($_GET['h'] == $session['hkey']) {
				$sel_found = $user_rights['ally_found'];
				$sel_admin = $user_rights['ally_lead'];
				
				if ($sel_found && !$user['ally_found']) {
					$error = "Não pode pedir a um jogador com uma classificação mais alta";
					} else {
					if ($sel_admin && $user['ally_lead'] && !$user['ally_found']) {
						$error = "Não pode pedir a um jogador com uma classificação mais alta";
						} else {
						$found_counts = sql("SELECT COUNT(id) FROM `users` WHERE `ally` = '".$user['ally']."' AND `ally_found` = '1'",'array');
					   
						if ($sel_admin && !isset($_POST['found']) && $found_counts <= 1) {
							$error = "Deve haver pelo menos um fundador.";
							} else {
							$_POST['title'] = cmp_str($_POST['title'],1,24);
							if ($_POST['title'] === 'SHORT') {
								$error = 'O texto deve conter pelo menos 1 caractere.';
								}
							if ($_POST['title'] === 'LONG') {
								$error = 'O texto pode ter até 24 caracteres.';
								}
							if ($_POST['title'] === 'SPACES') {
								$error = 'O texto não pode consistir apenas em espaços.';
								}
							
							if (empty($error)) {
								if (isset($_POST['found'])) {
									$_POST['lead'] = true;
									}
								if (isset($_POST['lead'])) {
									$_POST['invite'] = true;
									$_POST['diplomacy'] = true;
									$_POST['mass_mail'] = true;
									$_POST['forum_mod'] = true;
									}
								if (isset($_POST['forum_mod'])) {
									$_POST['internal_forum'] = true;
									$_POST['trusted_member'] = true;
									}
								
								$_POST['title'] = parse($_POST['title']);
									
								$query[] .= "`ally_titel` = '".$_POST['title']."'";
									
								if (isset($_POST['found'])) {
									$query[] .= "`ally_found` = '1'";
									} else {
									$query[] .= "`ally_found` = '0'";
									}
								if (isset($_POST['lead'])) {
									$query[] .= "`ally_lead` = '1'";
									} else {
									$query[] .= "`ally_lead` = '0'";
									}
								if (isset($_POST['invite'])) {
									$query[] .= "`ally_invite` = '1'";
									} else {
									$query[] .= "`ally_invite` = '0'";
									}
								if (isset($_POST['diplomacy'])) {
									$query[] .= "`ally_diplomacy` = '1'";
									} else {
									$query[] .= "`ally_diplomacy` = '0'";
									}
								if (isset($_POST['mass_mail'])) {
									$query[] .= "`ally_mass_mail` = '1'";
									} else {
									$query[] .= "`ally_mass_mail` = '0'";
									}
								if (isset($_POST['forum_mod'])) {
									$query[] .= "`ally_mod_forum` = '1'";
									} else {
									$query[] .= "`ally_mod_forum` = '0'";
									}
								if (isset($_POST['internal_forum'])) {
									$query[] .= "`ally_forum_switch` = '1'";
									} else {
									$query[] .= "`ally_forum_switch` = '0'";
									}
								if (isset($_POST['trusted_member'])) {
									$query[] .= "`ally_forum_trust` = '1'";
									} else {
									$query[] .= "`ally_forum_trust` = '0'";
									}
								$query = implode(',',$query);
									
								mysql_query("UPDATE `users` SET $query WHERE `id` = '".$_GET['uid']."'");
								
								$fatal_error = "NO_ERROR";
								}
							}
						}
					}
				} else {
				$error = 'Erro ao executar a ação';
				}
			}
		
		$tpl->assign('rights',$user_rights);
		} else {
		$fatal_error = "NO_PLAYER";
		}
	} else {
	$fatal_error = "NO_LEAD_OR_FOUND";
	}
	
if (!empty($fatal_error)) {
	header('location: game.php?village='.$village['id'].'&screen=ally&mode=members');
	exit;
	}
?>