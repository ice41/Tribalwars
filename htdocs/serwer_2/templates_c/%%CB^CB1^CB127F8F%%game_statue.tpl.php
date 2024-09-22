<?php /* Smarty version 2.6.14, created on 2012-01-30 21:48:48
         compiled from game_statue.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_time', 'game_statue.tpl', 131, false),)), $this); ?>
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
<?php if ($this->_tpl_vars['village'][$this->_tpl_vars['dbname']] > 0): ?>
	<table class="vis modemenu">
		<tbody>
			<tr>
				<?php $_from = $this->_tpl_vars['modes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['mname'] => $this->_tpl_vars['amode']):
?>
					<?php if ($this->_tpl_vars['mname'] == $this->_tpl_vars['mode']): ?>
					<td class="selected" width="100">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=statue&amp;mode=<?php echo $this->_tpl_vars['mname']; ?>
"><?php echo $this->_tpl_vars['amode']; ?>
 </a>
					</td>
					<?php else: ?>
					<td width="100">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=statue&amp;mode=<?php echo $this->_tpl_vars['mname']; ?>
"><?php echo $this->_tpl_vars['amode']; ?>
 </a>
					</td>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			</tr>
		</tbody>
	</table>

	<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
		<span class="error"/><?php echo $this->_tpl_vars['error']; ?>
</span>
	<?php endif; ?>

	<?php if ($this->_tpl_vars['mode'] == 'inventory'): ?>
	<div style="width: 840px; float: left;">
		<div style="float: right; width: 210px; padding-right: 5px;">
			<p>Przedmioty dzia³aj¹, gdy rycerz zostanie w nie wyposa¿ony i gdy znajduje siê on w danej armii.</p>
			<?php if (! $this->_tpl_vars['pala_all_items']): ?>
				<?php if ($this->_tpl_vars['pala_none_items']): ?>
					<p>Dotychczas nie znaleziono ¿adnych przedmiotów.</p>
				<?php else: ?>
					<p>Odnalezione przedmioty:</p>
					<p>
					<?php $_from = $this->_tpl_vars['user_pala_arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pala_item']):
?>
						<?php echo $this->_tpl_vars['pala_bonuses'][$this->_tpl_vars['pala_item']]['2']; ?>
<br>
					<?php endforeach; endif; unset($_from); ?>
					</p>
				<?php endif; ?>
			<?php else: ?>
				<p>Odnaleziono ju¿ wszystkie przedmioty.</p>
			<?php endif; ?>
			<?php if (! empty ( $this->_tpl_vars['user']['pala_aktu_item'] )): ?>
				<b>Twój&nbsp;rycerz&nbsp;wyposa¿ony&nbsp;jest&nbsp;w:</b></br>
				<?php echo $this->_tpl_vars['pala_bonuses'][$this->_tpl_vars['user']['pala_aktu_item']]['2']; ?>

			<?php endif; ?>
		</div>
	
		<div style="float: left; position: relative; z-index: 9996; width: 605px; padding-left: 2px;">

		<div style="padding: 0pt; width: 600px; height: 430px; margin-right: 10px; z-index: 9997;">
			
		<img src="graphic/map/empty.png?1" alt="" title="" class="inv_empty" usemap="#inv">
		<map id="inv" name="inv">
			<?php $_from = $this->_tpl_vars['user_pala_arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pala_item']):
?>
				<img style="position: absolute;" class="inv_<?php echo $this->_tpl_vars['pala_item']; ?>
" src="graphic/inventory/<?php echo $this->_tpl_vars['pala_item']; ?>
.png" title="<?php echo $this->_tpl_vars['pala_bonuses'][$this->_tpl_vars['pala_item']]['2']; ?>
"/>
				<area shape="poly" coords="<?php echo $this->_tpl_vars['pala_coords'][$this->_tpl_vars['pala_item']]; ?>
" href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=statue&mode=inventory&action=change_pala_item&item_name=<?php echo $this->_tpl_vars['pala_item']; ?>
" alt="" title="<?php echo $this->_tpl_vars['pala_bonuses'][$this->_tpl_vars['pala_item']]['2']; ?>
"/>
			<?php endforeach; endif; unset($_from); ?>
		</map>
		<img src="graphic/inventory/inventory.jpg?1" alt="" title="">
	</div>

	<br style="clear: both;">

	<?php if (! $this->_tpl_vars['pala_all_items']): ?>
		<table style="margin: 0pt; padding: 0pt;">
			<tbody>
				<tr>
					<th colspan="3">Postêp do znalezienia nastêpnego przedmiotu:</th>
				</tr>
				<tr>
					<td>0%</td>
					<td style="border: 1px solid rgb(128, 64, 0); margin: 0pt; padding: 0pt; width: 390px;">
						<div style="width: <?php echo $this->_tpl_vars['img_width']; ?>
px; background-color: rgb(128, 64, 0);">&nbsp;</div></td>
					<td>100%</td>
				</tr>
				<tr>
					<td colspan="3" style="text-align: center;"><?php echo $this->_tpl_vars['proc_to_next_item']; ?>
%</td>
				</tr>
			</tbody>
		</table>
	<?php endif; ?>

	<?php else: ?>
	<br>
	<?php if (count ( $this->_tpl_vars['jed_produkcja'] ) > 0): ?>
		<table class="vis">
			<tr>
				<th width="150">Kszta³cenie</th>
				<th width="120">Trwanie</th>
				<th width="150">Gotowe</th>
				<th width="100">Zakoñcz *</th>
			</tr>

			<?php $_from = $this->_tpl_vars['jed_produkcja']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
				<tr <?php if ($this->_tpl_vars['jed_produkcja'][$this->_tpl_vars['key']]['lit']): ?>class="lit"<?php endif; ?>>
					<td><?php echo $this->_tpl_vars['jed_produkcja'][$this->_tpl_vars['key']]['num_unit']; ?>
 <?php echo $this->_tpl_vars['cl_units']->get_name($this->_tpl_vars['jed_produkcja'][$this->_tpl_vars['key']]['unit']); ?>
</td>
						<?php if ($this->_tpl_vars['jed_produkcja'][$this->_tpl_vars['key']]['lit']): ?>
							<?php if ($this->_tpl_vars['jed_produkcja'][$this->_tpl_vars['key']]['countdown'] > 0): ?>
								<td><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['jed_produkcja'][$this->_tpl_vars['key']]['countdown'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td>
							<?php else: ?>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['jed_produkcja'][$this->_tpl_vars['key']]['countdown'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
							<?php endif; ?>
						<?php else: ?>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['jed_produkcja'][$this->_tpl_vars['key']]['trwanie'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
						<?php endif; ?>
					<td><?php echo $this->_tpl_vars['pl']->format_date($this->_tpl_vars['jed_produkcja'][$this->_tpl_vars['key']]['time_finished']); ?>
</td>
					<td><a href="game.php?t=129107&amp;village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=<?php echo $this->_tpl_vars['dbname']; ?>
&amp;action=anuluj&amp;id=<?php echo $this->_tpl_vars['key']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">przerwij</a></td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
		</table>
		
		<div style="font-size: 7pt;">* (W przypadku przerwania, zostanie zwrócone 90% surowców)</div>
		
		<br>
	<?php endif; ?>

	<table class="vis">
		<tbody>
			<tr>
				<th>Jednostka</th>
				<th colspan="4">Koszt</th>
				<th>Czas<br>(gg:mm:ss)</th>
				<th>Wybierz rycerza</th>

			</tr>
			<?php $_from = $this->_tpl_vars['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['unit']):
?>
				<tr>
					<td>
						<a href="javascript:popup('popup_unit.php?unit=<?php echo $this->_tpl_vars['unit']; ?>
', 520, 520)"> <img src="graphic/unit/<?php echo $this->_tpl_vars['unit']; ?>
.png" alt="" /> <?php echo $this->_tpl_vars['name']; ?>
</a>
					</td>
					<td>
						<img src="graphic/wood.png" title="Drewno" alt=""/> 
						<?php echo $this->_tpl_vars['cl_units']->get_woodprice($this->_tpl_vars['unit']); ?>

					</td>
					<td>
						<img src="graphic/stone.png" title="Ceg³y" alt=""/> 
						<?php echo $this->_tpl_vars['cl_units']->get_stoneprice($this->_tpl_vars['unit']); ?>

					</td>
					<td>
						<img src="graphic/iron.png" title="¯elazo" alt=""/> 
						<?php echo $this->_tpl_vars['cl_units']->get_ironprice($this->_tpl_vars['unit']); ?>

					</td>
					<td>
						<img src="graphic/face.png" title="Wieœniak" alt=""/> 
						<?php echo $this->_tpl_vars['cl_units']->get_bhprice($this->_tpl_vars['unit']); ?>

					</td>
	
					<td>
						<?php echo ((is_array($_tmp=$this->_tpl_vars['cl_units']->get_time($this->_tpl_vars['village'][$this->_tpl_vars['screen']],$this->_tpl_vars['unit'],$this->_tpl_vars['village']['bonus']))) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>

					</td>

					<td>
						<?php if ($this->_tpl_vars['village']['r_wood'] >= $this->_tpl_vars['cl_units']->get_woodprice($this->_tpl_vars['unit']) && $this->_tpl_vars['village']['r_stone'] >= $this->_tpl_vars['cl_units']->get_stoneprice($this->_tpl_vars['unit']) && $this->_tpl_vars['village']['r_iron'] >= $this->_tpl_vars['cl_units']->get_ironprice($this->_tpl_vars['unit'])): ?>
							<?php if ($this->_tpl_vars['wolni_osadnicy'] >= $this->_tpl_vars['cl_units']->get_bhprice($this->_tpl_vars['unit'])): ?>
								<?php if ($this->_tpl_vars['user']['paladins'] > 0): ?>
									<span class="inactive">Ka¿dy gracz mo¿e posiadaæ tylko jednego rycerza!</span>	
								<?php else: ?>
									<?php if ($this->_tpl_vars['user']['pala_train'] > 0): ?>
										<span class="inactive">Rycerz w trakcie trenowania.</span>
									<?php else: ?>
										<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=statue&amp;action=train&unit=<?php echo $this->_tpl_vars['unit']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Wybierz rycerza</a>
									<?php endif; ?>
								<?php endif; ?>
							<?php else: ?>
								<span class="inactive">Posiadasz za ma³o miejsca w zagrodzie.</span>	
							<?php endif; ?>
						<?php else: ?>
							<span class="inactive">Posiadasz za ma³o surowców.</span>
						<?php endif; ?>
					</td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
		</tbody>
	</table>
	<br>
	<?php if ($this->_tpl_vars['user']['paladins'] == 1): ?>
		<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=statue&mode=main&action=change_pala_name&h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post"/>
			<table class="vis"/>
				<tr>
					<th colspan="2">Zmieñ nazwê swojego rycerza</th>
				</tr>
				<tr>
					<td>
						Nazwa: <input type="text" value="<?php echo $this->_tpl_vars['pala_name']; ?>
" name="nazwa"/>
					</td>
					<td>
						<input type="submit" value="Zmieñ nazwê" name="tbutton"/>
					</td>
				</tr>
			</table>
		</form>
	<?php endif; ?>
<?php endif; ?>
<?php endif; ?>