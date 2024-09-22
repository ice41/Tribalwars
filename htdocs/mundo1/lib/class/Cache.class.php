<?php
class Cache {
	
	function writeCache($name,$toCache) {
		
		$toCache = serialize($toCache);
		$toCache = base64_encode($toCache);
		// Den Inhalt der Cache Datei zusammenstellen:
		$CacheFileValue = "<?php \$cache = \"$toCache\"; ?>";
		
		// Cache schreiben:
		$path = PATH."/cache/".$name.".php";
		$f = fopen($path,"w+");
		fwrite($f, $CacheFileValue);
		fclose($f);
		
	}
	
	function getCache($name) {
		
		$path = PATH."/cache/".$name.".php";
		
		// Cache auslesen:
		if (!file_exists($path)) {
			die("Arquivo de cache não encontrado. ($path)");
		}
		
		require($path);
		
		$cache = unserialize( base64_decode($cache) );

		return $cache;
	}
	
	/**
	 * Überprüft ob Cache neu erstellt werden muss
	 *
	 * @param $arr: Ein Array mit allen zu überprüfenden Caches.
	 */
	function checkCaches($arr) {
		foreach($arr AS $name) {
			$cachePath = PATH.'/cache/'.$name.'.php';
			if (!file_exists($cachePath)) {
				$class = $name."CacheCreator";
				
				require_once("cacheCreators/".$name.".php");
				
				$cacheObject = new $class;
				$cacheObject->run();
			}
		}
	}
}
?>