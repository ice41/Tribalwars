<?php /* Smarty version 2.6.14, created on 2012-04-29 08:58:04
         compiled from game_main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_time', 'game_main.tpl', 29, false),array('modifier', 'format_date', 'game_main.tpl', 36, false),)), $this); ?>
<table>
	<tr>
		<td>
			<img src="graphic/big_buildings/main.png" title="Cladire Principala" alt="" />
		</td>
		<td>
			<h2>Cl&#259;direa principal&#259; (Nivelul <?php echo $this->_tpl_vars['village']['main']; ?>
)</h2> 
			<?php echo $this->_tpl_vars['description']; ?>
<td align="right" valign="top" style="white-space:nowrap;"><a href="/help/index.php?article=buildings" target="_blank">
                        Ajutor pentru cl&#259;diri
                        </a></td>
		</td>
	</tr>
</table>
<br />
<?php if ($this->_tpl_vars['num_do_build'] > 0): ?>
	<table class="vis">
	<tr><th width="250">Comand&#259; de construc&#355;ie</th><th width="100">Durat&#259; *</th><th width="150">Terminare</th><th>&#206;ntrerupere</th></tr>
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
 (Nivelul <?php echo $this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['stage']; ?>
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
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['finished'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)); ?>
</td>
					<td><a href="javascript:ask('&#206;mi puteti chiar anula lucr&#259;rile?', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=main&amp;action=cancel&amp;id=<?php echo $this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['r_id']; ?>
&amp;mode=build&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
')">&#238;ntrerupe</a></td>
				</tr>
	<?php endforeach; endif; unset($_from); ?>
		<?php if ($this->_tpl_vars['num_do_build'] > 2): ?>
		<tr>
			<td colspan="4">Costuri suplimentare pentru urm&#259;toarea comand&#259; &#238;n circuitul de construc&#355;ie:<b><?php echo $this->_tpl_vars['cl_builds']->get_buildsharpens_costs($this->_tpl_vars['num_do_build']); ?>
%</b><br />
			<small>Costurile suplimentare produse de circuitul de construc&#355;ie nu &#238;&#355;i vor fi &#238;napoiate prin &#238;ntrerupere</small></td>
		</tr>
	<?php endif; ?>
	</table>
	<br />
<?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<font class="error"><?php echo $this->_tpl_vars['error']; ?>
</font>
<?php endif; ?>
<table class="vis">
<tr>
<th width="220">Cl&#259;diri</th><th colspan="4">Necesitate</th><th width="100">Timp de construc&#355;ie<br /> (hh:mm:ss)</th><th width="200">Construire</th>
</tr>

		<?php $_from = $this->_tpl_vars['fulfilled_builds']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dbname']):
?>
			<tr>
				<td><a href="javascript:popup_scroll('popup_building.php?building=<?php echo $this->_tpl_vars['dbname']; ?>
', 520, 520)"><img src="graphic/icon_question.gif" width="10" height="14"></a>&nbsp;<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img src="graphic/buildings/<?php echo $this->_tpl_vars['dbname']; ?>
.png"> <?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
</a> (Nivelul <?php echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; ?>
)</td>
				<?php if ($this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['dbname']) <= $this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]): ?>
					<td colspan="6" align="center" class="inactive">Cl&#259;direa complet construit&#259;</td>
				<?php else: ?>
					<td><img src="graphic/holz.png" title="Lemn" alt="" /><?php echo $this->_tpl_vars['cl_builds']->get_wood($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1); ?>
</td>
					<td><img src="graphic/lehm.png" title="Argil&#259;" alt="" /><?php echo $this->_tpl_vars['cl_builds']->get_stone($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1); ?>
</td>
					<td><img src="graphic/eisen.png" title="Fier" alt="" /><?php echo $this->_tpl_vars['cl_builds']->get_iron($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1); ?>
</td>
					<td><?php if ($this->_tpl_vars['cl_builds']->get_bh($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1) > 0): ?><img src="graphic/face.png" title="Ferm&#259;" alt="" /><?php echo $this->_tpl_vars['cl_builds']->get_bh($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1);  endif; ?></td>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_builds']->get_time($this->_tpl_vars['village']['main'],$this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1))) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
					<?php echo $this->_tpl_vars['cl_builds']->build($this->_tpl_vars['village'],$this->_tpl_vars['id'],$this->_tpl_vars['build_village'],$this->_tpl_vars['plus_costs']); ?>

					<?php if ($this->_tpl_vars['cl_builds']->get_build_error2() == 'not_enough_ress'): ?>
						<td class="inactive"><span>Materii prime disponibile in <span class="timer_replace"><?php echo $this->_tpl_vars['cl_builds']->get_build_error(); ?>
</span></span><span style="display:none">Materiile prime disponibile.</span></td>
					<?php elseif ($this->_tpl_vars['cl_builds']->get_build_error2() == 'not_enough_ress_plus'): ?>
						<td class="inactive">Prea pu&#355;ine materii prime , pentru a construii &#238;n continu.</td>
					<?php elseif ($this->_tpl_vars['cl_builds']->get_build_error2() == 'not_fulfilled'): ?>
						<td class="inactive">Condi&#355;iile de construire nu sunt &#238;ndeplinite.</td>
					<?php elseif ($this->_tpl_vars['cl_builds']->get_build_error2() == 'not_enough_bh'): ?>
						<td class="inactive">Prea pu&#355;ine locuri &#238;n ferme</td>
					<?php elseif ($this->_tpl_vars['cl_builds']->get_build_error2() == 'not_enough_storage'): ?>
						<td class="inactive">Magazia este prea mic&#259;</td>
					<?php else: ?>
						<?php if ($this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']] < 1): ?>
							<?php if (count ( $this->_tpl_vars['do_build'] ) > 2 && $this->_tpl_vars['user']['confirm_queue'] == 1): ?>
								<td><a href="javascript:ask('Pentru a construii &#238;n continu te cost&#259; &#238;n plus.Continua&#355;i?', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=main&amp;action=build&amp;id=<?php echo $this->_tpl_vars['dbname']; ?>
&amp;force&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
')">Extindere la nivelul</a></td>
							<?php else: ?>
								<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=main&action=build&id=<?php echo $this->_tpl_vars['dbname']; ?>
&h=<?php echo $this->_tpl_vars['hkey']; ?>
">Construie&#351;te</td>
							<?php endif; ?>
						<?php else: ?>
							<?php if (count ( $this->_tpl_vars['do_build'] ) > 2 && $this->_tpl_vars['user']['confirm_queue'] == 1): ?>
								<td><a href="javascript:ask('Pentru a construii &#238;n continu te cost&#259; &#238;n plus.Continua&#355;i?', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=main&amp;action=build&amp;id=<?php echo $this->_tpl_vars['dbname']; ?>
&amp;force&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
')">Extindere la nivelul <?php echo $this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1; ?>
</a></td>
							<?php else: ?>
								<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=main&action=build&id=<?php echo $this->_tpl_vars['dbname']; ?>
&h=<?php echo $this->_tpl_vars['hkey']; ?>
">Extindere la nivelul <?php echo $this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1; ?>
</td>
							<?php endif; ?>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
			</tr>
		<?php endforeach; endif; unset($_from); ?>

</table>
<table > 
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=main&amp;action=change_name&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
<table>
<tr>
  <th colspan="3">Modifica numele satului</th>
</tr>
<tr><td><input type="text" name="name" value="<?php echo $this->_tpl_vars['village']['name']; ?>
"></td><td><input type="submit" value="Modificare"></tr>
</table>
</form>