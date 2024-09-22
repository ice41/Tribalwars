{* Simulador *}
{if isset($simulate) && $simulate}
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th colspan="2">&nbsp;</th>
		{foreach from=$cl_units->get_array("dbname") item=dbname key=name}
		<th width="35"><img src="../graphic/unit/{$dbname}.png" title="{$name}" alt="" /></th>
		{/foreach}
	</tr>
	<tr>
		<td rowspan="2">Atacante</td>
		<td>Tropas:</td>
		{foreach from=$simulate_values.att item=num key=unitname}
			{if $num=="0"}
		<td class="hidden">0</td>
			{else}
		<td>{$num}</td>
			{/if}
		{/foreach}
	</tr>
	<tr>
		<td>Perdas:</td>
		{foreach from=$simulate_values.att_lose item=num key=unitname}
			{if $num=="0"}
		<td class="hidden">0</td>
			{else}
		<td>{$num}</td>
			{/if}
		{/foreach}
	</tr>
	<tr>
		<td style="display:none">&nbsp;</td>
	</tr>
	<tr>
		<td rowspan="2">Defensor</td>
		<td>Tropas:</td>
		{foreach from=$simulate_values.def item=num key=unitname}
			{if $num=="0"}
		<td class="hidden">0</td>
			{else}
		<td>{$num}</td>
			{/if}
		{/foreach}
	</tr>
	<tr>
		<td>Perdas:</td>
		{foreach from=$simulate_values.def_lose item=num key=unitname}
			{if $num=="0"}
		<td class="hidden">0</td>
			{else}
		<td>{$num}</td>
			{/if}
		{/foreach}
	</tr>
</table><br />
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
{if $simulate_values.others.def_wall != $simulate_values.others.new_wall}
	<tr><th>Danos dos arietes:</th><td align="center">Muralha demolida do n&iacute;vel <b>{$simulate_values.others.def_wall}</b> para o n&iacute;vel <b>{$simulate_values.others.new_wall}</b></td></tr>
{/if}
{if $simulate_values.others.def_building != $simulate_values.others.new_building}
	<tr><th>Danos das catapultas:</th><td align="center">Edif&iacute;cio demolido do n&iacute;vel <b>{$simulate_values.others.def_building}</b> para o n&iacute;vel <b>{$simulate_values.others.new_building}</b></td></tr>
{/if}
</table><br />
{/if}

<form action="game.php?village={$village.id}&amp;screen=place&amp;mode=sim" method="post" name="units">
	<input name="simulate" type="hidden" />
	<table width="100%" class="vis" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr>
			<th width="256">&nbsp;</th>
			<th width="200">Atacante</th>
			<th colspan="2">Defensor</th>
		</tr>
		<tr>
		  <th colspan="3">Tropas</th>
		</tr>
		{foreach from=$cl_units->get_array("dbname") item=dbname key=name}
		<tr>
			<td><a href="javascript:popup('popup_unit.php?unit={$dbname}, 520, 520)"><img src="../graphic/unit/{$dbname}.png" title="{$name}" alt="" /> {$name}</a></td>
			<td align="center"><input type="text" name="att_{$dbname}" size="5" value="{$values.att.$dbname}" /></td>
			<td align="center"><input type="text" name="def_{$dbname}" size="5" value="{$values.def.$dbname}" /></td>
		</tr>
		{/foreach}
		<tr>
			<td>Muralha</td>
			<td colspan="1">&nbsp;</td>
			<td width="65" colspan="2" align="center"><input type="text" name="def_wall" value="{$values.def_wall}" size="5" /></td>
		</tr>
		<tr>
			<td>N&iacute;vel do alvo das catapultas</td>
			<td colspan="1"></td><td colspan="2" align="center"><input type="text" name="def_building" value="{$values.def_building}" size="5" /></td>
		</tr>
		{if $moral_activ}
		<tr>
			<td>Moral</td>
			<td colspan="3" align="center"><input type="text" name="moral" value="{$values.moral}" size="5" id="moral" />%</td>
		</tr>
		{/if}
		<tr>
			<td>Sorte (de -25% at&eacute; +25%)</td>
			<td colspan="3" align="center"><input type="text" name="luck" value="{$values.luck}" size="5" />%</td>
		</tr>
		<tr><th colspan="3"><span style="float:right"><input type="submit" class="button" value="Simular" /></span></th></tr>
  </table>
</form>