<?php
class builds {
	var $id = null;
	var $config = null;
	var $last_dbname = null;
	var $name = null;
	var $dbname = null;
	var $wood = null;
	var $stone = null;
	var $iron = null;
	var $bh = null;
	var $points = null;
	var $time = null;
	var $max_stage = null;
	var $needbuilds = null;
	var $description = null;
	var $build_sharpens = null;
	var $main_factor = null;
	var $build_error2 = null;
	var $build_error = null;
	var $specials = null;
	var $kingsage = false;

	function builds() {
		global $config;
		$this->config = $config;
		}
		
	function add_build($name,$dbname) {
		$this->id[$dbname] = count($this->dbname);
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
		
	function set_points($b,$m) {
		$this->points[$this->last_dbname] = $b.','.$m;
		}
		
	function set_time($b,$m) {
		$this->time[$this->last_dbname] = $b.','.$m;
		}
		
	function set_mainfactor($b,$m) {
		$this->main_factor = $b.','.$m;
		}
		
	function set_maxstage($stage) {
		$this->max_stage[$this->last_dbname] = $stage;
		}
		
	function set_buildsharpens($b,$m) {
		$this->build_sharpens = $b.','.$m;
		}
		
	function set_bhprice($b,$m) {
		$this->bh[$this->last_dbname] = $b.','.$m;
		}
		
	function set_description($value) {
		$this->description[$this->last_dbname] = $value;
		}
		
	function set_needbuilds($array) {
		if (is_array($array)) {
			$this->needbuilds[$this->last_dbname] = $array;
			} else {
			$this->needbuilds[$this->last_dbname] = array();
			}
		}
		
	function set_specials($array) {
		if (is_array($array)) {
			$this->speacials[$this->last_dbname] = $array;
			} else {
			$this->speacials[$this->last_dbname] = array();
			}
		}
		
	function get_array($array) {
		$array = $this->$array;
		
		if (is_array($array)) {
			return $array;
			} else {
			return array();
			}
		}
		
	function get_needed($id) {
		return $this->needbuilds[$this->dbname[$id]];
		}
		
	function get_needed_by_dbname($dbname) {
		return $this->needbuilds[$dbname];
		}
		
	function get_specials($dbname) {
		return $this->speacials[$dbname];
		}
		
	function get_name($dbname) {
		return $this->name[$dbname];
		}
		
	function get_description($id) {
		return $this->description[$this->dbname[$id]];
		}
		
	function get_description_bydbname($dbname) {
		return $this->description[$dbname];
		}
		
	function get_maxstage($dbname) {
		return $this->max_stage[$dbname];
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
		
	function get_bh($dbname,$stage) {
		$faktor = explode(',',$this->bh[$dbname]);
		
		if ($stage <= 1) {
			return $faktor[0];
			} else {
			$modifer_total_last = pow($faktor[1],$stage - 2);
			$modifer_total = pow($faktor[1],$stage - 1);
			$bh_total_last = round($faktor[0] * $modifer_total_last);
			$bh_total = round($faktor[0] * $modifer_total);
			$this->bh_total = $bh_total;
			
			return round($bh_total - $bh_total_last);
			}
		}
		
	function get_bh_total($dbname,$stage) {
		$faktor = explode(',',$this->bh[$dbname]);
		
		if ($stage <= 1) {
			return $faktor[0];
			} else {
			$modifer_total = pow($faktor[1],$stage - 1);
			$bh_total = round($faktor[0] * $modifer_total);
			return $bh_total;
			}
		}
		
	function get_points($dbname,$stage) {
		if ($this->kingsage) {
			$faktor = explode(',',$this->points[$dbname]);
			return round($faktor[0] * $stage);
			} else {
			$faktor = explode(',',$this->points[$dbname]);
			$modifer = pow($faktor[1],$stage - 1);
			return round($faktor[0] * $modifer);
			}
		}
		
	function get_time($main_stage,$dbname,$stage) {
		$faktor = explode(',',$this->time[$dbname]);
		$faktor_builds = explode(',',$this->main_factor);
		
		$start_mfactor = pow($faktor_builds[1],$main_stage) * $faktor_builds[0];
		$modifer = pow($faktor[1],$stage - 1);
		
		$time = round(($faktor[0] * $modifer * $start_mfactor) / $this->config['speed']);
		return $time;
		}
		
	function get_highest_stage() {
		if (is_array($this->max_stage)) {
			$stage = max($this->max_stage);
			}
			
		if (empty($stage)) {
			$stage = 0;
			}
			
		return $stage;
		}
		
	function build() {
		}
		
	function check_needed($buildname,$village) {
		$needed = $this->get_needed_by_dbname($buildname);
		
		if (is_array($needed)) {
			foreach ($needed as $build => $level) {
				if ($village[$build] >= $level) {
					$checked++;
					}
				$all++;
				}
				
			if ($checked == $all) {
				$return = true;
				} else {
				$return = false;
				}
			} else {
			$return = false;
			}
				
		return $return;
		}
		
	function get_build_error() {
		return $this->build_error;
		}
		
	function get_build_error2() {
		return $this->build_error2;
		}
		
	function get_buildsharpens_costs($num_builds) {
		if ($num_builds > 2) {
			$faktor = explode(',',$this->build_sharpens);
			$plus_costs = pow($faktor[0],$num_builds - 2) * 100 - 100;
			return round($plus_costs);
			} else {
			return 0;
			}
		}
		
	function get_points_stage($dbname,$stage) {
		if ($stage <= 1) {
			$faktor = explode(',',$this->points[$dbname]);
			return $faktor[0];
			} else {	
			$faktor = explode(',',$this->points[$dbname]);
			$modifer_total_last = pow($faktor[1],$stage - 2);
			$modifer_total = pow($faktor[1],$stage - 1);
			$points_total_last = round($faktor[0] * $modifer_total_last);
			$points_total = round($faktor[0] * $modifer_total);
			return round($points_total - $points_total_last);
			}
		}
	}
	
//Start klasy builds();
$cl_builds = new builds();

//Liczby decyduj¹ce o szybkoœci budowania nowych budowli:
$cl_builds->set_mainfactor("1.25","0.952381");

//Liczby decyduj¹ce o wielkoœci dodatkowych kosztów budowy:
$cl_builds->set_buildsharpens("1.25","20");

//Ustawienia wszystkich budynków, poni¿sze s¹ standartowe zgodnie z plemiona.pl
$cl_builds->add_build("Ratusz","main");
$cl_builds->set_woodprice("90","1.26");
$cl_builds->set_stoneprice("80","1.275");
$cl_builds->set_ironprice("70","1.26");
$cl_builds->set_bhprice("5","1.17");
$cl_builds->set_time("1080","1.2");
$cl_builds->set_points("10","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage("30");
$cl_builds->set_specials(array());
$cl_builds->set_description("W ratuszu mo¿na rozbudowywaæ ju¿ istniej¹ce budynki lub budowaæ nowe. Im wiêkszy stopieñ rozbudowania, tym szybciej s¹ budowane budynki. Po wybudowaniu ratusza do piêtnastego poziomu mo¿esz burzyæ inne budynki. Pod list¹ budynków znajduje siê równie¿ miejsce, w którym mo¿emy zmieniæ nazwê wioski.");

$cl_builds->add_build("Koszary","barracks");
$cl_builds->set_woodprice("200","1.26");
$cl_builds->set_stoneprice("170","1.28");
$cl_builds->set_ironprice("90","1.26");
$cl_builds->set_bhprice("7","1.17");
$cl_builds->set_time("1800","1.2");
$cl_builds->set_points("16","1.2");
$cl_builds->set_needbuilds(array("main"=>"3"));
$cl_builds->set_maxstage("25");
$cl_builds->set_specials(array());
$cl_builds->set_description("W koszarach mo¿esz rekrutowaæ piechotê. Im wiêkszy stopieñ rozbudowania, tym szybciej przebiega rekrutacja.");

$cl_builds->add_build("Stajnia","stable");
$cl_builds->set_woodprice("270","1.26");
$cl_builds->set_stoneprice("240","1.28");
$cl_builds->set_ironprice("260","1.26");
$cl_builds->set_bhprice("8","1.17");
$cl_builds->set_time("6000","1.2");
$cl_builds->set_points("20","1.2");
$cl_builds->set_needbuilds(array("main"=>"10","barracks"=>"5","smith"=>"5"));
$cl_builds->set_maxstage("20");
$cl_builds->set_specials(array());
$cl_builds->set_description("W stajni mo¿esz rekrutowaæ jeŸdŸców. Im wiêkszy stopieñ rozbudowania stajni, tym szybciej przebiega rekrutacja.");

$cl_builds->add_build("Warsztat","garage");
$cl_builds->set_woodprice("300","1.26");
$cl_builds->set_stoneprice("240","1.28");
$cl_builds->set_ironprice("260","1.26");
$cl_builds->set_bhprice("8","1.16");
$cl_builds->set_time("6000","1.2");
$cl_builds->set_points("24","1.2");
$cl_builds->set_needbuilds(array("main"=>"10","smith"=>"10"));
$cl_builds->set_maxstage("15");
$cl_builds->set_specials(array());
$cl_builds->set_description("W warsztacie mo¿esz produkowaæ broñ oblê¿nicz¹. Im wiêkszy stopieñ rozbudowania, tym szybciej s¹ produkowane wojska.");

$cl_builds->add_build("Pa³ac","snob");
$cl_builds->set_woodprice("15000","2");
$cl_builds->set_stoneprice("25000","2");
$cl_builds->set_ironprice("10000","2");
$cl_builds->set_bhprice("80","1.17");
$cl_builds->set_time("64800","1.2");
$cl_builds->set_points("512","1.2");
$cl_builds->set_needbuilds(array("main"=>"20","smith"=>"20","market"=>"10"));
if ($config['ag_style'] == 0) {
	$cl_builds->set_maxstage("3");
	}
if ($config['ag_style'] == 1) {
	$cl_builds->set_maxstage("1");
	}
$cl_builds->set_specials(array());
$cl_builds->set_description("W pa³acu mo¿esz rekrutowaæ szlachciców do przejmowania innych wiosek.");

$cl_builds->add_build("KuŸnia","smith");
$cl_builds->set_woodprice("220","1.26");
$cl_builds->set_stoneprice("180","1.275");
$cl_builds->set_ironprice("240","1.26");
$cl_builds->set_bhprice("40","1.17");
$cl_builds->set_time("6000","1.2");
$cl_builds->set_points("19","1.2");
$cl_builds->set_needbuilds(array("main"=>"5","barracks"=>"1"));
$cl_builds->set_maxstage("20");
$cl_builds->set_specials(array());
$cl_builds->set_description("Jednostki s¹ badane w kuŸni. Im wiêkszy stopieñ rozbudowania kuŸni, tym lepsze jednostki mo¿na badaæ. Dodatkowo zmniejsza siê czas badania. Liczba mo¿liwych badañ jest ograniczona. Technologie ju¿ zbadane mo¿na zlikwidowaæ, by zrobiæ miejsce na inne. Przy likwidacji nie otrzymuje siê surowców.");

$cl_builds->add_build("Plac","place");
$cl_builds->set_woodprice("10","1.2");
$cl_builds->set_stoneprice("40","1.2");
$cl_builds->set_ironprice("30","1.2");
$cl_builds->set_bhprice("0","1.17");
$cl_builds->set_time("2000","1.2");
$cl_builds->set_points("0","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage("1");
$cl_builds->set_specials(array());
$cl_builds->set_description("Na placu stoj¹ wszystkie wojska. Tutaj mo¿esz wydawaæ rozkazy i przesuwaæ wojska.");

$cl_builds->add_build("Piedesta³","statue");
$cl_builds->set_woodprice("220","1");
$cl_builds->set_stoneprice("220","1");
$cl_builds->set_ironprice("220","1");
$cl_builds->set_bhprice("10","1");
$cl_builds->set_time("600","1");
$cl_builds->set_points("24","1");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage("1");
$cl_builds->set_specials(array());
$cl_builds->set_description("Mieszkañcy wioski oddaj¹ ho³d rycerzowi na piedestale. Je¿eli twój rycerz polegnie w walce, tutaj mo¿esz mianowaæ nowego wojownika do rangi rycerza.");


$cl_builds->add_build("Rynek","market");
$cl_builds->set_woodprice("100","1.26");
$cl_builds->set_stoneprice("100","1.275");
$cl_builds->set_ironprice("100","1.26");
$cl_builds->set_bhprice("20","1.17");
$cl_builds->set_time("2700","1.2");
$cl_builds->set_points("10","1.2");
$cl_builds->set_needbuilds(array("main"=>"3","storage"=>"2"));
$cl_builds->set_maxstage("25");
$cl_builds->set_specials(array());
$cl_builds->set_description("Tutaj mo¿esz handlowaæ z innymi graczami lub przesy³aæ surowce.");

$cl_builds->add_build("Tartak","wood");
$cl_builds->set_woodprice("50","1.25");
$cl_builds->set_stoneprice("60","1.275");
$cl_builds->set_ironprice("40","1.245");
$cl_builds->set_bhprice("5","1.15");
$cl_builds->set_time("900","1.2");
$cl_builds->set_points("6","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage("30");
$cl_builds->set_specials(array());
$cl_builds->set_description("Tutaj drwale obrabiaj¹ drewno œciête w okolicznych lasach, które jest potrzebne zarówno do budowy wioski, jak i do uzbrojenia wojsk. Im wiêkszy stopieñ rozbudowania tartaku, tym wiêksza produkcja drewna");

$cl_builds->add_build("Cegielnia","stone");
$cl_builds->set_woodprice("65","1.27");
$cl_builds->set_stoneprice("50","1.265");
$cl_builds->set_ironprice("40","1.24");
$cl_builds->set_bhprice("10","1.14");
$cl_builds->set_time("900","1.2");
$cl_builds->set_points("6","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage("30");
$cl_builds->set_specials(array());
$cl_builds->set_description("W cegielni pracownicy wydobywaj¹ glinê na rozbudowê wioski. Im wiêkszy stopieñ rozbudowania cegielni, tym wiêcej wydobywa siê gliny.");

$cl_builds->add_build("Huta ¿elaza","iron");
$cl_builds->set_woodprice("75","1.25");
$cl_builds->set_stoneprice("65","1.275");
$cl_builds->set_ironprice("70","1.24");
$cl_builds->set_bhprice("10","1.17");
$cl_builds->set_time("1080","1.2");
$cl_builds->set_points("6","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage("30");
$cl_builds->set_specials(array());
$cl_builds->set_description("W hucie ¿elaza Twoi pracownicy wytapiaj¹ ¿elazo. Im wy¿szy stopieñ rozbudowania huty, tym wiêcej ¿elaza mo¿na przy jej pomocy pozyskiwaæ.");

$cl_builds->add_build("Zagroda","farm");
$cl_builds->set_woodprice("45","1.3");
$cl_builds->set_stoneprice("40","1.32");
$cl_builds->set_ironprice("30","1.29");
$cl_builds->set_bhprice("0","1");
$cl_builds->set_time("1440","1.2");
$cl_builds->set_points("5","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage("30");
$cl_builds->set_specials(array());
$cl_builds->set_description("Zagroda wy¿ywia twoich pracowników i wojska. Bez rozbudowania zagrody twoja wioska nie mo¿e siê rozrastaæ. Im wiêkszy stopieñ rozbudowania, tym wiêcej mieszkañców mo¿e byæ wy¿ywionych.");

$cl_builds->add_build("Spichlerz","storage");
$cl_builds->set_woodprice("60","1.265");
$cl_builds->set_stoneprice("50","1.27");
$cl_builds->set_ironprice("40","1.245");
$cl_builds->set_bhprice("0","1");
$cl_builds->set_time("1224","1.2");
$cl_builds->set_points("6","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage("30");
$cl_builds->set_specials(array());
$cl_builds->set_description("W spichlerzu s¹ umieszczane surowce. Im wiêkszy stopieñ rozbudowania, tym wiêcej mo¿esz umieszczaæ w nim surowców.");

$cl_builds->add_build("Schowek","hide");
$cl_builds->set_woodprice("50","1.25");
$cl_builds->set_stoneprice("60","1.25");
$cl_builds->set_ironprice("50","1.25");
$cl_builds->set_bhprice("2","1.20");
$cl_builds->set_time("2160","1.2");
$cl_builds->set_points("5","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage("10");
$cl_builds->set_specials(array("catapult_protection"));
$cl_builds->set_description("W schowku mo¿na chowaæ surowce, tak, ¿eby przeciwnik nie móg³ ich spl¹drowaæ. Nawet zwiadowcy przeciwnika nie mog¹ siê dowiedzieæ, ile surowców ukryto w schowku.");

$cl_builds->add_build("Mur obronny","wall");
$cl_builds->set_woodprice("50","1.26");
$cl_builds->set_stoneprice("100","1.275");
$cl_builds->set_ironprice("20","1.26");
$cl_builds->set_bhprice("5","1.18");
$cl_builds->set_time("3600","1.2");
$cl_builds->set_points("8","1.2");
$cl_builds->set_needbuilds(array("barracks"=>"1"));
$cl_builds->set_maxstage("20");
$cl_builds->set_specials(array());
$cl_builds->set_description("Mur obronny chroni wioskê przed przeciwnikiem. Dziêki niemu wzrasta si³a obrony wojsk i obrona ogólna wioski.");
?>