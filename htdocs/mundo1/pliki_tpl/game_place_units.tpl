{if !empty($error)}
	<div style="color:red; font-size:large">{$error}</div>
{/if}

<h3>Tropas</h3>

<form action="game.php?village={$village.id}&amp;screen=place&amp;mode=units&amp;action=command_other&amp;h={$hkey}" method="post">

<table class="vis" width="100%">
<tr><th>Unidades</th>{foreach from=$cl_units->get_array("dbname") item=dbname key=name}<th width="40"><img src="/ds_graphic/unit/{$dbname}.png" title="{$name}" alt="" /></th>{/foreach}</tr>

<tr>
	<td>desta aldeia</td>
	{foreach from=$own_units item=num_units}{if $num_units>0}<td>{$num_units|format_number}</td>{else}<td class="hidden">0</td>{/if}{/foreach}
</tr>

{foreach from=$in_my_village_units key=id item=arr}
	<tr>
		<td><input name="id_{$id}" type="checkbox" />  <a href="game.php?village={$village.id}&screen=info_village&id={$id}">{$in_my_village_units.$id.villagename} ({$in_my_village_units.$id.x}|{$in_my_village_units.$id.y}) K{$in_my_village_units.$id.continent}</a></td>
		{foreach from=$cl_units->get_array('dbname') item=dbname}
			{if $in_my_village_units.$id.$dbname>0}
				<td>{$in_my_village_units.$id.$dbname|format_number}</td>
			{else}
				<td class="hidden">0</td>
			{/if}
		{/foreach}
	</tr>
{/foreach}

<tr>
	<th>Juntos</th>
	{foreach from=$all_units item=num_units}{if $num_units>0}<th>{$num_units|format_number}</th>{else}<th class="hidden">0</th>{/if}{/foreach}

</tr>
</table>

{if count($in_my_village_units)>0}
	<table align="left">
	<tr><td><input type="submit" name="back" value="Odwo�a�" /></td></tr>
	</table>
{/if}
</form>

{if count($outside_village_units) > 0}
	<br style="clear:both;" />
	<h3>As tropas fora da aldeia</h3>
	
	<table class="vis">
	<tr><th width="320">Aldeia</th>
	{foreach from=$cl_units->get_array("dbname") item=dbname key=name}<th width="40"><img src="/ds_graphic/unit/{$dbname}.png" title="{$name}" alt="" /></th>{/foreach}
	<th>Ordem</th></tr>
	
		{foreach from=$outside_village_units key=id item=arr}
			<tr>
	            <td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$id}">{$outside_village_units.$id.villagename} ({$outside_village_units.$id.x}|{$outside_village_units.$id.y}) K{$outside_village_units.$id.continent}</a></td>
				{foreach from=$cl_units->get_array('dbname') item=dbname}
					{if $outside_village_units.$id.$dbname>0}
						<td>{$outside_village_units.$id.$dbname|format_number}</td>
					{else}
						<td class="hidden">0</td>
					{/if}
				{/foreach}
				
				<td>
					<a href="game.php?village={$village.id}&amp;screen=place&amp;mode=units&amp;try=back&amp;unit_id={$id}">Algumas</a> /
					<a href="game.php?village={$village.id}&amp;screen=place&amp;mode=units&amp;action=all_back&amp;unit_id={$id}&amp;h={$hkey}">Todas</a>
				</td>
			</tr>
		{/foreach}
		
	</table>
{/if}