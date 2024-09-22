<table class="vis">
<tr>
	<th width="60">Ranga</th>
	<th width="160">Nazwa</th>
	<th width="100">Pokonani</th>
</tr>
	{foreach from=$ranks item=item key=id}
		<tr {$ranks.$id.mark}>
			<td>{$ranks.$id.rang}</td>
			<td><a href="game.php?village={$village.id}&screen=info_player&id={$id}">{$ranks.$id.username}</a></td>
			<td>{$ranks.$id.killed_units}</td>
		</tr>
	{/foreach}
</table>

<table class="vis" width="100%"><tr>
{if $site!=1}
	<td align="center">
	<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_player&amp;type={$type}&amp;site={$site-1}">&lt;&lt;&lt; W górê</a></td>
{/if}
<td align="center">
<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_player&amp;type={$type}&amp;site={$site+1}">W dó³ &gt;&gt;&gt;</a></td>
</tr></table>