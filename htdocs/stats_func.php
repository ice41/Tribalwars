<?php 
//Share Stats Version
$version=1;

//Table Text
$lang_table=array("Server Name","Os System","Os Version","Php Version","Free Hdd Space","Total Hdd Space","Zend Version","Cpu Load","Uptime","Gameplay Speed","Movement Speed","Moral");

//Loading Ds-Lan Variables
require("include/config.php");

class stats{
	function getStat($_statPath){
            if(trim($_statPath) == ''){$_statPath = '/proc/stat';}
			ob_start();
            passthru('cat '.$_statPath);
            $stat= ob_get_contents();
            ob_end_clean();

            if (substr($stat, 0, 3) == 'cpu'){
                $parts = explode(" ", preg_replace("!cpu +!", "", $stat));
            }else{
                return false;
            }
			$return = array();
            $return['user'] = $parts[0];
            $return['nice'] = $parts[1];
            $return['system'] = $parts[2];
            $return['idle'] = $parts[3];
            return $return;
        }
	function getCpuUsage($_statPath = '/proc/stat'){
        $time1=$this->getStat($_statPath) or die("getCpuUsage(): couldn't access STAT path or STAT file invalid\n");
        sleep(1);
        $time2=$this->getStat($_statPath) or die("getCpuUsage(): couldn't access STAT path or STAT file invalid\n");

        $delta = array();

        foreach ($time1 as $k => $v){
            $delta[$k]=$time2[$k]-$v;
        }
		$deltaTotal=array_sum($delta);
        $percentages=array();

        foreach($delta as $k => $v){
            $percentages[$k] = round($v / $deltaTotal * 100, 2);
        }
        
		return $percentages;
    }
	function size_convert($filesize){
	$decr = 1024; $step = 0;
    $prefix = array('Bytes','KB','MB','GB','TB','PB');
		while(($filesize / $decr) > 0.9){
			$filesize = $filesize / $decr;
			$step++;
		}
    return round($filesize,2).' '.$prefix[$step];
	}
	function uptime_init() {
	global $_uptime;
	 $fp = fopen("/proc/uptime","r");
	 if(!$fp){echo("Unable to open /proc/uptime");return FALSE;}
	 $text = fgets($fp,100);
	 fclose($fp);
	 $uptime = substr($text,0,strpos($text," "));
	 $_uptime["days"] = floor($uptime / 86400);
	 $_uptime["hours"] = floor(($uptime - ($_uptime["days"] * 86400)) / 3600);
	 $_uptime["mins"] = floor(($uptime - ($_uptime["days"] * 86400) - ($_uptime["hours"] * 3600)) / 60);
	 $_uptime["secs"] = floor($uptime - ($_uptime["mins"] * 60) - ($_uptime["days"] * 86400) - ($_uptime["hours"] * 3600));
	 return TRUE;
	}

	function uptime($string) {
	 global $_uptime;
	 if(!empty($GLOBALS["uptime"])) $string = uptime;
	 if(!is_array($_uptime)) {
	  if(!$this->uptime_init()) { return FALSE; }
	 }
	 return(
	  str_replace("%days",$_uptime["days"],
	   str_replace("%hours",$_uptime["hours"],
		str_replace("%mins",$_uptime["mins"],
		 str_replace("%secs",$_uptime["secs"],$string)
		)
	   )
	  )
	 );
	}
	function port_active($port){
		curl_setopt ($ch, CURLOPT_URL,"localhost");
		curl_setopt ($ch, CURLOPT_PORT,$port);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10);
		$data=curl_exec($ch);
		curl_close($ch); 
		if($data)
			return true;
		else 
			return false;
	}
	function data_cpu(){
			$cpu =$this->getCpuUsage();
			$cpuload = 100 - $cpu['idle'];
			return $cpuload;
	}
	function is_linux(){
	if(preg_match("#Linux#",php_uname("s"))){return true;}
	else{return false;}
	}
	
	function ini(){
		//initialize
		global $config;
		$d=array();
		$d[]=$_SERVER['SERVER_NAME'];
		$d[]=php_uname("s");
		$d[]=php_uname("v");
		$d[]=phpversion();
		$d[]=$this->size_convert(disk_free_space("./"));
		$d[]=$this->size_convert(disk_total_space("./"));
		$d[]=zend_version();
		if($this->is_linux()){
			$d[]=$this->data_cpu();
			$d[]=$this->uptime("%days days, %hours hours, %mins minutes");
		}else{
			$d[]="No cpu data";
			$d[]="No uptime data available";
		}
		$d[]=$config["speed"];
		$d[]=$config["movement_speed"];
		$d[]=$config["moral_activ"];
		
		return $d;
	}

	function stats_table(){
	global $lang_table,$version;
	$ini=$this->ini();
	
	$v="<h1>Share Stats <em>v{$version}</em></h1><table id='stats'>";
		for($i=0;$i<count($ini);$i++){
			$v.="<tr><td>{$lang_table[$i]}</td><td>{$ini[$i]}</td></tr>";
		}
	$v.="</table>";
	return $v;
	}
}
?>