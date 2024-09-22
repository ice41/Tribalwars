<?
	$host = "localhost";
	$timeout = 1;
	$i = 1;

	$curdir = getcwd();
	list($partition, $nonpartition) = split (':', $curdir);
	list($partwampp, $directorwampp) = spliti ('\\\install', $curdir);
	$portchecklog = $partwampp."\install\\portcheck.ini";

	$port = ereg_replace('-', '', $argv[1]);
	$werte = substr_count($port, ',');
	$ports = explode(',', $port);
	$anzahl = count($ports);
	$datei = fopen($portchecklog, 'w+');
	fputs($datei, "[Portas]\r\n");
	while($i <= $anzahl){
		$a = $i - 1;
		settype($ports[$a], "integer");
		if(($handle = @fsockopen($host, $ports[$a], $errno, $errstr, $timeout)) == false){
			$print = "Porta".$ports[$a]." = LIVRE\r\n";
		}else{
			$print = "Porta".$ports[$a]." = EM USO\r\n";
		}
		fputs($datei, $print);
		@fclose($handle);
		$i++;
	}
	fclose($datei);
	exit;
?>