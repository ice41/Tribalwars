{if $sekcja_transporty}
	<table class="vis">
		<tr>
			<td>
				{$sekcja_transporty_content} 
			</td>
		</tr>
	</table>
{/if}

{if count($user_transports) > 0}
	<table class="vis"/>
		<tr>
			<th>Transporte</th>
			<th>Origem</th>
			<th>Objetivo</th>
			<th>No local</th>
			<th>No local às</th>
			<th>Recursos</th>
			<th>Compradores</th>
		</tr>
		{foreach from=$user_transports item=transport}
			<tr {if !$transport.parzysta_liczba}class="row_b"{else}class="row_a"{/if}>
				<td>{$transport.message}</td>
				<td>
					{if $transport.from_userid != '-1'}
						<a href="game.php?village={$village.id}&screen=info_player&id={$transport.from_userid}"/>{$transport.from_username}</a>
					{/if}
				</td>
				<td>
					<a href="game.php?village={$village.id}&screen=info_village&id={$transport.to_village}"/>{$transport.to_villagename}</a>
				</td>
				<td>{$pl->format_date($transport.end_time)}</td>
				<td>
					<span class="timer">{$transport.arrival_in|format_time}</span>
				</td>
				<td>
					{if $transport.wood>0}
						<img src="/ds_graphic/holz.png" title="Madeira" alt="" />{$transport.wood} 
					{/if}
					{if $transport.stone>0}
						<img src="/ds_graphic/lehm.png" title="Argila" alt="" />{$transport.stone} 
					{/if}
					{if $transport.iron>0}
						<img src="/ds_graphic/eisen.png" title="�elazo" alt="" />{$transport.iron} 
					{/if}
				</td>
				<td>{$transport.dealers}</td>
			</tr>
		{/foreach}
	</table>
{/if}