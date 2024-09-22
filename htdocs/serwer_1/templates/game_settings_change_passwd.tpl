<h3>Zmieñ has³o</h3>
{if $changed}
	<b>Zmieniono has³o</b><br />
{/if}
<p>Tutaj mo¿esz zmieniæ swoje has³o. W tym celu podaj swoje stare i nowe has³o. Nowe has³o musisz dla pewnoœci wpisaæ dwa razy. Je¿eli zapomnia³eœ swojego has³a, mo¿esz tutaj po</p>
<p>Twoje nowe has³o zostanie zmienione na wszystkich œwiatach i jest wa¿ne zaraz po zmianie. Nie trzeba go potwierdzaæ przez e-mail.</p>

<form method="post" action="game.php?village={$village.id}&amp;screen=settings&amp;mode=change_passwd&amp;action=change_passwd&amp;h={$hkey}">
<table class="vis">
	<tr>
		<td><label for="old_passwd">Stare has³o: </label></td>
		<td><input type="password" name="old_passwd" id="old_passwd" /></td>
	</tr>
	<tr>
		<td><label for="new_passwd">Nowe has³o: </label></td>
		<td><input type="password" name="new_passwd" id="new_passwd" /></td>

	</tr>
	<tr>
		<td><label for="new_passwd_rpt">powtórz: </label></td>
		<td><input type="password" name="new_passwd_rpt" id="new_passwd_rpt" /></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="Zmieñ has³o"/></td>

	</tr>
</table>
</form>