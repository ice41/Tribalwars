<?php /* Smarty version 2.6.14, created on 2013-12-19 00:35:23
         compiled from admin_edit_serwer.tpl */ ?>
<h3>Editar Servidores</h3>

Aqui pode editar as op��es do servidor padr�o, ent�o tamb�m pode remover o servidor, se necess�rio.

<br><br>

<?php if ($this->_tpl_vars['show_edit_form']): ?>

	<form action="admin.php?screen=edit_serwer&action=edit_serw_form&id=<?php echo $this->_tpl_vars['serv']['id']; ?>
" method="POST"/>
		<table class="vis">
			<tr>
				<th colspan="2">Edi��o do servidor <?php echo $this->_tpl_vars['serv']['id']; ?>
</th>
			</tr>
			<tr>
				<td>A senha para o administrador</td>
				<td><input type="text" name="admin_pass" value="<?php echo $this->_tpl_vars['serv']['admin_pass']; ?>
"></td>
			</tr>
			<tr>
				<td>Velocidade</td>
				<td><input type="text" name="speed" value="<?php echo $this->_tpl_vars['serv']['speed']; ?>
"></td>
			</tr>
			<tr>
				<td>Terreno Defesa</td>
				<td><input type="text" name="reason_defense" value="<?php echo $this->_tpl_vars['serv']['reason_defense']; ?>
"></td>
			</tr>
			<tr>
				<td>Moral</td>
				<td>
					<input type="radio" name="moral_activ" value="0" <?php if (! $this->_tpl_vars['serv']['moral_activ']): ?>checked="checked"<?php endif; ?>> N�o<br>
					<input type="radio" name="moral_activ" value="1" <?php if ($this->_tpl_vars['serv']['moral_activ']): ?>checked="checked"<?php endif; ?>> Sim
				</td>
			</tr>
			<tr>
				<td>Estilo Nobresa</td>
				<td>
					<input type="radio" name="ag_style" value="0" <?php if (! $this->_tpl_vars['serv']['ag_style']): ?>checked="checked"<?php endif; ?>> Logar<br>
					<input type="radio" name="ag_style" value="1" <?php if ($this->_tpl_vars['serv']['ag_style']): ?>checked="checked"<?php endif; ?>> Moedas
				</td>
			</tr>
			<tr>
				<td>Cobertura da nobreza</td>
				<td><input type="text" name="snob_range" value="<?php echo $this->_tpl_vars['serv']['snob_range']; ?>
"></td>
			</tr>
			<tr>
				<td>Noite</td>
				<td>
					<input type="radio" name="noc" value="0" <?php if (! $this->_tpl_vars['serv']['noc']): ?>checked="checked"<?php endif; ?>> N�o<br>
					<input type="radio" name="noc" value="1" <?php if ($this->_tpl_vars['serv']['noc']): ?>checked="checked"<?php endif; ?>> Sim
				</td>
			</tr>
			<tr>
				<td>Jogadores de Recrutamento</td>
				<td>
					<input type="radio" name="create_users_and_villages" value="0" <?php if (! $this->_tpl_vars['serv']['create_users_and_villages']): ?>checked="checked"<?php endif; ?>> N�o<br>
					<input type="radio" name="create_users_and_villages" value="1" <?php if ($this->_tpl_vars['serv']['create_users_and_villages']): ?>checked="checked"<?php endif; ?>> Sim
				</td>
			</tr>
			<tr>
				<td>Pr�mios</td>
				<td>
					<input type="radio" name="awards" value="0" <?php if (! $this->_tpl_vars['serv']['awards']): ?>checked="checked"<?php endif; ?>> N�o<br>
					<input type="radio" name="awards" value="1" <?php if ($this->_tpl_vars['serv']['awards']): ?>checked="checked"<?php endif; ?>> Sim
				</td>
			</tr>
			
			<tr>
				<td colspan="2"><input type="submit" name="sub" value="zmieni�"/></td>
			</tr>
		</table>
	</form>
	
	<br>
	<a href="admin.php?screen=edit_serwer">&raquo; Powr�t</a>
	
<?php else: ?>

	<table class="vis">
		<tr>
			<th>Nome</th>
			<th>A senha para o administrador</th>
			<th>velocidade</th>
			<th>Terreno Defesa</th>
			<th>Moral</th>
			<th>Estilo nobreza</th>
			<th>Cobertura da nobreza</th>
			<th>Noite</th>
			<th>Jogadores de Recrutamento</th>
			<th>Pr�mios</th>
			<th>A��o</th>
		</tr>
		<?php $_from = $this->_tpl_vars['serwery']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['info']):
?>
			<tr>
				<td>Serwer <?php echo $this->_tpl_vars['id']; ?>
</td>
				<td><?php echo $this->_tpl_vars['info']['admin_pass']; ?>
</td>
				<td><?php echo $this->_tpl_vars['info']['speed']; ?>
</td>
				<td><?php echo $this->_tpl_vars['info']['reason_defense']; ?>
</td>
				<td><?php if ($this->_tpl_vars['info']['moral_activ']): ?>Tak<?php else: ?>Nie<?php endif; ?></td>
				<td><?php if ($this->_tpl_vars['info']['ag_style'] == 0): ?>Pa�ace<?php endif;  if ($this->_tpl_vars['info']['ag_style']): ?>Monety<?php endif; ?></td>
				<td><?php echo $this->_tpl_vars['info']['snob_range']; ?>
</td>
				<td><?php if ($this->_tpl_vars['info']['noc']): ?>Tak<?php else: ?>Nie<?php endif; ?></td>
				<td><?php if ($this->_tpl_vars['info']['create_users_and_villages']): ?>Tak<?php else: ?>Nie<?php endif; ?></td>
				<td><?php if ($this->_tpl_vars['info']['awards']): ?>Tak<?php else: ?>Nie<?php endif; ?></td>
				<td>
					<a href='javascript:ask("Czy naprawd� chcesz skasowa� serwer <?php echo $this->_tpl_vars['id']; ?>
","admin.php?screen=edit_serwer&action=del_serw&id=<?php echo $this->_tpl_vars['id']; ?>
")'/>Apagar</a>
					 / <a href="admin.php?screen=edit_serwer&action=edit_serw&id=<?php echo $this->_tpl_vars['id']; ?>
">Editar</a>
				</td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>

<?php endif; ?>