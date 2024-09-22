<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2023-02-26 21:20:43
         Wersja PHP pliku pliki_tpl/game_snob.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_time', 'game_snob.tpl', 62, false),array('modifier', 'format_number', 'game_snob.tpl', 117, false),)), $this); ?>
<?php 
if (!isset($this->_tpl_vars['cl_builds'])) {
	global $cl_builds;
	$this->assign('cl_builds',$cl_builds);
	}
$this->_tpl_vars['dbname'] = $this->_tpl_vars['screen'];
$this->_tpl_vars['aktu_build_prc'] = $this->_tpl_vars['village'][$this->_tpl_vars['dbname']] / $this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['dbname']);
 ?>
<table>
	<tr>
		<td>
			<?php if ($this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['dbname']) > 3): ?>
				<?php if ($this->_tpl_vars['aktu_build_prc'] > 0.5): ?>
					<img src="/ds_graphic/big_buildings/<?php echo $this->_tpl_vars['dbname']; ?>
3.png" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" alt="" />
				<?php else: ?>
					<?php if ($this->_tpl_vars['aktu_build_prc'] > 0.2): ?>
						<img src="/ds_graphic/big_buildings/<?php echo $this->_tpl_vars['dbname']; ?>
2.png" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" alt="" />
					<?php else: ?>
						<img src="/ds_graphic/big_buildings/<?php echo $this->_tpl_vars['dbname']; ?>
1.png" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" alt="" />
					<?php endif; ?>
				<?php endif; ?>
			<?php else: ?>
				<img src="/ds_graphic/big_buildings/<?php echo $this->_tpl_vars['dbname']; ?>
1.png" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" alt="" />
			<?php endif; ?>
		</td>
		<td>
			<h2><?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
 (<?php if ($this->_tpl_vars['village'][$this->_tpl_vars['dbname']] > 0): ?>Nível <?php echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; ?>
<?php else: ?>Não construído<?php endif; ?>)</h2>
			<?php echo $this->_tpl_vars['cl_builds']->get_description_bydbname($this->_tpl_vars['dbname']); ?>

		</td>
	</tr>
</table>
<br />

<?php if ($this->_tpl_vars['show_build']): ?>
	<?php if ($this->_tpl_vars['ag_style'] == 1): ?>
	<table class="vis">
		<tr>
			<?php $_from = $this->_tpl_vars['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['f_name'] => $this->_tpl_vars['f_mode']):
?>
				<?php if ($this->_tpl_vars['f_mode'] == $this->_tpl_vars['mode']): ?>
					<td class="selected" width="120">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=snob&amp;mode=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php echo $this->_tpl_vars['f_name']; ?>
</a>
					</td>
				<?php else: ?>
					<td width="120">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=snob&amp;mode=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php echo $this->_tpl_vars['f_name']; ?>
</a>
					</td>
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
		</tr>
	</table>
	<br>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['mode'] == 'poj_monety'): ?>
		<?php if (count ( $this->_tpl_vars['recruit_units'] ) > 0): ?>
			<div class="current_prod_wrapper">
				<div id="replace_snob">
					<?php if ($this->_tpl_vars['first_unit']['is']): ?>
						<table class="vis">
							<tbody>
								<tr>
									<th width="250">Treinamento da próxima unidade concluído (<?php echo $this->_tpl_vars['first_unit']['unitname']; ?>
):</th>
									<th><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['first_unit']['time_to_train'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></th>
								</tr>
							</tbody>
						</table>
					<?php endif; ?>
					<div class="trainqueue_wrap" id="trainqueue_wrap_snob">
						<table class="vis">
							<tr>
								<th width="150">Educação</th>
								<th width="120">Duração</th>
								<th width="150">Preparar</th>
								<th width="100">Finalizar *</th>
							</tr>

							<?php $_from = $this->_tpl_vars['recruit_units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
								<tr <?php if ($this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['lit']): ?>class="lit"<?php endif; ?>>
									<td><?php echo $this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['num_unit']; ?>
 <?php echo $this->_tpl_vars['cl_units']->get_name($this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['unit']); ?>
</td>
									<?php if ($this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['lit']): ?>
										<?php if ($this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['countdown'] > 0): ?>
											<td><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['countdown'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td>
										<?php else: ?>
											<td><?php echo ((is_array($_tmp=$this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['countdown'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
										<?php endif; ?>
									<?php else: ?>
										<td><?php echo ((is_array($_tmp=$this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['trwanie'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
									<?php endif; ?>
									<td><?php echo $this->_tpl_vars['pl']->format_date($this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['time_finished']); ?>
</td>
									<td><a href="game.php?t=129107&amp;village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=<?php echo $this->_tpl_vars['dbname']; ?>
&amp;action=cancel&amp;id=<?php echo $this->_tpl_vars['key']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Cancelar</a></td>
								</tr>
							<?php endforeach; endif; unset($_from); ?>
						</table>
					<div>
					<div style="font-size: 7pt;">* (Se finalizar, apenas 90% dos recursos serão devolvidos)</div>
					<br>
				</div>
			</div>
		<?php endif; ?>

		<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
			<font class="error"><?php echo $this->_tpl_vars['error']; ?>
</font>
		<?php endif; ?>
	
		<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=<?php echo $this->_tpl_vars['dbname']; ?>
&amp;action=train&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post" onsubmit="this.submit.disabled=true;">
			<table class="vis">
				<tr>
					<th width="150">Unidade</th>
					<th colspan="4" width="120">Custo</th>
					<th width="130">Tempo (hh:mm:ss)</th>
					<th>Nesta aldeia</th>
					<th>Recrutar</th>
				</tr>

				<?php $_from = $this->_tpl_vars['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['unit_dbname'] => $this->_tpl_vars['name']):
?>
					<tr>
						<td><a href="#" class="unit_link" onclick="return UnitPopup.open(event, 'snob')"> <img src="/ds_graphic/unit/<?php echo $this->_tpl_vars['unit_dbname']; ?>
.png" alt="" /> <?php echo $this->_tpl_vars['name']; ?>
</a></td>
						<td><img src="/ds_graphic/holz.png" title="Holz" alt="" /> <?php if ($this->_tpl_vars['village']['r_wood'] >= $this->_tpl_vars['cl_units']->get_woodprice($this->_tpl_vars['unit_dbname'])): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_units']->get_woodprice($this->_tpl_vars['unit_dbname']))) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
<?php else: ?><font color="red"><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_units']->get_woodprice($this->_tpl_vars['unit_dbname']))) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</font><?php endif; ?></td>
						<td><img src="/ds_graphic/lehm.png" title="Lehm" alt="" /> <?php if ($this->_tpl_vars['village']['r_stone'] >= $this->_tpl_vars['cl_units']->get_stoneprice($this->_tpl_vars['unit_dbname'])): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_units']->get_stoneprice($this->_tpl_vars['unit_dbname']))) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
<?php else: ?><font color="red"><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_units']->get_stoneprice($this->_tpl_vars['unit_dbname']))) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</font><?php endif; ?></td>
						<td><img src="/ds_graphic/eisen.png" title="Eisen" alt="" /> <?php if ($this->_tpl_vars['village']['r_iron'] >= $this->_tpl_vars['cl_units']->get_ironprice($this->_tpl_vars['unit_dbname'])): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_units']->get_ironprice($this->_tpl_vars['unit_dbname']))) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
<?php else: ?><font color="red"><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_units']->get_ironprice($this->_tpl_vars['unit_dbname']))) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</font><?php endif; ?></td>
						<td><img src="/ds_graphic/face.png" title="Arbeiter" alt="" /> <?php if ($this->_tpl_vars['max_bh'] - $this->_tpl_vars['village']['r_bh'] >= $this->_tpl_vars['cl_units']->get_bhprice($this->_tpl_vars['unit_dbname'])): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_units']->get_bhprice($this->_tpl_vars['unit_dbname']))) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
<?php else: ?><font color="red"><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_units']->get_bhprice($this->_tpl_vars['unit_dbname']))) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</font><?php endif; ?></td>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_units']->get_time_round($this->_tpl_vars['village'][$this->_tpl_vars['dbname']],$this->_tpl_vars['unit_dbname'],$this->_tpl_vars['village']['bonus']))) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
						<td><?php echo $this->_tpl_vars['units_in_village'][$this->_tpl_vars['unit_dbname']]; ?>
/<?php echo $this->_tpl_vars['units_all'][$this->_tpl_vars['unit_dbname']]; ?>
</td>
						<?php if ($this->_tpl_vars['village']['r_wood'] >= $this->_tpl_vars['cl_units']->get_woodprice($this->_tpl_vars['unit_dbname']) && $this->_tpl_vars['village']['r_stone'] >= $this->_tpl_vars['cl_units']->get_stoneprice($this->_tpl_vars['unit_dbname']) && $this->_tpl_vars['village']['r_iron'] >= $this->_tpl_vars['cl_units']->get_ironprice($this->_tpl_vars['unit_dbname'])): ?>
							<?php if ($this->_tpl_vars['max_bh'] - $this->_tpl_vars['village']['r_bh'] >= $this->_tpl_vars['cl_units']->get_bhprice($this->_tpl_vars['unit_dbname'])): ?>
								<?php if ($this->_tpl_vars['snobs_canpr'] > 0): ?>
									<td>
										<input id="<?php echo $this->_tpl_vars['unit_dbname']; ?>
" name="atren_<?php echo $this->_tpl_vars['unit_dbname']; ?>
" type="text" style="width:50px;"/>
										<span style="font-weight:bold; color: #804000;" onclick="insertNumId('<?php echo $this->_tpl_vars['unit_dbname']; ?>
', '<?php echo $this->_tpl_vars['units_can_prod'][$this->_tpl_vars['unit_dbname']]; ?>
');return false;">
											(max. <?php echo $this->_tpl_vars['units_can_prod'][$this->_tpl_vars['unit_dbname']]; ?>
)
										</span>
									</td>
								<?php else: ?>
									<td class="inactive">Muito pouco limite de nobres</td>
								<?php endif; ?>
							<?php else: ?>
								<td class="inactive">A fazenda não pode suportar mais unidades</td>
							<?php endif; ?>
						<?php else: ?>
							<td class="inactive">Sem recursos disponíveis</td>
						<?php endif; ?>
					</tr>
					<tr>
						<td colspan="8" align="right">
							<input  class="btn" name="submit" type="submit" value="Recrutar" style="font-size: 10pt;" />
						</td>
					</tr>
				<?php endforeach; endif; unset($_from); ?>
			</table>
		</form>
		
		<br />
<script type="text/javascript" src="/js/unit_popup.js"></script>

<?php echo '<script type="text/javascript">
//<![CDATA[
	$(function() {
		UnitPopup.unit_data = {"snob":{"name":"Nobre","desc":"Nobre pode diminuir a moral da aldeia atacada. Depois de baixar a moral para zero ou menos, a aldeia pode ser conquistada. Os custos dos nobres aumentam com cada aldeia conquistada e com cada nobre possuído ou produzido.","wood":40000,"stone":50000,"iron":50000,"pop":100,"speed":0.0004761904762,"attack":30,"attack_buildings":null,"defense":100,"defense_cavalry":50,"defense_archer":100,"carry":0,"type":"infantry","image":"unit\\/unit_snob.png","prod_building":"snob","attackpoints":200,"defpoints":200,"build_time":18000,"shortname":"Nobre","train_time":"3:08:41","here_count":"2","all_count":2,"res":"<span class=\\"icon header wood\\"> <\\/span>40<span class=\\"grey\\">.<\\/span>000 <span class=\\"icon header stone\\"> <\\/span>50<span class=\\"grey\\">.<\\/span>000 <span class=\\"icon header iron\\"> <\\/span>50<span class=\\"grey\\">.<\\/span>000 ","error":"Surowce dost\\u0119pne dzisiaj o 15:23","reqs":[{"building_id":"snob","building_link":"\\/game.php?village=175833&amp;screen=snob","name":"Pa\\u0142ac","level":1},{"building_id":"main","building_link":"\\/game.php?village=175833&amp;screen=main","name":"Ratusz","level":20},{"building_id":"smith","building_link":"\\/game.php?village=175833&amp;screen=smith","name":"Ku\\u017ania","level":20},{"building_id":"market","building_link":"\\/game.php?village=175833&amp;screen=market","name":"Rynek","level":10}]}};
		UnitPopup.init();
			});
//]]>
</script>'; ?>



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

		<?php if ($this->_tpl_vars['ag_style'] == 0): ?>
			<h4>O número de nobres que podem ser treinados</h4>
			<table class="vis">
				<tr><td>Nível de nobres:</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['snobs_stage'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td></tr>
				<tr><td>- Nobres disponíveis:</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['snobs_dostepne'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td></tr>
				<tr><td>- Nobres na produção:</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['snobs_produkcja'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td></tr>
				<tr><td>- Nobres nas aldeias:</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['snobs_in_vgs'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td></tr>
				<tr><th>Podem ser produzidos:</th><th><?php echo ((is_array($_tmp=$this->_tpl_vars['snobs_canpr'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</th></tr>
			</table>
		<?php elseif ($this->_tpl_vars['ag_style'] == 1): ?>
			<h4>O número de nobres que podem ser treinados</h4>
			<table class="vis">
				<tr>
					<td>Limite de nobres:</td>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['snobs_stage'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>
				</tr>
				<tr>
					<td>- Nobres disponíveis:</td>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['snobs_dostepne'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>
				</tr>
				<tr>
					<td>- Nobres na produção:</td>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['snobs_produkcja'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>
				</tr>
				<tr>
					<td>- Aldeias conquistadas:</td>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['snobs_in_vgs'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>
				</tr>
				<tr>
					<th>Pode produzir:</th>
					<th><?php echo ((is_array($_tmp=$this->_tpl_vars['snobs_canpr'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</th>
				</tr>
			</table>
			
			<br/>
<?php echo '    <script type="text/javascript">
//<![CDATA[
	$(function(){
		UI.ToolTip($(\'.snob_tooltip\'));
	});
//]]>
</script>
<script type="text/javascript">
//<![CDATA[
	$(function(){
		if (location.hash == \'#minted\') {
			UI.SuccessMessage("Uma moeda de ouro cunhada");
			location.hash = \'\';
		}
	});
//]]>
</script>'; ?>

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
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['all_coins'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>
					</tr>
					<tr>
						<td>Moedas necessárias para o próximo nobre:</td>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['coins_next'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>
					</tr>
					<tr>
						<td>Moedas acumuladas até o próximo nobre:</td>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['coins_zgr'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>
					</tr>
					<tr>
						<td>Limite de nobres:</td>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['snobs_stage'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>
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
							<?php if ($this->_tpl_vars['village']['r_wood'] > $this->_tpl_vars['koszt_monety']['wood']): ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['koszt_monety']['wood'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>

							<?php else: ?>
								<font color="red"><?php echo ((is_array($_tmp=$this->_tpl_vars['koszt_monety']['wood'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</font>
							<?php endif; ?>
						
							<img alt="" title="Argila" src="/ds_graphic/lehm.png"/>
							<?php if ($this->_tpl_vars['village']['r_stone'] > $this->_tpl_vars['koszt_monety']['stone']): ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['koszt_monety']['stone'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>

							<?php else: ?>
								<font color="red"><?php echo ((is_array($_tmp=$this->_tpl_vars['koszt_monety']['stone'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</font>
							<?php endif; ?>
						
							<img alt="" title="Ferro" src="/ds_graphic/eisen.png"/>
							<?php if ($this->_tpl_vars['village']['r_iron'] > $this->_tpl_vars['koszt_monety']['iron']): ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['koszt_monety']['iron'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>

							<?php else: ?>
								<font color="red"><?php echo ((is_array($_tmp=$this->_tpl_vars['koszt_monety']['iron'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</font>
							<?php endif; ?>
						</td>
						<td class="inactive">
							<?php if ($this->_tpl_vars['twoz_monete']): ?>
								<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=snob&action=wybij_monete"><span class="btn btn-target-action" name="attack" type="submit"><img alt="Moeda" src="/ds_graphic/gold.png" style="position: relative;top: 3px;"> Cunhar</a>
							<?php else: ?>
								<span>Recursos disponíveis às  <span class="timer_replace"><?php echo ((is_array($_tmp=$this->_tpl_vars['czekanie'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></span><span style="display:none">Recurosos disponíveis</span>
							<?php endif; ?>
						</td>
					</tr>
				</tbody>
			</table>
			<br>
		<?php endif; ?>
	<?php elseif ($this->_tpl_vars['mode'] == 'mass_monety' && $this->_tpl_vars['ag_style'] == 1): ?>
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
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['all_coins'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>
				</tr>
				<tr>
					<td>Moedas necessárias para o próximo nobre:</td>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['coins_next'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>
				</tr>
				<tr>
					<td>Moedas acumuladas até o próximo nobre:</td>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['coins_zgr'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>
				</tr>
				<tr>
					<td>Limite de nobres:</td>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['snobs_stage'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>
				</tr>
			</tbody>
		</table>

		<br>
		<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
			<font class="error"><?php echo $this->_tpl_vars['error']; ?>
</font>
		<?php endif; ?>
		
		<br>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "groups_bar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			
		<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=snob&amp;mode=mass_monety&amp;action=wybijaj_wiele_monet" method="post" name="kingsage">
			<?php if ($this->_tpl_vars['sekcja']): ?>
				<table class="vis" width="810">
					<tr>
						<td>
							<?php echo $this->_tpl_vars['sekcja_wiosek']; ?>
 222
						</td>
					</tr>
				</table>
			<?php endif; ?>
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
				<?php $_from = $this->_tpl_vars['masowe_wybijanie']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['wioska']):
?>
					<tr<?php if ($this->_tpl_vars['wioska']['id'] == $this->_tpl_vars['village']['id']): ?> class="selected"<?php else: ?><?php if (! $this->_tpl_vars['wioska']['parzysta_liczba']): ?> class="row_b"<?php else: ?> class="row_a"<?php endif; ?><?php endif; ?>>
						<td width="300">
							<?php echo $this->_tpl_vars['bonus']->get_bonus_mini_image($this->_tpl_vars['wioska']['bonus']); ?>

							<a href="game.php?village=<?php echo $this->_tpl_vars['wioska']['id']; ?>
&screen=snob">
								<?php echo $this->_tpl_vars['wioska']['name']; ?>
 (<?php echo $this->_tpl_vars['wioska']['x']; ?>
|<?php echo $this->_tpl_vars['wioska']['y']; ?>
) K<?php echo $this->_tpl_vars['wioska']['continent']; ?>

							</a>
						</td>
						<td width="120">
							<img src="/ds_graphic/wood.png" title="Madeira"/>&nbsp;
							<?php if ($this->_tpl_vars['wioska']['r_wood'] >= $this->_tpl_vars['wioska']['max_storage']): ?>
								<span class="warn"/><?php echo ((is_array($_tmp=$this->_tpl_vars['wioska']['r_wood'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</span>
							<?php else: ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['wioska']['r_wood'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>

							<?php endif; ?>
						</td>
						<td width="120">
							<img src="/ds_graphic/stone.png" title="Kamienie"/>&nbsp;
							<?php if ($this->_tpl_vars['wioska']['r_stone'] >= $this->_tpl_vars['wioska']['max_storage']): ?>
								<span class="warn"/><?php echo ((is_array($_tmp=$this->_tpl_vars['wioska']['r_stone'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</span>
							<?php else: ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['wioska']['r_stone'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>

							<?php endif; ?>
						</td>
						<td width="120">
							<img src="/ds_graphic/iron.png" title="�elazo"/>&nbsp;
							<?php if ($this->_tpl_vars['wioska']['r_iron'] >= $this->_tpl_vars['wioska']['max_storage']): ?>
								<span class="warn"/><?php echo ((is_array($_tmp=$this->_tpl_vars['wioska']['r_iron'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</span>
							<?php else: ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['wioska']['r_iron'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>

							<?php endif; ?>
						</td>
						<td width="180">
						<input id="<?php echo $this->_tpl_vars['wioska']['id']; ?>
" name="m<?php echo $this->_tpl_vars['wioska']['id']; ?>
" max_value="<?php echo $this->_tpl_vars['wioska']['max_monets_can_coin']; ?>
" type="text" style="width:50px;"/>
						
						<span style="font-weight:bold; color: #804000; cursor: pointer;" onclick="insertNumId('<?php echo $this->_tpl_vars['wioska']['id']; ?>
', '<?php echo $this->_tpl_vars['wioska']['max_monets_can_coin']; ?>
');return false;">
							(Max. <?php echo $this->_tpl_vars['wioska']['max_monets_can_coin']; ?>
 <img alt="Moeda" src="/ds_graphic/gold.png" style="position: relative;top: 3px;"/>)
						</span>
						
						</td>
					</tr>
				<?php endforeach; endif; unset($_from); ?>
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
		
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "villages_per_page.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
<?php endif; ?>