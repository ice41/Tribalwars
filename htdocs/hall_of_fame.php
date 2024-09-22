<?php
require('configs/serwery.php');
		
$serwer = $serwery[(count($serwery) - 1)];

header ("LOCATION: mundo".$serwer."/hall_of_fame.php");
//header ("LOCATION: mundo".$serwer."/hall_of_fame.php");
?>