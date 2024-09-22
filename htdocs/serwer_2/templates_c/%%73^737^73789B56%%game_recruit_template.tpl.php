<?php /* Smarty version 2.6.14, created on 2012-01-30 22:14:18
         compiled from game_recruit_template.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_time', 'game_recruit_template.tpl', 48, false),)), $this); ?>
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
	<?php if (count ( $this->_tpl_vars['recruit_units'] ) > 0): ?>
	    <table class="vis">
			<tr>
				<th width="190">Kszta³cenie</th>
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
">przerwij</a></td>
			    </tr>
			<?php endforeach; endif; unset($_from); ?>

		</table>
		<div style="font-size: 7pt;">* (W przypadku przerwania, zostanie zwrócone 90% surowców)</div>
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
				<th width="180">Jednostka</th>
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
					<td><img src="graphic/holz.png" title="Drewno" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_woodprice($this->_tpl_vars['unit_dbname']); ?>
</td>
					<td><img src="graphic/lehm.png" title="Glina" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_stoneprice($this->_tpl_vars['unit_dbname']); ?>
</td>
					<td><img src="graphic/eisen.png" title="Ruda" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_ironprice($this->_tpl_vars['unit_dbname']); ?>
</td>
					<td><img src="graphic/face.png" title="Wieœniak" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_bhprice($this->_tpl_vars['unit_dbname']); ?>
</td>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_units']->get_time_round($this->_tpl_vars['village'][$this->_tpl_vars['dbname']],$this->_tpl_vars['unit_dbname'],$this->_tpl_vars['village']['bonus']))) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
					<td><?php echo $this->_tpl_vars['units_in_village'][$this->_tpl_vars['unit_dbname']]; ?>
/<?php echo $this->_tpl_vars['units_all'][$this->_tpl_vars['unit_dbname']]; ?>
</td>

					<?php echo $this->_tpl_vars['cl_units']->check_needed($this->_tpl_vars['unit_dbname'],$this->_tpl_vars['village']); ?>

					<?php if ($this->_tpl_vars['cl_units']->last_error == not_tec): ?>
					    <td class="inactive">Jednostka nie zosta³a jeszcze zbadana</td>
					<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_needed): ?>
					    <td class="inactive">Wymagania budynkowe nie zosta³y spe³nione</td>
					<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_enough_ress): ?>
					    <td class="inactive">Posiadasz za ma³o surowców</td>
					<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_enough_bh): ?>
					    <td class="inactive">Za ma³o miejsca w zagrodzie</td>
					<?php else: ?>
						<td><input name="<?php echo $this->_tpl_vars['unit_dbname']; ?>
" type="text" size="5" maxlength="5" /> <a href="javascript:insertUnit(document.forms[0].<?php echo $this->_tpl_vars['unit_dbname']; ?>
, <?php echo $this->_tpl_vars['cl_units']->last_error; ?>
)">(max. <?php echo $this->_tpl_vars['cl_units']->last_error; ?>
)</a></td>
					<?php endif; ?>
				</tr>
			<?php endforeach; endif; unset($_from); ?>

		    <tr><td colspan="8" align="right"><input name="submit" type="submit" value="Rekrutowaæ" style="font-size: 10pt;" /></td></tr>
		</table>
	</form>
<?php endif; ?>