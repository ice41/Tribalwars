{if !empty($error)}
	<b><div style="color:red;">{$error}</div></b><br />
{/if}

<table class="vis">
<tr><th>Negustori: {$inside_dealers}/{$max_dealers}</th><th>Transport maxim: {math equation="x * 1000" x=$inside_dealers}</th></tr>
</table>

<form name="units" action="game.php?village={$village.id}&amp;screen=market&amp;try=confirm_send" method="post">

<table>
<tr><td valign="top">

<table class="vis">
<tr><th>Marfuri</th></tr>
<tr><td><img src="graphic/holz.png" title="Lemn" alt="" /><input name="wood" type="text" value="" size="5" />&nbsp;<a href="javascript:insertNumber(document.forms[0].wood, {$max.wood})">({$max.wood})</a></td></tr>

<tr><td><img src="graphic/lehm.png" title="Argil&#259;" alt="" /><input name="stone" type="text" value="" size="5" />&nbsp;<a href="javascript:insertNumber(document.forms[0].stone, {$max.stone})">({$max.stone})</a></td></tr>

<tr><td><img src="graphic/eisen.png" title="Fier" alt="" /><input name="iron" type="text" value="" size="5" />&nbsp;<a href="javascript:insertNumber(document.forms[0].iron, {$max.iron})">({$max.iron})</a></td></tr>

</table>

</td><td valign="top" align="center">

<table class="vis">
<tr><th colspan="1">&#354;int&#259;</th></tr>
<tr>
<td>
x: <input type="text" name="x" value="{$coords.x}" size="5" />
y: <input type="text" name="y" value="{$coords.y}" size="5" />
<a href="javascript:popup_scroll('targets.php?village={$village.id}', 520, 520);">&raquo;Alege satul</a>
</td>
</tr>

</table>

<input type="submit" value="&raquo; OK «" style="font-size: 10pt;" />

</td></tr>
</table>

</form>


{* Ausgehende Transporte *}
{if count($own)>0 }
	<h3>Transporturile dumneavoastr&#259;</h3>

	<table class="vis">
	<tr><th width="200">&#354;int&#259;</th><th width="80">Marfurile</th><th>Negustori</th><th width="70">Durat&#259;</th><th width="100">Sosire</th><th width="70">Sosire &#238;n</th></tr>
		{foreach from=$own item=arr key=id}
			<tr>
			<td>{if $arr.type=='to'}Transport pentru{else}&#206;ntoarcere{/if}<br /><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$arr.villageid}">{$arr.villagename}</a></td>
			
			<td>{if $arr.wood>0}<img src="graphic/holz.png" title="Lemn" alt="" />{$arr.wood} {/if}{if $arr.stone>0}<img src="graphic/lehm.png" title="Argil&#259;" alt="" />{$arr.stone} {/if}{if $arr.iron>0}<img src="graphic/eisen.png" title="Fier" alt="" />{$arr.iron} {/if}</td>
		
			<td>{$arr.dealers}</td>
			<td>{$arr.duration}</td>
			<td>{$arr.arrival}</td>
			<td>{if $arr.arrival_in_sek<0}{$arr.arrival_in}{else}<span class="timer">{$arr.arrival_in}</span>{/if}</td>
			{if $arr.can_cancel}
				<td><a href="game.php?village={$village.id}&amp;screen=market&amp;mode=send&amp;action=cancel&amp;id={$id}&amp;h={$hkey}">Anula&#355;i</a></td>
			{/if}
			</tr>
		{/foreach}
	</table>
{/if}


{* Ankommende Transporte *}
{if count($others)>0 }
	<h3>Transporturile sunt pe punctul de a sosi</h3>
{/if}
{if count($others)>0}
	<table class="vis">
	<tr><th width="160">Origine</th>{if $others_see_ress}<th width="80">Marfurile</th>{/if}<th width="100">Sosire</th><th width="70">Sosire &#238;n</th></tr>
		{foreach from=$others item=arr key=id}
			<tr>
			<td>Livrarea de<br /><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$arr.villageid}">{$arr.villagename}</a></td>
			{if $arr.see_ress}
				<td>{if $arr.wood>0}<img src="graphic/holz.png" title="Lemn" alt="" />{$arr.wood} {/if}{if $arr.stone>0}<img src="graphic/lehm.png" title="Argil&#259;" alt="" />{$arr.stone} {/if}{if $arr.iron>0}<img src="graphic/eisen.png" title="Fier" alt="" />{$arr.iron} {/if}</td>
			{else}
				{if $others_see_ress}
					<td></td>
				{/if}
			{/if}
			<td>{$arr.arrival}</td>
			<td>{if $arr.arrival_in_sek<0}{$arr.arrival_in}{else}<span class="timer">{$arr.arrival_in}</span>{/if}</td>
			</tr>
		{/foreach}
	</table>
{/if}