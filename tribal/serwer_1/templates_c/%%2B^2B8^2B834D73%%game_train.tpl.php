<?php /* Smarty version 2.6.14, created on 2014-07-03 03:12:35
         compiled from game_train.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_number', 'game_train.tpl', 74, false),array('modifier', 'format_time', 'game_train.tpl', 191, false),)), $this); ?>
<?php if (! $this->_tpl_vars['is_train_mass_succes']): ?>
    <script src="/js/recruit.js" type="text/javascript"></script>

    <?php if ($this->_tpl_vars['user_mode'] == 'mass'): ?>
        <h2>
            Rekrutacja masowa
        </h2>
        <p>
            W tym przegl¹dzie masz mo¿liwoœæ wyprodukowania wszelkich jednostek, pod warunkiem, ¿e dysponujesz potrzebnymi budynkami oraz technologiami.
        </p>
    <?php else: ?>
        <h2>
            Rekrutacja
        </h2>
        <p>
            W tym przegl¹dzie masz mo¿liwoœæ wyprodukowania wszelkich jednostek, pod warunkiem, ¿e dysponujesz potrzebnymi budynkami oraz technologiami.
        </p>
    <?php endif; ?>

    <table class="vis">
        <tbody>
            <tr>
                <?php if ($this->_tpl_vars['user_mode'] != 'mass'): ?>
                    <td class="selected"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=train&amp;mode=train">Rekrutacja</a></td>
                    <td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=train&amp;mode=mass">Rekrutacja masowa</a></td>
                <?php else: ?>
                    <td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=train&amp;mode=train">Rekrutacja</a></td>
                    <td class="selected"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=train&amp;mode=mass">Rekrutacja masowa</a></td>
                <?php endif; ?>
            </tr>
        </tbody>
    </table>
<?php endif; ?>


<?php if ($this->_tpl_vars['user_mode'] == 'mass'): ?>
    
    <?php if (! $this->_tpl_vars['is_train_mass_succes']): ?>
        <br>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "groups_bar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <form id="mass_train_form" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=train&amp;mode=mass&amp;action=train_mass&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post" onsubmit="this.submit.disabled=true;">
            <?php if ($this->_tpl_vars['sekcja']): ?>
                <table class="vis" width="100%">
                    <tr>
                        <td>
                        <?php echo $this->_tpl_vars['sekcja_wiosek']; ?>

                        </td>
                    </tr>
                </table>
            <?php endif; ?>
            <?php if (! empty ( $this->_tpl_vars['error'] )): ?>
                <font class="error"><?php echo $this->_tpl_vars['error']; ?>
</font>
            <?php endif; ?>
            <table id="mass_train_table" class="vis overview_table" width="100%">
                <tr>
                    <th>Wioska</th>
                    <th width="130">Surowce</th>
                    <th>Zagroda</th>
                    <?php $_from = $this->_tpl_vars['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['unit']):
?>
                        <th style="text-align: center;" width="50">
                            <img src="/ds_graphic/unit/<?php echo $this->_tpl_vars['key']; ?>
.png" />
                        </th>
                    <?php endforeach; endif; unset($_from); ?>
                </tr>
                <?php $_from = $this->_tpl_vars['masowa_rek_wioski']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['wioska']):
?>
                    <tr<?php if ($this->_tpl_vars['wioska']['id'] == $this->_tpl_vars['village']['id']): ?> class="selected"<?php else:  if ($this->_tpl_vars['vid_counter'] % 2): ?> class="row_b"<?php else: ?> class="row_a"<?php endif;  endif; ?>>
                        <td>
                            <?php echo $this->_tpl_vars['bonus']->get_bonus_mini_image($this->_tpl_vars['wioska']['bonus']); ?>

                            <a href="game.php?village=<?php echo $this->_tpl_vars['wioska']['id']; ?>
&screen=barracks">
                                <?php echo $this->_tpl_vars['wioska']['name']; ?>
 (<?php echo $this->_tpl_vars['wioska']['x']; ?>
|<?php echo $this->_tpl_vars['wioska']['y']; ?>
) K<?php echo $this->_tpl_vars['wioska']['continent']; ?>

                            </a>
                        </td>
                        <td>
                            <img src="/ds_graphic/holz.png"/><?php echo ((is_array($_tmp=$this->_tpl_vars['wioska']['r_wood'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
<br>
                            <img src="/ds_graphic/lehm.png"/><?php echo ((is_array($_tmp=$this->_tpl_vars['wioska']['r_stone'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
<br>
                            <img src="/ds_graphic/eisen.png"/><?php echo ((is_array($_tmp=$this->_tpl_vars['wioska']['r_iron'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
<br>
                        </td>
                
                        <td>
                            <img src="/ds_graphic/face.png"/><?php echo ((is_array($_tmp=$this->_tpl_vars['wioska']['wolni_osadnicy'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>

                        </td>
                        
                        <?php $_from = $this->_tpl_vars['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['unit']):
?>
                            <td>
                                <div style="white-space: nowrap; margin-bottom: 3px;">
                                    <?php if ($this->_tpl_vars['cl_units']->get_recruits_counts($this->_tpl_vars['wioska']['id'],$this->_tpl_vars['key'])): ?>
                                        <img src="/ds_graphic/dots/green.png"/><?php echo $this->_tpl_vars['wioska'][$this->_tpl_vars['key']]; ?>
<br>
                                    <?php else: ?>
                                        <img src="/ds_graphic/dots/grey.png"/><?php echo $this->_tpl_vars['wioska'][$this->_tpl_vars['key']]; ?>
<br>
                                    <?php endif; ?>
                                </div>
        
                                <?php if ($this->_tpl_vars['wioska']['tech_'.$this->_tpl_vars['key']] > 0):
                                    $this->_tpl_vars['max_units_cbr'] = $this->_tpl_vars['cl_units']->max_unit_can_be_recruited($this->_tpl_vars['wioska']['r_stone'],$this->_tpl_vars['wioska']['r_wood'],$this->_tpl_vars['wioska']['r_iron'],$this->_tpl_vars['wioska']['wolni_osadnicy'],$this->_tpl_vars['unit']['koszt_stone'],$this->_tpl_vars['unit']['koszt_wood'],$this->_tpl_vars['unit']['koszt_iron'],$this->_tpl_vars['unit']['koszt_bh']);  ?>
                                    <?php if ($this->_tpl_vars['cl_units']->czy_spelniono_wymagania($this->_tpl_vars['wioska']['budynki'],$this->_tpl_vars['cl_units']->get_needed($this->_tpl_vars['key']))): ?>
                                        <?php if ($this->_tpl_vars['wioska']['budynki'][$this->_tpl_vars['unit']['rekrutuj_w']] > 0): ?>
                                            <input data-existing="0" data-running="1" id="<?php echo $this->_tpl_vars['key']; ?>
_<?php echo $this->_tpl_vars['wioska']['id']; ?>
" name="units[<?php echo $this->_tpl_vars['wioska']['id']; ?>
][<?php echo $this->_tpl_vars['key']; ?>
]" size="3" tabindex="" type="text" maxlength="5"><br>
                                            <a id="<?php echo $this->_tpl_vars['key']; ?>
_<?php echo $this->_tpl_vars['wioska']['id']; ?>
_a" href="javascript:unit_managers[<?php echo $this->_tpl_vars['wioska']['id']; ?>
].set_max('<?php echo $this->_tpl_vars['key']; ?>
')">(<?php echo $this->_tpl_vars['max_units_cbr']; ?>
)</a>
                                        <?php else: ?>
                                            <input data-existing="0" data-running="" disabled="disabled" id="units[<?php echo $this->_tpl_vars['wioska']['id']; ?>
][<?php echo $this->_tpl_vars['key']; ?>
]" name="units[<?php echo $this->_tpl_vars['wioska']['id']; ?>
][<?php echo $this->_tpl_vars['key']; ?>
]" size="3" tabindex="" type="text"><br><br>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <input data-existing="0" data-running="" disabled="disabled" id="units[<?php echo $this->_tpl_vars['wioska']['id']; ?>
][<?php echo $this->_tpl_vars['key']; ?>
]" name="units[<?php echo $this->_tpl_vars['wioska']['id']; ?>
][<?php echo $this->_tpl_vars['key']; ?>
]" size="3" tabindex="" type="text"><br><br>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <input data-existing="0" data-running="" disabled="disabled" id="units[<?php echo $this->_tpl_vars['wioska']['id']; ?>
][<?php echo $this->_tpl_vars['key']; ?>
]" name="units[<?php echo $this->_tpl_vars['wioska']['id']; ?>
][<?php echo $this->_tpl_vars['key']; ?>
]" size="3" tabindex="" type="text"><br><br>
                                <?php endif; ?>
                            </td>
                        <?php endforeach; endif; unset($_from); ?>
                    </tr>
                    <?php 
                        $this->_tpl_vars['villages_cache'] .= "unit_managers[".$this->_tpl_vars['wioska']['id']."] = new UnitBuildManager(".$this->_tpl_vars['wioska']['id'].", {res: {'wood': ".$this->_tpl_vars['wioska']['r_wood'].",'stone': ".$this->_tpl_vars['wioska']['r_stone'].",'iron': ".$this->_tpl_vars['wioska']['r_iron'].",'pop': ".$this->_tpl_vars['wioska']['wolni_osadnicy']."}});\n";
                        $this->_tpl_vars['vid_counter']++;
                     ?>
                <?php endforeach; endif; unset($_from); ?>
            <tr>
                <td colspan="<?php  $row_counts = count($this->_tpl_vars['units']) + 3; echo $row_counts; ?>"/>
                    <input value="Rekrutacja" style="font-size: 10pt;" name="sub" type="submit">
                </td>
            </tr>
            </table>
        </form>
        
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "villages_per_page.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    
        <script type="text/javascript">
            $(document).ready(function() {
                unit_managers = {};
                unit_managers.units =
                    <?php 
                        echo '{';
                        $this->_tpl_vars['i'] = 0;
                     ?>
                    <?php $_from = $this->_tpl_vars['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['unit_info']):
?>
                        <?php 
                            $this->_tpl_vars['i']++;
                         ?>
                        "<?php echo $this->_tpl_vars['dbname']; ?>
":{"wood":<?php echo $this->_tpl_vars['cl_units']->get_woodprice($this->_tpl_vars['dbname']); ?>
,"stone":<?php echo $this->_tpl_vars['cl_units']->get_stoneprice($this->_tpl_vars['dbname']); ?>
,"iron":<?php echo $this->_tpl_vars['cl_units']->get_ironprice($this->_tpl_vars['dbname']); ?>
,"pop":<?php echo $this->_tpl_vars['cl_units']->get_bhprice($this->_tpl_vars['dbname']); ?>
}<?php if ($this->_tpl_vars['i'] != count($this->_tpl_vars['units'])) echo ','; ?>
                    <?php endforeach; endif; unset($_from); ?>};
        
                    <?php echo $this->_tpl_vars['villages_cache']; ?>

                    TrainOverview.initMassOverview();
            });
        </script>
    <?php else: ?>
    <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=train&amp;mode=mass">Powrót do rekrutacji</a><br>

    Zrekrutowano nastêpuj¹ce jednostki:
    <table class="vis">
        <tbody>
            <tr>
                <th>Wioska</th>
                <th>Jednostki</th>
            </tr>
            
            <?php $_from = $this->_tpl_vars['rec_succes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vid'] => $this->_tpl_vars['units']):
?>
                <?php if (array_sum ( $this->_tpl_vars['units'] ) > 0): ?>
                    <tr>
                        <td>
                            <?php echo $this->_tpl_vars['bonus']->get_bonus_mini_image($this->_tpl_vars['masowa_rek_wioski'][$this->_tpl_vars['vid']]['bonus']); ?>

                            <a href="game.php?village=<?php echo $this->_tpl_vars['wioska']['id']; ?>
&screen=info_village&amp;id=<?php echo $this->_tpl_vars['vid']; ?>
">
                                <?php echo $this->_tpl_vars['masowa_rek_wioski'][$this->_tpl_vars['vid']]['name']; ?>
 (<?php echo $this->_tpl_vars['masowa_rek_wioski'][$this->_tpl_vars['vid']]['x']; ?>
|<?php echo $this->_tpl_vars['masowa_rek_wioski'][$this->_tpl_vars['vid']]['y']; ?>
) K<?php echo $this->_tpl_vars['masowa_rek_wioski'][$this->_tpl_vars['vid']]['continent']; ?>

                            </a>
                        </td>
                        <td>
                            <?php $_from = $this->_tpl_vars['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['value']):
?>
                                <?php if ($this->_tpl_vars['value'] > 0): ?>
                                    <img src="/ds_graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['cl_units']->get_name($this->_tpl_vars['dbname']); ?>
" alt=""><?php echo $this->_tpl_vars['value']; ?>
 &nbsp;
                                <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </tbody>
    </table>

    <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=train&amp;mode=mass">Powrót do rekrutacji</a><br>
    <?php endif; ?>

<?php else: ?>
    <?php $_from = $this->_tpl_vars['buildings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['build']):
?>
        <?php if (count ( $this->_tpl_vars['recruiting'][$this->_tpl_vars['build']] ) > 0): ?>
            <div class="current_prod_wrapper">
                <div id="replace_barracks">
                    <?php if ($this->_tpl_vars['first_unit'][$this->_tpl_vars['build']]['is']): ?>
                        <table class="vis">
                            <tbody>
                                <tr>
                                    <th width="250">Zakoñczenie szkolenia nastêpnej jednostki (<?php echo $this->_tpl_vars['first_unit'][$this->_tpl_vars['build']]['unitname']; ?>
):</th>
                                    <th><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['first_unit'][$this->_tpl_vars['build']]['time_to_train'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></th>
                                </tr>
                            </tbody>
                        </table>
                    <?php endif; ?>
        
                    <div class="trainqueue_wrap" id="trainqueue_wrap_barracks">
                        <table class="vis">
                            <tbody>
                                <tr>
                                    <th width="150">Kszta³cenie</th>
                                    <th width="120">Trwanie</th>
                                    <th width="150">Gotowe</th>
                                    <th width="100">Zakoñcz *</th>
                                </tr>
                                <?php $_from = $this->_tpl_vars['recruiting'][$this->_tpl_vars['build']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['recruit']):
?>
                                    <tr <?php if ($this->_tpl_vars['recruit']['lit']): ?>class="lit"<?php endif; ?>>
                                        <td><?php echo $this->_tpl_vars['recruit']['num_unit']; ?>
 <?php echo $this->_tpl_vars['cl_units']->get_name($this->_tpl_vars['recruit']['unit']); ?>
</td>
                                        <?php if ($this->_tpl_vars['recruit']['lit'] && $this->_tpl_vars['recruit']['countdown'] > -1): ?>
                                            <td><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['recruit']['countdown'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td>
                                        <?php else: ?>
                                            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['recruit']['countdown'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
                                        <?php endif; ?>
                                        <td><?php echo $this->_tpl_vars['pl']->format_date($this->_tpl_vars['recruit']['time_finished']); ?>
</td>
                                        <td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=train&amp;action=cancel&amp;id=<?php echo $this->_tpl_vars['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">przerwij</a></td>
                                    </tr>
                                <?php endforeach; endif; unset($_from); ?>
                            </tbody>
                        </table>
                    </div>
                
                    <div style="font-size: 7pt;">* (zostanie zwrócone 90% surowców)</div>
                    <br>    
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>

    <?php if (! empty ( $this->_tpl_vars['error'] )): ?>
        <font class="error"><?php echo $this->_tpl_vars['error']; ?>
</font>
    <?php endif; ?>

    <form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=train&mode=train&amp;action=train&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post" onsubmit="this.submit.disabled=true;">
        <table class="vis" width="100%">
            <tbody>
                <tr>
                    <th width="190">Jednostka</th>
                    <th colspan="4" width="200">Zapotrzebowanie</th>
                    <th class="nowrap" width="120">Czas  (gg:mm:ss)</th>
                    <th class="nowrap">W wiosce/ogólnie</th>
                    <th>Rekrutacja</th>
                </tr>
                <?php 
                $this->_tpl_vars['i'] = 0;
                 ?>
                <?php $_from = $this->_tpl_vars['buildings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['build']):
?>
                    <?php if ($this->_tpl_vars['village'][$this->_tpl_vars['build']] > 0): ?>
                        <?php $_from = $this->_tpl_vars['build_units'][$this->_tpl_vars['build']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
                            <tr class="row_<?php if ($this->_tpl_vars['i'] % 2): ?>b<?php else: ?>a<?php endif; ?>">
                                <td class="nowrap">
                                    <a href="javascript:popup_scroll('popup_unit.php?unit=<?php echo $this->_tpl_vars['dbname']; ?>
', 520, 520)"> <img src="/ds_graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" alt="" /> <?php echo $this->_tpl_vars['name']; ?>
</a>
                                </td>

                                <td><img src="/ds_graphic/holz.png" title="Drewno" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_woodprice($this->_tpl_vars['dbname']); ?>
</td>
                                <td><img src="/ds_graphic/lehm.png" title="Glina" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_stoneprice($this->_tpl_vars['dbname']); ?>
</td>
                                <td><img src="/ds_graphic/eisen.png" title="Ruda" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_ironprice($this->_tpl_vars['dbname']); ?>
</td>
                                <td><img src="/ds_graphic/face.png" title="Wieœniak" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_bhprice($this->_tpl_vars['dbname']); ?>
</td>
                                <td><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_units']->get_time_round($this->_tpl_vars['village'][$this->_tpl_vars['build']],$this->_tpl_vars['dbname'],$this->_tpl_vars['village']['bonus']))) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>

                                <td><?php echo $this->_tpl_vars['units_in_village'][$this->_tpl_vars['dbname']]; ?>
/<?php echo $this->_tpl_vars['units_all'][$this->_tpl_vars['dbname']]; ?>
</td>
                                
                                <?php echo $this->_tpl_vars['cl_units']->check_needed($this->_tpl_vars['dbname'],$this->_tpl_vars['village']); ?>

                                <?php if ($this->_tpl_vars['cl_units']->last_error == not_tec): ?>
                                    <td class="inactive nowrap">Jednostka nie zosta³a jeszcze zbadana</td>
                                <?php elseif ($this->_tpl_vars['cl_units']->last_error == not_needed): ?>
                                    <td class="inactive nowrap">Wymagania budynkowe nie zosta³y spe³nione</td>
                                <?php elseif ($this->_tpl_vars['cl_units']->last_error == not_enough_ress): ?>
                                    <td class="inactive nowrap">Posiadasz za ma³o surowców</td>
                                <?php elseif ($this->_tpl_vars['cl_units']->last_error == not_enough_bh): ?>
                                    <td class="inactive nowrap">Za ma³o miejsc w zagrodzie, by móc wy¿ywiæ dodatkowe jednostki.</td>
                                <?php else: ?>
                                    <td class="nowrap">
                                        <input style="color: black;" name="<?php echo $this->_tpl_vars['dbname']; ?>
" class="recruit_unit" id="<?php echo $this->_tpl_vars['dbname']; ?>
_0" size="5" maxlength="5" tabindex="1" type="text">
                                        <a id="<?php echo $this->_tpl_vars['dbname']; ?>
_0_a" href="javascript:unit_build_block.set_max('<?php echo $this->_tpl_vars['dbname']; ?>
')">(<?php echo $this->_tpl_vars['cl_units']->last_error; ?>
)</a>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; endif; unset($_from); ?>
                        <?php 
                        $this->_tpl_vars['i']++;
                         ?>
                    <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
                <tr>
                    <td colspan="8" align="right">
                        <input value="Rekrutacja" style="font-size: 10pt;" name="sub" type="submit">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>

    <script type="text/javascript">
        $(document).ready(function(){
            TrainOverview.init();
            TrainOverview.train_link = "";
            TrainOverview.cancel_link = "";
            TrainOverview.pop_max = <?php echo $this->_tpl_vars['village']['r_bh']; ?>
;
        });

        unit_managers = {};
        unit_managers.units = {
        <?php 
            $this->_tpl_vars['i'] = 0;
         ?>
        <?php $_from = $this->_tpl_vars['buildings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['build']):
?>
            <?php $_from = $this->_tpl_vars['build_units'][$this->_tpl_vars['build']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
                <?php 
                    $this->_tpl_vars['i']++;
                 ?>
                <?php echo $this->_tpl_vars['dbname']; ?>
: {wood: <?php echo $this->_tpl_vars['cl_units']->get_woodprice($this->_tpl_vars['dbname']); ?>
, stone: <?php echo $this->_tpl_vars['cl_units']->get_stoneprice($this->_tpl_vars['dbname']); ?>
, iron: <?php echo $this->_tpl_vars['cl_units']->get_ironprice($this->_tpl_vars['dbname']); ?>
, pop: <?php echo $this->_tpl_vars['cl_units']->get_bhprice($this->_tpl_vars['dbname']); ?>
}<?php if ($this->_tpl_vars['i'] != $this->_tpl_vars['counter_unit']): ?>,<?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        <?php endforeach; endif; unset($_from); ?>
        };

        var unit_build_block = new UnitBuildManager(0, {
            res: {wood: <?php echo $this->_tpl_vars['village']['r_wood']; ?>
,stone: <?php echo $this->_tpl_vars['village']['r_stone']; ?>
,iron: <?php echo $this->_tpl_vars['village']['r_iron']; ?>
,pop: <?php echo $this->_tpl_vars['max_bh']-$this->_tpl_vars['village']['r_bh']; ?>
}
            });
        unit_build_block._onchange();
    </script>
<?php endif; ?>