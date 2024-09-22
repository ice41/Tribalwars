{php}

$id_sat=$this->_tpl_vars['village']['id'];
$id_player=$this->_tpl_vars['user']['id'];
$mode=$_GET['mode'];
$_POST['from'] = addslashes($_POST['from']);
$from=$_POST['from'];
$_POST['name'] = addslashes($_POST['name']);
$name=$_POST['name'];
$_GET['start'] = addslashes($_GET['start']);
$start=$_GET['start'];
$this->_tpl_vars['lit']=$start;
settype($start, "integer");
if ($from<>"") {
   settype($from, "integer");
   $site=$from/20;
   if ($from%20<>0) {
      $site=$site+1;
   }
   settype($site, "integer");
   header("location: game.php?village=$id_sat&screen=ranking&mode=player&site=$site&start=$from");
}

if ($name<>"") {


   $name = trim($name);
   $name = urlencode($name);
   if (strlen($name)>=3) {

	   $sql3 = "select * from `users` where username like \"%$name%\"";
	   $exec_sql2 = mysql_query($sql3) or die(mysql_error()); 
	   $numar_search = mysql_num_rows($exec_sql2);
	   while ($array2 = mysql_fetch_array($exec_sql2)) {
		  $id_user_search[] = $array2['id'];
		  $username_user_search[] = $array2['username'];
		  $villages_user_search[] = $array2['villages'];
		  $points_user_search[] = $array2['points'];
		  $ally_user_search[] = $array2['ally'];
		  $rang_user_search[] = $array2['rang'];
	   }


   } else {
      echo "<h4 class='error'>Cautarea tebuie sa aiba minim 3 caractere!</h4>";
   }

}

{/php}
<table class="vis">
<tr><th width="60">Rank</th>
<th width="200">Nume</th><th width="100">Tribe</th>
<th width="60">Puncte</th><th>Sate</th><th>Medie puncte pe sat</th></tr>
{php}
        if (strlen($name)>=3) {
	   if ($numar_search<>0) {
		  foreach ($id_user_search as $key => $value) {
			 if ($villages_user_search[$key]<>0) {
				$medie_sat=$points_user_search[$key]/$villages_user_search[$key];
				$medie_sat=round($medie_sat);
			 } else {
				$medie_sat=0;
			 }


						 
                         $short_trib=urldecode($short_trib);
                         $username_user_search[$key]=urldecode($username_user_search[$key]);
			 echo '
		<tr>
			<td>',$rang_user_search[$key],'</td>
			<td><a href="game.php?village=',$id_sat,'&screen=info_player&id=',$value,'">',$username_user_search[$key],'</a></td>';
			$select_ally = mysql_fetch_array(mysql_query("SELECT short FROM ally WHERE id = '".$ally_user_search[$key]."'"));
			echo '<td><a href="game.php?village=',$id_sat,'&screen=info_ally&id=',$ally_user_search[$key],'">',urldecode($select_ally[0]),'</a></td>';
			echo '<td>',$points_user_search[$key],'</td>
			<td>',$villages_user_search[$key],'</td>
			<td>',$medie_sat,'</td>
		</tr>';        


		  }
           }

	} else { {/php}

	{foreach from=$ranks item=item key=id}
		<tr {if $lit==$ranks.$id.rang}class="lit"{/if} {$ranks.$id.mark}>
			<td>{$ranks.$id.rang}</td>
			<td><a href="game.php?village={$village.id}&screen=info_player&id={$id}">{$ranks.$id.username}</a></td>
			<td><a href="game.php?village={$village.id}&screen=info_ally&id={$ranks.$id.ally}">{$ranks.$id.allyname}</a></td>
			<td>{$ranks.$id.points}</td>
			<td>{$ranks.$id.villages}</td>
			<td>{$ranks.$id.cuttrought}</td>
		</tr>
	{/foreach}
	{php} } {/php}
</table>



<table class="vis" width="100%">
<tr width="100%">
{if $site!=1}
	<td align="center">
	<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=player&amp;site={$site-1}">&lt;&lt;&lt; sus</a></td>
{/if}
<td align="center">
<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=player&amp;site={$site+1}">jos &gt;&gt;&gt;</a></td>
</tr></table>



<table class="vis" width="100%"><tr> 

<td style="padding-right:10px; text-align: left;" width="50%"> 
<form action="game.php?village={$village.id}&amp;screen=ranking&amp;mode=player" method="post"> 
Rank: <input name="from" type="text" value="{php}if ($start) { echo $start; } {/php}" size="6" /> 
 <input type="submit" value="OK" /> 
</form> 
</td> 
 
<td style="padding-right:10px;text-align: left;"  width="50%"> 
<form action="game.php?village={$village.id}&amp;screen=ranking&amp;mode=player&amp;search=" method="post"> 
Search: 
  <input name="name" type="text" value="{php}echo urldecode($name);{/php}" size="20" /> 
<input type="submit" value="OK" /> 
</form> 
</td> 
</tr> 
 
</table>
