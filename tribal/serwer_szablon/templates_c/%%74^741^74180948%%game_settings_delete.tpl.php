<?php /* Smarty version 2.6.14, created on 2012-03-08 09:55:26
         compiled from game_settings_delete.tpl */ ?>
<h3>Usuñ konto</h3>
<p>Je¿eli tylko oddasz swoje konto do skasowania, nie mo¿esz siê ju¿ wiêcej zalogowaæ. Konto zostanie usuniête natychmistowo.</p>
<p>Tylko konto na tym œwiecie bêdzie skasowane. Twoje konta w forum i na innych serwerach zostan¹ zachowane.</p>

<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=delete&amp;action=delete&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
	Has³o: <input name="password" type="password">
	<input value="OK" type="submit">
</form>