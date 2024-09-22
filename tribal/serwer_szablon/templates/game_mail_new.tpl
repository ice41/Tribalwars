{if $preview}
	<table width="100%">
	<tr><td colspan="2" valign="top" style="background-color: white; border: solid 1px black;">
	{$preview_message}
	</td></tr>
	</table><br />
{/if}

<form name="header" action="game.php?village={$village.id}&amp;screen=mail&amp;mode=new&amp;action=send&amp;answer_mail_id={$view}&amp;h={$hkey}" method="post">
<table>
<tr><td>Odbiorca:</td><td><input type="text" name="to" size="50" value="{$inputs.to}" />
{if $user.ally_mass_mail==1 && $user.ally!=-1}<a href="javascript:popup_scroll('igm_to.php?', 250, 300)">Masowa korespondencja</a>{/if}</td></tr>
<tr><td>Temat:</td><td><input type="text" name="subject" size="50" value="{$inputs.subject}" /></td></tr>
<tr><td colspan="2">
</td></tr>
<tr><td colspan="2"><textarea name="text" cols="70" rows="20">{$inputs.text}</textarea></td></tr>
<tr><td><input type="submit" name="preview" value="Podgl¹d" /> <input type="submit" name="send" value="Wyœlij"> </td>
<td align="right"><a onclick="javascript:popup_scroll('help.php?mode=bb', 700, 400); return false;" href="help.php?mode=bb" target="_blank"></a></td>
</tr>
</table>

</form>