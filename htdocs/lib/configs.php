<?php
/*****************************************/
/*=======================================*/
/*     PLIK: configs.php   		 		 */
/*     DATA: 15.12.2011r        		 */
/*     ROLA: klasa - configs			 */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

class configs {
	var $configs = '';
	
	function add_config($name,$value) {
		if (!empty($value)) {
			$this->configs[$name] = $value;
			$return = true;
			} else {
			$return = false;
			}
		return $return;
		}
		
	function get_cfg($name) {
		if (!empty($this->configs[$name])) {
			$return = $this->configs[$name];
			} else {
			$return = false;
			}
		return $return;
		}
	}
?>