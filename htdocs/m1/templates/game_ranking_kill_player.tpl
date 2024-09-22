<h3>Oponentes derrotados</h3>
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<td {if att==$type}class="selected" {/if}align="center">
			<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_player&amp;type=att">{if att==$type}&raquo; {/if}Como atacante</a>
		</td>
		<td {if def==$type}class="selected" {/if}align="center">
			<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_player&amp;type=def">{if def==$type}&raquo; {/if}Como defensor</a>
		</td>
		<td {if all==$type}class="selected" {/if}align="center">
			<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_player&amp;type=all">{if all==$type}&raquo; {/if}Total</a>
		</td>
	</tr>
</table><br />
{if in_array($type,$allow_mods_kill)}
	{include file="game_ranking_kill_player_$type.tpl" title=foo}
{/if}