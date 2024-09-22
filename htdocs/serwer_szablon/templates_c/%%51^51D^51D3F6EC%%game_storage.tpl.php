<?php /* Smarty version 2.6.14, created on 2011-12-17 22:03:49
         compiled from game_storage.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_time', 'game_storage.tpl', 74, false),)), $this); ?>
<?php 
if (!isset($this->_tpl_vars['cl_builds'])) {
	global $cl_builds;
	$this->assign('cl_builds',$cl_builds);
	}
$this->_tpl_vars['dbname'] = $this->_tpl_vars['screen'];
$this->_tpl_vars['aktu_build_prc'] = $this->_tpl_vars['village'][$this->_tpl_vars['dbname']] / $this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['dbname']);
 ?>
<table>
	<tr>
		<td>
			<?php if ($this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['dbname']) > 3): ?>
				<?php if (aktu_build_prc > 0.5): ?>
					<img src="graphic/big_buildings/<?php echo $this->_tpl_vars['dbname']; ?>
3.png" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" alt="" />
				<?php else: ?>
					<?php if ($this->_tpl_vars['aktu_build_prc'] > 0.2): ?>
						<img src="graphic/big_buildings/<?php echo $this->_tpl_vars['dbname']; ?>
2.png" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" alt="" />
					<?php else: ?>
						<img src="graphic/big_buildings/<?php echo $this->_tpl_vars['dbname']; ?>
1.png" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" alt="" />
					<?php endif; ?>
				<?php endif; ?>
			<?php else: ?>
				<img src="graphic/big_buildings/<?php echo $this->_tpl_vars['dbname']; ?>
1.png" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" alt="" />
			<?php endif; ?>
		</td>
		<td>
			<h2><?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
 (<?php if ($this->_tpl_vars['village'][$this->_tpl_vars['dbname']] > 0): ?>Poziom <?php echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']];  else: ?>Nie zbudowano<?php endif; ?>)</h2>
			<?php echo $this->_tpl_vars['cl_builds']->get_description_bydbname($this->_tpl_vars['dbname']); ?>

		</td>
	</tr>
</table>
<br />

<table class="vis">
	<?php $_from = $this->_tpl_vars['storage_arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lev']):
?>
	<tr>
		<td width="200">
			<img src="graphic/res.png" alt="" />
			<?php echo $this->_tpl_vars['lev']['opis']; ?>

		</td>
		<td>
			<b><?php echo $this->_tpl_vars['lev']['produkcja']; ?>
</b>
			Surowców
		</td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>

<br />

<table class="vis">
	<tr>
		<th width="150">
			Spichlerz pe³ny
		</th>
		<th>
			Czas (hh:mm:ss)
		</th>
	</tr>
	<?php if ($this->_tpl_vars['wood_is_full']): ?>
		<tr>
			<td width="250" colspan="2">
				<img src="graphic/wood.png" title="Drewno" alt="" />
				Spichlerz jest pe³ny
			</td>
		</tr>
	<?php else: ?>
		<tr>
			<td width="250">
				<img src="graphic/wood.png" title="Drewno" alt="" />
				<?php echo $this->_tpl_vars['pl']->format_date($this->_tpl_vars['end_wood']); ?>

			</td>
			<td>
				<span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['time_wood'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span>
			</td>
		</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['stone_is_full']): ?>
		<tr>
			<td width="250" colspan="2">
				<img src="graphic/stone.png" title="Glina" alt="" />
				Spichlerz jest pe³ny
			</td>
		</tr>
	<?php else: ?>
		<tr>
			<td width="250">
				<img src="graphic/stone.png" title="Glina" alt="" />
				<?php echo $this->_tpl_vars['pl']->format_date($this->_tpl_vars['end_stone']); ?>

			</td>
			<td>
				<span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['time_stone'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span>
			</td>
		</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['iron_is_full']): ?>
		<tr>
			<td width="250" colspan="2">
				<img src="graphic/iron.png" title="¯elazo" alt="" />
				Spichlerz jest pe³ny
			</td>
		</tr>
	<?php else: ?>
		<tr>
			<td width="250">
				<img src="graphic/iron.png" title="¯elazo" alt="" />
				<?php echo $this->_tpl_vars['pl']->format_date($this->_tpl_vars['end_iron']); ?>

			</td>
			<td>
				<span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['time_iron'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span>
			</td>
		</tr>
	<?php endif; ?>
</table>