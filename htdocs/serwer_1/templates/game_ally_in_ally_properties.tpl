<table cellspacing="0">
<tr><td valign="top">
{if $user.ally_found==1}
	<form action="game.php?village={$village.id}&amp;screen=ally&amp;mode=properties&amp;action=change&amp;h={$hkey}" method="post">
	<table class="vis" width="100%">
		<tr><th colspan="2">W³aœciwoœci</th></tr>
		<tr><td>Nazwa plemienia:</td><td><input type="text" name="name" value="{$ally.name}" /></td></tr>
		<tr><td width="140">Skrót (maksymalnie szeœæ znaków):</td><td><input type="text" name="tag" maxlength="6" value="{$ally.short}" /></td></tr>
		<tr><td width="140">Strona internetowa:</td><td><input type="text" name="homepage" maxlength="128" size="50"  value="{$ally.homepage}" /></td></tr>
		<tr><td width="140">Kana³ IRC:</td><td><input type="text" name="irc-channel" maxlength="128" size="50"  value="{$ally.irc}" /></td></tr>
		<tr><td colspan="2"><input type="submit" value="Zapisz" /></td></tr>
	</table>
	</form>

	<table class="vis" width="100%">
	<tr><th>Rozwi¹¿ plemiê</th></tr>
	<tr><td><a href="javascript:ask('Willst du wirklich deinen Stamm auflösen?', 'game.php?village={$village.id}&amp;screen=ally&amp;mode=properties&amp;action=close&amp;h={$hkey}')">Rozwi¹¿ plemiê</a></td></tr>
	</table>
{/if}

</td><td valign="top" width="360">

{if $user.ally_diplomacy==1}
	{if !empty($preview)}
		<table class="vis" width="100%">
			<tr><th colspan="2">Podgl¹d</th></tr>
			<tr><td colspan="2" align="center">{$ally.description}</td></tr>
		</table>
	{/if}

	<script type="text/javascript">
	function bbEdit() {ldelim}
		gid("show_row").style.display = 'none';
		gid("edit_link").style.display = 'none';
		gid("edit_row").style.display = '';
		gid("submit_row").style.display = '';
	{rdelim}
	</script>

	<form action="game.php?village={$village.id}&amp;screen=ally&amp;mode=properties&amp;action=change_desc&amp;h={$hkey}" method="post" name="edit_profile">
	<table class="vis" width="100%">
			<tr><th colspan="2" width="100%">Opis</th></tr>
		<tr id="show_row" align="center"><td colspan="2">{$ally.description}</td></tr>
		<tr id="edit_row"><td colspan="2"><textarea name="desc_text" cols="40" rows="15">{$ally.edit_description}</textarea></td></tr>
		<tr id="submit_row"><td><input type="submit" name="edit" value="Zapisz" /> <input type="submit" name="preview" value="Podgl¹d" /></td><td align="right"></td></tr>
	</table>
	</form>
	<a id="edit_link" href="javascript:bbEdit()" style="display:none">Opracuj</a><br />

	{if empty($preview)}
		<script type="text/javascript">
		  gid("edit_row").style.display = 'none';
			gid("submit_row").style.display = 'none';
			gid("edit_link").style.display = '';
		</script>
	{else}
		<script type="text/javascript">
		  	gid("edit_row").style.display = '';
		  	gid("show_row").style.display = 'none';
			gid("submit_row").style.display = '';
			gid("edit_link").style.display = 'none';
		</script>
	{/if}
	<br />
	<form action="game.php?village={$village.id}&amp;screen=ally&amp;mode=properties&amp;action=ally_image&amp;h={$hkey}" enctype="multipart/form-data" method="post">
		<table class="vis" width="100%">
			<tr>
				<th>
					God³o plemienia:
				</th>
			</tr>
			<tr>
				<td>
				    {if !empty($ally.image)}
						<img src="graphic/ally/{$ally.image}" alt="God³o" />
						<br />
						<input name="del_image" type="checkbox" />
						Usuñ god³o.
						<br />
					{/if}
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
{/if}

</td></tr></table>