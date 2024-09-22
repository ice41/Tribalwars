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
$cl_builds->set_buildsharpens("1.25","0");

//Ustawienia wszystkich budynków, poni¿sze s¹ standartowe zgodnie z plemiona.pl
require ('builds/main.php');

require ('builds/barracks.php');

require ('builds/stable.php');
if ($config['kosciol_i_mnisi'] == true) {
require ('builds/church.php');
}
require ('builds/garage.php');

require ('builds/snob.php');

require ('builds/smitch.php');

require ('builds/place.php');

require ('builds/statue.php');

require ('builds/market.php');

require ('builds/wood.php');

require ('builds/stone.php');

require ('builds/iron.php');

require ('builds/farm.php');

require ('builds/storage.php');

require ('builds/hide.php');

require ('builds/wall.php');



?>