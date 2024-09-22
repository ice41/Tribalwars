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
		<th>Pontos</th>
		{foreach from=$cl_builds->get_array("dbname") item=dbname}
			<th width="30"><img src="/ds_graphic/buildings/{$dbname}.png" title="{$cl_builds->get_name($dbname)}" alt="{$cl_builds->get_name($dbname)}"/></th>
		{/foreach}
		<th>Edificio</th>
		<th>Demolição</th>
	</tr>
	{foreach from=$villages item=id key=arr_id}
		<tr {if $village.id == $villages.$arr_id.id}class="selected"{else}{if !$villages.$arr_id.parzysta_liczba}class="row_b"{else}class="row_a"{/if}{/if}>
			<td>
				{if $villages.$arr_id.attacks!=0}
					<img src="/ds_graphic/command/attack.png"> 
				{/if}
				{$bonus->get_bonus_mini_image($villages.$arr_id.bonus)}
				<a href="game.php?village={$arr_id}&screen=main">
					{$villages.$arr_id.name} ({$villages.$arr_id.x}|{$villages.$arr_id.y}) K{$villages.$arr_id.continent}
				</a>
			</td>
			<td>
				{$id.points}
			</td>
			{foreach from=$cl_builds->get_array("dbname") item=dbname}
				{if $id.buildings.$dbname > 0}
					<td>{$id.buildings.$dbname}</td>
				{else}
					<td class="hidden">{$id.buildings.$dbname}</td>
				{/if}
			{/foreach}
			<td>
				{foreach from=$id.build_list item=building}
					<img src="/ds_graphic/buildings/{$building}.png" title="{$cl_builds->get_name($building)}" alt=""/>
				{/foreach}
			</td>
			<td>
				{foreach from=$id.destroy_list item=building}
					<img src="/ds_graphic/buildings/{$building}.png" title="{$cl_builds->get_name($building)}" alt=""/>
				{/foreach}
			</td>
		</tr>
	{/foreach}
</table>