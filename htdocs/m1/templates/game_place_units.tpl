{if !empty($error)}
<div class="error">{$error}</div>
{/if}

<h3>Tropas</h3>
<form action="game.php?village={$village.id}&amp;screen=place&amp;mode=units&amp;action=command_other&amp;h={$hkey}" method="post">
	<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr>
			<th>Origem</th>
			{foreach from=$cl_units->get_array("dbname") item=dbname key=name}
			<th width="40"><div align="center"><img src="../graphic/unit/{$dbname}.png" title="{$name}" alt="" /></div></th>
			{/foreach}
		</tr>
		<tr>
			<td>Pr&oacute;prias</td>
			{foreach from=$own_units item=num_units}
				{if $num_units>0}
			<td align="center">{$num_units}</td>
				{else}
			<td class="hidden" align="center">0</td>
				{/if}
			{/foreach}
		</tr>
		{foreach from=$in_my_village_units key=id item=arr}
{php}
	$vill = $this->_tpl_vars['id'];
	$sql = mysql_fetch_array(mysql_query("SELECT * FROM `villages` WHERE `id`= '".$vill."'"));
{/php}
		<tr>
			<td><input name="id_{$id}" type="checkbox" />  <a href="game.php?village={$village.id}&screen=info_village&id={$id}">{$in_my_village_units.$id.villagename} ({$in_my_village_units.$id.x}|{$in_my_village_units.$id.y}) K{php}echo $sql['continent'];{/php}</a></td>
			{foreach from=$cl_units->get_array('dbname') item=dbname}
				{if $in_my_village_units.$id.$dbname>0}
			<td align="center">{$in_my_village_units.$id.$dbname}</td>
				{else}
			<td class="hidden" align="center">0</td>
				{/if}
			{/foreach}
		</tr>
		{/foreach}
		<tr>
			<th>Total</th>
			{foreach from=$all_units item=num_units}
				{if $num_units>0}
			<th style="text-align:center;">{$num_units}</th>
				{else}
			<th class="hidden" style="text-align:center;">0</th>
				{/if}
			{/foreach}
		</tr>
	</table>
	{if count($in_my_village_units) > 0}
	<table align="left">
		<tr><td><input type="submit" name="back" class="button" value="Retirar" /></td></tr>
	</table>
	{/if}
</form>

{if count($outside_village_units) > 0}
<br style="clear:both;" />
<h3>Tropas em outras aldeias</h3>
<table class="vis" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th width="320">Aldeia</th>
		{foreach from=$cl_units->get_array("dbname") item=dbname key=name}
		<th width="40"><div align="center"><img src="../graphic/unit/{$dbname}.png" title="{$name}" alt="" /></div></th>
		{/foreach}
		<th>Retirar</th></tr>
	
		{foreach from=$outside_village_units key=id item=arr}
{php}
	$vill2 = $this->_tpl_vars['id'];
	$sql2 = mysql_fetch_array(mysql_query("SELECT * FROM `villages` WHERE `id`= '".$vill2."'"));
{/php}
			<tr>
	            <td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$id}">{$outside_village_units.$id.villagename} ({$outside_village_units.$id.x}|{$outside_village_units.$id.y}) K{php}echo $sql2['continent'];{/php}</a></td>
				{foreach from=$cl_units->get_array('dbname') item=dbname}
					{if $outside_village_units.$id.$dbname>0}
						<td align="center">{$outside_village_units.$id.$dbname}</td>
					{else}
						<td class="hidden" align="center">0</td>
					{/if}
				{/foreach}
				
				<td align="center">
					<a href="game.php?village={$village.id}&amp;screen=place&amp;mode=units&amp;try=back&amp;unit_id={$id}">Algumas</a><br />
					<a href="game.php?village={$village.id}&amp;screen=place&amp;mode=units&amp;action=all_back&amp;unit_id={$id}&amp;h={$hkey}">Todas</a>
				</td>
			</tr>
		{/foreach}
		
	</table>
{/if}