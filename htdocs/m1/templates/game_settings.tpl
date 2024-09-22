<br />
	<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><th>Configura&ccedil;&otilde;es</th></tr>
		<tr><td {if $mode == 'profile'}class="selected" {/if}><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=profile">{if $mode == 'profile'}&raquo; {/if}Perfil</a></td></tr>
		<tr><td {if $mode == 'settings'}class="selected" {/if}><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=settings">{if $mode == 'settings'}&raquo; {/if}Configura&ccedil;&otilde;es</a></td></tr>
		<tr><td {if $mode == 'email'}class="selected" {/if}><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=email">{if $mode == 'email'}&raquo; {/if}Endere&ccedil;o de e-mail</a></td></tr>
		<tr><td {if $mode == 'change_passwd'}class="selected" {/if}><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=change_passwd">{if $mode == 'change_passwd'}&raquo; {/if}Trocar senha</a></td></tr>
		<tr><td {if $mode == 'start'}class="selected" {/if}><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=start">{if $mode == 'start'}&raquo; {/if}Recome&ccedil;ar</a></td></tr>
		<tr><td {if $mode == 'delete'}class="selected" {/if}><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=delete">{if $mode == 'delete'}&raquo; {/if}Apagar conta</a></td></tr>
		<tr><td {if $mode == 'quickbar'}class="selected" {/if}><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=quickbar">{if $mode == 'quickbar'}&raquo; {/if}Editar barra de acesso r&aacute;pido</a></td></tr>
		<tr><td {if $mode == 'share'}class="selected" {/if}><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=share">{if $mode == 'share'}&raquo; {/if}Compartilhar conex&atilde;o &agrave; internet</a></td></tr>
		<tr><td {if $mode == 'vacation'}class="selected" {/if}><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=vacation">{if $mode == 'vacation'}&raquo; {/if}Modo de f&eacute;rias</a></td></tr>
		<tr><td {if $mode == 'logins'}class="selected" {/if}><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=logins">{if $mode == 'logins'}&raquo; {/if}Acessos</a></td></tr>
		<tr><td {if $mode == 'sleep'}class="selected" {/if}><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=sleep">{if $mode == 'sleep'}&raquo; {/if}Modo noturno</a></td></tr>
	</table>
</td>
<td width="80%">
	<table width="100%">
		<tr>
			<td>
				<h2>{if $mode=='profile'}Perfil{elseif $mode=='settings'}Prefer&ecirc;ncias{elseif $mode=='email'}Endere&ccedil;o de e-mail{elseif $mode=='change_passwd'}Trocar senha{elseif $mode=='start'}Recome&ccedil;ar{elseif $mode=='delete'}Apagar conta{elseif $mode=='quickbar'}Editar barra de acesso r&aacute;pido{elseif $mode=='share'}Compartilhar conex&atilde;o &agrave; internet{elseif $mode=='vacation'}Modo de f&eacute;rias{elseif $mode=='logins'}Acessos{elseif $mode=='sleep'}Modo noturno{/if}</h2>
				{if !empty($error)}
				<div class="error">{$error|replace:"Ungültiger Dateiformat. Erlaubt sind JPEG, JPG, PNG und GIF!":"O bras&atilde;o deve ser nos formatos JPEG, JPG, PNG e GIF!"|replace:"Ungültiger Benutzername":"Jogador inexistente"|replace:"Das Passwort muss mindestens 4 Zeichen lang sein!":"Sua senha deve conter no minimo 4 caracteres!"|replace:"Du kannst dich nicht selbst als Urlaubsvertretung eintragen":"voc&ecirc; n&atilde;o pode ser seu pr&oacute;prio substituto."}</div>
				{/if}
			</td>
		</tr>
		<tr>
			<td valign="top" width="100%">
				{include file="game_settings_$mode.tpl" title=foo}
			</td>
		</tr>
	</table>
</td>