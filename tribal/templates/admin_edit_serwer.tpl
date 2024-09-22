<h3>Editar Servidores</h3>

Aqui pode editar as opções do servidor padrão, então também pode remover o servidor, se necessário.

<br><br>

{if $show_edit_form}

	<form action="admin.php?screen=edit_serwer&action=edit_serw_form&id={$serv.id}" method="POST"/>
		<table class="vis">
			<tr>
				<th colspan="2">Edição do servidor {$serv.id}</th>
			</tr>
			<tr>
				<td>A senha para o administrador</td>
				<td><input type="text" name="admin_pass" value="{$serv.admin_pass}"></td>
			</tr>
			<tr>
				<td>Velocidade</td>
				<td><input type="text" name="speed" value="{$serv.speed}"></td>
			</tr>
			<tr>
				<td>Terreno Defesa</td>
				<td><input type="text" name="reason_defense" value="{$serv.reason_defense}"></td>
			</tr>
			<tr>
				<td>Moral</td>
				<td>
					<input type="radio" name="moral_activ" value="0" {if !$serv.moral_activ}checked="checked"{/if}> Não<br>
					<input type="radio" name="moral_activ" value="1" {if $serv.moral_activ}checked="checked"{/if}> Sim
				</td>
			</tr>
			<tr>
				<td>Estilo Nobresa</td>
				<td>
					<input type="radio" name="ag_style" value="0" {if !$serv.ag_style}checked="checked"{/if}> Logar<br>
					<input type="radio" name="ag_style" value="1" {if $serv.ag_style}checked="checked"{/if}> Moedas
				</td>
			</tr>
			<tr>
				<td>Cobertura da nobreza</td>
				<td><input type="text" name="snob_range" value="{$serv.snob_range}"></td>
			</tr>
			<tr>
				<td>Noite</td>
				<td>
					<input type="radio" name="noc" value="0" {if !$serv.noc}checked="checked"{/if}> Não<br>
					<input type="radio" name="noc" value="1" {if $serv.noc}checked="checked"{/if}> Sim
				</td>
			</tr>
			<tr>
				<td>Jogadores de Recrutamento</td>
				<td>
					<input type="radio" name="create_users_and_villages" value="0" {if !$serv.create_users_and_villages}checked="checked"{/if}> Não<br>
					<input type="radio" name="create_users_and_villages" value="1" {if $serv.create_users_and_villages}checked="checked"{/if}> Sim
				</td>
			</tr>
			<tr>
				<td>Prêmios</td>
				<td>
					<input type="radio" name="awards" value="0" {if !$serv.awards}checked="checked"{/if}> Não<br>
					<input type="radio" name="awards" value="1" {if $serv.awards}checked="checked"{/if}> Sim
				</td>
			</tr>
			
			<tr>
				<td colspan="2"><input type="submit" name="sub" value="zmieniæ"/></td>
			</tr>
		</table>
	</form>
	
	<br>
	<a href="admin.php?screen=edit_serwer">&raquo; Powrót</a>
	
{else}

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
			<th>Prêmios</th>
			<th>Ação</th>
		</tr>
		{foreach from=$serwery key=id item=info}
			<tr>
				<td>Serwer {$id}</td>
				<td>{$info.admin_pass}</td>
				<td>{$info.speed}</td>
				<td>{$info.reason_defense}</td>
				<td>{if $info.moral_activ}Tak{else}Nie{/if}</td>
				<td>{if $info.ag_style == 0}Pa³ace{/if}{if $info.ag_style}Monety{/if}</td>
				<td>{$info.snob_range}</td>
				<td>{if $info.noc}Tak{else}Nie{/if}</td>
				<td>{if $info.create_users_and_villages}Tak{else}Nie{/if}</td>
				<td>{if $info.awards}Tak{else}Nie{/if}</td>
				<td>
					<a href='javascript:ask("Czy naprawdê chcesz skasowaæ serwer {$id}","admin.php?screen=edit_serwer&action=del_serw&id={$id}")'/>Apagar</a>
					 / <a href="admin.php?screen=edit_serwer&action=edit_serw&id={$id}">Editar</a>
				</td>
			</tr>
		{/foreach}
	</table>

{/if}