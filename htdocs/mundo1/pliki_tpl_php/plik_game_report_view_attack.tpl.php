<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2023-02-26 21:21:34
         Wersja PHP pliku pliki_tpl/game_report_view_attack.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'game_report_view_attack.tpl', 74, false),array('modifier', 'format_number', 'game_report_view_attack.tpl', 146, false),)), $this); ?>
<?php 
$report_info = sql("SELECT bonus_noc,f_units,sorowce_poz,budynki,att_pala_item,def_pala_item,att_pala_name,def_pala_name,pala_find_item,allyname FROM `reports` WHERE `id` = '".$this->_tpl_vars['report']['id']."'",'assoc');

global $pala_bonus,$cl_builds;

$report_info['f_units'] = explode(';',$report_info['f_units']);
if (count($report_info['f_units']) > 1) {
	$pzw_units_see = true;
	} else {
	$pzw_units_see = false;
	}
$this->_tpl_vars['def_out_units_see'] = $pzw_units_see;

$report_info['sorowce_poz'] = explode(';',$report_info['sorowce_poz']);
if (array_sum($report_info['sorowce_poz']) > 0) {
	$pzw_res_see = true;
	} else {
	$pzw_res_see = false;
	}
	
$this->_tpl_vars['def_out_res_see'] = $pzw_res_see;
$report_info['budynki'] = explode(';',$report_info['budynki']);
$report_info['att_pala_name'] = entparse($report_info['att_pala_name']);
$report_info['def_pala_name'] = entparse($report_info['def_pala_name']);

$i = 0;

foreach ($this->_tpl_vars['cl_units']->get_array("dbname") as $dbname) {
	if ($dbname == 'unit_paladin') {
		$pala_id = $i;
		}
	if ($dbname == 'unit_spy') {
		$spy_id = $i;
		}
	$i++;
	}
	
if (($this->_tpl_vars['report_units']['units_a'][$spy_id] - $this->_tpl_vars['report_units']['units_b'][$spy_id]) > 0) {
	$OR_SPY = true;
	}
	
$i = 0;

$this->_tpl_vars['reportps'] = $report_info;
$this->_tpl_vars['pala_bonuses'] = $pala_bonus;
$this->_tpl_vars['cl_builds'] = $cl_builds;
$this->_tpl_vars['unit_paladin'] = $pala_id;
$this->_tpl_vars['OR_SPY'] = $OR_SPY;
$this->_tpl_vars['bb_report'] = base64_encode($this->_tpl_vars['report']['id']);
 ?>

<?php if ($this->_tpl_vars['report']['wins'] == 'att'): ?>
	<h3>O agressor ganhou</h3>
<?php else: ?>
    <h3>O Defensor ganhou</h3>
<?php endif; ?>

<?php if (! $this->_tpl_vars['user']['classic_graphics'] && ! empty ( $this->_tpl_vars['reportps']['allyname'] )): ?>
	<div class="report_image <?php echo $this->_tpl_vars['reportps']['allyname']; ?>
"><div class="report_transparent_overlay">
<?php endif; ?>

<h4>Felicidade (do ponto de vista do agressor)</h4>
<table id="attack_luck">
	<?php if ($this->_tpl_vars['report']['luck'] < 0): ?>
		<tr>
			<td class="nobg" style="padding: 0pt;"><b><?php echo $this->_tpl_vars['report']['luck']; ?>
%</b></td>
			<td class="nobg"><img src="/ds_graphic/rabe.png?1" alt="Pech"></td>

			<td class="nobg">

				<table class="luck" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td class="luck-item nobg" height="12" width="<?php echo smarty_function_math(array('equation' => "a-(b*(x * y))",'b' => -1,'a' => 50,'x' => $this->_tpl_vars['report']['luck'],'y' => 2), $this);?>
"></td>
							<td class="luck-item nobg" style="border-right: 1px solid rgb(0, 0, 0); background-image: url(/ds_graphic/balken_pech.png?1);" width="<?php echo smarty_function_math(array('equation' => "b*(x * y)",'b' => -1,'x' => $this->_tpl_vars['report']['luck'],'y' => 2), $this);?>
"></td>
							<td class="luck-item nobg" width="50"></td>
						</tr>
					</tbody>
				</table>
			</td>

			<td class="nobg"><img src="/ds_graphic/klee_grau.png?1" alt="Szcz�cie"></td>
		</tr>
	<?php else: ?>
		<tr>
			<td class="nobg" style="padding: 0pt;"></td>
			<td class="nobg"><img src="/ds_graphic/rabe_grau.png?1" alt="Pech"></td>

			<td class="nobg">

				<table class="luck" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td class="luck-item nobg" height="12" width="50"></td>
							<td class="luck-item nobg" style="border-left: 1px solid rgb(0, 0, 0); background-image: url(/ds_graphic/balken_glueck.png?1);" width="<?php echo smarty_function_math(array('equation' => "x * y",'x' => $this->_tpl_vars['report']['luck'],'y' => 2), $this);?>
"></td>
							<td class="luck-item nobg" width="<?php echo smarty_function_math(array('equation' => "a-(x * y)",'a' => 50,'x' => $this->_tpl_vars['report']['luck'],'y' => 2), $this);?>
"></td>
						</tr>
					</tbody>
				</table>
			</td>

			<td class="nobg"><img src="/ds_graphic/klee.png?1" alt="Szcz�cie"></td>
			<td class="nobg"><b><?php echo $this->_tpl_vars['report']['luck']; ?>
%</b></td>
		</tr>
	<?php endif; ?>
</table>

<?php if ($this->_tpl_vars['moral_activ'] == 'true'): ?>
	<?php if ($this->_tpl_vars['user']['classic_graphics'] && empty ( $this->_tpl_vars['reportps']['allyname'] )): ?>
		<table>
			<tr><td><h4>Moral: <?php echo $this->_tpl_vars['report']['moral']; ?>
%</h4></td></tr>
		</table>
		<br />
	<?php else: ?>
		<h4>Morale: <?php echo $this->_tpl_vars['report']['moral']; ?>
%</h4>
	<?php endif; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['reportps']['bonus_noc'] == 1): ?>
	<?php if ($this->_tpl_vars['user']['classic_graphics'] && empty ( $this->_tpl_vars['reportps']['allyname'] )): ?>
		<table>
			<tr><td><h4>100% Bônus noturno de defesa está ativo.</h4></td></tr>
		</table>
		<br />
	<?php else: ?>
		<h4>100% Bônus noturno de defesa está ativo.</h4>
	<?php endif; ?>
<?php endif; ?>

<?php if (! $this->_tpl_vars['user']['classic_graphics'] && ! empty ( $this->_tpl_vars['reportps']['allyname'] )): ?>
	</div></div>
<?php endif; ?>

<table width="100%" style="border: 1px solid #DED3B9">
<tr><th width="100">Agresor:</th><th><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['report']['from_user']; ?>
"><?php echo $this->_tpl_vars['report']['from_username']; ?>
</a></th></tr>
<tr><td>Origem:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['report']['from_village']; ?>
"><?php echo $this->_tpl_vars['report']['from_villagename']; ?>
 (<?php echo $this->_tpl_vars['report']['from_x']; ?>
|<?php echo $this->_tpl_vars['report']['from_y']; ?>
)</a></td></tr>

<tr><td colspan="2">
	<table class="vis">
	<tr class="center">
		<td></td>
		<?php $_from = $this->_tpl_vars['cl_units']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
			<td width="35"><img src="/ds_graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" alt="" /></td>
		<?php endforeach; endif; unset($_from); ?>
	</tr>
	<tr class="center"><td>Quantidade:</td><?php $_from = $this->_tpl_vars['report_units']['units_a']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num_units']):
?><?php if ($this->_tpl_vars['num_units'] > 0): ?><td><?php echo ((is_array($_tmp=$this->_tpl_vars['num_units'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td><?php else: ?><td class="hidden">0</td><?php endif; ?><?php endforeach; endif; unset($_from); ?></tr>

	<tr class="center"><td>Baixas:</td><?php $_from = $this->_tpl_vars['report_units']['units_b']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num_units']):
?><?php if ($this->_tpl_vars['num_units'] > 0): ?><td><?php echo ((is_array($_tmp=$this->_tpl_vars['num_units'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td><?php else: ?><td class="hidden">0</td><?php endif; ?><?php endforeach; endif; unset($_from); ?></tr>
	<?php if ($this->_tpl_vars['report_units']['units_a'][$this->_tpl_vars['unit_paladin']] > 0): ?>
		<tr class="center">
			<td>
				Paladino:
			</td>
			<td colspan="<?php  echo count($this->_tpl_vars['cl_units']->get_array("dbname")); ?>">
			<?php if ($this->_tpl_vars['report_units']['units_a'][$this->_tpl_vars['unit_paladin']] == $this->_tpl_vars['report_units']['units_b'][$this->_tpl_vars['unit_paladin']]): ?>
				<?php if ($this->_tpl_vars['report']['from_user'] == $this->_tpl_vars['user']['id']): ?>
					Seu paladino vai morrer.
				<?php else: ?>
					O Paladino foi morto.
				<?php endif; ?>
			<?php else: ?>
				Um cavaleiro chamado <?php echo $this->_tpl_vars['reportps']['att_pala_name']; ?>
 ,
				<?php if (! empty ( $this->_tpl_vars['reportps']['att_pala_item'] )): ?>
					equipado com <?php echo $this->_tpl_vars['pala_bonuses'][$this->_tpl_vars['reportps']['att_pala_item']]['2']; ?>
.
				<?php else: ?>
					sem o item.
				<?php endif; ?>
			<?php endif; ?>
			</td>
		</tr>
	<?php endif; ?>
	</table>

</td></tr>
</table><br />

<table width="100%" style="border: 1px solid #DED3B9">
<tr><th width="100">Defensor:</th><th><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['report']['to_user']; ?>
"><?php echo $this->_tpl_vars['report']['to_username']; ?>
</a></th></tr>
<tr><td>objetivo:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['report']['to_village']; ?>
"><?php echo $this->_tpl_vars['report']['to_villagename']; ?>
 (<?php echo $this->_tpl_vars['report']['to_x']; ?>
|<?php echo $this->_tpl_vars['report']['to_y']; ?>
)</a></td></tr>
<tr><td colspan="2">
	<?php if ($this->_tpl_vars['see_def_units'] || $this->_tpl_vars['OR_SPY']): ?>
		<table class="vis">
		<tr class="center">
			<td></td>
			<?php $_from = $this->_tpl_vars['cl_units']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
				<td width="35"><img src="/ds_graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" alt="" /></th>
			<?php endforeach; endif; unset($_from); ?>
		</tr>
		<tr class="center"><td>Quantidade:</td><?php $_from = $this->_tpl_vars['report_units']['units_c']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num_units']):
?><?php if ($this->_tpl_vars['num_units'] > 0): ?><td><?php echo ((is_array($_tmp=$this->_tpl_vars['num_units'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td><?php else: ?><td class="hidden">0</td><?php endif; ?><?php endforeach; endif; unset($_from); ?></tr>
	
		<tr class="center"><td>Baixas:</td><?php $_from = $this->_tpl_vars['report_units']['units_d']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num_units']):
?><?php if ($this->_tpl_vars['num_units'] > 0): ?><td><?php echo ((is_array($_tmp=$this->_tpl_vars['num_units'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td><?php else: ?><td class="hidden">0</td><?php endif; ?><?php endforeach; endif; unset($_from); ?></tr>
		
		<?php if ($this->_tpl_vars['report_units']['units_c'][$this->_tpl_vars['unit_paladin']] > 0): ?>
			<tr class="center">
				<td>
					Paladino:
				</td>
				<td colspan="<?php  echo count($this->_tpl_vars['cl_units']->get_array("dbname")); ?>">
				<?php if ($this->_tpl_vars['report_units']['units_c'][$this->_tpl_vars['unit_paladin']] == $this->_tpl_vars['report_units']['units_d'][$this->_tpl_vars['unit_paladin']]): ?>
					<?php if ($this->_tpl_vars['report']['to_user'] == $this->_tpl_vars['user']['id']): ?>
						Seu Paladino vai morrer.
					<?php else: ?>
						Seu Paladino morreu.
					<?php endif; ?>
				<?php else: ?>
					Um cavaleiro chamado <?php echo $this->_tpl_vars['reportps']['def_pala_name']; ?>
 ,
					<?php if (! empty ( $this->_tpl_vars['reportps']['def_pala_item'] )): ?>
						equipado com <?php echo $this->_tpl_vars['pala_bonuses'][$this->_tpl_vars['reportps']['def_pala_item']]['2']; ?>
.
					<?php else: ?>
						sem um objeto.
					<?php endif; ?>
				<?php endif; ?>
				</td>
			</tr>
		<?php endif; ?>
		
		</table>
	<?php else: ?>
		<p>Todas as suas tropas morreram, nenhuma informação sobre as forças inimigas foi obtida</p>
	<?php endif; ?>

</td></tr>
</table><br />

<?php if ($this->_tpl_vars['def_out_units_see'] || count ( $this->_tpl_vars['reportps']['budynki'] ) > 1 || $this->_tpl_vars['def_out_res_see']): ?>
	<h4>Espionagem</h4>
	
	<table id="attack_spy" style="border: 1px solid rgb(222, 211, 185); padding: 0px 0px 0px 0px;">
		<?php if ($this->_tpl_vars['def_out_res_see']): ?>
			<tr>
				<th>
					Recursos espionados:
				</th>
				<td>
					<?php if ($this->_tpl_vars['reportps']['sorowce_poz']['0'] > 0): ?><img src="/ds_graphic/holz.png" title="Madeira" alt="" /><?php echo ((is_array($_tmp=$this->_tpl_vars['reportps']['sorowce_poz']['0'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
 <?php endif; ?>
					<?php if ($this->_tpl_vars['reportps']['sorowce_poz']['1'] > 0): ?><img src="/ds_graphic/lehm.png" title="Argila" alt="" /><?php echo ((is_array($_tmp=$this->_tpl_vars['reportps']['sorowce_poz']['1'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
 <?php endif; ?>
					<?php if ($this->_tpl_vars['reportps']['sorowce_poz']['2'] > 0): ?><img src="/ds_graphic/eisen.png" title="Ferro" alt="" /><?php echo ((is_array($_tmp=$this->_tpl_vars['reportps']['sorowce_poz']['2'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
 <?php endif; ?>
				</td>
			</tr>
		<?php endif; ?>
		<?php if (count ( $this->_tpl_vars['reportps']['budynki'] ) > 1): ?>
			<tr>
				<th>Edifícios:</th>
				<td>
					<?php $this->_tpl_vars['i'] = 0; ?>
					<?php $_from = $this->_tpl_vars['cl_builds']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
						<?php if ($this->_tpl_vars['reportps']['budynki'][$this->_tpl_vars['i']] > 0): ?>
							<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
 <b>(Stopie� <?php echo $this->_tpl_vars['reportps']['budynki'][$this->_tpl_vars['i']]; ?>
)</b><br>
						<?php endif; ?>
						<?php $this->_tpl_vars['i']++; ?>
					<?php endforeach; endif; unset($_from); ?>
					<?php $this->_tpl_vars['i'] = 0; ?>
				</td>
			</tr>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['def_out_units_see']): ?>
			<tr>
				<th colspan="2">Unidades fora da aldeia:</th>
			</tr>
			<tr>
				<td colspan="2"/>
					<table class="vis">
						<tr>
							<?php $_from = $this->_tpl_vars['cl_units']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
								<th width="35">
									<img src="/ds_graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" alt="" />
								</th>
							<?php endforeach; endif; unset($_from); ?>
						</tr>
						<tr>
							<?php $_from = $this->_tpl_vars['reportps']['f_units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num_units']):
?>
								<?php if ($this->_tpl_vars['num_units'] > 0): ?>
									<td><?php echo ((is_array($_tmp=$this->_tpl_vars['num_units'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>
								<?php else: ?>
									<td class="hidden">0</td>
								<?php endif; ?>
							<?php endforeach; endif; unset($_from); ?>
						</tr>
					</table>
				</td>
			</tr>
		<?php endif; ?>
	</table>
	<br>
<?php endif; ?>

	
<table width="100%" style="border: 1px solid #DED3B9">
	<?php if (count ( $this->_tpl_vars['report_units']['units_e'] ) > 1 && $this->_tpl_vars['po_za_wioska']): ?>
		<h4>As tropas que estavam fora da aldeia</h4>
		<table>
			<tr>
				<?php $_from = $this->_tpl_vars['cl_units']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
					<th width="35">
						<img src="/ds_graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" alt="" />
					</th>
				<?php endforeach; endif; unset($_from); ?>
			</tr>
			<tr>
				<?php $_from = $this->_tpl_vars['report_units']['units_e']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num_units']):
?>
					<?php if ($this->_tpl_vars['num_units'] > 0): ?>
						<td><?php echo $this->_tpl_vars['num_units']; ?>
</td>
					<?php else: ?>
						<td class="hidden">0</td>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			</tr>
	</table>
	<br>
<?php endif; ?>

<table width="100%" style="border: 1px solid #DED3B9">
	<?php if ($this->_tpl_vars['report_ress']['wood'] > 0 || $this->_tpl_vars['report_ress']['stone'] > 0 || $this->_tpl_vars['report_ress']['iron'] > 0): ?>
		<tr><th>Saque</th>
		<td width="220">
			<?php if ($this->_tpl_vars['report_ress']['wood'] > 0): ?><img src="/ds_graphic/holz.png" title="Madeira" alt="" /><?php echo ((is_array($_tmp=$this->_tpl_vars['report_ress']['wood'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
 <?php endif; ?>
			<?php if ($this->_tpl_vars['report_ress']['stone'] > 0): ?><img src="/ds_graphic/lehm.png" title="Argila" alt="" /><?php echo ((is_array($_tmp=$this->_tpl_vars['report_ress']['stone'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
 <?php endif; ?>
			<?php if ($this->_tpl_vars['report_ress']['iron'] > 0): ?><img src="/ds_graphic/eisen.png" title="Ferro" alt="" /><?php echo ((is_array($_tmp=$this->_tpl_vars['report_ress']['iron'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
 <?php endif; ?></td>
		<td><?php echo $this->_tpl_vars['report_ress']['sum']; ?>
/<?php echo $this->_tpl_vars['report_ress']['max']; ?>
</td>
		</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['report']['to_user'] == $this->_tpl_vars['user']['id'] && $this->_tpl_vars['def_out_units_see']): ?>
		<tr>
			<th>Atenção:</th>
			<td>
				Suas tropas foram detectadas pelo inimigo.
			</td>
		</tr>
	<?php endif; ?>
	<?php if (! empty ( $this->_tpl_vars['reportps']['pala_find_item'] )): ?>
		<tr>
			<th>Paladino:</th>
			<td>
				O seu Paladino encontrou um item - <?php echo $this->_tpl_vars['pala_bonuses'][$this->_tpl_vars['reportps']['pala_find_item']]['2']; ?>
.
			</td>
		</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['report_ram']['from'] != $this->_tpl_vars['report_ram']['to']): ?>
		<tr><th>Danos causados ​​por Arietes:</th>
		<td colspan="2">Muralha destruída do nível <b><?php echo $this->_tpl_vars['report_ram']['from']; ?>
</b> para nivel <b><?php echo $this->_tpl_vars['report_ram']['to']; ?>
</b></td></tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['report_agreement']['from'] != $this->_tpl_vars['report_agreement']['to']): ?>
	<tr><th>Moral:</th>
	<td colspan="2">caiu de <b><?php echo ((is_array($_tmp=$this->_tpl_vars['report_agreement']['from'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</b> sobre <b><?php echo ((is_array($_tmp=$this->_tpl_vars['report_agreement']['to'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</b></td></tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['report_catapult']['from'] != $this->_tpl_vars['report_catapult']['to']): ?>
		<tr><th>Danos causados ​​por Catapultas:</th>
		<td colspan="2"><?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['report_catapult']['building']); ?>
 foi destruído do nível <b><?php echo $this->_tpl_vars['report_catapult']['from']; ?>
</b> para o nível <b><?php echo $this->_tpl_vars['report_catapult']['to']; ?>
</b></td></tr>
	<?php endif; ?>
</table>

<br>
<table class="vis" width="100%"/>
	<tr>
		<th><span class="link" onclick="switchDisplay('bb_report_send')"/>Ver este relatorio em bb-code</span></th>
	</tr>
	<tr>
		<td>
		<div id="bb_report_send" style="display:none;">
			<p>[report_display]<?php echo $this->_tpl_vars['bb_report']; ?>
[/report_display]</p>
		</div>
		</td>
	</tr>
</table>