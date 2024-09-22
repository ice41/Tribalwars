<?php /* Smarty version 2.6.14, created on 2016-12-23 20:08:54
         compiled from index_anti_cheat.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'urldecode', 'index_anti_cheat.tpl', 21, false),array('modifier', 'htmlentities', 'index_anti_cheat.tpl', 21, false),)), $this); ?>
<h2>AntiCheat Conturi multiple / deblocare/blocare </h2>

<?php if (! empty ( $this->_tpl_vars['action_text'] )): ?>
<h3>Actiune</h3>
<?php echo $this->_tpl_vars['action_text']; ?>

<?php endif; ?>

<h3>Conturi multiple gasite :</h3>
<?php if ($this->_tpl_vars['multis_found'] == 'Y'): ?>
<table class="vis">
<tr>
	<th>Jucaotor</th>
	<th>IP</th>
	<th>Jucator cu acelasi IP</th>
	<th>Actiune</th>
</tr>

<?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['u']):
?>
<?php if ($this->_tpl_vars['u']['multi']['enum'] == 'Y'): ?>
<tr>
	<td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['u']['username'])) ? $this->_run_mod_handler('urldecode', true, $_tmp) : urldecode($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)); ?>
 <?php if ($this->_tpl_vars['u']['banned'] == 'Y'): ?><strong>(Banat)</strong><?php endif; ?></td>
	<td><?php echo $this->_tpl_vars['u']['ip']; ?>
</td>
	<td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['u']['multi']['username'])) ? $this->_run_mod_handler('urldecode', true, $_tmp) : urldecode($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)); ?>
</td>
	<td>
		<a href="index.php?screen=anti_cheat&amp;do=ban&amp;user[0]=<?php echo $this->_tpl_vars['u']['id']; ?>
&amp;user[1]=<?php echo $this->_tpl_vars['u']['multi']['userid']; ?>
">Blocheazale pe amndoua</a> - 
		<a href="index.php?screen=anti_cheat&amp;do=ban&amp;user[0]=<?php echo $this->_tpl_vars['u']['id']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['u']['username'])) ? $this->_run_mod_handler('urldecode', true, $_tmp) : urldecode($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)); ?>
 blocheaza</a> - 
		<a href="index.php?screen=anti_cheat&amp;do=ban&amp;user[0]=<?php echo $this->_tpl_vars['u']['multi']['userid']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['u']['multi']['username'])) ? $this->_run_mod_handler('urldecode', true, $_tmp) : urldecode($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)); ?>
 Blocari</a> <br />
		<a href="index.php?screen=anti_cheat&amp;do=remove_village&amp;user[0]=<?php echo $this->_tpl_vars['u']['id']; ?>
&amp;user[1]=<?php echo $this->_tpl_vars['u']['multi']['userid']; ?>
">Le iei un sat la amandoi</a> - 
		<a href="index.php?screen=anti_cheat&amp;do=remove_village&amp;user[0]=<?php echo $this->_tpl_vars['u']['id']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['u']['username'])) ? $this->_run_mod_handler('urldecode', true, $_tmp) : urldecode($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)); ?>
 Le iei sate</a> - 
		<a href="index.php?screen=anti_cheat&amp;do=remove_village&amp;user[0]=<?php echo $this->_tpl_vars['u']['multi']['userid']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['u']['multi']['username'])) ? $this->_run_mod_handler('urldecode', true, $_tmp) : urldecode($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)); ?>
 Le iei sate</a>
	</td>
</tr>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</table>
<?php else: ?>
<i>Nu a fost gasita nici o infractiune (conturi multiple).</i>
<?php endif; ?>

<h3>Jucatori blocari/deblocari</h3>
<table class="vis">
<tr>
	<th>Jucator</th>
	<th>blocari/deblocari</th>
	<th>Actiune</th>
</tr>
<?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['u']):
?>
<tr>
	<td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['u']['username'])) ? $this->_run_mod_handler('urldecode', true, $_tmp) : urldecode($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)); ?>
</td>
	<td>
		<form action="index.php?screen=anti_cheat&amp;do=change_ban_state&amp;id=<?php echo $this->_tpl_vars['u']['id']; ?>
" method="post">
		<select name="state">
			<option value="Y" <?php if ($this->_tpl_vars['u']['banned'] == 'Y'): ?>selected="selected"<?php endif; ?>>Blocheaza</option>
			<option value="N" <?php if ($this->_tpl_vars['u']['banned'] == 'N'): ?>selected="selected"<?php endif; ?>>Deblocheaza</option>
		</select>
		<input type="submit" value="Actioneaza" />
		</form>
	</td>
	<td>
		<a href="index.php?screen=anti_cheat&amp;do=remove_village&amp;user[0]=<?php echo $this->_tpl_vars['u']['id']; ?>
">Ia din sate</a>
	</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>

<?php echo '

'; ?>

<!--
End of Extension
-->