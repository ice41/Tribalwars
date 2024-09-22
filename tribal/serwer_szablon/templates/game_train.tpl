{if !$is_train_mass_succes}
    <script src="/js/recruit.js" type="text/javascript"></script>

    {if $user_mode == 'mass'}
        <h2>
            Rekrutacja masowa
        </h2>
        <p>
            W tym przegl¹dzie masz mo¿liwoœæ wyprodukowania wszelkich jednostek, pod warunkiem, ¿e dysponujesz potrzebnymi budynkami oraz technologiami.
        </p>
    {else}
        <h2>
            Rekrutacja
        </h2>
        <p>
            W tym przegl¹dzie masz mo¿liwoœæ wyprodukowania wszelkich jednostek, pod warunkiem, ¿e dysponujesz potrzebnymi budynkami oraz technologiami.
        </p>
    {/if}

    <table class="vis">
        <tbody>
            <tr>
                {if $user_mode != 'mass'}
                    <td class="selected"><a href="game.php?village={$village.id}&amp;screen=train&amp;mode=train">Rekrutacja</a></td>
                    <td><a href="game.php?village={$village.id}&amp;screen=train&amp;mode=mass">Rekrutacja masowa</a></td>
                {else}
                    <td><a href="game.php?village={$village.id}&amp;screen=train&amp;mode=train">Rekrutacja</a></td>
                    <td class="selected"><a href="game.php?village={$village.id}&amp;screen=train&amp;mode=mass">Rekrutacja masowa</a></td>
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
                    <th width="130">Surowce</th>
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
                    <input value="Rekrutacja" style="font-size: 10pt;" name="sub" type="submit">
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
    <a href="game.php?village={$village.id}&amp;screen=train&amp;mode=mass">Powrót do rekrutacji</a><br>

    Zrekrutowano nastêpuj¹ce jednostki:
    <table class="vis">
        <tbody>
            <tr>
                <th>Wioska</th>
                <th>Jednostki</th>
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

    <a href="game.php?village={$village.id}&amp;screen=train&amp;mode=mass">Powrót do rekrutacji</a><br>
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
                                    <th width="250">Zakoñczenie szkolenia nastêpnej jednostki ({$first_unit.$build.unitname}):</th>
                                    <th><span class="timer">{$first_unit.$build.time_to_train|format_time}</span></th>
                                </tr>
                            </tbody>
                        </table>
                    {/if}
        
                    <div class="trainqueue_wrap" id="trainqueue_wrap_barracks">
                        <table class="vis">
                            <tbody>
                                <tr>
                                    <th width="150">Kszta³cenie</th>
                                    <th width="120">Trwanie</th>
                                    <th width="150">Gotowe</th>
                                    <th width="100">Zakoñcz *</th>
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
                                        <td><a href="game.php?village={$village.id}&amp;screen=train&amp;action=cancel&amp;id={$id}&amp;h={$hkey}">przerwij</a></td>
                                    </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    </div>
                
                    <div style="font-size: 7pt;">* (zostanie zwrócone 90% surowców)</div>
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
                    <th width="190">Jednostka</th>
                    <th colspan="4" width="200">Zapotrzebowanie</th>
                    <th class="nowrap" width="120">Czas  (gg:mm:ss)</th>
                    <th class="nowrap">W wiosce/ogólnie</th>
                    <th>Rekrutacja</th>
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

                                <td><img src="/ds_graphic/holz.png" title="Drewno" alt="" /> {$cl_units->get_woodprice($dbname)}</td>
                                <td><img src="/ds_graphic/lehm.png" title="Glina" alt="" /> {$cl_units->get_stoneprice($dbname)}</td>
                                <td><img src="/ds_graphic/eisen.png" title="Ruda" alt="" /> {$cl_units->get_ironprice($dbname)}</td>
                                <td><img src="/ds_graphic/face.png" title="Wieœniak" alt="" /> {$cl_units->get_bhprice($dbname)}</td>
                                <td>{$cl_units->get_time_round($village.$build,$dbname,$village.bonus)|format_time}</td>

                                <td>{$units_in_village.$dbname}/{$units_all.$dbname}</td>
                                
                                {$cl_units->check_needed($dbname,$village)}
                                {if $cl_units->last_error==not_tec}
                                    <td class="inactive nowrap">Jednostka nie zosta³a jeszcze zbadana</td>
                                {elseif $cl_units->last_error==not_needed}
                                    <td class="inactive nowrap">Wymagania budynkowe nie zosta³y spe³nione</td>
                                {elseif $cl_units->last_error==not_enough_ress}
                                    <td class="inactive nowrap">Posiadasz za ma³o surowców</td>
                                {elseif $cl_units->last_error==not_enough_bh}
                                    <td class="inactive nowrap">Za ma³o miejsc w zagrodzie, by móc wy¿ywiæ dodatkowe jednostki.</td>
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
                        <input value="Rekrutacja" style="font-size: 10pt;" name="sub" type="submit">
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
                {$dbname}: {ldelim}wood: {$cl_units->get_woodprice($dbname)}, stone: {$cl_units->get_stoneprice($dbname)}, iron: {$cl_units->get_ironprice($dbname)}, pop: {$cl_units->get_bhprice($dbname)}{rdelim}{if $i != $counter_unit},{/if}
            {/foreach}
        {/foreach}
        {rdelim};

        var unit_build_block = new UnitBuildManager(0, {ldelim}
            res: {ldelim}wood: {$village.r_wood},stone: {$village.r_stone},iron: {$village.r_iron},pop: {$max_bh-$village.r_bh}{rdelim}
            {rdelim});
        unit_build_block._onchange();
    </script>
{/if}