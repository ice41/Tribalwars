<?php /* Smarty version 2.6.14, created on 2011-12-17 22:05:21
         compiled from game_settings_logins.tpl */ ?>
<h3>Logowania</h3>
<p>Na tej stronie widzisz, kiedy mia�y miejsce loginy i nieudane pr�by zalogowania si� do Twojego konta. Je�eli stwierdzisz, �e kto� nieupowa�niony ma dost�p do Twojego konta, powiniene� niezw�ocznie zmieni� has�o. Zale�nie od rodzaju po��czenia: numer IP mo�e si� zmienia�, gdy na nowo ��czysz si� z internetem.</p>

<h4>20 ostatnich zalogowa�</h4>
<table class="vis">
<tr><th>Data</th><th>IP</th><th>Zast�pstwo</th></tr>
<?php $_from = $this->_tpl_vars['logins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
	<tr><td><?php echo $this->_tpl_vars['pl']->pl_date($this->_tpl_vars['arr']['time']); ?>
</td><td><?php echo $this->_tpl_vars['arr']['ip']; ?>
</td><td><?php echo $this->_tpl_vars['arr']['uv']; ?>
</td></tr>
<?php endforeach; endif; unset($_from); ?>
</table>