<table class="vis" style="width: 100%;">
  <tr>
    <td align="center">
      {foreach from=$gruppen item=value key=key}
        {if $aktu_group == $value.id}
          <strong>>{$value.name}<</strong>
        {else}
          <a href="?village={$smarty.get.village}&amp;screen=overview_villages&amp;mode={$smarty.get.mode}&amp;group={$value.id}">[{$value.name}]</a>
        {/if}
      {/foreach}
      {if $aktu_group == 0}
        <strong>>Alle<</strong>
      {else}
        <a href="?village={$smarty.get.village}&amp;screen=overview_villages&amp;mode={$smarty.get.mode}&amp;group=0">[Toate]</a>
      {/if}
    </td>
  </tr>
</table>
<br />
<table class="vis">
<tr><th>Comanda</th><th>Satul</th><th>Sosire</th>
		{foreach from=$cl_units->get_array("dbname") item=dbname key=name}
			<th width="30"><img src="graphic/unit/{$dbname}.png" title="{$name}" alt="" /></th>
		{/foreach}
</tr>
		{foreach from=$my_movements item=array}
	    {assign var='vid' value=$array.homevillageid}
      {assign var='vid' value=id_$vid}
	    {if isset($villages_of_group[$vid]) or $aktu_group == 0}
			<tr class="row_a">
			{else}
			<tr class="row_a" style="display: none;">
			{/if}
				<td><a href="game.php?village={$village.id}&amp;screen=info_command&amp;id={$array.id}&amp;type=own">{$array.message}</a></td>
				<td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$array.homevillageid}">{$array.homevillagename}</a></td>
				<td>in {$array.arrival_in|format_time}</td>
				{foreach from=$array.units item=num}
					{if $num==0}
						<td class="hidden">0</td>
					{else}
						<td>{$num}</td>
					{/if}
				{/foreach}
			</tr>
		{/foreach}	
</table>