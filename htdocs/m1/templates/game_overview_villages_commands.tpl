{php}
	$commands = mysql_num_rows(mysql_query("SELECT * FROM `movements` WHERE `send_from_user` = '".$this->_tpl_vars['user']['id']."'"));
{/php}
<table class="vis" width="100%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th>Comando ({php}echo $commands;{/php})</th>
		<th>Origem</th>
		<th>Chegada</th>
		{foreach from=$cl_units->get_array("dbname") item=dbname key=name}
		<th width="30"><div align="center"><img src="../graphic/unit/{$dbname}.png" title="{$name}" alt="" /></div></th>
		{/foreach}
	</tr>
	{foreach from=$my_movements item=array}
{php}
	$vill = $this->_tpl_vars['array']['homevillageid'];
	$sql = mysql_fetch_array(mysql_query("SELECT * FROM `villages` WHERE `id`= '".$vill."'"));
{/php}
		{assign var='vid' value=$array.homevillageid}
		{assign var='vid' value=id_$vid}
	<tr class="row_a">
		<td><a href="game.php?village={$village.id}&amp;screen=info_command&amp;id={$array.id}&amp;type=own"><img src="../graphic/command/{$array.type}.png"> {$array.message|replace:"Angriff auf":"Ataque &agrave;"|replace:"Rückkehr von":"Retorno de"|replace:"Rückzug von":"Retirada de"|replace:"Unterstützung für":"Apoio &agrave;"}</a></td>
		<td align="center"><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$array.homevillageid}">{$array.homevillagename}</a></td>
		<td align="center"><span class="timer">{$array.arrival_in+1|format_time}</span></td>
		{foreach from=$array.units item=num}
			{if $num==0}
		<td class="hidden" align="center">0</td>
			{else}
		<td align="center">{$num}</td>
			{/if}
		{/foreach}
	</tr>
	{/foreach}	
</table>