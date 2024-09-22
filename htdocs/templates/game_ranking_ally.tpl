<table class="vis">
<tr>
	<th width="60">Loc</th><th width="60">Numele tribului</th><th width="120">Punctajul celor mai buni 40 juc&#259;tori</th><th width="60">Punctaj total</th><th width="100">Membri</th><th width="100">Medie de puncte juc&#259;tori</th><th width="60">Sate</th><th width="100">Medie de puncte sat</th>
</tr>
	{foreach from=$ranks item=item key=id}
		<tr {$ranks.$id.mark}>
			<td>{$ranks.$id.rank}</td>
			<td><a href="game.php?village={$village.id}&screen=info_ally&id={$id}">{$ranks.$id.short}</a></td>
			<td>{$ranks.$id.best_points}</td>
			<td>{$ranks.$id.points}</td>
			<td>{$ranks.$id.members}</td>
			<td>{$ranks.$id.cuttrought_members|format_number}</td>
			<td>{$ranks.$id.villages}</td>
			<td>{$ranks.$id.cuttrought_villages|format_number}</td>
		</tr>
	{/foreach}
</table>

<table class="vis" width="100%"><tr>
{if $site!=1}
	<td align="center">
	<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally&amp;site={$site-1}">&lt;&lt;&lt; &#238;n sus</a></td>
{/if}
<td align="center">
<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally&amp;site={$site+1}">&#238;n jos &gt;&gt;&gt;</a></td>
</tr></table>
<table class="vis" width="100%"><tr> 
 
 
<td style="padding-right:10px; text-align: center;" width="50%"> 
<form action="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally" method="post"> 
Loc: <input name="from" type="text" value="0" size="6" /> 
 <input type="submit" value="OK" /> 
</form> 
</td> 
 
<td style="padding-right:10px;text-align: center;"  width="50%"> 
<form action="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally&amp;search=" method="post"> 
Caut&#259;: <input name="name" type="text" value="" size="20" /> 
<input type="submit" value="OK" /> 
</form> 
</td> 
</tr> 
 
</table>

<table class="vis" width="100%"><tr> 
<td>
<center><b>
<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally&amp;site=1">1</a> &nbsp;<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally&amp;site=2">2</a> &nbsp;<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally&amp;site=3">3</a> &nbsp;<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally&amp;site=4">4</a> &nbsp;<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally&amp;site=5">5</a> &nbsp;<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally&amp;site=6">6</a> &nbsp;<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally&amp;site=7">7</a> &nbsp;<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally&amp;site=8">8</a> &nbsp;<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally&amp;site=9">9</a> &nbsp;<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally&amp;site=10">10</a> &nbsp;</center></b></td></tr></table>

						            		</td>