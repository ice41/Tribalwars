<br />
	<table class="vis" id="menu" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><th>Centros de recrutamento</th></tr>
		<tr><td {if $screen=='barracks'}class="selected"{/if}><a href="game.php?village={$village.id}&screen=barracks">{if $screen=='barracks'}&raquo; {/if}Quartel</a></td></tr>
		<tr><td {if $screen=='stable'}class="selected"{/if}><a href="game.php?village={$village.id}&screen=stable">{if $screen=='stable'}&raquo; {/if}Estab&uacute;lo</a></td></tr>
		<tr><td {if $screen=='garage'}class="selected"{/if}><a href="game.php?village={$village.id}&screen=garage">{if $screen=='garage'}&raquo; {/if}Oficina</a></td></tr>
		<tr><td><a href="game.php?village={$village.id}&screen=snob">Academia</a></td></tr>
	</table>
</td>
<td width="80%">
	<table>
		<tr>
			<td><img src="../graphic/build/{$dbname}.jpg" title="{$buildname}" alt="" /></td>
			<td>
				<h2>{$buildname} ({$village.$dbname|nivel})</h2>
				{$description}
			</td>
		</tr>
	</table>
{if $show_build}
	{if count($recruit_units)>0}
    <table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr>
			<th width="150">Unidade</th>
			<th width="120">Dura&ccedil;&atilde;o</th>
			<th width="150">Conclus&atilde;o</th>
			<th width="100">Cancelamento *</th>
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
			<td align="center"><a href="game.php?village={$village.id}&amp;screen={$dbname}&amp;action=cancel&amp;id={$key}&amp;h={$hkey}">cancelar</a></td>
		</tr>
		{/foreach}
	</table>
	<div style="font-size: 7pt;">* (Apenas 90% dos recursos ser&atilde;o devolvidos!)</div><br />
	{/if}
	{if !empty($error)}
	<div class="error">{$error}</div>
	{/if}
	<form action="game.php?village={$village.id}&amp;screen={$dbname}&amp;action=train&amp;h={$hkey}" method="post" onsubmit="this.submit.disabled=true;">
		<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
			<tr>
				<th width="140">Unidade</th>
				<th><img src="../graphic/icons/wood.png" /></th>
				<th><img src="../graphic/icons/stone.png" /></th>
				<th><img src="../graphic/icons/iron.png" /></th>
				<th><img src="../graphic/icons/farm.png" /></th>
				<th width="70">Dura&ccedil;&atilde;o</th>
				<th>Na aldeia/Total</th>
				<th>Recrutar</th>
			</tr>
	{foreach from=$units key=unit_dbname item=name}
			<tr>
				<td><a href="javascript:popup('popup_unit.php?unit={$unit_dbname}', 520, 520)"> <img src="../graphic/unit/{$unit_dbname}.png" alt="" /> {$name}</a></td>
				<td align="center">{$cl_units->get_woodprice($unit_dbname)}</td>
				<td align="center">{$cl_units->get_stoneprice($unit_dbname)}</td>
				<td align="center">{$cl_units->get_ironprice($unit_dbname)}</td>
				<td align="center">{$cl_units->get_bhprice($unit_dbname)}</td>
				<td align="center">{$cl_units->get_time($village.$dbname,$unit_dbname)|format_time}</td>
				<td align="center">{$units_in_village.$unit_dbname}/{$units_all.$unit_dbname}</td>
		{$cl_units->check_needed($unit_dbname,$village)}
		{if $cl_units->last_error==not_tec}
			    <td class="inactive" align="center">Unidade n&atilde;o pesquisada</td>
		{elseif $cl_units->last_error==not_needed}
			    <td class="inactive" align="center">Requerimentos necess&aacute;rios n&atilde;o atingidos</td>
		{elseif $cl_units->last_error==not_enough_ress}
			    <td class="inactive" align="center">Recursos insuficientes</td>
		{elseif $cl_units->last_error==not_enough_bh}
			    <td class="inactive" align="center">A fazenda n&atilde;o pode prover mais unidades</td>
		{else}
				<td><input name="{$unit_dbname}" type="text" size="5" maxlength="5" /> <a href="javascript:insertUnit(document.forms[0].{$unit_dbname}, {$cl_units->last_error})">(max. {$cl_units->last_error})</a></td>
		{/if}
			</tr>
	{/foreach}
		    <tr><th colspan="8"><span style="float:right;"><input name="submit" type="submit" class="button" value="Recrutar" style="font-size: 10pt;" /></span></th></tr>
		</table>
	</form>
{/if}
</td>