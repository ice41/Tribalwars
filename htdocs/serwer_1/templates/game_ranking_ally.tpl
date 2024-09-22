<table class="vis">
<tr>
	<th width="60">Ranga</th><th width="60">Nazwa</th><th width="120">Punkty 40 najlepszych graczy</th><th width="60">Punkty</th><th width="100">Cz�onkowie</th><th width="100">�rednia punkt�w na gracza</th><th width="60">Wioski</th><th width="100">�rednia punkt�w na wiosk�</th>
</tr>
	{foreach from=$ranks item=item key=id}
		<tr {$ranks.$id.mark}>
			<td>{$ranks.$id.rank}</td>
			<td><a href="game.php?village={$village.id}&screen=info_ally&id={$id}">{$ranks.$id.short}</a></td>
			<td>{$ranks.$id.best_points}</td>
			<td>{$ranks.$id.points}</td>
			<td>{$ranks.$id.members}</td>
			<td>{$ranks.$id.cuttrought_members|format_number}</td>
			<td>{$ranks.$id.villages}</td>
			<td>{$ranks.$id.cuttrought_villages|format_number}</td>
		</tr>
	{/foreach}
</table>

<table class="vis" width="100%"><tr>
{if $site!=1}
	<td align="center">
	<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally&amp;site={$site-1}">&lt;&lt;&lt; W g�r�</a></td>
{/if}
<td align="center">
<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally&amp;site={$site+1}">W d� &gt;&gt;&gt;</a></td>
</tr></table>
<table>
	<tr>
		<td>
		{include file="game_ranking_page_act.tpl" title=foo}
		</td>
	</tr>
</table>