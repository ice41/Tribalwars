{if empty($error)}
	<h3>Ranking graczy na kontynencie {$RA_continent}</h3>

	<div>

		<table id="con_player_ranking_table" class="vis" width="100%">
			<tbody>
				<tr>
					<th width="60">Ranking</th>
					<th width="160">Nome</th>
					<th width="60">Tribo</th>
					<th width="100">Pontos</th>
					<th width="60">Aldeias</th>
					<th width="60">Aldeias em geral</th>
				</tr>
				{foreach from=$continent_rangs key=rang item=userinfo}
					<tr{if $rang == $aktu} class="lit"{else}{if $rang == $from || ($userinfo.ally == $ally && $ally != '-1')} class="lit2"{/if}{/if}>
						<td class="lit-item">
							{$rang}
						</td>
						<td class="lit-item">
							<a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$userinfo.id}">
								{$userinfo.username}
							</a>
						</td>
						<td class="lit-item">
							{if $userinfo.ally != '-1'}
								<a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$userinfo.ally}">
									{$userinfo.allyshort}
								</a>
							{/if}
						</td>
						<td class="lit-item">
							{$userinfo.points|format_number}
						</td>
						<td class="lit-item">
							{$userinfo.villages_con|format_number}
						</td>
						<td class="lit-item">
							{$userinfo.villages|format_number}
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
								<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=con_player&con={$RA_continent}&page={$aktu_page_ra-1}">&lt;&lt;&lt; Anterior</a>
							</td>
						{/if}
						<td align="center" width="50%">
							<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=con_player&con={$RA_continent}&page={$aktu_page_ra+1}">Proximo &gt;&gt;&gt;</a>
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
				<form action="game.php?village={$village.id}&amp;screen=ranking&amp;mode=con_player" method="post">
					Continente: <input name="continent" value="" size="2" type="text">
					<input value="OK" type="submit">
				</form>
			</td>
			<td style="padding-right: 10px;">
				<form action="game.php?village={$village.id}&amp;screen=ranking&amp;mode=con_player&con={$RA_continent}" method="post">
					Ranking: <input name="from" value="" size="6" type="text">
					<input value="OK" type="submit">
				</form>
			</td>
			<td style="padding-right: 10px;">
				<form action="game.php?village={$village.id}&amp;screen=ranking&amp;mode=con_player&con={$RA_continent}" method="post">
					Procurar: <input name="search" value="" size="20" type="text">
					<input value="OK" type="submit">
				</form>
			</td>
		</tr>
	</tbody>
</table>