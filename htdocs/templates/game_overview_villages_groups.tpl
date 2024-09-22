{if isset($fehler)}
  {if $fehler == 'no_name'}
    <p style="color: red; font-size: 18px;">Trebuie sa specificati un nume!</p>
  {elseif $fehler == 'wrong_id'}
    <p style="color: red; font-size: 18px;">ID-ul este incorect!</p>
  {/if}
{/if}
{if isset($done)}
  {if $done === 'new_group'}
    <p style="color: green; font-size: 18px;">Grupul a fost creat cu succes.</p>
  {elseif $done === 'del_group'}
    <p style="color: green; font-size: 18px;">Grupul a fost sters cu succes.</p>
  {elseif $done === 'edit_group'}
    <p style="color: green; font-size: 18px;">Grupul a fost procesat cu succes</p>
  {/if}
{/if}
<form name="new_group" action="?village={$village.id}&amp;screen=overview_villages&amp;mode=groups&amp;action=new_group" method="post">
  <table class="vis">
    <tr>
      <th>Nume grupa:</th>
      <td><input type="text" name="group_name" maxlength=255 /></td>
      <td><input type="submit" value="Creeaza" /></td>
    </tr>
  </table>
</form>
<table class="vis">
  <tr>
    <th width="200">Nume grupa</th>
    <th width="200">Redenumire / Stergere</th>
  </tr>
  {foreach from=$gruppen item=value key=key}
    <form method="post" action="?village={$village.id}&amp;screen=overview_villages&amp;mode=groups&amp;action=edit_group&amp;id={$value.id}" name="edit_group_{$value.id}">
      <tr>
        <td>{$value.name}</td>
        <td>
        <table class="vis">
          <tr>
            <td>
              <table class="vis">
                <tr>
                  <td>
                    <table class="vis">
                      <tr>
                        <th>Redenumire:</th>
                        <td><input type="text" name="group_name_{$value.id}" value="{$value.name}" /></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td><input type="checkbox" name="del" />Stergere grup</td>
                </tr>
              </table>
            </td>
            <td>
              <input type="submit" name="submit" value="OK" />
          </tr>
        </table>
        </td>
      </tr>
    </form>
  {/foreach}
</table>