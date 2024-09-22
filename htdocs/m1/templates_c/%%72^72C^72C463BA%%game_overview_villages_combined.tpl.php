<?php /* Smarty version 2.6.14, created on 2022-11-26 16:32:00
         compiled from game_overview_villages_combined.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'game_overview_villages_combined.tpl', 26, false),)), $this); ?>
<?php 
	$this->_tpl_vars['vills'] = mysql_num_rows(mysql_query("SELECT * FROM `villages` WHERE `userid` = '".$this->_tpl_vars['user']['id']."'"));
 ?>
<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th>Aldeias (<?php echo $this->_tpl_vars['vills']; ?>
)</th>
		<th><div align="center"><img src="../graphic/overview/main.png" title="Edif&iacute;cio Principal" alt="" /></div></th>
		<th><div align="center"><img src="../graphic/overview/barracks.png" title="Quartel" alt="" /></div></th>
		<th><div align="center"><img src="../graphic/overview/stable.png" title="Estab&uacute;lo" alt="" /></div></th>
		<th><div align="center"><img src="../graphic/overview/garage.png" title="Oficina" alt="" /></div></th>
		<th><div align="center"><img src="../graphic/overview/smith.png" title="Ferreiro" alt="" /></div></th>
		<th><div align="center"><img src="../graphic/icons/farm.png" title="Fazenda" alt="" /></div></th>
		<?php $_from = $this->_tpl_vars['unit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['name']):
?>
		<th width="35"><div align="center"><img src="../graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" alt="" /></div></th>
		<?php endforeach; endif; unset($_from); ?>
		<th><div align="center"><img src="../graphic/overview/trader.png" title="Mercadores" alt="" /></div></th>
	</tr>
	<?php $_from = $this->_tpl_vars['villages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arr_id'] => $this->_tpl_vars['arr']):
?>
<?php 
	$vill = $this->_tpl_vars['arr_id'];
	$sql = mysql_fetch_array(mysql_query("SELECT * FROM `villages` WHERE `id`= '".$vill."'"));
 ?>
	<tr<?php if ($this->_tpl_vars['arr_id'] == $this->_tpl_vars['village']['id']): ?> class="lit"<?php endif; ?>>
		<td><?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['attacks'] != 0): ?><img src="../graphic/command/attack.png"> <?php endif; ?><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&screen=overview"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['name']; ?>
 (<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['x']; ?>
|<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['y']; ?>
) K<?php echo $sql['continent']; ?></a></td>
		<?php if (isset ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_build']['buildname'] )): ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=main"><img src="../graphic/dots/green.png" title="<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_build']['buildname']; ?>
: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_build']['end_time'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'heute um', "hoje &agrave;s") : smarty_modifier_replace($_tmp, 'heute um', "hoje &agrave;s")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Uhr', "") : smarty_modifier_replace($_tmp, 'Uhr', "")); ?>
" alt="" /></a></td>
		<?php else: ?>
	    <td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=main"><img src="../graphic/overview/prod_avail.png" title="" alt="" /></a></td>
		<?php endif; ?>

		<?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['barracks'] == 0): ?>
       	<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=barracks"><img src="../graphic/dots/grey.png" title="Produ&ccedil;&atilde;o n&atilde;o disponivel" alt="" /></a></td>
		<?php elseif (! empty ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['barracks_prod']['unit'] )): ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=barracks"><img src="../graphic/dots/green.png" title="<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['barracks_prod']['unit']; ?>
: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['barracks_prod']['time'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'heute um', "hoje &agrave;s") : smarty_modifier_replace($_tmp, 'heute um', "hoje &agrave;s")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Uhr', "") : smarty_modifier_replace($_tmp, 'Uhr', "")); ?>
" alt="" /></a></td>
		<?php else: ?>
       	<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=barracks"><img src="../graphic/overview/prod_avail.png" title="" alt="" /></a></td>
		<?php endif; ?>

		<?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['stable'] == 0): ?>
       	<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=stable"><img src="../graphic/dots/grey.png" title="Produ&ccedil;&atilde;o n&atilde;o disponivel" alt="" /></a></td>
		<?php elseif (! empty ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['stable_prod']['unit'] )): ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=stable"><img src="../graphic/dots/green.png" title="<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['stable_prod']['unit']; ?>
: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['stable_prod']['time'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'heute um', "hoje &agrave;s") : smarty_modifier_replace($_tmp, 'heute um', "hoje &agrave;s")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Uhr', "") : smarty_modifier_replace($_tmp, 'Uhr', "")); ?>
" alt="" /></a></td>
		<?php else: ?>
	    <td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=stable"><img src="../graphic/overview/prod_avail.png" title="" alt="" /></a></td>
		<?php endif; ?>

		<?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['garage'] == 0): ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=garage"><img src="../graphic/dots/grey.png" title="Produ&ccedil;&atilde;o n&atilde;o disponivel" alt="" /></a></td>
		<?php elseif (! empty ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['garage_prod']['unit'] )): ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=garage"><img src="../graphic/dots/green.png" title="<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['garage_prod']['unit']; ?>
: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['garage_prod']['time'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'heute um', "hoje &agrave;s") : smarty_modifier_replace($_tmp, 'heute um', "hoje &agrave;s")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Uhr', "") : smarty_modifier_replace($_tmp, 'Uhr', "")); ?>
" alt="" /></a></td>
		<?php else: ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=garage"><img src="../graphic/overview/prod_avail.png" title="" alt="" /></a></td>
		<?php endif; ?>

		<?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['smith'] == 0): ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=smith"><img src="../graphic/dots/yellow.png" title="Produ&ccedil;&atilde;o n&atilde;o disponivel" alt="" /></a></td>
		<?php elseif (! empty ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_tec']['tecname'] )): ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=smith"><img src="../graphic/dots/green.png" title="<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_tec']['tecname']; ?>
: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_tec']['end_time'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'heute um', "hoje &agrave;s") : smarty_modifier_replace($_tmp, 'heute um', "hoje &agrave;s")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Uhr', "") : smarty_modifier_replace($_tmp, 'Uhr', "")); ?>
" alt="" /></a></td>
		<?php else: ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=smith"><img src="../graphic/overview/prod_avail.png" title="" alt="" /></a></td>
		<?php endif; ?>

		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=farm"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_farm']-$this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_bh']; ?>
 (<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['farm']; ?>
)</a></td>
		
		<?php $_from = $this->_tpl_vars['unit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['name']):
?>
			<?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']][$this->_tpl_vars['dbname']] == 0): ?>
		<td class="hidden" align="center"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']][$this->_tpl_vars['dbname']]; ?>
</td>
			<?php else: ?>
		<td align="center"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']][$this->_tpl_vars['dbname']]; ?>
</td>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>

		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=market"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['dealers']['in_village']; ?>
/<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['dealers']['max_dealers']; ?>
</a></td>

	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>