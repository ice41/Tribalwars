{if empty($view)}
	<form action="game.php?village={$village.id}&amp;screen=mail&amp;mode=out&amp;action=del_arch&amp;h={$hkey}" method="post">
	
	<table class="vis">
	{if $num_pages>1}
		<tr>
			<td align="center" colspan="3">
				{section name=countpage start=1 loop=$num_pages+1 step=1}
					{if $site==$smarty.section.countpage.index}
						<strong> &gt;{$smarty.section.countpage.index}&lt; </strong>
					{else}
						<a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=out&amp;site={$smarty.section.countpage.index}"> [{$smarty.section.countpage.index}] </a>
					{/if}
				{/section}
			</td>
		</tr>
	{/if}
	<tr><th>Temat</th><th width="160">Destinatário</th><th width="140">Data</th></tr>
	
		{foreach from=$mails item=arr key=id}
			<tr>
				<td><input name="id_{$id}" type="checkbox" /> {if $arr.is_read==0}<img src="https://www.tribalwars.net/graphic/new_mail.png"> {else}<img src="https://www.tribalwars.net/graphic/read_mail.png"> {/if} <a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=out&amp;view={$id}">{$arr.subject}</a></td>
				<td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$arr.to_id}">{$arr.to_username}</a> </td>
				<td>{$arr.time}</td>
			</tr>
		{/foreach}
		{if count($mails)>0}
			<tr><th><input name="all" type="checkbox" onclick="selectAll(this.form, this.checked)">Selecionar tudo</th><th colspan="2"></th></tr>
		{/if}
	</table>
	
		<table align="left"><tr>
		<td><input type="submit" value="Excluir" name="del" /></td>
		<td><input type="submit" value="Arquivar" name="arch" /></td>
		</tr></table>
	
	</form>
{else}
	{if empty($error)}

		
		<table class="vis" width="100%">
		<tr><th width="140">Assunto:</th><th width="300">{$mail.subject}</th></tr>

	<tr>
		<td>remetente da mensagem:</td>
		<td>
			
			{if $mail.from_id==-1}{$mail.from_username}{else}<a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$mail.from_id}">{$mail.from_username}</a>{/if}</td>
	</tr>

		<tr id="action_row">
		<td colspan="2">
			<table class="vis" width="100%">
				<tbody><tr>
										<td align="center" width="25%">
						{if $mail.from_id==-1}Não é possível escrever de volta{else}<a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=new&amp;reply={$mail.id}">Responder</a>{/if}
					</td>
															<td align="center" width="25%">
						<a href="game.php?village={$village.id}&amp;screen=mail&amp;action=arch&amp;id={$mail.id}&amp;h={$hkey}">Arquivos</a>
					</td>
										<td align="center" width="25%">
						<a href="game.php?village={$village.id}&amp;screen=mail&amp;action=del&amp;id={$mail.id}&amp;mode=in&amp;h={$hkey}">Excluir</a>
					</td>
					<td align="center" width="25%">
													{if $mail.from_id==-1}Nadawca Zablokowany{else}<a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=block&amp;action=block_id&amp;id={$mail.from_id}&amp;h={$hkey}">Bloquear remetente</a>{/if}
											</td>
				</tr>

		</table>


</table>
		

		<div class="post">
				<div class="igmline">
					<span class="author">{if $mail.from_id==-1}{$mail.from_username}{else}<a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$mail.from_id}">{$mail.from_username}</a>{/if} </span>
					 <span class="date">{$mail.time}</span>
				</div>
				<div class="text">{$mail.text}</div>
			</div> 
<br /> 
	{/if}
{/if}