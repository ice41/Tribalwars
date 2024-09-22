<?php
require('configs/serwery.php');
		
$serwer = $serwery[(count($serwery) - 1)];

header ("LOCATION: servidor_".$serwer."/stat.php");
?>