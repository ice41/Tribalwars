<?php


@set_time_limit('300');
if (!empty($cfg['MemoryLimit'])) {
    @ini_set('memory_limit','512M');
	}

$krzaki_typy_x_y = array (
	1 => array(array(1 => array('see.png')),array('0;0')),
	2 => array(array(1 => array('berg3.png','berg2.png'),2 => array('berg4.png','berg1.png')),array('0;0','1;0','0;1','1;1')),
	3 => array(array(1 => array('forest0000.png')),array('0;0')),
	4 => array(array(1 => array('forest0001.png','forest0100.png')),array('0;0','1;0')),
	5 => array(array(1 => array('forest1000.png'),2 => array('forest1010.png'),3 => array('forest0010.png')),array('0;0','0;1','0;2')),
	6 => array(array(1 => array('forest0001.png','forest0101.png','forest0100.png')),array('0;0','1;0','2;0')),
	7 => array(array(1 => array('forest1001.png','forest0100.png'),2 => array('forest0010.png','gras1.png')),array('0;0','1;0','0;1')),
	8 => array(array(1 => array('forest0001.png','forest1100.png'),2 => array('gras1.png','forest0010.png')),array('0;0','1;0','1;1')),
	9 => array(array(1 => array('forest0001.png','forest1101.png','forest0100.png'),2 => array('gras1.png','forest0010.png','gras1.png')),array('0;0','1;0','2;0','1;1')),
	10 => array(array(1 => array('gras1.png','forest1001.png','forest0100.png'),2 => array('forest0001.png','forest0110.png','gras1.png')),array('1;0','2;0','0;1','1;1')),
	11 => array(array(1 => array('forest0001.png','forest1100.png','gras1.png','gras1.png','gras1.png'),2 => array('gras1.png','forest1010.png','gras1.png','gras1.png','gras1.png'),3 => array('gras1.png','forest1010.png','gras1.png','gras1.png','gras1.png'),4 => array('gras1.png','forest1011.png','forest0101.png','forest1101.png','forest0100.png'),5 => array('forest0001.png','forest1110.png','gras1.png','forest0010.png','gras1.png'),6 => array('gras1.png','forest0010.png','gras1.png','gras1.png','gras1.png')),array('0;0','1;0','1;1','1;2','1;3','2;3','3;3','4;3','0;4','1;4','3;4','1;5')),
	12 => array(array(1 => array('forest1001.png','forest0101.png','forest0100.png'),2 => array('forest0010.png','gras1.png','gras1.png')),array('0;0','1;0','2;0','0;1')),
	13 => array(array(1 => array('forest1000.png','gras1.png','gras1.png'),2 => array('forest0011.png','forest1100.png','gras1.png'),3 => array('gras1.png','forest1011.png','forest0100.png'),4 => array('gras1.png','forest1010.png','gras1.png'),5 => array('gras1.png','forest0010.png','gras1.png')),array('0;0','0;1','1;1','1;2','2;2','1;3','1;4')),
	14 => array(array(1 => array('gras1.png','gras1.png','gras1.png','gras1.png','forest1000.png'),2 => array('forest0001.png','forest0101.png','forest0101.png','forest0101.png','forest0110.png')),array('4;0','0;1','1;1','2;1','3;1','4;1')),
	);
	
$trawy = array('gras2.png','gras3.png','gras4.png');

if ($_GET['akcja'] == 'dodaj_krzaki' && isset($_POST)) {
	$_POST['typ'] = (int)$_POST['typ'];
	$_POST['typ'] = floor($_POST['typ']);
	$_POST['ile'] = (int)$_POST['ile'];
	$_POST['ile'] = floor($_POST['ile']);
	if ($_POST['ile'] < 1) {
		$_POST['ile'] = 1;
		}
	if ($_POST['ile'] > 5000) {
		$_POST['ile'] = 5000;
		}
		
	if (is_array($krzaki_typy_x_y[$_POST['typ']])) {
		for ($i = 1; $i <= $_POST['ile']; $i++) {
			$_counter_krzaki = 1;
			for ($a = 1; $a <= $_counter_krzaki; $a++) {
				$_RANDX = mt_rand(0,999);
				$_RANDY = mt_rand(0,999);
				$potzebne_pola_arr = $krzaki_typy_x_y[$_POST['typ']][1];
				$puste = 0;
				foreach ($potzebne_pola_arr as $pole) {
					$arr2 = explode(';',$pole);
					$_x = $arr2[0] + $_RANDX;
					$_y = $arr2[1] + $_RANDY;
					$COUNT_WIOSKI = sql("SELECT COUNT(id) FROM `villages` WHERE `x` = '$_x' AND `y` = '$_y'",'array');
					$COUNT_KRZAKI = sql("SELECT COUNT(id) FROM `krzaki` WHERE `x` = '$_x' AND `y` = '$_y'",'array');
					if ($COUNT_WIOSKI < 1 && $COUNT_KRZAKI < 1) {
						$puste++;
						}
					}
					
				$count_arr = count($potzebne_pola_arr);
				
				if ($puste == $count_arr) {
					foreach ($potzebne_pola_arr as $pole) {
						$arr2 = explode(';',$pole);
						$_x = $arr2[0] + $_RANDX;
						$_y = $arr2[1] + $_RANDY;
						$gknx = $arr2[1] + 1;
						$typ = $krzaki_typy_x_y[$_POST['typ']][0][$gknx][$arr2[0]];
						if ($_x < 1000 && $_y < 1000) {
							mysql_query("INSERT INTO krzaki(x,y,typ,typ2) VALUES('$_x','$_y','$typ','krzak')");
							}
						}
					} else {
					if ($_counter_krzaki < 30) {
						$_counter_krzaki++;
						}
					}
				}
			}
		header('LOCATION: game.php?village='.$village['id'].'&screen=admin&mode=krzaki');
		exit;
		} else {
		$error = 'Nie ma takiego krzaka!';
		}
	}
	
if ($_GET['akcja'] == 'dodaj_trawe' && isset($_POST)) {
	$_POST['ile'] = (int)$_POST['ile'];
	$_POST['ile'] = floor($_POST['ile']);
	if ($_POST['ile'] < 1) {
		$_POST['ile'] = 1;
		}
	if ($_POST['ile'] > 100000) {
		$_POST['ile'] = 100000;
		}
		
	for ($i = 1; $i <= $_POST['ile']; $i++) {
		$_counter_krzaki = 1;
		for ($a = 1; $a <= $_counter_krzaki; $a++) {
			$_RANDX = mt_rand(0,999);
			$_RANDY = mt_rand(0,999);
			$COUNT_WIOSKI = sql("SELECT COUNT(id) FROM `villages` WHERE `x` = '$_RANDX' AND `y` = '$_RANDY'",'array');
			$COUNT_KRZAKI = sql("SELECT COUNT(id) FROM `krzaki` WHERE `x` = '$_RANDX' AND `y` = '$_RANDY'",'array');
			
			if ($COUNT_WIOSKI < 1 && $COUNT_KRZAKI < 1) {
				$random_type = $trawy[mt_rand(0,2)];
				mysql_query("INSERT INTO krzaki(x,y,typ,typ2) VALUES('$_RANDY','$_RANDX','$random_type','trawa')");
				} else {
				if ($_counter_krzaki < 30) {
					$_counter_krzaki++;
					}
				}
			}
		}
	header('LOCATION: game.php?village='.$village['id'].'&screen=admin_krzaki');
	exit;
	
}	
$text = 'Esta página permite que adicione facilmente decorações ao mapa! Digite um número de <b>1 a 14</b> aqui e um arbusto com este ID será criado quantas vezes especificar. .';
$tpl->assign('text_tut',$text);

$tpl->assign('error',$error);

$tpl->assign('krzaki',$krzaki_typy_x_y);
;
?>