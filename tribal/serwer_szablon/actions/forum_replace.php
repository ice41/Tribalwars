<?php
if ($forum->is_moderator()) {
	$_GET['fid'] = floor((int)$_GET['fid']);

	$counts = $forum->can_see_fid($_GET['fid']);
	if ($counts > 0) {
		$t_array = explode(";",$_GET['tid']);
		foreach ($t_array as $value) {
			$value = floor((int)$value);
			
			$t_exists = sql("SELECT COUNT(id) FROM `tematy` WHERE `forum` = '".$_GET['fid']."' AND `id` = '$value'","array");
			if ($t_exists > 0) {
				$vt_array[] = $value;
				$vt_names[$value] = entparse(sql("SELECT `nazwa` FROM `tematy` WHERE `id` = '$value'","array"));
				}
			}
			
		if (is_array($vt_array)) {
			$pokazac_tematy = true;
			
			$tpl->assign("send_theaders",$vt_names);
			$tpl->assign("aktu_tid",implode(";",$vt_array));
			
			$forum_array = $forum->get_forum_array_admin();
			foreach ($forum_array as $fid => $finfo) {
				if ($fid != $_GET['fid']) {
					$else_fidarr[$fid] = $finfo['name'];
					}
				}
				
			if (is_array($else_fidarr)) {
				$pokazac_akcje = true;
				$tpl->assign("to_forums",$else_fidarr);
				
				if ($_GET['action'] === 'mod' && count($_POST) > 0) {
					if ($_GET['h'] == $session['hkey']) {
						//Walidacja:
						$_POST['target_forum_id'] = floor((int)$_POST['target_forum_id']);
						if (!empty($else_fidarr[$_POST['target_forum_id']])) {
							foreach ($vt_array as $tid) {
								mysql_query("UPDATE `tematy` SET `forum` = '".$_POST['target_forum_id']."' WHERE `id` = '$tid'");
								mysql_query("UPDATE `posty` SET `forum` = '".$_POST['target_forum_id']."' WHERE `temat` = '$tid'");
								mysql_query("UPDATE `czytanie` SET `fid` = '".$_POST['target_forum_id']."' WHERE `tid` = '$tid'");
								mysql_query("UPDATE `f_ankiety` SET `fid` = '".$_POST['target_forum_id']."' WHERE `tid` = '$tid'");
								}
							header("location: $_BASE_LINK&sm=ow&aktu_fid=".$_GET['fid']);
							exit;
							} else {
							$error = 'Nie ma takiego forum';
							}
						} else {
						$error = 'B³¹d podczas wykonywania akcji';
						}
					}
				} else {
				$pokazac_akcje = false;
				}
			} else {
			$pokazac_tematy = false;
			}
		} else {
		$pokazac_tematy = false;
		}
		
	$tpl->assign('pok_tem',$pokazac_tematy);
	$tpl->assign('pok_ak',$pokazac_akcje);
	$tpl->assign('aktu_fid',$_GET['fid']);
	}
?>