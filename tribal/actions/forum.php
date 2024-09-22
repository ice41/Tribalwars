<?php
/*Wymagane parametry dla dzia³ania forum (array)$user,(string)$_BASE_LINK,(string)$_GET['sm'],$hkey*/

//Za³adowaæ klasê lib/forum.php
require ('lib/forum.php');

//Start klasy bb_interpreter();
$bb_interpreter = new bb_interpreter($cl_builds,$cl_units,$pl);

//Definiowanie tablicy o graczu:
$user_array['id'] = $user['id'];
$user_array['ally'] = $user['ally'];
$user_array['ally_found'] = $user['ally_found'];
$user_array['ally_lead'] = $user['ally_lead'];
$user_array['ally_invite'] = $user['ally_invite'];
$user_array['ally_diplomacy'] = $user['ally_diplomacy'];
$user_array['ally_mass_mail'] = $user['ally_mass_mail'];
$user_array['ally_mod_forum'] = $user['ally_mod_forum'];
$user_array['ally_forum_switch'] = $user['ally_forum_switch'];
$user_array['ally_forum_trust'] = $user['ally_forum_trust'];

//Start klasy forum:
$forum = new forum($user_array);

$s_modes = $forum->get_modes();
	
if (!in_array($_GET['sm'],$s_modes)) {
	$_GET['sm'] = 'ow';
	}
	
$user_f_arr = $forum->get_forum_array();

require ('forum_'.$_GET['sm'].'.php');
	
$tpl->assign('sm',$_GET['sm']);
$tpl->assign('base_link',$_BASE_LINK);
$tpl->assign('err',$error);
$tpl->assign('can_edit',$forum->is_moderator());
$tpl->assign('bar_forum_arr',$user_f_arr);
$tpl->assign('forum',$forum);
?>