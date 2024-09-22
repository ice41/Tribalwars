<h2>Trib</h2>
{if !empty($error)}
         {if $error=='Der Name muss mindestens 4 Zeichen lang sein!'}
            {assign var='error' value='Numele trebuie s&#259; aib&#259; minim 4 caractere'}
         {/if}
	<div style="color:red; font-size:large">{$error}</div>
{/if}
<p>Pentru a te ata&#351;a unui trib, trebuie s&#259; fii invitat de acesta.</p>

<form action="game.php?village={$village.id}&amp;screen=ally&amp;action=create&amp;h={$hkey}" method="post">
<table class="vis">
<tr>
  <th colspan="2">&#206;nfiin&#355;eaz&#259; un trib</th>
</tr>
<tr><td>Numele tribului:</td><td><input type="text" name="name" /></td></tr>
<tr><td>Prescurtare:<br />
  (maximum 6 caractere)</td><td><input type="text" name="tag" maxlength="6" /></td></tr>
</table>
<input type="submit" value="&#206;ntemeiere" style="font-size:10pt;" />
</form>
<br />
	
<table class="vis">
<tr><th colspan="3" width="400">Invitatii</th></tr>
	{foreach from=$invites item=arr key=id}
		<tr>
		<td><a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$arr.from_ally}">{$arr.tag}</a></td>
		<td align="center"><a href="game.php?village={$village.id}&amp;screen=ally&amp;action=accept&amp;id={$id}&amp;h={$hkey}">Accept&#259;</td>
		<td align="center"><a href="game.php?village={$village.id}&amp;screen=ally&amp;action=reject&amp;id={$id}&amp;h={$hkey}">Refuz&#259;</td>
		</tr>
	{/foreach}
</table>