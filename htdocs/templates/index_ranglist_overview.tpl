<b>Schnelle Rangliste:</b>
<table class="vis" style=border:1px solid" border="1">
 <tr>
  <th>Rang</th>
  <th>ID</th>
  <th>Username</th>
  <th>Stamm</th>
  <th>D&ouml;rfer</th>
  <th>Punkte</th>
 </tr>
{foreach from=$userInfo item=user}
<td>{$user.rang}</a>
</td>
<td>
&nbsp;{$user.id}
</td>
<td>
&nbsp;&nbsp;<a href="index.php?screen=users&action=edit&name={$user.username}&id={$user.id}">{$user.username}</a>
</td>
<td>
&nbsp;&nbsp;{$user.ally}
</td>
<td>
&nbsp;&nbsp;{$user.villages}
</td>
<td>
&nbsp;&nbsp;{$user.points}
</tr>
<tr>
{/foreach}
</table>
<p align="right">&copy; by <a href="http://dslan.gfx-dose.de/user-6529.html">Yannici</a></p>