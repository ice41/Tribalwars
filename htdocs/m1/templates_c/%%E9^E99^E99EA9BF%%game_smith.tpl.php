<?php /* Smarty version 2.6.14, created on 2016-12-22 21:33:51
         compiled from game_smith.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nivel', 'game_smith.tpl', 5, false),array('modifier', 'format_time', 'game_smith.tpl', 26, false),array('modifier', 'format_date', 'game_smith.tpl', 30, false),array('modifier', 'replace', 'game_smith.tpl', 30, false),array('modifier', 'tech', 'game_smith.tpl', 51, false),)), $this); ?>
<table>
	<tr>
		<td><img src="../graphic/build/smith.jpg" title="Ferreiro" alt="" /></td>
		<td>
			<h2>Ferreiro (<?php echo ((is_array($_tmp=$this->_tpl_vars['village']['smith'])) ? $this->_run_mod_handler('nivel', true, $_tmp) : nivel($_tmp)); ?>
)</h2>
			<?php echo $this->_tpl_vars['description']; ?>

		</td>
	</tr>
</table>
<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
<div class="error"><?php echo $this->_tpl_vars['error']; ?>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['show_build']): ?>
<?php if ($this->_tpl_vars['is_researches']): ?>
<table class="vis" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th width="220">Perquisa</th>
		<th width="100">Dura&ccedil;&atilde;o</th>
		<th width="120">T&eacute;rmino</th>
		<th rowspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=smith&amp;action=cancel&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">cancelar</a></th>
	</tr>
	<tr class="lit">
    	<?php $this->assign('research_unitname', $this->_tpl_vars['research']['research']); ?>
		<td class="selected"><?php echo $this->_tpl_vars['cl_techs']->get_name($this->_tpl_vars['research']['research']); ?>
 (<?php echo ((is_array($_tmp=$this->_tpl_vars['techs'][$this->_tpl_vars['research_unitname']]+1)) ? $this->_run_mod_handler('nivel', true, $_tmp) : nivel($_tmp)); ?>
)</td>
		<?php if (( $this->_tpl_vars['research']['end_time'] < $this->_tpl_vars['time'] )): ?>
    	<td class="selected"><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['research']['reminder_time']+1)) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td>
		<?php else: ?>
	    <td class="selected"><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['research']['reminder_time']+1)) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td>
		<?php endif; ?>
		<td class="selected"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['research']['end_time'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, 'heute um', "hoje &agrave;s") : smarty_modifier_replace($_tmp, 'heute um', "hoje &agrave;s")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Uhr', "") : smarty_modifier_replace($_tmp, 'Uhr', "")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'am', 'em') : smarty_modifier_replace($_tmp, 'am', 'em')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'um', "&agrave;s") : smarty_modifier_replace($_tmp, 'um', "&agrave;s")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'morgen', "amanh&atilde;") : smarty_modifier_replace($_tmp, 'morgen', "amanh&atilde;")); ?>
</td>
	</tr>
</table><br />
<?php endif; ?>
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
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
				<tr>
					<td><a href="javascript:popup('popup_unit.php?unit=unit_<?php echo $this->_tpl_vars['group_techs'][$this->_tpl_vars['group_name']][$this->_tpl_vars['num']]; ?>
&amp;level=<?php echo $this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]; ?>
', 520, 520)"><img src="../graphic/unit_big/<?php echo $this->_tpl_vars['cl_techs']->get_graphic(); ?>
" alt="" /></a></td>
					<td valign="top"><a href="javascript:popup('popup_unit.php?unit=unit_<?php echo $this->_tpl_vars['group_techs'][$this->_tpl_vars['group_name']][$this->_tpl_vars['num']]; ?>
&amp;level=<?php echo $this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]; ?>
', 520, 520)"><?php echo $this->_tpl_vars['cl_techs']->get_name($this->_tpl_vars['group_techs'][$this->_tpl_vars['group_name']][$this->_tpl_vars['num']]); ?>
</a> (<?php echo ((is_array($_tmp=$this->_tpl_vars['techs'][$this->_tpl_vars['unitname']])) ? $this->_run_mod_handler('tech', true, $_tmp) : tech($_tmp)); ?>
)<br />
						<?php if ($this->_tpl_vars['cl_techs']->get_last_error() == 'not_enough_ress'): ?>
						<br /><img src="../graphic/icons/wood.png" title="Madeira" alt="" /><?php echo $this->_tpl_vars['cl_techs']->get_wood($this->_tpl_vars['unitname'],$this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]+1); ?>
 <img src="../graphic/icons/stone.png" title="Argila" alt="" /><?php echo $this->_tpl_vars['cl_techs']->get_stone($this->_tpl_vars['unitname'],$this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]+1); ?>
 <img src="../graphic/icons/iron.png" title="Ferro" alt="" /><?php echo $this->_tpl_vars['cl_techs']->get_iron($this->_tpl_vars['unitname'],$this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]+1); ?>

						<br /><span class="inactive">Recursos disponiveis em <span class="timer_replace"><?php echo $this->_tpl_vars['cl_techs']->get_time_wait(); ?>
</span></span><span style="display:none">Recurssos disponiveis.</span>
									<?php elseif ($this->_tpl_vars['cl_techs']->get_last_error() == 'not_fulfilled'): ?>
						<span class="inactive">Requerimentos n&atilde;o atingidos.</span>
									<?php elseif ($this->_tpl_vars['cl_techs']->get_last_error() == 'max_stage' && $this->_tpl_vars['cl_techs']->get_last_error() != 'not_fulfilled'): ?>
						<span class="inactive">Pesquisado.</span>
									<?php elseif ($this->_tpl_vars['cl_techs']->get_last_error() == 'not_enough_storage'): ?>
						<br /><img src="../graphic/icons/wood.png" title="Madeira" alt="" /><?php echo $this->_tpl_vars['cl_techs']->get_wood($this->_tpl_vars['unitname'],$this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]+1); ?>
 <img src="../graphic/icons/stone.png" title="Argila" alt="" /><?php echo $this->_tpl_vars['cl_techs']->get_stone($this->_tpl_vars['unitname'],$this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]+1); ?>
 <img src="../graphic/icons/iron.png" title="Ferro" alt="" /><?php echo $this->_tpl_vars['cl_techs']->get_iron($this->_tpl_vars['unitname'],$this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]+1); ?>

						<br /><span class="inactive">Armaz&eacute;m muito pequeno.</span>
									<?php else: ?>
						<br /><img src="../graphic/icons/wood.png" title="Madeira" alt="" /><?php echo $this->_tpl_vars['cl_techs']->get_wood($this->_tpl_vars['unitname'],$this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]+1); ?>
 <img src="../graphic/icons/stone.png" title="Argila" alt="" /><?php echo $this->_tpl_vars['cl_techs']->get_stone($this->_tpl_vars['unitname'],$this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]+1); ?>
 <img src="../graphic/icons/iron.png" title="Ferro" alt="" /><?php echo $this->_tpl_vars['cl_techs']->get_iron($this->_tpl_vars['unitname'],$this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]+1); ?>

										<?php if ($this->_tpl_vars['is_researches']): ?>
					    <br /><span class="inactive">Pesquisa em andamento.</span> (<?php echo ((is_array($_tmp=$this->_tpl_vars['cl_techs']->get_time($this->_tpl_vars['village']['smith'],$this->_tpl_vars['unitname'],$this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]+1)+1)) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
)
										<?php else: ?>
											<?php if ($this->_tpl_vars['techs'][$this->_tpl_vars['unitname']] < 1): ?>
						<br /><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=smith&amp;action=research&amp;id=<?php echo $this->_tpl_vars['unitname']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">&raquo; Pesquisar</a> (<?php echo ((is_array($_tmp=$this->_tpl_vars['cl_techs']->get_time($this->_tpl_vars['village']['smith'],$this->_tpl_vars['unitname'],$this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]+1)+1)) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
)
											<?php else: ?>
						<br /><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=smith&amp;action=research&amp;id=<?php echo $this->_tpl_vars['unitname']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">&raquo; Pesquisar <?php echo ((is_array($_tmp=$this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]+1)) ? $this->_run_mod_handler('nivel', true, $_tmp) : nivel($_tmp)); ?>
</a> (<?php echo ((is_array($_tmp=$this->_tpl_vars['cl_techs']->get_time($this->_tpl_vars['village']['smith'],$this->_tpl_vars['unitname'],$this->_tpl_vars['techs'][$this->_tpl_vars['unitname']]+1)+1)) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
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