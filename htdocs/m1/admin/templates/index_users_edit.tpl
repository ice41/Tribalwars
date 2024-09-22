<table class="vis">
 <th><h4>Nume jucator:</h4></th>
 <th>&nbsp;{$username}</th>
 <th>&nbsp;&nbsp;<a href="index.php?screen=users">&raquo; intoarcete la vizualizare jucatori</a></th>
 <tr>
  <td><b>&raquo; Schimbare nume</b></td>
  <td> <form method="post" action="index.php?screen=users&action=edit&mode=change_name&name={$username}&id={$id}">
                              <input type="text" name="username" size="13">
                              </input>
  </td>
  <td>
                              <input type="submit" name="submit" value="Schimba numele">
                              </input>
                             </form>
  </td>
   </tr>
   <tr>
   <td><b>&raquo; Da kick la jucator</b>
   </td>
   <td colspan="2">
   <a href="index.php?screen=users&action=edit&mode=kick&id={$id}">&raquo; Da kick la jucator(O sa ii dea sesiunea expirata)</a>
  
   </td>
   </tr>
   <tr>
    <td>
    <b>&raquo; Sterge jucator</b>
    </td>
    <td colspan="2">
    <a href="index.php?screen=users&action=edit&mode=delete&id={$id}">&raquo; Sterge jucator</a>
    </td>
   </tr>
   <tr>
    <td>
    <b>&raquo; Scoatel din trib</b>
    </td>
    <td colspan="2">
    <a href="index.php?screen=users&action=edit&mode=kick_tribe&id={$id}">&raquo; Scoatel din trib</a>
    </td>
   </tr>
   <tr> 
    <td><b>Sate</b>
    </td>
    <td colspan="3">
    <table class="vis">
 <tr>
  <th>ID</th>
  <th>Nume sat</th>
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
<a href="index.php?screen=users&action=edit&mode=village&id={$id}&village_id={$village.id}">Ia acest sat</a>
</tr>
<tr>
{/foreach}
</table>
</td>
   </tr> 
</table>
<table class="vis" width="800">
<tr><th colspan="3"><center>Alte informatii</center></th></tr>
<tr><th width="10">ID</th><th width="400">IP Login</th><th>Data</th></tr>

{php} 



$id = $this->_tpl_vars['id'];
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * 20;
$sql = "SELECT COUNT(id) FROM logins WHERE userid = '$id'"; 
$rs_result = mysql_query($sql); 
$row = mysql_fetch_row($rs_result); 
$total_records = $row[0];
$total_pages = ceil($total_records / 20);



$select = mysql_query("SELECT time,ip,id FROM logins WHERE userid = '$id' ORDER BY time ASC LIMIT $start_from, 20");
while($array = mysql_fetch_array($select)){
$id = $array['id'];
$time = $array['time'];
$ip = $array['ip'];

echo "<tr><td>".$id."</td><td>".$ip."</td><td>".date("H:i:s d.m.Y", $time)."</td></tr>";


}
{/php}
<tr><td colspan="3"><center>
{php}
for ($i=1; $i<=$total_pages; $i++) { {/php}
<a href='index.php?screen=users&action=edit&name={$username}&id={$id}&page={php} echo $i; {/php}'>{php} echo $i; {/php}</a>
{php}
}; 
{/php}
</td></tr>

</table>
<table class="vis">
<tr><th width="120">Mail: </th><td>{php} $username = urlencode($this->_tpl_vars['username']); $select_mail = mysql_fetch_Array(mysql_query("SELECT email FROM login.users WHERE username = '$username'")); echo $select_mail[0]; {/php} </td></tr>
<tr><th width="120">IP Inregistrare: </th><td>{php} $username = urlencode($this->_tpl_vars['username']); $select_ipreg = mysql_fetch_Array(mysql_query("SELECT ip_inregistrare FROM users WHERE username = '$username'")); echo $select_ipreg[0]; {/php} </td></tr>
</table>
