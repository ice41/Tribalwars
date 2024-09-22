<div class="vis_item" align="center">
	{foreach from=$user_grocusto_all item=group}
		{if $user.aktu_group === $group}
			<strong class="group_tooltip">&gt;{if $group == 'all'}Todas{else}{$group}{/if}&lt; </strong>
		{else}
			<a class="group_tooltip" href="game.php?village={$village.id}&amp;screen={$screen}&amp;mode={$mode}&amp;action=change_group&amp;group={php} echo base64_encode($this->_tpl_vars['group']);{/php}&h={$hkey}">[{if $group == 'all'}Todas{else}{$group}{/if}]</a>
		{/if}
	{/foreach}
</div>
