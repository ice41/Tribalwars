<table width="100%">
<tr><th width="60">A partir de:</th><th><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$report.from_user}">{$report.from_username}</a></th></tr>
<tr><td>Aldeia:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$report.from_village}">{$report.from_villagename} ({$report.from_x}|{$report.from_y})</a></th></tr>

<tr><th width="60">A partir de:</th><th><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$report.to_user}">{$report.to_username}</a></th></tr>
<tr><td>Aldeia:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$report.to_village}">{$report.to_villagename} ({$report.to_x}|{$report.to_y})</a></th></tr>
</table><br />

<h4>Recursos:</h4>
{if $report.wood>0}<img src="/ds_graphic/holz.png" title="Madeira" alt="" />{$report.wood} {/if}{if $report.stone>0}<img src="/ds_graphic/lehm.png" title="Argila" alt="" />{$report.stone} {/if}{if $report.iron>0}<img src="/ds_graphic/eisen.png" title="Ferro" alt="" />{$report.iron} {/if}