<?php /* Smarty version 2.6.14, created on 2012-11-14 12:02:13
         compiled from index_reset.tpl */ ?>
<h2>Restart server</h2>
<?php if ($this->_tpl_vars['error']): ?>
	<?php echo $this->_tpl_vars['error']; ?>

<?php endif; ?>
<form action="index.php?screen=reset&restart=total_server" method="POST">
<table class="vis">
	<tr><th>Restarteaza baza de date - Serverul va fi restartat complet,conturile vor fi sters.</th></tr>
    <tr><td><p>Introdu parola: <input type="pass" name="password" /><input type="submit" value="Restart" /></td></tr>
</table>
</form>