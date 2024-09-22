<table width="100%">
<tr><th width="60">Sprzedawca:</th><th><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$report.from_user}">{$report.from_username}</a></th></tr>
<tr><td>Wioska:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$report.from_village}">{$report.from_villagename} ({$report.from_x}|{$report.from_y})</a></th></tr>

<tr><th width="60">Kupiec:</th><th><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$report.to_user}">{$report.to_username}</a></th></tr>
<tr><td>Wioska:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$report.to_village}">{$report.to_villagename} ({$report.to_x}|{$report.to_y})</a></th></tr>
</table><br />

<table style="border: 1px solid #DED3B9">
<tr><td>Sprzedawca:</td><td>{if $report.sell_ress=='wood'}<img src="/ds_graphic/holz.png" title="Drewno" alt="" />{/if}{if $report.sell_ress=='stone'}<img src="/ds_graphic/lehm.png" title="Glina" alt="" />{/if}{if $report.sell_ress=='iron'}<img src="/ds_graphic/eisen.png" title="¯elazo" alt="" />{/if}{$report.sell}</td>
<tr><td>Kupiec:</td><td>{if $report.buy_ress=='wood'}<img src="/ds_graphic/holz.png" title="Drewno" alt="" />{/if}{if $report.buy_ress=='stone'}<img src="/ds_graphic/lehm.png" title="Glina" alt="" />{/if}{if $report.buy_ress=='iron'}<img src="/ds_graphic/eisen.png" title="¯elazo" alt="" />{/if}{$report.buy}</td>
</table><br />

Surowce zosta³y wys³ane automatycznie