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

<h3>Alterar direitos para {$rights.username}</h3>
<p>Aqui pode distribuir direitos aos membros da tribo. Deve dar direitos aos jogadores que conhece e confia.</p>

<form action="game.php?village={$village.id}&amp;screen=ally&amp;mode=rights&amp;action=edit_rights&amp;uid={$rights.id}&amp;h={$hkey}" method="post">
	<label>
		<h5>
			<input type="checkbox" name="found" id="found" onchange="set_found_right()" {if $rights.ally_found==1}checked="checked"{/if} {if $user.ally_found==0}disabled="disabled"{/if}> 
			<img src="/ds_graphic/ally_rights/found.png"/> O fundador da tribo
		</h5>
	</label>
	<p>Escolha um fundador de tribo. Ele terá o direito de dissolver a tribo, mudar o nome, entrar no site, canal de IRC e ceder direitos de operador.</p>
	<label>
		<h5>
			<input type="checkbox" name="lead" id="lead" onchange="set_lead_right()" {if $rights.ally_found==1}disabled="disabled"{/if} {if $rights.ally_lead==1}checked="checked"{/if}> 
			<img src="/ds_graphic/ally_rights/lead.png"/>Administracja plemienia
		</h5>
	</label>
	<p>Os membros do operador podem ceder direitos e títulos a outros jogadores, expulsar jogadores e ter todos os outros direitos.</p>
	<label>
		<h5>
			<input type="checkbox" name="invite" id="invite" {if $rights.ally_found==1 || $rights.ally_lead==1}disabled="disabled"{/if} {if $rights.ally_invite==1}checked="checked"{/if}> <img src="/ds_graphic/ally_rights/invite.png"/> 
			Convidar
		</h5>
	</label>
	<p>Este jogador pode convidar novos jogadores.</p>
	<label>
		<h5>
			<input type="checkbox" name="diplomacy" id="diplomacy" {if $rights.ally_found==1 || $rights.ally_lead==1}disabled="disabled"{/if} {if $rights.ally_diplomacy==1}checked="checked"{/if}> <img src="/ds_graphic/ally_rights/diplomacy.png"/>  Dyplomacja 
		</h5>
	</label>
	<p>Este direito permite ao jogador alterar o perfil da tribo e marcar alianças e pactos de não agressão.</p>
	<label>
		<h5>
			<input type="checkbox" name="mass_mail" id="mass_mail" {if $rights.ally_found==1 || $rights.ally_lead==1}disabled="disabled"{/if} {if $rights.ally_mass_mail==1}checked="checked"{/if}> <img src="/ds_graphic/ally_rights/mass_mail.png"/>   Wiadomo�� grupowa 
		</h5>
	</label>
	<p>O jogador pode enviar mensagens para toda a tribo</p>
	<label>
		<h5>
			<input type="checkbox" name="forum_mod" id="forum_mod" {if $rights.ally_found==1 || $rights.ally_lead==1}disabled="disabled"{/if} {if $rights.ally_mod_forum==1}checked="checked"{/if}> <img src="/ds_graphic/ally_rights/forum_mod.png"/>   Moderator w Forum wewn�trznym
		</h5>
	</label>
	<p>Um jogador com este direito pode modificar o fórum tribal, também tem acesso ao fórum oculto e ao fórum de membros confiáveis</p>
	<label>
		<h5>
			<input type="checkbox" name="internal_forum" id="internal_forum" {if $rights.ally_found==1 || $rights.ally_lead==1}disabled="disabled"{/if} {if $rights.ally_forum_switch==1}checked="checked"{/if}> <img src="/ds_graphic/ally_rights/internal_forum.png"/>   Ukryte forum
		</h5>
	</label>
	<p>O jogador tem acesso a um fórum oculto</p>
	<label>
		<h5>
			<input type="checkbox" name="trusted_member" id="trusted_member" {if $rights.ally_found==1 || $rights.ally_lead==1}disabled="disabled"{/if} {if $rights.ally_forum_trust==1}checked="checked"{/if}> <img src="/ds_graphic/ally_rights/trusted.png"/>   Zaufany cz�onek
		</h5>
	</label>
	<p>O jogador tem acesso a um fórum para membros confiáveis</p>

	<h3>Título</h3>
	<p>Título na tribo: <input type="text" name="title" maxlength="24" value="{$rights.ally_titel}"></p>
	<p><input type="submit" value="OK"></p>
</form>