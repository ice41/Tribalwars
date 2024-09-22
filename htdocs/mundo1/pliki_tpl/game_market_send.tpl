<script src="/js/popup.js" type="text/javascript"/></script>

{if !empty($error)}
	<b><div style="color:red;">{$error}</div></b><br />
{/if}

<table class="vis">
	<tr>
		<th>Compradores: {$inside_dealers}/{$max_dealers}</th>
		<th>Capacidade máxima de transporte: {math equation="x * 1000" x=$inside_dealers}</th>
	</tr>
</table>

<form name="units" action="game.php?village={$village.id}&amp;screen=market&amp;try=confirm_send" method="post">
	<div id="inline_popup" style="display: none; position: absolute; clear: both;">
		<table collspacing="0" collpadding="0" class="{if $graphic == '1'}content-border{else}main{/if}">
			<tr>
				<th>
					<div id="inline_popup_menu" style="text-align: right;">
						<a href="javascript:inlinePopupClose()">fechar</a>
					</div>
				</th>
			</tr>
			<tr>
				<td>
					<h3>Metas</h3>
					<div>

						<div id="inline_popup_content" style="height: 340px; overflow: auto;">
							<img src="/ds_graphic/throbber.gif" alt="carregando" />
						</div>
					</div>
				</td>
			</tr>
		</table>
	</div>
	<table width="300">
		<tr>
			<td valign="top">
				<table class="vis" width="200">
					<tr>
						<th>Recurosos</th>
					</tr>
					<tr>
						<td>
							<img src="/ds_graphic/holz.png" title="Madeira" alt="" />
							<input name="wood" type="text" value="" size="5" />
							&nbsp;<a href="javascript:insertNumber(document.forms[0].wood, {$max.wood})">({$max.wood|format_number})</a>
						</td>
					</tr>
					<tr>
						<td>
							<img src="/ds_graphic/lehm.png" title="Argila" alt="" />
							<input name="stone" type="text" value="" size="5" />
							&nbsp;<a href="javascript:insertNumber(document.forms[0].stone, {$max.stone})">({$max.stone|format_number})</a>
						</td>
					</tr>
					<tr>
						<td>
							<img src="/ds_graphic/eisen.png" title="�elazo" alt="" />
							<input name="iron" type="text" value="" size="5" />
							&nbsp;<a href="javascript:insertNumber(document.forms[0].iron, {$max.iron})">({$max.iron|format_number})</a>
						</td>
					</tr>
				</table>
			</td>
			<td valign="top" align="center">
				<table class="vis" width="200">
					<tr>
						<th colspan="2">Cel</th>
					</tr>
					<tr>
						<td colspan="2">
							x: <input id="x" type="text" name="x" value="{$coords.x}" size="5" />
							y: <input id="y" type="text" name="y" value="{$coords.y}" size="5" />
						</td>
					</tr>
					<tr>
						<td valign="top">
							<a href="#" onclick="return inlinePopup(event, 'bookmark', 'ulubione.php', popup_options)">Favoritos</a><br>
							<a href="#" {if $user.villages > 1}onclick="return inlinePopup(event, 'bookmark', 'villages.php', popup_options)"{else}title="Deve possuir 2 aldeias"{/if}>Próprias</a><br>
						</td>
						<td valign="top">
							<a href="#" onclick="return inlinePopup(event, 'bookmark', 'history.php', popup_options)">Historico</a><br>
							<a href="#" onclick="insertNumId('x',{$last_command.x});insertNumId('y',{$last_command.y});">Anterior</a><br>
						</td>
					</tr>
				</table>
				
				<input type="submit" value="OK" style="font-size: 10pt;width:50px;" />
			</td>
		</tr>
	</table>
</form>

{literal}
	<script type="text/javascript">
	//<![CDATA[
		setImageTitles();

		var popup_options = {};
		
		$(document).ready(function(){
			UI.Draggable($('#inline_popup'));
		});
	//]]>
	</script>
{/literal}

{if count($own)>0 }
	<h3>W�asne transporty</h3>

	<table class="vis" width="700">
	<tr><th width="200">Objetivo</th><th width="180">quantidade</th><th>Compradores</th><th width="70">Duração</th><th width="100">Chegada</th><th width="70">Chegada em</th></tr>
		{foreach from=$own item=arr key=id}
			<tr>
			<td>{if $arr.type=='to'}Transporte do{else}De volta de{/if} <a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$arr.villageid}">{$arr.villagename}</a></td>
			
			<td>{if $arr.wood>0}<img src="/ds_graphic/holz.png" title="Madeira" alt="" />{$arr.wood} {/if}{if $arr.stone>0}<img src="/ds_graphic/lehm.png" title="Argila" alt="" />{$arr.stone} {/if}{if $arr.iron>0}<img src="/ds_graphic/eisen.png" title="Ferro" alt="" />{$arr.iron} {/if}</td>
		
			<td>{$arr.dealers}</td>
			<td>{$arr.duration}</td>
			<td>{$arr.arrival}</td>
			<td>{if $arr.arrival_in_sek<0}{$arr.arrival_in}{else}<span class="timer">{$arr.arrival_in}</span>{/if}</td>
			{if $arr.can_cancel}
				<td><a href="game.php?village={$village.id}&amp;screen=market&amp;mode=send&amp;action=cancel&amp;id={$id}&amp;h={$hkey}">parar</a></td>
			{/if}
			</tr>
		{/foreach}
	</table>
{/if}

{if count($others)>0 }
	<h3>Transportes chegando</h3>
{/if}
{if count($others)>0}
	<table class="vis" width="700">
	<tr><th width="160">Origem</th><th width="180">quantidade</th><th width="100">Chegada</th><th width="70">Chegada para</th></tr>
		{foreach from=$others item=arr key=id}
			<tr>
			<td>Transporte z <a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$arr.villageid}">{$arr.villagename}</a></td>
			{if $arr.see_ress}
				<td>{if $arr.wood>0}<img src="/ds_graphic/holz.png" title="Madeira" alt="" />{$arr.wood} {/if}{if $arr.stone>0}<img src="/ds_graphic/lehm.png" title="Argila" alt="" />{$arr.stone} {/if}{if $arr.iron>0}<img src="/ds_graphic/eisen.png" title="Ferro" alt="" />{$arr.iron} {/if}</td>
			{else}
				<td></td>
			{/if}
			<td>{$pl->pl_date($arr.arrival)}</td>
			<td>{if $arr.arrival_in_sek<0}{$arr.arrival_in}{else}<span class="timer">{$arr.arrival_in}</span>{/if}</td>
			</tr>
		{/foreach}
	</table>
{/if}