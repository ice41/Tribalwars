<?php /* Smarty version 2.6.14, created on 2012-03-01 22:56:36
         compiled from game_settings_award.tpl */ ?>
<h3>Odznaczenia</h3>

<form method="post" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=award&amp;action=h_set&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">
	<table class="vis">
		<tbody><tr>
			<td><input name="hide_own_awards" type="checkbox" <?php if ($this->_tpl_vars['setts']['hide_own_awards']): ?>checked="checked"<?php endif; ?>>Pokazywaæ w³asne odznaczenia na profilu</td>
		</tr>
		<tr>
			<td><input name="hide_own_wtwaw" type="checkbox" <?php if ($this->_tpl_vars['setts']['hide_own_wtwaw']): ?>checked="checked"<?php endif; ?>>Pokazywaæ w³asne odznaczenia w rankingu</td>
		</tr>
		<tr>
			<td><input value="Zapisz" type="submit"></td>
		</tr>
</tbody></table>
</form>