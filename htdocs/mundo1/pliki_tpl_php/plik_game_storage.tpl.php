<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2023-02-27 00:38:00
         Wersja PHP pliku pliki_tpl/game_storage.tpl */ ?>
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
				<?php if ($this->_tpl_vars['aktu_build_prc'] > 0.5): ?>
					<img src="/ds_graphic/big_buildings/<?php echo $this->_tpl_vars['dbname']; ?>
3.png" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" alt="" />
				<?php else: ?>
					<?php if ($this->_tpl_vars['aktu_build_prc'] > 0.2): ?>
						<img src="/ds_graphic/big_buildings/<?php echo $this->_tpl_vars['dbname']; ?>
2.png" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" alt="" />
					<?php else: ?>
						<img src="/ds_graphic/big_buildings/<?php echo $this->_tpl_vars['dbname']; ?>
1.png" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" alt="" />
					<?php endif; ?>
				<?php endif; ?>
			<?php else: ?>
				<img src="/ds_graphic/big_buildings/<?php echo $this->_tpl_vars['dbname']; ?>
1.png" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" alt="" />
			<?php endif; ?>
		</td>
		<td>
			<h2><?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
 (<?php if ($this->_tpl_vars['village'][$this->_tpl_vars['dbname']] > 0): ?>Nível <?php echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; ?>
<?php else: ?>Não construído<?php endif; ?>)</h2>
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
			<img src="/ds_graphic/res.png" alt="" />
			<?php echo $this->_tpl_vars['lev']['opis']; ?>

		</td>
		<td>
			<b><?php echo $this->_tpl_vars['lev']['produkcja']; ?>
</b>
			Recursos
		</td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>

<br />

<table class="vis">
	<tr>
		<th width="150">
			O armazém está cheio
		</th>
		<th>
			Tempo (hh:mm:ss)
		</th>
	</tr>
	<?php if ($this->_tpl_vars['wood_is_full']): ?>
		<tr>
			<td width="250" colspan="2">
				<img src="/ds_graphic/wood.png" title="Madeira" alt="" />
				O armazém está cheio
			</td>
		</tr>
	<?php else: ?>
		<tr>
			<td width="250">
				<img src="/ds_graphic/wood.png" title="Madeira" alt="" />
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
				<img src="/ds_graphic/stone.png" title="Argila" alt="" />
				O armazém está cheio
			</td>
		</tr>
	<?php else: ?>
		<tr>
			<td width="250">
				<img src="/ds_graphic/stone.png" title="Argila" alt="" />
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
				<img src="/ds_graphic/iron.png" title="Ferro" alt="" />
				O armazém está cheio
			</td>
		</tr>
	<?php else: ?>
		<tr>
			<td width="250">
				<img src="/ds_graphic/iron.png" title="Ferro" alt="" />
				<?php echo $this->_tpl_vars['pl']->format_date($this->_tpl_vars['end_iron']); ?>

			</td>
			<td>
				<span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['time_iron'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span>
			</td>
		</tr>
	<?php endif; ?>
</table>