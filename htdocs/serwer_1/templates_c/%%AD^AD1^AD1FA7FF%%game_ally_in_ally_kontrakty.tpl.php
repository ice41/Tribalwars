<?php /* Smarty version 2.6.14, created on 2011-12-18 20:28:06
         compiled from game_ally_in_ally_kontrakty.tpl */ ?>
<p>
	Na tej stronie mo�na zarz�dza� stosunkami dyplomatycznymi z innymi plemionami. Ustawienia <strong>nie s� obowi�zuj�ce w praktyce</strong>, wioski s� ukazywane w innych kolorach dla rozr�nienia. Stosunki te s� widoczne tylko dla cz�onk�w plemienia i mog� by� zmieniane wy��cznie przez osoby posiadaj�ce odpowiednie prawa w plemieniu.
</p>
<?php if (! empty ( $this->_tpl_vars['err'] )): ?>
	<font class="error"/><?php echo $this->_tpl_vars['err']; ?>
</font>
<?php endif; ?>
<table id="partners" class="vis" width="100%">
	<tbody>
		<tr>
			<th colspan="2">Sprzymierze�cy</th>
		</tr>
			
		<?php $_from = $this->_tpl_vars['kontrakty']['partner']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['kontrakt']):
?>
			<tr>
				<td>
					<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_ally&amp;id=<?php echo $this->_tpl_vars['kontrakt']['do_plemienia']; ?>
"><?php echo $this->_tpl_vars['kontrakt']['do_plemienia_tag']; ?>
</a>
				</td>
				<?php if ($this->_tpl_vars['dyplomata']): ?>
					<td>
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=kontrakty&amp;action=cancel_contract&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
&amp;id=<?php echo $this->_tpl_vars['kontrakt']['id']; ?>
">zako�cz</a>
					</td>
				<?php endif; ?>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
		
		<tr>
			<td colspan="2" style="background: transparent none repeat scroll 0%; height: 12px;"></td>
		</tr>

		<tr>
			<th colspan="2">Pakty o nieagresji</th>
		</tr>
		
		<?php $_from = $this->_tpl_vars['kontrakty']['nap']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['kontrakt']):
?>
			<tr>
				<td>
					<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_ally&amp;id=<?php echo $this->_tpl_vars['kontrakt']['do_plemienia']; ?>
"><?php echo $this->_tpl_vars['kontrakt']['do_plemienia_tag']; ?>
</a>
				</td>
				<?php if ($this->_tpl_vars['dyplomata']): ?>
					<td>
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=kontrakty&amp;action=cancel_contract&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
&amp;id=<?php echo $this->_tpl_vars['kontrakt']['id']; ?>
">zako�cz</a>
					</td>
				<?php endif; ?>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
		
		<tr>
			<td colspan="2" style="background: transparent none repeat scroll 0%; height: 12px;"></td>
		</tr>
		
		<tr>
			<th colspan="2">Wrogowie</th>
		</tr>
		
		<?php $_from = $this->_tpl_vars['kontrakty']['enemy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['kontrakt']):
?>
			<tr>
				<td>
					<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_ally&amp;id=<?php echo $this->_tpl_vars['kontrakt']['do_plemienia']; ?>
"><?php echo $this->_tpl_vars['kontrakt']['do_plemienia_tag']; ?>
</a>
				</td>
				<?php if ($this->_tpl_vars['dyplomata']): ?>
					<td>
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=kontrakty&amp;action=cancel_contract&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
&amp;id=<?php echo $this->_tpl_vars['kontrakt']['id']; ?>
">zako�cz</a>
					</td>
				<?php endif; ?>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
	</tbody>
</table>
<?php if ($this->_tpl_vars['dyplomata']): ?>
	<br style="clear: both;">
	<h3>dodaj nowy stosunek</h3>
	<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=kontrakty&amp;action=add_contract&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
		<label for="tag">Skr�t nazwy plemienia:</label> 
		<input name="tag" type="text">
		<select name="type">
			<option value="partner">Sprzymierzeniec</option>
			<option value="nap">Pakty o nieagresji</option>

			<option value="enemy">Wr�g</option>
		</select>
		<input value="OK" type="submit">
	</form>
<?php endif; ?>