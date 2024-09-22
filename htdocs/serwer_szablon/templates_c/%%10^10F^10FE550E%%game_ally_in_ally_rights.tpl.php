<?php /* Smarty version 2.6.14, created on 2011-12-23 21:00:55
         compiled from game_ally_in_ally_rights.tpl */ ?>
<script type="text/javascript">
function set_found_right() {
  check_and_disable("lead", gid("found").checked);
  set_lead_right();
}

function set_lead_right() {
  var checked = gid("lead").checked;
  check_and_disable("invite", checked);
  check_and_disable("diplomacy", checked);
  check_and_disable("mass_mail", checked);
  check_and_disable("forum_mod", checked);
  check_and_disable("internal_forum", checked);
}

function check_and_disable(name, check) {
  gid(name).disabled = check;
  if(check == true) {
    gid(name).checked = check;
  }
}
</script>

<h3>Zmieñ prawa dla <?php echo $this->_tpl_vars['rights']['username']; ?>
</h3>
<p>Tu mo¿esz rozdaæ prawa cz³onkom plemienia. Prawa powinieneœ daæ graczom, których znasz i którym ufasz.</p>
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=rights&amp;action=edit_rights&amp;player_id=<?php echo $this->_tpl_vars['rights']['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">

<label><h5><input type="checkbox" name="found" id="found" onchange="set_found_right()" <?php if ($this->_tpl_vars['rights']['ally_found'] == 1): ?>checked="checked"<?php endif; ?> <?php if ($this->_tpl_vars['user']['ally_found'] == 0): ?>disabled="disabled"<?php endif; ?>> <img src="graphic/ally_rights/found.png"/> Za³o¿yciel plemienia </h5></label>
<p>Wybierzcie za³o¿yciela plemienia. Bêdzie on posiada³ prawa rozwi¹zania plemienia, zmieniania nazwy, wpisywania strony, kana³u IRC i rozdawania praw operatorskich.</p>

<label><h5><input type="checkbox" name="lead" id="lead" onchange="set_lead_right()" <?php if ($this->_tpl_vars['rights']['ally_found'] == 1): ?>disabled="disabled"<?php endif; ?> <?php if ($this->_tpl_vars['rights']['ally_lead'] == 1): ?>checked="checked"<?php endif; ?>> <img src="graphic/ally_rights/lead.png"/>Administracja plemienia</h5></label>
<p>Cz³onkowie operatorscy mog¹ rozdawaæ prawa i tytu³y innym graczom, mog¹ wypraszaæ graczy i maj¹ wszystkie inne prawa.</p>

<label><h5><input type="checkbox" name="invite" id="invite" <?php if ($this->_tpl_vars['rights']['ally_found'] == 1 || $this->_tpl_vars['rights']['ally_lead'] == 1): ?>disabled="disabled"<?php endif; ?> <?php if ($this->_tpl_vars['rights']['ally_invite'] == 1): ?>checked="checked"<?php endif; ?>> <img src="graphic/ally_rights/invite.png"/> Zaproœ</h5></label>
<p>Ten gracz mo¿e zapraszaæ nowych graczy.</p>

<label><h5><input type="checkbox" name="diplomacy" id="diplomacy" <?php if ($this->_tpl_vars['rights']['ally_found'] == 1 || $this->_tpl_vars['rights']['ally_lead'] == 1): ?>disabled="disabled"<?php endif; ?> <?php if ($this->_tpl_vars['rights']['ally_diplomacy'] == 1): ?>checked="checked"<?php endif; ?>> <img src="graphic/ally_rights/diplomacy.png"/>  Dyplomacja </h5></label>
<p>To prawo pozwala graczowi zmieniaæ profil plemienia oraz zaznaczaæ sojusze i pakty o nieagresji.</p>

<label><h5><input type="checkbox" name="mass_mail" id="mass_mail" <?php if ($this->_tpl_vars['rights']['ally_found'] == 1 || $this->_tpl_vars['rights']['ally_lead'] == 1): ?>disabled="disabled"<?php endif; ?> <?php if ($this->_tpl_vars['rights']['ally_mass_mail'] == 1): ?>checked="checked"<?php endif; ?>> <img src="graphic/ally_rights/mass_mail.png"/>   Wiadomoœæ grupowa </h5></label>
<p>Gracz mo¿e wysy³aæ wiadomoœci do ca³ego plemienia</p>

<h3>Tytu³</h3>
<p>Tytu³ w plemieniu: <input type="text" name="title" maxlength="24" value="<?php echo $this->_tpl_vars['rights']['ally_titel']; ?>
"></p>
<p><input type="submit" value="OK"></p>
</form>