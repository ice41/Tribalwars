<?php /* Smarty version 2.6.14, created on 2012-03-08 11:19:19
         compiled from game_settings_move.tpl */ ?>
<h3>Zacznij od nowa</h3>
<p>Je�eli jeste� pewien, �e nie masz szans na przetrwanie w twojej okolicy, masz mo�liwo�� startu w nowej wiosce. Twoja stara wioska zostanie w takim wypadku opuszczona, a ty masz mo�liwo�� za�o�y� now� wiosk� na nowym miejscu.</p>

<p>Po ponownym rozpocz�ciu musisz zaczeka� 3 dni by mie� mo�liwo�� zrobi� to po raz kolejny. Restart jest mo�liwy tylko wtedy, gdy masz dok�adnie jedn� wiosk�.</p>

<?php if ($this->_tpl_vars['form']): ?>
	<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=move&amp;action=move&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
		Podaj has�o dla potwierdzenia: <input name="password" type="password">
		<input value="OK" type="submit">
	</form>
<?php else: ?>
	<b>Mo�liwe w : <?php echo $this->_tpl_vars['mozliwe_o']; ?>
</b>
<?php endif; ?>