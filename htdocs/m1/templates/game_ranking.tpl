<br />
		<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
			<tr><th>Submenu</th></tr>
			{foreach from=$links item=f_mode key=f_name}
				{if $f_name=='Stämme'}
					{assign var='f_name' value='Tribos'}
				{/if}
				{if $f_name=='Spieler'}
					{assign var='f_name' value='Jogadores'}
				{/if}
				{if $f_name=='Besiegte Gegner'}
					{assign var='f_name' value='Oponentes derrotados'}
				{/if}
			<tr><td {if $f_mode==$mode}class="selected"{/if}><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode={$f_mode}">{if $f_mode==$mode}&raquo; {/if}{$f_name}</a></td></tr>
			{/foreach}
			<tr><td {if $mode=='hives'}class="selected"{/if}><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=hives">{if $mode=='hives'}&raquo; {/if}Saqueadores</a></td></tr>
		</table>
	</td>
	<td width="80%">
		<table width="100%" align="center">
			<tr>
				<td>
					<h2>{if $mode=="ally"}Ranking de tribos{elseif $mode=="player"}Ranking de jogadores{elseif $mode=="kill_player"}Ranking de O.D.{elseif $mode=="hives"}Top Saqueadores{/if}</h2>
					{if in_array($mode,$allow_mods)}
						{include file="game_ranking_$mode.tpl" title=foo}
					{/if}
					{if $mode == 'hives'}
						{include file="game_ranking_hives.tpl" title=foo}
					{/if}
				</td>
			</tr>
		</table>
	</td>