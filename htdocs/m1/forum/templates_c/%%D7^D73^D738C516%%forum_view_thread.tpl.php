<?php /* Smarty version 2.6.14, created on 2011-09-04 12:40:07
         compiled from forum_view_thread.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'urldecode', 'forum_view_thread.tpl', 1, false),array('modifier', 'stripslashes', 'forum_view_thread.tpl', 1, false),array('modifier', 'nl2br', 'forum_view_thread.tpl', 1, false),)), $this); ?>
<?php if ($this->_tpl_vars['no_thread']): ?>
</h2>
 / <a href="forum.php?ally=<?php echo $this->_tpl_vars['ally']; ?>
&category=<?php echo $this->_tpl_vars['category_i_d']; ?>
"><?php echo $this->_tpl_vars['category_n']; ?>
</a> / <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('urldecode', true, $_tmp) : urldecode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
 <?php if ($this->_tpl_vars['thread_closed'] == '1'): ?> (Inchis) <?php endif; ?></h3>
</a><?php if ($this->_tpl_vars['thread_closed'] == '0' || $this->_tpl_vars['thread_closed'] == '1' && $this->_tpl_vars['user']['ally_titel'] == '1' || $this->_tpl_vars['user']['ally_lead'] == '1'): ?>  | <a href="forum.php?ally=<?php  echo $_GET['ally'];  ?>&category=<?php  echo $_GET['category'];  ?>&do=view_thread&id=<?php  echo $_GET['id'];  ?>&page=<?php  echo $_GET['page'];  ?>&quote=first">Citat</a><?php endif; ?>
</b>
</div> 
    foreach ($_from as $this->_tpl_vars['value'] => $this->_tpl_vars['id']):
?>
&screen=info_player&id=<?php echo $this->_tpl_vars['post_by_id'][$this->_tpl_vars['value']]; ?>
" target="_top"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['post_by'][$this->_tpl_vars['value']])) ? $this->_run_mod_handler('urldecode', true, $_tmp) : urldecode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a><?php if ($this->_tpl_vars['thread_closed'] == '0' || $this->_tpl_vars['thread_closed'] == '1' && $this->_tpl_vars['user']['ally_titel'] == '1' || $this->_tpl_vars['user']['ally_lead'] == '1'): ?> | <a href="forum.php?ally=<?php  echo $_GET['ally'];  ?>&category=<?php  echo $_GET['category'];  ?>&do=view_thread&id=<?php  echo $_GET['id'];  ?>&page=<?php  echo $_GET['page'];  ?>&quote=<?php echo $this->_tpl_vars['id']; ?>
">Citat</a> <?php if ($this->_tpl_vars['post_by'][$this->_tpl_vars['value']] == $this->_tpl_vars['user']['username'] || $this->_tpl_vars['user']['ally_lead'] == '1' || $this->_tpl_vars['user']['ally_titel'] == '1'): ?>- <a href="forum.php?ally=<?php  echo $_GET['ally'];  ?>&category=<?php  echo $_GET['category'];  ?>&do=view_thread&id=<?php  echo $_GET['id'];  ?>&page=<?php  echo $_GET['page'];  ?>&delete_post=<?php echo $this->_tpl_vars['id']; ?>
" onclick="return confirm('Sigur doriti sa stergeti acest post?');">Sterge</a> <?php endif;  endif; ?>
</b>
</div> 
</div>

]
