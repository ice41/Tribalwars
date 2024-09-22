<?php /* Smarty version 2.6.14, created on 2011-12-17 22:04:07
         compiled from game_wood.tpl */ ?>
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

<?php if ($this->_tpl_vars['village'][$this->_tpl_vars['screen']] > 0): ?>
	<table class="vis">
		<?php $_from = $this->_tpl_vars['production_arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lev']):
?>
			<tr>
				<td width="200">
					<img src="graphic/<?php echo $this->_tpl_vars['sur_name']; ?>
.png" alt="" />
					<?php echo $this->_tpl_vars['lev']['opis']; ?>

				</td>
				<td>
					<b><?php echo $this->_tpl_vars['lev']['produkcja']; ?>
</b>
					na godzinê
				</td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>
<?php endif; ?>