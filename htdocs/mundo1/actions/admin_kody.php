<?php
//Po³¹cz z baz¹ serwera g³ównego
cdb_central();

if(!empty($_POST['kody'])){
	$kody = explode("\n",$_POST['kody']);
    $typ = $_POST['typ'];
	$query = "insert into kody (typ,kod) values ";
	$query2 = "";
	if(is_array($kody)){
		foreach($kody as $kod){
			$kod = trim($kod);
			if(!empty($kod)) $query2 .="('".$typ."','".$kod."'),";
		}
	}

	if(!empty($query2)){
		$query2 = substr($query2, 0, - 1);

		mysql_query("INSERT INTO kody(typ,kod) VALUES $query2");		
	} else $error = "<p class='error'>b³¹d</p><br class='clear'>";
}
$k1 = mysql_query("SELECT * FROM kody WHERE wykorzystany != 'Y'");
$kn = mysql_num_rows($k1);
$k2 = mysql_query("SELECT * FROM kody WHERE wykorzystany != 'N'");
$ku = mysql_num_rows($k2);
//Wróæ do bazy œwiata
cdb_server();
	$tpl->assign('error',$error);	
	$tpl->assign('kody_n',$kn);	
	$tpl->assign('kody_u',$ku);	
?>
