{php}
if (!isset($this->_tpl_vars['cl_builds'])) {
	global $cl_builds;
	$this->assign('cl_builds',$cl_builds);
	}
$this->_tpl_vars['dbname'] = $this->_tpl_vars['screen'];
$this->_tpl_vars['aktu_build_prc'] = $this->_tpl_vars['village'][$this->_tpl_vars['dbname']] / $this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['dbname']);
{/php}
<table>
	<tr>
		<td>
			{if $cl_builds->get_maxstage($dbname) > 3}
				{if $aktu_build_prc > 0.5}
					<img src="/ds_graphic/big_buildings/{$dbname}3.png" title="{$cl_builds->get_name($dbname)}" alt="" />
				{else}
					{if $aktu_build_prc > 0.2}
						<img src="/ds_graphic/big_buildings/{$dbname}2.png" title="{$cl_builds->get_name($dbname)}" alt="" />
					{else}
						<img src="/ds_graphic/big_buildings/{$dbname}1.png" title="{$cl_builds->get_name($dbname)}" alt="" />
					{/if}
				{/if}
			{else}
				<img src="/ds_graphic/big_buildings/{$dbname}1.png" title="{$cl_builds->get_name($dbname)}" alt="" />
			{/if}
		</td>
		<td>
			<h2>{$cl_builds->get_name($dbname)} ({if $village.$dbname > 0}Nível {$village.$dbname}{else}Não construído{/if})</h2>
			{$cl_builds->get_description_bydbname($dbname)}
		</td>
	</tr>
</table>
<br />
{if $display_modes}
	<table class="vis modemenu">
		<tbody>
			<tr>
				{foreach from=$modes key=modename item=modephp}
					{if $modephp == $mode}
						<td class="selected" width="100"><a href="game.php?village={$village.id}&amp;screen=main&amp;mode={$modephp}">{$modename} </a></td>
					{else}
						<td width="100"><a href="game.php?village={$village.id}&amp;screen=main&amp;mode={$modephp}">{$modename} </a></td>
					{/if}
				{/foreach}
			</tr>
		</tbody>
	</table>
{/if}

{if $mode == 'build'}

	{* LEIA TODOS OS EDIFÍCIOS NO CICLO DE CONSTRUÇÃO *}
	{if $num_do_build>0}
		<table class="vis">
<tbody class="ui-sortable" id="buildqueue">
	<tr>
		<th style="width: 23%">Comando de construção</th>
		<th>Czas</th>
		<th>Gotowe</th>
		<th style="width: 15%">Cancelar</th>
		<th style="background:none !important;"></th>	</tr>
			{foreach from=$do_build item=item key=id}
		<tr class="lit nodrag buildorder_wood">
		<td class="lit-item">
			
			<img src="http://beta.tribalwars.net/graphic/buildings/mid/{$dbname}1.png" title="{$cl_builds->get_name($buildname)}" style="float: left; margin-right: 8px" alt="">
			{$cl_builds->get_name($buildname)} <br> nível {$do_build.$id.stage}		</td>
		<td class="nowrap lit-item">
			<span class="timer">{$do_build.$id.dauer|format_time}</span>
		</td>
										<script type="text/javascript">
							setTimeout(function() {ldelim}
								$('.order_feature_reduce:first').hide();
								$('.order_feature_instant').show();
							{rdelim}, {$do_build.$id.finished});
						</script>
		<td class="lit-item">{$pl->format_date($do_build.$id.finished)}</td>
		<td class="lit-item">
			<a class="btn btn-cancel" href="game.php?village={$village.id}&amp;screen=main&amp;action=cancel&amp;id={$do_build.$id.r_id}&amp;mode=build&amp;h={$hkey}">Cancelar</a>
		</td>
			</tr>

	
			{/foreach}


			</tbody>


			{* CUSTOS ADICIONAIS PARA O PRÓXIMO PEDIDO*}
			{if $num_do_build>2}
				<tr>
					<td colspan="4">
						Custos de construção adicionais devido à longa lista de construção: <b>{$cl_builds->get_buildsharpens_costs($num_do_build)}%</b><br />
						<small>Custos adicionais de construção não serão reembolsados ​​em caso de cancelamento</small>
					</td>
				</tr>
			{/if}
		</table>
		<br />
	{/if}
	
	{if $num_do_destory > 0}
		<table class="vis">
<tbody class="ui-sortable" id="buildqueue">


			</tbody>
		<tr>
				<th width="250">Comando de demolição</th>
				<th width="100">Duração</th>
				<th width="150">Preparar</th>
				<th>Przerwij</th>
			</tr>
			{foreach from=$do_destory item=item key=id}
				{assign var="buildname" value=$do_destory.$id.build}
				{if $id==0}
					<tr class="lit">
				{else}
					<tr>
				{/if}
					<td>{$cl_builds->get_name($buildname)} (zburz poziom)</td>
					{if $id==0}
						{if $do_destory.$id.finished<$time}
							<td>{$do_destory.$id.dauer|format_time}</td>
						{else}
							<td><span class="timer">{$do_destory.$id.dauer|format_time}</span></td>
						{/if}
					{else}
						<td>{$do_destory.$id.dauer|format_time}</td>
					{/if}
					<td>
						{$pl->format_date($do_destory.$id.finished)}
					</td>
					<td>
						<a href="game.php?village={$village.id}&amp;screen=main&mode=build&amp;action=cancel_dest&amp;id={$do_destory.$id.r_id}&amp;h={$hkey}" class="btn btn-cancel">Cancelar</a>
					</td>
				</tr>
			{/foreach}
		</table>
		<br />
	{/if}

	{if !empty($error)}
		<font class="error">{$error}</font>
	{/if}

	{literal}<script type="text/javascript">
//<![CDATA[
	$(document).ready(function() {
		{/literal}BuildingMain.upgrade_building_link = 'game.php?village={$village.id}&akcja=build&screen=main&h={$hkey}';
		BuildingMain.downgrade_building_link = 'game.php?village={$village.id}&akcja=d_build&screen=main&h={$hkey}';
		BuildingMain.confirm_queue = false;
		BuildingMain.mode = 0;
		$( '.inactive img' ).fadeTo( 0, .5 );{literal}
	});
//]]>
</script>{/literal}

<form name="budowanie" action="game.php?village={$village.id}&screen=main&action=build&h={$hkey}" method="POST">
<div id="building_wrapper">
<input name="id" value="-1" type="hidden"/>
	
	<table id="buildings" class="vis nowrap" style="width: 100%; line-height: 17px">
		<tbody><tr>
			<th style="width: 23%">Edifícios</th>
			<th colspan="5">Requisitos</th>
			<th style="width: 30%">Construir</th>
		</tr>
				{foreach from=$fulfilled_builds item=dbname key=id}
	<tr id="main_buildrow_{$dbname}">
			<td style="text-align: left">
				<a href="game.php?village={$village.id}&amp;screen={$dbname}"><img src="http://beta.tribalwars.net/graphic/buildings/mid/{$dbname}1.png" title="{$cl_builds->get_name($dbname)}" style="float: left; margin-right: 8px" alt=""></a>
				<a href="game.php?village={$village.id}&amp;screen={$dbname}">{$cl_builds->get_name($dbname)}</a><br>
				{if $village.$dbname > 0}Nível {$village.$dbname}{else}Não construído{/if}			</td>
{if $cl_builds->get_maxstage($dbname)<=$build_village.$dbname}
						<td colspan="7" align="center" class="inactive">
							O edifício está totalmente desenvolvido
						</td>
					{else}
				<td><span class="icon header wood"> </span>{if $cl_builds->get_wood($dbname,$build_village.$dbname+1) > $village.r_wood}<font color="red">{$cl_builds->get_wood($dbname,$build_village.$dbname+1)|format_number}</font>{else}{$cl_builds->get_wood($dbname,$build_village.$dbname+1)|format_number}{/if}</td>
				<td><span class="icon header stone"> </span>{if $cl_builds->get_stone($dbname,$build_village.$dbname+1) > $village.r_stone}<font color="red">{$cl_builds->get_stone($dbname,$build_village.$dbname+1)|format_number}</font>{else}{$cl_builds->get_stone($dbname,$build_village.$dbname+1)|format_number}{/if}</td>
				<td><span class="icon header iron"> </span>{if $cl_builds->get_iron($dbname,$build_village.$dbname+1) > $village.r_iron}<font color="red">{$cl_builds->get_iron($dbname,$build_village.$dbname+1)|format_number}</font>{else}{$cl_builds->get_iron($dbname,$build_village.$dbname+1)|format_number}{/if}</td>
				<td><span class="icon header time"></span>{$cl_builds->get_time($village.main,$dbname,$build_village.$dbname+1)|format_time}</td>
				<td><span class="icon header population"> </span>{if $cl_builds->get_bh($dbname,$build_village.$dbname+1)>0}{if $cl_builds->get_bh($dbname,$build_village.$dbname+1) > ($max_bh - $village.r_bh)}<font color="red">{$cl_builds->get_bh($dbname,$build_village.$dbname+1)}</font>{else}{$cl_builds->get_bh($dbname,$build_village.$dbname+1)}{/if}{/if}</td>
				
				
									
										{if $can_build.$dbname == 'not_enough_ress'}
							<td class="inactive"><span>Recursos disponíveis às <span class="timer_replace">{$res_timer.$dbname}</span></span><span style="display:none">Pode construir agora</span>
						{elseif $can_build.$dbname == 'not_enough_ress_plus'}
							<td class="inactive">Sem recursos disponíveis!
						{elseif $can_build.$dbname == 'not_fulfilled'}
							<td class="inactive">Não atende aos requisitos deste edifício!
						{elseif $can_build.$dbname == 'not_enough_bh'}
							<td class="inactive">Não há espaço suficiente na fazenda!
						{elseif $can_build.$dbname == 'not_enough_storage'}
							<td class="inactive">Não há espaço suficiente no armazém!
						{else}
							{if $build_village.$dbname < 1}
							<td>	<a class="btn btn-build" id="main_buildlink_main" href="#" onclick="insertUnit(document.forms['budowanie'].id,'{$dbname}');document.forms['budowanie'].submit();">Construir</a>
								
							{else}

							<td><a class="btn btn-build" id="main_buildlink_main" href="#budowanie" onclick="insertUnit(document.forms['budowanie'].id,'{$dbname}');document.forms['budowanie'].submit();">Nível {$build_village.$dbname+1}</a>
							{/if}
						{/if}	
														
										
													</td>{/if}
					</tr>



			{/foreach}


			
	</tbody></table>
	

	</div>


	<br>
	
	<table style="margin: 0pt; padding: 0pt;" width="100%" class="vis">
		<tbody>
			<tr>
				<th colspan="2">Processo de construção da aldeia:</th>
			</tr>
			<tr>
		<td>
<div class="progress-bar"><span class="label">{$village_build_process}%</span><div style="width:{$village_build_process}%"><span style="width: 753px;" class="label">{$village_build_process}%</div></div>	
</td>
			</tr>
		</tbody>
	</table>
	
	<br>
	</form>
	<form action="game.php?village={$village.id}&amp;screen=main&amp;action=change_name&amp;h={$hkey}" method="post">
		<table class="vis" width="300">
			<tr>
				<th colspan="3">Renomear a aldeia</th>
			</tr>
			<tr>
				<td><input type="text" name="name" value="{$village.name}"></td>
				<td><input type="submit" value="Mudar" class="btn">
			</tr>
		</table>
	</form>
	
{/if}

{if $mode == 'destroy'}
	{* LEIA TODOS OS EDIFÍCIOS NO CICLO DE CONSTRUÇÃO *}
	{if $num_do_build>0}
		<table class="vis">
			<tr>
				<th width="250">Comando de construção</th>
				<th width="100">Duração</th>
				<th width="150">Preparar</th>
				<th>Cancelar</th>
			</tr>
			{foreach from=$do_build item=item key=id}
				{assign var="buildname" value=$do_build.$id.build}
				{if $id==0}
					<tr class="lit">
				{else}
					<tr>
				{/if}
					<td>{$cl_builds->get_name($buildname)} (nível {$do_build.$id.stage})</td>
					{if $id==0}
						{if $do_build.$id.finished<$time}
							<td>{$do_build.$id.dauer|format_time}</td>
						{else}
							<td><span class="timer">{$do_build.$id.dauer|format_time}</span></td>
						{/if}
					{else}
						<td>{$do_build.$id.dauer|format_time}</td>
					{/if}
					<td>
						{$pl->format_date($do_build.$id.finished)}
					</td>
					<td>
						<a href="javascript:ask('Tem certeza de que deseja parar de construir?', 'game.php?village={$village.id}&amp;screen=main&mode=destroy&amp;action=cancel&amp;id={$do_build.$id.r_id}&amp;h={$hkey}')">Cancelar</a>
					</td>
				</tr>
			{/foreach}
		</table>
		<br />
	{/if}
	
	{if $num_do_destory > 0}
		<table class="vis">
			<tr>
				<th width="250">Comando de demolição</th>
				<th width="100">Duração</th>
				<th width="150">Preparar</th>
				<th>Cancelar</th>
			</tr>
			{foreach from=$do_destory item=item key=id}
				{assign var="buildname" value=$do_destory.$id.build}
				{if $id==0}
					<tr class="lit">
				{else}
					<tr>
				{/if}
					<td>{$cl_builds->get_name($buildname)} (destruir o nível)</td>
					{if $id==0}
						{if $do_destory.$id.finished<$time}
							<td>{$do_destory.$id.dauer|format_time}</td>
						{else}
							<td><span class="timer">{$do_destory.$id.dauer|format_time}</span></td>
						{/if}
					{else}
						<td>{$do_destory.$id.dauer|format_time}</td>
					{/if}
					<td>
						{$pl->format_date($do_destory.$id.finished)}
					</td>
					<td>
						<a href="javascript:ask('Tem certeza de que deseja parar de demolir?', 'game.php?village={$village.id}&amp;screen=main&mode=destroy&amp;action=cancel_dest&amp;id={$do_destory.$id.r_id}&amp;h={$hkey}')">Cancelar</a>
					</td>
				</tr>
			{/foreach}
		</table>
		<br />
	{/if}

	{if !empty($error)}
		<font class="error">{$error}</font>
	{/if}
	
	<form name="burzenie" action="game.php?village={$village.id}&screen=main&mode=destroy&action=destroy&h={$hkey}" method="POST">
		<input name="id" value="-1" type="hidden"/>

		<table class="vis" width="100%">
			<tr>
				<th>Edifícios</th>
				<th>Tempo de demolição<br /> (hh:mm:ss)</th>
				<th>População</th>
				<th>Demolir</th>
			</tr>

			{foreach from=$fulfilled_builds item=dbname key=id}
				<tr>
					<td>
						<a href="game.php?village={$village.id}&screen={$dbname}">
							<img src="/ds_graphic/buildings/{$dbname}.png"> 
							{$cl_builds->get_name($dbname)}
						</a> 
						(Nível {$village.$dbname})
					</td>
					
					{if $village_builds_do_destory.$dbname <= 0}
						
						<td colspan="3" class="inactive">O edificio não pode ser demolido</td>
						
					{else}
						{if in_array($dbname,$arr_builds_starts_by_one) && $village_builds_do_destory.$dbname <= 1}
							<td colspan="3" class="inactive">O edificio não pode ser demolido</td>
						{else}
							<td>{$cl_builds->get_time($village.main,$dbname,$village_builds_do_destory.$dbname)|format_time}</td>
					
							<td>
								<img src="/ds_graphic/face.png" title="Aldeão" alt="" />
								{$cl_builds->get_bh($dbname,$village_builds_do_destory.$dbname)}
							</td>
							
							{if $counts_do_build.$dbname > 0}
							<td class="inactive">O edificio já está sendo aumentado</span>
							{else}
								<td><span class="link" onclick="insertUnit(document.forms['burzenie'].id,'{$dbname}');document.forms['burzenie'].submit();">Destruir um nível</span></td>
							{/if}
						{/if}
					{/if}
				</tr>
			{/foreach}
		</table>
	</form>
	
	<br>
	
	<table style="margin: 0pt; padding: 0pt;" width="100%" class="vis">
		<tbody>
			<tr>
				<th colspan="2">O processo de construção da aldeia:</th>
			</tr>
			<tr>
				<td style="border: 1px solid rgb(128, 64, 0); margin: 0pt; padding: 0pt; width: 90%;">
					<div style="width: {$village_build_process}%; background-color: rgb(128, 64, 0);">&nbsp;</div>
				</td>
				<td>{$village_build_process}%</td>
			</tr>
		</tbody>
	</table>
	
	<br>
	
	<form action="game.php?village={$village.id}&amp;screen=main&mode=destroy&amp;action=change_name&amp;h={$hkey}" method="post">
		<table class="vis" width="300">
			<tr>
				<th colspan="3">Renomear a aldeia</th>
			</tr>
			<tr>
				<td><input type="text" name="name" value="{$village.name}"></td>
				<td><input type="submit" value="Mudar">
			</tr>
		</table>
	</form>
{/if}