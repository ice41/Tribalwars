<?php
//Walidacja liczb:
$_GET['aktu_fid'] = floor((int)$_GET['aktu_fid']);
$_GET['aktu_tid'] = floor((int)$_GET['aktu_tid']);

$counts_fid = $forum->can_see_fid($_GET['aktu_fid']);
$counts_tid = sql("SELECT COUNT(id) FROM `tematy` WHERE `forum` = '".$_GET['aktu_fid']."' AND `id` = '".$_GET['aktu_tid']."'","array");

if ($counts_fid > 0 && $counts_tid > 0) {
	$t_info = $forum->get_thread_info($_GET['aktu_tid']);
	
	if ($_GET['action'] === 'edit' && count($_POST) > 0) {
		if ($_GET['h'] == $session['hkey']) {
			//Walidacja elementu important:
			if (isset($_POST['important'])) {
				$important = true;
				} else {
				$important = false;
				}
				
			//Walidacja nazwy tematu:
			
			$_POST['subject'] = cmp_str($_POST['subject'],3,64);
			if ($_POST['subject'] === 'SHORT') {
				$error = 'Nazwa tematu musi ska³adaæ siê co najmniej z 3 znaków.';
				}
			elseif ($_POST['subject'] === 'LONG') {
				$error = 'Nazwa tematu mo¿e sk³adaæ siê z maksymalnie 64 znaków.';
				}
			elseif ($_POST['subject'] === 'SPACES') {
				$error = 'Nazwa tematu nie mo¿e sk³adaæ siê z samych spacji.';
				} else {
				$_POST['subject'] = parse($_POST['subject']);
				mysql_query("UPDATE `tematy` SET `nazwa` = '".$_POST['subject']."' , `important` = '$important' WHERE `id` = '".$_GET['aktu_tid']."'");
				
				//Przekieruj u¿ytkownika na stronê tematu:
				$_link = "location: $_BASE_LINK&sm=s_thread&aktu_fid=".$_GET['aktu_fid']."&aktu_tid=".$_GET['aktu_tid'];
				header ($_link);
				exit;
				}
			} else {
			$error = 'B³¹d podczas wykonywania akcji';
			}
		}
		
	$t_info['nazwa'] = entparse($t_info['nazwa']);
	$tpl->assign('tname',$t_info['nazwa']);
	$tpl->assign('important',$t_info['important']);
	$pokazac_posty = true;
	} else {
	$pokazac_posty = false;
	}
	
$tpl->assign('error',$error);
$tpl->assign('pok_pos',$pokazac_posty);
$tpl->assign('aktu_fid',$_GET['aktu_fid']);
$tpl->assign('aktu_tid',$_GET['aktu_tid']);
?>