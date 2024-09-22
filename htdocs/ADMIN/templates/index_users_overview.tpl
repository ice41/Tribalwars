<h3>Administrare utilizatori</h3><br />


Acest script va permite pur si simplu de a edita un utilizator.  <br /><br />

<table class="vis" style=border:1px solid" border="1">
 <tr>
  <th>Username</th>
  <th>ID</th>
  <th>Rang</th>
  <th>Puncte</th>
  <th>Sate</th>
 </tr>
{foreach from=$userInfo item=user}
<td><a href="index.php?screen=users&action=edit&name={$user.username}&id={$user.id}">{$user.username}</a>
</td>
<td>
&nbsp;{$user.id}
</td>
<td>
&nbsp;&nbsp;{$user.rang}
</td>
<td>
&nbsp;&nbsp;{$user.points}
</td>
<td>
&nbsp;&nbsp;{$user.villages}
</td>
</tr>
<tr>
{/foreach}
</table>
