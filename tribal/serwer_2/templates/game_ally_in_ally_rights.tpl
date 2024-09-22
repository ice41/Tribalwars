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
		check_and_disable("trusted_member", checked);
	{rdelim}

	function check_and_disable(name, check) {ldelim}
		gid(name).disabled = check;
		if(check == true) {ldelim}
			gid(name).checked = check;
		{rdelim}
	{rdelim}
</script>

<h3>Zmieñ prawa dla {$rights.username}</h3>
<p>Tu mo¿esz rozdaæ prawa cz³onkom plemienia. Prawa powinieneœ daæ graczom, których znasz i którym ufasz.</p>

<form action="game.php?village={$village.id}&amp;screen=ally&amp;mode=rights&amp;action=edit_rights&amp;uid={$rights.id}&amp;h={$hkey}" method="post">
	<label>
		<h5>
			<input type="checkbox" name="found" id="found" onchange="set_found_right()" {if $rights.ally_found==1}checked="checked"{/if} {if $user.ally_found==0}disabled="disabled"{/if}> 
			<img src="/ds_graphic/ally_rights/found.png"/> Za³o¿yciel plemienia 
		</h5>
	</label>
	<p>Wybierzcie za³o¿yciela plemienia. Bêdzie on posiada³ prawa rozwi¹zania plemienia, zmieniania nazwy, wpisywania strony, kana³u IRC i rozdawania praw operatorskich.</p>
	<label>
		<h5>
			<input type="checkbox" name="lead" id="lead" onchange="set_lead_right()" {if $rights.ally_found==1}disabled="disabled"{/if} {if $rights.ally_lead==1}checked="checked"{/if}> 
			<img src="/ds_graphic/ally_rights/lead.png"/>Administracja plemienia
		</h5>
	</label>
	<p>Cz³onkowie operatorscy mog¹ rozdawaæ prawa i tytu³y innym graczom, mog¹ wypraszaæ graczy i maj¹ wszystkie inne prawa.</p>
	<label>
		<h5>
			<input type="checkbox" name="invite" id="invite" {if $rights.ally_found==1 || $rights.ally_lead==1}disabled="disabled"{/if} {if $rights.ally_invite==1}checked="checked"{/if}> <img src="/ds_graphic/ally_rights/invite.png"/> 
			Zaproœ
		</h5>
	</label>
	<p>Ten gracz mo¿e zapraszaæ nowych graczy.</p>
	<label>
		<h5>
			<input type="checkbox" name="diplomacy" id="diplomacy" {if $rights.ally_found==1 || $rights.ally_lead==1}disabled="disabled"{/if} {if $rights.ally_diplomacy==1}checked="checked"{/if}> <img src="/ds_graphic/ally_rights/diplomacy.png"/>  Dyplomacja 
		</h5>
	</label>
	<p>To prawo pozwala graczowi zmieniaæ profil plemienia oraz zaznaczaæ sojusze i pakty o nieagresji.</p>
	<label>
		<h5>
			<input type="checkbox" name="mass_mail" id="mass_mail" {if $rights.ally_found==1 || $rights.ally_lead==1}disabled="disabled"{/if} {if $rights.ally_mass_mail==1}checked="checked"{/if}> <img src="/ds_graphic/ally_rights/mass_mail.png"/>   Wiadomoœæ grupowa 
		</h5>
	</label>
	<p>Gracz mo¿e wysy³aæ wiadomoœci do ca³ego plemienia</p>
	<label>
		<h5>
			<input type="checkbox" name="forum_mod" id="forum_mod" {if $rights.ally_found==1 || $rights.ally_lead==1}disabled="disabled"{/if} {if $rights.ally_mod_forum==1}checked="checked"{/if}> <img src="/ds_graphic/ally_rights/forum_mod.png"/>   Moderator w Forum wewnêtrznym
		</h5>
	</label>
	<p>Gracz z tym prawem mo¿e modyfikowaæ forum plemienne, równie¿ ma dostêp do ukrytego forum i dla forum zaufanych cz³onków</p>
	<label>
		<h5>
			<input type="checkbox" name="internal_forum" id="internal_forum" {if $rights.ally_found==1 || $rights.ally_lead==1}disabled="disabled"{/if} {if $rights.ally_forum_switch==1}checked="checked"{/if}> <img src="/ds_graphic/ally_rights/internal_forum.png"/>   Ukryte forum
		</h5>
	</label>
	<p>Gracz ma dostêp do ukrytego forum</p>
	<label>
		<h5>
			<input type="checkbox" name="trusted_member" id="trusted_member" {if $rights.ally_found==1 || $rights.ally_lead==1}disabled="disabled"{/if} {if $rights.ally_forum_trust==1}checked="checked"{/if}> <img src="/ds_graphic/ally_rights/trusted.png"/>   Zaufany cz³onek
		</h5>
	</label>
	<p>Gracz ma dostêp do forum dla zaufanych cz³onków</p>

	<h3>Tytu³</h3>
	<p>Tytu³ w plemieniu: <input type="text" name="title" maxlength="24" value="{$rights.ally_titel}"></p>
	<p><input type="submit" value="OK"></p>
</form>