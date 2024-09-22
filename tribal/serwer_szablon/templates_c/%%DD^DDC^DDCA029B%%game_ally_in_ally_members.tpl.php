<?php /* Smarty version 2.6.14, created on 2012-04-27 21:42:28
         compiled from game_ally_in_ally_members.tpl */ ?>
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=members&amp;action=mod&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post" id="form_rights">
	<table class="vis">
		<tr>
			<th width="280" class="nowrap">Nazwa</th>
			<th width="40" class="nowrap">Ranking</th>
			<th width="80" class="nowrap">Punkty</th>
			<th width="60" class="nowrap">Ranking globalny</th>
			<th width="40" class="nowrap">Wioski</th>
			<?php if ($this->_tpl_vars['user']['ally_lead'] == 1 || $this->_tpl_vars['user']['ally_found'] == 1): ?>
				<th><img src="/ds_graphic/ally_rights/found.png" title="Za³o¿yciel plemienia"></th>
				<th><img src="/ds_graphic/ally_rights/lead.png" title="Administracja plemienia"></th>
				<th><img src="/ds_graphic/ally_rights/invite.png" title="Zaproœ"></th>
				<th><img src="/ds_graphic/ally_rights/diplomacy.png" title="Dyplomacja"></th>
				<th><img src="/ds_graphic/ally_rights/mass_mail.png" title="Wiadomoœæ grupowa"></th>
				<th><img src="/ds_graphic/ally_rights/forum_mod.png" title="Moderator w Forum wewnêtrznym"></th>
				<th><img src="/ds_graphic/ally_rights/internal_forum.png" title="Ukryte forum"></th>
				<th><img src="/ds_graphic/ally_rights/trusted.png" title="Zaufany cz³onek"></th>
				<th class="nowrap">Zastêpstwo</th>
			<?php endif; ?>
		</tr>
		<?php $_from = $this->_tpl_vars['members']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
			<tr <?php if ($this->_tpl_vars['id'] == $this->_tpl_vars['user']['id']): ?>class="selected"<?php endif; ?>>
				<td class="lit-item">
					<?php if ($this->_tpl_vars['user']['ally_lead'] == 1 || $this->_tpl_vars['user']['ally_found'] == 1): ?>
						<input type="radio" name="sel_player_id" value="<?php echo $this->_tpl_vars['id']; ?>
" />	
						<?php $_from = $this->_tpl_vars['arr']['icons']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['graphic']):
?>
							<img src="/ds_graphic/stat/<?php echo $this->_tpl_vars['graphic']; ?>
.png" title="" alt="" /> 
						<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
					<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['id']; ?>
">
						<?php echo $this->_tpl_vars['arr']['username']; ?>

					</a> 
					<?php if (! empty ( $this->_tpl_vars['arr']['ally_titel'] )): ?>
						(<?php echo $this->_tpl_vars['arr']['ally_titel']; ?>
)
					<?php endif; ?>
				</td>
				<td class="lit-item">
					<?php echo $this->_tpl_vars['arr']['rank']; ?>

				</td>
				<td class="lit-item">
					<?php echo $this->_tpl_vars['arr']['points']; ?>

				</td>
				<td class="lit-item">
					<?php echo $this->_tpl_vars['arr']['rang']; ?>

				</td>
				<td class="lit-item">
					<?php echo $this->_tpl_vars['arr']['villages']; ?>

				</td>
				
				<?php if ($this->_tpl_vars['user']['ally_lead'] == 1 || $this->_tpl_vars['user']['ally_found'] == 1): ?>
					<td class="lit-item">
						<div class="show_toggle">
							<?php if ($this->_tpl_vars['arr']['ally_found'] == 1): ?>
								<img src="/ds_graphic/dots/green.png?1" alt="Tak" />
							<?php else: ?>
								<img src="/ds_graphic/dots/grey.png?1" alt="Nie" />
							<?php endif; ?>
						</div>
						<input type="checkbox" <?php if ($this->_tpl_vars['user']['ally_lead'] == 1 && $this->_tpl_vars['user']['ally_found'] == 0): ?>disabled="disabled"<?php endif; ?> name="player_id[<?php echo $this->_tpl_vars['id']; ?>
][found]" id="player_id[<?php echo $this->_tpl_vars['id']; ?>
][found]" onclick="set_found_right(<?php echo $this->_tpl_vars['id']; ?>
)" <?php if ($this->_tpl_vars['arr']['ally_found'] == 1): ?>checked="checked"<?php endif; ?> class="hide_toggle" />
					</td>
					
					<td class="lit-item">
						<div class="show_toggle">
							<?php if ($this->_tpl_vars['arr']['ally_lead'] == 1): ?>
								<img src="/ds_graphic/dots/green.png?1" alt="Tak" />
							<?php else: ?>
								<img src="/ds_graphic/dots/grey.png?1" alt="Nie" />
							<?php endif; ?>
						</div>
						<input type="checkbox" <?php if ($this->_tpl_vars['user']['ally_lead'] == 1 && $this->_tpl_vars['user']['ally_found'] == 0): ?>disabled="disabled"<?php endif; ?> name="player_id[<?php echo $this->_tpl_vars['id']; ?>
][lead]" id="player_id[<?php echo $this->_tpl_vars['id']; ?>
][lead]" onclick="set_lead_right(<?php echo $this->_tpl_vars['id']; ?>
)" <?php if ($this->_tpl_vars['arr']['ally_lead'] == 1): ?>checked="checked"<?php endif; ?> class="hide_toggle" />
					</td>
					
					<td class="lit-item">
						<div class="show_toggle">
							<?php if ($this->_tpl_vars['arr']['ally_invite'] == 1): ?>
								<img src="/ds_graphic/dots/green.png?1" alt="Tak" />
							<?php else: ?>
								<img src="/ds_graphic/dots/grey.png?1" alt="Nie" />
							<?php endif; ?>
						</div>
						<input type="checkbox" name="player_id[<?php echo $this->_tpl_vars['id']; ?>
][invite]" id="player_id[<?php echo $this->_tpl_vars['id']; ?>
][invite]" <?php if ($this->_tpl_vars['arr']['ally_invite'] == 1): ?>checked="checked"<?php endif; ?> class="hide_toggle" />
					</td>
					
					<td class="lit-item">
						<div class="show_toggle">
							<?php if ($this->_tpl_vars['arr']['ally_diplomacy'] == 1): ?>
								<img src="/ds_graphic/dots/green.png?1" alt="Tak" />
							<?php else: ?>
								<img src="/ds_graphic/dots/grey.png?1" alt="Nie" />
							<?php endif; ?>
						</div>
						<input type="checkbox" name="player_id[<?php echo $this->_tpl_vars['id']; ?>
][diplomacy]" id="player_id[<?php echo $this->_tpl_vars['id']; ?>
][diplomacy]" <?php if ($this->_tpl_vars['arr']['ally_diplomacy'] == 1): ?>checked="checked"<?php endif; ?> class="hide_toggle" />
					</td>
					
					<td class="lit-item">
						<div class="show_toggle">
							<?php if ($this->_tpl_vars['arr']['ally_mass_mail'] == 1): ?>
								<img src="/ds_graphic/dots/green.png?1" alt="Tak" />
							<?php else: ?>
								<img src="/ds_graphic/dots/grey.png?1" alt="Nie" />
							<?php endif; ?>
						</div>
						<input type="checkbox" name="player_id[<?php echo $this->_tpl_vars['id']; ?>
][mass_mail]" id="player_id[<?php echo $this->_tpl_vars['id']; ?>
][mass_mail]" <?php if ($this->_tpl_vars['arr']['ally_mass_mail'] == 1): ?>checked="checked"<?php endif; ?> class="hide_toggle" />
					</td>
					
					<td class="lit-item">
						<div class="show_toggle">
							<?php if ($this->_tpl_vars['arr']['ally_mod_forum'] == 1): ?>
								<img src="/ds_graphic/dots/green.png?1" alt="Tak" />
							<?php else: ?>
								<img src="/ds_graphic/dots/grey.png?1" alt="Nie" />
							<?php endif; ?>
						</div>
						<input type="checkbox" name="player_id[<?php echo $this->_tpl_vars['id']; ?>
][forum_mod]" id="player_id[<?php echo $this->_tpl_vars['id']; ?>
][forum_mod]" <?php if ($this->_tpl_vars['arr']['ally_mod_forum'] == 1): ?>checked="checked"<?php endif; ?> class="hide_toggle" />
					</td>
					
					<td class="lit-item">
						<div class="show_toggle">
							<?php if ($this->_tpl_vars['arr']['ally_forum_switch'] == 1): ?>
								<img src="/ds_graphic/dots/green.png?1" alt="Tak" />
							<?php else: ?>
								<img src="/ds_graphic/dots/grey.png?1" alt="Nie" />
							<?php endif; ?>
						</div>
						<input type="checkbox" name="player_id[<?php echo $this->_tpl_vars['id']; ?>
][internal_forum]" id="player_id[<?php echo $this->_tpl_vars['id']; ?>
][internal_forum]" <?php if ($this->_tpl_vars['arr']['ally_forum_switch'] == 1): ?>checked="checked"<?php endif; ?> class="hide_toggle" />
					</td>
					
					<td class="lit-item">
						<div class="show_toggle">
							<?php if ($this->_tpl_vars['arr']['ally_forum_trust'] == 1): ?>
								<img src="/ds_graphic/dots/green.png?1" alt="Tak" />
							<?php else: ?>
								<img src="/ds_graphic/dots/grey.png?1" alt="Nie" />
							<?php endif; ?>
						</div>
						<input type="checkbox" name="player_id[<?php echo $this->_tpl_vars['id']; ?>
][trusted_member]" id="player_id[<?php echo $this->_tpl_vars['id']; ?>
][trusted_member]" <?php if ($this->_tpl_vars['arr']['ally_forum_trust'] == 1): ?>checked="checked"<?php endif; ?> class="hide_toggle" />
					</td>
					
					
					<td class="lit-item">
					<?php if (! empty ( $this->_tpl_vars['arr']['vacation_id'] )): ?>
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['arr']['vacation_id']; ?>
"><?php echo $this->_tpl_vars['arr']['vacation_name']; ?>
</a>
					<?php endif; ?>
					</td>
				<?php endif; ?>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
		<?php if ($this->_tpl_vars['user']['ally_lead'] == 1 || $this->_tpl_vars['user']['ally_found'] == 1): ?>
			<tr>
				<td class="no_bg">
					<div class="show_toggle">
						<select name="ally_action">
							<option value="">Wybierz akcjê...</option>
							<option value="rights">Prawa i tytu³</option>
							<option value="kick">Wyproœ</option>
						</select>
						<input type="submit" value="OK" />
					</div>
					<input type="submit" value="Zapisz prawa" class="hide_toggle" />
					<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=members" class="hide_toggle">
						&raquo; przerwij
					</a>
				</td>
				<td colspan="11" class="no_bg align_right">
					<a href="#" onclick="toggle_visibility_by_class('hide_toggle','inline'); toggle_visibility_by_class('show_toggle'); toggle_form_action('form_rights', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=members&amp;action=edit_rights&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
');" class="show_toggle">
						&raquo; Zarz¹dzaj prawami
					</a>
				</td>
			</tr>
		<?php endif; ?>
	</table>
</form>

<br />

<table class="vis">
	<tr>
		<th>Status</th>
	</tr>
	<tr>
		<td><img src="/ds_graphic/stat/green.png?1" alt="" />aktywny</td>
	</tr>
	<tr>
		<td><img src="/ds_graphic/stat/yellow.png?1" alt="" /> nieaktywny od 2 dni</td>
	</tr>
	<tr>
		<td><img src="/ds_graphic/stat/red.png?1" alt="" /> nieaktywny od tygodnia</td>
	</tr>
	<tr>
		<td><img src="/ds_graphic/stat/vacation.png?1" alt="" /> Zastêpstwo</td>
	</tr>
	<tr>
		<td><img src="/ds_graphic/stat/birthday.png?1" alt="" /> Urodziny</td>
	</tr>
	<tr>
		<td><img src="/ds_graphic/stat/banned.png?1" alt="" /> zablokowany</td>
	</tr>
</table>

<div style="font-size: 7pt;">
	Status mog¹ widzieæ tylko administratorzy plemienia.
</div>

<?php echo '
	<script type="text/javascript">
		function toggle_visibility_by_class(classname,display){if(display==\'table-row\')display=\'\';$("."+classname).each(function(){if($(this).css(\'display\')==\'none\'){$(this).css(\'display\',display)}else $(this).css(\'display\',\'none\')})}
		
		function set_found_right(memberid) {
			check_and_disable(\'#player_id\\\\[\'+memberid+\'\\\\]\\\\[lead\\\\]\', $(\'#player_id\\\\[\'+memberid+\'\\\\]\\\\[found\\\\]\').is(\':checked\'));
			set_lead_right(memberid);
			}

		function set_lead_right(memberid) {
			var checked = $(\'#player_id\\\\[\'+memberid+\'\\\\]\\\\[lead\\\\]\').is(\':checked\');
			check_and_disable(\'#player_id\\\\[\'+memberid+\'\\\\]\\\\[invite\\\\]\', checked);
			check_and_disable(\'#player_id\\\\[\'+memberid+\'\\\\]\\\\[diplomacy\\\\]\', checked);
			check_and_disable(\'#player_id\\\\[\'+memberid+\'\\\\]\\\\[mass_mail\\\\]\', checked);
			check_and_disable(\'#player_id\\\\[\'+memberid+\'\\\\]\\\\[forum_mod\\\\]\', checked);
			check_and_disable(\'#player_id\\\\[\'+memberid+\'\\\\]\\\\[internal_forum\\\\]\', checked);
			check_and_disable(\'#player_id\\\\[\'+memberid+\'\\\\]\\\\[trusted_member\\\\]\', checked);
			}

		function check_and_disable(name, check) {
			$(name).attr(\'disabled\', check);
			if(check == true) {
				$(name).attr(\'checked\', check);
				}
			}

		function toggle_form_action(name, action) {
			$(\'#\' + name).attr(\'action\', action);
			}
	</script>
'; ?>