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
<th>Sate</th><th>Puncte</th><th>Materi prime</th><th>Depozit</th><th>Ferma</th>
<th>Constructii</th><th>Cercetarii</th><th>Recrutarii</th>
</tr>

{foreach from=$villages item=id key=arr_id}
	<tr>
		<td>{if $villages.$arr_id.attacks!=0}<img src="graphic/command/attack.png"> {/if}<a href="game.php?village={$arr_id}&screen=overview">{$villages.$arr_id.name} ({$villages.$arr_id.x}|{$villages.$arr_id.y})</a></td>
		<td>{$villages.$arr_id.points}</td>
		<td><img src="graphic/holz.png" title="Holz" alt="" />{if $villages.$arr_id.r_wood==$villages.$arr_id.max_storage}<span class="warn">{/if}{$villages.$arr_id.r_wood}{if $villages.$arr_id.r_wood==$villages.$arr_id.max_storage}</span>{/if} <img src="graphic/lehm.png" title="Lehm" alt="" />{if $villages.$arr_id.r_stone==$villages.$arr_id.max_storage}<span class="warn">{/if}{$villages.$arr_id.r_stone}{if $villages.$arr_id.r_stone==$villages.$arr_id.max_storage}</span>{/if} <img src="graphic/eisen.png" title="Eisen" alt="" />{if $villages.$arr_id.r_iron==$villages.$arr_id.max_storage}<span class="warn">{/if}{$villages.$arr_id.r_iron}{if $villages.$arr_id.r_iron==$villages.$arr_id.max_storage}</span>{/if} </td>
		<td>{$villages.$arr_id.max_storage}</td>
		<td>{$villages.$arr_id.r_bh}/{$villages.$arr_id.max_farm}</td>
		{if isset($villages.$arr_id.first_build.buildname)}
			<td><b>{$villages.$arr_id.first_build.buildname}</b><br>{$villages.$arr_id.first_build.end_time}</td>

		{else}
		    <td></td>
		{/if}
		{if isset($villages.$arr_id.first_tec.tecname)}
			<td><b>{$villages.$arr_id.first_tec.tecname}</b><br>{$villages.$arr_id.first_tec.end_time}</td>

		{else}
		    <td></td>
		{/if}
		<td>{foreach from=$villages.$arr_id.recruits item=arr_rec key=id_rec}<img src="graphic/unit/{$arr_rec.dbname}.png" title="{$arr_rec.num} {$arr_rec.unit}" alt="">{/foreach}</td>
	</tr>
{/foreach}

</table>