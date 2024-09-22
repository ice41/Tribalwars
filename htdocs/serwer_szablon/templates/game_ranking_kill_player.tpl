{php}
$this->_tpl_vars['pl_trans'] = array("att" => "Jako napastnik","def" => "Jako obroñca","all" => "Razem");
{/php}
<h3>Pokonani przeciwnicy</h3>

<table class="vis">
	<tr>
		{foreach from=$links_kill item=f_mode key=f_name}
			{if $f_mode==$type}
				<td class="selected" width="100">
					<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_player&amp;type={$f_mode}">{$pl_trans.$f_mode}</a>
				</td>
			{else}
				<td width="100">
					<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_player&amp;type={$f_mode}">{$pl_trans.$f_mode}</a>
				</td>
			{/if}
		{/foreach}
	</tr>
</table>

{if in_array($type,$allow_mods_kill)}
	{include file="game_ranking_kill_player_$type.tpl" title=foo}
{/if}

<table>
	<tr>
		<td>
		{include file="game_ranking_page_act.tpl" title=foo}
		</td>
	</tr>
</table>