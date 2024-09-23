<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2022-11-30 20:30:46
         Wersja PHP pliku pliki_tpl/game_church.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_time', 'game_church.tpl', 45, false),array('modifier', 'format_number', 'game_church.tpl', 101, false),)), $this); ?>
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
3.png" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" alt="" />
					<?php else: ?>
						<img src="/ds_graphic/big_buildings/<?php echo $this->_tpl_vars['dbname']; ?>
3.png" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" alt="" />
					<?php endif; ?>
				<?php endif; ?>
			<?php else: ?>
				<img src="/ds_graphic/big_buildings/<?php echo $this->_tpl_vars['dbname']; ?>
3.png" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" alt="" />
			<?php endif; ?>
		</td>
		<td>
			<h2><?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
 (<?php if ($this->_tpl_vars['village'][$this->_tpl_vars['dbname']] > 0): ?>Nível <?php echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; ?>
<?php else: ?>não construído<?php endif; ?>)</h2>
			<?php echo $this->_tpl_vars['cl_builds']->get_description_bydbname($this->_tpl_vars['dbname']); ?>

		</td>
	</tr>
</table>
<br />

<script src="/js/recruit.js" type="text/javascript"></script>

<?php if ($this->_tpl_vars['show_build']): ?>
	<?php if (count ( $this->_tpl_vars['recruit_units'] ) > 0): ?>
		<div class="current_prod_wrapper">
			<div id="replace_barracks">
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
		
				<div class="trainqueue_wrap" id="trainqueue_wrap_barracks">
					<table class="vis">
						<tr>
							<th width="190">Treinar</th>
							<th width="120">Duração</th>
							<th width="150">Preparar</th>
							<th width="100">Cancelar *</th>
						</tr>

						<?php $_from = $this->_tpl_vars['recruit_units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
							<tr <?php if ($this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['lit']): ?>class="lit"<?php endif; ?>>
								<td><?php echo $this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['num_unit']; ?>
 <?php echo $this->_tpl_vars['cl_units']->get_name($this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['unit']); ?>
</td>
								<?php if ($this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['lit'] && $this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['countdown'] > -1): ?>
									<td><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['countdown'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td>
									<?php else: ?>
									<td><?php echo ((is_array($_tmp=$this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['countdown'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
								<?php endif; ?>
								<td><?php echo $this->_tpl_vars['pl']->format_date($this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['time_finished']); ?>
</td>
								<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=<?php echo $this->_tpl_vars['dbname']; ?>
&amp;action=cancel&amp;id=<?php echo $this->_tpl_vars['key']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Cancelar</a></td>
							</tr>
						<?php endforeach; endif; unset($_from); ?>
					</table>
				</div>
				<div style="font-size: 7pt;">* (90% das matérias-primas serão devolvidas)</div>
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
				<th width="180">Unidade</th>
				<th colspan="4" width="120">Custo</th>
				<th width="130">Hora (hh:mm:ss)</th>
				<th>Na aldeia</th>
				<th>Recrutamento</th>
			</tr>

			<?php $_from = $this->_tpl_vars['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['unit_dbname'] => $this->_tpl_vars['name']):
?>
				<tr>
					<td><a href="javascript:popup_scroll('popup_unit.php?unit=<?php echo $this->_tpl_vars['unit_dbname']; ?>
', 520, 520)"> <img src="/ds_graphic/unit/<?php echo $this->_tpl_vars['unit_dbname']; ?>
.png" alt="" /> <?php echo $this->_tpl_vars['name']; ?>
</a></td>
					<td><img src="/ds_graphic/holz.png" title="Madeira" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_woodprice($this->_tpl_vars['unit_dbname']); ?>
</td>
					<td><img src="/ds_graphic/lehm.png" title="Argila" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_stoneprice($this->_tpl_vars['unit_dbname']); ?>
</td>
					<td><img src="/ds_graphic/eisen.png" title="Ferro" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_ironprice($this->_tpl_vars['unit_dbname']); ?>
</td>
					<td><img src="/ds_graphic/face.png" title="Aldeão" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_bhprice($this->_tpl_vars['unit_dbname']); ?>
</td>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_units']->get_time_round($this->_tpl_vars['village'][$this->_tpl_vars['dbname']],$this->_tpl_vars['unit_dbname'],$this->_tpl_vars['village']['bonus']))) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['units_in_village'][$this->_tpl_vars['unit_dbname']])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['units_all'][$this->_tpl_vars['unit_dbname']])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>

					<?php echo $this->_tpl_vars['cl_units']->check_needed($this->_tpl_vars['unit_dbname'],$this->_tpl_vars['village']); ?>

					<?php if ($this->_tpl_vars['cl_units']->last_error == not_tec): ?>
					    <td class="inactive">A unidade ainda não foi pesquisada</td>
					<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_needed): ?>
					    <td class="inactive">Os requisitos de construção não são especializados</td>
					<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_enough_ress): ?>
					    <td class="inactive">Sem recursos suficientes</td>
					<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_enough_bh): ?>
					    <td class="inactive">Não há espaço suficiente na Fazenda para alimentar unidades adicionais.</td>
					<?php else: ?>
						<td class="nowrap">
							<input style="color: black;" name="<?php echo $this->_tpl_vars['unit_dbname']; ?>
" class="recruit_unit" id="<?php echo $this->_tpl_vars['unit_dbname']; ?>
_0" size="5" maxlength="5" tabindex="1" type="text">
							<a id="<?php echo $this->_tpl_vars['unit_dbname']; ?>
_0_a" href="javascript:unit_build_block.set_max('<?php echo $this->_tpl_vars['unit_dbname']; ?>
')">(<?php echo $this->_tpl_vars['cl_units']->last_error; ?>
)</a>
						</td>
					<?php endif; ?>
				</tr>
			<?php endforeach; endif; unset($_from); ?>

		    <tr><td colspan="8" align="right"><input class="btn btn-recruit" name="submit" type="submit" value="Recrutar" style="font-size: 10pt;" /></td></tr>
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
		<?php $_from = $this->_tpl_vars['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['unit_dbname'] => $this->_tpl_vars['name']):
?>
			<?php 
				$this->_tpl_vars['i']++;
			 ?>
			<?php echo $this->_tpl_vars['unit_dbname']; ?>
: {wood:<?php echo $this->_tpl_vars['cl_units']->get_woodprice($this->_tpl_vars['unit_dbname']); ?>
, stone: <?php echo $this->_tpl_vars['cl_units']->get_stoneprice($this->_tpl_vars['unit_dbname']); ?>
, iron: <?php echo $this->_tpl_vars['cl_units']->get_ironprice($this->_tpl_vars['unit_dbname']); ?>
, pop: <?php echo $this->_tpl_vars['cl_units']->get_bhprice($this->_tpl_vars['unit_dbname']); ?>
}<?php if ($this->_tpl_vars['i'] != count ( $this->_tpl_vars['units'] )): ?>,<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
		};

		var unit_build_block = new UnitBuildManager(0, {
			res: {wood:<?php echo $this->_tpl_vars['village']['r_wood']; ?>
,stone: <?php echo $this->_tpl_vars['village']['r_stone']; ?>
,iron: <?php echo $this->_tpl_vars['village']['r_iron']; ?>
,pop: <?php echo $this->_tpl_vars['max_bh']-$this->_tpl_vars['village']['r_bh']; ?>
}
			});
		unit_build_block._onchange();
	</script>
<?php endif; ?>