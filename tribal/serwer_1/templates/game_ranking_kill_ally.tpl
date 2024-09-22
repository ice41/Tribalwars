{if empty($error)}
	<h3>Pokonani przeciwnicy</h3>
	
	<div>
		<table id="kill_player_ranking_table" class="vis" width="100%">
			<tbody>
				<tr>
					{foreach from=$modes_types key=type_name item=db_type}
						{if $db_type == $type}
							<td style="text-align: center;" class="selected" width="33%">
								<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_ally&amp;type={$db_type}">{$type_name}</a>
							</td>
						{else}
							<td style="text-align: center;" width="33%">
								<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_ally&amp;type={$db_type}">{$type_name}</a>
							</td>
						{/if}
					{/foreach}
				</tr>
			</tbody>
		</table>

		<table class="vis" width="100%">
			<tbody>
				<tr>
					<th width="15%">Ranking</th>
					<th width="60%">Nazwa plemienia</th>
					<th width="25%">Pokonany</th>
				</tr>
				{foreach from=$ally_rangs item=allyinfo}
					<tr{if $allyinfo.rang == $aktu} class="lit"{else}{if $allyinfo.rang == $from || ($allyinfo.ally == $ally && $ally != '-1')} class="lit2"{/if}{/if}>
						<td class="lit-item">
							{$allyinfo.rang}
						</td>
						<td class="lit-item">
							<a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$allyinfo.id}">
								{$allyinfo.name}
							</a>
						<td class="lit-item">{$allyinfo.score|format_number}</td>
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
								<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_ally&amp;type={$type}&page={$aktu_page_ra-1}">&lt;&lt;&lt; do góry</a>
							</td>
						{/if}
						<td align="center" width="50%">
							<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_ally&amp;type={$type}&page={$aktu_page_ra+1}">na dó³ &gt;&gt;&gt;</a>
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
				<form action="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_ally&type={$type}" method="post">
					Ranking: <input name="from" value="" size="6" type="text">
					<input value="OK" type="submit">
				</form>
			</td>
			<td style="padding-right: 10px;">
				<form action="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_ally&type={$type}" method="post">
					Szukaj: <input name="search" value="" size="20" type="text">
					<input value="OK" type="submit">
				</form>
			</td>
		</tr>
	</tbody>
</table>