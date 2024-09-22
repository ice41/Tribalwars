<?php
require_once "lib/config.php";

/**
* Para se tornar estático quando usamos o PHP5?
 *
 * Todas os valores de configuração são processados aqui.
 * Uma explicação dos cálculos é fornecida no método :: getResourceProduction ()
 *
 * @author Christopher Koch <dev@reiswerk.de>
 */
class Config {

    var $config;
    

    /**
     * configuration collector
     */
    function Config() {
	global $config;
	$this->conf = $config;


    }
    function __get($name) {
	return array_key_exists($name, $this->conf) ? $this->conf[$name] : NULL;
    }

    function get($name) {
	return (array_key_exists($name, $this->conf) && !empty($this->conf[$name])) ? $this->conf[$name] : NULL;
    }
	

} 
?>
