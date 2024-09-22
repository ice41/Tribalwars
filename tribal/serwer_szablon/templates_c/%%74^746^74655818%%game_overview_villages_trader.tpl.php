<?php /* Smarty version 2.6.14, created on 2012-04-27 21:50:17
         compiled from game_overview_villages_trader.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_time', 'game_overview_villages_trader.tpl', 35, false),)), $this); ?>
<?php if ($this->_tpl_vars['sekcja_transporty']): ?>
	<table class="vis">
		<tr>
			<td>
				<?php echo $this->_tpl_vars['sekcja_transporty_content']; ?>
 
			</td>
		</tr>
	</table>
<?php endif; ?>

<?php if (count ( $this->_tpl_vars['user_transports'] ) > 0): ?>
	<table class="vis"/>
		<tr>
			<th>Transport</th>
			<th>Pochodzenie</th>
			<th>Cel</th>
			<th>Na miejscu</th>
			<th>Na miejscu za</th>
			<th>Surowce</th>
			<th>Kupcy</th>
		</tr>
		<?php $_from = $this->_tpl_vars['user_transports']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['transport']):
?>
			<tr <?php if (! $this->_tpl_vars['transport']['parzysta_liczba']): ?>class="row_b"<?php else: ?>class="row_a"<?php endif; ?>>
				<td><?php echo $this->_tpl_vars['transport']['message']; ?>
</td>
				<td>
					<?php if ($this->_tpl_vars['transport']['from_userid'] != '-1'): ?>
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_player&id=<?php echo $this->_tpl_vars['transport']['from_userid']; ?>
"/><?php echo $this->_tpl_vars['transport']['from_username']; ?>
</a>
					<?php endif; ?>
				</td>
				<td>
					<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_village&id=<?php echo $this->_tpl_vars['transport']['to_village']; ?>
"/><?php echo $this->_tpl_vars['transport']['to_villagename']; ?>
</a>
				</td>
				<td><?php echo $this->_tpl_vars['pl']->format_date($this->_tpl_vars['transport']['end_time']); ?>
</td>
				<td>
					<span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['transport']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span>
				</td>
				<td>
					<?php if ($this->_tpl_vars['transport']['wood'] > 0): ?>
						<img src="/ds_graphic/holz.png" title="Drewno" alt="" /><?php echo $this->_tpl_vars['transport']['wood']; ?>
 
					<?php endif; ?>
					<?php if ($this->_tpl_vars['transport']['stone'] > 0): ?>
						<img src="/ds_graphic/lehm.png" title="Glina" alt="" /><?php echo $this->_tpl_vars['transport']['stone']; ?>
 
					<?php endif; ?>
					<?php if ($this->_tpl_vars['transport']['iron'] > 0): ?>
						<img src="/ds_graphic/eisen.png" title="¯elazo" alt="" /><?php echo $this->_tpl_vars['transport']['iron']; ?>
 
					<?php endif; ?>
				</td>
				<td><?php echo $this->_tpl_vars['transport']['dealers']; ?>
</td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>
<?php endif; ?>