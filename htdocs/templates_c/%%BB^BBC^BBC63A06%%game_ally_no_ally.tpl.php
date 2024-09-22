<?php /* Smarty version 2.6.14, created on 2012-12-29 04:11:11
         compiled from game_ally_no_ally.tpl */ ?>
<h2>Trib</h2>
<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
         <?php if ($this->_tpl_vars['error'] == 'Der Name muss mindestens 4 Zeichen lang sein!'): ?>
            <?php $this->assign('error', 'Numele trebuie s&#259; aib&#259; minim 4 caractere'); ?>
         <?php endif; ?>
	<div style="color:red; font-size:large"><?php echo $this->_tpl_vars['error']; ?>
</div>
<?php endif; ?>
<p>Pentru a te ata&#351;a unui trib, trebuie s&#259; fii invitat de acesta.</p>

<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;action=create&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
<table class="vis">
<tr>
  <th colspan="2">&#206;nfiin&#355;eaz&#259; un trib</th>
</tr>
<tr><td>Numele tribului:</td><td><input type="text" name="name" /></td></tr>
<tr><td>Prescurtare:<br />
  (maximum 6 caractere)</td><td><input type="text" name="tag" maxlength="6" /></td></tr>
</table>
<input type="submit" value="&#206;ntemeiere" style="font-size:10pt;" />
</form>
<br />
	
<table class="vis">
<tr><th colspan="3" width="400">Invitatii</th></tr>
	<?php $_from = $this->_tpl_vars['invites']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
		<tr>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_ally&amp;id=<?php echo $this->_tpl_vars['arr']['from_ally']; ?>
"><?php echo $this->_tpl_vars['arr']['tag']; ?>
</a></td>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;action=accept&amp;id=<?php echo $this->_tpl_vars['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Accept&#259;</td>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;action=reject&amp;id=<?php echo $this->_tpl_vars['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Refuz&#259;</td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>