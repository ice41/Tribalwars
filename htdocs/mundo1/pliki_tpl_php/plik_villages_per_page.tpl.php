<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2023-02-26 22:48:05
         Wersja PHP pliku pliki_tpl/villages_per_page.tpl */ ?>
<div style="padding: 7px 2px;">
	<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['screen']; ?>
&mode=<?php echo $this->_tpl_vars['mode']; ?>
&action=change_villages_per_page&h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="POST"/>
		Número de aldeias por página:&nbsp;
		<input type="text" value="<?php echo $this->_tpl_vars['user_villages_per_page']; ?>
" size="3" name="value"/>&nbsp;
		<input type="submit" size="2" value="OK" name="sub"/>
	</form>
</div>