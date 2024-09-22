<?php /* Smarty version 2.6.14, created on 2011-12-16 17:38:57
         compiled from admin_index.tpl */ ?>
<?php if (! empty ( $this->_tpl_vars['err'] )): ?>	<font color="red"><?php echo $this->_tpl_vars['err']; ?>
</font><?php endif; ?><form action="admin.php?screen=index&akcja=dodaj_ogloszenie" method="POST">	<table class="vis">		<tr>			<th>Dodawanie og³oszñ do strony g³ównej</th>		</tr>		<tr>			<td>				<textarea style="height:250px;width:450px;" name="ogl_val"/></textarea>			</td>		</tr>		<tr>			<th><input name="sub" type="submit" value="Dodaj Og³oszenie"/></th>		</tr>	</table></form><?php if (count ( $this->_tpl_vars['ogloszenia'] )): ?>	<h3>Dodane og³oszenia na stronê g³ówn¹</h3>	<table class="vis">		<tr>			<th>Tekst</th>			<th>Data</th>			<th>Akcja</th>		</tr>		<?php $_from = $this->_tpl_vars['ogloszenia']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['ogloszenie']):
?>			<tr>				<td><?php echo $this->_tpl_vars['ogloszenie']['text']; ?>
</td>				<td><?php echo $this->_tpl_vars['ogloszenie']['data']; ?>
</td>				<td><a href="admin.php?akcja=usun_ogloszenie&oid=<?php echo $this->_tpl_vars['id']; ?>
"/>Usuñ te og³oszenie</a></td>			</tr>		<?php endforeach; endif; unset($_from); ?>		<tr>		</tr>	</table><?php endif; ?>