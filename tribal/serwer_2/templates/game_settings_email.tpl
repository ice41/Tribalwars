<h3>Zmie� adres e-mail</h3>

<p>Tutaj mo�esz zmieni� sw�j adres e-mail, wymagany jest on w wypadku, gdy zapomniesz swoje has�o.</p>

<b>Twoje konto jest zarejestrowane na adres: </b>{$email}<br><br>

<form method="post" action="game.php?village={$village.id}&amp;screen=settings&amp;mode=email&amp;action=change_email&amp;h={$hkey}">
<table class="vis">
	<tbody><tr>
		<td><label for="passwd">Has�o</label></td>
		<td><input name="passwd" id="passwd" type="password"></td>
	</tr>
	<tr>
		<td><label for="new_email">Nowy adres e-mail</label></td>
		<td><input name="new_email" id="new_email" type="text"></td>
	</tr>
	<tr>
		<td></td>
		<td><input value="Zmie� has�o" type="submit"></td>

	</tr>
</tbody></table>
</form>