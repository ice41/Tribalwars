<?php
class lang {
	var $lang_vars = null;
	var $current_lang = null;
	var $tr_arr = null;
	var $lang_extension = ".ini";
	
	function is_string($varval) {
		if (!is_object($varval) && !is_array($varval)) {
			return true;
			} else {
			return false;
			}
		}
	
	function assign_lang_var($varname,$varval) {
		if (is_string($varname)) {
			$this->lang_vars[$varname] = $varval;
			}
		}
	
	function lang($lang) {
		if (file_exists($lang . $this->lang_extension)) {
			} else {
			echo "erro de classe lang - não existe $lang";
			}
		}
	}
?>