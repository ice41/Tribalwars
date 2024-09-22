<br />
	<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><th>Submenu</th></tr>
	{foreach from=$links item=f_mode key=f_name}
		<tr>
			<td {if $f_mode==$mode}class="selected"{/if} width="120">
				<a href="game.php?village={$village.id}&amp;screen=market&amp;mode={$f_mode}">{if $f_mode==$mode}&raquo; {/if}{$f_name|replace:"Rohstoffe verschicken":"Enviar recursos"|replace:"Eigene Angebote":"Suas ofertas"|replace:"Fremde Angebote":"Ofertas alheias"|replace:"Händlerstatus":"Status dos mercadores"}</a>
			</td>
		</tr>
	{/foreach}
	</table>
</td>
<td width="80%">
	<table width="100%">
		<tr>
			<td><img src="../graphic/build/market.jpg" title="Mercado" alt="" /></td>
			<td>
				<h2>Mercado ({$village.market|nivel})</h2>
				{$description}
			</td>
		</tr>
	</table>
	{if $show_build}
	<table width="100%">
		<tr>
			<td valign="top" width="100%">
			{if in_array($mode,$allow_mods)}
				{include file="game_market_$mode.tpl" title=foo}
			{/if}
			</td>
		</tr>
	</table>
	{/if}
</td>