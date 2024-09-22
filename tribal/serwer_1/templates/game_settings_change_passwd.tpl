<h3>Zmieñ has³o</h3>
<p>Tutaj mo¿esz zmieniæ swoje has³o. W tym celu podaj swoje stare i nowe has³o. Nowe has³o musisz dla pewnoœci wpisaæ dwa razy.</p>
<p>Je¿eli zapomnia³eœ swojego has³a, mo¿esz tutaj poprosiæ o nowe&gt; <a href="/lost_pw.php" target="_blank">zapomnia³em has³a</a></p>
<p>Twoje nowe has³o zostanie zmienione na <em>wszystkich œwiatach</em> i jest wa¿ne <em>zaraz</em> po zmianie. Nie trzeba go potwierdzaæ przez e-mail.</p>

<form method="post" action="game.php?village={$village.id}&amp;screen=settings&amp;mode=change_passwd&amp;action=change_passwd&amp;h={$hkey}">
<table class="vis">
	<tbody><tr>
		<td><label for="old_passwd">Stare has³o</label></td>
		<td><input name="old_passwd" id="old_passwd" type="password"></td>
	</tr>
	<tr>
		<td><label for="new_passwd">Nowe has³o</label></td>
		<td><input name="new_passwd" id="new_passwd" type="password"></td>

	</tr>
	<tr>
		<td><label for="new_passwd_rpt">powtórz:</label></td>
		<td><input name="new_passwd_rpt" id="new_passwd_rpt" type="password"></td>
	</tr>
	<tr>
		<td></td>
		<td><input value="Zmieñ has³o" type="submit"></td>

	</tr>
</tbody></table>
</form>