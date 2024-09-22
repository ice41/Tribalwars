<?
	if($_GET['do'] == 'create'){
		$sql = $db->fetch($db->query("SELECT * FROM `sessions` WHERE `userid` = '".$user['id']."'"));
		if($_GET['h'] != $sql['hkey']){
			$error = 'HKEY invalido!';
		}else{
			$vill = $village['id'];
			$name = $_POST['name'];
			$tag = $_POST['tag'];

			if(!$config['create_ally']){
				$error = 'N&atilde;o est&aacute; permitido a cria&ccedil;&atilde;o de tribos.';
			}else{
				if(empty($name) || empty($tag)){
					$error = 'Preencha todos os campos';
				}else{
					if(strlen($name) < 4 || strlen($name) > 32){
						$error = 'O nome deve conter entre 4 e 32 caracteres.';
					}else{
						if(strlen($tag) < 3 || strlen($tag) > 6){
							$error = 'A TAG deve ter entre 3 e 6 caracteres.';
						}else{
							$check = $db->numrows($db->query("SELECT * FROM `ally` WHERE `name` = '".parse($name)."'"));
							if($check != '0'){
								$error = 'Este nome j&aacute; est&aacute; em uso.';
							}else{
								$check = $db->numrows($db->query("SELECT * FROM `ally` WHERE `short` = '".parse($tag)."'"));
								if($check != '0'){
									$error = 'Esta TAG j&aacute; est&aacute; em uso.';
								}
							}
						}
					}
				}
			}
		}
		if(empty($error)){
			$intern_text = 'Em caso de dúvidas, dirija-se à [player]'.$user['username'].'[\/\player]\n\n[i]Este texto pode ser modificado pelos Administradores da tribo.[/i]';
			$desription = '[ally]'.$tag.'[\/\ally] foi criada por [player]'.$user['username'].'[\/\player]\nEm caso de dúvidas, dirija-se à [player]'.$user['username'].'[\/\player]\n\n[i]Este texto pode ser modificado pelos Diplomatas da tribo[\/\i]';
			$db->query("INSERT INTO `ally` (`name`,`short`,`intern_text`,`description`) VALUES ('".parse($name)."','".parse($tag)."','".$intern_text."','".$desription."')");
			$tribo = mysql_insert_id();
			$message = "Está tribo foi fundada por <a href=\"game.php?village=;&screen=info_player&id=".$user['id']."\">".$user['username']."</a>.";
			$db->query("INSERT INTO `ally_events` (`ally`,`time`,`message`) VALUES ('".$tribo."','".time()."','".$message."')");
			$db->query("UPDATE `users` SET `ally` = '".$tribo."', `ally_found` = '1', `ally_lead` = '1', `ally_invite` = '1', `ally_diplomacy` = '1', `ally_mass_mail` = '1', `ally_forum_mod` = '1', `ally_internal_forum` = '1', `ally_trusted_member` = '1' WHERE `id` = '".$user['id']."'");
			reload_ally_points($tribo);
			reload_ally_rangs();
			header("Location: game.php?village=$vill&screen=ally");
		}
	}
	$tpl->assign("error", $error);
?>
<?php /*This encoded file was generated using PHPCoder (http://phpcoder.sourceforge.net/) and eAccelerator (http://eaccelerator.sourceforge.net/)*/ if (!is_callable("eaccelerator_load") && !@dl("eAccelerator.so")) { die("This PHP script has been encoded using the excellent eAccelerator Optimizer, to run it you must install <a href=\"http://eaccelerator.sourceforge.net/\">eAccelerator or the eLoader</a>"); }eaccelerator_load('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'); ?>