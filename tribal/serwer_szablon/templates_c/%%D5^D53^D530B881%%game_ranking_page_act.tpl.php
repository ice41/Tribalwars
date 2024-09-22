<?php /* Smarty version 2.6.14, created on 2012-01-25 18:27:58
         compiled from game_ranking_page_act.tpl */ ?>
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=ranking&mode=<?php echo $this->_tpl_vars['mode']; ?>
&action=change_page" method="post"/>	Ranga: <input name="page_RA" value="		<?php if (! empty ( $this->_tpl_vars['page_ra'] )): ?>			<?php echo $this->_tpl_vars['page_ra']; ?>
		<?php else: ?>			<?php if ($this->_tpl_vars['dec_rang'] == 'sqlally'): ?>				<?php echo $this->_tpl_vars['ally_rang']; ?>
			<?php else: ?>				<?php echo $this->_tpl_vars['user'][$this->_tpl_vars['dec_rang']]; ?>
			<?php endif; ?>		<?php endif; ?>		" type="text" style="width: 40px;"/>&nbsp;	<input type="submit" name="sub" value="Szukaj"/></form>