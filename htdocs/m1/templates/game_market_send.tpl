{if !empty($error)}
<div class="error">{$error|replace:"Nicht gen�gend Rohstoffe vorhanden!":"Nenhum recursso foi selecionado."|replace:"Ungültiges Ziel":"Insira as coordenadas."}</div>
{/if}
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th>Mercadores: {$inside_dealers}/{$max_dealers}</th>
		<th>Transporte m&aacute;ximo: {math equation="x * 1000" x=$inside_dealers}</th>
	</tr>
</table><br />
<form name="units" action="game.php?village={$village.id}&amp;screen=market&amp;try=confirm_send" method="post">
	<table width="100%">
		<tr>
			<td valign="top" width="50%">
				<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
					<tr><th colspan="3">Recursos</th></tr>
					<tr><td align="center"><img src="../graphic/icons/wood.png" title="Madeira" alt="" /></td><td align="center"><input name="wood" type="text" value="" size="20" /></td><td align="center"><a href="javascript:insertNumber(document.forms[0].wood, {$max.wood})">({$max.wood})</a></td></tr>

					<tr><td align="center"><img src="../graphic/icons/stone.png" title="Argila" alt="" /></td><td align="center"><input name="stone" type="text" value="" size="20" /></td><td align="center"><a href="javascript:insertNumber(document.forms[0].stone, {$max.stone})">({$max.stone})</a></td></tr>

					<tr><td align="center"><img src="../graphic/icons/iron.png" title="Ferro" alt="" /></td><td align="center"><input name="iron" type="text" value="" size="20" /></td><td align="center"><a href="javascript:insertNumber(document.forms[0].iron, {$max.iron})">({$max.iron})</a></td></tr>
				</table>
			</td>
			<td valign="top" align="center" width="50%">
				<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
					<tr><th colspan="2">Destino</th></tr>
					<tr>
						<td align="center">
							X: <input type="text" name="x" id="inputx" value="{$coords.x}" size="5" maxlength="3" onkeyup="xProcess('inputx', 'inputy')" />
							Y: <input type="text" name="y" id="inputy" value="{$coords.y}" size="5" maxlength="3" />
						</td>
						<td rowspan="2" align="center"><input type="submit" value="Ok" class="button" /></td>
					</tr>
					<tr>
						<td align="center">
							{if count($villages) > 0}
							<select name="target" size="1" onchange="insertCoord(document.forms[0], this)" style="text-align:center;">
								<option>-> Selecione <-</option>
								{foreach from=$villages key=id item=value}
								<option value="{$villages.$id.x}|{$villages.$id.y}">{$villages.$id.name} ({$villages.$id.x}|{$villages.$id.y}) K{$villages.$id.continent}</option>
								{/foreach}
							</select>
							{/if}
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</form>
{* SEUS TRANSPORTES *}
{if count($own) > 0}
<h3>Seus transportes</h3>
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th width="180">Destino</th>
		<th width="80">Recursos</th>
		<th width="65">Mercadores</th>
		<th width="70">Dura&ccedil;&atilde;o</th>
		<th width="100">Chegada</th>
		<th width="70">Chegada em</th>
	</tr>
	{foreach from=$own item=arr key=id}
	<tr>
		<td>{if $arr.type=='to'}Transporte &agrave; {else}Retorno de {/if}<br /><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$arr.villageid}">{$arr.villagename} K55</a></td>
		<td>{if $arr.wood > 0}<img src="../graphic/icons/wood.png" title="Madeira" alt="" />{$arr.wood} {/if}{if $arr.stone > 0}<img src="../graphic/icons/stone.png" title="Argila" alt="" />{$arr.stone} {/if}{if $arr.iron > 0}<img src="../graphic/icons/iron.png" title="Ferro" alt="" />{$arr.iron} {/if}</td>
		<td>{$arr.dealers}</td>
		<td>{$arr.duration}</td>
		<td>{$arr.arrival|replace:"heute um":"hoje &agrave;s"|replace:"Uhr":""|replace:"am":"em"|replace:"um":"&agrave;s"|replace:"morgen":"amanh&atilde;"}</td>
		<td>{if $arr.arrival_in_sek < 0}{$arr.arrival_in+1}{else}<span class="timer">{$arr.arrival_in}</span>{/if}</td>
		{if $arr.can_cancel}
		<td><a href="game.php?village={$village.id}&amp;screen=market&amp;mode=send&amp;action=cancel&amp;id={$id}&amp;h={$hkey}">Cancelar</a></td>
		{/if}
	</tr>
	{/foreach}
</table>
{/if}

{* OUTROS TRANSPORTES *}
{if count($others) > 0}
<h3>Transportes em chegada</h3>
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th width="160">Origem</th>
		{if $others_see_ress}
		<th width="80">Mercadores</th>
		{/if}
		<th width="100">Chegada</th>
		<th width="70">Chegada em</th>
	</tr>
		{foreach from=$others item=arr key=id}
			<tr>
			<td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$arr.villageid}">{$arr.villagename}</a></td>
			{if $arr.see_ress}
			<td>{if $arr.wood > 0}<img src="../graphic/icons/wood.png" title="Madeira" alt="" />{$arr.wood} {/if}{if $arr.stone > 0}<img src="../graphic/icons/stone.png" title="Argila" alt="" />{$arr.stone} {/if}{if $arr.iron > 0}<img src="../graphic/icons/iron.png" title="Ferro" alt="" />{$arr.iron} {/if}</td>
			{else}
				{if $others_see_ress}
			<td></td>
				{/if}
			{/if}
			<td>{$arr.arrival|replace:"heute um":"hoje &agrave;s"|replace:"Uhr":""|replace:"am":"em"|replace:"um":"&agrave;s"|replace:"morgen":"amanh&atilde;"}</td>
			<td>{if $arr.arrival_in_sek < 0}{$arr.arrival_in}{else}<span class="timer">{$arr.arrival_in}</span>{/if}</td>
			</tr>
		{/foreach}
	</table>
{/if}