<?php /* Smarty version 2.6.14, created on 2016-12-22 21:34:33
         compiled from game_snob.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nivel', 'game_snob.tpl', 20, false),array('modifier', 'format_time', 'game_snob.tpl', 41, false),array('modifier', 'format_date', 'game_snob.tpl', 45, false),array('modifier', 'replace', 'game_snob.tpl', 45, false),array('modifier', 'format_number', 'game_snob.tpl', 152, false),)), $this); ?>
<br />
	<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><th>Centros de recrutamento</th></tr>
		<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=barracks">Quartel</a></td></tr>
		<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=stable">Estab&uacute;lo</a></td></tr>
		<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=garage">Oficina</a></td></tr>
		<tr><td class="selected"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=snob">&raquo; Academia</a></td></tr>
	</table><br />
	<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><th>Academia</th></tr>
		<tr><td <?php if (empty ( $this->_tpl_vars['mode'] )): ?>class="selected"<?php endif; ?>><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=snob"><?php if (empty ( $this->_tpl_vars['mode'] )): ?>&raquo; <?php endif; ?>Formar nobres</a></td></tr>
		<tr><td <?php if ($this->_tpl_vars['mode'] == 'coins'): ?>class="selected"<?php endif; ?>><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=snob&mode=coins"><?php if ($this->_tpl_vars['mode'] == 'coins'): ?>&raquo; <?php endif; ?>Cunhar moedas</a></td></tr>
	</table>
</td>
<td width="80%">
	<table>
		<tr>
			<td><img src="../graphic/build/<?php echo $this->_tpl_vars['dbname']; ?>
.jpg" title="Academia" alt="" /></td>
			<td>
				<h2><?php echo $this->_tpl_vars['buildname']; ?>
 (<?php echo ((is_array($_tmp=$this->_tpl_vars['village'][$this->_tpl_vars['dbname']])) ? $this->_run_mod_handler('nivel', true, $_tmp) : nivel($_tmp)); ?>
)</h2>
				<?php echo $this->_tpl_vars['description']; ?>

			</td>
		</tr>
	</table>
<?php if ($this->_tpl_vars['mode'] == 'coins'): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_snob_coins.tpl", 'smarty_include_vars' => array('title' => 'foo')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
<?php if ($this->_tpl_vars['show_build']): ?>
	<?php if (count ( $this->_tpl_vars['recruit_units'] ) > 0): ?>
	<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr>
			<th width="250">Unidade</th>
			<th width="220">Dura&ccedil;&atilde;o</th>
			<th>T&eacute;rmino</th>
			<th width="100">Cancelar *</th>
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
			<td align="center"><a href="game.php?t=129107&amp;village=<?php echo $this->_tpl_vars['village']['id']; ?>
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
	<div class="error"><?php echo ((is_array($_tmp=$this->_tpl_vars['error'])) ? $this->_run_mod_handler('replace', true, $_tmp, "Adelshof muss ausgebaut werden.", "N&atilde;o &eacute; possivel formar outros nobres!") : smarty_modifier_replace($_tmp, "Adelshof muss ausgebaut werden.", "N&atilde;o &eacute; possivel formar outros nobres!")); ?>
</div><br />
	<?php endif; ?>
	<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr>
			<th>Unidade</th>
			<th><center><img src="../graphic/icons/wood.png"></center></th>
			<th><center><img src="../graphic/icons/stone.png"></center></th>
			<th><center><img src="../graphic/icons/iron.png"></center></th>
			<th><center><img src="../graphic/icons/farm.png"></center></th>
			<th>Dura&ccedil;&atilde;o</th>
			<th width="150">Na Aldeia/Total</th>
			<th width="300">Formar</th>
		</tr>
		<?php $_from = $this->_tpl_vars['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['unit_dbname'] => $this->_tpl_vars['name']):
?>
		<tr>
			<td width="250"><a href="javascript:popup('popup_unit.php?unit=<?php echo $this->_tpl_vars['unit_dbname']; ?>
', 520, 520)"> <img src="../graphic/unit/<?php echo $this->_tpl_vars['unit_dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" alt="" /> <?php echo $this->_tpl_vars['name']; ?>
</a></td>
			<td align="center"><?php echo $this->_tpl_vars['cl_units']->get_woodprice($this->_tpl_vars['unit_dbname']); ?>
</td>
			<td align="center"><?php echo $this->_tpl_vars['cl_units']->get_stoneprice($this->_tpl_vars['unit_dbname']); ?>
</td>
			<td align="center"><?php echo $this->_tpl_vars['cl_units']->get_ironprice($this->_tpl_vars['unit_dbname']); ?>
</td>
			<td align="center"><?php echo $this->_tpl_vars['cl_units']->get_bhprice($this->_tpl_vars['unit_dbname']); ?>
</td>
			<td align="center" width="150"><?php echo ((is_array($_tmp=$this->_tpl_vars['cl_units']->get_time($this->_tpl_vars['village'][$this->_tpl_vars['dbname']],$this->_tpl_vars['unit_dbname'])+1)) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
			<td align="center"><?php echo $this->_tpl_vars['units_in_village'][$this->_tpl_vars['unit_dbname']]; ?>
/<?php echo $this->_tpl_vars['units_all'][$this->_tpl_vars['unit_dbname']]; ?>
</td>
			<?php echo $this->_tpl_vars['cl_units']->check_needed($this->_tpl_vars['unit_dbname'],$this->_tpl_vars['village']); ?>

			<?php if ($this->_tpl_vars['cl_units']->last_error == not_tec): ?>
		    <td class="inactive" align="center">Unidade n&atilde;o pesquisada.</td>
			<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_needed): ?>
		    <td class="inactive" align="center">Requerimentos n&atilde;o atingidos.</td>
			<?php elseif ($this->_tpl_vars['cl_units']->last_error == build_ah): ?>
		    <td class="inactive" align="center">Academia n&atilde;o pode prover mais unidades.</td>
			<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_enough_ress): ?>
		    <td class="inactive" align="center">N&atilde;o h&aacute; recursos suficientes.</td>
			<?php elseif ($this->_tpl_vars['cl_units']->last_error == not_enough_bh): ?>
		    <td class="inactive" align="center">A fazenda n&atilde;o pode mais prover mais unidades.</td>
			<?php else: ?>
				<?php if ($this->_tpl_vars['ag_style'] == 2): ?>
					<?php if ($this->_tpl_vars['nextsnob']-$this->_tpl_vars['all_snob']-$this->_tpl_vars['snob_recruit'] < '1'): ?> 
			<td class="inactive" align="center">Moedas insuficientes!</td>
					<?php else: ?>
			<td align="center" width="250"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=snob&recruit=snob&h=<?php echo $this->_tpl_vars['hkey']; ?>
">Treinar unidade</a></td>
					<?php endif; ?>
				<?php else: ?>
			<td align="center" width="250"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=snob&amp;action=train_snob&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Treinar unidade</a></td>
				<?php endif; ?>
			<?php endif; ?>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
	</table><br />
	<?php if ($this->_tpl_vars['ag_style'] == 0): ?>
	<h4>Quantidade de Nobres que ainda podem ser formados nesta aldeia</h4>
	<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><td>N&iacute;vel da Academia:</td><td><?php echo $this->_tpl_vars['village']['snob']; ?>
</td></tr>
		<tr><td>- N&uacute;mero de aldeias conquistadas:</td><td><?php echo $this->_tpl_vars['village']['control_villages']; ?>
</td></tr>
		<tr><td>- Nobres existentes nesta aldeia:</td><td><?php echo $this->_tpl_vars['village']['recruited_snobs']; ?>
</td></tr>
		<tr><th>Ainda podem ser produzidos:</th><th><?php echo $this->_tpl_vars['village']['snob']-$this->_tpl_vars['village']['control_villages']-$this->_tpl_vars['village']['recruited_snobs']; ?>
</th></tr>
	</table>
	<?php elseif ($this->_tpl_vars['ag_style'] == 1): ?>
	<h4>Quantidade de Nobres que ainda podem ser formados</h4>
	<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><td>Limite de Nobres:</td><td><?php echo $this->_tpl_vars['village']['snob_info']['stage_snobs']; ?>
</td></tr>
		<tr><td>- Nobres existentes:</td><td><?php echo $this->_tpl_vars['village']['snob_info']['all_snobs']; ?>
</td></tr>
		<tr><td>- Nobres em produ&ccedil;&atilde;o:</td><td><?php echo $this->_tpl_vars['village']['snob_info']['ags_in_prod']; ?>
</td></tr>
		<tr><td>- N&uacute;mero de aldeias conquistadas:</td><td><?php echo $this->_tpl_vars['village']['snob_info']['control_villages']; ?>
</td></tr>
		<tr><th>Ainda podem ser produzidos:</th><th><?php echo $this->_tpl_vars['village']['snob_info']['can_prod']; ?>
</th></tr>
	</table>
	<?php elseif ($this->_tpl_vars['ag_style'] == 2): ?>
	<table align="center" width="100%">
		<tr>
			<td width="45%" align="center">
				<h4 align="left">Nobres que ainda podem ser formados</h4>
				<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
					<tr><td>Limite de Nobres:</td><td><?php echo $this->_tpl_vars['nextsnob']; ?>
</td></tr>
					<tr><td>- Nobres existentes:</td><td><?php echo $this->_tpl_vars['all_snob']; ?>
</td></tr>
					<tr><td>- Nobres em produ&ccedil;&atilde;o:</td><td><?php echo $this->_tpl_vars['snob_recruit']; ?>
</td></tr>
					<tr><td width="230">- N&uacute;mero de aldeias conquistadas:</td><td><?php echo $this->_tpl_vars['village_control']; ?>
</td></tr>
					<tr><th>Ainda podem ser produzidos:</th><th><?php echo $this->_tpl_vars['nextsnob']-$this->_tpl_vars['all_snob']-$this->_tpl_vars['snob_recruit']; ?>
</th></tr>
				</table>
			</td>
			<td width="55%" align="center">
				<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
					<tr><th colspan="2" width="350">Moedas de ouro</th></tr>
				    <tr><td><img src="../graphic/icons/gold.png" />Moedas de outro:</td><td><?php echo $this->_tpl_vars['allcoins']; ?>
</td></tr>

				    <tr><th colspan="2">Nobres</th></tr>
			    	<tr><td>Limite atual de nobres:</td><td><?php echo $this->_tpl_vars['nextsnob']; ?>
</td></tr>
				    <tr><td>Falta ainda para o limite de <?php echo $this->_tpl_vars['nextsnob']+1; ?>
 nobres:</td><td class="nowrap"><?php echo $this->_tpl_vars['nextsnob']-$this->_tpl_vars['coins_n']; ?>
 moedas de ouro</td></tr>
			    	<tr><td>J&aacute; guardadas para o limite de <?php echo $this->_tpl_vars['nextsnob']+1; ?>
 nobres:</td><td class="nowrap"><?php echo $this->_tpl_vars['coins_n']; ?>
 moedas de ouro</td></tr>
				</table>
			</td>
		</tr>
	</table>
	<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr>
			<th width="40"><center><img src="../graphic/icons/wood.png" /></center></th>
			<th width="40"><center><img src="../graphic/icons/stone.png" /></center></th>
			<th width="40"><center><img src="../graphic/icons/iron.png" /></center></th>
			<th>Cunhar</th>
		</tr>
		<tr>
			<td align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['coins_wood'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>
			<td align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['coins_stone'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>
			<td align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['coins_iron'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>
			<td>
				<?php if ($this->_tpl_vars['village']['r_wood'] < $this->_tpl_vars['coins_wood'] || $this->_tpl_vars['village']['r_stone'] < $this->_tpl_vars['coins_stone'] || $this->_tpl_vars['village']['r_iron'] < $this->_tpl_vars['coins_iron']): ?>
				<span class="inactive">Recursos insuficientes.</span>
				<?php else: ?>
				<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=snob&create=coins">&raquo; Cunhar moeda de ouro</a>
				<?php endif; ?>
			</td>
		</tr>
	</table>
<?php endif; ?>
<?php endif; ?>
<?php if (count ( $this->_tpl_vars['snobed_villages'] ) > 0): ?>
	<br />
	<table class="vis" width="300">
		<tr><th>Von diesem Dorf beherschte Dörfer</th></tr>
	<?php $_from = $this->_tpl_vars['snobed_villages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['villagename']):
?>
		<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['villagename']; ?>
</a></td></tr>
	<?php endforeach; endif; unset($_from); ?>
	</table>
<?php endif; ?>
</td>
<?php endif; ?>