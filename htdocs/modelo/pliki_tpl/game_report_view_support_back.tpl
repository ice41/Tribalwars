<table width="100%" class="vis"> 
	<tr>
		<th>Proprietário do suporte:</th>
		<th>
			{if !empty($support_owner.username)}
				<a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$support_owner.uid}">{$support_owner.username}</a>
			{else}
				<b>Não existe</b>
			{/if}
		</th>
	</tr> 
	<tr>
		<td>Aldeia:</td>
		<td>
			<a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$support_owner.vid}">{$support_owner.villagename} ({$support_owner.x}|{$support_owner.y}) K{$support_owner.continent}</a>
		</td>
	</tr> 
	<tr>
		<th>Jogador apoiado:</th>
		<th>
			{if !empty($support_target.username)}
				<a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$support_target.uid}">{$support_target.username}</a>
			{else}
				<b>Não existe</b>
			{/if}
		</th>
	</tr> 
	<tr>
		<td>Aldeia:</td>
		<td>
			<a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$support_target.vid}">{$support_target.villagename} ({$support_target.x}|{$support_target.y}) K{$support_target.continent}</a>
		</td>
	</tr> 
</table>

<h4>Unidades:</h4> 
<table class="vis"> 
	<tr> 
	    {foreach from=$cl_units->get_array("dbname") item=dbname key=name}
			<th width="35"><img src="/ds_graphic/unit/{$dbname}.png" title="{$name}" alt="" /></th>
		{/foreach}
	</tr> 
	<tr> 
		{foreach from=$support_units item=num_units}
			{if $num_units>0}
				<td>{$num_units}</td>
			{else}
				<td class="hidden">0</td>
			{/if}
		{/foreach}
	</tr> 
</table>