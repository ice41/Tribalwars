<?php /* Smarty version 2.6.14, created on 2010-12-17 10:40:22
         compiled from index_start_buildings.tpl */ ?>
<h2>Incepe construirea</h2>
Aici poti seta ce level sa aiba cladirile la inceputul jocului.
<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<br /><br /><font class="error"><?php echo $this->_tpl_vars['error']; ?>
</font><br />
<?php endif; ?>
<form method="post" action="index.php?screen=start_buildings&action=edit">
	<table class="vis">
		<tr>
			<th>Cladire</th><th>Nivel</th>
		</tr>
		<?php $_from = $this->_tpl_vars['buildings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['arr']):
?>
			<tr>
				<td><img src="../graphic/buildings/<?php echo $this->_tpl_vars['dbname']; ?>
.png"> <?php echo $this->_tpl_vars['arr']['name']; ?>
:</td>
				<td><input type="text" size="4" name="<?php echo $this->_tpl_vars['dbname']; ?>
" value="<?php echo $this->_tpl_vars['arr']['stage']; ?>
"></td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
		<tr>
			<td colspan="2" align="center"><input name="standard" type="submit" value="Setarile standard"> <input type="submit" value="Salveaza"></td>
		</tr>
	</table>
</form>