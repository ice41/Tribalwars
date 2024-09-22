<?php
include("include.inc.php");
include("include/config.php");
$link=mysql_connect($config['db_host'],$config['db_user'],$config['db_pw']) or die("not");
mysql_select_db("lan") or die("not");

$qq1 = mysql_query("SELECT * FROM villages WHERE id = '".$_GET['villid']."'");
$f1 = mysql_fetch_assoc($qq1);

if($f1['bonus'] == 1)
	{ 
	 echo "<b>50% mai mult&#259; capacitate de depozitare si negustori</b>";
	}
	elseif($f1['bonus'] == 2)
	{
	 echo "<b>10% mai mult&#259; popula&#355;ie</b>";
	}
	elseif($f1['bonus'] == 3)
	{
	 echo "<b>33% produc&#355;ie mai rapid&#259; &#238;n grajd</b>";
	}
	elseif($f1['bonus'] == 4)
	{
	 echo "<b>33% produc&#355;ie mai rapid&#259; &#238;n cazarm&#259;</b>";
	}
	elseif($f1['bonus'] == 5)
	{
	 echo "<b>50% produc&#355;ie mai rapid&#259; &#238;n atelier</b>";
	}
	elseif($f1['bonus'] == 6)
	{
	 echo "<b>30% produc&#355;ie m&#259;rit&#259; de resurse</b>";
	}
?>