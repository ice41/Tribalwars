<?php /* Smarty version 2.6.14, created on 2016-12-22 21:35:42
         compiled from game_info_command.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'game_info_command.tpl', 2, false),)), $this); ?>
<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
<div class="error"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['error'])) ? $this->_run_mod_handler('replace', true, $_tmp, "Befehl existiert nicht mehr!", "Comando inexistente!") : smarty_modifier_replace($_tmp, "Befehl existiert nicht mehr!", "Comando inexistente!")))) ? $this->_run_mod_handler('replace', true, $_tmp, "Type nicht übergeben!", "Comando inexistente!") : smarty_modifier_replace($_tmp, "Type nicht übergeben!", "Comando inexistente!")); ?>
</div>
<?php else: ?>
<h2><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mov']['message'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'Angriff auf', "Ataque &agrave;") : smarty_modifier_replace($_tmp, 'Angriff auf', "Ataque &agrave;")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Rückkehr von', 'Retorno de') : smarty_modifier_replace($_tmp, 'Rückkehr von', 'Retorno de')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'für', "&agrave;") : smarty_modifier_replace($_tmp, 'für', "&agrave;")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Unterstützung', 'Apoio') : smarty_modifier_replace($_tmp, 'Unterstützung', 'Apoio')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Angriff', 'Ataque') : smarty_modifier_replace($_tmp, 'Angriff', 'Ataque')); ?>
</h2>
	<?php if ($this->_tpl_vars['type'] == 'own'): ?>
<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-left:5px;">
	<tr><th colspan="2">Comando</th></tr>
<?php 
	$vill = $this->_tpl_vars['mov']['to_village'];
	$sql = mysql_fetch_array(mysql_query("SELECT * FROM `villages` WHERE `id`= '".$vill."'"));
 ?>
	<tr><td>Aldeia:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['mov']['to_village']; ?>
"><?php echo $this->_tpl_vars['mov']['to_villagename']; ?>
 (<?php echo $this->_tpl_vars['mov']['to_x']; ?>
|<?php echo $this->_tpl_vars['mov']['to_y']; ?>
) K<?php echo $sql['continent']; ?></a></td></tr>
	<tr><td>Jogador:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['mov']['to_userid']; ?>
"><?php if (empty ( $this->_tpl_vars['mov']['to_username'] )): ?>---<?php else:  echo $this->_tpl_vars['mov']['to_username'];  endif; ?></a></td></tr>
	<tr><td>Dura&ccedil;&atilde;o:</td><td><?php echo $this->_tpl_vars['mov']['duration']; ?>
</td></tr>
	<tr><td>Chegada:</td><td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mov']['arrival'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'heute um', "hoje &agrave;s") : smarty_modifier_replace($_tmp, 'heute um', "hoje &agrave;s")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Uhr', "") : smarty_modifier_replace($_tmp, 'Uhr', "")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'am', 'em') : smarty_modifier_replace($_tmp, 'am', 'em')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'um', "&agrave;s") : smarty_modifier_replace($_tmp, 'um', "&agrave;s")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'morgen', "amanh&atilde;") : smarty_modifier_replace($_tmp, 'morgen', "amanh&atilde;")); ?>
</td></tr>
	<tr><td>Chegada em:</td><td><span class="timer"><?php echo $this->_tpl_vars['mov']['arrival_in']; ?>
</span></td></tr>
<?php 
	$vill2 = $this->_tpl_vars['mov']['from_village'];
	$sql2 = mysql_fetch_array(mysql_query("SELECT * FROM `villages` WHERE `id`= '".$vill2."'"));
 ?>
	<tr><td>Origem:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['mov']['from_village']; ?>
"><?php echo $this->_tpl_vars['mov']['from_villagename']; ?>
 (<?php echo $this->_tpl_vars['mov']['from_x']; ?>
|<?php echo $this->_tpl_vars['mov']['from_y']; ?>
) K<?php echo $sql2['continent']; ?></a></td></tr>
	<tr><td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;&amp;screen=map&x=<?php echo $this->_tpl_vars['mov']['to_x']; ?>
&y=<?php echo $this->_tpl_vars['mov']['to_y']; ?>
">&raquo; Centralizar no mapa</a></td></tr>
	<tr><td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;&amp;screen=place">&raquo; Pra&ccedil;a de reuni&atilde;o</a></td></tr>
		<?php if ($this->_tpl_vars['mov']['cancel']): ?>
	<tr><td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=place&action=cancel&id=<?php echo $this->_tpl_vars['mov']['id']; ?>
&h=<?php echo $this->_tpl_vars['hkey']; ?>
">&raquo; Cancelar comando</a></td></tr>
		<?php endif; ?>	
</table><br />
<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-left:5px;">
	<tr>
		<?php $_from = $this->_tpl_vars['cl_units']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
		<th width="50"><img src="../graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" alt="" /></th>
		<?php endforeach; endif; unset($_from); ?>
	</tr>
	<tr>
		<?php $_from = $this->_tpl_vars['mov']['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num_units']):
 if ($this->_tpl_vars['num_units'] > 0): ?><td><?php echo $this->_tpl_vars['num_units']; ?>
</td><?php else: ?><td class="hidden">0</td><?php endif;  endforeach; endif; unset($_from); ?>
	</tr>
</table>
		<?php if ($this->_tpl_vars['mov']['wood'] != 0 || $this->_tpl_vars['mov']['stone'] != 0 || $this->_tpl_vars['mov']['iron'] != 0): ?>
<table class="vis"><tr>
	<td>Saque:</td><td><?php if ($this->_tpl_vars['mov']['wood'] > 0): ?><img src="../graphic/icons/wood.png" title="Madeira" alt="" /><?php echo $this->_tpl_vars['mov']['wood']; ?>
 <?php endif;  if ($this->_tpl_vars['mov']['stone'] > 0): ?><img src="../graphic/icons/stone.png" title="Argila" alt="" /><?php echo $this->_tpl_vars['mov']['stone']; ?>
 <?php endif;  if ($this->_tpl_vars['mov']['iron'] > 0): ?><img src="../graphic/icons/iron.png" title="Ferro" alt="" /><?php echo $this->_tpl_vars['mov']['iron']; ?>
 <?php endif; ?></td>
</tr></table>
		<?php endif; ?>
	<?php else: ?>
<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-left:5px;">
	<tr><th colspan="2">Comando</th></tr>
<?php 
	$vill = $this->_tpl_vars['mov']['from_village'];
	$sql = mysql_fetch_array(mysql_query("SELECT * FROM `villages` WHERE `id`= '".$vill."'"));
 ?>
	<tr><td>Origem:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['mov']['from_village']; ?>
"><?php echo $this->_tpl_vars['mov']['from_villagename']; ?>
 (<?php echo $this->_tpl_vars['mov']['from_x']; ?>
|<?php echo $this->_tpl_vars['mov']['from_y']; ?>
) K<?php echo $sql['continent']; ?></a></td></tr>
	<tr><td>Jogador:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['mov']['from_userid']; ?>
"><?php echo $this->_tpl_vars['mov']['from_username']; ?>
</a></td></tr>
	<tr><td>Chegada:</td><td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mov']['arrival'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'heute um', "hoje &agrave;s") : smarty_modifier_replace($_tmp, 'heute um', "hoje &agrave;s")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Uhr', "") : smarty_modifier_replace($_tmp, 'Uhr', "")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'am', 'em') : smarty_modifier_replace($_tmp, 'am', 'em')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'um', "&agrave;s") : smarty_modifier_replace($_tmp, 'um', "&agrave;s")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'morgen', "amanh&atilde;") : smarty_modifier_replace($_tmp, 'morgen', "amanh&atilde;")); ?>
</td></tr>
	<tr><td>Chegada em:</td><td><span class="timer"><?php echo $this->_tpl_vars['mov']['arrival_in']; ?>
</span></td></tr>
</table>
	<?php endif; ?>
<?php endif; ?>