{php}
$ally_id = $this->_tpl_vars['info']['id'];
global $cl_builds,$cl_units,$pl;
$this->tpl_vars['bb_interpreter'] = new bb_interpreter($cl_builds,$cl_units,$pl);

$ally_description = sql("SELECT `description` FROM `ally` WHERE `id` = '$ally_id'","array");
$this->_tpl_vars['info']['description'] = $this->tpl_vars['bb_interpreter']->load_bb($ally_description,$this->_tpl_vars['village']['id']);
{/php}

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
	<tr><td align="center"><img src="graphic/ally/{$info.image}"></td></tr>
{/if}
<tr><th>Opis</th></tr>
<tr><td align="center">
{php}
$ce4 = Array("+wurde+von+","+gegr%FCndet%0AWendet+euch+bei+Fragen+an+","%0A%0ADieser+Text+kann+von+den+Diplomaten+des+Stammes+ge%E4ndert+werden.");
$cu_ce4 = Array(" zosta³o za³o¿one przez ",". Jeœli masz pytanie, skieruj siê do ","<br/><br/><i>Ten tekst mog¹ zmieniæ dyplomaci plemienia.<i>");
echo str_replace($ce4,$cu_ce4,$this->_tpl_vars['info']['description']);

// {$info.description}

{/php}
</td></tr>
</table>

</td></tr></table>