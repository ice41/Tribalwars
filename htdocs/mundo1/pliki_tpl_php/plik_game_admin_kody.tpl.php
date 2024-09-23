<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2024-09-23 01:40:38
         Wersja PHP pliku pliki_tpl/game_admin_kody.tpl */ ?>
<?php if ($this->_tpl_vars['premium']): ?><center><b><?php echo $this->_tpl_vars['lang']['admin']['code']['title']; ?>
</b><br/>
<?php echo $this->_tpl_vars['lang']['admin']['code']['title2']; ?>
<hr/>
<?php echo $this->_tpl_vars['lang']['admin']['code']['codes']['1']; ?>
 <b><?php echo $this->_tpl_vars['kody_n']; ?>
</b> <?php echo $this->_tpl_vars['lang']['admin']['code']['codes']['2']; ?>
 <b><?php echo $this->_tpl_vars['kody_u']; ?>
</b> <?php echo $this->_tpl_vars['lang']['admin']['code']['codes']['3']; ?>
<hr/>
<form action='game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=admin&mode=kody&act=vip' method='post'>
<textarea name='kody' style='width:400px; height:200px;'></textarea><br/>
<?php echo $this->_tpl_vars['lang']['admin']['code']['codes']['pkt']; ?>
?<br>
<input type="radio" name="typ" value="1" /> 50<br>
<input type="radio" name="typ" value="2" /> 150<br>
<input type="radio" name="typ" value="3" /> 300<br>


<input type='submit' class='btn btn-big' value='<?php echo $this->_tpl_vars['lang']['admin']['code']['add']; ?>
'/>
</form><?php else: ?><center><h4><font color="red"><?php echo $this->_tpl_vars['lang']['admin']['errors']['code']['premiumoff']; ?>
</font></h4><?php endif; ?>