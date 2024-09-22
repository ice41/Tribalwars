<br />
<p>Pe pagina aceasta se administreaz&#259; rela&#355;iile cu celelalte triburi. Set&#259;rile
<strong>nu sunt obligatorii &#238;n cadrul jocului</strong>,
dar satele vor fi colorate pe hart&#259; &#238;n mod corespunz&#259;tor.</p>


<table class="vis" width="300">
<tbody>
<tr>
<th colspan="2">Alia&#355;i</th>
</tr>
{foreach from=$contracts.partner item=partner}
<tr>
    <td><a href="game.php?village={$village.id}&screen=info_ally&id={$partner.to_ally}">{$partner.short}</a></td>
    <td><a href="game.php?village={$village.id}&screen=ally&mode=contracts&action=cancel_contract&id={$partner.id}&hkey={$hkey}">sfar&#351;it</a></td>
</tr>
{/foreach}
</tbody>
</table>
<br />

<table class="vis" width="300">
<tbody>
<tr>
<th colspan="2">Pact de neatacare (PNA)</th>
</tr>
{foreach from=$contracts.nap item=partner}
<tr>
    <td><a href="game.php?village={$village.id}&screen=info_ally&id={$partner.to_ally}">{$partner.short}</a></td>
    <td><a href="game.php?village={$village.id}&screen=ally&mode=contracts&action=cancel_contract&id={$partner.id}&hkey={$hkey}">sfar&#351;it</a></td>
</tr>
{/foreach}
</tbody>
</table>
<br />

<table class="vis" width="300">
<tbody>
<tr>
<th colspan="2">Du&#351;mani</th>
</tr>
{foreach from=$contracts.enemy item=partner}
<tr>
    <td><a href="game.php?village={$village.id}&screen=info_ally&id={$partner.to_ally}">{$partner.short}</a></td>
    <td><a href="game.php?village={$village.id}&screen=ally&mode=contracts&action=cancel_contract&id={$partner.id}&hkey={$hkey}">sfar&#351;it</a></td>
</tr>
{/foreach}
</tbody>
</table>
<h3>Ad&#259;ugare de colaborare</h3>
<form method="post" action="/game.php?village={$village.id}&screen=ally&mode=contracts&action=add_contract&h=835c">
Prescurtarea tribului:
<input type="text" name="tag"/>
<select name="type">
<option value="partner">Aliat</option>
<option value="nap">Pact de neatacare (PNA)</option>
<option value="enemy">Du&#351;man</option>
</select>
<input type="submit" value="OK" />
</form>