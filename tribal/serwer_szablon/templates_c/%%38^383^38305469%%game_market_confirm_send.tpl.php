<?php /* Smarty version 2.6.14, created on 2012-04-16 21:18:11
         compiled from game_market_confirm_send.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_number', 'game_market_confirm_send.tpl', 29, false),)), $this); ?>
<h2>PotwierdŸ transport</h2>

<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=market&amp;action=send&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">

	<table class="vis" width="450">
		<tr>
			<th colspan="2">Transport</th>
		</tr>
		<tr>
			<td>Cel:</td>
			<td>
				<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['confirm']['to_villageid']; ?>
">
					<?php echo $this->_tpl_vars['confirm']['to_villagename']; ?>
 (<?php echo $this->_tpl_vars['confirm']['to_x']; ?>
|<?php echo $this->_tpl_vars['confirm']['to_y']; ?>
)
				</a>
			</td>
		</tr>
		<tr>
			<td>Gracz:</td>
			<td>
				<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['confirm']['to_userid']; ?>
">
					<?php echo $this->_tpl_vars['confirm']['to_username']; ?>

				</a>
			</td>
		</tr>
		<tr>
			<td width="150">Surowce:</td>
			<td width="200">
				<?php if ($this->_tpl_vars['confirm']['wood'] > 0): ?>
					<img src="graphic/holz.png" title="Holz" alt="" /><?php echo ((is_array($_tmp=$this->_tpl_vars['confirm']['wood'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
 
				<?php endif; ?>
				<?php if ($this->_tpl_vars['confirm']['stone'] > 0): ?>
					<img src="graphic/lehm.png" title="Lehm" alt="" /><?php echo ((is_array($_tmp=$this->_tpl_vars['confirm']['stone'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
 
				<?php endif; ?>
				<?php if ($this->_tpl_vars['confirm']['iron'] > 0): ?>
					<img src="graphic/eisen.png" title="Eisen" alt="" /><?php echo ((is_array($_tmp=$this->_tpl_vars['confirm']['iron'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
 
				<?php endif; ?>
			</td>
		</tr>
		<tr>
			<td>Potrzeba kupców:</td>
			<td><?php echo $this->_tpl_vars['confirm']['dealers']; ?>
</td>
		</tr>
		<tr>
			<td>Trwanie (w obie strony):</td>
			<td><?php echo $this->_tpl_vars['confirm']['dealer_running']; ?>
</td>
		</tr>
		<tr>
			<td>Przybycie:</td>
			<td><?php echo $this->_tpl_vars['pl']->pl_date($this->_tpl_vars['confirm']['time_to']); ?>
</td>
		</tr>
		<tr>
			<td>Powrót:</td>
			<td><?php echo $this->_tpl_vars['pl']->pl_date($this->_tpl_vars['confirm']['time_back']); ?>
</td>
		</tr>
	</table>
	
	<br />

	<input type="submit" value="OK" style="font-size:10pt;width: 80px;" />
	<input type="hidden" name="x" value="<?php echo $this->_tpl_vars['confirm']['to_x']; ?>
" />
	<input type="hidden" name="y" value="<?php echo $this->_tpl_vars['confirm']['to_y']; ?>
" />
	<input type="hidden" name="wood" value="<?php echo $this->_tpl_vars['confirm']['wood']; ?>
" />
	<input type="hidden" name="stone" value="<?php echo $this->_tpl_vars['confirm']['stone']; ?>
" />
	<input type="hidden" name="iron" value="<?php echo $this->_tpl_vars['confirm']['iron']; ?>
" />

</form>