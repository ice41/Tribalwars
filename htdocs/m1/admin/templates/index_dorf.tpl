{if $smarty.get.action == ""}
<form action="?screen=dorf&action=mach" method="post">
 <table>
  <tr>
   <th align="left">Numar</th>
   <th align="left">Numar sate</th>
   <th align="left">ID Jucator</th>
   <th align="left">Nume sate</th>
   <th align="left">Directie sate</th>
  </tr>
  <tr>
   <td>1</td>
   <td><input name="anzahl1"></td>
   <td>
    <select name="userid1">
     <option></option>
     {foreach from=$userInfo item=user}
      <option value="{$user.id}">{$user.id} ({$user.username})</option>
     {/foreach}
    </select>
   </td>
   <td><input name="name1"></td>
   <td>
    <select name="direction1">
     <option value="nw">Nord-vest</option>
     <option value="sw">Sud-vest</option>
     <option value="no">Nord-est</option>
     <option value="so">Sud-est</option>
     <option value="random">Intamplator</option>
    </select>
   </td>
  </tr>
  <tr>
   <td>2</td>
   <td><input name="anzahl1"></td>
   <td>
    <select name="userid1">
     <option></option>
     {foreach from=$userInfo item=user}
      <option value="{$user.id}">{$user.id} ({$user.username})</option>
     {/foreach}
    </select>
   </td>
   <td><input name="name1"></td>
   <td>
    <select name="direction1">
     <option value="nw">Nord-vest</option>
     <option value="sw">Sud-vest</option>
     <option value="no">Nord-est</option>
     <option value="so">Sud-est</option>
     <option value="random">Intamplator</option>
    </select>
   </td>
  </tr>
  <tr>
   <td>3</td>
   <td><input name="anzahl1"></td>
   <td>
    <select name="userid1">
     <option></option>
     {foreach from=$userInfo item=user}
      <option value="{$user.id}">{$user.id} ({$user.username})</option>
     {/foreach}
    </select>
   </td>
   <td><input name="name1"></td>
   <td>
    <select name="direction1">
     <option value="nw">Nord-vest</option>
     <option value="sw">Sud-vest</option>
     <option value="no">Nord-est</option>
     <option value="so">Sud-est</option>
     <option value="random">Intamplator</option>
    </select>
   </td>
  </tr>
  <tr>
   <td>4</td>
   <td><input name="anzahl1"></td>
   <td>
    <select name="userid1">
     <option></option>
     {foreach from=$userInfo item=user}
      <option value="{$user.id}">{$user.id} ({$user.username})</option>
     {/foreach}
    </select>
   </td>
   <td><input name="name1"></td>
   <td>
    <select name="direction1">
     <option value="nw">Nord-vest</option>
     <option value="sw">Sud-vest</option>
     <option value="no">Nord-est</option>
     <option value="so">Sud-est</option>
     <option value="random">Intamplator</option>
    </select>
   </td>
  </tr>
  <tr>
   <td>5</td>
   <td><input name="anzahl1"></td>
   <td>
    <select name="userid1">
     <option></option>
     {foreach from=$userInfo item=user}
      <option value="{$user.id}">{$user.id} ({$user.username})</option>
     {/foreach}
    </select>
   </td>
   <td><input name="name1"></td>
   <td>
    <select name="direction1">
     <option value="nw">Nord-vest</option>
     <option value="sw">Sud-vest</option>
     <option value="no">Nord-est</option>
     <option value="so">Sud-est</option>
     <option value="random">Intamplator</option>
    </select>
   </td>
  </tr>
  <tr>
   <td colspan="2"><input type="submit" value="Ajuta cu sate"></td>
  </tr>
 </table>
</form>
<hr>

{elseif $smarty.get.action == "mach"}
Satele au fost adaugate cu succes jucatorului/jucatorilor alesi de dumneavoastra!<br>
<a href="?screen=dorf">Inapoi</a>
{/if}
