<?php /* Smarty version 2.6.14, created on 2022-11-26 16:31:16
         compiled from game_overview_villages_units.tpl */ ?>
<?php 
	$this->_tpl_vars['vills'] = mysql_num_rows(mysql_query("SELECT * FROM `villages` WHERE `userid` = '".$this->_tpl_vars['user']['id']."'"));
 ?>
<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th width="210">Aldeias (<?php echo $this->_tpl_vars['vills']; ?>
)</th>
		<th width="90">&nbsp;</th>
		<?php $_from = $this->_tpl_vars['unit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['name']):
?>
		<th width="40"><div align="center"><img src="../graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" alt="" /></div></th>
		<?php endforeach; endif; unset($_from); ?>
		<th width="55">A&ccedil;&atilde;o</th>
	</tr>
	<?php $_from = $this->_tpl_vars['villages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arr_id'] => $this->_tpl_vars['id']):
?>
<?php 
	$vill = $this->_tpl_vars['arr_id'];
	$sql = mysql_fetch_array(mysql_query("SELECT * FROM `villages` WHERE `id`= '".$vill."'"));
 ?>
	<tr<?php if ($this->_tpl_vars['arr_id'] == $this->_tpl_vars['village']['id']): ?> class="lit"<?php endif; ?>>
		<td rowspan="3" valign="top"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&screen=overview"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['name']; ?>
 (<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['x']; ?>
|<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['y']; ?>
) K<?php echo $sql['continent']; ?></a></td>
		<td>Suas tropas</td>
		<?php $_from = $this->_tpl_vars['unit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['name']):
?>
			<?php if ($this->_tpl_vars['own_units'][$this->_tpl_vars['arr_id']][$this->_tpl_vars['dbname']] == 0): ?>
		<td class="hidden" align="center"><?php echo $this->_tpl_vars['own_units'][$this->_tpl_vars['arr_id']][$this->_tpl_vars['dbname']]; ?>
</td>
			<?php else: ?>
		<td align="center"><?php echo $this->_tpl_vars['own_units'][$this->_tpl_vars['arr_id']][$this->_tpl_vars['dbname']]; ?>
</td>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place">Comandos</a></td>
	</tr>
	<tr class="units_there<?php if ($this->_tpl_vars['arr_id'] == $this->_tpl_vars['village']['id']): ?> lit<?php endif; ?>">
		<td>Total</td>
		<?php $_from = $this->_tpl_vars['unit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['name']):
?>
			<?php if ($this->_tpl_vars['all_units'][$this->_tpl_vars['arr_id']][$this->_tpl_vars['dbname']] == 0): ?>
		<td class="hidden" align="center"><?php echo $this->_tpl_vars['all_units'][$this->_tpl_vars['arr_id']][$this->_tpl_vars['dbname']]; ?>
</td>
			<?php else: ?>
		<td align="center"><?php echo $this->_tpl_vars['all_units'][$this->_tpl_vars['arr_id']][$this->_tpl_vars['dbname']]; ?>
</td>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
		<td rowspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;mode=units">Tropas</a></td>
	</tr>
	<tr class="units_away<?php if ($this->_tpl_vars['arr_id'] == $this->_tpl_vars['village']['id']): ?> lit<?php endif; ?>">
		<td>Fora</td>
		<?php $_from = $this->_tpl_vars['unit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['name']):
?>
			<?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['outward'][$this->_tpl_vars['dbname']] == 0): ?>
		<td class="hidden" align="center"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['outward'][$this->_tpl_vars['dbname']]; ?>
</td>
			<?php else: ?>
		<td align="center"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['outward'][$this->_tpl_vars['dbname']]; ?>
</td>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>