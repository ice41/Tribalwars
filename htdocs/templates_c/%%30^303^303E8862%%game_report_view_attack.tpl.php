<?php /* Smarty version 2.6.14, created on 2012-12-29 05:24:37
         compiled from game_report_view_attack.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'game_report_view_attack.tpl', 18, false),)), $this); ?>
<?php if ($this->_tpl_vars['report']['wins'] == 'att'): ?>
	<h3>Atacatorul a castigat</h3>
<img src="graphic/reports/battle_attacker_won.jpg" alt="" />
<?php else: ?>
    <h3>Aparatorul a castigat</h3>
<img src="graphic/reports/battle_attacker_lost.jpg" alt="" />
<?php endif; ?>

<h4>Noroc (din punctul de vedere al agresorului)</h4>
<table>
<?php if ($this->_tpl_vars['report']['luck'] < 0): ?>
	<tr>
	<td><b><?php echo $this->_tpl_vars['report']['luck']; ?>
%</b></td>
	<td><img src="graphic/rabe.png" alt="Pech" /></td>
	<td>
		<table style="border: 1px solid black;" cellspacing="0" cellpadding="0">
		<tr>
	        <td width="<?php echo smarty_function_math(array('equation' => "a-(b*(x * y))",'b' => -1,'a' => 50,'x' => $this->_tpl_vars['report']['luck'],'y' => 2), $this);?>
" height="12"></td>
			<td width="<?php echo smarty_function_math(array('equation' => "b*(x * y)",'b' => -1,'x' => $this->_tpl_vars['report']['luck'],'y' => 2), $this);?>
" style="background-image:url(graphic/balken_pech.png);"></td>
			<td width="2" style="background-color:rgb(0, 0, 0)"></td>
			<td width="0" style="background-image:url(graphic/balken_glueck.png);"></td>
			<td width="50"></td>
		</tr>
		</table>
<?php else: ?>
	<tr>
    <td><img src="graphic/rabe.png" alt="Pech" /></td>
	<td>
		<table style="border: 1px solid black;" cellspacing="0" cellpadding="0">
		<tr>
			<td width="50"></td>
			<td width="2" style="background-color:rgb(0, 0, 0)"></td>
			<td width="<?php echo smarty_function_math(array('equation' => "x * y",'x' => $this->_tpl_vars['report']['luck'],'y' => 2), $this);?>
" style="background-image:url(graphic/balken_glueck.png);"></td>
			<td width="<?php echo smarty_function_math(array('equation' => "a-(x * y)",'a' => 50,'x' => $this->_tpl_vars['report']['luck'],'y' => 2), $this);?>
" height="12"></td>
		</tr>
		</table>
	<td><?php if ($this->_tpl_vars['report']['luck'] >= 1): ?><img src="graphic/klee.png" alt="Noroc" /><?php else: ?><img src="graphic/klee_grau.png" alt="Glück" /><?php endif; ?></td>
	<td><b><?php echo $this->_tpl_vars['report']['luck']; ?>
%</b></td>
<?php endif; ?>
</td>



</tr>
</table>

<?php if ($this->_tpl_vars['moral_activ'] == 'true'): ?>
	<table>
	<tr><td><h4>Moral: <?php echo $this->_tpl_vars['report']['moral']; ?>
%</h4></td></tr>
	</table>
	<br />
<?php endif; ?>


<table width="100%" style="border: 1px solid #DED3B9">
<tr><th width="100">Agresor:</th><th><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['report']['from_user']; ?>
"><?php echo $this->_tpl_vars['report']['from_username']; ?>
</a></th></tr>
<tr><td>Sat:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['report']['from_village']; ?>
"><?php echo $this->_tpl_vars['report']['from_villagename']; ?>
 (<?php echo $this->_tpl_vars['report']['from_x']; ?>
|<?php echo $this->_tpl_vars['report']['from_y']; ?>
)</a></td></tr>

<tr><td colspan="2">
	<table class="vis">
	<tr class="center">
		<td></td>
		<?php $_from = $this->_tpl_vars['cl_units']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
			<td width="35"><img src="graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" alt="" /></td>
		<?php endforeach; endif; unset($_from); ?>
	</tr>
	<tr class="center"><td>Num&#259;r:</td><?php $_from = $this->_tpl_vars['report_units']['units_a']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num_units']):
 if ($this->_tpl_vars['num_units'] > 0): ?><td><?php echo $this->_tpl_vars['num_units']; ?>
</td><?php else: ?><td class="hidden">0</td><?php endif;  endforeach; endif; unset($_from); ?></tr>

	<tr class="center"><td>Pierderi:</td><?php $_from = $this->_tpl_vars['report_units']['units_b']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num_units']):
 if ($this->_tpl_vars['num_units'] > 0): ?><td><?php echo $this->_tpl_vars['num_units']; ?>
</td><?php else: ?><td class="hidden">0</td><?php endif;  endforeach; endif; unset($_from); ?></tr>
	</table>

</td></tr>
</table><br />

<table width="100%" style="border: 1px solid #DED3B9">
<tr><th width="100">Ap&#259;r&#259;tor:</th><th><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['report']['to_user']; ?>
"><?php echo $this->_tpl_vars['report']['to_username']; ?>
</a></th></tr>
<tr><td>Sat:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['report']['to_village']; ?>
"><?php echo $this->_tpl_vars['report']['to_villagename']; ?>
 (<?php echo $this->_tpl_vars['report']['to_x']; ?>
|<?php echo $this->_tpl_vars['report']['to_y']; ?>
)</a></td></tr>
<tr><td colspan="2">
	<?php if ($this->_tpl_vars['see_def_units']): ?>
		<table class="vis">
		<tr class="center">
			<td></td>
			<?php $_from = $this->_tpl_vars['cl_units']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
				<td width="35"><img src="graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" alt="" /></th>
			<?php endforeach; endif; unset($_from); ?>
		</tr>
		<tr class="center"><td>Num&#259;r:</td><?php $_from = $this->_tpl_vars['report_units']['units_c']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num_units']):
 if ($this->_tpl_vars['num_units'] > 0): ?><td><?php echo $this->_tpl_vars['num_units']; ?>
</td><?php else: ?><td class="hidden">0</td><?php endif;  endforeach; endif; unset($_from); ?></tr>
	
		<tr class="center"><td>Pierderi:</td><?php $_from = $this->_tpl_vars['report_units']['units_d']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num_units']):
 if ($this->_tpl_vars['num_units'] > 0): ?><td><?php echo $this->_tpl_vars['num_units']; ?>
</td><?php else: ?><td class="hidden">0</td><?php endif;  endforeach; endif; unset($_from); ?></tr>
		</table>
	<?php else: ?>
		<p>Nici unul din lupt&#259;torii tai nu a supravie&#355;uit. Nu au putut fi luate nici informa&#355;ii despre puterea trupelor du&#351;mane.</p>
	<?php endif; ?>

</td></tr>
</table><br /><br />
<?php if (count ( $this->_tpl_vars['report_units']['units_e'] ) > 1): ?>
	<h4>Trupele ap&#259;r&#259;torului, care au fost pe drum</h4>
	<table>
	<tr>
		<?php $_from = $this->_tpl_vars['cl_units']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
			<th width="35"><img src="graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" alt="" /></th>
		<?php endforeach; endif; unset($_from); ?>
	</tr>
	<tr><?php $_from = $this->_tpl_vars['report_units']['units_e']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num_units']):
 if ($this->_tpl_vars['num_units'] > 0): ?><td><?php echo $this->_tpl_vars['num_units']; ?>
</td><?php else: ?><td class="hidden">0</td><?php endif;  endforeach; endif; unset($_from); ?></tr>
	</table>
<?php endif; ?>

<table width="100%" style="border: 1px solid #DED3B9">
	<?php if ($this->_tpl_vars['report_ress']['wood'] > 0 || $this->_tpl_vars['report_ress']['stone'] > 0 || $this->_tpl_vars['report_ress']['iron'] > 0): ?>
		<tr><th>Prad&#259;:</th>
		<td width="220">
			<?php if ($this->_tpl_vars['report_ress']['wood'] > 0): ?><img src="graphic/holz.png" title="Lemn" alt="" /><?php echo $this->_tpl_vars['report_ress']['wood']; ?>
 <?php endif; ?>
			<?php if ($this->_tpl_vars['report_ress']['stone'] > 0): ?><img src="graphic/lehm.png" title="Argil&#259;" alt="" /><?php echo $this->_tpl_vars['report_ress']['stone']; ?>
 <?php endif; ?>
			<?php if ($this->_tpl_vars['report_ress']['iron'] > 0): ?><img src="graphic/eisen.png" title="Fier" alt="" /><?php echo $this->_tpl_vars['report_ress']['iron']; ?>
 <?php endif; ?></td>
		<td><?php echo $this->_tpl_vars['report_ress']['sum']; ?>
/<?php echo $this->_tpl_vars['report_ress']['max']; ?>
</td>
		</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['report_ram']['from'] != $this->_tpl_vars['report_ram']['to']): ?>
		<tr><th>Distrugere prin berbeci:</th>
		<td colspan="2">Zidul a fost distrus de la nivelul <b><?php echo $this->_tpl_vars['report_ram']['from']; ?>
</b> la nivelul <b><?php echo $this->_tpl_vars['report_ram']['to']; ?>
</b></td></tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['report_agreement']['from'] != $this->_tpl_vars['report_agreement']['to']): ?>
	<tr><th>Modificare de adeziune</th>
	<td colspan="2">Adeziune sc&#259;zut&#259; de la <b><?php echo $this->_tpl_vars['report_agreement']['from']; ?>
</b> la <b><?php echo $this->_tpl_vars['report_agreement']['to']; ?>
</b></td></tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['report_catapult']['from'] != $this->_tpl_vars['report_catapult']['to']): ?>
		<tr><th>Distrugere prin foc de catapult&#259;:</th>
		<td colspan="2"><?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['report_catapult']['building']); ?>
 distrus de la nivelul <b><?php echo $this->_tpl_vars['report_catapult']['from']; ?>
</b> la nivelul <b><?php echo $this->_tpl_vars['report_catapult']['to']; ?>
</b></td></tr>
	<?php endif; ?>
</table>