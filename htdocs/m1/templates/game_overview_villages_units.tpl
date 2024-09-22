{php}
	$this->_tpl_vars['vills'] = mysql_num_rows(mysql_query("SELECT * FROM `villages` WHERE `userid` = '".$this->_tpl_vars['user']['id']."'"));
{/php}
<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th width="210">Aldeias ({$vills})</th>
		<th width="90">&nbsp;</th>
		{foreach from=$unit item=name key=dbname}
		<th width="40"><div align="center"><img src="../graphic/unit/{$dbname}.png" title="{$name}" alt="" /></div></th>
		{/foreach}
		<th width="55">A&ccedil;&atilde;o</th>
	</tr>
	{foreach from=$villages item=id key=arr_id}
{php}
	$vill = $this->_tpl_vars['arr_id'];
	$sql = mysql_fetch_array(mysql_query("SELECT * FROM `villages` WHERE `id`= '".$vill."'"));
{/php}
	<tr{if $arr_id == $village.id} class="lit"{/if}>
		<td rowspan="3" valign="top"><a href="game.php?village={$arr_id}&screen=overview">{$villages.$arr_id.name} ({$villages.$arr_id.x}|{$villages.$arr_id.y}) K{php}echo $sql['continent'];{/php}</a></td>
		<td>Suas tropas</td>
		{foreach from=$unit item=name key=dbname}
			{if $own_units.$arr_id.$dbname==0}
		<td class="hidden" align="center">{$own_units.$arr_id.$dbname}</td>
			{else}
		<td align="center">{$own_units.$arr_id.$dbname}</td>
			{/if}
		{/foreach}
		<td><a href="game.php?village={$village.id}&amp;screen=place">Comandos</a></td>
	</tr>
	<tr class="units_there{if $arr_id == $village.id} lit{/if}">
		<td>Total</td>
		{foreach from=$unit item=name key=dbname}
			{if $all_units.$arr_id.$dbname==0}
		<td class="hidden" align="center">{$all_units.$arr_id.$dbname}</td>
			{else}
		<td align="center">{$all_units.$arr_id.$dbname}</td>
			{/if}
		{/foreach}
		<td rowspan="2"><a href="game.php?village={$village.id}&amp;screen=place&amp;mode=units">Tropas</a></td>
	</tr>
	<tr class="units_away{if $arr_id == $village.id} lit{/if}">
		<td>Fora</td>
		{foreach from=$unit item=name key=dbname}
			{if $villages.$arr_id.outward.$dbname==0}
		<td class="hidden" align="center">{$villages.$arr_id.outward.$dbname}</td>
			{else}
		<td align="center">{$villages.$arr_id.outward.$dbname}</td>
			{/if}
		{/foreach}
	</tr>
	{/foreach}
</table>