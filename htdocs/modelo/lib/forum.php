<?php
/*****************************************/
/*=======================================*/
/*     PLIK: forum.php   				 */
/*     DATA: 21.03.2012r        		 */
/*     ROLA: Klasa dla forum plemiennego */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

class forum {
	var $user_info = null;
	var $user_unreads = array();
	var $user_forums_can_see = array();
	
	function forum($uinfo) {
		if (is_array($uinfo)) $this->user_info = $uinfo;
		
		if (!empty($this->user_info['ally']) && $this->user_info['ally'] != '-1') {
			$ogolne_forum_plemie = sql("SELECT `add_ffid` FROM `ally` WHERE `id` = '".$this->user_info['ally']."'","array");
			if ($ogolne_forum_plemie == 0) {
				$this->add_forum(parse("Principal"),0);
				mysql_query("UPDATE `ally` SET `add_ffid` = '1' WHERE `id` = '".$this->user_info['ally']."'");
				}
			} else {
			die ("Erro de carregamento de arquivo - verifique se o parâmetro de função do fórum 'uinfo' é uma matriz.");
			}
		}
		
	function is_moderator() {
		if ($this->user_info['ally_mod_forum']) {
			$return = true;
			} else {
			$return = false;
			}
		return $return;
		}
		
	function get_modes() {
		$modes[] = "ow";
		$modes[] = "new_thread";
		$modes[] = "new_pool";
		$modes[] = "s_thread";
		
		if ($this->is_moderator()) {
			$modes[] = "admin";
			$modes[] = "replace";
			$modes[] = "edit_thread";
			}
			
		return $modes;
		}
		
	function get_forum_array() {
		$all = false;
		
		if ($this->user_info['ally_forum_switch']) {
			$user_visible = 1;
			}
		if ($this->user_info['ally_forum_trust']) {
			$user_visible = 2;
			}
			
		if ($this->user_info['ally_forum_switch'] && $this->user_info['ally_forum_trust']) {
			$all = true;
			}
		
		$sql = mysql_query("SELECT id,nazwa,visible FROM `fora` WHERE `plemie` = '".$this->user_info['ally']."' ORDER BY `id`");
		while ($array = mysql_fetch_assoc($sql)) {
			if ($all) {
				$output[$array['id']] = entparse($array['nazwa']);
				$this->user_forums_can_see[$array['id']] = true;
				} else {
				if ($array['visible'] == 0 || $array['visible'] == $user_visible) {
					$output[$array['id']] = entparse($array['nazwa']);
					$this->user_forums_can_see[$array['id']] = true;
					}
				}
			}
			
		$user_unreads = mysql_query("SELECT fid,tid,id FROM `czytanie` WHERE `graczid` = '".$this->user_info['id']."'");
		while ($array = mysql_fetch_assoc($user_unreads)) {
			if (empty($output[$array['fid']])) {
				mysql_query("DELETE FROM `czytanie` WHERE `id` = '".$array['id']."'");
				} else {
				if (!is_array($this->user_unreads[$array['fid']])) {
					$this->user_unreads[$array['fid']] = array();
					}
				$this->user_unreads[$array['fid']][$array['tid']] = true; 
				}
			}
			
		return $output;
		}
		
	function can_see_fid($fid) {
		if ($this->user_forums_can_see[$fid]) {
			$ret = true;
			} else {
			$ret = false;
			}
			
		return $ret;
		}
		
	function is_forum_readed($fid) {
		if (is_array($this->user_unreads[$fid])) {
			$unreaded = true;
			} else {
			$unreaded = false;
			}
		return $unreaded;
		}
		
	function is_thread_readed($fid,$tid) {
		if ($this->user_unreads[$fid][$tid] === true) {
			$unreaded = true;
			} else {
			$unreaded = false;
			}
		return $unreaded;
		}
		
	function get_forum_array_admin() {
		$sql = mysql_query("SELECT id,nazwa,visible FROM `fora` WHERE `plemie` = '".$this->user_info['ally']."' ORDER BY `id`");
		while ($array = mysql_fetch_assoc($sql)) {
			$output[$array['id']]['name'] = entparse($array['nazwa']);
			$output[$array['id']]['visible'] = $array['visible'];
			}
			
		return $output;
		}
		
	function add_forum($name,$visible) {
		mysql_query("INSERT INTO fora(plemie,nazwa,visible) VALUES ('".$this->user_info['ally']."','$name','$visible')");
		return true;
		}
		
	function write_new_thread($subiect,$message,$message_bb,$fid,$important) {	
		$date_u = date("U");
		
		$name_u = sql("SELECT `username` FROM `users` WHERE `id` = '".$this->user_info['id']."'","array");
			
		mysql_query ("INSERT INTO tematy(
			nazwa,graczid,forum,last_ptime,czas_ut,gracznazwa,last_pauthor,last_puid,important
			) VALUES (
			'".$subiect."','".$this->user_info['id']."','".$fid."','".$date_u."','".$date_u."','".$name_u."','".$name_u."','".$this->user_info['id']."','".$important."'
			)");
			
		$LAST_TID = sql("SELECT `id` FROM `tematy` WHERE `forum` = '".$fid."' ORDER BY `id` DESC LIMIT 1",'array');
			
		mysql_query("INSERT INTO posty(
			graczid,temat,forum,data,msg,msg_bb,gracznazwa
			) VALUES (
			'".$this->user_info['id']."','".$LAST_TID."','".$fid."','".$date_u."','".$message."','".$message_bb."','".$name_u."'
			)");
			
		$LAST_PID = sql("SELECT `id` FROM `posty` WHERE `temat` = '".$LAST_TID."' AND `forum` = '".$fid."' ORDER BY `id` DESC LIMIT 1",'array');
		
		mysql_query("UPDATE `tematy` SET `pierwszy_post_id` = '$LAST_PID' WHERE `id` = '$LAST_TID'");
		
		//Pobierz tablic� cz�onk�w z twojego plemienia:
		$sql = mysql_query("SELECT `id` FROM `users` WHERE `ally` = '".$this->user_info['ally']."'");
		while ($id = mysql_fetch_array($sql)) {
			mysql_query("INSERT INTO czytanie(graczid,fid,tid) VALUES ('".$id[0]."','".$fid."','".$LAST_TID."')");
			}
		
		return $LAST_TID;
		}
		
	function get_threads($fid) {
		global $pl;
		
		$sql = mysql_query("SELECT id,nazwa,typ,graczid,last_ptime,odpowiedzi,is_close,czas_ut,gracznazwa,last_pauthor,last_puid,important FROM `tematy` WHERE `forum` = '$fid' ORDER BY important DESC, czas_ut DESC");
		while ($arr = mysql_fetch_assoc($sql)) {
			$out[$arr['id']]['nazwa'] = entparse($arr['nazwa']);
			$autor_exists = sql("SELECT COUNT(id) FROM `users` WHERE `id` = '".$arr['graczid']."'","array");
			if ($autor_exists) {
				$out[$arr['id']]['autor_exists'] = true;
				$out[$arr['id']]['autor_id'] = $arr['graczid'];
				} else {
				$out[$arr['id']]['autor_exists'] = false;
				}
				
			$out[$arr['id']]['autor_name'] = entparse($arr['gracznazwa']);
			$out[$arr['id']]['autor_ctime'] = $pl->format_date($arr['czas_ut']);
			
				
			if ($arr['typ'] == 1) {
				$out[$arr['id']]['pool'] = true;
				} else {
				$out[$arr['id']]['pool'] = false;
				}
				
			if ($arr['important'] == 1) {
				$out[$arr['id']]['important'] = true;
				} else {
				$out[$arr['id']]['important'] = false;
				}
				
			$out[$arr['id']]['odpowiedzi'] = number_format($arr['odpowiedzi']);
			
			if ($arr['is_close'] == 1) {
				$out[$arr['id']]['close'] = true;
				} else {
				$out[$arr['id']]['close'] = false;
				}
				
			$last_odp_exists = sql("SELECT COUNT(id) FROM `users` WHERE `id` = '".$arr['last_puid']."'","array");
			if ($last_odp_exists) {
				$out[$arr['id']]['last_odp_exists'] = true;
				$out[$arr['id']]['last_odp_id'] = $arr['last_puid'];
				} else {
				$out[$arr['id']]['last_odp_exists'] = false;
				}
				
			$out[$arr['id']]['last_odp_name'] = entparse($arr['last_pauthor']);
			$out[$arr['id']]['last_odp_ctime'] = $pl->format_date($arr['last_ptime']);
			}
			
		return $out;
		}
		
	function przeczytano($fid,$tid) {
		mysql_query("DELETE FROM `czytanie` WHERE `graczid` = '".$this->user_info['id']."' AND `fid` = '$fid' AND `tid` = '$tid'");
		
		if (count($this->user_unreads[$fid]) == 1 || !is_array($this->user_unreads[$fid])) {
			$this->user_unreads[$fid] = false;
			} else {
			$this->user_unreads[$fid][$tid] = false;
			}
			
		return true;
		}
		
	function get_thread_info($tid) {
		$effect = sql("SELECT nazwa,typ,is_close,important,pierwszy_post_id,odpowiedzi FROM `tematy` WHERE `id` = '$tid'","assoc");
		return $effect;
		}
		
	function get_posts($tid,$page,$vid) {
		global $pl,$bb_interpreter;
		
		$licznik_limit = $page * 30;
		$sql = mysql_query("SELECT id,graczid,gracznazwa,msg,data FROM `posty` WHERE `temat` = '$tid' ORDER by `data` LIMIT $licznik_limit , 30");
		while ($array = mysql_fetch_assoc($sql)) {
			$user_exists = sql("SELECT COUNT(id) FROM `users` WHERE `id` = '".$array['graczid']."'","array");
			if ($user_exists) {
				$posts[$array['id']]['user_exists'] = true;
				$posts[$array['id']]['graczid'] = $array['graczid'];
				} else {
				$posts[$array['id']]['user_exists'] = false;
				}
			$posts[$array['id']]['gracznazwa'] = entparse($array['gracznazwa']);
			$posts[$array['id']]['data'] = $pl->format_date($array['data']);
			$posts[$array['id']]['msg'] = $bb_interpreter->load_bb($array['msg'],$vid);
			}
			
		return $posts;
		}
		
	function add_answer($msg,$msg_bb,$fid,$tid) {
		$date_u = date("U");
		
		$name_u = sql("SELECT `username` FROM `users` WHERE `id` = '".$this->user_info['id']."'","array");
		
		mysql_query("INSERT INTO posty(
			graczid,temat,forum,data,msg,msg_bb,gracznazwa
			) VALUES (
			'".$this->user_info['id']."','".$tid."','".$fid."','".$date_u."','".$msg."','".$msg_bb."','".$name_u."'
			)");
			
		mysql_query("UPDATE `tematy` SET `last_ptime` = '$date_u' , `last_pauthor` = '$name_u' , `last_puid` = '".$this->user_info['id']."' , `odpowiedzi` = `odpowiedzi` + '1' WHERE `id` = '$tid'");
		
		//Pobierz tablic� cz�onk�w z twojego plemienia:
		$sql = mysql_query("SELECT `id` FROM `users` WHERE `ally` = '".$this->user_info['ally']."'");
		while ($id = mysql_fetch_array($sql)) {
			$r_exists = sql("SELECT COUNT(id) FROM `czytanie` WHERE `graczid` = '".$id[0]."' AND `fid` = '$fid' AND `tid` = '$tid'","array");
			if (!$r_exists) {
				mysql_query("INSERT INTO czytanie(graczid,fid,tid) VALUES ('".$id[0]."','".$fid."','".$tid."')");
				}
			}
		}
		
	function create_pool($subiect,$message,$message_bb,$fid,$important,$can_see_wyn,$odpowiedzi) {
		$date_u = date("U");
		
		foreach ($odpowiedzi as $odp) {
			$wyn_value[] = 0;
			}
		
		$name_u = sql("SELECT `username` FROM `users` WHERE `id` = '".$this->user_info['id']."'","array");
			
		mysql_query ("INSERT INTO tematy(
			nazwa,graczid,forum,last_ptime,czas_ut,gracznazwa,last_pauthor,last_puid,important,typ,show_wyn,odp,wyn
			) VALUES (
			'".$subiect."','".$this->user_info['id']."','".$fid."','".$date_u."','".$date_u."','".$name_u."','".$name_u."','".$this->user_info['id']."','".$important."','1',
			'$can_see_wyn','".implode(">",$odpowiedzi)."','".implode(",",$wyn_value)."'
			)");
			
		$LAST_TID = sql("SELECT `id` FROM `tematy` WHERE `forum` = '".$fid."' ORDER BY `id` DESC LIMIT 1",'array');
			
		mysql_query("INSERT INTO posty(
			graczid,temat,forum,data,msg,msg_bb,gracznazwa
			) VALUES (
			'".$this->user_info['id']."','".$LAST_TID."','".$fid."','".$date_u."','".$message."','".$message_bb."','".$name_u."'
			)");
			
		$LAST_PID = sql("SELECT `id` FROM `posty` WHERE `temat` = '".$LAST_TID."' AND `forum` = '".$fid."' ORDER BY `id` DESC LIMIT 1",'array');
		
		mysql_query("UPDATE `tematy` SET `pierwszy_post_id` = '$LAST_PID' WHERE `id` = '$LAST_TID'");
		
		// Faça o download de um quadro da sua tribo:
		$sql = mysql_query("SELECT `id` FROM `users` WHERE `ally` = '".$this->user_info['ally']."'");
		while ($id = mysql_fetch_array($sql)) {
			mysql_query("INSERT INTO czytanie(graczid,fid,tid) VALUES ('".$id[0]."','".$fid."','".$LAST_TID."')");
			}
		
		return $LAST_TID;
		}
		
	function get_pool_form($tid,$vid,$link) {
		global $bb_interpreter;
		
		$finfo = sql("SELECT pierwszy_post_id,show_wyn,odp,wyn FROM `tematy` WHERE `id` = '$tid'","assoc");
		
		$fval = $bb_interpreter->load_bb(sql("SELECT `msg` FROM `posty` WHERE `id` = '".$finfo['pierwszy_post_id']."'","array"),$vid);
		
		$return .= $fval.'<br>';
		
		// Verifique se o jogador está votando ou não:
		$is_user_voted = sql("SELECT COUNT(id) FROM `f_ankiety` WHERE `tid` = '$tid' AND `uid` = '".$this->user_info['id']."'",'array');
		
		if (!$is_user_voted) {
			$return .= '<form action="'.$link.'" method="post">';
			}
			
		$return .= '<table cellpadding="0" cellspacing="0"><tbody>';
		
		$odp_array = explode(">",$finfo['odp']);
		$wyn_array = explode(",",$finfo['wyn']);
		
		$gsum = array_sum($wyn_array);
		
		foreach ($odp_array as $id => $odpowiedz) {
			$return .= '<tr><td>';
			if (!$is_user_voted) {
				$return .= '<input name="vote" value="'.$id.'" type="radio">';
				}
			$return .= $odpowiedz;
			$return .= '</td></tr>';
			
			if ($finfo['show_wyn'] || $is_user_voted) {
				$return .= '<tr>';
				
				if ($wyn_array[$id] != 0) {
					$proc = floor(($wyn_array[$id] / $gsum) * 100);
					$return .= '<td><div class="luck-item nobg" style="background-image: url(graphic/balken_glueck.png?1); width: '.($proc * 2).'px; height: 12px;"></div></td>';
					$return .= '<td>'.$wyn_array[$id].' voz ('.$proc.'%)</td>';
					} else {
					$return .= '<td></td>';
					$return .= '<td>(0%)</td>';
					}
				
				$return .= '</tr>';
				}
			}
			
		if (!$is_user_voted) {
			$return .= '<tr><td>';
			$return .= '<input type="submit" name="sub" value="voz"/>';
			$return .= '</td></tr>';
			}
		
	
		$return .= '</tbody></table>';
		if (!$is_user_voted) {
			$return .= '</form>';
			}
		
		return $return;
		}
		
	function vote($fid,$tid,$odp_id) {
		$votes = sql("SELECT `wyn` FROM `tematy` WHERE `id` = '$tid'","array");
		
		$votes_arr = explode(',',$votes);
		
		$key = $votes_arr[$odp_id];
			
		$votes_arr[$odp_id]++;
			
		mysql_query("UPDATE `tematy` SET `wyn` = '".implode(',',$votes_arr)."' WHERE `id` = '$tid'");
		
		mysql_query("INSERT INTO f_ankiety(tid,uid,fid) VALUES('$tid','".$this->user_info['id']."','$fid')");
		
		return true;
		}
	}
?>