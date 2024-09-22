<h3>Alterar o seu endereco de email</h3>

<p>Pode alterar seu endereco de e-mail aqui, é necessário caso esqueça sua senha.</p>

<b>Sua conta está registrada no endereco: </b>{$email}<br><br>

<form method="post" action="game.php?village={$village.id}&amp;screen=settings&amp;mode=email&amp;action=change_email&amp;h={$hkey}">
<table class="vis">
	<tbody><tr>
		<td><label for="passwd">Senha</label></td>
		<td><input name="passwd" id="passwd" type="password"></td>
	</tr>
	<tr>
		<td><label for="new_email">Novo endereco e-mail</label></td>
		<td><input name="new_email" id="new_email" type="text"></td>
	</tr>
	<tr>
		<td></td>
		<td><input value="Mudar E-Mail" type="submit"></td>

	</tr>
</tbody></table>
</form>



