<h2>Notite</h2>


<script type="text/javascript">
function memoEdit() {ldelim}
	gid("show_row").style.display = 'none';
	gid("edit_link").style.display = 'none';
	gid("edit_row").style.display = '';
	gid("submit_row").style.display = '';
{rdelim}
</script>


<noscript>
	<form action="game.php?village={$village.id}&amp;screen=memo&amp;action=edit&amp;h={$hkey}" method="post">
	<table class="vis" width="100%">
	<tr><td colspan="2">{$memo.output}</td></tr>
	<tr><td colspan="2"><textarea name="memo" cols="80" rows="25">{$memo.output_textarea}</textarea></td></tr>
	<tr><td><input type="submit" value="Aplica" /></td><td align="right"></td></tr>
	</table>
	</form>
</noscript>

<div id="memo_script" style="display:none">
<a id="edit_link" href="javascript:memoEdit()">	Editare</a><br />
<form action="game.php?village={$village.id}&amp;screen=memo&amp;action=edit&amp;h={$hkey}" method="post">
<table class="vis" width="100%">
<tr id="show_row"><td colspan="2">{$memo.output}</td></tr>
<tr id="edit_row" style="display:none"><td colspan="2"><textarea name="memo" cols="80" rows="25">{$memo.output_textarea}</textarea></td></tr>
<tr id="submit_row" style="display:none"><td><input type="submit" value="Salveaza" /></td><td align="right"></td></tr>
</table>
</form>
</div>
<script type="text/javascript">
gid("memo_script").style.display = '';
</script>