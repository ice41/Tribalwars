{php}
	include("include/config.php");

	$userid = $this->_tpl_vars['user']['id'];
	$sleep_time = $config['sleep_time']*60*60;
	$selectare = mysql_fetch_array(mysql_query("SELECT `sleep_time`,`sleep_end`,`sleep`,`sleep_start`,`sleep_used`,`noob_protection` FROM `users` WHERE `id` = '".$userid."'"));
	if($selectare['sleep'] == '1'){
		$scadere = $selectare['sleep_end'] - time();
		mysql_query("UPDATE `users` SET `sleep_time` = '".$scadere."' WHERE `id` = '".$userid."'");
	}
	if($selectare['sleep_used'] == '0'){
		mysql_query("UPDATE `users` SET `sleep_time` = '".$sleep_time."' WHERE `id` = '".$userid."'");
		mysql_query("UPDATE `users` SET `sleep_used` = '1' WHERE `id` = '".$userid."'");
	}
	$selectare = mysql_fetch_array(mysql_query("SELECT `sleep_time`,`sleep_end`,`sleep`,`sleep_start`,`noob_protection` FROM `users` WHERE `id` = '".$userid."'"));
	$user = mysql_fetch_array(mysql_query("SELECT `id`,`sleep_last_activate`,`attacks` FROM users WHERE id = '".$this->_tpl_vars['user']['id']."'"));
	$timp = time();
	$sleep_last_active =  time() - $user['sleep_last_activate'];
	$config['sleep_used'] = 60 * $config['sleep_used'];
	$user['sleep_last_activate'];
	$vill = $_GET['village'];
	$end_time = $selectare['1'];
	$ase = ceil($config['sleep_used'] / 60);
	$last_attack = 60 * $config['sleep_last_attack'];
	$last_attack_time = time() - $last_attack;
	$last_attack_query = mysql_fetch_array(mysql_query("SELECT `last_attack` FROM `users` WHERE `id` = '".$userid."'"));

	if($_GET['sleep'] == 'go' && isset($_POST['go'])){
		$password = mysql_num_rows(mysql_query("SELECT * FROM `login`.`users` WHERE `password` = '".md5(crc32(md5($_POST['password'])))."' AND `id` = '".$userid."'"));
		if($password != 1){
			$error = 'Senha invalida.';
		}else{
			$numar_atacuri = mysql_num_rows(mysql_query("SELECT * FROM `movements` WHERE `send_from_user` = '".$user."' || `send_to_user` = '".$userid."'"));
			if($user['attacks'] != '0' || $numar_atacuri > 0){
				$error = urlencode("O modo noturno s&oacute; pode ser ativado se voc&ecirc; n&atilde;o estiver efetuando nenhum ataque ou sendo atacado.");
			}else{
				if($config['sleep_used'] >= $sleep_last_active && $user['sleep_last_activate'] != 0){
					$error = urlencode("Est&aacute; op&ccedil;&atilde;o pode ser usada a cada ".$ase." minuto(s).");
				}else{
					if($last_attack_query['last_attack'] > '0' && $last_attack_time <= $last_attack_query['last_attack']){
						$error = urlencode("Voc&ecirc; s&oacute; poder&aacute; ativar o modo noturno ap&oacute;s  ".$config['sleep_last_attack']." minuto(s) da chegada do &uacute;ltimo comando.");
					}else{
						$noob_int = $selectare['noob_protection']+($config['sleep_noob_interval']*60);
						if($selectare['noob_protection'] > time()){
							$error = urlencode("Voc&ecirc; s&oacute; poder&aacute; ativar o modo noturno ap&oacute;s ".$config['sleep_noob_interval']." minuto(s) do fim da prote&ccedil;&atilde;o de iniciantes.");
						}
					}
				}
			}
		}
		if(empty($error)){
			mysql_query("UPDATE `users` SET `sleep` = '1' WHERE `id` = '".$userid."'");
			mysql_query("UPDATE `users` SET `sleep_start` = '".time()."' WHERE `id` = '".$userid."'");
			$end = time() + $selectare['sleep_time'];
			mysql_query("UPDATE `users` SET `sleep_last_activate` = '".time()."' WHERE `id` = '".$userid."'");
			mysql_query("UPDATE `users` SET `sleep_end` = '".$end."' WHERE `id` = '".$userid."'");
			mysql_query("UPDATE `users` SET `sleep_used` = '1' WHERE `id` = '".$userid."'");
			$succes = parse("Conta desativada com sucesso. Voc&ecirc; ser&aacute; redirecionado em 3 segundos.");
		}
	}
	if(isset($succes)){ echo '<div class="succes">'.urldecode($succes).'</div><meta http-equiv="refresh" content="3;url=game.php">'; }
	if(isset($error)) { echo '<div class="error">'.urldecode($error).'</div>'; }
{/php}
<p>Aqui voc&ecirc; pode desativar sua conta. Quando sua conta estiver desativada, voc&ecirc; n&atilde;o ser&aacute; atacado e n&atilde;o poder&aacute; acessar sua conta.</p>
<b style="color: red;">ATEN&Ccedil;&Atilde;O:</b> Esta op&ccedil;&atilde;o pode ser usada:
	<li style="margin-left:15px;">A cada {php} echo "<b>".$ase."</b>"; {/php} minuto(s).</li>
	<li style="margin-left:15px;">Ap&oacute;s {php} echo "<b>".$config['sleep_last_attack']."</b>"; {/php} minuto(s) do &uacute;ltimo ataque.</li>
	<li style="margin-left:15px;">Ap&oacute;s {php} echo "<b>".$config['sleep_noob_interval']."</b>"; {/php} minuto(s) do fim da prote&ccedil;&atilde;o de iniciantes.</li>
	<li style="margin-left:15px;">Quando voc&ecirc; n&atilde;o estiver sendo atacado ou atacando alguem.</li><br />
<form action="game.php?village={$village.id}&screen=settings&mode=sleep&sleep=go" method="POST">
	<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;"
		<tr><th width="200">Dura&ccedil;&atilde;o m&aacute;xima:</th><td width="200"><b>{php} echo format_time($selectare['0']); {/php}</b></td></tr>
		{php} if($selectare['sleep_time'] > 0) { {/php}
		{php} if($end_time < time() AND $end_time > 1) { {/php}
		<tr><th>Fim:</th><td><b>{php} echo date("d.m.Y, H:i", $end_time); {/php}</b></td></tr>
		{php} } {/php}
		{php} if($last_attack_query['last_attack'] > 0) {
			echo '<tr><th>&Uacute;ltimo ataque:</th><td>'.date("d.m.Y, H:i", $last_attack_query['last_attack']).'</td></tr>';
		}
		{/php}
		{php}if($user['sleep_last_activate'] != '0'){{/php}<tr><th>&Uacute;ltima vez que usou:</th><td><b>{php} echo date("d.m.Y, H:i",$user['sleep_last_activate']); {/php}</b></td></tr> {php} } else { echo '<tr><td colspan="2"><b><span style="color: rgb(14, 255, 14);">Nunca usou</span></b></td></tr>'; }{/php}
		<tr><th>Sua senha:</th><td><input type="password" name="password" /><span style="float:right;"><input type="submit" name="go" value="Ok" class="button" /></span></td></tr>
  {php} } {/php}
	</table>
</form>