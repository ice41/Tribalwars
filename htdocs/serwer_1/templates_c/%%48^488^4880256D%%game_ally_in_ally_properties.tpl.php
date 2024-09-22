<?php /* Smarty version 2.6.14, created on 2011-12-23 21:17:05
         compiled from game_ally_in_ally_properties.tpl */ ?>
<table cellspacing="0">
<tr><td valign="top">
<?php if ($this->_tpl_vars['user']['ally_found'] == 1): ?>
	<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=properties&amp;action=change&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
	<table class="vis" width="100%">
		<tr><th colspan="2">W³aœciwoœci</th></tr>
		<tr><td>Nazwa plemienia:</td><td><input type="text" name="name" value="<?php echo $this->_tpl_vars['ally']['name']; ?>
" /></td></tr>
		<tr><td width="140">Skrót (maksymalnie szeœæ znaków):</td><td><input type="text" name="tag" maxlength="6" value="<?php echo $this->_tpl_vars['ally']['short']; ?>
" /></td></tr>
		<tr><td width="140">Strona internetowa:</td><td><input type="text" name="homepage" maxlength="128" size="50"  value="<?php echo $this->_tpl_vars['ally']['homepage']; ?>
" /></td></tr>
		<tr><td width="140">Kana³ IRC:</td><td><input type="text" name="irc-channel" maxlength="128" size="50"  value="<?php echo $this->_tpl_vars['ally']['irc']; ?>
" /></td></tr>
		<tr><td colspan="2"><input type="submit" value="Zapisz" /></td></tr>
	</table>
	</form>

	<table class="vis" width="100%">
	<tr><th>Rozwi¹¿ plemiê</th></tr>
	<tr><td><a href="javascript:ask('Willst du wirklich deinen Stamm auflösen?', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=properties&amp;action=close&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
')">Rozwi¹¿ plemiê</a></td></tr>
	</table>
<?php endif; ?>

</td><td valign="top" width="360">

<?php if ($this->_tpl_vars['user']['ally_diplomacy'] == 1): ?>
	<?php if (! empty ( $this->_tpl_vars['preview'] )): ?>
		<table class="vis" width="100%">
			<tr><th colspan="2">Podgl¹d</th></tr>
			<tr><td colspan="2" align="center"><?php echo $this->_tpl_vars['ally']['description']; ?>
</td></tr>
		</table>
	<?php endif; ?>

	<script type="text/javascript">
	function bbEdit() {
		gid("show_row").style.display = 'none';
		gid("edit_link").style.display = 'none';
		gid("edit_row").style.display = '';
		gid("submit_row").style.display = '';
	}
	</script>

	<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=properties&amp;action=change_desc&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post" name="edit_profile">
	<table class="vis" width="100%">
			<tr><th colspan="2" width="100%">Opis</th></tr>
		<tr id="show_row" align="center"><td colspan="2"><?php echo $this->_tpl_vars['ally']['description']; ?>
</td></tr>
		<tr id="edit_row"><td colspan="2"><textarea name="desc_text" cols="40" rows="15"><?php echo $this->_tpl_vars['ally']['edit_description']; ?>
</textarea></td></tr>
		<tr id="submit_row"><td><input type="submit" name="edit" value="Zapisz" /> <input type="submit" name="preview" value="Podgl¹d" /></td><td align="right"></td></tr>
	</table>
	</form>
	<a id="edit_link" href="javascript:bbEdit()" style="display:none">Opracuj</a><br />

	<?php if (empty ( $this->_tpl_vars['preview'] )): ?>
		<script type="text/javascript">
		  gid("edit_row").style.display = 'none';
			gid("submit_row").style.display = 'none';
			gid("edit_link").style.display = '';
		</script>
	<?php else: ?>
		<script type="text/javascript">
		  	gid("edit_row").style.display = '';
		  	gid("show_row").style.display = 'none';
			gid("submit_row").style.display = '';
			gid("edit_link").style.display = 'none';
		</script>
	<?php endif; ?>
	<br />
	<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=properties&amp;action=ally_image&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" enctype="multipart/form-data" method="post">
		<table class="vis" width="100%">
			<tr>
				<th>
					God³o plemienia:
				</th>
			</tr>
			<tr>
				<td>
				    <?php if (! empty ( $this->_tpl_vars['ally']['image'] )): ?>
						<img src="graphic/ally/<?php echo $this->_tpl_vars['ally']['image']; ?>
" alt="God³o" />
						<br />
						<input name="del_image" type="checkbox" />
						Usuñ god³o.
						<br />
					<?php endif; ?>
	            	<input name="image" type="file" size="40" accept="image/*" maxlength="1048576" />
					<br />
					<span style="font-size: xx-small">maks. 300x200, mks. 256kByte, (jpg, jpeg, png, gif)</span>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="OK" />
				</td>
			</tr>
		</table>
 </form>
<?php endif; ?>

</td></tr></table>