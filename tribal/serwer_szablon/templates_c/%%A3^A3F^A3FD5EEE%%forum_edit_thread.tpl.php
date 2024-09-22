<?php /* Smarty version 2.6.14, created on 2012-03-29 12:09:56
         compiled from forum/forum_edit_thread.tpl */ ?>
<?php if ($this->_tpl_vars['pok_pos']): ?>
	<h2>Opracuj temat</h2>

	<form action="<?php echo $this->_tpl_vars['base_link']; ?>
&sm=edit_thread&aktu_fid=<?php echo $this->_tpl_vars['aktu_fid']; ?>
&aktu_tid=<?php echo $this->_tpl_vars['aktu_tid']; ?>
&action=edit&h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post" name="new_thread">
	
		<table class="vis" id="formTable">
			<tbody>
				<tr>
					<td>Temat:</td>
					<td>
						<input name="subject" size="64" value="<?php echo $this->_tpl_vars['tname']; ?>
" tabindex="1" type="text">
					</td>
				</tr>
				<tr>
					<td>Opcje:</td>
					<td>
						<label>
							<input name="important" tabindex="2" <?php if ($this->_tpl_vars['important']): ?>checked="checked"<?php endif; ?> type="checkbox">
							Wa¿ne
						</label>
					</td>
				</tr>
			</tbody>
		</table>
    	<input value="Wyœlij" name="send" type="submit">
	</form>
<?php else: ?>
	<span class="error" style="font-size: 18px;">Temat nie istnieje</span>
<?php endif; ?>