<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2024-09-23 02:17:59
         Wersja PHP pliku pliki_tpl/game_settings_award.tpl */ ?>
<h3>Medalhas</h3>

<form method="post" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=award&amp;action=h_set&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">
	<table class="vis">
		<tbody><tr>
			<td><input name="hide_own_awards" type="checkbox" <?php if ($this->_tpl_vars['setts']['hide_own_awards']): ?>checked="checked"<?php endif; ?>>Mostre seus proprios emblemas em seu perfil</td>
		</tr>
		<tr>
			<td><input name="hide_own_wtwaw" type="checkbox" <?php if ($this->_tpl_vars['setts']['hide_own_wtwaw']): ?>checked="checked"<?php endif; ?>>Mostre seus próprios emblemas de classificacao</td>
		</tr>
		<tr>
			<td><input value="Salvar" type="submit"></td>
		</tr>
</tbody></table>
</form>