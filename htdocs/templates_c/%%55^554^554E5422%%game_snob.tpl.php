<?php /* Smarty version 2.6.14, created on 2012-12-29 05:17:29
         compiled from game_snob.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'game_snob.tpl', 7, false),array('modifier', 'format_time', 'game_snob.tpl', 27, false),array('modifier', 'format_date', 'game_snob.tpl', 31, false),)), $this); ?>
<table>
	<tr>
		<td>
			<img src="graphic/big_buildings/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="Cazarma" alt="" />
		</td>
		<td>
			<h2>Curte nobila (Nivelul <?php echo ((is_array($_tmp=$this->_tpl_vars['village'][$this->_tpl_vars['dbname']])) ? $this->_run_mod_handler('replace', true, $_tmp, 'stufe', 'nivel') : smarty_modifier_replace($_tmp, 'stufe', 'nivel')); ?>
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
				<th width="150">Instructie</th>
				<th width="120">Durat&#259;</th>
				<th width="150">Terminare</th>
				<th width="100">&#206;ntrerupere*</th>
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
">intrerupe</a></td>
			    </tr>
			<?php endforeach; endif; unset($_from); ?>

		</table>
		<div style="font-size: 7pt;">* (90% din materiile prime iti vor fi &#238;napoiate)</div>
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
				<th width="150">Unitate</th>
				<th colspan="4" width="120">Necesitate</th>
				<th width="130">Durat&#259; (hh:mm:ss)</th>
				<th>&#206;n sat / Total</th>
				<th>Recrutare</th>
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
					    <td class="inactive">Unitatea nu este &#238;nca cercetat&#259;</td>
					<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_needed): ?>
					    <td class="inactive">Cerin&#355;ele de construire nu sunt &#238;ndeplinite</td>
					<?php elseif ($this->_tpl_vars['cl_units']->last_error == build_ah): ?>
					    <td class="inactive">Trebuie sa fie &#238;nt&#259;rite.</td>
					<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_enough_ress): ?>
					    <td class="inactive">Nu sunt destule materii prime disponibile</td>
					<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_enough_bh): ?>
					    <td class="inactive">Ferma este prea mica</td>
					<?php else: ?>
						<td><a href="game.php?h=<?php echo $this->_tpl_vars['hkey']; ?>
&amp;action=train_snob&amp;screen=snob&amp;village=<?php echo $this->_tpl_vars['village']['id']; ?>
">Generare unitate</a></td>
					<?php endif; ?>
				</tr>
			<?php endforeach; endif; unset($_from); ?>


		</table>
		<br />
		<?php if ($this->_tpl_vars['ag_style'] == 0): ?>
			<h4>Num&#259;rul genera&#355;iilor de nobili care pot fi create &#238;n acest sat</h4>
			<table class="vis">
			<tr><td>Nivelul cur&#355;ii nobile:</td><td><?php echo $this->_tpl_vars['village']['snob']; ?>
</td></tr>
			<tr><td>- satele cucerite de acest sat</td><td><?php echo $this->_tpl_vars['village']['control_villages']; ?>
</td></tr>
			<tr><td>- nobilimea existenta si cea tocmai creat&#259; &#238;n acest sat:</td><td><?php echo $this->_tpl_vars['village']['recruited_snobs']; ?>
</td></tr>
			<tr><th>Mai pot fi create:</th><th><?php echo $this->_tpl_vars['village']['snob']-$this->_tpl_vars['village']['control_villages']-$this->_tpl_vars['village']['recruited_snobs']; ?>
</th></tr>
			</table>
		<?php elseif ($this->_tpl_vars['ag_style'] == 1): ?>
			<h4>Num&#259;rul genera&#355;iilorr de nobili care mai pot fi create</h4>
			<table class="vis">
			<tr><td>Limit&#259; - GN:</td><td><?php echo $this->_tpl_vars['village']['snob_info']['stage_snobs']; ?>
</td></tr>
			<tr><td>- GN existen&#355;i:</td><td><?php echo $this->_tpl_vars['village']['snob_info']['all_snobs']; ?>
</td></tr>
			<tr><td>- GN in producere:</td><td><?php echo $this->_tpl_vars['village']['snob_info']['ags_in_prod']; ?>
</td></tr>
			<tr><td>- Numarul satelor cucerite:</td><td><?php echo $this->_tpl_vars['village']['snob_info']['control_villages']; ?>
</td></tr>
			<tr><th>Mai pot fi create:</th><th><?php echo $this->_tpl_vars['village']['snob_info']['can_prod']; ?>
</th></tr>
			</table>
		<?php endif; ?>
<?php endif; ?>

<?php if (count ( $this->_tpl_vars['snobed_villages'] ) > 0): ?>
	<br /><br />
	<table class="vis" width="300">
		<tr>
			<th>Sate asuprite de aceasta curte nobila</th>
		</tr>
		<?php $_from = $this->_tpl_vars['snobed_villages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['villagename']):
?>
			<tr>
				<td>
					<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['villagename']; ?>
</a>
				</td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>
<?php endif; ?>