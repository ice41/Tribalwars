<?php
class parse_time {
	var $micro_start = '';
	var $micro_end = '';
	
	function get_ms() {
		$arr = explode(" ",microtime());
		
		$microtime = $arr[0] + $arr[1];
		return $microtime;
		}
		
	function start() {
		$this->micro_start = $this->get_ms();
		}
		
	function end() {
		$this->micro_end = $this->get_ms();
		}
		
	function get_parse_time() {
		$parse_time = substr(round($this->micro_end - $this->micro_start,4),0,6);
		return $parse_time;
		}
	}
?>