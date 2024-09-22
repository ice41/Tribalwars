<?
if(basename($_SERVER["REQUEST_URI"]) === basename(__FILE__)){
	exit();
}

class funcoes extends conexao{
	function EscapeString($string){
		return mysql_real_escape_string(stripslashes(trim(htmlspecialchars($string))));
	}
	function EscapeStringHK($string){
		return mysql_real_escape_string(stripslashes(trim($string)));
	}
	function Pass($passwd){
		$e = md5(crc32(md5($passwd)));
		return $e;
	}
	function Cod($size){
		$caractere = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUWXYZ";
		for($pas=0;$pas<$size;$pas++){
			$e .= $caractere[mt_rand(0,strlen($caractere)-1)];
		}
		return $e;
	}
	function FormatNumber($num){
		$e = number_format($num, 0, '', '.');
		return $e;
	}
	function FormatTime($sec, $useColon = false){
		$hms = "";
 		$hours = intval(intval($sec)/3600); 
 		if($hours > 0){
			$hms .= ($useColon) 
		      ? str_pad($hours, 2, "0", STR_PAD_LEFT). ':'
		      : $hours. 'hrs ';
		}elseif ($useColon){
			$hms .= '00:';	
		}
		$minutes = intval(($sec/60)%60); 
		if($minutes > 0)
			$hms .= ($useColon) 
		      ? str_pad($minutes, 2, "0", STR_PAD_LEFT). ':'
		      : $minutes. 'min e ';
 		$seconds = intval($sec % 60); 
		$hms .= ($useColon) 
	      ? str_pad($seconds, 2, "0", STR_PAD_LEFT)
	      : $seconds. 'seg';
		return $hms;
	}
	function Recorde(){
		$time = time()-300;
		$online = $this->num($this->query("SELECT * FROM `users` WHERE `last_activity` >= '".$time."'"));
		$recorde[0] = fopen('inc/logs/recorde.log', 'a+');
		$archive = fread($recorde[0], 10000);
		$ex = explode("|", $archive);
		if($online > $ex[0]){
			$recorde[1] = fopen('inc/logs/recorde.log', 'w');
			fwrite($recorde[1], $online."|".time());
			fclose($recorde[1]);
		}
		return $ex[0]."|".$ex[1];
	}
	function WriteLog($arquivo, $msg){
		$fp = fopen('inc/logs/'.$arquivo, 'a');
		fwrite($fp, "==============================================================================\r\n{$msg}\r\n==============================================================================\r\n\r\n");
		fclose($fp);
	}
	function UserRank($uid = ''){
		$user = $this->fet_array($this->query("SELECT * FROM `users` WHERE `username` = '".$uid."' LIMIT 1"));
		return $user['rank'];
	}
	function AcessPainel($username){
		$check = $this->num($this->query("SELECT * FROM `admin` WHERE `username` = '".$this->EscapeString($username)."' LIMIT 1"));
		if($check){
			return true;
		}else{
			return false;
		}
	}
	function UserInfo($userid, $row){
		$info = $this->fet_array($this->query("SELECT $row FROM `users` WHERE `id` = '".$userid."'"));
		return $info[$row];
	}
	function UserNameInfo($username, $row){
		$info = $this->fet_array($this->query("SELECT $row FROM `users` WHERE `username` = '".$username."'"));
		return $info[$row];
	}
	function AllyInfoSum($ally, $row, $world){
		$info = mysql_fetch_row($this->query("SELECT SUM(".$row.") FROM `$world`.`users` WHERE `ally` = '".$ally."'"));
		return $info[0];
	}
	function TitleName($points){
		$sql = $this->fet_array($this->query("SELECT * FROM `users_titles` WHERE `exp_min` <= '".$points."' AND `exp_max` >= '".$points."'"));
		return $sql['title'];
	}
	function AllyName($ally, $world){
		if($ally == '-1'){
			return '---';
		}else{
			$sql = $this->fet_array($this->query("SELECT * FROM `$world`.`ally` WHERE `id` = '".$ally."'"));
			return $sql['short'];
		}
	}
}
?>