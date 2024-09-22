
{php} 
  require_once("graphic.php");
  if ($w == 'winter') {
  $graphic = "winter";
  }
  else {
  $graphic = "graphic";
  }
	$sql100 = "SELECT * FROM build WHERE villageid ='".$_GET["village"]."'";
	$res100 = mysql_query($sql100);
	while($row100 = mysql_fetch_assoc($res100))
	{
		$time_end = $row100[end_time];
		
	}
	mysql_free_result($res100);
	if(!empty($time_end) && $time_end != 0)
	{
		$diff = $time_end - time();
		if($diff >= 0)
		{
			$aus_main = date("H", $diff) - 1;
			$aus_main .= date(":i:s", $diff);
		}
		else
		{
			$aus_main = "0:00:00";
		}
		
	}
	$time_end = 0;
		


	$sql100 = "SELECT * FROM recruit WHERE villageid ='".$_GET["village"]."' AND building = 'barracks'";
	$res100 = mysql_query($sql100);
	while($row100 = mysql_fetch_assoc($res100))
	{
		$time_end = $row100[time_finished];
		
	}
	if(!empty($time_end) && $time_end != 0)
	{
		$diff = $time_end - time();
		if($diff >= 0)
		{
			$aus_barracks = date("H", $diff) - 1;
			$aus_barracks .= date(":i:s", $diff);
		}
		else
		{
			$aus_barracks = "0:00:00";
		}
		
	}
	mysql_free_result($res100);
	$time_end = 0;

	$sql100 = "SELECT * FROM recruit WHERE villageid ='".$_GET["village"]."' AND building = 'stable'";
	$res100 = mysql_query($sql100);
	while($row100 = mysql_fetch_assoc($res100))
	{
		$time_end = $row100[time_finished];
		
	}
	if(!empty($time_end) && $time_end != 0)
	{
		$diff = $time_end - time();
		if($diff >= 0)
		{

			$aus_stable = date("H", $diff) - 1;
			$aus_stable .= date(":i:s", $diff);
		}
		else
		{
			$aus_stable = "0:00:00";
		}
	}
	mysql_free_result($res100);
	$time_end = 0;
	$sql101 = "SELECT * FROM recruit WHERE villageid ='".$_GET["village"]."' AND building = 'garage'";
	$res101 = mysql_query($sql101);
	while($row101 = mysql_fetch_assoc($res101))
	{
		$time_end1 = $row101[time_finished];
		
	}
	if(!empty($time_end1) && $time_end1 != 0)
	{
		$diff = $time_end1 - time();
		if($diff >= 0)
		{
			$aus_garage = date("H", $diff) - 1;
			$aus_garage .= date(":i:s", $diff);
		}
		else
		{
			$aus_garage = "0:00:00";
		}
		
	}
	mysql_free_result($res101);
	$time_end1 = 0;

	$sql100 = "SELECT * FROM recruit WHERE villageid ='".$_GET["village"]."' AND building = 'snob'";
	$res100 = mysql_query($sql100);
	while($row100 = mysql_fetch_assoc($res100))
	{
		$time_end = $row100[time_finished];
	}
	if(!empty($time_end) && $time_end != 0)
	{
		$diff = $time_end - time();
		if($diff >= 0)
		{
			$aus_snob = date("H", $diff) - 1;
			$aus_snob .= date(":i:s", $diff);
		}
		else
		{
			$aus_snob = "0:00:00";
		}
	}
	mysql_free_result($res100);
	$time_end = 0;

	$sql100 = "SELECT * FROM research WHERE villageid ='".$_GET["village"]."'";
	$res100 = mysql_query($sql100);
	while($row100 = mysql_fetch_assoc($res100))
	{
		$time_end = $row100[end_time];
	}
	if(!empty($time_end) && $time_end != 0)
	{
		$diff = $time_end - time();
		if($diff >= 0)
		{
			$aus_smith = date("H", $diff) - 1;
			$aus_smith .= date(":i:s", $diff);
		}
		else
		{
			$aus_smith = "0:00:00";
		}
	}
	mysql_free_result($res100);
	$time_end = 0;

	$stunde = date("H");
	$sql1 = "SELECT * FROM events WHERE villageid ='". $_GET["village"] . "'";	
	$res1 = mysql_query($sql1);
	$main = ".png";
	$smith = ".png"; 
	while($row1 = mysql_fetch_assoc($res1))
	{
		if($row1[event_type] == "build")
		{
			
			$main = ".gif";
		}
		if($row1[event_type] == "research")
		{
			$smith = ".gif";
		}
		
	}
	

	$barracks = ".png";
	$garage = ".png";
	$stable = ".png";
	$snob = ".png";
	$sql2 = "SELECT * FROM recruit WHERE villageid ='". $_GET["village"] . "'";
	$res2 = mysql_query($sql2);
	while($row2 = mysql_fetch_assoc($res2))
	{
		if($row2[building] == "barracks")
		{
			$barracks = ".gif";
		}
		if($row2[building] == "garage")
		{
			$garage = ".gif";
		}
		if($row2[building] == "stable")
		{
			$stable = ".gif";
		}
		if($row2[building] == "snob")
		{
			$snob = ".gif";
		}
	}
	$sql = "SELECT * FROM villages WHERE id ='". $_GET["village"] . "'";
	$res = mysql_query($sql);
	echo <<<FA

FA;

	$sql3 = "SELECT * FROM villages WHERE id =\"". $_GET["village"] ."\"";
	$res3 = mysql_query($sql3);
	while($row3 = mysql_fetch_assoc($res3))
	{
		
		$sql4 = "SELECT * FROM users WHERE id =\"".$row3[userid]."\"";

	}
	$res4 = mysql_query($sql4);
	while($row4 = mysql_fetch_assoc($res4));
	{
		if($row4[stufen] == "yes")
		{
			echo <<<FA

FA;
		}
		else
		{
			echo <<<FA

FA;
		}
	}
	echo <<<FA

FA;
{/php}
{php}
	$sql3 = "SELECT * FROM villages WHERE id =\"". $_GET["village"] ."\"";
	$res3 = mysql_query($sql3);
	while($row3 = mysql_fetch_assoc($res3))
	{
		
		$userid = $row3[userid];

	}	

	if($_GET[overview] == "old")
	{
		$sql10 = "UPDATE users SET overview = \"old\" WHERE id = ".$userid."  LIMIT 1;";
		mysql_query($sql10);	
	}
	if($_GET[overview] == "new")
	{
		$sql11 = "UPDATE users SET overview = \"new\" WHERE id = ".$userid."  LIMIT 1;";

		mysql_query($sql11);	
	}	
{/php}

{php}
	if($_GET[stufen] == "yes")
	{
		$sql12 = "UPDATE users SET stufen = \"yes\" WHERE id = ".$userid."  LIMIT 1;";
		mysql_query($sql12);
	}
	if($_GET[stufen] == "no")
	{
		$sql13 = "UPDATE users SET stufen = \"no\" WHERE id = ".$userid."  LIMIT 1;";
		mysql_query($sql13);
	}
{/php}
{php}

	

	$sql5 = "SELECT * FROM users WHERE id=\"".$userid."\"";
	$res5 = mysql_query($sql5);
	while($row5 = mysql_fetch_assoc($res5))
	{
		$overview = $row5[overview];
		$stufen = $row5[stufen];
	}
{/php}

{if $show_build}
   
	{if count($recruit_units)>0}
	    <table class="vis">
			<tr>
				<th width="150">Ausbildung</th>
				<th width="120">Dauer</th>
				<th width="150">Fertigstellung</th>
				<th width="100">Abbruch *</th>
			</tr>

			{foreach from=$recruit_units key=key item=value}
			    <tr {if $recruit_units.$key.lit}class="lit"{/if}>
					<td>{$recruit_units.$key.num_unit} {$cl_units->get_name($recruit_units.$key.unit)}</td>
	                {if $recruit_units.$key.lit && $recruit_units.$key.countdown>-1}
						<td><span class="timer">{$recruit_units.$key.countdown|format_time}</span></td>
					{else}
					   	<td>{$recruit_units.$key.countdown|format_time}</td>
					{/if}
					<td>{$recruit_units.$key.time_finished|format_date}</td>
					<td><a href="game.php?t=129107&amp;village={$village.id}&amp;screen={$dbname}&amp;action=cancel&amp;id={$key}&amp;h={$hkey}">abbrechen</a></td>
			    </tr>
			{/foreach}

		</table>
		<div style="font-size: 7pt;">* (90% der Rohstoffe werden wiedergegeben)</div>
		<br>
	{/if}

	{if !empty($error)}
		<font class="error">{$error}</font>
	{/if}
	<form action="game.php?village={$village.id}&amp;screen={$dbname}&amp;action=train&amp;h={$hkey}" method="post" onsubmit="this.submit.disabled=true;">
		<table class="vis">
			<tr>
				<th width="150">Einheit</th>
				<th colspan="4" width="120">Bedarf</th>
				<th width="130">Zeit (hh:mm:ss)</th>
				<th>Im Dorf/Insgesamt</th>
				<th>Rekrutieren</th>
			</tr>

			{foreach from=$units key=unit_dbname item=name}
				<tr>
					<td><a href="javascript:popup('popup_unit.php?unit={$unit_dbname}', 520, 520)"> <img src="graphic/unit/{$unit_dbname}.png" alt="" /> {$name}</a></td>
					<td><img src="graphic/holz.png" title="Holz" alt="" /> {$cl_units->get_woodprice($unit_dbname)}</td>
					<td><img src="graphic/lehm.png" title="Lehm" alt="" /> {$cl_units->get_stoneprice($unit_dbname)}</td>
					<td><img src="graphic/eisen.png" title="Eisen" alt="" /> {$cl_units->get_ironprice($unit_dbname)}</td>
					<td><img src="graphic/face.png" title="Arbeiter" alt="" /> {$cl_units->get_bhprice($unit_dbname)}</td>
					<td>{$cl_units->get_time($village.$dbname,$unit_dbname)|format_time}</td>
					<td>{$units_in_village.$unit_dbname}/{$units_all.$unit_dbname}</td>

					{$cl_units->check_needed($unit_dbname,$village)}
					{if $cl_units->last_error==not_tec}
					    <td class="inactive">Einheit noch nicht erforscht</td>
					{elseif $cl_units->last_error==not_needed}
					    <td class="inactive">Gebäudevorraussetzungen nicht erfüllt</td>
					{elseif $cl_units->last_error==not_enough_ress}
					    <td class="inactive">Nicht genügend Rohstoffe vorhanden</td>
					{elseif $cl_units->last_error==not_enough_bh}
					    <td class="inactive">Zu wenig Bauernhöfe um zusätzliche Soldaten zu versorgen</td>
					{else}
						<td><input name="{$unit_dbname}" type="text" size="5" maxlength="5" /> <a href="javascript:insertUnit(document.forms[0].{$unit_dbname}, {$cl_units->last_error})">(max. {$cl_units->last_error})</a></td>
					{/if}
				</tr>
			{/foreach}

		    <tr><td colspan="8" align="right"><input name="submit" type="submit" value="Rekrutieren" style="font-size: 10pt;" /></td></tr>
		</table>
	</form>
{/if}