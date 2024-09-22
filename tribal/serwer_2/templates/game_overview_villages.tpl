<table class="vis">
	<tr>
{foreach from=$links item=f_mode key=f_name}
	{if $f_mode==$mode}
		<td class="selected" width="130"><a href="game.php?village={$village.id}&screen=overview_villages&mode={$f_mode}">{$f_name}</a></td>
	{else}
		<td width="130"><a href="game.php?village={$village.id}&screen=overview_villages&mode={$f_mode}">{$f_name}</a></td>	
	{/if}
{/foreach}
	</tr>
</table>
<br />
{include file="groups_edit.tpl"}
{include file="groups_bar.tpl"}
<br>
{include file="game_overview_villages_$mode.tpl"}
{include file="villages_per_page.tpl"}