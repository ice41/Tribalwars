<?php /* Smarty version 2.6.14, created on 2011-12-25 21:12:09
         compiled from game_smith.tpl */ ?>
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

			<br>
			<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=smith&action=ulepsz_wszystkie_tech">&raquo; Ulepszyæ wszystkie technologie</a>
		</td>
	</tr>
</table>
<br />
<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<font class="error"><?php echo $this->_tpl_vars['error']; ?>
</font>
<?php endif;  if (! empty ( $this->_tpl_vars['errorr'] )): ?>
	<font class="error"><?php echo $this->_tpl_vars['errorr']; ?>
</font>
<?php endif;  if ($this->_tpl_vars['show_build']): ?>
		<?php if ($this->_tpl_vars['is_researches']): ?>
		<table class="vis">
		<tr>
			<td width="220">Techonolgia</td>
			<td width="100">Trwanie</td>
			<td width="120">Ukoñczenie</td>
			<td rowspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=smith&amp;action=cancel&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">przerwij</a></td>
		</tr>
		<tr>
		    <?php $this->assign('research_unitname', $this->_tpl_vars['research']['research']); ?>
			<th><?php echo $this->_tpl_vars['cl_techs']->get_name($this->_tpl_vars['research']['research']); ?>
 (Poziom <?php echo $this->_tpl_vars['techs'][$this->_tpl_vars['research_unitname']]+1; ?>
)</th>
			<?php if (( $this->_tpl_vars['research']['end_time'] < $this->_tpl_vars['time'] )): ?>
			    <th><?php echo ((is_array($_tmp=$this->_tpl_vars['research']['reminder_time'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</th>
				<?php header('location: game.php?screen=smith&village='.$this->_tpl_vars['village']['id']); ?>
			<?php else: ?>
			    <th><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['research']['reminder_time'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></th>
			<?php endif; ?>
			<th><?php echo $this->_tpl_vars['pl']->format_date($this->_tpl_vars['research']['end_time']); ?>
</th>
		</tr>
		</table><br />
	<?php endif; ?>
	
	<table class="vis" width="100%">
				<tr>
			<?php $_from = $this->_tpl_vars['group_techs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group_name'] => $this->_tpl_vars['item']):
?>
				<th width="<?php echo $this->_tpl_vars['table_width']; ?>
%"><?php echo $this->_tpl_vars['group_name']; ?>
</th>
			<?php endforeach; endif; unset($_from); ?>
		</tr>
				<?php unset($this->_sections['counter']);
$this->_sections['counter']['name'] = 'counter';
$this->_sections['counter']['start'] = (int)0;
$this->_sections['counter']['loop'] = is_array($_loop=$this->_tpl_vars['maxNum_groupTech']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['counter']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['counter']['show'] = true;
$this->_sections['counter']['max'] = $this->_sections['counter']['loop'];
if ($this->_sections['counter']['start'] < 0)
    $this->_sections['counter']['start'] = max($this->_sections['counter']['step'] > 0 ? 0 : -1, $this->_sections['counter']['loop'] + $this->_sections['counter']['start']);
else
    $this->_sections['counter']['start'] = min($this->_sections['counter']['start'], $this->_sections['counter']['step'] > 0 ? $this->_sections['counter']['loop'] : $this->_sections['counter']['loop']-1);
if ($this->_sections['counter']['show']) {
    $this->_sections['counter']['total'] = min(ceil(($this->_sections['counter']['step'] > 0 ? $this->_sections['counter']['loop'] - $this->_sections['counter']['start'] : $this->_sections['counter']['start']+1)/abs($this->_sections['counter']['step'])), $this->_sections['counter']['max']);
    if ($this->_sections['counter']['total'] == 0)
        $this->_sections['counter']['show'] = false;
} else
    $this->_sections['counter']['total'] = 0;
if ($this->_sections['counter']['show']):

            for ($this->_sections['counter']['index'] = $this->_sections['counter']['start'], $this->_sections['counter']['iteration'] = 1;
                 $this->_sections['counter']['iteration'] <= $this->_sections['counter']['total'];
                 $this->_sections['counter']['index'] += $this->_sections['counter']['step'], $this->_sections['counter']['iteration']++):
$this->_sections['counter']['rownum'] = $this->_sections['counter']['iteration'];
$this->_sections['counter']['index_prev'] = $this->_sections['counter']['index'] - $this->_sections['counter']['step'];
$this->_sections['counter']['index_next'] = $this->_sections['counter']['index'] + $this->_sections['counter']['step'];
$this->_sections['counter']['first']      = ($this->_sections['counter']['iteration'] == 1);
$this->_sections['counter']['last']       = ($this->_sections['counter']['iteration'] == $this->_sections['counter']['total']);
?>
			<?php $this->assign('num', $this->_sections['counter']['index']); ?>
			<tr>
				<?php $_from = $this->_tpl_vars['group_techs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group_name'] => $this->_tpl_vars['item']):
?>
					<?php if (! empty ( $this->_tpl_vars['group_techs'][$this->_tpl_vars['group_name']][$this->_tpl_vars['num']] )): ?>
						<?php $this->assign('unitname', $this->_tpl_vars['group_techs'][$this->_tpl_vars['group_name']][$this->_tpl_vars['num']]); ?>
						<td>
							<?php echo $this->_tpl_vars['cl_techs']->check_tech($this->_tpl_vars['group_techs'][$this->_tpl_vars['group_name']][$this->_tpl_vars['num']],$this->_tpl_vars['village']); ?>


							<table class="vis">
								<tr><td><a href="javascript:popup('popup_unit.php?unit=unit_<?php echo $this->_tpl_vars['group_techs'][$this->_tpl_vars['group_name']][$this->_tpl_vars['num']]; ?>
&amp;level=0', 520, 520)"><img src="graphic/unit_big/<?php echo $this->_tpl_vars['cl_techs']->get_graphic(); ?>
" alt="" /></a></td>
									<td valign="top"><a href="javascript:popup('popup_unit.php?unit=<?php echo $this->_tpl_vars['group_techs'][$this->_tpl_vars['group_name']][$this->_tpl_vars['num']]; ?>
&amp;level=0', 520, 520)"><?php echo $this->_tpl_vars['cl_techs']->get_name($this->_tpl_vars['group_techs'][$this->_tpl_vars['group_name']][$this->_tpl_vars['num']]); ?>
</a> (Poziom <?php echo $this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]; ?>
)	
										<br />
										<?php if ($this->_tpl_vars['cl_techs']->get_last_error() == 'not_enough_ress'): ?>
											<br /><img src="graphic/holz.png" title="Holz" alt="" /><?php echo $this->_tpl_vars['cl_techs']->get_wood($this->_tpl_vars['unitname'],$this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]+1); ?>
 <img src="graphic/lehm.png" title="Lehm" alt="" /><?php echo $this->_tpl_vars['cl_techs']->get_stone($this->_tpl_vars['unitname'],$this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]+1); ?>
 <img src="graphic/eisen.png" title="Eisen" alt="" /><?php echo $this->_tpl_vars['cl_techs']->get_iron($this->_tpl_vars['unitname'],$this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]+1); ?>

											<br /><span class="inactive">Surowce dostêpne za <span class="timer_replace"><?php echo $this->_tpl_vars['cl_techs']->get_time_wait(); ?>
</span></span><span style="display:none">Surowce dostêpne.</span>
										<?php elseif ($this->_tpl_vars['cl_techs']->get_last_error() == 'not_fulfilled'): ?>
											<span class="inactive">Wymagania budynkowe nie zosta³y spe³nione.</span>
										<?php elseif ($this->_tpl_vars['cl_techs']->get_last_error() == 'max_stage'): ?>
											<span class="inactive">Zbadane.</span>
										<?php elseif ($this->_tpl_vars['cl_techs']->get_last_error() == 'not_enough_storage'): ?>
											<br /><img src="graphic/holz.png" title="Holz" alt="" /><?php echo $this->_tpl_vars['cl_techs']->get_wood($this->_tpl_vars['unitname'],$this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]+1); ?>
 <img src="graphic/lehm.png" title="Lehm" alt="" /><?php echo $this->_tpl_vars['cl_techs']->get_stone($this->_tpl_vars['unitname'],$this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]+1); ?>
 <img src="graphic/eisen.png" title="Eisen" alt="" /><?php echo $this->_tpl_vars['cl_techs']->get_iron($this->_tpl_vars['unitname'],$this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]+1); ?>

											<br /><span class="inactive">Za ma³a pojemnoœæ spichlerza.</span>
										<?php else: ?>
											<br /><img src="graphic/holz.png" title="Holz" alt="" /><?php echo $this->_tpl_vars['cl_techs']->get_wood($this->_tpl_vars['unitname'],$this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]+1); ?>
 <img src="graphic/lehm.png" title="Lehm" alt="" /><?php echo $this->_tpl_vars['cl_techs']->get_stone($this->_tpl_vars['unitname'],$this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]+1); ?>
 <img src="graphic/eisen.png" title="Eisen" alt="" /><?php echo $this->_tpl_vars['cl_techs']->get_iron($this->_tpl_vars['unitname'],$this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]+1); ?>

											<?php if ($this->_tpl_vars['is_researches']): ?>
											    <br /><span class="inactive">Badanie w toku.</span> (<?php echo ((is_array($_tmp=$this->_tpl_vars['cl_techs']->get_time($this->_tpl_vars['village']['smith'],$this->_tpl_vars['unitname'],$this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]+1))) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
)
											<?php else: ?>
												<?php if ($this->_tpl_vars['techs'][$this->_tpl_vars['unitname']] < 1): ?>
													<br /><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=smith&amp;action=research&amp;id=<?php echo $this->_tpl_vars['unitname']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">&raquo; Zbadaæ</a> (<?php echo ((is_array($_tmp=$this->_tpl_vars['cl_techs']->get_time($this->_tpl_vars['village']['smith'],$this->_tpl_vars['unitname'],$this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]+1))) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
)
												<?php else: ?>
													<br /><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=smith&amp;action=research&amp;id=<?php echo $this->_tpl_vars['unitname']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">&raquo; Ulepszyæ na poziom <?php echo $this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]+1; ?>
</a> (<?php echo ((is_array($_tmp=$this->_tpl_vars['cl_techs']->get_time($this->_tpl_vars['village']['smith'],$this->_tpl_vars['unitname'],$this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]+1))) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
)
												<?php endif; ?>
											<?php endif; ?>
										<?php endif; ?>
									</td>
								</tr>
							</table>
						</td>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			</tr>
		<?php endfor; endif; ?>
	</table>
<?php endif; ?>