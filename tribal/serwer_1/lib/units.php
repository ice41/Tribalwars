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
		
	function get_recruit_in($dbname) {
		return $this->recruit_in[$dbname];
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
		$vinfo = sql("SELECT bonus,userid FROM `villages` WHERE `id` = '$vid'",'assoc');
		
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
		//$start = pow($faktor[0],$stage - 1) * $faktor[1];
		
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
			
		//$time = (($this->time[$unit] * $start) / $this->config['speed']) * $modifer;
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
	
//Start klasy units();
$cl_units = new units();

//Liczby decyduj¹ce o szybkoœci trenowania nowych jednostek:
$cl_units->set_unitfactor("0.665","0.94355");

//Ustawienia wszystkich jednostek, poni¿sze s¹ standartowe zgodnie z plemiona.pl
$cl_units->add_unit("Pikinier","unit_spear");
$cl_units->set_woodprice("50");
$cl_units->set_stoneprice("30");
$cl_units->set_ironprice("10");
$cl_units->set_bhprice("1");
$cl_units->set_time("1000");
$cl_units->set_att("10","1.045");
$cl_units->set_def("20","1.045");
$cl_units->set_defcav("45","1.045");
$cl_units->set_defarcher("20","1.045");
$cl_units->set_speed("1080");
$cl_units->set_booty("25");
$cl_units->set_needed(array());
$cl_units->set_recruit_in("barracks");
$cl_units->set_specials(array());
$cl_units->set_group("foot");
$cl_units->set_col("A");
$cl_units->set_attType("def");
$cl_units->set_description("Pikinier jest najprostsz¹ i podstawow¹ jednostk¹ defensywn¹. Jest efektywny w obronie przeciwko kawalerii, natomiast ustêpuje zupe³nie przy starciu z topornikami. W pocz¹tkowej fazie gry wykorzystywani s¹ do farmienia, ze wzglêdu na szybsze tempo poruszania siê ni¿ miecznicy i wiêksz¹ pojemnoœæ ³upu ni¿ topornicy.");

$cl_units->add_unit("Miecznik","unit_sword");
$cl_units->set_woodprice("30");
$cl_units->set_stoneprice("30");
$cl_units->set_ironprice("70");
$cl_units->set_bhprice("1");
$cl_units->set_time("1500");
$cl_units->set_att("25","1.045");
$cl_units->set_def("35","1.045");
$cl_units->set_defcav("15","1.045");
$cl_units->set_defarcher("40","1.045");
$cl_units->set_speed("1320");
$cl_units->set_booty("15");
$cl_units->set_needed(array("smith"=>"1"));
$cl_units->set_recruit_in("barracks");
$cl_units->set_specials(array());
$cl_units->set_group("foot");
$cl_units->set_col("A");
$cl_units->set_attType("def");
$cl_units->set_description("Miecznik jest kolejn¹ jednostk¹ defensywn¹. S¹ efektywni w obronie przeciwko topornikom, natomiast ma³o skuteczni w starciu z lekkimi kawalerzystami (jeden Lekki Kawalerzysta mo¿e zabiæ oko³o piêciu Mieczników).");

$cl_units->add_unit("Topornik","unit_axe");
$cl_units->set_woodprice("60");
$cl_units->set_stoneprice("30");
$cl_units->set_ironprice("40");
$cl_units->set_bhprice("1");
$cl_units->set_time("1250");
$cl_units->set_att("40","1.0455");
$cl_units->set_def("10","1.045");
$cl_units->set_defcav("5","1.045");
$cl_units->set_defarcher("10","1.045");
$cl_units->set_speed("1080");
$cl_units->set_booty("10");
$cl_units->set_needed(array("smith"=>"2"));
$cl_units->set_recruit_in("barracks");
$cl_units->set_specials(array());
$cl_units->set_group("foot");
$cl_units->set_col("A");
$cl_units->set_attType("off");
$cl_units->set_description("Topornik to mocna jednostka ofensywna. Jak szaleni atakuj¹ wioski przeciwników. Bez problemu rozbijaj¹ armiê pikinierów. Mniej skuteczni s¹ w starciu z miecznikami.");


$cl_units->add_unit("£ucznik","unit_archer");
$cl_units->set_woodprice("100");
$cl_units->set_stoneprice("30");
$cl_units->set_ironprice("60");
$cl_units->set_bhprice("1");
$cl_units->set_time("2000");
$cl_units->set_att("15","1.0455");
$cl_units->set_def("55","1.045");
$cl_units->set_defcav("40","1.045");
$cl_units->set_defarcher("5","1.045");
$cl_units->set_speed("1080");
$cl_units->set_booty("10");
$cl_units->set_needed(array("smith"=>"2"));
$cl_units->set_recruit_in("barracks");
$cl_units->set_specials(array());
$cl_units->set_group("archer");
$cl_units->set_col("A");
$cl_units->set_attType("def");
$cl_units->set_description("(tzw. ³uk) - jednostka defensywna. Jest dobra przeciwko ró¿nym jednostkom, lecz nieskuteczna w walce z £ucznikami na Koniu.");

$cl_units->add_unit("Szpieg","unit_spy");
$cl_units->set_woodprice("50");
$cl_units->set_stoneprice("50");
$cl_units->set_ironprice("20");
$cl_units->set_bhprice("2");
$cl_units->set_time("1250");
$cl_units->set_att("0","1.045");
$cl_units->set_def("2","1.045");
$cl_units->set_defcav("1","1.045");
$cl_units->set_defarcher("2","1.045");
$cl_units->set_speed("540");
$cl_units->set_booty("0");
$cl_units->set_needed(array("stable"=>1));
$cl_units->set_recruit_in("stable");
$cl_units->set_specials(array());
$cl_units->set_group("cav");
$cl_units->set_col("B");
$cl_units->set_attType("spy");
$cl_units->set_description("Zwiadowca to jednostka rekrutowana w Stajni, potrzebna do szpiegowania innych graczy. Na œwiatach ze starym stylem, badanie kolejnych poziomów zwiadowcy wp³ywa na iloœæ informacji jakie nam dostarcza.");

$cl_units->add_unit("Lekki kawalerzysta","unit_light");
$cl_units->set_woodprice("125");
$cl_units->set_stoneprice("100");
$cl_units->set_ironprice("250");
$cl_units->set_bhprice("4");
$cl_units->set_time("2400");
$cl_units->set_att("170","1.045");
$cl_units->set_def("30","1.045");
$cl_units->set_defcav("40","1.045");
$cl_units->set_defarcher("30","1.045");
$cl_units->set_speed("600");
$cl_units->set_booty("80");
$cl_units->set_needed(array("stable" => 3));
$cl_units->set_recruit_in("stable");
$cl_units->set_specials(array());
$cl_units->set_group("cav");
$cl_units->set_col("B");
$cl_units->set_attType("off");
$cl_units->set_description('(w skrócie: LK) - jednostka produkowana w Stajni, bardzo przydatna do "farmienia", gdy¿ ma najwiêksz¹ pojemnoœæ ³upu i jest bardzo szybka. Lekka kawaleria jest wojskiem ofensywnym, najlepiej sprawdza siê w starciach przeciwko Miecznikom oraz Ciê¿kim kawalerzystom. Najlepiej wspó³dzia³a z £ucznikami konnymi tworz¹c szybki atak zarazem najmocniejszy w ustawieniu. Ich piêt¹ achillesow¹ jest walka z Pikinierami, którzy w prosty sposób sobie z nimi radz¹, bez wiêkszych strat. Dlatego te¿ nie poleca siê budowaæ offa z³o¿onego z samej Lekkiej kawalerii.');


$cl_units->add_unit("£ucznik na koniu","unit_cav_archer");
$cl_units->set_woodprice("250");
$cl_units->set_stoneprice("100");
$cl_units->set_ironprice("150");
$cl_units->set_bhprice("5");
$cl_units->set_time("3000");
$cl_units->set_att("220","1.045");
$cl_units->set_def("60","1.045");
$cl_units->set_defcav("30","1.045");
$cl_units->set_defarcher("50","1.045");
$cl_units->set_speed("600");
$cl_units->set_booty("50");
$cl_units->set_needed(array("stable"=>5));
$cl_units->set_recruit_in("stable");
$cl_units->set_specials(array());
$cl_units->set_group("archer");
$cl_units->set_col("B");
$cl_units->set_attType("off");
$cl_units->set_description("jednostka ofensywna rekrutowana w Stajni. Droga, lecz op³acalna, jeœli przeciwnik ma du¿o £uczników. Jednostka ta jest bardzo uniwersalna, mo¿e z powodzeniem zast¹piæ armiê lekkiej kawalerii i Toporników. Posiadaj¹c maksymaln¹ iloœæ tej jednostki w wiosce ofensywnej (ok. 4000) mo¿emy zniszczyæ obronê sk³adaj¹c¹ siê z 3000 Pikinierów i Mieczników oraz z 8000 £uczników, przy murze na 20 poziomie. Nastêpn¹ zalet¹ takiej armii ofensywnej jest szybkoœæ, ³ucznik konny jest szybszy ni¿ Topornik.");

$cl_units->add_unit("Ciê¿ka Kawaleria","unit_heavy");
$cl_units->set_woodprice("200");
$cl_units->set_stoneprice("150");
$cl_units->set_ironprice("600");
$cl_units->set_bhprice("6");
$cl_units->set_time("3600");
$cl_units->set_att("150","1.045");
$cl_units->set_def("200","1.045");
$cl_units->set_defcav("80","1.045");
$cl_units->set_defarcher("180","1.045");
$cl_units->set_speed("660");
$cl_units->set_booty("50");
$cl_units->set_needed(array("stable"=>"10","smith"=>"15"));
$cl_units->set_recruit_in("stable");
$cl_units->set_specials(array());
$cl_units->set_group("cav");
$cl_units->set_col("B");
$cl_units->set_attType("def");
$cl_units->set_description("Ciê¿ki kawalerzysta jest elit¹ Twoich wojsk. Pos³uguje siê ostrym mieczem i chroni go mocna zbroja. Jest to jednostka obronna (u¿ywana czasem jako ofensywna), rekrutowana w Stajni. Jest bardzo droga w produkcji, ale op³acalna poniewa¿ porusza siê dwa razy szybciej ni¿ Miecznik. Mo¿e mieæ to du¿e znaczenie, kiedy trzeba szybko wys³aæ wsparcie. Jej minusem jest du¿e zapotrzebowanie na ludnoœæ w Zagrodzie. Ciê¿ki Kawalerzysta jest wolniejszy od Lekkiej kawalerii i zabiera mniej ³upu. W obronie s³aby przeciwko kawalerii, natomiast bardzo skutecznie broni przed Topornikami. Na rekrutowanie go najwiêcej potrzeba surowca ¿elazo, jedna wada jest taka, ¿e d³ugo siê trenuje.");

$cl_units->add_unit("Taran","unit_ram");
$cl_units->set_woodprice("300");
$cl_units->set_stoneprice("200");
$cl_units->set_ironprice("200");
$cl_units->set_bhprice("5");
$cl_units->set_time("1250");
$cl_units->set_att("2","1.045");
$cl_units->set_def("20","1.045");
$cl_units->set_defcav("50","1.045");
$cl_units->set_defarcher("20","1.045");
$cl_units->set_speed("1800");
$cl_units->set_booty("0");
$cl_units->set_needed(array("garage"=>"1"));
$cl_units->set_recruit_in("garage");
$cl_units->set_specials(array());
$cl_units->set_group("foot");
$cl_units->set_col("C");
$cl_units->set_attType("off");
$cl_units->set_description("jednostka oblê¿nicza produkowana w Warsztacie. Przydatny podczas ataków na przeciwnika z wysokim poziomem muru obronnego, gdy¿ uszkadza go przed starciem reszty wojsk. Tarany nale¿y wysy³aæ razem z innymi wojskami ofensywnymi.");

$cl_units->add_unit("Katapulta","unit_catapult");
$cl_units->set_woodprice("320");
$cl_units->set_stoneprice("400");
$cl_units->set_ironprice("100");
$cl_units->set_bhprice("8");
$cl_units->set_time("1250");
$cl_units->set_att("100","1.045");
$cl_units->set_def("100","1.045");
$cl_units->set_defcav("50","1.045");
$cl_units->set_defarcher("100","1.045");
$cl_units->set_speed("1800");
$cl_units->set_booty("0");
$cl_units->set_needed(array("garage"=>"2","smith"=>"12"));
$cl_units->set_recruit_in("garage");
$cl_units->set_specials(array());
$cl_units->set_group("foot");
$cl_units->set_col("C");
$cl_units->set_attType("undefined");
$cl_units->set_description("Katapulta - jednostka oblê¿nicza produkowana w Warsztacie. Jest droga, lecz w trakcie ataku burzy poziomy wybranego budynku przeciwnika (oprócz Schowka i Koœcio³a). Katapulty maj¹ mniejsz¹ skutecznoœæ w burzeniu Muru Obronnego przeciwnika ni¿ Tarany. Nie op³aca u¿ywaæ siê ich do niszczenia muru, poniewa¿ katapulta niszczy budynek po walce, a Taran w trakcie. Katapulty doskonale nadaj¹ siê do wyniszczenia wioski i spowolnienia rozwoju nêkanego gracza. Najlepiej atakowaæ Zagrodê, poniewa¿ najpierw trzeba bêdzie odbudowaæ zagrodê, a dopiero potem budynki i wojska.");

$cl_units->add_unit("Rycerz","unit_paladin");
$cl_units->set_woodprice("20");
$cl_units->set_stoneprice("20");
$cl_units->set_ironprice("40");
$cl_units->set_bhprice("10");
$cl_units->set_time("34425");
$cl_units->set_att("150","1");
$cl_units->set_def("250","1");
$cl_units->set_defcav("400","1");
$cl_units->set_defarcher("150","1");
$cl_units->set_speed("600");
$cl_units->set_booty("100");
$cl_units->set_needed(array("statue" => "1"));
$cl_units->set_recruit_in("statue");
$cl_units->set_specials(array("no_investigate"));
$cl_units->set_group("cav");
$cl_units->set_col("D");
$cl_units->set_attType("def");
$cl_units->set_description("Rycerz - wystêpuje w grze w œwiatach w stylach od 3.0. Ponadto na œwiatach pocz¹wszy od stylu 4.0 zosta³ wystylizowany na bohatera - zdobywa doœwiadczenie, a tak¿e w trakcie walki mo¿e znaleŸæ przedmioty, które podnosz¹ statystyki obrony b¹dŸ ataku. Przedmioty te nak³ada siê na niego w specjalnej zak³adce Piedesta³u - Zbrojowni. Mianowaæ nowego wojownika do rangi rycerza, a tak¿e nazwaæ. Dodatkowo rycerz przyœpiesza wojsko id¹ce razem z nim do 10 minut na pole, ale tylko i wy³¹cznie je¿eli jest po pomoc dla innej wioski. Ka¿dy gracz mo¿e posiadaæ tylko jednego rycerza.");


$cl_units->add_unit("Szlachcic","unit_snob");
if ($config['ag_style'] == 0) {
	$cl_units->set_woodprice("28000");
	$cl_units->set_stoneprice("30000");
	$cl_units->set_ironprice("25000");
	}
if ($config['ag_style'] == 1) {
	$cl_units->set_woodprice("40000");
	$cl_units->set_stoneprice("50000");
	$cl_units->set_ironprice("50000");
	}
$cl_units->set_bhprice("100");
$cl_units->set_time("12500");
$cl_units->set_att("30","1.045");
$cl_units->set_def("100","1.045");
$cl_units->set_defcav("50","1.045");
$cl_units->set_defarcher("100","1.045");
$cl_units->set_speed("2100");
$cl_units->set_booty("0");
$cl_units->set_needed(array("main"=>20,"smith"=>20,"market"=>10));
$cl_units->set_recruit_in("snob");
$cl_units->set_specials(array("no_investigate"));
$cl_units->set_group("foot");
$cl_units->set_col("D");
$cl_units->set_attType("undefined");
$cl_units->set_description("Szlachcic - (potocznie czêsto zwany grubasem) - jednostka produkowana w Pa³acu. Atak zawieraj¹cy szlachtê jest jedyn¹ mo¿liwoœci¹ przejmowania wiosek. Po zaatakowaniu wioski obni¿a w niej poparcie (jego wartoœæ wyjœciowa =100). Liczba punktów o jakie jest obni¿ane zale¿y od konfiguracji œwiata. Zazwyczaj minimaln¹ wartoœci¹ jest 20, a maksymaln¹ 35 (chyba, ¿e config œwiata mówi inaczej). Jeœli osi¹gnie wartoœæ 0 lub mniejsz¹, wioska zostanie przejêta. Wys³anie wiêkszej iloœci szlachciców w jednym ataku nie obni¿a poparcia bardziej ni¿ jeden szlachcic. Nie ma znaczenia kto obni¿a³ poparcie - wioskê przejmie w posiadanie gracz, którego atak obni¿y³ poparcia poni¿ej zera. Jeœli chcemy szybko przej¹æ innego gracza, dobr¹ taktyk¹ jest wysy³anie jednego szlachcica po drugim. W wiêkszoœci przypadków, do przejêcia wystarczy czterokrotne wys³anie szlachty. Szlachcic dodatkowo spowalnia id¹c¹ z nim armiê.");
?>