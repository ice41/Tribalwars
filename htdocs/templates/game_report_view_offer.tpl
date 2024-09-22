<table width="100%">
<tr><th width="60">V&#226;nz&#259;tor:</th><th><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$report.from_user}">{$report.from_username}</a></th></tr>
<tr><td>Sat:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$report.from_village}">{$report.from_villagename} ({$report.from_x}|{$report.from_y})</a></th></tr>

<tr><th width="60">Cump&#259;r&#259;tor:</th><th><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$report.to_user}">{$report.to_username}</a></th></tr>
<tr><td>Sat:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$report.to_village}">{$report.to_villagename} ({$report.to_x}|{$report.to_y})</a></th></tr>
</table><br />

<table style="border: 1px solid #DED3B9">
<tr><td>v&#226;ndut:</td><td>{if $report.sell_ress=='wood'}<img src="graphic/holz.png" title="Lemn" alt="" />{/if}{if $report.sell_ress=='stone'}<img src="graphic/lehm.png" title="Argil&#259;" alt="" />{/if}{if $report.sell_ress=='iron'}<img src="graphic/eisen.png" title="Fier" alt="" />{/if}{$report.sell}</td>
<tr><td>Cump&#259;rat:</td><td>{if $report.buy_ress=='wood'}<img src="graphic/holz.png" title="Lemn" alt="" />{/if}{if $report.buy_ress=='stone'}<img src="graphic/lehm.png" title="Argil&#259;" alt="" />{/if}{if $report.buy_ress=='iron'}<img src="graphic/eisen.png" title="Fier" alt="" />{/if}{$report.buy}</td>
</table><br />

Materiile prime au fost trimise &#238;n mod automat.