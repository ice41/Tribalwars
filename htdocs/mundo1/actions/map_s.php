<?php
$kontrakty_query = mysql_query("SELECT id,do_plemienia,typ FROM `kontrakty` WHERE `od_plemienia` = '".$user['ally']."'");
while ($kontrakt = mysql_fetch_assoc($kontrakty_query)) {
	$do_plemienia_info = sql("SELECT points,name,short FROM `ally` WHERE `id` = '".$kontrakt['do_plemienia']."'",'assoc');
	$kontrakty[$kontrakt['typ']][$kontrakt['id']]['do_plemienia_tag'] = entparse($do_plemienia_info['name']) . ' ('.entparse($do_plemienia_info['short']).')' . ' ('.number_format($do_plemienia_info['points']) . ' punktów)';
	$kontrakty[$kontrakt['typ']][$kontrakt['id']]['do_plemienia'] = $kontrakt['do_plemienia'];
	$kontrakty[$kontrakt['typ']][$kontrakt['id']]['id'] = $kontrakt['id'];
	}
	

$tpl->assign('kontrakty',$kontrakty);
	$sql_query_filters = "`od_plemienia` = '".$user['ally']."'";
		$sql = @mysql_query("SELECT * FROM `rezerwacje` WHERE $sql_query_filters");
		while ($info = @mysql_fetch_assoc($sql)) {
        if ($info['od_gracza'] == $user['id']) {
		$info['od'] = 'player';
		} else {
		$info['od'] = 'team';		
		}
			$game_rezerwacje[] = $info;
			}
		$sql = @mysql_query("SELECT * FROM `odkrycia`");
		while ($in = @mysql_fetch_assoc($sql)) {
        $vil = mysql_fetch_array(mysql_query("SELECT * FROM villages WHERE id = ".$in['wioska'].""));
		$in['c1'] = $vil['x'];
		$in['c2'] = $vil['y'];
		if ($vil['userid'] != -1) {
        $p = sql("SELECT ally FROM users WHERE id = ".$vil['userid']."","array");	
		if ($user['ally'] != -1) {
		if ($p['ally'] == $user['ally']) {
		$in['i'] = 1;
		} else {
		$in['i'] = 0;
		}
		$in['counter']++;
		} else {
		$in['i'] = 0;
		}
		} else {
		$in['i'] = 0;
		}
			$odk[] = $in;
			}			
	$tpl->assign('rezerwacje',$game_rezerwacje);
	$tpl->assign('odk',$odk);			
?>