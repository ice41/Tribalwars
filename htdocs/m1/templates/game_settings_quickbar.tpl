{php}
	$iduser = $this->_tpl_vars['user']['id'];
	$idsat = $this->_tpl_vars['village']['id'];
	if($_GET['screen'] == 'settings' AND $_GET['mode'] == 'quickbar' AND $_GET['action'] == 'delete_br'){
		mysql_query("DELETE FROM `quickbar` WHERE `uid` = '".$iduser."'");
		header("Location: game.php?village=$idsat&screen=settings&mode=quickbar");
	}
{/php}
{if $edit == 'edit'}
	{include file=game_settings_quickbar_edit.tpl}
{elseif $action == 'add'}
	{include file=game_settings_quickbar_add.tpl}
{else}
<p><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=quickbar&action=add">&raquo; Adicionar novo elemento na barra</a></p>
	{if $amount != 0}
<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th></th>
		<th></th>
		<th>Nome</th>
	</tr>
		{foreach from=$quickbar item=quick}
	<tr>
		<td align="center">
			<a href="game.php?village={$quick.vid}&screen=settings&mode=quickbar&action=delete&id={$quick.id}&h={$hkey}"><img src="../graphic/icons/delete.png" title="Apagar" /></a>
		</td>
		<td align="center">
			<a href="game.php?village={$quick.vid}&screen=settings&mode=quickbar&action=edit&id={$quick.id}&h={$hkey}"><img src="../graphic/icons/edit.png" title="Editar" /></a>
		</td>
		<td>
			{if substr($quick.href, 0, 8) != 'game.php'}
			<a href="{$quick.href}"{if $quick.target != 0}target="_blank"{/if}><img src="{$quick.img}"> {$quick.name}</a>
			{else}
			<a href="{$quick.href}&village={$quick.vid}"{if $quick.target != 0}target="_blank"{/if}><img src="{$quick.img}"> {$quick.name}</a>
			{/if}
		</td>
	</tr>
		{/foreach}
</table>
	{/if}
{/if}
<p><a href="game.php?village={$vill}&screen=settings&mode=quickbar&action=standard">&raquo; Carregar barra de acesso r&aacute;pido global (apaga todos os itens)</a></p>
<p><a href="game.php?village={$vill}&screen=settings&mode=quickbar&action=delete_br">&raquo; Apagar todos os itens da barra</a></p>