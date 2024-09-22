<h2>Debuggere</h2>
	<font color="green"><b></b></font>
{if $done=='attacks'}
	<font color="green"><b>Toate atacurile si evenimentele au fost recalculate!</b></font>
{elseif $done=='reload_points'}
    <font color="green"><b>Toate punctele au fost recalculate!</b></font>
{elseif $done=='reload_farms_and_units'}
	<font color="green"><b>Toate unitatile si toate fermele au fost recalculate</b></font>
    
{/if}
<table class="vis">
<tr>
<th>Descriere</th>
<th>Actiune</th>
</tr>
<tr>
	<td>Recalcularea timpilor si ale atacurilor!</td>
	<td><a href="index.php?screen=debugger&action=attacks">Recalculare evenimente si atacuri!</a></td>
</tr>
<tr>
	<td>Recalcularea punctelor jucatorilor,aliantelor si ale satelor!</td>
	<td><a href="index.php?screen=debugger&action=reload_points">Recalculare puncte!</a></td>
</tr>
<tr>
	<td>Recalcularea trupelor si al fermelor!</td>
	<td><a href="index.php?screen=debugger&action=reload_units_and_farms">Recalculare trupe si ferme!</a></td>
</tr>
</table>