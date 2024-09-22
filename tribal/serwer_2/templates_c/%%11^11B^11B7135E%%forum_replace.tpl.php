<?php /* Smarty version 2.6.14, created on 2012-03-28 17:57:23
         compiled from forum/forum_replace.tpl */ ?>
<?php if ($this->_tpl_vars['pok_tem']): ?>	<h3>Przenieœ temat</h3>		<ul>		<?php $_from = $this->_tpl_vars['send_theaders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tname']):
?>			<li><?php echo $this->_tpl_vars['tname']; ?>
</li>		<?php endforeach; endif; unset($_from); ?>	</ul>		<?php if ($this->_tpl_vars['pok_ak']): ?>		<form action="<?php echo $this->_tpl_vars['base_link']; ?>
&sm=replace&action=mod&h=<?php echo $this->_tpl_vars['hkey']; ?>
&fid=<?php echo $this->_tpl_vars['aktu_fid']; ?>
&tid=<?php echo $this->_tpl_vars['aktu_tid']; ?>
" method="post">			Forum docelowe: 			<select name="target_forum_id">				<?php $_from = $this->_tpl_vars['to_forums']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['fid'] => $this->_tpl_vars['fname']):
?>					<option value="<?php echo $this->_tpl_vars['fid']; ?>
"><?php echo $this->_tpl_vars['fname']; ?>
</option>				<?php endforeach; endif; unset($_from); ?>			</select>			<input value="OK" type="submit">		</form>	<?php endif; ?><?php else: ?>	<span class="error" style="font-size: 18px;">Mo¿na przenosiæ minimalnie jeden temat</span><?php endif; ?>