<?
	require_once('include.inc.php');

	if($_GET['key'] == $config['auto_build']['key']){
		$sql = $db->query("SELECT `main`,`barracks`,`stable`,`garage`,`smith`,`place`,`market`,`wood`,`stone`,`iron`,`farm`,`storage`,`hide`,`wall`,`id`,`points`,`last_grow` FROM `villages` WHERE `userid` = '-1' AND `points` <= '".$config['auto_build']['max_points']."'");
	    while($vill = $db->Fetch($sql)){
			$grow = $vill['last_grow']+($config['auto_build']['grow_time']*60);
			if($grow <= time()){
				$builds = array('main','barracks','stable','garage','smith','place','market','wood','stone','iron','farm','storage','hide','wall');
				$stages = array('30','25','20','15','20','1','25','30','30','30','30','30','10','20');
				$rand = rand(0,13);
				$build = $builds[$rand];
				$max_stage = $stages[$rand];
				if($vill[$build] < $max_stage){
					$db->query("UPDATE `villages` SET `".$build."` = ".$vill[$build]."+1, `last_grow` = '".time()."' WHERE `id` = '".$vill['id']."'");
				}
				load_bh($vill['id']);
			}
		}
		reload_all_village_points();
?>
<html>
<head>
	<title>Auto Build - Empire of War | By Felipe Medeiros</title>
	<meta http-equiv="refresh" content="<?=$config['auto_build']['refresh'];?>">
</head>
<body style="text-align:center;">
	<b>Auto Build OK!</b><br />
	By Felipe Medeiros.
</body>
</html>
<? }else{ ?>
<html>
<head>
	<title>Auto Build - Empire of War | By Felipe Medeiros</title>
</head>
<body style="text-align:center;">
	<b>Chave de seguran&ccedil;a invalida!</b><br />
	Auto build by <b>Felipe Medeiros</b>.
</body>
</html>
<? } ?>