<?php
if ($_GET['rlog']) {
	$c_end = date("U");
	mysql_query("DELETE FROM `rezerwacje_log` WHERE `czas_koniec` <= '$c_end'");
	
	$sql = mysql_query("SELECT * FROM `rezerwacje_log` WHERE `plemie` = '".$user['ally']."'");
	while ($info = mysql_fetch_assoc($sql)) {
		$info['village'] = sql("SELECT userid,name,x,y,points,continent FROM `villages` WHERE `id` = '".$info['do_wioski']."'",'assoc');
		$info['link'] = '<a href="game.php?village='.$village['id'].'&screen=info_village&id='.$info['do_wioski'].'"/>'.entparse($info['village']['name']).' ('.$info['village']['x'].'|'.$info['village']['y'].') K'.$info['village']['continent'].'</a>';
		$info['od_gname'] = entparse($info['od_gname']);
		$info['od_allyname'] = entparse(sql("SELECT `short` FROM `ally` WHERE `id` = '".$info['plemie'] ."'",'array'));
		$info['last_edit'] = format_date($info['last_edit']);
		$game_rezerwacje_log[] = $info;
		}
		
	$tpl->assign('game_rezerwacje_log',$game_rezerwacje_log);
	$tpl->assign('show_res_log',$_GET['rlog']);
	} else {
	$tpl->assign('show_res_log',$_GET['rlog']);
	
	$double_reservations = false;

	$sojusz_info = sql("SELECT rezerwacje_czas,rezerwacje_max FROM `ally` WHERE `id` = '".$user['ally']."'",'assoc');

	$pzk = 'LOCATION: game.php?village='.$village['id'].'&screen=ally&mode=reservations';

	$gets = '&page='.$_GET['page'].'&sort='.$_GET['sort'].'&order='.$_GET['order'].'&filter='.$_GET['filter'];

	$is_user_admin = false;
	if ($user['ally_diplomacy'] == 1 || $user['ally_lead'] == 1 || $user['ally_found'] == 1) {
		$is_user_admin = true;
		} else {
		$is_user_admin = false;
		}

	if ($_GET['action'] == 'save_reservation_settings' && $is_user_admin && count($_POST) > 0) {
		if ($_GET['h'] == $session['hkey']) {
			$_POST['reservation_limit'] = (INT)$_POST['reservation_limit'];
			$_POST['reservation_time'] = (INT)$_POST['reservation_time'];
		
			$_POST['reservation_limit'] = floor($_POST['reservation_limit']);
			$_POST['reservation_time'] = floor($_POST['reservation_time']);
		
			if ($_POST['reservation_limit'] < 3) {
				$_POST['reservation_limit'] = 3;
				}
			if ($_POST['reservation_time'] < 3) {
				$_POST['reservation_time'] = 3;
				}
			if ($_POST['reservation_limit'] > 500) {
				$_POST['reservation_limit'] = 500;
				}
			if ($_POST['reservation_time'] > 60) {
				$_POST['reservation_time'] = 60;
				}

			mysql_query("UPDATE `ally` SET `rezerwacje_czas` = '".$_POST['reservation_time']."' , `rezerwacje_max` = '".$_POST['reservation_limit']."' WHERE `id` = '".$user['ally']."'");
			header($pzk.$gets);
			exit;
			} else {
			$error = 'B³¹d podczas wykonywania akcji';
			}
		}
	
	if ($_GET['action'] == 'save_page_size' && count($_POST) > 0) {
		if ($_GET['h'] == $session['hkey']) {
			$_POST['reservation_page_size'] = (INT)$_POST['reservation_page_size'];
		
			$_POST['reservation_page_size'] = floor($_POST['reservation_page_size']);
		
			if ($_POST['reservation_page_size'] < 10) {
				$_POST['reservation_page_size'] = 10;
				}
			if ($_POST['reservation_page_size'] > 150) {
				$_POST['reservation_page_size'] = 150;
				}
			
			mysql_query("UPDATE `users` SET `rezerwacje_nstr` = '".$_POST['reservation_page_size']."' WHERE `id` = '".$user['id']."'");
			header($pzk.$gets);
			exit;
			} else {
			$error = 'B³¹d podczas wykonywania akcji';
			}
		}
	
	if ($_GET['action'] == 'add_partner' && $is_user_admin && count($_POST) > 0) {
		if ($_GET['h'] == $session['hkey']) {
			$_POST['partner_ally'] = parse($_POST['partner_ally']);
			$ally_counts = sql("SELECT COUNT(id) FROM `ally` WHERE `short` = '".$_POST['partner_ally']."'",'array');
			if ($ally_counts < 1) {
				$error = 'Podana nazwa plemienia nie istnieje';
				} else {
				$ally_id = sql("SELECT `id` FROM `ally` WHERE `short` = '".$_POST['partner_ally']."'",'array');
				if ($ally_id == $user['ally']) {
					$error = 'Nie mozna dodaæ w³asnego plemienia';
					} else {
					$counts_in_dzielenie_rezerwacji = sql("SELECT COUNT(id) FROM `dzielenie_rezerwacji` WHERE `do_plemienia` = '".$ally_id."'",'array');
					if ($counts_in_dzielenie_rezerwacji < 1) {
						mysql_query("INSERT INTO dzielenie_rezerwacji(od_plemienia,do_plemienia) VALUES('".$user['ally']."','$ally_id')");
						header($pzk.$gets);
						exit;
						} else {
						$error = 'Ju¿ dzielisz rezerwacje z plemieniem '.entparse($_POST['partner_ally']);
						}
					}
				}	
			} else {
			$error = 'B³¹d podczas wykonywania akcji';
			}
		}
	
	if ($_GET['action'] == 'del_partner' && $is_user_admin) {
		if ($_GET['h'] == $session['hkey']) {
			$_GET['id'] = (int)$_GET['id'];
			$counts_in_dzielenie_rezerwacji = sql("SELECT COUNT(id) FROM `dzielenie_rezerwacji` WHERE `od_plemienia` = '".$user['ally']."' AND `id` = '".$_GET['id']."'",'array');
			if ($counts_in_dzielenie_rezerwacji > 0) {
				mysql_query("DELETE FROM `dzielenie_rezerwacji` WHERE `id` = '".$_GET['id']."'");
				header($pzk.$gets);
				exit;
				} else {
				$error = 'B³¹d podczas wykonywania akcji';
				}
			}
		}
	
	if ($_GET['action'] == 'new_reservations' && count($_POST) > 0) {
		if ($_GET['h'] == $session['hkey']) {
			if ($_POST['typ_akcji'] === 'add_new') {
				if (count($_POST['x']) < 10) {
					$add_new = true;
					$double_reservations = true;
					foreach ($_POST['x'] as $pid => $val) {
						$out_array[] = array('x' => $val,'y' => $_POST['y'][$pid]);
						}
					} else {
					$add_new = false;
					$double_reservations = true;
					foreach ($_POST['x'] as $pid => $val) {
						$out_array[] = array('x' => $val,'y' => $_POST['y'][$pid]);
						}
					$error = 'Maksymalnie mo¿na dodaæ jednoczeœnie 10 rezerwacji';
					}
				}
			elseif ($_POST['typ_akcji'] === 'add_reserv') {
				foreach ($_POST['x'] as $pid => $val) {
					$rx = $val;
					$ry = $_POST['y'][$pid];
				
					$counts_for_vids = sql("SELECT COUNT(id) FROM `villages` WHERE `x` = '$rx' AND `y` = '$ry'",'array');
					if ($counts_for_vids >= 1) {
					$village_vid = sql("SELECT `id` FROM `villages` WHERE `x` = '$rx' AND `y` = '$ry'",'array');
						if ($village_vid != $village['id']) {
							$counts = sql("SELECT COUNT(id) FROM `rezerwacje` WHERE `do_wioski` = '$village_vid' AND `od_plemienia` = '".$user['ally']."'",'array');
							$counts_as_player = sql("SELECT COUNT(id) FROM `rezerwacje` WHERE `od_gracza` = '".$user['id']."'",'array');
							if ($counts < 1 && $counts_as_player < $sojusz_info['rezerwacje_max']) {
								$czas_start_rezerwacji = date("U");
								$czas_koniec_rezerwacji = $czas_start_rezerwacji + ($sojusz_info['rezerwacje_czas'] * 86400);
								mysql_query("INSERT INTO rezerwacje(do_wioski,od_gracza,od_plemienia,start,koniec,od_gname) VALUES('$village_vid','".$user['id']."','".$user['ally']."','$czas_start_rezerwacji','$czas_koniec_rezerwacji','".$user['username']."')");
								$id_rezerwacji = sql("SELECT `id` FROM `rezerwacje` ORDER BY `id` DESC LIMIT 1",'array');
								mysql_query("INSERT INTO events(event_time,event_type,event_id) VALUES($czas_koniec_rezerwacji,'rezerwacja',$id_rezerwacji)");
								$czas_koniec_rezerwacji = $czas_start_rezerwacji + (5 * 86400);
								mysql_query("INSERT INTO rezerwacje_log(id,do_wioski,od_gracza,plemie,last_edit,czas_koniec,od_gname) VALUES('$id_rezerwacji','$village_vid','".$user['id']."','".$user['ally']."','$czas_start_rezerwacji','$czas_koniec_rezerwacji','".$user['username']."')");
								}
							}
						}
					}
			
				//header($pzk);
				//exit;
				} else {
				$error = 'B³¹d podczas wykonywania akcji';
				}
			} else {
			$error = 'B³¹d podczas wykonywania akcji';
			}
		}
	
	if ($_GET['action'] == 'delete_reservations') {
		if ($_GET['h'] == $session['hkey']) {
			$_GET['id'] = (int)$_GET['id'];
			$count = sql("SELECT COUNT(id) FROM `rezerwacje` WHERE `id` = '".$_GET['id']."'",'array');
			if ($count > 0) {
				$res_info = sql("SELECT od_plemienia,od_gracza FROM `rezerwacje` WHERE `id` = '".$_GET['id']."'",'assoc');
				if ($res_info['od_plemienia'] == $user['ally']) {
					if ($is_user_admin) {
						$id = (int)$_GET['id'];
						mysql_query("DELETE FROM `rezerwacje` WHERE `id` = '$id'");
						mysql_query("DELETE FROM `events` WHERE `event_id` = '$id' AND `event_type` = 'rezerwacja'");
						mysql_query("UPDATE `rezerwacje_log` SET `proces` = '2' , `last_edit` = '".date("U")."' WHERE `id` = '$id'");
						header($pzk.$gets);
						exit;
						} else {
						if ($res_info['od_gracza'] == $user['id']) {
							$id = (int)$_GET['id'];
							mysql_query("DELETE FROM `rezerwacje` WHERE `id` = '$id'");
							mysql_query("DELETE FROM `events` WHERE `event_id` = '$id' AND `event_type` = 'rezerwacja'");
							mysql_query("UPDATE `rezerwacje_log` SET `proces` = '2' , `last_edit` = '".date("U")."' WHERE `id` = '$id'");
							header($pzk.$gets);
							exit;
							} else {
							$error = 'Nie mo¿esz usun¹æ tej rezerwacji';
							}
						}
					} else {
					$error = 'Nie ma takiej rezerwacji';
					}
				} else {
				$error = 'Nie ma takiej rezerwacji';
				}
			} else {
			$error = 'B³¹d podczas wykonywania akcji';
			}
		}
	
	if ($_GET['action'] == 'submit') {
		if ($_GET['h'] == $session['hkey']) {
			if (is_array($_POST['ids'])) {
				foreach ($_POST['ids'] as $rid) {
					$rid = floor((int)$rid);
					mysql_query("DELETE FROM `rezerwacje` WHERE `id` = '$rid'");
					mysql_query("DELETE FROM `events` WHERE `event_id` = '$rid' AND `event_type` = 'rezerwacja'");
					mysql_query("UPDATE `rezerwacje_log` SET `proces` = '2' , `last_edit` = '".date("U")."' WHERE `id` = '$rid'");
					}
				header($pzk.$gets);
				exit;
				} else {
				header($pzk.$gets);
				exit;
				}
			} else {
			$error = 'B³¹d podczas wykonywania akcji';
			}
		}
	
	//Utwurz tablicê z dzieleniem rezerwacji od plemienia:
	$sql = mysql_query("SELECT * FROM `dzielenie_rezerwacji` WHERE `od_plemienia` = '".$user['ally']."'");
	while ($info = mysql_fetch_assoc($sql)) {
		$info['skrot'] = entparse(sql("SELECT `short` FROM `ally` WHERE `id` = '".$info['do_plemienia']."'",'array')); 
		$info['nazwa'] = entparse(sql("SELECT `name` FROM `ally` WHERE `id` = '".$info['do_plemienia']."'",'array')); 
		$game_partner_rsv[] = $info;
		}
	
	//Utwurz tablicê z dzieleniem rezerwacji do plemienia:
	$sql = mysql_query("SELECT od_plemienia FROM `dzielenie_rezerwacji` WHERE `do_plemienia` = '".$user['ally']."'");
	while ($info = mysql_fetch_assoc($sql)) {
		$merge_arr[] = " `od_plemienia` = '".$info['od_plemienia']."' ";
		}
	


	//Walidacja sortowania:	
	$orders = array('ASC','DESC','asc','desc');
	$sorts = array('od_gname','koniec');
	$filters = array('all','own','own_ally','other_ally');

	if (!in_array($_GET['order'],$orders)) {
		$_GET['order'] = 'ASC';
		}
	
	if (!in_array($_GET['sort'],$sorts)) {
		$_GET['sort'] = 'koniec';
		}
	
	if (!in_array($_GET['filter'],$filters)) {
		$_GET['filter'] = 'all';
		}
	
	//Filtrowanie rezerwacji:
	if ($_GET['filter'] == 'own') {
		$sql_query_filters = "`od_gracza` = '".$user['id']."'";
		}
	if ($_GET['filter'] == 'own_ally') {
		$sql_query_filters = "`od_plemienia` = '".$user['ally']."'";
		}
	if ($_GET['filter'] == 'other_ally') {
		if (count($merge_arr) > 0) {
			$fri_str = implode('OR',$merge_arr);
			}
		if (strlen($fri_str) < 1) {
			$sql_query_filters = "`od_plemienia` = 'aq'";
			} else {
			$sql_query_filters = "$fri_str";
			}
		}
	if ($_GET['filter'] == 'all') {
		if (count($merge_arr) > 0) {
			$fri_str = implode('OR',$merge_arr);
			$fri_str = ' OR ('.$fri_str.')';
			}
		$sql_query_filters = "`od_plemienia` = '".$user['ally']."'$fri_str";
		}
	
	//Sekcja stron:
	$section_count = sql("SELECT COUNT(id) FROM `rezerwacje` WHERE $sql_query_filters",'array');
	$pages = floor(($section_count - 1) / $user['rezerwacje_nstr']);

	if ($_GET['page'] > $pages) {
		$_GET['page'] = $pages;
		}
	
	if ($_GET['page'] < 0) {
		$_GET['page'] = 0;
		}
		
	$_GET['page'] = floor($_GET['page']);
		
	$start_licznik_limit = $_GET['page'] * $user['rezerwacje_nstr'];
	
	if ($pages > 0) {
		$sekcja_rezerwacje = true;
	
		if (isset($_GET['page'])) {
			$_GET['page'] = (int)$_GET['page'];
		
			if ($_GET['page'] < 0) {
				$_GET['page'] = 0;
				}
			if ($_GET['page'] > $pages) {
				$_GET['page'] = $pages;
				}
			} else {
			$_GET['page'] = 0;
			}
			
		$_SEKCJA_ROZKAZY_LINK = 'game.php?village='.$village['id'].'&screen=ally&mode=reservations&order='.$_GET['order'].'&sort='.$_GET['sort'].'&filter='.$_GET['filter'].'&page=';
		
		for ($i = 0; $i <= $pages; $i++) {
			$assign_str = $i + 1;
			if ($i == $_GET['page']) {
				$sekcja_rezerwacje_content .= '<b>'.$assign_str.'</b>  ';
				} else {
				$sekcja_rezerwacje_content .= '<a href="'.$_SEKCJA_ROZKAZY_LINK.$i.'">'.$assign_str.'<a>  ';
				}
			}
		} else {
		$_GET['page'] = 0;
		$sekcja_rezerwacje = false;
		}
	
	if (isset($_POST['search_reservations_is'])) {
		if ($_POST['reservation_search_coords'] === 'true') {
			$_POST['x'] = (int)$_POST['x'];
			$_POST['y'] = (int)$_POST['y'];
			
			$vid = sql("SELECT `id` FROM `villages` WHERE `x` = '".$_POST['x']."' AND `y` = '".$_POST['y']."'",'array');
			if (!empty($vid)) {
				$_mysql_where_tag = "WHERE (`do_wioski` = '".$vid."') AND ($sql_query_filters)";
				
				$sql = @mysql_query("SELECT * FROM `rezerwacje` WHERE $_mysql_where_tag ORDER BY `".$_GET['sort']."` ".$_GET['order']." LIMIT ".$start_licznik_limit." , ".$user['rezerwacje_nstr']);
				while ($info = @mysql_fetch_assoc($sql)) {
					$info['village'] = sql("SELECT userid,name,x,y,points,continent FROM `villages` WHERE `id` = '".$info['do_wioski']."'",'assoc');
					$info['link'] = '<a href="game.php?village='.$village['id'].'&screen=info_village&id='.$info['do_wioski'].'"/>'.entparse($info['village']['name']).' ('.$info['village']['x'].'|'.$info['village']['y'].') K'.$info['village']['continent'].'</a>';
					if ($info['village']['userid'] != '-1') {
						$info['owner_name'] = entparse(sql("SELECT `username` FROM `users` WHERE `id` = '".$info['village']['userid']."'",'array'));
						} else {
						$info['owner_name'] = '';
						}
					$info['od_gname'] = entparse($info['od_gname']);
					$info['od_allyname'] = entparse(sql("SELECT `short` FROM `ally` WHERE `id` = '".$info['od_plemienia'] ."'",'array'));
					$info['koniec'] = format_date($info['koniec']);
					$game_rezerwacje[] = $info;
					}
				}
			} else {
			if ($_POST['group_id'] === 'village_name') {
				$_POST['filter'] = str_validator($_POST['filter']);
				$_POST['filter'] = parse($_POST['filter']);
				$vid = sql("SELECT `id` FROM `villages` WHERE `name` = '".$_POST['filter']."' LIMIT 1",'array');
				if (!empty($vid)) {
					$_mysql_where_tag = "WHERE (`do_wioski` = '".$vid."') AND ($sql_query_filters)";
				
					$sql = @mysql_query("SELECT * FROM `rezerwacje` WHERE $_mysql_where_tag ORDER BY `".$_GET['sort']."` ".$_GET['order']." LIMIT ".$start_licznik_limit." , ".$user['rezerwacje_nstr']);
					while ($info = @mysql_fetch_assoc($sql)) {
						$info['village'] = sql("SELECT userid,name,x,y,points,continent FROM `villages` WHERE `id` = '".$info['do_wioski']."'",'assoc');
						$info['link'] = '<a href="game.php?village='.$village['id'].'&screen=info_village&id='.$info['do_wioski'].'"/>'.entparse($info['village']['name']).' ('.$info['village']['x'].'|'.$info['village']['y'].') K'.$info['village']['continent'].'</a>';
						if ($info['village']['userid'] != '-1') {
							$info['owner_name'] = entparse(sql("SELECT `username` FROM `users` WHERE `id` = '".$info['village']['userid']."'",'array'));
							} else {
							$info['owner_name'] = '';
							}
						$info['od_gname'] = entparse($info['od_gname']);
						$info['od_allyname'] = entparse(sql("SELECT `short` FROM `ally` WHERE `id` = '".$info['od_plemienia'] ."'",'array'));
						$info['koniec'] = format_date($info['koniec']);
						$game_rezerwacje[] = $info;
						}
					}
				}
			if ($_POST['group_id'] === 'creator_name') {
				$_POST['filter'] = str_validator($_POST['filter']);
				$_POST['filter'] = parse($_POST['filter']);
				$pid = sql("SELECT `id` FROM `users` WHERE `username` = '".$_POST['filter']."' LIMIT 1",'array');
				$_mysql_where_tag = "WHERE (`od_gracza` = '".$pid."') AND ($sql_query_filters)";
				
				if (!empty($pid)) {
					$sql = @mysql_query("SELECT * FROM `rezerwacje` WHERE $_mysql_where_tag ORDER BY `".$_GET['sort']."` ".$_GET['order']." LIMIT ".$start_licznik_limit." , ".$user['rezerwacje_nstr']);
					while ($info = @mysql_fetch_assoc($sql)) {
						$info['village'] = sql("SELECT userid,name,x,y,points,continent FROM `villages` WHERE `id` = '".$info['do_wioski']."'",'assoc');
						$info['link'] = '<a href="game.php?village='.$village['id'].'&screen=info_village&id='.$info['do_wioski'].'"/>'.entparse($info['village']['name']).' ('.$info['village']['x'].'|'.$info['village']['y'].') K'.$info['village']['continent'].'</a>';
						if ($info['village']['userid'] != '-1') {
							$info['owner_name'] = entparse(sql("SELECT `username` FROM `users` WHERE `id` = '".$info['village']['userid']."'",'array'));
							} else {
							$info['owner_name'] = '';
							}
						$info['od_gname'] = entparse($info['od_gname']);
						$info['od_allyname'] = entparse(sql("SELECT `short` FROM `ally` WHERE `id` = '".$info['od_plemienia'] ."'",'array'));
						$info['koniec'] = format_date($info['koniec']);
						$game_rezerwacje[] = $info;
						}
					}
				}
			if ($_POST['group_id'] === 'owner_name') {
				$_POST['filter'] = str_validator($_POST['filter']);
				$_POST['filter'] = parse($_POST['filter']);
				$pid = sql("SELECT `id` FROM `users` WHERE `username` = '".$_POST['filter']."' LIMIT 1",'array');
				
				if (!empty($pid)) {
					$sql = @mysql_query("SELECT * FROM `rezerwacje` WHERE $sql_query_filters ORDER BY `".$_GET['sort']."` ".$_GET['order']);
					while ($info = @mysql_fetch_assoc($sql)) {
						$info['village'] = sql("SELECT userid,name,x,y,points,continent FROM `villages` WHERE `id` = '".$info['do_wioski']."'",'assoc');
						if ($info['village']['userid'] == $pid) {
							$info['link'] = '<a href="game.php?village='.$village['id'].'&screen=info_village&id='.$info['do_wioski'].'"/>'.entparse($info['village']['name']).' ('.$info['village']['x'].'|'.$info['village']['y'].') K'.$info['village']['continent'].'</a>';
							if ($info['village']['userid'] != '-1') {
								$info['owner_name'] = entparse(sql("SELECT `username` FROM `users` WHERE `id` = '".$info['village']['userid']."'",'array'));
								} else {
								$info['owner_name'] = '';
								}
							$info['od_gname'] = entparse($info['od_gname']);
							$info['od_allyname'] = entparse(sql("SELECT `short` FROM `ally` WHERE `id` = '".$info['od_plemienia'] ."'",'array'));
							$info['koniec'] = format_date($info['koniec']);
							$game_rezerwacje[] = $info;
							}
						}
					}
				}
			if ($_POST['group_id'] === 'creator_ally_tag') {
				$_POST['filter'] = str_validator($_POST['filter']);
				$_POST['filter'] = parse($_POST['filter']);
				$aid = sql("SELECT `id` FROM `ally` WHERE `short` = '".$_POST['filter']."' LIMIT 1",'array');
				$_mysql_where_tag = "WHERE (`od_plemienia` = '".$aid."') AND ($sql_query_filters)";
				
				if (!empty($aid)) {
					$sql = @mysql_query("SELECT * FROM `rezerwacje` WHERE $_mysql_where_tag ORDER BY `".$_GET['sort']."` ".$_GET['order']." LIMIT ".$start_licznik_limit." , ".$user['rezerwacje_nstr']);
					while ($info = @mysql_fetch_assoc($sql)) {
						$info['village'] = sql("SELECT userid,name,x,y,points,continent FROM `villages` WHERE `id` = '".$info['do_wioski']."'",'assoc');
						$info['link'] = '<a href="game.php?village='.$village['id'].'&screen=info_village&id='.$info['do_wioski'].'"/>'.entparse($info['village']['name']).' ('.$info['village']['x'].'|'.$info['village']['y'].') K'.$info['village']['continent'].'</a>';
						if ($info['village']['userid'] != '-1') {
							$info['owner_name'] = entparse(sql("SELECT `username` FROM `users` WHERE `id` = '".$info['village']['userid']."'",'array'));
							} else {
							$info['owner_name'] = '';
							}
						$info['od_gname'] = entparse($info['od_gname']);
						$info['od_allyname'] = entparse(sql("SELECT `short` FROM `ally` WHERE `id` = '".$info['od_plemienia'] ."'",'array'));
						$info['koniec'] = format_date($info['koniec']);
						$game_rezerwacje[] = $info;
						}
					}
				}
			if ($_POST['group_id'] === 'owner_ally_tag') {
				$_POST['filter'] = str_validator($_POST['filter']);
				$_POST['filter'] = parse($_POST['filter']);
				$aid = sql("SELECT `id` FROM `ally` WHERE `short` = '".$_POST['filter']."' LIMIT 1",'array');
				
				if (!empty($aid)) {
					$sql = @mysql_query("SELECT * FROM `rezerwacje` WHERE $sql_query_filters ORDER BY `".$_GET['sort']."` ".$_GET['order']);
					while ($info = @mysql_fetch_assoc($sql)) {
						$info['village'] = sql("SELECT userid,name,x,y,points,continent FROM `villages` WHERE `id` = '".$info['do_wioski']."'",'assoc');
						$diff_ally = sql("SELECT `ally` FROM `users` WHERE `id` = '".$info['village']['userid']."'",'array');
						if ($diff_ally == $aid) {
							$info['link'] = '<a href="game.php?village='.$village['id'].'&screen=info_village&id='.$info['do_wioski'].'"/>'.entparse($info['village']['name']).' ('.$info['village']['x'].'|'.$info['village']['y'].') K'.$info['village']['continent'].'</a>';
							if ($info['village']['userid'] != '-1') {
								$info['owner_name'] = entparse(sql("SELECT `username` FROM `users` WHERE `id` = '".$info['village']['userid']."'",'array'));
								} else {
								$info['owner_name'] = '';
								}
							$info['od_gname'] = entparse($info['od_gname']);
							$info['od_allyname'] = entparse(sql("SELECT `short` FROM `ally` WHERE `id` = '".$info['od_plemienia'] ."'",'array'));
							$info['koniec'] = format_date($info['koniec']);
							$game_rezerwacje[] = $info;
							}
						}
					}
				}
			}
		} else {
		//Utwurz tablicê z rezerwacjami:
		$sql = @mysql_query("SELECT * FROM `rezerwacje` WHERE $sql_query_filters ORDER BY `".$_GET['sort']."` ".$_GET['order']." LIMIT ".$start_licznik_limit." , ".$user['rezerwacje_nstr']);
		while ($info = @mysql_fetch_assoc($sql)) {
			$info['village'] = sql("SELECT userid,name,x,y,points,continent FROM `villages` WHERE `id` = '".$info['do_wioski']."'",'assoc');
			$info['link'] = '<a href="game.php?village='.$village['id'].'&screen=info_village&id='.$info['do_wioski'].'"/>'.entparse($info['village']['name']).' ('.$info['village']['x'].'|'.$info['village']['y'].') K'.$info['village']['continent'].'</a>';
			if ($info['village']['userid'] != '-1') {
				$info['owner_name'] = entparse(sql("SELECT `username` FROM `users` WHERE `id` = '".$info['village']['userid']."'",'array'));
				} else {
				$info['owner_name'] = '';
				}
			$info['od_gname'] = entparse($info['od_gname']);
			$info['od_allyname'] = entparse(sql("SELECT `short` FROM `ally` WHERE `id` = '".$info['od_plemienia'] ."'",'array'));
			$info['koniec'] = format_date($info['koniec']);
			$game_rezerwacje[] = $info;
			}
		}
	
	if (!is_numeric($_GET['x'])) {
		$_GET['x'] = '';
		}
	
	if (!is_numeric($_GET['y'])) {
		$_GET['y'] = '';
		}
	
	if ($_GET['x'] > 999) {
		$_GET['x'] = 999;
		}
	
	if ($_GET['y'] > 999) {
		$_GET['y'] = 999;
		}
	
	if ($_GET['x'] < 0) {
		$_GET['x'] = 0;
		}
	
	if ($_GET['y'] < 0) {
		$_GET['y'] = 0;
		}
	
	$tpl->assign('err',$error);
	$tpl->assign('add_new',$add_new);
	$tpl->assign('double_reservations',$double_reservations);
	$tpl->assign('reservations_vals',$out_array);
	$tpl->assign('reservations_maxday',$sojusz_info['rezerwacje_czas']);
	$tpl->assign('reservations_maxcount',$sojusz_info['rezerwacje_max']);
	$tpl->assign('partners',$game_partner_rsv);
	$tpl->assign('rezerwacje',$game_rezerwacje);
	$tpl->assign('sekcja_rezerwacje',$sekcja_rezerwacje);
	$tpl->assign('sekcja_rezerwacje_content',$sekcja_rezerwacje_content);
	$tpl->assign('is_user_admin',$is_user_admin);
	$tpl->assign('xval',$_GET['x']);
	$tpl->assign('yval',$_GET['y']);
	$tpl->assign('aktupage',$_GET['page']);
	$tpl->assign('sort',$_GET['sort']);
	$tpl->assign('order',$_GET['order']);
	$tpl->assign('filter',$_GET['filter']);
	}
?>