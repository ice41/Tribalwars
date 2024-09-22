<h1 style="text-align: center;">Grupe</h1>

<table class="vis">
  <tr>
    {if $install != 'true'}<td><a href="?screen={$smarty.get.screen}&amp;action=install">Instalare</a></td>{/if}
    <td><a href="?screen={$smarty.get.screen}&amp;action=reset">Restart</a></td>
    <td><a href="?screen={$smarty.get.screen}&amp;action=updatesystem_{if $updatesystem_status == 'on'}off{else}on{/if}">Update system {if $updatesystem_status == 'on'}dezactivat{else}activat{/if}</a></td>
  </tr>
</table>
{if isset($install_done)}
  <h2 style="color: green; text-align: center;">Instalarea a fost facuta cu succes!</h2>
{elseif isset($updatesystem_on)}
  <h2 style="color: green; text-align: center;">System Update activat cu succes!</h2>
{elseif isset($updatesystem_off)}
  <h2 style="color: green; text-align: center;">System Update dezactivat cu succes!</h2>
{elseif isset($reset)}
  {if $reset == true}
    <h2 style="color: green; text-align: center;">Restartarea a fost finalizata cu succes!</h2>
  {elseif $reset == false}
    <h2 style="color: red; text-align: center;">Resetarea nu a fost efectuata!</h2>
  {/if}
{/if}