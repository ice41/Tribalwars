{if !$suk}
<h2>Restart gry</h2>

<a href='javascript:ask("Czy naprawd� chcesz usun�� dane tego serwera?","index.php?screen=reset&action=reset")'>Reset: </a>
<br />
Wszystkie dane zostan� utracone!
{else}
<font color="green"/>Zrestartowano dane ca�ego serwera.</a>
{/if}