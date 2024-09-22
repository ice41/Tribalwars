<?
	if($_GET['do'] == 'submit' && $_POST['go']){
		if($_POST['altname']){
			if(empty($_POST['username']) || strlen($_POST['username']) < 4 || strlen($_POST['username']) > 25){
				$error = 'O nome de usuário deve conter entre 4 e 25 caracteres.';
			}else{
				$check = $db->num($db->query("SELECT * FROM `users` WHERE `username` = '".$func->EscapeString(urlencode($_POST['username']))."'"));
				if($check != '0'){
					$error = "O nome de usuário ".$_POST['username']." j&aacute; est&aacute; em uso, experimente outro.";
				}
			}
		}
		if($_POST['altpw']){
			if(strlen($_POST['password']) < 6 || strlen($_POST['password']) > 32){
				$error = 'A senha deve ter entre 6 e 32 caracteres.';
			}
		}
		if($_POST['altmail']){
			if(empty($_POST['email'])){
				$error = 'Você deve introduzir um e-mail.';
			}else{
				if(!eregi("^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$", $_POST['email'])){
					$error = 'O e-mail introduzido é invalido.';
				}else{
					$check = $db->num($db->query("SELECT * FROM `users` WHERE `mail` = '".$func->EscapeString($_POST['email'])."'"));
					if($check != '0'){
						$error = "O e-mail ".$reg_mail.", j&aacute; est&aacute; em uso por outro jogador.";
					}
				}
			}
		}
		if(empty($error)){
			$id = $func->EscapeString($_GET['id']);
			$db->query("UPDATE `users` SET `username` = '".$func->EscapeString(urlencode($_POST['username']))."' WHERE `id` = '".$id."'");
			if($_POST['password']){ $db->query("UPDATE users SET `password` = '".$func->Pass($_POST['password'])."' WHERE `id` = '".$id."'"); }
			$db->query("UPDATE `users` SET `mail` = '".$func->EscapeString($_POST['email'])."' WHERE `id` = '".$id."'");
			$sql_wrd = $db->query("SELECT * FROM `worlds` WHERE `world_active` = '1'");
			while($a = $db->fet_array($sql_wrd)){
				$db->query("UPDATE `$a[world_db]`.`users` SET `username` = '".$func->EscapeString(urlencode($_POST['username']))."' WHERE `id` = '".$id."'");
			}
			$succes = 'Alterações efetuadas com sucesso.';
		}
	}

	$q1 = $db->fet_array($db->query("SELECT * FROM `users` WHERE `id` = '".$func->EscapeString($_GET['id'])."'"));
	$q2 = $db->query("SELECT * FROM `worlds` WHERE `world_active` = '1' ORDER BY `id` ASC");

	if($_GET['do'] == 'submit' && $_POST['ban']){
		if(empty($_POST['ban_motivo']) || strlen($_POST['ban_motivo']) < 3 || strlen($_POST['ban_motivo']) > 50){
			$berror = 'Você deve especificar um motivo para o banimento.';
		}else{
			if($_POST['ban_end'] == '' || $_POST['ban_end'] == 0){
				$berror = 'Você deve escolher um tempo de banimento.';
			}
		}
		if(empty($berror)){
			$mundo = $func->EscapeString($_POST['world']);
			$ban_end = ($_POST['ban_end']*86400)+time();
			$ban_motivo = $func->EscapeString(urlencode($_POST['ban_motivo']));
			$db->query("UPDATE `$mundo`.`users` SET `banned` = 'Y', `ban_start` = '".time()."', `ban_end`= '".$ban_end."', `ban_por` = '".$func->EscapeString($_COOKIE['admname'])."', `ban_motivo` = '".$ban_motivo."' WHERE `id` = '".$func->EscapeString($_GET['id'])."'");
			$db->query("DELETE FROM `$mundo`.`sessions` WHERE `userid` = '".$func->EscapeString($_GET['id'])."'");
			$db->query("UPDATE `users` SET `ban_count` = `ban_count`+'1' WHERE `id` = '".$func->EscapeString($_GET['id'])."'");
			$bsucces = 'Jogador banido com sucesso.';
		}
	}
	if($_GET['do'] == 'submit' && $_POST['unban']){
		$mundo = $func->EscapeString($_POST['world']);
		$id = $func->EscapeString($_GET['id']);
		$db->query("UPDATE `$mundo`.`users` SET `banned`='N',`ban_start`='',`ban_end`='',`ban_por`='',`ban_motivo`='' WHERE `id`='".$id."'");
		$bsucces = 'Jogador desbanido com sucesso.';
	}
?>
<form action="menu.php?screen=settings_users&mode=edit&id=<?=$_GET['id'];?>&do=submit" method="post">
	<table width="100%" align="center">
		<tr>
			<td valign="top" width="50%">
				<table class="vis" width="100%" style="border-spacing:1px; background-color:#FEE47D;">
					<tr><th colspan="2">Editar jogador</th></tr>
					<? if(!empty($error)){ ?>
					<tr><td colspan="2"><div class="error"><?=$error;?></div></td></tr>
					<? } ?>
					<? if(!empty($succes)){ ?>
					<tr><td colspan="2"><div class="succes"><?=$succes;?></div></td></tr>
					<? } ?>
					<tr>
						<td>Usu&aacute;rio:</td>
						<td><input type="text" name="username" value="<?=$func->EscapeString(urldecode($q1['username']));?>" /><label><input type="checkbox" name="altname" /> Marque para alterar</label></td>
					</tr>
					<tr>
						<td width="150">Alterar senha:</td>
						<td><input type="password" name="password" /><label><input type="checkbox" name="altpw" /> Marque para alterar</label></td>
					</tr>
					<tr><th colspan="2">Informa&ccedil;&atilde;o</th></tr>
					<tr>
						<td>E-mail:</td>
						<td><input type="text" name="email" value="<?=$q1['mail'];?>" /><label><input type="checkbox" name="altmail" /> Marque para alterar</label></td>
					</tr>
					<tr><td>Registrado em:</td><td align="center"><b><?=date("d.m.Y H:i", $q1['create_time']);?></b></td></tr>
					<tr><td>Banido:</td><td align="center"><b><?=$q1['ban_count'];?></b> banimentos</td></tr>
					<tr>
						<td>Participa nos mundos:</td>
						<td><div class="gamenews_green">
				<?
					$q3 = $db->query("SELECT * FROM `worlds` WHERE `world_active` = '1' ORDER BY `id` ASC");
					while($a1 = $db->fet_array($q3)){
						$q4 = $db->query("SELECT * FROM `$a1[world_db]`.`users` WHERE `id` = '".$q1['id']."'");
						$fq4 = $db->fet_array($q4);
						if($fq4['banned'] == 'Y'){ $ban = '(banido)'; }else{ $ban = ''; }
						$num = $db->num($q4);
						if($num == 1){
							echo '&raquo; '.$func->EscapeString(urldecode($a1['world_name'])).' '.$ban.'<br />';
						}
					}
				?>
						</div></td>
					</tr>
					<tr><th colspan="2"><span style="float:right;"><input type="submit" name="go" value="Salvar" class="button" /></span></th></tr>
				</table>
			</td>
			<td valign="top" width="50%">
				<table class="vis" width="100%" style="border-spacing:1px; background-color:#FEE47D;">
					<tr><th width="300" colspan="2">Banir Jogador</th></tr>
					<? if(!empty($berror)){ ?>
					<tr><td colspan="2"><div class="error"><?=$berror;?></div></td></tr>
					<? } ?>
					<? if(!empty($bsucces)){ ?>
					<tr><td colspan="2"><div class="succes"><?=$bsucces;?></div></td></tr>
					<? } ?>
					<tr>
						<td width="80">Mundo:</td>
						<td><select name="world">
							<?
								while($row = $db->fet_array($q2)){
									$q4 = $db->query("SELECT * FROM `$row[world_db]`.`users` WHERE `id` = '".$q1['id']."'");
									$fq4 = $db->fet_array($q4);
									if($fq4['banned'] == 'Y'){ $ban = '(banido)'; }else{ $ban = ''; }
									$num = $db->num($q4);
									if($num == 1){
										echo '<option value="'.$row['world_db'].'">'.$func->EscapeString(urldecode($row['world_name'])).' '.$ban.'</option>';
									}
								}
							?>
						</select></td>
					</tr>
					<tr>
						<script type="text/javascript">
							$(function() {
								autoresize_textarea('#message');
							});
						</script>
						<td>Motivo:</td>
						<td align="center"><div style="clear:both;"><textarea id="message" name="ban_motivo" cols="45"></textarea></div></td>
					</tr>
					<tr>
						<td>Periodo:</td>
						<td><select name="ban_end" style="text-align:center;">
							<option value="" selected="selected" disabled="disabled">-> Selecione <--</option>
							<option value="10">10 dias de ban</option>
							<option value="20">20 dias de ban</option>
							<option value="30">30 dias de ban</option>
							<option value="60">60 dias de ban</option>
							<option value="90">90 dias de ban</option>
							<option value="8400">Ilimitado</option>
						</select></td>
					</tr>
					<tr>
						<th colspan="2"><center>
							<input type="submit" name="ban" value="Banir" class="button red" />
							<input type="submit" name="unban" value="Desbanir" class="button green" />
						</center></th>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</form>