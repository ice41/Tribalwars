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
        <strong>>Toate<</strong>
      {else}
        <a href="?village={$smarty.get.village}&amp;screen=overview_villages&amp;mode={$smarty.get.mode}&amp;group=0">[Toate]</a>
      {/if}
    </td>
  </tr>
</table>
<br />
<table class="vis">
<tr><th width="100">Comanda</th><th width="200">Tinta</th><th width="150">Acasa</th><th width="160">Sosire</th><th width="80">Sosire in</th>
</tr>
	{foreach from=$other_movements item=array}
		<tr style="white-space: nowrap" class="nowrap row_a">
		<td>
		
		<a href="game.php?village={$village.id}&amp;screen=info_command&amp;id={$array.id}&amp;type=other"><img src="graphic/command/{$array.type}.png"> {$array.message}</a>
		
		</td>
		<td><a href="game.php?village={$array.to_village}&amp;&amp;screen=overview">{$array.to_villagename}</a></td>
		<td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$array.send_from_user}">{$array.send_from_username}</a></td>
		<td>{$array.end_time|format_date}</td>
		<td><span class="timer">{$array.arrival_in|format_time}</span></td>
		</tr>
	{/foreach}
</table>