{php}
	$this->_tpl_vars['vills'] = mysql_num_rows(mysql_query("SELECT * FROM `villages` WHERE `userid` = '".$this->_tpl_vars['user']['id']."'"));
{/php}
<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th>Aldeias ({$vills})</th>
		<th><div align="center"><img src="../graphic/overview/main.png" title="Edif&iacute;cio Principal" alt="" /></div></th>
		<th><div align="center"><img src="../graphic/overview/barracks.png" title="Quartel" alt="" /></div></th>
		<th><div align="center"><img src="../graphic/overview/stable.png" title="Estab&uacute;lo" alt="" /></div></th>
		<th><div align="center"><img src="../graphic/overview/garage.png" title="Oficina" alt="" /></div></th>
		<th><div align="center"><img src="../graphic/overview/smith.png" title="Ferreiro" alt="" /></div></th>
		<th><div align="center"><img src="../graphic/icons/farm.png" title="Fazenda" alt="" /></div></th>
		{foreach from=$unit item=name key=dbname}
		<th width="35"><div align="center"><img src="../graphic/unit/{$dbname}.png" title="{$name}" alt="" /></div></th>
		{/foreach}
		<th><div align="center"><img src="../graphic/overview/trader.png" title="Mercadores" alt="" /></div></th>
	</tr>
	{foreach from=$villages item=arr key=arr_id}
{php}
	$vill = $this->_tpl_vars['arr_id'];
	$sql = mysql_fetch_array(mysql_query("SELECT * FROM `villages` WHERE `id`= '".$vill."'"));
{/php}
	<tr{if $arr_id == $village.id} class="lit"{/if}>
		<td>{if $villages.$arr_id.attacks!=0}<img src="../graphic/command/attack.png"> {/if}<a href="game.php?village={$arr_id}&screen=overview">{$villages.$arr_id.name} ({$villages.$arr_id.x}|{$villages.$arr_id.y}) K{php}echo $sql['continent'];{/php}</a></td>
		{if isset($villages.$arr_id.first_build.buildname)}
		<td align="center"><a href="game.php?village={$arr_id}&amp;screen=main"><img src="../graphic/dots/green.png" title="{$villages.$arr_id.first_build.buildname}: {$villages.$arr_id.first_build.end_time|replace:"heute um":"hoje &agrave;s"|replace:"Uhr":""}" alt="" /></a></td>
		{else}
	    <td align="center"><a href="game.php?village={$arr_id}&amp;screen=main"><img src="../graphic/overview/prod_avail.png" title="" alt="" /></a></td>
		{/if}

		{if $villages.$arr_id.barracks==0}
       	<td align="center"><a href="game.php?village={$arr_id}&amp;screen=barracks"><img src="../graphic/dots/grey.png" title="Produ&ccedil;&atilde;o n&atilde;o disponivel" alt="" /></a></td>
		{elseif !empty($villages.$arr_id.barracks_prod.unit)}
		<td align="center"><a href="game.php?village={$arr_id}&amp;screen=barracks"><img src="../graphic/dots/green.png" title="{$villages.$arr_id.barracks_prod.unit}: {$villages.$arr_id.barracks_prod.time|replace:"heute um":"hoje &agrave;s"|replace:"Uhr":""}" alt="" /></a></td>
		{else}
       	<td align="center"><a href="game.php?village={$arr_id}&amp;screen=barracks"><img src="../graphic/overview/prod_avail.png" title="" alt="" /></a></td>
		{/if}

		{if $villages.$arr_id.stable==0}
       	<td align="center"><a href="game.php?village={$arr_id}&amp;screen=stable"><img src="../graphic/dots/grey.png" title="Produ&ccedil;&atilde;o n&atilde;o disponivel" alt="" /></a></td>
		{elseif !empty($villages.$arr_id.stable_prod.unit)}
		<td align="center"><a href="game.php?village={$arr_id}&amp;screen=stable"><img src="../graphic/dots/green.png" title="{$villages.$arr_id.stable_prod.unit}: {$villages.$arr_id.stable_prod.time|replace:"heute um":"hoje &agrave;s"|replace:"Uhr":""}" alt="" /></a></td>
		{else}
	    <td align="center"><a href="game.php?village={$arr_id}&amp;screen=stable"><img src="../graphic/overview/prod_avail.png" title="" alt="" /></a></td>
		{/if}

		{if $villages.$arr_id.garage==0}
		<td align="center"><a href="game.php?village={$arr_id}&amp;screen=garage"><img src="../graphic/dots/grey.png" title="Produ&ccedil;&atilde;o n&atilde;o disponivel" alt="" /></a></td>
		{elseif !empty($villages.$arr_id.garage_prod.unit)}
		<td align="center"><a href="game.php?village={$arr_id}&amp;screen=garage"><img src="../graphic/dots/green.png" title="{$villages.$arr_id.garage_prod.unit}: {$villages.$arr_id.garage_prod.time|replace:"heute um":"hoje &agrave;s"|replace:"Uhr":""}" alt="" /></a></td>
		{else}
		<td align="center"><a href="game.php?village={$arr_id}&amp;screen=garage"><img src="../graphic/overview/prod_avail.png" title="" alt="" /></a></td>
		{/if}

		{if $villages.$arr_id.smith==0}
		<td align="center"><a href="game.php?village={$arr_id}&amp;screen=smith"><img src="../graphic/dots/yellow.png" title="Produ&ccedil;&atilde;o n&atilde;o disponivel" alt="" /></a></td>
		{elseif !empty($villages.$arr_id.first_tec.tecname)}
		<td align="center"><a href="game.php?village={$arr_id}&amp;screen=smith"><img src="../graphic/dots/green.png" title="{$villages.$arr_id.first_tec.tecname}: {$villages.$arr_id.first_tec.end_time|replace:"heute um":"hoje &agrave;s"|replace:"Uhr":""}" alt="" /></a></td>
		{else}
		<td align="center"><a href="game.php?village={$arr_id}&amp;screen=smith"><img src="../graphic/overview/prod_avail.png" title="" alt="" /></a></td>
		{/if}

		<td align="center"><a href="game.php?village={$arr_id}&amp;screen=farm">{$villages.$arr_id.max_farm-$villages.$arr_id.r_bh} ({$villages.$arr_id.farm})</a></td>
		
		{foreach from=$unit item=name key=dbname}
			{if $villages.$arr_id.$dbname==0}
		<td class="hidden" align="center">{$villages.$arr_id.$dbname}</td>
			{else}
		<td align="center">{$villages.$arr_id.$dbname}</td>
			{/if}
		{/foreach}

		<td align="center"><a href="game.php?village={$arr_id}&amp;screen=market">{$villages.$arr_id.dealers.in_village}/{$villages.$arr_id.dealers.max_dealers}</a></td>

	</tr>
	{/foreach}
</table>