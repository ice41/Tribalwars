<?php /* Smarty version 2.6.14, created on 2011-12-17 22:04:53
         compiled from game_memo.tpl */ ?>
<h2>Notatki</h2>


<script type="text/javascript">
function memoEdit() {
	gid("show_row").style.display = 'none';
	gid("edit_link").style.display = 'none';
	gid("edit_row").style.display = '';
	gid("submit_row").style.display = '';
}
</script>


<noscript>
	<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=memo&amp;action=edit&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
	<table class="vis" width="100%">
	<tr><td colspan="2"><?php echo $this->_tpl_vars['memo']['output']; ?>
</td></tr>
	<tr><td colspan="2"><textarea name="memo" cols="80" rows="25"><?php echo $this->_tpl_vars['memo']['output_textarea']; ?>
</textarea></td></tr>
	<tr><td><input type="submit" value="Zapisz" /></td><td align="right"></td></tr>
	</table>
	</form>
</noscript>

<div id="memo_script" style="display:none">
<a id="edit_link" href="javascript:memoEdit()">Edytowaæ</a><br />
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=memo&amp;action=edit&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
<table class="vis" width="100%">
<tr id="show_row"><td colspan="2"><?php echo $this->_tpl_vars['memo']['output']; ?>
</td></tr>
<tr id="edit_row" style="display:none"><td colspan="2"><textarea name="memo" cols="80" rows="25"><?php echo $this->_tpl_vars['memo']['output_textarea']; ?>
</textarea></td></tr>
<tr id="submit_row" style="display:none"><td><input type="submit" value="Zapisz" /></td><td align="right"></td></tr>
</table>
</form>
</div>
<script type="text/javascript">
gid("memo_script").style.display = '';
</script>