<?php /* Smarty version 2.6.14, created on 2012-03-08 11:19:19
         compiled from game_settings_move.tpl */ ?>
<h3>Zacznij od nowa</h3>
<p>Je¿eli jesteœ pewien, ¿e nie masz szans na przetrwanie w twojej okolicy, masz mo¿liwoœæ startu w nowej wiosce. Twoja stara wioska zostanie w takim wypadku opuszczona, a ty masz mo¿liwoœæ za³o¿yæ now¹ wioskê na nowym miejscu.</p>

<p>Po ponownym rozpoczêciu musisz zaczekaæ 3 dni by mieæ mo¿liwoœæ zrobiæ to po raz kolejny. Restart jest mo¿liwy tylko wtedy, gdy masz dok³adnie jedn¹ wioskê.</p>

<?php if ($this->_tpl_vars['form']): ?>
	<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=move&amp;action=move&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
		Podaj has³o dla potwierdzenia: <input name="password" type="password">
		<input value="OK" type="submit">
	</form>
<?php else: ?>
	<b>Mo¿liwe w : <?php echo $this->_tpl_vars['mozliwe_o']; ?>
</b>
<?php endif; ?>