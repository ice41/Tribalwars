<table width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
<tr><th width="60">Jogador:</th><th><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$report.from_user}">{$report.from_username|entparse}</a></th></tr>
<tr><td>Origem:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$report.from_village}">{$report.from_villagename} ({$report.from_x}|{$report.from_y})</a></th></tr>

<tr><th width="60">Jogador:</th><th><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$report.to_user}">{$report.to_username|entparse}</a></th></tr>
<tr><td>Destino:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$report.to_village}">{$report.to_villagename} ({$report.to_x}|{$report.to_y})</a></th></tr>
</table><br />

<h4>Recursos:</h4>
{if $report.wood>0}<img src="../graphic/icons/wood.png" title="Madeira" alt="" />{$report.wood} {/if}{if $report.stone>0}<img src="../graphic/icons/stone.png" title="Argila" alt="" />{$report.stone} {/if}{if $report.iron>0}<img src="../graphic/icons/iron.png" title="Ferro" alt="" />{$report.iron} {/if}