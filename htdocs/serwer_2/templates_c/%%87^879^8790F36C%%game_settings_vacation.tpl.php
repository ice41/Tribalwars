<?php /* Smarty version 2.6.14, created on 2012-01-22 22:44:33
         compiled from game_settings_vacation.tpl */ ?>
<h3>Zastêpstwo</h3>
<p>Jeœli chcesz, aby ktoœ ci "popilnowa³" konta, mo¿esz poprosiæ dowolnego gracza o zastêpstwo</p>

<p>Podczas trwania zastêpstwa zastêpca nie mo¿e:</p>
<ul>
<li>Przesy³aæ surowców</li>
<li>Wysy³aæ ataków</li>

<li>Przeprowadzaæ skoordynowanych ataków</li>
</ul>

<?php 
$this->_tpl_vars['vacation_is_cancq'] = false;
  if ($this->_tpl_vars['vacation_is_cancq']): ?>

<?php if (empty ( $this->_tpl_vars['user']['vacation_name'] )): ?>
	<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=vacation&amp;action=sitter_offer&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
		<table class="vis">
		<tr>
			<th>Zastêpca</th>
			<td><input name="sitter" type="text" /> <input type="submit" value="OK" /></td>
	
		</tr>
	    </table>
	</form>
<?php else: ?>
	<?php if ($this->_tpl_vars['sid']->is_vacation()): ?>
		<p>
		<a href="javascript:ask('Czy chcesz na pewno zakoñczyæ zastêpstwo?', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=vacation&amp;action=end_vacation&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
')">Zakoñcz zastêpstwo</a>
		</p>
	<?php else: ?>
		<table class="vis">
		<tr>
			<td>Wys³ano do:</td>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['user']['vacation_id']; ?>
"><?php echo $this->_tpl_vars['user']['vacation_name']; ?>
</a></td>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=vacation&amp;action=sitter_offer_cancel&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">&raquo; Cofn¹æ proœbê</a></td>
		</tr>
		</table>
	<?php endif;  endif; ?>

<?php if (count ( $this->_tpl_vars['vacation_accept'] ) > 0 && ! $this->_tpl_vars['sid']->is_vacation()): ?>
	<h3>Aktywowane zastêpstwa</h3>
	<p>Tutaj mo¿esz siê przelogowaæ na konto zastêpowanego gracza:</p>
	<table class="vis">
	<tr><th width="200">Gracz</th></tr>
	<?php $_from = $this->_tpl_vars['vacation_accept']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
		<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['arr']['username']; ?>
</a></td>
		<td><a href="login_uv.php?id=<?php echo $this->_tpl_vars['id']; ?>
" target="_blank">&raquo; Wyloguj</a></td>	</tr>
	<?php endforeach; endif; unset($_from); ?>
	</table>
<?php endif; ?>

<?php if (count ( $this->_tpl_vars['vacation'] ) > 0 && ! $this->_tpl_vars['sid']->is_vacation()): ?>
	<h3>Proœby o zastêpstwo</h3>
	<p>Gracze, którzy prosz¹ ciê o przyjêcie zastêpstwa</p>
	<table class="vis">
	<tr><th>Gracz</th><th colspan="2">Akcja</th></tr>
	<?php $_from = $this->_tpl_vars['vacation']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
		<tr>
		<td width="200"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['arr']['username']; ?>
</a></td>
		<td width="100"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=vacation&amp;action=sitter_accept&amp;player_id=<?php echo $this->_tpl_vars['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Przyj¹æ</a></td>
		<td width="100"><a href="javascript:ask('Czy chcesz od¿uciæ t¹ propozycjê?', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=vacation&amp;action=sitter_reject&amp;player_id=<?php echo $this->_tpl_vars['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
')">Od¿uciæ</a></td>
		</tr>
	<?php endforeach; endif; unset($_from);  endif; ?>

<?php else: ?>
<span class="error"/>Opcja zastêpstwa zosta³a wy³¹czona przez administracjê gry.</span>
<?php endif; ?>