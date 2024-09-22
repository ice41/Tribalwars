<table class="vis" style="width: 100%;">
  <tr>
    <td rowspan="2">
      <a href="javascript:popup_scroll('groups.php', 500, 500);">&raquo;&nbsp;Grupuri</a>
    </td>
    <td align="center" width="100%">
      {foreach from=$gruppen item=value key=key}
        {if $aktu_group == $value.id}
          <strong>&gt;{$value.name}&lt;</strong>
        {else}
          <a href="?village={$smarty.get.village}&amp;screen=overview_villages&amp;mode={$smarty.get.mode}&amp;group={$value.id}">[{$value.name}]</a>
        {/if}
      {/foreach}
      {if $aktu_group == 0}
        <strong>&gt;Toate&lt;</strong>
      {else}
        <a href="?village={$smarty.get.village}&amp;screen=overview_villages&amp;mode={$smarty.get.mode}&amp;group=0">[Toate]</a>
      {/if}
    </td>
  </tr>
  <tr>
    <td align="center">
      {foreach from=$page_numbers item=value key=key}
        {if $aktu_page_number == $value}
          <strong>&gt;{$value}&lt;</strong>
        {else}
          <a href="?village={$smarty.get.village}&amp;screen=overview_villages&amp;mode={$smarty.get.mode}&amp;page={$value}">[{$value}]</a>
        {/if}
      {/foreach}
      {if $aktu_page_number == 0}
        <strong>&gt;Toate&lt;</strong>
      {else}
        <a href="?village={$smarty.get.village}&amp;screen=overview_villages&amp;mode={$smarty.get.mode}&amp;page=0">[Toate]</a>
      {/if}
    </td>
  </tr>
</table>
<br />
<table class="vis">
	<tr>
		<th>Sate</th>
		<th></th>
		
		{foreach from=$unit item=name key=dbname}
			<th width="35"><img src="graphic/unit/{$dbname}.png" title="{$name}" alt="" /></th>
		{/foreach}
	
		<th>Actiune</th>
	</tr>
	
	{foreach from=$villages item=id key=arr_id}
		<tr>
			<td rowspan="3" valign="top">
				<a href="game.php?village={$arr_id}&screen=overview">{$villages.$arr_id.name} ({$villages.$arr_id.x}|{$villages.$arr_id.y})</a>
			</td>
			<td>proprii</td>
			
			{foreach from=$unit item=name key=dbname}
				{if $own_units.$arr_id.$dbname==0}
						<td class="hidden">{$own_units.$arr_id.$dbname}</td>
				{else}
						<td>{$own_units.$arr_id.$dbname}</td>
				{/if}
			{/foreach}
			
			<td><a href="game.php?village={$village.id}&amp;screen=place&amp;">Comenzi</a></td>
		</tr>
		<tr class="units_there">
			<td>toate</td>
			
			{foreach from=$unit item=name key=dbname}
				{if $all_units.$arr_id.$dbname==0}
						<td class="hidden">{$all_units.$arr_id.$dbname}</td>
				{else}
						<td>{$all_units.$arr_id.$dbname}</td>
				{/if}
			{/foreach}
		
			<td rowspan="2"><a href="game.php?village={$village.id}&amp;screen=place&amp;mode=units">Trupele</a></td>
		</tr>
		<tr class="units_away">
			<td>departe</td>
			
			{foreach from=$unit item=name key=dbname}
				{if $villages.$arr_id.outward.$dbname==0}
						<td class="hidden">{$villages.$arr_id.outward.$dbname}</td>
				{else}
						<td>{$villages.$arr_id.outward.$dbname}</td>
				{/if}
			{/foreach}
			
		</tr>
	{/foreach}
	
</table>
