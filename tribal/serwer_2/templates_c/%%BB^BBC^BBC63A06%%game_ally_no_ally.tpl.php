<?php /* Smarty version 2.6.14, created on 2014-07-03 03:09:05
         compiled from game_ally_no_ally.tpl */ ?>
<h2>Plemi�</h2>
<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<div style="color:red; font-size:large"><?php echo $this->_tpl_vars['error']; ?>
</div>
<?php endif; ?>
<p>By zosta� cz�onkiem plemienia, musisz zosta� zaproszony przez administrator�w lub moderator�w plemienia.</p>

<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;action=create&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
<table class="vis">
<tr><th colspan="2">Utw�rz plemi�</th></tr>
<tr><td>Nazwa plemienia:</td><td><input type="text" name="name" /></td></tr>
<tr><td>Skr�t:
(maksymalnie sze�� liter)</td><td><input type="text" name="tag" maxlength="6" /></td></tr>
</table>
<input type="submit" value="Utw�rz" style="font-size:10pt;" />
</form>
<br />
	
<table class="vis">
<tr><th colspan="3" width="400">Zaproszenia</th></tr>
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
">Przyj��</td>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;action=reject&amp;id=<?php echo $this->_tpl_vars['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Odrzuci�</td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>