<?php
if($_GET['site'] == "einblenden")
   {
    $village_id = $_GET['village'];
	$qu = $db->query("SELECT userid FROM villages WHERE id = '".$village_id."'");
	$ft = $db->fetch($qu);
	$userid = $ft['userid'];
	
	//Alle Einheiten HOLEN
    $info = array();
    $query = $db->query("SELECT * FROM villages WHERE userid = '".$userid."'");
	while($fetch = $db->fetch($query))
	   {
	    $info[] = $fetch;
       }
    $tpl->assign("info", $info);
   }
?>