<h3>Un nou &#238;nceput!</h3>
<p>Dac&#259; nu-&#355;i place zona &#238;n care e&#351;ti pozi&#355;ionat, sau vrei s&#259; fii pozi&#355;ionat lang&#259; un prieten &#238;n alt continent, po&#355;i s&#259; porne&#351;ti un nou &#238;nceput.</p>


</p>
<p>
Dac&#259; ai folosit op&#355;iunea un nou &#238;nceput, va trebui s&#259; a&#351;tep&#355;i &#238;nc&#259; 14 zile pentru a da un nou &#238;nceput.</p>
</p>
<form method="post" action="game.php?village={$village.id}&screen=settings&mode=move&action=move&hkey={$hkey}">
Parola (Este necesar&#259; pentru un nou &#238;nceput): <input type="password" name="password">
                                  <input type="submit" value="&#238;nceput nou!">
</form>
{if $get == 'move'}
  {if $pwError != ''}
  <font class="error">{$pwError}</font>
  {/if}
{/if}{$hkey}">
Parola (Este necesar&#259; pentru un nou &#238;nceput): <input type="password" name="password">
                                  <input type="submit" value="&#238;nceput nou!">
</form>
{if $get == 'move'}
  {if $pwError != ''}
  <font class="error">{$pwError}</font>
  {/if}
{/if}