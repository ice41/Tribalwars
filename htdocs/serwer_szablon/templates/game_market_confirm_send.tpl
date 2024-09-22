<h2>PotwierdŸ transport</h2>

<form action="game.php?village={$village.id}&amp;screen=market&amp;action=send&amp;h={$hkey}" method="post">

<table class="vis" width="450">
<tr><th colspan="2">Transport</th></tr>
<tr><td>Cel:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$confirm.to_villageid}">{$confirm.to_villagename} ({$confirm.to_x}|{$confirm.to_y})</a></td></tr>
<tr><td>Gracz:</td><td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$confirm.to_userid}">{$confirm.to_username}</a></td></tr>
<tr><td width="150">Surowce:</td>
<td width="200">{if $confirm.wood>0}<img src="graphic/holz.png" title="Holz" alt="" />{$confirm.wood} {/if}{if $confirm.stone>0}<img src="graphic/lehm.png" title="Lehm" alt="" />{$confirm.stone} {/if}{if $confirm.iron>0}<img src="graphic/eisen.png" title="Eisen" alt="" />{$confirm.iron} {/if}</td></tr>
<tr><td>Potrzeba kupców:</td><td>{$confirm.dealers}</td></tr>
<tr><td>Trwanie (w obie strony):</td><td>{$confirm.dealer_running}</td></tr>
<tr><td>Przybycie:</td><td>{$pl->pl_date($confirm.time_to)}</td></tr>
<tr><td>Powrót:</td><td>{$pl->pl_date($confirm.time_back)}</td></tr>
</table><br />

<input type="submit" value="OK" style="font-size:10pt;width: 80px;" />

<input type="hidden" name="target_id" value="{$confirm.to_villageid}" />
<input type="hidden" name="wood" value="{$confirm.wood}" />
<input type="hidden" name="stone" value="{$confirm.stone}" />
<input type="hidden" name="iron" value="{$confirm.iron}" />

</form>