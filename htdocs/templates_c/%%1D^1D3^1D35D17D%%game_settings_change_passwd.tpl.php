<?php /* Smarty version 2.6.14, created on 2024-01-10 01:48:33
         compiled from game_settings_change_passwd.tpl */ ?>
<h3>Modificarea parolei</h3>
<?php if ($this->_tpl_vars['changed']): ?>

<?php endif; ?>
<p>&#206;n aceast&#259; categorie i&#355;i po&#355;i schimba parola. &#206;n primul c&#226;mp va trebui s&#259; introduci vechea parol&#259;, iar in celelalte dou&#259; canpuri noua ta parola.</p>
<p>Parola nou&#259; va fi schimbat&#259; pe toate lumile de joc &#351;i nu trebuie confirmat&#259; prin e-mail.</p>

<form method="post" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=change_passwd&amp;action=change_passwd&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">
<table class="vis">
	<tr>
		<td><label for="old_passwd">Vechea parol&#259;:</label></td>
		<td><input type="password" name="old_passwd" id="old_passwd" /></td>
	</tr>
	<tr>
		<td><label for="new_passwd">Noua parol&#259;:</label></td>
		<td><input type="password" name="new_passwd" id="new_passwd" /></td>

	</tr>
	<tr>
		<td><label for="new_passwd_rpt">Repet&#259; noua parol&#259;:</label></td>
		<td><input type="password" name="new_passwd_rpt" id="new_passwd_rpt" /></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="Modific&#259;!"/></td>

	</tr>
</table>
</form>
	