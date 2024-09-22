<?php
class techs {
	var $last_dbname = null;
	var $id = 0;
	var $name = null;
	var $dbname = null;
	var $wood = null;
	var $stone = null;
	var $iron = null;
	var $time = null;
	var $maxStage = null;
	var $needed = null;
	var $group = null;
	var $description = null;
	var $tech_error = null;
	var $time_wait = null;
	var $tech_graphic = null;
	var $is_researches = null;
	var $config = null;
	var $db = null;
	var $smith_factor = null;
	var $atttype = null;
	var $research_counts = array();
	var $research_vid = 0;
	
	function techs() {
		global $config,$db;
		
		$this->db = $db;
		$this->config = $config;
		}
		
	function add_tech($name,$dbname) {
		$this->dbid[$this->id] = $dbname;
		$this->id++;
		$this->dbname[$name] = $dbname;
		$this->name[$dbname] = $name;
		$this->last_dbname = $dbname;
		}
		
	function set_woodprice($b,$m) {
		$this->wood[$this->last_dbname] = $b.','.$m;
		}
		
	function set_stoneprice($b,$m) {
		$this->stone[$this->last_dbname] = $b.','.$m;
		}
		
	function set_ironprice($b,$m) {
		$this->iron[$this->last_dbname] = $b.','.$m;
		}
		
	function set_time($b,$m) {
		$this->time[$this->last_dbname] = $b.','.$m;
		}
		
	function set_smithfactor($b,$m) {
		$this->smith_factor = $b.','.$m;
		}
		
	function set_maxstage($stage) {
		$this->maxStage[$this->last_dbname] = $stage;
		}
		
	function set_needed($array) {
		if (is_array($array)) {
			$this->needed[$this->last_dbname] = $array;
			} else {
			$this->needed[$this->last_dbname] = array();
			}
		}
		
	function set_group($group) {
		$this->group[$this->last_dbname] = $group;
		}
		
	function set_description($desc) {
		$this->description[$this->last_dbname] = $desc;
		}
		
	function set_atttype($array) {
		if (in_array("def",$array)) {
			$this->atttype[$this->last_dbname] = "def";
			}
		if (in_array("off",$array)) {
			$this->atttype[$this->last_dbname] = "off";
			}
		if (in_array("spy",$array)) {
			$this->atttype[$this->last_dbname] = "spy";
			}
		}
		
	function create_research_arr_counts($vid) {
		if ($vid != $this->research_vid) {
			foreach ($this->dbname as $key => $unit_name) {
				$this->research_counts[$unit_name] = 0;
				}
			
			$sql = mysql_query("SELECT `research` FROM `research` WHERE `villageid` = '$vid'");
			while ($arr = mysql_fetch_array($sql)) {
				$this->research_counts[$arr[0]]++;
				}
			$this->research_vid = $vid;
			}
		}
		
	function check_tech($dbname,$village) {
		global $arr_maxstorage,$arr_production,$bonus;
		
		$this->tech_error = null;
		$this->tech_graphic = null;
		$this->time_wait = null;
		
		if (empty($this->name[$dbname])) {
			$this->tech_error = "tech_not_found";
			} else {
			$this->create_research_arr_counts($village['id']);
			$dbname_lvl = $village['unit_' . $dbname . '_tec_level'] + $this->research_counts[$dbname];

			if ($dbname_lvl >= $this->get_maxstage($dbname)) {
				$this->tech_error = "max_stage";
				$this->tech_graphic = $dbname . ".png";
				}
				
			if (empty($this->tech_error)) {
				$NeedBuilds = $this->get_needed($dbname);
				
				if (!is_array($NeedBuilds)) {
					$NeedBuilds = array();
					}
					
				$NeededDone = true;
				
				foreach ($NeedBuilds as $BuildName => $level) {
					if ($village[$BuildName] < $level) {
						$NeededDone = false;
						}
					}
					
				if (!$NeededDone) {
					$this->tech_error = "not_fulfilled";
					$this->tech_graphic = $dbname . "_cross.png";
					}
					
				if (empty($this->tech_error)) {
					$tech_wood_cost = $this->get_wood($dbname,($dbname_lvl + 1));
					$tech_stone_cost = $this->get_stone($dbname,($dbname_lvl + 1));
					$tech_iron_cost = $this->get_iron($dbname,($dbname_lvl + 1));
					
					//Wyznaczy� maksymalna pojemno�� spichlerza:
					$maxmag = $arr_maxstorage[$village['storage']];
					
					if ($village['bonus'] == 1) {
						$maxmag *= $bonus->bonusy[$village['bonus']]['modifer'] + 1;
						}

					if ($tech_wood_cost > $maxmag || $tech_stone_cost > $maxmag || $tech_iron_cost > $maxmag) {
						$this->tech_error = "not_enough_storage";
						if ($village['unit_' . $dbname . '_tec_level'] > 0) {
							$this->tech_graphic = $dbname . ".png";
							} else {
							$this->tech_graphic = $dbname . "_grey.png";
							}
						}
					}
					
				if (empty($this->tech_error)) {
					if ($tech_wood_cost > $village['r_wood'] || $tech_stone_cost > $village['r_stone'] || $tech_iron_cost > $village['r_iron']) {
						$this->tech_error = "not_enough_ress";
						if ($village['unit_' . $dbname . '_tec_level'] > 0) {
							$this->tech_graphic = $dbname . ".png";
							} else {
							$this->tech_graphic = $dbname . "_grey.png";
							}
						
						//Obliczy� za ile b�d� dost�pne surowce:
						$r_wood_comma = ($arr_production[$village['wood']] * $this->config['speed']) / 3600;
						$r_stone_comma = ($arr_production[$village['stone']] * $this->config['speed']) / 3600;
						$r_iron_comma = ($arr_production[$village['iron']] * $this->config['speed']) / 3600;
						
						if ($village['bonus'] == 3) {
							$r_wood_comma *= $bonus->bonusy[$village['bonus']]['modifer'] + 1;
							}
			
						if ($village['bonus'] == 4) {
							$r_stone_comma *= $bonus->bonusy[$village['bonus']]['modifer'] + 1;
							}
			
						if ($village['bonus'] == 5) {
							$r_iron_comma *= $bonus->bonusy[$village['bonus']]['modifer'] + 1;
							}
							
						//Obliczyc brakuj�ce surowce do danej technologii:
						$TimeWaitArr = array();
						
						$TimeWaitArr[0] = ($tech_wood_cost - $village['r_wood']) / $r_wood_comma;
						$TimeWaitArr[1] = ($tech_stone_cost - $village['r_stone']) / $r_stone_comma;
						$TimeWaitArr[2] = ($tech_iron_cost - $village['r_iron']) / $r_iron_comma;
						
						$this->time_wait = round(max($TimeWaitArr));
						$this->time_wait = format_time($this->time_wait);
						} else {
						$this->tech_error = "no_error";
						if ($village['unit_' . $dbname . '_tec_level'] > 0) {
							$this->tech_graphic = $dbname . ".png";
							} else {
							$this->tech_graphic = $dbname . "_grey.png";
							}
						}
					}
				}
			}
		}
		
	function research($dbname,$vid) {
		$vinfo = sql("SELECT smith,unit_".$dbname."_tec_level,userid FROM `villages` WHERE `id` = '$vid'","assoc");
		$vid_uid = $vinfo['userid'];
		
		$this->create_research_arr_counts($vid);
		
		$dbname_lvl = $vinfo['unit_'.$dbname.'_tec_level'] + $this->research_counts[$dbname];
		$research_time = round($this->get_time($vinfo['smith'],$dbname,$dbname_lvl + 1));
		
		$last_research = sql("SELECT `end_time` FROM `research` WHERE `villageid` = '$vid' ORDER BY `id` DESC LIMIT 1",'array');
		
		if (empty($last_research)) {
			$time_start = date("U");
			$time_end = $time_start + $research_time;
			mysql_query("INSERT INTO research(research,villageid,end_time,trwanie) VALUES('$dbname','$vid','$time_end','$research_time')");
			} else {
			$time_start = $last_research;
			$time_end = $time_start + $research_time;
			mysql_query("INSERT INTO research(research,villageid,end_time,trwanie) VALUES('$dbname','$vid','$time_end','$research_time')");
			}
			
		//Doda� ewent:
		$LastId = sql("SELECT `id` FROM `research` WHERE `villageid` = '$vid' ORDER BY `id` DESC LIMIT 1",'array');
		mysql_query("INSERT INTO events(event_time,event_type,event_id,user_id,villageid) VALUES('$time_end','research','$LastId','$vid_uid','$vid')");				
		}
		
	function get_last_error() {
		return $this->tech_error;
		}
		
	function get_graphic() {
		return $this->tech_graphic;
		}
	
	function get_time_wait() {
		return $this->time_wait;
		}
		
	function get_dbname($id) {
		return $this->dbid[$id];
		}
		
	function get_name($dbname) {
		return $this->name[$dbname];
		}
		
	function get_maxstage($dbname) {
		return $this->maxStage[$dbname];
		}
		
	function get_wood($dbname,$stage) {
		$faktor = explode(',',$this->wood[$dbname]);
		$modifer = pow($faktor[1],$stage - 1);
		return round($faktor[0] * $modifer);
		}
		
	function get_stone($dbname,$stage) {
		$faktor = explode(',',$this->stone[$dbname]);
		$modifer = pow($faktor[1],$stage - 1);
		return round($faktor[0] * $modifer);
		}
		
	function get_iron($dbname,$stage) {
		$faktor = explode(',',$this->iron[$dbname]);
		$modifer = pow($faktor[1],$stage - 1);
		return round($faktor[0] * $modifer);
		}
		
	function get_time($smith_stage,$dbname,$stage) {
		$faktor = explode(',',$this->time[$dbname]);
		$faktor_techs = explode(',',$this->smith_factor);
		
		$start_tfactor = $faktor_techs[0] * pow($faktor_techs[1],$smith_stage);
		$modifer = pow($faktor[1],$stage - 1);
		
		$time = round(($faktor[0] * $modifer * $start_tfactor) / $this->config['speed']);
		return $time;
		}
		
	function get_factor($stage) {
		$faktor_techs = explode(',',$this->smith_factor);
		$start_tfactor = $faktor_techs[0] * pow($faktor_techs[1],$stage);
		return $start_tfactor;
		}
		
	function get_group($dbname) {
		return $this->group[$dbname];
		}
		
	function get_array($array_name) {
		return $this->$array_name;
		}
		
	function get_needed($dbname) {
		return $this->needed[$dbname];
		}
		
	function get_atttype($dbname) {
		return $this->atttype[$dbname];
		}
	}

//Start klasy techs();
$cl_techs = new techs();

//Liczby decyduj�ce o szybko�ci badania nowych technologii:
$cl_techs->set_smithfactor("0.997","0.9096");

//Wszystkie technologie
$cl_techs->add_tech("Lança","spear");
$cl_techs->set_group("Infantaria");
$cl_techs->set_woodprice("30","1.6");
$cl_techs->set_stoneprice("25","1.6");
$cl_techs->set_ironprice("35","1.6");
$cl_techs->set_time("240","1.75");
$cl_techs->set_maxStage("1");
$cl_techs->set_needed(array());
$cl_techs->set_attType(array('def','off','spy'));
$cl_techs->set_description("");

$cl_techs->add_tech("Espada","sword");
$cl_techs->set_group("Infantaria");
$cl_techs->set_woodprice("60","1.6");
$cl_techs->set_stoneprice("50","1.6");
$cl_techs->set_ironprice("40","1.6");
$cl_techs->set_time("300","1.75");
$cl_techs->set_maxStage("1");
$cl_techs->set_needed(array("smith"=>"1"));
$cl_techs->set_attType(array('def','off','spy'));
$cl_techs->set_description("");

$cl_techs->add_tech("Machado","axe");
$cl_techs->set_group("Infantaria");
$cl_techs->set_woodprice("700","1.6");
$cl_techs->set_stoneprice("840","1.6");
$cl_techs->set_ironprice("820","1.6");
$cl_techs->set_time("3085","1.75");
$cl_techs->set_maxStage("1");
$cl_techs->set_needed(array("smith"=>"2"));
$cl_techs->set_attType(array('off'));
$cl_techs->set_description("");

$cl_techs->add_tech("Arco","archer");
$cl_techs->set_group("Infantaria");
$cl_techs->set_woodprice("640","1.6");
$cl_techs->set_stoneprice("560","1.6");
$cl_techs->set_ironprice("740","1.6");
$cl_techs->set_time("3600","1.75");
$cl_techs->set_maxStage("1");
$cl_techs->set_needed(array("smith"=>"5","barracks"=>"5"));
$cl_techs->set_attType(array('def'));
$cl_techs->set_description("");

$cl_techs->add_tech("Cavalaria Leve","light");
$cl_techs->set_group("Cavalaria");
$cl_techs->set_woodprice("2200","1.6");
$cl_techs->set_stoneprice("2400","1.6");
$cl_techs->set_ironprice("2000","1.6");
$cl_techs->set_time("5040","1.75");
$cl_techs->set_maxStage("1");
$cl_techs->set_needed(array("stable"=>"3","smith"=>"7"));
$cl_techs->set_attType(array('off'));
$cl_techs->set_description("");

$cl_techs->add_tech("Arqueiro a cavalo","cav_archer");
$cl_techs->set_group("Cavalaria");
$cl_techs->set_woodprice("3000","1.6");
$cl_techs->set_stoneprice("2400","1.6");
$cl_techs->set_ironprice("2000","1.6");
$cl_techs->set_time("5040","1.75");
$cl_techs->set_maxStage("1");
$cl_techs->set_needed(array("stable"=>"5","smith"=>"10"));
$cl_techs->set_attType(array('off'));
$cl_techs->set_description("");

$cl_techs->add_tech("Cavalaria pesada","heavy");
$cl_techs->set_group("Cavalaria");
$cl_techs->set_woodprice("3000","1.6");
$cl_techs->set_stoneprice("2400","1.6");
$cl_techs->set_ironprice("2000","1.6");
$cl_techs->set_time("5040","1.75");
$cl_techs->set_maxStage("1");
$cl_techs->set_needed(array("stable"=>"10","smith"=>"15"));
$cl_techs->set_attType(array('def','off','spy'));
$cl_techs->set_description("");

$cl_techs->add_tech("Ariete","ram");
$cl_techs->set_group("Armas de cerco");
$cl_techs->set_woodprice("1200","1.6");
$cl_techs->set_stoneprice("1600","1.6");
$cl_techs->set_ironprice("800","1.6");
$cl_techs->set_time("4480","1.75");
$cl_techs->set_maxStage("1");
$cl_techs->set_needed(array("garage"=>"1"));
$cl_techs->set_attType(array('off'));
$cl_techs->set_description("");

$cl_techs->add_tech("Catapulta","catapult");
$cl_techs->set_group("Armas de cerco");
$cl_techs->set_woodprice("1600","1.6");
$cl_techs->set_stoneprice("2000","1.6");
$cl_techs->set_ironprice("1200","1.6");
$cl_techs->set_time("5600","1.75");
$cl_techs->set_maxStage("1");
$cl_techs->set_needed(array("garage"=>"2","smith"=>"12"));
$cl_techs->set_attType(array('def','off'));
$cl_techs->set_description("");
?>