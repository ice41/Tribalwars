{php}
	$userid = $this->_tpl_vars['user']['id'];
	$select_pw = mysql_fetch_array(mysql_query("SELECT * FROM `login`.`users` WHERE `id` = '".$userid."'"));

	$actu_password = md5($_POST['actu_password']);
	$new_password = $_POST['new_password'];
	$re_new_password = $_POST['re_new_password'];

	if($_GET['action'] == 'change_pw'){
		if($actu_password != $select_pw['password']){
			$error = "Senha atual invalida!";
			if(strlen(trim($new_password)) < 6 || strlen(trim($new_password)) > 32){
				$error = "A nova senha deve ter entre 6 e 32 caracteres!";
				if($new_password != $re_new_password){
					$error = "As senhas n&atilde;o s&atilde;o iguais!";
				}
			}
		}
		if(empty($error)){
			mysql_query("UPDATE `users` SET `login`.`password` = '".md5(crc32(md5($new_password)))."' WHERE `id` = '".$userid."'");
			$succes = "Senha modificada com sucesso!";
		}
	}
{/php}
{php}if(!empty($error)){{/php}<div class="error">{php}echo $error;{/php}</div>{php}}{/php}
{php}if(!empty($succes)){{/php}<div class="succes">{php}echo $succes;{/php}</div>{php}}{/php}
<p>Aqui voc&ecirc; pode alterar a sua senha. Forne&ccedil;a a sua senha atual, assim como uma nova senha. Por raz&otilde;es de seguran&ccedil;a voc&ecirc; precisar&aacute; fornecer duas vezes a nova senha.</p>
<p>A sua nova senha ser&aacute;&nbsp;<em>mudada em todos os mundos</em>&nbsp;e ser&aacute; v&aacute;lida&nbsp;<em>imediatamente</em>&nbsp;ap&oacute;s a mudan&ccedil;a. N&atilde;o h&aacute; a necessidade de confirma&ccedil;&atilde;o por e-mail.</p>
<form method="post" action="game.php?village={$village.id}&amp;screen=settings&amp;mode=change_passwd&amp;action=change_pw">
	<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><th colspan="2">Alterar senha</th></tr>
		<tr>
			<td><label for="old_passwd">Senha atual:</label></td>
			<td><input type="password" name="actu_password" id="actu_passwd" /></td>
		</tr>
		<tr>
			<td><label for="new_passwd">Nova senha:</label></td>
			<td><input type="password" name="new_password" id="new_passwd" /></td>
		</tr>
		<tr>
			<td><label for="new_passwd_rpt">Confirme:</label></td>
			<td><input type="password" name="re_new_password" id="re_new_passwd" /></td>
		</tr>
		<tr><th colspan="2"><span style="float:right;"><input type="submit" value="Alterar" class="button" /></span></td></tr>
</table>
</form>