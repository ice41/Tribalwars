<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-left:8px;">
<tr><th colspan="3">Convites em aberto</th></tr>
	{foreach from=$invites item=arr key=id}
		<tr>
			<td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$arr.to_userid}">{$arr.to_username}</a></td>
			<td align="center">{$arr.time|replace:"heute um":"hoje &agrave;s"|replace:"Uhr":""|replace:"am":"em"|replace:"um":"&agrave;s"|replace:"morgen":"amanh&atilde;"}</td>
			<td align="center"><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=invite&amp;action=cancel_invitation&amp;id={$id}&amp;h={$hkey}">Cancelar</a></td>
		</tr>
	{/foreach}
</table><br />
{if $soma >= $limite}
	{$msg}
{else} 
<form action="game.php?village={$village.id}&amp;screen=ally&amp;action=invite&amp;mode=invite&amp;action=invite&amp;h={$hkey}" method="post">
	<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-left:8px;">
		<tr><th colspan="3">Convidar</th></tr>
		<tr>
			<td>Nome:</td>
			<td><input name="name" type="text" value="" /></td>
			<td align="center"><input type="submit" value="Ok" class="button" /></td>
		</tr>
	</table>
</form>
{/if}