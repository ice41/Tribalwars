<table width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;"> 
<tr><th width="60">Jogador:</th><th>
	{if !empty($report.from_username)}
		<a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$report.from_user}">{$report.from_username|entparse}</a>
	{else}
		<b>--</b>
	{/if}
</th></tr> 
<tr><td>Origem:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$report.fromto_village}">{$report.from_villagename} ({$report.from_x}|{$report.from_y})</a></th></tr> 
 
<tr><th>Jogador:</th><th>
	{if !empty($report.to_username)}
		<a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$report.to_user}">{$report.to_username|entparse}</a></th></tr> 
	{else}
		<b>**</b>
	{/if}
<tr><td>Destino:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$report.to_village}">{$report.to_villagename} ({$report.to_x}|{$report.to_y})</a></th></tr> 
 </table>
           
<h4>Tropas:</h4> 
<table class="vis" align="center" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;"> 
	<tr> 
	    {foreach from=$cl_units->get_array("dbname") item=dbname key=name}
			<th width="35"><div align="center"><img src="../graphic/unit/{$dbname}.png" title="{$name}" alt="" /></div></th>
		{/foreach}
	</tr> 
	<tr> 
		{foreach from=$support_units item=num_units}
			{if $num_units>0}
				<td align="center">{$num_units}</td>
			{else}
				<td class="hidden" align="center">0</td>
			{/if}
		{/foreach}
	</tr> 
</table>