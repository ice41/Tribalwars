<?php /* Smarty version 2.6.14, created on 2016-12-22 21:35:46
         compiled from game_report_view_attack.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'game_report_view_attack.tpl', 32, false),array('modifier', 'entparse', 'game_report_view_attack.tpl', 68, false),array('modifier', 'format_number', 'game_report_view_attack.tpl', 175, false),)), $this); ?>
<?php if ($this->_tpl_vars['report']['wins'] == 'att'): ?>
<?php 
	$rid = $this->_tpl_vars['report_agreement']['to'];
	if ($rid <= "-1"){
		$this->_tpl_vars['report']['image'] = 'image_village_won';
 ?>
<h3 style="margin-bottom:5px;">O atacante venceu!</h3>
<?php 
	}elseif($rid >= "0"){
		$this->_tpl_vars['report']['image'] = 'image_attack_won';
 ?>
<h3 style="margin-bottom:5px;">O atacante venceu!</h3>
<?php 
	}
 ?>
<?php else: ?>
<h3 style="margin-bottom:5px;">O defensor venceu</h3>
<?php 
		$this->_tpl_vars['report']['image'] = 'image_attack_lost';
 ?>
<?php endif; ?>
<div class="report_image <?php echo $this->_tpl_vars['report']['image']; ?>
" style="margin-left:1px;">    	    	        
	<div class="report_transparent_overlay">
		<h4 style="color:#000000;">Sorte (do ponto de vista do atacante)</h4>
		<?php if ($this->_tpl_vars['report']['luck'] < 0): ?>
		<table id="attack_luck">
			<tr>
				<td class="nobg"><?php if ($this->_tpl_vars['report']['luck'] < 1): ?><img src="../graphic/icons/rabe.png" alt="Azar" /><?php else: ?><img src="../graphic/icons/rabe_grau.png" alt="Azar" /><?php endif; ?></td>
				<td class="nobg">
					<table class="luck" cellspacing="0" cellpadding="0">
						<tr>
							<td class="luck-item nobg" width="<?php echo smarty_function_math(array('equation' => "a-(b*(x * y))",'b' => -1,'a' => 50,'x' => $this->_tpl_vars['report']['luck'],'y' => 2), $this);?>
" height="12"></td>
							<td class="luck-item nobg" width="<?php echo smarty_function_math(array('equation' => "b*(x * y)",'b' => -1,'x' => $this->_tpl_vars['report']['luck'],'y' => 2), $this);?>
" style="background-image:url(../graphic/layout/balken_pech.png);"></td>
							<td class="luck-item nobg" width="0" style="background-image:url(../graphic/layout/balken_glueck.png);border-left:1px solid #000000"></td>
							<td class="luck-item nobg" width="50"></td>
						</tr>
					</table>
				</td>
				<td class="nobg"><?php if ($this->_tpl_vars['report']['luck'] >= 1): ?><img src="../graphic/icons/klee.png" alt="Sorte" /><?php else: ?><img src="../graphic/icons/klee_grau.png" alt="Sorte" /><?php endif; ?></td>
				<td class="nobg"><b style="color:#000000;"><?php echo $this->_tpl_vars['report']['luck']; ?>
%</b></td>
			</tr>
		</table>
		<?php else: ?>
		<table id="attack_luck">
			<tr>
				<td class="nobg"><?php if ($this->_tpl_vars['report']['luck'] < 1): ?><img src="../graphic/icons/rabe.png" alt="Azar" /><?php else: ?><img src="../graphic/icons/rabe_grau.png" alt="Azar" /><?php endif; ?></td>
				<td class="nobg">
					<table class="luck" cellspacing="0" cellpadding="0">
						<tr>
							<td class="luck-item nobg" width="50" height="12"></td>
							<td class="luck-item nobg" width="0" style="background-image:url('../graphic/layout/balken_pech.png');border-right:1px solid #000000"></td>
							<td class="luck-item nobg" width="<?php echo smarty_function_math(array('equation' => "x * y",'x' => $this->_tpl_vars['report']['luck'],'y' => 2), $this);?>
" style="background-image:url('../graphic/layout/balken_glueck.png');"></td>
							<td class="luck-item nobg" width="<?php echo smarty_function_math(array('equation' => "a-(x * y)",'a' => 50,'x' => $this->_tpl_vars['report']['luck'],'y' => 2), $this);?>
"></td>
						</tr>
					</table>
				</td>
				<td class="nobg"><?php if ($this->_tpl_vars['report']['luck'] >= 1): ?><img src="../graphic/icons/klee.png" alt="Sorte" /><?php else: ?><img src="../graphic/icons/klee_grau.png" alt="Sorte" /><?php endif; ?></td>
				<td class="nobg"><b style="color:#000000;"><?php echo $this->_tpl_vars['report']['luck']; ?>
%</b></td>
			</tr>
		</table>
		<?php endif; ?>
	<?php if ($this->_tpl_vars['moral_activ'] == 'true'): ?>
		<h4 style="color:#000000;">Moral: <?php echo $this->_tpl_vars['report']['moral']; ?>
%</h4>
	<?php endif; ?>
	</div>
</div>
<table width="428" style="border-spacing:1px;background-color:#FEE47D;" align="center">
	<tr><th style="width:20%">Atacante:</th><th><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['report']['from_user']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['report']['from_username'])) ? $this->_run_mod_handler('entparse', true, $_tmp) : entparse($_tmp)); ?>
</a></th></tr>
	<tr><td>Origem:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['report']['from_village']; ?>
"><?php echo $this->_tpl_vars['report']['from_villagename']; ?>
 (<?php echo $this->_tpl_vars['report']['from_x']; ?>
|<?php echo $this->_tpl_vars['report']['from_y']; ?>
) K</a></td></tr>
	<tr>
		<td colspan="2">
			<table class="vis" style="border-spacing:1px;background-color:#FEE47D;" align="center">
				<tr class="center">
					<td></td>
					<?php $_from = $this->_tpl_vars['cl_units']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
					<td width="35"><img src="../graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" alt="" /></td>
					<?php endforeach; endif; unset($_from); ?>
				</tr>
				<tr class="center"><td>Tropas:</td><?php $_from = $this->_tpl_vars['report_units']['units_a']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num_units']):
 if ($this->_tpl_vars['num_units'] > 0): ?><td><?php echo $this->_tpl_vars['num_units']; ?>
</td><?php else: ?><td class="hidden">0</td><?php endif;  endforeach; endif; unset($_from); ?></tr>
				<tr class="center"><td>Perdas:</td><?php $_from = $this->_tpl_vars['report_units']['units_b']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num_units']):
 if ($this->_tpl_vars['num_units'] > 0): ?><td><?php echo $this->_tpl_vars['num_units']; ?>
</td><?php else: ?><td class="hidden">0</td><?php endif;  endforeach; endif; unset($_from); ?></tr>
			</table>
		</td>
	</tr>
</table><br />
<table width="428" style="border-spacing:1px;background-color:#FEE47D;" align="center">
	<tr><th style="width:20%">Defensor:</th><th><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['report']['to_user']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['report']['to_username'])) ? $this->_run_mod_handler('entparse', true, $_tmp) : entparse($_tmp)); ?>
</a></th></tr>
	<tr><td>Destino:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['report']['to_village']; ?>
"><?php echo $this->_tpl_vars['report']['to_villagename']; ?>
 (<?php echo $this->_tpl_vars['report']['to_x']; ?>
|<?php echo $this->_tpl_vars['report']['to_y']; ?>
) K</a></td></tr>
	<tr>
		<td colspan="2">
		<?php if ($this->_tpl_vars['see_def_units']): ?>
			<table class="vis" style="border-spacing:1px;background-color:#FEE47D;" align="center">
				<tr class="center">
					<td></td>
					<?php $_from = $this->_tpl_vars['cl_units']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
					<td width="35"><img src="../graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" alt="" /></td>
					<?php endforeach; endif; unset($_from); ?>
				</tr>
				<tr class="center"><td>Tropas:</td><?php $_from = $this->_tpl_vars['report_units']['units_c']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num_units']):
 if ($this->_tpl_vars['num_units'] > 0): ?><td><?php echo $this->_tpl_vars['num_units']; ?>
</td><?php else: ?><td class="hidden">0</td><?php endif;  endforeach; endif; unset($_from); ?></tr>
				<tr class="center"><td>Perdas:</td><?php $_from = $this->_tpl_vars['report_units']['units_d']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num_units']):
 if ($this->_tpl_vars['num_units'] > 0): ?><td><?php echo $this->_tpl_vars['num_units']; ?>
</td><?php else: ?><td class="hidden">0</td><?php endif;  endforeach; endif; unset($_from); ?></tr>
			</table>
		<?php else: ?>
			<p>Nenhuma unidade voltou com informa&ccedil;&otilde;es das tropas inimigas.</p>
		<?php endif; ?>
		</td>
	</tr>
</table><br />
<?php 
	$info = mysql_fetch_array(mysql_query("SELECT `s_buildings`,`s_res` FROM `reports` WHERE id = '".parse($_GET['view'])."'"));
	if($info['s_res']){
		$q_res = explode(';',$info['s_res']);
		$n_res = array(
			0 => '<img src="../graphic/icons/wood.png" title="Madeira" />',
			1 => '<img src="../graphic/icons/stone.png" title="Argila" />',
			2 => '<img src="../graphic/icons/iron.png" title="Ferro" />'
		);
		echo '<table width="428" style="border-spacing:1px;background-color:#FEE47D;" align="center">
			<tr>
				<th width="150">Recursos descobertos:</th>
				<td>';
		for($i = 0; $i < count($n_res); $i++){
			if($q_res[$i] > 0){
				echo $n_res[$i].''.format_number($q_res[$i]).' ';
			}
		}
		echo '</td></tr>';
	}
	if($info['s_buildings']){
		$level = explode(';',$info['s_buildings']);
		$_builds = array(
			0 => 'Edif&iacute;cio Principal',
			1 => 'Quartel',
			2 => 'Estabulo',
			3 => 'Oficina',
			4 => 'Academia',
			5 => 'Ferreiro',
			6 => 'Pra&ccedil;a de Reuni&atilde;o',
			7 => 'Mercado',
			8 => 'Bosque',
			9 => 'Po&ccedil;o de Argila',
			10 => 'Mina de Ferro',
			11 => 'Fazenda',
			12 => 'Armaz&eacute;m',
			13 => 'Esconderijo',
			14 => 'Muralha'
		);
		echo '<tr>
				<th>Edif&iacute;cios:</th>
				<td>';
		for($i = 0; $i < count($_builds); $i++)
			if($level[$i] > 0)
				echo $_builds[$i].' <b>('.nivel($level[$i]).')</b><br />';
			echo '</td></tr></table><br/>';
	}
 ?>
<?php if (count ( $this->_tpl_vars['report_units']['units_e'] ) > 1): ?>
<h4>Tropas em movimento</h4>
<table width="428" class="vis" style="border-spacing:1px;background-color:#FEE47D;" align="center">
	<tr>
		<?php $_from = $this->_tpl_vars['cl_units']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
		<th width="35"><img src="../graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" alt="" /></th>
		<?php endforeach; endif; unset($_from); ?>
	</tr>
	<tr><?php $_from = $this->_tpl_vars['report_units']['units_e']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num_units']):
 if ($this->_tpl_vars['num_units'] > 0): ?><td><?php echo $this->_tpl_vars['num_units']; ?>
</td><?php else: ?><td class="hidden">0</td><?php endif;  endforeach; endif; unset($_from); ?></tr>
</table><br />
<?php endif; ?>
<table width="428" style="border-spacing:1px;background-color:#FEE47D;" align="center">
	<?php if ($this->_tpl_vars['report_ress']['wood'] > 0 || $this->_tpl_vars['report_ress']['stone'] > 0 || $this->_tpl_vars['report_ress']['iron'] > 0): ?>
	<tr>
		<th>Saque:</th>
		<td width="220" align="center">
			<?php if ($this->_tpl_vars['report_ress']['wood'] > 0): ?><img src="../graphic/icons/wood.png" title="Madeira" /> <?php echo $this->_tpl_vars['report_ress']['wood']; ?>
 <?php endif; ?>
			<?php if ($this->_tpl_vars['report_ress']['stone'] > 0): ?><img src="../graphic/icons/stone.png" title="Argila" /> <?php echo $this->_tpl_vars['report_ress']['stone']; ?>
 <?php endif; ?>
			<?php if ($this->_tpl_vars['report_ress']['iron'] > 0): ?><img src="../graphic/icons/iron.png" title="Ferro" /> <?php echo $this->_tpl_vars['report_ress']['iron']; ?>
 <?php endif; ?>
		</td>
		<td align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['report_ress']['sum'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['report_ress']['max'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>
	</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['report_ram']['from'] != $this->_tpl_vars['report_ram']['to']): ?>
	<tr>
		<th>Dano das arietes:</th>
		<td colspan="2">Muralha demolida do n&iacute;vel <b><?php echo $this->_tpl_vars['report_ram']['from']; ?>
</b> para o n&iacute;vel <b><?php echo $this->_tpl_vars['report_ram']['to']; ?>
</b></td>
	</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['report_agreement']['from'] != $this->_tpl_vars['report_agreement']['to']): ?>
	<tr>
		<th>Lealdade</th>
		<td colspan="2">Descida de lealdade de <b><?php echo $this->_tpl_vars['report_agreement']['from']; ?>
</b> para <b><?php echo $this->_tpl_vars['report_agreement']['to']; ?>
</b></td>
	</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['report_catapult']['from'] != $this->_tpl_vars['report_catapult']['to']): ?>
	<tr>
		<th>Dano das catapultas:</th>
		<td colspan="2"><?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['report_catapult']['building']); ?>
 demolido do n&iacute;vel <b><?php echo $this->_tpl_vars['report_catapult']['from']; ?>
</b> para o n&iacute;vel <b><?php echo $this->_tpl_vars['report_catapult']['to']; ?>
</b></td>
	</tr>
	<?php endif; ?>
</table>