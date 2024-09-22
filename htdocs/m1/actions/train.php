<?
class train {
	var $units;
	var $Units;
	var $cl_units;
	var $db;
	var $recruited=array();
	function train(){
		global $cl_units,$db,$arr_farm;
		$this->cl_units=$cl_units;
		$this->db=$db;
		$this->units=$cl_units->get_array("dbname");      
	    $this->Units=$cl_units->get_array("name");
        $this->arr_farm=$arr_farm;
	}
     function do_action($cur_village,$mode="mass")
 	{
        $i=0;
	foreach($this->Units AS $key=>$value) {
         ++$i;
        $posted=($mode=="mass")?$_POST['units'][$cur_village][$key]:$_POST[$key];
			if (!empty($posted)) {
			
			    //Initial new Instance of VillageClass and grab infos :D
                $cur_vil_info = "SELECT * FROM `villages` WHERE `id`='".$cur_village."'";
                $cur_vil_info = $this->db->fetch($this->db->query($cur_vil_info));
                $cur_vil_info['farmLimits']=$this->arr_farm[$cur_vil_info['farm']]; 
				$this->cl_units->check_needed($key,$cur_vil_info);
                if(in_array("no_investigate",$this->cl_units->get_specials($key))) $check="no_investigate";
				$input = (int)$posted;
				// Checks
				$wood = $this->cl_units->get_woodprice($key)*$input;
				$stone = $this->cl_units->get_stoneprice($key)*$input;
				$iron = $this->cl_units->get_ironprice($key)*$input;
				$bh = $this->cl_units->get_bhprice($key)*$input;

				if ($wood>$cur_vil_info['r_wood'] OR $stone>$cur_vil_info['r_stone'] OR $iron>$cur_vil_info['r_iron']) {
				    $check = "to_many_units";
				}

				if(($cur_vil_info['farmLimits']-$cur_vil_info['r_bh']-$bh<0) && empty($check)) {
				    $check = "to_many_bh";
				}
				if (empty($check) && is_numeric($this->cl_units->last_error) && $input>0) {

					// Ress abziehen:
					$this->db->query("UPDATE villages SET r_wood=r_wood-'$wood',r_stone=r_stone-'$stone',r_iron=r_iron-'$iron',r_bh=r_bh+'$bh' where id='".$cur_vil_info['id']."'");

					$cur_vil_info['r_wood'] -= $wood;
					$cur_vil_info['r_stone'] -= $stone;
					$cur_vil_info['r_iron'] -= $iron;
					$cur_vil_info['r_bh'] += $bh;
				    // Nun kann die Einheit rekrutiert werden:
				    $buildname=$this->cl_units->recruit_in[$key];
				    $this->cl_units->recruit_units($key,$input,$buildname,$cur_vil_info[$buildname],$cur_vil_info['id']);
                      //Log it
                    $this->recruited[$cur_village][$key]=$input;
				    if($_GET['mode']!="mass") $reload=true;
				}
			}
		}
		if($reload) HEADER("LOCATION: game.php?village=".$cur_vil_info['id']."&screen=".$_GET['screen']."");
	if (empty($check))
			$check = $cl_units->last_error;

		switch($check) {
			case "not_tec":
				$error = "Unidade n&atilde;o pesquisada.";
			break;

			case "not_needed":
				$error = "Requerimentos n&atilde;o atingidos.";
			break;

			case "not_enough_ress":
				$error = "N&atilde;o h&aacute; recursos suficientes.";
			break;

			case "not_enough_bh":
				$error = "A fazenda n&atilde;o pode mais prover mais unidades.";
			break;

			case "to_many_units":
				$error = "N&atilde;o h&aacute; recursos suficientes.";
			break;

			case "to_many_bh":
				$error = "A fazenda n&atilde;o pode mais prover mais unidades.";
			break;
		}
		if($error) $GLOBALS['tpl']->assign("error",$error);
		return $recruited;
	}
	 function get_units_in_village($village){
		$sql="SELECT ";
		$i=0;
  		foreach ($this->Units as $key=>$value) {
			++$i;
			$sql.=(count($this->Units)==$i)?$key:$key.","; //Build SQL Key String
		}
	 $sql .= " from unit_place where villages_from_id='".$village['id']."' AND villages_to_id='".$village['id']."'";
	 $result = $this->db->query($sql);
	 return $this->db->Fetch($result);
	}
	 function get_all_units($village){
		$sql="SELECT "; $i=0; //Initial all
    	foreach ($this->Units as $key=>$value){
				if (in_array("no_investigate", $this->cl_units->get_specials($key))) { //Allowed?
 					//Disabled ; Not allowed to recruit :D   
            		unset($this->units[$value]);
            		unset($this->Units[$key]);
            		if(count($this->Units)==$i)  $sql=substr($sql,0,strlen($sql)-1); //Remove the not needed comma
				}
				else $sql.=(count($this->Units)==$i)?"all_$key,".$key."_tec_level":"all_$key,".$key."_tec_level,";
               ++$i;
	   }
	  $sql .= " from villages where id='".$village['id']."'";
	  $result = $this->db->query($sql);
	  return $this->db->Fetch($result);
	}
    function get_recruit($village){
   	$recruit_units=array(); //The queue
	// Read all Units
	$i=0;
	$result = $this->db->query("SELECT id,unit,num_unit,num_finished,time_finished,time_start from recruit where villageid='".$village['id']."' order by time_start");
	while($row=$this->db->Fetch($result)) {
		++$i;
        $recruit_units[$row['id']]['lit'] = ($i=="1")?true:false;
		$recruit_units[$row['id']]['unit'] = $row['unit'];
		$recruit_units[$row['id']]['num_unit'] = $row['num_unit'] - $row['num_finished'];
		$recruit_units[$row['id']]['unit'] = $row['unit'];
		$recruit_units[$row['id']]['time_finished'] = $row['time_finished'];
        $recruit_units[$row['id']]['countdown']=($i=="1")?($row['time_finished']-time()):($row['time_finished'] - $row['time_start']);
	  }
	 return $recruit_units;
   }
}  
if(!$this) die("Could't find smarty :( Error!");
$train=new train;
  //Smarty Loader... (***** allowed sites -.-)  (complicated...)
     $db=$GLOBALS['db'];
$village=$GLOBALS['village'];
     $cl_units=$GLOBALS['cl_units'];
     $this->assign("cl_units",$cl_units);
     $arr_farm=$GLOBALS['arr_farm'];
     $user=$GLOBALS['user'];
     $session=$GLOBALS['session'];
     $this->assign("arr_farm",$arr_farm);
  //END
if($village['barracks']<=0) exit;

  //Village + Unit (Information)
$units_in_village=$train->get_units_in_village($village);
$units_all=$train->get_all_units($village,$Units);
$village += $units_all;
foreach ($train->Units as $key=>$value) {
		$units_all[$key] = $units_all["all_".$key];
	}
   //TPL ASSIGNMENTS
$this->assign("units",$train->units);
$this->assign("village",$village);
$this->assign("cl_units",$cl_units);
$this->assign("units_in_village",$units_in_village);
$this->assign("units_all",$units_all);
$this->assign("image_base","../graphic");
$this->assign("get",$_GET);
    //MASSRECRUIT
    
if($_GET['screen']=="train"&&!isset($_GET['mode'])) //If recruit and no action is submitted
    {
	  $recruit_units=$train->get_recruit($village);
      $this->assign("recruit_units",$recruit_units);
    }
if($_GET['action']=="train"){
        //Single recruit in this village ($village)
		if ($session['hkey']!=$_GET['h']) $error = "HKEY!";   // HKEY checken
        $recruited=$train->do_action($village['id'],"single");
    }
    
    
if($_GET['mode']=="mass"){
	$villages=array();
	//Get a set of villages
    $query=$db->query("SELECT * FROM `villages` WHERE `userid`='".$village['userid']."' AND `barracks`>0");
	$current_amount=1;
    $i=0;
    $persite=$_GET['persite']>0?(int)$_GET['persite']:50;
    $_GET['site']=$_GET['site']>0?(int)$_GET['site']:1; 
	while($row=$db->fetch($query)) {
	  //if($persite>=$current_amount) $villages[]=(int)$row['id']; //Save to Array
      if($i>=(($persite*$_GET['site'])-50)){ //Startposition is PerSite*Site - 10 (without - => End Position)
        if($current_amount<=$persite) $villages[]=(int)$row['id'];
        ++$current_amount;
      }
	  ++$i;
	}
	$farmLimits = $arr_farm;
 // In Prod
    $in_prod=array();
    foreach($villages as $for_village){
            $query=$db->query("SELECT * FROM `recruit` WHERE `villageid`='".$for_village."'");
            while($row=$db->fetch($query)) { 
              $in_prod[$for_village][$row['unit']]=true;       //Deny overwrite
            } 
        }
 //Assign TPL
    $this->assign("get",$_GET); //Probably a change has been done...
    $this->assign("sites",ceil($i/$persite));
    $this->assign("persite",$persite); 
    $this->assign("in_prod",$in_prod);
	$this->assign("villages",$villages);
	$this->assign("farmLimits",$farmLimits);


 // Massenrekrutierungsrequest	
 
	if($_GET['mode']=="mass"&&$_GET['action']=="train_mass"&&$_POST)
	{
		//Massenrekrutierung kam rein
			$c = new do_action($user['id']); $c->close(); //Do Action Stuff	
		// Rohstoffe überprüfen
		    $check=""; 
	foreach($villages as $cur_village) {   //Current Village
		$train->do_action($cur_village);
	  }   
		$c->open();
	} //END IF; Massenrekrutieren
}

 // Abort Massrecruit

if (isset($_GET['action']) && $_GET['action']=="cancel" && isset($_GET['id'])) {
		if ($session['hkey']!=$_GET['h']) $error = "HKEY inv&aacute;lida!";  // Check the HKEY
		$g_id = parse( $_GET['id'] );
		$result = $db->query("SELECT unit,villageid,num_finished,num_unit from recruit where id='$g_id'");
		$row=$db->Fetch($result);

		// If the job belongs to the current village
		if ($row['villageid']!=$village['id']) $error="Auftrag bereits fertig gestellt.";

		// No Error => Delete it!
		if (empty($error)) {
			// Wait until the event is accessable because of the production of units
			while(true) {
				// Does the job exist?
				$result = $db->query("SELECT Count(id) AS count from events where event_type='recruit' AND event_id='$g_id'");
				$row = $db->Fetch($result);
				if ($row['count']!=1) {
					$error = "Auftrag bereits fertig gestellt."; 	// Job doesn't exist anymore
					break;
				}
				$result = $db->query("UPDATE events SET cid='1' where event_type='recruit' AND event_id='$g_id' AND cid=0");
				if ($db->affectedRows()==1) {
					// RE read , A change probably appeared...
					$result = $db->query("SELECT unit,villageid,num_finished,num_unit from recruit where id='$g_id'");
					$row=$db->Fetch($result);
					break;
				}
			}
			if (empty($error)) {
				// Event löschen:
				$db->query("DELETE from events where event_type='recruit' AND event_id='$g_id'"); //Delete from events
				$db->query("DELETE from recruit where id='$g_id'"); //Delete from recruit
				// Readd 90 percent of the Ressis
				$wood = round(($cl_units->get_woodprice($row['unit'])*($row['num_unit']-$row['num_finished']))*0.90);
				$stone = round(($cl_units->get_stoneprice($row['unit'])*($row['num_unit']-$row['num_finished']))*0.90);
				$iron = round(($cl_units->get_ironprice($row['unit'])*($row['num_unit']-$row['num_finished']))*0.90);
				$bh = $cl_units->get_bhprice($row['unit'])*($row['num_unit']-$row['num_finished']);
	
				// Reload buildtimes
				$old_time=time();
				$result = $db->query("SELECT id,time_start,time_finished,building from recruit where villageid='".$village['id']."' AND building='$buildname'");
				while($row=$db->Fetch($result)) {
					// Neue Bauzeit berechnen:
					if ($row['time_start']<time()) {
						// Der Auftrag ist bereits in Bau
						$old_time=$row['time_finished'];
		    		}else{
		    			// Der Auftrag muss einen neuen Startzeitpunkt bekommen
		    			$start_time = $old_time;
		    			$old_time = $old_time+($row['time_finished']-$row['time_start']);
		    			// Updates
		    			$db->query("UPDATE recruit SET time_finished='$old_time',time_start='$start_time' where id='".$row['id']."'");  //Recruit Update
		   				$db->query("UPDATE events SET event_time='$start_time' where event_id='".$row['id']."' AND event_type='recruit'"); 	// Event Updates
		   			}
				}
	            //Save all
				$db->query("UPDATE villages SET r_wood=r_wood+'$wood',r_stone=r_stone+'$stone',r_iron=r_iron+'$iron',r_bh=r_bh-'$bh' where id='".$village['id']."'");
				//$db->open();
				HEADER("LOCATION: game.php?village=".$village['id']."&screen=".$_GET['screen']."");
			}
		}
	}

$this->assign("recruited",$train->recruited);
$this->assign("hkey",$session['hkey']);
$this->assign("mode",$_GET['mode']);
$this->display("game_train.tpl");
?>