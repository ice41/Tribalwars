<h3>Zmie� has�o</h3>
{if $changed}
	<b>Zmieniono has�o</b><br />
{/if}
<p>Tutaj mo�esz zmieni� swoje has�o. W tym celu podaj swoje stare i nowe has�o. Nowe has�o musisz dla pewno�ci wpisa� dwa razy. Je�eli zapomnia�e� swojego has�a, mo�esz tutaj po</p>
<p>Twoje nowe has�o zostanie zmienione na wszystkich �wiatach i jest wa�ne zaraz po zmianie. Nie trzeba go potwierdza� przez e-mail.</p>

<form method="post" action="game.php?village={$village.id}&amp;screen=settings&amp;mode=change_passwd&amp;action=change_passwd&amp;h={$hkey}">
<table class="vis">
	<tr>
		<td><label for="old_passwd">Stare has�o: </label></td>
		<td><input type="password" name="old_passwd" id="old_passwd" /></td>
	</tr>
	<tr>
		<td><label for="new_passwd">Nowe has�o: </label></td>
		<td><input type="password" name="new_passwd" id="new_passwd" /></td>

	</tr>
	<tr>
		<td><label for="new_passwd_rpt">powt�rz: </label></td>
		<td><input type="password" name="new_passwd_rpt" id="new_passwd_rpt" /></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="Zmie� has�o"/></td>

	</tr>
</table>
</form>