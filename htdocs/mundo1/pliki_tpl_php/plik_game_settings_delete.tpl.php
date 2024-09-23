<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2024-09-23 02:21:14
         Wersja PHP pliku pliki_tpl/game_settings_delete.tpl */ ?>
<h3>Apagar conta</h3>
<p>Assim que enviar sua conta para exclusão, não poderá mais fazer login. A conta será excluída imediatamente.</p>
<p>Apenas contas neste mundo serão excluídas. Suas contas no fórum e em outros servidores serão preservadas.</p>

<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=delete&amp;action=delete&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
	Senha: <input name="password" type="password">
	<input value="OK" type="submit">
</form>