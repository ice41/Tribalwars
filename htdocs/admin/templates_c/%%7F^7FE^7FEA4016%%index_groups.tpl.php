<?php /* Smarty version 2.6.14, created on 2011-01-16 14:02:24
         compiled from index_groups.tpl */ ?>
<h1 style="text-align: center;">Grupe</h1>

<table class="vis">
  <tr>
    <?php if ($this->_tpl_vars['install'] != 'true'): ?><td><a href="?screen=<?php echo $_GET['screen']; ?>
&amp;action=install">Instalare</a></td><?php endif; ?>
    <td><a href="?screen=<?php echo $_GET['screen']; ?>
&amp;action=reset">Restart</a></td>
    <td><a href="?screen=<?php echo $_GET['screen']; ?>
&amp;action=updatesystem_<?php if ($this->_tpl_vars['updatesystem_status'] == 'on'): ?>off<?php else: ?>on<?php endif; ?>">Update system <?php if ($this->_tpl_vars['updatesystem_status'] == 'on'): ?>dezactivat<?php else: ?>activat<?php endif; ?></a></td>
  </tr>
</table>
<?php if (isset ( $this->_tpl_vars['install_done'] )): ?>
  <h2 style="color: green; text-align: center;">Instalarea a fost facuta cu succes!</h2>
<?php elseif (isset ( $this->_tpl_vars['updatesystem_on'] )): ?>
  <h2 style="color: green; text-align: center;">System Update activat cu succes!</h2>
<?php elseif (isset ( $this->_tpl_vars['updatesystem_off'] )): ?>
  <h2 style="color: green; text-align: center;">System Update dezactivat cu succes!</h2>
<?php elseif (isset ( $this->_tpl_vars['reset'] )): ?>
  <?php if ($this->_tpl_vars['reset'] == true): ?>
    <h2 style="color: green; text-align: center;">Restartarea a fost finalizata cu succes!</h2>
  <?php elseif ($this->_tpl_vars['reset'] == false): ?>
    <h2 style="color: red; text-align: center;">Resetarea nu a fost efectuata!</h2>
  <?php endif; ?>
<?php endif; ?>