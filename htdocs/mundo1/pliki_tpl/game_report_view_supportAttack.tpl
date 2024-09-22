<table width="100%">
	<tr>
		<th width="60">Wspierany gracz:</th><th>
			{if $report.to_username==""}
				Aldeia abandonada
			{else}
				<a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$report.to_user}">{$report.to_username}</a>
			{/if}
		</th>
	</tr>
	<tr>
		<td>Origem das tropas:</td>
		<td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$report.to_village}">{$report.to_villagename} ({$report.to_x}|{$report.to_y})</a></th></tr>
<tr><td>Wioska:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$report.from_village}">{$report.from_villagename} ({$report.from_x}|{$report.from_y})</a></th></tr>
</table><br />

<h4>Unidades:</h4>
<table class="vis">
	<tr>
		<th></th>
		{foreach from=$cl_units->get_array("dbname") item=dbname key=name}
			<th width="35"><img src="/ds_graphic/unit/{$dbname}.png" title="{$name}" alt="" /></th>
		{/foreach}
	</tr>
	<tr><td>Quantidade:</td>{foreach from=$report_units.units_a item=num_units}{if $num_units>0}<td>{$num_units}</td>{else}<td class="hidden">0</td>{/if}{/foreach}</tr>

	<tr><td>Perdas:</td>{foreach from=$report_units.units_b item=num_units}{if $num_units>0}<td>{$num_units}</td>{else}<td class="hidden">0</td>{/if}{/foreach}</tr>
</table>