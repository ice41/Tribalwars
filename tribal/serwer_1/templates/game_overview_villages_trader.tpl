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
			<th>Transport</th>
			<th>Pochodzenie</th>
			<th>Cel</th>
			<th>Na miejscu</th>
			<th>Na miejscu za</th>
			<th>Surowce</th>
			<th>Kupcy</th>
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
						<img src="/ds_graphic/holz.png" title="Drewno" alt="" />{$transport.wood} 
					{/if}
					{if $transport.stone>0}
						<img src="/ds_graphic/lehm.png" title="Glina" alt="" />{$transport.stone} 
					{/if}
					{if $transport.iron>0}
						<img src="/ds_graphic/eisen.png" title="¯elazo" alt="" />{$transport.iron} 
					{/if}
				</td>
				<td>{$transport.dealers}</td>
			</tr>
		{/foreach}
	</table>
{/if}