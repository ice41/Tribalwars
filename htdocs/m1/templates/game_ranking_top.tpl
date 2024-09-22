<h3> Top 5 Juc&#259;tori</h3>
<table class="vis" width="100%">
<tr><th width="30">Rang</th>
<th width="180">Porecl&#259;</th><th width="100">Trib</th>
<th width="120">Puncte</th><th>Sate</th></tr> 
{php}
$sql3 = "SELECT * from `users` ORDER BY rang ASC LIMIT 5";
	   $exec_sql2 = mysql_query($sql3) or die(mysql_error()); 
	   while ($array2 = mysql_fetch_array($exec_sql2)) {
	   $id_user[] = $array2['id'];
		  $points[] = $array2['points'];
		  $rang[] = $array2['rang'];
		  $trib[] = $array2['ally'];
		  $username[] = $array2['username'];
		   $village[] = $array2['villages'];
		  
	   }

	   foreach ($rang as $key => $value) {
			 if ($rang<>0) {
			 {/php}
	<tr>
			<td>{php} echo $rang[$key]; {/php}</td>
			<td><a href="game.php?village={$village.id}&screen=info_player&id={php} print $id_user[$key]; {/php}">{php} echo urldecode($username[$key]); {/php}</a></td>
			<td><a href="game.php?village={$village.id}&screen=info_player&id={php} print $trib[$key]; {/php}">{php} 
			$select = mysql_fetch_array(mysql_query("SELECT short FROM ally WHERE id = '$trib[$key]'"));
			$select = $select[0];
			echo urldecode($select);{/php}</a></td>
			<td>{php} echo number_format($points[$key],0,".","."); {/php}</td>
			<td>{php} echo $village[$key]; {/php}</td>
			</tr>
			
			{php}
			 }
      } 
	  {/php}
</table>
<h3> Top 5 Triburi</h3>
<table class="vis" width="100%">
<tr><th width="30">Rang</th>
<th width="180">Trib</th><th>Membri</th>
<th width="120">Punctaj total</th><th>Sate</th></tr> 
{php}
$sql4 = "SELECT * from `ally` ORDER BY rank ASC LIMIT 5";
	   $exec_sql4 = mysql_query($sql4) or die(mysql_error()); 
	   while ($array3 = mysql_fetch_array($exec_sql4)) {
	   $id_ally[] = $array3['id'];
	   $short[] = $array3['short'];
	     $rank_ally[] = $array3['rank'];
	   $points_ally[] = $array3['points'];
	   $best_points[] = $array3['best_points'];
	   $members[] = $array3['members'];
	   $villages_ally[] = $array3['villages'];
		  
	   }
if ($id_ally > 0){
	   foreach ($id_ally as $key => $value) {
			 if ($id_ally<>0) {
			 {/php}
	<tr>
			<td>{php} echo $rank_ally[$key]; {/php}</td>
			<td><a href="game.php?village={$village.id}&screen=info_ally&id={php} print $id_ally[$key]; {/php}">{php} echo urldecode($short[$key]); {/php}</a></td>
			<td> {php} echo $members[$key]; {/php}</td>
			<td>{php}  echo number_format($best_points[$key],0,".",".");{/php}</td>
			
			<td>{php} echo $villages_ally[$key]; {/php}</td>
			</tr>
			
			{php}
			 }}
      } 
	  {/php}
</table>
<h3> Top 5 Inamici Invinsi Jucatori</h3>
<table class="vis" width="100%">
<tr><th width="30">Rang</th>
<th width="180">Porecla</th><th>Punctaj</th></tr> 
{php}
$sql6 = "SELECT * from `users` ORDER BY killed_units_altogether_rank ASC LIMIT 5";
	   $exec_sql6 = mysql_query($sql6) or die(mysql_error()); 
	   while ($array6 = mysql_fetch_array($exec_sql6)) {
		  $id_user_kill[] = $array6['id'];
 		  $id_user_kill_ally[] = $array6['ally'];
		  $username_user[] = $array6['username'];
		  $killed_units_altogether_user[] = $array6['killed_units_altogether'];
		  $killed_units_altogether_rank_user[] = $array6['killed_units_altogether_rank'];
		  
	   }

foreach ($killed_units_altogether_rank_user as $key => $value) {
			 if ($killed_units_altogether_rank_user<>0) {
			 {/php}
	<tr>
			<td>{php} echo $killed_units_altogether_rank_user[$key]; {/php}</td>
			<td><a href="game.php?village={$village.id}&screen=info_player&id={php} print $id_user_kill[$key]; {/php}">{php} echo urldecode($username_user[$key]); {/php}</a>
{php} 
$select_short_ally_kill = mysql_fetch_array(mysql_query("SELECT short,id FROM ally WHERE id = '$id_user_kill_ally[$key]'"));
$select_short_kill = $select_short_ally_kill[0];
$select_id_kill = $select_short_ally_kill[1];
if ($id_user_kill_ally[$key] > 0) {
{/php}
[<a href="game.php?village={$village.id}&screen=info_ally&id={php} echo $select_id_kill; {/php}">{php} echo urldecode($select_short_kill); {/php}</a>]
{php}}{/php}

</td>
			<td>{php} echo number_format($killed_units_altogether_user[$key],0,".","."); {/php}</td>
			</tr>
			
			{php}
			 }
      } 
	  {/php}
</table>

