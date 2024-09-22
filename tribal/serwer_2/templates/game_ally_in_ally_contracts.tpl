<p>{$lang->get("text")}</p>
<table class="vis" width="300">
  <th colspan="2">{$lang->get("partner")}</th>
    {foreach from=$contracts item=c}
      {if $c.type == 'partner'}
      <tr>
        <td><a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$c.from_ally}">{$c.short}</a></td>
        <td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=contracts&amp;action=cancel_contract&amp;id={$c.id}">{$lang->get("cancel")}</a></td>
      </tr>
      {/if}
    {/foreach}
</table><br />
<table class="vis" width="300">
  <th colspan="2">{$lang->get("nap")}</th>
    {foreach from=$contracts item=c}
      {if $c.type == 'nap'}
      <tr>
        <td><a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$c.from_ally}">{$c.short}</a></td>
        <td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=contracts&amp;action=cancel_contract&amp;id={$c.id}">{$lang->get("cancel")}</a></td>
      </tr>
      {/if}
    {/foreach}
</table><br />
<table class="vis" width="300">
  <th colspan="2">{$lang->get("enemy")}</th>
    {foreach from=$contracts item=c}
      {if $c.type == 'enemy'}
      <tr>
        <td><a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$c.from_ally}">{$c.short}</a></td>
        <td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=contracts&amp;action=cancel_contract&amp;id={$c.id}">{$lang->get("cancel")}</a></td>
      </tr>
      {/if}
    {/foreach}
</table>

<h3>{$lang->get('add_relationship')}</h3>
<form method="post" action="game.php?village={$village.id}&amp;screen=ally&amp;mode=contracts&amp;action=add_contract&amp;h={$hkey}">
{$lang->get("tag")}: <input type="text" name="tag" />
<select name="type">
<option value="partner">{$lang->get("partner_select")}</option>
<option value="nap">{$lang->get("nap")}</option>
<option value="enemy">{$lang->get("enemy")}</option>
</select>
<input type="submit" value="OK" />
</form>
