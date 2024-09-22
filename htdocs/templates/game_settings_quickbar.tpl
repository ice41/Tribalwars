{if $edit == 'edit'}
{include file=game_settings_quickbar_edit.tpl}
{elseif $action == 'add'}
{include file=game_settings_quickbar_add.tpl}
{else}
<h3>Bara link-uri rapide</h3>
<p><a href="/game.php?village={$village.id}&amp;screen=settings&amp;mode=quickbar&action=add">&raquo; Adauga link nou</a></p>
{if $amount != 0}
<table class="vis">
<tr><th>Link</th><th colspan="3">Optiuni</th></tr>

{foreach from=$quickbar item=quick}
<tr>
<td>
{if substr($quick.href, 0, 8) != 'game.php'}
<a href="{$quick.href}"{if $quick.target != 0}target="_blank"{/if}><img src="{$quick.img}">{$quick.name|replace:"Cladirea principala":"Cladirea principala"|replace:"Cazarma":"Barracks"|replace:"Stall":"Grajd"|replace:"Werkstatt":"Workshop"|replace:"Adelshof":"Academy"|replace:"Schmiede":"Smithy"|replace:"Platz":"Rally Point"|replace:"Markt":"Market"}</a>
{else}
<a href="{$quick.href}&village={$quick.vid}"{if $quick.target != 0}target="_blank"{/if}><img src="{$quick.img}">{$quick.name|replace:"Cladirea principala":"Cladirea principala"|replace:"Kaserne":"Barracks"|replace:"Stall":"Stable"|replace:"Werkstatt":"Workshop"|replace:"Adelshof":"Academy"|replace:"Schmiede":"Smithy"|replace:"Platz":"Rally Point"|replace:"Markt":"Market"}</a>
{/if}
</td>
<td>
<a href="game.php?village={$quick.vid}&screen=settings&mode=quickbar&action=edit&id={$quick.id}&h={$hkey}">Editeaza</a>
</td>
<td>
<a href="game.php?village={$quick.vid}&screen=settings&mode=quickbar&action=delete&id={$quick.id}&h={$hkey}">Sterge</a>
</td>
{/foreach}
</table>

{/if}
{/if}
<p>
<a href="game.php?village={$vill}&screen=settings&mode=quickbar&action=standard">&raquo; Foloseste Quickbar-ul original</a>
</p>