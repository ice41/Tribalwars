<?php /* Smarty version 2.6.14, created on 2016-12-22 21:35:36
         compiled from game_place.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nivel', 'game_place.tpl', 27, false),)), $this); ?>
<br />
	<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><th>Submenu</th></tr>
		<?php $_from = $this->_tpl_vars['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['f_name'] => $this->_tpl_vars['f_mode']):
?>
	         <?php if ($this->_tpl_vars['f_name'] == 'Befehl'): ?>
    	        <?php $this->assign('f_name', 'Comandos'); ?>
        	 <?php endif; ?>
	         <?php if ($this->_tpl_vars['f_name'] == 'Truppen'): ?>
    	        <?php $this->assign('f_name', 'Tropas'); ?>
        	 <?php endif; ?>
			 <?php if ($this->_tpl_vars['f_name'] == 'Simulator'): ?>
    	        <?php $this->assign('f_name', 'Simulador'); ?>
        	 <?php endif; ?>
		<tr>
			<td <?php if ($this->_tpl_vars['f_mode'] == $this->_tpl_vars['mode']): ?>class="selected"<?php endif; ?>>
				<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;mode=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php if ($this->_tpl_vars['f_mode'] == $this->_tpl_vars['mode']): ?>&raquo; <?php endif;  echo $this->_tpl_vars['f_name']; ?>
</a>
			</td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>
</td>
<td width="80%">
	<table>
		<tr>
			<td><img src="../graphic/build/place.jpg" title="Pra&ccedil;a de reuni&atilde;o" alt="" /></td>
			<td>
				<h2>Pra&ccedil;a de reuni&atilde;o (<?php echo ((is_array($_tmp=$this->_tpl_vars['village']['place'])) ? $this->_run_mod_handler('nivel', true, $_tmp) : nivel($_tmp)); ?>
)</h2>
				<?php echo $this->_tpl_vars['description']; ?>

			</td>
		</tr>
	</table>
	<?php if ($this->_tpl_vars['show_build']): ?>
	<table width="100%">
		<tr>
			<td valign="top" width="100%">
			<?php if (in_array ( $this->_tpl_vars['mode'] , $this->_tpl_vars['allow_mods'] )): ?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_place_".($this->_tpl_vars['mode']).".tpl", 'smarty_include_vars' => array('title' => 'foo')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php endif; ?>
			</td>
		</tr>
	</table>
	<?php endif; ?>
</td>