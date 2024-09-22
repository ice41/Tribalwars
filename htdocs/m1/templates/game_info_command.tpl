{if !empty($error)}
<div class="error">{$error|replace:"Befehl existiert nicht mehr!":"Comando inexistente!"|replace:"Type nicht übergeben!":"Comando inexistente!"}</div>
{else}
<h2>{$mov.message|replace:"Angriff auf":"Ataque &agrave;"|replace:"Rückkehr von":"Retorno de"|replace:"für":"&agrave;"|replace:"Unterstützung":"Apoio"|replace:"Angriff":"Ataque"}</h2>
	{if $type=='own'}
<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-left:5px;">
	<tr><th colspan="2">Comando</th></tr>
{php}
	$vill = $this->_tpl_vars['mov']['to_village'];
	$sql = mysql_fetch_array(mysql_query("SELECT * FROM `villages` WHERE `id`= '".$vill."'"));
{/php}
	<tr><td>Aldeia:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$mov.to_village}">{$mov.to_villagename} ({$mov.to_x}|{$mov.to_y}) K{php}echo $sql['continent'];{/php}</a></td></tr>
	<tr><td>Jogador:</td><td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$mov.to_userid}">{if empty($mov.to_username)}---{else}{$mov.to_username}{/if}</a></td></tr>
	<tr><td>Dura&ccedil;&atilde;o:</td><td>{$mov.duration}</td></tr>
	<tr><td>Chegada:</td><td>{$mov.arrival|replace:"heute um":"hoje &agrave;s"|replace:"Uhr":""|replace:"am":"em"|replace:"um":"&agrave;s"|replace:"morgen":"amanh&atilde;"}</td></tr>
	<tr><td>Chegada em:</td><td><span class="timer">{$mov.arrival_in}</span></td></tr>
{php}
	$vill2 = $this->_tpl_vars['mov']['from_village'];
	$sql2 = mysql_fetch_array(mysql_query("SELECT * FROM `villages` WHERE `id`= '".$vill2."'"));
{/php}
	<tr><td>Origem:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$mov.from_village}">{$mov.from_villagename} ({$mov.from_x}|{$mov.from_y}) K{php}echo $sql2['continent'];{/php}</a></td></tr>
	<tr><td colspan="2"><a href="game.php?village={$village.id}&amp;&amp;screen=map&x={$mov.to_x}&y={$mov.to_y}">&raquo; Centralizar no mapa</a></td></tr>
	<tr><td colspan="2"><a href="game.php?village={$village.id}&amp;&amp;screen=place">&raquo; Pra&ccedil;a de reuni&atilde;o</a></td></tr>
		{if $mov.cancel}
	<tr><td colspan="2"><a href="game.php?village={$village.id}&screen=place&action=cancel&id={$mov.id}&h={$hkey}">&raquo; Cancelar comando</a></td></tr>
		{/if}	
</table><br />
<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-left:5px;">
	<tr>
		{foreach from=$cl_units->get_array("dbname") item=dbname key=name}
		<th width="50"><img src="../graphic/unit/{$dbname}.png" title="{$name}" alt="" /></th>
		{/foreach}
	</tr>
	<tr>
		{foreach from=$mov.units item=num_units}{if $num_units>0}<td>{$num_units}</td>{else}<td class="hidden">0</td>{/if}{/foreach}
	</tr>
</table>
		{if $mov.wood!=0 || $mov.stone!=0 || $mov.iron!=0}
<table class="vis"><tr>
	<td>Saque:</td><td>{if $mov.wood>0}<img src="../graphic/icons/wood.png" title="Madeira" alt="" />{$mov.wood} {/if}{if $mov.stone>0}<img src="../graphic/icons/stone.png" title="Argila" alt="" />{$mov.stone} {/if}{if $mov.iron>0}<img src="../graphic/icons/iron.png" title="Ferro" alt="" />{$mov.iron} {/if}</td>
</tr></table>
		{/if}
	{else}
<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-left:5px;">
	<tr><th colspan="2">Comando</th></tr>
{php}
	$vill = $this->_tpl_vars['mov']['from_village'];
	$sql = mysql_fetch_array(mysql_query("SELECT * FROM `villages` WHERE `id`= '".$vill."'"));
{/php}
	<tr><td>Origem:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$mov.from_village}">{$mov.from_villagename} ({$mov.from_x}|{$mov.from_y}) K{php}echo $sql['continent'];{/php}</a></td></tr>
	<tr><td>Jogador:</td><td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$mov.from_userid}">{$mov.from_username}</a></td></tr>
	<tr><td>Chegada:</td><td>{$mov.arrival|replace:"heute um":"hoje &agrave;s"|replace:"Uhr":""|replace:"am":"em"|replace:"um":"&agrave;s"|replace:"morgen":"amanh&atilde;"}</td></tr>
	<tr><td>Chegada em:</td><td><span class="timer">{$mov.arrival_in}</span></td></tr>
</table>
	{/if}
{/if}