<?php /* Smarty version 2.6.14, created on 2012-01-30 18:30:48
         compiled from game_main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_time', 'game_main.tpl', 48, false),)), $this); ?>
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

<?php if ($this->_tpl_vars['num_do_build'] > 0): ?>
	<table class="vis">
	<tr><th width="250">Zlecenie</th><th width="100">Trwanie</th><th width="150">Ukoñczenie</th><th>Przerwij</th></tr>
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
 (poziom <?php echo $this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['stage']; ?>
)</td>
					<?php if ($this->_tpl_vars['id'] == 0): ?>
						<?php if ($this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['finished'] < $this->_tpl_vars['time']): ?>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['dauer'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
							<?php header('location: game.php?village='.$this->_tpl_vars['village']['id'].'&screen='.$_GET['screen']); ?>
						<?php else: ?>
							<td><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['dauer'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td>
						<?php endif; ?>
					<?php else: ?>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['dauer'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
					<?php endif; ?>
					<td><?php echo $this->_tpl_vars['pl']->format_date($this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['finished']); ?>
</td>
					<td><a href="javascript:ask('Czy na pewno chcesz przerwaæ budowanie?', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=main&amp;action=cancel&amp;id=<?php echo $this->_tpl_vars['do_build'][$this->_tpl_vars['id']]['r_id']; ?>
&amp;mode=build&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
')">Przerwij</a></td>
				</tr>
	<?php endforeach; endif; unset($_from); ?>
		<?php if ($this->_tpl_vars['num_do_build'] > 2): ?>
		<tr>
			<td colspan="4">Dodatkowe koszty budowy, spowodowane d³ug¹ list¹ budowy: <b><?php echo $this->_tpl_vars['cl_builds']->get_buildsharpens_costs($this->_tpl_vars['num_do_build']); ?>
%</b><br />
			<small>Dodatkowe koszty budowy nie bêd¹ zwracane w przypadku przerwania</small></td>
		</tr>
	<?php endif; ?>
	</table>
	<br />
<?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
    <?php if ($this->_tpl_vars['error'] == 'Gebäude wurde vollständig ausgebaut.'): ?>
		<font class="error">Maksymalny poziom rozbudowy zosta³ osi¹gniêty.</font>
	<?php elseif ($this->_tpl_vars['error'] == 'Gebäude existiert nicht.'): ?>
		<font class="error">Nie ma takiego budynku.</font>
	<?php else: ?>
		<font class="error"><?php echo $this->_tpl_vars['error']; ?>
</font>
	<?php endif;  endif; ?>

<form name="budowanie" action="game.php" method="GET">
	<input name="village" value="<?php echo $this->_tpl_vars['village']['id']; ?>
" type="hidden"/>
	<input name="screen" value="<?php echo $this->_tpl_vars['screen']; ?>
" type="hidden"/>
	<input name="action" value="build" type="hidden"/>
	<input name="id" value="-1" type="hidden"/>
	<input name="h" value="<?php echo $this->_tpl_vars['hkey']; ?>
" type="hidden"/>

<table class="vis">
<tr>
<th width="220">Budynek</th><th colspan="4">Koszty</th><th width="100">Czas<br /> (hh:mm:ss)</th><th width="200">Wybuduj</th>
</tr>

		<?php $_from = $this->_tpl_vars['fulfilled_builds']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dbname']):
?>
			<tr>
				<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img src="graphic/buildings/<?php echo $this->_tpl_vars['dbname']; ?>
.png"> <?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
</a> (Poziom <?php echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; ?>
)</td>
				<?php if ($this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['dbname']) <= $this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]): ?>
					<td colspan="6" align="center" class="inactive">Maksymalny poziom rozbudowy</td>
				<?php else: ?>
					<td><img src="graphic/holz.png" title="drewno" alt="" /><?php if ($this->_tpl_vars['cl_builds']->get_wood($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1) > $this->_tpl_vars['village']['r_wood']): ?><font color="red"><?php echo $this->_tpl_vars['cl_builds']->get_wood($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1); ?>
</font><?php else:  echo $this->_tpl_vars['cl_builds']->get_wood($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1);  endif; ?></td>
					<td><img src="graphic/lehm.png" title="glina" alt="" /><?php if ($this->_tpl_vars['cl_builds']->get_stone($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1) > $this->_tpl_vars['village']['r_stone']): ?><font color="red"><?php echo $this->_tpl_vars['cl_builds']->get_stone($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1); ?>
</font><?php else:  echo $this->_tpl_vars['cl_builds']->get_stone($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1);  endif; ?></td>
					<td><img src="graphic/eisen.png" title="ruda" alt="" /><?php if ($this->_tpl_vars['cl_builds']->get_iron($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1) > $this->_tpl_vars['village']['r_iron']): ?><font color="red"><?php echo $this->_tpl_vars['cl_builds']->get_iron($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1); ?>
</font><?php else:  echo $this->_tpl_vars['cl_builds']->get_iron($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1);  endif; ?></td>
					<td><?php if ($this->_tpl_vars['cl_builds']->get_bh($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1) > 0): ?><img src="graphic/face.png" title="Wieœniak" alt="" /><?php if ($this->_tpl_vars['cl_builds']->get_bh($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1) > ( $this->_tpl_vars['max_bh'] - $this->_tpl_vars['village']['r_bh'] )): ?><font color="red"><?php echo $this->_tpl_vars['cl_builds']->get_bh($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1); ?>
</font><?php else:  echo $this->_tpl_vars['cl_builds']->get_bh($this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1);  endif;  endif; ?></td>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_builds']->get_time($this->_tpl_vars['village']['main'],$this->_tpl_vars['dbname'],$this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1))) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
					<?php echo $this->_tpl_vars['cl_builds']->build($this->_tpl_vars['village'],$this->_tpl_vars['id'],$this->_tpl_vars['build_village'],$this->_tpl_vars['plus_costs']); ?>

					<?php if ($this->_tpl_vars['cl_builds']->get_build_error2() == 'not_enough_ress'): ?>
						<td class="inactive"><span>Surowce dostêpne za <span class="timer_replace"><?php echo $this->_tpl_vars['cl_builds']->get_build_error(); ?>
</span></span><span style="display:none">Wystarczaj¹co surowców.</span></td>
					<?php elseif ($this->_tpl_vars['cl_builds']->get_build_error2() == 'not_enough_ress_plus'): ?>
						<td class="inactive">Za ma³o surowców by dodaæ do kolejki budowy.</td>
					<?php elseif ($this->_tpl_vars['cl_builds']->get_build_error2() == 'not_fulfilled'): ?>
						<td class="inactive">Nie spe³niono wymagañ do tego budynku.</td>
					<?php elseif ($this->_tpl_vars['cl_builds']->get_build_error2() == 'not_enough_bh'): ?>
						<td class="inactive">Za ma³o miejsca w zagrodzie</td>
					<?php elseif ($this->_tpl_vars['cl_builds']->get_build_error2() == 'not_enough_storage'): ?>
						<td class="inactive">Za ma³a pojemnoœæ spichlerza.</td>
					<?php else: ?>
						<?php if ($this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']] < 1): ?>
							<td><span class="link" onclick="insertUnit(document.forms['budowanie'].id,'<?php echo $this->_tpl_vars['dbname']; ?>
');document.forms['budowanie'].submit();">Wybuduj</span></td>
						<?php else: ?>
							<td><span class="link" onclick="insertUnit(document.forms['budowanie'].id,'<?php echo $this->_tpl_vars['dbname']; ?>
');document.forms['budowanie'].submit();">Rozbuduj na poziom <?php echo $this->_tpl_vars['build_village'][$this->_tpl_vars['dbname']]+1; ?>
</span></td>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
			</tr>
		<?php endforeach; endif; unset($_from); ?>

</table>

</form>


<br>
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=main&amp;action=change_name&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
<table class="vis" width="300">
<tr><th colspan="3">Zmieñ nazwê wioski</th></tr>
<tr><td><input type="text" name="name" value="<?php echo $this->_tpl_vars['village']['name']; ?>
"></td><td><input type="submit" value="Zmieñ"></tr>
</table>
</form>