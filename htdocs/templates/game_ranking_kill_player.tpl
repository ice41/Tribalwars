<h3>Inamici &#238;nvin&#351;i</h3>

<table class="vis">
	<tr>
		{foreach from=$links_kill item=f_mode key=f_name}

         {if $f_name=='als Angreifer'}
            {assign var='f_name' value='Ca agresor'}
         {/if}
         {if $f_name=='als Verteidiger'}
            {assign var='f_name' value='Ca ap&#259;r&#259;tor'}
         {/if}
         {if $f_name=='Insgesamt'}
            {assign var='f_name' value='&#206;n total'}
         {/if}


			{if $f_mode==$type}
				<td class="selected" width="100">
					<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_player&amp;type={$f_mode}">{$f_name}</a>
				</td>
			{else}
				<td width="100">
					<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_player&amp;type={$f_mode}">{$f_name}</a>
				</td>
			{/if}
		{/foreach}
	</tr>
</table>

{if in_array($type,$allow_mods_kill)}
	{include file="game_ranking_kill_player_$type.tpl" title=foo}
{/if}