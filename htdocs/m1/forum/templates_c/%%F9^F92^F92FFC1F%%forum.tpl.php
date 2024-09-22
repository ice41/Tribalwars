<?php /* Smarty version 2.6.14, created on 2011-09-04 22:11:37
         compiled from forum.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'urldecode', 'forum.tpl', 15, false),array('modifier', 'stripslashes', 'forum.tpl', 15, false),array('modifier', 'id_from_username', 'forum.tpl', 74, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link rel="stylesheet" type="text/css" href="../stamm.css" />
		<script src="../script.js" type="text/javascript"></script>

	</head>
	<body class="b_forum">
	
			<?php $_from = $this->_tpl_vars['category_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value'] => $this->_tpl_vars['id']):
?>
			
			<?php if ($this->_tpl_vars['category'] == $this->_tpl_vars['id']): ?>
			<span class="forum selected">
				<b><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['category_name'][$this->_tpl_vars['value']])) ? $this->_run_mod_handler('urldecode', true, $_tmp) : urldecode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</b> 
			</span>
			<?php else: ?>
				<span class="forum"> 
					<a href="forum.php?ally=<?php echo $this->_tpl_vars['ally']; ?>
&category=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['category_name'][$this->_tpl_vars['value']])) ? $this->_run_mod_handler('urldecode', true, $_tmp) : urldecode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a> 
				</span>
			<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
			<?php if ($this->_tpl_vars['user']['ally_titel'] == '1' || $this->_tpl_vars['user']['ally_lead'] == '1'): ?>
			<span class="forum <?php if ($this->_tpl_vars['do'] == 'new_category'): ?>selected<?php endif; ?>"> <a href="forum.php?ally=<?php echo $this->_tpl_vars['ally']; ?>
&do=new_category">[<b>+</b>]</a> </span>
			<?php endif; ?>

	<table class="main" width="99.3%">
		<tr>
			<td>
			<?php if (isset ( $this->_tpl_vars['error_category_ally'] )): ?>
				<h2><?php echo $this->_tpl_vars['error_category_ally']; ?>
</h2>
			<?php else: ?>
				<?php if ($this->_tpl_vars['do'] == 'new_category'): ?>
					<?php if ($this->_tpl_vars['user']['ally_titel'] == '1' || $this->_tpl_vars['user']['ally_lead'] == '1'): ?>
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "forum_new_category.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					<?php endif; ?>
				<?php elseif ($this->_tpl_vars['do'] == 'new_thread'): ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "forum_new_thread.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<?php elseif ($this->_tpl_vars['do'] == 'view_thread'): ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "forum_view_thread.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<?php else: ?>
				<h2><?php echo $this->_tpl_vars['category_n']; ?>
 - <a href="forum.php?ally=<?php echo $this->_tpl_vars['ally']; ?>
&category=<?php echo $this->_tpl_vars['category']; ?>
&do=new_thread">Topic nou</a></h2>
				
				<table class="vis" width="100%">
					<tr>
						<?php if ($this->_tpl_vars['user']['ally_titel'] == '1' || $this->_tpl_vars['user']['ally_lead'] == '1'): ?><th>-</th><?php endif; ?>
						<th colspan="2">Forum</th>
						<th>Autor</th>
						<th>Ultimul mesaj</th>
						<th>Raspunsuri</th>
					</tr>
					<form action="" method="POST">
				<?php $_from = $this->_tpl_vars['thread_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value'] => $this->_tpl_vars['id']):
?>
					<tr>
						<?php if ($this->_tpl_vars['user']['ally_titel'] == '1' || $this->_tpl_vars['user']['ally_lead'] == '1'): ?><td width="12"><input type="checkbox" name="ids[<?php echo $this->_tpl_vars['id']; ?>
]"/></td><?php endif; ?>
						<td width="14">
							<?php if ($this->_tpl_vars['thread_closed'][$this->_tpl_vars['value']] == '1'): ?>
								<?php if ($this->_tpl_vars['thread_read'][$this->_tpl_vars['value']] == '0'): ?>
									<img src="../../graphic/forum/thread_close.png" title="Topic inchis" alt="Topic inchis" />
								<?php elseif ($this->_tpl_vars['thread_read'][$this->_tpl_vars['value']] == '1'): ?>
									<img src="../../graphic/forum/thread_closed.png" title="Topic inchis" alt="Topic inchis" />
								<?php endif; ?>
							<?php else: ?>
								<?php if ($this->_tpl_vars['thread_read'][$this->_tpl_vars['value']] == '0'): ?>
									<img src="../../graphic/forum/thread_unread.png" title="Topic inchis" alt="Topic inchis" />
								<?php elseif ($this->_tpl_vars['thread_read'][$this->_tpl_vars['value']] == '1'): ?>
									<img src="../../graphic/forum/thread_read.png" title="Topic inchis" alt="Topic inchis" />
								<?php endif; ?>
							<?php endif; ?>
						</td>
						<td>
							<a href="forum.php?ally=<?php echo $this->_tpl_vars['ally']; ?>
&category=<?php echo $this->_tpl_vars['category']; ?>
&do=view_thread&id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['thread_title'][$this->_tpl_vars['value']]; ?>
</a> <?php if ($this->_tpl_vars['thread_closed'][$this->_tpl_vars['value']] == '1'): ?><b>(Inchis)</b><?php endif; ?><br /><font size="1px"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['thread_message'][$this->_tpl_vars['value']])) ? $this->_run_mod_handler('urldecode', true, $_tmp) : urldecode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</font>
						</td>
						<td align="center"><a href="../game.php?village=<?php echo $this->_tpl_vars['village_id']; ?>
&screen=info_player&id=<?php echo ((is_array($_tmp=$this->_tpl_vars['thread_author'][$this->_tpl_vars['value']])) ? $this->_run_mod_handler('id_from_username', true, $_tmp) : id_from_username($_tmp)); ?>
" target="_top"><strong><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['thread_author'][$this->_tpl_vars['value']])) ? $this->_run_mod_handler('urldecode', true, $_tmp) : urldecode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</strong></a> <br /> <?php echo $this->_tpl_vars['thread_time'][$this->_tpl_vars['value']]; ?>
</td>
						<?php if ($this->_tpl_vars['thread_post_number'][$this->_tpl_vars['value']] < 1): ?>
							<td align="center"><strong> --- </strong></td>
						<?php else: ?>
						<td align="center"><strong><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['thread_last_post_author'][$this->_tpl_vars['value']])) ? $this->_run_mod_handler('urldecode', true, $_tmp) : urldecode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</strong> <br /> <?php echo $this->_tpl_vars['thread_last_post_date'][$this->_tpl_vars['value']]; ?>
</td>
						<?php endif; ?>
						<td><?php echo $this->_tpl_vars['thread_post_number'][$this->_tpl_vars['value']]; ?>
</td>
					</tr>
				<?php endforeach; endif; unset($_from); ?>
					
					<tr>
						<th colspan="100%">
						<?php if ($this->_tpl_vars['user']['ally_titel'] == '1' || $this->_tpl_vars['user']['ally_lead'] == '1'): ?>
						Actiune:
							<select name="thread_action">
								<option value="close_thread">Inchide subiect</option>
								<option value="open_thread">Deschide subiect</option>
								<option value="delete_thread">Sterge subiect</option>
							</select>
							<input type="submit" value="OK" name="thread_action_go" />
						<?php else: ?>
						&nbsp;
						<?php endif; ?>
						</th>
					</tr>
					</form>

				</table>
				<?php endif; ?>
			<?php endif; ?>
			</td>
		</tr>
	</table>
	</body>
</html>