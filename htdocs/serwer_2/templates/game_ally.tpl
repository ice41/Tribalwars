{if $user.ally==-1}
	{include file="game_ally_no_ally.tpl"}
{else}
	{include file="game_ally_in_ally.tpl"}
{/if}