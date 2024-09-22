{if empty($error)}
	<div>				
		<table id="player_ranking_table" class="vis" width="100%">
			<tbody>
				<tr>
					<th width="60">Ranking</th>
					<th width="60">Nome da tribo</th>
					<th width="120">Pontos de 40 melhores jogadores</th>
					<th width="60">Número de pontos</th>
					<th width="100">Membros</th>
					<th width="100">média de pontos por jogador</th>
					<th width="60">Aldeias</th>
					<th width="100">Média de pontos por aldeia</th>
				</tr>

				{foreach from=$ally_rangs item=allyinfo}
					<tr{if $allyinfo.id == $user.ally} class="lit"{else}{if $allyinfo.rang == $from} class="lit2"{/if}{/if}>
						<td class="lit-item">{$allyinfo.rang}</td>
						<td class="lit-item"><a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$allyinfo.id}">{$allyinfo.short}</a></td>
						<td class="lit-item">{$allyinfo.points|format_number}</td>
						<td class="lit-item">{$allyinfo.best_points|format_number}</td>
						<td class="lit-item">{$allyinfo.members|format_number}</td>
						<td class="lit-item">{$allyinfo.sr_pkt_na_gracza|format_number}</td>
						<td class="lit-item">{$allyinfo.villages|format_number}</td>
						<td class="lit-item">{$allyinfo.sr_pkt_na_wioske|format_number}</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
		
		{if !$is_search}
			<table class="vis" width="100%">
				<tbody>
					<tr>
						{if $aktu_page_ra > 0}
							<td align="center" width="50%">
								<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally&amp;page={$aktu_page_ra-1}">&lt;&lt;&lt; Anterior</a>
							</td>
						{/if}
						<td align="center" width="50%">
							<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally&amp;page={$aktu_page_ra+1}">Proximo &gt;&gt;&gt;</a>
						</td>
					</tr>
				</tbody>
			</table>
		{/if}
	</div>
{/if}	

<table class="vis" width="100%">
	<tbody>
		<tr>
			<td style="padding-right: 10px;">
				<form action="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally" method="post">
					Ranking: <input name="from" value="" size="6" type="text">
					<input value="OK" type="submit">
				</form>
			</td>
			<td style="padding-right: 10px;">
				<form action="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally" method="post">
					Procurar: <input name="search" value="" size="20" type="text">
					<input value="OK" type="submit">
				</form>
			</td>
		</tr>
	</tbody>
</table>