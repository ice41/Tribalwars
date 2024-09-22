<?php /* Smarty version 2.6.14, created on 2012-01-30 16:39:49
         compiled from game_settings_settings.tpl */ ?>
<h3>Ustawienia</h3>

<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=settings&amp;action=change_settings&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">

<table class="vis">
<tr><th colspan="2">Ustawienia</th></tr>

<tr>
<td>Rozdzielczoœæ okna:</td>
<td><input type="text" name="screen_width" size="4" maxlength="4" value="<?php echo $this->_tpl_vars['user']['window_width']; ?>
" /> Px</td>
</tr>

<tr>
<td>Pasek narzêdzi:</td>
<td><input type="checkbox" name="show_toolbar"  <?php if ($this->_tpl_vars['user']['show_toolbar'] == 1): ?>checked<?php endif; ?>/>W³¹czyæ pasek narzêdzi</td>
</tr>

<tr>
<td>Rozwijana lista menu:</td>

<td><input type="checkbox" name="dyn_menu"  <?php if ($this->_tpl_vars['user']['dyn_menu'] == 1): ?>checked<?php endif; ?>/>W³¹czyæ Rozwijan¹ listê menu</td>
</tr>

<tr>
<td>Rozmiar mapy:</td>
<td><select name="map_size">
<option label="7x7" value="7" <?php if ($this->_tpl_vars['user']['map_size'] == 7): ?>selected="selected"<?php endif; ?>>7x7</option>
<option label="9x9" value="9" <?php if ($this->_tpl_vars['user']['map_size'] == 9): ?>selected="selected"<?php endif; ?>>9x9</option>
<option label="11x11" value="11" <?php if ($this->_tpl_vars['user']['map_size'] == 11): ?>selected="selected"<?php endif; ?>>11x11</option>
<option label="13x13" value="13" <?php if ($this->_tpl_vars['user']['map_size'] == 13): ?>selected="selected"<?php endif; ?>>13x13</option>
<option label="15x15" value="15" <?php if ($this->_tpl_vars['user']['map_size'] == 15): ?>selected="selected"<?php endif; ?>>15x15</option>
</select></td>
</tr>

<tr>
<td>Grafika:</td>
<td><input type="checkbox" name="confirm_queue" <?php if ($this->_tpl_vars['user']['confirm_queue'] == 1): ?>checked<?php endif; ?> />W³¹czyæ now¹ grafikê (plemiona 7.0)</td>
</tr>


<tr><td colspan="2"><input type="submit" value="OK" /></td></tr>
</table><br />
</form>