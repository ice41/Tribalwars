<h3>Criar um novo servidor</h3>
{if !empty($err)}
	<font color="red">{$err}</font>
{/if}
{if !empty($sukces)}
	<font color="green">{$sukces}</font>
{/if}
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