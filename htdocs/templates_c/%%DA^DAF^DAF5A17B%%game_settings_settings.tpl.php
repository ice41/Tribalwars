<?php /* Smarty version 2.6.14, created on 2024-01-10 01:48:31
         compiled from game_settings_settings.tpl */ ?>
<h3>Set&#259;ri</h3>

<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=settings&amp;action=change_settings&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">

<table class="vis">
<tr><th colspan="2">Set&#259;ri</th></tr>

<tr>
<td>L&#259;&#355;ime fereastr&#259;:</td>
<td><input type="text" name="screen_width" size="4" maxlength="4" value="<?php echo $this->_tpl_vars['user']['window_width']; ?>
" /> Puncte de imagine</td>
</tr>

<tr>
<td>Bar&#259; de meniu:</td>
<td><input type="checkbox" name="show_toolbar"  <?php if ($this->_tpl_vars['user']['show_toolbar'] == 1): ?>checked<?php endif; ?>/>Profil bar&#259; de meniu</td>
</tr>

<tr>
<td>Noua bar&#259; de meniu:</td>

<td><input type="checkbox" name="dyn_menu"  <?php if ($this->_tpl_vars['user']['dyn_menu'] == 1): ?>checked<?php endif; ?>/>Noua bar&#259; de meniu</td>
</tr>
<tr>
<td>Dimensiunea h&#259;rti:</td>
<td><select name="map_size">
<option label="7x7" value="7" <?php if ($this->_tpl_vars['user']['map_size'] == 7): ?>selected="selected"<?php endif; ?>>7x7</option>
<option label="9x9" value="9" <?php if ($this->_tpl_vars['user']['map_size'] == 9): ?>selected="selected"<?php endif; ?>>9x9</option>
<option label="11x11" value="11" <?php if ($this->_tpl_vars['user']['map_size'] == 11): ?>selected="selected"<?php endif; ?>>11x11</option>
<option label="13x13" value="13" <?php if ($this->_tpl_vars['user']['map_size'] == 13): ?>selected="selected"<?php endif; ?>>13x13</option>

</select></td>
</tr>

<tr>
<td>&#206;ntrebare de siguran&#355;&#259;:</td>
<td><input type="checkbox" name="confirm_queue" <?php if ($this->_tpl_vars['user']['confirm_queue'] == 1): ?>checked<?php endif; ?> />&#206;ntrebare de siguran&#355;&#259;</td>
</tr>


<tr><td colspan="2"><input type="submit" value="OK" /></td></tr>
</table><br />
</form>