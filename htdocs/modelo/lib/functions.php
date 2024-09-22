<?php 
	function data($typ) 
	{    
	$date = date($typ,strtotime(""));   
	return $date;	
	}

function enc($s) {
	return gzuncompress(base64_decode($s));
	}
	
function parse($str) {
	return urlencode(htmlspecialchars(trim($str)));
	}
	
function entparse($str) {
	return urldecode($str);
	}
	
function format_number($num) {
	return str_replace(',','<span class="grey">.</span>',number_format($num));
	}
function format_number2($num) {
	return str_replace(',','.',number_format($num));
	}	
function format_time($arg) {
	if ($arg < 0) {
		return "00:00:$arg";
		} else {
		$h = floor($arg / 3600);
		$m = floor(($arg % 3600) / 60);
		$s = ($arg % 3600) % 60;
		
		if ($m < 10) $m = "0".$m;
		if ($s < 10) $s = "0".$s;
		
		$c = $h.':'.$m.':'.$s;
		return $c;
		}
	}
	
function format_date($unix,$show_sek = false) {
	if (date('I')) {
		$modifer = 7200;
		} else {
		$modifer = 0;
		}
		
	$aktuday = floor((date("U") + $modifer) / 86400);
	$dateday = floor(($unix + $modifer) / 86400);
	if ($aktuday == $dateday) {
		return "Hoje às " . date("H:i:s",$unix);
		}
	elseif (($aktuday + 1) == $dateday) {
		return "Amanhã em " . date("H:i:s",$unix);
		} else {
		$date = date("d.m H:i:s",$unix);
		return "dentro ". str_replace(" "," o ",$date);
		}
	}

function przydziel_osadzie_kontynent($x,$y) {
    $x_k = floor($x/100);
	$y_k = floor($y/100);
	$k = $y_k.$x_k;
	return $k;
    }

function sql($sql,$typ) {
    switch($typ) {
	    case 'array':
		$query = mysql_query($sql);
     	$one = mysql_fetch_array($query);
	    return $one[0];
		case 'assoc':
		$query = mysql_query($sql);
	    $one = mysql_fetch_assoc($query);
	    return $one;
	    }
    }
	
function GetClientIP() { 
	if ($_SERVER['HTTP_X_FORWARDED_FOR']) { 
		$clientip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
		} else { 
		$clientip = $_SERVER['REMOTE_ADDR']; 
		}
	return $clientip; 
	} 

	
function get_counts_on_build($vid,$build) {
    $counts = sql("SELECT COUNT(id) FROM `build` WHERE `villageid` = '$vid' AND `building` = '$build'",'array');
	return $counts;
    }
	
function get_szlachta_limit($monety) {
	$counter = 0;
	for ($i = 0; $i <= $counter; $i++) {
		$mons += $i;
		if ($mons > $monety) {
			$limit = $i;
		    } else {
			$counter += 1;
			}
		}
	$limit -= 1;
	return $limit;
    }
	
function pow_array($array,$potega) {
	foreach ($array as $key => $val) {
		$out_arr[$key] = floor($val * $potega);
		}
	return $out_arr;
	}
	
function getfirstvillage($uid) {
	return sql("SELECT `id` FROM `villages` WHERE `userid` = '$uid' ORDER BY `name`","array");
	}
	
function getrandomxyforcircle($okrag,$kierunek) {
	if ($okrag > 703) {
		$okrag = 703;
		}
		
		/*
	Instruções:
	PW - Páscoa do subleve
	PZ - Subber
	OW - PEPPORTED ORIENTE
	Oz - Passivo
	R - aleatório
	*/
		
	$kierunki = array('PW','PZ','OW','OZ','R');
		
	if (!in_array($kierunek,$kierunki)) {
		$kierunek = 'R';
		}
		
    $c = 1;
    for($i = 1; $i <= $c ; $i++) {
		if ($kierunek == 'PW') {
			$los = mt_rand(0,90000);
			}
		if ($kierunek == 'PZ') {
			$los = mt_rand(90001,180000);
			}
		if ($kierunek == 'OZ') {
			$los = mt_rand(180001,270000);
			}
		if ($kierunek == 'OW') {
			$los = mt_rand(270001,360000);
			}
		if ($kierunek == 'R') {
			$los = mt_rand(0,360000);
			}
		$los /= 1000;
        $x = round(cos($los * M_PI / 180) * $okrag) + 550;
        $y = round(sin($los * M_PI / 180) * $okrag) + 500;
		$x += mt_rand(-6,6);
		$y += mt_rand(-6,6);
	    if ($x > 999 || $y > 999 || $x < 0 || $y < 0) {
			if ($c < 4000) {
				$c += 1;
				mysql_query("UPDATE `twozenie_osady` SET `osad_na_okragu` = `osad_na_okragu` + '1'");
				}
		    } else {		
            $cnt = sql("SELECT COUNT(id) FROM `villages` WHERE `x` = '$x' AND `y` = '$y' LIMIT 1",'array');		
            if ($cnt > 0) {
             	if ($c < 4500) {
					$c += 1;
					}			   
                } else {
				$cnt = sql("SELECT COUNT(id) FROM `krzaki` WHERE `x` = '$x' AND `y` = '$y' LIMIT 1",'array');		
				if ($cnt > 0) {
					if ($c < 5000) {
						$c += 1;
						}	
					} else {
					mysql_query("UPDATE `twozenie_osady` SET `osad_na_okragu` = `osad_na_okragu` + '1'");
					return array($x,$y);
					}
		        }
	        }
        }
	}
	
function create_villages($gracz,$ilosc,$kierunek) {
	global $config;
	$gracz = (int)$gracz;
	$ilosc = (int)$ilosc;
	if ($ilosc < 1) {
		$ilosc = 1;
		}
		
	if ($ilosc > 15000) {
		$ilosc = 15000;
		}
	
	if ($gracz == '-1') {
		$nazwa = $config['left_name'];
		} else {
		$nazwa = 'Aldeia ' . sql("SELECT `username` FROM `users` WHERE `id` = '$gracz'",'array') . '';
		}
		
	$data = date("U");
		
	$do_tylu = 0;
		
	for ($i = 1; $i <= $ilosc; $i++) {	
		$create_vg = sql("SELECT * FROM `twozenie_osady`",'assoc');
		if ($create_vg['osad_na_okragu'] > ($create_vg['okrag'] * 1.75) && $create_vg['okrag'] < 705) {
			mysql_query("UPDATE `twozenie_osady` SET `osad_na_okragu` = '0'");	
			mysql_query("UPDATE `twozenie_osady` SET `okrag` = `okrag` + '1'");	
			}
		
		if ($create_vg['okrag'] < 705) {
			$coords = getrandomxyforcircle($create_vg['okrag'],$kierunek);
	
			if (strlen($coords[0])  > 0 && strlen($coords[1]) > 0) {
				$continent = (int)przydziel_osadzie_kontynent($coords[0],$coords[1]);
				
				// desenha um bônus para a aldeia:
				$bonus = 0;
				
				$to_rand_bonus = mt_rand(0,5);
				if ($to_rand_bonus == 3 && $gracz == '-1') {
					$bonus = mt_rand(1,9);
					}
		
				mysql_query("INSERT INTO villages(x,y,name,continent,userid,create_time,last_prod_aktu,bonus) value('".$coords[0]."','".$coords[1]."','$nazwa','$continent','$gracz','".$data."','".$data."','$bonus')");
				$lastid = sql("SELECT `id` FROM `villages` ORDER by `id` DESC LIMIT 1",'array');
				mysql_query("INSERT INTO unit_place(villages_from_id,villages_to_id) value('$lastid','$lastid')");
				} else {
				$do_tylu++;
				}
			}
		}
		
	$ilosc -= $do_tylu;
		
	if ($gracz != '-1') {
		$punkty = file_get_contents('admin/pts.xth') * $ilosc;
		mysql_query("UPDATE `users` SET `points` = `points` + '".$punkty."' WHERE `id` = '".$gracz."'");
		mysql_query("UPDATE `users` SET `villages` = `villages` + '".$ilosc."' WHERE `id` = '".$gracz."'");
		}
		
	mysql_query("UPDATE `twozenie_osady` SET `suma_wiosek` = `suma_wiosek` + '$ilosc'");	
	}
	
function create_vill_for_player($graczid,$kierunek)	{
	global $config;
	create_villages($graczid,$config['wioski_na_start'],$kierunek);
	create_villages('-1',$config['opuszczone_na_gracza'],'R');
	}
	
function get_village_points($village) {
	global $cl_builds;
	
	foreach ($cl_builds->get_array("dbname") as $val) {
		$punkty += $cl_builds->get_points($val,sql("SELECT `$val` FROM `villages` WHERE `id` = '$village'",'array'));
		}
		
	return $punkty;
	}
	
function reloaduj_ranking_graczy_punkty() {
	$query = mysql_query("SELECT id FROM `users` ORDER BY points DESC");
	while($user = mysql_fetch_assoc($query)) {
		$rang += 1;
		mysql_query("UPDATE `users` SET `rang` = '$rang' WHERE `id` = '".$user['id']."'");
		}
	}
	
function set_server_time($czas) {
    $return = date('H:i:s d/m/Y',$czas);
	return $return;
    }

function czas_dla_Un_Banu($ban_t) {
    $return = date('Y/m/d',$ban_t);
	return $return;
    }
	
function zakoduj_plik($plik,$nowy_plik) {
	$efekt = eaccelerator_encode($plik);
	$new_c = "<?php eaccelerator_load('".$efekt."'); ?>";
	$p = fopen($nowy_plik,'w');
	fputs($p,$new_c);
	fclose($p);
	}
	
function delete_enters($plik,$nowy_plik) {
	$contents = file_get_contents($plik);
	$c = array('	','
','//');
	$n = array('','','');
	$new_c = str_replace($c,$n,$contents);
	$p = fopen($nowy_plik,'w');
	fputs($p,$new_c);
	fclose($p);
	}
	
function encode_number($num) {
	$num = (int)$num;
	if ($num < 0) {
		$num = 0;
		}
	$num = floor($num);
	
	$str = @base64_encode(@gzcompress(@gzdeflate($num)));
	return $str;
	}
	
function decode_number($str) {
	$num = @gzinflate(@gzuncompress(@base64_decode($str)));
	$num = (int)$num;
	if ($num < 0) {
		$num = 0;
		}
	$num = floor($num);
	
	return $num;
	}
	
function int($liczby,$funkcja,$min,$max) {
	$funkcje = array('floor','ceil','round','brak');
	if (!in_array($funkcja,$funkcje)) {
		$funkcja = 'floor';
		}
		
	$min = (int)$min;
	$max = (int)$max;
	
	if ($max < $min) {
		$max = $min;
		}
		
	if (!is_array($liczby) && !is_object($liczby)) {
		$liczby = (int)$liczby;
		if ($funkcja == 'floor') {
			$liczby = floor($liczby);
			}
		if ($funkcja == 'ceil') {
			$liczby = ceil($liczby);
			}
		if ($funkcja == 'round') {
			$liczby = round($liczby);
			}
		if ($liczby < $min) {
			$liczby = $min;
			}
		if ($liczby > $max) {
			$liczby = $max;
			}
		$return = $liczby;
		} else {
		if (!is_object($liczby)) {
			$return = array();
			foreach ($liczby as $liczba) {
				if ($funkcja == 'floor') {
					$liczba = floor($liczba);
					}
				if ($funkcja == 'ceil') {
					$liczba = ceil($liczba);
					}
				if ($funkcja == 'round') {
					$liczba = round($liczba);
					}
				if ($liczba < $min) {
					$liczba = $min;
					}
				if ($liczba > $max) {
					$liczba = $max;
					}
				$return[] = $liczba;
				}
			}
		}
		
	if (is_object($liczby)) {
		$return = false;
		}
		
	return $return;
	}
	
function array_suma($arr) {
	$sum = 0;
	
	foreach ($arr as $val) {
		if (is_numeric($val)) {
			$sum += $val;
			}
		}
		
	return $sum;
	}
	
function del_emptys($arr) {
	foreach ($arr as $val) {
		if (!empty($val)) {
			$new_arr[] = $val;
			}
		}
		
	return $new_arr;
	}
	
if (!function_exists('msec')) {
	function msec() {
		$msecs = explode(" ",microtime());
		$msec = floor($msecs[0] * 1000);
		return $msec;
		}
	}
	
function czy_spelniono_wymagania($wymagania,$budynki) {
	foreach ($wymagania as $budynek => $poziom) {
		if ($budynki[$budynek] >= $poziom) {
			$a++;
			}
		$b++;
		}
				
	if ($a == $b) {
		$return = true;
		} else {
		$return = false;
		}
				
	return $return;
	}
	
function get_validete_reg() {
	return '/[^A-Za-z0-9_�꿟���ʯ�ӌ���\.\/\:\;\[\]\=\+\-\)\(\*\&\^\%\$\#\@\!\~\`\n\| \?\,\{\}]/';
	}
	
function str_validator($str) {
	//Wywal wszystkie niedozwoloze znaki
	$str = preg_replace(get_validete_reg(),'',$str);
	return $str;
	}
	
function is_str_validated($str) {
	return preg_match(get_validete_reg(),$str);
	}
	
function validate_reg($str) {
	$str = str_validator($str);
	
	$from = array('.','/',':',';','[',']','=','+','-',')','(','*','&','^','%','$','#','@','!','~','`','|','?');
	$to = array('\\.','\\/','\\:','\\;','\\[','\\]','\\=','\\+','\\-','\\)','\\(','\\*','\\&','\\^','\\%','\\$','\\#','\\@','\\!','\\~','\\`','\\|','\\?');
	
	$str = str_replace($from,$to,$str);
	
	return $str;
	}
	
function cmp_str($str,$min,$max) {
	$str = str_validator($str);
	$len = strlen($str);
	
	if ($len < $min) {
		return 'SHORT';
		} else {
		if ($len > $max) {
			return 'LONG';
			} else {
			if (substr_count($str," ") == $len) {
				if ($len == 0 && $min == 0) {
					return "";
					} else {
					return 'SPACES';
					}
				} else {
				return $str;
				}
			}
		}
	}
	
function reload_all_rangs() {
// Recarrega Pontos Tribo:
	$aaq = mysql_query("SELECT `id` FROM `ally`");
	while ($si = mysql_fetch_array($aaq)) {
		$villages_ally = sql("SELECT SUM(villages) FROM `users` WHERE `ally` = '".$si[0]."'",'array');
		$mem_ally = sql("SELECT COUNT(id) FROM `users` WHERE `ally` = '".$si[0]."'",'array');
		$points_ally = sql("SELECT SUM(points) FROM `users` WHERE `ally` = '".$si[0]."'",'array');
		$points_ally_40 = sql("SELECT SUM(points) FROM `users` WHERE `ally` = '".$si[0]."' ORDER BY points DESC LIMIT 40",'array');
		
		mysql_query("UPDATE `ally` SET `points` = '$points_ally' , `best_points` = '$points_ally_40' , `villages` = '$villages_ally' , `members` = '$mem_ally' WHERE `id` = '".$si[0]."'");
		}
			
	$rang = 0;
			
//Recarregue as classificações da tribo:
	$query = mysql_query("SELECT id FROM `ally` ORDER BY points DESC");
	while($id = mysql_fetch_array($query)) {
		$rang++;
		mysql_query("UPDATE `ally` SET `rang` = '$rang' WHERE `id` = '".$id[0]."'");
		}
		
	$rang = 0;
		
	//Recarrega as classificações dos jogadores:
	$query = mysql_query("SELECT id FROM `users` ORDER BY points DESC");
	while($id = mysql_fetch_array($query)) {
		$rang++;
		mysql_query("UPDATE `users` SET `rang` = '$rang' WHERE `id` = '".$id[0]."'");
		}
				
	$rang = 0;
		
	//Recarregar classificação desmarcar:
	$query = mysql_query("SELECT id FROM `users` ORDER BY awards_points_all DESC");
	while($id = mysql_fetch_array($query)) {
		$rang++;
		mysql_query("UPDATE `users` SET `award_rang` = '$rang' WHERE `id` = '".$id[0]."'");
		}
			
	$rang = 0;
			
	//Reload ranking�w - pokonanych jako obro�ca graczy:
	$query = mysql_query("SELECT id FROM `users` ORDER BY killed_units_def DESC");
	while($id = mysql_fetch_array($query)) {
		$rang++;
		mysql_query("UPDATE `users` SET `killed_units_def_rank` = '$rang' WHERE `id` = '".$id[0]."'");
		}
			
	$rang = 0;
		
	//Reload ranking�w - pokonanych jako napastnik graczy:
	$query = mysql_query("SELECT id FROM `users` ORDER BY killed_units_att DESC");
	while($id = mysql_fetch_array($query)) {
		$rang++;
		mysql_query("UPDATE `users` SET `killed_units_att_rank` = '$rang' WHERE `id` = '".$id[0]."'");
		}
			
	$rang = 0;
		
	//Reload ranking�w - pokonanych ��cznie graczy:
	$query = mysql_query("SELECT id FROM `users` ORDER BY killed_units_altogether DESC");
	while($id = mysql_fetch_array($query)) {
		$rang++;
		mysql_query("UPDATE `users` SET `killed_units_altogether_rank` = '$rang' WHERE `id` = '".$id[0]."'");
		}
		
	$rang = 0;
	
	//Reload ranking�w plemion - pokonanych jako obro�ca:
	$query = mysql_query("SELECT id FROM `ally` ORDER BY killed_units_def DESC");
	while($id = mysql_fetch_array($query)) {
		$rang++;
		mysql_query("UPDATE `ally` SET `killed_units_def_rang` = '$rang' WHERE `id` = '".$id[0]."'");
		}
			
	$rang = 0;
		
	//Reload ranking�w plemion - pokonanych jako napastnik:
	$query = mysql_query("SELECT id FROM `ally` ORDER BY killed_units_att DESC");
	while($id = mysql_fetch_array($query)) {
		$rang++;
		mysql_query("UPDATE `ally` SET `killed_units_att_rang` = '$rang' WHERE `id` = '".$id[0]."'");
		}
			
	$rang = 0;
		
	//Reload ranking�w plemion - pokonanych ��cznie:
	$query = mysql_query("SELECT id FROM `ally` ORDER BY killed_units_altogether DESC");
	while($id = mysql_fetch_array($query)) {
		$rang++;
		mysql_query("UPDATE `ally` SET `killed_units_altogether_rang` = '$rang' WHERE `id` = '".$id[0]."'");
		}
			
	$rang = 0;
	}
	
function cdb_central() {
	if (!class_exists('configs')) {
		require('../lib/configs.php');
		}
		
	require('../configs/config.php');
	
	$connect = mysql_connect($conf['db_host'],$conf['db_user'],$conf['db_pass'],'');
	mysql_select_db($conf['db_name'],$connect);
	}
	
function cdb_server($serwer = '') {
	if (!empty($serwer) && is_numeric($serwer)) {
		global $db;
		
		$config_file = "../mundo$serwer/lib/config.php";
		if (file_exists($config_file)) {
			require($config_file);
			$db->connect($config['db_host'],$config['db_user'],$config['db_pw'],$config['db_name']);
			} else {
			die ("erro de função cdb_server () - arquivo de configuração mundial ausente<b>$serwer</b>.Contato <a href='game.php?village=".$village['id']."&screen=support'>Equipa</a>");
			}
		} else {
		global $db,$config;
		$db->connect($config['db_host'],$config['db_user'],$config['db_pw'],$config['db_name']);
		}
	}
	
function save2($file,$value) {
	$p = fopen($file,'w');
	fputs($p,$value);
	fclose($p);
	}
	
function get_first_village_group($uid) {
	$group = sql("SELECT `aktu_group` FROM `users` WHERE `id` = '".$uid."'","array");
	
	if (empty($group)) {
		die ("Erro de engomar - não há jogador o id='$uid'");
		} else {
		if ($group === 'all') {
			return getfirstvillage($uid);
			} else {
			$vid = sql("SELECT `id` FROM `villages` WHERE `userid` = '".$uid."' AND `group` = '".$group."'","array");
			
			if (empty($vid)) {
				return getfirstvillage($uid);
				} else {
				return $vid;
				}
			}
		}
	}
	
function reload_vdata($osadaid,$czas) {
	global $arr_production,$config,$arr_maxstorage,$bonus;
		
	//Reload surowc�w w wiosce:
	$osadainfo = sql("SELECT stone,wood,iron,r_stone,r_wood,r_iron,storage,last_prod_aktu,agreement,userid,bonus FROM `villages` WHERE id = '$osadaid'",'assoc');
	
	$wm = 1;
	$sm = 1;
	$im = 1;
	
	$_LAST_RELOAD_DIFF = $czas - $osadainfo['last_prod_aktu'];
	
	if ($osadainfo['last_prod_aktu'] != $czas && $_LAST_RELOAD_DIFF > 0) {
		if ($osadainfo['bonus'] == 2) {
			$wm += $bonus->bonusy[$osadainfo['bonus']]['modifer'];
			$sm += $bonus->bonusy[$osadainfo['bonus']]['modifer'];
			$im += $bonus->bonusy[$osadainfo['bonus']]['modifer'];
			}
			
		if ($osadainfo['bonus'] == 3) {
			$wm += $bonus->bonusy[$osadainfo['bonus']]['modifer'];
			}
			
		if ($osadainfo['bonus'] == 4) {
			$sm += $bonus->bonusy[$osadainfo['bonus']]['modifer'];
			}
			
		if ($osadainfo['bonus'] == 5) {
			$im += $bonus->bonusy[$osadainfo['bonus']]['modifer'];
			}
			
		$p['w'] = $arr_production[$osadainfo['wood']] * $config['speed'] * $wm * (($czas - $osadainfo['last_prod_aktu']) / 3600);
		$p['s'] = $arr_production[$osadainfo['stone']] * $config['speed'] * $sm *(($czas - $osadainfo['last_prod_aktu']) / 3600);
		$p['i'] = $arr_production[$osadainfo['iron']] * $config['speed'] * $im * (($czas - $osadainfo['last_prod_aktu']) / 3600);
			
		(int)$prod['drewno'] = $osadainfo['r_wood'] + $p['w'];
		(int)$prod['kamienie'] = $osadainfo['r_stone'] + $p['s'];
		(int)$prod['ruda'] = $osadainfo['r_iron'] + $p['i'];
		(int)$prod['maxmag'] = $arr_maxstorage[$osadainfo['storage']];
		
		if ($osadainfo['bonus'] == 1) {
			$prod['maxmag'] *= $bonus->bonusy[$osadainfo['bonus']]['modifer'] + 1;
			}
		
		if ($prod['drewno'] > $prod['maxmag']) {
			$prod['drewno'] = $prod['maxmag'];
			}
		
		if ($prod['kamienie'] > $prod['maxmag']) {
			$prod['kamienie'] = $prod['maxmag'];
			}
		
		if ($prod['ruda'] > $prod['maxmag']) {
			$prod['ruda'] = $prod['maxmag'];
			}
		
		//Reload poparcia w wiosce:
		$new_agreement = $config['agreement_per_hour'] * $config['speed'] * (($czas - $osadainfo['last_prod_aktu']) / 3600);
		$new_agreement += $osadainfo['agreement'];
		if ($new_agreement > 100) $new_agreement = 100;
	
		//Reload treningu jednostek w wiosce:
		$mysql_trening_zap = mysql_query("SELECT unit,num_unit,num_finished,time_start,time_finished,time_per_unit,id FROM `recruit` WHERE `villageid` = '$osadaid' AND `time_start` <= '$czas'");
		while ($rec_arr = mysql_fetch_assoc($mysql_trening_zap)) {
			if ($czas >= $rec_arr['time_finished']) {
				mysql_query("DELETE FROM `recruit` WHERE `id` = '".$rec_arr['id']."'");
				$czas_od_startu = $rec_arr['time_finished'] - $rec_arr['time_start'];
				$jednostki_add = floor($rec_arr['num_unit'] - $rec_arr['num_finished']);
				mysql_query("UPDATE `unit_place` SET `".$rec_arr['unit']."` = `".$rec_arr['unit']."` + '$jednostki_add' WHERE `villages_from_id` = '".$osadaid."' AND `villages_to_id` = '".$osadaid."'");
				mysql_query("UPDATE `villages` SET `all_".$rec_arr['unit']."` = `all_".$rec_arr['unit']."` + '$jednostki_add' WHERE `id` = '".$osadaid."'");
				if ($jednostki_add > 0 && $rec_arr['unit'] == 'unit_paladin') {
					$vuser = sql("SELECT `userid` FROM `villages` WHERE `id` = '$osadaid'",'array');
					mysql_query("UPDATE `users` SET `paladins` = '1' , `pala_train` = '0' , `pala_vill` = '$osadaid' WHERE `id` = '$vuser'");
					}
				} else {
				$czas_od_startu = $czas - $rec_arr['time_start'];
				$jednostki_add = floor($czas_od_startu / $rec_arr['time_per_unit']) - $rec_arr['num_finished'];
				mysql_query("UPDATE `unit_place` SET `".$rec_arr['unit']."` = `".$rec_arr['unit']."` + '$jednostki_add' WHERE `villages_from_id` = '".$osadaid."' AND `villages_to_id` = '".$osadaid."'");
				mysql_query("UPDATE `villages` SET `all_".$rec_arr['unit']."` = `all_".$rec_arr['unit']."` + '$jednostki_add' WHERE `id` = '".$osadaid."'");
				mysql_query("UPDATE `recruit` SET `num_finished` = `num_finished` + '$jednostki_add' WHERE `id` = '".$rec_arr['id']."'");
				if ($jednostki_add > 0 && $rec_arr['unit'] == 'unit_paladin') {
					$vuser = sql("SELECT `userid` FROM `villages` WHERE `id` = '$osadaid'",'array');
					mysql_query("UPDATE `users` SET `paladins` = '1' , `pala_train` = '0' , `pala_vill` = '$osadaid' WHERE `id` = '$vuser'");
					}
				}
			}
			
		//Reload atak�w na wiosk�:
		$ilosc_atakow_na_wioske = sql("SELECT COUNT(id) FROM `movements` WHERE `send_to_village` = '".$osadaid."' AND `type` = 'attack'",'array');
	
		//Zapisa� zmiany:
		mysql_query("UPDATE `villages` SET `r_stone` = '".$prod['kamienie']."' , `r_wood` = '".$prod['drewno']."' , `r_iron` = '".$prod['ruda']."' , `last_prod_aktu` = '".$czas."' , `agreement` = '$new_agreement' , `attacks` = '$ilosc_atakow_na_wioske' , `allw` = `allw` + '".$p['w']."' , `alls` = `alls` + '".$p['s']."' , `alli` = `alli` + '".$p['i']."' WHERE id = '".$osadaid."'");
		}
	}
	
function sim_battle($wojsko_obroncy,$wojsko_napastnika,$mor_level,$cel_katapolt_level,$szeczescie,$morale,$noc,$cel_budynek_nazwa = null,$att_pala_item,$def_pala_item) {
	global $cl_units,$config,$arr_wall_bonus,$arr_basic_defense,$cl_builds,$pala_bonus,$arr_builds_starts_by_one;
	
	if ($config['moral_activ'] === true) {
		$morale = floor($morale) / 100;
		} else {
		$morale = 1;
		}
		
	$szeczescie /= 100;
	$szeczescie++;
	$suma_j_att = 0;
	
	foreach ($cl_units->get_array("dbname") as $jname) {
		if (entparse($def_pala_item) == $jname) {
			$def_modifer = $pala_bonus[$jname][1];
			} else {
			$def_modifer = 1;
			}
			
		$sila_obrony_piechota += $wojsko_obroncy[$jname] * $cl_units->get_def($jname,1) * $def_modifer;
		
		if (entparse($att_pala_item) == $jname) {
			$aktuunit_att = $cl_units->get_att($jname,1) * $pala_bonus[$jname][0];
			} else {
			$aktuunit_att = $cl_units->get_att($jname,1);
			}
		
		$sila_ataku += $wojsko_napastnika[$jname] * $aktuunit_att;
		$suma_j_att += $wojsko_napastnika[$jname];
		
		if ($cl_units->get_group($jname) == 'foot') {
			$wojsko['foot'] += $wojsko_napastnika[$jname];
			}
		if ($cl_units->get_group($jname) == 'cav') {
			$wojsko['cav'] += $wojsko_napastnika[$jname];
			}
		if ($cl_units->get_group($jname) == 'archer') {
			$wojsko['archer'] += $wojsko_napastnika[$jname];
			}
		}
		
	$sila_ataku *= $szeczescie;
	$sila_ataku *= $morale;
	
	if ($noc) {
		$sila_obrony_piechota *= 2;
		}
		
	$sila_obrony_piechota += $config['reason_defense'];
	$sila_obrony_piechota += $arr_basic_defense[$mor_level];
	$sila_obrony_piechota *= $arr_wall_bonus[$mor_level] + 1;

	if ($sila_ataku < 1) {
		$sila_ataku = 1;
		}
	if ($sila_obrony_piechota < 1) {
		$sila_obrony_piechota = 1;
		}
	
	$stosunki['att_as_deff'] = pow($sila_ataku,"1.5") / pow($sila_obrony_piechota,"1.5");
	
	if ($stosunki['att_as_deff'] > 1) {
		$stosunki['att_as_deff'] = 1;
		}
		
	$tarany = $wojsko_napastnika['unit_ram'];
	$nowy_mur_level = $mor_level;
	if ($tarany > 0) {
		$ram_damage = $tarany;
		if ($att_pala_item == 'unit_ram') {
			$ram_damage *= 2;
			}
		$ram_damage *= $stosunki['att_as_deff'];
		$ram_damage = floor($ram_damage);
		
		$wall_hp = $mor_level * 22;
		
		if ($ram_damage > $wall_hp) {
			$nowy_mur_level = 0;
			} else {
			$nowy_mur_level = round(($wall_hp - $ram_damage) / 22);
			}
		}
		
	unset($wall_hp);
	unset($ram_damage);
	unset($tarany);
		
	$katapulty = $wojsko_napastnika['unit_catapult'];
	$nowy_ktpc_level = $cel_katapolt_level;
	if ($katapulty > 0) {
		$catapult_damage = $katapulty;
		if ($att_pala_item == 'unit_catapult') {
			$catapult_damage *= 2;
			}
		$catapult_damage *= $stosunki['att_as_deff'];
		$catapult_damage = floor($catapult_damage);
		
		$ktpc_hp = $cel_katapolt_level * 22;
		
		if ($catapult_damage > $ktpc_hp) {
			$nowy_ktpc_level = 0;
			} else {
			$nowy_ktpc_level = round(($ktpc_hp - $catapult_damage) / 22);
			}
			
		/*Zabespieczenie przed doszcz�tnym przez katapulty zniszczeniem ratusza,spichlerza,kryj�wki,zagrody i placu*/
		if (!empty($cel_budynek_nazwa) && $cel_katapolt_level > 0 && $nowy_ktpc_level < 1) {
			if (in_array($cel_budynek_nazwa,$arr_builds_starts_by_one)) {
				$nowy_ktpc_level = 1;
				}
			}
		}
		
	unset($ktpc_hp);
	unset($catapult_damage);
	unset($katapulty);
	
	unset($stosunki);
	
	if ($sila_ataku < 1) {
		$sila_ataku = 1;
		}
	if ($sila_obrony_piechota < 1) {
		$sila_obrony_piechota = 1;
		}
	
	$sila_obrony_piechota /= $arr_wall_bonus[$mor_level] + 1;
	$sila_obrony_piechota -= $arr_basic_defense[$mor_level];
	
	$_diff_wall = round(($mor_level - $nowy_mur_level) / 2) + $nowy_mur_level;
	
	$sila_obrony_piechota *= $arr_wall_bonus[$_diff_wall] + 1;
	$sila_obrony_piechota += $arr_basic_defense[$_diff_wall];

	unset($_diff_wall);
	
	$sila_obrony_piechota = pow($sila_obrony_piechota,"1.5");
	
	$sila_ataku = pow($sila_ataku,"1.5");
	
	if ($sila_ataku < 1) {
		$sila_ataku = 1;
		}
	if ($sila_obrony_piechota < 1) {
		$sila_obrony_piechota = 1;
		}

	$stosunki['att_as_deff_foot'] = $sila_ataku / $sila_obrony_piechota;
	$stosunki['deff_foot_as_att'] = $sila_obrony_piechota / $sila_ataku;
	
	if ($stosunki['att_as_deff_foot'] > 1) {
		$wygral = "napastnik";
		$stosunek_straty['piechota'] = $stosunki['deff_foot_as_att'];
		if ($stosunek_straty['piechota'] > 1) {
			$stosunek_straty['piechota'] = 1;
			}
		} else {
		$wygral = "obronca";
		$stosunek_straty['wszystko'] = $stosunki['att_as_deff_foot'];
		}
		
	$szpiegowanie = false;
	
	foreach ($cl_units->get_array("dbname") as $jname) {
		if ($wygral == "napastnik") {
			if ($jname == 'unit_spy') {
				$szpieg_pow_ilosc_att = pow($wojsko_napastnika[$jname] * 2,'1.5');
				$szpieg_pow_ilosc_def = pow($wojsko_obroncy[$jname],'1.5');
				if ($szpieg_pow_ilosc_att > $szpieg_pow_ilosc_def) {
					$szpiegowanie = true;
					$napastnik_straty[$jname] = round($wojsko_napastnika[$jname] * ($szpieg_pow_ilosc_def / $szpieg_pow_ilosc_att));
					} else {
					$szpiegowanie = false;
					$napastnik_straty[$jname] = $wojsko_napastnika[$jname];
					}
				$obronca_straty[$jname] = $wojsko_obroncy[$jname];
				$nap_os_straty += $cl_units->get_bhprice($jname) * $napastnik_straty[$jname];
				$obr_os_straty += $cl_units->get_bhprice($jname) * $obronca_straty[$jname];
				$maks_lup += $cl_units->get_booty($jname) * ($wojsko_napastnika[$jname] - $napastnik_straty[$jname]);
				} else {
				$napastnik_straty[$jname] = round($wojsko_napastnika[$jname] * $stosunek_straty['piechota']);
				$obronca_straty[$jname] = $wojsko_obroncy[$jname];
				$nap_os_straty += $cl_units->get_bhprice($jname) * $napastnik_straty[$jname];
				$obr_os_straty += $cl_units->get_bhprice($jname) * $obronca_straty[$jname];
				$maks_lup += $cl_units->get_booty($jname) * ($wojsko_napastnika[$jname] - $napastnik_straty[$jname]);
				}
			}
		if ($wygral == "obronca") {
			if ($jname == 'unit_spy') {
				$szpieg_pow_ilosc_att = pow($wojsko_napastnika[$jname] * 2,'1.5');
				$szpieg_pow_ilosc_def = pow($wojsko_obroncy[$jname],'1.5');
				if ($szpieg_pow_ilosc_att > $szpieg_pow_ilosc_def) {
					$szpiegowanie = true;
					$napastnik_straty[$jname] = round($wojsko_napastnika[$jname] * ($szpieg_pow_ilosc_def / $szpieg_pow_ilosc_att));
					} else {
					$szpiegowanie = false;
					$napastnik_straty[$jname] = $wojsko_napastnika[$jname];
					}
				$obronca_straty[$jname] = round($wojsko_obroncy[$jname] * $stosunek_straty['wszystko']);
				$nap_os_straty += $cl_units->get_bhprice($jname) * $napastnik_straty[$jname];
				$obr_os_straty += $cl_units->get_bhprice($jname) * $obronca_straty[$jname];
				} else {
				$napastnik_straty[$jname] = $wojsko_napastnika[$jname];
				$obronca_straty[$jname] = round($wojsko_obroncy[$jname] * $stosunek_straty['wszystko']);
				$nap_os_straty += $cl_units->get_bhprice($jname) * $napastnik_straty[$jname];
				$obr_os_straty += $cl_units->get_bhprice($jname) * $obronca_straty[$jname];
				}
			}
		}
		
	if ($wygral === "napastnik") {
		$_szlachta_pozostala = $wojsko_napastnika['unit_snob'] - $napastnik_straty['unit_snob'];
		if ($_szlachta_pozostala > 0) {
			$pop_minus = true;
			} else {
			$pop_minus = false;
			}
		} else {
		$pop_minus = false;
		}
		
	if (($mor_level != $nowy_mur_level) || ($cel_katapolt_level != $nowy_ktpc_level)) {
		$czy_punkty_minus = true;
		
		$nowy_mur_levelmod = $nowy_mur_level + 1;
		for ($i = $nowy_mur_levelmod; $i <= $mor_level; $i++) {
			$stracone_os += $cl_builds->get_bh('wall',$i);
			$stracone_punkty += $cl_builds->get_points_stage('wall',$i);
			}
			
		if ($cel_budynek_nazwa !== null) {
			$nowy_ktpc_level_mod = $nowy_ktpc_level + 1;
			for ($i = $nowy_ktpc_level_mod; $i <= $cel_katapolt_level; $i++) {
				$stracone_os += $cl_builds->get_bh($cel_budynek_nazwa,$i);
				$stracone_punkty += $cl_builds->get_points_stage($cel_budynek_nazwa,$i);
				}
			}
		} else {
		$czy_punkty_minus = false;
		}

	if ($suma_j_att == $wojsko_napastnika['unit_spy']) {
		$tylko_szpiegowanie = true;
		} else {
		$tylko_szpiegowanie = false;
		}
		
	$output_array = array(
		'jednostki_att_straty' => $napastnik_straty,
		'jednsotki_def_straty' => $obronca_straty,
		'wygral' => $wygral,
		'mur_nowy_lvl' => $nowy_mur_level,
		'mur_stary_lvl' => $mor_level,
		'ktpc_nowy_lvl' => $nowy_ktpc_level,
		'ktpc_stary_lvl' => $cel_katapolt_level,
		'att_osadnicy_straty' => $nap_os_straty,
		'def_osadnicy_straty' => $obr_os_straty,
		'strata_punktow' => $stracone_punkty,
		'strata_osadnicy' => $stracone_os,
		'czy_punkty_minus' => $czy_punkty_minus,
		'zbicie_poparcia' => $pop_minus,
		'szpiegowanie' => $szpiegowanie,
		'tylko_szpiegowanie' => $tylko_szpiegowanie,
		'maks_lup' => $maks_lup,
		'stosunek_deff' => $stosunek_straty['wszystko']
		);
		
	return $output_array;
	}
	
function kalkuluj_morale($punkty_obroncy,$punkty_napastnika) {
    global $config;
    $morale = floor((($punkty_obroncy / $punkty_napastnika) * 3 + 0.25) * 100);
	if ($morale > 100) {
	    $morale = 100;
	    }
	if ($morale < $config['min_moral']) {
	    $morale = $config['min_moral'];
	    }
	return $morale;
    }
	
function pora_dnia($czas) {
	$sek_d = $czas % 86400;
	
	if ($sek_d < 25200) {
	    $noc = true;
	    } else {
		$noc = false;
		}
	return $noc;
	}
	
function can_require_events() {
	$count = sql("SELECT COUNT(id) FROM `events` WHERE `event_time` <= '".date("U")."'","array");
	if ($count > 0) {
		return true;
		} else {
		return false;
		}
	}
	
function reload_ally_points() {
	//Reload punkt�w plemion:
	$aaq = mysql_query("SELECT `id` FROM `ally`");
	while ($si = mysql_fetch_array($aaq)) {
		$villages_ally = sql("SELECT SUM(villages) FROM `users` WHERE `ally` = '".$si[0]."'",'array');
		$mem_ally = sql("SELECT COUNT(id) FROM `users` WHERE `ally` = '".$si[0]."'",'array');
		$points_ally = sql("SELECT SUM(points) FROM `users` WHERE `ally` = '".$si[0]."'",'array');
		$points_ally_40 = sql("SELECT SUM(points) FROM `users` WHERE `ally` = '".$si[0]."' ORDER BY points DESC LIMIT 40",'array');
		
		mysql_query("UPDATE `ally` SET `points` = '$points_ally' , `best_points` = '$points_ally_40' , `villages` = '$villages_ally' , `members` = '$mem_ally' WHERE `id` = '".$si[0]."'");
		}
			
	$rang = 0;
	}
	
function reload_ally_rangs() {
	//Reload ranking�w plemion:
	$query = mysql_query("SELECT id FROM `ally` ORDER BY points DESC");
	while($id = mysql_fetch_array($query)) {
		$rang++;
		mysql_query("UPDATE `ally` SET `rank` = '$rang' WHERE `id` = '".$id[0]."'");
		}
	
	$rang = 0;
	
	//Reload ranking�w plemion - pokonanych jako obro�ca:
	$query = mysql_query("SELECT id FROM `ally` ORDER BY killed_units_def DESC");
	while($id = mysql_fetch_array($query)) {
		$rang++;
		mysql_query("UPDATE `ally` SET `killed_units_def_rang` = '$rang' WHERE `id` = '".$id[0]."'");
		}
			
	$rang = 0;
		
	//Reload ranking�w plemion - pokonanych jako napastnik:
	$query = mysql_query("SELECT id FROM `ally` ORDER BY killed_units_att DESC");
	while($id = mysql_fetch_array($query)) {
		$rang++;
		mysql_query("UPDATE `ally` SET `killed_units_att_rang` = '$rang' WHERE `id` = '".$id[0]."'");
		}
			
	$rang = 0;
		
	//Reload ranking�w plemion - pokonanych ��cznie:
	$query = mysql_query("SELECT id FROM `ally` ORDER BY killed_units_altogether DESC");
	while($id = mysql_fetch_array($query)) {
		$rang++;
		mysql_query("UPDATE `ally` SET `killed_units_altogether_rang` = '$rang' WHERE `id` = '".$id[0]."'");
		}
	}
	
function add_allyevent($allyid,$text) {
	mysql_query("INSERT INTO ally_events(ally,time,message) VALUES ('$allyid','".date("U")."','$text')");
	
	return true;
	}

function add_pe($us,$text,$swiat,$saldo) {
require('../configs/config.php');
				$connect = mysql_connect($conf['db_host'],$conf['db_user'],$conf['db_pass'],'');
	            mysql_select_db($conf['db_name'],$connect);

 mysql_query("INSERT INTO premium_logi(gracz,tekst,swiat,data,saldo) VALUES ('".$us."','$text','$swiat','".date("U")."','$saldo')");
	
	return true;
			$db_server_lan_cnnct_var = mysql_connect($config['db_host'],$config['db_user'],$config['db_pw'],'');
			mysql_select_db($config['db_name'],$db_server_lan_cnnct_var);
	}



	
//Wysy�anie wiadomo�ci
function send_mail($from_id, $from_name, $to_id, $to_name, $subject, $message, $output) {
    global $db;

    if ($output) {
    $db->query( 'INSERT into mail_out
        (from_id,from_username,to_id,to_username,subject,text,time) VALUES
        (' . $from_id . ',\'' . $from_name . '\',' . $to_id . ',\'' . $to_name . '\',\'' . $subject . '\',\'' . $message . '\',' . time(  ) . ')' );
			$outid = $db->getLastId(  );
        } else {
			$outid = -1;
        }

    $db->query( 'INSERT into mail_in
        (from_id,from_username,to_id,to_username,subject,text,output_id,time) VALUES
        (' . $from_id . ',\'' . $from_name . '\',' . $to_id . ',\'' . $to_name . '\',\'' . $subject . '\',\'' . $message . '\',' . $outid . ',' . time(  ) . ')' );
    $db->query( 'UPDATE users SET new_mail=1 where id=' . $to_id );
	}

//Usu� plemi� bez graczy
function delte_empty_ally() {

			//Usu� zaproszenia do sojuszu docelowego:
			mysql_query("DELETE FROM `ally_invites` WHERE `from_ally` = '".$user['ally']."'");
				
			//Usu� eventy z sojuszu docelowego:
			mysql_query("DELETE FROM `ally_events` WHERE `ally` = '".$user['ally']."'");
			
			//Usu� sojusz:
			mysql_query("DELETE FROM `ally` WHERE `id` = '".$user['ally']."'");
			
			//Usu� rezerwacje:
			mysql_query("DELETE FROM `rezerwacje` WHERE `od_plemienia` = '".$user['ally']."'");
			mysql_query("DELETE FROM `rezerwacje_log` WHERE `plemie` = '".$user['ally']."'");
			
			//Usu� dzielenie rezerwacji:
			mysql_query("DELETE FROM `dzielenie_rezerwacji` WHERE `od_plemienia` = '".$user['ally']."'");
			mysql_query("DELETE FROM `dzielenie_rezerwacji` WHERE `do_plemienia` = '".$user['ally']."'");
			
			//Usu� forum sojuszu:
			$sql = mysql_query("SELECT id FROM `fora` WHERE `plemie` = '".$user['ally']."'");
			while ($id = mysql_fetch_array($sql)) {
				$fid = $id[0];
				mysql_query("DELETE FROM `fora` WHERE `id` = '$fid'");
				mysql_query("DELETE FROM `tematy` WHERE `forum` = '$fid'");
				mysql_query("DELETE FROM `posty` WHERE `forum` = '$fid'");
				mysql_query("DELETE FROM `czytanie` WHERE `fid` = '$fid'");
				mysql_query("DELETE FROM `f_ankiety` WHERE `fid` = '$fid'");
				}
				
			//Usu� kontrakty:
			mysql_query("DELETE FROM `kontrakty` WHERE `od_plemienia` = '".$user['ally']."'");
			mysql_query("DELETE FROM `kontrakty` WHERE `do_plemienia` = '".$user['ally']."'");
			
			//Reload ranking�w:
			reload_all_rangs();
			
	}