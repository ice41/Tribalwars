<h3>Mudar senha</h3>
<p>Pode alterar sua senha aqui. Para fazer isso, digite suas senhas antigas e novas. Deve inserir a nova senha duas vezes para ter certeza.</p>
<p>Se esqueceu a sua senha, pode solicitar uma nova aqui&gt; <a href="/lost_pw.php" target="_blank">esqueci a senha</a></p>
<p>Sua nova senha será alterada em <em>todos os mundos</em> e será válida <em>imediatamente</em> após a alteração. Não precisa ser confirmado por e-mail.</p>

<form method="post" action="game.php?village={$village.id}&amp;screen=settings&amp;mode=change_passwd&amp;action=change_passwd&amp;h={$hkey}">
<table class="vis">
	<tbody><tr>
		<td><label for="old_passwd">Senha Antiga</label></td>
		<td><input name="old_passwd" id="old_passwd" type="password"></td>
	</tr>
	<tr>
		<td><label for="new_passwd">Nova Senha</label></td>
		<td><input name="new_passwd" id="new_passwd" type="password"></td>

	</tr>
	<tr>
		<td><label for="new_passwd_rpt">Repetir Senha:</label></td>
		<td><input name="new_passwd_rpt" id="new_passwd_rpt" type="password"></td>
	</tr>
	<tr>
		<td></td>
		<td><input value="Mudar senha" type="submit"></td>

	</tr>
</tbody></table>
</form>