<?php /* Smarty version 2.6.14, created on 2016-12-22 21:33:47
         compiled from game_recruit_template.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nivel', 'game_recruit_template.tpl', 15, false),array('modifier', 'format_time', 'game_recruit_template.tpl', 33, false),array('modifier', 'format_date', 'game_recruit_template.tpl', 37, false),array('modifier', 'replace', 'game_recruit_template.tpl', 37, false),)), $this); ?>
<br />
	<table class="vis" id="menu" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><th>Centros de recrutamento</th></tr>
		<tr><td <?php if ($this->_tpl_vars['screen'] == 'barracks'): ?>class="selected"<?php endif; ?>><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=barracks"><?php if ($this->_tpl_vars['screen'] == 'barracks'): ?>&raquo; <?php endif; ?>Quartel</a></td></tr>
		<tr><td <?php if ($this->_tpl_vars['screen'] == 'stable'): ?>class="selected"<?php endif; ?>><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=stable"><?php if ($this->_tpl_vars['screen'] == 'stable'): ?>&raquo; <?php endif; ?>Estab&uacute;lo</a></td></tr>
		<tr><td <?php if ($this->_tpl_vars['screen'] == 'garage'): ?>class="selected"<?php endif; ?>><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=garage"><?php if ($this->_tpl_vars['screen'] == 'garage'): ?>&raquo; <?php endif; ?>Oficina</a></td></tr>
		<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=snob">Academia</a></td></tr>
	</table>
</td>
<td width="80%">
	<table>
		<tr>
			<td><img src="../graphic/build/<?php echo $this->_tpl_vars['dbname']; ?>
.jpg" title="<?php echo $this->_tpl_vars['buildname']; ?>
" alt="" /></td>
			<td>
				<h2><?php echo $this->_tpl_vars['buildname']; ?>
 (<?php echo ((is_array($_tmp=$this->_tpl_vars['village'][$this->_tpl_vars['dbname']])) ? $this->_run_mod_handler('nivel', true, $_tmp) : nivel($_tmp)); ?>
)</h2>
				<?php echo $this->_tpl_vars['description']; ?>

			</td>
		</tr>
	</table>
<?php if ($this->_tpl_vars['show_build']): ?>
	<?php if (count ( $this->_tpl_vars['recruit_units'] ) > 0): ?>
    <table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr>
			<th width="150">Unidade</th>
			<th width="120">Dura&ccedil;&atilde;o</th>
			<th width="150">Conclus&atilde;o</th>
			<th width="100">Cancelamento *</th>
		</tr>
		<?php $_from = $this->_tpl_vars['recruit_units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
	    <tr <?php if ($this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['lit']): ?>class="lit"<?php endif; ?>>
			<td><?php echo $this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['num_unit']; ?>
 <?php echo $this->_tpl_vars['cl_units']->get_name($this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['unit']); ?>
</td>
			<?php if ($this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['lit'] && $this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['countdown'] > -1): ?>
			<td align="center"><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['countdown']+1)) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td>
			<?php else: ?>
			<td align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['countdown']+1)) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
			<?php endif; ?>
			<td align="center"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['recruit_units'][$this->_tpl_vars['key']]['time_finished'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, 'heute um', "hoje &agrave;s") : smarty_modifier_replace($_tmp, 'heute um', "hoje &agrave;s")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Uhr', "") : smarty_modifier_replace($_tmp, 'Uhr', "")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'am', 'em') : smarty_modifier_replace($_tmp, 'am', 'em')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'um', "&agrave;s") : smarty_modifier_replace($_tmp, 'um', "&agrave;s")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'morgen', "amanh&atilde;") : smarty_modifier_replace($_tmp, 'morgen', "amanh&atilde;")); ?>
</td>
			<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=<?php echo $this->_tpl_vars['dbname']; ?>
&amp;action=cancel&amp;id=<?php echo $this->_tpl_vars['key']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">cancelar</a></td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>
	<div style="font-size: 7pt;">* (Apenas 90% dos recursos ser&atilde;o devolvidos!)</div><br />
	<?php endif; ?>
	<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<div class="error"><?php echo $this->_tpl_vars['error']; ?>
</div>
	<?php endif; ?>
	<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=<?php echo $this->_tpl_vars['dbname']; ?>
&amp;action=train&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post" onsubmit="this.submit.disabled=true;">
		<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
			<tr>
				<th width="140">Unidade</th>
				<th><img src="../graphic/icons/wood.png" /></th>
				<th><img src="../graphic/icons/stone.png" /></th>
				<th><img src="../graphic/icons/iron.png" /></th>
				<th><img src="../graphic/icons/farm.png" /></th>
				<th width="70">Dura&ccedil;&atilde;o</th>
				<th>Na aldeia/Total</th>
				<th>Recrutar</th>
			</tr>
	<?php $_from = $this->_tpl_vars['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['unit_dbname'] => $this->_tpl_vars['name']):
?>
			<tr>
				<td><a href="javascript:popup('popup_unit.php?unit=<?php echo $this->_tpl_vars['unit_dbname']; ?>
', 520, 520)"> <img src="../graphic/unit/<?php echo $this->_tpl_vars['unit_dbname']; ?>
.png" alt="" /> <?php echo $this->_tpl_vars['name']; ?>
</a></td>
				<td align="center"><?php echo $this->_tpl_vars['cl_units']->get_woodprice($this->_tpl_vars['unit_dbname']); ?>
</td>
				<td align="center"><?php echo $this->_tpl_vars['cl_units']->get_stoneprice($this->_tpl_vars['unit_dbname']); ?>
</td>
				<td align="center"><?php echo $this->_tpl_vars['cl_units']->get_ironprice($this->_tpl_vars['unit_dbname']); ?>
</td>
				<td align="center"><?php echo $this->_tpl_vars['cl_units']->get_bhprice($this->_tpl_vars['unit_dbname']); ?>
</td>
				<td align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_units']->get_time($this->_tpl_vars['village'][$this->_tpl_vars['dbname']],$this->_tpl_vars['unit_dbname']))) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
				<td align="center"><?php echo $this->_tpl_vars['units_in_village'][$this->_tpl_vars['unit_dbname']]; ?>
/<?php echo $this->_tpl_vars['units_all'][$this->_tpl_vars['unit_dbname']]; ?>
</td>
		<?php echo $this->_tpl_vars['cl_units']->check_needed($this->_tpl_vars['unit_dbname'],$this->_tpl_vars['village']); ?>

		<?php if ($this->_tpl_vars['cl_units']->last_error == not_tec): ?>
			    <td class="inactive" align="center">Unidade n&atilde;o pesquisada</td>
		<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_needed): ?>
			    <td class="inactive" align="center">Requerimentos necess&aacute;rios n&atilde;o atingidos</td>
		<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_enough_ress): ?>
			    <td class="inactive" align="center">Recursos insuficientes</td>
		<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_enough_bh): ?>
			    <td class="inactive" align="center">A fazenda n&atilde;o pode prover mais unidades</td>
		<?php else: ?>
				<td><input name="<?php echo $this->_tpl_vars['unit_dbname']; ?>
" type="text" size="5" maxlength="5" /> <a href="javascript:insertUnit(document.forms[0].<?php echo $this->_tpl_vars['unit_dbname']; ?>
, <?php echo $this->_tpl_vars['cl_units']->last_error; ?>
)">(max. <?php echo $this->_tpl_vars['cl_units']->last_error; ?>
)</a></td>
		<?php endif; ?>
			</tr>
	<?php endforeach; endif; unset($_from); ?>
		    <tr><th colspan="8"><span style="float:right;"><input name="submit" type="submit" class="button" value="Recrutar" style="font-size: 10pt;" /></span></th></tr>
		</table>
	</form>
<?php endif; ?>
</td>