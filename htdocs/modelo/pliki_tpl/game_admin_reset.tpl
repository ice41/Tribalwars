{if !$suk}
<h2>{$lang.admin.reset.title}</h2>



<a href="game.php?village={$village.id}&screen=admin&mode=reset&action=reset" class="evt-confirm" data-confirm-msg="{$lang.admin.reset.confirm}">{$lang.admin.reset.btn}</a>
<br /><strong>
{$lang.admin.reset.info}</strong>
{else}
<center><h2>{$lang.admin.reset.suc.1}</h2>
<strong><br>{$lang.admin.reset.suc.2}{/if}