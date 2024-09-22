<h2>Transport</h2>

<form action="game.php?village={$village.id}&amp;screen=market&amp;action=send&amp;h={$hkey}" method="post">

<table class="vis" width="350">
<tr><th colspan="2">Transport</th></tr>
<tr><td>&#354;int&#259;:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$confirm.to_villageid}">{$confirm.to_villagename} ({$confirm.to_x}|{$confirm.to_y})</a></td></tr>
<tr><td>Juc&#259;tor:</td><td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$confirm.to_userid}">{$confirm.to_username}</a></td></tr>
<tr><td width="150">M&#259;rfuri:</td>
<td width="200">{if $confirm.wood>0}<img src="graphic/holz.png" title="Lemn" alt="" />{$confirm.wood} {/if}{if $confirm.stone>0}<img src="graphic/lehm.png" title="Argil&#259;" alt="" />{$confirm.stone} {/if}{if $confirm.iron>0}<img src="graphic/eisen.png" title="Fier" alt="" />{$confirm.iron} {/if}</td></tr>
<tr><td>Negustori necesari:</td><td>{$confirm.dealers}</td></tr>
<tr><td>Durat&#259; (dus si &#238;ntors)):</td><td>{$confirm.dealer_running}</td></tr>
<tr><td>Sosire:</td><td>{$confirm.time_to}</td></tr>
<tr><td>Revenire:</td><td>{$confirm.time_back}</td></tr>
</table><br />

<input type="submit" value="&raquo; OK " style="font-size:10pt" />

<input type="hidden" name="target_id" value="{$confirm.to_villageid}" />
<input type="hidden" name="wood" value="{$confirm.wood}" />
<input type="hidden" name="stone" value="{$confirm.stone}" />
<input type="hidden" name="iron" value="{$confirm.iron}" />

</form>