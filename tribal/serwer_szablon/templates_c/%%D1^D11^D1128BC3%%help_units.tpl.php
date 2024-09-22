<?php /* Smarty version 2.6.14, created on 2012-03-12 19:18:51
         compiled from help_units.tpl */ ?>
<h3>Jednostki</h3>

<table class="vis" width="100%">
<tr align="right"><th align="left">Jednostka</th><th><img src="graphic/holz.png" title="Drewno" alt="" /></th><th><img src="graphic/lehm.png" title="Ceg³y" alt="" /></th><th><img src="graphic/eisen.png" title="¯elazo" alt="" /></th><th><img src="graphic/face.png" title="Wieœniak" alt="" /></th>
<th><img src="graphic/unit/att.png" alt="Si³a ataku" /></th>
<th><img src="graphic/unit/def.png" alt="Ogólna si³a obrony" /></th>
<th><img src="graphic/unit/def_cav.png" alt="Obrona przeciw kawalerii" /></th>
<th><img src="graphic/unit/def_archer.png" alt="Obrona przeciw ³ucznikom" /></th>
<th><img src="graphic/unit/speed.png" alt="Szybkoœæ" /></th>
<th><img src="graphic/unit/booty.png" alt="£up" /></th>
</tr>

<?php $_from = $this->_tpl_vars['cl_units']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
	<tr>
		<td align="left"><a href="javascript:popup('popup_unit.php?unit=<?php echo $this->_tpl_vars['dbname']; ?>
', 550, 520)"><img src="graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" alt="" /> <?php echo $this->_tpl_vars['name']; ?>
</a></td>
		<td><?php echo $this->_tpl_vars['cl_units']->get_woodprice($this->_tpl_vars['dbname']); ?>
</td><td><?php echo $this->_tpl_vars['cl_units']->get_stoneprice($this->_tpl_vars['dbname']); ?>
</td><td><?php echo $this->_tpl_vars['cl_units']->get_ironprice($this->_tpl_vars['dbname']); ?>
</td>
		<td><?php echo $this->_tpl_vars['cl_units']->get_bhprice($this->_tpl_vars['dbname']); ?>
</td>
		<td><?php echo $this->_tpl_vars['cl_units']->get_att($this->_tpl_vars['dbname'],1); ?>
</td><td><?php echo $this->_tpl_vars['cl_units']->get_def($this->_tpl_vars['dbname'],1); ?>
</td><td><?php echo $this->_tpl_vars['cl_units']->get_defcav($this->_tpl_vars['dbname'],1); ?>
</td><td><?php echo $this->_tpl_vars['cl_units']->get_defarcher($this->_tpl_vars['dbname'],1); ?>
</td>

		<td>
			<?php 
				$var = $this->_tpl_vars['cl_units']->get_speed($this->_tpl_vars['dbname']) / 60; 
				echo $var;
			 ?>
		</td>
		<td><?php echo $this->_tpl_vars['cl_units']->get_booty($this->_tpl_vars['dbname']); ?>
</td>
	</tr>
<?php endforeach; endif; unset($_from); ?>
</table><br />

<table class="vis" width="100%">
	<tbody>
		<tr align="left">
			<th align="right">Symbol</th>
			<th>Znaczenie</th>
			<th>Wyjaœnienie</th>
		</tr>
		<tr>
			<td><img src="graphic/unit/att.png?1" alt=""></td><td> Si³a napadu</td>
			<td>Si³a napadu to po prostu walecznoœæ danej jednostki w napadzie.</td>
		</tr>

		<tr>
			<td><img src="graphic/unit/def.png?1" alt=""></td><td> Obrona ogólnie</td>
			<td>Obrona ogólna informuje, jak dobrze radzi sobie dana jednostka w obronie przed infanteri¹. </td>
		</tr>
		<tr>
			<td><img src="graphic/unit/def_cav.png?1" alt=""></td><td> Obrona przeciwko kawalerii</td>
			<td>Obrona przeciwko kawalerzystom informuje, jak mocna jest si³a obrony danej jednostki przeciw kawalerii.</td>
		</tr>
		<tr>
			<td><img src="graphic/unit/def_archer.png?1" alt=""></td><td> Obrona £ucznik</td>
			<td>Obrona ³uczników przedstawia wartoœæ walecznoœci danej jednostki w obronie przeciwko napadowi ³uczników. </td>
		</tr>
		<tr>
			<td><img src="graphic/unit/speed.png?1" alt=""></td><td> Prêdkoœæ</td>
			<td>Prêdkoœæ mierzona jest w minutach, które dana jednostka potrzebuje na przebycie jednego pola.</td>
		</tr>
		<tr>
			<td><img src="graphic/unit/booty.png?1" alt=""></td><td> £up</td>
			<td>Wartoœæ ³upu informuje o tym, ile surowców mo¿e unieœæ dana jednostka. </td>
		</tr>
	</tbody>
</table>