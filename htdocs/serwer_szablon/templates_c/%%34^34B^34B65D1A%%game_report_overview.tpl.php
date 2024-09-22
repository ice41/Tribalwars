<?php /* Smarty version 2.6.14, created on 2011-12-15 15:22:37
         compiled from game_report_overview.tpl */ ?>
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=<?php echo $this->_tpl_vars['mode']; ?>
&amp;action=del_arch&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
	<table class="vis" width="100%">
		<?php if ($this->_tpl_vars['num_pages'] > 1): ?>
			<tr>
				<td align="center" colspan="2">
					<?php unset($this->_sections['countpage']);
$this->_sections['countpage']['name'] = 'countpage';
$this->_sections['countpage']['start'] = (int)1;
$this->_sections['countpage']['loop'] = is_array($_loop=$this->_tpl_vars['num_pages']+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['countpage']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['countpage']['show'] = true;
$this->_sections['countpage']['max'] = $this->_sections['countpage']['loop'];
if ($this->_sections['countpage']['start'] < 0)
    $this->_sections['countpage']['start'] = max($this->_sections['countpage']['step'] > 0 ? 0 : -1, $this->_sections['countpage']['loop'] + $this->_sections['countpage']['start']);
else
    $this->_sections['countpage']['start'] = min($this->_sections['countpage']['start'], $this->_sections['countpage']['step'] > 0 ? $this->_sections['countpage']['loop'] : $this->_sections['countpage']['loop']-1);
if ($this->_sections['countpage']['show']) {
    $this->_sections['countpage']['total'] = min(ceil(($this->_sections['countpage']['step'] > 0 ? $this->_sections['countpage']['loop'] - $this->_sections['countpage']['start'] : $this->_sections['countpage']['start']+1)/abs($this->_sections['countpage']['step'])), $this->_sections['countpage']['max']);
    if ($this->_sections['countpage']['total'] == 0)
        $this->_sections['countpage']['show'] = false;
} else
    $this->_sections['countpage']['total'] = 0;
if ($this->_sections['countpage']['show']):

            for ($this->_sections['countpage']['index'] = $this->_sections['countpage']['start'], $this->_sections['countpage']['iteration'] = 1;
                 $this->_sections['countpage']['iteration'] <= $this->_sections['countpage']['total'];
                 $this->_sections['countpage']['index'] += $this->_sections['countpage']['step'], $this->_sections['countpage']['iteration']++):
$this->_sections['countpage']['rownum'] = $this->_sections['countpage']['iteration'];
$this->_sections['countpage']['index_prev'] = $this->_sections['countpage']['index'] - $this->_sections['countpage']['step'];
$this->_sections['countpage']['index_next'] = $this->_sections['countpage']['index'] + $this->_sections['countpage']['step'];
$this->_sections['countpage']['first']      = ($this->_sections['countpage']['iteration'] == 1);
$this->_sections['countpage']['last']       = ($this->_sections['countpage']['iteration'] == $this->_sections['countpage']['total']);
?>
						<?php if ($this->_tpl_vars['site'] == $this->_sections['countpage']['index']): ?>
							<strong> &gt;<?php echo $this->_sections['countpage']['index']; ?>
&lt; </strong>
						<?php else: ?>
							<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=<?php echo $this->_tpl_vars['mode']; ?>
&amp;site=<?php echo $this->_sections['countpage']['index']; ?>
"> [<?php echo $this->_sections['countpage']['index']; ?>
] </a>
						<?php endif; ?>
					<?php endfor; endif; ?>
				</td>
			</tr>
		<?php endif; ?>
		<tr>
			<th>Tytu³</th>
			<th width="140">Data</th>
		</tr>
		<?php if (count ( $this->_tpl_vars['reports'] ) > 0): ?>
			<?php $_from = $this->_tpl_vars['reports']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['array']):
?>
				<?php echo $this->_tpl_vars['ida']; ?>

				<tr>
					<td><input name="id_<?php echo $this->_tpl_vars['reports'][$this->_tpl_vars['key']]['id']; ?>
" type="checkbox" /> <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=<?php echo $this->_tpl_vars['mode']; ?>
&amp;view=<?php echo $this->_tpl_vars['reports'][$this->_tpl_vars['key']]['id']; ?>
"><?php echo $this->_tpl_vars['pl']->compile_report_title($this->_tpl_vars['reports'][$this->_tpl_vars['key']]['title']); ?>
</a> <?php if ($this->_tpl_vars['reports'][$this->_tpl_vars['key']]['is_new'] == '1'): ?>(nowy)<?php endif; ?></td>
					<td><?php echo $this->_tpl_vars['reports'][$this->_tpl_vars['key']]['date']; ?>
</td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
			<tr>
				<th><input name="all" type="checkbox" onclick="selectAll(this.form, this.checked)" /> Zaznacz wszystko </th>
				<th></th>
			</tr>
			</table>

			<table class="vis" align="left">
			<tr>
				<td><input type="submit" value="Usuñ" name="del" /></td>
			</tr>
		<?php endif; ?>
	</table>
</form>