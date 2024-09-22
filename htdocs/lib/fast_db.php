<?php
class fast_database {

	var $db_dir_name = 'fdb';
	var $db_dir = 'fdb/';
	
	var $users_file = 'db_users.txt';
	var $dblist_file = 'db_list.txt';
	var $db_encoding = 'db_list.txt';
	
	var $_fdb_users = null;
	var $_fdb_dblist = null;
	
	var $_cid = null;
	var $_aktuuser = null;
	var $_aktudb = null;
	
	var $znaki = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','W','X','Y','Z','1','2','3','4','5','6','7','8','9','0');

	function write_db_interview() {
		if (!is_dir($this->db_dir_name)) {
			mkdir($this->db_dir_name);
			}
			
		if (!file_exists($this->db_dir.$this->users_file)) {
			$this->save($this->users_file,'');
			}
			
		if (!file_exists($this->db_dir.$this->dblist_file)) {
			$this->save($this->dblist_file,'');
			}
		}
		
	function reload_users_dbs() {
		$this->write_db_interview();
		
		$data['users'] = file_get_contents($this->db_dir.$this->users_file);
		$data['dblist'] = file_get_contents($this->db_dir.$this->dblist_file);
		
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
		$str = str_replace(' ','_',$str);
		$str = preg_replace('/[^A-Za-z0-9_]/','',$str);
		return $str;
		}
		
	function get_data($str) {
		$str = str_replace('_',' ',$str);
		return $str;
		}
		
	function create_user($uname,$upass) {
		$this->reload_users_dbs();
		
		$uname = $this->wytnij($this->data_recode($uname),100);
		
		$err = '';
		
		if (!is_array($this->_fdb_users[$uname])) {
			if (strlen($uname) < 4) {
				$err = 'será a função de create_user (), o nome do usuário deve ter pelo menos 4 caracteres';
				}
			if (strlen($upass) < 4) {
				$err = 'será a função de create_user (), o tem �o deve ter pelo menos 4 caracteres';
				}
				
			if (empty($err)) {
				$upass = md5($upass);
				$this->_fdb_users[$uname] = array('name' => $uname,'pass' => $upass,'cid' => '');
				
				$this->save_users_file();
				}
			} else {
			$err = 'será a função de create_user (), já existe um usuário chamado "'.$uname.'"';
			}
			
		if (!empty($err)) {
			$this->fatal_error($err,__FILE__,__LINE__);
			}
		}
		
	function warning($message,$file,$line) {
		//Zabespiecz wszystkie zmienne integralne
		$line = (int)$line;
		$line = floor($line);
		$message = "<br />\n<b>Aviso</b>:  $message dentro <b>$file</b> na linha <b>$line</b><br />";
		echo $message;
		}
		
	function fatal_error($message,$file,$line) {
		//Zabespiecz wszystkie zmienne integralne
		$line = (int)$line;
		$line = floor($line);
		$message = "<br />\n<b>Fatalny b��d</b>:  $message w <b>$file</b> na lini <b>$line</b><br />";
		die($message);
		}
		
	function save_users_file() {
		$str = serialize($this->_fdb_users);	
		$this->save($this->users_file,$str);
		}
		
	function save_dbs_file() {
		$str = serialize($this->_fdb_dblist);	
		$this->save($this->dblist_file,$str);
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
		if (is_dir($this->db_dir_name)) {
			$p = fopen($this->db_dir.$file,'w');
			fputs($p,$content);
			fclose($p);
			}
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
		
	function connect($user,$pass,$db) {
		$this->reload_users_dbs();
		
		$user = $this->wytnij($this->data_recode($user),100);
		
		if (is_array($this->_fdb_users[$user])) {
			$pass = md5($pass);
			
			if ($this->_fdb_users[$user]['pass'] === $pass) {
				if (in_array($db,$this->_fdb_dblist)) {
					//Wygeneruj klucz zabespieczaj�cy baz�:
					$CONNECT_ID = $this->generuj_klucz(32);
					
					//Dodaj klucz do u�ytkownika:
					$this->_fdb_users[$user]['cid'] = $CONNECT_ID;
					
					//Zapisz po��czenie do obiektu:
					$this->_cid = $CONNECT_ID;
					$this->_aktuuser = $user;
					$this->_aktudb = $db;
					
					//Nadpisz plik u�ytkownik�w:
					$this->save_users_file();
					} else {
					$err = 'b��d funkcji connect(), brak bazy danych o nazwie "'.$db.'"';
					}
				} else {
				$err = 'b��d funkcji connect(), Senha incorreta';
				}
			} else {
			$err = 'b��d funkcji connect(), nie istnieje u�ytkownik o nazwie "'.$user.'"';
			}
			
		if (!empty($err)) {
			$this->fatal_error($err,__FILE__,__LINE__);
			}
			
		if (isset($CONNECT_ID)) {
			$return = $CONNECT_ID;
			} else {
			$return = false;
			}
			
		return $return;
		}
		
	function disconnect () {
		$this->_cid = null;
		$this->_aktuuser = null;
		$this->_aktudb = null;
		}
		
	function is_connected() {
		if (!empty($this->_aktuuser) && !empty($this->_cid) && $this->_fdb_users[$this->_aktuuser]['cid'] === $this->_cid) {
			$is_connected = true;
			} else {
			$is_connected = false;
			}
			
		return $is_connected;
		}
		
	function clear_all() {
		$this->reload_users_dbs();
		
		$this->save($this->users_file,'');
		$this->save($this->dblist_file,'');
		
		foreach ($this->_fdb_dblist as $dbname) {
			if (!empty($dbname)) @unlink($this->db_dir.'dtb_'.$dbname.'.txt');
			}
		}
		
	function clear_db($dbname) {
		if (file_exists($this->db_dir.'dtb_'.$dbname.'.txt')) {
			$this->save('dtb_'.$dbname.'.txt','');
			} else {
			$this->fatal_error('b��d funkcji fast_database::clear_db() - brak bazy.',__FILE__,__LINE__);
			}
		}
		
	function create_db($dbname) {
		$this->reload_users_dbs();
		
		$dbname = $this->wytnij($this->data_recode($dbname),100);
		
		if (strlen($dbname) > 3) {
			if (!in_array($dbname,$this->_fdb_dblist)) {
				$this->_fdb_dblist[] = $dbname;
				$this->save_dbs_file();
			
				$this->save("dtb_".$dbname.".txt",'');
				} else {
				$this->fatal_error('b��d funkcji fast_database::create_db() - istnieje ju� baza o nazwie "'.$dbname.'".',__FILE__,__LINE__);
				}
			} else {
			$this->fatal_error("b��d funkcji fast_database::create_db() - nazwa bazy musi sk�ada� si� co najmniej z 4 znak�w.",__FILE__,__LINE__);
			}
		}
		
	function db_exists($dbname) {
		$this->reload_users_dbs();
		$dbname = $this->wytnij($this->data_recode($dbname),100);
		
		if (in_array($dbname,$this->_fdb_dblist)) {
			$return = true;
			} else {
			$return = false;
			}
		}
	}
?>