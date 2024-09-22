{php}
	if($_GET['action'] == 'reload_res'){
		header('Location: game.php?village='.$_GET['village'].'&screen=snob&mode=coins');
	}
	$this->_tpl_vars['vills'] = mysql_num_rows(mysql_query("SELECT * FROM `villages` WHERE `userid` = '".$this->_tpl_vars['user']['id']."'"));
{/php}
<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th>Aldeias ({$vills})</th>
		<th>Pontos</th>
		<th>Recursos</th>
		<th>Armaz&eacute;m</th>
		<th>Fazenda</th>
		<th>Constru&ccedil;&otilde;es</th>
		<th>Pesquisas</th>
		<th>Recrutamento</th>
	</tr>
	{foreach from=$villages item=id key=arr_id}
{php}
	$vill = $this->_tpl_vars['arr_id'];
	$sql = mysql_fetch_array(mysql_query("SELECT * FROM `villages` WHERE `id`= '".$vill."'"));
{/php}
	<tr{if $arr_id == $village.id} class="lit"{/if}>
		<td>{if $villages.$arr_id.attacks!=0}<img src="../graphic/command/attack.png"> {/if}<a href="game.php?village={$arr_id}&screen=overview">{$villages.$arr_id.name} ({$villages.$arr_id.x}|{$villages.$arr_id.y}) K{php}echo $sql['continent'];{/php}</a></td>
		<td align="center">{$villages.$arr_id.points|format_number}</td>
		<td align="center"><img src="../graphic/icons/wood.png" title="Madeira" alt="" />{if $villages.$arr_id.r_wood==$villages.$arr_id.max_storage}<span class="warn">{/if}{$villages.$arr_id.r_wood}{if $villages.$arr_id.r_wood==$villages.$arr_id.max_storage}</span>{/if} <img src="../graphic/icons/stone.png" title="Argila" alt="" />{if $villages.$arr_id.r_stone==$villages.$arr_id.max_storage}<span class="warn">{/if}{$villages.$arr_id.r_stone}{if $villages.$arr_id.r_stone==$villages.$arr_id.max_storage}</span>{/if} <img src="../graphic/icons/iron.png" title="Ferro" alt="" />{if $villages.$arr_id.r_iron==$villages.$arr_id.max_storage}<span class="warn">{/if}{$villages.$arr_id.r_iron}{if $villages.$arr_id.r_iron==$villages.$arr_id.max_storage}</span>{/if} </td>
		<td align="center">
{php} 
	$arr_id = $this->_tpl_vars['arr_id'];
	$select_bonus = mysql_fetch_array(mysql_query("SELECT bonus FROM villages WHERE id = '$arr_id'"));
	$select_bonus = $select_bonus[0];
	include('include/config.php');
	if($select_bonus == '1'){
		include('include/bonus/max_storage_bonus.php');
		$select = mysql_fetch_array(mysql_query("SELECT storage FROM villages WHERE id = '$arr_id'"));
		$select = $select[0];
		echo $arr_maxstorage[$select];
	}else{
		include('include/configs/max_storage.php');
		$select1 = mysql_fetch_array(mysql_query("SELECT storage FROM villages WHERE id = '$arr_id'"));
		$select1 = $select1[0];
		echo $arr_maxstorage[$select1];
	}
{/php}
		</td>
		<td align="center">{$villages.$arr_id.r_bh}/{$villages.$arr_id.max_farm}</td>
		{if isset($villages.$arr_id.first_build.buildname)}
		<td><b>{$villages.$arr_id.first_build.buildname}</b></td>
		{else}
	    <td>&nbsp;</td>
		{/if}
		{if isset($villages.$arr_id.first_tec.tecname)}
		<td><b>{$villages.$arr_id.first_tec.tecname}</b></td>
		{else}
	    <td>&nbsp;</td>
		{/if}
		<td>
			{foreach from=$villages.$arr_id.recruits item=arr_rec key=id_rec}
			<img src="../graphic/unit/{$arr_rec.dbname}.png" title="{$arr_rec.num} {$arr_rec.unit}" alt="">
			{/foreach}
		</td>
	</tr>
	{/foreach}
</table>