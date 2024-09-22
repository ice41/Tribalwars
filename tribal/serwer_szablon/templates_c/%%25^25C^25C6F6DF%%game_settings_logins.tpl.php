<?php /* Smarty version 2.6.14, created on 2012-02-26 23:18:13
         compiled from game_settings_logins.tpl */ ?>
<h3>Logowania</h3>
<p>Na tej stronie widzisz, kiedy mia³y miejsce loginy i nieudane próby zalogowania siê do Twojego konta. Je¿eli stwierdzisz, ¿e ktoœ nieupowa¿niony ma dostêp do Twojego konta, powinieneœ niezw³ocznie zmieniæ has³o. Zale¿nie od rodzaju po³¹czenia: numer IP mo¿e siê zmieniaæ, gdy na nowo ³¹czysz siê z internetem.</p>

<h4>20 ostatnich zalogowañ</h4>

<table class="vis">
	<tbody>
		<tr>
			<th>Data</th>
			<th>IP</th>
			<th>Zastêpca</th>
		</tr>
		<?php $_from = $this->_tpl_vars['logins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['login']):
?>
			<tr>
				<td><?php echo $this->_tpl_vars['login']['time']; ?>
</td>
				<td><?php echo $this->_tpl_vars['login']['ip']; ?>
</td>
				<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_user&id=<?php echo $this->_tpl_vars['login']['uv']; ?>
"/><?php echo $this->_tpl_vars['login']['uv_name']; ?>
</a></td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
	</tbody>
</table>