
	<form action="game.php?village={$village.id}&amp;screen=main&amp;mode={$mode}&amp;action=rename&amp;h={$hkey}" method="post">
		<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
			<tr><th colspan="3">Renomear aldeia:</th></tr>
			<tr>
				<td align="center"><input type="text" name="name" value="{$village.name}" /></td>
				<td align="center"><input type="submit" class="button" value="Ok" /></td>
			</tr>
		</table>
	</form><br />
	<form action="" method="post" name="main_core">
		<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
			<tr><th>Op&ccedil;&otilde;es</th></tr>
			<tr><td><label><input type="checkbox" name="hide_full_updates"  onclick="hide_full_update('hide_full_updates')" {php} if ($_COOKIE['hide_full_updates'] == true) { echo 'checked="checked"'; } else { } {/php} /> Ocultar constru&ccedil;&otilde;es terminadas</label></td></tr>
			<tr><td><label><input type="checkbox" name="show_full" onclick="show_fulls('show_full')" {php} if ($_COOKIE['show_full'] == true) { echo 'checked="checked"'; } else { } {/php}/> Mostrar todos os edifi&iacute;cios</label></td></tr>
		</table>
	</form>
</td>
<td width="80%">
	<table>
		<tr>
			<td><img src="../graphic/build/main.jpg" title="Edif&iacute;cio Principal" alt="" /></td>
			<td>
				<h2>Edif&iacute;cio Principal ({$village.main|nivel})</h2>
				{$description}
			</td>
			<td align="right" valign="top" style="white-space:nowrap;"><a href="#" target="_blank">Ajuda - Edif&iacute;cios</a></td>
		</tr>
	</table>
{if $mode == 'build'}
	{if $num_do_build>0}
	<table class="vis" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr>
			<th width="250">Ordem de constru&ccedil;&atilde;o</th>
			<th width="100">Dura&ccedil;&atilde;o</th>
			<th width="150">Conclus&atilde;o</th>
			<th>Cancelamento</th>
		</tr>
		{foreach from=$do_build item=item key=id}
			{assign var="buildname" value=$do_build.$id.build}
			{if $id==0}
		<tr class="lit">
			{else}
		<tr>
			{/if}
			<td>{$cl_builds->get_name($buildname)} ({$do_build.$id.stage|nivel})</td>
			{if $id == 0}
				{if $do_build.$id.finished < $time}
			<td align="center">{$do_build.$id.dauer+1|format_time}</td>
				{else}
			<td align="center"><span class="timer">{$do_build.$id.dauer+1|format_time}</span></td>
				{/if}
			{else}
			<td align="center">{$do_build.$id.dauer+1|format_time}</td>
			{/if}
			<td align="center">{$do_build.$id.finished|format_date|replace:'heute um':'hoje &agrave;s'|replace:'Uhr':''|replace:'am':'em'|replace:'um':'&agrave;s'|replace:'morgen':'amanh&atilde;'}</td>
			<td align="center"><a href="javascript:ask('Tem certeza que quer cancelar a ordem de contru&ccedil;&atilde;o?', 'game.php?village={$village.id}&amp;screen=main&amp;action=cancel&amp;id={$do_build.$id.r_id}&amp;mode=build&amp;h={$hkey}')">cancelar</a></td>
		</tr>
		{/foreach}
		{if $num_do_build > 2}
		<tr>
			<td colspan="4">Custo adicional para adicionar a pr&oacute;xima oderm de contri&ccedil;&atilde;o: <b>{$cl_builds->get_buildsharpens_costs($num_do_build)}%</b><br />
			<small>Em caso de cancelamento o custo adicional n&atilde;o ser&aacute; reembolssdo!</small></td>
		</tr>
		{/if}
	</table><br />
	{/if}

	{if !empty($error)}
		<div class="error">{$error|replace:"Es sind nicht genügend Rohstoffe vorhanden.":"N&atilde;o h&aacute; recursos suficientes dispon&iacute;veis."|replace:"Dein Speicher ist zu klein.":"O armaz&eacute;m &eacute; muito pequeno."|replace:"Gebäude wurde vollständig ausgebaut.":"O edif&iacute;cio j&aacute; est&aacute; totalmente constru&iacute;do."|replace:"Zu wenig Rohstoffe um in der Bauschleife zu produzieren.":"N&atilde;o existe recursos suficientes para adicionar est&aacute; ordem de constru&ccedil;&atilde;o."}</div><br />
	{/if}
	{if $renome}
		<div class="succes">{$sucesso}</div><br />
	{/if}
	<table class="vis" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr>
			<th width="350">Edif&iacute;cios</th>
			<th width="40"><center><img src="../graphic/icons/wood.png" /></center></th>
			<th width="40"><center><img src="../graphic/icons/stone.png" /></center></th>
			<th width="40"><center><img src="../graphic/icons/iron.png" /></center></th>
			<th width="40"><center><img src="../graphic/icons/farm.png" /></center></th>
			<th width="100">Dura&ccedil;&atilde;o</th>
			<th width="300">Construir</th>
		</tr>
	{foreach from=$fulfilled_builds item=dbname key=id}
{php}$village_stage = $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; $max_stage = $this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['dbname']); if ($village_stage == $max_stage && $_COOKIE['hide_full_updates'] == true) { } else {{/php}
		<tr id="hide_build({$dbname})">
			<td><a href="javascript:popup('popup_building.php?building={$dbname}', 520, 520)"><img src="../graphic/icons/help.png" width="15"/></a> <a href="game.php?village={$village.id}&screen={$dbname}"><img src="../graphic/buildings/{$dbname}.png"> {$cl_builds->get_name($dbname)}</a> <span style="float:right;">({$village.$dbname|nivel})</span></td>
		{if $cl_builds->get_maxstage($dbname) <= $build_village.$dbname}
			<td colspan="6" align="center" class="inactive">Edif&iacute;cio totalmente constru&iacute;do</td>
		{else}
			<td align="center">{$cl_builds->get_wood($dbname,$build_village.$dbname+1)}</td>
			<td align="center">{$cl_builds->get_stone($dbname,$build_village.$dbname+1)}</td>
			<td align="center">{$cl_builds->get_iron($dbname,$build_village.$dbname+1)}</td>
			<td align="center">{if $cl_builds->get_bh($dbname,$build_village.$dbname+1)>0}{$cl_builds->get_bh($dbname,$build_village.$dbname+1)}{/if}</td>
			<td align="center">{$cl_builds->get_time($village.main,$dbname,$build_village.$dbname+1)+1|format_time}</td>
			{$cl_builds->build($village,$id,$build_village,$plus_costs)}
			{if $cl_builds->get_build_error2()=='not_enough_ress'}
			<td class="inactive" align="center">
				<span>Recursos disponiveis em <span class="timer">{$cl_builds->get_build_error()}</span></span>
				<span style="display:none">Recursos dispooniveis</span>
			</td>
			{elseif $cl_builds->get_build_error2()=='not_enough_ress_plus'}
			<td class="inactive" align="center">Recursos insuficientes para adicionar novas ordens de constru&ccedil;&atilde;o.</td>
			{elseif $cl_builds->get_build_error2()=='not_fulfilled'}
			<td class="inactive" align="center">Requerimentos n&atilde;o atingidos</td>
			{elseif $cl_builds->get_build_error2()=='not_enough_bh'}
			<td class="inactive" align="center">N&atilde;o existe espa&ccedil;o suficiente na fazenda.</td>
			{elseif $cl_builds->get_build_error2()=='not_enough_storage'}
			<td class="inactive" align="center">Armaz&eacute;m &eacute; muito pequeno.</td>
			{else}
{php}
	$nivel = $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; 
	$n_max = $this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['dbname']);
	$c1 = ceil(($nivel*100)/$n_max);
	$c2 = $c1;
{/php}
				{if $build_village.$dbname < 1}
					{if count($do_build) > 2 && $user.confirm_queue == 1}
			<td align="center"><a href="javascript:ask('Est&aacute; ordem de constru&ccedil;&atilde;o ter&aacute; custos extras, deseja continuar?', 'game.php?village={$village.id}&amp;screen=main&amp;action=build&amp;id={$dbname}&amp;force&amp;h={$hkey}')">Construir</a></td>
					{else}
			<td align="center"><a href="game.php?village={$village.id}&screen=main&action=build&id={$dbname}&h={$hkey}">Construir</a></td>
					{/if}
				{else}
					{if count($do_build) > 2 && $user.confirm_queue == 1}
			<td>
				<table cellpadding="0" rowspacing="0" cellspacing="0">
					<tr>
						<td width="300" align="center" title="{php}echo $c1;{/php}%">
							<div class="progress" title="{php}echo $c1;{/php}%"><div class="progress data" style="width:{php}echo $c2;{/php}%;" title="{php}echo $c1;{/php}%">&nbsp;</div></div>
						</td>
						<td align="center">
							<a href="javascript:ask('Est&aacute; ordem de constru&ccedil;&atilde;o ter&aacute; custos extras, deseja continuar?', 'game.php?village={$village.id}&amp;screen=main&amp;action=build&amp;id={$dbname}&amp;force&amp;h={$hkey}')"><img src="../graphic/icons/plus.png"></a>
						</td>
					</tr>
				</table>
			</td>
					{else}
			<td>
				<table cellpadding="0" rowspacing="0" cellspacing="0">
					<tr>
						<td width="300" align="center" title="{php}echo $c1;{/php}%">
							<div class="progress" title="{php}echo $c1;{/php}%"><div class="progress data" style="width:{php}echo $c2;{/php}%;" title="{php}echo $c1;{/php}%">&nbsp;</div></div>
						</td>
						<td align="center">
							<a href="game.php?village={$village.id}&screen=main&action=build&id={$dbname}&h={$hkey}"><img src="../graphic/icons/plus.png"></a>
						</td>
					</tr>
				</table>
			</td>
					{/if}
				{/if}
			{/if}
		{/if}
		</tr>
{php}}{/php}
	{/foreach}
{php}
	if($_COOKIE['show_full']){
{/php}
{foreach from=$cl_builds->get_array('dbname') item=dbname}
	{if $cl_builds->get_needed_by_dbname($dbname)}
{php}
	$select = mysql_fetch_array(mysql_query("SELECT * FROM villages WHERE id = '".$_GET['village']."'"));
	$dbname = $this->_tpl_vars['dbname'];
	if($select[$dbname] <= 0){ 
{/php}
		<tr>
			<td><a href="javascript:popup('popup_building.php?building={$dbname}', 520, 520)"><img src="../graphic/icons/help.png" width="15"/></a> <a href="game.php?village={$village.id}&screen={$dbname}"><img src="../graphic/buildings/{$dbname}.png"> {$cl_builds->get_name($dbname)}</a></td>
			<td colspan="6" align="center" class="inactive">Necess&aacute;rio: {foreach from=$cl_builds->get_needed_by_dbname($dbname) key=n_building item=n_stage}<a href="javascript:popup('popup_building.php?building={$n_building}', 520, 520)"><img src="../graphic/buildings/{$n_building}.png">{$cl_builds->get_name($n_building)}</a> ({$n_stage|nivel})
{/foreach}</td>
{php}
	}
{/php}
	{/if}
{/foreach}
		</tr>
{php} } {/php}
	</table>
{elseif $mode == 'destroy'}
	{include file="game_main_destroy.tpl"}
{/if}
</td>