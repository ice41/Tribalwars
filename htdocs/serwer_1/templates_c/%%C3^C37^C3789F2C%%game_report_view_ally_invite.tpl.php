<?php /* Smarty version 2.6.14, created on 2011-12-15 15:31:29
         compiled from game_report_view_ally_invite.tpl */ ?>
<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['report']['from_user']; ?>
"><?php echo $this->_tpl_vars['report']['from_username']; ?>
</a> zaprasza do plemienia
<?php if ($this->_tpl_vars['report']['ally_exist'] == 0):  echo $this->_tpl_vars['report']['allyname']; ?>
 (rozwi¹zane)<?php else: ?><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_ally&amp;id=<?php echo $this->_tpl_vars['report']['ally']; ?>
"><?php echo $this->_tpl_vars['report']['allyname']; ?>
</a><?php endif;  if ($this->_tpl_vars['user']['ally'] == -1): ?>
	<p><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally">&raquo; Zaproszenia</a></p>
<?php endif; ?>