<?php /* Smarty version 2.6.14, created on 2011-12-15 15:26:51
         compiled from game_report_view.tpl */ ?>
<table width="450">
<tr><td>
<table class="vis">
	<tr>
		<th width="140">Tytu³</th>
		<th width="400"><?php echo $this->_tpl_vars['pl']->compile_report_title($this->_tpl_vars['report']['title']); ?>
</th>
	</tr>
	<tr>
		<td>Data</td>
		<td><?php echo $this->_tpl_vars['report']['date']; ?>
</td>
	</tr>
	<tr>
		<td colspan="2" valign="top" height="160" style="border: solid 1px black; padding: 4px;">
			<?php $this->assign('reporttype', $this->_tpl_vars['report']['type']); ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_report_view_".($this->_tpl_vars['reporttype']).".tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</td></tr>

<table align="center" class="vis" width="100%"><tr>
<td align="center" width="20%"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=<?php echo $this->_tpl_vars['mode']; ?>
&amp;action=del_one&amp;id=<?php echo $this->_tpl_vars['report']['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Usuñ</a></td>

</tr></table>
</td></tr>
</table>