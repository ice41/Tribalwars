<h2>Gerenciar jogadores</h2>
<p>Aqui você pode editar, banir e desbanir qualquer jogador que esteja devidamente registrado no servidor.</p>
<table width="50%">
	<tr>
		<td valign="top" width="100%" align="center">
			<table class="vis" width="100%" style="border-spacing:1px; background-color:#FEE47D;">
				<tr><th colspan="3">Submenu</th></tr>
				<tr>
					<td<? if($_GET['mode']=='search'){ echo " class=\"selected\""; }?>><a href="menu.php?screen=settings_users&mode=search"><? if($_GET['mode']=='search'){ echo "&raquo; "; }?>Busca r&aacute;pida</a></td>
					<td<? if($_GET['mode']==''){ echo " class=\"selected\""; }?>><a href="menu.php?screen=settings_users"><? if($_GET['mode']==''){ echo "&raquo; "; }?>Lista de usu&aacute;rios</a></td>
					<td<? if($_GET['mode']=='mail'){ echo " class=\"selected\""; }?>><a href="menu.php?screen=settings_users&mode=mail"><? if($_GET['mode']=='mail'){ echo "&raquo; "; }?>Comunicar jogador</a></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<?
	if($_GET['mode'] == 'search'){
		require_once("menu_settings_users_search.php");
	}elseif($_GET['mode'] == 'edit'){
		require_once("menu_settings_users_edit.php");
	}elseif($_GET['mode'] == 'mail'){
		require_once("menu_settings_users_mail.php");
	}else{
		require_once("menu_settings_users_list.php");
	}
?>