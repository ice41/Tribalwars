<h3>Zmie� has�o</h3>
<p>Tutaj mo�esz zmieni� swoje has�o. W tym celu podaj swoje stare i nowe has�o. Nowe has�o musisz dla pewno�ci wpisa� dwa razy.</p>
<p>Je�eli zapomnia�e� swojego has�a, mo�esz tutaj poprosi� o nowe&gt; <a href="/lost_pw.php" target="_blank">zapomnia�em has�a</a></p>
<p>Twoje nowe has�o zostanie zmienione na <em>wszystkich �wiatach</em> i jest wa�ne <em>zaraz</em> po zmianie. Nie trzeba go potwierdza� przez e-mail.</p>

<form method="post" action="game.php?village={$village.id}&amp;screen=settings&amp;mode=change_passwd&amp;action=change_passwd&amp;h={$hkey}">
<table class="vis">
	<tbody><tr>
		<td><label for="old_passwd">Stare has�o</label></td>
		<td><input name="old_passwd" id="old_passwd" type="password"></td>
	</tr>
	<tr>
		<td><label for="new_passwd">Nowe has�o</label></td>
		<td><input name="new_passwd" id="new_passwd" type="password"></td>

	</tr>
	<tr>
		<td><label for="new_passwd_rpt">powt�rz:</label></td>
		<td><input name="new_passwd_rpt" id="new_passwd_rpt" type="password"></td>
	</tr>
	<tr>
		<td></td>
		<td><input value="Zmie� has�o" type="submit"></td>

	</tr>
</tbody></table>
</form>