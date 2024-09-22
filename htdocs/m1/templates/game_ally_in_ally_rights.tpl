{php}
	$rid = $this->_tpl_vars['rights']['id'];
	$q1 = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$rid'")) or die(mysql_error());
	$this->_tpl_vars['rights']['ally_forum_mod'] = $q1['ally_forum_mod'];
	$this->_tpl_vars['rights']['ally_internal_forum'] = $q1['ally_internal_forum'];
	$this->_tpl_vars['rights']['ally_trusted_member'] = $q1['ally_trusted_member'];
	$this->_tpl_vars['rights']['view'] = $_GET['view'];
	if($_GET['action'] == 'alt_rights'){
		if($_POST['forum_mod']){ $forum_mod = '1'; }else{ $forum_mod = '0'; }
		if($_POST['internal_forum']){ $internal_forum = '1'; }else{ $internal_forum = '0'; }
		if($_POST['trusted_member']){ $trusted_member = '1'; }else{ $trusted_member = '0'; }
		mysql_query("UPDATE `users` SET `ally_forum_mod` = '$forum_mod', `ally_internal_forum` = '$internal_forum', `ally_trusted_member` = '$trusted_member' WHERE `id` = '$rid'") or die(mysql_error());
		header("Location: game.php?village=$_GET[village]&screen=ally&mode=members");
	}
{/php}
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
	{rdelim}

	function check_and_disable(name, check) {ldelim}
		gid(name).disabled = check;
		if(check == true) {ldelim}
			gid(name).checked = check;
		{rdelim}
	{rdelim}
</script>
<table class="vis" width="30%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<td {if $rights.view == all || $rights.view == ''}class="selected"{/if} align="center"><a href="game.php?village={$village.id}&screen=ally&mode=rights&player_id={$rights.id}&view=all">Gerais</a></td>
		<td {if $rights.view == forum}class="selected"{/if}  align="center"><a href="game.php?village={$village.id}&screen=ally&mode=rights&player_id={$rights.id}&view=forum">F&oacute;rum</a></td>
	</tr>
</table><br />
{if $rights.view == all || $rights.view == ''}
<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr><th colspan="2" style="text-align:center;">Mudar permiss&otilde;es do jogador: {$rights.username}</th></tr>
	<tr><td colspan="2" align="center">Aqui voc&ecirc; pode selecionar as permiss&otilde;es concedidas aos membros de sua tribo. Para evitar problemas voc&ecirc; deve conceder permiss&otilde;es de fundador apenas para jogadores de sua confian&ccedil;a.</td></tr>
	<form action="game.php?village={$village.id}&amp;screen=ally&amp;mode=rights&amp;action=edit_rights&amp;player_id={$rights.id}&amp;h={$hkey}" method="post">
		<tr><td width="130"><input type="checkbox" name="found" id="found" onchange="set_found_right()" {if $rights.ally_found==1}checked="checked"{/if} {if $user.ally_found==0}disabled="disabled"{/if}> <span class="icon ally founder" alt="Fundador" title="Fundador"></span> Fundador</td><td align="center">Nomear o jogador fundador da tribo. Ele possuir&aacute; com isso todos os direitos dentro da tribo: poder&aacute; apag&aacute;-la ou renome&aacute;-la, mudar sua p&aacute;gina ou canal de IRC, administrar o f&oacute;rum interno, editar as permiss&otilde;es de todos os outros membros e at&eacute; mesmo nomear outros fundadores.</td></tr>
		<tr><td width="130"><input type="checkbox" name="lead" id="lead" onchange="set_lead_right()" {if $rights.ally_found==1}disabled="disabled"{/if} {if $rights.ally_lead==1}checked="checked"{/if}> <span class="icon ally lead" alt="Administrador" title="Administrador"></span> Administrador</td>
		<td align="center">Os membros fundadores possuem todas as permiss&otilde;es poss&iacute;veis sobre a   tribo. Eles podem editar os t&iacute;tulos e as permiss&otilde;es de todos os   jogadores bem como expuls&aacute;-los da tribo.</td></tr>
		<tr><td width="130"><input type="checkbox" name="invite" id="invite" {if $rights.ally_found==1 || $rights.ally_lead==1}disabled="disabled"{/if} {if $rights.ally_invite==1}checked="checked"{/if}> <span class="icon ally invite" alt="Recrutador" title="Recrutador"></span> Recrutador</td><td align="center">O jogador pode convidar novos jogadores &agrave; tribo.</td></tr>
		<tr><td width="130"><input type="checkbox" name="diplomacy" id="diplomacy" {if $rights.ally_found==1 || $rights.ally_lead==1}disabled="disabled"{/if} {if $rights.ally_diplomacy==1}checked="checked"{/if}> <span class="icon ally diplomacy" alt="Diplom&aacute;ta" title="Diplom&aacute;ta"></span> Diplomata</td><td align="center">Este privil&eacute;gio permite alterar o perfil da tribo, assim como Alian&ccedil;as, PNAs e Inimigos.</td></tr>
		<tr><td width="130"><input type="checkbox" name="mass_mail" id="mass_mail" {if $rights.ally_found==1 || $rights.ally_lead==1}disabled="disabled"{/if} {if $rights.ally_mass_mail==1}checked="checked"{/if}> <span class="icon ally mass" alt="Mensagem em massa" title="Mensagem em massa"></span> Mensageiro</td><td align="center">O jogador pode enviar mensagens a todos os membros da tribo.</td></tr>
		<tr><th colspan="2">&raquo; Titulo</th></tr>
		<tr><td width="130">Titulo na tribo:</td><td><input type="text" name="title" maxlength="24" value="{$rights.ally_titel}">&nbsp;<input type="checkbox" name="view_title" /> Vis&iacute;vel para todos</td></tr>
		<tr><th colspan="2"><div align="right"><label><input type="submit" name="submit" class="button" value="Ok" /></label></div></th></tr>
	</form>
</table>
{elseif $rights.view == forum}
<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr><th colspan="2" style="text-align:center;">Mudar permiss&otilde;es do jogador: {$rights.username}</th></tr>
	<tr><td colspan="2" align="center">Aqui voc&ecirc; pode selecionar as permiss&otilde;es concedidas aos membros de sua tribo. Para evitar problemas voc&ecirc; deve conceder permiss&otilde;es de fundador apenas para jogadores de sua confian&ccedil;a.</td></tr>
	<form action="game.php?village={$village.id}&screen=ally&mode=rights&player_id={$rights.id}&action=alt_rights" method="post">
		<tr><th colspan="2">&raquo; Defini&ccedil;&otilde;es do f&oacute;rum</th></tr>
		<tr><td><label><input type="checkbox" name="forum_mod" {if $rights.ally_forum_mod==1}checked="checked"{/if} /> <span class="icon ally mod" alt="Moderador do f&oacute;rum" title="Moderador do f&oacute;rum"></span> Moderador do f&oacute;rum</label></td><td>Com este cargo &eacute; possivel controlar todo f&oacute;rum da tribo.</td></tr>
		<tr><td><label><input type="checkbox" name="internal_forum" {if $rights.ally_internal_forum==1}checked="checked"{/if} /> <span class="icon ally internal" alt="F&oacute;rum oculto" title="F&oacute;rum oculto"></span> F&oacute;rum oculto</label></td><td>O jogador poder&aacute; ver f&oacute;runs que estão invisiveis para outros membros.</td></tr>
		<tr><td><label><input type="checkbox" name="trusted_member" {if $rights.ally_trusted_member==1}checked="checked"{/if} /> <span class="icon ally trusted" alt="Membros confi&aacute;veis" title="Membros confi&aacute;veis"></span> Membros confiaveis</label></td><td>Jogador ter&aacute; alguns direitos especiais dentro da tribo.</td></tr>
		<tr><th colspan="2"><div align="right"><label><input type="submit" name="Submit" class="button" value="Ok" /></label></div></th></tr>
	</form>
</table>
{/if}