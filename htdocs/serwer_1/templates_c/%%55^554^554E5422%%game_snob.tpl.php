<?php /* Smarty version 2.6.14, created on 2018-08-26 15:28:42
         compiled from game_snob.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_time', 'game_snob.tpl', 68, false),array('modifier', 'format_number', 'game_snob.tpl', 327, false),)), $this); ?>
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
				<?php if (aktu_build_prc > 0.5): ?>
					<img src="graphic/big_buildings/<?php echo $this->_tpl_vars['dbname']; ?>
3.png" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" alt="" />
				<?php else: ?>
					<?php if ($this->_tpl_vars['aktu_build_prc'] > 0.2): ?>
						<img src="graphic/big_buildings/<?php echo $this->_tpl_vars['dbname']; ?>
2.png" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" alt="" />
					<?php else: ?>
						<img src="graphic/big_buildings/<?php echo $this->_tpl_vars['dbname']; ?>
1.png" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" alt="" />
					<?php endif; ?>
				<?php endif; ?>
			<?php else: ?>
				<img src="graphic/big_buildings/<?php echo $this->_tpl_vars['dbname']; ?>
1.png" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" alt="" />
			<?php endif; ?>
		</td>
		<td>
			<h2><?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
 (<?php if ($this->_tpl_vars['village'][$this->_tpl_vars['dbname']] > 0): ?>Poziom <?php echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']];  else: ?>Nie zbudowano<?php endif; ?>)</h2>
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
			<table class="vis">
				<tr>
					<th width="150">Kszta³cenie</th>
					<th width="120">Trwanie</th>
					<th width="150">Gotowe</th>
					<th width="100">Zakoñcz *</th>
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
								<?php header('location: game.php?village='.$this->_tpl_vars['village']['id'].'&screen='.$_GET['screen']); ?>
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
">przerwij</a></td>
					</tr>
				<?php endforeach; endif; unset($_from); ?>
			</table>
		
			<div style="font-size: 7pt;">* (W przypadku przerwania, zostanie zwrócone 90% surowcówn)</div>
		
			<br>
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
					<th width="150">Jednostka</th>
					<th colspan="4" width="120">Koszt</th>
					<th width="130">Czas (hh:mm:ss)</th>
					<th>W wiosce/Ogólnie</th>
					<th>Rekrutuj</th>
				</tr>

				<?php $_from = $this->_tpl_vars['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['unit_dbname'] => $this->_tpl_vars['name']):
?>
					<tr>
						<td><a href="javascript:popup('popup_unit.php?unit=<?php echo $this->_tpl_vars['unit_dbname']; ?>
', 520, 520)"> <img src="graphic/unit/<?php echo $this->_tpl_vars['unit_dbname']; ?>
.png" alt="" /> <?php echo $this->_tpl_vars['name']; ?>
</a></td>
						<td><img src="graphic/holz.png" title="Holz" alt="" /> <?php if ($this->_tpl_vars['village']['r_wood'] >= $this->_tpl_vars['cl_units']->get_woodprice($this->_tpl_vars['unit_dbname'])):  echo $this->_tpl_vars['cl_units']->get_woodprice($this->_tpl_vars['unit_dbname']);  else: ?><font color="red"><?php echo $this->_tpl_vars['cl_units']->get_woodprice($this->_tpl_vars['unit_dbname']); ?>
</font><?php endif; ?></td>
						<td><img src="graphic/lehm.png" title="Lehm" alt="" /> <?php if ($this->_tpl_vars['village']['r_stone'] >= $this->_tpl_vars['cl_units']->get_stoneprice($this->_tpl_vars['unit_dbname'])):  echo $this->_tpl_vars['cl_units']->get_stoneprice($this->_tpl_vars['unit_dbname']);  else: ?><font color="red"><?php echo $this->_tpl_vars['cl_units']->get_stoneprice($this->_tpl_vars['unit_dbname']); ?>
</font><?php endif; ?></td>
						<td><img src="graphic/eisen.png" title="Eisen" alt="" /> <?php if ($this->_tpl_vars['village']['r_iron'] >= $this->_tpl_vars['cl_units']->get_ironprice($this->_tpl_vars['unit_dbname'])):  echo $this->_tpl_vars['cl_units']->get_ironprice($this->_tpl_vars['unit_dbname']);  else: ?><font color="red"><?php echo $this->_tpl_vars['cl_units']->get_ironprice($this->_tpl_vars['unit_dbname']); ?>
</font><?php endif; ?></td>
						<td><img src="graphic/face.png" title="Arbeiter" alt="" /> <?php if ($this->_tpl_vars['max_bh'] - $this->_tpl_vars['village']['r_bh'] >= $this->_tpl_vars['cl_units']->get_bhprice($this->_tpl_vars['unit_dbname'])):  echo $this->_tpl_vars['cl_units']->get_bhprice($this->_tpl_vars['unit_dbname']);  else: ?><font color="red"><?php echo $this->_tpl_vars['cl_units']->get_bhprice($this->_tpl_vars['unit_dbname']); ?>
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
											(maks. <?php echo $this->_tpl_vars['units_can_prod'][$this->_tpl_vars['unit_dbname']]; ?>
)
										</span>
									</td>
								<?php else: ?>
									<td class="inactive">Za ma³y limit szlachty</td>
								<?php endif; ?>
							<?php else: ?>
								<td class="inactive">Za ma³o miejsca w zagrodzie</td>
							<?php endif; ?>
						<?php else: ?>
							<td class="inactive">Posiadasz za ma³o surowców</td>
						<?php endif; ?>
					</tr>
					<tr>
						<td colspan="8" align="right">
							<input name="submit" type="submit" value="Rekrutowaæ" style="font-size: 10pt;" />
						</td>
					</tr>
				<?php endforeach; endif; unset($_from); ?>
			</table>
		</form>
		
		<br />
		<?php if ($this->_tpl_vars['ag_style'] == 0): ?>
			<h4>Liczba szlachciców, których mo¿na wytrenowaæ</h4>
			<table class="vis">
				<tr><td>Poziom szlachty:</td><td><?php echo $this->_tpl_vars['snobs_stage']; ?>
</td></tr>
				<tr><td>- Szlachcice dostêpni:</td><td><?php echo $this->_tpl_vars['snobs_dostepne']; ?>
</td></tr>
				<tr><td>- Szlachcice w produkcji:</td><td><?php echo $this->_tpl_vars['snobs_produkcja']; ?>
</td></tr>
				<tr><td>- Szlachcice osadzenie w wioskach:</td><td><?php echo $this->_tpl_vars['snobs_in_vgs']; ?>
</td></tr>
				<tr><th>Mo¿na wyprodukowaæ:</th><th><?php echo $this->_tpl_vars['snobs_canpr']; ?>
</th></tr>
			</table>
		<?php elseif ($this->_tpl_vars['ag_style'] == 1): ?>
			<h4>Liczba szlachciców, których mo¿na wytrenowaæ</h4>
			<table class="vis">
				<tr>
					<td>Limit szlachty:</td>
					<td><?php echo $this->_tpl_vars['snobs_stage']; ?>
</td>
				</tr>
				<tr>
					<td>- Szlachcice dostêpni:</td>
					<td><?php echo $this->_tpl_vars['snobs_dostepne']; ?>
</td>
				</tr>
				<tr>
					<td>- Szlachcice w produkcji:</td>
					<td><?php echo $this->_tpl_vars['snobs_produkcja']; ?>
</td>
				</tr>
				<tr>
					<td>- Przejête wioski:</td>
					<td><?php echo $this->_tpl_vars['snobs_in_vgs']; ?>
</td>
				</tr>
				<tr>
					<th>Mo¿na wyprodukowaæ:</th>
					<th><?php echo $this->_tpl_vars['snobs_canpr']; ?>
</th>
				</tr>
			</table>
			
			<br/>
    
			<table>
				<tbody>
					<tr>
						<td>
							<img alt="Moneta" src="graphic/gold_big.png" />
						</td>
						<td>
							<h4>Z³ote monety</h4>
							<p>Aby móc trenowaæ szlachciców do przejmowania wiosek, musisz wybiæ odpowiedni¹ iloœæ monet.</p>
						</td>
					</tr>
				</tbody>
			</table>
	
			<table class="vis">
				<tbody>
					<tr>
						<td>Wybite monety:</td>
						<td><?php echo $this->_tpl_vars['all_coins']; ?>
</td>
					</tr>
					<tr>
						<td>Monety potrzebne do nastêpnego szlachcica:</td>
						<td><?php echo $this->_tpl_vars['coins_next']; ?>
</td>
					</tr>
					<tr>
						<td>Monety zgromadzone do nastêpnego szlachcica:</td>
						<td><?php echo $this->_tpl_vars['coins_zgr']; ?>
</td>
					</tr>
					<tr>
						<td>Limit szlachty:</td>
						<td><?php echo $this->_tpl_vars['snobs_stage']; ?>
</td>
					</tr>
				</tbody>
			</table>

			<br>
		
			<table class="vis">
				<tbody>
					<tr>
						<th>Zapotrzebowanie</th>
						<th>Wybiæ monetê</th>
					</tr>
					<tr>
						<td>
							<img alt="" title="Drewno" src="graphic/holz.png"/>
							<?php if ($this->_tpl_vars['village']['r_wood'] > $this->_tpl_vars['koszt_monety']['wood']): ?>
								<?php echo $this->_tpl_vars['koszt_monety']['wood']; ?>

							<?php else: ?>
								<font color="red"><?php echo $this->_tpl_vars['koszt_monety']['wood']; ?>
</font>
							<?php endif; ?>
						
							<img alt="" title="Glina" src="graphic/lehm.png"/>
							<?php if ($this->_tpl_vars['village']['r_stone'] > $this->_tpl_vars['koszt_monety']['stone']): ?>
								<?php echo $this->_tpl_vars['koszt_monety']['stone']; ?>

							<?php else: ?>
								<font color="red"><?php echo $this->_tpl_vars['koszt_monety']['stone']; ?>
</font>
							<?php endif; ?>
						
							<img alt="" title="Ruda" src="graphic/eisen.png"/>
							<?php if ($this->_tpl_vars['village']['r_iron'] > $this->_tpl_vars['koszt_monety']['iron']): ?>
								<?php echo $this->_tpl_vars['koszt_monety']['iron']; ?>

							<?php else: ?>
								<font color="red"><?php echo $this->_tpl_vars['koszt_monety']['iron']; ?>
</font>
							<?php endif; ?>
						</td>
						<td class="inactive">
							<?php if ($this->_tpl_vars['twoz_monete']): ?>
								<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=snob&action=wybij_monete">&raquo; Wybiæ monetê</a>
							<?php else: ?>
								<span>Surowce dostêpne za <span class="timer_replace"><?php echo ((is_array($_tmp=$this->_tpl_vars['czekanie'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></span><span style="display:none">Surowce dostêpne</span>
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
						<img alt="Moneta" src="graphic/gold_big.png" />
					</td>
					<td>
						<h4>Z³ote monety</h4>
						<p>Aby móc trenowaæ szlachciców do przejmowania wiosek, musisz wybiæ odpowiedni¹ iloœæ monet.</p>
					</td>
				</tr>
			</tbody>
		</table>
	
		<table class="vis">
			<tbody>
				<tr>
					<td>Wybite monety:</td>
					<td><?php echo $this->_tpl_vars['all_coins']; ?>
</td>
				</tr>
				<tr>
					<td>Monety potrzebne do nastêpnego szlachcica:</td>
					<td><?php echo $this->_tpl_vars['coins_next']; ?>
</td>
				</tr>
				<tr>
					<td>Monety zgromadzone do nastêpnego szlachcica:</td>
					<td><?php echo $this->_tpl_vars['coins_zgr']; ?>
</td>
				</tr>
				<tr>
					<td>Limit szlachty:</td>
					<td><?php echo $this->_tpl_vars['snobs_stage']; ?>
</td>
				</tr>
			</tbody>
		</table>

		<br>
		<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
			<font class="error"><?php echo $this->_tpl_vars['error']; ?>
</font>
		<?php endif; ?>
			
		<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=snob&amp;mode=mass_monety&amp;action=wybijaj_wiele_monet" method="post" name="kingsage">
			<?php if ($this->_tpl_vars['sekcja']): ?>
				<table class="vis" width="810">
					<tr>
						<td>
							<?php echo $this->_tpl_vars['sekcja_wiosek']; ?>
 
						</td>
					</tr>
				</table>
			<?php endif; ?>
			<table class="vis" width="810">
				<tr>
					<th>
						Wioska
					</th>
					<th colspan="3">
						Surowce
					</th>
					<th colspan="3">
						Iloœæ monet
					</th>
				</tr>
				<?php $_from = $this->_tpl_vars['masowe_wybijanie']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['wioska']):
?>
					<tr<?php if ($this->_tpl_vars['wioska']['id'] == $this->_tpl_vars['village']['id']): ?> class="lit"<?php else:  if (! $this->_tpl_vars['wioska']['parzysta_liczba']): ?> class="lp"<?php endif;  endif; ?>>
						<td width="250">
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
							<img src="graphic/wood.png" title="Drewno"/>&nbsp;
							<?php if ($this->_tpl_vars['wioska']['r_wood'] >= $this->_tpl_vars['wioska']['max_storage']): ?>
								<span class="warn"/><?php echo ((is_array($_tmp=$this->_tpl_vars['wioska']['r_wood'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</span>
							<?php else: ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['wioska']['r_wood'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>

							<?php endif; ?>
						</td>
						<td width="120">
							<img src="graphic/stone.png" title="Kamienie"/>&nbsp;
							<?php if ($this->_tpl_vars['wioska']['r_stone'] >= $this->_tpl_vars['wioska']['max_storage']): ?>
								<span class="warn"/><?php echo ((is_array($_tmp=$this->_tpl_vars['wioska']['r_stone'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</span>
							<?php else: ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['wioska']['r_stone'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>

							<?php endif; ?>
						</td>
						<td width="120">
							<img src="graphic/iron.png" title="¯elazo"/>&nbsp;
							<?php if ($this->_tpl_vars['wioska']['r_iron'] >= $this->_tpl_vars['wioska']['max_storage']): ?>
								<span class="warn"/><?php echo ((is_array($_tmp=$this->_tpl_vars['wioska']['r_iron'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</span>
							<?php else: ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['wioska']['r_iron'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>

							<?php endif; ?>
						</td>
						<td width="150">
						<input id="<?php echo $this->_tpl_vars['wioska']['id']; ?>
" name="m<?php echo $this->_tpl_vars['wioska']['id']; ?>
" max_value="<?php echo $this->_tpl_vars['wioska']['max_monets_can_coin']; ?>
" type="text" style="width:50px;"/>
						<span style="font-weight:bold; color: #804000; cursor: pointer;" onclick="insertNumId('<?php echo $this->_tpl_vars['wioska']['id']; ?>
', '<?php echo $this->_tpl_vars['wioska']['max_monets_can_coin']; ?>
');return false;">
							(maks. <?php echo $this->_tpl_vars['wioska']['max_monets_can_coin']; ?>
)
						</span>
						</td>
					</tr>
				<?php endforeach; endif; unset($_from); ?>
				<td style="height:24px;" align="left">
					<span class="click" onclick="selectCoiningNoneMax('Wybierz maksymaln¹ liczbê', 'Odznacz wszystko');return false;">
						<span id="select_all_1" style="font-weight:bold; color: #804000; cursor: pointer;">
							Wybierz maksymaln¹ liczbê
						</span>
					</span>
				</td>
				<td colspan=3 style="height:24px;">
				</td>
				<td style="height:24px;" align="right">
					<input type="submit" name="wybij" value="Wybij monety" style="font-size: 10pt;"/>
				</td>
			</table>
		</form>
	<?php endif;  endif; ?>