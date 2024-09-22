<?php /* Smarty version 2.6.14, created on 2011-12-23 20:51:22
         compiled from game_ally_in_ally_members.tpl */ ?>
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=members&amp;action=mod&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
<table class="vis">
<tr>
  <th width="280">Nazwa</th>
  <th width="40">Ranking</th>
  <th width="80">Punkty</th>
  <th width="40">Wioski</th>
  <?php if ($this->_tpl_vars['user']['ally_lead'] == 1 || $this->_tpl_vars['user']['ally_found'] == 1): ?>
	  <th><img src="graphic/ally_rights/found.png" title="Za³o¿yciel" /></th>
	  <th><img src="graphic/ally_rights/lead.png" title="Administrator" /></th>
	  <th><img src="graphic/ally_rights/invite.png" title="Zaproszenie" /></th>
	  <th><img src="graphic/ally_rights/diplomacy.png" title="Dyplomacja" /></th>
	  <th><img src="graphic/ally_rights/mass_mail.png" title="Masowa wiadomoœæ" /></th>
	  <th>Zastêpstwo</th>
  <?php endif; ?>
</tr>

    <?php $_from = $this->_tpl_vars['members']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
		<tr <?php if ($this->_tpl_vars['id'] == $this->_tpl_vars['user']['id']): ?>class="lit"<?php endif; ?>>
			<td>
				<?php if ($this->_tpl_vars['user']['ally_lead'] == 1 || $this->_tpl_vars['user']['ally_found'] == 1): ?><input type="radio" name="player_id" value="<?php echo $this->_tpl_vars['id']; ?>
" />	<?php $_from = $this->_tpl_vars['arr']['icons']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['graphic']):
?><img src="graphic/stat/<?php echo $this->_tpl_vars['graphic']; ?>
.png" title="" alt="" /> <?php endforeach; endif; unset($_from);  endif; ?><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['arr']['username']; ?>
</a> <?php if (! empty ( $this->_tpl_vars['arr']['ally_titel'] )): ?>(<?php echo $this->_tpl_vars['arr']['ally_titel']; ?>
)<?php endif; ?>
			</td>
			<td><?php echo $this->_tpl_vars['arr']['rank']; ?>
</td>
			<td><?php echo $this->_tpl_vars['arr']['points']; ?>
</td>
			<td><?php echo $this->_tpl_vars['arr']['villages']; ?>
</td>
			<?php if ($this->_tpl_vars['user']['ally_lead'] == 1 || $this->_tpl_vars['user']['ally_found'] == 1): ?>
				<td><?php if ($this->_tpl_vars['arr']['ally_found'] == 1): ?><img src="graphic/dots/green.png"/><?php else: ?><img src="graphic/dots/grey.png"/><?php endif; ?></td>
				<td><?php if ($this->_tpl_vars['arr']['ally_lead'] == 1): ?><img src="graphic/dots/green.png"/><?php else: ?><img src="graphic/dots/grey.png"/><?php endif; ?></td>
				<td><?php if ($this->_tpl_vars['arr']['ally_invite'] == 1): ?><img src="graphic/dots/green.png"/><?php else: ?><img src="graphic/dots/grey.png"/><?php endif; ?></td>
				<td><?php if ($this->_tpl_vars['arr']['ally_diplomacy'] == 1): ?><img src="graphic/dots/green.png"/><?php else: ?><img src="graphic/dots/grey.png"/><?php endif; ?></td>
				<td><?php if ($this->_tpl_vars['arr']['ally_mass_mail'] == 1): ?><img src="graphic/dots/green.png"/><?php else: ?><img src="graphic/dots/grey.png"/><?php endif; ?></td>
				<td><?php if (! empty ( $this->_tpl_vars['arr']['vacation_id'] )): ?><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['arr']['vacation_id']; ?>
"><?php echo $this->_tpl_vars['arr']['vacation_name']; ?>
</a><?php endif; ?></td>
			<?php endif; ?>
		</tr>
 <?php endforeach; endif; unset($_from); ?>

</table>
<?php if ($this->_tpl_vars['user']['ally_lead'] == 1 || $this->_tpl_vars['user']['ally_found'] == 1): ?>
	<select name="action"><option label="Wybierz akcjê..." value="">Wybierz akcjê...</option>
	<option label="Rechte und Titel" value="rights">Prawa i tytu³</option>
	<option label="Entlassen" value="kick">Wyproœ</option>
	</select>
	<input type="submit" value="OK" />
<?php endif; ?>
</form>

<?php if ($this->_tpl_vars['user']['ally_lead'] == 1 || $this->_tpl_vars['user']['ally_found'] == 1): ?>
	<br />

	<table class="vis">
<tbody><tr><th>Status</th></tr>
<tr><td><img src="graphic/stat/green.png?1" alt=""> aktywny</td></tr>
<tr><td><img src="graphic/stat/yellow.png?1" alt=""> nieaktywny od 2 dni</td></tr>
<tr><td><img src="graphic/stat/red.png?1" alt=""> nieaktywny od tygodnia</td></tr>
<tr><td><img src="graphic/stat/vacation.png?1" alt=""> Zastêpstwo</td></tr>

<tr><td><img src="graphic/stat/birthday.png?1" alt=""> Urodziny</td></tr>
<tr><td><img src="graphic/stat/banned.png?1" alt=""> zablokowany</td></tr>
</tbody></table>
<div style="font-size: 7pt;">Status mog¹ widzieæ tylko administratorzy plemienia.</div>
<?php endif; ?>