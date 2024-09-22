{php}
	$sql = mysql_query("SELECT * FROM `movements` WHERE `to_userid` = '".$this->_tpl_vars['user']['id']."' AND `type` != 'cancel'");
	$icomings = mysql_num_rows($sql);
{/php}
<table class="vis" width="100%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th>Comando ({php}echo $icomings;{/php})</th>
		<th>Destino</th>
		<th>Jogador</th>
		<th>Chegada</th>
	</tr>
	{foreach from=$other_movements item=array}
{php}
	$vill = $this->_tpl_vars['array']['to_village'];
	$sql = mysql_fetch_array(mysql_query("SELECT * FROM `villages` WHERE `id`= '".$vill."'"));
{/php}
	<tr style="white-space: nowrap" class="nowrap row_a">
		<td><a href="game.php?village={$village.id}&amp;screen=info_command&amp;id={$array.id}&amp;type=other"><img src="../graphic/command/{$array.type}.png"> {$array.message|replace:"Angriff":"Ataque"|replace:"Unterstützung":"Apoio"} &agrave; {$array.to_villagename}</a></td>
		<td><a href="game.php?village={$array.to_village}&amp;&amp;screen=overview">{$array.to_villagename} ({php}echo $sql['x'];{/php}|{php}echo $sql['y'];{/php}) K{php}echo $sql['continent'];{/php}</a></td>
		<td align="center"><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$array.send_from_user}">{$array.send_from_username}</a></td>
		<td align="center"><span class="timer">{$array.arrival_in+1|format_time}</span></td>
	</tr>
	{/foreach}
</table>