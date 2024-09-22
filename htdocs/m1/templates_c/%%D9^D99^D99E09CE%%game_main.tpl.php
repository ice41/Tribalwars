<?php /* Smarty version 2.6.14, created on 2016-12-22 21:46:21
         compiled from game_main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nivel', 'game_main.tpl', 24, false),array('modifier', 'format_time', 'game_main.tpl', 49, false),array('modifier', 'format_date', 'game_main.tpl', 56, false),array('modifier', 'replace', 'game_main.tpl', 56, false),)), $this); ?>

	<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=main&amp;mode=<?php echo $this->_tpl_vars['mode']; ?>
&amp;action=rename&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
		<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
			<tr><th colspan="3">Renomear aldeia:</th></tr>
			<tr>
				<td align="center"><input type="text" name="name" value="<?php echo $this->_tpl_vars['village']['name']; ?>
" /></td>
				<td align="center"><input type="submit" class="button" value="Ok" /></td>
			</tr>
		</table>
	</form><br />
	<form action="" method="post" name="main_core">
		<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
			<tr><th>Op&ccedil;&otilde;es</th></tr>
			<tr><td><label><input type="checkbox" name="hide_full_updates"  onclick="hide_full_update('hide_full_updates')" <?php  if ($_COOKIE['hide_full_updates'] == true) { echo 'checked="checked"'; } else { }  ?> /> Ocultar constru&ccedil;&otilde;es terminadas</label></td></tr>
			<tr><td><label><input type="checkbox" name="show_full" onclick="show_fulls('show_full')" <?php  if ($_COOKIE['show_full'] == true) { echo 'checked="checked"'; } else { }  ?>/> Mostrar todos os edifi&iacute;cios</label></td></tr>
		</table>
	</form>
</td>
<td width="80%">
	<table>
		<tr>
			<td><img src="../graphic/build/main.jpg" title="Edif&iacute;cio Principal" alt="" /></td>
			<td>
				<h2>Edif&iacute;cio Principal (<?php echo ((is_array($_tmp=$this->_tpl_vars['village']['main'])) ? $this->_run_mod_handler('nivel', true, $_tmp) : nivel($_tmp)); ?>
)</h2>
				<?php echo $this->_tpl_vars['description']; ?>

			</td>
			<td align="right" valign="top" style="white-space:nowrap;"><a href="#" target="_blank">Ajuda - Edif&iacute;cios</a></td>
		</tr>
	</table>
<?php if ($this->_tpl_vars['mode'] == 'build'): ?>
	<?php if ($this->_tpl_vars['num_do_build'] > 0): ?>
	<table class="vis" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr>
			<th width="250">Ordem de constru&ccedil;&atilde;o</th>
			<th width="100">Dura&ccedil;&atilde;o</th>
			<th width="150">Conclus&atilde;o</th>
			<th>Cancelamento</th>
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
 (<?php echo ((is_array($_tmp=$this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['stage'])) ? $this->_run_mod_handler('nivel', true, $_tmp) : nivel($_tmp)); ?>
)</td>
			<?php if ($this->_tpl_vars['id'] == 0): ?>
				<?php if ($this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['finished'] < $this->_tpl_vars['time']): ?>
			<td align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['dauer']+1)) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
				<?php else: ?>
			<td align="center"><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['dauer']+1)) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td>
				<?php endif; ?>
			<?php else: ?>
			<td align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['dauer']+1)) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
			<?php endif; ?>
			<td align="center"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['finished'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, 'heute um', 'hoje &agrave;s') : smarty_modifier_replace($_tmp, 'heute um', 'hoje &agrave;s')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Uhr', '') : smarty_modifier_replace($_tmp, 'Uhr', '')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'am', 'em') : smarty_modifier_replace($_tmp, 'am', 'em')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'um', '&agrave;s') : smarty_modifier_replace($_tmp, 'um', '&agrave;s')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'morgen', 'amanh&atilde;') : smarty_modifier_replace($_tmp, 'morgen', 'amanh&atilde;')); ?>
</td>
			<td align="center"><a href="javascript:ask('Tem certeza que quer cancelar a ordem de contru&ccedil;&atilde;o?', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=main&amp;action=cancel&amp;id=<?php echo $this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['r_id']; ?>
&amp;mode=build&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
')">cancelar</a></td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
		<?php if ($this->_tpl_vars['num_do_build'] > 2): ?>
		<tr>
			<td colspan="4">Custo adicional para adicionar a pr&oacute;xima oderm de contri&ccedil;&atilde;o: <b><?php echo $this->_tpl_vars['cl_builds']->get_buildsharpens_costs($this->_tpl_vars['num_do_build']); ?>
%</b><br />
			<small>Em caso de cancelamento o custo adicional n&atilde;o ser&aacute; reembolssdo!</small></td>
		</tr>
		<?php endif; ?>
	</table><br />
	<?php endif; ?>

	<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
		<div class="error"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['error'])) ? $this->_run_mod_handler('replace', true, $_tmp, "Es sind nicht genügend Rohstoffe vorhanden.", "N&atilde;o h&aacute; recursos suficientes dispon&iacute;veis.") : smarty_modifier_replace($_tmp, "Es sind nicht genügend Rohstoffe vorhanden.", "N&atilde;o h&aacute; recursos suficientes dispon&iacute;veis.")))) ? $this->_run_mod_handler('replace', true, $_tmp, "Dein Speicher ist zu klein.", "O armaz&eacute;m &eacute; muito pequeno.") : smarty_modifier_replace($_tmp, "Dein Speicher ist zu klein.", "O armaz&eacute;m &eacute; muito pequeno.")))) ? $this->_run_mod_handler('replace', true, $_tmp, "Gebäude wurde vollständig ausgebaut.", "O edif&iacute;cio j&aacute; est&aacute; totalmente constru&iacute;do.") : smarty_modifier_replace($_tmp, "Gebäude wurde vollständig ausgebaut.", "O edif&iacute;cio j&aacute; est&aacute; totalmente constru&iacute;do.")))) ? $this->_run_mod_handler('replace', true, $_tmp, "Zu wenig Rohstoffe um in der Bauschleife zu produzieren.", "N&atilde;o existe recursos suficientes para adicionar est&aacute; ordem de constru&ccedil;&atilde;o.") : smarty_modifier_replace($_tmp, "Zu wenig Rohstoffe um in der Bauschleife zu produzieren.", "N&atilde;o existe recursos suficientes para adicionar est&aacute; ordem de constru&ccedil;&atilde;o.")); ?>
</div><br />
	<?php endif; ?>
	<?php if ($this->_tpl_vars['renome']): ?>
		<div class="succes"><?php echo $this->_tpl_vars['sucesso']; ?>
</div><br />
	<?php endif; ?>
	<table class="vis" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr>
			<th width="350">Edif&iacute;cios</th>
			<th width="40"><center><img src="../graphic/icons/wood.png" /></center></th>
			<th width="40"><center><img src="../graphic/icons/stone.png" /></center></th>
			<th width="40"><center><img src="../graphic/icons/iron.png" /></center></th>
			<th width="40"><center><img src="../graphic/icons/farm.png" /></center></th>
			<th width="100">Dura&ccedil;&atilde;o</th>
			<th width="300">Construir</th>
		</tr>
	<?php $_from = $this->_tpl_vars['fulfilled_builds']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dbname']):
 $village_stage = $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; $max_stage = $this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['dbname']); if ($village_stage == $max_stage && $_COOKIE['hide_full_updates'] == true) { } else { ?>
		<tr id="hide_build(<?php echo $this->_tpl_vars['dbname']; ?>
)">
			<td><a href="javascript:popup('popup_building.php?building=<?php echo $this->_tpl_vars['dbname']; ?>
', 520, 520)"><img src="../graphic/icons/help.png" width="15"/></a> <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img src="../graphic/buildings/<?php echo $this->_tpl_vars['dbname']; ?>
.png"> <?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
</a> <span style="float:right;">(<?php echo ((is_array($_tmp=$this->_tpl_vars['village'][$this->_tpl_vars['dbname']])) ? $this->_run_mod_handler('nivel', true, $_tmp) : nivel($_tmp)); ?>
)</span></td>
		<?php if ($this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['dbname']) <= $this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]): ?>
			<td colspan="6" align="center" class="inactive">Edif&iacute;cio totalmente constru&iacute;do</td>
		<?php else: ?>
			<td align="center"><?php echo $this->_tpl_vars['cl_builds']->get_wood($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1); ?>
</td>
			<td align="center"><?php echo $this->_tpl_vars['cl_builds']->get_stone($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1); ?>
</td>
			<td align="center"><?php echo $this->_tpl_vars['cl_builds']->get_iron($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1); ?>
</td>
			<td align="center"><?php if ($this->_tpl_vars['cl_builds']->get_bh($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1) > 0):  echo $this->_tpl_vars['cl_builds']->get_bh($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1);  endif; ?></td>
			<td align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_builds']->get_time($this->_tpl_vars['village']['main'],$this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1)+1)) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
			<?php echo $this->_tpl_vars['cl_builds']->build($this->_tpl_vars['village'],$this->_tpl_vars['id'],$this->_tpl_vars['build_village'],$this->_tpl_vars['plus_costs']); ?>

			<?php if ($this->_tpl_vars['cl_builds']->get_build_error2() == 'not_enough_ress'): ?>
			<td class="inactive" align="center">
				<span>Recursos disponiveis em <span class="timer"><?php echo $this->_tpl_vars['cl_builds']->get_build_error(); ?>
</span></span>
				<span style="display:none">Recursos dispooniveis</span>
			</td>
			<?php elseif ($this->_tpl_vars['cl_builds']->get_build_error2() == 'not_enough_ress_plus'): ?>
			<td class="inactive" align="center">Recursos insuficientes para adicionar novas ordens de constru&ccedil;&atilde;o.</td>
			<?php elseif ($this->_tpl_vars['cl_builds']->get_build_error2() == 'not_fulfilled'): ?>
			<td class="inactive" align="center">Requerimentos n&atilde;o atingidos</td>
			<?php elseif ($this->_tpl_vars['cl_builds']->get_build_error2() == 'not_enough_bh'): ?>
			<td class="inactive" align="center">N&atilde;o existe espa&ccedil;o suficiente na fazenda.</td>
			<?php elseif ($this->_tpl_vars['cl_builds']->get_build_error2() == 'not_enough_storage'): ?>
			<td class="inactive" align="center">Armaz&eacute;m &eacute; muito pequeno.</td>
			<?php else:  
	$nivel = $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; 
	$n_max = $this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['dbname']);
	$c1 = ceil(($nivel*100)/$n_max);
	$c2 = $c1;
 ?>
				<?php if ($this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']] < 1): ?>
					<?php if (count ( $this->_tpl_vars['do_build'] ) > 2 && $this->_tpl_vars['user']['confirm_queue'] == 1): ?>
			<td align="center"><a href="javascript:ask('Est&aacute; ordem de constru&ccedil;&atilde;o ter&aacute; custos extras, deseja continuar?', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=main&amp;action=build&amp;id=<?php echo $this->_tpl_vars['dbname']; ?>
&amp;force&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
')">Construir</a></td>
					<?php else: ?>
			<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=main&action=build&id=<?php echo $this->_tpl_vars['dbname']; ?>
&h=<?php echo $this->_tpl_vars['hkey']; ?>
">Construir</a></td>
					<?php endif; ?>
				<?php else: ?>
					<?php if (count ( $this->_tpl_vars['do_build'] ) > 2 && $this->_tpl_vars['user']['confirm_queue'] == 1): ?>
			<td>
				<table cellpadding="0" rowspacing="0" cellspacing="0">
					<tr>
						<td width="300" align="center" title="<?php echo $c1; ?>%">
							<div class="progress" title="<?php echo $c1; ?>%"><div class="progress data" style="width:<?php echo $c2; ?>%;" title="<?php echo $c1; ?>%">&nbsp;</div></div>
						</td>
						<td align="center">
							<a href="javascript:ask('Est&aacute; ordem de constru&ccedil;&atilde;o ter&aacute; custos extras, deseja continuar?', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=main&amp;action=build&amp;id=<?php echo $this->_tpl_vars['dbname']; ?>
&amp;force&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
')"><img src="../graphic/icons/plus.png"></a>
						</td>
					</tr>
				</table>
			</td>
					<?php else: ?>
			<td>
				<table cellpadding="0" rowspacing="0" cellspacing="0">
					<tr>
						<td width="300" align="center" title="<?php echo $c1; ?>%">
							<div class="progress" title="<?php echo $c1; ?>%"><div class="progress data" style="width:<?php echo $c2; ?>%;" title="<?php echo $c1; ?>%">&nbsp;</div></div>
						</td>
						<td align="center">
							<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=main&action=build&id=<?php echo $this->_tpl_vars['dbname']; ?>
&h=<?php echo $this->_tpl_vars['hkey']; ?>
"><img src="../graphic/icons/plus.png"></a>
						</td>
					</tr>
				</table>
			</td>
					<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>
		<?php endif; ?>
		</tr>
<?php } ?>
	<?php endforeach; endif; unset($_from);  
	if($_COOKIE['show_full']){
  $_from = $this->_tpl_vars['cl_builds']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname']):
?>
	<?php if ($this->_tpl_vars['cl_builds']->get_needed_by_dbname($this->_tpl_vars['dbname'])):  
	$select = mysql_fetch_array(mysql_query("SELECT * FROM villages WHERE id = '".$_GET['village']."'"));
	$dbname = $this->_tpl_vars['dbname'];
	if($select[$dbname] <= 0){ 
 ?>
		<tr>
			<td><a href="javascript:popup('popup_building.php?building=<?php echo $this->_tpl_vars['dbname']; ?>
', 520, 520)"><img src="../graphic/icons/help.png" width="15"/></a> <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img src="../graphic/buildings/<?php echo $this->_tpl_vars['dbname']; ?>
.png"> <?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
</a></td>
			<td colspan="6" align="center" class="inactive">Necess&aacute;rio: <?php $_from = $this->_tpl_vars['cl_builds']->get_needed_by_dbname($this->_tpl_vars['dbname']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['n_building'] => $this->_tpl_vars['n_stage']):
?><a href="javascript:popup('popup_building.php?building=<?php echo $this->_tpl_vars['n_building']; ?>
', 520, 520)"><img src="../graphic/buildings/<?php echo $this->_tpl_vars['n_building']; ?>
.png"><?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['n_building']); ?>
</a> (<?php echo ((is_array($_tmp=$this->_tpl_vars['n_stage'])) ? $this->_run_mod_handler('nivel', true, $_tmp) : nivel($_tmp)); ?>
)
<?php endforeach; endif; unset($_from); ?></td>
<?php 
	}
 ?>
	<?php endif;  endforeach; endif; unset($_from); ?>
		</tr>
<?php  }  ?>
	</table>
<?php elseif ($this->_tpl_vars['mode'] == 'destroy'): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_main_destroy.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif; ?>
</td>