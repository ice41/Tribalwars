<?php /* Smarty version 2.6.14, created on 2011-12-23 22:07:18
         compiled from game_place_confirm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_time', 'game_place_confirm.tpl', 16, false),)), $this); ?>
<?php if ($this->_tpl_vars['type'] == 'attack'): ?>
	<h2>Atak</h2>
<?php else: ?>
	<h2>Pomoc</h2>
<?php endif; ?>

<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;action=command&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post" onSubmit="this.submit.disabled=false;">
	<input type="hidden" name="<?php echo $this->_tpl_vars['type']; ?>
" value="true">
	<input type="hidden" name="x" value="<?php echo $this->_tpl_vars['values']['x']; ?>
">
	<input type="hidden" name="y" value="<?php echo $this->_tpl_vars['values']['y']; ?>
">
	
	<table class="vis" width="300">
		<tr><th colspan="2">Rozkaz</th></tr>
		<tr><td>Cel:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['info_village']['id']; ?>
"><?php echo $this->_tpl_vars['info_village']['name']; ?>
 (<?php echo $this->_tpl_vars['values']['x']; ?>
|<?php echo $this->_tpl_vars['values']['y']; ?>
) K<?php echo $this->_tpl_vars['info_village']['continent']; ?>
</a></td></tr>
		<tr><td>Gracz:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['info_village']['userid']; ?>
"><?php echo $this->_tpl_vars['info_user']['username']; ?>
</a></td></tr>
		<tr><td>Trwanie:</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['unit_runtime'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td></tr>
		<tr><td>Przybycie:</td><td><?php echo $this->_tpl_vars['pl']->format_date($this->_tpl_vars['arrival']); ?>
</td></tr>
	</table>
	<br>
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
		    <?php $_from = $this->_tpl_vars['cl_units']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
				<?php if ($this->_tpl_vars['send_units'][$this->_tpl_vars['dbname']] > 0): ?>
				    <td><?php echo $this->_tpl_vars['send_units'][$this->_tpl_vars['dbname']]; ?>
</td>
				<?php else: ?>
					<td class="hidden">0</td>
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
		</tr>
	</table>
	<br />
    <?php $_from = $this->_tpl_vars['cl_units']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
        <input type="hidden" name="<?php echo $this->_tpl_vars['dbname']; ?>
" value="<?php echo $this->_tpl_vars['send_units'][$this->_tpl_vars['dbname']]; ?>
">
	<?php endforeach; endif; unset($_from); ?>
		<?php if ($this->_tpl_vars['send_units']['unit_catapult'] > 0 && $this->_tpl_vars['type'] != 'support'): ?>
	    <table class="vis">
	        <tr>
	            <th>Cel katapulty:</th>
	            <td>
                    <select name="building" size="1">
                        <?php $_from = $this->_tpl_vars['cl_builds']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dbname']):
?>
                            <?php if (! in_array ( 'catapult_protection' , $this->_tpl_vars['cl_builds']->get_specials($this->_tpl_vars['dbname']) )): ?>
                        		<option label="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" value="<?php echo $this->_tpl_vars['dbname']; ?>
"><?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
</option>
							<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?>
                    </select>
				</td>
	        </tr>
	    </table>
	<?php endif; ?>
	<br />
	<input name="submit" type="submit" value="OK" style="font-size: 10pt;">
</form>