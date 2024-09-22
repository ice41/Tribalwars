<?php /* Smarty version 2.6.14, created on 2011-12-23 20:38:39
         compiled from game_ally_in_ally_overview.tpl */ ?>
<table width="100%"><tr><td valign="top">
		
	<table class="vis" width="100%">
	<?php if ($this->_tpl_vars['num_pages'] > 1): ?>
		<tr>
			<td align="center" colspan="3">
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
&amp;screen=ally&amp;site=<?php echo $this->_sections['countpage']['index']; ?>
"> [<?php echo $this->_sections['countpage']['index']; ?>
] </a>
					<?php endif; ?>
				<?php endfor; endif; ?>
			</td>
		</tr>
	<?php endif; ?>
	<tr><th>Data</th><th>Wydarzenie</th></tr>

		<?php $_from = $this->_tpl_vars['events']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
			<tr>
				<td><?php echo $this->_tpl_vars['pl']->del_znak('/>',$this->_tpl_vars['pl']->del_znak('<br',$this->_tpl_vars['arr']['time'])); ?>
</td>
				<td><?php echo $this->_tpl_vars['pl']->compile_ally_events($this->_tpl_vars['arr']['message']); ?>
</td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>

	</table>
		
</td><td valign="top" width="360">
	<table class="vis" width="100%"><tr>
	<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;action=exit&amp;h=<?php echo $this->_tpl_vars['kkey']; ?>
" onclick="javascript:ask('Czy na prawdê chcesz opuœciæ plemiê', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;action=exit&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
'); return false;">Opuœæ plemiê</a></td>
	</tr></table>
	
			

	<?php if (! empty ( $this->_tpl_vars['preview'] )): ?>
		<table class="vis" width="100%">
			<tr><th colspan="2">Podgl¹d</th></tr>
			<tr><td colspan="2" align="center"><?php echo $this->_tpl_vars['ally']['intern_text']; ?>
</td></tr>
		</table>
	<?php endif; ?>
	
	<script type="text/javascript">
	function bbEdit() {
		gid("show_row").style.display = 'none';
		gid("edit_link").style.display = 'none';
		gid("edit_row").style.display = '';
		gid("submit_row").style.display = '';
	}
	</script>

	<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;action=edit_intern&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post" name="edit_profile">
	<table class="vis" width="100%">
			<tr><th colspan="2" width="100%">Tekst wewnêtrzny</th></tr>
		<tr id="show_row" align="center"><td colspan="2"><?php echo $this->_tpl_vars['ally']['intern_text']; ?>
</td></tr>
	<?php if ($this->_tpl_vars['user']['ally_found'] == 1): ?>
		<tr id="edit_row"><td colspan="2"><textarea name="intern" cols="40" rows="15"><?php echo $this->_tpl_vars['ally']['edit_intern_text']; ?>
</textarea></td></tr>
		<tr id="submit_row"><td><input type="submit" name="edit" value="Zapisz" /> <input type="submit" name="preview" value="Podgl¹d" /></td></tr>
	<?php endif; ?>
	</table>
	</form>
	<?php if ($this->_tpl_vars['user']['ally_found'] == 1): ?><a id="edit_link" href="javascript:bbEdit()" style="display:none">opracuj</a><br /><?php endif; ?>
	
	<?php if (empty ( $this->_tpl_vars['preview'] )): ?>
		<script type="text/javascript">
		  gid("edit_row").style.display = 'none';
			gid("submit_row").style.display = 'none';
			gid("edit_link").style.display = '';
		</script>
	<?php else: ?>
		<script type="text/javascript">
		  	gid("edit_row").style.display = '';
		  	gid("show_row").style.display = 'none';
			gid("submit_row").style.display = '';
			gid("edit_link").style.display = 'none';
		</script>
	<?php endif; ?>

</td></tr></table>