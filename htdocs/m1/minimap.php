<?
	require("include/config.php");
	require("lib/DB.php");
	require("lib/functions.php");
	require("lib/sid.php");
	//Definições, etc.
	$db = new DB_MySql;
	$db->connect($config['db_host'], $config['db_user'], $config['db_pw'], $config['db_name']);
	//Hack
		$sid = new sid();	//Declaração de variavel
		$session = $sid->check_sid($_COOKIE['session']); //Recebendo a sessão
		$userid  = $session['userid']; //Salvando userid
		if(!$userid) die("Relogue em sua conta!");
	//FIM
	ob_start();

	$iduser = $db->fetch($db->query('SELECT userid FROM villages WHERE id = '.intval($_GET['id'])));
	$iduser = $iduser['userid'];
	$sqluser = mysql_fetch_array($db->query("SELECT `ally`,`map_size`,`minimap_size` FROM `users` WHERE `id` = '$iduser'"));
	$tribuser = $sqluser[0];
	$mapsize_user = $sqluser[1];
	$pixeli_minimap = $sqluser[2];

	$image_size = $pixeli_minimap;
	$image_diameter = $image_size/5;
	$image_radius = floor($image_diameter/2);

	if($_GET['no'] <> 1){
		header("Content-type: image/png");
	}
	$img = ImageCreate($image_size,$image_size);

	if(!isset($_GET['x'])) $_GET['x'] = 0;
	if(!isset($_GET['y'])) $_GET['y'] = 0;
	$x = $_GET['x'];
	$y = $_GET['y'];
	settype($x, "integer");
	settype($y, "integer");
	//incarca obiectele

	$start_left_x = $x-$image_radius;
	$start_left_y = $y-$image_radius;
	$end_right_x = $x+$image_radius;
	$end_right_y = $y+$image_radius;

	$fond = ImageColorAllocate ($img,87,117,26);
	$liniimari = ImageColorAllocate ($img,47,72,13);
	$liniimici = ImageColorAllocate ($img,66,97,18);
	$liniicontinent = ImageColorAllocate ($img,0,0,0);
	$activ = ImageColorAllocate ($img,87,117,26);
	$sate = ImageColorAllocate ($img,130,60,10);
	$parasit = ImageColorAllocate ($img,150,150,150);
	$propriu = ImageColorAllocate ($img,240,200,0);
	$aliat = ImageColorAllocate ($img,0,160,244);
	$dusman = ImageColorAllocate ($img,244,0,0);
	$pna = ImageColorAllocate ($img,128,0,128);
	$trib = ImageColorAllocate ($img,0,0,244);
	$elem = ImageColorAllocate ($img,72,102,20);
	$active = ImageColorAllocate ($img,255,255,255);

	for($i = 1; $i <= $image_diameter; $i++){
		$curox = $start_left_x+$i;
		$curoy = $end_right_y-$i+1;
		$lx = $i*5;
		$ly = $i*5;
		settype($lines_arrx, "array");
		settype($lines_arry, "array");

		if($curox%5 == 0){
			$lines_arrx['mari'][$lx]=$liniimari;
		}else{
			$lines_arrx['mici'][$lx]=$liniimici;
		}

		if($curoy%5 == 0){
			$lines_arry['mari'][$ly] = $liniimari;
		}else{
			$lines_arry['mici'][$ly] = $liniimici;
		}

		if($curox%100 == 0){
			$lines_arrx['cont'][$lx] = $liniicontinent;
		}
		if($curoy%100 == 0){
			$lines_arry['cont'][$ly] = $liniicontinent;
		}
	}
	foreach($lines_arrx['mici'] as $key => $value){
		ImageLine($img,$key,0,$key,$image_size,$value);
	}
	foreach($lines_arry['mici'] as $key => $value){
		ImageLine($img,0,$key,$image_size,$key,$value);
	}

	if(is_array($lines_arrx['mari']) AND is_array($lines_arry['mari'])){
		foreach($lines_arrx['mari'] as $key => $value){
			ImageLine($img,$key,0,$key,$image_size,$value);
		}
		foreach($lines_arry['mari'] as $key => $value){
			ImageLine($img,0,$key,$image_size,$key,$value);
		}
	}

	if(is_array($lines_arrx['cont'])){
		foreach($lines_arrx['cont'] as $key => $value){
			ImageLine($img,$key,0,$key,$image_size,$value);
		}
	}
	if(is_array($lines_arry['cont'])){
		foreach($lines_arry['cont'] as $key => $value){
			ImageLine($img,0,$key,$image_size,$key,$value);
		}
	}

	$col = ImageColorAllocate ($img,255,255,255);

	$polygon_var = (floor($mapsize_user/2))*5;
	$a1 = $image_radius*5-$polygon_var;
	$b1 = $image_radius*5+$polygon_var+5;

	ImagePolygon($img,array($a1,$a1,$b1,$a1,$b1,$b1,$a1,$b1),4,$col);
	$q = $db->query("SELECT `id`,`x`,`y`,`userid` FROM `villages` WHERE `x` BETWEEN $start_left_x AND $end_right_x AND `y` BETWEEN $start_left_y AND $end_right_y");
	while($r = mysql_fetch_array($q)){
		$actual = $sate;
		$rx = $r['x'];
		$ry = $r['y'];
		$userid = $r['userid'];
		$tribsat = $db->query("SELECT `ally` FROM `users` WHERE `id` = '$userid'");
		$tribsat = mysql_fetch_array($tribsat);
		$tribsat = $tribsat[0];
		$type = $db->query("SELECT `type` FROM `ally_contracts` WHERE `from_ally` = '$tribuser' AND `to_ally` = '$tribsat'");
		$type = mysql_fetch_array($type);
		$type = $type[0];
		
		if($userid == "-1") $actual = $parasit;
		if ($tribsat == $tribuser and $tribsat <> -1 and !empty($tribsat)) $actual = $trib;
		if ($type == "enemy") $actual = $dusman;
		if ($type == "partner") $actual = $aliat;
		if ($type == "nap") $actual = $pna;
		if ($userid == $iduser) $actual = $propriu;
		if ($r['id'] == intval($_GET['id'])) $actual = $active;

		$rx = (($rx%$image_size-1)*5)+$image_radius*5-($x%$image_size-1)*5;
		$ry = ($y%$image_size-1)*5+$image_radius*5-(($ry%$image_size-1)*5);

		$rx = $rx%$image_size;
		$ry = $ry%$image_size;	
		
		if($rx < 0){
			$rx = $image_size+$rx;
		}

		if($ry < 0){
			$ry = $image_size+$ry;
		}
		
		imagefilledrectangle($img, $rx+1, $ry+1, $rx+4, $ry+4, $actual);
	}
	ImagePNG($img, null, 9);
	imagedestroy($img);
?>
