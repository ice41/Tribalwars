<?php /* Smarty version 2.6.14, created on 2012-04-10 14:10:31
         compiled from forum/forum_admin.tpl */ ?>
<table class="vis" width="100%">
	<tbody>
		<tr>
			<th>Forum</th>
			<th>Widoczno��</th>
			<th>Dost�p</th>
			<th>Akcja</th>
		</tr>
	</tbody>
	<tbody id="sortable_forums" class="ui-sortable">
		<?php $_from = $this->_tpl_vars['ally_forum_arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['fid'] => $this->_tpl_vars['finfo']):
?>
			<tr id="forum_<?php echo $this->_tpl_vars['fid']; ?>
">
				<td>
					<form action="<?php echo $this->_tpl_vars['base_link']; ?>
&sm=admin&action=edit_forum&fid=<?php echo $this->_tpl_vars['fid']; ?>
&h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
						<input name="title" size="32" value="<?php echo $this->_tpl_vars['finfo']['name']; ?>
" type="text">
						<input value="Zmie� nazw�" type="submit">
					</form>
				</td>
				<td>
					<?php if ($this->_tpl_vars['finfo']['visible'] == 0): ?>
						Dla wszystkich
					<?php endif; ?>
					<?php if ($this->_tpl_vars['finfo']['visible'] == 1): ?>
						Ukryte forum
					<?php endif; ?>
					<?php if ($this->_tpl_vars['finfo']['visible'] == 2): ?>
						Zaufani cz�onkowie
					<?php endif; ?>
					<a href="<?php echo $this->_tpl_vars['base_link']; ?>
&sm=admin&action=make_private&fid=<?php echo $this->_tpl_vars['fid']; ?>
&h=<?php echo $this->_tpl_vars['hkey']; ?>
">zmie�</a>
				</td>
				<td>
					Dost�pne w wersji 7.2
				</td>
				<td>
					<form action="<?php echo $this->_tpl_vars['base_link']; ?>
&sm=admin&action=del_forum&fid=<?php echo $this->_tpl_vars['fid']; ?>
&h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
						<input name="confirm" value="true" type="checkbox">potwierd�
						<input value="Skasuj" type="submit">
					</form>
				</td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
	</tbody>
</table>

<div style="text-align: right;">*: To plemi� nie zaakceptowa�o jeszcze dzielenia forum.</div>

<br>
<br>

<form action="<?php echo $this->_tpl_vars['base_link']; ?>
&sm=admin&action=new_forum&h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
	<table class="vis">
		<tbody>
			<tr>
				<th colspan="4">Utw�rz nowe forum</th>
			</tr>
			
			<tr>
				<td>Nazwa forum: <input name="title" type="text"></td>
				<td>
					<label>
						<input name="trust_priv" value="0" checked="checked" type="radio"> Widoczne dla wszystkich
					</label>
					<br>
					<label>
						<input name="trust_priv" value="1" type="radio"> Ukryte forum
					</label>
					<br>
					<label>
						<input name="trust_priv" value="2" type="radio"> Zaufani cz�onkowie
					</label>
				</td>
				<td>
					<input value="Utw�rz" type="submit">
				</td>
			</tr>
		</tbody>
	</table>
</form>

