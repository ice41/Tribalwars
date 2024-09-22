<?php /* Smarty version 2.6.14, created on 2011-01-02 21:19:16
         compiled from index_config_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlspecialchars', 'index_config_edit.tpl', 12, false),)), $this); ?>
﻿<h2>Config Editor</h2>

<?php if (! empty ( $this->_tpl_vars['action_text'] )): ?>
<h3>Actiune</h3>
<?php echo $this->_tpl_vars['action_text']; ?>

<?php endif; ?>

<form action="index.php?screen=config_edit&update=y" method="post">
<table class="vis">
<?php $_from = $this->_tpl_vars['to_cfg']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cfg']):
?>
<tr>
	<th><?php echo ((is_array($_tmp=$this->_tpl_vars['cfg']['desc'])) ? $this->_run_mod_handler('htmlspecialchars', true, $_tmp) : htmlspecialchars($_tmp)); ?>
</th>
</tr>
<tr>
	<td>
	<?php if ($this->_tpl_vars['cfg']['type'] == 'text'): ?>
		<input type="text" name="<?php echo $this->_tpl_vars['cfg']['name']; ?>
" value="<?php echo $this->_tpl_vars['cfg']['default']; ?>
" />
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['cfg']['type'] == 'numeric'): ?>
		<input type="text" name="<?php echo $this->_tpl_vars['cfg']['name']; ?>
" value="<?php echo $this->_tpl_vars['cfg']['default']; ?>
" size="8" />
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['cfg']['type'] == 'select'): ?>
		<select name="<?php echo $this->_tpl_vars['cfg']['name']; ?>
">
			<option value="a" <?php if ($this->_tpl_vars['cfg']['default'] == 'a'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['cfg']['a']; ?>
</option>
			<option value="b" <?php if ($this->_tpl_vars['cfg']['default'] == 'b'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['cfg']['b']; ?>
</option>
		</select>
	<?php endif; ?>
	</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>

<br />
<input type="submit" value="Ąndern" />
</form>

<?php echo '
<script type="text/javascript">
/**
 * DO NOT REMOVE THIS
 */
 
window.onload = _init_agrafix;

function _init_agrafix() { 
	 var st = document.getElementById("serverTime");
	 var parentP = st.parentNode;
}
</script>
'; ?>

<!--
End of Extension
-->