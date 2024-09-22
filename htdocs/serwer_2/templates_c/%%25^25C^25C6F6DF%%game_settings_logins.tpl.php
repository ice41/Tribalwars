<?php /* Smarty version 2.6.14, created on 2011-12-17 22:05:21
         compiled from game_settings_logins.tpl */ ?>
<h3>Logowania</h3>
<p>Na tej stronie widzisz, kiedy mia³y miejsce loginy i nieudane próby zalogowania siê do Twojego konta. Je¿eli stwierdzisz, ¿e ktoœ nieupowa¿niony ma dostêp do Twojego konta, powinieneœ niezw³ocznie zmieniæ has³o. Zale¿nie od rodzaju po³¹czenia: numer IP mo¿e siê zmieniaæ, gdy na nowo ³¹czysz siê z internetem.</p>

<h4>20 ostatnich zalogowañ</h4>
<table class="vis">
<tr><th>Data</th><th>IP</th><th>Zastêpstwo</th></tr>
<?php $_from = $this->_tpl_vars['logins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
	<tr><td><?php echo $this->_tpl_vars['pl']->pl_date($this->_tpl_vars['arr']['time']); ?>
</td><td><?php echo $this->_tpl_vars['arr']['ip']; ?>
</td><td><?php echo $this->_tpl_vars['arr']['uv']; ?>
</td></tr>
<?php endforeach; endif; unset($_from); ?>
</table>