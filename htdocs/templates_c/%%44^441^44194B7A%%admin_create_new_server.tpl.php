<?php /* Smarty version 2.6.14, created on 2011-12-24 17:28:58
         compiled from admin_create_new_server.tpl */ ?>
<h3>Tworzenie nowego serwera</h3>
<?php if (! empty ( $this->_tpl_vars['err'] )): ?>
	<font color="red"><?php echo $this->_tpl_vars['err']; ?>
</font>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['sukces'] )): ?>
	<font color="green"><?php echo $this->_tpl_vars['sukces']; ?>
</font>
<?php endif; ?>
<br>

<small>Dodawanie serwera mo¿e trwaæ minutê!</small>
<form action="admin.php?screen=create_new_server&akcja=add_new_server" method="POST"/>
	<table class="vis" width="400">
		<tr>
			<th>Opcja</th>
			<th>Wartoœæ</th>
		</tr>
		<tr>
			<td>Szybkoœæ serwera:</td>
			<td><input type="text" name="speed" value="1" style="width: 135px;"/></td>
		</tr>
		<tr>
			<td>Szybkoœæ jednostek:</td>
			<td><input type="text" name="movement_speed" value="1" style="width: 135px;"/></td>
		</tr>
		<tr>
			<td>Poparcie na godzinê:</td>
			<td><input type="text" name="agreement_per_hour" value="1" style="width: 135px;"/></td>
		</tr>
		<tr>
			<td>Szybkoœæ kupców:</td>
			<td><input type="text" name="dealer_time" value="12" style="width: 135px;"/></td>
		</tr>
		<tr>
			<td colspan="2"><center><input type="submit" name="sub" value="Dodaæ nowy serwer" style="width: 135px;"/></center></td>
		</tr>
	</table>
</form>