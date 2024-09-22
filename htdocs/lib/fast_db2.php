<?php
/*****************************************/
/*=======================================*/
/*     PLIK: index.php   		 		 */
/*     DATA: 02.01.2012r        		 */
/*     ROLA: Baza danych      			 */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

class fast_database {
	//Zmienne globalne wewnêtrzne - nie zmieniaæ!
	var $_FDB_USERS = array();
	var $_FDB_USER_PASSES = array();
	var $_FDB_DATABASES = array();
	var $_FDB_AKTU_DB_VIEV = array();
	var $_FDB_KEY_EXISTS = false;
	var $_FDB_KEY_VALUE = null;
	var $_FDB_AKTU_DB_TABLES = null;
	var $_FDB_VARS = null;
	var $_FDB_CHANGES = 0;
	
	
	/*--------------------------------------------------------*/
	
	
	/***
	 ** Ustawienia fast-bazy:
	 **/
	 
	/**
	 * Œcie¿ka do katalogu bazy danych:
	 */
	 
	var $_FDB_DIR = 'fdb';
	
	
	/**
	 * Nazwa pliku, gdzie maj¹ byæ zapisywani u¿ytkowanicy bazy:
	 */
	 
	var $_FDB_USERS_FILE = 'dbusers.txt';
	
	
	/**
	 * Nazwa pliku, gdzie ma byæ zapisana lista baz danych:
	 */
	 
	var $_FDB_DBLIST_FILE = 'dblist.txt';
	
	
	/**
	 * Nazwa pliku, gdzie ma byæ zapisany styl kodowania bazy:
	 */
	 
	var $_FDB_ENCODING_FILE = 'dbencoding.txt';
	
	
	/**
	 * Szyfrowanie danych "true" => "tak" , "false" => "nie":
	 */
	 
	var $_SZYFROWANIE_DANYCH = true;
	
	
	/**
	 * Maksymala liczba komurek na jedn¹ tabelê:
	 */
	 
	var $_FDB_MAX_CELLS_ON_TABLE = 10000;
	
	
	/**
	 * Ogólne has³o dostêpu do wszystkich baz (ustawiaj¹c '' nie ma has³a):
	 */
	 
	var $_DB_PASS = 'db_master_admin';
	
	
	/*--------------------------------------------------------*/
	
	
	//Sta³e (CONST)
	var $_FILE_SEPERATOR = '/';
	
	
	/*--------------------------------------------------------*/
	
	
	//Wyra¿enia regularne
	var $_PREG_NEW_TABLE = '~((CREATE|create)( )(TABLE |table )(.*?)([(])(.*?)([)]))~s';
	var $_PREG_EDIT_TABLE = '~((EDIT |edit )(.*?)( ADD | add )(.*?)([(])(.*?)([)]))~s';
	var $_PREG_INSERT = '~((INSERT |insert )(INTO |into )(.*?)([(])(.*?)([)])( |)(VALUE|VALUES|value|values)( |)([(])(.*?)([)]))~s';
	var $_PREG_DELETE = '~((DELETE |delete |DEL |del )(FROM |from )([(])(.*?)([)]))~s';
	var $_PREG_DELETE_WHERE = '~((DELETE |delete |DEL |del )(FROM |from )(.*?)( |)(WHERE |where )([(])(.*?)([)]))~s';
	var $_PREG_TURNCATE = '~((TURNCATE |turncate |TC |tc )(TABLES |tables |TABLE |table )([(])(.*?)([)]))~s';
	var $_PREG_SELECT_ALL = '~(?:SELECT|select)(?: |)(?:[*])(?: |)(?:FROM |from )(?:[(])(.*?)(?:[)])~s';
	var $_PREG_SELECT = '~(?:SELECT |select )(.*?)(?: FROM | from )(?:[(])(.*?)(?:[)])~s';
	var $_PREG_UPDATE = '~(?:UPDATE |update )(.*?)(?: SET | set )(?:[(])(.*?)(?:[)])(?: WHERE | where )(?:[(])(.*?)(?:[)])~s';
	var $_PREG_UPDATE_NORMAL = "~(?:[`])(.*?)(?:[`])(?: = |=| =|= )(?:['])(.*?)(?:['])~s";
	var $_PREG_UPDATE_DIFF = "~(?:[`])(.*?)(?:[`])(?: = |=| =|= )(?:[`])(.*?)(?:[`])(?: |)([+]|[-]|[*]|[//])(?: |)(?:['])(.*?)(?:['])~s";
	var $_PREG_ALTER_TABLE = "~(?:ALTER TABLE|alter table|ALTER table|alter TABLE)(?: |)(.*?)(?: |)(?:change |CHANGE )(?: |)(.*?)(?:[(])(.*?)(?:[)])~s";
	
	var $_PREG_DELETE_WARUNEK_ROWNE = "~([`|])(.*?)([`|])( |)([=][=])( |)(['|])(.*?)(['|])~s";
	var $_PREG_DELETE_WARUNEK_NIEROWNE = "~([`|])(.*?)([`|])( |)([!][=])( |)(['|])(.*?)(['|])~s";
	var $_PREG_DELETE_WARUNEK_WIEKSZE = "~([`|])(.*?)([`|])( |)([>])( |)(['|])(.*?)(['|])~s";
	var $_PREG_DELETE_WARUNEK_MNIEJSZE = "~([`|])(.*?)([`|])( |)([<])( |)(['|])(.*?)(['|])~s";
	var $_PREG_DELETE_WARUNEK_WIEKSZEROWNE = "~([`|])(.*?)([`|])( |)([>][=])( |)(['|])(.*?)(['|])~s";
	var $_PREG_DELETE_WARUNEK_MNIEJSZEROWNE = "~([`|])(.*?)([`|])( |)([<][=])( |)(['|])(.*?)(['|])~s";
	
	var $_SELECT_TAGS_WHERE = '~(?: |)(?:where|WHERE)(?: |)(?:[(])(.*?)(?:[)])~s';
	var $_SELECT_TAGS_ORDER = '~(?: |)(?:ORDER BY|order by)(?: |)(?:[(])(.*?)(?:[)])(?:| )(DESC|ASC)~s';
	var $_SELECT_TAGS_LIMIT = '~(?: |)(?:LIMIT|limit)(?: |)(?:[(])(.*?)(?:[)])~s';
	
	
	/*--------------------------------------------------------*/
	
	
	//Tablice
	var $_OPERATORY = array('==','!=','>','<','>=','<=');
	var $znaki = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','W','X','Y','Z','1','2','3','4','5','6','7','8','9','0');
	
	
	/*--------------------------------------------------------*/
	
	
	//Funkcja create_fdb_files() - tworzy pliki potrzebne do funkcjonowania bazy:
	function create_fdb_files() {
		if (!is_dir($this->_FDB_DIR)) {
			mkdir($this->_FDB_DIR);
			$this->save($this->_FDB_USERS_FILE,'');
			$this->save($this->_FDB_DBLIST_FILE,'');
			if ($this->_SZYFROWANIE_DANYCH) {
				$encoding_content = 'true';
				}
			if (!$this->_SZYFROWANIE_DANYCH) {
				$encoding_content = 'false';
				}
			$this->save($this->_FDB_ENCODING_FILE,$encoding_content);
			} else {
			$this->warning('b³¹d funkcji create_fdb_files(), istnieje ju¿ katalog "'.$this->_FDB_DIR.'"',__FILE__,__LINE__);
			}
		}
	//koniec create_fdb_files()
	
	//Funkcja warning([,$string]|[,$string][,$int()]) - zwraca ostrze¿enie:
	function warning($message,$file,$line) {
		//Zabespiecz wszystkie zmienne integralne
		$line = (int)$line;
		$line = floor($line);
		$message = "<br />\n<b>Ostrze¿nie</b>:  $message w <b>$file</b> na lini <b>$line</b><br />";
		echo $message;
		}
	//koniec funkcji warning()
	
	//Funkcja fatal_error([,$string]|[,$string][,$int()]) - zwraca fatalny b³¹d i zatrzymuje praser:
	function fatal_error($message,$file,$line) {
		//Zabespiecz wszystkie zmienne integralne
		$line = (int)$line;
		$line = floor($line);
		$message = "<br />\n<b>Fatalny b³¹d</b>:  $message w <b>$file</b> na lini <b>$line</b><br />";
		die($message);
		}
	//koniec funkcji fatal_error()
	
	//Funkcja if_is_db_files() - sprawdza czy istniej¹ wszystkie pliki:
	function if_is_db_files() {
		if (!is_dir($this->_FDB_DIR)) {
			$this->fatal_error('b³¹d klasy fast_database(), brak katalogu pamiêci '.$this->_FDB_DIR,__FILE__,__LINE__);
			} else {
			if (!file_exists($this->_FDB_DIR.$this->_FILE_SEPERATOR.$this->_FDB_USERS_FILE)) {
				$this->fatal_error('b³¹d klasy fast_database(), brak pliku u¿ytkówników '.$this->_FDB_USERS_FILE,__FILE__,__LINE__);
				}
			if (!file_exists($this->_FDB_DIR.$this->_FILE_SEPERATOR.$this->_FDB_DBLIST_FILE)) {
				$this->fatal_error('b³¹d klasy fast_database(), brak pliku baz danych '.$this->_FDB_DBLIST_FILE,__FILE__,__LINE__);
				}
			if (!file_exists($this->_FDB_DIR.$this->_FILE_SEPERATOR.$this->_FDB_ENCODING_FILE)) {
				$this->fatal_error('b³¹d klasy fast_database(), brak pliku dekodowania danych '.$this->_FDB_ENCODING_FILE,__FILE__,__LINE__);
				}
			}
		}
	//koniec funkcji if_is_db_files()
	
	//Funkcja generate_random_key([,$int]) - generuje kod:
	function generate_random_key($dlugosc) {
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
	//koniec funkcji generate_random_key()
	
	//Funkcja fast_unicode([,$string]) - usuwa niektóre znaki:
	function fast_unicode($str) {
		$co = array('','','','','',';','`',"'",'"','(',')','!','$','#','%','&','*','<','>','?','/','=','-','+',':','|',',');
		$str = str_replace($co,'',$str);
		return $str;
		}
	//koniec funkcji fast_unicode()
	
	//Funkcja save([,$string]|[,$string]) - zapisuje w pliku:
	function save($file,$content) {
		if (is_dir($this->_FDB_DIR)) {
			$p = fopen($this->_FDB_DIR.$this->_FILE_SEPERATOR.$file,'w');
			fputs($p,$content);
			fclose($p);
			}
		}
	//koniec funkcji save()
	
	//Funkcja create_user([,$string(L50)]|[,$string(L50)]) - tworzy u¿ytkownika:
	function create_user($name,$pass) {
		//Zabespiecz wszystkie zmienne
		$name = $this->fast_unicode($this->wytnij($name,50));
		$pass = $this->fast_unicode($this->wytnij($pass,50));
		
		$this->if_is_db_files();
		
		if (strlen($name) < 4) {
			$this->fatal_error('b³¹d funkcji create_user(), nazwa u¿ytkownika musi posiadaæ co najmniej 4 znaki',__FILE__,__LINE__);
			}
		if (strlen($pass) < 4) {
			$this->fatal_error('b³¹d funkcji create_user(), has³o musi posiadaæ co najmniej 4 znaki',__FILE__,__LINE__);
			}
			
		$pass = md5($pass);
		
		$user_array = $this->load_db_users_file();
		
		if (in_array($name,$this->_FDB_USERS)) {
			$this->fatal_error('b³¹d funkcji create_user(), istnieje ju¿ u¿ytkownik o nazwie '.$name,__FILE__,__LINE__);
			} else {
			$add_content_users_list_file = $name.';'.$pass;
			$user_array[] = $add_content_users_list_file;
			$content_as_new_user = base64_encode(implode('',$user_array));
			$this->save($this->_FDB_USERS_FILE,$content_as_new_user);
			}
			
		return true;
		}
	//koniec funkcji create_user()
	
	//Funkcja load_db_users_file() - ³aduje listê u¿ytkowników:
	function load_db_users_file() {
		$this->if_is_db_files();
	
		$db_users_list = base64_decode(file_get_contents($this->_FDB_DIR.$this->_FILE_SEPERATOR.$this->_FDB_USERS_FILE));
		
		$user_array = explode('',$db_users_list);
		
		foreach ($user_array as $user_info) {
			$fdb_uinf = explode(';',$user_info);
			$this->_FDB_USERS[] = $fdb_uinf[0];
			$this->_FDB_USER_PASSES[$fdb_uinf[0]] = $fdb_uinf[1];
			}
			
		return $user_array;
		}
	//koniec load_db_users_file()
	
	//Funkcja fast_unicode([,$string]|[,$int(>0)]) - wycina czêœæ strignu:
	function wytnij($str,$do) {
		//Zabespiecz wszystkie zmienne integralne
		$do = (int)$do;
		$do = floor($do);
		
		//Wytnij
		$str = substr($str,0,$do);
		return $str;
		}
	//koniec funkcji wytnij()
	
	//Funkcja create_db([,$string(L50)]) - two¿y now¹ bazê:
	function create_db($name) {
		$this->if_is_db_files();
		$this->load_db_list();
		
		$name = $this->fast_unicode($this->wytnij($name,50));
		
		if (strlen($name) < 4) {
			$return = false;
			$this->warning('b³¹d funkcji create_db(), nazwa bazy musi posiadaæ co najmniej 4 znaki',__FILE__,__LINE__);
			} else {
			if (in_array($name,$this->_FDB_DATABASES)) {
				$return = false;
				$this->warning('b³¹d funkcji create_db(), istnieje ju¿ baza o takiej nazwie ('.$name.')',__FILE__,__LINE__);
				} else {
				$this->_FDB_DATABASES[] = $name;
				$db_str = base64_encode(implode(';',$this->_FDB_DATABASES));
				$this->save($this->_FDB_DBLIST_FILE,$db_str);
				$this->save('db_'.$name.'.txt','');
				$return = true;
				}
			}
			
		return $return;
		}
	//koniec funkcji create_db()
	
	//Funkcja load_db_list() - ³aduje listê wszystkich baz:
	function load_db_list() {
		$this->if_is_db_files();
		$db_list = base64_decode(file_get_contents($this->_FDB_DIR.$this->_FILE_SEPERATOR.$this->_FDB_DBLIST_FILE));
		
		$db_array = explode(';',$db_list);
		
		$this->_FDB_DATABASES = $db_array;
		}
	//koniec funkcji load_db_list()
	
	//Funkcja connect([,$string(L50)]|[,$string(L50)]|[,$string(L50)]) - ³¹czy z baz¹:
	function connect($user,$pass,$dbname) {
		$this->if_is_db_files();
		$this->load_db_users_file();
		$this->load_db_list();
		$pass = md5($pass);
		
		if (in_array($user,$this->_FDB_USERS)) {
			if ($this->_FDB_USER_PASSES[$user] == $pass) {
				if (in_array($dbname,$this->_FDB_DATABASES)) {
					$return = true;
					$this->_FDB_AKTU_DB_VIEV['__aktu_db'] = $dbname;
					$this->read_db();
					} else {
					$return = false;
					$this->warning('b³¹d funkcji connect(), nie istnieje baza o nazwie '.$dbname,__FILE__,__LINE__);
					}
				} else {
				$return = false;
				$this->warning('erro de função connect(), senha errada para usuário nomeado '.$user,__FILE__,__LINE__);
				}
			} else {
			$return = false;
			$this->warning('b³¹d funkcji connect(), nie u¿ytkownika o nazwie '.$user,__FILE__,__LINE__);
			}
		return $return;
		}
	//koniec funkcji connect()
	
	//Funkcja if_is_db() - sprawdza czy istnieje baza:
	function if_is_db() {
		if (!file_exists($this->_FDB_DIR.$this->_FILE_SEPERATOR.'db_'.$this->_FDB_AKTU_DB_VIEV['__aktu_db'].'.txt')) {
			$this->fatal_error('b³¹d klasy fast_database(), brak bazy danych ('.$this->_FDB_AKTU_DB_VIEV['__aktu_db'].')',__FILE__,__LINE__);
			}
		}
	//koniec funkcji if_is_db()
	
	//Funkcja create_table([,$string]) - generuje now¹ tabelê:
	function create_table($fdb_query) {
		$this->if_is_db_files();
		$this->if_is_db();
		
		$out_new = preg_match($this->_PREG_NEW_TABLE,$fdb_query,$effect_new);
		$out_edit = preg_match($this->_PREG_EDIT_TABLE,$fdb_query,$effect_edit);
		
		if ($out_new) {
			if (strlen($effect_new[5]) < 3) {
				$this->warning('b³¹d funkcji create_table(), nazwa tabeli musi sk³adaæ siê co najmniej z 3 znaków',__FILE__,__LINE__);
				} else {
				$effect_new[5] = $this->fast_unicode($this->wytnij($effect_new[5],50));
				
				if (!is_array($this->_FDB_AKTU_DB_TABLES[$effect_new[5]])) {
					$_TABLE_INDEXES_ARR = explode(',',$effect_new[7]);
				
					$indexes_values = array('int','var');
					$errors = 0;
					$_INDEX_ARRAY_OUT = array();
					
					foreach ($_TABLE_INDEXES_ARR  as $_INDEXES) {
						if (!empty($_INDEXES)) {
							$_INDEX = explode(';',$_INDEXES);
							$_INDEX[0] = $this->fast_unicode($this->wytnij($_INDEX[0],50));
							if (empty($_INDEX[0])) {
								$this->fatal_error('w funkcji create_table(), nazwa pierwszego pola nie mo¿e byæ pusta',__FILE__,__LINE__);
								}
								
							if (!is_array($_INDEX_ANTYX[$_INDEX[0]])) {
								if (!in_array($_INDEX[1],$indexes_values)) {
									$errors++;
									$error = 'B³¹d w indeksie - pomylono wartoœæ';
									} else {
									if ($errors < 1) {
										$_INDEX[2] = (int)$_INDEX[2];
										$_INDEX[2] = floor($_INDEX[2]);
										if ($_INDEX[2] < 1) {
											$_INDEX[2] = 1;
											}
										if ($_INDEX[2] > 100000) {
											$_INDEX[2] = 100000;
											}
										$_INDEX[3] = $this->fast_unicode($this->wytnij($_INDEX[3],100));
										$_INDEX_ARRAY_OUT[] = $_INDEX[0].''.$_INDEX[1].''.$_INDEX[2].''.$_INDEX[3];
										}
									}
								} else {
								$errors++;
								$error = 'B³¹d w indeksie - powtarzaj¹ce siê nazwy';
								}
							$_INDEX_ANTYX[$_INDEX[0]] = array();
							}
						}
						
					if ($errors < 1) {
						$_INDEX_STR = implode('',$_INDEX_ARRAY_OUT);
						$this->_FDB_AKTU_DB_TABLES[$effect_new[5]] = array('indexes' => $_INDEX_STR,'datas' => '','auto_increment' => '1');
						$this->_FDB_CHANGES++;
						} else {
						$this->warning("b³¹d funkcji create_table(), $error",__FILE__,__LINE__);
						}
					} else {
					$this->warning('b³¹d funkcji create_table(), istnieje ju¿ tabela o nazwie ('.$effect_new[5].')',__FILE__,__LINE__);
					}
				}
			} else {
			if ($out_edit) {
				$effect_edit[3] = $this->fast_unicode($this->wytnij($effect_edit[3],50));
				
				if (!is_array($this->_FDB_AKTU_DB_TABLES[$effect_edit[3]])) {
					$this->warning('b³¹d funkcji create_table(), docelowa tabela nie istnieje ('.$effect_edit[3].')',__FILE__,__LINE__);
					} else {
					$_TABLE_INDEXES_ARR = explode(',',$effect_edit[7]);
				
					$indexes_values = array('int','var');
					$errors = 0;
					$_INDEX_ARRAY_OUT = array();
					
					$_TABLE_ALL_INDEXES = $this->get_table_indexes($effect_edit[3]);
					
					foreach ($_TABLE_INDEXES_ARR  as $_INDEXES) {
						if (!empty($_INDEXES)) {
							$_INDEX = explode(';',$_INDEXES);
							$_INDEX[0] = $this->fast_unicode($this->wytnij($_INDEX[0],50));
							if (empty($_INDEX[0])) {
								$this->fatal_error('w funkcji create_table(), nazwa pierwszego pola nie mo¿e byæ pusta',__FILE__,__LINE__);
								}
							if (empty($_TABLE_ALL_INDEXES[$_INDEX[0]])) {
								if (!is_array($_INDEX_ANTYX[$_INDEX[0]])) {
									if (!in_array($_INDEX[1],$indexes_values)) {
										$errors++;
										$error = 'B³¹d w indeksie - pomylono wartoœæ';
										} else {
										if ($errors < 1) {
											$_INDEX[2] = (int)$_INDEX[2];
											$_INDEX[2] = floor($_INDEX[2]);
											if ($_INDEX[2] < 1) {
												$_INDEX[2] = 1;
												}
											if ($_INDEX[2] > 100000) {
												$_INDEX[2] = 100000;
												}
											$_INDEX[3] = $this->fast_unicode($this->wytnij($_INDEX[3],100));
											$_TABLE_ALL_INDEXES[] = $_INDEX[0].''.$_INDEX[1].''.$_INDEX[2].''.$_INDEX[3];
											$_PREG_QUERY .= ''.$_INDEX[3];
											}
										}
									} else {
									$errors++;
									$error = 'B³¹d w indeksie - powtarzaj¹ce siê nazwy';
									}
								$_INDEX_ANTYX[$_INDEX[0]] = array();
								} else {
								$errors++;
								$error = 'B³¹d w indeksie - powtarzaj¹ce siê nazwy';
								}
							}
						}
					
					if ($errors < 1) {
						$indexes_str = implode('',$_TABLE_ALL_INDEXES);
						$this->_FDB_AKTU_DB_TABLES[$effect_edit[3]]['indexes'] = $indexes_str;
						$_ARRAY_DATAS = explode('',$this->_FDB_AKTU_DB_TABLES[$effect_edit[3]]['datas']);
						foreach ($_ARRAY_DATAS as $DATAS) {
							if (!empty($DATAS)) {
								$_OUT_STR_TABLE_DATAS .= $DATAS.$_PREG_QUERY.'';
								}
							}
						$this->_FDB_AKTU_DB_TABLES[$effect_edit[3]]['datas'] = $_OUT_STR_TABLE_DATAS;
						$this->_FDB_CHANGES++;
						} else {
						$this->warning("b³¹d funkcji create_table(), $error",__FILE__,__LINE__);
						}
					}
				} else {
				$this->warning('b³¹d funkcji create_table(), b³êdna struktura zapytania do bazy',__FILE__,__LINE__);
				}
			}
		}
	//koniec funkcji create_table()
	
	//Funkcja read_db() - wczytuje tabele bazy:
	function read_db() {
		$this->if_is_db_files();
		$this->if_is_db();
		
		$_DB_CONTENTS = file_get_contents($this->_FDB_DIR.$this->_FILE_SEPERATOR.'db_'.$this->_FDB_AKTU_DB_VIEV['__aktu_db'].'.txt');
		
		//Jeœli w³¹czone jest szyfrowanie danych w bazie, to je rozszyfruj:
		$_SZYFROWANIE = file_get_contents($this->_FDB_DIR.$this->_FILE_SEPERATOR.$this->_FDB_ENCODING_FILE);
		if ($_SZYFROWANIE == 'true') {
			$_DB_CONTENTS = @gzuncompress(@base64_decode($_DB_CONTENTS));
			}
		
		//Utworzyæ tablicê (tabele) z ci¹gu znaków:
		$_TABLES = explode('',$_DB_CONTENTS);
		
		foreach ($_TABLES as $_TABLE) {
			if (!empty($_TABLE)) {
				$_TBL_INFO = explode('',$_TABLE);
				$this->_FDB_AKTU_DB_TABLES[$_TBL_INFO[0]] = array('indexes' => $_TBL_INFO[1],'datas' => $_TBL_INFO[2],'auto_increment' => $_TBL_INFO[3]);
				}
			}
			
		if (!is_array($this->_FDB_AKTU_DB_TABLES)) {
			$this->_FDB_AKTU_DB_TABLES = array();
			}
		}
	//koniec funkcji read_db()
	
	//Funkcja get_table_indexes([,$string(L50)]) - wyznacza wszystkie indeksy tabeli:
	function get_table_indexes($table_name) {
		$this->if_is_db_files();
		$this->if_is_db();
		
		$_TABLE_INDEXES_STR = $this->_FDB_AKTU_DB_TABLES[$table_name]['indexes'];
		
		$_TABLE_INDEXES_ARR = explode('',$_TABLE_INDEXES_STR);
		
		foreach($_TABLE_INDEXES_ARR as $_INDEXES) {
			if (!empty($_INDEXES)) {
				$index = explode('',$_INDEXES);
				$_ALL_INDEXES[$index[0]] = $_INDEXES;
				}
			}
			
		return $_ALL_INDEXES;
		}
	//koniec funkcji get_table_indexes()
	
	//Funkcja save_changes() - zapisuje zmiany:
	function save_changes() {
		$this->if_is_db_files();
		$this->if_is_db();
		
		if ($this->_FDB_CHANGES > 0) {
		
			$_TBL_STRINGS_ARR = array();
		
			foreach ($this->_FDB_AKTU_DB_TABLES as $_TABLENAME => $_TABLEARRAY) {
				$_TBL_STRINGS_ARR[] = $_TABLENAME.''.$_TABLEARRAY['indexes'].''.$_TABLEARRAY['datas'].''.$_TABLEARRAY['auto_increment'];
				}
			
			$_DB_FINAL_STR = implode('',$_TBL_STRINGS_ARR);
		
			//Jeœli w³¹czone jest szyfrowanie danych w bazie, to zaszyfruj:
			if ($this->_SZYFROWANIE_DANYCH) {
				$this->save($this->_FDB_ENCODING_FILE,'true');
				$_DB_FINAL_STR = @base64_encode(@gzcompress($_DB_FINAL_STR));
				} else {
				$this->save($this->_FDB_ENCODING_FILE,'false');
				}
		
			if (!empty($_DB_FINAL_STR)) {
				$this->save('db_'.$this->_FDB_AKTU_DB_VIEV['__aktu_db'].'.txt',$_DB_FINAL_STR);
				}
			}
		}
	//koniec funkcji save_changes()
	
	//Funkcja disconnect() - roz³¹cza bazê z u¿ytkownikiem:
	function disconnect() {
		$this->if_is_db_files();
		
		$this->_FDB_AKTU_DB_VIEV['__aktu_db'] = '';
		
		return true;
		}
	//koniec funkcji disconnect()
	
	//Funkcja insert() - dodaje rekordy i kolumny do tabeli:
	function insert($fdb_query) {
		$this->if_is_db_files();
		$this->if_is_db();
		
		$is_insert = preg_match($this->_PREG_INSERT,$fdb_query,$effect_insert);
		
		if ($is_insert) {
			$_TABLENAME = $this->fast_unicode($this->wytnij($effect_insert[4],50));
			
			if (!is_array($this->_FDB_AKTU_DB_TABLES[$_TABLENAME])) {
				$this->warning('b³¹d funkcji insert(), tabela o nazwie "'.$_TABLENAME.'" nie istnieje!',__FILE__,__LINE__);
				} else {
				if (substr_count($this->_FDB_AKTU_DB_TABLES[$_TABLENAME]['datas'],"") > $this->_FDB_MAX_CELLS_ON_TABLE) {
					$this->warning('b³¹d funkcji insert(), maksymalna liczba komurek w tabeli zosta³a przekroczona!',__FILE__,__LINE__);
					} else {
					$_COLUMNS_ARR = explode(',',$effect_insert[6]);
					$_CELLS_VALUES = explode(',',$effect_insert[12]);
				
					$_TABLE_ALL_INDEXES = $this->get_table_indexes($_TABLENAME);
				
					$errs = 0;
				
					foreach ($_COLUMNS_ARR as $key => $val) {
						if (empty($_TABLE_ALL_INDEXES[$val])) {
							$errs++;
							$this->warning('b³¹d funkcji insert(), indeks o nazwie "'.$val.'" nie istnieje w tabeli '.$_TABLENAME.'!',__FILE__,__LINE__);
							} else {
							$indexes = explode('',$_TABLE_ALL_INDEXES[$val]);
							if ($indexes[1] == 'int') {
								$_CELLS_VALUES[$val] = (int)$_CELLS_VALUES[$key];
								$_CELLS_VALUES[$val] = $this->fast_unicode($this->wytnij($_CELLS_VALUES[$val],$indexes[2]));
								}
							if ($indexes[1] == 'var') {
								$_CELLS_VALUES[$val] = $this->fast_unicode($this->wytnij($_CELLS_VALUES[$key],$indexes[2]));
								}
							}
						}
					
					if ($errs < 1) {
						$OUT_TABLE_VAL = array();
						foreach ($_TABLE_ALL_INDEXES as $_INDEXSTR) {
							$indexes = explode('',$_INDEXSTR);
							if (!in_array($indexes[0],$_COLUMNS_ARR)) {
								if ($indexes[0] == 'id') {
									$OUT_TABLE_VAL[] = $this->_FDB_AKTU_DB_TABLES[$_TABLENAME]['auto_increment'];
									$this->_FDB_AKTU_DB_TABLES[$_TABLENAME]['auto_increment']++;
									$this->_FDB_CHANGES++;
									} else {
									$OUT_TABLE_VAL[] = $indexes[3];
									}
								} else {
								$OUT_TABLE_VAL[] = $_CELLS_VALUES[$indexes[0]];
								}
							}
						
						$_INSERT_OUT_STR = implode('',$OUT_TABLE_VAL);
						$_INSERT_OUT_STR = $_INSERT_OUT_STR.'';
						$this->_FDB_AKTU_DB_TABLES[$_TABLENAME]['datas'] .= $_INSERT_OUT_STR;
						$this->_FDB_CHANGES++;
						}
					}
				}
			} else {
			$this->warning('b³¹d funkcji insert(), Ÿle zdefiniowane zapytanie do bazy! ',__FILE__,__LINE__);
			}
		}
	//koniec funkcji insert()
	
	//Funkcja delete() - usuwa rekordy i kolumny w tabeli:
	function delete($fdb_query) {
		$this->if_is_db_files();
		$this->if_is_db();
		
		$is_del = preg_match($this->_PREG_DELETE,$fdb_query,$effect_del);
		$is_del_where = preg_match($this->_PREG_DELETE_WHERE,$fdb_query,$effect_del_where);	
		
		if ($is_del) {
			$_TABLENAME = $this->fast_unicode($this->wytnij($effect_del[5],50));
			if (!is_array($this->_FDB_AKTU_DB_TABLES[$_TABLENAME])) {
				$this->warning('b³¹d funkcji delete(), tabela o nazwie "'.$_TABLENAME.'" nie istnieje!',__FILE__,__LINE__);
				} else {
				$this->_FDB_AKTU_DB_TABLES[$_TABLENAME]['datas'] = '';
				}
			} else {
			if ($is_del_where) {
				$_TABLENAME = $this->fast_unicode($this->wytnij($effect_del_where[4],50));
				if (!is_array($this->_FDB_AKTU_DB_TABLES[$_TABLENAME])) {
					$this->warning('b³¹d funkcji delete(), tabela o nazwie "'.$_TABLENAME.'" nie istnieje!',__FILE__,__LINE__);
					} else {
					$_WARUNKI_ARRAY = explode(',',$effect_del_where[8]);
					$_TABLE_ALL_INDEXES = $this->get_table_indexes($_TABLENAME);
					$errs = 0;
					$_WARUNKI_ARRAY_NEW = array();
					
					foreach ($_WARUNKI_ARRAY as $WARUNEK_STR) {
						$WARUNEK_ARR = explode(';',$WARUNEK_STR);
						
						if (!in_array($WARUNEK_ARR[1],$this->_OPERATORY)) {
							$errs++;
							$this->warning('b³¹d funkcji delete(), nie zdefiniowany operator w zapytaniu - ('.$WARUNEK_ARR[1].')! ',__FILE__,__LINE__);
							}
						
						if (empty($_TABLE_ALL_INDEXES[$WARUNEK_ARR[0]])) {
							$errs++;
							$this->warning('b³¹d funkcji delete(), brak indeksu w tabeli o nazwie - ('.$WARUNEK_ARR[0].')! ',__FILE__,__LINE__);
							}
							
						$_WARUNKI_ARRAY_NEW[] = $WARUNEK_ARR;
						}
						
					unset($_WARUNKI_ARRAY);
					
					if ($errs < 1) {
						$vars_arr = array();
						foreach ($_WARUNKI_ARRAY_NEW as $WARUNEK_ARR) {
							if (!is_numeric($WARUNEK_ARR[2])) {
								$WARUNEK_ARR[2] = "'".$WARUNEK_ARR[2]."'";
								}
							$vars_arr[] = '$_INFO_TABLE[$_INDEXES_ASID['."'".$WARUNEK_ARR[0]."'".']] '.$WARUNEK_ARR[1].' '.$WARUNEK_ARR[2];
							}
						$vars_str = implode(' && ',$vars_arr);
						
						unset($vars_arr);
						
						$enter = "\n";
						$file_content .= '<?php'.$enter;
						$file_content .= 'foreach ($_TABLE_DATAS_ARR as $_TABLE_CELL) {'.$enter;
						$file_content .= "\t".'if (!empty($_TABLE_CELL)) {'.$enter;
						$file_content .= "\t\t".'$_INFO_TABLE = explode("",$_TABLE_CELL);'.$enter;
						$file_content .= "\t\t".'if ('.$vars_str.') {'.$enter;
						$file_content .= "\t\t\t".'} else {'.$enter;
						$file_content .= "\t\t\t".'$_FINAL_TABLE_STR .= "".$_TABLE_CELL;'.$enter;
						$file_content .= "\t\t\t".'}'.$enter;
						$file_content .= "\t\t".'}'.$enter;
						$file_content .= "\t".'}'.$enter;
						$file_content .= "?>";
						
						$_IINFO = 0;
						
						foreach ($_TABLE_ALL_INDEXES as $_INAME => $_INDEX) {
							$_INDEXES_ASID[$_INAME] = $_IINFO;
							$_IINFO++;
							}
						
						$_TABLE_DATAS_ARR = explode('',$this->_FDB_AKTU_DB_TABLES[$_TABLENAME]['datas']);
						
						$_RAND_FILE_ID = mt_rand(1000,9999);
						
						$this->save('php_file_'.$_RAND_FILE_ID.'.php',$file_content);
						
						require($this->_FDB_DIR.$this->_FILE_SEPERATOR.'php_file_'.$_RAND_FILE_ID.'.php');
						$this->_FDB_AKTU_DB_TABLES[$_TABLENAME]['datas'] = $_FINAL_TABLE_STR;
						$this->_FDB_CHANGES++;
						
						unlink($this->_FDB_DIR.$this->_FILE_SEPERATOR.'php_file_'.$_RAND_FILE_ID.'.php');
						}
					}
				} else {
				$this->warning('b³¹d funkcji delete(), Ÿle zdefiniowane zapytanie do bazy! ',__FILE__,__LINE__);
				}
			}
		}
	//koniec funkcji delete()
	
	//Funkcja turncate() - usuwa rekordy i kolumny w tabeli:
	function turncate($fdb_query) {
		$this->if_is_db_files();
		$this->if_is_db();
		
		$is_turncate = preg_match($this->_PREG_TURNCATE,$fdb_query,$effect_turncate);
		
		if ($is_turncate) {
			$_TABLENAME = $this->fast_unicode($this->wytnij($effect_turncate[5],50));
			if (!is_array($this->_FDB_AKTU_DB_TABLES[$_TABLENAME])) {
				$this->warning('b³¹d funkcji turncate(), tabela o nazwie "'.$_TABLENAME.'" nie istnieje!',__FILE__,__LINE__);
				} else {
				$this->_FDB_AKTU_DB_TABLES[$_TABLENAME]['datas'] = '';
				$this->_FDB_AKTU_DB_TABLES[$_TABLENAME]['auto_increment'] = '1';
				$this->_FDB_CHANGES++;
				}
			} else {
			$this->warning('b³¹d funkcji turncate(), Ÿle zdefiniowane zapytanie do bazy! ',__FILE__,__LINE__);
			}
		}
	//koniec funkcji turncate()
	
	//Funkcja select() - pobiera wartoœci z tabeli:
	function select($fdb_query) {
		$this->if_is_db_files();
		$this->if_is_db();
		
		$is_select = preg_match($this->_PREG_SELECT,$fdb_query,$select_effect);
		
		if ($is_select) {
			$_TABLENAME = $this->fast_unicode($this->wytnij($select_effect[2],50));
			if (!is_array($this->_FDB_AKTU_DB_TABLES[$_TABLENAME])) {
				$this->warning('b³¹d funkcji select(), tabela o nazwie "'.$_TABLENAME.'" nie istnieje!',__FILE__,__LINE__);
				} else {
				$_TABLE_ALL_INDEXES = $this->get_table_indexes($_TABLENAME);
				
				if ($select_effect[1] === "*") {
					$out = $this->_compile_select_tags($fdb_query);
					
					if ($out['where_tag']['isset']) {
						$_WARUNKI_ARR_PHP = array();
						$out['where_tag']['warunki'] = explode(',',$out['where_tag']['warunki']);
						foreach ($out['where_tag']['warunki'] as $_STR_WARUNEK) {
							$_ARR_WARUNEK = explode(';',$_STR_WARUNEK);
							
							if (empty($_TABLE_ALL_INDEXES[$_ARR_WARUNEK[0]])) {
								$errs++;
								$this->warning('b³¹d funkcji select(), brak indeksu "'.$_ARR_WARUNEK[0].'" w tabeli '.$_TABLENAME.'! ',__FILE__,__LINE__);
								} else {
								if (!in_array($_ARR_WARUNEK[1],$this->_OPERATORY)) {
									$errs++;
									$this->warning('b³¹d funkcji select(), nie zdefiniowany operator "'.$_ARR_WARUNEK[1].'"! ',__FILE__,__LINE__);
									} else {
									if (!is_numeric($_ARR_WARUNEK[2])) {
										$_ARR_WARUNEK[2] = "'".'$_ARR_WARUNEK[2]'."'";
										}
									$_WARUNKI_ARR_PHP[] = '$_INFO_TABLE[$_INDEXES_ASID['."'".$_ARR_WARUNEK[0]."'".']] '.$_ARR_WARUNEK[1].' '.$_ARR_WARUNEK[2];
									}
								}
							}
							
						$WARUNKI_OUT_STR = implode(' && ',$_WARUNKI_ARR_PHP);
						}
						
						
					if ($out['limit_tag']['isset']) {
						if ($out['limit_tag']['is_normal']) {
							$_LIMIT_STR_FILE = 'if ($_LIMITER < '.$out['limit_tag']['limit'].') {';
							} else {
							$_MIN = $out['limit_tag']['od_strony'] * $out['limit_tag']['do'];
							$_MAX = $_MIN + $out['limit_tag']['do'];
							$_LIMIT_STR_FILE = 'if ($_LIMITER >= '.$_MIN.' && $_LIMITER < '.$_MAX.') {';
							}
						}
						
					if ($errs < 1) {
						$_IINFO = '0';
						foreach ($_TABLE_ALL_INDEXES as $_INAME => $_INDEX) {
							$_INDEXES_ASID[$_INAME] = $_IINFO;
							$_IINFO++;
							}
							
						$_IINFO = '0';
						foreach ($_TABLE_ALL_INDEXES as $_INAME => $_INDEX) {
							$_INDEXES_FORID[$_IINFO] = $_INAME;
							$_IINFO++;
							}
						
						$_IINFO = '0';
						$enter = "\n";
						$file_content .= '<?php'.$enter;
						$file_content .= '$_LIMITER = 0;'.$enter;
						$file_content .= '$_OUT_ARRAY_SELECT = array();'.$enter;
						$file_content .= 'foreach ($_TABLE_DATAS_ARR as $_TABLE_CELL) {'.$enter;
						$file_content .= "\t".'if (!empty($_TABLE_CELL)) {'.$enter;
						if ($out['order_tag']['isset'] && !empty($_TABLE_ALL_INDEXES[$out['order_tag']['pole']])) {
							$file_content .= "\t\t".'$_INFO_TABLE = $_TABLE_CELL;'.$enter;
							} else {
							$file_content .= "\t\t".'$_INFO_TABLE = explode("",$_TABLE_CELL);'.$enter;
							}
						if ($out['where_tag']['isset']) {
							$file_content .= "\t\t".'if ('.$WARUNKI_OUT_STR.') {'.$enter;
							}
						if ($out['limit_tag']['isset']) {
							$file_content .= "\t\t\t".$_LIMIT_STR_FILE.$enter;
							}
						$file_content .= "\t\t\t\t".'foreach ($_INFO_TABLE as $_TDID => $_TBLVAL) {'.$enter;
						$file_content .= "\t\t\t\t\t".'$_OUT_TBL_SH[$_INDEXES_FORID[$_TDID]] = $_TBLVAL;'.$enter;
						$file_content .= "\t\t\t\t\t".'}'.$enter;
						$file_content .= "\t\t\t\t\t".'$_OUT_ARRAY_SELECT[] = $_OUT_TBL_SH;'.$enter;
						if ($out['limit_tag']['isset']) {
							$file_content .= "\t\t\t\t".'}'.$enter;
							}
						$file_content .= "\t\t\t".'$_LIMITER++;'.$enter;
						if ($out['where_tag']['isset']) {
							$file_content .= "\t\t\t".'}'.$enter;
							}
						$file_content .= "\t\t".'}'.$enter;
						$file_content .= "\t".'}'.$enter;
						$file_content .= '$_LIMITER = 0;'.$enter;
						$file_content .= "?>";
						
						$_TABLE_DATAS_ARR = explode('',$this->_FDB_AKTU_DB_TABLES[$_TABLENAME]['datas']);
						if ($out['order_tag']['isset'] && !empty($_TABLE_ALL_INDEXES[$out['order_tag']['pole']])) {
							foreach ($_TABLE_DATAS_ARR as $_TABLE_CELL) {
								if (!empty($_TABLE_CELL)) {
									$_INFO_TABLE = explode("",$_TABLE_CELL);
									$_OUT_TBL_DATA[] = $_INFO_TABLE;
									}
								}
									
							//Sortuj tablicê
							$_TABLE_DATAS_ARR = $this->array_orderby($_OUT_TBL_DATA,$_INDEXES_ASID[$out['order_tag']['pole']],$out['order_tag']['typ']);
							}
							
						$_RAND_FILE_ID = mt_rand(1000,9999);
						
						$this->save('php_file_'.$_RAND_FILE_ID.'.php',$file_content);
						
						require($this->_FDB_DIR.$this->_FILE_SEPERATOR.'php_file_'.$_RAND_FILE_ID.'.php');
							
						if (!is_array($_OUT_ARRAY_SELECT)) {
								$_OUT_ARRAY_SELECT = array();
								}
								
						if (!is_array($_OUT_ARRAY_SELECT[0])) {
							$_OUT_ARRAY_SELECT[0] = array();
							}	
							
						$return = $_OUT_ARRAY_SELECT;
						
						unlink($this->_FDB_DIR.$this->_FILE_SEPERATOR.'php_file_'.$_RAND_FILE_ID.'.php');
						}
						
					} else {
					
					$_DIFF_CELLS_ARRAY = explode(',',$select_effect[1]);
			
					
					if (!is_array($_DIFF_CELLS_ARRAY)) {
						$_DIFF_CELLS_ARRAY = array();
						}
						
					$errs = 0;
					
					if (count($_DIFF_CELLS_ARRAY) > 0) {
						
						foreach ($_DIFF_CELLS_ARRAY as $_VALUE) {
							if (empty($_TABLE_ALL_INDEXES[$_VALUE])) {
								$errs++;
								$this->warning('b³¹d funkcji select(), brak inteksu "'.$_VALUE.'" w tabeli "'.$_TABLENAME.'"! ',__FILE__,__LINE__);
								}
							}
						
						$out = $this->_compile_select_tags($fdb_query);
						
						if ($out['where_tag']['isset']) {
							$_WARUNKI_ARR_PHP = array();
							$out['where_tag']['warunki'] = explode(',',$out['where_tag']['warunki']);
							foreach ($out['where_tag']['warunki'] as $_STR_WARUNEK) {
								$_ARR_WARUNEK = explode(';',$_STR_WARUNEK);
							
								if (empty($_TABLE_ALL_INDEXES[$_ARR_WARUNEK[0]])) {
									$errs++;
									$this->warning('b³¹d funkcji select(), brak indeksu "'.$_ARR_WARUNEK[0].'" w tabeli '.$_TABLENAME.'! ',__FILE__,__LINE__);
									} else {
									if (!in_array($_ARR_WARUNEK[1],$this->_OPERATORY)) {
										$errs++;
										$this->warning('b³¹d funkcji select(), nie zdefiniowany operator "'.$_ARR_WARUNEK[1].'"! ',__FILE__,__LINE__);
										} else {
										if (!is_numeric($_ARR_WARUNEK[2])) {
											$_ARR_WARUNEK[2] = "'".'$_ARR_WARUNEK[2]'."'";
											}
										$_WARUNKI_ARR_PHP[] = '$_INFO_TABLE[$_INDEXES_ASID['."'".$_ARR_WARUNEK[0]."'".']] '.$_ARR_WARUNEK[1].' '.$_ARR_WARUNEK[2];
										}
									}
								
								$WARUNKI_OUT_STR = implode(' && ',$_WARUNKI_ARR_PHP);
								}
							}
						
						
						if ($out['limit_tag']['isset']) {
							if ($out['limit_tag']['is_normal']) {
								$_LIMIT_STR_FILE = 'if ($_LIMITER < '.$out['limit_tag']['limit'].') {';
								} else {
								$_MIN = $out['limit_tag']['od_strony'] * $out['limit_tag']['do'];
								$_MAX = $_MIN + $out['limit_tag']['do'];
								$_LIMIT_STR_FILE = 'if ($_LIMITER >= '.$_MIN.' && $_LIMITER < '.$_MAX.') {';
								}
							}
						
						
						if ($errs < 1) {
						
							$_IINFO = '0';
							
							foreach ($_TABLE_ALL_INDEXES as $_INAME => $_INDEX) {
								$_INDEXES_ASID[$_INAME] = $_IINFO;
								$_IINFO++;
								}
						
						
							$enter = "\n";
							$file_content .= '<?php'.$enter;
							$file_content .= '$_LIMITER = 0;'.$enter;
							$file_content .= '$_OUT_ARRAY_SELECT = array();'.$enter;
							$file_content .= 'foreach ($_TABLE_DATAS_ARR as $_TABLE_CELL) {'.$enter;
							$file_content .= "\t".'if (!empty($_TABLE_CELL)) {'.$enter;
							if ($out['order_tag']['isset'] && !empty($_TABLE_ALL_INDEXES[$out['order_tag']['pole']])) {
								$file_content .= "\t\t".'$_INFO_TABLE = $_TABLE_CELL;'.$enter;
								} else {
								$file_content .= "\t\t".'$_INFO_TABLE = explode("",$_TABLE_CELL);'.$enter;
								}
							if ($out['where_tag']['isset']) {
								$file_content .= "\t\t".'if ('.$WARUNKI_OUT_STR.') {'.$enter;
								}
							if ($out['limit_tag']['isset']) {
								$file_content .= "\t\t\t".$_LIMIT_STR_FILE.$enter;
								}
							$file_content .= "\t\t\t\t".'foreach ($_DIFF_CELLS_ARRAY as $_TBLVAL) {'.$enter;
							$file_content .= "\t\t\t\t\t".'$_OUT_TBL_SH[$_INDEXES_ASID[$_TBLVAL]] = $_INFO_TABLE[$_INDEXES_ASID[$_TBLVAL]];'.$enter;
							$file_content .= "\t\t\t\t\t".'}'.$enter;
							$file_content .= "\t\t\t\t\t".'$_OUT_ARRAY_SELECT[] = $_OUT_TBL_SH;'.$enter;
							if ($out['limit_tag']['isset']) {
								$file_content .= "\t\t\t\t".'}'.$enter;
								}
							$file_content .= "\t\t\t".'$_LIMITER++;'.$enter;
							if ($out['where_tag']['isset']) {
								$file_content .= "\t\t\t".'}'.$enter;
								}
							$file_content .= "\t\t".'}'.$enter;
							$file_content .= "\t".'}'.$enter;
							$file_content .= '$_LIMITER = 0;'.$enter;
							$file_content .= "?>";
						
							$_TABLE_DATAS_ARR = explode('',$this->_FDB_AKTU_DB_TABLES[$_TABLENAME]['datas']);
							if ($out['order_tag']['isset'] && !empty($_TABLE_ALL_INDEXES[$out['order_tag']['pole']])) {
								foreach ($_TABLE_DATAS_ARR as $_TABLE_CELL) {
									if (!empty($_TABLE_CELL)) {
										$_INFO_TABLE = explode("",$_TABLE_CELL);
										$_OUT_TBL_DATA[] = $_INFO_TABLE;
										}
									}
									
								//Sortuj tablicê
								$_TABLE_DATAS_ARR = $this->array_orderby($_OUT_TBL_DATA,$_INDEXES_ASID[$out['order_tag']['pole']],$out['order_tag']['typ']);
								}
						
							$_RAND_FILE_ID = mt_rand(1000,9999);
						
							$this->save('php_file_'.$_RAND_FILE_ID.'.php',$file_content);
						
							require($this->_FDB_DIR.$this->_FILE_SEPERATOR.'php_file_'.$_RAND_FILE_ID.'.php');
							
							if (!is_array($_OUT_ARRAY_SELECT)) {
								$_OUT_ARRAY_SELECT = array();
								}
								
							if (!is_array($_OUT_ARRAY_SELECT[0])) {
								$_OUT_ARRAY_SELECT[0] = array();
								}
							
							$return = $_OUT_ARRAY_SELECT;
						
							unlink($this->_FDB_DIR.$this->_FILE_SEPERATOR.'php_file_'.$_RAND_FILE_ID.'.php');
							}
						} else {
						$return = array();
						}
					}
				}
			} else {
			$this->warning('b³¹d funkcji select(), Ÿle zdefiniowane zapytanie do bazy! ',__FILE__,__LINE__);
			}
			
		return $return;
		}
	//koniec funkcji select()
	
	//Funkcja update() - zmienia wartoœci w tabeli:
	function update($fdb_query) {
		$this->if_is_db_files();
		$this->if_is_db();
		
		$is_update = preg_match($this->_PREG_UPDATE,$fdb_query,$update_effect);
		
		if ($is_update) {
			$_TABLENAME = $this->fast_unicode($this->wytnij($update_effect[1],50));
			
			if (!is_array($this->_FDB_AKTU_DB_TABLES[$_TABLENAME])) {
				$this->warning('b³¹d funkcji update(), tabela o nazwie "'.$_TABLENAME.'" nie istnieje!',__FILE__,__LINE__);
				} else {
				$_WARTOSCI = explode(',',$update_effect[2]);
				$errs = 0;
				
				$_TABLE_ALL_INDEXES = $this->get_table_indexes($_TABLENAME);
				
				foreach ($_TABLE_ALL_INDEXES as $_INAME => $_INDEX) {
					$_INDEXES_ASID[$_INAME] = $_IINFO;
					$_IINFO++;
					}
					
				$_WARUNKI_ARRAY = explode(',',$update_effect[3]);
				$_VALUES_OUT_TABLE = array();
				
				foreach ($_WARTOSCI as $val) {
					$is_normal = preg_match($this->_PREG_UPDATE_NORMAL,$val,$normal_effect);
					$is_diff = preg_match($this->_PREG_UPDATE_DIFF,$val,$diff_effect);
					
					if ($is_normal) {
						if (!empty($_TABLE_ALL_INDEXES[$normal_effect[1]])) {
							$_INDEX = explode('',$_TABLE_ALL_INDEXES[$normal_effect[1]]);
							if ($_INDEX[1] == 'int') {
								$_CELLS_VALUE = (int)$normal_effect[2];
								$_CELLS_VALUE = $this->fast_unicode($this->wytnij($_CELLS_VALUE,$_INDEX[2]));
								}
							if ($_INDEX[1] == 'var') {
								$_CELLS_VALUE = $this->fast_unicode($this->wytnij($normal_effect[2],$_INDEX[2]));
								}
							$_VALUES_OUT_TABLE[] = '$_INFO_TABLE[$_INDEXES_ASID["'.$normal_effect[1].'"]] = '."'".$_CELLS_VALUE."';";
							} else {
							$errs++;
							$this->warning('b³¹d funkcji update(), brak indeksu "'.$normal_effect[1].'" w tabeli "'.$_TABLENAME.'"! ',__FILE__,__LINE__);
							}
						} else {
						if ($is_diff) {
							if (!empty($_TABLE_ALL_INDEXES[$diff_effect[1]]) && !empty($_TABLE_ALL_INDEXES[$diff_effect[2]])) {
								$_VALUES_OUT_TABLE[] = '$_INFO_TABLE[$_INDEXES_ASID["'.$diff_effect[1].'"]] = $_INFO_TABLE[$_INDEXES_ASID["'.$diff_effect[2].'"]] '.$diff_effect[3].' '.$this->fast_unicode($diff_effect[4]).';';
								} else {
								$errs++;
								$this->warning('b³¹d funkcji update(), b³¹d indeksu "'.$val.'" w tabeli "'.$_TABLENAME.'"! ',__FILE__,__LINE__);
								}
							} else {
							$errs++;
							$this->warning('b³¹d funkcji update(), Ÿle zdefiniowane wartoœci nadawane do tabeli "'.$val.'"! ',__FILE__,__LINE__);
							}
						}
					}
					
				$_WARUNKI_ARRAY_NEW = array();
					
				foreach ($_WARUNKI_ARRAY as $WARUNEK_STR) {
					$WARUNEK_ARR = explode(';',$WARUNEK_STR);
					if (!in_array($WARUNEK_ARR[1],$this->_OPERATORY)) {
						$errs++;
						$this->warning('b³¹d funkcji delete(), nie zdefiniowany operator w zapytaniu - ('.$WARUNEK_ARR[1].')! ',__FILE__,__LINE__);
						}
					if (empty($_TABLE_ALL_INDEXES[$WARUNEK_ARR[0]])) {
						$errs++;
						$this->warning('b³¹d funkcji delete(), brak indeksu w tabeli o nazwie - ('.$WARUNEK_ARR[0].')! ',__FILE__,__LINE__);
						}	
					$_WARUNKI_ARRAY_NEW[] = $WARUNEK_ARR;
					}
					
				if ($errs < 1) {
					$vars_arr = array();
					foreach ($_WARUNKI_ARRAY_NEW as $WARUNEK_ARR) {
						if (!is_numeric($WARUNEK_ARR[2])) {
							$WARUNEK_ARR[2] = "'".$WARUNEK_ARR[2]."'";
							}
						$vars_arr[] = '$_INFO_TABLE[$_INDEXES_ASID['."'".$WARUNEK_ARR[0]."'".']] '.$WARUNEK_ARR[1].' '.$WARUNEK_ARR[2];
						}
					$vars_str = implode(' && ',$vars_arr);
					
					unset($vars_arr);
					unset($_WARUNKI_ARRAY);
					
					$enter = "\n";
					$file_content .= '<?php'.$enter;
					$file_content .= 'foreach ($_TABLE_DATAS_ARR as $_TABLE_CELL) {'.$enter;
					$file_content .= "\t".'if (!empty($_TABLE_CELL)) {'.$enter;
					$file_content .= "\t\t".'$_INFO_TABLE = explode("",$_TABLE_CELL);'.$enter;
					$file_content .= "\t\t".'if ('.$vars_str.') {'.$enter;
					foreach ($_VALUES_OUT_TABLE as $_CVAL) {
						$file_content .= "\t\t\t".$_CVAL.$enter;
						}
					$file_content .= "\t\t\t".'}'.$enter;
					$file_content .= "\t\t".'$_OUT_ROW_STR = implode("",$_INFO_TABLE);'.$enter;
					$file_content .= "\t\t".'$_FINAL_TABLE_STR = '."''.".'$_OUT_ROW_STR;'.$enter;
					$file_content .= "\t\t".'}'.$enter;
					$file_content .= "\t".'}'.$enter;
					$file_content .= "?>";
					
					$_TABLE_DATAS_ARR = explode('',$this->_FDB_AKTU_DB_TABLES[$_TABLENAME]['datas']);
						
					$_RAND_FILE_ID = mt_rand(1000,9999);
					
					$this->save('php_file_'.$_RAND_FILE_ID.'.php',$file_content);
						
					require($this->_FDB_DIR.$this->_FILE_SEPERATOR.'php_file_'.$_RAND_FILE_ID.'.php');
					
					$this->_FDB_AKTU_DB_TABLES[$_TABLENAME]['datas'] = $_FINAL_TABLE_STR;
					$this->_FDB_CHANGES++;
						
					unlink($this->_FDB_DIR.$this->_FILE_SEPERATOR.'php_file_'.$_RAND_FILE_ID.'.php');
					}
				}
			} else {
			$this->warning('b³¹d funkcji update(), Ÿle zdefiniowane zapytanie do bazy! ',__FILE__,__LINE__);
			}
		}
	//koniec funkcji update()
	
	//Funkcja query() - operuje baz¹:
	function query($fdb_query) {
		$this->if_is_db_files();
		$this->if_is_db();
		
		$is_turncate = preg_match($this->_PREG_TURNCATE,$fdb_query);
		$is_del = preg_match($this->_PREG_DELETE,$fdb_query);
		$is_del_where = preg_match($this->_PREG_DELETE_WHERE,$fdb_query);
		$is_insert = preg_match($this->_PREG_INSERT,$fdb_query);
		$is_table_new = preg_match($this->_PREG_NEW_TABLE,$fdb_query);
		$is_table_edit = preg_match($this->_PREG_EDIT_TABLE,$fdb_query);
		$is_update = preg_match($this->_PREG_UPDATE,$fdb_query);
		$is_select = preg_match($this->_PREG_SELECT,$fdb_query);
		$is_tbl_change = preg_match($this->_PREG_ALTER_TABLE,$fdb_query);
		
		$error = true;
		
		if ($is_turncate && $error === true) {
			$error = false;
			$this->turncate($fdb_query);
			}
		if ($is_del && $error === true) {
			$error = false;
			$this->delete($fdb_query);
			}
		if ($is_del_where && $error === true) {
			$error = false;
			$this->delete($fdb_query);
			$return = true;
			}
		if ($is_insert && $error === true) {
			$error = false;
			$this->insert($fdb_query);
			$return = true;
			}
		if ($is_table_new && $error === true) {
			$error = false;
			$this->create_table($fdb_query);
			$return = true;
			}
		if ($is_table_edit && $error === true) {
			$error = false;
			$this->create_table($fdb_query);
			$return = true;
			}
		if ($is_update && $error === true) {
			$error = false;
			$this->update($fdb_query);
			$return = true;
			}
		if ($is_select && $error === true) {
			$error = false;
			$out_return = $this->select($fdb_query);
			$return = $out_return;
			}
		if ($is_tbl_change && $error === true) {
			$error = false;
			$out_return = $this->change_tbl_idx($fdb_query);
			$return = $out_return;
			}
		
		if ($error === true) {
			$this->warning('b³¹d funkcji query(), Ÿle zdefiniowane zapytanie do bazy! ',__FILE__,__LINE__);
			$return = false;
			}
			
		return $return;
		}
	//koniec funkcji query()
	
	//Funkcja db_exists() - sprawdza czy istnieje baza:
	function db_exists($dbname) {
		$this->if_is_db_files();
		$this->load_db_list();
		
		if (in_array($dbname,$this->_FDB_DATABASES)) {
			$return = true;
			} else {
			$return = false;
			}
		return $return;
		}
	//koniec funkcji db_exists()
	
	//Funkcja user_exists() - sprawdza czy istnieje user:
	function user_exists($user) {
		$this->if_is_db_files();
		
		$this->load_db_users_file();
		
		if (in_array($name,$this->_FDB_USERS)) {
			$return = true;
			} else {
			$return = false;
			}
		return $return;
		}
	
	//Funkcja table_exists() - sprawdza czy istnieje tabela:
	function table_exists($tablename) {
		$this->if_is_db_files();
		$this->if_is_db();
		if (is_array($this->_FDB_AKTU_DB_TABLES[$tablename])) {
			$return = true;
			} else {
			$return = false;
			}
		return $return;
		}
	//koniec funkcji  table_exists()
	
	//Funkcja index_exists() - sprawdza czy istnieje index:
	function index_exists($tablename,$indexname) {
		$this->if_is_db_files();
		$this->if_is_db();
		if (is_array($this->_FDB_AKTU_DB_TABLES[$tablename])) {
			$_TABLE_INDEXES_STR = $this->_FDB_AKTU_DB_TABLES[$tablename]['indexes'];
			$_TABLE_INDEXES_ARR = explode('',$_TABLE_INDEXES_STR);
		
			foreach($_TABLE_INDEXES_ARR as $_INDEXES) {
				if (!empty($_INDEXES)) {
					$index = explode('',$_INDEXES);
					if ($index[0] == $indexname) {
						$return = true;
						}
					}
				}
			} else {
			$return = false;
			}
		return $return;
		}
	//koniec funkcji  index_exists()
	
	//Funkcja assign() - zamieszcza zmienne w klasie:
	function assign($var_name,$var_value) {
		if (!is_object($var_name) && !is_array($var_name)) {
			$this->_FDB_VARS[$var_name] = $var_value;
			$return = true;
			} else {
			$this->warning('b³¹d funkcji assign(), pierwszy parametr nie mo¿e byæ tablic¹ ani obiektem! ',__FILE__,__LINE__);
			$return = false;
			}
			
		return $return;
		}
	//koniec funkcji assign()
	
	//Funkcja get_val() - pobiera zmienne z klasy:
	function get_val($var_name) {
		if (!empty($this->_FDB_VARS[$var_name])) {
			$return = $this->_FDB_VARS[$var_name];
			} else {
			$return = false;
			}
			
		return $return;
		}
	//koniec funkcji get_val()
	
	//Funkcja parse_fdb_queries() - prasuje z pliku:
	function parse_fdb_file($file) {
		if (!file_exists($file)) {
			$this->warning('b³¹d funkcji parse_fdb_file(), nie ma pliku o nazwie "'.$file.'"! ',__FILE__,__LINE__);
			} else {
			$comments = array(
				"~(([/][/]))(.*?)(\n)~s",
				"~([#])(.*?)(\n)~s",
				'~([/][*])(.*?)([*][/])~s'
				);
			
			$contents = file_get_contents($file);
			$contents = preg_replace($comments,'',$contents);
			
			$array = explode("\n\n\n",$contents);
			
			foreach ($array as $val) {
				$val = str_replace(array("\n","\t"),'',$val);
				$this->query($val);
				}
			}
		}
	//koniec funkcji parse_fdb_queries()
	
	//Funkcja export() - przenosi dane bazy na plik w formie zapytañ:
	function export($new_file,$data = true,$in_file = true) {
		$this->if_is_db_files();
		$this->if_is_db();
		
		if (!$in_file) {
			$_out_content_export .= "# Wyeksportowano bazê ('".$this->_FDB_AKTU_DB_VIEV['__aktu_db']."') do pliku ".$new_file."\n";
			$_out_content_export .= "# ".date('U')."|".__FILE__."|".__LINE__."\n\n";
			
			foreach ($this->_FDB_AKTU_DB_TABLES as $_TABLENAME => $_TABLEARRAY) {
				$_TBL_INDEXES = explode('',$_TABLEARRAY['indexes']);
				$_TBL_DATAS = explode('',$_TABLEARRAY['datas']);
				
				$_out_content_export .= "# Struktura indeksu tabeli <".$_TABLENAME.">\n\n";
				
				$_out_content_export .= "CREATE TABLE $_TABLENAME(\n";
				foreach ($_TBL_INDEXES as $INDEXES) {
					$_INDEX = explode('',$INDEXES);
					$_out_content_export .= "\t".$_INDEX[0].";".$_INDEX[1].";".$_INDEX[2].";".$_INDEX[3].",\n";
					}
					
				$_out_content_export .= ")\n";
				
				if ($data === true) {
					if (!empty($_TABLEARRAY['datas'])) {
						$_out_content_export .= "\n# Zrzut danych z tabeli <".$_TABLENAME.">\n\n";
						foreach ($_TBL_DATAS as $_DATAS) {
							$_DATA = explode('',$_DATAS);
							if (!empty($_DATAS)) {
								$_out_content_export .= "INSERT INTO $_TABLENAME(";
								foreach ($_TBL_INDEXES as $INDEXES) {
									$_INDEX = explode('',$INDEXES);
									$_out_content_export .= $_INDEX[0].',';
									}
								$_out_content_export .= ") VALUES (";
						
								foreach ($_DATA as $TDATA) {
									$_out_content_export .= $TDATA.',';
									}
							
								$_out_content_export .= ")\n\n\n";
								}
							}
						$_out_content_export .= "\n";
						}
					}
				}
				
			$_out_content_export = str_replace(",\n)","\n)",$_out_content_export);
			$_out_content_export = str_replace(",)",")",$_out_content_export);
			$_out_content_export = str_replace("\n\n\n\n","\n\n",$_out_content_export);
			
			$_out_content_export = nl2br($_out_content_export);
			$return = $_out_content_export;
			} else {
			if (file_exists($new_file)) {
				$this->warning('b³¹d funkcji export(), docelowy plik istnieje - wybierz inn¹ nazwê! ',__FILE__,__LINE__);
				} else {
				$_out_content_export .= "# Wyeksportowano bazê ('".$this->_FDB_AKTU_DB_VIEV['__aktu_db']."') do pliku ".$new_file."\n";
				$_out_content_export .= "# ".date('U')."|".__FILE__."|".__LINE__."\n\n";
			
				foreach ($this->_FDB_AKTU_DB_TABLES as $_TABLENAME => $_TABLEARRAY) {
					$_TBL_INDEXES = explode('',$_TABLEARRAY['indexes']);
					$_TBL_DATAS = explode('',$_TABLEARRAY['datas']);
				
					$_out_content_export .= "# Struktura indeksu tabeli <".$_TABLENAME.">\n\n";
				
					$_out_content_export .= "CREATE TABLE $_TABLENAME(\n";
					foreach ($_TBL_INDEXES as $INDEXES) {
						$_INDEX = explode('',$INDEXES);
						$_out_content_export .= "\t".$_INDEX[0].";".$_INDEX[1].";".$_INDEX[2].";".$_INDEX[3].",\n";
						}
					
					$_out_content_export .= ")\n";
				
					if ($data === true) {
						if (!empty($_TABLEARRAY['datas'])) {
							$_out_content_export .= "\n# Zrzut danych z tabeli <".$_TABLENAME.">\n\n";
							foreach ($_TBL_DATAS as $_DATAS) {
								$_DATA = explode('',$_DATAS);
								if (!empty($_DATAS)) {
									$_out_content_export .= "INSERT INTO $_TABLENAME(";
									foreach ($_TBL_INDEXES as $INDEXES) {
										$_INDEX = explode('',$INDEXES);
										$_out_content_export .= $_INDEX[0].',';
										}
									$_out_content_export .= ") VALUES (";
						
									foreach ($_DATA as $TDATA) {
										$_out_content_export .= $TDATA.',';
										}
							
									$_out_content_export .= ")\n\n\n";
									}
								}	
							$_out_content_export .= "\n";
							}
						}
					}
				
				$_out_content_export = str_replace(",\n)","\n)",$_out_content_export);
				$_out_content_export = str_replace(",)",")",$_out_content_export);
				$_out_content_export = str_replace("\n\n\n\n","\n\n",$_out_content_export);
			
				$f = fopen($new_file,'w');
				fputs($f,$_out_content_export);
				fclose($f);
				
				$return = true;
				}
			}
		
		return $return;
		}
	//koniec funkcji export()
		
	//Funkcja import() - prasuje z pliku:
	function import($file) {
		$this->parse_fdb_file($file);
		}
	//koniec funkcji import()
	
	//Funkcja change_tbl_idx() - zmienia indeksy:
	function change_tbl_idx($fdb_query) {
		$this->if_is_db_files();
		$this->if_is_db();
		
		$is_change = preg_match($this->_PREG_ALTER_TABLE,$fdb_query,$change_effect);
		
		if ($is_change) {
			$_TABLENAME = $this->fast_unicode($this->wytnij($change_effect[1],50));
			if (!is_array($this->_FDB_AKTU_DB_TABLES[$_TABLENAME])) {
				$this->warning('b³¹d funkcji change_tbl_idx(), tabela o nazwie "'.$_TABLENAME.'" nie istnieje!',__FILE__,__LINE__);
				} else {
				$_TABLE_ALL_INDEXES = $this->get_table_indexes($_TABLENAME);
				$_EFFECT_CHANGE_IS = false;
				$indexes_values = array('int','var');
				
				$_NEW_VALUES = explode(';',$change_effect[3]);
				if (!in_array($_NEW_VALUES[0],$indexes_values)) {
					$_NEW_VALUES[0] = 'var';
					}
				$_NEW_VALUES[1] = (int)$_NEW_VALUES[1];
				$_NEW_VALUES[2] = $this->fast_unicode($this->wytnij($_NEW_VALUES[2],1000));
				
				$_OUT_INDEXES_ARR = array();
				
				foreach ($_TABLE_ALL_INDEXES as $_INDEX) {
					$_IDX_INFO = explode('',$_INDEX);
					
					if ($_IDX_INFO[0] == $change_effect[2]) {
						$_EFFECT_CHANGE_IS = true;
						$_IDX_INFO[1] = $_NEW_VALUES[0];
						$_IDX_INFO[2] = $_NEW_VALUES[1];
						$_IDX_INFO[3] = $_NEW_VALUES[2];
						$_INDEX = $_IDX_INFO[0].''.$_IDX_INFO[1].''.$_IDX_INFO[2].''.$_IDX_INFO[3];
						}
					$_OUT_INDEXES_ARR[] = $_INDEX;
					}
					
				if (!$_EFFECT_CHANGE_IS) {
					$this->warning('b³¹d funkcji change_tbl_idx(), indeks o nazwie "'.$change_effect[2].'" nie istnieje w tabeli "'.$_TABLENAME.'"! ',__FILE__,__LINE__);
					} else {
					$this->_FDB_AKTU_DB_TABLES[$_TABLENAME]['indexes'] = implode('',$_OUT_INDEXES_ARR);
					$this->_FDB_CHANGES++;
					}
				$return = true;
				}
			} else {
			$this->warning('b³¹d funkcji change_tbl_idx(), Ÿle zdefiniowane zapytanie do bazy! ',__FILE__,__LINE__);
			$return = false;
			}
			
		return $return;
		}
	//koniec funkcji change_tbl_idx()
	
	//Funkcja delete_db() - usuwa bazê:
	function delete_db($dbname) {
		$this->if_is_db_files();
		$this->load_db_list();
		
		if (!is_array($this->_FDB_DATABASES)) {
			$this->_FDB_DATABASES = array();
			}
		
		if (in_array($dbname,$this->_FDB_DATABASES)) {
			foreach ($this->_FDB_DATABASES as $_DB) {
				if ($_DB != $dbname && !empty($_DB)) {
					$_NEW_DATABASES[] = $_DB;
					}
				}
				
			if (!is_array($_NEW_DATABASES)) {
				$_NEW_DATABASES = array();
				}
				
			$_NEW_DB_STR = implode(';',$_NEW_DATABASES);
			$this->save($this->_FDB_DBLIST_FILE,$_NEW_DB_STR);
			unlink($this->_FDB_DIR.$this->_FILE_SEPERATOR.'db_'.$dbname.'.txt');
			$return = true;
			} else {
			$return = false;
			$this->warning('b³¹d funkcji delete_db(), baza o nazwie "'.$dbname.'" nie istnieje! ',__FILE__,__LINE__);
			}
		return $return;
		}
	//koniec funkcji delete_db()
	
	//Funkcja is_connected() - sprawdza czy istnieje po³¹czenie z baz¹:
	function is_connected() {
		if (!file_exists($this->_FDB_DIR.$this->_FILE_SEPERATOR.'db_'.$this->_FDB_AKTU_DB_VIEV['__aktu_db'].'.txt')) {
			$return = false;
			} else {
			$return = true;
			}
			
		return $return;
		}
	//koniec funkcji is_connected()
	
	//Funkcja _compile_select_tags() - kompilacja tagów:
	function _compile_select_tags($_select_tag) {
		$is_where_tag = preg_match($this->_SELECT_TAGS_WHERE,$_select_tag,$where_effect);
		$is_order_tag = preg_match($this->_SELECT_TAGS_ORDER,$_select_tag,$order_effect);
		$is_limit_tag = preg_match($this->_SELECT_TAGS_LIMIT,$_select_tag,$limit_effect);
		
		if ($is_limit_tag) {
			if (!is_numeric($limit_effect[1])) {
				$is_normal = false;
				$arr = explode(',',$limit_effect[1]);
				if (count($arr) >= 2) {
					$arr[0] = (int)$arr[0];
					$arr[1] = (int)$arr[1];
					$arr[0] = floor($arr[0]);
					$arr[1] = floor($arr[1]);
					} else {
					$this->warning('b³¹d funkcji _compile_select_tags(), b³edny argument przypisany dla funkcji limit() "'.$limit_effect[1].'"! ',__FILE__,__LINE__);
					}
				} else {
				$is_normal = true;
				$limit_effect[1] = floor($limit_effect[1]);
				}
			}
		
		$arr_tags = array(
			'where_tag' => array(
				'isset' => $is_where_tag,
				'warunki' => $where_effect[1]
				),
			'order_tag' => array(
				'isset' => $is_order_tag,
				'pole' => $order_effect[1],
				'typ' => $order_effect[2]
				),
			'limit_tag' => array(
				'isset' => $is_limit_tag,
				'is_normal' => $is_normal,
				'od_strony' => $arr['0'],
				'do' => $arr['1'],
				'limit' => $limit_effect[1]
				)
			);
			
		return $arr_tags;
		}
	//koniec funkcji _compile_select_tags()
	
	//Funkcja zakoduj_plik() - koduje plik:
	function zakoduj_plik($plik,$nowy_plik) {
		$efekt = eaccelerator_encode($plik);
		$new_c = "<?php eaccelerator_load('".$efekt."'); ?>";
		$p = fopen($nowy_plik,'w');
		fputs($p,$new_c);
		fclose($p);
		}
	//koniec funkcji zakoduj_plik()
		
	//Funkcja rozkoduj() - rozkodowuje string:
	function rozkoduj($cont) {
		echo gzuncompress(base64_decode($cont));
		}
	//koniec funkcji rozkoduj()
	
	//Funkcja array_orderby() - sortuje tablicê wzglêdem klucza z tablicy:
	function array_orderby($array,$index_name,$sort_type = 'ASC') {
		foreach ($array as $arr) {
			$modifer_array[] = $arr[$index_name];
			}
			
		$sorts_types = array('ASC','DESC');
		if (!in_array($sort_type,$sorts_types)) {
			$sort_type = 'ASC';
			}
			
		if ($sort_type == 'ASC') {
			array_multisort($modifer_array,SORT_ASC,$array);
			}
		if ($sort_type == 'DESC') {
			array_multisort($modifer_array,SORT_DESC,$array);
			}
			
		return $array;
		}
	//koniec array_orderby()
	
	//Funkcja fetch() - przekszta³ca tablice:
	function fetch($_select_data_arr) {
		$err = false;
		
		if (!is_array($_select_data_arr) && !is_array($_select_data_arr[0])) {
			$err = true;
			$this->warning('b³¹d funkcji fetch(), pierwszy argument musi byæ podwójn¹ tablic¹! ',__FILE__,__LINE__);
			} else {
							
			if (count($_OUT_ARRAY_SELECT) == 1) {
				$_OUT_ARRAY_SELECT = $_OUT_ARRAY_SELECT[0];
				}
				
			$return = $_OUT_ARRAY_SELECT;
			
			}
			
		return $_OUT_ARRAY_SELECT;
		}
	//koniec funkcji fetch()
	}
?>