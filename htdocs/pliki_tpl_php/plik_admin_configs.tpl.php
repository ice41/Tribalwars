<?php /* Wersja Smarty_class 2.6.26 PrzerÃ³bka By Bartekst221, Plik stworzony 2022-11-28 16:36:15
         Wersja PHP pliku pliki_tpl/admin_page/admin_configs.tpl */ ?>
<h3>Editando as configurações principais</h3>
<b></b>
<p>
Aqui você pode editar as configurações principais do seu servidor, a edição do banco de dados só é recomendada para criar um servidor de tribos <font color="green">online</font>!

<br><br>



		<table class="vis">
			<form action="admin.php?screen=configs&akcja=aktywuj" method="POST"/>
			<tr>
				<th colspan="2">Editar configurações básicas:</th>
			</tr>



			<tr>
				<td>Ativação de conta necessária:</td>
				<td>
					<input type="radio" name="aktywacja" value="true" <?php if ($this->_tpl_vars['aktywacja'] == 'true'): ?>checked="checked"<?php endif; ?>> Sim<br>
					<input type="radio" name="aktywacja" value="false" <?php if ($this->_tpl_vars['aktywacja'] == 'false'): ?>checked="checked"<?php endif; ?>> Não
				</td>
			</tr>
			
			
			<tr>
				<td colspan="2"><center><input type="submit" name="sub" value="Zapisz" class="btn btn-success btn-small"/></center></td>	
			</tr></form>
			
			
					<form action="admin.php?screen=configs&akcja=baza" method="POST"/>
			<tr>
				<th colspan="2">Editar banco de dados MySql - conexão</th>
			</tr>
			         <tr>
			    <td colspan="2">
			    A edição desses dados é recomendada apenas ao configurar um servidor! A edição por pessoas inexperientes resulta em erros no mecanismo!<a href="pma">PhpMyAdmin</a>
				
				</td>
			            </tr>

				
			<?php echo $this->_tpl_vars['if']; ?>
<?php if ($this->_tpl_vars['user']['id'] != $this->_tpl_vars['id_p_a']): ?><tr>
				<td>Você não tem permissão de edição do MySql!</td>
				
			</tr><?php elseif ($this->_tpl_vars['user']['id'] == $this->_tpl_vars['id_p_a']): ?><tr>
				<td>Host do banco de dados</td>
				<td>
					<input type="text" name="host" value="<?php echo $this->_tpl_vars['host']; ?>
">
				</td>
			</tr>

						<tr>
				<td>usuário do banco de dados</td>
				<td>
					<input type="text" name="user" value="<?php echo $this->_tpl_vars['user_db']; ?>
">
				</td>
			</tr>
			<tr>
				<td>Senha do banco de dados</td>
				<td>
					<input type="text" name="passy" value="<?php echo $this->_tpl_vars['passy']; ?>
">
				</td>
			</tr>
			<tr>
				<td>tabela de banco de dados</td>
				<td>
					<input type="text" name="tabela" value="<?php echo $this->_tpl_vars['tabela']; ?>
">
				</td>
			</tr>
			
			
			<tr>
				<td colspan="2"><center><input type="submit" name="sub" value="Salvar dados do banco de dados MySql" class="btn btn-success btn-small"/></center></td>	
			</tr></form>	<?php endif; ?><?php if ($this->_tpl_vars['edycja_mysql'] == 2 && $this->_tpl_vars['user']['id'] != $this->_tpl_vars['id_p_a']): ?><tr>
				<td>Host do banco de dados</td>
				<td>
					<input type="text" name="host" value="<?php echo $this->_tpl_vars['host']; ?>
">
				</td>
			</tr>

						<tr>
				<td>usuário do banco de dados</td>
				<td>
					<input type="text" name="user" value="<?php echo $this->_tpl_vars['user_db']; ?>
">
				</td>
			</tr>
			<tr>
				<td>Senha do banco de dados</td>
				<td>
					<input type="text" name="passy" value="<?php echo $this->_tpl_vars['passy']; ?>
">
				</td>
			</tr>
			<tr>
				<td>tabela de banco de dados</td>
				<td>
					<input type="text" name="tabela" value="<?php echo $this->_tpl_vars['tabela']; ?>
">
				</td>
			</tr>
			
			
			<tr>
				<td colspan="2"><center><input type="submit" name="sub" value="Salvar dados do banco de dados MySql" class="btn btn-success btn-small"/></center></td>	
			</tr></form><?php endif; ?>
			<?php if ($this->_tpl_vars['user']['id'] == $this->_tpl_vars['id_p_a']): ?>
			<form action="admin.php?screen=configs&akcja=edycja_bazy" method="POST"/>
						<tr>
				<th colspan="2">Editar configurações principais (somente você e os técnicos podem editar essas configurações!):</th>
			</tr>



			<tr>
				<td>Quem pode editar dados MySql:</td>
				<td>
					<input type="radio" name="db" value="1" <?php if ($this->_tpl_vars['edycja_mysql'] == '1'): ?>checked="checked"<?php endif; ?>> Apenas eu<br>
					<input type="radio" name="db" value="2" <?php if ($this->_tpl_vars['edycja_mysql'] == '2'): ?>checked="checked"<?php endif; ?>> Existem dois administradores
				</td>
			</tr>
			
			
			<tr>
				<td colspan="2"><center><input type="submit" name="sub" value="Salvar" class="btn btn-success btn-small"/></center></td>	
			</tr>
			</form>
			<?php endif; ?>
			
		</table>

	
	

	







