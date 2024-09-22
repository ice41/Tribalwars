<?php /* Smarty version 2.6.14, created on 2012-03-11 20:20:13
         compiled from help_techs.tpl */ ?>
<h3>Technologie</h3>

<?php $_from = $this->_tpl_vars['cl_techs']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname']):
?>
	<?php 
	$this->_tpl_vars['unit'] = 'unit_'.$this->_tpl_vars['dbname'];
	 ?>
	<table>
		<tr>
			<td valign="top">
				<img src="graphic/unit_big/<?php echo $this->_tpl_vars['dbname']; ?>
.png" alt="<?php echo $this->_tpl_vars['cl_techs']->get_name($this->_tpl_vars['dbname']); ?>
" title="<?php echo $this->_tpl_vars['cl_techs']->get_name($this->_tpl_vars['dbname']); ?>
"/>
			</td>
			<td valign="top">
				<?php echo $this->_tpl_vars['cl_units']->get_description($this->_tpl_vars['unit']); ?>

			</td>
		</tr>
	</table>
	<br>
	<table class="vis" width="100%">
		<tr>
			<th colspan="<?php echo $this->_tpl_vars['cl_units']->get_countNeeded($this->_tpl_vars['unit']); ?>
">Wymagane poziomy budynków, aby móc rekrutowaæ dan¹ jednostkê</th>
		</tr>
								
		<tr>
			<?php if (count ( $this->_tpl_vars['cl_units']->get_needed($this->_tpl_vars['unit']) ) > 0): ?>
				<?php $_from = $this->_tpl_vars['cl_units']->get_needed($this->_tpl_vars['unit']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['n_unit'] => $this->_tpl_vars['n_stage']):
?>
					<td>
						<a href="popup_building.php?building=<?php echo $this->_tpl_vars['n_unit']; ?>
"><?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['n_unit']); ?>
</a> (Poziom <?php echo $this->_tpl_vars['n_stage']; ?>
)
					</td>
				<?php endforeach; endif; unset($_from); ?>
			<?php else: ?>
				<td>Jednostka dostêpna bez wymagañ.</td>
			<?php endif; ?>
		</tr>
	</table>
	<br>
	<table class="vis" width="100%">
		<tr>
			<th style="text-align:center;">poziom technologiczny</th>
			<th style="text-align:center;" colspan="3">Koszt badañ</th>
			<th width="30"><center><img src="graphic/unit/att.png" alt="Si³a ataku" /></center></th>
			<th width="30"><center><img src="graphic/unit/def.png" alt="Ogólna si³a obrony" /></center></th>
			<th width="30"><center><img src="graphic/unit/def_cav.png" alt="Obrona przeciw kawalerii" /></center></th>
			<th width="30"><center><img src="graphic/unit/def_archer.png" alt="Obrona przeciw ³ucznikom" /></center></th>
		</tr>
		<?php /*Pobierz maksymalny poziom technologii:*/$maxstage = $this->_tpl_vars['cl_techs']->get_maxstage($this->_tpl_vars['dbname']);for($i=1;$i<=$maxstage;$i++):$this->_tpl_vars['stage'] = $i; ?>
			<tr>
				<td style="text-align:center;"><?php echo $this->_tpl_vars['stage']; ?>
</td>
				<td style="text-align:center;"><img src="graphic/holz.png" title="Drewno" alt="" /> <?php echo $this->_tpl_vars['cl_techs']->get_wood($this->_tpl_vars['dbname'],$this->_tpl_vars['stage']); ?>
</td>
				<td style="text-align:center;"><img src="graphic/lehm.png" title="Ceg³y" alt="" /> <?php echo $this->_tpl_vars['cl_techs']->get_stone($this->_tpl_vars['dbname'],$this->_tpl_vars['stage']); ?>
</td>
				<td style="text-align:center;"><img src="graphic/eisen.png" title="¯elazo" alt="" /> <?php echo $this->_tpl_vars['cl_techs']->get_iron($this->_tpl_vars['dbname'],$this->_tpl_vars['stage']); ?>
</td>
				<?php $this->_tpl_vars['stage'] -= 1; ?>
				<td style="text-align:center;"><?php echo $this->_tpl_vars['cl_units']->get_att($this->_tpl_vars['unit'],$this->_tpl_vars['stage']); ?>
</td>
				<td style="text-align:center;"><?php echo $this->_tpl_vars['cl_units']->get_def($this->_tpl_vars['unit'],$this->_tpl_vars['stage']); ?>
</td>
				<td style="text-align:center;"><?php echo $this->_tpl_vars['cl_units']->get_defcav($this->_tpl_vars['unit'],$this->_tpl_vars['stage']); ?>
</td>
				<td style="text-align:center;"><?php echo $this->_tpl_vars['cl_units']->get_defarcher($this->_tpl_vars['unit'],$this->_tpl_vars['stage']); ?>
</td>
			</tr>
		<?php endfor; ?>
	</table>
<?php endforeach; endif; unset($_from); ?>