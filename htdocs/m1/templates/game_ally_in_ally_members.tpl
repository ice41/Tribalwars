<form action="game.php?village={$village.id}&amp;screen=ally&amp;mode=members&amp;action=mod&amp;h={$hkey}" method="post">
	<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr>
			<th width="180">Jogador</th>
			<th width="40">Rank</th>
			<th width="80">Pontos</th>
			<th width="40">Aldeias</th>
			{if $user.ally_lead == 1}
			<th><div align="center"><span class="icon ally founder" alt="Fundador" title="Fundador"></span></div></th>
			<th><div align="center"><span class="icon ally lead" alt="Administrador" title="Administrador"></span></div></th>
			<th><div align="center"><span class="icon ally invite" alt="Recrutador" title="Recrutador"></span></div></th>
			<th><div align="center"><span class="icon ally diplomacy" alt="Diplom&aacute;ta" title="Diplom&aacute;ta"></span></div></th>
			<th><div align="center"><span class="icon ally mass" alt="Mensagem em massa" title="Mensagem em massa"></span></div></th>
			<th><div align="center"><span class="icon ally mod" alt="Moderador do f&oacute;rum" title="Moderador do f&oacute;rum"></span></div></th>
			<th><div align="center"><span class="icon ally internal" alt="F&oacute;rum oculto" title="F&oacute;rum oculto"></span></div></th>
			<th><div align="center"><span class="icon ally trusted" alt="Membros confi&aacute;veis" title="Membros confi&aacute;veis"></span></div></th>
			<th>Modo de f&eacute;rias</th>
			{/if}
		</tr>
		{foreach from=$members item=arr key=id}
		<tr {if $id==$user.id}class="lit"{/if}>
			<td>
				{if $user.ally_lead == 1}
				<input type="radio" name="player_id" value="{$id}" />
				{foreach from=$arr.icons item=graphic}<img src="../graphic/dots/{$graphic}.png" title="" alt="" /> {/foreach}
				{/if}
				<a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$id}">{$arr.username}</a> [<a href="game.php?village={$village.id}&screen=mail&mode=new&player={$id}"><img src="../graphic/icons/new_mail.png" title="Enviar mensagen" alt="" /></a>] {if !empty($arr.ally_titel)}({$arr.ally_titel}){/if}
			</td>
			<td align="center">{$arr.rank}</td>
			<td align="center">{$arr.points|format_number}</td>
			<td align="center">{$arr.villages}</td>
			{if $user.ally_lead == 1}
{php}
	$uname = urlencode($this->_tpl_vars['arr']['username']);
	$q1 = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `username` = '".$uname."'"));
	$this->_tpl_vars['arr']['ally_forum_mod'] = $q1['ally_forum_mod'];
	$this->_tpl_vars['arr']['ally_internal_forum'] = $q1['ally_internal_forum'];
	$this->_tpl_vars['arr']['ally_trusted_member'] = $q1['ally_trusted_member'];
{/php}
			<td align="center">{if $arr.ally_found==1}<img src="../graphic/dots/green.png" alt="" />{else}<img src="../graphic/dots/grey.png" alt="" />{/if}</td>
			<td align="center">{if $arr.ally_lead==1}<img src="../graphic/dots/green.png" alt="" />{else}<img src="../graphic/dots/grey.png" alt="" />{/if}</td>
			<td align="center">{if $arr.ally_invite==1}<img src="../graphic/dots/green.png" alt="" />{else}<img src="../graphic/dots/grey.png" alt="" />{/if}</td>
			<td align="center">{if $arr.ally_diplomacy==1}<img src="../graphic/dots/green.png" alt="" />{else}<img src="../graphic/dots/grey.png" alt="" />{/if}</td>
			<td align="center">{if $arr.ally_mass_mail==1}<img src="../graphic/dots/green.png" alt="" />{else}<img src="../graphic/dots/grey.png" alt="" />{/if}</td>
			<td align="center">{if $arr.ally_forum_mod==1}<img src="../graphic/dots/green.png" alt="" />{else}<img src="../graphic/dots/grey.png" alt="" />{/if}</td>
			<td align="center">{if $arr.ally_internal_forum==1}<img src="../graphic/dots/green.png" alt="" />{else}<img src="../graphic/dots/grey.png" alt="" />{/if}</td>
			<td align="center">{if $arr.ally_trusted_member==1}<img src="../graphic/dots/green.png" alt="" />{else}<img src="../graphic/dots/grey.png" alt="" />{/if}</td>
			<td align="center">{if !empty($arr.vacation_id)}<a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$arr.vacation_id}">{$arr.vacation_name}</a>{/if}</td>
			{/if}
		</tr>
		{/foreach}
	</table><br />
	{if $user.ally_lead==1 || $user.ally_found==1}
	<select name="action" style="text-align:center; margin-left:8px;">
		<option label="Selecione uma a&ccedil;&atilde;o..." value="">Selecione uma a&ccedil;&atilde;o...</option>
		<option label="Tit&uacute;los e permiss&otilde;es" value="rights">Tit&uacute;los e permiss&otilde;es</option>
		<option label="Expulsar" value="kick">Expulsar</option>
	</select>
	<input type="submit" class="button" value="Ok" />
	{/if}
</form>
{if $user.ally_lead == 1}
<br />
<table class="vis" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-left:8px;">
	<tr><th colspan="2">Status</th></tr>
	<tr><td align="center"><span class="dot green"></span></td><td>Ativo</td></tr>
	<tr><td align="center"><span class="dot yellow"></span></td><td>Inativo a 2 dias</td></tr>
	<tr><td align="center"><span class="dot red"></span></td><td>inativo a uma semana</td></tr>
	<tr><td align="center"><span class="dot blue"></span></td><td>Modo de f&eacute;rias</td></tr>
	<tr><td align="center"><span class="dot locked"></span></td><td>Banido</td></tr>
</table>
<div style="font-size:7pt; margin-left:8px;">Apenas fundadores e administradores podem ver os status</div>
{/if}