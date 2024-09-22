{php}
$ally_id = $this->_tpl_vars['info']['id'];
global $cl_builds,$cl_units,$pl;
$this->tpl_vars['bb_interpreter'] = new bb_interpreter($cl_builds,$cl_units,$pl);

$ally_description = sql("SELECT `description` FROM `ally` WHERE `id` = '$ally_id'","array");
$this->_tpl_vars['info']['description'] = $this->tpl_vars['bb_interpreter']->load_bb($ally_description,$this->_tpl_vars['village']['id']);
{/php}

<table><tr><td valign="top">

<table class="vis" width="350">
<tr><th colspan="2">Propriedades</th></tr>
<tr><td>Nome da tribo:</td><td>{$info.name}</td></tr>
<tr><td>Sigla:</td><td>{$info.short}</td></tr>
<tr><td>Número de membros:</td><td>{$info.members}</td></tr>
<tr><td>Pontos dos 40 melhores jogadores:</td><td>{$info.best_points|format_number}</td></tr>
<tr><td>Número de pontos:</td><td>{$info.points|format_number}</td></tr>
<tr><td>Média de pontos por jogador:</td><td>{$info.cutthroungt|format_number}</td></tr>
<tr><td>Posição:</td><td>{$info.rank}</td></tr>

<tr><td>Home page:</td><td><a href="{$ally.homepage}" target="_blank">{$ally.homepage}</a></td></tr>
{if !empty($ally.irc)}
    <tr><td>canal IRC:</td><td>{$ally.irc}</td></tr>
{/if}

<tr><td colspan="2" align="center"><a href="game.php?village={$village.id}&amp;screen=info_member&amp;id={$info.id}">Membros</a></td></tr>
</table>

</td><td valign="top">

<table class="vis" width="350">
{if !empty($info.image)}
	<tr><td align="center"><img src="graphic/ally/{$info.image}"></td></tr>
{/if}
<tr><th>Descrição</th></tr>
<tr><td align="center">
{php}
$ce4 = Array("+wurde+von+","+gegr%FCndet%0AWendet+euch+bei+Fragen+an+","%0A%0ADieser+Text+kann+von+den+Diplomaten+des+Stammes+ge%E4ndert+werden.");
$cu_ce4 = Array(" foi criada por ",". Se tem uma pergunta, na cabeça fale com","<br/><br/><i>Este texto pode ser alterado pelos diplomatas da tribo.<i>");
echo str_replace($ce4,$cu_ce4,$this->_tpl_vars['info']['description']);

// {$info.description}

{/php}
</td></tr>
</table>

</td></tr></table>