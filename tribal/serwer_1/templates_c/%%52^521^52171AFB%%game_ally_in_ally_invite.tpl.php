<?php /* Smarty version 2.6.14, created on 2014-07-06 22:42:02
         compiled from game_ally_in_ally_invite.tpl */ ?>
<table class="vis" width="400">
<tr><th colspan="3">Convites pendentes</th></tr>
	<?php $_from = $this->_tpl_vars['invites']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
		<tr>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['arr']['to_userid']; ?>
"><?php echo $this->_tpl_vars['arr']['to_username']; ?>
</a></td>
			<td><?php echo $this->_tpl_vars['arr']['time']; ?>
</td>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=invite&amp;action=cancel_invitation&amp;id=<?php echo $this->_tpl_vars['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Cancelar</a></td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>
<br />
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;action=invite&amp;mode=invite&amp;action=invite&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
	<table class="vis" width="400">
	<tr><th colspan="3">Convidar </th></tr>
	<tr><td>Nome:</td>
	<td><input name="name" type="text" value="" /></td>
	<td><input type="submit" value="Convidar" /></td></tr>
	</table>
</form>