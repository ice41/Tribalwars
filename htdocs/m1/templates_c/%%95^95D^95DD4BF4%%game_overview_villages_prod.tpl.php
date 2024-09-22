<?php /* Smarty version 2.6.14, created on 2016-12-22 21:35:08
         compiled from game_overview_villages_prod.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_number', 'game_overview_villages_prod.tpl', 25, false),)), $this); ?>
<?php 
	if($_GET['action'] == 'reload_res'){
		header('Location: game.php?village='.$_GET['village'].'&screen=snob&mode=coins');
	}
	$this->_tpl_vars['vills'] = mysql_num_rows(mysql_query("SELECT * FROM `villages` WHERE `userid` = '".$this->_tpl_vars['user']['id']."'"));
 ?>
<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th>Aldeias (<?php echo $this->_tpl_vars['vills']; ?>
)</th>
		<th>Pontos</th>
		<th>Recursos</th>
		<th>Armaz&eacute;m</th>
		<th>Fazenda</th>
		<th>Constru&ccedil;&otilde;es</th>
		<th>Pesquisas</th>
		<th>Recrutamento</th>
	</tr>
	<?php $_from = $this->_tpl_vars['villages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arr_id'] => $this->_tpl_vars['id']):
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
		<td align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['points'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>
		<td align="center"><img src="../graphic/icons/wood.png" title="Madeira" alt="" /><?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_wood'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?><span class="warn"><?php endif;  echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_wood'];  if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_wood'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?></span><?php endif; ?> <img src="../graphic/icons/stone.png" title="Argila" alt="" /><?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_stone'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?><span class="warn"><?php endif;  echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_stone'];  if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_stone'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?></span><?php endif; ?> <img src="../graphic/icons/iron.png" title="Ferro" alt="" /><?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_iron'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?><span class="warn"><?php endif;  echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_iron'];  if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_iron'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?></span><?php endif; ?> </td>
		<td align="center">
<?php  
	$arr_id = $this->_tpl_vars['arr_id'];
	$select_bonus = mysql_fetch_array(mysql_query("SELECT bonus FROM villages WHERE id = '$arr_id'"));
	$select_bonus = $select_bonus[0];
	include('include/config.php');
	if($select_bonus == '1'){
		include('include/bonus/max_storage_bonus.php');
		$select = mysql_fetch_array(mysql_query("SELECT storage FROM villages WHERE id = '$arr_id'"));
		$select = $select[0];
		echo $arr_maxstorage[$select];
	}else{
		include('include/configs/max_storage.php');
		$select1 = mysql_fetch_array(mysql_query("SELECT storage FROM villages WHERE id = '$arr_id'"));
		$select1 = $select1[0];
		echo $arr_maxstorage[$select1];
	}
 ?>
		</td>
		<td align="center"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_bh']; ?>
/<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_farm']; ?>
</td>
		<?php if (isset ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_build']['buildname'] )): ?>
		<td><b><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_build']['buildname']; ?>
</b></td>
		<?php else: ?>
	    <td>&nbsp;</td>
		<?php endif; ?>
		<?php if (isset ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_tec']['tecname'] )): ?>
		<td><b><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_tec']['tecname']; ?>
</b></td>
		<?php else: ?>
	    <td>&nbsp;</td>
		<?php endif; ?>
		<td>
			<?php $_from = $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['recruits']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id_rec'] => $this->_tpl_vars['arr_rec']):
?>
			<img src="../graphic/unit/<?php echo $this->_tpl_vars['arr_rec']['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['arr_rec']['num']; ?>
 <?php echo $this->_tpl_vars['arr_rec']['unit']; ?>
" alt="">
			<?php endforeach; endif; unset($_from); ?>
		</td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>