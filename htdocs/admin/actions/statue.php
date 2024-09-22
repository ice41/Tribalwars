<?php
$tpl = new Smarty();
require(getcwd().'/../include/config.php');
mysql_connect($config['db_host'],$config['db_user'],$config['db_pw']);
mysql_select_db($config['db_name']);
$check1 = @mysql_query("SELECT all_unit_knight FROM villages");
$check2 = @mysql_fetch_assoc($check1);
if(empty($check2))
	{$check = true;}
else
	{$check = false;}
$haus1 = fopen('../include/configs/buildings.php', "r");
$haus2 = '';
while($zeile = fgets($haus1))
	{$haus2 .= $zeile;}
$haus3 = strpos($haus2, 'statue');
if($haus3 === false)
	{$haus = true;}
else
	{$haus = false;}
fclose($haus1);
$einheit1 = fopen('../include/configs/units.php', "r");
$einheit2 = '';
while($zeile = fgets($einheit1))
	{$einheit2 .= $zeile;}
$einheit3 = strpos($einheit2, 'unit_knight');
if($einheit3 === false)
	{$einheit = true;}
else
	{$einheit = false;}
fclose($einheit1);

if($_GET['do'] == 'sql')
	{
	require(getcwd().'/../include/config.php');
	mysql_connect($config['db_host'],$config['db_user'],$config['db_pw']);
	mysql_select_db($config['db_name']);
	require('actions/statue_c.php');
	$sql2 = explode(';', $sql1);
	$sql3 = 0;
	while($sql2[$sql3])
		{
		mysql_query($sql2[$sql3]);
		$sql3++;
		}
	$reload = '<script type="text/javascript">
document.location = "index.php?&screen=statue";
</script>';
	$tpl->assign('reload', $reload);
	}
elseif($_GET['do'] == 'activate')
	{
	require('actions/statue_c.php');
	$haus10 = explode('$cl_builds->add_build($lang->grab("configs_buildings", "market"),"market");', $haus2);
	$haus11 = $haus10[0].$buildings.'


'.'$cl_builds->add_build($lang->grab("configs_buildings", "market"),"market");'.$haus10[1];
	$haus15 = fopen('../include/configs/buildings.php', "w");
	fputs($haus15, $haus11);
	fclose($haus15);
	$einheit10 = explode('$cl_units->add_unit($lang->grab("configs_units", "snob"),"unit_snob");', $einheit2);
	$einheit11 = $einheit10[0].$units.'

'.'$cl_units->add_unit($lang->grab("configs_units", "snob"),"unit_snob");'.$einheit10[1];
	$einheit15 = fopen('../include/configs/units.php', "w");
	fputs($einheit15, $einheit11);
	fclose($einheit15);
	$reload = '<script type="text/javascript">
document.location = "index.php?&screen=statue";
</script>';
	$tpl->assign('reload', $reload);
	}
elseif($_GET['do'] == 'deactivate')
	{
	$haus20 = strpos($haus2, '$cl_builds->add_build("Statue","statue");');
	$haus21 = strpos($haus2, 'set_graphicCoords', $haus20);
	$haus22 = strpos($haus2, ');', $haus21);
	$haus23 = substr($haus2, $haus20, ($haus22 - $haus20) + 2).'


';
	$haus24 = explode($haus23, $haus2);
	$haus25 = $haus24[0].$haus24[1];
	$haus26 = fopen('../include/configs/buildings.php', "w");
	fputs($haus26, $haus25);
	fclose($haus26);
	$einheit20 = strpos($einheit2, '$cl_units->add_unit("Paladin","unit_knight");');
	$einheit21 = strpos($einheit2, 'set_description', $einheit20);
	$einheit22 = strpos($einheit2, ');', $einheit21);
	$einheit23 = substr($einheit2, $einheit20, ($einheit22 - $einheit20) + 2).'

';
	$einheit24 = explode($einheit23, $einheit2);
	$einheit25 = $einheit24[0].$einheit24[1];
	$einheit26 = fopen('../include/configs/units.php', "w");
	fputs($einheit26, $einheit25);
	fclose($einheit26);
	$reload = '<script type="text/javascript">
document.location = "index.php?&screen=statue";
</script>';
	$tpl->assign('reload', $reload);
	}

if($check)
	{
	$tpl->assign('no_mysql', $config['lang']);
	}
elseif($haus == true OR $einheit == true)
	{
	$tpl->assign('deactivated', $config['lang']);
	}
else
	{
	$tpl->assign('activated', $config['lang']);
	}
?>