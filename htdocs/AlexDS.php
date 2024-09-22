<?php
//mysql connection - not using the class because of an error
include("include.inc.php");
include("include/config.php");
$link=mysql_connect($config['localhost'],$config['db_user'],$config['db_pw']) or die("not");
mysql_select_db($config['db_name']) or die("not");

$current_version=1.1;

class AlexDS{
/************************************* Class created by Alex__ aka Hip_hop_x *************************************************
class created to make my work simple
you're free to use this class to, that's why it's open source
*/
		function get_points($id){
			global $config,$link;
			$r=mysql_fetch_array(mysql_query("SELECT userid FROM villages WHERE id='{$id}' LIMIT 1"));
			$sql=mysql_query("SELECT points FROM villages WHERE userid='{$r['userid']}'");
				
				while($row=mysql_fetch_array($sql)){
					//counting all the points
					$points+=$row['points'];
				}
			return $points;
		}
		function get_id($x,$y){
			global $link;
			$q=mysql_query("SELECT id FROM villages WHERE x='$x' AND y='$y' LIMIT 1");
			$r=mysql_fetch_array($q);
			return $r['id'];
		}
		function moral_by_ids($def_id,$at_id){
			return calc_moral($this->get_points($def_id),$this->get_points($at_id));
		}
}
$alex_class=new AlexDS();

?>