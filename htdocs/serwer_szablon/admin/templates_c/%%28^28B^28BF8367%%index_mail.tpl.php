<?php /* Smarty version 2.6.14, created on 2011-12-04 08:59:31
         compiled from index_mail.tpl */ ?>
<h2>Systemmail</h2>
Hier kann eine Nachricht verschickt werden, die alle Registrierten Spieler erhalten!<br /><br />

<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<br /><br /><font class="error"><?php echo $this->_tpl_vars['error']; ?>
</font><br /><br />
<?php endif; ?>

<?php if ($this->_tpl_vars['is_send']): ?>
	Systemnachricht wurde versand!
<?php else: ?>
	<form method="post" action="index.php?screen=mail&amp;action=send" onSubmit="this.submit.disabled=true;">
		<table class="vis">
			<tr>
				<td>Betreff:</td><td><input type="text" name="subject" size="70" value="<?php echo $this->_tpl_vars['subject']; ?>
"></td>
			</tr>
			<tr>
				<td colspan="2"><textarea rows="20" cols="80" name="text"><?php echo $this->_tpl_vars['text']; ?>
</textarea></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Senden"></td>
			</tr>
		</table>
	</form>
<?php endif; ?>