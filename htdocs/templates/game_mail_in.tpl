{if empty($view)}
	<form action="game.php?village={$village.id}&amp;screen=mail&amp;mode=in&amp;action=del_arch&amp;h={$hkey}" method="post">
	
	<table class="vis">
	{if $num_pages>1}
		<tr>
			<td align="center" colspan="3">
				{section name=countpage start=1 loop=$num_pages+1 step=1}
					{if $site==$smarty.section.countpage.index}
						<strong> &gt;{$smarty.section.countpage.index}&lt; </strong>
					{else}
						<a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=in&amp;site={$smarty.section.countpage.index}"> [{$smarty.section.countpage.index}] </a>
					{/if}
				{/section}
			</td>
		</tr>
	{/if}
	<tr><th>Titlu</th><th width="160">Expeditor</th><th width="140">Ultima tema</th></tr>
	
		{foreach from=$mails item=arr key=id}
			<tr>
                                <td><input name="id_{$id}" type="checkbox" />
				{if $arr.is_read==0} <img src="../graphic/new_mail.png" width="15" height="10" title="nou" alt="" />{/if}{if $arr.is_read==1} <span class="inactive"><img src="../graphic/read_mail.png" width="15" height="10"  title="citit" alt="" /></span>{/if} <a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=in&amp;view={$id}">{$arr.subject}</a></td>
				<td><img src="graphic/answered_mail.png?1" title="trimis" alt="" /> {if $arr.from_id==-1}{$arr.from_username}{else}<a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$arr.from_id}">{$arr.from_username}</a>{/if}</td>
				<td>{$arr.time}</td>
			</tr>
		{/foreach}
		{if count($mails)>0}
			<tr><th><input name="all" type="checkbox" onclick="selectAll(this.form, this.checked)">alegele pe toate</th><th colspan="2"></th></tr>
		{/if}
	</table>
	
		<table align="left"><tr>
		<td><input type="submit" value="Sterge" name="del" /></td>
		<td><input type="submit" value="Arhivare" name="arch" /></td>
		</tr></table>
	
	</form>
{else}
	{if empty($error)}
		<table align="center" class="vis"><tr>
		<td align="center" width="120"><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=new&amp;reply={$mail.id}">Raspunde</a></td>
		<td align="center" width="25%"><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=new&amp;reply={$mail.id}&amp;forward=true">Trimite mai departe</a></td>
		<td align="center" width="25%"><a href="game.php?village={$village.id}&amp;screen=mail&amp;action=arch&amp;id={$mail.id}&amp;h={$hkey}">Arhivare</a></td>
		<td align="center" width="25%"><a href="game.php?village={$village.id}&amp;screen=mail&amp;action=del&amp;id={$mail.id}&amp;mode=in&amp;h={$hkey}">Sterge</a></td>
		</tr>
		</table>
		
		<table class="vis" width="100%">
		<tr><th width="140">Subiect</th><th width="300">{$mail.subject}</th></tr>
		<tr><td>Expeditor</td><td>{if $mail.from_id==-1}{$mail.from_username}{else}<a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$mail.from_id}">{$mail.from_username}</a>{/if}</td></tr>
		<tr><td>Primit</td><td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$mail.to_id}">{$mail.to_username}</a></td></tr>
		<tr><td>Trimis</td><td>{$mail.time}</td></tr>
		</table>
		
		<table class="vis" width="100%">
	<tr>
		<td colspan="2">
			<div class="post">
				<div class="igmline">
					<span  class="author">Ultimul mesaj trimis de <a href="/game.php?village={$village.id}&amp;screen=info_player&amp;id={$mail.from_id}" >{$mail.from_username}</a></span>
					 <span class="right date">{$mail.time}</span>
				</div>
				<div class="text">{$mail.text}</div>
			</div>
		</td>
	</tr>
		</table>
		
		<table align="center" class="vis"><tr>
		<td align="center" width="120"><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=new&amp;reply={$mail.id}">Raspunde</a></td>
                <td align="center" width="25%"><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=new&amp;reply={$mail.id}&amp;forward=true">Trimite mai departe</a></td>
		<td align="center" width="25%"><a href="game.php?village={$village.id}&amp;screen=mail&amp;action=arch&amp;id={$mail.id}&amp;h={$hkey}">Arhivare</a></td>
		<td align="center" width="25%"><a href="game.php?village={$village.id}&amp;screen=mail&amp;action=del&amp;id={$mail.id}&amp;mode=in&amp;h={$hkey}">Sterge</a></td>
		</tr>
		</table><br />
		
		<table width="100%" align="center" class="vis"><tr>
		<td align="center"><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=block&amp;action=block_id&amp;id={$mail.from_id}&amp;h={$hkey}">Blocheaz&#259; expeditorul</a></td>
		</tr>
		</table><br />
	{/if}
{/if}