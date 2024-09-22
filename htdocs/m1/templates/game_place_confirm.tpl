{php}
	include('include/config.php');

	$test = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$this->_tpl_vars['info_village']['userid']."'"));

	if($this->_tpl_vars['type'] == 'attack' && $this->_tpl_vars['user']['id'] == $this->_tpl_vars['info_village']['userid']){
		$error = parse("Voc&ecirc; n&atilde;o pode enviar ataques a suas aldeias!");
		header("Location: game.php?village=".$this->_tpl_vars['village']['id']."&screen=place&error=$error");
	}
	if($config['village_limit']){
		$unit = $this->_tpl_vars['send_units'];
		if($this->_tpl_vars['user']['villages'] >= $config['villages_limit'] && $this->_tpl_vars['type'] == 'attack' && $unit['unit_snob'] >= 1){
			$error = parse("Voc&ecirc; j&aacute; atingiu o limite de aldeias!");
			header("Location: game.php?village=".$this->_tpl_vars['village']['id']."&screen=place&error=$error");
		}
	}
	if($test['sleep'] == '1'){
		$error = parse("Este jogador est&aacute; sob prote&ccedil;&atilde;o do modo noturno.");
		header("Location: game.php?village=".$this->_tpl_vars['village']['id']."&screen=place&error=$error");
	}

	$timp = time();

	if($timp < $test['noob_protection'] && $this->_tpl_vars['type'] == 'attack'){
		$error = parse("O jogador ".$this->_tpl_vars['info_user']['username']." est&aacute; sob prote&ccedil;&atilde;o, voc&ecirc; poder&aacute; ataca-lo apartir de ".date("d.m.Y, H:i:s", $test['noob_protection']).".");
		header("Location: game.php?village=".$this->_tpl_vars['village']['id']."&screen=place&error=$error");
	}
	$internet_share = mysql_num_rows(mysql_query("SELECT * FROM `share` WHERE `id_to` = '".$test['id']."' AND `id_from` = '".$this->_tpl_vars['user']['id']."'"));
	if($internet_share == '1' && ($this->_tpl_vars['type'] == 'support')){
		$error = parse("N&atilde;o &eacute; permitido este tipo de comando entre jogadores que partilham a mesma conex&atilde;o!");
		header("Location: game.php?village=".$this->_tpl_vars['village']['id']."&screen=place&error=$error");
	}
	if(!$config['send_support'] && $this->_tpl_vars['info_village']['userid'] != $this->_tpl_vars['user']['id'] && $this->_tpl_vars['type'] == 'support'){
		$error = parse("Voc&ecirc; s&oacute; pode enviar apoios entre suas pr&oacute;prias aldeias!");
		header("Location: game.php?village=".$this->_tpl_vars['village']['id']."&screen=place&error=$error");
	}
	if(empty($error)){
{/php}
{if $type=="attack"}
	<h2>Ataque</h2>
{else}
	<h2>Apoio</h2>
{/if}

	<form action="game.php?village={$village.id}&amp;screen=place&amp;action=command&amp;h={$hkey}" method="post" onSubmit="this.submit.disabled=true;">
		<input type="hidden" name="{$type}" value="true">
		<input type="hidden" name="x" value="{$values.x}">
		<input type="hidden" name="y" value="{$values.y}">
		<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-left:5px;">
			<tr><th colspan="2">Comando</th></tr>
			<tr><td>Destino:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$info_village.id}">{$info_village.name} ({$values.x}|{$values.y}) K{$info_village.continent}</a></td></tr>
			<tr><td>Jogador:</td><td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$info_village.userid}">{$info_user.username}</a></td></tr>
			<tr><td>Dura&ccedil;&atilde;o:</td><td>{$unit_runtime+1|format_time}</td></tr>
			<tr><td>Chegada:</td><td>{$arrival|format_date|replace:"heute um":"hoje &agrave;s"|replace:"Uhr":""|replace:"am":"em"|replace:"um":"&agrave;s"|replace:"morgen":"amanh&atilde;"}</td></tr>
		</table><br />
		<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-left:5px;">
			<tr>
		    {foreach from=$cl_units->get_array("dbname") item=dbname key=name}
				<th width="50"><div align="center"><img src="../graphic/unit/{$dbname}.png" title="{$name}" alt="" /></div></th>
			{/foreach}
			</tr>
			<tr>
			{foreach from=$cl_units->get_array("dbname") item=dbname key=name}
				{if $send_units.$dbname>0}
			    <td align="center">{$send_units.$dbname}</td>
				{else}
				<td class="hidden" align="center">0</td>
				{/if}
			{/foreach}
			</tr>
		</table><br />
	    {foreach from=$cl_units->get_array("dbname") item=dbname key=name}
    	    <input type="hidden" name="{$dbname}" value="{$send_units.$dbname}">
		{/foreach}
		{if $send_units.unit_catapult>0 && $type!='support'}
		<table class="vis" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-left:5px;">
			<tr>
				<th>Alvo da catapulta:</th>
	            <td>
                    <select name="building" size="1">
                        {foreach from=$cl_builds->get_array("dbname") item=dbname key=id}
                            {if !in_array("catapult_protection", $cl_builds->get_specials($dbname))}
                        		<option label="{$cl_builds->get_name($dbname)}" value="{$dbname}">{$cl_builds->get_name($dbname)}</option>
				{/if}
			   {/foreach}
                    </select>
		    </td>
	        </tr>
	    </table><br />
		{/if}
		<input name="submit" type="submit" onload="this.disabled=false;" value="Confirmar" class="button">
</form>
{php}}else{{/php} <h3 class="error">Foi encontrado um possivel erro, favor entrar em contato com o administrador do servidor!</h3>{php}}{/php}