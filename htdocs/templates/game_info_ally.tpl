<table><tr><td valign="top">

<table class="vis" width="100%">
<tr><th colspan="2">&#206;nsu&#351;iri</th></tr>
<tr><td width="100">Numele tribului:</td><td>{$info.name}</td></tr>
<tr><td>Prescurtare:</td><td>{$info.short}</td></tr>
<tr><td>Num&#259;r de membri:</td><td>{$info.members}</td></tr>
<tr><td>Punctajul celor mai buni 40 juc&#259;tori:</td><td>{$info.best_points|format_number}</td></tr>
<tr><td>Punctaj total:</td><td>{$info.points|format_number}</td></tr>
<tr><td>Punctaj mediu:</td><td>{$info.cutthroungt|format_number}</td></tr>
<tr><td>Loc:</td><td>{$info.rank}</td></tr>

<tr><td>Homepage:</td><td><a href="{$ally.homepage}" target="_blank">{$ally.homepage}</a></td></tr>
{if !empty($ally.irc)}
    <tr><td>IRC-Channel:</td><td>{$ally.irc}</td></tr>
{/if}

<tr><td colspan="2" align="center"><a href="game.php?village={$village.id}&amp;screen=info_member&amp;id={$info.id}">Membri</a></td></tr>
</table>

</td><td valign="top">

<table class="vis" width="300">
{if !empty($info.image)}
	<tr><td align="center"><img src="./graphic/ally/{$info.image}"></td></tr>
{/if}
<tr><th>Descriere</th></tr>
<tr><td align="center">{php}
$ce2 = Array("wurde von"," gegründet","Wendet euch bei Fragen an","Dieser Text kann von den Diplomaten des Stammes geändert werden.");
$cu_ce2 = Array("a fost creat de",".","Adresati orice intrebare lui","Acest text poate fi schimbat/editat de liderii tribului.");
echo bb_format(str_replace($ce2,$cu_ce2,$this->_tpl_vars['ally']['description']));
{/php}</td></tr>
</table>

</td></tr></table>