<h2>Mesaje</h2>
{if !empty($error)}
{if $error=='Betreff muss mindestens zwei Zeichen lang sein!'}
            {assign var='error' value='Subiectul trebuie s&#259; aib&#259; minim 2 caractere !'}
         {/if}
         {if $error=='Du musst mindestens einen Empfänger angeben.'}
            {assign var='error' value='Mesajul trebuie s&#259; con&#355;in&#259; un destinatar'}
         {/if}
         {if $error=='Text muss mindestens drei Zeichen lang sein!'}
            {assign var='error' value='Textul trebuie s&#259; con&#355;in&#259; minim 3 caractere !'}
         {/if}
         {if $error=='Spieler nicht vorhanden'}
            {assign var='error' value='Juc&#259;torul nu a fost g&#259;sit !'}
         {/if}
         {if $error=='Absender bereits blockiert'}
            {assign var='error' value='Juc&#259;torul este deja blocat !'}
         {/if}
         {if $error=='Du kannst dich nicht selber blockieren'}
            {assign var='error' value='Nu te po&#355;i bloca singur !'}
         {/if}
         {if $error=='Empfänger nicht vorhanden.'}
            {assign var='error' value='Destinatarul nu a fost g&#259;sit !'}
         {/if}
	<div style="color:red; font-size:150%">{$error}</div>
{/if}
<table><tr><td valign="top" width="100">
	<table class="vis" width="150">
			{if in==$mode}
				<tr>
					<td class="selected" width="180">
						<a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=in">Mesaje primite</a>
					</td>
				</tr>
			{else}
                <tr>
                    <td width="120">
						<a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=in">Mesaje primite</a>
					</td>
				</tr>
			{/if}
			{if out==$mode}
				<tr>
					<td class="selected" width="120">
						<a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=out">Mesaje expediate</a>
					</td>
				</tr>
			{else}
                <tr>
                    <td width="120">
						<a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=out">Mesaje expediate</a>
					</td>
				</tr>
			{/if}
			{if arch==$mode}
				<tr>
					<td class="selected" width="120">
						<a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=arch">Arhiva</a>
					</td>
				</tr>
			{else}
                <tr>
                    <td width="120">
						<a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=arch">Arhiva</a>
					</td>
				</tr>
			{/if}
				<tr>
					<td width="120">
						<a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=new">Scrie un mesaj</a>
					</td>
				</tr>
			{if block==$mode}
				<tr>
					<td class="selected" width="120">
						<a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=block">Blocheaz&#259; expeditor</a>
					</td>
				</tr>
			{else}
                <tr>
                    <td width="120">
						<a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=block">Blocheaz&#259; expeditor</a>
					</td>
				</tr>
			{/if}
	</table>
	
</td><td valign="top" width="*">
	{if in_array($mode,$allow_mods)}
		{include file="game_mail_$mode.tpl" title=foo}
	{/if}
</td></tr></table>
