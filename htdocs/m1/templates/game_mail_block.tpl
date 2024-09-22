{php}
	$userid = $this->_tpl_vars['user']['id'];
	$hkey = $this->_tpl_vars['hkey'];

	if($_GET['action'] == 'block'){
		$sql = mysql_query("SELECT * FROM `users` WHERE `username` = '".parse($_POST['name'])."'");
		$to = mysql_fetch_array($sql);
		$check = mysql_num_rows($sql);
		if($check != 0){
			$check = mysql_num_rows(mysql_query("SELECT * FROM `mail_block` WHERE `from_userid` = '".$userid."' AND `to_userid` = '".$to['id']."'"));
			if($check != 0){
				$error = 'Este jogador j&aacute; est&aacute; bloqueado.';
			}else{
				mysql_query("INSERT INTO `mail_block` (`to_userid`,`from_userid`) VALUES ('".$to['id']."','".$userid."')");
			}
		}else{
			$error = 'Jogador n&atilde;o encontrado.';
		}
	}

	if($_GET['action'] == 'unblock'){
		mysql_query("DELETE FROM `mail_block` WHERE `id` = '".$_GET['id']."'");
	}
{/php}
{php}if(!empty($error)){echo '<div class="error">'.$error.'</div>';}{/php}
<p>Este jogador n&atilde;o poder&aacute; lhe enviar mais mensagens.</p>
<form action="game.php?village={$village.id}&amp;screen=mail&amp;mode=block&amp;action=block" method="post">
	<table class="vis">
		<tr>
			<td>Jogador:</td>
			<td><input name="name" type="text" /></td>
			<td><input type="submit" value="Ok" class="button" /></td>
		</tr>
	</table><br />
</form>
{php}
	$sql2 = mysql_query("SELECT * FROM `mail_block` WHERE `from_userid` = '".$userid."'");
	$query03 = mysql_num_rows($sql2);
	if($query03 > 0){
{/php}
<h3>Jogadores bloqueados</h3>
<table class="vis">
	<tr>
		<th width="200">Jogador</th>
		<th width="100">A&ccedil;&atilde;o</th>
	</tr>
{php}
		while($ublock = mysql_fetch_array($sql2)){
			$udt = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$ublock['to_userid']."'"));
 {/php}
	<tr>
		<td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={php}echo $udt['id'];{/php}">{php}echo entparse($udt['username']); {/php}</a></td>
		<td><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=block&amp;action=unblock&amp;id={php}echo $ublock['id'];{/php}">Desbloquear</a></td>
	</tr>
{php}
		}
{/php}
</table>
{php}
	}
{/php}