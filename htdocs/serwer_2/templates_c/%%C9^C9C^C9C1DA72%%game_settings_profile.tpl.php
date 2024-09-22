<?php /* Smarty version 2.6.14, created on 2011-12-17 22:05:06
         compiled from game_settings_profile.tpl */ ?>
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;action=change_profile&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" enctype="multipart/form-data" method="post">
	<table class="vis">
		<tr>
			<th colspan="2">
				Ustawienia
			</th>
		</tr>
        <tr>
			<td>
				Data urodzenia:
			</td>
			<td>
				<input name="day" type="text" size="2" maxlength="2" value="<?php echo $this->_tpl_vars['profile']['b_day']; ?>
" />
                    <select name="month">
						<option label="Styczeñ" value="1" <?php if ($this->_tpl_vars['profile']['b_month'] == 1): ?>selected<?php endif; ?>>Styczeñ</option>
						<option label="Luty" value="2" <?php if ($this->_tpl_vars['profile']['b_month'] == 2): ?>selected<?php endif; ?>>Luty</option>
						<option label="Marzec" value="3" <?php if ($this->_tpl_vars['profile']['b_month'] == 3): ?>selected<?php endif; ?>>Marzec</option>
						<option label="Kwiecieñ" value="4" <?php if ($this->_tpl_vars['profile']['b_month'] == 4): ?>selected<?php endif; ?>>Kwiecieñ</option>
						<option label="Maj" value="5" <?php if ($this->_tpl_vars['profile']['b_month'] == 5): ?>selected<?php endif; ?>>Maj</option>
						<option label="Czerwiec" value="6" <?php if ($this->_tpl_vars['profile']['b_month'] == 6): ?>selected<?php endif; ?>>Czerwiec</option>
						<option label="Lipiec" value="7" <?php if ($this->_tpl_vars['profile']['b_month'] == 7): ?>selected<?php endif; ?>>Lipiec</option>
						<option label="Sierpieñ" value="8" <?php if ($this->_tpl_vars['profile']['b_month'] == 8): ?>selected<?php endif; ?>>Sierpieñ</option>
						<option label="Wrzesieñ" value="9" <?php if ($this->_tpl_vars['profile']['b_month'] == 9): ?>selected<?php endif; ?>>Wrzesieñ</option>
						<option label="PaŸdziernik" value="10" <?php if ($this->_tpl_vars['profile']['b_month'] == 10): ?>selected<?php endif; ?>>PaŸdziernik</option>
						<option label="Listopad" value="11" <?php if ($this->_tpl_vars['profile']['b_month'] == 11): ?>selected<?php endif; ?>>Listopad</option>
						<option label="Grudzieñ" value="12" <?php if ($this->_tpl_vars['profile']['b_month'] == 12): ?>selected<?php endif; ?>>Grudzieñ</option>
					</select>
				<input name="year" type="text" size="4" maxlength="4" value="<?php echo $this->_tpl_vars['profile']['b_year']; ?>
" />
			</td>
		</tr>
        <tr>
			<td>
				P³eæ:
			</td>
			<td>
			    <label>
					<input type="radio" name="sex" value="f" <?php if ($this->_tpl_vars['profile']['sex'] == 'f'): ?>checked="checked"<?php endif; ?> />
						Kobieta
				</label>
				<label>
					<input type="radio" name="sex" value="m" <?php if ($this->_tpl_vars['profile']['sex'] == 'm'): ?>checked="checked"<?php endif; ?> />
						Mê¿czyzna
				</label>
				<label>
					<input type="radio" name="sex" value="x" <?php if ($this->_tpl_vars['profile']['sex'] == 'x'): ?>checked="checked"<?php endif; ?> />
						Nie podajê
				</label>
			</td>
		</tr>
		<tr>
			<td>
				Miejsce zamieszkania:
			</td>
			<td>
				<input name="home" type="text" size="24" maxlength="32" value="<?php echo $this->_tpl_vars['profile']['home']; ?>
" />
			</td>
		</tr>
		<tr>
			<td>
				God³o osobiste:
			</td>
			<td>
			    <?php if (! empty ( $this->_tpl_vars['user']['image'] )): ?>
					<img src="graphic/player/<?php echo $this->_tpl_vars['user']['image']; ?>
" alt="Wappen" />
					<br />
					<input name="del_image" type="checkbox" />
					Wappen löschen
					<br />
				<?php endif; ?>
	           	<input name="image" type="file" size="40" accept="image/*" maxlength="1048576" />
				<br />
				<span style="font-size: xx-small">maks. 240x180, maks. 120kByte, (jpg, jpeg, png, gif)</span>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="OK" />
			</td>
		</tr>
	</table>
	<br />
</form>

<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;action=change_text&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
	<table class="vis">
		<tr>
			<th colspan="2">
				Tekst osobisty:
			</th>
		</tr>
		<tr>
			<td colspan="2">
				<textarea name="personal_text" cols="50" rows="10"><?php echo $this->_tpl_vars['profile']['personal_text']; ?>
</textarea>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="send" value="OK" />
			</td>
			<td align="right">

			</td>
		</tr>
	</table>
</form>