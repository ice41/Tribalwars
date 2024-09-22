<?php /* Smarty version 2.6.14, created on 2012-03-11 19:16:11
         compiled from help_buildings.tpl */ ?>
<h3>Budynki</h3>
<table class="vis" width="100%">
<?php $_from = $this->_tpl_vars['cl_builds']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname']):
?>
	<tr>
		<td class="nowrap" width="150">
			<a href="javascript:popup_scroll('popup_building.php?building=<?php echo $this->_tpl_vars['dbname']; ?>
', 520, 520)">
				<center><img src="graphic/big_buildings/<?php echo $this->_tpl_vars['dbname']; ?>
1.png" alt="" /></center>
				<br><center><?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
</center>
			</a>
		</td>
		<td>
			<?php echo $this->_tpl_vars['cl_builds']->get_description_bydbname($this->_tpl_vars['dbname']); ?>
</td>
		</tr>
<?php endforeach; endif; unset($_from); ?>
</table>

<h3>Drzewko technologii dla œwiatów w starym stylu</h3>

<img src="graphic/Techtree_with_statue.png" alt=""/>