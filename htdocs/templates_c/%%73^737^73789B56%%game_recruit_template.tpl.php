<?php /* Smarty version 2.6.14, created on 2012-12-29 04:11:33
         compiled from game_recruit_template.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_time', 'game_recruit_template.tpl', 34, false),array('modifier', 'format_date', 'game_recruit_template.tpl', 38, false),array('modifier', 'replace', 'game_recruit_template.tpl', 90, false),)), $this); ?>
<?php if ($this->_tpl_vars['modes'] == 'massrek'): ?>

<table>
	<tr>
		<td>
			<img src="graphic/big_buildings/barracks.png" title="Cazarm&#259;" alt="" />
			<img src="graphic/big_buildings/stable.png" title="Grajd" alt="" />
			<img src="graphic/big_buildings/garage.png" title="Atelier" alt="" />
		</td>
		<td>
			<h2>Recrutare &#238;n mas&#259;</h2>
			De aici pute&#355;i recruta trupe &#238;n mas&#259;,adic&#259; din grajd,cazarm&#259; &#351;i atelier!</td>
	</tr>
</table>
<table class="vis">
<tr>
<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=barracks">Cazarm&#259;</a></td>
<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=stable">Grajd</a></td>
<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=garage">Atelier</a></td>
<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=barracks&mode=massrek">Recrutare &#238;n mas&#259;</a></td>
</tr></table>

<?php if (count ( $this->_tpl_vars['recruit_units'] ) > 0): ?>
	    <table class="vis">
			<tr>
				<th width="150">Comanda</th>
				<th width="120">Durat&#259;</th>
				<th width="150">Terminare</th>
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
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['time_finished'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)); ?>
</td>
			    </tr>
				<?php endforeach; endif; unset($_from); ?>
		</table>
		<br>
	<?php endif; ?>

<?php echo $this->_tpl_vars['err']; ?>

<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=stable&amp;mode=massrek&amp;do=recruit" method="post" onsubmit="this.submit.disabled=true;">

<table class="vis" width="100%">
			<tr>
				<th width="150">Unitate</th>
				<th colspan="4" width="120">Necesitate</th>
				<th width="130">Durat&#259; (hh:mm:ss)</th>
								<th>Recrut&#259;</th>
			</tr>
			
		<?php $_from = $this->_tpl_vars['unit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['unit_name'] => $this->_tpl_vars['name_unit']):
?>
			<?php if ($this->_tpl_vars['name_unit'] != 'unit_snob'): ?>
				<tr>
					<td><a href="javascript:popup('popup_unit.php?unit=<?php echo $this->_tpl_vars['name_unit']; ?>
', 520, 520)"> <img src="graphic/unit/<?php echo $this->_tpl_vars['name_unit']; ?>
.png" alt="" /> <?php echo $this->_tpl_vars['unit_name']; ?>
</a></td>
					<td><img src="graphic/holz.png" title="Lemn" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_woodprice($this->_tpl_vars['name_unit']); ?>
</td>
					<td><img src="graphic/lehm.png" title="Argil&#259;" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_stoneprice($this->_tpl_vars['name_unit']); ?>
</td>
					<td><img src="graphic/eisen.png" title="Fier" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_ironprice($this->_tpl_vars['name_unit']); ?>
</td>
					<td><img src="graphic/face.png" title="Ferm&#259;" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_bhprice($this->_tpl_vars['name_unit']); ?>
</td>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_units']->get_time($this->_tpl_vars['village'][$this->_tpl_vars['dbname']],$this->_tpl_vars['name_unit']))) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
										
					<?php echo $this->_tpl_vars['cl_units']->check_needed($this->_tpl_vars['name_unit'],$this->_tpl_vars['village']); ?>

					<?php if ($this->_tpl_vars['cl_units']->last_error == not_tec): ?>
					    <td class="inactive">Unitate necercetat&#259;</td>
					<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_needed): ?>
					    <td class="inactive">Condi&#355;iile de construire nu sunt &#238;ndeplinite</td>
					<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_enough_ress): ?>
					    <td class="inactive">Nu sunt suficiente materii prime</td>
					<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_enough_bh): ?>
					    <td class="inactive">Ferma este prea mica</td>
					<?php else: ?>
						<td><input name="<?php echo $this->_tpl_vars['name_unit']; ?>
" type="text" size="5" maxlength="5" /> <a href="javascript:insertUnit(document.forms[0].<?php echo $this->_tpl_vars['name_unit']; ?>
, <?php echo $this->_tpl_vars['cl_units']->last_error; ?>
)">(max. <?php echo $this->_tpl_vars['cl_units']->last_error; ?>
)</a></td>
					<?php endif; ?>
			<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
		<tr><td colspan="8" align="right"><input name="submit" type="submit" value="Recruteaz&#259;" style="font-size: 10pt;" /></td></tr>
	</table>
</form>
<?php else: ?>
<table>
	<tr>
		<td>
			<img src="graphic/big_buildings/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['buildname']; ?>
" alt="" />
		</td>
		<td>
			<h2><?php echo $this->_tpl_vars['buildname']; ?>
 (Nivelul <?php echo ((is_array($_tmp=$this->_tpl_vars['village'][$this->_tpl_vars['dbname']])) ? $this->_run_mod_handler('replace', true, $_tmp, 'stufe', 'nivel') : smarty_modifier_replace($_tmp, 'stufe', 'nivel')); ?>
)</h2>
			<?php echo $this->_tpl_vars['description']; ?>

		</td>
	</tr>
</table>
<br />
<?php if ($this->_tpl_vars['show_build']): ?>
   
	<?php if (count ( $this->_tpl_vars['recruit_units'] ) > 0): ?>
	    <table class="vis">
			<tr>
				<th width="150">Comanda</th>
				<th width="120">Durat&#259;</th>
				<th width="150">Terminare</th>
				<th width="100">&#206;ntrerupe *</th>
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
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['time_finished'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)); ?>
</td>
					<td><a href="game.php?t=129107&amp;village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=<?php echo $this->_tpl_vars['dbname']; ?>
&amp;action=cancel&amp;id=<?php echo $this->_tpl_vars['key']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">&#238;ntrerupe</a></td>
			    </tr>
			<?php endforeach; endif; unset($_from); ?>

		</table>
		<div style="font-size: 7pt;">* (90% din materile prime vor fi date &#238;napoi)</div>
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

<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=barracks">Cazarm&#259;</a></td>
<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=stable">Grajd</a></td>
<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=garage">Atelier</a></td>
<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=barracks&mode=massrek">Recrutare &#238;n mas&#259;</a></td>
</table>	<table class="vis">
			<tr>
				<th width="150">Unitate</th>
				<th colspan="4" width="120">Necesitate</th>
				<th width="130">Durat&#259; (hh:mm:ss)</th>
				<th>&#206;n sat / Total</th>
				<th>Recrut&#259;</th>
			</tr>

			<?php $_from = $this->_tpl_vars['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['unit_dbname'] => $this->_tpl_vars['name']):
?>
				<tr>
					<td><a href="javascript:popup('popup_unit.php?unit=<?php echo $this->_tpl_vars['unit_dbname']; ?>
', 520, 520)"> <img src="graphic/unit/<?php echo $this->_tpl_vars['unit_dbname']; ?>
.png" alt="" /> <?php echo $this->_tpl_vars['name']; ?>
</a></td>
					<td><img src="graphic/holz.png" title="Lemn" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_woodprice($this->_tpl_vars['unit_dbname']); ?>
</td>
					<td><img src="graphic/lehm.png" title="Argil&#259;" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_stoneprice($this->_tpl_vars['unit_dbname']); ?>
</td>
					<td><img src="graphic/eisen.png" title="Fier" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_ironprice($this->_tpl_vars['unit_dbname']); ?>
</td>
					<td><img src="graphic/face.png" title="Ferm&#259;" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_bhprice($this->_tpl_vars['unit_dbname']); ?>
</td>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_units']->get_time($this->_tpl_vars['village'][$this->_tpl_vars['dbname']],$this->_tpl_vars['unit_dbname']))) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
					<td><?php echo $this->_tpl_vars['units_in_village'][$this->_tpl_vars['unit_dbname']]; ?>
/<?php echo $this->_tpl_vars['units_all'][$this->_tpl_vars['unit_dbname']]; ?>
</td>

					<?php echo $this->_tpl_vars['cl_units']->check_needed($this->_tpl_vars['unit_dbname'],$this->_tpl_vars['village']); ?>

					<?php if ($this->_tpl_vars['cl_units']->last_error == not_tec): ?>
					    <td class="inactive">Unitate necercetat&#259;</td>
					<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_needed): ?>
					    <td class="inactive">Condi&#355;iile de construire nu sunt &#238;ndeplinite</td>
					<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_enough_ress): ?>
					    <td class="inactive">Nu sunt suficiente resurse disponibile</td>
					<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_enough_bh): ?>
					    <td class="inactive">Ferma este prea mica</td>
					<?php else: ?>
						<td><input name="<?php echo $this->_tpl_vars['unit_dbname']; ?>
" type="text" size="5" maxlength="5" /> <a href="javascript:insertUnit(document.forms[0].<?php echo $this->_tpl_vars['unit_dbname']; ?>
, <?php echo $this->_tpl_vars['cl_units']->last_error; ?>
)">(max. <?php echo $this->_tpl_vars['cl_units']->last_error; ?>
)</a></td>
					<?php endif; ?>
				</tr>
			<?php endforeach; endif; unset($_from); ?>

		    <tr><td colspan="8" align="right"><input name="submit" type="submit" value="Recruteaz&#259;" style="font-size: 10pt;" /></td></tr>
		</table>
	</form>
<?php endif;  endif; ?>