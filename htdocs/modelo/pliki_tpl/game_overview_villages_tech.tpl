{if $sekcja}
	<table class="vis" width="810">
		<tr>
			<td>
				{$sekcja_wiosek} 
			</td>
		</tr>
	</table>
{/if}

<table class="vis">
	<tr>
		<th>Aldeia</th>
		<th width="100">Pontos</th>
		<th>Pontos de pesquisa</td>
		{foreach from=$cl_techs->get_array("dbname") item=dbname}
			<th width="40"><img src="/ds_graphic/unit/unit_{$dbname}.png" title="{$cl_techs->get_name($dbname)}" alt="{$cl_techs->get_name($dbname)}"/></th>
		{/foreach}
		<th width="150">Pesquisar</th>
	</tr>
	{foreach from=$villages item=id key=arr_id}
		<tr {if $village.id == $villages.$arr_id.id}class="selected"{else}{if !$villages.$arr_id.parzysta_liczba}class="row_b"{else}class="row_a"{/if}{/if}>
			<td>
				{if $villages.$arr_id.attacks!=0}
					<img src="/ds_graphic/command/attack.png"> 
				{/if}
				{$bonus->get_bonus_mini_image($villages.$arr_id.bonus)}
				<a href="game.php?village={$arr_id}&screen=smith">
					{$villages.$arr_id.name} ({$villages.$arr_id.x}|{$villages.$arr_id.y}) K{$villages.$arr_id.continent}
				</a>
			</td>
			<td>
				{$id.points}
			</td>
			<td>
				<img src="/ds_graphic/overview/research.png" alt="Punkty bada�" title="Punkty bada�"/> 
				{$id.points_min}/{$id.points_max}
			</td>
			{foreach from=$cl_techs->get_array("dbname") item=dbname}
				{if $id.techs.$dbname > 0}
					<td>{$id.techs.$dbname}</td>
				{else}
					<td class="hidden">{$id.techs.$dbname}</td>
				{/if}
			{/foreach}
			<td>
				{foreach from=$id.research_list item=tech}
					<img src="/ds_graphic/unit/unit_{$tech}.png" title="{$cl_techs->get_name($tech)}" alt=""/>
				{/foreach}
			</td>
		</tr>
	{/foreach}
</table>