<?php /* Smarty version 2.6.14, created on 2011-12-15 17:19:54
         compiled from game_mail_block.tpl */ ?>
<h3>Zablokuj nadawcê</h3>
<p>Tudaj mo¿esz zablokowaæ nadawcê.</p>
	
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=block&amp;action=block_name&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
<table class="vis"><tr>
<td>Gracz:</td>
<td><input name="tribe_name" type="text" /></td>
<td><input type="submit" value="OK" /></td>
</tr></table>
</form>

<?php if (count ( $this->_tpl_vars['blocked'] ) > 0): ?>
	<h4>Zablokowani gracze</h4>
	<table class="vis">
	<tr><th width="200">Nazwa</th><th width="100">Odblokuj</th></tr>
		<?php $_from = $this->_tpl_vars['blocked']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
			<tr>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['arr']['blocked_id']; ?>
"><?php echo $this->_tpl_vars['arr']['blocked_name']; ?>
</a></td>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=block&amp;action=unblock&amp;from_id=<?php echo $this->_tpl_vars['arr']['blocked_id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">odblokuj</a></td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>
<?php endif; ?>