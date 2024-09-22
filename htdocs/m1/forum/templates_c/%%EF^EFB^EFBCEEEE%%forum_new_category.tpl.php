<?php /* Smarty version 2.6.14, created on 2011-08-29 15:51:31
         compiled from forum_new_category.tpl */ ?>
<table class="vis">
	<?php if ($this->_tpl_vars['rename_error']): ?>
		<div class="error"><?php echo $this->_tpl_vars['rename_error']; ?>
</div>
	<?php endif; ?>
	<tr>
		<th>Nume</th>
		<th>Actiune</th>
	</tr>
	
	<?php $_from = $this->_tpl_vars['category_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value'] => $this->_tpl_vars['id']):
?>
	<form action="forum.php?ally=<?php echo $this->_tpl_vars['ally']; ?>
&do=new_category&mod=<?php echo $this->_tpl_vars['id']; ?>
" method="POST">
	<tr>
		<td><input type="text" size="40" name="r_name" value="<?php echo $this->_tpl_vars['category_name'][$this->_tpl_vars['value']]; ?>
" /></td>
		<td>
			<input type="submit" name="rename_category" value="Redenumire" />
			<input type="submit" name="delete_category" onclick="return confirm('Sigur doriti sa stergeti aceasta categorie?');" value="Sterge" />
		</td>
	</tr>
	</form>
	<?php endforeach; endif; unset($_from); ?>
</table>
	<h3>Categorie noua</h3>
	<?php if ($this->_tpl_vars['error']): ?>
		<div class="error"><?php echo $this->_tpl_vars['error']; ?>
</div>
	<?php endif; ?>
<form action="forum.php?ally=<?php echo $this->_tpl_vars['ally']; ?>
&do=new_category&new=yes" method="POST" />
	<table class="vis">
		<tr><th>Nume</th></tr>
		<tr><td><input type="text" name="name" size="40" /><input type="submit" name="go" value="Creaza" /></td></tr>
	</table>
</form>