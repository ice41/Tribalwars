<h2>membros da tribo <font color="{if $ally.id == $user.ally}blue{else}red{/if}">{$ally.short}</font></h2><a href="game.php?village={$village.id}&screen=info_ally&id={$ally.id}"> >> {$ally.name}</a>

<table class="vis">
<tr>
  <th width="280">usuario</th>
  <th width="40">Classificação</th>
  <th width="80">Pontos</th>
  <th width="40">Aldeias</th>
</tr>
	{foreach from=$members item=arr key=id}
		<tr {if $user.id==$id}class="lit"{/if}>
	
		<td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$id}">{$arr.username}</a> {if !empty($arr.titel)}({$arr.titel}){/if}	</td>
	
		<td>{$arr.rank}</td><td>{$arr.points|format_number}</td>
	
		<td>{$arr.villages|format_number}</td>
	  		
		</tr>
	{/foreach}
</table>
