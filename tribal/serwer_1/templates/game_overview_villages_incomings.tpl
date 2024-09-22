{if $sekcja_rozkazy}
	<table class="vis">
		<tr>
			<td>
				{$sekcja_rozkazy_content} 
			</td>
		</tr>
	</table>
{/if}
{if count($other_movements) > 0}
<table class="vis">
<tr><th>Rozkaz</th><th>Cel</th><th>Pochodzenie</th><th>Na miejscu</th><th>Na miejscu za</th>
</tr>
	{foreach from=$other_movements item=array}
		<tr{if $array.parzysta_liczba} class="row_b"{else} class="row_a"{/if}>
		<td>
		
		<a href="game.php?village={$village.id}&amp;screen=info_command&amp;id={$array.id}&amp;type=other">{$array.message}</a>
		
		</td>
		<td><a href="game.php?village={$array.to_village}&ampscreen=overview">{$array.to_villagename}</a></td>
		<td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$array.send_from_user}">{$array.send_from_username}</a></td>
		<td>{$pl->format_date($array.end_time)}</td>
		<td><span class="timer">{$array.arrival_in|format_time}</span></td>
		</tr>
	{/foreach}
</table>
{else}
<br>
W tej chwili nikt nie wysy³a do ciebie ¿adnych wojsk.
{/if}