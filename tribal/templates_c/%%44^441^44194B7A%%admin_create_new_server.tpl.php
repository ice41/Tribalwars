<?php /* Smarty version 2.6.14, created on 2013-12-19 00:26:36
         compiled from admin_create_new_server.tpl */ ?>
<h3>Criar um novo servidor</h3>
<?php if (! empty ( $this->_tpl_vars['err'] )): ?>
	<font color="red"><?php echo $this->_tpl_vars['err']; ?>
</font>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['sukces'] )): ?>
	<font color="green"><?php echo $this->_tpl_vars['sukces']; ?>
</font>
<?php endif; ?>
<br>

<small>Adicionando um servidor pode demurar um pouco!</small>
<form action="admin.php?screen=create_new_server&akcja=add_new_server" method="POST"/>
	<table class="vis" width="400">
		<tr>
			<th>Opção</th>
			<th>Valor</th>
		</tr>
		<tr>
			<td>A velocidade do servidor:</td>
			<td><input type="text" name="speed" value="1" style="width: 135px;"/></td>
		</tr>
		<tr>
			<td>Velocidade Unidade:</td>
			<td><input type="text" name="movement_speed" value="1" style="width: 135px;"/></td>
		</tr>
		<tr>
			<td>Suporte para uma hora:</td>
			<td><input type="text" name="agreement_per_hour" value="1" style="width: 135px;"/></td>
		</tr>
		<tr>
			<td>Comerciantes Velocidade:</td>
			<td><input type="text" name="dealer_time" value="12" style="width: 135px;"/></td>
		</tr>
		<tr>
			<td colspan="2"><center><input type="submit" name="sub" value="Adicionar servidor" style="width: 135px;"/></center></td>
		</tr>
	</table>
</form>