 {************************************}
 {* Erweiterung fuer Die-Staemme Lan *}
 {* ******************************** *}
 {*             Gruppen              *}
 {* ******************************** *}
 {*   (c) Copyright Philipp Ranft    *}
 {************************************}
<h1 style="text-align: center;">(D&ouml;rfer-)Gruppen</h1>

<table class="vis">
  <tr>
    {if $install != 'true'}<td><a href="?screen={$smarty.get.screen}&amp;action=install">Installation</a></td>{/if}
    <td><a href="?screen={$smarty.get.screen}&amp;action=reset">Reset</a></td>
    <td><a href="?screen={$smarty.get.screen}&amp;action=updatesystem_{if $updatesystem_status == 'on'}off{else}on{/if}">Updatesystem {if $updatesystem_status == 'on'}deaktivieren{else}aktivieren{/if}</a></td>
  </tr>
</table>
{if isset($install_done)}
  <h2 style="color: green; text-align: center;">Installation erfolgreich!</h2>
{elseif isset($updatesystem_on)}
  <h2 style="color: green; text-align: center;">Updatesystem erfolgreich aktiviert!</h2>
{elseif isset($updatesystem_off)}
  <h2 style="color: green; text-align: center;">Updatesystem erfolgreich deaktiviert!</h2>
{elseif isset($reset)}
  {if $reset == true}
    <h2 style="color: green; text-align: center;">Reset erfolgreich durchgef&uuml;hrt!</h2>
  {elseif $reset == false}
    <h2 style="color: red; text-align: center;">Reset konnte nicht durchgef&uuml;hrt werden!</h2>
  {/if}
{/if}
<p style="text-align: right"><a href="{$thread_url}">Version {$version}</a> | &copy; Copyright by <a href="http://dslan.gfx-dose.de/user-11.html">Philipp Ranft</a> (<a href="mailto:philipp.ranft@gmx.de">E-Mail</a>)