<h2>Tribo</h2>
{if !empty($error)}
<div class="error">{$error}</div>
{/if}
<p style="margin-left:8px;">Aqui voc&ecirc; pode fundar sua pr&oacute;pria tribo ou entrar para alguma tribo, desde que haja um convite para voc&ecirc;.</p>
<form action="game.php?village={$village.id}&screen=ally&amp;do=create&amp;h={$hkey}" method="post">
	<table width="50%" class="vis" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-left:8px;">
		<tr><th colspan="2">Fundar tribo</th></tr>
		<tr>
			<td width="89">Nome:</td>
			<td width="261"><div align="left"><input type="text" name="name" maxlength="32" /> - M&aacute;ximo 32 caracteres</div></td>
		</tr>
		<tr>
			<td>Abrevia&ccedil;&atilde;o:</td>
			<td><div align="left"><input type="text" name="tag" maxlength="6" /> - M&aacute;ximo 6 caracteres</div></td>
		</tr>
		<tr><th colspan="2"><span style="float:right;"><input type="submit" value="Fundar tribo" class="button" /></span></th></tr>
	</table>
</form><br />
<table width="50%" class="vis" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-left:8px;">
	<tr><th colspan="3">Convites em aberto</th></tr>
	{foreach from=$invites item=arr key=id}
	<tr>
		<td><a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$arr.from_ally}">{$arr.tag}</a></td>
		<td align="center"><a href="game.php?village={$village.id}&amp;screen=ally&amp;action=accept&amp;id={$id}&amp;h={$hkey}">Aceitar</a></td>
		<td align="center"><a href="game.php?village={$village.id}&amp;screen=ally&amp;action=reject&amp;id={$id}&amp;h={$hkey}">Recusar</a></td>
	</tr>
	{/foreach}
	{if $arr.tag==""}
	<tr><td><div class="error">Nenhum convite encontrado!</div></td></tr>
	{/if}
</table>