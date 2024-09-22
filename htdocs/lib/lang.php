<?php
/*****************************************/
/*=======================================*/
/*     PLIK: lang.php   		 		 */
/*     DATA: 18.01.2012r        		 */
/*     ROLA: Klasa						 */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

class lang {
	var $cache_file = 'lib/cl_lang.cac';
	var $lang_file = 'lib/cl_lang.lan';
	var $aktu_lang;
	var $translates;
	
	function create_file($file_name,$contents) {
		$p = fopen($file_name,'w');
		fputs($p,$contents);
		fclose($p);
		return true;
		}
		
	function del_znaki($str) {
		$out = str_replace(array('','',''),array('','',''),$str);
		return $out;
		}
		
	function get_cache() {
		$base_str = file_get_contents($this->cache_file);
		$decoded = base64_decode($base_str);
		$array = explode('',$decoded);
		return $array;
		}
	
	function lang($lagunage) {
		$lagunage = $this->del_znaki($lagunage);
		$this->aktu_lang = $lagunage;
		
		if (!file_exists($this->cache_file)) {
			$this->create_file($this->cache_file,NULL);
			}
		if (!file_exists($this->lang_file)) {
			$this->create_file($this->lang_file,NULL);
			}
			
		$cache_info = $this->get_cache();
		
		if ($cache_info[0] != $lagunage || $cache_info[1] != strlen(file_get_contents($this->lang_file))) {
			$this->reload_cache_file();
			}
			
		$this->read_cache_file();
		}
		
	function reload_cache_file() {
		$lang_file_contents = file_get_contents($this->lang_file);
		$lang_file_contents = $this->del_znaki($lang_file_contents);
		$entery = file_get_contents('lib/enter.tpl');
		$lang_file_contents = str_replace($entery,'',$lang_file_contents);
		$lang = $this->aktu_lang;
		if (preg_match("~([.]lagunage $lang)([:])(.*)(end_)($lang)(_lagunage;)~i",$lang_file_contents,$matches)) {
			$matches = str_replace(array('.lagunage pl:','end_pl_lagunage;','','	',"'",';'),array('','','','','',''),$matches[0]);
			$out_content = $lang.''.strlen(file_get_contents($this->lang_file)).''.$matches;
			$this->create_file($this->cache_file,base64_encode($out_content));
			}
		}
		
	function read_cache_file() {
		$cache_content = $this->get_cache();
		$array = explode('',$cache_content[2]);
		foreach ($array as $val) {
			$arr = explode(' => ',$val);
			$this->translates[$arr[0]] = $arr[1];
			}
		return 1;
		}
		
	function translate($name) {
		if (!is_array($name) && !is_object($name)) {
			return $this->translates[$name];
			}
		}
	}
?>