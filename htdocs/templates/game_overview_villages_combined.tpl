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
        <strong>&gt;Atac&lt;</strong>
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
	<th><img src="graphic/overview/main.png" title="Cladirea principala" alt="" /></th>
	<th><img src="graphic/overview/barracks.png" title="Cazarma" alt="" /></th>
	<th><img src="graphic/overview/stable.png" title="Grajd" alt="" /></th>
	<th><img src="graphic/overview/garage.png" title="Atelier" alt="" /></th>
	<th><img src="graphic/overview/smith.png" title="Fierarie" alt="" /></th>
	<th><img src="graphic/overview/farm.png" title="Ferma" alt="" /></th>
	
	{foreach from=$unit item=name key=dbname}
		<th width="35"><img src="graphic/unit/{$dbname}.png" title="{$name}" alt="" /></th>
	{/foreach}
	
	<th><img src="graphic/overview/trader.png" title="Targ" alt="" /></th>

</tr>

{foreach from=$villages item=arr key=arr_id}
	<tr>
		<td><a href="game.php?village={$arr_id}&screen=overview">{$villages.$arr_id.name} ({$villages.$arr_id.x}|{$villages.$arr_id.y})</a></td>

		{if isset($villages.$arr_id.first_build.buildname)}
			<td><a href="game.php?village={$arr_id}&amp;screen=main"><img src="graphic/overview/prod_running.png" title="{$villages.$arr_id.first_build.buildname}: {$villages.$arr_id.first_build.end_time}" alt="" /></a></td>
		{else}
		    <td><a href="game.php?village={$arr_id}&amp;screen=main"><img src="graphic/overview/prod_avail.png" title="Keine Produktion" alt="" /></a></td>
		{/if}
		
		{if $villages.$arr_id.barracks==0}
        	<td><a href="game.php?village={$arr_id}&amp;screen=barracks"><img src="graphic/overview/prod_impossible.png" title="Produktion nicht möglich" alt="" /></a></td>
		{elseif !empty($villages.$arr_id.barracks_prod.unit)}
			<td><a href="game.php?village={$arr_id}&amp;screen=barracks"><img src="graphic/overview/prod_running.png" title="{$villages.$arr_id.barracks_prod.unit}: {$villages.$arr_id.barracks_prod.time}" alt="" /></a></td>
		{else}
        	<td><a href="game.php?village={$arr_id}&amp;screen=barracks"><img src="graphic/overview/prod_avail.png" title="Keine Rekrutierung" alt="" /></a></td>
		{/if}
		
		{if $villages.$arr_id.stable==0}
        	<td><a href="game.php?village={$arr_id}&amp;screen=stable"><img src="graphic/overview/prod_impossible.png" title="Produktion nicht möglich" alt="" /></a></td>
		{elseif !empty($villages.$arr_id.stable_prod.unit)}
			<td><a href="game.php?village={$arr_id}&amp;screen=stable"><img src="graphic/overview/prod_running.png" title="{$villages.$arr_id.stable_prod.unit}: {$villages.$arr_id.stable_prod.time}" alt="" /></a></td>
		{else}
		    <td><a href="game.php?village={$arr_id}&amp;screen=stable"><img src="graphic/overview/prod_avail.png" title="Keine Produktion" alt="" /></a></td>
		{/if}

		{if $villages.$arr_id.garage==0}
			<td><a href="game.php?village={$arr_id}&amp;screen=garage"><img src="graphic/overview/prod_impossible.png" title="Produktion nicht möglich" alt="" /></a></td>
		{elseif !empty($villages.$arr_id.garage_prod.unit)}
			<td><a href="game.php?village={$arr_id}&amp;screen=garage"><img src="graphic/overview/prod_running.png" title="{$villages.$arr_id.garage_prod.unit}: {$villages.$arr_id.garage_prod.time}" alt="" /></a></td>
		{else}
			<td><a href="game.php?village={$arr_id}&amp;screen=garage"><img src="graphic/overview/prod_avail.png" title="Nici o productie" alt="" /></a></td>
		{/if}
		
		{if $villages.$arr_id.smith==0}
			<td><a href="game.php?village={$arr_id}&amp;screen=smith"><img src="graphic/dots/yellow.png" title="Schmiede nicht vorhanden" alt="" /></a></td>
		{elseif !empty($villages.$arr_id.first_tec.tecname)}
			<td><a href="game.php?village={$arr_id}&amp;screen=smith"><img src="graphic/overview/prod_running.png" title="{$villages.$arr_id.first_tec.tecname}: {$villages.$arr_id.first_tec.end_time}" alt="" /></a></td>
		{else}
			<td><a href="game.php?village={$arr_id}&amp;screen=smith"><img src="graphic/overview/prod_avail.png" title="Keine Produktion" alt="" /></a></td>
		{/if}

		<td><a href="game.php?village={$arr_id}&amp;screen=farm">{$villages.$arr_id.max_farm-$villages.$arr_id.r_bh} ({$villages.$arr_id.farm})</a></td>
		
		{foreach from=$unit item=name key=dbname}
			{if $villages.$arr_id.$dbname==0}
					<td class="hidden">{$villages.$arr_id.$dbname}</td>
			{else}
					<td>{$villages.$arr_id.$dbname}</td>
			{/if}
		{/foreach}
		
		<td><a href="game.php?village={$arr_id}&amp;screen=market">{$villages.$arr_id.dealers.in_village}/{$villages.$arr_id.dealers.max_dealers}</a></td>


	
	</tr>
{/foreach}

</table>

<form action="game.php?village={$smarty.get.village}&amp;screen=overview_villages&amp;mode={$smarty.get.mode}&amp;action=change_page_size" method="post">
  <table class="vis">
    <tr>
      <th colspan="2">Sate pe pagina:</th>
      <td><input name="page_size" size="5" value="{$villages_per_page}" type="text" /></td>
      <td><input value="OK" type="submit" /></td>
    </tr>
  </table>
</form>