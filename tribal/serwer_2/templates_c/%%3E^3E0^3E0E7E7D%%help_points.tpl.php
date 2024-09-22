<?php /* Smarty version 2.6.14, created on 2012-03-11 19:25:37
         compiled from help_points.tpl */ ?>
<h3>Tabela punktów</h3>

<p>Punkty otrzymasz za rozbudowywanie budynków. Je¿eli budowa jakiegoœ budynku zosta³a ukoñczona, punkty i miejsce w rankingu zostan¹ na nowo wyliczone (mo¿e dojœæ do opóŸnieñ, aby odci¹¿yæ serwer). Za badania lub jednostki nie ma przyznawanych punktów.

</p><p><b>Ró¿nice punktów miêdzy poziomami</b>
</p>

<table class="vis">
	<tr>
		<th>Poziom</th>
		<?php $_from = $this->_tpl_vars['builds']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['f_id'] => $this->_tpl_vars['f_dbname']):
?>
			<th><img src="graphic/buildings/<?php echo $this->_tpl_vars['f_dbname']; ?>
.png"></th>
		<?php endforeach; endif; unset($_from); ?>
	</tr>
		<?php unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['start'] = (int)1;
$this->_sections['foo']['loop'] = is_array($_loop=$this->_tpl_vars['max_stage']+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['foo']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['foo']['show'] = true;
$this->_sections['foo']['max'] = $this->_sections['foo']['loop'];
if ($this->_sections['foo']['start'] < 0)
    $this->_sections['foo']['start'] = max($this->_sections['foo']['step'] > 0 ? 0 : -1, $this->_sections['foo']['loop'] + $this->_sections['foo']['start']);
else
    $this->_sections['foo']['start'] = min($this->_sections['foo']['start'], $this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] : $this->_sections['foo']['loop']-1);
if ($this->_sections['foo']['show']) {
    $this->_sections['foo']['total'] = min(ceil(($this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] - $this->_sections['foo']['start'] : $this->_sections['foo']['start']+1)/abs($this->_sections['foo']['step'])), $this->_sections['foo']['max']);
    if ($this->_sections['foo']['total'] == 0)
        $this->_sections['foo']['show'] = false;
} else
    $this->_sections['foo']['total'] = 0;
if ($this->_sections['foo']['show']):

            for ($this->_sections['foo']['index'] = $this->_sections['foo']['start'], $this->_sections['foo']['iteration'] = 1;
                 $this->_sections['foo']['iteration'] <= $this->_sections['foo']['total'];
                 $this->_sections['foo']['index'] += $this->_sections['foo']['step'], $this->_sections['foo']['iteration']++):
$this->_sections['foo']['rownum'] = $this->_sections['foo']['iteration'];
$this->_sections['foo']['index_prev'] = $this->_sections['foo']['index'] - $this->_sections['foo']['step'];
$this->_sections['foo']['index_next'] = $this->_sections['foo']['index'] + $this->_sections['foo']['step'];
$this->_sections['foo']['first']      = ($this->_sections['foo']['iteration'] == 1);
$this->_sections['foo']['last']       = ($this->_sections['foo']['iteration'] == $this->_sections['foo']['total']);
?>
			<tr>
				<td><?php echo $this->_sections['foo']['index']; ?>
</td>
				<?php $_from = $this->_tpl_vars['builds']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['f_id'] => $this->_tpl_vars['f_dbname']):
?>
					<?php if ($this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['f_dbname']) < $this->_sections['foo']['index']): ?>
						<td></td>
					<?php else: ?>
						<td><?php echo $this->_tpl_vars['cl_builds']->get_points($this->_tpl_vars['f_dbname'],$this->_sections['foo']['index']); ?>
</td>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			</tr>
		<?php endfor; endif; ?>
</table>