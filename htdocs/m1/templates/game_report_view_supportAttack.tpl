<table width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th width="60">Jogador:</th><th>
			{if $report.to_username==""}
				--
			{else}
				<a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$report.to_user}">{$report.to_username|entparse}</a>
			{/if}
		</th>
	</tr>
	<tr>
		<td>Aldeia:</td>
		<td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$report.to_village}">{$report.to_villagename} ({$report.to_x}|{$report.to_y})</a></th></tr>
<tr><td>Origem das tropas:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$report.from_village}">{$report.from_villagename} ({$report.from_x}|{$report.from_y})</a></th></tr>
</table><br />

<h4>Tropas:</h4>
<table class="vis" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th></th>
		{foreach from=$cl_units->get_array("dbname") item=dbname key=name}
			<th width="35"><div align="center"><img src="../graphic/unit/{$dbname}.png" title="{$name}" alt="" /></div></th>
		{/foreach}
	</tr>
	<tr><td>Tropas:</td>{foreach from=$report_units.units_a item=num_units}{if $num_units>0}<td align="center">{$num_units}</td>{else}<td class="hidden" align="center">0</td>{/if}{/foreach}</tr>

	<tr><td>Perdas:</td>{foreach from=$report_units.units_b item=num_units}{if $num_units>0}<td align="center">{$num_units}</td>{else}<td class="hidden" align="center">0</td>{/if}{/foreach}</tr>
</table>