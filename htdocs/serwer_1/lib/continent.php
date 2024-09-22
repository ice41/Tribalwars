<?php
function add_user_continent($user,$x,$y) {
	$continent = (int)przydziel_osadzie_kontynent($x,$y);
	$if_add_continent = sql("SELECT COUNT(id) FROM `users` WHERE `id` = '$user' AND `kontynenty` LIKE '%$continent%'",'array');
	
	if ($if_add_continent == 0) {
		$constr = sql("SELECT `kontynenty` FROM `users` WHERE `id` = '$user'",'array');
		$array = del_emptys(explode(';',$constr));
		
		$array[] = $continent;
		
		$constr = implode(';',$array);
		
		mysql_query("UPDATE `users` SET `kontynenty` = '$constr'  WHERE `id` = '$user'");
		}
	}
	
function del_user_continent($user,$x,$y) {
	$continent = (int)przydziel_osadzie_kontynent($x,$y);
	
	if ($user != '-1') {
		$constr = sql("SELECT `kontynenty` FROM `users` WHERE `id` = '$user'",'array');
		$constr = str_replace($continent,'',$constr);
		
		$array = del_emptys(explode(';',$constr));
		
		$constr = implode(';',$array);
		
		mysql_query("UPDATE `users` SET `kontynenty` = '$constr'  WHERE `id` = '$user'");
		}
	}
?>