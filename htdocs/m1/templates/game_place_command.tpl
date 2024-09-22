{if !empty($error)}
	{if $error=='Es wurden keine Einheiten gewählt.'}
		{assign var='error' value='Nenhuma unidade selecionada.'}
	{/if}
	{if $error=='Nicht genügend Einheiten vorhanden.'}
		{assign var='error' value='Tropas insuficientes.'}
	{/if}
	{if $error=='Keine Koordinaten angegeben.'}
		{assign var='error' value='Nenhuma cordenada inserida.'}
	{/if}
	<div class="error">{$error|replace:"Das Ziel steht noch unter Anfangsschutz.":"Jogador sob prote&ccedil;&atilde;o de iniciantes."|replace:"Du darfst erst heute um ":"A prote&ccedil;&atilde;o termina em "|replace:" Uhr angreifen.":"."}</div>
{/if}
<h3>Enviar tropas</h3>
<form name="units" action="game.php?village={$village.id}&amp;screen=place&amp;try=confirm" method="post">
	<table width="100%">
		<tr>
		{assign var=counter value=0}
		{foreach from=$group_units key=group_name item=value}
			<td width="150" valign="top" style="background:none;">
				<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
			{foreach from=$group_units.$group_name item=dbname}
				{math assign=counter equation="x + y" x=$counter y=1}
					<tr>
						<td>
							<img src="../graphic/unit/{$dbname}.png" alt="{$cl_units->get_name($dbname)}" style="vertical-align: -4px;"> 
							<input id="input_{$dbname}" name="{$dbname}" type="text" size="5" value="" class="unitsInput"> 
							<a href="javascript:insertUnit($('#input_{$dbname}'), {$units.$dbname})">({$units.$dbname})</a>
						</td>
					</tr>
			{/foreach}
				</table>
			</td>
		{/foreach}
		</tr>
	</table>
	<table>
		<tr><td style="background: none;"><a id="selectAllUnits" href="javascript:selectAllUnits(true);">&raquo; Todas as tropas</a></td></tr>
		<tr>
			<td style="background: none;">
				X: <input type="text" name="x" id="inputx" value="{$values.x}" size="5" maxlength="3" onkeyup="xProcess('inputx', 'inputy')">
				Y: <input type="text" name="y" id="inputy" value="{$values.y}" size="5" maxlength="3">
			</td>
			{if $user.villages>1}
			<td>
{php}
	$userid = $this->_tpl_vars['user']['id'];
	$villid = $this->_tpl_vars['village']['id'];
	$villages = mysql_query("SELECT * FROM `villages` WHERE `userid` = '$userid' ORDER BY `name` ASC");
	$rows = mysql_num_rows($villages);
	if($rows > 0){
		while($a = mysql_fetch_assoc($villages)){
			if($a['id'] != $villid){
				$id[] = $a['id'];
				$x[] = $a['x'];
				$y[] = $a['y'];
				$name[] = $a['name'];
				$continent[] = $a['continent'];
			}
		}
{/php}
			<select name="target" size="1" onchange="insertCoord(document.forms[0], this)" style="text-align:center;">
			    <option disabled="disabled" selected="selected">-> Suas aldeias <-</option>
			  {php} foreach($id as $key => $value){
			    echo '<option value="'.$x[$key].'|'.$y[$key].'">'.entparse($name[$key]).' ('.$x[$key].'|'.$y[$key].') K'.$continent[$key].'</option>';
			   } {/php}
			 </select>
{php}
	}
{/php}
			</td>
			{/if}
			<td rowspan="2"><input class="button red" name="attack" type="submit" value="Atacar" /></td>
			<td rowspan="2"><input class="button green" name="support" type="submit" value="Apoiar" /></td>
		</tr>
	</table>
</form>
{if count($my_movements) > 0}
<h3>Seus movimentos</h3>
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th>Comando</th>
		<th>Chegada</th>
		<th>Chegada em</th>
	</tr>
	{foreach from=$my_movements item=array}
	<tr>
		<td>
			<a href="game.php?village={$village.id}&amp;screen=info_command&amp;id={$array.id}&amp;type=own">
				<img src="../graphic/command/{$array.type}.png"> {$array.message|replace:"Angriff auf":"Ataque &agrave;"|replace:"Rückkehr von":"Retorno de"|replace:"Rückzug von":"Retirada de"|replace:"Unterstützung für":"Apoio &agrave;"}
			</a>
		</td>
		<td>{$array.end_time|format_date|replace:"heute um":"hoje &agrave;s"|replace:"Uhr":""|replace:"am":"em"|replace:"um":"&agrave;s"|replace:"morgen":"amanh&atilde;"}</td>
		{if $array.arrival_in < 0}
		<td>{$array.arrival_in+1|format_time}</td>
		{else}
		<td><span class="timer">{$array.arrival_in+1|format_time}</span></td>
		{/if}
		{if $array.can_cancel}
		<td><a href="game.php?village={$village.id}&amp;screen=place&amp;action=cancel&amp;id={$array.id}&amp;h={$hkey}">Cancelar</a></td>
		{/if}
	</tr>
	{/foreach}
</table>
{/if}


{if count($other_movements)>0}
<h3>Tropas em chegada</h3>
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th>Comando</th>
		<th>Chegada</th>
		<th>Chegada em</th>
	</tr>
	{foreach from=$other_movements item=array}
	    <tr>
	        <td>
	            <a href="game.php?village={$village.id}&amp;screen=info_command&amp;id={$array.id}&amp;type=other">
	            <img src="../graphic/command/{$array.type}.png"> {$array.message|replace:"Angriff":"Ataque"|replace:"von":"de"|replace:"Unterstützung":"Apoio"}
	            </a>
	        </td>
	        <td>{$array.end_time|format_date|replace:"heute um":"hoje &agrave;s"|replace:"Uhr":""|replace:"am":"em"|replace:"um":"&agrave;s"|replace:"morgen":"amanh&atilde;"}</td>
	        {if $array.arrival_in < 0}
	        	<td>{$array.arrival_in+1|format_time}</td>
	        {else}
	        	<td><span class="timer">{$array.arrival_in+1|format_time}</span></td>
	        {/if}
	    </tr>
	{/foreach}
</table>
{/if}