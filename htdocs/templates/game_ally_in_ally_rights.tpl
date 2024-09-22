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

<h3>Modificarea drepturilor jucatorului {$rights.username}</h3>
<p>Aici poti alege, ce drepturi sa aiba jucatorul tribului tau. Dreptul de intemeiere sa-l dai numai jucatorilor pe care îi cunosti foarte bine si in care ai incredere.</p>
<form action="game.php?village={$village.id}&amp;screen=ally&amp;mode=rights&amp;action=edit_rights&amp;player_id={$rights.id}&amp;h={$hkey}" method="post">

<label><h5><input type="checkbox" name="found" id="found" onchange="set_found_right()" {if $rights.ally_found==1}checked="checked"{/if} {if $user.ally_found==0}disabled="disabled"{/if}> <img src="graphic/ally_rights/found.png" alt="Intemeietorul tribului" title="Intemeietorul tribului" /> Intemeietorul tribului</h5></label>
<p>Numeste acest jucator ca intemeietor de trib. Prin aceasta are toate drepturile asupra tribului, numai el poate sa dizolve tribul sau sa-i schimbe numele, poate realiza o Homepage a tribului si un IRC-Channel, el administreaza forumul intern si poate numi pe altii ca intemeietori.</p>

<label><h5><input type="checkbox" name="lead" id="lead" onchange="set_lead_right()" {if $rights.ally_found==1}disabled="disabled"{/if} {if $rights.ally_lead==1}checked="checked"{/if}> <img src="graphic/ally_rights/lead.png" alt="Conducerea tribului" title="Conducerea tribului" /> Conducerea tribului</h5></label>
<p>Membrii conducerii de trib pot hotara drepturile si titlurile altor jucatori, pot concedia si au de asemenea toate celelalte drepturi.</p>

<label><h5><input type="checkbox" name="invite" id="invite" {if $rights.ally_found==1 || $rights.ally_lead==1}disabled="disabled"{/if} {if $rights.ally_invite==1}checked="checked"{/if}> <img src="graphic/ally_rights/invite.png" alt="Invitatie" title="Invitatie" /> Invitatie </h5></label>
<p>Jucatorul poate invita noi membri in trib.</p>

<label><h5><input type="checkbox" name="diplomacy" id="diplomacy" {if $rights.ally_found==1 || $rights.ally_lead==1}disabled="disabled"{/if} {if $rights.ally_diplomacy==1}checked="checked"{/if}> <img src="graphic/ally_rights/diplomacy.png" alt="Diplomatie" title="Diplomatie" /> Diplomatie </h5></label>
<p>Acest drept iti permite sa schimbi profilul tribului si sa inchei pacturi si PNAuri.</p>

<label><h5><input type="checkbox" name="mass_mail" id="mass_mail" {if $rights.ally_found==1 || $rights.ally_lead==1}disabled="disabled"{/if} {if $rights.ally_mass_mail==1}checked="checked"{/if}> <img src="graphic/ally_rights/mass_mail.png" alt="Rundschreiben" title="Rundschreiben" /> Circulara </h5></label>
<p>Jucatorul poate trimite mesaje intregului trib.</p>

<h3>Titlu</h3>
<p>Titlul de master in: <input type="text" name="title" maxlength="24" value="{$rights.ally_titel}"></p>
<p><input type="submit" value="OK"></p>
</form>