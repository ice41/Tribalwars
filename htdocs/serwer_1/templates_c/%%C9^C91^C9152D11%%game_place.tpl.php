<?php /* Smarty version 2.6.14, created on 2011-12-17 23:40:51
         compiled from game_place.tpl */ ?>
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
<?php if ($this->_tpl_vars['show_build']): ?>
    <?php 
	$this->_tpl_vars['pl_trans'] = array("command" => "Rozkaz","units" => "Wojsko","sim" => "Symulator");
	 ?>
	<table width="100%"><tr><td valign="top" width="100">
	<table class="vis" width="100%">
		<?php $_from = $this->_tpl_vars['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['f_name'] => $this->_tpl_vars['f_mode']):
?>
			<?php if ($this->_tpl_vars['f_mode'] == $this->_tpl_vars['mode']): ?>
				<tr>
					<td class="selected" width="120">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;mode=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php echo $this->_tpl_vars['pl_trans'][$this->_tpl_vars['f_mode']]; ?>
</a>
					</td>
				</tr>
			<?php else: ?>
                <tr>
                    <td width="120">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;mode=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php echo $this->_tpl_vars['pl_trans'][$this->_tpl_vars['f_mode']]; ?>
</a>
					</td>
				</tr>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
	</table>
	
	</td><td valign="top" width="*">
		<?php if (in_array ( $this->_tpl_vars['mode'] , $this->_tpl_vars['allow_mods'] )): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_place_".($this->_tpl_vars['mode']).".tpl", 'smarty_include_vars' => array('title' => 'foo')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php endif; ?>
	</td></tr></table>


<?php endif; ?>