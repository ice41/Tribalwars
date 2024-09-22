<h3>Vizualizare lista jucatori</h3><br />

<table class="vis">
 <tr>
  <th>Nume</th>
  <th>ID</th>
  <th>Rang</th>
  <th>Puncte</th>
  <th>Sate</th>
  <th>Ultima activitate</th>
  <th>Inregistrat</th>
  <th>Sterge account</th>
 </tr>
{foreach from=$userInfo item=user}

<td><a href="index.php?screen=users&action=edit&name={$user.username}&id={$user.id}">{php}
$this->_tpl_vars['user']['username']=urldecode($this->_tpl_vars['user']['username']);
{/php}{$user.username}</a>
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
<td>
{php}
$timp = $this->_tpl_vars['user']['last_activity'];
echo date("d.m.Y", $timp);
{/php}

</td>
<td>
{$user.data_inregistrare}
</td>

<td>
{php}
$delete_acc_time = $this->_tpl_vars['user']['delete_acc'];
if ($delete_acc_time == '0'){
echo "Acest cont nu se sterge";
} else { echo "In curs de stergere: <b>".date("H:i d.m.Y", $delete_acc_time)."</b>"; }
{/php}

</td>

</td>
</tr>
<tr>
{/foreach}
<tr><td colspan="8"><center>
{php}
$total_pages=$this->_tpl_vars['page'];
for ($i=1; $i<=$total_pages; $i++) { {/php}
<a href='index.php?screen=users&page={php} echo $i; {/php}'>{php} echo $i; {/php}</a>
{php}
}; 
{/php}</center></td></tr>
</table>
