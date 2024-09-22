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
		<th></th>
		
		{foreach from=$unit item=name key=dbname}
			<th width="35"><img src="/ds_graphic/unit/{$dbname}.png" title="{$name}" alt="" /></th>
		{/foreach}
	
		<th>Akcja</th>
	</tr>
	
	{foreach from=$villages item=id key=arr_id}
		<tr>
			<td rowspan="3" valign="top">
				<a href="game.php?village={$arr_id}&screen=overview">{$villages.$arr_id.name} ({$villages.$arr_id.x}|{$villages.$arr_id.y}) K{$villages.$arr_id.continent}</a>
			</td>
			<td {if $graphic == '1'}class="selected"{/if}>w�asne</td>
			
			{foreach from=$unit item=name key=dbname}
				{if $id.own_units.$dbname==0}
						<td class="hidden{if $graphic == '1'} selected{/if}">{$id.own_units.$dbname}</td>
				{else}
						<td {if $graphic == '1'}class="selected"{/if}>{$id.own_units.$dbname}</td>
				{/if}
			{/foreach}
			
			<td><a href="game.php?village={$arr_id}&amp;screen=place&amp;">Ordem</a></td>
		</tr>
		<tr class="units_there">
			<td>tudo</td>
			
			{foreach from=$unit item=name key=dbname}
				{if $id.all_units.$dbname==0}
						<td class="hidden">{$id.all_units.$dbname}</td>
				{else}
						<td>{$id.all_units.$dbname}</td>
				{/if}
			{/foreach}
		
			<td><a href="game.php?village={$arr_id}&amp;screen=place&amp;mode=units">Tropas</a></td>
		</tr>
		<tr class="units_away">
			<td>ppara a aldeia</td>
			
			{foreach from=$unit item=name key=dbname}
				{if $id.outward.$dbname==0}
						<td class="hidden">{$id.outward.$dbname}</td>
				{else}
						<td>{$id.outward.$dbname}</td>
				{/if}
			{/foreach}
			<td></td>
		</tr>
	{/foreach}
	
</table>
