<?php /* Smarty version 2.6.14, created on 2011-12-12 22:26:36
         compiled from index_save_round.tpl */ ?>
<h2>Runde abspeichern</h2>
Die aktuell laufende Runde kann hier abgespeichert werden und kann dann jederzeit auf der Startseite unter SDS Runden aufgerufen werden.
<br /><br />

<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<br /><br /><font class="error"><?php echo $this->_tpl_vars['error']; ?>
</font><br /><br />
<?php endif; ?>

<?php if ($this->_tpl_vars['is_send']): ?>
	Runde abgespeichert.
<?php else: ?>
	<form method="post" action="index.php?screen=save_round&amp;action=send" onSubmit="this.submit.disabled=true;">
		<table class="vis">
			<tr>
				<td>Name:</td><td><input type="text" name="name" size="70" value="<?php echo $this->_tpl_vars['name']; ?>
"></td>
			</tr>
			<tr>
				<td>Start:</td><td><input type="text" name="start" size="70" value="<?php echo $this->_tpl_vars['start']; ?>
"></td>
			</tr>
			<tr>
				<td>Ende:</td><td><input type="text" name="end" size="70" value="<?php echo $this->_tpl_vars['end']; ?>
"></td>
			</tr>
			<tr>
				<td>Beschreibung:</td><td><input type="text" name="description" size="70" value="<?php echo $this->_tpl_vars['description']; ?>
"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Abspeichern"></td>
			</tr>
		</table>
	</form>
<?php endif; ?>