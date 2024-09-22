{if empty($error)}
	<div>				
		<table id="player_ranking_table" class="vis" width="100%">
			<tbody>
				<tr>
					<th width="60">Ranking</th>
					<th width="60">Nazwa plemienia</th>
					<th width="120">Punkty 40 najlepszych graczy</th>
					<th width="60">Liczba punktów</th>
					<th width="100">Cz³onkowie</th>
					<th width="100">Œrednia punktów na gracza</th>
					<th width="60">Wioski</th>
					<th width="100">Œrednia punktów na wioskê</th>
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
								<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally&amp;page={$aktu_page_ra-1}">&lt;&lt;&lt; do góry</a>
							</td>
						{/if}
						<td align="center" width="50%">
							<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally&amp;page={$aktu_page_ra+1}">na dó³ &gt;&gt;&gt;</a>
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
					Szukaj: <input name="search" value="" size="20" type="text">
					<input value="OK" type="submit">
				</form>
			</td>
		</tr>
	</tbody>
</table>