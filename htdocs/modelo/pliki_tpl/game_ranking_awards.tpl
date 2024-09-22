{if empty($error)}
	<div>				
		<table id="player_ranking_table" class="vis" width="100%">
			<tbody>
				<tr>
					<th width="60">Ranking</th>
					<th width="180">Nome</th>
					<th width="100">Tribo</th>
					<th width="60">Pontos</th>
					<th>Odznaczenia</th>
				</tr>
				{foreach from=$user_award_rangs item=userinfo}
					<tr{if $userinfo.rang == $aktu} class="lit"{else}{if $userinfo.rang == $from || ($userinfo.ally == $ally && $ally != '-1')} class="lit2"{/if}{/if}>
						<td class="lit-item">
							{$userinfo.rang}
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
							{$userinfo.awards}
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
								<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=awards&amp;page={$aktu_page_ra-1}">&lt;&lt;&lt; Anterior</a>
							</td>
						{/if}
						<td align="center" width="50%">
							<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=awards&amp;page={$aktu_page_ra+1}">Proximo &gt;&gt;&gt;</a>
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
				<form action="game.php?village={$village.id}&amp;screen=ranking&amp;mode=awards" method="post">
					Ranking: <input name="from" value="" size="6" type="text">
					<input value="OK" type="submit">
				</form>
			</td>
			<td style="padding-right: 10px;">
				<form action="game.php?village={$village.id}&amp;screen=ranking&amp;mode=awards" method="post">
					Procurar: <input name="search" value="" size="20" type="text">
					<input value="OK" type="submit">
				</form>
			</td>
		</tr>
	</tbody>
</table>
