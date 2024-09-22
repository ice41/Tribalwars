<?php
/**
 * merged GetVillageData into this class
 * 
 * @author Christopher Koch <christopher@twlan.org>
 */
class GetVillageData {

    var $db;
    var $dbHelper;
    var $user;
    var $config;
    
    var $villageID;
    var $villageInfo;
  
    /**
     * @constructor
     */

    
    /**
     * initialize variables and gather information about village
     * 
     * @param int $villageID if villageID is not the http-param village (eg, for eventhandler)
     */
    function initVillage($villageID = false) {
	$this->villageID = ($villageID === false) ? intval($_GET['village']) : intval($villageID);
	$this->villageInfo = $this->getInfoByID($this->villageID, "*");
	
	$this->initProductionValues();
	$this->getResources();
    }
    
    /**
     * initialize some information about the village and gather it in the villageInfo
     * 
     */
    function initProductionValues() {
	$rP = $this->config->getResourceProductionWSpeed();
	$this->villageInfo['resProd']['wood'] = $rP[ $this->villageInfo['wood'] ];
	$this->villageInfo['resProd']['stone'] = $rP[ $this->villageInfo['stone'] ];
	$this->villageInfo['resProd']['iron'] = $rP[ $this->villageInfo['iron'] ];
	
	$mS = $this->config->getMaxStorage();
	$this->villageInfo['maxStorage'] = $mS[ $this->villageInfo['storage'] ];
	
	$fL = $this->config->getFarmLimits();
	$this->villageInfo['farmLimits'] = $fL[ $this->villageInfo['farm'] ];
	
	$mH = $this->config->getMaxHide();
	$this->villageInfo['maxHide'] = $mH[ $this->villageInfo['hide'] ];
	
	$wB = $this->config->getWallBonus();
	$this->villageInfo['wallBonus'] = $wB[ $this->villageInfo['wall'] ];
	
	$bD = $this->config->getBasicDefense();
	$this->villageInfo['basicDefense'] = $bD[ $this->villageInfo['wall'] ];
    }
    
    /**
     * gathers infromation about resource production per hour and per minute
     * 
     * @return array
     */
    function getResProd() {
	$resProd = array();
	// per Hour: h
	$resProd['h']['wood'] = floor( $this->villageInfo['resProd']['wood'] );
	$resProd['h']['iron'] = floor( $this->villageInfo['resProd']['iron'] );
	$resProd['h']['stone'] = floor( $this->villageInfo['resProd']['stone'] );
	    
	// per Minute: m
	$resProd['m']['wood'] = floor( $this->villageInfo['resProd']['wood'] / 60 );
	$resProd['m']['iron'] = floor( $this->villageInfo['resProd']['iron'] / 60 );
	$resProd['m']['stone'] = floor( $this->villageInfo['resProd']['stone'] / 60 );
	return $resProd;
    }

    /**
     * 
     * GetVillageData::GetById -> Village::getInfoByID
     * @param int $id
     * @param array $columns
     * @return array|bool false if village doesn't exist
     */
    function getByID($id, $columns = false) {
        // strip ID
        $id = parse( $id );

	$columns = ($columns === false || $columns == '*') ? "*" : implode(",", $columns);
	$sql = "SELECT " . $columns . " FROM villages WHERE id='{$id}'";
	$result = mysql_query($sql);
        
	if(mysql_num_rows($result) > 0) {
            return mysql_Fetch_array($result);
        } else {
            return false;
        }
    }
    
    
    /**
     * calculates resources for the village and returns them
     * 
     * @param int $time
     * @return array 
     */
    function getResources($time = false)
    {
	    $production = $this->config->getResourceProductionWSpeed();
	    $maxStorage = $this->config->getMaxStorage();
	    $time = ($time === false) ? time() : $time; 

	    // time difference between the last update of resources and now.
	    $difference = $time - $this->villageInfo['last_prod_aktu'];
	    
	    // in seconds! / 3600
	    $woodProd = $production[ $this->villageInfo['wood'] ] / 3600;
	    $stoneProd = $production[ $this->villageInfo['stone'] ] / 3600;
	    $ironProd = $production[ $this->villageInfo['iron'] ] / 3600;
	    $maxVilStor = $maxStorage[ $this->villageInfo['storage'] ];
	    
	    $wood = $this->villageInfo['r_wood'] + $woodProd * $difference;
	    $stone = $this->villageInfo['r_stone'] + $stoneProd * $difference;
	    $iron = $this->villageInfo['r_iron'] + $ironProd * $difference;

	    // check whether there is more than the storage can take
	    $wood = ($wood > $maxVilStor) ? $maxVilStor : $wood;
	    $stone = ($stone > $maxVilStor) ? $maxVilStor : $stone;
	    $iron = ($iron > $maxVilStor) ? $maxVilStor : $iron;


	    $update = array(
		'r_wood' => $wood,
		'r_stone' => $stone,
		'r_iron' => $iron,
		'last_prod_aktu' => $time,
	    );
	    $this->dbHelper->simpleUpdate('villages', $update, 'id = '.$this->villageID);

	    return $update;
    }
    
    
    /**
     * returns ids of closeby villages (for arrows on overview, for example)
     * 
     * @return array keys: last, next (values: village ids)
     */
    function getCloseVillages() {
	// last village
	$result = $this->dbHelper->selectQuery("SELECT id 
		FROM villages 
		WHERE 
		    userid=".$this->villageInfo['userid']." AND 
			((name = '".$this->villageInfo['name']."' AND id < ".$this->villageID.") OR 
			(name < '".$this->villageInfo['name']."')) AND id != ".$this->villageID." 
		ORDER BY name DESC, id DESC 
		LIMIT 1");
	$return['last'] = ($result !== false) ? $result[0]['id'] : '';

	// next village
	$result = $this->dbHelper->selectQuery("SELECT id 
	    FROM villages 
	    WHERE 
		userid=" . $this->villageInfo['userid'] . " AND 
		    ((name = '" . $this->villageInfo['name'] . "' AND id > " . $this->villageID . ") OR 
		    (name > '" . $this->villageInfo['name'] . "')) AND id != " . $this->villageID . " 
	    ORDER BY name, id 
	    LIMIT 1");
	$return['next'] = ($result !== false) ? $result[0]['id'] : '';
	return $return;
    }
    
    /**
     * Reloads all village points
     */
    function reload_all_points() {
	// DB Abfrage zum laden der Gebäudestufen
	global $cl_builds;		// Klasse mit allen Gebäuden
	$builds = $cl_builds->get_array('dbname');			// Ermittelt alle Gebäude
	
	$result = mysql_query("SELECT id,points,".implode(",",$builds)." from villages");
	while($rowall=mysql_Fetch_array($result)) {
	
		// Ein Array nun durchlaufen lassen und die Punkte berechnen:
		$points = 0;
		foreach($builds AS $building) {
			$points += $cl_builds->get_points($building,$rowall[$building]);
		}
		
		// Die neuen Punkte in die Datenbank schreiben:
		if ($points!=$row['points']) {
			mysql_query("UPDATE villages SET points='$points' where id='".$rowall['id']."'");
		}
	}
	
}
/**
 * Reloads Village Points
 * @param int $villageid Id of Village
 */
function reload_points($villageid) {
	// DB Abfrage zum laden der Gebäudestufen
	global $cl_builds;		// Klasse mit allen Gebäuden
	$builds = $cl_builds->get_array('dbname');				// Ermittelt alle Gebäude
	$villagedata = new Village();
	$row = $villagedata->getInfoByID($villageid, $builds);	// Speichert alle Gebäudestufen 
															// in ein Array
	// Ein Array nun durchlaufen lassen und die Punkte berechnen:
	$points = 0;
	foreach($row AS $building=>$stage) {
		$points += $cl_builds->get_points($building,$stage);
	}
	
	// Die neuen Punkte in die Datenbank schreiben:
	mysql_query("UPDATE villages SET points='$points' where id='$villageid'");
	
}
    /**
     * Creates a new Village
     * @param int $userid Id of User
     * @param string $username Name of User
     * @param string $direction Direction("no","nw","sw","so","random")
     * @return unknown
     */
    function create_village($userid,$username='',$direction) {

	global $config;
	global $cl_units;
	
	// Werte aus DB auslesen:
	$result = mysql_query("SELECT * from create_village");
	$row = mysql_Fetch_array($result);
	
	// Wenn Random ist, dann wird die Richtung gewühlt, wo die wenigsten sind:
	if ($direction=="random") {
		$min = min($row['no'],$row['nw'],$row['sw'],$row['so']);
		// Nun schauen, welche Richtung den Wert $min hat:
   		switch($min) {
 			 case $row['no']:	$direction="no";	break;
 			 case $row['nw']:	$direction="nw";	break;
 			 case $row['so']:	$direction="so";	break;
 			 case $row['sw']:	$direction="sw";	break;
   		}
	}
	elseif($direction="random_left") {
	
		$dir = array("1"=>"no","2"=>"sw","3"=>"so","4"=>"nw");
		$rand = rand(1,4);
		$direction = $dir[$rand];
	}
	else
	{
		// Wert parsen
		$direction = parse( $direction );
	}

	$alpha = $row[$direction.'_alpha'];
	do {	
		mysql_query("UNLOCK TABLES");
		// Mal schauen, wie groß die größte "C" Seite des Dreieckes ist:
		$longest_c = max($row['no_c'],$row['nw_c'],$row['sw_c'],$row['so_c']);
		
		// Nun eine Zufallszahl generieren, wie lange die Seite "C" sein wird:
		$long2 = round(($longest_c - $row[$direction.'_c'])/2);
		$size_c = mt_rand($row[$direction.'_c'],$longest_c-$long2);
			$zufall = rand(130,250) / 100;
		// Nun noch Alpha Wert für Alpha ermitteln:
		$alpha = $alpha +((90/$row[$direction.'_c'])*$zufall);

		//Wenn Alpha größer als 90 Grad ist, Alpha wieder nach unten stellen
		if ($alpha>=90) {
			$row[$direction.'_alpha'] = rand(1,25);
			$do_alpha_to_null = true;
			$row[$direction.'_c'] += mt_rand(1,3);
			$alpha = $row[$direction.'_alpha'];
		}
		else
		{
			$do_alpha_to_null = false;
		}
		
		// Denn Bogengrad vom Alpha ausrechnen
		$bogen = ($alpha*2*pi())/360;
	
		// Koordinaten ausrechnen
		$x = round(sin($bogen) * $size_c);
		$y = round(cos($bogen) * $size_c);

		// Koordinaten nach der Himmelsrichtung richten.

		if ($direction=="nw") {
			$x = 500 - $x;
			$y = 500 + $y;
		}
		if ($direction=="no") {
			$x = 500 + $x;
			$y = 500 + $y;
		}
		if ($direction=="so") {
 			$x = 500 + $x;
			$y = 500 - $y;
 		}
		if ($direction=="sw") {
			$x = 500 - $x;
			$y = 500 - $y;
		}
      #COUNT(id) As count_village
		// Schauen, ob die Koordinaten noch nicht existieren
		mysql_query("LOCK TABLES villages read");
		$result = mysql_query("SELECT COUNT(id) AS count_village FROM villages WHERE x = $x AND y = $y");
		$row2 = mysql_Fetch_array($result);
		#$row2['count_village'] = (empty($row2['count_village'])) ? "0":$row2['count_village'];
		if (!$row2['count_village']) {
			mysql_query("UNLOCK TABLES");
		}
	} while($row2['count_village']=="1");
	// User & Dorf aktualisieren
	// Dorfname ermitteln
	if ($userid!="-1") {
    $lang = new aLang("functions", $config->get('lang'));
 		$villagename = parse(entparse($username)."s " . $lang->get("village"));
 	}
 	else
 	{
 		$villagename = urldecode($config->get('left_name'));
 	}	
 	$arr = Map::convert_to_continents($x,$y);
 	$unit = $cl_units->get_array("name");
	mysql_query("INSERT into villages (x,y,name,userid,continent,last_prod_aktu,create_time,conmap_con) VALUES ('$x','$y','$villagename','".$userid."','$arr[con]','".time()."','".time()."','".Map::get_conmap($arr[con],$x,$y)."')");
	$villageid = $this->db->GetLastId();
	
	// Dorf in die Tabelle "unit_place" eintragen
	mysql_query("INSERT into unit_place (villages_from_id,villages_to_id) VALUES ('$villageid','$villageid')");
	
	$this->reload_points($villageid);
	load_bh($villageid);
	
	// Wenn es ein Flüchtlingslager ist, gibs bei den Users nicht zu aktualisieren
	if ($userid!="-1") {
		mysql_query("UPDATE users SET villages=villages+'1' where id='".$userid."'");	
		$this->user->reload_points($userid);
		$this->user->reload_player_rangs();
	}
		
	$row[$direction.'_alpha'] = $alpha;
	if ($do_alpha_to_null)
		$row[$direction.'_alpha'] = 0;
	
	// Schauen, ob in der Config einstellt ist, ob Flüchtlingslager
	// erstellt werden sollen
	$add_sql = "";
	$create_lager=false;
	if ($config->get('count_create_left') > 0 && $userid!="-1") {
		if ($row['next_left']<=1) {
		$create_lager=true;
			$add_sql = ",next_left='".$config->get('count_create_left')."'";
		}
		else
		{
			$add_sql = ",next_left=next_left-1";
		}
 	}
 	
	// Datenbank UPDATE
	mysql_query("UPDATE create_village SET nw_c='".$row['nw_c']."',no_c='".$row['no_c']."',
					so_c='".$row['so_c']."',sw_c='".$row['sw_c']."',
					$direction=$direction+1,
					nw_alpha='".$row['nw_alpha']."',no_alpha='".$row['no_alpha']."',
					so_alpha='".$row['so_alpha']."',sw_alpha='".$row['sw_alpha']."'
					$add_sql");

	if ($create_lager) 
		$this->create_village("-1","","random_left");

	if ($userid!="-1") {
 		return $villageid;
 	}
}

    


}
?>