<?php 
if ($_GET['action'] == 'edit' and isset($_POST)) {
    foreach ($cl_builds->get_array('dbname') as $php_name) {
		$_POST[$php_name] = (int)$_POST[$php_name];
		
		if ($_POST[$php_name] < 0) {
			$_POST[$php_name] = 0;
			}
			
		if ($_POST[$php_name] > $cl_builds->get_maxstage($php_name)) {
			$_POST[$php_name] = 0;
			}
			
		if (in_array($php_name,$arr_builds_starts_by_one) and $_POST[$php_name] == 0) {
			$_POST[$php_name] = 1;
			}
		
		if ($_POST[$php_name] > 0) {
			$vill_points += $cl_builds->get_points($php_name,$_POST[$php_name]);	
			$vill_bh += $cl_builds->get_bh_total($php_name,$_POST[$php_name]);
			}
		
		mysql_query("ALTER TABLE `villages` CHANGE `".$php_name."` `".$php_name."` INT(5) DEFAULT '".$_POST[$php_name]."'");
		
		$arr[$php_name] = $_POST[$php_name];
		}
		
		
	$arr = implode(';',$arr);
	$p = fopen('bns.xth','w');
	fputs($p,$arr);
	fclose($p);
	

	$p = fopen('pts.xth','w');
	fputs($p,$vill_points);
	fclose($p);
	
	mysql_query("ALTER TABLE `villages` CHANGE `points` `points` INT(15) DEFAULT '$vill_points'");
	mysql_query("ALTER TABLE `villages` CHANGE `r_bh` `r_bh` INT(15) DEFAULT '$vill_bh'");
	header('location: index.php?screen=start_buildings');
	EXIT;
    }
$arr = explode(';',file_get_contents('bns.xth'));

$l = 0;
foreach ($cl_builds->get_array('dbname') as $php_name) {
	$out_buildings[$php_name]['name'] = $cl_builds->get_name($php_name);
	if (empty($arr[$l])) {
		$arr[$l] = 0;
		}
	$out_buildings[$php_name]['stage'] = $arr[$l];
	$l += 1;
	}

$tpl->assign('values',$arr);
$tpl->assign('buildings',$out_buildings);
?>