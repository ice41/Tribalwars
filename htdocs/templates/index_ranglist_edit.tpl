<table class="vis" border="1" style=border:1px solid">
 <th><h4>Bearbeiten des Spielers:</h4></th>
 <th>&nbsp;{$username}</th>
 <th>&nbsp;&nbsp;<a href="index.php?screen=users">&raquo; zur&uuml;ck zur Userverwaltung</a></th>
 <tr>
  <td><b>&raquo; Username &auml;ndern</b></td>
  <td> <form method="post" action="index.php?screen=users&action=edit&mode=change_name&name={$username}&id={$id}">
                              <input type="text" name="username" size="13">
                              </input>
  </td>
  <td>
                              <input type="submit" name="submit" value="Usernamen &auml;ndern">
                              </input>
                             </form>
  </td>
   </tr>
   <tr>
   <td><b>&raquo; User kicken</b>
   </td>
   <td colspan="2">
   <a href="index.php?screen=users&action=edit&mode=kick&id={$id}">&raquo; User aus dem Spiel kicken (Session abgelaufen)</a>
  
   </td>
   </tr>
   <tr>
    <td>
    <b>&raquo; User l&ouml;schen</b>
    </td>
    <td colspan="2">
    <a href="index.php?screen=users&action=edit&mode=delete&id={$id}">&raquo; User l&ouml;schen</a>
    </td>
   </tr>
   <tr>
    <td>
    <b>&raquo; User aus seinem Stamm kicken</b>
    </td>
    <td colspan="2">
    <a href="index.php?screen=users&action=edit&mode=kick_tribe&id={$id}">&raquo; User aus seinem Stamm kicken</a>
    </td>
   </tr>
   <tr> 
    <td><b>D&ouml;rferverwaltung</b>
    </td>
    <td colspan="3">
    <table class="vis" border="1" style=border:1px solid">
 <tr>
  <th>ID</th>
  <th>Name</th>
  <th>Koordinaten</th>
  <th>Punkte</th>
  <th>Kontinent</th>
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
<a href="index.php?screen=users&action=edit&mode=village&id={$id}&village_id={$village.id}">Dorf wegnehmen</a>
</tr>
<tr>
{/foreach}
</table>
</td>
   </tr> 
</table>

<p align="right">&copy; by pL4n3</p>
