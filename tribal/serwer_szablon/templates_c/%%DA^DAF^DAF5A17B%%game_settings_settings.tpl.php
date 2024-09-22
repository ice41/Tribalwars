<?php /* Smarty version 2.6.14, created on 2012-02-27 19:56:14
         compiled from game_settings_settings.tpl */ ?>
<h3>Ustawienia</h3>

<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=settings&amp;action=change_settings&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">

	<table class="vis settings">
		<tbody>
			<tr>
				<th colspan="2">Ustawienia</th>
			</tr>

			<tr>
				<td>Szerokoœæ okna</td>
				<td><input name="window_width" size="4" maxlength="4" value="<?php echo $this->_tpl_vars['user']['window_width']; ?>
" type="text"> Rozdzielczoœæ monitora</td>
			</tr>

			<tr>
				<td>Klasyczna oprawa graficzna:</td>
				<td><label><input name="classic_graphics" type="checkbox" <?php if ($this->_tpl_vars['user']['classic_graphics']): ?>checked="checked"<?php endif; ?>>Tryb klasyczny dezaktywuje nowe funkcje graficzne</label></td>
			</tr>

			<tr>
				<td>Klasyczna grafika:</td>
				<td><label><input name="confirm_queue" type="checkbox" <?php if (! $this->_tpl_vars['user']['confirm_queue']): ?>checked="checked"<?php endif; ?>>Klasyczny wygl¹d (Plemiona 6.5)</label></td>
			</tr>

			<tr>
				<td>Menu g³ówne:</td>
				<td><label><input name="dyn_menu" type="checkbox" <?php if ($this->_tpl_vars['user']['dyn_menu']): ?>checked="checked"<?php endif; ?>>Menu g³ówne zawsze widoczne</label></td>
			</tr>
			
			<tr>
				<td>Pasek narzêdzi:</td>
				<td><label><input name="show_toolbar" type="checkbox" <?php if ($this->_tpl_vars['user']['show_toolbar']): ?>checked="checked"<?php endif; ?>>Pokazaæ pasek narzêdzi</label></td>
			</tr>


			<tr>
				<td>Rozmiar mapy:</td>
				<td>
					<select name="map_size" style="width: 80px;">
						<option label="7x7" value="7" <?php if ($this->_tpl_vars['user']['map_size'] == 7): ?>selected="selected"<?php endif; ?>>7x7</option>
						<option label="9x9" value="9" <?php if ($this->_tpl_vars['user']['map_size'] == 9): ?>selected="selected"<?php endif; ?>>9x9</option>
						<option label="11x11" value="11" <?php if ($this->_tpl_vars['user']['map_size'] == 11): ?>selected="selected"<?php endif; ?>>11x11</option>
						<option label="13x13" value="13" <?php if ($this->_tpl_vars['user']['map_size'] == 13): ?>selected="selected"<?php endif; ?>>13x13</option>
						<option label="15x15" value="15" <?php if ($this->_tpl_vars['user']['map_size'] == 15): ?>selected="selected"<?php endif; ?>>15x15</option
											</select>
				</td>
			</tr>

			<tr>
				<td colspan="2"><input value="OK" type="submit"></td>
			</tr>
		</tbody>
	</table>
	<br>
</form>