{if empty($error)}
	<h3>Ranking plemion na kontynencie {$RA_continent}</h3>

	<div>

		<table id="con_player_ranking_table" class="vis" width="100%">
			<tbody>
				<tr>
					<th width="60">Ranking</th>
					<th width="160">Nazwa plemienia</th>
					<th width="100">Punkty</th>
					<th width="60">Wioski</th>
				</tr>
				{foreach from=$continent_rangs key=rang item=allyinfo}
					<tr{if $allyinfo.id == $ally} class="lit"{/if}>
						<td class="lit-item">
							{$rang}
						</td>
						<td class="lit-item">
							<a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$allyinfo.id}">
								{$allyinfo.short}
							</a>
						</td>
						<td class="lit-item">
							{$allyinfo.points|format_number}
						</td>
						<td class="lit-item">
							{$allyinfo.villages|format_number}
						</td>
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
								<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=con_ally&con={$RA_continent}&page={$aktu_page_ra-1}">&lt;&lt;&lt; do góry</a>
							</td>
						{/if}
						<td align="center" width="50%">
							<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=con_ally&con={$RA_continent}&page={$aktu_page_ra+1}">na dó³ &gt;&gt;&gt;</a>
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
				<form action="game.php?village={$village.id}&amp;screen=ranking&amp;mode=con_ally" method="post">
					Kontynent: <input name="continent" value="" size="2" type="text">
					<input value="OK" type="submit">
				</form>
			</td>
			<td style="padding-right: 10px;">
				<form action="game.php?village={$village.id}&amp;screen=ranking&amp;mode=con_ally&con={$RA_continent}" method="post">
					Ranking: <input name="from" value="" size="6" type="text">
					<input value="OK" type="submit">
				</form>
			</td>
			<td style="padding-right: 10px;">
				<form action="game.php?village={$village.id}&amp;screen=ranking&amp;mode=con_ally&con={$RA_continent}" method="post">
					Szukaj: <input name="search" value="" size="20" type="text">
					<input value="OK" type="submit">
				</form>
			</td>
		</tr>
	</tbody>
</table>