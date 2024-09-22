<?php /* Smarty version 2.6.14, created on 2022-11-26 16:34:14
         compiled from game_iron.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nivel', 'game_iron.tpl', 5, false),)), $this); ?>
<table>
	<tr>
		<td><img src="../graphic/build/iron.jpg" alt="Mina de Ferro" /></td>
		<td>
			<h2>Mina de Ferro (<?php echo ((is_array($_tmp=$this->_tpl_vars['village']['iron'])) ? $this->_run_mod_handler('nivel', true, $_tmp) : nivel($_tmp)); ?>
)</h2>
       	    <?php echo $this->_tpl_vars['description']; ?>

		</td>
	</tr>
</table>
<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-left:5px;">
	<tr>
		<td width="200"><img src="../graphic/icons/iron.png" title="Ferro" alt="" /> Produ&ccedil;&atilde;o atual</td>
		<td><b><?php echo $this->_tpl_vars['iron_datas']['iron_production']; ?>
 </b> Unidades por minuto</td>
	</tr>
	<?php if (( $this->_tpl_vars['iron_datas']['iron_production_next'] ) != false): ?>
	<tr>
		<td><img src="../graphic/icons/iron.png" title="Ferro" alt="" /> Produ&ccedil;&atilde;o no (<?php echo ((is_array($_tmp=$this->_tpl_vars['village']['iron']+1)) ? $this->_run_mod_handler('nivel', true, $_tmp) : nivel($_tmp)); ?>
)</td>
		<td><b><?php echo $this->_tpl_vars['iron_datas']['iron_production_next']; ?>
</b> Unidades por minuto</td>
	</tr>
    <?php endif; ?>
		<?php 
		$p1 = mysql_fetch_Array(mysql_query("SELECT bonus FROM villages WHERE id = '".$_GET['village']."'"));
		include("include/config.php");
		if ($p1['bonus'] == 6) { include("include/bonus/raw_material_production_bonus.php"); } else { include("include/configs/raw_material_production.php"); }
		$wood = $this->_tpl_vars['village']['iron'];
		
		
		 ?>
		<?php  if ($arr_production[$wood+2]) {
		$arr1 = $arr_production[$wood+2] * $config['speed'] / 60;
		 ?>

		<tr>
			<td>
				<img src="../graphic/icons/iron.png" title="Ferro" alt="" />
				Produ&ccedil;&atilde;o no (<?php echo ((is_array($_tmp=$this->_tpl_vars['village']['iron']+2)) ? $this->_run_mod_handler('nivel', true, $_tmp) : nivel($_tmp)); ?>
)
			</td>

			<td>
  				<b><?php echo $arr1; ?></b> Unidades por minuto
        	</td>
		</tr>
		<?php } ?>
<?php  if ($arr_production[$wood+3]) {
		$arr2 = $arr_production[$wood+3] * $config['speed'] / 60;
		 ?>

		<tr>
			<td>
				<img src="../graphic/icons/iron.png" title="Ferro" alt="" />
				Produ&ccedil;&atilde;o no (<?php echo ((is_array($_tmp=$this->_tpl_vars['village']['iron']+3)) ? $this->_run_mod_handler('nivel', true, $_tmp) : nivel($_tmp)); ?>
)
			</td>

			<td>
  				<b><?php echo $arr2; ?></b> Unidades por minuto
        	</td>
		</tr>
		<?php } ?>
<?php  if ($arr_production[$wood+4]) {
		$arr3 = $arr_production[$wood+4] * $config['speed'] / 60;
		 ?>

		<tr>
			<td>
				<img src="../graphic/icons/iron.png" title="Ferro" alt="" />
				Produ&ccedil;&atilde;o no (<?php echo ((is_array($_tmp=$this->_tpl_vars['village']['iron']+4)) ? $this->_run_mod_handler('nivel', true, $_tmp) : nivel($_tmp)); ?>
)
			</td>

			<td>
  				<b><?php echo $arr3; ?></b> Unidades por minuto
        	</td>
		</tr>
		<?php } ?>
</table>