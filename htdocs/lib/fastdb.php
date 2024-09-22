<?php
class fastdb {

	var $db_dir = 'fdb';
	
	var $users_file = 'db_users.txt';
	var $dblist_file = 'db_list.txt';
	
	var $_fdb_users = null;
	var $_fdb_dblist = null;
	
	var $znaki = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','W','X','Y','Z','1','2','3','4','5','6','7','8','9','0');

	function write_db_interview() {
		if (!is_dir($this->db_dir)) {
			mkdir($this->db_dir);
			}
			
		if (!file_exists($this->db_dir.'/'.$this->users_file)) {
			$this->save($this->users_file,'');
			}
			
		if (!file_exists($this->db_dir.'/'.$this->dblist_file)) {
			$this->save($this->dblist_file,'');
			}
		}
		
	function reload_users_dbs() {
		$this->write_db_interview();
		
		$data['users'] = file_get_contents($this->db_dir.'/'.$this->users_file);
		$data['dblist'] = file_get_contents($this->db_dir.'/'.$this->dblist_file);
		
		$data['users'] = unserialize($data['users']);
		$data['dblist'] = unserialize($data['dblist']);
		
		if (!is_array($data['users'])) $data['users'] = array();
		if (!is_array($data['dblist'])) $data['dblist'] = array();
		
		$this->_fdb_users = $data['users'];
		$this->_fdb_dblist = $data['dblist'];
		}
		
	function del_emptys($arr) {
		foreach ($arr as $val) {
			if (!empty($val)) {
				$new_arr[] = $val;
				}
			}
		
		return $new_arr;
		}
		
	function data_validator($str) {
		$str = trim($str);
		$str = htmlspecialchars($str);
		$str = urlencode($str);
		
		return $str;
		}
		
	function data_recode($str) {
		$str = urldecode($str);
		
		return $str;
		}
		
	function create_user($uname,$upass) {
		$this->reload_users_dbs();
		
		$uname = $this->data_recode($uname);
		
		$err = '';
		
		if (!is_array($this->_fdb_users[$uname])) {
			if (strlen($uname) < 4) {
				$err = 'b³¹d funkcji create_user(), nazwa u¿ytkownika musi posiadaæ co najmniej 4 znaki';
				}
			if (strlen($upass) < 4) {
				$err = 'b³¹d funkcji create_user(), has³o musi posiadaæ co najmniej 4 znaki';
				}
				
			if (empty($err)) {
				$upass = md5($upass);
				$this->_fdb_users[$uname] = array('name' => $uname,'pass' => $upass);
				
				$this->save_users_file();
				}
			} else {
			$err = 'b³¹d funkcji create_user(), istnieje ju¿ u¿ytkownik o nazwie '.$uname;
			}
			
		if (!empty($err)) {
			$this->fatal_error($err,__FILE__,__LINE__);
			}
		}
		
	function warning($message,$file,$line) {
		//Zabespiecz wszystkie zmienne integralne
		$line = (int)$line;
		$line = floor($line);
		$message = "<br />\n<b>Ostrze¿nie</b>:  $message w <b>$file</b> na lini <b>$line</b><br />";
		echo $message;
		}
		
	function fatal_error($message,$file,$line) {
		//Zabespiecz wszystkie zmienne integralne
		$line = (int)$line;
		$line = floor($line);
		$message = "<br />\n<b>Fatalny b³¹d</b>:  $message w <b>$file</b> na lini <b>$line</b><br />";
		die($message);
		}
		
	function save_users_file() {
		if (!is_array($this->_fdb_users) && !empty($this->_fdb_users)) {
			$str = serialize($this->_fdb_users);
			
			$this->save($this->users_file,$str);
			}
		}
		
	function wytnij($str,$do) {
		//Zabespiecz wszystkie zmienne integralne
		$do = (int)$do;
		$do = floor($do);
		
		//Wytnij
		$str = substr($str,0,$do);
		return $str;
		}
		
	function save($file,$content) {
		$this->write_db_interview();
		
		$p = fopen($this->db_dir.'/'.$file,'w');
		fputs($p,$content);
		fclose($p);
		}
		
	function generuj_klucz($dlugosc) {
		$dlugosc = (int)$dlugosc;
		$dlugosc = floor($dlugosc);
		if ($dlugosc > 10000) {
			$dlugosc = 10000;
			}
		$max_rand = count($this->znaki) - 1;
		for ($i = 1; $i <= $dlugosc; $i++) {
			$str .= $this->znaki[mt_rand(0,$max_rand)];
			}
		return $str;
		}
	}
?>