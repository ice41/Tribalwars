<br />
	<table class="vis" align="center" width="98%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><th>Submenu</th></tr>
		<tr><td {if $mode=='in'}class="selected"{/if}width="120">{if $mode=='in'}&raquo; {/if}<a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=in">Mesagens</a></td></tr>
		<tr><td {if $mode=='new'}class="selected"{/if}width="120">{if $mode=='new'}&raquo; {/if}<a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=new">Escrever mensagem</a></td></tr>
		<tr><td {if $mode=='block'}class="selected"{/if}width="120">{if $mode=='block'}&raquo; {/if}<a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=block">Bloquear remetente</a></td></tr>
	</table>
</td>
<td width="78%">
	<h2>{if $mode=='in'}Caixa de mensagens{elseif $mode=='new'}Escrever mensagem{elseif $mode=='block'}Bloquear remetente{/if}</h2>
{php}mysql_query("UPDATE users SET new_mail = '0' WHERE id = '".$this->_tpl_vars['user']['id']."'");{/php}
	<table width="100%">
		<tr>
			<td valign="top" width="100%">
				{include file="game_mail_$mode.tpl"}
			</td>
		</tr>
	</table>
</td>