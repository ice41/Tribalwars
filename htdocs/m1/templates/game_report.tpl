<br />
	<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><th>Submenu</th></tr>
		<tr><td{if $mode=='all'} class="selected"{/if}><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=all">{if $mode=='all'}&raquo; {/if}Todos os relat&oacute;rios</a></td></tr>
		<tr><td{if $mode=='attack'} class="selected"{/if}><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=attack">{if $mode=='attack'}&raquo; {/if}Ataque</a></td></tr>
		<tr><td{if $mode=='defense'} class="selected"{/if}><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=defense">{if $mode=='defense'}&raquo; {/if}Defesa</a></td></tr>
		<tr><td{if $mode=='support'} class="selected"{/if}><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=support">{if $mode=='support'}&raquo; {/if}Apoio</a></td></tr>
		<tr><td{if $mode=='trade'} class="selected"{/if}><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=trade">{if $mode=='trade'}&raquo; {/if}Mercado</a></td></tr>
		<tr><td{if $mode=='other'} class="selected"{/if}><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=other">{if $mode=='other'}&raquo; {/if}Outros</a></td></tr>
		<tr><td{if $mode=='public_reports'} class="selected"{/if}><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=public_reports">{if $mode=='public_reports'}&raquo; {/if}Relat&oacute;rios publicados</a></td></tr>
	</table>
</td>
<td width="80%">
	<h2>Relat&oacute;rios</h2>
	<table width="100%">
		<tr>
			<td valign="top" width="100%">
			{php}if($_GET['mode'] == 'public_reports'){{/php}
				{include file="game_report_public_reports.tpl"}
			{php}}else{{/php}
				{include file="game_report_$do.tpl"}
			{php}}{/php}
			</td>
		</tr>
	</table>
</td>