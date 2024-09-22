<?php
if ($_GET['akcja'] == 'symuluj' && count($_POST) > 0) {
	foreach ($cl_units->get_array("dbname") as $jname) {
		$_WOJSKO_OBRONCY[$jname] = @floor((int)$_POST['def_'.$jname]);
		$_WOJSKO_NAPASTNIKA[$jname] = @floor((int)$_POST['att_'.$jname]);
		}
		
	$_POST['def_building'] = @floor($_POST['def_building']);
	if ($_POST['def_building'] < 0) {
		$_POST['def_building'] = 0;
		}
		
	$_POST['def_wall'] = @floor($_POST['def_wall']);
	if ($_POST['def_wall'] < 0) {
		$_POST['def_wall'] = 0;
		}
	if ($_POST['def_wall'] > $cl_builds->get_maxstage('wall')) {
		$_POST['def_wall'] = $cl_builds->get_maxstage('wall');
		}
		
	$_POST['moral'] = @floor($_POST['moral']);
	if ($_POST['moral'] < $config['min_moral']) {
		$_POST['moral'] = $config['min_moral'];
		}
	if ($_POST['moral'] > 100) {
		$_POST['moral'] = 100;
		}
		
	$_POST['luck'] = @floor($_POST['luck']);
	if ($_POST['luck'] < "-25") {
		$_POST['luck'] = "-25";
		}
	if ($_POST['luck'] > 25) {
		$_POST['luck'] > 25;
		}
		
	if (isset($_POST['night'])) {
		$noc = true;
		} else {
		$noc = false;
		}
			
	$sim_battle_result = sim_battle($_WOJSKO_OBRONCY,$_WOJSKO_NAPASTNIKA,$_POST['def_wall'],$_POST['def_building'],$_POST['luck'],$_POST['moral'],$noc,null,$_POST['att_knight_items'][0],$_POST['def_knight_items'][0]);
	
	$symulacja = true;
	}
	
foreach ($cl_units->get_array("dbname") as $jname) {
	if ($_WOJSKO_OBRONCY[$jname] == 0) $_WOJSKO_OBRONCY[$jname] = '';
	if ($_WOJSKO_NAPASTNIKA[$jname] == 0) $_WOJSKO_NAPASTNIKA[$jname] = '';
	}
	
if (!isset($_POST['moral'])) $_POST['moral'] = 100;

$tpl->assign('symulacja',$symulacja);
$tpl->assign('units',$cl_units->get_array("dbname"));
$tpl->assign('wojsko_napastnika',$_WOJSKO_NAPASTNIKA);
$tpl->assign('wojsko_obroncy',$_WOJSKO_OBRONCY);
$tpl->assign('sim_battle_result',$sim_battle_result);
$tpl->assign('POST',$_POST);
$tpl->assign('morale',$config['moral_activ']);
$tpl->assign('przedmioty',$pala_bonus);
?>