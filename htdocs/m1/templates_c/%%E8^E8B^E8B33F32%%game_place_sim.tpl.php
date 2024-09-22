<?php /* Smarty version 2.6.14, created on 2022-11-26 16:45:31
         compiled from game_place_sim.tpl */ ?>
<?php if (isset ( $this->_tpl_vars['simulate'] ) && $this->_tpl_vars['simulate']): ?>
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th colspan="2">&nbsp;</th>
		<?php $_from = $this->_tpl_vars['cl_units']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
		<th width="35"><img src="../graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" alt="" /></th>
		<?php endforeach; endif; unset($_from); ?>
	</tr>
	<tr>
		<td rowspan="2">Atacante</td>
		<td>Tropas:</td>
		<?php $_from = $this->_tpl_vars['simulate_values']['att']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['unitname'] => $this->_tpl_vars['num']):
?>
			<?php if ($this->_tpl_vars['num'] == '0'): ?>
		<td class="hidden">0</td>
			<?php else: ?>
		<td><?php echo $this->_tpl_vars['num']; ?>
</td>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
	</tr>
	<tr>
		<td>Perdas:</td>
		<?php $_from = $this->_tpl_vars['simulate_values']['att_lose']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['unitname'] => $this->_tpl_vars['num']):
?>
			<?php if ($this->_tpl_vars['num'] == '0'): ?>
		<td class="hidden">0</td>
			<?php else: ?>
		<td><?php echo $this->_tpl_vars['num']; ?>
</td>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
	</tr>
	<tr>
		<td style="display:none">&nbsp;</td>
	</tr>
	<tr>
		<td rowspan="2">Defensor</td>
		<td>Tropas:</td>
		<?php $_from = $this->_tpl_vars['simulate_values']['def']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['unitname'] => $this->_tpl_vars['num']):
?>
			<?php if ($this->_tpl_vars['num'] == '0'): ?>
		<td class="hidden">0</td>
			<?php else: ?>
		<td><?php echo $this->_tpl_vars['num']; ?>
</td>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
	</tr>
	<tr>
		<td>Perdas:</td>
		<?php $_from = $this->_tpl_vars['simulate_values']['def_lose']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['unitname'] => $this->_tpl_vars['num']):
?>
			<?php if ($this->_tpl_vars['num'] == '0'): ?>
		<td class="hidden">0</td>
			<?php else: ?>
		<td><?php echo $this->_tpl_vars['num']; ?>
</td>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
	</tr>
</table><br />
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
<?php if ($this->_tpl_vars['simulate_values']['others']['def_wall'] != $this->_tpl_vars['simulate_values']['others']['new_wall']): ?>
	<tr><th>Danos dos arietes:</th><td align="center">Muralha demolida do n&iacute;vel <b><?php echo $this->_tpl_vars['simulate_values']['others']['def_wall']; ?>
</b> para o n&iacute;vel <b><?php echo $this->_tpl_vars['simulate_values']['others']['new_wall']; ?>
</b></td></tr>
<?php endif; ?>
<?php if ($this->_tpl_vars['simulate_values']['others']['def_building'] != $this->_tpl_vars['simulate_values']['others']['new_building']): ?>
	<tr><th>Danos das catapultas:</th><td align="center">Edif&iacute;cio demolido do n&iacute;vel <b><?php echo $this->_tpl_vars['simulate_values']['others']['def_building']; ?>
</b> para o n&iacute;vel <b><?php echo $this->_tpl_vars['simulate_values']['others']['new_building']; ?>
</b></td></tr>
<?php endif; ?>
</table><br />
<?php endif; ?>

<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;mode=sim" method="post" name="units">
	<input name="simulate" type="hidden" />
	<table width="100%" class="vis" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr>
			<th width="256">&nbsp;</th>
			<th width="200">Atacante</th>
			<th colspan="2">Defensor</th>
		</tr>
		<tr>
		  <th colspan="3">Tropas</th>
		</tr>
		<?php $_from = $this->_tpl_vars['cl_units']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
		<tr>
			<td><a href="javascript:popup('popup_unit.php?unit=<?php echo $this->_tpl_vars['dbname']; ?>
, 520, 520)"><img src="../graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" alt="" /> <?php echo $this->_tpl_vars['name']; ?>
</a></td>
			<td align="center"><input type="text" name="att_<?php echo $this->_tpl_vars['dbname']; ?>
" size="5" value="<?php echo $this->_tpl_vars['values']['att'][$this->_tpl_vars['dbname']]; ?>
" /></td>
			<td align="center"><input type="text" name="def_<?php echo $this->_tpl_vars['dbname']; ?>
" size="5" value="<?php echo $this->_tpl_vars['values']['def'][$this->_tpl_vars['dbname']]; ?>
" /></td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
		<tr>
			<td>Muralha</td>
			<td colspan="1">&nbsp;</td>
			<td width="65" colspan="2" align="center"><input type="text" name="def_wall" value="<?php echo $this->_tpl_vars['values']['def_wall']; ?>
" size="5" /></td>
		</tr>
		<tr>
			<td>N&iacute;vel do alvo das catapultas</td>
			<td colspan="1"></td><td colspan="2" align="center"><input type="text" name="def_building" value="<?php echo $this->_tpl_vars['values']['def_building']; ?>
" size="5" /></td>
		</tr>
		<?php if ($this->_tpl_vars['moral_activ']): ?>
		<tr>
			<td>Moral</td>
			<td colspan="3" align="center"><input type="text" name="moral" value="<?php echo $this->_tpl_vars['values']['moral']; ?>
" size="5" id="moral" />%</td>
		</tr>
		<?php endif; ?>
		<tr>
			<td>Sorte (de -25% at&eacute; +25%)</td>
			<td colspan="3" align="center"><input type="text" name="luck" value="<?php echo $this->_tpl_vars['values']['luck']; ?>
" size="5" />%</td>
		</tr>
		<tr><th colspan="3"><span style="float:right"><input type="submit" class="button" value="Simular" /></span></th></tr>
  </table>
</form>