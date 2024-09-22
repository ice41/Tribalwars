<h2>{$ally.name}</h2>
{if !empty($error)}
         {if $error=='Du bist der einzige Stammesgründer. Du kannst den Stamm nicht verlassen.'}
            {assign var='error' value='Esti singurul intemeietor al tribului. Nu poti pleca din trib'}
         {/if}
         {if $error=='Stamm nicht gefunden'}
            {assign var='error' value='Tribul nu a fost gasit'}
         {/if}

         {if $error=='Es existiert schon eine Beziehung zu dem Stamm'}
            {assign var='error' value='Exista deja o relatie diplomatica cu acest trib'}
         {/if}
         {if $error=='Spieler wurde bereits eingeladen'}
            {assign var='error' value='Jucatorul a fost deja invitat'}
         {/if}
         {if $error=='Du bist derzeit der einzige Gründer. Du kannst dir das Rechte nicht entziehen!'}
            {assign var='error' value='Esti singurul intemeietor al tribului. Nu iti poti lua acest drept!'}
         {/if}
         {if $error=='Spieler wurde bereits eingeladen'}
            {assign var='error' value='Jucatorul a fost deja invitat'}
         {/if}
         {if $error=='Spieler nicht gefunden'}
            {assign var='error' value='Jucatorul nu a fost gasit'}
         {/if}
		 {if $error == "Stamme nicht gefunden"}
	<h2 class="error">Tribul nu a fost gasit !</h2>
{/if}
{if $error == "Es existiert schon eine Beziehung zu dem Stamm"}
    <h2 class="error">Aveti deja relatii de diplomatie cu acest trib !</h2>
{/if}
{if $action == 'add_contract' AND $error == "Eigener Stamm"}
<h2 class="error">Nu puteti avea diplomatie cu propriul trib !</h2>
{/if}

	<h2 class="error">{$error}</h2>
{/if}
<table class="vis">
	<tr>
			{if overview==$mode}
				<td class="selected" width="100">
					<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=overview">Privire de ansamblu</a>
				</td>
			{else}
				<td width="100">
					<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=overview">Privire de ansamblu</a>
				</td>
			{/if}
			{if profile==$mode}
				<td class="selected" width="100">
					<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=profile">Profil</a>
				</td>
			{else}
				<td width="100">
					<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=profile">Profil</a>
				</td>
			{/if}
			{if members==$mode}
				<td class="selected" width="100">
					<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=members">Membri</a>
				</td>
			{else}
				<td width="100">
					<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=members">Membri</a>
				</td>
			{/if}
                        {if contracts==$mode}
				<td class="selected" width="100">
					<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=contracts">Diploma&#355;ie</a>
				</td>
			{else}
				<td width="100">
					<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=contracts">Diploma&#355;ie</a>
				</td>
			{/if}
			{if invite==$mode}
				<td class="selected" width="100">
					<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=invite">Invita&#355;ii</a>
				</td>
			{else}
				<td width="100">
					<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=invite">Invita&#355;ii</a>
				</td>
			{/if}
                        {if intro_igm==$mode}
				<td class="selected" width="100">
					<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=intro_igm">&#206;nt&#226;mpinare</a>
				</td>
			{else}
				<td width="100">
					<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=intro_igm">&#206;nt&#226;mpinare</a>
				</td>
			{/if}
			{if properties==$mode}
				<td class="selected" width="100">
					<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=properties">&#206;nsu&#351;iri</a>
				</td>
			{else}
				<td width="100">
					<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=properties">&#206;nsu&#351;iri</a>
				</td>
			{/if}
                        {if forum==$mode}
				<td class="selected" width="100">
					<a href="forum_ally/forum.php" target="_blank">Forumul tribului</a>
				</td>
			{else}
				<td width="100">
					<a href="forum_ally/forum.php" target="_blank">Forumul tribului</a>
				</td>
			{/if}
	</tr>
</table>
<br />

{if $mode=='profile'}
	{include file="game_info_ally.tpl"}
{elseif $mode=='rights'}
	{include file="game_ally_in_ally_rights.tpl"}
{else}
	{if in_array($mode,$links)}
		{include file="game_ally_in_ally_$mode.tpl"}
	{/if}
{/if}