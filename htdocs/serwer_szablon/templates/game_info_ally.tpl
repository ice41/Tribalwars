<table><tr><td valign="top">

<table class="vis" width="350">
<tr><th colspan="2">W³aœciwoœci</th></tr>
<tr><td>Nazwa plemienia:</td><td>{$info.name}</td></tr>
<tr><td>Skrót:</td><td>{$info.short}</td></tr>
<tr><td>Liczba cz³onków:</td><td>{$info.members}</td></tr>
<tr><td>Punkty 40 najlepszych graczy:</td><td>{$info.best_points|format_number}</td></tr>
<tr><td>Liczba punktów:</td><td>{$info.points|format_number}</td></tr>
<tr><td>Œrednia punktów na gracza:</td><td>{$info.cutthroungt|format_number}</td></tr>
<tr><td>Ranking:</td><td>{$info.rank}</td></tr>

<tr><td>Strona domowa:</td><td><a href="{$ally.homepage}" target="_blank">{$ally.homepage}</a></td></tr>
{if !empty($ally.irc)}
    <tr><td>IRC-Kana³:</td><td>{$ally.irc}</td></tr>
{/if}

<tr><td colspan="2" align="center"><a href="game.php?village={$village.id}&amp;screen=info_member&amp;id={$info.id}">Cz³onkowie</a></td></tr>
</table>

</td><td valign="top">

<table class="vis" width="350">
{if !empty($info.image)}
	<tr><td align="center"><img src="./graphic/ally/{$info.image}"></td></tr>
{/if}
<tr><th>Opis</th></tr>
<tr><td align="center">{$info.description}</td></tr>
</table>

</td></tr></table>