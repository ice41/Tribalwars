<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2023-02-27 01:52:03
         Wersja PHP pliku pliki_tpl/game_smith.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_time', 'game_smith.tpl', 55, false),)), $this); ?>
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

			<br>
			<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=smith&action=ulepsz_wszystkie_tech">&raquo; Pesquisar todas as tecnologias</a>
		</td>
	</tr>
</table>
<br />

<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<font class="error"><?php echo $this->_tpl_vars['error']; ?>
</font>
<?php endif; ?>

<?php if ($this->_tpl_vars['show_build']): ?>
		<?php if (is_array ( $this->_tpl_vars['vill_research'] )): ?>
		<table class="vis">
			<tr>
				<th width="220">Tecnologia</th>
				<th width="100">Duração</th>
				<th width="120">Conclusão</th>
				<th>Finalizar</th>
			</tr>
			<?php $_from = $this->_tpl_vars['vill_research']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
				<tr <?php if ($this->_tpl_vars['arr']['lit']): ?>class="lit"<?php endif; ?>>
					<td><?php echo $this->_tpl_vars['cl_techs']->get_name($this->_tpl_vars['arr']['research']); ?>
 (Nível <?php echo $this->_tpl_vars['arr']['stage']; ?>
)</td>
					<?php if ($this->_tpl_vars['arr']['lit'] && $this->_tpl_vars['arr']['countdown'] > -1): ?>
						<td>
							<span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['arr']['countdown'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span>
						</td>
					<?php else: ?>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['arr']['countdown'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
					<?php endif; ?>
					<td>
						<?php echo $this->_tpl_vars['pl']->format_date($this->_tpl_vars['arr']['end_time']); ?>

					</td>
					<td>
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=smith&amp;action=cancel&amp;id=<?php echo $this->_tpl_vars['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">parar</a>
					</td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
		</table>
		<br />
	<?php endif; ?>
	
	<table class="vis" width="100%">
		<tr>
			<?php $_from = $this->_tpl_vars['group_techs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group_name']):
?>
				<th width="<?php echo $this->_tpl_vars['table_width']; ?>
%"><?php echo $this->_tpl_vars['group_name']; ?>
</th>
			<?php endforeach; endif; unset($_from); ?>
		</tr>
		<tr>
			<?php $_from = $this->_tpl_vars['group_techs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group_name']):
?>
				<?php if (is_array ( $this->_tpl_vars['techs_columns'][$this->_tpl_vars['group_name']] )): ?>
					<td valign="top">
						<?php $_from = $this->_tpl_vars['techs_columns'][$this->_tpl_vars['group_name']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['TechName']):
?>
							<?php echo $this->_tpl_vars['cl_techs']->check_tech($this->_tpl_vars['TechName'],$this->_tpl_vars['village']); ?>

							<table class="vis">
								<tr>
									<td>
										<a href="javascript:popup('popup_unit.php?unit=unit_<?php echo $this->_tpl_vars['TechName']; ?>
&amp;level=0', 520, 520)">
											<img src="/ds_graphic/unit_big/<?php echo $this->_tpl_vars['cl_techs']->get_graphic(); ?>
" alt="" />
										</a>
									</td>
									<td valign="top">
										<a href="javascript:popup('popup_unit.php?unit=unit_<?php echo $this->_tpl_vars['TechName']; ?>
&amp;level=0', 520, 520)">
											<?php echo $this->_tpl_vars['cl_techs']->get_name($this->_tpl_vars['TechName']); ?>

										</a> 
										<?php if ($this->_tpl_vars['techs'][$this->_tpl_vars['TechName']] > 0): ?>
											(Nível <?php echo $this->_tpl_vars['techs'][$this->_tpl_vars['TechName']]; ?>
)	
										<?php else: ?>
											(Não Pesquisado)
										<?php endif; ?>
										<br />
										<?php if ($this->_tpl_vars['cl_techs']->get_last_error() == 'not_enough_ress'): ?>
											<br />
											<img src="/ds_graphic/holz.png" title="Madeiara" alt="" /> <?php echo $this->_tpl_vars['cl_techs']->get_wood($this->_tpl_vars['TechName'],$this->_tpl_vars['techs_res'][$this->_tpl_vars['TechName']]+1); ?>

											<img src="/ds_graphic/lehm.png" title="Argila" alt="" /><?php echo $this->_tpl_vars['cl_techs']->get_stone($this->_tpl_vars['TechName'],$this->_tpl_vars['techs_res'][$this->_tpl_vars['TechName']]+1); ?>
 
											<img src="/ds_graphic/eisen.png" title="Ferro" alt="" /><?php echo $this->_tpl_vars['cl_techs']->get_iron($this->_tpl_vars['TechName'],$this->_tpl_vars['techs_res'][$this->_tpl_vars['TechName']]+1); ?>

											<br />
											<span class="inactive">Recursos disponíveis às 
												<span class="timer_replace"><?php echo $this->_tpl_vars['cl_techs']->get_time_wait(); ?>
</span>
											</span>
											<span style="display:none">Recurosos disponíveis.</span>
										<?php elseif ($this->_tpl_vars['cl_techs']->get_last_error() == 'not_fulfilled'): ?>
											<span class="inactive">Requisitos de construção não atendidos.</span>
										<?php elseif ($this->_tpl_vars['cl_techs']->get_last_error() == 'max_stage'): ?>
											<span class="inactive">Pesquisado.</span>
										<?php elseif ($this->_tpl_vars['cl_techs']->get_last_error() == 'not_enough_storage'): ?>
											<br />
											<img src="/ds_graphic/holz.png" title="Madeiara" alt="" /> <?php echo $this->_tpl_vars['cl_techs']->get_wood($this->_tpl_vars['TechName'],$this->_tpl_vars['techs_res'][$this->_tpl_vars['TechName']]+1); ?>
 
											<img src="/ds_graphic/lehm.png" title="Argila" alt="" /><?php echo $this->_tpl_vars['cl_techs']->get_stone($this->_tpl_vars['TechName'],$this->_tpl_vars['techs_res'][$this->_tpl_vars['TechName']]+1); ?>
 
											<img src="/ds_graphic/eisen.png" title="Ferro" alt="" /><?php echo $this->_tpl_vars['cl_techs']->get_iron($this->_tpl_vars['TechName'],$this->_tpl_vars['techs_res'][$this->_tpl_vars['TechName']]+1); ?>

											<br /><span class="inactive">Pequena capacidade da fazenda.</span>
										<?php else: ?>
											<br />
											<img src="/ds_graphic/holz.png" title="Madeiara" alt="" /> <?php echo $this->_tpl_vars['cl_techs']->get_wood($this->_tpl_vars['TechName'],$this->_tpl_vars['techs_res'][$this->_tpl_vars['TechName']]+1); ?>

											<img src="/ds_graphic/lehm.png" title="Argila" alt="" /><?php echo $this->_tpl_vars['cl_techs']->get_stone($this->_tpl_vars['TechName'],$this->_tpl_vars['techs_res'][$this->_tpl_vars['TechName']]+1); ?>
 
											<img src="/ds_graphic/eisen.png" title="Ferro" alt="" /><?php echo $this->_tpl_vars['cl_techs']->get_iron($this->_tpl_vars['TechName'],$this->_tpl_vars['techs_res'][$this->_tpl_vars['TechName']]+1); ?>

											<?php if ($this->_tpl_vars['techs_res'][$this->_tpl_vars['TechName']] < 1): ?>
												<br />
												<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=smith&amp;action=research&amp;id=<?php echo $this->_tpl_vars['TechName']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">
													&raquo; Pesquisar
												</a> 
												(<?php echo ((is_array($_tmp=$this->_tpl_vars['cl_techs']->get_time($this->_tpl_vars['village']['smith'],$this->_tpl_vars['TechName'],$this->_tpl_vars['techs_res'][$this->_tpl_vars['TechName']]+1))) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
)
											<?php else: ?>
												<br />
												<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=smith&amp;action=research&amp;id=<?php echo $this->_tpl_vars['TechName']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">
													&raquo; Atualização por nível <?php echo $this->_tpl_vars['techs_res'][$this->_tpl_vars['TechName']]+1; ?>

												</a> 
												(<?php echo ((is_array($_tmp=$this->_tpl_vars['cl_techs']->get_time($this->_tpl_vars['village']['smith'],$this->_tpl_vars['TechName'],$this->_tpl_vars['techs_res'][$this->_tpl_vars['TechName']]+1))) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
)
											<?php endif; ?>
										<?php endif; ?>
									</td>
								</tr>
							</table>
						<?php endforeach; endif; unset($_from); ?>
					</td>
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
		</tr>
	</table>
<?php endif; ?>