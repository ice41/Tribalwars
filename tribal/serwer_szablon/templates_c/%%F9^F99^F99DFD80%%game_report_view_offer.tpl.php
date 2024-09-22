<?php /* Smarty version 2.6.14, created on 2012-01-13 22:10:59
         compiled from game_report_view_offer.tpl */ ?>
<table width="100%">
<tr><th width="60">Sprzedawca:</th><th><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['report']['from_user']; ?>
"><?php echo $this->_tpl_vars['report']['from_username']; ?>
</a></th></tr>
<tr><td>Wioska:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['report']['from_village']; ?>
"><?php echo $this->_tpl_vars['report']['from_villagename']; ?>
 (<?php echo $this->_tpl_vars['report']['from_x']; ?>
|<?php echo $this->_tpl_vars['report']['from_y']; ?>
)</a></th></tr>

<tr><th width="60">Kupiec:</th><th><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
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

<table style="border: 1px solid #DED3B9">
<tr><td>Sprzedawca:</td><td><?php if ($this->_tpl_vars['report']['sell_ress'] == 'wood'): ?><img src="graphic/holz.png" title="Drewno" alt="" /><?php endif;  if ($this->_tpl_vars['report']['sell_ress'] == 'stone'): ?><img src="graphic/lehm.png" title="Glina" alt="" /><?php endif;  if ($this->_tpl_vars['report']['sell_ress'] == 'iron'): ?><img src="graphic/eisen.png" title="¯elazo" alt="" /><?php endif;  echo $this->_tpl_vars['report']['sell']; ?>
</td>
<tr><td>Kupiec:</td><td><?php if ($this->_tpl_vars['report']['buy_ress'] == 'wood'): ?><img src="graphic/holz.png" title="Drewno" alt="" /><?php endif;  if ($this->_tpl_vars['report']['buy_ress'] == 'stone'): ?><img src="graphic/lehm.png" title="Glina" alt="" /><?php endif;  if ($this->_tpl_vars['report']['buy_ress'] == 'iron'): ?><img src="graphic/eisen.png" title="¯elazo" alt="" /><?php endif;  echo $this->_tpl_vars['report']['buy']; ?>
</td>
</table><br />

Surowce zosta³y wys³ane automatycznie