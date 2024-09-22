{if $smarty.get.mode == 'rename'}
	{assign var='mode' value='rename'}
{/if}
<table width="98%" align="center" class="vis" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-top:5px;">
	<tr>
		{foreach from=$links item=f_mode key=f_name}
			{if $f_name=='Kombiniert'}
				{assign var='f_name' value='Combinado'}
			{/if}
			{if $f_name=='Produktion'}
				{assign var='f_name' value='Produ&ccedil;&atilde;o'}
			{/if}
			{if $f_name=='Truppen'}
				{assign var='f_name' value='Tropas'}
			{/if}
			{if $f_name=='Befehle'}
				{assign var='f_name' value='Comandos'}
			{/if}
			{if $f_name=='Eintreffend'}
				{assign var='f_name' value='Chegando'}
			{/if}
			<td {if $f_mode==$mode}class="selected"{/if} width="100" align="center"><a href="game.php?village={$village.id}&screen=overview_villages&mode={$f_mode}">{if $f_mode==$mode}&raquo; {/if}{$f_name}</a></td>
		{/foreach}
			<td {if $mode == 'rename'}class="selected"{/if} width="100" align="center"><a href="game.php?village={$village.id}&screen=overview_villages&mode=rename">{if $mode == 'rename'}&raquo; {/if}Renoemar aldeias</a></td>
	</tr>
</table><br />
{include file="game_overview_villages_$mode.tpl"}