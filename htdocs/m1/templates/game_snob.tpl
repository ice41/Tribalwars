<br />
	<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><th>Centros de recrutamento</th></tr>
		<tr><td><a href="game.php?village={$village.id}&screen=barracks">Quartel</a></td></tr>
		<tr><td><a href="game.php?village={$village.id}&screen=stable">Estab&uacute;lo</a></td></tr>
		<tr><td><a href="game.php?village={$village.id}&screen=garage">Oficina</a></td></tr>
		<tr><td class="selected"><a href="game.php?village={$village.id}&screen=snob">&raquo; Academia</a></td></tr>
	</table><br />
	<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><th>Academia</th></tr>
		<tr><td {if empty($mode)}class="selected"{/if}><a href="game.php?village={$village.id}&screen=snob">{if empty($mode)}&raquo; {/if}Formar nobres</a></td></tr>
		<tr><td {if $mode=='coins'}class="selected"{/if}><a href="game.php?village={$village.id}&screen=snob&mode=coins">{if $mode=='coins'}&raquo; {/if}Cunhar moedas</a></td></tr>
	</table>
</td>
<td width="80%">
	<table>
		<tr>
			<td><img src="../graphic/build/{$dbname}.jpg" title="Academia" alt="" /></td>
			<td>
				<h2>{$buildname} ({$village.$dbname|nivel})</h2>
				{$description}
			</td>
		</tr>
	</table>
{if $mode == "coins"}
	{include file="game_snob_coins.tpl" title=foo}
{else}
{if $show_build}
	{if count($recruit_units)>0}
	<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr>
			<th width="250">Unidade</th>
			<th width="220">Dura&ccedil;&atilde;o</th>
			<th>T&eacute;rmino</th>
			<th width="100">Cancelar *</th>
		</tr>
		{foreach from=$recruit_units key=key item=value}
	    <tr {if $recruit_units.$key.lit}class="lit"{/if}>
			<td>{$recruit_units.$key.num_unit} {$cl_units->get_name($recruit_units.$key.unit)}</td>
			{if $recruit_units.$key.lit && $recruit_units.$key.countdown>-1}
			<td align="center"><span class="timer">{$recruit_units.$key.countdown+1|format_time}</span></td>
			{else}
			<td align="center">{$recruit_units.$key.countdown+1|format_time}</td>
			{/if}
			<td align="center">{$recruit_units.$key.time_finished|format_date|replace:"heute um":"hoje &agrave;s"|replace:"Uhr":""|replace:"am":"em"|replace:"um":"&agrave;s"|replace:"morgen":"amanh&atilde;"}</td>
			<td align="center"><a href="game.php?t=129107&amp;village={$village.id}&amp;screen={$dbname}&amp;action=cancel&amp;id={$key}&amp;h={$hkey}">cancelar</a></td>
		</tr>
		{/foreach}
	</table>
	<div style="font-size: 7pt;">* (Apenas 90% dos recursos ser&atilde;o devolvidos!)</div><br />
	{/if}

	{if !empty($error)}
	<div class="error">{$error|replace:"Adelshof muss ausgebaut werden.":"N&atilde;o &eacute; possivel formar outros nobres!"}</div><br />
	{/if}
	<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr>
			<th>Unidade</th>
			<th><center><img src="../graphic/icons/wood.png"></center></th>
			<th><center><img src="../graphic/icons/stone.png"></center></th>
			<th><center><img src="../graphic/icons/iron.png"></center></th>
			<th><center><img src="../graphic/icons/farm.png"></center></th>
			<th>Dura&ccedil;&atilde;o</th>
			<th width="150">Na Aldeia/Total</th>
			<th width="300">Formar</th>
		</tr>
		{foreach from=$units key=unit_dbname item=name}
		<tr>
			<td width="250"><a href="javascript:popup('popup_unit.php?unit={$unit_dbname}', 520, 520)"> <img src="../graphic/unit/{$unit_dbname}.png" title="{$name}" alt="" /> {$name}</a></td>
			<td align="center">{$cl_units->get_woodprice($unit_dbname)}</td>
			<td align="center">{$cl_units->get_stoneprice($unit_dbname)}</td>
			<td align="center">{$cl_units->get_ironprice($unit_dbname)}</td>
			<td align="center">{$cl_units->get_bhprice($unit_dbname)}</td>
			<td align="center" width="150">{$cl_units->get_time($village.$dbname,$unit_dbname)+1|format_time}</td>
			<td align="center">{$units_in_village.$unit_dbname}/{$units_all.$unit_dbname}</td>
			{$cl_units->check_needed($unit_dbname,$village)}
			{if $cl_units->last_error==not_tec}
		    <td class="inactive" align="center">Unidade n&atilde;o pesquisada.</td>
			{elseif $cl_units->last_error==not_needed}
		    <td class="inactive" align="center">Requerimentos n&atilde;o atingidos.</td>
			{elseif $cl_units->last_error==build_ah}
		    <td class="inactive" align="center">Academia n&atilde;o pode prover mais unidades.</td>
			{elseif $cl_units->last_error==not_enough_ress}
		    <td class="inactive" align="center">N&atilde;o h&aacute; recursos suficientes.</td>
			{elseif $cl_units->last_error==not_enough_bh}
		    <td class="inactive" align="center">A fazenda n&atilde;o pode mais prover mais unidades.</td>
			{else}
				{if $ag_style==2}
					{if  $nextsnob-$all_snob-$snob_recruit < '1'} 
			<td class="inactive" align="center">Moedas insuficientes!</td>
					{else}
			<td align="center" width="250"><a href="game.php?village={$village.id}&screen=snob&recruit=snob&h={$hkey}">Treinar unidade</a></td>
					{/if}
				{else}
			<td align="center" width="250"><a href="game.php?village={$village.id}&amp;screen=snob&amp;action=train_snob&amp;h={$hkey}">Treinar unidade</a></td>
				{/if}
			{/if}
		</tr>
		{/foreach}
	</table><br />
	{if $ag_style == 0}
	<h4>Quantidade de Nobres que ainda podem ser formados nesta aldeia</h4>
	<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><td>N&iacute;vel da Academia:</td><td>{$village.snob}</td></tr>
		<tr><td>- N&uacute;mero de aldeias conquistadas:</td><td>{$village.control_villages}</td></tr>
		<tr><td>- Nobres existentes nesta aldeia:</td><td>{$village.recruited_snobs}</td></tr>
		<tr><th>Ainda podem ser produzidos:</th><th>{$village.snob-$village.control_villages-$village.recruited_snobs}</th></tr>
	</table>
	{elseif $ag_style == 1}
	<h4>Quantidade de Nobres que ainda podem ser formados</h4>
	<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><td>Limite de Nobres:</td><td>{$village.snob_info.stage_snobs}</td></tr>
		<tr><td>- Nobres existentes:</td><td>{$village.snob_info.all_snobs}</td></tr>
		<tr><td>- Nobres em produ&ccedil;&atilde;o:</td><td>{$village.snob_info.ags_in_prod}</td></tr>
		<tr><td>- N&uacute;mero de aldeias conquistadas:</td><td>{$village.snob_info.control_villages}</td></tr>
		<tr><th>Ainda podem ser produzidos:</th><th>{$village.snob_info.can_prod}</th></tr>
	</table>
	{elseif $ag_style==2}
	<table align="center" width="100%">
		<tr>
			<td width="45%" align="center">
				<h4 align="left">Nobres que ainda podem ser formados</h4>
				<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
					<tr><td>Limite de Nobres:</td><td>{$nextsnob}</td></tr>
					<tr><td>- Nobres existentes:</td><td>{$all_snob}</td></tr>
					<tr><td>- Nobres em produ&ccedil;&atilde;o:</td><td>{$snob_recruit}</td></tr>
					<tr><td width="230">- N&uacute;mero de aldeias conquistadas:</td><td>{$village_control}</td></tr>
					<tr><th>Ainda podem ser produzidos:</th><th>{$nextsnob-$all_snob-$snob_recruit}</th></tr>
				</table>
			</td>
			<td width="55%" align="center">
				<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
					<tr><th colspan="2" width="350">Moedas de ouro</th></tr>
				    <tr><td><img src="../graphic/icons/gold.png" />Moedas de outro:</td><td>{$allcoins}</td></tr>

				    <tr><th colspan="2">Nobres</th></tr>
			    	<tr><td>Limite atual de nobres:</td><td>{$nextsnob}</td></tr>
				    <tr><td>Falta ainda para o limite de {$nextsnob+1} nobres:</td><td class="nowrap">{$nextsnob-$coins_n} moedas de ouro</td></tr>
			    	<tr><td>J&aacute; guardadas para o limite de {$nextsnob+1} nobres:</td><td class="nowrap">{$coins_n} moedas de ouro</td></tr>
				</table>
			</td>
		</tr>
	</table>
	<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr>
			<th width="40"><center><img src="../graphic/icons/wood.png" /></center></th>
			<th width="40"><center><img src="../graphic/icons/stone.png" /></center></th>
			<th width="40"><center><img src="../graphic/icons/iron.png" /></center></th>
			<th>Cunhar</th>
		</tr>
		<tr>
			<td align="center">{$coins_wood|format_number}</td>
			<td align="center">{$coins_stone|format_number}</td>
			<td align="center">{$coins_iron|format_number}</td>
			<td>
				{if $village.r_wood < $coins_wood || $village.r_stone < $coins_stone || $village.r_iron < $coins_iron}
				<span class="inactive">Recursos insuficientes.</span>
				{else}
				<a href="game.php?village={$village.id}&screen=snob&create=coins">&raquo; Cunhar moeda de ouro</a>
				{/if}
			</td>
		</tr>
	</table>
{/if}
{/if}
{if count($snobed_villages)>0}
	<br />
	<table class="vis" width="300">
		<tr><th>Von diesem Dorf beherschte Dörfer</th></tr>
	{foreach from=$snobed_villages key=id item=villagename}
		<tr><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$id}">{$villagename}</a></td></tr>
	{/foreach}
	</table>
{/if}
</td>
{/if}