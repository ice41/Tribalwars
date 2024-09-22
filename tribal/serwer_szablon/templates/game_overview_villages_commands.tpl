{if $sekcja_rozkazy}
	<table class="vis">
		<tr>
			<td>
				{$sekcja_rozkazy_content} 
			</td>
		</tr>
	</table>
{/if}
{if count($my_movements) > 0}
<table class="vis">
<tr><th>Rozkaz</th><th>Pochodzenie</th><th>Na miejscu</th>
		{foreach from=$unit key=dbname item=name}
			<th width="30"><img src="/ds_graphic/unit/{$dbname}.png" title="{$name}" alt="" /></th>
		{/foreach}
</tr>
		{foreach from=$my_movements item=array}
			<tr {if $array.parzysta_liczba} class="row_b"{else} class="row_a"{/if}>
				<td><a href="game.php?village={$village.id}&amp;screen=info_command&amp;id={$array.id}&amp;type=own">{$array.message}</a></td>
				<td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$array.homevillageid}">{$array.homevillagename}</a></td>
				<td>{$pl->format_date($array.arrival_in)}</td>
				{foreach from=$array.units item=num}
					{if $num==0}
						<td class="hidden">0</td>
					{else}
						<td>{$num}</td>
					{/if}
				{/foreach}
			</tr>
		{/foreach}	
</table>
{else}
<br>
W tej chwili nie ma ¿adnych ruchów twoich wojsk
{/if}