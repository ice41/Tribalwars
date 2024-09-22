<script type="text/javascript">
function set_found_right() {ldelim}
  check_and_disable("lead", gid("found").checked);
  set_lead_right();
{rdelim}

function set_lead_right() {ldelim}
  var checked = gid("lead").checked;
  check_and_disable("invite", checked);
  check_and_disable("diplomacy", checked);
  check_and_disable("mass_mail", checked);
  check_and_disable("forum_mod", checked);
  check_and_disable("internal_forum", checked);
{rdelim}

function check_and_disable(name, check) {ldelim}
  gid(name).disabled = check;
  if(check == true) {ldelim}
    gid(name).checked = check;
  {rdelim}
{rdelim}
</script>

<h3>Zmie� prawa dla {$rights.username}</h3>
<p>Tu mo�esz rozda� prawa cz�onkom plemienia. Prawa powiniene� da� graczom, kt�rych znasz i kt�rym ufasz.</p>
<form action="game.php?village={$village.id}&amp;screen=ally&amp;mode=rights&amp;action=edit_rights&amp;player_id={$rights.id}&amp;h={$hkey}" method="post">

<label><h5><input type="checkbox" name="found" id="found" onchange="set_found_right()" {if $rights.ally_found==1}checked="checked"{/if} {if $user.ally_found==0}disabled="disabled"{/if}> <img src="graphic/ally_rights/found.png"/> Za�o�yciel plemienia </h5></label>
<p>Wybierzcie za�o�yciela plemienia. B�dzie on posiada� prawa rozwi�zania plemienia, zmieniania nazwy, wpisywania strony, kana�u IRC i rozdawania praw operatorskich.</p>

<label><h5><input type="checkbox" name="lead" id="lead" onchange="set_lead_right()" {if $rights.ally_found==1}disabled="disabled"{/if} {if $rights.ally_lead==1}checked="checked"{/if}> <img src="graphic/ally_rights/lead.png"/>Administracja plemienia</h5></label>
<p>Cz�onkowie operatorscy mog� rozdawa� prawa i tytu�y innym graczom, mog� wyprasza� graczy i maj� wszystkie inne prawa.</p>

<label><h5><input type="checkbox" name="invite" id="invite" {if $rights.ally_found==1 || $rights.ally_lead==1}disabled="disabled"{/if} {if $rights.ally_invite==1}checked="checked"{/if}> <img src="graphic/ally_rights/invite.png"/> Zapro�</h5></label>
<p>Ten gracz mo�e zaprasza� nowych graczy.</p>

<label><h5><input type="checkbox" name="diplomacy" id="diplomacy" {if $rights.ally_found==1 || $rights.ally_lead==1}disabled="disabled"{/if} {if $rights.ally_diplomacy==1}checked="checked"{/if}> <img src="graphic/ally_rights/diplomacy.png"/>  Dyplomacja </h5></label>
<p>To prawo pozwala graczowi zmienia� profil plemienia oraz zaznacza� sojusze i pakty o nieagresji.</p>

<label><h5><input type="checkbox" name="mass_mail" id="mass_mail" {if $rights.ally_found==1 || $rights.ally_lead==1}disabled="disabled"{/if} {if $rights.ally_mass_mail==1}checked="checked"{/if}> <img src="graphic/ally_rights/mass_mail.png"/>   Wiadomo�� grupowa </h5></label>
<p>Gracz mo�e wysy�a� wiadomo�ci do ca�ego plemienia</p>

<h3>Tytu�</h3>
<p>Tytu� w plemieniu: <input type="text" name="title" maxlength="24" value="{$rights.ally_titel}"></p>
<p><input type="submit" value="OK"></p>
</form>