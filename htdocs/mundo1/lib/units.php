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
		//Escolha um bônus wioski:
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

//Liczby decyduj�ce o szybko�ci trenowania nowych jednostek:
$cl_units->set_unitfactor("0.665","0.94355");

// Configurações de todas as unidades, abaixo são padrão de acordo com Plemiona.pl
$cl_units->add_unit("Lanceiro","unit_spear");
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
$cl_units->set_description("Lanceiro é a unidade defensiva mais simples e básica. É eficaz contra cavalaria, mas é completamente inútil contra machados. No início do jogo, eles são usados ​​para agricultura, devido à sua velocidade de movimento mais rápida do que o Espadachim e maior capacidade de pilhagem do que o Machado..");

$cl_units->add_unit("Espadachim","unit_sword");
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
$cl_units->set_description("Espadachim é outra unidade defensiva. Eles são eficazes contra Axemen, mas não muito eficazes contra Cavalaria Leve (uma Cavalaria Leve pode matar cerca de cinco Espadachins).");

$cl_units->add_unit("Viking","unit_axe");
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
$cl_units->set_description("O machado é uma forte unidade ofensiva. Como loucos eles atacam as aldeias de seus oponentes. Esmague um exército de piqueiros com facilidade. Eles são menos eficazes contra espadachins.");


$cl_units->add_unit("Arqueiro","unit_archer");
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
$cl_units->set_description("(chamado Arqueiro) - uma unidade defensiva. É bom contra várias unidades, mas ineficaz contra arqueiros montados.");
if ($config['kosciol_i_mnisi'] == true) {
$cl_units->add_unit("Monge","unit_mnich");
$cl_units->set_woodprice("5000");
$cl_units->set_stoneprice("7500");
$cl_units->set_ironprice("4000");
$cl_units->set_bhprice("4");
$cl_units->set_time("2000");
$cl_units->set_att("15","1.045");
$cl_units->set_def("155","1.045");
$cl_units->set_defcav("155","1.045");
$cl_units->set_defarcher("150","1.045");
$cl_units->set_speed("1320");
$cl_units->set_booty("15");
$cl_units->set_needed(array("church"=>"1"));
$cl_units->set_recruit_in("church");
$cl_units->set_specials(array());
$cl_units->set_group("foot");
$cl_units->set_col("A");
$cl_units->set_attType("def");
$cl_units->set_description("O Monge é uma unidade de Defesa. É a melhor unidade para defender uma aldeia - mas também cara.");
}
$cl_units->add_unit("Batedor","unit_spy");
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
$cl_units->set_description("O Batedor é uma unidade recrutada nos estábulos, necessária para espionar outros jogadores. Em mundos antigos, pesquisar os níveis de um batedor afeta a quantidade de informações que ele fornece.");

$cl_units->add_unit("Cavalaria leve","unit_light");
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
$cl_units->set_description('(resumindo: LK) - uma unidade produzida em Stables, muito útil para farmar, pois tem a maior capacidade de loot e é muito rápida. A cavalaria leve é ​​um exército ofensivo, funciona melhor contra Espadachins e Cavalaria Pesada. Funciona melhor com arqueiros montados, criando um ataque rápido e o mais forte na configuração. Seu quinto Aquiles é a luta contra os Piqueiros, que facilmente lidam com eles sem grandes perdas. Portanto, não é recomendado construir um off apenas com cavalaria leve.');


$cl_units->add_unit("Arqueiro a cavalo","unit_cav_archer");
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
$cl_units->set_description("Unidade ofensiva recrutada nos estábulos. Caro, mas vale a pena se o inimigo tiver muitos arqueiros. Esta unidade é muito versátil, pode substituir com sucesso um exército de cavalaria leve e machado. Com o número máximo desta unidade na aldeia ofensiva (aprox. 4000) podemos destruir as defesas compostas por 3000 Piqueiros e Espadachins e 8000 Arqueiros, com parede de nível 20. A próxima vantagem de tal exército ofensivo é a velocidade, o arqueiro montado é mais rápido que o homem do machado.");

$cl_units->add_unit("Cavalaria pesada","unit_heavy");
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
$cl_units->set_description("O cavaleiro pesado é a elite de suas tropas. Ele empunha uma espada afiada e é protegido por uma armadura forte. É uma unidade defensiva (às vezes usada como unidade ofensiva), recrutada no Estábulo. É muito caro de produzir, mas compensa porque se move duas vezes mais rápido que o Espadachim. Isso pode fazer uma grande diferença quando precisa enviar suporte rapidamente. Sua desvantagem é a alta demanda de pessoas em Zagroda. A Cavalaria Pesada é mais lenta que a Cavalaria Leve e leva menos pilhagem. Fraco na defesa contra a cavalaria, mas muito eficaz contra homens do machado. Recrutá-lo requer a maior parte do recurso Ferro, uma desvantagem é que leva muito tempo para treinar.");

$cl_units->add_unit("Ariete","unit_ram");
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
$cl_units->set_description("uma unidade de cálculo produzida na Oficina. Útil ao atacar um inimigo com um muro defensivo alto, pois o danifica antes que o resto das tropas se choquem. Os aríetes devem ser enviados junto com outras tropas ofensivas.");

$cl_units->add_unit("Catapulta","unit_catapult");
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
$cl_units->set_description("Catapulta - uma unidade de cerco produzida na Oficina. É caro, mas destrói os níveis de um edifício inimigo alvo (exceto o Armazenamento e a Igreja) quando atacado. Catapultas são menos eficazes em derrubar a Muralha de um oponente do que Aríetes. Não vale a pena usá-los para destruir uma parede, porque a catapulta destrói o prédio após a luta e o aríete no processo. As catapultas são ótimas para destruir uma aldeia e retardar o desenvolvimento de um jogador sitiado. É melhor atacar a muralha, porque terá que reconstruir a muralha primeiro, depois edifícios e tropas.");

$cl_units->add_unit("Paladino","unit_paladin");
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
$cl_units->set_description("Paladino - aparece no jogo em estilos de 3.0. Além disso, em mundos a partir do estilo 4.0, ele foi estilizado como um herói - ele ganha experiência e, durante a luta, pode encontrar itens que aumentam suas estatísticas de defesa ou ataque. Esses itens são aplicados a ele em uma guia especial do Pedestal - Armory. Nomeie um novo guerreiro para o posto de cavaleiro e nomeie-o. Além disso, o cavaleiro acelera o exército que vai com ele para o campo por 10 minutos, mas somente se houver ajuda para outra aldeia. Cada jogador só pode ter um cavaleiro.");


$cl_units->add_unit("Nobre","unit_snob");
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
$cl_units->set_description("Nobre - (vulgarmente conhecido por gordo) - unidade produzida no Palácio. Um ataque contendo nobres é a única maneira de capturar aldeias. Após atacar uma aldeia, ela diminui a moral (seu valor inicial = 100). O número de pontos pelos quais é reduzido depende da configuração do mundo. Normalmente, o valor mínimo é 20 e o máximo é 35 (a menos que a configuração do mundo diga o contrário). Se chegar a 0 ou menos, a aldeia é capturada. Enviar mais nobres em um único ataque não diminui a moral em mais de um nobre. Não importa quem reduz a moral - a aldeia será tomada pelo jogador cujo ataque reduz a moral abaixo de zero. Se quiser dominar outro jogador rapidamente, uma boa tática é enviar um nobre após o outro. Na maioria dos casos, enviar  quatro nobres  é o suficiente para comquistar. O nobre também desacelera o exército que o segue.");
?>