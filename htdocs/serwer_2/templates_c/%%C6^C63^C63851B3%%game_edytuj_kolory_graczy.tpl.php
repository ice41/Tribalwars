<?php /* Smarty version 2.6.14, created on 2011-12-20 19:33:51
         compiled from game_edytuj_kolory_graczy.tpl */ ?>
<h2>
</font><br><br>
&screen=edytuj_kolory_graczy&akcja=dodaj_gracza&h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
" name="gracz"/>
    foreach ($_from as $this->_tpl_vars['odznaczenie']):
?>
&screen=info_player&id=<?php echo $this->_tpl_vars['odznaczenie']['do_gracz_id']; ?>
"/><?php echo $this->_tpl_vars['odznaczenie']['do_gracz_name']; ?>
</a>
);"/>
&screen=edytuj_kolory_graczy&akcja=usun_gracza&id=<?php echo $this->_tpl_vars['odznaczenie']['id']; ?>
">&raquo;