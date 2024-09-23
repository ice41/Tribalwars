<h3>Editando mundos existentes.</h3>
<b></b>
<p>
Aqui você pode editar as opções padrão do servidor e também excluir um servidor, se necessário.

<br><br>
{if $show_edit_form}

	<form action="admin.php?screen=edit_serwer&action=edit_serw_form&id={$serv.id}" method="POST"/>
		<table class="vis">
			<tr>
				<th colspan="2">Painel de edição do mundo {$serv.id}</th>
			</tr>
			<tr>
				<td>Senha para <a href="pl{$serv.id}/admin">Admin</a>:</td>
				<td><input type="text" name="admin_pass" value="{$serv.admin_pass}"></td>
			</tr>
			<tr>
				<td>O nome das aldeias abandonadas:</td>
				<td><input type="text" name="left_name" value="{$serv.left_name}"></td>
			</tr>
			<tr>
				<td>Proteção inicial em minutos:</td>
				<td><input type="text" name="noob_protection" value="{$serv.noob_protection}"></td>
			</tr>
			<tr>
				<td>Seleção de direções:</td>
				<td>
					<input type="radio" name="village_choose_direction" value="0" {if !$serv.village_choose_direction}checked="checked"{/if}> Não<br>
					<input type="radio" name="village_choose_direction" value="1" {if $serv.village_choose_direction}checked="checked"{/if}> Sim
				</td>
			</tr>
			<tr>
				<td>Velocidade:</td>
				<td><input type="text" name="speed" value="{$serv.speed}"></td>
			</tr>
			<tr>
				<td>Criando tribos:</td>
				<td>
					<input type="radio" name="create_ally" value="0" {if !$serv.create_ally}checked="checked"{/if}> Não<br>
					<input type="radio" name="create_ally" value="1" {if $serv.create_ally}checked="checked"{/if}> Sim
				</td>
			</tr>
			<tr>
				<td>Sair da tribo:</td>
				<td>
					<input type="radio" name="leave_ally" value="0" {if !$serv.leave_ally}checked="checked"{/if}> Não<br>
					<input type="radio" name="leave_ally" value="1" {if $serv.leave_ally}checked="checked"{/if}> Sim
				</td>
			</tr>
			<tr>
				<td>A dissolução da tribo:</td>
				<td>
					<input type="radio" name="closed_ally" value="0" {if !$serv.closed_ally}checked="checked"{/if}> Não<br>
					<input type="radio" name="closed_ally" value="1" {if $serv.closed_ally}checked="checked"{/if}> Sim
				</td>
			</tr>
			<tr>
				<td>Defesa terrestre:</td>
				<td><input type="text" name="reason_defense" value="{$serv.reason_defense}"></td>
			</tr>
			<tr>
				<td>Moral:</td>
				<td>
					<input type="radio" name="moral_activ" value="0" {if !$serv.moral_activ}checked="checked"{/if}> Não<br>
					<input type="radio" name="moral_activ" value="1" {if $serv.moral_activ}checked="checked"{/if}> Sim
				</td>
			</tr>
			<tr>
				<td>Estilo de fabrico de nobreza:</td>
				<td>
					<input type="radio" name="ag_style" value="0" {if !$serv.ag_style}checked="checked"{/if}> Academias<br>
					<input type="radio" name="ag_style" value="1" {if $serv.ag_style}checked="checked"{/if}> Moedas
				</td>
			</tr>
			<tr>
				<td>O alcance da nobreza:</td>
				<td><input type="text" name="snob_range" value="{$serv.snob_range}"></td>
			</tr>
			<tr>
				<td>Noite:</td>
				<td>
					<input type="radio" name="noc" value="0" {if !$serv.noc}checked="checked"{/if}> Não<br>
					<input type="radio" name="noc" value="1" {if $serv.noc}checked="checked"{/if}> Sim
				</td>
			</tr>
			<tr>
				<td>Recrutamento de jogadores:</td>
				<td>
					<input type="radio" name="create_users_and_villages" value="0" {if !$serv.create_users_and_villages}checked="checked"{/if}> Não<br>
					<input type="radio" name="create_users_and_villages" value="1" {if $serv.create_users_and_villages}checked="checked"{/if}> Sim
				</td>
			</tr>
			<tr>
				<td>Decorações:</td>
				<td>
					<input type="radio" name="awards" value="0" {if !$serv.awards}checked="checked"{/if}> Não<br>
					<input type="radio" name="awards" value="1" {if $serv.awards}checked="checked"{/if}> Sim
				</td>
			</tr>
			<tr>
				<td>Igrejas</td>
				<td>
					<input type="radio" name="kosciol_i_mnisi" value="0" {if !$serv.kosciol_i_mnisi}checked="checked"{/if}> Não<br>
					<input type="radio" name="kosciol_i_mnisi" value="1" {if $serv.kosciol_i_mnisi}checked="checked"{/if}> Sim
				</td>
			</tr>			
			
			<tr>
				<td colspan="2"><center><input type="submit" name="sub" value="Validar Opções" class="btn btn-success btn-small"/></center></td>
			</tr>
		</table>
	</form>
	
	<br>
	<a href="admin.php?screen=edit_serwer">&raquo; Anuluj edycje</a>
	
{/if}


	<table class="vis">
		<tr>
			<th>Edycja</th>
			<th>Szybko��</th>
			<th>Morale</th>
			<th>Styl szlachty</th>
			<th>Zasi�g szlachty</th>
			<th>Noc</th>
			<th>Recrutar graczy</th>
			<th>Medalhas</th>
			<th>Akcje</th>
		</tr>
		{foreach from=$serwery key=id item=info}
			<tr>
				<td><a href="admin.php?screen=edit_serwer&action=edit_serw&id={$id}"><span class="world_button_active">Mundo {$id}</span></a></td>
				<td>{$info.speed}</td>
			<td>{if $info.moral_activ}<img src="ds_graphic/dots/green.png" alt="Tak">{else}<img src="ds_graphic/dots/red.png" alt="Nie">{/if}</td>
				<td>{if $info.ag_style == 0}<img src="ds_graphic/buildings/snob.png" alt="Pa�ace" />{/if}{if $info.ag_style}<img src="ds_graphic/gold.png" alt="Monety" />{/if}</td>
				<td>{$info.snob_range}</td>
				<td>{if $info.noc}<img src="ds_graphic/dots/green.png" alt="Tak">{else}<img src="ds_graphic/dots/red.png" alt="Nie">{/if}</td>
				<td>{if $info.create_users_and_villages}<img src="ds_graphic/dots/green.png" alt="Tak">{else}<img src="ds_graphic/dots/red.png" alt="Nie">{/if}</td>
				<td>{if $info.awards}<img src="ds_graphic/dots/green.png" alt="Tak">{else}<img src="ds_graphic/dots/red.png" alt="Nie">{/if}</td>
				<td>
					<a href='javascript:ask("Czy naprawd� chcesz usun�� �wiat {$id} na zawsze?","admin.php?screen=edit_serwer&action=del_serw&id={$id}")'/><img src="ds_graphic/delete.png" alt="Skasuj"></a>
					 
				</td>
			</tr>
		{/foreach}

	</table>








</table>