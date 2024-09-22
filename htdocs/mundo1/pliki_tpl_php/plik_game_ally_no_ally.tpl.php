<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2023-02-26 21:23:29
         Wersja PHP pliku pliki_tpl/game_ally_no_ally.tpl */ ?>
<h2>Plemi�</h2>
<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<div style="color:red; font-size:large"><?php echo $this->_tpl_vars['error']; ?>
</div>
<?php endif; ?>
<p>Para se tornar membro de uma tribo, deve ser convidado pelos administradores ou moderadores da tribo.</p>

<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;action=create&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
<table class="vis">
<tr><th colspan="2">Criar uma tribo</th></tr>
<tr><td>Nome da tribo:</td><td><input type="text" name="name" /></td></tr>
<tr><td>Abreviatura:
(até seis letras)</td><td><input type="text" name="tag" maxlength="6" /></td></tr>
</table>
<input type="submit" value="criar" style="font-size:10pt;" />
</form>
<br />
	
<table class="vis">
<tr><th colspan="3" width="400">Convites</th></tr>
	<?php $_from = $this->_tpl_vars['invites']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
		<tr>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_ally&amp;id=<?php echo $this->_tpl_vars['arr']['from_ally']; ?>
"><?php echo $this->_tpl_vars['arr']['tag']; ?>
</a></td>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;action=accept_invite&amp;id=<?php echo $this->_tpl_vars['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">aceitar</td>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;action=reject&amp;id=<?php echo $this->_tpl_vars['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Rejeitar</td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>