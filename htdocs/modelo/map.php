<?php
require 'include.inc.php';
require ('lib/pl.php');
		$pl = new pl();
		
foreach ($_GET as $v => $n) {
$v = @explode('_',$v);
if ($v[0]%2 == 0 && $v[1]%2 == 0) {
$cordy = $v;
}
}
$x = $cordy[0];
$y = $cordy[1];
$_GET['x'] = $x;
$_GET['y'] = $y;
function graficzka_mapki($uid,$bonus,$punkty) {
if ($uid == -1) {
if ($bonus != -1) {
	if ($punkty >= 0 xor 299 <= $punkty) {
			$grafika = 4;
			}
	    elseif ($punkty >= 300 xor 999 <= $punkty) {
			$grafika = 6;
			}
		elseif ($punkty >= 1000 xor 2999 <= $punkty) {
			$grafika = 8;
			}
		elseif ($punkty >= 3000 xor 8999 <= $punkty) {
		    $grafika = 10;
		    }
	    elseif ($punkty >= 9000 xor 10999 <= $punkty) {
		    $grafika = 12;
	    	}
	    elseif ($punkty >= 11000) {
			$grafika = 14;
		    }
	} else {
	if ($punkty >= 0 xor 299 <= $punkty) {
			$grafika = 16;
			}
	    elseif ($punkty >= 300 xor 999 <= $punkty) {
			$grafika = 18;
			}
		elseif ($punkty >= 1000 xor 2999 <= $punkty) {
			$grafika = 20;
			}
		elseif ($punkty >= 3000 xor 8999 <= $punkty) {
		    $grafika = 22;
		    }
	    elseif ($punkty >= 9000 xor 10999 <= $punkty) {
		    $grafika = 24;
	    	}
	    elseif ($punkty >= 11000) {
			$grafika = 26;
		    }
}
} else {
if ($bonus != -1) {
	if ($punkty >= 0 xor 299 <= $punkty) {
			$grafika = 5;
			}
	    elseif ($punkty >= 300 xor 999 <= $punkty) {
			$grafika = 7;
			}
		elseif ($punkty >= 1000 xor 2999 <= $punkty) {
			$grafika = 9;
			}
		elseif ($punkty >= 3000 xor 8999 <= $punkty) {
		    $grafika = 11;
		    }
	    elseif ($punkty >= 9000 xor 10999 <= $punkty) {
		    $grafika = 13;
	    	}
	    elseif ($punkty >= 11000) {
			$grafika = 15;
		    }
	} else {
	if ($punkty >= 0 xor 299 <= $punkty) {
			$grafika = 17;
			}
	    elseif ($punkty >= 300 xor 999 <= $punkty) {
			$grafika = 19;
			}
		elseif ($punkty >= 1000 xor 2999 <= $punkty) {
			$grafika = 21;
			}
		elseif ($punkty >= 3000 xor 8999 <= $punkty) {
		    $grafika = 23;
		    }
	    elseif ($punkty >= 9000 xor 10999 <= $punkty) {
		    $grafika = 25;
	    	}
	    elseif ($punkty >= 11000) {
			$grafika = 27;
		    }
}
}	
return $grafika;
}



$sid = $_COOKIE['session'];
$hkey = $_COOKIE['hkey'];
$_GET['y'] = floor($_GET['y']);
$_GET['x'] = floor($_GET['x']);

$sid = new sid;
$user_sid = $sid->check_sid($_COOKIE['session']);
if (is_array($user_sid)) {
$user = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id = ".$user_sid['userid'].""));
} else {
exit;
}


$mapa['kontynent'] = przydziel_osadzie_kontynent($_GET['x'],$_GET['y']);
$mapa['x'] = $_GET['x'];
$mapa['y'] = $_GET['y'];
$mapa['polowa'] = floor($user['map_size'] / 2);
$mapa['min_x'] = $mapa['x'] - $mapa['polowa'];
$mapa['max_x'] = $mapa['x'] + $mapa['polowa'];
$mapa['min_y'] = $mapa['y'] - $mapa['polowa'];
$mapa['max_y'] = $mapa['y'] + $mapa['polowa'];
	
for ($i = $mapa['min_y']; $i <= $mapa['max_y']; $i ++) {
	$mapa['y_coordy'][$i] = $i; 
	}
		
for ($i = $mapa['min_x']; $i <= $mapa['max_x']; $i ++) {
    $mapa['x_coordy'][$i] = $i;
	}
$x = $_GET['x'];


if (!isset($_GET['x'])) {
	$_GET['x'] = $village['x'];
    }
	
if (!isset($_GET['y'])) {
	$_GET['y'] = $village['y'];
    }
	
$_GET['x'] = (int)$_GET['x'];
$_GET['y'] = (int)$_GET['y'];
	
if ($_GET['x'] < 0) {
	$_GET['x'] = 0;
    }
	
if ($_GET['x'] > 999) {
	$_GET['x'] = 999;
	}
	
if ($_GET['y'] < 0) {
	$_GET['y'] = 0;
    }
	
if ($_GET['y'] > 999) {
	$_GET['y'] = 999;
	}
	
$_GET['y'] = floor($_GET['y']);
$_GET['x'] = floor($_GET['x']);
		
$mapa['kontynent'] = przydziel_osadzie_kontynent($_GET['x'],$_GET['y']);
$mapa['x'] = $_GET['x'];
$mapa['y'] = $_GET['y'];
$mapa['polowa'] = floor($user['map_size'] / 2);
$mapa['min_x'] = $mapa['x'] - $mapa['polowa'];
$mapa['max_x'] = $mapa['x'] + $mapa['polowa'];
$mapa['min_y'] = $mapa['y'] - $mapa['polowa'];
$mapa['max_y'] = $mapa['y'] + $mapa['polowa'];

$mapa['polowa_2'] = floor($user['map_size'] * 2 );
$mapa['min_x_2'] = $mapa['x'] - $mapa['polowa_2'];
$mapa['max_x_2'] = $mapa['x'] + $mapa['polowa_2'];
$mapa['min_y_2'] = $mapa['y'] - $mapa['polowa_2'];
$mapa['max_y_2'] = $mapa['y'] + $mapa['polowa_2'];
$x_max = $x + 20;
$y_max = $y + 20;
$y_min = $y - 1;
$x_rz = $x;
$i = 0;


?>
[{"x":<?php echo $x; ?>,"y":<?php echo $y; ?>,"tiles":[[32,0,0,0,0,32,0,0,0,32,0,0,0,0,32,0,0,0,32,0],[0,0,0,0,0,0,32,0,0,0,0,0,32,0,0,32,0,0,0,0],[32,0,0,32,0,0,0,0,0,0,0,0,0,0,0,0,0,32,0,32],[0,32,0,0,0,32,0,0,0,32,0,0,0,32,0,0,32,0,0,0],[0,32,0,0,0,0,32,0,0,0,0,32,0,32,0,0,0,0,0,32],[0,0,0,0,0,0,0,32,0,0,0,0,0,0,0,0,32,0,0,0],[0,0,0,0,0,0,0,0,0,0,0,32,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,32],[0,0,0,0,0,0,0,32,0,0,0,0,0,0,0,0,32,0,0,32],[0,0,0,0,0,32,0,0,0,0,32,0,32,0,32,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],[0,0,32,0,0,0,0,32,0,0,0,32,0,0,0,0,0,0,0,0],[0,0,32,0,0,0,32,0,0,0,0,32,0,0,0,0,32,0,0,0],[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0,0,0,0,0,32,0,0,0,0,0],[0,0,0,0,0,0,32,0,0,0,0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0,0,0,0,32,0,0,0,32,0,0,32,0],[0,0,0,0,0,0,0,0,0,32,0,0,0,32,0,32,0,0,0,32]],"data":{"x":<?php echo $x; ?>,"y":<?php echo $y; ?>,"villages":[
<?php 
$tcn = mysql_num_rows(mysql_query("SELECT * FROM `villages` WHERE x >= ".$mapa['min_x']." && x <= ".$mapa['max_x']." && y >= ".$mapa['min_y']." && y <= ".$mapa['max_y'].""));
if ($tcn > 0) {
while(($x_rz < $x_max+1)){
$x_rz++;
$gids = '';
echo '{';
$przecinek = 0;
$query[$x_rz] = mysql_query("SELECT * FROM `villages` WHERE x = ".$x_rz." && y >= $y-1 && y <= $y_max");
while ($vg = mysql_fetch_assoc($query[$x_rz])) {
$nrw = mysql_num_rows($query[$x_rz]);
$punkty = $vg['points'];
$bonus = $vg['bonus'];
$uid = $vg['userid'];


$grafika = graficzka_mapki($uid,$bonus,$punkty);
	if ($vg['userid'] == -1) {
	$vg['userid'] = 0;
	$vg['name'] = 'wioska barbarzy\u0144ska';
	}
	$przecinek++;
	$vgx = $vg['x'];
	$vgy = $vg['y'];
    $i = $vgy - $y; 
   echo '"'.$i.'":["'.$vg['id'].'",'.$grafika.',"'.$vg['name'].'","'.format_number2($vg['points']).'","'.$vg['userid'].'","100"]';

	if ($przecinek < $nrw) {
	echo ',';
	}
		}
	echo '}';
	if ($x_rz < $x_max+1) {
	echo ',';
	}
	//"0":["4219",7,"zoomoptic","908","698222407","100"]
	//"1":["478",16,"0","66","0","25"]
}
}?>],"players":{
<?php 
$query_2 = mysql_query("SELECT * FROM users");
$przecinek = 0;
while($row = mysql_fetch_array($query_2)){
$przecinek++;
$nrw = mysql_num_rows($query_2);
if ($row['ally'] < 0) {
$row['ally'] = 0;
}
if ($config['noob_protection'] == '-1') {
	$och = 0;
	} else {
	$time_as_start = date("U") - $user['start_gaming'];
	$config['noob_protection_seconds'] = $config['noob_protection'] * 60;
	if ($time_as_start > $config['noob_protection_seconds']) {
		$och = 0;
		} else {
		$noob_end = $pl->format_date($user['start_gaming'] + $config['noob_protection_seconds']);
		$och = '"'.$noob_end.'"';
		}
	}
echo '"'.$row['id'].'":["'.$row['username'].'","'.format_number2($row['points']).'","'.$row['ally'].'",'.$och.']';
	if ($przecinek < $nrw) {
	echo ',';
	}
}

?>},"allies":{
<?php
//"208":["Senatus PopulusQue Romanus 2","6.215.838","SPQR 2"]
$query_3 = mysql_query("SELECT * FROM ally");
$przecinek = 0;
while($row = mysql_fetch_array($query_3)){
$przecinek++;
$nrw = mysql_num_rows($query_3);

echo '"'.$row['id'].'":["'.$row['name'].'","'.format_number2($row['points']).'","'.$row['short'].'"]';
	if ($przecinek < $nrw) {
	echo ',';
	}
}
?>
}}}]
<?php /*[ echo '[';
/*{"x":0,"y":0,"data":{"x":0,"y":0,"villages":[],"players":[],"allies":[]}}
echo '{"x":'; echo $mapa['min_x'];
echo ',"y":'; echo $mapa['min_y'];
echo ',"data": '; echo '{"x":'; echo $mapa['min_x'];echo ',"y":'; echo $mapa['min_y'].', "villages:"[{';

	$query['big_arr'] = mysql_query("SELECT * FROM `villages` WHERE x >= ".$mapa['min_x']." && x <= ".$mapa['max_x']." && y >= ".$mapa['min_y']." && y <= ".$mapa['max_y']."");
	while ($vg = mysql_fetch_array($query['big_arr'])) {
$punkty = $vg['points'];
$bonus = $vg['bonus'];
$uid = $vg['userid'];

$grafika = graficzka_mapki($uid,$bonus,$punkty);
	if ($vg['userid'] == -1) {
	$vg['userid'] = 0;
	$vg['name'] = 0;
	}
	$vgx = $vg['x'];
	$vgy = $vg['y'];
if ($vgx == $mapa['min_x'] && $vgy == $mapa['min_y']) {	
$i = 1;
} 
$i = $vgy - $mapa['min_y'];
$vgy_s = ($vgx - $mapa['min_x']) * floor($user['map_size']);

$i = $i + $vgy_s;
$i = $i + $user['map_size'];

      echo '"'.$i.'":['.$vg['id'].','.$grafika.',"'.$vg['name'].'","'.format_number2($vg['points']).'","'.$vg['userid'].'","25"]';
		}
echo '}],';

echo '"players":[{';
/*{"698698":["sevenofnine","1.986.659","0",0]
	$query['big_arr'] = mysql_query("SELECT * FROM `users`");
	while ($us = mysql_fetch_array($query['big_arr'])) {
	if ($us['ally'] == -1) {
	$us['ally'] = 0;
	}
	echo '"'.$us['id'].'":["'.$us['username'].'","'.format_number2($us['points']).'","'.$us['ally'].'",0]';
	}
echo '}],';
echo '"allies":[{';
/*"1822":["WOJOWNICY 1","9.083.164","WOJO-1"]
	$query['big_arr'] = mysql_query("SELECT * FROM `ally`");
	while ($al = mysql_fetch_array($query['big_arr'])) {

	echo '"'.$al['id'].'":["'.$al['name'].'","'.format_number2($al['points']).'","'.$al['short'].'"]';
	}
echo '}],';
echo ']';]*/ ?>