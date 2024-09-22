<?php /* Smarty version 2.6.14, created on 2012-01-22 22:44:33
         compiled from game_settings_vacation.tpl */ ?>
<h3>Zast�pstwo</h3>
<p>Je�li chcesz, aby kto� ci "popilnowa�" konta, mo�esz poprosi� dowolnego gracza o zast�pstwo</p>

<p>Podczas trwania zast�pstwa zast�pca nie mo�e:</p>
<ul>
<li>Przesy�a� surowc�w</li>
<li>Wysy�a� atak�w</li>

<li>Przeprowadza� skoordynowanych atak�w</li>
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
			<th>Zast�pca</th>
			<td><input name="sitter" type="text" /> <input type="submit" value="OK" /></td>
	
		</tr>
	    </table>
	</form>
<?php else: ?>
	<?php if ($this->_tpl_vars['sid']->is_vacation()): ?>
		<p>
		<a href="javascript:ask('Czy chcesz na pewno zako�czy� zast�pstwo?', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=vacation&amp;action=end_vacation&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
')">Zako�cz zast�pstwo</a>
		</p>
	<?php else: ?>
		<table class="vis">
		<tr>
			<td>Wys�ano do:</td>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['user']['vacation_id']; ?>
"><?php echo $this->_tpl_vars['user']['vacation_name']; ?>
</a></td>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=vacation&amp;action=sitter_offer_cancel&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">&raquo; Cofn�� pro�b�</a></td>
		</tr>
		</table>
	<?php endif;  endif; ?>

<?php if (count ( $this->_tpl_vars['vacation_accept'] ) > 0 && ! $this->_tpl_vars['sid']->is_vacation()): ?>
	<h3>Aktywowane zast�pstwa</h3>
	<p>Tutaj mo�esz si� przelogowa� na konto zast�powanego gracza:</p>
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
	<h3>Pro�by o zast�pstwo</h3>
	<p>Gracze, kt�rzy prosz� ci� o przyj�cie zast�pstwa</p>
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
">Przyj��</a></td>
		<td width="100"><a href="javascript:ask('Czy chcesz od�uci� t� propozycj�?', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=vacation&amp;action=sitter_reject&amp;player_id=<?php echo $this->_tpl_vars['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
')">Od�uci�</a></td>
		</tr>
	<?php endforeach; endif; unset($_from);  endif; ?>

<?php else: ?>
<span class="error"/>Opcja zast�pstwa zosta�a wy��czona przez administracj� gry.</span>
<?php endif; ?>