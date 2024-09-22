<?php
/*****************************************/
/*=======================================*/
/*     PLIK: ProBot.php   	 			 */
/*     DATA: 1.05.2012r        			 */
/*     ROLA: Bot klasa					 */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

class ProBot {
	var $bot_config = "";
	var $config = "";
	var $cl_builds = "";
	var $cl_units = "";
	var $cl_techs = "";
	var $bonus = "";
	var $awards = "";
	
	var $botcache = "";
	var $bothandycache = "";
	
	var $max_vstages = "";
	var $max_vtstages = "";
	var $units_id_bh;
	var $bot_actions_contents = "";
	
	function ProBot($BotConfig,$ServerConfig,$cl_builds,$cl_units,$cl_techs,$bonus,$awards) {
		$this->bot_config = $BotConfig;
		$this->config = $ServerConfig;
		$this->cl_builds = $cl_builds;
		$this->cl_units = $cl_units;
		$this->cl_techs = $cl_techs;
		$this->bonus = $bonus;
		$this->awards = $awards;
		
		//Maksymalna iloœæ poziomów budynków wioski:
		foreach ($this->cl_builds->get_array("dbname") as $build) {
			$maxstages += $this->cl_builds->get_maxstage($build);
			}
				
		$this->max_vstages = $maxstages;
		
		//Maksymalna iloœæ poziomów technologi wioski:
		$maxstages = 0;
		foreach ($this->cl_techs->get_array("dbname") as $tech) {
			$maxstages += $this->cl_techs->get_maxstage($tech);
			}
				
		$this->max_vtstages = $maxstages;
		
		$UnitId = 0;
		foreach ($this->cl_units->get_array("dbname") as $unit) {
			$this->units_id_bh[$UnitId] = $this->cl_units->get_bhprice($unit); 
			$UnitId++;
			}
		}
		
	function ParseName($char) {
		$char = str_replace(array("/","\\",":","*","?","|"),array("q","w","e","r","t","y"),$char);
		return $char;
		}
		
	function ReadCache($bid) {
		$username = sql("SELECT `username` FROM `users` WHERE `id` = '".$bid."'","array");
		$cachefilename = "ProBot/" . $bid . "-" . $this->ParseName($username) . ".bc";
		if (!file_exists($cachefilename)) save2($cachefilename,"");
		$this->botcache = unserialize(file_get_contents($cachefilename));
		}
		
	function SaveCache($bid) {
		$username = sql("SELECT `username` FROM `users` WHERE `id` = '".$bid."'","array");
		$cachefilename = "ProBot/" . $bid . "-" . $this->ParseName($username) . ".bc";
		save2($cachefilename,serialize($this->botcache));
		}
		
	function BotPlay($BotId) {
		//Wybierz losow¹ wioskê bota:
		$BotRandVillage = sql("SELECT `id` FROM `villages` WHERE `userid` = '".$BotId."' ORDER BY RAND()","array");
		if (!empty($BotRandVillage) && is_numeric($BotRandVillage)) {
			$this->botcache = "";
			$this->ReadCache($BotId);
			
			//Info gracza:
			$user = sql("SELECT id,username,paladins,pala_name,pala_train,monety,villages,ally FROM `users` WHERE `id` = '$BotId'","assoc");
			
			if (empty($this->botcache["last_type"])) {
				$BotVillagesTypes = array("off","def");
				$BotVillageType = $BotVillagesTypes[rand(0,1)];
				$this->botcache["last_type"] = $BotVillageType;
				}
				
			if (empty($this->botcache["last_name"])) {
				$this->botcache["last_name"] = 1;
				}
				
			if ($this->config['awards']) {
				$this->awards->reload_user_awards($user["id"]);
				}
			
			$villages = mysql_query("SELECT `id` FROM `villages` WHERE `userid` = '".$BotId."' AND `botgroup` = ''");
			while($vinfo = mysql_fetch_assoc($villages)) {
				if ($this->botcache["last_type"] === "off") {
					$newtype = "def";
					}
				if ($this->botcache["last_type"] === "def") {
					$newtype = "off";
					}
					
				mysql_query("UPDATE `villages` SET `name` = '".$this->add_nulls($this->botcache["last_name"],4)." - ".$user["username"]."' WHERE `id` = '".$vinfo["id"]."'");	
				mysql_query("UPDATE `villages` SET `botgroup` = '$newtype' WHERE `id` = '".$vinfo["id"]."'");
				
				$this->botcache["last_type"] = $newtype;
				$this->botcache["last_name"]++;
				}
			
			//Wybraæ akcjê bota:
			reload_vdata($BotRandVillage,date("U"));
			$vinfo = sql("SELECT * FROM `villages` WHERE `id` = '".$BotRandVillage."'","assoc");
			
			global $arr_farm;
			
			//Obliczyæ wolnych osadników:
			$maxfarm = $arr_farm[$vinfo['farm']];
			if ($vinfo['bonus'] == 9) {
				$maxfarm *= $this->bonus->bonusy[$vinfo['bonus']]['modifer'] + 1;
				}
				
			$maxfarm = floor($maxfarm);
			
			$wolni_osadnicy = $maxfarm - $vinfo["r_bh"];
			
			if ($wolni_osadnicy < 0) {
				$wolni_osadnicy = 0;
				}
			
			/*Akcja bot budowanie*/
				
			//Obliczyæ sumê poziomów budynków u bota:
			$Budkol = mysql_query("SELECT `building` FROM `build` WHERE `villageid` = '$BotRandVillage'");
			while ($arr = mysql_fetch_array($Budkol)) {
				$VBuilds[$arr[0]]++;
				}
					
			foreach ($this->cl_builds->get_array("dbname") as $build) {
				$VBuilds[$build] += $vinfo[$build];
				$Vbstages[$build] += $vinfo[$build];
				}
					
			if ($this->max_vstages > array_sum($VBuilds)) {
				foreach ($this->cl_builds->get_array("dbname") as $build) {
					if ($this->cl_builds->get_maxstage($build) > $VBuilds[$build]) {
						if ($this->cl_builds->check_needed($build,$Vbstages)) {
							$costs["w"] = $this->cl_builds->get_wood($build,$VBuilds[$build] + 1);
							$costs["s"] = $this->cl_builds->get_stone($build,$VBuilds[$build] + 1);
							$costs["i"] = $this->cl_builds->get_iron($build,$VBuilds[$build] + 1);
							$costs["bh"] = $this->cl_builds->get_bh($build,$VBuilds[$build] + 1);
							if ($vinfo['r_wood'] >= $costs["w"] && $vinfo['r_stone'] >= $costs["s"] && $vinfo['r_iron'] >= $costs["i"] && $wolni_osadnicy >= $costs["bh"]) {
								$BotAction["build"][] = $build;
								}
							}
						}
					}
				}
				
			/*Akcja bot trenowanie jednostek zwyk³ych*/
			
			if ($vinfo["botgroup"] === "off") {
				foreach ($this->bot_config["off_units"] as $keyunit => $val) {
					$units[] = $keyunit;
					}
				}
			if ($vinfo["botgroup"] === "def") {
				foreach ($this->bot_config["def_units"] as $keyunit => $val) {
					$units[] = $keyunit;
					}
				}
				
			//Zabespieczenie przed samoablokowaniem sie bota:
			if ($vinfo["farm"] == $this->cl_builds->get_maxstage("farm")) {
				if ($wolni_osadnicy < 5000 && $this->max_vstages > array_sum($VBuilds)) {
					$train = false;
					} else {
					$train = true;
					}
				} else {
				$train = true;
				}
				
			if ($wolni_osadnicy > 0 && $train) {
				$minres = $this->bot_config["min_res_to_recruit"];
				if ($vinfo['r_wood'] > $minres["wood"] && $vinfo['r_stone'] > $minres["stone"] && $vinfo['r_iron'] > $minres["iron"]) {
					foreach ($units as $uname) {
						if ($vinfo[$this->cl_units->recruit_in[$uname]] > 0) {
							$this->cl_units->check_needed($uname,$vinfo);		
							if (is_numeric($this->cl_units->last_error)) {
								$unit_number = $this->cl_units->last_error;
								if ($uname === "unit_spy" && $unit_number > 300) {
									$unit_number = 300;
									}
								if ($uname === "unit_ram" && $unit_number > 300) {
									$unit_number = 300;
									}
								if ($uname === "unit_catapult" && $unit_number > 300) {
									$unit_number = 300;
									}
								if ($uname === "unit_cav_archer" && $unit_number > 800) {
									$unit_number = 800;
									}
									
								if ($village["all_unit_snob"] < 2) {
									$req_farm = $this->cl_units->get_bhprice($uname) * $unit_number;
									if ($wolni_osadnicy - $req_farm <= 200) {
										$unit_number -= ceil(200 / $this->cl_units->get_bhprice($uname));
										if ($unit_number < 0) {
											$unit_number = 0;
											}
										}
									}
																		
								$recruitact[$uname] = $unit_number;
								}
							}
						}
					}
				}
				
			if (is_array($recruitact)) {
				if ($vinfo["botgroup"] === "off") {
					$units_array = $this->bot_config["off_units"];
					}
				if ($vinfo["botgroup"] === "def") {
					$units_array = $this->bot_config["def_units"];
					}
					
				foreach ($units_array as $unt => $cntr) {
					if (!empty($recruitact[$unt])) {
						for ($i = 1; $i <= $cntr; $i++) {
							$BotAction["recruit"][] = array($unt,$recruitact[$unt]);
							}
						}
					}
				}

			/*Akcja bot badanie technologii*/
			
			$this->cl_techs->create_research_arr_counts($BotRandVillage);
			
			foreach ($this->cl_techs->get_array("dbname") as $tech) {
				$vtechs += $vinfo['unit_'.$tech.'_tec_level'];
				}
				
			$vtechs += array_sum($this->cl_techs->research_counts);
				
			if ($this->max_vtstages > $vtechs) {
				foreach ($this->cl_techs->get_array("dbname") as $tech) {
					$this->cl_techs->check_tech($tech,$vinfo);
					if ($this->cl_techs->get_last_error() === 'no_error') {
						$BotAction["research"][] = $tech;
						}
					}
				}
				
			/*Akcja bot farmienie*/
			
			if ($vinfo["botgroup"] === "off") {
				$maxstos = 3;
				}
			if ($vinfo["botgroup"] === "def") {
				$maxstos = 10;
				}
			
			$vunits = $this->cl_units->read_units($BotRandVillage,$BotRandVillage);
			
			foreach ($this->cl_units->get_array("dbname") as $unit) {
				if ($unit != "unit_snob" && $unit != "unit_catapult" && $unit != "unit_ram") {
					$units_sum += $this->cl_units->get_bhprice($unit) * $vunits[$unit];
					}
				if ($unit != "unit_snob") {
					$units_sum_off += $this->cl_units->get_bhprice($unit) * $vunits[$unit];
					}
				}
				
			if ($this->bot_config["bot_farmienie"]) {
				
				if ($vinfo["attacks"] == 0) {	
					if ($units_sum > $this->bot_config["min_farm"]) {
						//Wybierz 10 najblizszych wiosek:
						$query = mysql_query("SELECT id,x,y FROM `villages` WHERE `userid` = '-1' ORDER BY sqrt(pow(`x` - '".$vinfo["x"]."',2) + pow(`y` - '".$vinfo["y"]."',2)) ASC LIMIT 10");
						while ($arr = mysql_fetch_assoc($query)) {
							reload_vdata($arr["id"],date("U"));
							$unts = $this->cl_units->read_units($arr["id"],$arr["id"]);
							$arr_sum = 0;
							foreach ($this->cl_units->get_array("dbname") as $unit) {
								$arr_sum += $this->cl_units->get_bhprice($unit) * $unts[$unit];
								}
							if ($arr_sum > 0) {
								$stos = $units_sum / $arr_sum;
								} else {
								$stos = $units_sum;
								}
							if ($stos > $maxstos) {
								$vres = sql("SELECT r_wood,r_stone,r_iron FROM `villages` WHERE `id` = '".$arr["id"]."'","assoc");
								//Oblicz iloœæ jednostek do poniesienia ³upu:
								$units = round(($vres["r_wood"] + $vres["r_stone"] + $vres["r_iron"]) / 10);
								if ($units < $this->bot_config["min_farm"]) {
									$units = $this->bot_config["min_farm"];
									}
								if ($units > $units_sum) {
									$units = $units_sum;
									}
								$BotAction["farm"][] = array($arr["id"],$units);
								}
							}
						}
					}
					
				}
				
			/*Akcja bot trenuj rycerza*/
			
			if ($user["pala_name"] != "Paladino " . $user["username"]) {
				mysql_query("UPDATE `users` SET `pala_name` = 'Paladino " . $user["username"] . "' WHERE `id` = '$BotId'");
				}
			
			if ($user["paladins"] <= 0 && $user['pala_train'] <= 0 && $vinfo["statue"] > 0) {
				$costs["w"] = $this->cl_units->get_woodprice("unit_paladin");
				$costs["s"] = $this->cl_units->get_stoneprice("unit_paladin");
				$costs["i"] = $this->cl_units->get_ironprice("unit_paladin");
				$costs["bh"] = $this->cl_units->get_bhprice("unit_paladin");
				
				if ($vinfo['r_wood'] >= $costs["w"] && $vinfo['r_stone'] >= $costs["s"] && $vinfo['r_iron'] >= $costs["i"] && $wolni_osadnicy >= $costs["bh"]) {
					$BotAction["palatrain"] = true;
					}
				}
			
			/*Akcja bot wybij monetê*/
			
			if ($user["villages"] < $this->bot_config["bot_max_villages"]) {	
				if ($vinfo["snob"] > 0) {
					if ($this->config['ag_style'] == 1) {
						$coin_wood = $this->config['koszt_monety']['wood'];
						$coin_stone = $this->config['koszt_monety']['stone'];
						$coin_iron = $this->config['koszt_monety']['iron'];
						
						if ($vinfo['r_wood'] >= $coin_wood && $vinfo['r_stone'] >= $coin_stone && $vinfo['r_iron'] >= $coin_iron) {
							$coins["w"] = floor($vinfo['r_wood'] / $coin_wood);
							$coins["s"] = floor($vinfo['r_stone'] / $coin_stone);
							$coins["i"] = floor($vinfo['r_iron'] / $coin_iron);
							$BotAction["createcoin"] = min($coins);
							}
						}
					}
				}
			
			/*Akcja bot twozyæ szlachcica*/
			
			if ($user["villages"] < $this->bot_config["bot_max_villages"]) {
			
				if ($vinfo["snob"] > 0 && $vunits["unit_snob"] <= 4) {
					if ($this->config['ag_style'] == 1) {
						$snoblimit = get_szlachta_limit($user["monety"]);
						}
					if ($this->config['ag_style'] == 0) {
						$snoblimit = sql("SELECT SUM(snob) FROM `villages` WHERE `userid` = '".$BotId."'","array");
						}
						
					$snoblimit -= sql("SELECT SUM(num_unit) - SUM(num_finished) FROM `recruit` WHERE `userid` = '".$BotId."' AND `building` = 'snob'",'array');
					$snoblimit -= $user['villages'] - 1;
					
					foreach($this->cl_units->get_array("dbname") as $jednostka) {
						if ($this->cl_units->recruit_in[$jednostka] === "snob") {
							$snoblimit -= sql("SELECT SUM(all_".$jednostka.") FROM `villages` WHERE `userid` = '".$BotId."'","array");
							}
						}
						
					if ($snoblimit > 0) {
						$costs = array();
						$costs["w"] = floor($vinfo['r_wood'] / $this->cl_units->get_woodprice("unit_snob"));
						$costs["s"] = floor($vinfo['r_stone'] / $this->cl_units->get_stoneprice("unit_snob"));
						$costs["i"] = floor($vinfo['r_iron'] / $this->cl_units->get_ironprice("unit_snob"));
						$costs["bh"] = floor($wolni_osadnicy / $this->cl_units->get_bhprice("unit_snob"));
						$costs["limit"] = $snoblimit;
						$can_create_snob_count = min($costs);
						if ($can_create_snob_count > 4) {
							$can_create_snob_count = 4;
							}
							
						if ($can_create_snob_count > 0) {
							$BotAction["createsnob"] = $can_create_snob_count;
							}
						}
					}
					
				}
			
			/*Akcja bot podbijanie*/
			
			if ($this->config['snob_range'] == "-1") {
				$snob_max_distance = 2500;
				} else {
				$snob_max_distance = $this->config['snob_range'];
				}
			
			if ($user["villages"] > 1 || $vinfo["botgroup"] === "off") {
				if ($user["villages"] == 1) {
					$targets_limit = 1;
					}
				if ($user["villages"] > 1) {
					$targets_limit = 2;
					}
				if ($user["villages"] > 15) {
					$targets_limit = 5;
					}
					
				//Wyznaczyæ kontrakty sojuszu:
				$kontrakty_query = mysql_query("SELECT do_plemienia,typ FROM `kontrakty` WHERE `od_plemienia` = '".$user['ally']."'");
				while ($kontrakt = mysql_fetch_assoc($kontrakty_query)) {
					if ($kontrakt["typ"] == "partner" || $kontrakt["typ"] == "nap") {
						$conctracts[$kontrakt['do_plemienia']] = array(true);
						}
					}
					
				if (!is_array($conctracts)) {
					$conctracts = array();
					}
				
				if (count($this->botcache["bot_targets"]) < $targets_limit) {
					$required_targets = $targets_limit - count($this->botcache["bot_targets"]);
					if ($this->bot_config["bot_podbijanie_barbarek"]) {
						$bot_target_select = "`userid` = '-1'";
						} else {
						$bot_target_select = "`userid` != '$BotId'";
						}
						
					if (!is_array($this->botcache["bot_targets"])) {
						$this->botcache["bot_targets"] = array();
						}
							
					$query = mysql_query("SELECT id,x,y,userid FROM `villages` WHERE $bot_target_select ORDER BY sqrt(pow(`x` - '".$vinfo["x"]."',2) + pow(`y` - '".$vinfo["y"]."',2)) ASC LIMIT 15");
					while ($arr = mysql_fetch_assoc($query)) {
						if (!in_array($arr["id"],$this->botcache["bot_targets"])) {
							if ($arr["userid"] != "-1") {
								$userally = sql("SELECT `ally` FROM `users` WHERE `id` = '".$arr["userid"]."'","array");
								}
								
							if ($userally == "-1") {
								$userally = 0;
								}
								
							if ($userally != $user["ally"] && !is_array($conctracts[$userally])) {
								reload_vdata($arr["id"],date("U"));
								$units = $this->cl_units->read_units("",$arr["id"]);
								$arr_sum = 0;
								foreach ($this->cl_units->get_array("dbname") as $unit) {
									$arr_sum += $this->cl_units->get_bhprice($unit) * $units[$unit];
									}
								
								$required_offs = ceil(($arr_sum * 2) / $this->bot_config["min_off"]);
								if ($required_offs < 10) {
									$odl = oblicz_odleglosc($vinfo["x"],$vinfo["y"],$arr["x"],$arr["y"]);
									if ($odl < $snob_max_distance) {
										$random_targets[] = array($arr["id"],$required_offs);
										}
									}
								}
							}
						}
						
					$snobs_to_snob = ceil(100 / ((($this->config["pop_max"] - $this->config["pop_min"]) / 2) + $this->config["pop_min"]));
					
					if (is_array($random_targets)) {
						for ($t = 1; $t <= $required_targets; $t++) {
							$key = $required_targets - 1;
							if (is_array($random_targets[$key])) {
								$this->botcache["bot_targets"][] = $random_targets[$key][0];
								$this->botcache["bot_attacks"][$random_targets[$key][0]] = $random_targets[$key][1].";".($snobs_to_snob + 1).";0";
								}
							}
						}
					}
					
				//Obliczyæ wymaganego offa do ataku:
				if ($vinfo["botgroup"] === "off") {
					if ($vinfo["points"] >= $this->bot_config["min_vpoints"]) {
						$min_off = $this->bot_config["min_off"];
						} else {
						$min_off = $vinfo["points"];
						}
					}
					
				//Wybierz wszystkie cele i sprawdŸ czy mo¿na podbijaæ i atakowaæ:
				
				if ($vinfo["botgroup"] === "off" && $units_sum_off >= $min_off) {
					$send_full_off = true;
					} else {
					$send_full_off = false;
					}
					
				if ($vunits["unit_snob"] > 0 && $units_sum > 1000) {
					$send_snob = true;
					} else {
					$send_snob = false;
					}
					
				if ($send_snob || $send_full_off) {
					foreach ($this->botcache["bot_targets"] as $key => $target) {
						$target = (int)$target;
						
						$userid = sql("SELECT `userid` FROM `villages` WHERE `id` = '$target'","array");
						if ($userid == $BotId) {
							//Jeœli cel zosta³ podbity, to go usuñ:
							unset($this->botcache["bot_targets"][$key]);
							unset($this->botcache["bot_attacks"][$target]);
							break;
							} else {
							if ($userid != '-1') {
								$userally = sql("SELECT `ally` FROM `users` WHERE `id` = '".$userid."'","array");
								}
								
							if ($userally == "-1") {
								$userally = 0;
								}
								
							if ($userally != $user["ally"] && !is_array($conctracts[$userally])) {
								//Pobraæ informacje o docelowych wioskach:
								$info = explode(";",$this->botcache["bot_attacks"][$target]);
								
								if ($info[2] > 20) {
									//Jeœli bot zaatakowa³ wioskê 20 razy, to rezygnuje z celu:
									unset($this->botcache["bot_targets"][$key]);
									unset($this->botcache["bot_attacks"][$target]);
									break;
									} else {
									reload_vdata($target,date("U"));
									$units = $this->cl_units->read_units("",$target);
									
									
									if (array_sum($units) > 150) {
										$info[0] = 1;
										} else {
										$info[0] = 0;
										}
										
									if ($info[0] == 1) {
										if ($send_full_off) {
											$BotAction["attack"][] = array("all_units",$target);
											}
										} else {
										if ($user["villages"] > $this->bot_config["bot_max_villages"]) {
											//Jeœli bot ma wystarczaj¹co du¿o wiosek, to usuñ cel:
											unset($this->botcache["bot_targets"][$key]);
											unset($this->botcache["bot_attacks"][$target]);
											break;
											} else {
											if ($send_snob) {
												$BotAction["attack"][] = array("snob",$target);
												}
											}
										}
									}
								} else {
								//Jeœli cel zosta³ podbity, przez innego gracza / bota to usuñ cel:
								unset($this->botcache["bot_targets"][$key]);
								unset($this->botcache["bot_attacks"][$target]);
								break;
								}
							}
						}
					}
				}
				
			if ($vinfo["botgroup"] === "def" && $user["villages"] == 1) {
				if (count($this->botcache["bot_targets"]) == 0) {
					$query = mysql_query("SELECT id,x,y FROM `villages` WHERE `userid` = '-1' ORDER BY sqrt(pow(`x` - '".$vinfo["x"]."',2) + pow(`y` - '".$vinfo["y"]."',2)) ASC LIMIT 5");
					while ($arr = mysql_fetch_assoc($query)) {
						reload_vdata($arr["id"],date("U"));
						$unts = $this->cl_units->read_units($arr["id"],$arr["id"]);
						$arr_sum = 0;
						foreach ($this->cl_units->get_array("dbname") as $unit) {
							$arr_sum += $this->cl_units->get_bhprice($unit) * $unts[$unit];
							}
						if ($arr_sum > 0) {
							$stos = $units_sum / $arr_sum;
							} else {
							$stos = $units_sum;
							}
						if ($stos > $maxstos) {
							$odl = oblicz_odleglosc($vinfo["x"],$vinfo["y"],$arr["x"],$arr["y"]);
							if ($odl < $snob_max_distance) {
								$random_targets[] = $arr["id"];
								}
							}
						}
					}
					
				if (is_array($random_targets)) {
					$this->botcache["bot_targets"] = array();
					$this->botcache["bot_targets"][0] = $random_targets[mt_rand(0,count($random_targets) - 1)];
					}
					
				if (!empty($this->botcache["bot_targets"][0]) && is_numeric($this->botcache["bot_targets"][0])) {
					$target_vid = $this->botcache["bot_targets"][0];
					
					if ($vunits["unit_snob"] > 0 && $units_sum > 400) {
						//Jeœli cel zosta³ podbity, to go usuñ:
						$target_uid = sql("SELECT `userid` FROM `villages` WHERE `id` = '$target_vid'","array");
						if ($target_uid == '-1') {
							$target_units_place = $this->cl_units->read_units($target_vid,$target_vid);
							$arr_sum = 0;
							foreach ($this->cl_units->get_array("dbname") as $unit) {
								$arr_sum += $this->cl_units->get_bhprice($unit) * $target_units_place[$unit];
								}
							if ($arr_sum <= 5) {
								$BotAction["attack"][] = array("snob",$target_vid);
								}
							} else {
							$this->botcache["bot_targets"] = array();
							}
						}
					}
				}
			
			/*Akcja bot odwo³aæ wsparcia*/
			
			$sql = mysql_query("SELECT * FROM `unit_place` WHERE `villages_from_id` = '".$BotRandVillage."' AND `villages_to_id` != '".$BotRandVillage."'");
			while ($array = mysql_fetch_assoc($sql)) {
				//Jeœli na wspieran¹ wioskê nie idzie ¿aden atak to odwo³aj wsparcie:
				$tattack = sql("SELECT COUNT(id) FROM `movements` WHERE `send_to_village` = '".$array["villages_to_id"]."' AND `type` = 'attack'","array");
				if ($tattack == 0) {
					$BotAction["supportback"][] = $array["villages_to_id"];
					}
				}
			
			/*Akcja bot wys³aæ wsparcie*/
			
			if ($vinfo["botgroup"] === "def" && $units_sum > 10000 && $vinfo["attacks"] == 0) {
				$AttV = mysql_query("SELECT id,attacks FROM `villages` WHERE `userid` = '$BotId' AND `attacks` > 0");
				while ($id = mysql_fetch_array($AttV)) {
					if ($id[0] != $BotRandVillage) {
						$supports = sql("SELECT COUNT(id) FROM `movements` WHERE `send_to_village` = '$id' AND `type` = 'support'","array");
						if ($supports < $id[1]) {
							$att_units = 0;
							$id = $id[0];
							$unts = $this->cl_units->read_units("",$id);
							$sql = mysql_query("SELECT `units` FROM `movements` WHERE `send_to_village` = '$id'");
							while ($mu = mysql_fetch_array($sql)) {
								$att_units += array_sum(explode(";",$mu[0]));
								}
								
							$def_units_all = array_sum($unts); 
							$att_units_all = $att_units * 3;
							
							if ($att_units_all > $def_units_all) {
								$to_support[] = $id;
								}
							}
						}
					}
					
				if (is_array($to_support)) {
					$BotAction["support"] = $to_support[mt_rand(0,count($to_support) - 1)];
					}
				}
				
			/*Przejœæ do wykonywania akcji*/

			if (is_array($BotAction)) {
				$Akey = 0;
				foreach ($BotAction as $actionname => $actionvalue) {
					$ActionsKeys[$Akey] = $actionname;
					$Akey++;
					}
				
				$BotRandomAction = $ActionsKeys[mt_rand(0,$Akey - 1)];

				if ($BotRandomAction === "build") {
					$BotBuild = $BotAction["build"];
					$BotRandomBuild = $BotBuild[mt_rand(0,count($BotBuild) - 1)];
					if (!empty($BotRandomBuild)) {
						$NEXT_BUILD_LEVEL = $VBuilds[$BotRandomBuild] + 1;
						$koszty['wood'] = $this->cl_builds->get_wood($BotRandomBuild,$NEXT_BUILD_LEVEL);
						$koszty['stone'] = $this->cl_builds->get_stone($BotRandomBuild,$NEXT_BUILD_LEVEL);
						$koszty['iron'] = $this->cl_builds->get_iron($BotRandomBuild,$NEXT_BUILD_LEVEL);
						$koszty['bh'] = $this->cl_builds->get_bh($BotRandomBuild,$NEXT_BUILD_LEVEL);
						
						$this->cl_units->odejmij_surowce($BotRandVillage,$koszty['stone'],$koszty['wood'],$koszty['iron'],$koszty['bh']);
						
						$czas = $this->cl_builds->get_time($vinfo['main'],$BotRandomBuild,$NEXT_BUILD_LEVEL);
						
						$counts_build = sql("SELECT COUNT(id) FROM `build` WHERE `villageid` = '$BotRandVillage'","array");
						
						if ($counts_build > 0) {
							$last_build_end = sql("SELECT `end_time` FROM `build` WHERE `villageid` = '$BotRandVillage' ORDER BY `end_time` DESC LIMIT 1",'array');
							$END_BUILD_T = $last_build_end + $czas;
							mysql_query("INSERT INTO build(building,end_time,build_time,villageid) VALUES ('$BotRandomBuild','$END_BUILD_T','$czas','$BotRandVillage')");
							} else {
							$END_BUILD_T = date("U") + $czas;
							mysql_query("INSERT INTO build(building,end_time,build_time,villageid) VALUES ('$BotRandomBuild','$END_BUILD_T','$czas','$BotRandVillage')");
							}
								
						$LAST_ID = sql("SELECT `id` FROM `build` WHERE `villageid` = '$BotRandVillage' ORDER BY `id` DESC LIMIT 1",'array');
						mysql_query("INSERT INTO events(event_time,event_type,event_id,user_id,villageid) VALUES('$END_BUILD_T','build','$LAST_ID','$BotId','$BotRandVillage')");

						if ($this->bot_config["bot_save_actions"]) {
							$BotActionDate = date("d.m.Y H:i:s",date("U"));
							$BotActionValue = " Rozpoczêto budowê budynku ";
							$BotActionVars = $this->cl_builds->get_name($BotRandomBuild);
							$this->bot_actions_contents[] = $BotActionDate . " - " . $BotActionValue . $BotActionVars;
							}
						}
					}
				if ($BotRandomAction === "recruit") {
					$BotRecruit = $BotAction["recruit"];
					$BotRandomRecruit = $BotRecruit[mt_rand(0,count($BotRecruit) - 1)];
					if (is_array($BotRandomRecruit)) {
						$costs['wood'] += $this->cl_units->get_woodprice($BotRandomRecruit[0]) * $BotRandomRecruit[1];
						$costs['stone'] += $this->cl_units->get_stoneprice($BotRandomRecruit[0]) * $BotRandomRecruit[1];
						$costs['iron'] += $this->cl_units->get_ironprice($BotRandomRecruit[0]) * $BotRandomRecruit[1];
						$costs['bh'] += $this->cl_units->get_bhprice($BotRandomRecruit[0]) * $BotRandomRecruit[1];
						
						$this->cl_units->odejmij_surowce($BotRandVillage,$costs['stone'],$costs['wood'],$costs['iron'],$costs['bh']);
						$r_build = $this->cl_units->get_recruit_in($BotRandomRecruit[0]);
						$this->cl_units->recruit_units($BotRandomRecruit[0],$BotRandomRecruit[1],$r_build,$vinfo[$r_build],$BotRandVillage);
						
						if ($this->bot_config["bot_save_actions"]) {
							$BotActionDate = date("d.m.Y H:i:s",date("U"));
							$BotActionValue = " Rozpoczêto trening jednostek ";
							$BotActionVars = $BotRandomRecruit[1] . " " . $this->cl_units->get_name($BotRandomRecruit[0]);
							$this->bot_actions_contents[] = $BotActionDate . " - " . $BotActionValue . $BotActionVars;
							}
						}
					}
				if ($BotRandomAction === "research") {
					$BotResearch = $BotAction["research"];
					$BotRandomTech = $BotResearch[mt_rand(0,count($BotResearch) - 1)];
					
					if (!empty($BotRandomTech)) {
						$BotTechLevel = $vRtechs[$BotRandomTech] + $vinfo['unit_'.$BotRandomTech.'_tec_level'] + 1;
						$this->cl_techs->create_research_arr_counts($BotRandVillage);
						
						$this->cl_techs->research($BotRandomTech,$BotRandVillage);
						
						mysql_query("UPDATE `villages` SET `r_stone` = `r_stone` - '".$this->cl_techs->get_stone($BotRandomTech,$BotTechLevel)."' WHERE `id` = '".$BotRandVillage."'");
						mysql_query("UPDATE `villages` SET `r_wood` = `r_wood` - '".$this->cl_techs->get_wood($BotRandomTech,$BotTechLevel)."' WHERE `id` = '".$BotRandVillage."'");
						mysql_query("UPDATE `villages` SET `r_iron` = `r_iron` - '".$this->cl_techs->get_iron($BotRandomTech,$BotTechLevel)."' WHERE `id` = '".$BotRandVillage."'");
						
						if ($this->bot_config["bot_save_actions"]) {
							$BotActionDate = date("d.m.Y H:i:s",date("U"));
							$BotActionValue = " Rozpoczêto badanie technologii ";
							$BotActionVars = $this->cl_techs->get_name($BotRandomTech);
							$this->bot_actions_contents[] = $BotActionDate . " - " . $BotActionValue . $BotActionVars;
							}
						}
					}
				if ($BotRandomAction === "farm") {
					$BotFarm = $BotAction["farm"];
					$BotRandomTarget = $BotFarm[mt_rand(0,count($BotFarm) - 1)];
					if (is_array($BotRandomTarget)) {
						$send_units_procent = $BotRandomTarget[1] / $units_sum;
						
						foreach ($this->cl_units->get_array("dbname") as $unit) {
							if ($unit != "unit_snob" && $unit != "unit_catapult" && $unit != "unit_ram") {
								$unit_count[$unit] = round($vunits[$unit] * $send_units_procent);
								} else {
								$unit_count[$unit] = 0;
								}
							}
							
						if (array_sum($unit_count) > 0) {
							$vtarget = sql("SELECT x,y FROM `villages` WHERE `id` = '".$BotRandomTarget[0]."'","assoc");
							$times = get_movs_times($unit_count,$vinfo['x'],$vinfo['y'],$vtarget['x'],$vtarget['y']);
							send_mov('attack',$BotRandVillage,$BotRandomTarget[0],$unit_count,$times[1],'');		
							mysql_query("UPDATE `users` SET `last_command` = '".$vtarget['x'].';'.$vtarget['y']."' WHERE `id` = '".$user['id']."'");
							add_history($BotRandomTarget[0],$user['id']);
							}
						}
						
					if ($this->bot_config["bot_save_actions"]) {
						$BotActionDate = date("d.m.Y H:i:s",date("U"));
						$BotActionValue = " Wys³ano atak pl¹druj¹cy na ";
						$BotActionVars = entparse(sql("SELECT `name` FROM `villages` WHERE `id` = '".$BotRandomTarget[0]."'","array"))
							. " (" . $vtarget['x'] . "|" . $vtarget['y'] . ")";
						$this->bot_actions_contents[] = $BotActionDate . " - " . $BotActionValue . $BotActionVars;
						}
					}
				if ($BotRandomAction === "palatrain") {
					if ($BotAction["palatrain"]) {
						$costs['wood'] = $this->cl_units->get_woodprice("unit_paladin") * 1;
						$costs['stone'] = $this->cl_units->get_stoneprice("unit_paladin") * 1;
						$costs['iron'] = $this->cl_units->get_ironprice("unit_paladin") * 1;
						$costs['bh'] = $this->cl_units->get_bhprice("unit_paladin") * 1;
						
						$this->cl_units->odejmij_surowce($BotRandVillage,$costs['stone'],$costs['wood'],$costs['iron'],$costs['bh']);
						mysql_query("UPDATE `users` SET `pala_train` = '1' WHERE `id` = '".$user['id']."'");
						$this->cl_units->recruit_units("unit_paladin",1,$this->cl_units->get_recruit_in("unit_paladin"),$vinfo[$this->cl_units->get_recruit_in("unit_paladin")],$BotRandVillage);	
						}
						
					if ($this->bot_config["bot_save_actions"]) {
						$BotActionDate = date("d.m.Y H:i:s",date("U"));
						$BotActionValue = " Rozpoczêto trening rycerza ";
						$BotActionVars = "";
						$this->bot_actions_contents[] = $BotActionDate . " - " . $BotActionValue . $BotActionVars;
						}
					}
				if ($BotRandomAction === "createcoin") {
					if ($BotAction["createcoin"] > 0) {
						$coin_wood = $this->config['koszt_monety']['wood'] * $BotAction["createcoin"];
						$coin_stone = $this->config['koszt_monety']['stone'] * $BotAction["createcoin"];
						$coin_iron = $this->config['koszt_monety']['iron'] * $BotAction["createcoin"];
						$this->cl_units->odejmij_surowce($BotRandVillage,$coin_wood,$coin_stone,$coin_iron,0);
						mysql_query("UPDATE `users` SET `monety` = `monety` + '".$BotAction["createcoin"]."' WHERE `id` = '".$user['id']."'");
						
						if ($this->bot_config["bot_save_actions"]) {
							$BotActionDate = date("d.m.Y H:i:s",date("U"));
							$BotActionValue = " Wybito ".$BotAction["createcoin"]. " Monety";
							$this->bot_actions_contents[] = $BotActionDate . " - " . $BotActionValue;
							}
						}
					}
				if ($BotRandomAction === "createsnob") {
					if ($BotAction["createsnob"] > 0) {
						$costs['wood'] = $this->cl_units->get_woodprice("unit_snob") * $BotAction["createsnob"];
						$costs['stone'] = $this->cl_units->get_stoneprice("unit_snob") * $BotAction["createsnob"];
						$costs['iron'] = $this->cl_units->get_ironprice("unit_snob") * $BotAction["createsnob"];
						$costs['bh'] = $this->cl_units->get_bhprice("unit_snob") * $BotAction["createsnob"];
						
						$this->cl_units->odejmij_surowce($BotRandVillage,$costs['stone'],$costs['wood'],$costs['iron'],$costs['bh']);
						
						$this->cl_units->recruit_units("unit_snob",$BotAction["createsnob"],$this->cl_units->get_recruit_in("unit_snob"),$vinfo[$this->cl_units->get_recruit_in("unit_snob")],$BotRandVillage);	
						
						if ($this->bot_config["bot_save_actions"]) {
							$BotActionDate = date("d.m.Y H:i:s",date("U"));
							$BotActionValue = " Rozpoczêto trening ";
							$BotActionValue .= $BotAction["createsnob"] . " ";
							if ($BotAction["createsnob"] <= 1) {
								$BotActionValue .= " Nobre";
								} else {
								$BotActionValue .= " Nobres";
								}
							$this->bot_actions_contents[] = $BotActionDate . " - " . $BotActionValue;
							}
						}
					}
				if ($BotRandomAction === "attack") {
					$BotAttack = $BotAction["attack"];
					$BotRandomTarget = $BotAttack[mt_rand(0,count($BotAttack) - 1)];
					if (is_array($BotRandomTarget)) {
						if ($BotRandomTarget[0] == "all_units") {
							foreach ($this->cl_units->get_array("dbname") as $unit) {
								if ($unit != "unit_snob") {
									$unit_count[$unit] = $vunits[$unit];
									} else {
									$unit_count[$unit] = 0;
									}
								}
							}
							
						if ($BotRandomTarget[0] == "snob" && $vunits["unit_snob"] > 0) {
							$send_units_procent = 1000 / $units_sum;
							foreach ($this->cl_units->get_array("dbname") as $unit) {
								if ($unit != "unit_snob" && $unit != "unit_catapult" && $unit != "unit_ram") {
									$unit_count[$unit] = round($vunits[$unit] * $send_units_procent);
									} else {
									$unit_count[$unit] = 0;
									}
								}
								
							$unit_count["unit_snob"] = 1;
							}
							
						if (array_sum($unit_count) > 0) {
							$vtarget = sql("SELECT x,y FROM `villages` WHERE `id` = '".$BotRandomTarget[1]."'","assoc");
							$times = get_movs_times($unit_count,$vinfo['x'],$vinfo['y'],$vtarget['x'],$vtarget['y']);
							send_mov('attack',$BotRandVillage,$BotRandomTarget[1],$unit_count,$times[1],'wall');		
							mysql_query("UPDATE `users` SET `last_command` = '".$vtarget['x'].';'.$vtarget['y']."' WHERE `id` = '".$user['id']."'");
							add_history($BotRandomTarget[1],$user['id']);
							$info = explode(";",$this->botcache["bot_attacks"][$BotRandomTarget[1]]);
							$info[2]++;
							$this->botcache["bot_attacks"][$BotRandomTarget[1]] = implode(";",$info);
							}
						}
						
					if ($this->bot_config["bot_save_actions"]) {
						$BotActionDate = date("d.m.Y H:i:s",date("U"));
						$BotActionValue = " Wys³ano atak ";
						if ($unit_count["unit_snob"] > 0) {
							$BotActionValue .= "z szlachcicem na ";
							}
						$BotActionVars = entparse(sql("SELECT `name` FROM `villages` WHERE `id` = '".$BotRandomTarget[1]."'","array"))
							. " (" . $vtarget['x'] . "|" . $vtarget['y'] . ")";
						$this->bot_actions_contents[] = $BotActionDate . " - " . $BotActionValue . $BotActionVars;
						}
					}
				if ($BotRandomAction === "supportback") {
					$BotBackArr = $BotAction["supportback"];
					if (is_array($BotBackArr)) {
						foreach ($BotBackArr as $ToVid) {
							$Support = sql("SELECT * FROM `unit_place` WHERE `villages_from_id` = '".$BotRandVillage."' AND `villages_to_id` = '".$ToVid."'","assoc");
							if (is_array($Support)) {
								mysql_query("DELETE FROM `unit_place`  WHERE `villages_from_id` = '".$BotRandVillage."' AND `villages_to_id` = '".$ToVid."'");
								
								foreach ($this->cl_units->get_array("dbname") as $unit) {
									$BackUnits[$unit] = $Support[$unit];
									}
								
								$from_village_coords = sql("SELECT x,y,name,continent FROM `villages` WHERE `id` = '".$ToVid."'","assoc");
								$times = get_movs_times($BackUnits,$vinfo['x'],$vinfo['y'],$from_village_coords['x'],$from_village_coords['y']);
								send_mov('back',$BotRandVillage,$ToVid,$BackUnits,$times[1],'',false);
								
								$user_toid = sql("SELECT `userid` FROM `villages` WHERE `id` = '".$ToVid."'",'array');
						
								if ($user_toid != '-1') {
									$r_title = $user['username'] . ' retirou seu apoio de ' . $from_village_coords['name'] .
										' (' . $from_village_coords['x'] . '|' . $from_village_coords['y'] . ') K' . $from_village_coords['continent'];
						
									mysql_query("INSERT INTO reports(
										title,time,type,a_units,to_village,from_village,receiver_userid,in_group
										) VALUES (
										'".$r_title."','".date("U")."','support_back','".implode(';',$BackUnits)."','".$ToVid."','".$BotRandVillage."','".$user_toid."','support'
										)");
							
									mysql_query("UPDATE `users` SET `new_report` = '1' WHERE `id` = '$user_toid'");
									}
									
								if ($this->bot_config["bot_save_actions"]) {
									$BotActionDate = date("d.m.Y H:i:s",date("U"));
									$BotActionValue = " Wycofano wsparcie z  ";
									$BotActionVars = entparse($from_village_coords['name'])
										. " (" . $from_village_coords['x'] . "|" . $from_village_coords['y'] . ")";
									$this->bot_actions_contents[] = $BotActionDate . " - " . $BotActionValue . $BotActionVars;
									}
								}
							}
						}
					}
				if ($BotRandomAction === "support") {
					$SupportVid = $BotAction["support"];
					if (!empty($SupportVid)) {
						//Wybraæ jednostki do wys³ania:
						foreach ($this->cl_units->get_array("dbname") as $unit) {
							if ($unit != "unit_snob") {
								$SendSupportUnits[$unit] = round($vunits[$unit] * 0.5);
								} else {
								$SendSupportUnits[$unit] = 0;
								}
							}
							
						if (array_sum($SendSupportUnits) > 0) {
							$vtarget = sql("SELECT x,y FROM `villages` WHERE `id` = '$SupportVid'","assoc");
							$times = get_movs_times($SendSupportUnits,$vinfo['x'],$vinfo['y'],$vtarget['x'],$vtarget['y']);
							send_mov('support',$BotRandVillage,$SupportVid,$SendSupportUnits,$times[1],'');		
							mysql_query("UPDATE `users` SET `last_command` = '".$vtarget['x'].';'.$vtarget['y']."' WHERE `id` = '".$user['id']."'");
							add_history($SupportVid,$user['id']);
							
							if ($this->bot_config["bot_save_actions"]) {
								$BotActionDate = date("d.m.Y H:i:s",date("U"));
								$BotActionValue = " Wys³ano wsparcie do ";
								$BotActionVars = entparse(sql("SELECT `name` FROM `villages` WHERE `id` = '".$SupportVid."'","array"))
									. " (" . $vtarget['x'] . "|" . $vtarget['y'] . ")";
								$this->bot_actions_contents[] = $BotActionDate . " - " . $BotActionValue . $BotActionVars;
								}
							}
						}
					}
				}
				
			$this->SaveCache($BotId);
			} else {
			//Jeœli bot nie ma ¿adnej wioski to stworzyæ:
			create_vill_for_player($BotId,'R');
			$username = sql("SELECT `username` FROM `users` WHERE `id` = '".$BotId."'","array");
			
			//Zresetowaæ cache:
			$this->ReadCache($BotId);
			
			$this->botcache = "";
			$this->botcache["last_name"] = 1;
			//Wybierz losowy typ wioski:
			$BotVillagesTypes = array("off","def");
			$BotVillageType = $BotVillagesTypes[rand(0,1)];
			$this->botcache["last_type"] = $BotVillageType;
			$villages = mysql_query("SELECT `id` FROM `villages` WHERE `userid` = '".$BotId."'");
			while($vinfo = mysql_fetch_assoc($villages)) {
				if ($this->botcache["last_type"] === "off") {
					$newtype = "def";
					}
				if ($this->botcache["last_type"] === "def") {
					$newtype = "off";
					}
					
				mysql_query("UPDATE `villages` SET `name` = '".$this->add_nulls($this->botcache["last_name"],4)." - ".$username."' WHERE `id` = '".$vinfo["id"]."'");	
				mysql_query("UPDATE `villages` SET `botgroup` = '$newtype' WHERE `id` = '".$vinfo["id"]."'");
				
				$this->botcache["last_type"] = $newtype;
				$this->botcache["last_name"]++;
				}
				
			//Zapisaæ cache:
			$this->SaveCache($BotId);			
			}
		}
		
	function ProBotTourDisplay($BotId) {
		$loop = (int)$this->bot_config["akcje"];
		if ($loop < 1) {
			$loop = 1;
			}
		if ($loop > 50) {
			$loop = 50;
			}
			
		$this->bot_actions_contents = "";	
			
		for ($i = 1; $i <= $loop; $i++) {
			$this->BotPlay($BotId);
			}
			
		if ($this->bot_config["bot_save_actions"] && is_array($this->bot_actions_contents)) {
			if (!file_exists("ProBot/ProBot.log")) {
				save2("ProBot/ProBot.log","");
				}
				
			$cnts = file_get_contents("ProBot/ProBot.log");
			
			if (strlen($cnts > 1000000)) {
				$cnts = "";
				}
			
			if (!empty($cnts)) {
				$cnts .= "\n";
				}
				
			$username = entparse(sql("SELECT `username` FROM `users` WHERE `id` = '".$BotId."'","array"));	
			$sr = "!         " . "Akcje wykonane przez $username - data zalogowania " . date("d.m.Y H:i:s",date("U")) . "         !";
			$strlen = strlen($sr) - 2;
			
			$top = "!";
			for ($i = 1; $i <= $strlen; $i++) {
				$top .= "=";
				}
			$top .= "!";
			
			$cnts .= $top."\n";
			$cnts .= $sr."\n";
			$cnts .= $top."\n";
			
			foreach ($this->bot_actions_contents as $actval) {
				$cnts .= $actval . "\n";
				}
				
			save2("ProBot/ProBot.log",$cnts);
			}
			
		return true;
		}
		
	function add_nulls($num,$null_num) {
		$num_len = strlen($num) + 1;
		for ($i = $num_len; $i <= $null_num; $i++) {
			$string .= "0";
			}
		return $string.$num;
		}
	}
?>