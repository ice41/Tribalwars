<table class="vis">
	<tr>
{if $smarty.get.mode == 'groups'}
  {assign var='mode' value='groups'}
{/if}
	{if combined==$mode}
		<td class="selected" width="100"><a href="game.php?village={$village.id}&screen=overview_villages&mode=combined">Combinat</a></td>
	{else}
		<td width="100"><a href="game.php?village={$village.id}&screen=overview_villages&mode=combined">Combinat</a></td>	
	{/if}
		{if prod==$mode}
		<td class="selected" width="100"><a href="game.php?village={$village.id}&screen=overview_villages&mode=prod">Productie</a></td>
	{else}
		<td width="100"><a href="game.php?village={$village.id}&screen=overview_villages&mode=prod">Productie</a></td>	
	{/if}
		{if units==$mode}
		<td class="selected" width="100"><a href="game.php?village={$village.id}&screen=overview_villages&mode=units">Trupe</a></td>
	{else}
		<td width="100"><a href="game.php?village={$village.id}&screen=overview_villages&mode=units">Trupe</a></td>	
	{/if}
		{if commands==$mode}
		<td class="selected" width="100"><a href="game.php?village={$village.id}&screen=overview_villages&mode=commands">Comenzi</a></td>
	{else}
		<td width="100"><a href="game.php?village={$village.id}&screen=overview_villages&mode=commands">Comenzi</a></td>	
	{/if}
		{if incomings==$mode}
		<td class="selected" width="100"><a href="game.php?village={$village.id}&screen=overview_villages&mode=incomings">Sosiri</a></td>
	{else}
		<td width="100"><a href="game.php?village={$village.id}&screen=overview_villages&mode=incomings">Sosiri</a></td>	
	{/if}
                {if incomings==$mode}
		<td class="selected" width="100"><a href="game.php?village={$village.id}&screen=overview_villages&mode=groups">Grupe</a></td>
	{else}
		<td width="100"><a href="game.php?village={$village.id}&screen=overview_villages&mode=groups">Grupe</a></td>	
	{/if}
	</tr>
</table>
<br />
{include file="game_overview_villages_$mode.tpl"}