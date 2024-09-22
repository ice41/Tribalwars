{if $command_exists}
	<h2>{$mov.message}</h2>
	{if $type=='own'}
		<table class="vis" width="400">
		<tr>
			<th colspan="2">Rozkaz</th>
		</tr>
		<tr><td>Cel:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$mov.to_village}">{$mov.to_villagename} ({$mov.to_x}|{$mov.to_y})</a></td></tr>
		<tr><td>Gracz:</td><td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$mov.to_userid}">{$mov.to_username}</a></td></tr>
		<tr><td>Trwanie:</td><td>{$mov.duration|format_time}</td></tr>
		<tr><td>Przybycie:</td><td>{$mov.arrival|format_date}</td></tr>
		<tr><td>Przybycie za:</td><td><span class="timer">{$mov.arrival_in|format_time}</span></td></tr>
		<tr><td>Pochodzenie:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$mov.from_village}">{$mov.from_villagename} ({$mov.from_x}|{$mov.from_y})</a></td></tr>
		
			
		<tr><td colspan="2"><a href="game.php?village={$village.id}&amp;&amp;screen=place">&raquo; Plac</a></td></tr>
		{if $mov.cancel}
			<tr><td colspan="2"><a href="game.php?village={$village.id}&screen=place&action=cancel&id={$mov.id}&h={$hkey}">&raquo; przerwij</a></td></tr>
		{/if}	
			
		</table><br />
		
		
		<table class="vis">
		<tr>
			{foreach from=$cl_units->get_array("dbname") item=dbname key=name}
				<th width="50"><img src="/ds_graphic/unit/{$dbname}.png" title="{$name}" alt="" /></th>
			{/foreach}
		</tr>
		<tr>
			{foreach from=$mov.units item=num_units}{if $num_units>0}<td>{$num_units|format_number}</td>{else}<td class="hidden">0</td>{/if}{/foreach}
		</tr>
		</table>
		{if $mov.wood!=0 || $mov.stone!=0 || $mov.iron!=0}
			<table class="vis"><tr>
			<td>£upy:</td><td>{if $mov.wood>0}<img src="/ds_graphic/holz.png" title="Drewno" alt="" />{$mov.wood|format_number} {/if}{if $mov.stone>0}<img src="/ds_graphic/lehm.png" title="Glina" alt="" />{$mov.stone|format_number} {/if}{if $mov.iron>0}<img src="/ds_graphic/eisen.png" title="¯elazo" alt="" />{$mov.iron|format_number} {/if}</td>
			</tr></table>
		{/if}
	{else}
		<table class="vis" width="300">
		<tr><th colspan="2">Rozkaz</th></tr>
		<tr><td>Cel:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$mov.to_village}">{$mov.to_villagename} ({$mov.to_x}|{$mov.to_y})</a></td></tr>
		<tr><td>Pochodzenie:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$mov.from_village}">{$mov.from_villagename} ({$mov.from_x}|{$mov.from_y})</a></td></tr>
		<tr><td>Gracz:</td><td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$mov.from_userid}">{$mov.from_username}</a></td></tr>
		<tr><td>Przybycie:</td><td>{$mov.arrival|format_date}</td></tr>
		<tr><td>Przybycie za:</td><td><span class="timer">{$mov.arrival_in|format_time}</span></td></tr>
		</table>	
	{/if}
{else}
	<span class="error">Komenda nie istnieje</span>
{/if}