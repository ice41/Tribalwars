{if !empty($error)}
	<b><div style="color:red;">{$error}</div></b><br />
{/if}

<table class="vis">
<tr><th>Kupcy: {$inside_dealers}/{$max_dealers}</th><th>Maksymalna pojemnoœæ transportu: {math equation="x * 1000" x=$inside_dealers}</th></tr>
</table>

<form name="units" action="game.php?village={$village.id}&amp;screen=market&amp;try=confirm_send" method="post">

<table width="300">
<tr><td valign="top">

<table class="vis" width="150">
<tr><th>surowce</th></tr>
<tr><td><img src="graphic/holz.png" title="Drewno" alt="" /><input name="wood" type="text" value="" size="5" />&nbsp;<a href="javascript:insertNumber(document.forms[0].wood, {$max.wood})">({$max.wood})</a></td></tr>

<tr><td><img src="graphic/lehm.png" title="Glina" alt="" /><input name="stone" type="text" value="" size="5" />&nbsp;<a href="javascript:insertNumber(document.forms[0].stone, {$max.stone})">({$max.stone})</a></td></tr>

<tr><td><img src="graphic/eisen.png" title="¯elazo" alt="" /><input name="iron" type="text" value="" size="5" />&nbsp;<a href="javascript:insertNumber(document.forms[0].iron, {$max.iron})">({$max.iron})</a></td></tr>

</table>

</td><td valign="top" align="center">

<table class="vis" width="150">
<tr><th colspan="1">Cel</th></tr>
<tr>
<td>
x: <input type="text" name="x" value="{$coords.x}" size="5" />
y: <input type="text" name="y" value="{$coords.y}" size="5" />
{if count($villages)>0}
	<select name="target" size="1" onchange="insertCoord(document.forms[0], this)">
		<option>-Wybierz wioskê-</option>
		{foreach from=$villages key=id item=value}
			<option value="{$villages.$id.x}|{$villages.$id.y}">{$villages.$id.name} ({$villages.$id.x}|{$villages.$id.y}) {$villages.$id.continent}</option>
		{/foreach}
	</select>
{/if}
</td>
</tr>

</table>

<input type="submit" value="OK" style="font-size: 10pt;width:50px;" />

</td></tr>
</table>

</form>


{* Ausgehende Transporte *}
{if count($own)>0 }
	<h3>W³asne transporty</h3>

	<table class="vis" width="600">
	<tr><th width="200">Cel</th><th width="80">Iloœæ</th><th>Kupcy</th><th width="70">Trwanie</th><th width="100">Przybycie</th><th width="70">Przybycie za</th></tr>
		{foreach from=$own item=arr key=id}
			<tr>
			<td>{if $arr.type=='to'}Transport do{else}Powrót z{/if} <a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$arr.villageid}">{$arr.villagename}</a></td>
			
			<td>{if $arr.wood>0}<img src="graphic/holz.png" title="Drewno" alt="" />{$arr.wood} {/if}{if $arr.stone>0}<img src="graphic/lehm.png" title="Glina" alt="" />{$arr.stone} {/if}{if $arr.iron>0}<img src="graphic/eisen.png" title="¯elazo" alt="" />{$arr.iron} {/if}</td>
		
			<td>{$arr.dealers}</td>
			<td>{$arr.duration}</td>
			<td>{$pl->pl_date($arr.arrival)}</td>
			<td>{if $arr.arrival_in_sek<0}{$arr.arrival_in}{else}<span class="timer">{$arr.arrival_in}</span>{/if}</td>
			{if $arr.can_cancel}
				<td><a href="game.php?village={$village.id}&amp;screen=market&amp;mode=send&amp;action=cancel&amp;id={$id}&amp;h={$hkey}">przerwij</a></td>
			{/if}
			</tr>
		{/foreach}
	</table>
{/if}


{* Ankommende Transporte *}
{if count($others)>0 }
	<h3>Przybywaj¹ce transporty</h3>
{/if}
{if count($others)>0}
	<table class="vis" width="600">
	<tr><th width="160">Pochodzenie</th>{if $others_see_ress}<th width="80">Iloœæ</th>{/if}<th width="100">Przybycie</th><th width="70">Przybycie za</th></tr>
		{foreach from=$others item=arr key=id}
			<tr>
			<td>Transport z <a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$arr.villageid}">{$arr.villagename}</a></td>
			{if $arr.see_ress}
				<td>{if $arr.wood>0}<img src="graphic/holz.png" title="Drewno" alt="" />{$arr.wood} {/if}{if $arr.stone>0}<img src="graphic/lehm.png" title="Glina" alt="" />{$arr.stone} {/if}{if $arr.iron>0}<img src="graphic/eisen.png" title="¯elazo" alt="" />{$arr.iron} {/if}</td>
			{else}
				{if $others_see_ress}
					<td></td>
				{/if}
			{/if}
			<td>{$pl->pl_date($arr.arrival)}</td>
			<td>{if $arr.arrival_in_sek<0}{$arr.arrival_in}{else}<span class="timer">{$arr.arrival_in}</span>{/if}</td>
			</tr>
		{/foreach}
	</table>
{/if}