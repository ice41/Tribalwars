{php}
	$user = mysql_query("SELECT * FROM `login`.`users` WHERE `id` = '".$this->_tpl_vars['user']['id']."'") or die(mysql_error());
	$user = mysql_fetch_assoc($user);

	$password = md5(crc32(md5($_POST['password'])));
	$mail = $_POST['mail'];
	if(isset($_GET['do']) && $_GET['do'] == 'change' && isset($_POST['go'])){
		// verificam daca parola se potriveste
		if($password == $user['password']){
			// verificam daca adresa de mail este o adresa valida
			if(eregi("^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$", $mail) == false){
				$error = "E-mail invalido.";
			}else{
				// verificam daca adresa de email este folosita
				$adresa_folosita = mysql_num_rows(mysql_query("SELECT `id` FROM `login`.`users` WHERE `mail` = '".$mail."'"));
				if($adresa_folosita > 0){
					// verificam daca adresa de e-mail este a lui
					if($mail == $user['mail']){
						$error = 'Voc&ecirc; n&atilde;o pode alterar para o mesmo e-mail.';
					}else{
						$error = 'Este e-mail j&aacute; est&aacute; em uso.';
					}
				}else{
					// verificam daca sa mai cerut odata sa se schimbe aceasta adresa de e-mail
					$mail_schimbat = mysql_query("SELECT * FROM `login`.`change_mail` WHERE `userid` = '".$user['id']."'");
					$mail_schimbat_r = mysql_num_rows($mail_schimbat);
					$mail_schimbat_arr = mysql_fetch_assoc($mail_schimbat);
					if($mail_schimbat_r > 0){
						$error = 'S-a facut deja o cerere';
					}else{
						// confirmare noua adresa de e-mail
						$cod = cod(12);
						$subiect = "Empire of War - Modificação de e-mail.";
						$message = entparse($user['username']).", para confirmar a alteração de seu e-mail, você deve acessar o link: http://eow.zapto.oeg/?confirm=new_mail&mail=".$mail."&cod=".$cod;
						$headers = 'From: Empire of War <contato@empireofwar.net>' . "\r\n";
						mail($mail, $subiect, $message, $headers);
						// adresa veche de e-mail
						$subiect = "Empire of War - Modificação de e-mail.";
						$message = $user['username'].", seu e-mail foi alterado para ".$mail.". Caso esta troca não tenha sido feita por você, acesse o seguinte link para cancelar a alteração: http://eow.zapto.org/?confirm=second_mail&mail=".$user['mail']."&cod=".$cod;
						$headers = 'From: Empire of War <contato@empireofwar.net>'."\r\n";
						mail($user[mail], $subiect, $message, $headers);
						// inserare informatii in baza de date
						mysql_query("INSERT INTO `login`.`change_mail` (`userid`,`username`,`new_mail`,`second_mail`,`cod`,`time`) VALUES ('".$user['id']."','".$user['username']."','".$mail."','".$user['mail']."','".$cod."','".time()."')") or die (mysql_error());
						$succes = true;
					}
				}
			}
		}else{
			$error = 'Senha invalida.';
		}
	}
	$fa = mysql_query("SELECT * FROM `login`.`change_mail` WHERE `userid` = '".$user['id']."'");
	$fa_n = mysql_num_rows($fa);
	$fa_a = mysql_fetch_assoc($fa);
	if($succes == true){
{/php}
<div class="error">Succeso!. Um e-mail foi enviado para {php}echo $mail;{/php} com o link de confirma&ccedil;&atilde;o. Verifique sua caixa de SPAM.</div>

{php}
	}elseif($fa_n == 1){ 
		if($fa_a['second_mail'] == $user['mail']){
			echo "<div class=\"error\">Seu e-mail foi alterado recentemente para '".$fa_a['new_mail']."'. O mesmo ainda n&atilde;o foi confirmado. Por favor confirme a modifica&ccdil;&atilde;o de e-mail.</div>";
		}elseif($fa_a['new_mail'] == $user['mail']){
			$timp = time();
			$time = $timp - 60 * 60 * 24 * 14;
			if($time >= $fa_a['time']){
				mysql_query("DELETE FROM `login`.`change_mail` WHERE `userid` = '".$user['id']."'");
{/php}
<p>Introdu noua adresa de e-mail si confirma modificarea cu parola ta.</p>
<p><font color="red">IMPORTANT:</font> Vei primi un e-mail la adresa noua, pe care trebuie sa o confirmi. Si la adresa veche va fi expediat un e-mail prin care ai posibilitatea in urmatoarele 14 zile sa-ti retragi modificarea. In aceasta perioada adresa de e-mail nu mai poate fi modificata din nou.</p>

<form action="game.php?village={$village.id}&screen=settings&mode=email&do=change" method="POST">
<table class="vis">
  <tr><td>Adresa actuala de e-mail:</td><td>{php} echo $user['mail']; {/php}</td></tr>
  <tr><td>Noua adresa de e-mail:</td><td><input type="text" name="mail" size="24" /></td></tr>
  <tr><td>Parola:</td><td><input type="password" name="password" size="20" /></td></tr>
  <tr><td colspan="100%"><input type="submit" name="go" value="Schimba" class="button" />{php} if (isset($error)){ echo "&nbsp;<font color=\"red\">".$error."</font>"; } {/php}</td></tr>
</table>
</form>
{php}
			}else{
				$timp_ramas = format_time($fa_a['time'] - $time);
{/php}
<h3>N&atilde;o &eacute; poss&iacute;vel a altera&ccedil;&atilde;o do endereço de e-mail.</h3>
<p>Recentemente seu e-mail foi alterado para <b>{php} echo $user['mail']; {/php}</b>. Por motivos de seguran&ccedil;a seu e-mail s&oacute; poder&aacute; ser modificado novamente ap&oacute;s 14dias.</p>

Timp ramas: <b>{php} echo $timp_ramas; {/php}</b>
{php}
			}
		}
	}else{
{/php}
<p>Introdu noua adresa de e-mail si confirma modificarea cu parola ta.</p>
<p><font color="red">IMPORTANT:</font> Vei primi un e-mail la adresa noua, pe care trebuie sa o confirmi. Si la adresa veche va fi expediat un e-mail prin care ai posibilitatea in urmatoarele 14 zile sa-ti retragi modificarea. In aceasta perioada adresa de e-mail nu mai poate fi modificata din nou.</p>


<form action="game.php?village={$village.id}&screen=settings&mode=email&do=change" method="POST">
<table class="vis">
  <tr><td>Adresa actuala de e-mail:</td><td>{php} echo $user['mail']; {/php}</td></tr>
  <tr><td>Noua adresa de e-mail:</td><td><input type="text" name="mail" size="24" /></td></tr>
  <tr><td>Parola:</td><td><input type="password" name="password" size="20" /></td></tr>
  <tr><td colspan="100%"><input type="submit" name="go" value="Schimba" class="button" />{php} if (isset($error)){ echo "&nbsp;<font color=\"red\">".$error."</font>"; } {/php}</td></tr>
</table>
</form>
{php}
	}
{/php}