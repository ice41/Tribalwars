<?php /* Smarty version 2.6.14, created on 2024-01-10 01:48:36
         compiled from game_settings_quickbar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'game_settings_quickbar.tpl', 16, false),)), $this); ?>
<?php if ($this->_tpl_vars['edit'] == 'edit'): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_settings_quickbar_edit.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php elseif ($this->_tpl_vars['action'] == 'add'): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_settings_quickbar_add.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
<h3>Bara link-uri rapide</h3>
<p><a href="/game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=quickbar&action=add">&raquo; Adauga link nou</a></p>
<?php if ($this->_tpl_vars['amount'] != 0): ?>
<table class="vis">
<tr><th>Link</th><th colspan="3">Optiuni</th></tr>

<?php $_from = $this->_tpl_vars['quickbar']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['quick']):
?>
<tr>
<td>
<?php if (substr ( $this->_tpl_vars['quick']['href'] , 0 , 8 ) != 'game.php'): ?>
<a href="<?php echo $this->_tpl_vars['quick']['href']; ?>
"<?php if ($this->_tpl_vars['quick']['target'] != 0): ?>target="_blank"<?php endif; ?>><img src="<?php echo $this->_tpl_vars['quick']['img']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['quick']['name'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'Cladirea principala', 'Cladirea principala') : smarty_modifier_replace($_tmp, 'Cladirea principala', 'Cladirea principala')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Cazarma', 'Barracks') : smarty_modifier_replace($_tmp, 'Cazarma', 'Barracks')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Stall', 'Grajd') : smarty_modifier_replace($_tmp, 'Stall', 'Grajd')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Werkstatt', 'Workshop') : smarty_modifier_replace($_tmp, 'Werkstatt', 'Workshop')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Adelshof', 'Academy') : smarty_modifier_replace($_tmp, 'Adelshof', 'Academy')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Schmiede', 'Smithy') : smarty_modifier_replace($_tmp, 'Schmiede', 'Smithy')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Platz', 'Rally Point') : smarty_modifier_replace($_tmp, 'Platz', 'Rally Point')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Markt', 'Market') : smarty_modifier_replace($_tmp, 'Markt', 'Market')); ?>
</a>
<?php else: ?>
<a href="<?php echo $this->_tpl_vars['quick']['href']; ?>
&village=<?php echo $this->_tpl_vars['quick']['vid']; ?>
"<?php if ($this->_tpl_vars['quick']['target'] != 0): ?>target="_blank"<?php endif; ?>><img src="<?php echo $this->_tpl_vars['quick']['img']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['quick']['name'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'Cladirea principala', 'Cladirea principala') : smarty_modifier_replace($_tmp, 'Cladirea principala', 'Cladirea principala')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Kaserne', 'Barracks') : smarty_modifier_replace($_tmp, 'Kaserne', 'Barracks')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Stall', 'Stable') : smarty_modifier_replace($_tmp, 'Stall', 'Stable')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Werkstatt', 'Workshop') : smarty_modifier_replace($_tmp, 'Werkstatt', 'Workshop')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Adelshof', 'Academy') : smarty_modifier_replace($_tmp, 'Adelshof', 'Academy')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Schmiede', 'Smithy') : smarty_modifier_replace($_tmp, 'Schmiede', 'Smithy')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Platz', 'Rally Point') : smarty_modifier_replace($_tmp, 'Platz', 'Rally Point')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Markt', 'Market') : smarty_modifier_replace($_tmp, 'Markt', 'Market')); ?>
</a>
<?php endif; ?>
</td>
<td>
<a href="game.php?village=<?php echo $this->_tpl_vars['quick']['vid']; ?>
&screen=settings&mode=quickbar&action=edit&id=<?php echo $this->_tpl_vars['quick']['id']; ?>
&h=<?php echo $this->_tpl_vars['hkey']; ?>
">Editeaza</a>
</td>
<td>
<a href="game.php?village=<?php echo $this->_tpl_vars['quick']['vid']; ?>
&screen=settings&mode=quickbar&action=delete&id=<?php echo $this->_tpl_vars['quick']['id']; ?>
&h=<?php echo $this->_tpl_vars['hkey']; ?>
">Sterge</a>
</td>
<?php endforeach; endif; unset($_from); ?>
</table>

<?php endif; ?>
<?php endif; ?>
<p>
<a href="game.php?village=<?php echo $this->_tpl_vars['vill']; ?>
&screen=settings&mode=quickbar&action=standard">&raquo; Foloseste Quickbar-ul original</a>
</p>