<?php /* Smarty version 2.6.14, created on 2011-12-18 16:12:18
         compiled from game_info_command.tpl */ ?>
<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<?php echo $this->_tpl_vars['error']; ?>

<?php else: ?>
	<h2><?php echo $this->_tpl_vars['pl']->pl_text($this->_tpl_vars['mov']['message']); ?>
</h2>
	<?php if ($this->_tpl_vars['type'] == 'own'): ?>
		<table class="vis" width="300">
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
		<tr><td>Trwanie:</td><td><?php echo $this->_tpl_vars['mov']['duration']; ?>
</td></tr>
		<tr><td>Przybycie:</td><td><?php echo $this->_tpl_vars['pl']->pl_date($this->_tpl_vars['mov']['arrival']); ?>
</td></tr>
		<tr><td>Przybycie za:</td><td><span class="timer"><?php echo $this->_tpl_vars['mov']['arrival_in']; ?>
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
				<th width="50"><img src="graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" alt="" /></th>
			<?php endforeach; endif; unset($_from); ?>
		</tr>
		<tr>
			<?php $_from = $this->_tpl_vars['mov']['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num_units']):
 if ($this->_tpl_vars['num_units'] > 0): ?><td><?php echo $this->_tpl_vars['num_units']; ?>
</td><?php else: ?><td class="hidden">0</td><?php endif;  endforeach; endif; unset($_from); ?>
		</tr>
		</table>
		<?php if ($this->_tpl_vars['mov']['wood'] != 0 || $this->_tpl_vars['mov']['stone'] != 0 || $this->_tpl_vars['mov']['iron'] != 0): ?>
			<table class="vis"><tr>
			<td>£upy:</td><td><?php if ($this->_tpl_vars['mov']['wood'] > 0): ?><img src="graphic/holz.png" title="Drewno" alt="" /><?php echo $this->_tpl_vars['mov']['wood']; ?>
 <?php endif;  if ($this->_tpl_vars['mov']['stone'] > 0): ?><img src="graphic/lehm.png" title="Glina" alt="" /><?php echo $this->_tpl_vars['mov']['stone']; ?>
 <?php endif;  if ($this->_tpl_vars['mov']['iron'] > 0): ?><img src="graphic/eisen.png" title="¯elazo" alt="" /><?php echo $this->_tpl_vars['mov']['iron']; ?>
 <?php endif; ?></td>
			</tr></table>
		<?php endif; ?>
	<?php else: ?>
		<table class="vis" width="300">
		<tr><th colspan="2">Rozkaz</th></tr>
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
		<tr><td>Przybycie:</td><td><?php echo $this->_tpl_vars['pl']->pl_date($this->_tpl_vars['mov']['arrival']); ?>
</td></tr>
		<tr><td>Przybycie za:</td><td><span class="timer"><?php echo $this->_tpl_vars['mov']['arrival_in']; ?>
</span></td></tr>
		</table>	
	<?php endif; ?>
<?php endif; ?>