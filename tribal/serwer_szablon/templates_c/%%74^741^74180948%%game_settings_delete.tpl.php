<?php /* Smarty version 2.6.14, created on 2012-03-08 09:55:26
         compiled from game_settings_delete.tpl */ ?>
<h3>Usu� konto</h3>
<p>Je�eli tylko oddasz swoje konto do skasowania, nie mo�esz si� ju� wi�cej zalogowa�. Konto zostanie usuni�te natychmistowo.</p>
<p>Tylko konto na tym �wiecie b�dzie skasowane. Twoje konta w forum i na innych serwerach zostan� zachowane.</p>

<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=delete&amp;action=delete&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
	Has�o: <input name="password" type="password">
	<input value="OK" type="submit">
</form>