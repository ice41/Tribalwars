<?php
//Pamiêæ bazy:
define('db_dir','fdb');

class db {
	function db() {
		if (!is_dir('/'.db_dir)) {
			mkdir('/'.db_dir);
			}
		}
		
	function validate_encode($str) {
		$str = str_replace('','',$str);
		
		$from = array('/','\\','','','','','',',','');
		$to = array('Q','W','E','R','T','Y','U','I');
		
		$str = str_replace($from,$to,$str);
		return $str;
		}
		
	function validate_decode($str) {
		$from = array('/','\\','','','','','',',','');
		$to = array('Q','W','E','R','T','Y','U','I');
		
		$str = str_replace($to,$from,$str);
		return $str;
		}
		
		
	function create_db($dbname) {
		$dbname = $this->validate_encode($dbname);
		
		if (!file_exists('/'.db_dir.'/'.$dbname.'.txt')) {
			} else {
			echo "Istnieje juz baza o nazwie <b>$dbname</b>";
			}
		}
	}
?>