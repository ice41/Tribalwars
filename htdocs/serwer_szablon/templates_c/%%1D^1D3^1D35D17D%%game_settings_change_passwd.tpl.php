<?php /* Smarty version 2.6.14, created on 2011-12-17 22:05:23
         compiled from game_settings_change_passwd.tpl */ ?>
<h3>Zmie� has�o</h3>
<?php if ($this->_tpl_vars['changed']): ?>
	<b>Zmieniono has�o</b><br />
<?php endif; ?>
<p>Tutaj mo�esz zmieni� swoje has�o. W tym celu podaj swoje stare i nowe has�o. Nowe has�o musisz dla pewno�ci wpisa� dwa razy. Je�eli zapomnia�e� swojego has�a, mo�esz tutaj po</p>
<p>Twoje nowe has�o zostanie zmienione na wszystkich �wiatach i jest wa�ne zaraz po zmianie. Nie trzeba go potwierdza� przez e-mail.</p>

<form method="post" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=change_passwd&amp;action=change_passwd&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">
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