<p style="margin-left:8px;">Nesta p&aacute;gina as rela&ccedil;&otilde;es com outras tribos podem ser administradas. As configura&ccedil;&otilde;es <b>n&atilde;o</b> est&atilde;o conectadas com o jogo em si, por&eacute;m as aldeias ser&atilde;o coloridas no mapa. Tal status ser&aacute; vis&iacute;vel apenas aos membros das tribos e poder&aacute; ser mudado apenas pelos Diplomatas.</p>
<table class="vis" width="300" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-left:8px;">
	<tbody>
		<tr>
			<th colspan="2">Aliados</th>
		</tr>
		{foreach from=$contracts.partner item=partner}
		<tr>
			<td><a href="game.php?village={$village.id}&screen=info_ally&id={$partner.to_ally}">{$partner.short|entparse}</a></td>
			{if $user.ally_diplomacy==1}
			<td><a href="game.php?village={$village.id}&screen=ally&mode=contracts&action=cancel_contract&id={$partner.id}&hkey={$hkey}">terminar</a></td>
			{/if}
		</tr>
		{/foreach}
	</tbody>
</table><br />
<table class="vis" width="300" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-left:8px;">
	<tbody>
		<tr>
			<th colspan="2">Pactos de n&atilde;o-Agress&atilde;o (PNA)</th>
		</tr>
		{foreach from=$contracts.nap item=partner}
		<tr>
			<td><a href="game.php?village={$village.id}&screen=info_ally&id={$partner.to_ally}">{$partner.short|entparse}</a></td>
			{if $user.ally_diplomacy==1}
			<td><a href="game.php?village={$village.id}&screen=ally&mode=contracts&action=cancel_contract&id={$partner.id}&hkey={$hkey}">terminar</a></td>
			{/if}
		</tr>
		{/foreach}
	</tbody>
</table><br />
<table class="vis" width="300" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-left:8px;">
	<tbody>
		<tr>
			<th colspan="2">Inimigos</th>
		</tr>
		{foreach from=$contracts.enemy item=partner}
		<tr>
			<td><a href="game.php?village={$village.id}&screen=info_ally&id={$partner.to_ally}">{$partner.short|entparse}</a></td>
			{if $user.ally_diplomacy==1}
			<td><a href="game.php?village={$village.id}&screen=ally&mode=contracts&action=cancel_contract&id={$partner.id}&hkey={$hkey}">terminar</a></td>
			{/if}
		</tr>
		{/foreach}
	</tbody>
</table>
{if $user.ally_diplomacy==1}
<h3 style="margin-left:8px;">Adicionar nova rela&ccedil;&atilde;o diplom&aacute;tica</h3>
<form method="post" action="game.php?village={$village.id}&screen=ally&mode=contracts&action=add_contract&h=835c">
	<table class="vis" width="60%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-left:8px;">
		<tr><th colspan="4">Adicionar nova rela&ccedil;&atilde;o diplom&aacute;tica:</th></tr>
		<tr>
			<td>Abrevia&ccedil;&atilde;o:</td>
			<td align="center"><input type="text" name="tag" maxlength="6" /></td>
			<td align="center"><select name="type">
				<option value="partner">Aliado</option>
				<option value="nap">Pacto de n&atilde;o-Agress&atilde;o (PNA)</option>
				<option value="enemy">Inimigo</option>
			</select></td>
			<td align="center"><input type="submit" value="Ok" class="button" /></td>
		</tr>
	</table>
</form>
{/if}