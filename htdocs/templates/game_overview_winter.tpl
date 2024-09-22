
{php} 
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
	if($overview == "new"):
{/php}

<table>

<tr>
<td width="840" valign="top" valign="top">
<table width="100%"><tbody><tr>
<td>
{php}
	if($stufen == "yes")
	{
		echo "<a href=\"game.php?screen=overview&stufen=no&village=".$_GET[village]."\">Geb&auml;udestufen ausblenden</a>";
	}
	else
	{
		echo "<a href=\"game.php?screen=overview&stufen=yes&village=".$_GET[village]."\">Geb&auml;udestufen anzeigen</a>";
	}
{/php}





</td>
<td align="right"><a href="game.php?overview=old&screen=overview&village={php}echo $_GET[village];{/php}">zur klassischen Dorf&uuml;bersicht</a></td>
	
</tr></tbody></table>

<table cellspacing="0" cellpadding="0" style="border-width:1px; border-style: solid; border-color:#804000; background-color:#F1EBDD;" align="center">

<tr><td><div style="position:relative">

{php}

	$night = "visual";
	if($stunde>=24 || $stunde<8)
	{
	$night = "visual_night";
	}
	echo "<img width=\"600\" height=\"418\" src=\"winter/".$night."/back_none.jpg\" alt=\"\" />";


	
	while($row = mysql_fetch_assoc($res))
	{
		if($row[main] < 5)
		{
			if ($main == ".png")
			{
				echo"<img class=\"p_main\" src=\"graphic/".$night."/main1.png\" alt=\"Hauptgeb?ute\"/>";
			}
			if ($main == ".gif")
			{
				echo"<img class=\"p_main\" src=\"graphic/".$night."/main1.gif\" alt=\"Hauptgeb?ute\"/>";
			}	
		}
		if($row[main] >= 5 && $row[main]<15)
		{
			if ($main == ".png")
			{
				echo"<img class=\"p_main\" src=\"graphic/".$night."/main2.png\" alt=\"Hauptgeb?ute\"/>";
			}
			if ($main == ".gif")
			{
				echo"<img class=\"p_main\" src=\"graphic/".$night."/main2.gif\" alt=\"Hauptgeb?ute\"/>";
			}	
		}
		if($row[main] >= 15)
		{
			if ($main == ".png")
			{
				echo"<img class=\"p_main\" src=\"graphic/".$night."/main3.png\" alt=\"Hauptgeb?ute\"/>";
			}
			if ($main == ".gif")
			{
				echo"<img class=\"p_main\" src=\"graphic/".$night."/main3.gif\" alt=\"Hauptgeb?ute\"/>";
			}	
		}

		
		if($row[wall] < 5 && $row[wall] != 0)
		{
			echo "<img class=\"p_wall\" src=\"graphic/".$night."/wall1.png\" alt=\"Wall\"/>";
		}
		if($row[wall] >=5 && $row[wall] <15)
		{
			echo "<img class=\"p_wall\" src=\"graphic/".$night."/wall2.png\" alt=\"Wall\"/>";
		}
		if($row[wall] >= 15)
		{
			echo "<img class=\"p_wall\" src=\"graphic/".$night."/wall3.png\" alt=\"Wall\"/>";
		}

		
		if($row[place] == 1)
		{
			echo "<img class=\"p_place\" src=\"graphic/".$night."/place1.png\" alt=\"Versammlungsplatz\"/>";
		}
		

		if($row[hide] >=1 && $row[hide] != 0)
		{
			echo "<img class=\"p_hide\" src=\"graphic/".$night."/hide1.png\" alt=\"Versteck\"/>";
		}

		
		if($row[farm] <10)
		{
			echo "<img class=\"p_farm\" src=\"graphic/".$night."/farm1.png\" alt=\"Bauernhof\"/>";
		}
		if($row[farm] >=10 && $row[farm] <20)
		{
			echo "<img class=\"p_farm\" src=\"graphic/".$night."/farm2.png\" alt=\"Bauernhof\"/>";
	
		}
		if($row[farm] >=20)
		{
			echo "<img class=\"p_farm\" src=\"graphic/".$night."/farm3.png\" alt=\"Bauernhof\"/>";	
		}
		

		if($row[market] <5 && $row[market] != 0)
		{
			echo "<img class=\"p_market\" src=\"graphic/".$night."/market1.png\" alt=\"Marktplatz\"/>";
		}
		if($row[market] >=5 && $row[market] <20)
		{
			echo "<img class=\"p_market\" src=\"graphic/".$night."/market2.png\" alt=\"Marktplatz\"/>"; 	
		}
		if($row[market] >= 20)
		{
			echo "<img class=\"p_market\" src=\"graphic/".$night."/market3.png\" alt=\"Marktplatz\"/>";
		}

		
		if($row[wood] <10 && $row[wood] != 0)
		{
			echo "<img class=\"p_wood\" src=\"graphic/".$night."/wood1.png\" alt=\"Holzf?ller\"/>";
		}
		if($row[wood] >=10 && $row[wood] <20)
		{
			echo "<img class=\"p_wood\" src=\"graphic/".$night."/wood2.png\" alt=\"Holzf?ller\"/>";	
		}
		if($row[wood] >=20)
		{
			echo "<img class=\"p_wood\" src=\"graphic/".$night."/wood3.png\" alt=\"Holzf?ller\"/>";
		}

		
		if($row[iron] <10 && $row[iron] != 0)
		{
			echo "<img class=\"p_iron\" src=\"graphic/".$night."/iron1.png\" alt=\"Eisenmiene\"/>";
		}
		if($row[iron] >=10 && $row[iron] <20)
		{
			echo "<img class=\"p_iron\" src=\"graphic/".$night."/iron2.png\" alt=\"Eisenmiene\"/>";
		}
		if($row[iron] >=20)
		{
			echo "<img class=\"p_iron\" src=\"graphic/".$night."/iron3.png\" alt=\"Eisenmiene\"/>";
		}


		if($row[stone] <10 && $row[stone] != 0)
		{
			echo "<img class=\"p_stone\" src=\"graphic/".$night."/stone1.png\" alt=\"Lehmgrube\"/>";
		}
		if($row[stone] >= 10 && $row[stone] <20)
		{
			echo "<img class=\"p_stone\" src=\"graphic/".$night."/stone2.png\" alt=\"Lehmgrube\"/>";
		}
		if($row[stone] >=20)
		{
			echo "<img class=\"p_stone\" src=\"graphic/".$night."/stone3.png\" alt=\"Lehmgrube\"/>";	
		}


		if($row[storage] < 10)
		{
			echo "<img class=\"p_storage\" src=\"graphic/".$night."/storage1.png\" alt=\"Speicher\"/>";
		}
		if($row[storage] >=10 && $row[storage] <20)
		{
			echo "<img class=\"p_storage\" src=\"graphic/".$night."/storage2.png\" alt=\"Speicher\"/>";
		}
		if($row[storage] >= 20)
		{
			echo "<img class=\"p_storage\" src=\"graphic/".$night."/storage3.png\" alt=\"Speicher\"/>";
		}


		if($row[smith] < 5 && $row[smith] != 0)
		{
			echo "<img class=\"p_smith\" src=\"graphic/".$night."/smith1".$smith."\" alt=\"Schmiede\"/>";
		}
		if($row[smith] >=5 && $row[smith] < 15)
		{
			echo "<img class=\"p_smith\" src=\"graphic/".$night."/smith2".$smith."\" alt=\"Schmiede\"/>";
		}
		if($row[smith] >= 15)
		{
			echo "<img class=\"p_smith\" src=\"graphic/".$night."/smith3".$smith."\" alt=\"Schmiede\"/>";
		}


		if($row[barracks] < 5 && $row[barracks] != 0)
		{
			echo "<img class=\"p_barracks\" src=\"graphic/".$night."/barracks1".$barracks."\" alt=\"Kaserne\"/>";
		}
		if($row[barracks] >= 5 && $row[barracks] < 20)
		{
			echo "<img class=\"p_barracks\" src=\"graphic/".$night."/barracks2".$barracks."\" alt=\"Kaserne\"/>";
		}
		if($row[barracks] >=20)
		{
			echo "<img class=\"p_barracks\" src=\"graphic/".$night."/barracks3".$barracks."\" alt=\"Kaserne\"/>";	
		}


		if($row[snob] >= 1)	
		{
			echo "<img class=\"p_snob\" src=\"graphic/".$night."/snob1".$snob."\" alt=\"Adelshof\"/>";
		}
		

		if($row[garage] < 5 && $row[garage] != 0)
		{
			echo "<img class=\"p_garage\" src=\"graphic/".$night."/garage1".$garage."\" alt=\"Werkstatt\"/>";
		}
		if($row[garage] >= 5 && $row[garage] < 10)
		{
			echo "<img class=\"p_garage\" src=\"graphic/".$night."/garage2".$garage."\" alt=\"Werkstatt\"/>";
		}
		if($row[garage] >=10)
		{
			echo "<img class=\"p_garage\" src=\"graphic/".$night."/garage3".$garage."\" alt=\"Werkstatt\"/>";
		}


		if($row[stable] <5 && $row[stable] != 0)
		{
			echo "<img class=\"p_stable\" src=\"graphic/".$night."/stable1".$stable."\" alt=\"Stall\"/>";
		}
		if($row[stable] >= 5 && $row[stable] < 10)
		{
			echo "<img class=\"p_stable\" src=\"graphic/".$night."/stable2".$stable."\" alt=\"Stall\"/>";
		}
		if($row[stable] >= 10)
		{
			echo "<img class=\"p_stable\" src=\"graphic/".$night."/stable3".$stable."\" alt=\"Stall\"/>";
		}
		

	}

	
		
	




	
 {/php}




			<img class="empty" src="graphic/map/empty.png" alt="" usemap="#map" />
				
				<map name="map" id="map">
					{php} $_from = $this->_tpl_vars['built_builds']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dbname']):
{/php}
						{php} if ($this->_tpl_vars['dbname'] == 'main'): {/php}
							<area shape="poly" coords="250,120,215,140,222,200,280,230,340,195,337,130" href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
"/>
						{php} endif; {/php}
						{php} if ($this->_tpl_vars['dbname'] == 'barracks'): {/php}
							<area shape="poly" coords="476,103,419,155,450,200,505,216,546,175" href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
"/>
						{php} endif; {/php}
						{php} if ($this->_tpl_vars['dbname'] == 'stable'): {/php}
							<area shape="poly" coords="304,219,238,263,302,306,370,274,354,243" href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
"/>
						{php} endif; {/php}
						{php} if ($this->_tpl_vars['dbname'] == 'garage'): {/php}
							<area shape="poly" coords="101,94,50,186,153,204,188,142" href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
"/>
						{php} endif; {/php}
						{php} if ($this->_tpl_vars['dbname'] == 'snob'): {/php}
							<area shape="poly" coords="366,282,295,313,288,351,338,381,408,329" href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
"/>
						{php} endif; {/php}
						{php} if ($this->_tpl_vars['dbname'] == 'smith'): {/php}
							<area shape="poly" coords="161,63,150,112,204,140,253,113,214,58" href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
"/>
						{php} endif; {/php}
						{php} if ($this->_tpl_vars['dbname'] == 'place'): {/php}
							<area shape="poly" coords="400,147,320,218,363,241,383,275,427,231,424,176" href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
"/>
						{php} endif; {/php}
						{php} if ($this->_tpl_vars['dbname'] == 'market'): {/php}
							<area shape="poly" coords="442,203,406,285,456,326,521,278,528,226" href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
"/>
						{php} endif; {/php}
						{php} if ($this->_tpl_vars['dbname'] == 'wood'): {/php}
							<area shape="poly" coords="540,330,505,370,505,390,555,417,599,360" href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
"/>
						{php} endif; {/php}
						{php} if ($this->_tpl_vars['dbname'] == 'stone'): {/php}
							<area shape="poly" coords="0,320,0,417,40,417,95,370" href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
"/>
						{php} endif; {/php}
						{php} if ($this->_tpl_vars['dbname'] == 'iron'): {/php}
							<area shape="poly" coords="5,0,5,75,50,75,125,30,115,0" href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
"/>
						{php} endif; {/php}
						{php} if ($this->_tpl_vars['dbname'] == 'farm'): {/php}
							<area shape="poly" coords="277,35,243,90,272,118,397,133,423,98,387,39" href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
"/>
						{php} endif; {/php}
						{php} if ($this->_tpl_vars['dbname'] == 'storage'): {/php}
							<area shape="poly" coords="155,222,92,288,159,318,209,278,154,219" href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
"/>
						{php} endif; {/php}
						{php} if ($this->_tpl_vars['dbname'] == 'hide'): {/php}
							<area shape="poly" coords="218,285,179,337,209,363,279,347,266,308" href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
"/>
						{php} endif; {/php}
						{php} if ($this->_tpl_vars['dbname'] == 'storage'): {/php}
							<area shape="poly" coords="464,12,444,70,534,112,566,49" href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
"/>
						{php} endif; {/php}
						

						
					{php} endforeach; endif; unset($_from); {/php}
				</map>

{php}
	if($stufen == "yes"):
{/php}

				
					{php} $_from = $this->_tpl_vars['built_builds']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dbname']):
{/php}
						{php} if ($this->_tpl_vars['dbname'] == 'main'): {/php}
							<div id="l_{php} echo $this->_tpl_vars['dbname']; {/php}
" class="l_{php} echo $this->_tpl_vars['dbname']; {/php}
">
								<div class="label">
									<a href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
">
										<img src="graphic/buildings/{php} echo $this->_tpl_vars['dbname']; {/php}
.png" class="middle" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" /> {php} echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; {/php}

									</a><br><span style="font-size: 7px; font-weight: bold;"><span class="timer">{php}echo $aus_main;{/php}</span></span>
								</div>
							</div>
						{php} endif; {/php}
						
						{php} if ($this->_tpl_vars['dbname'] == 'barracks'): {/php}
							<div id="l_{php} echo $this->_tpl_vars['dbname']; {/php}
" class="l_{php} echo $this->_tpl_vars['dbname']; {/php}
">
								<div class="label">
									<a href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
">
										<img src="graphic/buildings/{php} echo $this->_tpl_vars['dbname']; {/php}
.png" class="middle" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" /> {php} echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; {/php}

									</a><br><span style="font-size: 7px; font-weight: bold;"><span class="timer">{php}echo $aus_barracks;{/php}</span></span>
								</div>
							</div>
						{php} endif; {/php}
						
						{php} if ($this->_tpl_vars['dbname'] == 'stable'): {/php}
							<div id="l_{php} echo $this->_tpl_vars['dbname']; {/php}
" class="l_{php} echo $this->_tpl_vars['dbname']; {/php}
">
								<div class="label">
									<a href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
">
										<img src="graphic/buildings/{php} echo $this->_tpl_vars['dbname']; {/php}
.png" class="middle" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" /> {php} echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; {/php}

									</a><br><span style="font-size: 7px; font-weight: bold;"><span class="timer">{php}echo $aus_stable;{/php}</span></span>
								</div>
							</div>
						{php} endif; {/php}
						
						{php} if ($this->_tpl_vars['dbname'] == 'garage'): {/php}
							<div id="l_{php} echo $this->_tpl_vars['dbname']; {/php}
" class="l_{php} echo $this->_tpl_vars['dbname']; {/php}
">
								<div class="label">
									<a href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
">
										<img src="graphic/buildings/{php} echo $this->_tpl_vars['dbname']; {/php}
.png" class="middle" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" /> {php} echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; {/php}

									</a><br><span style="font-size: 7px; font-weight: bold;"><span class="timer">{php}echo $aus_garage;{/php}</span></span>
								</div>
							</div>
						{php} endif; {/php}
						
						{php} if ($this->_tpl_vars['dbname'] == 'snob'): {/php}
							<div id="l_{php} echo $this->_tpl_vars['dbname']; {/php}
" class="l_{php} echo $this->_tpl_vars['dbname']; {/php}
">
								<div class="label">
									<a href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
">
										<img src="graphic/buildings/{php} echo $this->_tpl_vars['dbname']; {/php}
.png" class="middle" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" /> {php} echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; {/php}

									</a><br><span style="font-size: 7px; font-weight: bold;"><span class="timer">{php}echo $aus_snob;{/php}</span></span>
								</div>
							</div>
						{php} endif; {/php}
						
						{php} if ($this->_tpl_vars['dbname'] == 'smith'): {/php}
							<div id="l_{php} echo $this->_tpl_vars['dbname']; {/php}
" class="l_{php} echo $this->_tpl_vars['dbname']; {/php}
">
								<div class="label">
									<a href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
">
										<img src="graphic/buildings/{php} echo $this->_tpl_vars['dbname']; {/php}
.png" class="middle" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" /> {php} echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; {/php}

									</a><br><span style="font-size: 7px; font-weight: bold;"><span class="timer">{php}echo $aus_smith;{/php}</span></span>
								</div>
							</div>
						{php} endif; {/php}
						
						{php} if ($this->_tpl_vars['dbname'] == 'place'): {/php}
							<div id="l_{php} echo $this->_tpl_vars['dbname']; {/php}
" class="l_{php} echo $this->_tpl_vars['dbname']; {/php}
">
								<div class="label">
									<a href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
">
										<img src="graphic/buildings/{php} echo $this->_tpl_vars['dbname']; {/php}
.png" class="middle" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" /> {php} echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; {/php}

									</a>
								</div>
							</div>
						{php} endif; {/php}
						
						{php} if ($this->_tpl_vars['dbname'] == 'market'): {/php}
							<div id="l_{php} echo $this->_tpl_vars['dbname']; {/php}
" class="l_{php} echo $this->_tpl_vars['dbname']; {/php}
">
								<div class="label">
									<a href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
">
										<img src="graphic/buildings/{php} echo $this->_tpl_vars['dbname']; {/php}
.png" class="middle" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" /> {php} echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; {/php}

									</a>
{php}
	$sql = "SELECT * FROM villages WHERE id =".$_GET[village];
	$res = mysql_query($sql);
	while($row = mysql_fetch_assoc($res))
	{
		$dealers = $row[dealers_outside];
		$market = $row[market];
	}
	include("././include/configs/dealers.php");
	$dealers_in = $arr_dealers[$market] - $dealers;
	
{/php}
<br><span style="font-size: 7px; font-weight: bold;">{php}echo $dealers_in; {/php}/{php}echo $arr_dealers[$market];{/php}</span>
								</div>
							</div>
						{php} endif; {/php}
						
						{php} if ($this->_tpl_vars['dbname'] == 'wood'): {/php}
							<div id="l_{php} echo $this->_tpl_vars['dbname']; {/php}
" class="l_{php} echo $this->_tpl_vars['dbname']; {/php}
">
								<div class="label">
									<a href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
">
										<img src="graphic/buildings/{php} echo $this->_tpl_vars['dbname']; {/php}
.png" class="middle" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" /> {php} echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; {/php}

									</a>
								</div>
							</div>
						{php} endif; {/php}
						
						{php} if ($this->_tpl_vars['dbname'] == 'stone'): {/php}
							<div id="l_{php} echo $this->_tpl_vars['dbname']; {/php}
" class="l_{php} echo $this->_tpl_vars['dbname']; {/php}
">
								<div class="label">
									<a href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
">
										<img src="graphic/buildings/{php} echo $this->_tpl_vars['dbname']; {/php}
.png" class="middle" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" /> {php} echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; {/php}

									</a>
								</div>
							</div>
						{php} endif; {/php}
						
						{php} if ($this->_tpl_vars['dbname'] == 'iron'): {/php}
							<div id="l_{php} echo $this->_tpl_vars['dbname']; {/php}
" class="l_{php} echo $this->_tpl_vars['dbname']; {/php}
">
								<div class="label">
									<a href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
">
										<img src="graphic/buildings/{php} echo $this->_tpl_vars['dbname']; {/php}
.png" class="middle" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" /> {php} echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; {/php}

									</a>
								</div>
							</div>
						{php} endif; {/php}
						
						{php} if ($this->_tpl_vars['dbname'] == 'farm'): {/php}
							<div id="l_{php} echo $this->_tpl_vars['dbname']; {/php}
" class="l_{php} echo $this->_tpl_vars['dbname']; {/php}
">
								<div class="label">
									<a href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
">
										<img src="graphic/buildings/{php} echo $this->_tpl_vars['dbname']; {/php}
.png" class="middle" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" /> {php} echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; {/php}

									</a>
								</div>
							</div>
						{php} endif; {/php}
						
						{php} if ($this->_tpl_vars['dbname'] == 'storage'): {/php}
							<div id="l_{php} echo $this->_tpl_vars['dbname']; {/php}
" class="l_{php} echo $this->_tpl_vars['dbname']; {/php}
">
								<div class="label">
									<a href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
">
										<img src="graphic/buildings/{php} echo $this->_tpl_vars['dbname']; {/php}
.png" class="middle" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" /> {php} echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; {/php}

									</a><br>

								</div>
							</div>
						{php} endif; {/php}
						
						{php} if ($this->_tpl_vars['dbname'] == 'hide'): {/php}
							<div id="l_{php} echo $this->_tpl_vars['dbname']; {/php}
" class="l_{php} echo $this->_tpl_vars['dbname']; {/php}
">
								<div class="label">
									<a href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
">
										<img src="graphic/buildings/{php} echo $this->_tpl_vars['dbname']; {/php}
.png" class="middle" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" /> {php} echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; {/php}

									</a>
								</div>
							</div>
						{php} endif; {/php}
						
						{php} if ($this->_tpl_vars['dbname'] == 'wall'): {/php}
							<div id="l_{php} echo $this->_tpl_vars['dbname']; {/php}
" class="l_{php} echo $this->_tpl_vars['dbname']; {/php}
">
								<div class="label">
									<a href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
">
										<img src="graphic/buildings/{php} echo $this->_tpl_vars['dbname']; {/php}
.png" class="middle" alt="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
" /> {php} echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; {/php}

									</a>
								</div>
							</div>
						{php} endif; {/php}
					
					{php} endforeach; endif; unset($_from); {/php}{php} endif{/php}
				  

</div>
				<script type="text/javascript">overviewShowLevel();</script>
				</td></tr></table>
								

			
		</td>
		<td valign="top">
			<table class="vis" width="100%">
				<tr><th colspan="2">Produktion</th></tr>
				<tr class="nowrap"><td width="70"><img src="graphic/holz.png" title="Holz" alt="" /> Holz</td><td><strong>{php} echo $this->_tpl_vars['wood_prod_overview']; {/php}
</strong> pro {php} if ($this->_tpl_vars['speed'] > 10): {/php}Minute{php} else: {/php}Stunde{php} endif; {/php}</td></tr>
				<tr class="nowrap"><td><img src="graphic/lehm.png" title="Lehm" alt="" /> Lehm</td><td><strong>{php} echo $this->_tpl_vars['stone_prod_overview']; {/php}
</strong> pro {php} if ($this->_tpl_vars['speed'] > 10): {/php}Minute{php} else: {/php}Stunde{php} endif; {/php}</td></tr>
				<tr class="nowrap"><td><img src="graphic/eisen.png" title="Eisen" alt="" /> Eisen</td><td><strong>{php} echo $this->_tpl_vars['iron_prod_overview']; {/php}
</strong> pro {php} if ($this->_tpl_vars['speed'] > 10): {/php}Minute{php} else: {/php}Stunde{php} endif; {/php}</td></tr>
			</table>
			<br />
			<table class="vis" width="100%">
				<tr><th>Einheiten</th></tr>
                {php} $_from = $this->_tpl_vars['in_village_units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['num']):
{/php}
                	<tr><td><img src="graphic/unit/{php} echo $this->_tpl_vars['dbname']; {/php}
.png"> <b>{php} echo $this->_tpl_vars['num']; {/php}
</b> {php} echo $this->_tpl_vars['cl_units']->get_name($this->_tpl_vars['dbname']); {/php}
</td></tr>
                {php} endforeach; endif; unset($_from); {/php}
			</table>
			<br />
			{php} if ($this->_tpl_vars['village']['agreement'] != '100'): {/php}
				<table class="vis" width="100%">
				<tr><th>Zustimmung:</th><th>{php} echo $this->_tpl_vars['village']['agreement']; {/php}
</th></tr>
				</table>
				<br />
			{php} endif; {/php}
			
						{php} if (count ( $this->_tpl_vars['other_movements'] ) > 0): {/php}
			<table class="vis">
				<tr>
					<th width="250">Ankommende Truppen</th>
					<th width="160">Ankunft</th>
					<th width="80">Ankunft in</th>
				</tr>
				{php} $_from = $this->_tpl_vars['other_movements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['array']):
{/php}
				    <tr>
				        <td>
				            <a href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&amp;screen=info_command&amp;id={php} echo $this->_tpl_vars['array']['id']; {/php}
&amp;type=other">
				            <img src="graphic/command/{php} echo $this->_tpl_vars['array']['type']; {/php}
.png"> {php} echo $this->_tpl_vars['array']['message']; {/php}

				            </a>
				        </td>
				        <td>{php} echo ((is_array($_tmp=$this->_tpl_vars['array']['end_time'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)); {/php}
</td>
				        {php} if ($this->_tpl_vars['array']['arrival_in'] < 0): {/php}
				        	<td>{php} echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); {/php}
</td>
				        {php} else: {/php}
				        	<td><span class="timer">{php} echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); {/php}
</span></td>
				        {php} endif; {/php}
				    </tr>
				{php} endforeach; endif; unset($_from); {/php}
			</table>
			{php} endif; {/php}
			
						{php} if (count ( $this->_tpl_vars['my_movements'] ) > 0): {/php}
			<table class="vis">
				<tr>
					<th width="250">Deine Truppen</th>
					<th width="160">Ankunft</th>
					<th width="80">Ankunft in</th>
				</tr>
				{php} $_from = $this->_tpl_vars['my_movements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['array']):
{/php}
				    <tr>
				        <td>
				            <a href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&amp;screen=info_command&amp;id={php} echo $this->_tpl_vars['array']['id']; {/php}
&amp;type=own">
				            <img src="graphic/command/{php} echo $this->_tpl_vars['array']['type']; {/php}
.png"> {php} echo $this->_tpl_vars['array']['message']; {/php}

				            </a>
				        </td>
				        <td>{php} echo ((is_array($_tmp=$this->_tpl_vars['array']['end_time'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)); {/php}
</td>
				        {php} if ($this->_tpl_vars['array']['arrival_in'] < 0): {/php}
				        	<td>{php} echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); {/php}
</td>
				        {php} else: {/php}
				        	<td><span class="timer">{php} echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); {/php}
</span></td>
				        {php} endif; {/php}
				        {php} if ($this->_tpl_vars['array']['can_cancel']): {/php}
				        	<td><a href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&amp;screen=place&amp;action=cancel&amp;id={php} echo $this->_tpl_vars['array']['id']; {/php}
&amp;h={php} echo $this->_tpl_vars['hkey']; {/php}
">abbrechen</a></td>
				        {php} endif; {/php}
				    </tr>
				{php} endforeach; endif; unset($_from); {/php}
			</table>
			{php} endif; {/php}
		</td>
	</tr>
</table>
{php} endif; {/php}
{php}
	if($overview == "old"):
{/php}
{php} require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_date', 'game_overview.tpl', 53, false),array('modifier', 'format_time', 'game_overview.tpl', 55, false),)), $this); {/php}
<h2>Dorf&uuml;bersicht {php} echo $this->_tpl_vars['village']['name']; {/php}
</h2>
<table>
	<tr>
		<td width="450" valign="top" valign="top">
			<table class="vis" width="100%">
				<tr>
					<th>Geb&auml;ude</th>
				</tr>
				{php} $_from = $this->_tpl_vars['built_builds']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dbname']):
{/php}
					<tr>
						<td><a href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&screen={php} echo $this->_tpl_vars['dbname']; {/php}
"><img src="graphic/buildings/{php} echo $this->_tpl_vars['dbname']; {/php}
.png"> {php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}
</a> (Stufe {php} echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; {/php}
)</td>{php} if ($this->_tpl_vars['dbname'] == "market") { /*echo "<td><strong>H&auml;ndler: 8/10</strong></td>";*/ } {/php}
					</tr>
				{php} endforeach; endif; unset($_from); {/php}
			</table>
<br><a href="game.php?overview=new&screen=overview&village={php}echo $_GET[village];{/php}">zur graphischen Dorf&uuml;bersicht</a>
		</td>
		<td valign="top">
			<table class="vis" width="100%">
				<tr><th colspan="2">Produktion</th></tr>
				<tr><td width="70"><img src="graphic/holz.png" title="Holz" alt="" /> Holz</td><td><strong>{php} echo $this->_tpl_vars['wood_prod_overview']; {/php}
</strong> pro {php} if ($this->_tpl_vars['speed'] > 10): {/php}Minute{php} else: {/php}Stunde{php} endif; {/php}</td></tr>
				<tr><td><img src="graphic/lehm.png" title="Lehm" alt="" /> Lehm</td><td><strong>{php} echo $this->_tpl_vars['stone_prod_overview']; {/php}
</strong> pro {php} if ($this->_tpl_vars['speed'] > 10): {/php}Minute{php} else: {/php}Stunde{php} endif; {/php}</td></tr>
				<tr><td><img src="graphic/eisen.png" title="Eisen" alt="" /> Eisen</td><td><strong>{php} echo $this->_tpl_vars['iron_prod_overview']; {/php}
</strong> pro {php} if ($this->_tpl_vars['speed'] > 10): {/php}Minute{php} else: {/php}Stunde{php} endif; {/php}</td></tr>
			</table>
			<br />
			<table class="vis" width="100%">
				<tr><th>Einheiten</th></tr>
                {php} $_from = $this->_tpl_vars['in_village_units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['num']):
{/php}
                	<tr><td><img src="graphic/unit/{php} echo $this->_tpl_vars['dbname']; {/php}
.png"> <b>{php} echo $this->_tpl_vars['num']; {/php}
</b> {php} echo $this->_tpl_vars['cl_units']->get_name($this->_tpl_vars['dbname']); {/php}
</td></tr>
                {php} endforeach; endif; unset($_from); {/php}
			</table>
			<br />
			{php} if ($this->_tpl_vars['village']['agreement'] != '100'): {/php}
				<table class="vis" width="100%">
				<tr><th>Zustimmung:</th><th>{php} echo $this->_tpl_vars['village']['agreement']; {/php}
</th></tr>
				</table>
				<br />
			{php} endif; {/php}
			
						{php} if (count ( $this->_tpl_vars['other_movements'] ) > 0): {/php}
			<table class="vis">
				<tr>
					<th width="250">Ankommende Truppen</th>
					<th width="160">Ankunft</th>
					<th width="80">Ankunft in</th>
				</tr>
				{php} $_from = $this->_tpl_vars['other_movements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['array']):
{/php}
				    <tr>
				        <td>
				            <a href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&amp;screen=info_command&amp;id={php} echo $this->_tpl_vars['array']['id']; {/php}
&amp;type=other">
				            <img src="graphic/command/{php} echo $this->_tpl_vars['array']['type']; {/php}
.png"> {php} echo $this->_tpl_vars['array']['message']; {/php}

				            </a>
				        </td>
				        <td>{php} echo ((is_array($_tmp=$this->_tpl_vars['array']['end_time'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)); {/php}
</td>
				        {php} if ($this->_tpl_vars['array']['arrival_in'] < 0): {/php}
				        	<td>{php} echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); {/php}
</td>
				        {php} else: {/php}
				        	<td><span class="timer">{php} echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); {/php}
</span></td>
				        {php} endif; {/php}
				    </tr>
				{php} endforeach; endif; unset($_from); {/php}
			</table>
			{php} endif; {/php}
			
						{php} if (count ( $this->_tpl_vars['my_movements'] ) > 0): {/php}
			<table class="vis">
				<tr>
					<th width="250">Deine Truppen</th>
					<th width="160">Ankunft</th>
					<th width="80">Ankunft in</th>
				</tr>
				{php} $_from = $this->_tpl_vars['my_movements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['array']):
{/php}
				    <tr>
				        <td>
				            <a href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&amp;screen=info_command&amp;id={php} echo $this->_tpl_vars['array']['id']; {/php}
&amp;type=own">
				            <img src="graphic/command/{php} echo $this->_tpl_vars['array']['type']; {/php}
.png"> {php} echo $this->_tpl_vars['array']['message']; {/php}

				            </a>
				        </td>
				        <td>{php} echo ((is_array($_tmp=$this->_tpl_vars['array']['end_time'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)); {/php}
</td>
				        {php} if ($this->_tpl_vars['array']['arrival_in'] < 0): {/php}
				        	<td>{php} echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); {/php}
</td>
				        {php} else: {/php}
				        	<td><span class="timer">{php} echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); {/php}
</span></td>
				        {php} endif; {/php}
				        {php} if ($this->_tpl_vars['array']['can_cancel']): {/php}
				        	<td><a href="game.php?village={php} echo $this->_tpl_vars['village']['id']; {/php}
&amp;screen=place&amp;action=cancel&amp;id={php} echo $this->_tpl_vars['array']['id']; {/php}
&amp;h={php} echo $this->_tpl_vars['hkey']; {/php}
">abbrechen</a></td>
				        {php} endif; {/php}
				    </tr>
				{php} endforeach; endif; unset($_from); {/php}
			</table>
			{php} endif; {/php}
		</td>
	</tr>
</table>
{php} endif; {/php}
	
