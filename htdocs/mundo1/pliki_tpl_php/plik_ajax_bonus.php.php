<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2024-09-23 01:40:26
         Wersja PHP pliku pliki_tpl/ajax_bonus.php */ ?>
{"html":"<div id=\"active_server\">\n\t\t\t\t\t<p class=\"pseudo-heading\">Tem <?php echo $this->_tpl_vars['ilosc_sz']; ?>
 Pontos premium!<center><p class=\"pseudo-heading\">Menu premium:<\/center><\/p>\n\t\t\t\t\t\t\t<div class=\"clearfix\">\n\t\t\t\t\t\t<a href=\"game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=kody\">\n\t\t\t\t<span class=\"world_button_active\">Codigo<\/span>\n\t\t\t<\/a>\n\t\t\t\t\t\t<a href=\"game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=kody&mode=przeslij\">\n\t\t\t\t<span class=\"world_button_active\">Mandar<\/span>\n\t\t\t<\/a><?php if ($this->_tpl_vars['user']['admin'] == 0): ?>\n\t\t\t\t\t\t<a href=\"game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=admin&mode=kody\">\n\t\t\t\t<span class=\"world_button_active\">Novos códigos<\/span>\n\t\t\t<\/a>\n\t\t\t\t\t\t<a href=\"game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=kody&mode=dodaj\">\n\t\t\t\t<span class=\"world_button_active\">Adicione pp<\/span>\n\t\t\t<\/a><?php endif; ?>\n\t\t\t\t\t\t<\/div>\n\t\t\n\t\t\n\t\t\t\t\t<p class=\"pseudo-heading\" id=\"show_all_server\">\n\t\t\t\t<a href=\"#\" onclick=\"$('#show_all_server').hide();$('#inactive_server_list').show();return false\"><\/a>\n\t\t\t<\/p>\n\t\t    <\/div>\n\n    \t<div id=\"inactive_server_list\" class=\"clearfix\" style=\"display:none;\">\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t<\/div>"}