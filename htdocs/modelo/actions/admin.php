<?php
                if ($user['admin'] == 1)  {
                       $blad = true;
                        } elseif ($user['admin'] == 0) {
$menu = $lg['game']['admin']['menu'];
$admin_modes = array(
	$menu['reffurge'] => 'reffurge',
	$menu['support'] => 'support',
	$menu['kody'] => 'kody',	
	$menu['logins'] => 'logins',
	$menu['reset'] => 'reset',
	$menu['krzaki'] => 'krzaki',
	$menu['mail'] => 'mail',
	$menu['builds'] => 'builds',
    $menu['ban'] => 'bany',
    $menu['bot'] => 'bot',
    $menu['odk'] => 'odkrycia',
    '' => 'users',	
	$menu['settings'] => 'edit',		
	);
	
	
if (!in_array($_GET['mode'],$admin_modes)) {
	$_GET['mode'] = 'reffurge';
	}
	
require ('actions/admin_'.$_GET['mode'].'.php');
	
$tpl->assign('admin_modes',$admin_modes);
$tpl->assign('blad',$blad);
}
?>

