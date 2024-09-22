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

{if $show_build}
	{if $ag_style == 1 }
	<table class="vis">
		<tr>
			{foreach from=$links item=f_mode key=f_name}
				{if $f_mode==$mode}
					<td class="selected" width="120">
						<a href="game.php?village={$village.id}&amp;screen=snob&amp;mode={$f_mode}">{$f_name}</a>
					</td>
				{else}
					<td width="120">
						<a href="game.php?village={$village.id}&amp;screen=snob&amp;mode={$f_mode}">{$f_name}</a>
					</td>
				{/if}
			{/foreach}
		</tr>
	</table>
	<br>
	{/if}
	{if $mode == 'poj_monety'}
		{if count($recruit_units)>0}
			<div class="current_prod_wrapper">
				<div id="replace_snob">
					{if $first_unit.is}
						<table class="vis">
							<tbody>
								<tr>
									<th width="250">Treinamento da próxima unidade concluído ({$first_unit.unitname}):</th>
									<th><span class="timer">{$first_unit.time_to_train|format_time}</span></th>
								</tr>
							</tbody>
						</table>
					{/if}
					<div class="trainqueue_wrap" id="trainqueue_wrap_snob">
						<table class="vis">
							<tr>
								<th width="150">Educação</th>
								<th width="120">Duração</th>
								<th width="150">Preparar</th>
								<th width="100">Finalizar *</th>
							</tr>

							{foreach from=$recruit_units key=key item=value}
								<tr {if $recruit_units.$key.lit}class="lit"{/if}>
									<td>{$recruit_units.$key.num_unit} {$cl_units->get_name($recruit_units.$key.unit)}</td>
									{if $recruit_units.$key.lit}
										{if $recruit_units.$key.countdown > 0}
											<td><span class="timer">{$recruit_units.$key.countdown|format_time}</span></td>
										{else}
											<td>{$recruit_units.$key.countdown|format_time}</td>
										{/if}
									{else}
										<td>{$recruit_units.$key.trwanie|format_time}</td>
									{/if}
									<td>{$pl->format_date($recruit_units.$key.time_finished)}</td>
									<td><a href="game.php?t=129107&amp;village={$village.id}&amp;screen={$dbname}&amp;action=cancel&amp;id={$key}&amp;h={$hkey}">Cancelar</a></td>
								</tr>
							{/foreach}
						</table>
					<div>
					<div style="font-size: 7pt;">* (Se finalizar, apenas 90% dos recursos serão devolvidos)</div>
					<br>
				</div>
			</div>
		{/if}

		{if !empty($error)}
			<font class="error">{$error}</font>
		{/if}
	
		<form action="game.php?village={$village.id}&amp;screen={$dbname}&amp;action=train&amp;h={$hkey}" method="post" onsubmit="this.submit.disabled=true;">
			<table class="vis">
				<tr>
					<th width="150">Unidade</th>
					<th colspan="4" width="120">Custo</th>
					<th width="130">Tempo (hh:mm:ss)</th>
					<th>Nesta aldeia</th>
					<th>Recrutar</th>
				</tr>

				{foreach from=$units key=unit_dbname item=name}
					<tr>
						<td><a href="#" class="unit_link" onclick="return UnitPopup.open(event, 'snob')"> <img src="/ds_graphic/unit/{$unit_dbname}.png" alt="" /> {$name}</a></td>
						<td><img src="/ds_graphic/holz.png" title="Holz" alt="" /> {if $village.r_wood >= $cl_units->get_woodprice($unit_dbname)}{$cl_units->get_woodprice($unit_dbname)|format_number}{else}<font color="red">{$cl_units->get_woodprice($unit_dbname)|format_number}</font>{/if}</td>
						<td><img src="/ds_graphic/lehm.png" title="Lehm" alt="" /> {if $village.r_stone >= $cl_units->get_stoneprice($unit_dbname)}{$cl_units->get_stoneprice($unit_dbname)|format_number}{else}<font color="red">{$cl_units->get_stoneprice($unit_dbname)|format_number}</font>{/if}</td>
						<td><img src="/ds_graphic/eisen.png" title="Eisen" alt="" /> {if $village.r_iron >= $cl_units->get_ironprice($unit_dbname)}{$cl_units->get_ironprice($unit_dbname)|format_number}{else}<font color="red">{$cl_units->get_ironprice($unit_dbname)|format_number}</font>{/if}</td>
						<td><img src="/ds_graphic/face.png" title="Arbeiter" alt="" /> {if $max_bh - $village.r_bh >= $cl_units->get_bhprice($unit_dbname)}{$cl_units->get_bhprice($unit_dbname)|format_number}{else}<font color="red">{$cl_units->get_bhprice($unit_dbname)|format_number}</font>{/if}</td>
						<td>{$cl_units->get_time_round($village.$dbname,$unit_dbname,$village.bonus)|format_time}</td>
						<td>{$units_in_village.$unit_dbname}/{$units_all.$unit_dbname}</td>
						{if $village.r_wood >= $cl_units->get_woodprice($unit_dbname) && $village.r_stone >= $cl_units->get_stoneprice($unit_dbname) && $village.r_iron >= $cl_units->get_ironprice($unit_dbname)}
							{if $max_bh - $village.r_bh >= $cl_units->get_bhprice($unit_dbname)}
								{if $snobs_canpr > 0}
									<td>
										<input id="{$unit_dbname}" name="atren_{$unit_dbname}" type="text" style="width:50px;"/>
										<span style="font-weight:bold; color: #804000;" onclick="insertNumId('{$unit_dbname}', '{$units_can_prod.$unit_dbname}');return false;">
											(max. {$units_can_prod.$unit_dbname})
										</span>
									</td>
								{else}
									<td class="inactive">Muito pouco limite de nobres</td>
								{/if}
							{else}
								<td class="inactive">A fazenda não pode suportar mais unidades</td>
							{/if}
						{else}
							<td class="inactive">Sem recursos disponíveis</td>
						{/if}
					</tr>
					<tr>
						<td colspan="8" align="right">
							<input  class="btn" name="submit" type="submit" value="Recrutar" style="font-size: 10pt;" />
						</td>
					</tr>
				{/foreach}
			</table>
		</form>
		
		<br />
<script type="text/javascript" src="/js/unit_popup.js"></script>

{literal}<script type="text/javascript">
//<![CDATA[
	$(function() {
		UnitPopup.unit_data = {"snob":{"name":"Nobre","desc":"Nobre pode diminuir a moral da aldeia atacada. Depois de baixar a moral para zero ou menos, a aldeia pode ser conquistada. Os custos dos nobres aumentam com cada aldeia conquistada e com cada nobre possuído ou produzido.","wood":40000,"stone":50000,"iron":50000,"pop":100,"speed":0.0004761904762,"attack":30,"attack_buildings":null,"defense":100,"defense_cavalry":50,"defense_archer":100,"carry":0,"type":"infantry","image":"unit\/unit_snob.png","prod_building":"snob","attackpoints":200,"defpoints":200,"build_time":18000,"shortname":"Nobre","train_time":"3:08:41","here_count":"2","all_count":2,"res":"<span class=\"icon header wood\"> <\/span>40<span class=\"grey\">.<\/span>000 <span class=\"icon header stone\"> <\/span>50<span class=\"grey\">.<\/span>000 <span class=\"icon header iron\"> <\/span>50<span class=\"grey\">.<\/span>000 ","error":"Surowce dost\u0119pne dzisiaj o 15:23","reqs":[{"building_id":"snob","building_link":"\/game.php?village=175833&amp;screen=snob","name":"Pa\u0142ac","level":1},{"building_id":"main","building_link":"\/game.php?village=175833&amp;screen=main","name":"Ratusz","level":20},{"building_id":"smith","building_link":"\/game.php?village=175833&amp;screen=smith","name":"Ku\u017ania","level":20},{"building_id":"market","building_link":"\/game.php?village=175833&amp;screen=market","name":"Rynek","level":10}]}};
		UnitPopup.init();
			});
//]]>
</script>{/literal}


<div id="inline_popup" class="hidden" style="width:700px;">
	<div id="inline_popup_menu">
		<span id="inline_popup_title"></span>
		<a id="inline_popup_close" href="javascript:inlinePopupClose()">X</a>
	</div>
	<div id="inline_popup_main" style="height: auto;">
		<div id="inline_popup_content"></div>
	</div>
</div>

<div id="unit_popup_template" style="display: none">
		<div class="inner-border main content-border" style="border: none; font-weight: normal">
			<table style="float: left;width:450px">
			<tr>
				<td>
					<p class="unit_desc"></p>
				</td>
			</tr>
			<tr>
				<td>
					<table style="border: 1px solid #DED3B9;" class="vis" width="100%">
						<tr>
							<th width="180">Custo</th>
							<th>População</th>
							<th>Velocidade</th>
							<th>Carregar</th>
						</tr>
						<tr class="center">
							<td><nobr><span class="icon header wood"> </span><span class="unit_wood"></span></nobr> <nobr><span class="icon header stone"> </span><span class="unit_stone"></span></nobr> <nobr><span class="icon header iron" > </span><span class="unit_iron"></span></nobr></td>
							<td><span class="icon header population"> </span><span class="unit_pop"></span></td>
							<td id="unit_speed"></td>
							<td class="unit_carry"></td>
						</tr>
					</table>
					<br />

					<table class="vis event_loot" style="display: none; width: 100%">
						<tr>
							<th colspan="2">Detalhes do evento</th>
						</tr>
						<tr>
							<td>carregar:</td>
							<td><span class="unit_event_loot"></span> <span class="unit_event_res_name"></span></td>
					</table>
					<br />

					<table class="vis has_levels_only" style="border: 1px solid #DED3B9;text-align:center" class="vis"  width="100%">
						<tr><th colspan="3">Estatísticas de batalha</th></tr>
						<tr><td align="left">A força do ataque</td><td width="20px"><img src="https://www.tribalwars.net/graphic/unit/att.png?1bdd4" alt="A força do ataque" /></td><td><span class="unit_attack"></span></td></tr>
						<tr><td align="left">Defesa em geral</td><td><img src="https://www.tribalwars.net/graphic/unit/def.png?12421" alt="Defesa em geral" /></td><td><span class="unit_defense"></span></td></tr>
						<tr><td align="left">Defesa contra cavalaria</td><td><img src="https://www.tribalwars.net/graphic/unit/def_cav.png?46b3d" alt="Defesa contra cavalaria" /></td><td><span class="unit_defense_cavalry"></span></td></tr>
						<tr><td align="left">Defesa contra arqueiros</td><td><img src="https://www.tribalwars.net/graphic/unit/def_archer.png?faccf" alt="Defesa contra arqueiros" /></td><td><span class="unit_defense_archer"></span></td></tr>
											</table>
					<br />

					<div class="show_if_has_reqs">
						<table class="vis" width="100%">
							<tr><th id="reqs_count" colspan="1">Wymogi, by m�c zbada� jednostk�</th></tr>
							<tr id="reqs"></tr>
						</table>
						<br />
					</div>

					<table class="unit_tech vis unit_tech_levels"  width="100%">
						<tr style="text-align:center">
							<th>Nível tecnológico</th>
							<th width="350">Custos de teste (se necessário)</th>
							<th width="30" style="text-align:center"><img src="https://www.tribalwars.net/graphic/unit/att.png?1bdd4" alt="A força do ataque" /></th>
							<th width="30" style="text-align:center"><img src="https://www.tribalwars.net/graphic/unit/def.png?12421" alt="Defesa em geral" /></th>
							<th width="30" style="text-align:center"><img src="https://www.tribalwars.net/graphic/unit/def_cav.png?46b3d" alt="Defesa contra cavalaria" /></th>
							<th width="30" style="text-align:center"><img src="https://www.tribalwars.net/graphic/unit/def_archer.png?faccf" alt="Defesa contra arqueiros" /></th>						</tr>
						<tr id="unit_tech_prototype" style="display: none;text-align:center">
							<td class="tech_level"></td>
							<td>
								<span class="grey tech_researched">já examinado</span>
								<span class="tech_res_list">
									<span class="icon header wood"> </span><span class="tech_wood"></span> <span class="icon header stone"> </span><span class="tech_stone"></span> <span class="icon header iron" > </span><span class="tech_iron"></span>
								</span>
							</td>
							<td class="tech_att"></td>
							<td class="tech_def"></td>
							<td class="tech_def_cav"></td>
														<td class="tech_def_archer"></td>
													</tr>
					</table>
					<table class="vis unit_tech unit_tech_cost"  width="100%">
						<tr><th>Koszta bada� (je�li potrzebne)</th></tr>
						<tr><td><span class="icon header wood"> </span><span class="tech_cost_wood"></span> <span class="icon header stone"> </span><span class="tech_cost_stone"></span> <span class="icon header iron" > </span><span class="tech_cost_iron"></span></td></tr>
					</table>
				</td>
			</tr>
		</table>
		<img style="margin-top: 60px; max-width: 200px; display: none" id="unit_image" src="graphic/map/empty.png" alt="" />
		</div>
	</div>

		{if $ag_style==0}
			<h4>O número de nobres que podem ser treinados</h4>
			<table class="vis">
				<tr><td>Nível de nobres:</td><td>{$snobs_stage|format_number}</td></tr>
				<tr><td>- Nobres disponíveis:</td><td>{$snobs_dostepne|format_number}</td></tr>
				<tr><td>- Nobres na produção:</td><td>{$snobs_produkcja|format_number}</td></tr>
				<tr><td>- Nobres nas aldeias:</td><td>{$snobs_in_vgs|format_number}</td></tr>
				<tr><th>Podem ser produzidos:</th><th>{$snobs_canpr|format_number}</th></tr>
			</table>
		{elseif $ag_style==1}
			<h4>O número de nobres que podem ser treinados</h4>
			<table class="vis">
				<tr>
					<td>Limite de nobres:</td>
					<td>{$snobs_stage|format_number}</td>
				</tr>
				<tr>
					<td>- Nobres disponíveis:</td>
					<td>{$snobs_dostepne|format_number}</td>
				</tr>
				<tr>
					<td>- Nobres na produção:</td>
					<td>{$snobs_produkcja|format_number}</td>
				</tr>
				<tr>
					<td>- Aldeias conquistadas:</td>
					<td>{$snobs_in_vgs|format_number}</td>
				</tr>
				<tr>
					<th>Pode produzir:</th>
					<th>{$snobs_canpr|format_number}</th>
				</tr>
			</table>
			
			<br/>
{literal}    <script type="text/javascript">
//<![CDATA[
	$(function(){
		UI.ToolTip($('.snob_tooltip'));
	});
//]]>
</script>
<script type="text/javascript">
//<![CDATA[
	$(function(){
		if (location.hash == '#minted') {
			UI.SuccessMessage("Uma moeda de ouro cunhada");
			location.hash = '';
		}
	});
//]]>
</script>{/literal}
			<table>
				<tbody>
					<tr>
						<td>
							<img alt="Moeda" src="/ds_graphic/gold_big.png" />
						</td>
						<td>
							<h4>Moedas de ouro</h4>
							<p>Para poder treinar nobres para capturar aldeias, deve cunhar moedas suficientes.</p>
						</td>
					</tr>
				</tbody>
			</table>
	
			<table class="vis">
				<tbody>
					<tr>
						<td>Moedas Cunhadas:</td>
						<td>{$all_coins|format_number}</td>
					</tr>
					<tr>
						<td>Moedas necessárias para o próximo nobre:</td>
						<td>{$coins_next|format_number}</td>
					</tr>
					<tr>
						<td>Moedas acumuladas até o próximo nobre:</td>
						<td>{$coins_zgr|format_number}</td>
					</tr>
					<tr>
						<td>Limite de nobres:</td>
						<td>{$snobs_stage|format_number}</td>
					</tr>
				</tbody>
			</table>

			<br>
		
			<table class="vis">
				<tbody>
					<tr>
						<th>Custo por moeda</th>
						<th>Produzir uma moeda</th>
					</tr>
					<tr>
						<td>
							<img alt="" title="Madeira" src="/ds_graphic/holz.png"/>
							{if $village.r_wood > $koszt_monety.wood}
								{$koszt_monety.wood|format_number}
							{else}
								<font color="red">{$koszt_monety.wood|format_number}</font>
							{/if}
						
							<img alt="" title="Argila" src="/ds_graphic/lehm.png"/>
							{if $village.r_stone > $koszt_monety.stone}
								{$koszt_monety.stone|format_number}
							{else}
								<font color="red">{$koszt_monety.stone|format_number}</font>
							{/if}
						
							<img alt="" title="Ferro" src="/ds_graphic/eisen.png"/>
							{if $village.r_iron > $koszt_monety.iron}
								{$koszt_monety.iron|format_number}
							{else}
								<font color="red">{$koszt_monety.iron|format_number}</font>
							{/if}
						</td>
						<td class="inactive">
							{if $twoz_monete}
								<a href="game.php?village={$village.id}&screen=snob&action=wybij_monete"><span class="btn btn-target-action" name="attack" type="submit"><img alt="Moeda" src="/ds_graphic/gold.png" style="position: relative;top: 3px;"> Cunhar</a>
							{else}
								<span>Recursos disponíveis às  <span class="timer_replace">{$czekanie|format_time}</span></span><span style="display:none">Recurosos disponíveis</span>
							{/if}
						</td>
					</tr>
				</tbody>
			</table>
			<br>
		{/if}
	{elseif $mode == 'mass_monety' && $ag_style == 1}
		<table>
			<tbody>
				<tr>
					<td>
						<img alt="Moeda" src="/ds_graphic/gold_big.png" />
					</td>
					<td>
						<h4>Moedas de ouro</h4>
						<p>Para poder treinar nobres para conquistar aldeias, deve cunhar moedas suficientes.</p>
					</td>
				</tr>
			</tbody>
		</table>
	
		<table class="vis">
			<tbody>
				<tr>
					<td>Moedas cunhadas:</td>
					<td>{$all_coins|format_number}</td>
				</tr>
				<tr>
					<td>Moedas necessárias para o próximo nobre:</td>
					<td>{$coins_next|format_number}</td>
				</tr>
				<tr>
					<td>Moedas acumuladas até o próximo nobre:</td>
					<td>{$coins_zgr|format_number}</td>
				</tr>
				<tr>
					<td>Limite de nobres:</td>
					<td>{$snobs_stage|format_number}</td>
				</tr>
			</tbody>
		</table>

		<br>
		{if !empty($error)}
			<font class="error">{$error}</font>
		{/if}
		
		<br>
		{include file="groups_bar.tpl"}
			
		<form action="game.php?village={$village.id}&amp;screen=snob&amp;mode=mass_monety&amp;action=wybijaj_wiele_monet" method="post" name="kingsage">
			{if $sekcja}
				<table class="vis" width="810">
					<tr>
						<td>
							{$sekcja_wiosek} 222
						</td>
					</tr>
				</table>
			{/if}
			<table class="vis" width="810">
				<tr><td style="height:24px;" align="left">
					<!--<span onclick="selectCoiningNoneMax('Selecione o número máximo', 'Desmarcar todas');return false;">
						<span id="select_all_1" class="link">
							Selecione o número máximo
						</span>
					</span>-->
				</td>
				<td colspan=3 style="height:24px;">
				</td>
				<td style="height:24px;" align="right">
					<!--<input type="submit" name="wybij" value="Cunhar em Massa" style="font-size: 10pt id="select_all_1" class="link" onclick="selectCoiningNoneMax('Selecione o número máximo', 'Desmarcar todas');return false;"/>-->
				</td>
</tr>
<tr>
					<th>
						Aldeia
					</th>
					<th colspan="3">
						Recursos
					</th>
					<th colspan="3">
						Número de moedas
					</th>
				</tr>
				{foreach from=$masowe_wybijanie item=wioska}
					<tr{if $wioska.id == $village.id} class="selected"{else}{if !$wioska.parzysta_liczba} class="row_b"{else} class="row_a"{/if}{/if}>
						<td width="300">
							{$bonus->get_bonus_mini_image($wioska.bonus)}
							<a href="game.php?village={$wioska.id}&screen=snob">
								{$wioska.name} ({$wioska.x}|{$wioska.y}) K{$wioska.continent}
							</a>
						</td>
						<td width="120">
							<img src="/ds_graphic/wood.png" title="Madeira"/>&nbsp;
							{if $wioska.r_wood >= $wioska.max_storage}
								<span class="warn"/>{$wioska.r_wood|format_number}</span>
							{else}
								{$wioska.r_wood|format_number}
							{/if}
						</td>
						<td width="120">
							<img src="/ds_graphic/stone.png" title="Kamienie"/>&nbsp;
							{if $wioska.r_stone >= $wioska.max_storage}
								<span class="warn"/>{$wioska.r_stone|format_number}</span>
							{else}
								{$wioska.r_stone|format_number}
							{/if}
						</td>
						<td width="120">
							<img src="/ds_graphic/iron.png" title="�elazo"/>&nbsp;
							{if $wioska.r_iron >= $wioska.max_storage}
								<span class="warn"/>{$wioska.r_iron|format_number}</span>
							{else}
								{$wioska.r_iron|format_number}
							{/if}
						</td>
						<td width="180">
						<input id="{$wioska.id}" name="m{$wioska.id}" max_value="{$wioska.max_monets_can_coin}" type="text" style="width:50px;"/>
						
						<span style="font-weight:bold; color: #804000; cursor: pointer;" onclick="insertNumId('{$wioska.id}', '{$wioska.max_monets_can_coin}');return false;">
							(Max. {$wioska.max_monets_can_coin} <img alt="Moeda" src="/ds_graphic/gold.png" style="position: relative;top: 3px;"/>)
						</span>
						
						</td>
					</tr>
				{/foreach}
				<td style="height:24px;" align="left">
				<!--<input type="submit" name="wybij" value="Cunhar em Massa" style="font-size: 10pt id="select_all_1" class="link" onclick="selectCoiningNoneMax('Selecione o número máximo', 'Desmarcar todas');return false;"/>
				
					<span onclick="selectCoiningNoneMax('Selecione o número máximo', 'Desmarcar todas');return false;">
						<span id="select_all_1" class="link">
							Selecione o número máximo
						</span>
					</span>-->
				</td>
				<td colspan=3 style="height:24px;">
				</td>
				<td style="height:24px;" align="right">
					<input type="submit" name="wybij" value="Cunhar em Massa" style="font-size: 10pt id="select_all_1" class="link" onclick="selectCoiningNoneMax('Selecione o número máximo', 'Desmarcar todas');return false;"/>
				</td>
			</table>
		</form>
		
		{include file="villages_per_page.tpl"}
	{/if}
{/if}
