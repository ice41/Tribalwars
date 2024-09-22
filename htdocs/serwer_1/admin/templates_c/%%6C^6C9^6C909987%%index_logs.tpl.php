<?php /* Smarty version 2.6.14, created on 2011-12-23 15:33:56
         compiled from index_logs.tpl */ ?>
Diese Log Datei ist für den Entwickler der DS LAN gedacht. Wer diese Log durchblickt, viel Spass damit :-).
<?php if ($this->_tpl_vars['num_pages'] > 1): ?>
	<center>
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
				<a href="index.php?screen=logs&amp;site=<?php echo $this->_sections['countpage']['index']; ?>
"> [<?php echo $this->_sections['countpage']['index']; ?>
] </a>
			<?php endif; ?>
		<?php endfor; endif; ?>
	</center>
<?php endif; ?>

<table class="vis" width="100%">
	<tr>
		<th>Datum</th>
		<th>Skript HASH</th>
		<th>Event ID</th>
		<th>Ereignis</th>
	</tr>
	<?php $_from = $this->_tpl_vars['logs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
		<tr>
			<td><?php echo $this->_tpl_vars['arr']['time']; ?>
</td>
			<td><?php echo $this->_tpl_vars['arr']['village']; ?>
</td>
			<td><?php echo $this->_tpl_vars['arr']['event_id']; ?>
</td>
			<td><?php echo $this->_tpl_vars['arr']['log']; ?>
</td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>