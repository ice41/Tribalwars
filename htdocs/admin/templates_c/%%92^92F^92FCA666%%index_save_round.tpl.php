<?php /* Smarty version 2.6.14, created on 2010-12-17 10:51:18
         compiled from index_save_round.tpl */ ?>
<h2>Runda speed</h2>
Rundele speed pot fi setate data inceperi/sfarsiri unei eunde iar datele sunt pastrate in Runde speed de pe pagina principala.
<br /><br />

<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<br /><br /><font class="error"><?php echo $this->_tpl_vars['error']; ?>
</font><br /><br />
<?php endif; ?>

<?php if ($this->_tpl_vars['is_send']): ?>
	Runde speed
<?php else: ?>
	<form method="post" action="index.php?screen=save_round&amp;action=send" onSubmit="this.submit.disabled=true;">
		<table class="vis">
			<tr>
				<td>Nume:</td><td><input type="text" name="name" size="70" value="<?php echo $this->_tpl_vars['name']; ?>
"></td>
			</tr>
			<tr>
				<td>Start:</td><td><input type="text" name="start" size="70" value="<?php echo $this->_tpl_vars['start']; ?>
"></td>
			</tr>
			<tr>
				<td>Sfarsit:</td><td><input type="text" name="end" size="70" value="<?php echo $this->_tpl_vars['end']; ?>
"></td>
			</tr>
			<tr>
				<td>Descriere:</td><td><input type="text" name="description" size="70" value="<?php echo $this->_tpl_vars['description']; ?>
"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Start"></td>
			</tr>
		</table>
	</form>
<?php endif; ?>