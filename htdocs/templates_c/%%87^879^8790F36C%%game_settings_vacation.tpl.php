<?php /* Smarty version 2.6.14, created on 2024-01-10 01:48:38
         compiled from game_settings_vacation.tpl */ ?>
<h3>Jucator de vacanta (loctiitor)</h3>
<p>Aici poti ruga pe cineva sa-ti administreze contul in timp ce tu esti in concediu. Acest jucator se poate loga/inscrie de pe contul lui pe contul tau fara ai oferi parola de la contul tau. In timp ce modul de vacanta este activ, nu ai acces la contul tau.</p>

<p>Pana la 24 ore ore dupa terminarea modului de vacanta nu ai voie sa interactionezi in joc intre contul tau si contul pentru care ai jucat ca loctiitor. Mai ales aceste actiuni sunt interzise:</p>
<ul>
<li>Livrare de resurse</li>
<li>Jefuirea intre jucatori</li>

<li>Atacuri combinate ale celor doua conturi</li>
<li>Trimiterea de trupe de sprijin</li>
</ul>
<?php if (empty ( $this->_tpl_vars['user']['vacation_name'] )): ?>
	<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=vacation&amp;action=sitter_offer&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
		<table class="vis">
		<tr>
			<th>Loctiitor</th>
			<td><input name="sitter" type="text" /> <input type="submit" value="OK" /></td>
	
		</tr>
	    </table>
	</form>
<?php else: ?>
	<?php if ($this->_tpl_vars['sid']->is_vacation()): ?>
		<p>
		<a href="javascript:ask('bla bla...ca pe triburile', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=vacation&amp;action=end_vacation&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
')">Intrerupe modul de vacanta</a>
		</p>
	<?php else: ?>
		<table class="vis">
		<tr>
			<td>Anfrage an:</td>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['user']['vacation_id']; ?>
"><?php echo $this->_tpl_vars['user']['vacation_name']; ?>
</a></td>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=vacation&amp;action=sitter_offer_cancel&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">&raquo;Retrage invitatie</a></td>
		</tr>
		</table>
	<?php endif; ?>
<?php endif; ?>

<?php if (count ( $this->_tpl_vars['vacation_accept'] ) > 0 && ! $this->_tpl_vars['sid']->is_vacation()): ?>
	<h3>Mod de vacanta</h3>
	<p>Aici Vezi cine a facut cerere de sitter</p>
	<table class="vis">
	<tr><th width="200">Jucator</th></tr>
	<?php $_from = $this->_tpl_vars['vacation_accept']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
		<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['arr']['username']; ?>
</a></td>
		<td><a href="login_uv.php?id=<?php echo $this->_tpl_vars['id']; ?>
" target="_blank">&raquo; login</a></td>	</tr>
	<?php endforeach; endif; unset($_from); ?>
	</table>
<?php endif; ?>

<?php if (count ( $this->_tpl_vars['vacation'] ) > 0 && ! $this->_tpl_vars['sid']->is_vacation()): ?>
	<h3>Comanda</h3>
	<p>Aici Vezi cine a facut cerere de sitter</p>
<tr>
<th>JUCATOR</th><th colspan="2">Actiune</th></tr>
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
">accepta</a></td>
		<td width="100"><a href="javascript:ask('Doriti sa refuzati sitterul?', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=vacation&amp;action=sitter_reject&amp;player_id=<?php echo $this->_tpl_vars['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
')">refuza</a></td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>