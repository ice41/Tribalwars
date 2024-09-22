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

<h3>Zmie� prawa dla <?php echo $this->_tpl_vars['rights']['username']; ?>
</h3>
<p>Tu mo�esz rozda� prawa cz�onkom plemienia. Prawa powiniene� da� graczom, kt�rych znasz i kt�rym ufasz.</p>
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=rights&amp;action=edit_rights&amp;player_id=<?php echo $this->_tpl_vars['rights']['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">

<label><h5><input type="checkbox" name="found" id="found" onchange="set_found_right()" <?php if ($this->_tpl_vars['rights']['ally_found'] == 1): ?>checked="checked"<?php endif; ?> <?php if ($this->_tpl_vars['user']['ally_found'] == 0): ?>disabled="disabled"<?php endif; ?>> <img src="graphic/ally_rights/found.png"/> Za�o�yciel plemienia </h5></label>
<p>Wybierzcie za�o�yciela plemienia. B�dzie on posiada� prawa rozwi�zania plemienia, zmieniania nazwy, wpisywania strony, kana�u IRC i rozdawania praw operatorskich.</p>

<label><h5><input type="checkbox" name="lead" id="lead" onchange="set_lead_right()" <?php if ($this->_tpl_vars['rights']['ally_found'] == 1): ?>disabled="disabled"<?php endif; ?> <?php if ($this->_tpl_vars['rights']['ally_lead'] == 1): ?>checked="checked"<?php endif; ?>> <img src="graphic/ally_rights/lead.png"/>Administracja plemienia</h5></label>
<p>Cz�onkowie operatorscy mog� rozdawa� prawa i tytu�y innym graczom, mog� wyprasza� graczy i maj� wszystkie inne prawa.</p>

<label><h5><input type="checkbox" name="invite" id="invite" <?php if ($this->_tpl_vars['rights']['ally_found'] == 1 || $this->_tpl_vars['rights']['ally_lead'] == 1): ?>disabled="disabled"<?php endif; ?> <?php if ($this->_tpl_vars['rights']['ally_invite'] == 1): ?>checked="checked"<?php endif; ?>> <img src="graphic/ally_rights/invite.png"/> Zapro�</h5></label>
<p>Ten gracz mo�e zaprasza� nowych graczy.</p>

<label><h5><input type="checkbox" name="diplomacy" id="diplomacy" <?php if ($this->_tpl_vars['rights']['ally_found'] == 1 || $this->_tpl_vars['rights']['ally_lead'] == 1): ?>disabled="disabled"<?php endif; ?> <?php if ($this->_tpl_vars['rights']['ally_diplomacy'] == 1): ?>checked="checked"<?php endif; ?>> <img src="graphic/ally_rights/diplomacy.png"/>  Dyplomacja </h5></label>
<p>To prawo pozwala graczowi zmienia� profil plemienia oraz zaznacza� sojusze i pakty o nieagresji.</p>

<label><h5><input type="checkbox" name="mass_mail" id="mass_mail" <?php if ($this->_tpl_vars['rights']['ally_found'] == 1 || $this->_tpl_vars['rights']['ally_lead'] == 1): ?>disabled="disabled"<?php endif; ?> <?php if ($this->_tpl_vars['rights']['ally_mass_mail'] == 1): ?>checked="checked"<?php endif; ?>> <img src="graphic/ally_rights/mass_mail.png"/>   Wiadomo�� grupowa </h5></label>
<p>Gracz mo�e wysy�a� wiadomo�ci do ca�ego plemienia</p>

<h3>Tytu�</h3>
<p>Tytu� w plemieniu: <input type="text" name="title" maxlength="24" value="<?php echo $this->_tpl_vars['rights']['ally_titel']; ?>
"></p>
<p><input type="submit" value="OK"></p>
</form>