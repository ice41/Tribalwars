<table class="vis">
<tr><th width="60">Ranga</th><th width="180">Nazwa</th><th width="100">Plemi�</th>
<th width="60">Punkty</th><th>Wioski</th><th>�rednia punkt�w na wiosk�</th></tr>
	{foreach from=$ranks item=item key=id}
		<tr {$ranks.$id.mark}>
			<td>{$ranks.$id.rang}</td>
			<td><a href="game.php?village={$village.id}&screen=info_player&id={$id}">{$ranks.$id.username}</a></td>
			<td><a href="game.php?village={$village.id}&screen=info_ally&id={$ranks.$id.ally}">{$ranks.$id.allyname}</a></td>
			<td>{$ranks.$id.points}</td>
			<td>{$ranks.$id.villages}</td>
			<td>{$ranks.$id.cuttrought}</td>
		</tr>
	{/foreach}
</table>

<table class="vis" width="100%"><tr>
{if $site!=1}
	<td align="center">
	<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=player&amp;site={$site-1}">&lt;&lt;&lt; w g�r�</a></td>
{/if}
<td align="center">
<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=player&amp;site={$site+1}">w d� &gt;&gt;&gt;</a></td>
</tr></table>
<table>
	<tr>
		<td>
		{include file="game_ranking_page_act.tpl" title=foo}
		</td>
	</tr>
</table>