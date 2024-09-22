<?
if(basename($_SERVER["REQUEST_URI"]) === basename(__FILE__)){
	exit();
}

class Time{
	var $starttime = 0;
	var $endtime = 0;
	var $resulttime = 0;
	var $running = false;

	function get(){
    	list($usec, $sec) = explode(" ", microtime());
    	return ((float)$usec + (float)$sec);
	}
	function start(){	
		$this->running = true;
    	$this->starttime = $this->get();
	}
	function finish(){
		$this->running = false;
    	$this->endtime = $this->get();
	}
	function result(){
		if($this->running) $this->finish();
		$this->resulttime = $this->endtime - $this->starttime;
		if(strlen($this->resulttime) > 5){
			$this->resulttime = substr($this->resulttime, 0, 5);
		}
		return $this->resulttime;
	}
}
?>