{if !$is_train_mass_succes}
    <script src="/js/recruit.js" type="text/javascript"></script>

    {if $user_mode == 'mass'}
        <h2>
            Recrutamento em massa
        </h2>
        <p>
           Nesta visão geral, tem a oportunidade de produzir quaisquer unidades, desde que tenha as construções e tecnologias necessárias.
        </p>
    {else}
        <h2>
            Recrutamento
        </h2>
        <p>
           Nesta visão geral, tem a oportunidade de produzir quaisquer unidades, desde que tenha as construções e tecnologias necessárias.
        </p>
    {/if}

    <table class="vis">
        <tbody>
            <tr>
                {if $user_mode != 'mass'}
                    <td class="selected"><a href="game.php?village={$village.id}&amp;screen=train&amp;mode=train">Recrutamento</a></td>
                    <td><a href="game.php?village={$village.id}&amp;screen=train&amp;mode=mass">Recrutamento em massa</a></td>
                {else}
                    <td><a href="game.php?village={$village.id}&amp;screen=train&amp;mode=train">Recrutamento</a></td>
                    <td class="selected"><a href="game.php?village={$village.id}&amp;screen=train&amp;mode=mass">Recrutamento em massa</a></td>
                {/if}
            </tr>
        </tbody>
    </table>
{/if}


{if $user_mode == 'mass'}
    
    {if !$is_train_mass_succes}
        <br>
        {include file="groups_bar.tpl"}
        <form id="mass_train_form" action="game.php?village={$village.id}&amp;screen=train&amp;mode=mass&amp;action=train_mass&amp;h={$hkey}" method="post" onsubmit="this.submit.disabled=true;">
 <div class="vis" style="">
	<form id="mr_all_form" action="/game.php?village=188541&amp;mode=mass&amp;action=train_mass_all&amp;h=7d4b&amp;page=0&amp;screen=train" method="post">
		<table class="vis" width="100%">
			<thead>
				<tr><th style="text-align:center"  width="35"><img src="../ds_graphic/unit/unit_spear.png?48b3b" title="Lanceiro" alt="" class="" /></th><th style="text-align:center"  width="35"><img src="../ds_graphic/unit/unit_sword.png?b389d" title="Espadachim" alt="" class="" /></th><th style="text-align:center"  width="35"><img src="../ds_graphic/unit/unit_axe.png?51d94" title="Viking" alt="" class="" /></th><th style="text-align:center"  width="35"><img src="../ds_graphic/unit/unit_archer.png?db2c3" title="Arqueiro" alt="" class="" /></th><th style="text-align:center"  width="35"><img src="../ds_graphic/unit/unit_spy.png?eb866" title="Batedor" alt="" class="" /></th><th style="text-align:center"  width="35"><img src="../ds_graphic/unit/unit_light.png?2d86d" title="Cavalaria leve" alt="" class="" /></th><th style="text-align:center"  width="35"><img src="../ds_graphic/unit/unit_marcher.png?ad3be" title="Arqueiro a Cavalo" alt="" class="" /></th><th style="text-align:center"  width="35"><img src="../ds_graphic/unit/unit_heavy.png?a83c9" title="Cavalaria pesada" alt="" class="" /></th><th style="text-align:center"  width="35"><img src="../ds_graphic/unit/unit_ram.png?2003e" title="Ariete" alt="" class="" /></th><th style="text-align:center"  width="35"><img src="../ds_graphic/unit/unit_catapult.png?5659c" title="Catapulta" alt="" class="" /></th></tr>
			</thead>
			<tr>
															<td align="center"><input type="text" value="0" name="spear" id="unit_input_spear" class="unit_input_field" size="3" /></td>
																				<td align="center"><input type="text" value="0" name="sword" id="unit_input_sword" class="unit_input_field" size="3" /></td>
																				<td align="center"><input type="text" value="0" name="axe" id="unit_input_axe" class="unit_input_field" size="3" /></td>
																				<td align="center"><input type="text" value="0" name="archer" id="unit_input_archer" class="unit_input_field" size="3" /></td>
																				<td align="center"><input type="text" value="0" name="spy" id="unit_input_spy" class="unit_input_field" size="3" /></td>
																				<td align="center"><input type="text" value="0" name="light" id="unit_input_light" class="unit_input_field" size="3" /></td>
																				<td align="center"><input type="text" value="0" name="marcher" id="unit_input_marcher" class="unit_input_field" size="3" /></td>
																				<td align="center"><input type="text" value="0" name="heavy" id="unit_input_heavy" class="unit_input_field" size="3" /></td>
																				<td align="center"><input type="text" value="0" name="ram" id="unit_input_ram" class="unit_input_field" size="3" /></td>
																				<td align="center"><input type="text" value="0" name="catapult" id="unit_input_catapult" class="unit_input_field" size="3" /></td>
																														</tr>
		</table>
	</form>
	<div class="vis_item" style="padding:5px;padding-left: 10px;text-align: center">
		<b>Zabezpieczenie</b> <img  src="../ds_graphic/questionmark.png?0f8d4" alt="" class="ui_tooltip" style="width: 13px; height: 13px" title="Aqui pode especificar o número de população e a quantidade de recursos que não serão usados ​​para recrutamento, mas guardados para outras necessidades." />					<span class="icon header wood"></span>
			<input type="text" class="res_buffer" name="buffer_wood" size="3" value="0" />
					<span class="icon header stone"></span>
			<input type="text" class="res_buffer" name="buffer_stone" size="3" value="0" />
					<span class="icon header iron"></span>
			<input type="text" class="res_buffer" name="buffer_iron" size="3" value="0" />
					<span class="icon header population"></span>
			<input type="text" class="res_buffer" name="buffer_pop" size="3" value="0" />
				<input type="hidden" name="village_ids"				value="
				{foreach from=$masowa_rek_wioski item=wioska}{$wioska.id},{/foreach}" />
		<input type="hidden" name="villages_selected" id="villages_selected" value="" />
		<input type="button" class="btn" onclick="setBuffer()" value="Salve as informações que digitou" class="ui_tooltip" title="Salve as tropas e segurança exibidas para este grupo"/>
		<div style="float:right">
			<span class="icon header ui_tooltip population" title="População necessária"></span><span id="pop_cost">0</span>
		</div>
	</div>
	<div class="vis_item" style="text-align:center">
		<input type="button" class="btn" onclick="return doMRFill(false);" class="ui_tooltip" title="Adiciona o número máximo possível de unidades selecionadas à aldeia." value="Inserir tropas"/>
		<input type="button" class="btn" onclick="return doMRFill(true);" class="ui_tooltip" title="Traz a combinação especificada de unidades (o máximo possível) para as aldeias." value="Inserir os valores máximos"/>
		<input type="button" class="btn" onclick="return doMRFill(false, true);" class="ui_tooltip" title="Insira apenas a diferença para os soldados atualmente disponíveis. Também são consideradas as unidades em produção." value="Inserir diferença"/>
	</div>
</div>

<script type="text/javascript">
//<![CDATA[
	$(function(){ldelim}
		UI.ToolTip($('.ui_tooltip'));
			});

	function setBuffer() {ldelim}
		var resources = $('.res_buffer, #mr_all_form').serialize();
		$['ajax']({ldelim}
			type: 'POST',
			url: '/game.php?village=188541&ajaxaction=setResourceBuffer&h=7d4b&group=0&screen=train',
			data: resources,
			success: function() {ldelim}
				UI.SuccessMessage("A segurança foi salva");
			}
		});
	}
//]]>
</script>

<div style="float:right; text-align: right;">
	<form action="/game.php?village=188541&amp;action=hide_full_farm&amp;h=7d4b&amp;screen=train" method="post">
		<label for="hide_full_farm">Ocultar aldeias com fazendas cheias</label>
		<input type="checkbox" id="hide_full_farm" name="hide" value="1"  checked="checked" onchange="submit();" />
	</form>

	<form action="/game.php?village=188541&amp;action=result_screen&amp;h=7d4b&amp;screen=train" method="post">
		<label for="show_result_screen">Mostrar resultados</label>
		<input id="show_result_screen" type="checkbox" name="result" value="1" onchange="submit();" />
	</form>
</div>

<form id="mass_train_form" action="/game.php?village=188541&amp;mode=mass&amp;action=train_mass&amp;h=7d4b&amp;page=0&amp;screen=train" method="post">
	
	<input class="btn btn-recruit" type="submit" value="Recrutar" />
	<table id="mass_train_table" class="vis overview_table" style="min-width:950px">
				<thead>
			<tr>
				<th width="120">Aldeia (287)</th>
				<th width="130">Recursos</th>
				<th>Zagroda</th>
				<th style="text-align:center"  width="35"><img src="../ds_graphic/unit/unit_spear.png?48b3b" title="Lanceiro" alt="" class="" /></th><th style="text-align:center"  width="35"><img src="../ds_graphic/unit/unit_sword.png?b389d" title="Espadachim" alt="" class="" /></th><th style="text-align:center"  width="35"><img src="../ds_graphic/unit/unit_axe.png?51d94" title="Viking" alt="" class="" /></th><th style="text-align:center"  width="35"><img src="../ds_graphic/unit/unit_archer.png?db2c3" title="Arqueiro" alt="" class="" /></th><th style="text-align:center"  width="35"><img src="../ds_graphic/unit/unit_spy.png?eb866" title="Zwiadowca" alt="" class="" /></th><th style="text-align:center"  width="35"><img src="../ds_graphic/unit/unit_light.png?2d86d" title="Cavalaria leve" alt="" class="" /></th><th style="text-align:center"  width="35"><img src="../ds_graphic/unit/unit_marcher.png?ad3be" title="Arqueiro a cavalo" alt="" class="" /></th><th style="text-align:center"  width="35"><img src="../ds_graphic/unit/unit_heavy.png?a83c9" title="Ci�ki kawalerzysta" alt="" class="" /></th><th style="text-align:center"  width="35"><img src="../ds_graphic/unit/unit_ram.png?2003e" title="Ariete" alt="" class="" /></th><th style="text-align:center"  width="35"><img src="../ds_graphic/unit/unit_catapult.png?5659c" title="Catapulta" alt="" class="" /></th>			</tr>
		</thead>

 {if $sekcja}
                <table class="vis" width="100%">
                    <tr>
                        <td>
                        {$sekcja_wiosek}
                        </td>
                    </tr>
                </table>
            {/if}
            {if !empty($error)}
                <font class="error">{$error}</font>
            {/if}
            <table id="mass_train_table" class="vis overview_table" width="100%">
                <tr>
                    <th>Wioska</th>
                    <th width="130">Recursos</th>
                    <th>Zagroda</th>
                    {foreach from=$units item=unit key=key}
                        <th style="text-align: center;" width="50">
                            <img src="/ds_graphic/unit/{$key}.png" />
                        </th>
                    {/foreach}
                </tr>
                {foreach from=$masowa_rek_wioski item=wioska}
                    <tr{if $wioska.id == $village.id} class="selected"{else}{if $vid_counter % 2} class="row_b"{else} class="row_a"{/if}{/if}>
                        <td>
                            {$bonus->get_bonus_mini_image($wioska.bonus)}
                            <a href="game.php?village={$wioska.id}&screen=barracks">
                                {$wioska.name} ({$wioska.x}|{$wioska.y}) K{$wioska.continent}
                            </a>
                        </td>
                        <td>
                            <img src="/ds_graphic/holz.png"/>{$wioska.r_wood|format_number}<br>
                            <img src="/ds_graphic/lehm.png"/>{$wioska.r_stone|format_number}<br>
                            <img src="/ds_graphic/eisen.png"/>{$wioska.r_iron|format_number}<br>
                        </td>
                
                        <td>
                            <img src="/ds_graphic/face.png"/>{$wioska.wolni_osadnicy|format_number}
                        </td>
                        
                        {foreach from=$units item=unit key=key}
                            <td>
                                <div style="white-space: nowrap; margin-bottom: 3px;">
                                    {if $cl_units->get_recruits_counts($wioska.id,$key)}
                                        <img src="/ds_graphic/dots/green.png"/>{$wioska.$key}<br>
                                    {else}
                                        <img src="/ds_graphic/dots/grey.png"/>{$wioska.$key}<br>
                                    {/if}
                                </div>
        
                                {php}if ($this->_tpl_vars['wioska']['tech_'.$this->_tpl_vars['key']] > 0):
                                    $this->_tpl_vars['max_units_cbr'] = $this->_tpl_vars['cl_units']->max_unit_can_be_recruited($this->_tpl_vars['wioska']['r_stone'],$this->_tpl_vars['wioska']['r_wood'],$this->_tpl_vars['wioska']['r_iron'],$this->_tpl_vars['wioska']['wolni_osadnicy'],$this->_tpl_vars['unit']['koszt_stone'],$this->_tpl_vars['unit']['koszt_wood'],$this->_tpl_vars['unit']['koszt_iron'],$this->_tpl_vars['unit']['koszt_bh']); {/php}
                                    {if $cl_units->czy_spelniono_wymagania($wioska.budynki,$cl_units->get_needed($key))}
                                        {if $wioska.budynki[$unit.rekrutuj_w] > 0}
                                            <input data-existing="0" data-running="1" id="{$key}_{$wioska.id}" name="units[{$wioska.id}][{$key}]" size="3" tabindex="" type="text" maxlength="5"><br>
                                            <a id="{$key}_{$wioska.id}_a" href="javascript:unit_managers[{$wioska.id}].set_max('{$key}')">({$max_units_cbr})</a>
                                        {else}
                                            <input data-existing="0" data-running="" disabled="disabled" id="units[{$wioska.id}][{$key}]" name="units[{$wioska.id}][{$key}]" size="3" tabindex="" type="text"><br><br>
                                        {/if}
                                    {else}
                                        <input data-existing="0" data-running="" disabled="disabled" id="units[{$wioska.id}][{$key}]" name="units[{$wioska.id}][{$key}]" size="3" tabindex="" type="text"><br><br>
                                    {/if}
                                {php}else:{/php}
                                    <input data-existing="0" data-running="" disabled="disabled" id="units[{$wioska.id}][{$key}]" name="units[{$wioska.id}][{$key}]" size="3" tabindex="" type="text"><br><br>
                                {php}endif;{/php}
                            </td>
                        {/foreach}
                    </tr>
                    {php}
                        $this->_tpl_vars['villages_cache'] .= "unit_managers[".$this->_tpl_vars['wioska']['id']."] = new UnitBuildManager(".$this->_tpl_vars['wioska']['id'].", {res: {'wood': ".$this->_tpl_vars['wioska']['r_wood'].",'stone': ".$this->_tpl_vars['wioska']['r_stone'].",'iron': ".$this->_tpl_vars['wioska']['r_iron'].",'pop': ".$this->_tpl_vars['wioska']['wolni_osadnicy']."}});\n";
                        $this->_tpl_vars['vid_counter']++;
                    {/php}
                {/foreach}
            <tr>
                <td colspan="{php} $row_counts = count($this->_tpl_vars['units']) + 3; echo $row_counts;{/php}"/>
                    <input value="Recrutar" style="font-size: 10pt;" name="sub" type="submit">
                </td>
            </tr>
            </table>
        </form>
        
        {include file="villages_per_page.tpl"}
    
        <script type="text/javascript">
            $(document).ready(function() {ldelim}
                unit_managers = {ldelim}{rdelim};
                unit_managers.units =
                    {php}
                        echo '{';
                        $this->_tpl_vars['i'] = 0;
                    {/php}
                    {foreach from=$units key=dbname item=unit_info}
                        {php}
                            $this->_tpl_vars['i']++;
                        {/php}
                        "{$dbname}":{ldelim}"wood":{$cl_units->get_woodprice($dbname)},"stone":{$cl_units->get_stoneprice($dbname)},"iron":{$cl_units->get_ironprice($dbname)},"pop":{$cl_units->get_bhprice($dbname)}{rdelim}{php}if ($this->_tpl_vars['i'] != count($this->_tpl_vars['units'])) echo ',';{/php}
                    {/foreach}{rdelim};
        
                    {$villages_cache}
                    TrainOverview.initMassOverview();
            {rdelim});
        </script>
    {else}
    <a href="game.php?village={$village.id}&amp;screen=train&amp;mode=mass">Voltar ao recrutamento</a><br>

    As seguintes unidades foram recrutadas:
    <table class="vis">
        <tbody>
            <tr>
                <th>Aldeia</th>
                <th>Unidades</th>
            </tr>
            
            {foreach from=$rec_succes key=vid item=units}
                {if array_sum($units) > 0}
                    <tr>
                        <td>
                            {$bonus->get_bonus_mini_image($masowa_rek_wioski.$vid.bonus)}
                            <a href="game.php?village={$wioska.id}&screen=info_village&amp;id={$vid}">
                                {$masowa_rek_wioski.$vid.name} ({$masowa_rek_wioski.$vid.x}|{$masowa_rek_wioski.$vid.y}) K{$masowa_rek_wioski.$vid.continent}
                            </a>
                        </td>
                        <td>
                            {foreach from=$units key=dbname item=value}
                                {if $value > 0}
                                    <img src="/ds_graphic/unit/{$dbname}.png" title="{$cl_units->get_name($dbname)}" alt="">{$value} &nbsp;
                                {/if}
                            {/foreach}
                        </td>
                    </tr>
                {/if}
            {/foreach}
        </tbody>
    </table>

    <a href="game.php?village={$village.id}&amp;screen=train&amp;mode=mass">Voltar ao recrutamento</a><br>
    {/if}

{else}
    {foreach from=$buildings item=build}
        {if count($recruiting.$build) > 0}
            <div class="current_prod_wrapper">
                <div id="replace_barracks">
                    {if $first_unit.$build.is}
                        <table class="vis">
                            <tbody>
                                <tr>
                                    <th width="250">Treinamento da próxima unidade concluído ({$first_unit.$build.unitname}):</th>
                                    <th><span class="timer">{$first_unit.$build.time_to_train|format_time}</span></th>
                                </tr>
                            </tbody>
                        </table>
                    {/if}
        
                    <div class="trainqueue_wrap" id="trainqueue_wrap_barracks">
                        <table class="vis">
                            <tbody>
                                <tr>
                                    <th width="150">Educação</th>
                                    <th width="120">Duração</th>
                                    <th width="150">Preparar</th>
                                    <th width="100">Finalizar *</th>
                                </tr>
                                {foreach from=$recruiting.$build item=recruit key=id}
                                    <tr {if $recruit.lit}class="lit"{/if}>
                                        <td>{$recruit.num_unit} {$cl_units->get_name($recruit.unit)}</td>
                                        {if $recruit.lit && $recruit.countdown>-1}
                                            <td><span class="timer">{$recruit.countdown|format_time}</span></td>
                                        {else}
                                            <td>{$recruit.countdown|format_time}</td>
                                        {/if}
                                        <td>{$pl->format_date($recruit.time_finished)}</td>
                                        <td><a href="game.php?village={$village.id}&amp;screen=train&amp;action=cancel&amp;id={$id}&amp;h={$hkey}">Cancelar</a></td>
                                    </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    </div>
                
                    <div style="font-size: 7pt;">* (90% dos recursos serão devolvidos)</div>
                    <br>    
                </div>
            </div>
        {/if}
    {/foreach}

    {if !empty($error)}
        <font class="error">{$error}</font>
    {/if}

    <form action="game.php?village={$village.id}&amp;screen=train&mode=train&amp;action=train&amp;h={$hkey}" method="post" onsubmit="this.submit.disabled=true;">
        <table class="vis" width="100%">
            <tbody>
                <tr>
                    <th width="190">Unidade</th>
                    <th colspan="4" width="200">Custo</th>
                    <th class="nowrap" width="120">Hora (hh:mm:ss)</th>
                    <th class="nowrap">Na Aldeia</th>
                    <th>Recrutar</th>
                </tr>
                {php}
                $this->_tpl_vars['i'] = 0;
                {/php}
                {foreach from=$buildings item=build}
                    {if $village.$build > 0}
                        {foreach from=$build_units.$build key=name item=dbname}
                            <tr class="row_{if $i % 2}b{else}a{/if}">
                                <td class="nowrap">
                                    <a href="javascript:popup_scroll('popup_unit.php?unit={$dbname}', 520, 520)"> <img src="/ds_graphic/unit/{$dbname}.png" alt="" /> {$name}</a>
                                </td>

                                <td><img src="/ds_graphic/holz.png" title="Madeira" alt="" /> {$cl_units->get_woodprice($dbname)}</td>
                                <td><img src="/ds_graphic/lehm.png" title="Argila" alt="" /> {$cl_units->get_stoneprice($dbname)}</td>
                                <td><img src="/ds_graphic/eisen.png" title="Ferro" alt="" /> {$cl_units->get_ironprice($dbname)}</td>
                                <td><img src="/ds_graphic/face.png" title="População" alt="" /> {$cl_units->get_bhprice($dbname)}</td>
                                <td>{$cl_units->get_time_round($village.$build,$dbname,$village.bonus)|format_time}</td>

                                <td>{$units_in_village.$dbname}/{$units_all.$dbname}</td>
                                
                                {$cl_units->check_needed($dbname,$village)}
                                {if $cl_units->last_error==not_tec}
                                    <td class="inactive nowrap">Unidades nie zosta�a jeszcze zbadana</td>
                                {elseif $cl_units->last_error==not_needed}
                                    <td class="inactive nowrap">Wymagania budynkowe nie zosta�y spe�nione</td>
                                {elseif $cl_units->last_error==not_enough_ress}
                                    <td class="inactive nowrap">Posiadasz za ma�o surowc�w</td>
                                {elseif $cl_units->last_error==not_enough_bh}
                                    <td class="inactive nowrap">Za ma�o miejsc w zagrodzie, by m�c wy�ywi� dodatkowe jednostki.</td>
                                {else}
                                    <td class="nowrap">
                                        <input style="color: black;" name="{$dbname}" class="recruit_unit" id="{$dbname}_0" size="5" maxlength="5" tabindex="1" type="text">
                                        <a id="{$dbname}_0_a" href="javascript:unit_build_block.set_max('{$dbname}')">({$cl_units->last_error})</a>
                                    </td>
                                {/if}
                            </tr>
                        {/foreach}
                        {php}
                        $this->_tpl_vars['i']++;
                        {/php}
                    {/if}
                {/foreach}
                <tr>
                    <td colspan="8" align="right">
                        <input value="Recrutar" style="font-size: 10pt;" name="sub" type="submit">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>

    <script type="text/javascript">
        $(document).ready(function(){ldelim}
            TrainOverview.init();
            TrainOverview.train_link = "";
            TrainOverview.cancel_link = "";
            TrainOverview.pop_max = {$village.r_bh};
        {rdelim});

        unit_managers = {ldelim}{rdelim};
        unit_managers.units = {ldelim}
        {php}
            $this->_tpl_vars['i'] = 0;
        {/php}
        {foreach from=$buildings item=build}
            {foreach from=$build_units.$build key=name item=dbname}
                {php}
                    $this->_tpl_vars['i']++;
                {/php}
                {$dbname}: {ldelim}wood:{$cl_units->get_woodprice($dbname)}, stone: {$cl_units->get_stoneprice($dbname)}, iron: {$cl_units->get_ironprice($dbname)}, pop: {$cl_units->get_bhprice($dbname)}{rdelim}{if $i != $counter_unit},{/if}
            {/foreach}
        {/foreach}
        {rdelim};

        var unit_build_block = new UnitBuildManager(0, {ldelim}
            res: {ldelim}wood:{$village.r_wood},stone: {$village.r_stone},iron: {$village.r_iron},pop: {$max_bh-$village.r_bh}{rdelim}
            {rdelim});
        unit_build_block._onchange();
    </script>
{/if}