<?php
foreach ($cl_units->get_array("dbname") as $nazwa => $unit) {
	if ($cl_units->recruit_in[$unit] == 'statue') {
		$units[$nazwa] = $unit;
		}
	}
	
$f_modes = array('main' => 'Rycerz','inventory' => 'Zbrojownia');

$mode_name = $f_modes[$_GET['mode']];

if (empty($mode_name)) $_GET['mode'] = 'main';

if ($_GET['mode'] == 'inventory') {
	$pala_items_arr = explode(';',$user['pala_items']);
	$pala_items_arr = del_emptys($pala_items_arr);
		
	if (count($pala_bonus) > count($pala_items_arr)) {
		$pala_all_items = false;
		} else {
		$pala_all_items = true;
		}
		
	if (count($pala_items_arr) < 1) {
		$pala_none_items = true;
		} else {
		$pala_none_items = false;
		}
		
	$procent_to_next_item = $user['pala_to_next_item'] / 50;
	
	if ($_GET['action'] == 'change_pala_item' && isset($_GET['item_name'])) {
		if (in_array($_GET['item_name'],$pala_items_arr)) {
			mysql_query("UPDATE `users` SET `pala_aktu_item` = '".$_GET['item_name']."' WHERE `id` = '".$user['id']."'");
			header('location: game.php?village='.$village['id'].'&screen='.$_GET['screen'].'&mode=inventory');
			exit;
			} else {
			$error = 'Nie posiadasz takiego przedmiotu';
			}
		}
		
	$user['pala_aktu_item'] = entparse($user['pala_aktu_item']);
		
	$coords = array(
		'unit_spear' => '115,15,110,410,125,410,130,15',
		'unit_sword' => '329,225,365,254,438,233,365,205',
		'unit_axe' => '130,260,190,260,190,330,165,330,165,410,155,410,155,330,130,330',
		'unit_archer' => '196,159,192,409,247,348,248,234',
		'unit_spy' => '407,273,342,293,332,276,390,260',
		'unit_light' => '240,58,249,316,265,316,261,54',
		'unit_marcher' => '495,250,550,212,522,390,486,353',
		'unit_heavy' => '100,15,80,80,70,410,100,410,90,100',
		'unit_ram' => '351,152,450,155,450,214,425,214,417,183,356,173',
		'unit_catapult' => '50,15,30,130,50,130,75,15',
		'unit_snob' => '415,273,391,291,475,305,481,280',
		);
		
	$tpl->assign('pala_all_items',$pala_all_items);
	$tpl->assign('pala_coords',$coords);
	$tpl->assign('pala_none_items',$pala_none_items);
	$tpl->assign('user_pala_arr',$pala_items_arr);
	$tpl->assign('pala_bonuses',$pala_bonus);
	$tpl->assign('proc_to_next_item',floor($procent_to_next_item * 100));
	$tpl->assign('img_width',floor($procent_to_next_item * 390));
	$tpl->assign('error',$error);
	} else {
	$counter = 0;
	$trening_query = mysql_query("SELECT time_finished,unit,num_finished,time_per_unit,id,num_unit,time_start FROM `recruit` WHERE `villageid` = '".$village['id']."' AND `building` = '".$_GET['screen']."' ORDER BY time_finished");
	while($trenowanie = mysql_fetch_assoc($trening_query)) {
		if ($counter == 0) {
			$trenowanie_w_palacu[$trenowanie['id']]['lit'] = true;
			} else {
			$trenowanie_w_palacu[$trenowanie['id']]['false'] = true;
			}
		$trenowanie_w_palacu[$trenowanie['id']]['num_unit'] = $trenowanie['num_unit'] - floor($trenowanie['num_finished']);
		$trenowanie_w_palacu[$trenowanie['id']]['unit'] = $trenowanie['unit'];
		$trenowanie_w_palacu[$trenowanie['id']]['time_finished'] = $trenowanie['time_finished'];
		$trenowanie_w_palacu[$trenowanie['id']]['countdown'] = $trenowanie['time_finished'] - date("U");
		$trenowanie_w_palacu[$trenowanie['id']]['trwanie'] = $trenowanie['time_finished'] - $trenowanie['time_start'];
		$counter += 1;
		}
	
	if ($_GET['action'] == 'anuluj' and isset($_GET['id']) && $_GET['h'] == $session['hkey']) {
		$_GET['id'] = (int)$_GET['id'];
		$counter = sql("SELECT COUNT(id) FROM `recruit` WHERE `id` = '".$_GET['id']."' AND `villageid` = '".$village['id']."'",'array');
		if ($counter > 0) {
			$info_trenowaniu = sql("SELECT num_unit,num_finished,building,unit,time_finished,time_start FROM `recruit` WHERE `id` = '".$_GET['id']."'",'assoc');
			$jednostki_poz = $info_trenowaniu['num_unit'] - floor($info_trenowaniu['num_finished']);
			$do_oddania['wood'] = floor($jednostki_poz * $cl_units->get_woodprice($info_trenowaniu['unit']) * 0.9);
			$do_oddania['stone'] = floor($jednostki_poz * $cl_units->get_stoneprice($info_trenowaniu['unit']) * 0.9);
			$do_oddania['iron'] = floor($jednostki_poz * $cl_units->get_ironprice($info_trenowaniu['unit']) * 0.9);
			$do_oddania['bh'] = $jednostki_poz * $cl_units->get_bhprice($info_trenowaniu['unit']);
			mysql_query("UPDATE `villages` SET `r_stone` = `r_stone` + '".$do_oddania['stone']."' , `r_wood` = `r_wood` + '".$do_oddania['wood']."' , `r_iron` = `r_iron` + '".$do_oddania['iron']."' , `r_bh` = `r_bh` - '".$do_oddania['bh']."' WHERE `id` = '".$village['id']."'");
			mysql_query("DELETE FROM `recruit` WHERE `id` = '".$_GET['id']."'");
			mysql_query("DELETE FROM `events` WHERE `event_id` = '".$_GET['id']."' AND `event_type` = 'recruit'");
			$cts = $info_trenowaniu['time_finished'] - date("U");
			mysql_query("UPDATE `recruit` SET `time_finished` = `time_finished` - '".$cts."' , `time_start` = `time_start` - '".$cts."' , `last_reload` = `last_reload` - '".$cts."' WHERE `villageid` = '".$village['id']."' AND `id` > '".$_GET['id']."' AND `building` = '".$_GET['screen']."'");
			 mysql_query("UPDATE `users` SET `pala_train` = '0' WHERE `id` = '".$user['id']."'");
			header('location: game.php?village='.$village['id'].'&screen='.$_GET['screen']);
			exit;
			} else {
			$error = 'Nie ma takiego zlecenia';
			}
		}
	
	if ($_GET['action'] == 'train' && in_array($_GET['unit'],$units) && $_GET['h'] == $session['hkey'] && $user['pala_train'] != 1 && $user['paladins'] != 1) {
		$user['pala_train'] = sql("SELECT `pala_train` FROM `users` WHERE `id` = '".$user['id']."'",'array');
		$user['paladins'] = sql("SELECT `paladins` FROM `users` WHERE `id` = '".$user['id']."'",'array');
		if ($user['pala_train'] < 1 && $user['paladins'] < 1) {
			if ($village['r_wood'] >= $cl_units->get_woodprice($_GET['unit']) && $village['r_stone'] >= $cl_units->get_stoneprice($_GET['unit']) && $village['r_iron'] >= $cl_units->get_ironprice($_GET['unit'])) {
				if (($maxfarm - $village['r_bh']) >= $cl_units->get_bhprice($_GET['unit'])) {
					mysql_query("UPDATE `villages` SET `r_stone` = `r_stone` - '".$cl_units->get_woodprice($_GET['unit'])."' , `r_wood` = `r_wood` - '".$cl_units->get_stoneprice($_GET['unit'])."' , `r_iron` = `r_iron` - '".$cl_units->get_ironprice($_GET['unit'])."' ,  `r_bh` = `r_bh` + '".$cl_units->get_bhprice($_GET['unit'])."' WHERE `id` = '".$village['id']."'");
					mysql_query("UPDATE `users` SET `pala_train` = '1' WHERE `id` = '".$user['id']."'");
					$cl_units->recruit_units($_GET['unit'],1,'statue',$village['statue'],$village['id']);	
				
					header("location: game.php?village=".$village['id'].'&screen=statue&mode=main');
					exit;
					} else {
					$error = 'Posiadasz za ma³o miejsca w zagrodzie.';
					}
				} else {
				$error = 'Posiadasz za ma³o surowców.';
				}
			}
		}
		
	if ($_GET['action'] == 'change_pala_name' && count($_POST) > 0 && $user['paladins'] == 1 && $_GET['h'] == $session['hkey']) {
		$_POST['nazwa'] = cmp_str($_POST['nazwa'],1,35);
		
		if ($_POST['nazwa'] === 'SHORT') {
			$error = 'Nazwa twojego rycerza nie mo¿e byæ pusta!';
			}
		elseif ($_POST['nazwa'] === 'LONG') {
			$error = 'Nazwa twojego rycerza nie mo¿e przekraczaæ 35 znaków!';
			}
		elseif ($_POST['nazwa'] === 'SPACES') {
			$error = 'Nazwa twojego rycerza nie mo¿e sk³adaæ siê z samych spacji';
			} else {
			$_POST['nazwa'] = parse($_POST['nazwa']);
			
			mysql_query("UPDATE `users` SET `pala_name` = '".$_POST['nazwa']."' WHERE `id` = '".$user['id']."'");
			header("location: game.php?village=".$village['id'].'&screen=statue&mode=main');
			exit;
			}
		}	
	$tpl->assign('pala_name',entparse($user['pala_name']));
	$tpl->assign('error',$error);
	$tpl->assign('wolni_osadnicy',$maxfarm - $village['r_bh']);
	$tpl->assign('jed_produkcja',$trenowanie_w_palacu);
	}
	
$tpl->assign('cl_units',$cl_units);
$tpl->assign('units',$units);
$tpl->assign('modes',$f_modes);
?>