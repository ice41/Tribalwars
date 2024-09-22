<?php /* Smarty version 2.6.14, created on 2012-01-13 21:51:24
         compiled from game_report_view_sendRess.tpl */ ?>
<table width="100%">
<tr><th width="60">Od:</th><th><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['report']['from_user']; ?>
"><?php echo $this->_tpl_vars['report']['from_username']; ?>
</a></th></tr>
<tr><td>Wioska:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['report']['from_village']; ?>
"><?php echo $this->_tpl_vars['report']['from_villagename']; ?>
 (<?php echo $this->_tpl_vars['report']['from_x']; ?>
|<?php echo $this->_tpl_vars['report']['from_y']; ?>
)</a></th></tr>

<tr><th width="60">Do:</th><th><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['report']['to_user']; ?>
"><?php echo $this->_tpl_vars['report']['to_username']; ?>
</a></th></tr>
<tr><td>Wioska:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['report']['to_village']; ?>
"><?php echo $this->_tpl_vars['report']['to_villagename']; ?>
 (<?php echo $this->_tpl_vars['report']['to_x']; ?>
|<?php echo $this->_tpl_vars['report']['to_y']; ?>
)</a></th></tr>
</table><br />

<h4>Surowce:</h4>
<?php if ($this->_tpl_vars['report']['wood'] > 0): ?><img src="graphic/holz.png" title="Drewno" alt="" /><?php echo $this->_tpl_vars['report']['wood']; ?>
 <?php endif;  if ($this->_tpl_vars['report']['stone'] > 0): ?><img src="graphic/lehm.png" title="Glina" alt="" /><?php echo $this->_tpl_vars['report']['stone']; ?>
 <?php endif;  if ($this->_tpl_vars['report']['iron'] > 0): ?><img src="graphic/eisen.png" title="¯elazo" alt="" /><?php echo $this->_tpl_vars['report']['iron']; ?>
 <?php endif; ?>