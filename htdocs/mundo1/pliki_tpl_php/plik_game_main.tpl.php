<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2023-02-26 22:52:08
         Wersja PHP pliku pliki_tpl/game_main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_time', 'game_main.tpl', 68, false),array('modifier', 'format_number', 'game_main.tpl', 180, false),)), $this); ?>
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
<?php if ($this->_tpl_vars['display_modes']): ?>
	<table class="vis modemenu">
		<tbody>
			<tr>
				<?php $_from = $this->_tpl_vars['modes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['modename'] => $this->_tpl_vars['modephp']):
?>
					<?php if ($this->_tpl_vars['modephp'] == $this->_tpl_vars['mode']): ?>
						<td class="selected" width="100"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=main&amp;mode=<?php echo $this->_tpl_vars['modephp']; ?>
"><?php echo $this->_tpl_vars['modename']; ?>
 </a></td>
					<?php else: ?>
						<td width="100"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=main&amp;mode=<?php echo $this->_tpl_vars['modephp']; ?>
"><?php echo $this->_tpl_vars['modename']; ?>
 </a></td>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			</tr>
		</tbody>
	</table>
<?php endif; ?>

<?php if ($this->_tpl_vars['mode'] == 'build'): ?>

		<?php if ($this->_tpl_vars['num_do_build'] > 0): ?>
		<table class="vis">
<tbody class="ui-sortable" id="buildqueue">
	<tr>
		<th style="width: 23%">Comando de construção</th>
		<th>Czas</th>
		<th>Gotowe</th>
		<th style="width: 15%">Cancelar</th>
		<th style="background:none !important;"></th>	</tr>
			<?php $_from = $this->_tpl_vars['do_build']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['item']):
?>
		<tr class="lit nodrag buildorder_wood">
		<td class="lit-item">
			
			<img src="http://beta.tribalwars.net/graphic/buildings/mid/<?php echo $this->_tpl_vars['dbname']; ?>
1.png" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['buildname']); ?>
" style="float: left; margin-right: 8px" alt="">
			<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['buildname']); ?>
 <br> poziom <?php echo $this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['stage']; ?>
		</td>
		<td class="nowrap lit-item">
			<span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['dauer'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span>
		</td>
										<script type="text/javascript">
							setTimeout(function() {
								$('.order_feature_reduce:first').hide();
								$('.order_feature_instant').show();
							}, <?php echo $this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['finished']; ?>
);
						</script>
		<td class="lit-item"><?php echo $this->_tpl_vars['pl']->format_date($this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['finished']); ?>
</td>
		<td class="lit-item">
			<a class="btn btn-cancel" href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=main&amp;action=cancel&amp;id=<?php echo $this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['r_id']; ?>
&amp;mode=build&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Cancelar</a>
		</td>
			</tr>

	
			<?php endforeach; endif; unset($_from); ?>


			</tbody>


						<?php if ($this->_tpl_vars['num_do_build'] > 2): ?>
				<tr>
					<td colspan="4">
						Custos de construção adicionais devido à longa lista de construção: <b><?php echo $this->_tpl_vars['cl_builds']->get_buildsharpens_costs($this->_tpl_vars['num_do_build']); ?>
%</b><br />
						<small>Custos adicionais de construção não serão reembolsados ​​em caso de cancelamento</small>
					</td>
				</tr>
			<?php endif; ?>
		</table>
		<br />
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['num_do_destory'] > 0): ?>
		<table class="vis">
<tbody class="ui-sortable" id="buildqueue">


			</tbody>
		<tr>
				<th width="250">Comando de demolição</th>
				<th width="100">Duração</th>
				<th width="150">Preparar</th>
				<th>Przerwij</th>
			</tr>
			<?php $_from = $this->_tpl_vars['do_destory']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['item']):
?>
				<?php $this->assign('buildname', $this->_tpl_vars['do_destory'][$this->_tpl_vars['id']]['build']); ?>
				<?php if ($this->_tpl_vars['id'] == 0): ?>
					<tr class="lit">
				<?php else: ?>
					<tr>
				<?php endif; ?>
					<td><?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['buildname']); ?>
 (zburz poziom)</td>
					<?php if ($this->_tpl_vars['id'] == 0): ?>
						<?php if ($this->_tpl_vars['do_destory'][$this->_tpl_vars['id']]['finished'] < $this->_tpl_vars['time']): ?>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['do_destory'][$this->_tpl_vars['id']]['dauer'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
						<?php else: ?>
							<td><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['do_destory'][$this->_tpl_vars['id']]['dauer'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td>
						<?php endif; ?>
					<?php else: ?>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['do_destory'][$this->_tpl_vars['id']]['dauer'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
					<?php endif; ?>
					<td>
						<?php echo $this->_tpl_vars['pl']->format_date($this->_tpl_vars['do_destory'][$this->_tpl_vars['id']]['finished']); ?>

					</td>
					<td>
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=main&mode=build&amp;action=cancel_dest&amp;id=<?php echo $this->_tpl_vars['do_destory'][$this->_tpl_vars['id']]['r_id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" class="btn btn-cancel">Cancelar</a>
					</td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
		</table>
		<br />
	<?php endif; ?>

	<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
		<font class="error"><?php echo $this->_tpl_vars['error']; ?>
</font>
	<?php endif; ?>

	<?php echo '<script type="text/javascript">
//<![CDATA[
	$(document).ready(function() {
		'; ?>
BuildingMain.upgrade_building_link = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&akcja=build&screen=main&h=<?php echo $this->_tpl_vars['hkey']; ?>
';
		BuildingMain.downgrade_building_link = 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&akcja=d_build&screen=main&h=<?php echo $this->_tpl_vars['hkey']; ?>
';
		BuildingMain.confirm_queue = false;
		BuildingMain.mode = 0;
		$( '.inactive img' ).fadeTo( 0, .5 );<?php echo '
	});
//]]>
</script>'; ?>


<form name="budowanie" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=main&action=build&h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="POST">
<div id="building_wrapper">
<input name="id" value="-1" type="hidden"/>
	
	<table id="buildings" class="vis nowrap" style="width: 100%; line-height: 17px">
		<tbody><tr>
			<th style="width: 23%">Edifícios</th>
			<th colspan="5">Requisitos</th>
			<th style="width: 30%">Construir</th>
		</tr>
				<?php $_from = $this->_tpl_vars['fulfilled_builds']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dbname']):
?>
	<tr id="main_buildrow_<?php echo $this->_tpl_vars['dbname']; ?>
">
			<td style="text-align: left">
				<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img src="http://beta.tribalwars.net/graphic/buildings/mid/<?php echo $this->_tpl_vars['dbname']; ?>
1.png" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" style="float: left; margin-right: 8px" alt=""></a>
				<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
</a><br>
				<?php if ($this->_tpl_vars['village'][$this->_tpl_vars['dbname']] > 0): ?>Nível <?php echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; ?>
<?php else: ?>Não construído<?php endif; ?>			</td>
<?php if ($this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['dbname']) <= $this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]): ?>
						<td colspan="7" align="center" class="inactive">
							O edifício está totalmente desenvolvido
						</td>
					<?php else: ?>
				<td><span class="icon header wood"> </span><?php if ($this->_tpl_vars['cl_builds']->get_wood($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1) > $this->_tpl_vars['village']['r_wood']): ?><font color="red"><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_builds']->get_wood($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1))) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</font><?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_builds']->get_wood($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1))) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
<?php endif; ?></td>
				<td><span class="icon header stone"> </span><?php if ($this->_tpl_vars['cl_builds']->get_stone($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1) > $this->_tpl_vars['village']['r_stone']): ?><font color="red"><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_builds']->get_stone($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1))) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</font><?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_builds']->get_stone($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1))) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
<?php endif; ?></td>
				<td><span class="icon header iron"> </span><?php if ($this->_tpl_vars['cl_builds']->get_iron($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1) > $this->_tpl_vars['village']['r_iron']): ?><font color="red"><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_builds']->get_iron($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1))) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</font><?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_builds']->get_iron($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1))) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
<?php endif; ?></td>
				<td><span class="icon header time"></span><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_builds']->get_time($this->_tpl_vars['village']['main'],$this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1))) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
				<td><span class="icon header population"> </span><?php if ($this->_tpl_vars['cl_builds']->get_bh($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1) > 0): ?><?php if ($this->_tpl_vars['cl_builds']->get_bh($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1) > ( $this->_tpl_vars['max_bh'] - $this->_tpl_vars['village']['r_bh'] )): ?><font color="red"><?php echo $this->_tpl_vars['cl_builds']->get_bh($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1); ?>
</font><?php else: ?><?php echo $this->_tpl_vars['cl_builds']->get_bh($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1); ?>
<?php endif; ?><?php endif; ?></td>
				
				
									
										<?php if ($this->_tpl_vars['can_build'][$this->_tpl_vars['dbname']] == 'not_enough_ress'): ?>
							<td class="inactive"><span>Recursos disponíveis às <span class="timer_replace"><?php echo $this->_tpl_vars['res_timer'][$this->_tpl_vars['dbname']]; ?>
</span></span><span style="display:none">Pode construir agora</span>
						<?php elseif ($this->_tpl_vars['can_build'][$this->_tpl_vars['dbname']] == 'not_enough_ress_plus'): ?>
							<td class="inactive">Sem recursos disponíveis!
						<?php elseif ($this->_tpl_vars['can_build'][$this->_tpl_vars['dbname']] == 'not_fulfilled'): ?>
							<td class="inactive">Não atende aos requisitos deste edifício!
						<?php elseif ($this->_tpl_vars['can_build'][$this->_tpl_vars['dbname']] == 'not_enough_bh'): ?>
							<td class="inactive">Não há espaço suficiente na fazenda!
						<?php elseif ($this->_tpl_vars['can_build'][$this->_tpl_vars['dbname']] == 'not_enough_storage'): ?>
							<td class="inactive">Não há espaço suficiente no armazém!
						<?php else: ?>
							<?php if ($this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']] < 1): ?>
							<td>	<a class="btn btn-build" id="main_buildlink_main" href="#" onclick="insertUnit(document.forms['budowanie'].id,'<?php echo $this->_tpl_vars['dbname']; ?>
');document.forms['budowanie'].submit();">Construir</a>
								
							<?php else: ?>

							<td><a class="btn btn-build" id="main_buildlink_main" href="#budowanie" onclick="insertUnit(document.forms['budowanie'].id,'<?php echo $this->_tpl_vars['dbname']; ?>
');document.forms['budowanie'].submit();">Nível <?php echo $this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1; ?>
</a>
							<?php endif; ?>
						<?php endif; ?>	
														
										
													</td><?php endif; ?>
					</tr>



			<?php endforeach; endif; unset($_from); ?>


			
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
<div class="progress-bar"><span class="label"><?php echo $this->_tpl_vars['village_build_process']; ?>
%</span><div style="width:<?php echo $this->_tpl_vars['village_build_process']; ?>
%"><span style="width: 753px;" class="label"><?php echo $this->_tpl_vars['village_build_process']; ?>
%</div></div>	
</td>
			</tr>
		</tbody>
	</table>
	
	<br>
	</form>
	<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=main&amp;action=change_name&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
		<table class="vis" width="300">
			<tr>
				<th colspan="3">Renomear a aldeia</th>
			</tr>
			<tr>
				<td><input type="text" name="name" value="<?php echo $this->_tpl_vars['village']['name']; ?>
"></td>
				<td><input type="submit" value="Mudar" class="btn">
			</tr>
		</table>
	</form>
	
<?php endif; ?>

<?php if ($this->_tpl_vars['mode'] == 'destroy'): ?>
		<?php if ($this->_tpl_vars['num_do_build'] > 0): ?>
		<table class="vis">
			<tr>
				<th width="250">Comando de construção</th>
				<th width="100">Duração</th>
				<th width="150">Preparar</th>
				<th>Cancelar</th>
			</tr>
			<?php $_from = $this->_tpl_vars['do_build']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['item']):
?>
				<?php $this->assign('buildname', $this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['build']); ?>
				<?php if ($this->_tpl_vars['id'] == 0): ?>
					<tr class="lit">
				<?php else: ?>
					<tr>
				<?php endif; ?>
					<td><?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['buildname']); ?>
 (nível <?php echo $this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['stage']; ?>
)</td>
					<?php if ($this->_tpl_vars['id'] == 0): ?>
						<?php if ($this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['finished'] < $this->_tpl_vars['time']): ?>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['dauer'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
						<?php else: ?>
							<td><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['dauer'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td>
						<?php endif; ?>
					<?php else: ?>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['dauer'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
					<?php endif; ?>
					<td>
						<?php echo $this->_tpl_vars['pl']->format_date($this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['finished']); ?>

					</td>
					<td>
						<a href="javascript:ask('Tem certeza de que deseja parar de construir?', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=main&mode=destroy&amp;action=cancel&amp;id=<?php echo $this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['r_id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
')">Cancelar</a>
					</td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
		</table>
		<br />
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['num_do_destory'] > 0): ?>
		<table class="vis">
			<tr>
				<th width="250">Comando de demolição</th>
				<th width="100">Duração</th>
				<th width="150">Preparar</th>
				<th>Cancelar</th>
			</tr>
			<?php $_from = $this->_tpl_vars['do_destory']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['item']):
?>
				<?php $this->assign('buildname', $this->_tpl_vars['do_destory'][$this->_tpl_vars['id']]['build']); ?>
				<?php if ($this->_tpl_vars['id'] == 0): ?>
					<tr class="lit">
				<?php else: ?>
					<tr>
				<?php endif; ?>
					<td><?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['buildname']); ?>
 (destruir o nível)</td>
					<?php if ($this->_tpl_vars['id'] == 0): ?>
						<?php if ($this->_tpl_vars['do_destory'][$this->_tpl_vars['id']]['finished'] < $this->_tpl_vars['time']): ?>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['do_destory'][$this->_tpl_vars['id']]['dauer'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
						<?php else: ?>
							<td><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['do_destory'][$this->_tpl_vars['id']]['dauer'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td>
						<?php endif; ?>
					<?php else: ?>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['do_destory'][$this->_tpl_vars['id']]['dauer'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
					<?php endif; ?>
					<td>
						<?php echo $this->_tpl_vars['pl']->format_date($this->_tpl_vars['do_destory'][$this->_tpl_vars['id']]['finished']); ?>

					</td>
					<td>
						<a href="javascript:ask('Tem certeza de que deseja parar de demolir?', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=main&mode=destroy&amp;action=cancel_dest&amp;id=<?php echo $this->_tpl_vars['do_destory'][$this->_tpl_vars['id']]['r_id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
')">Cancelar</a>
					</td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
		</table>
		<br />
	<?php endif; ?>

	<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
		<font class="error"><?php echo $this->_tpl_vars['error']; ?>
</font>
	<?php endif; ?>
	
	<form name="burzenie" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=main&mode=destroy&action=destroy&h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="POST">
		<input name="id" value="-1" type="hidden"/>

		<table class="vis" width="100%">
			<tr>
				<th>Edifícios</th>
				<th>Tempo de demolição<br /> (hh:mm:ss)</th>
				<th>População</th>
				<th>Demolir</th>
			</tr>

			<?php $_from = $this->_tpl_vars['fulfilled_builds']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dbname']):
?>
				<tr>
					<td>
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
">
							<img src="/ds_graphic/buildings/<?php echo $this->_tpl_vars['dbname']; ?>
.png"> 
							<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>

						</a> 
						(Nível <?php echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; ?>
)
					</td>
					
					<?php if ($this->_tpl_vars['village_builds_do_destory'][$this->_tpl_vars['dbname']] <= 0): ?>
						
						<td colspan="3" class="inactive">O edificio não pode ser demolido</td>
						
					<?php else: ?>
						<?php if (in_array ( $this->_tpl_vars['dbname'] , $this->_tpl_vars['arr_builds_starts_by_one'] ) && $this->_tpl_vars['village_builds_do_destory'][$this->_tpl_vars['dbname']] <= 1): ?>
							<td colspan="3" class="inactive">O edificio não pode ser demolido</td>
						<?php else: ?>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_builds']->get_time($this->_tpl_vars['village']['main'],$this->_tpl_vars['dbname'],$this->_tpl_vars['village_builds_do_destory'][$this->_tpl_vars['dbname']]))) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
					
							<td>
								<img src="/ds_graphic/face.png" title="Aldeão" alt="" />
								<?php echo $this->_tpl_vars['cl_builds']->get_bh($this->_tpl_vars['dbname'],$this->_tpl_vars['village_builds_do_destory'][$this->_tpl_vars['dbname']]); ?>

							</td>
							
							<?php if ($this->_tpl_vars['counts_do_build'][$this->_tpl_vars['dbname']] > 0): ?>
							<td class="inactive">O edificio já está sendo aumentado</span>
							<?php else: ?>
								<td><span class="link" onclick="insertUnit(document.forms['burzenie'].id,'<?php echo $this->_tpl_vars['dbname']; ?>
');document.forms['burzenie'].submit();">Destruir um nível</span></td>
							<?php endif; ?>
						<?php endif; ?>
					<?php endif; ?>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
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
					<div style="width: <?php echo $this->_tpl_vars['village_build_process']; ?>
%; background-color: rgb(128, 64, 0);">&nbsp;</div>
				</td>
				<td><?php echo $this->_tpl_vars['village_build_process']; ?>
%</td>
			</tr>
		</tbody>
	</table>
	
	<br>
	
	<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=main&mode=destroy&amp;action=change_name&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
		<table class="vis" width="300">
			<tr>
				<th colspan="3">Renomear a aldeia</th>
			</tr>
			<tr>
				<td><input type="text" name="name" value="<?php echo $this->_tpl_vars['village']['name']; ?>
"></td>
				<td><input type="submit" value="Mudar">
			</tr>
		</table>
	</form>
<?php endif; ?>