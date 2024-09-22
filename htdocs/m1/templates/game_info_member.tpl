<h2>{$ally.short} &rArr; Membros</h2>
<table class="vis" width="100%" style="border-spacing: 1px; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th width="280">Jogador</th>
		<th width="40">Rank</th>
		<th width="80">Pontos</th>
		<th width="40">Aldeias</th>
	</tr>
	{foreach from=$members item=arr key=id}
	<tr {if $user.id==$id}class="lit"{/if}>
		<td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$id}">{$arr.username}</a> {if !empty($arr.titel)}({$arr.titel}){/if}	</td>
		<td>{$arr.rank}</td>
		<td>{$arr.points|format_number}</td>
		<td>{$arr.villages}</td>
  	</tr>
	{/foreach}
</table>