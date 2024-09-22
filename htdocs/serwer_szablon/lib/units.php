<?php
class units {
	//Zmienne supreglobalne klasy units:
	var $dbname = null;
	var $last_dbname = null;
	var $name = null;
	var $woodprice = null;
	var $stoneprice = null;
	var $ironprice = null;
	var $bhprice = null;
	var $att = null;
	var $def = null;
	var $defCav = null;
	var $defArcher = null;
	var $speed = null;
	var $booty = null;
	var $time = null;
	var $recruit_in = null;
	var $needed = null;
	var $specials = null;
	var $group = null;
	var $col = null;
	var $description = null;
	var $atttype = null;
	var $last_error = null;
	var $db = null;
	var $unitfactor = null;
	var $config = null;
	
	function units() {
		global $config,$db;
		
		$this->db = $db;
		$this->config = $config;
		}
		
	function add_unit($name,$dbname) {
		$this->dbname[$name] = $dbname;
		$this->name[$dbname] = $name;
		$this->last_dbname = $dbname;
		}
		
	function set_needed($array) {
		$this->needed[$this->last_dbname] = $array;
		}
		
	function set_woodprice($price) {
		$this->woodprice[$this->last_dbname] = $price;
		}
		
	function set_stoneprice($price) {
		$this->stoneprice[$this->last_dbname] = $price;
		}
		
	function set_ironprice($price) {
		$this->ironprice[$this->last_dbname] = $price;
		}
		
	function set_bhprice($price) {
		$this->bhprice[$this->last_dbname] = $price;
		}
		
	function set_description($text) {
		$this->description[$this->last_dbname] = $text;
		}
		
	function set_time($time) {
		$this->time[$this->last_dbname] = $time;
		}
		
	function set_att($b,$m) {
		$this->att[$this->last_dbname] = $b.','.$m;
		}
		
	function set_group($group) {
		$this->group[$this->last_dbname] = $group;
		}
		
	function set_def($b,$m) {
		$this->def[$this->last_dbname] = $b.','.$m;
		}
		
	function set_atttype($t) {
		$this->atttype[$this->last_dbname] = $t;
		}
		
	function set_defcav($b,$m) {
		$this->defCav[$this->last_dbname] = $b.','.$m;
		}
		
	function set_defarcher($b,$m) {
		$this->defArcher[$this->last_dbname] = $b.','.$m;
		}
		
	function set_speed($value) {
		$this->speed[$this->last_dbname] = $value;
		}
		
	function set_booty($value) {
		$this->booty[$this->last_dbname] = $value;
		}
		
	function set_col($value) {
		$this->col[$this->last_dbname] = $value;
		}
		
	function set_recruit_in($building) {
		$this->recruit_in[$this->last_dbname] = $building;
		}
		
	function set_unitfactor($b,$m) {
		$this->unitfactor = $b.','.$m;
		}
		
	function set_specials($array) {
		$this->specials[$this->last_dbname] = $array;
		}
		
	function get_array($name) {
		return $this->$name;
		}
		
	function get_atttype($name) {
		$type = $this->atttype[$name];
		return $type;
		}
		
	function get_lowest_unit($array) {
		foreach ($array as $uname => $num) {
			if ($num > 0) {
				$speeds[] = $this->speed[$uname];
				}
			}
			
		$slowest_unit = max($speeds);
		
		return $slowest_unit;
		}
		
	function get_recruit_in_units($building) {
		foreach ($this->name as $dbname => $name) {
			if ($this->recruit_in[$dbname] == $building) {
				$units[$dbname] = $name;
				}
			}
			
		return $units;
		}
		
	function get_col($dbname) {
		$col = $this->col[$dbname];
		return $col;
		}
		
	function check_needed($unit,$village_info) {
		global $arr_farm,$bonus;
		
		$this->last_error = null;
		
		if (count($this->needed[$unit]) > 0) {
			foreach ($this->needed[$unit] as $build => $stage) {
				$need_builds[] = $build;
				}

			foreach ($this->needed[$unit] as $build => $stage) {
				if ($village_info[$build] >= $stage) {
					$need_counter++;
					}
				}
				
			if ($need_counter != $this->get_countneeded($unit)) {
				$this->last_error = 'not_needed';
				}
			}
			
		if (empty($this->last_error)) {
			if (!in_array("no_investigate",$this->get_specials($unit))) {
				if ($village_info[$unit.'_tec_level'] == 0) {
					$this->last_error = 'not_tec';
					}
				}
			}
			
		if (empty($this->last_error)) {
			if ($this->get_woodprice($unit) > $village_info['r_wood'] || $this->get_stoneprice($unit) > $village_info['r_stone'] || $this->get_ironprice($unit) > $village_info['r_iron']) {
				$this->last_error = 'not_enough_ress';
				}
			}
			
		if (empty($this->last_error)) {
			if ($village_info['bonus'] == 9) {
				$pojemnosc_zagrody = floor($arr_farm[$village_info['farm']] * ($bonus->bonusy[$village_info['bonus']]['modifer'] + 1));
				} else {
				$pojemnosc_zagrody = $arr_farm[$village_info['farm']];
				}
				
			$wolni_osadnicy = $pojemnosc_zagrody - $village_info['r_bh'];
			if ($this->get_bhprice($unit) > $wolni_osadnicy) {
				$this->last_error = 'not_enough_bh';
				}
			}
			
		if (empty($this->last_error)) {
			$can_create['wood'] = floor($village_info['r_wood'] / $this->get_woodprice($unit));
			$can_create['stone'] = floor($village_info['r_stone'] / $this->get_stoneprice($unit));
			$can_create['iron'] = floor($village_info['r_iron'] / $this->get_ironprice($unit));
			$can_create['bh'] = floor($wolni_osadnicy / $this->get_bhprice($unit));
			$this->last_error = min($can_create);
			}
		}
		
	function recruit_units($unit,$count,$building,$build_stage,$vid) {
		//Wybierz bonus wioski:
		$vinfo = sql("SELECT bonus,userid FROM `villages` WHERE `id` = '$vid'",'array');
		
		$recruit_time = $this->get_time($build_stage,$unit,$vinfo['bonus']) * $count;
		
		$last_recruit = sql("SELECT `time_finished` FROM `recruit` WHERE `villageid` = '$vid' AND `building` = '$building' ORDER BY `id` DESC LIMIT 1",'array');
		
		if (empty($last_recruit)) {
			$time_start = date("U");
			$time_end = $time_start + $recruit_time;
			$time_per_unit = $recruit_time / $count;
			
			mysql_query("INSERT INTO recruit(unit,num_unit,time_finished,time_start,time_per_unit,building,villageid,userid) VALUES('$unit','$count','$time_end','$time_start','$time_per_unit','$building','$vid','".$vinfo['userid']."')");
			} else {
			$time_start = $last_recruit;
			$time_end = $time_start + $recruit_time;
			$time_per_unit = $recruit_time / $count;
			
			mysql_query("INSERT INTO recruit(unit,num_unit,time_finished,time_start,time_per_unit,building,villageid,userid) VALUES('$unit','$count','$time_end','$time_start','$time_per_unit','$building','$vid','".$vinfo['userid']."')");
			}
		}
		
	function get_woodprice($dbname) {
		return $this->woodprice[$dbname];
		}
		
	function get_stoneprice($dbname) {
		return $this->stoneprice[$dbname];
		}
		
	function get_ironprice($dbname) {
		return $this->ironprice[$dbname];
		}
		
	function get_bhprice($dbname) {
		return $this->bhprice[$dbname];
		}
		
	function get_specials($dbname) {
		return $this->specials[$dbname];
		}
		
	function get_needed($dbname) {
		return $this->needed[$dbname];
		}
		
	function get_description($dbname) {
		return $this->description[$dbname];
		}
		
	function get_countneeded($dbname) {
		return count($this->needed[$dbname]);
		}
		
	function get_group($dbname) {
		return $this->group[$dbname];
		}
		
	function get_speed($dbname) {
		return $this->speed[$dbname];
		}
		
	function get_time($stage,$unit,$village_bonus = 0) {
		global $bonus;
		
		$faktor = explode(',',$this->unitfactor);
		$start = pow($faktor[1],$stage);
		
		$unit_build = $this->recruit_in[$unit];
		
		$modifer = 1;
		
		if ($unit_build == 'barracks' && $village_bonus == 6) {
			$modifer = 1 - $bonus->bonusy[$village_bonus]['modifer'];
			if ($modifer < 0) {
				$modifer = 0;
				}
			}
			
		if ($unit_build == 'stable' && $village_bonus == 7) {
			$modifer = 1 - $bonus->bonusy[$village_bonus]['modifer'];
			if ($modifer < 0) {
				$modifer = 0;
				}
			}
			
		if ($unit_build == 'garage' && $village_bonus == 8) {
			$modifer = 1 - $bonus->bonusy[$village_bonus]['modifer'];
			if ($modifer < 0) {
				$modifer = 0;
				}
			}
			
		$time = (($this->time[$unit] * $faktor[0] * $start) / $this->config['speed']) * $modifer;
		return $time;
		}
		
	function get_time_round($stage,$unit,$village_bonus = 0) {
		$time = round($this->get_time($stage,$unit,$village_bonus));
		return $time;
		}
		
	function get_name($dbname) {
		return $this->name[$dbname];
		}
		
	function get_booty($dbname) {
		return $this->booty[$dbname];
		}
		
	function get_graphicname($dbname) {
		$dbname = explode('_',$dbname);
		return array_pop($dbname);
		}
		
	function get_att($dbname,$stage) {
		$array = explode(',',$this->att[$dbname]);
		$modyfikator = pow($array[1],$stage);
		$att = round($array[0] * $modyfikator);
		return $att;
		}
		
	function get_def($dbname,$stage) {
		$array = explode(',',$this->def[$dbname]);
		$modyfikator = pow($array[1],$stage);
		$att = round($array[0] * $modyfikator);
		return $att;
		}
		
	function get_defcav($dbname,$stage) {
		$array = explode(',',$this->defCav[$dbname]);
		$modyfikator = pow($array[1],$stage);
		$att = round($array[0] * $modyfikator);
		return $att;
		}
		
	function get_defarcher($dbname,$stage) {
		$array = explode(',',$this->defArcher[$dbname]);
		$modyfikator = pow($array[1],$stage);
		$att = round($array[0] * $modyfikator);
		return $att;
		}
		
	function read_units($from,$to) {
		foreach ($this->get_array("dbname") as $dbname) {
			$units_sum[] = "SUM($dbname) AS `$dbname`";
			}
			
		$implode_units = implode(',',$units_sum);
		
		$sql = "SELECT $implode_units FROM `unit_place` WHERE ";
		
		if (!empty($from)) {
			$sql .= "`villages_from_id` = '$from'";
			if (!empty($to)) {
				$sql .= " AND ";
				}
			}
		if (!empty($to)) {
			$sql .= "`villages_to_id` = '$to'";
			}
			
		$units = sql($sql,'assoc');
		
		if (!is_array($units)) $units = array();
		
		return $units;
		}
		
	function max_unit_can_be_recruited($kamienie,$drewno,$zelazo,$wolni_os,$koszts,$kosztd,$kosztr,$kosztb) {
		$mozna_wypr[0] = floor($kamienie/$koszts);
		$mozna_wypr[1] = floor($drewno/$kosztd);
		$mozna_wypr[2] = floor($zelazo/$kosztr);
		$mozna_wypr[3] = floor($wolni_os/$kosztb);
		
		$ilosc = min($mozna_wypr);
			  
		if ($ilosc < 0) {
			$ilosc = 0;
			}
		
		return $ilosc;
		}
		
	function get_recruits_counts($os,$jed) {
		$count = sql("SELECT COUNT(id) FROM `recruit` WHERE `villageid` = '$os' AND `unit` = '$jed' LIMIT 1",'array');
		if ($count > 0) {
			$ret = true;
			} else {
			$ret = false;
			}
			
		return $ret;
		}
		
	function odejmij_surowce($osada,$s,$w,$i,$o) {
		mysql_query("UPDATE `villages` SET `r_stone` = `r_stone` - '".$s."' , `r_wood` = `r_wood` - '".$w."' , `r_iron` = `r_iron` - '".$i."' ,  `r_bh` = `r_bh` + '".$o."' WHERE `id` = '".$osada."'");
		}
		
	function czy_spelniono_wymagania($assoc_array,$wymagane_array) {
	    $counter = 0;
	    foreach ($wymagane_array as $key => $val) {
		    if ($assoc_array[$key] >= $val) {
			    $counter += 1;
			    }
		    }
			
		if ($counter == count($wymagane_array)) {
		    $ret = true;
		    } else {
			$ret = false;
			}
			
		return $ret;
	    }
	}
?>