<?php
$id = $_GET['id'];

  $result = $db->query("SELECT * FROM odkrycia WHERE id = $id");
  $odk=$db->Fetch($result);

if (!$odk) {
	die("<b>Blad - Odkrycie nie zostało odnalezione w bazie danych!</b>");
}

$vid = $odk['wioska'];
  $result = $db->query("SELECT * FROM villages WHERE id = $vid");
  $v=$db->Fetch($result);

$pid = $v['userid'];
  $result = $db->query("SELECT * FROM users WHERE id = $pid");
  $p=$db->Fetch($result); 

	

?>