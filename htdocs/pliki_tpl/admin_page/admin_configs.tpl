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
					<input type="radio" name="aktywacja" value="true" {if $aktywacja == 'true'}checked="checked"{/if}> Sim<br>
					<input type="radio" name="aktywacja" value="false" {if $aktywacja == 'false'}checked="checked"{/if}> Não
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

				
			{$if $edycja_mysql == 1}{if $user.id != $id_p_a}<tr>
				<td>Você não tem permissão de edição do MySql!</td>
				
			</tr>{elseif $user.id == $id_p_a}<tr>
				<td>Host do banco de dados</td>
				<td>
					<input type="text" name="host" value="{$host}">
				</td>
			</tr>

						<tr>
				<td>usuário do banco de dados</td>
				<td>
					<input type="text" name="user" value="{$user_db}">
				</td>
			</tr>
			<tr>
				<td>Senha do banco de dados</td>
				<td>
					<input type="text" name="passy" value="{$passy}">
				</td>
			</tr>
			<tr>
				<td>tabela de banco de dados</td>
				<td>
					<input type="text" name="tabela" value="{$tabela}">
				</td>
			</tr>
			
			
			<tr>
				<td colspan="2"><center><input type="submit" name="sub" value="Salvar dados do banco de dados MySql" class="btn btn-success btn-small"/></center></td>	
			</tr></form>	{/if}{if $edycja_mysql == 2 AND $user.id != $id_p_a}<tr>
				<td>Host do banco de dados</td>
				<td>
					<input type="text" name="host" value="{$host}">
				</td>
			</tr>

						<tr>
				<td>usuário do banco de dados</td>
				<td>
					<input type="text" name="user" value="{$user_db}">
				</td>
			</tr>
			<tr>
				<td>Senha do banco de dados</td>
				<td>
					<input type="text" name="passy" value="{$passy}">
				</td>
			</tr>
			<tr>
				<td>tabela de banco de dados</td>
				<td>
					<input type="text" name="tabela" value="{$tabela}">
				</td>
			</tr>
			
			
			<tr>
				<td colspan="2"><center><input type="submit" name="sub" value="Salvar dados do banco de dados MySql" class="btn btn-success btn-small"/></center></td>	
			</tr></form>{/if}
			{if $user.id == $id_p_a}
			<form action="admin.php?screen=configs&akcja=edycja_bazy" method="POST"/>
						<tr>
				<th colspan="2">Editar configurações principais (somente você e os técnicos podem editar essas configurações!):</th>
			</tr>



			<tr>
				<td>Quem pode editar dados MySql:</td>
				<td>
					<input type="radio" name="db" value="1" {if $edycja_mysql == '1'}checked="checked"{/if}> Apenas eu<br>
					<input type="radio" name="db" value="2" {if $edycja_mysql == '2'}checked="checked"{/if}> Existem dois administradores
				</td>
			</tr>
			
			
			<tr>
				<td colspan="2"><center><input type="submit" name="sub" value="Salvar" class="btn btn-success btn-small"/></center></td>	
			</tr>
			</form>
			{/if}
			
		</table>

	
	

	








