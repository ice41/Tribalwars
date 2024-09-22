<?php /* Smarty version 2.6.14, created on 2012-04-27 21:45:22
         compiled from forum/forum.tpl */ ?>
<div id="ally_content">	<div id="forum_box">		<div>			<?php $_from = $this->_tpl_vars['bar_forum_arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['fid'] => $this->_tpl_vars['fname']):
?>				<span class="forum<?php if ($this->_tpl_vars['fid'] == $this->_tpl_vars['aktu_fid']): ?> selected<?php endif; ?>">					<a href="<?php echo $this->_tpl_vars['base_link']; ?>
&sm=ow&aktu_fid=<?php echo $this->_tpl_vars['fid']; ?>
">						<?php if ($this->_tpl_vars['forum']->is_forum_readed($this->_tpl_vars['fid'])): ?>							<img src="/ds_graphic/new_report.png" title="S¹ nie przeczytane tematy" alt="" />&nbsp;						<?php endif; ?>						<?php echo $this->_tpl_vars['fname']; ?>
					</a>				</span>				&nbsp;			<?php endforeach; endif; unset($_from); ?>		</div>		<br>		<div class="containerBorder">			<table class="main bgContainer" align="center" width="100%">				<tbody>					<tr>						<td style="padding: 4px;">							<?php if (! empty ( $this->_tpl_vars['err'] )): ?>								<span class="error"><?php echo $this->_tpl_vars['err']; ?>
</span>							<?php endif; ?>							<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "forum/forum_".($this->_tpl_vars['sm']).".tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>						</td>					</tr>				</tbody>			</table>		</div>	</div>	<?php if ($this->_tpl_vars['can_edit']): ?>		<p align="center">			<a href="<?php echo $this->_tpl_vars['base_link']; ?>
&amp;sm=admin">Zarz¹dzaj forum</a>		</p>	<?php endif; ?>		<p>		<a href="forum.php?vid=<?php echo $this->_tpl_vars['village']['id']; ?>
" target="_blank">» Otwórz forum w nowym oknie</a>	</p></div>