<?php		
if ($village[$_GET['screen']] > 0) {
   $show_build = true;
   } else {
   $show_build = false;
   }
   
if ($config['ag_style'] == 1) {
	//Mody
	$mody = array('Trening szlachty' => 'poj_monety','Wybijanie monet' => 'mass_monety');

	if (!in_array($_GET['mode'],$mody)) {
		$_GET['mode'] = 'poj_monety';
		}
	} else {
	$_GET['mode'] = 'poj_monety';
	}
   
if ($_GET['mode'] == 'poj_monety') {
	//Akcja wybiæ monetê:
	if ($_GET['action'] == 'wybij_monete') {
		if ($village['r_wood'] > $config['koszt_monety']['wood'] && $village['r_stone'] > $config['koszt_monety']['stone'] && $village['r_iron'] > $config['koszt_monety']['iron']) {
			mysql_query("UPDATE `villages` SET `r_stone` = `r_stone` - '".$config['koszt_monety']['stone']."' WHERE `id` = '".$village['id']."'");
			mysql_query("UPDATE `villages` SET `r_wood` = `r_wood` - '".$config['koszt_monety']['wood']."' WHERE `id` = '".$village['id']."'");
			mysql_query("UPDATE `villages` SET `r_iron` = `r_iron` - '".$config['koszt_monety']['iron']."' WHERE `id` = '".$village['id']."'");
			mysql_query("UPDATE `users` SET `monety` = `monety` + '1' WHERE `id` = '".$user['id']."'");
			header('location: game.php?village='.$village['id'].'&screen='.$_GET['screen']);
			exit;
			} else {
			$error = 'Posiadasz za ma³o surowców, aby wybiæ monetê';
			}
		}
   
	//Pobraæ tablicê z jednostkami trenowanymi w pa³acu:

	$counter = 0;
	$trening_query = mysql_query("SELECT time_finished,unit,num_finished,time_per_unit,id,num_unit,time_start FROM `recruit` WHERE `villageid` = '".$village['id']."' AND `building` = '".$_GET['screen']."' ORDER BY time_finished");
	while($trenowanie = mysql_fetch_assoc($trening_query)) {
		if ($counter == 0) {
			$trenowanie_w_palacu[$trenowanie['id']]['lit'] = true;
			
			if ($trenowanie['time_per_unit'] > 10) {
				$first_unit['is'] = true;
				$first_unit['unitname'] = $cl_units->get_name($trenowanie['unit']);
				$first_unit['time_to_train'] = floor((date("U") - $trenowanie['time_start']) - ($trenowanie['time_per_unit'] * ($trenowanie['num_finished'] + 1))) * -1;
				if ($first_unit['time_to_train'] < 0) {
					$first_unit['is'] = false;
					}
				} else {
				$first_unit['is'] = false;
				}
			} else {
			$trenowanie_w_palacu[$trenowanie['id']]['lit'] = false;
			}
		$trenowanie_w_palacu[$trenowanie['id']]['num_unit'] = $trenowanie['num_unit'] - floor($trenowanie['num_finished']);
		$trenowanie_w_palacu[$trenowanie['id']]['unit'] = $trenowanie['unit'];
		$trenowanie_w_palacu[$trenowanie['id']]['time_finished'] = $trenowanie['time_finished'];
		$trenowanie_w_palacu[$trenowanie['id']]['countdown'] = $trenowanie['time_finished']- date("U");
		$trenowanie_w_palacu[$trenowanie['id']]['trwanie'] = $trenowanie['time_finished'] - $trenowanie['time_start'];
		$counter += 1;
		}
	
	//Akcja przerwij trenowanie:
	if ($_GET['action'] == 'cancel') {
		$_GET['id'] = (int)$_GET['id'];
		$counter = sql("SELECT COUNT(id) FROM `recruit` WHERE `id` = '".$_GET['id']."' AND `villageid` = '".$village['id']."'",'array');
		if ($counter > 0) {
			$info_trenowaniu = sql("SELECT num_unit,num_finished,building,unit,time_finished,time_start FROM `recruit` WHERE `id` = '".$_GET['id']."'",'assoc');
			$jednostki_poz = $info_trenowaniu['num_unit'] - floor($info_trenowaniu['num_finished']);
			$do_oddania['wood'] = floor($jednostki_poz * $cl_units->get_woodprice($info_trenowaniu['unit']) * 0.9);
			$do_oddania['stone'] = floor($jednostki_poz * $cl_units->get_stoneprice($info_trenowaniu['unit']) * 0.9);
			$do_oddania['iron'] = floor($jednostki_poz * $cl_units->get_ironprice($info_trenowaniu['unit']) * 0.9);
			$do_oddania['bh'] = $jednostki_poz * $cl_units->get_bhprice($info_trenowaniu['unit']);
			mysql_query("UPDATE `villages` SET `r_stone` = `r_stone` + '".$do_oddania['stone']."' WHERE `id` = '".$village['id']."'");
			mysql_query("UPDATE `villages` SET `r_wood` = `r_wood` + '".$do_oddania['wood']."' WHERE `id` = '".$village['id']."'");
			mysql_query("UPDATE `villages` SET `r_iron` = `r_iron` + '".$do_oddania['iron']."' WHERE `id` = '".$village['id']."'");
			mysql_query("UPDATE `villages` SET `r_bh` = `r_bh` - '".$do_oddania['bh']."' WHERE `id` = '".$village['id']."'");
			mysql_query("DELETE FROM `recruit` WHERE `id` = '".$_GET['id']."'");
			$cts = $info_trenowaniu['time_finished'] - date("U");
			mysql_query("UPDATE `recruit` SET `time_finished` = `time_finished` - '".$cts."' WHERE `villageid` = '".$village['id']."' AND `id` > '".$_GET['id']."' AND `building` = '".$_GET['screen']."'");
			mysql_query("UPDATE `recruit` SET `time_start` = `time_start` - '".$cts."' WHERE `villageid` = '".$village['id']."' AND `id` > '".$_GET['id']."' AND `building` = '".$_GET['screen']."'");
			mysql_query("UPDATE `recruit` SET `last_reload` = `last_reload` - '".$cts."' WHERE `villageid` = '".$village['id']."' AND `id` > '".$_GET['id']."' AND `building` = '".$_GET['screen']."'");
			header('location: game.php?village='.$village['id'].'&screen='.$_GET['screen']);
			exit;
			} else {
			$error = 'Nie ma takiego zlecenia';
			}
		}
	
	//Utworzyæ tablicê z jednostkami trenowanymi w pa³acu:
 
	foreach($cl_units->get_array("dbname") as $nazwa => $jednostka) {
		if ($cl_units->recruit_in[$jednostka] === $_GET['screen']) {
			$jednostki_w_palacu[$jednostka] = $nazwa;
			$jednostki_w_wiosce[$jednostka] = sql("SELECT `".$jednostka."` FROM `unit_place` WHERE `villages_from_id` = '".$village['id']."'",'array');
			$jednostki_ogulnie[$jednostka] = sql("SELECT `all_".$jednostka."` FROM `villages` WHERE `id` = '".$village['id']."'",'array');
			$jednostki_szlachcic_w_wioskach += sql("SELECT SUM(all_".$jednostka.") FROM `villages` WHERE `userid` = '".$user['id']."'","array");
			}
		}
	
	//Ustal limit szlachty:
	$szlachta_trening = sql("SELECT SUM(num_unit) - SUM(num_finished) FROM `recruit` WHERE `userid` = '".$user['id']."' AND `building` = '".$_GET['screen']."'",'array');
	
	if ($config['ag_style'] == 0) {
		$limit_szlachty = sql("SELECT SUM(snob) FROM `villages` WHERE `userid` = '".$user['id']."'","array");
		}
	if ($config['ag_style'] == 1) {
		$monety = sql("SELECT `monety` FROM `users` WHERE `id` = '".$user['id']."'",'array');
		$limit_szlachty = get_szlachta_limit($monety);
		}
		
	$szlachta_trening = (int)$szlachta_trening;
	
	$mozna_wyprodokowac = $limit_szlachty - ($user['villages'] - 1);
	$mozna_wyprodokowac -= $jednostki_szlachcic_w_wioskach;
	$mozna_wyprodokowac -= $szlachta_trening;
	$szlachcice_w_produkcji = $szlachta_trening;
	$szlachcice_dostepni = $jednostki_szlachcic_w_wioskach;
	$przejete_wioski = $user['villages'] - 1;

	//Ustal maksymaln¹ liczbê produkcji szlachty:

	foreach($cl_units->get_array("dbname") as $nazwa => $jednostka) {
		if ($cl_units->recruit_in[$jednostka] === $_GET['screen']) {
			$max_szlachta[$jednostka]['wood'] = $village['r_wood'] / $cl_units->get_woodprice($jednostka);
			$max_szlachta[$jednostka]['stone'] = $village['r_stone'] / $cl_units->get_stoneprice($jednostka);
			$max_szlachta[$jednostka]['iron'] = $village['r_iron'] / $cl_units->get_ironprice($jednostka);
			$max_szlachta[$jednostka]['bh'] = ($maxfarm - $village['r_bh']) / $cl_units->get_bhprice($jednostka);
			$max_szlachta[$jednostka]['limit'] = $mozna_wyprodokowac;
			$jednostki_mozna_wypr[$jednostka] = floor(min($max_szlachta[$jednostka]));
			}
		}

	//Akcja trening szlachty:

	if ($_GET['action'] == 'train' and count($_POST) > 0) {
		$_error = 0;
		foreach ($jednostki_w_palacu as $unit => $name) {
			$_POST['atren_'.$unit] = (int)$_POST['atren_'.$unit];
			if ($_POST['atren_'.$unit] < 0) {
				$_POST['atren_'.$unit] = 0;
				}
			$_POST['atren_'.$unit] = floor($_POST['atren_'.$unit]);
			
			if ($_POST['atren_'.$unit] > $jednostki_mozna_wypr[$unit]) {
				$_error += 1;
				}
			}
			
		if ($_error > 0) {
			$error = 'Nie spe³niono wymagañ, aby móc wytrenowaæ szlachcica';
			} else {
			foreach ($jednostki_w_palacu as $unit => $name) {
				$koszt['drewno'] += $cl_units->get_woodprice($unit) * $_POST['atren_'.$unit];
				$koszt['kamienie'] += $cl_units->get_stoneprice($unit) * $_POST['atren_'.$unit];
				$koszt['ruda'] += $cl_units->get_ironprice($unit) * $_POST['atren_'.$unit];
				$koszt['bh'] += $cl_units->get_bhprice($unit) * $_POST['atren_'.$unit];
				if ($_POST['atren_'.$unit] > 0) {
					mysql_query("UPDATE `villages` SET `r_stone` = `r_stone` - '".$koszt['kamienie']."' WHERE `id` = '".$village['id']."'");
					mysql_query("UPDATE `villages` SET `r_wood` = `r_wood` - '".$koszt['drewno']."' WHERE `id` = '".$village['id']."'");
					mysql_query("UPDATE `villages` SET `r_iron` = `r_iron` - '".$koszt['ruda']."' WHERE `id` = '".$village['id']."'");
					mysql_query("UPDATE `villages` SET `r_bh` = `r_bh` + '".$koszt['bh']."' WHERE `id` = '".$village['id']."'");
					$cl_units->recruit_units($unit,$_POST['atren_'.$unit],$_GET['screen'],$village[$_GET['screen']],$village['id']);	
					}
				}
			header('location: game.php?village='.$village['id'].'&screen='.$_GET['screen']);
			exit;
			}
		}
	
	//Opcje monet:
	if ($config['ag_style'] == 1) {
		$monety_na_next_limit = (($limit_szlachty + 1) * 0.5 + 0.5) * ($limit_szlachty + 1);
		$monety_potzebne = $monety_na_next_limit - $monety;
		$monety_uzb = $monety - (($limit_szlachty) * 0.5 + 0.5) * ($limit_szlachty);
	
		if ($village['r_wood'] > $config['koszt_monety']['wood'] && $village['r_stone'] > $config['koszt_monety']['stone'] && $village['r_iron'] > $config['koszt_monety']['iron']) {
			$create_coin = true;
			} else {
			$create_coin = false;
			$produkcja['w'] = ($arr_production[$village['wood']] * $config['speed']) / 3600;
			$produkcja['s'] = ($arr_production[$village['stone']] * $config['speed']) / 3600;
			$produkcja['i'] = ($arr_production[$village['iron']] * $config['speed']) / 3600;
			if ($village['bonus'] == 3) {
				$produkcja['w'] *= $bonus->bonusy[$village['bonus']]['modifer'] + 1;
				}
			if ($village['bonus'] == 4) {
				$produkcja['s'] *= $bonus->bonusy[$village['bonus']]['modifer'] + 1;
				}
			if ($village['bonus'] == 5) {
				$produkcja['i'] *= $bonus->bonusy[$village['bonus']]['modifer'] + 1;
				}
			$czas['w'] = floor(($config['koszt_monety']['wood'] - $village['r_wood']) / $produkcja['w']);
			$czas['s'] = floor(($config['koszt_monety']['stone'] - $village['r_stone']) / $produkcja['s']);
			$czas['i'] = floor(($config['koszt_monety']['iron'] - $village['r_iron']) / $produkcja['i']);
			$czekanie = max($czas);
			}
		}
  
	//Przes³aæ zmienne do klasy smarty templates(R):
	$tpl->assign('units',$jednostki_w_palacu);
	$tpl->assign('cl_units',$cl_units);
	$tpl->assign('units_in_village',$jednostki_w_wiosce);
	$tpl->assign('units_all',$jednostki_ogulnie);
	$tpl->assign('error',$error);
	$tpl->assign('units_can_prod',$jednostki_mozna_wypr);
	$tpl->assign('snobs_stage',$limit_szlachty);
	$tpl->assign('snobs_dostepne',$szlachcice_dostepni);
	$tpl->assign('snobs_produkcja',$szlachcice_w_produkcji);
	$tpl->assign('snobs_in_vgs',$przejete_wioski);
	$tpl->assign('snobs_canpr',$mozna_wyprodokowac);
	$tpl->assign('recruit_units',$trenowanie_w_palacu);
	$tpl->assign('first_unit',$first_unit);
	if ($config['ag_style'] == 1) {
		$tpl->assign('all_coins',$monety);
		$tpl->assign('coins_next',$monety_potzebne);
		$tpl->assign('coins_zgr',$monety_uzb);
		$tpl->assign('twoz_monete',$create_coin);
		$tpl->assign('czekanie',$czekanie);
		}
	}
if ($_GET['mode'] == 'mass_monety') {
	require ('actions/groups_bar.php');
	require ('actions/villages_per_page.php');
	
	foreach ($wioski_usera as $wioska) {
		reload_vdata($wioska['id'],date('U'));
		$wioska_info = sql("SELECT r_wood,r_stone,r_iron,snob,storage,bonus FROM `villages` WHERE `id` = '".$wioska['id']."'",'assoc');
		if ($wioska_info['snob'] > 0) {
			$masowe_wybijanie[$wioska['id']]['r_wood'] = floor($wioska_info['r_wood']);
			$masowe_wybijanie[$wioska['id']]['r_stone'] = floor($wioska_info['r_stone']);
			$masowe_wybijanie[$wioska['id']]['r_iron'] = floor($wioska_info['r_iron']);
			$masowe_wybijanie[$wioska['id']]['id'] = $wioska['id'];
			$masowe_wybijanie[$wioska['id']]['x'] = $wioska['x'];
			$masowe_wybijanie[$wioska['id']]['y'] = $wioska['y'];
			$masowe_wybijanie[$wioska['id']]['name'] = $wioska['name'];
			$masowe_wybijanie[$wioska['id']]['continent'] = $wioska['continent'];
			$masowe_wybijanie[$wioska['id']]['bonus'] = $wioska_info['bonus'];
			if ($wioska_info['bonus'] == 1) {
				$masowe_wybijanie[$wioska['id']]['max_storage'] = floor($arr_maxstorage[$wioska_info['storage']] * ($bonus->bonusy[$wioska_info['bonus']]['modifer'] + 1));
				} else {
				$masowe_wybijanie[$wioska['id']]['max_storage'] = floor($arr_maxstorage[$wioska_info['storage']]);
				}
			$__SMARTY_MODIFER++;
			if ($__SMARTY_MODIFER % 2 == 0) {
				$masowe_wybijanie[$wioska['id']]['parzysta_liczba'] = true;
				} else {
				$masowe_wybijanie[$wioska['id']]['parzysta_liczba'] = false;
				}
			$cont['wood'] = $masowe_wybijanie[$wioska['id']]['r_wood'] / $config['koszt_monety']['wood'];
			$cont['stone'] = $masowe_wybijanie[$wioska['id']]['r_stone'] / $config['koszt_monety']['stone'];
			$cont['iron'] = $masowe_wybijanie[$wioska['id']]['r_iron'] / $config['koszt_monety']['iron'];
			$masowe_wybijanie[$wioska['id']]['max_monets_can_coin'] = floor(min($cont));
			}
		}
	
	if ($_GET['action'] == 'wybijaj_wiele_monet' && count($_POST) > 0) {
		$monety_dod = 0;
		foreach ($masowe_wybijanie as $id => $wioska) {
			$_POST['m'.$id] = (int)$_POST['m'.$id];
			if ($_POST['m'.$id] < 0) {
				$_POST['m'.$id] = 0;
				}
				
			$_POST['m'.$id] = floor($_POST['m'.$id]);
			
			if ($wioska['max_monets_can_coin'] >= $_POST['m'.$id]) {
				$do_zap['k'] = $_POST['m'.$id] * $config['koszt_monety']['wood'];
				$do_zap['d'] = $_POST['m'.$id] * $config['koszt_monety']['stone'];
				$do_zap['r'] = $_POST['m'.$id] * $config['koszt_monety']['iron'];
				mysql_query("UPDATE `villages` SET `r_stone` = `r_stone` - '".$do_zap['d']."' , `r_wood` = `r_wood` - '".$do_zap['k']."' , `r_iron` = `r_iron` - '".$do_zap['r']."' WHERE `id` = '".$id."'");
				$monety_dod += $_POST['m'.$id];
				}
			}
		mysql_query("UPDATE `users` SET `monety` = `monety` + '$monety_dod' WHERE `id` = '".$user['id']."'");
		header('location: game.php?village='.$_GET['village'].'&screen=snob&mode=mass_monety');
		exit;
		}
	
	$monety = sql("SELECT `monety` FROM `users` WHERE `id` = '".$user['id']."'",'array');
	$limit_szlachty = get_szlachta_limit($monety);

	$monety_na_next_limit = (($limit_szlachty + 1) * 0.5 + 0.5) * ($limit_szlachty + 1);
	$monety_potzebne = $monety_na_next_limit - $monety;
	$monety_uzb = $monety - (($limit_szlachty) * 0.5 + 0.5) * ($limit_szlachty);
	
	$tpl->assign('error',$error);
	$tpl->assign('snobs_stage',$limit_szlachty);
	$tpl->assign('all_coins',$monety);
	$tpl->assign('coins_next',$monety_potzebne);
	$tpl->assign('coins_zgr',$monety_uzb);
	$tpl->assign('masowe_wybijanie',$masowe_wybijanie);
	}

$tpl->assign('show_build',$show_build);
$tpl->assign('links',$mody);
$tpl->assign('mode',$_GET['mode']);
$tpl->assign('ag_style',$config['ag_style']);
$tpl->assign('koszt_monety',$config['koszt_monety']);
?>