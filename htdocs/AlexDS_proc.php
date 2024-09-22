<?php
$page=$_GET['page'];	if(!is_numeric($page)){$page=1;}
require("AlexDS.php");

$alex_class=new AlexDS();

//Page 1| Show Moral Process - via ajax
if($page==1){
	$x=$_GET['x'];
	$y=$_GET['y'];
	$vid=$_GET['id'];
	
	echo $alex_class->moral_by_ids($alex_class->get_id($x,$y),$vid)."%";
}
?>