<?php /* Smarty version 2.6.14, created on 2012-04-29 12:46:19
         compiled from game_info_command.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_time', 'game_info_command.tpl', 10, false),array('modifier', 'format_date', 'game_info_command.tpl', 11, false),array('modifier', 'format_number', 'game_info_command.tpl', 31, false),)), $this); ?>
<?php if ($this->_tpl_vars['command_exists']): ?>
	<h2><?php echo $this->_tpl_vars['mov']['message']; ?>
</h2>
	<?php if ($this->_tpl_vars['type'] == 'own'): ?>
		<table class="vis" width="400">
		<tr>
			<th colspan="2">Rozkaz</th>
		</tr>
		<tr><td>Cel:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['mov']['to_village']; ?>
"><?php echo $this->_tpl_vars['mov']['to_villagename']; ?>
 (<?php echo $this->_tpl_vars['mov']['to_x']; ?>
|<?php echo $this->_tpl_vars['mov']['to_y']; ?>
)</a></td></tr>
		<tr><td>Gracz:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['mov']['to_userid']; ?>
"><?php echo $this->_tpl_vars['mov']['to_username']; ?>
</a></td></tr>
		<tr><td>Trwanie:</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['mov']['duration'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td></tr>
		<tr><td>Przybycie:</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['mov']['arrival'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)); ?>
</td></tr>
		<tr><td>Przybycie za:</td><td><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['mov']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td></tr>
		<tr><td>Pochodzenie:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['mov']['from_village']; ?>
"><?php echo $this->_tpl_vars['mov']['from_villagename']; ?>
 (<?php echo $this->_tpl_vars['mov']['from_x']; ?>
|<?php echo $this->_tpl_vars['mov']['from_y']; ?>
)</a></td></tr>
		
			
		<tr><td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;&amp;screen=place">&raquo; Plac</a></td></tr>
		<?php if ($this->_tpl_vars['mov']['cancel']): ?>
			<tr><td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=place&action=cancel&id=<?php echo $this->_tpl_vars['mov']['id']; ?>
&h=<?php echo $this->_tpl_vars['hkey']; ?>
">&raquo; przerwij</a></td></tr>
		<?php endif; ?>	
			
		</table><br />
		
		
		<table class="vis">
		<tr>
			<?php $_from = $this->_tpl_vars['cl_units']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
				<th width="50"><img src="/ds_graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" alt="" /></th>
			<?php endforeach; endif; unset($_from); ?>
		</tr>
		<tr>
			<?php $_from = $this->_tpl_vars['mov']['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num_units']):
 if ($this->_tpl_vars['num_units'] > 0): ?><td><?php echo ((is_array($_tmp=$this->_tpl_vars['num_units'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td><?php else: ?><td class="hidden">0</td><?php endif;  endforeach; endif; unset($_from); ?>
		</tr>
		</table>
		<?php if ($this->_tpl_vars['mov']['wood'] != 0 || $this->_tpl_vars['mov']['stone'] != 0 || $this->_tpl_vars['mov']['iron'] != 0): ?>
			<table class="vis"><tr>
			<td>£upy:</td><td><?php if ($this->_tpl_vars['mov']['wood'] > 0): ?><img src="/ds_graphic/holz.png" title="Drewno" alt="" /><?php echo ((is_array($_tmp=$this->_tpl_vars['mov']['wood'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
 <?php endif;  if ($this->_tpl_vars['mov']['stone'] > 0): ?><img src="/ds_graphic/lehm.png" title="Glina" alt="" /><?php echo ((is_array($_tmp=$this->_tpl_vars['mov']['stone'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
 <?php endif;  if ($this->_tpl_vars['mov']['iron'] > 0): ?><img src="/ds_graphic/eisen.png" title="¯elazo" alt="" /><?php echo ((is_array($_tmp=$this->_tpl_vars['mov']['iron'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
 <?php endif; ?></td>
			</tr></table>
		<?php endif; ?>
	<?php else: ?>
		<table class="vis" width="300">
		<tr><th colspan="2">Rozkaz</th></tr>
		<tr><td>Cel:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['mov']['to_village']; ?>
"><?php echo $this->_tpl_vars['mov']['to_villagename']; ?>
 (<?php echo $this->_tpl_vars['mov']['to_x']; ?>
|<?php echo $this->_tpl_vars['mov']['to_y']; ?>
)</a></td></tr>
		<tr><td>Pochodzenie:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['mov']['from_village']; ?>
"><?php echo $this->_tpl_vars['mov']['from_villagename']; ?>
 (<?php echo $this->_tpl_vars['mov']['from_x']; ?>
|<?php echo $this->_tpl_vars['mov']['from_y']; ?>
)</a></td></tr>
		<tr><td>Gracz:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['mov']['from_userid']; ?>
"><?php echo $this->_tpl_vars['mov']['from_username']; ?>
</a></td></tr>
		<tr><td>Przybycie:</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['mov']['arrival'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)); ?>
</td></tr>
		<tr><td>Przybycie za:</td><td><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['mov']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td></tr>
		</table>	
	<?php endif; ?>
<?php else: ?>
	<span class="error">Komenda nie istnieje</span>
<?php endif; ?>