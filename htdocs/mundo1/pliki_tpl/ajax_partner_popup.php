{php}



	
	//Utwurz tablicę z dzieleniem rezerwacji od plemienia:
	$sql = mysql_query("SELECT * FROM `dzielenie_rezerwacji` WHERE `od_plemienia` = '".$user['ally']."'");
	while ($info = mysql_fetch_assoc($sql)) {
		$info['skrot'] = entparse(sql("SELECT `short` FROM `ally` WHERE `id` = '".$info['do_plemienia']."'",'array')); 
		$info['nazwa'] = entparse(sql("SELECT `name` FROM `ally` WHERE `id` = '".$info['do_plemienia']."'",'array')); 
		$game_partner_rsv[] = $info;
		}
	
	//Utwurz tablicę z dzieleniem rezerwacji do plemienia:
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
		//Utwurz tablicę z rezerwacjami:
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
	

$this->_tpl_vars['err'] = $error;
$this->_tpl_vars['add_new'] = $add_new;
$this->_tpl_vars['partners'] = $partners;
	
{/php}

													<h4 style="margin-top: 2px;">Convide a nova tribo para o planejador da conquista</h4>
													<p>Digite o nome curto da tribo com a qual o planejador da conquista deve ser compartilhado:</p>
													<form action="game.php?village={$village.id}&amp;screen=ally&amp;mode=reservations&amp;action=add_partner&amp;h={$hkey}&page={$aktupage}&sort={$sort}&order={$order}&filter={$filter}" method="POST">
														<input maxlength="6" name="partner_ally" type="text">
														<input value="Adicionar" type="submit">
													</form>

{literal}<script type="text/javascript">
//<![CDATA[

	function add_partnership(ally_tag, ajax_url) {
		$.ajax({
			url : ajax_url,
			dataType : 'json',
			data : ({ 'partner_tag' : ally_tag }),
			success : function(response) {
				if (response.code) {
					window.location.reload(false);
				} else {
					UI.ErrorMessage(response.error);
				}
			}
		});
		return false;
	}

//]]>
</script>{/literal}

</div>