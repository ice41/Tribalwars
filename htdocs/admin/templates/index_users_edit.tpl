<table class="vis" border="1" style=border:1px solid">
 <th><h4>Editare de jucatori:</h4></th>
 <th>&nbsp;{$username}</th>
 <th>&nbsp;&nbsp;<a href="index.php?screen=users">&raquo; Inapoi la administrarea de utilizatori</a></th>
 <tr>
  <td><b>&raquo; Schimbare nume de utilizator</b></td>
<td> <form method="post" action="index.php?screen=users&action=edit&mode=change_name&name={$username}&id={$id}">
                              <input type="text" name="username" size="13">
                              </input>
  </td>
  <td>
                              <input type="submit" name="submit" value="Schimba nume">
                              </input>
                             </form>
  </td>
   </tr>
   <tr>
   <td><b>&raquo; Scoate utilizatoru din joc (Sessiune expirata)</b></td>
   <td colspan="2">
   <a href="index.php?screen=users&action=edit&mode=kick&id={$id}">&raquo; Scoate utilizatoru din joc (Sessiune expirata)</a>
  
   </td>
   </tr>
   <tr>
    <td><b>&raquo; Stergeti utilizator</b> </td>
    <td colspan="2">
    <a href="index.php?screen=users&action=edit&mode=delete&id={$id}">&raquo; Stergeti utilizator</a>
    </td>
   </tr>
   <tr>
    <td><b>&raquo; Scoate utilizatoru din Trib</b> </td>
    <td colspan="2">
    <a href="index.php?screen=users&action=edit&mode=kick_tribe&id={$id}">&raquo; Scoate utilizatoru din Trib</a>
    </td>
   </tr>
   <tr> 
    <td height="80"><b>Sate de Administra&#355;ie</b></td>
    <td colspan="3">
    <table class="vis" border="1" style=border:1px solid">
 <tr>
  <th>ID</th>
  <th>Name</th>
  <th>Coordonate</th>
  <th>Puncte</th>
  <th>Continent</th>
  <th></th>
 </tr>
{foreach from=$villages item=village}
<td>
{$village.id}
</td>
<td>
{$village.name}
</td>
<td>
&nbsp;&nbsp;&nbsp;{$village.x}|{$village.y}
</td>
<td>
&nbsp;&nbsp;&nbsp;{$village.points}
</td>
<td>
&nbsp;&nbsp;&nbsp;{$village.continent}
</td>
<td>
<a href="index.php?screen=users&action=edit&mode=village&id={$id}&village_id={$village.id}">Ia un sat</a>
</tr>
<tr>
{/foreach}
</table>
</td>
   </tr> 
</table>
