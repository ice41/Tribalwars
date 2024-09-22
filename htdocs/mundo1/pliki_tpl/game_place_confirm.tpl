{php}	
$vid_info = $this->_tpl_vars['info_village']['id'];
$aktuuser = $this->_tpl_vars['user']['id'];
$aktuuserally = $this->_tpl_vars['user']['ally'];

if ($aktuuserally != '-1') {
	$counts = sql("SELECT COUNT(id) FROM `rezerwacje` WHERE `do_wioski` = '$vid_info' AND `od_plemienia` = '$aktuuserally' AND `od_gracza` != '$aktuuser'",'array');
	if ($counts > 0) {
		$this->_tpl_vars['attack_res_error'] = true;
		} else {
		$this->_tpl_vars['attack_res_error'] = false;
		}
	} else {
	$this->_tpl_vars['attack_res_error'] = false;
	}
{/php}

{if $type=="attack" && $attack_res_error}
	<h3 class="error">Nota: Esta Aldeia foi reservada por um jogador da sua tribo</h3>
{/if}

{if $type=="attack"}
	<h2>Ataque</h2>
{else}
	<h2>Apoio</h2>
{/if}

<form action="game.php?village={$village.id}&amp;screen=place&amp;action=command&amp;h={$hkey}" method="post" onSubmit="this.submit.disabled=false;">
	<input type="hidden" name="{$type}" value="true">
	<input type="hidden" name="x" value="{$values.x}">
	<input type="hidden" name="y" value="{$values.y}">
	
	<table class="vis" width="300">
		<tr><th colspan="2">Ordem</th></tr>
		<tr><td>Cel:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$info_village.id}">{$info_village.name} ({$values.x}|{$values.y}) K{$info_village.continent}</a></td></tr>
		<tr><td>Gracz:</td><td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$info_village.userid}">{$info_user.username}</a></td></tr>
		<tr><td>Trwanie:</td><td>{$unit_runtime|format_time}</td></tr>
		<tr><td>Przybycie:</td><td>{if $noc}<span style="color:red;">{$pl->format_date($arrival)}</span>{else}{$pl->format_date($arrival)}{/if}</td></tr>
		{if $type != "support"}
			{if $info_village.userid != "-1"}
				<tr><td>Morale:</td><td>{$morals}%</td></tr>
			{/if}
			<tr><td colspan="2"><img src="/ds_graphic/res.png"> {$max_booty|format_number}</td></tr>
			{if $noc}
				<tr><td colspan="2"><span class="error">Nota: O bônus noturno está ativo</a></td></tr>
			{/if}
		{/if}
	</table>
	<br>
	<table class="vis">
		<tr>
		    {foreach from=$cl_units->get_array("dbname") item=dbname key=name}
				<th width="50"><img src="/ds_graphic/unit/{$dbname}.png" title="{$name}" alt="" /></th>
			{/foreach}
		</tr>
		<tr>
		    {foreach from=$cl_units->get_array("dbname") item=dbname key=name}
				{if $send_units.$dbname>0}
				    <td>{$send_units.$dbname}</td>
				{else}
					<td class="hidden">0</td>
				{/if}
			{/foreach}
		</tr>
	</table>
	<br />
    {foreach from=$cl_units->get_array("dbname") item=dbname key=name}
        <input type="hidden" name="{$dbname}" value="{$send_units.$dbname}">
	{/foreach}
	{* Se as catapultas também foram selecionadas *}
	{if $send_units.unit_catapult>0 && $type!='support'}
	    <table class="vis">
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
	    </table>
	{/if}
	<br />
	<input name="submit" type="submit" value="OK" style="font-size: 10pt; onload="this.disabled=false;"">
</form>