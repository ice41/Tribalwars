{php}
	$userid = $this->_tpl_vars['user']['id'];
	$vill = $this->_tpl_vars['village']['id'];

	require_once("graphic.php");
	if($w == 'winter'){
		$graphic = "winter";
	}else{
		$graphic = "graphic";
	}

	$sql100 = mysql_query("SELECT * FROM build WHERE villageid = '".$vill."' ORDER BY id DESC");
	$res100 = mysql_fetch_array($sql100);
	$n_main = mysql_num_rows($sql100);
	$time100 = $res100['end_time'] - time()+1;
	if($n_main > 0){
		$aus_main = format_time($time100);
	}

	$sql101 = mysql_query("SELECT * FROM recruit WHERE villageid = '".$vill."' AND building = 'barracks' ORDER BY id DESC");
	$res101 = mysql_fetch_array($sql101);
	$n_barracks = mysql_num_rows($sql101);
	$time101 = $res101['time_finished'] - time()+1;
	if($n_barracks > 0){
		$aus_barracks = format_time($time101);
	}

	$sql102 = mysql_query("SELECT * FROM recruit WHERE villageid = '".$vill."' AND building = 'stable' ORDER BY id DESC");
	$res102 = mysql_fetch_array($sql102);
	$n_stable = mysql_num_rows($sql102);
	$time102 = $res102['time_finished'] - time()+1;
	if($n_stable > 0){
		$aus_stable = format_time($time102);
	}

	$sql103 = mysql_query("SELECT * FROM recruit WHERE villageid = '".$vill."' AND building = 'garage' ORDER BY id DESC");
	$res103 = mysql_fetch_array($sql103);
	$n_garage = mysql_num_rows($sql103);
	$time103 = $res103['time_finished'] - time()+1;
	if($n_garage > 0){
		$aus_garage = format_time($time103);
	}

	$sql104 = mysql_query("SELECT * FROM recruit WHERE villageid = '".$vill."' AND building = 'snob' ORDER BY id DESC");
	$res104 = mysql_fetch_array($sql104);
	$n_snob = mysql_num_rows($sql104);
	$time104 = $res104['time_finished'] - time()+1;
	if($n_snob > 0){
		$aus_snob = format_time($time104);
	}

	$sql105 = mysql_query("SELECT * FROM research WHERE villageid = '".$vill."' ORDER BY id DESC");
	$res105 = mysql_fetch_array($sql105);
	$n_smith = mysql_num_rows($sql105);
	$time105 = $res105['end_time'] - time()+1;
	if($n_smith > 0){
		$aus_smith = format_time($time105);
	}

	$sql106 = mysql_query("SELECT * FROM recruit WHERE villageid = '".$vill."' AND building = 'statue' ORDER BY id DESC");
	$res106 = mysql_fetch_array($sql106);
	$n_statue = mysql_num_rows($sql106);
	$time106 = $res106['time_finished'] - time()+1;
	if($n_statue > 0){
		$aus_statue = format_time($time106);
	}

	$sql107 = "SELECT * FROM build WHERE villageid = '".$vill."' AND building = 'barracks'";
	$res107 = mysql_fetch_array(mysql_query($sql107));
	$barracks_end = $res107['end_time']-time()+1;
	$barracks_end = format_time($barracks_end);

	$sql108 = "SELECT * FROM build WHERE villageid = '".$vill."' AND building = 'stable'";
	$res108 = mysql_fetch_array(mysql_query($sql108));
	$stable_end = $res108['end_time']-time()+1;
	$stable_end = format_time($stable_end);

	$sql109 = "SELECT * FROM build WHERE villageid = '".$vill."' AND building = 'garage'";
	$res109 = mysql_fetch_array(mysql_query($sql109));
	$garage_end = $res109['end_time']-time()+1;
	$garage_end = format_time($garage_end);

	$sql110 = "SELECT * FROM build WHERE villageid = '".$vill."' AND building = 'garage'";
	$res110 = mysql_fetch_array(mysql_query($sql110));
	$garage_end = $res110['end_time']-time()+1;
	$garage_end = format_time($garage_end);

	$sql111 = "SELECT * FROM build WHERE villageid = '".$vill."' AND building = 'snob'";
	$res111 = mysql_fetch_array(mysql_query($sql111));
	$snob_end = $res111['end_time']-time()+1;
	$snob_end = format_time($snob_end);

	$sql112 = "SELECT * FROM build WHERE villageid = '".$vill."' AND building = 'smith'";
	$res112 = mysql_fetch_array(mysql_query($sql112));
	$smith_end = $res112['end_time']-time()+1;
	$smith_end = format_time($smith_end);

	$sql113 = "SELECT * FROM build WHERE villageid = '".$vill."' AND building = 'place'";
	$res113 = mysql_fetch_array(mysql_query($sql113));
	$place_end = $res113['end_time']-time()+1;
	$place_end = format_time($place_end);

	$sql114 = "SELECT * FROM build WHERE villageid = '".$vill."' AND building = 'market'";
	$res114 = mysql_fetch_array(mysql_query($sql114));
	$market_end = $res114['end_time']-time()+1;
	$market_end = format_time($market_end);

	$sql115 = "SELECT * FROM build WHERE villageid = '".$vill."' AND building = 'wood'";
	$res115 = mysql_fetch_array(mysql_query($sql115));
	$wood_end = $res115['end_time']-time()+1;
	$wood_end = format_time($wood_end);

	$sql116 = "SELECT * FROM build WHERE villageid = '".$vill."' AND building = 'stone'";
	$res116 = mysql_fetch_array(mysql_query($sql116));
	$stone_end = $res116['end_time']-time()+1;
	$stone_end = format_time($stone_end);

	$sql117 = "SELECT * FROM build WHERE villageid = '".$vill."' AND building = 'iron'";
	$res117 = mysql_fetch_array(mysql_query($sql117));
	$iron_end = $res117['end_time']-time()+1;
	$iron_end = format_time($iron_end);

	$sql118 = "SELECT * FROM build WHERE villageid = '".$vill."' AND building = 'hide'";
	$res118 = mysql_fetch_array(mysql_query($sql118));
	$hide_end = $res118['end_time']-time()+1;
	$hide_end = format_time($hide_end);

	$sql119 = "SELECT * FROM build WHERE villageid = '".$vill."' AND building = 'wall'";
	$res119 = mysql_fetch_array(mysql_query($sql119));
	$wall_end = $res119['end_time']-time()+1;
	$wall_end = format_time($wall_end);

	$sql120 = "SELECT * FROM build WHERE villageid = '".$vill."' AND building = 'statue'";
	$res120 = mysql_fetch_array(mysql_query($sql120));
	$statue_end = $res120['end_time']-time()+1;
	$statue_end = format_time($statue_end);

	$hora = date('H');
	$dia = date('d');
	$mes = date('m');

	$sql1 =  mysql_query("SELECT * FROM `events` WHERE `villageid` = '".$vill."'");
	$main = ".png";
	$smith = ".png"; 
	while($row1 = mysql_fetch_array($sql1)){
		if($row1['event_type'] == 'build'){
			$main = '.gif';
		}
		if($row1['event_type'] == 'research'){
			$smith = '.gif';
		}
	}

	if($this->_tpl_vars['village']['r_wood'] == $this->_tpl_vars['max_storage']){
		$ext = '.png';
	}else{
		$ext = '.gif';
	}
	if($this->_tpl_vars['village']['r_stone'] == $this->_tpl_vars['max_storage']){
		$ext2 = '.png';
	}else{
		$ext2 = '.gif';
	}
	if($this->_tpl_vars['village']['r_iron'] == $this->_tpl_vars['max_storage']){
		$ext3 = '.png';
	}else{
		$ext3 = '.gif';
	}
	if($this->_tpl_vars['village']['r_bh'] >= $this->_tpl_vars['max_bh']){
		$ext4 = '.png';
		$aa1 = 0;
	}else{
		$ext4 = '.gif';
		$aa1 = 1;
	}

	$barracks = '.png';
	$garage = '.png';
	$stable = '.png';
	$snob = '.png';
	$sql2 = mysql_query("SELECT * FROM recruit WHERE villageid = '".$vill."'");
	while($row2 = mysql_fetch_array($sql2)){
		if($row2['building'] == 'barracks'){
			$barracks = '.gif';
		}
		if($row2['building'] == 'garage'){
			$garage = '.gif';
		}
		if($row2['building'] == 'stable'){
			$stable = '.gif';
		}
		if($row2['building'] == 'snob'){
			$snob = '.gif';
		}
		if($row2['building'] == 'smith'){
			$smith= '.gif';
		}
	}
	$sql3 = mysql_query("SELECT * FROM villages WHERE id = '".$vill."'");

	$sql4 = mysql_fetch_array(mysql_query("SELECT * FROM `villages` WHERE `id` = '".$vill."'"));
	$userid = $sql4['userid'];

	if($_GET['overview'] == 'old'){
		$sql10 = "UPDATE `users` SET `overview` = 'old' WHERE `id` = '".$userid."'";
		mysql_query($sql10);
		header('Location: game.php?village='.$vill.'&screen=overview');
	}
	if($_GET['stufen'] == "yes"){
		$sql12 = "UPDATE users SET stufen = 'yes' WHERE id = '".$this->_tpl_vars['user']['id']."'";
		mysql_query($sql12) or die(mysql_error());
		header('Location: game.php?village='.$vill.'&screen=overview');
	}
	if($_GET['stufen'] == "no"){
		$sql13 = "UPDATE users SET stufen = 'no' WHERE id = '".$this->_tpl_vars['user']['id']."'";
		mysql_query($sql13) or die(mysql_error());
		header('Location: game.php?village='.$vill.'&screen=overview');
	}

	if(isset($_GET['info_acc']) && $_GET['info_acc'] == 'hide'){
		mysql_query("UPDATE `users` SET `info_acc_show` = '0' WHERE `id` = '".$userid."'");
	}
	$st = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$userid."'")) or die(mysql_error());
{/php}

<table align="center">
	<tr>
{php}
	if($st['info_acc_show'] == TRUE){ 
		$numar_rapoarte = mysql_num_rows(mysql_query("SELECT `id` FROM `reports` WHERE `receiver_userid` = '".$userid."'"));
		$numar_rapoarte_necitite = mysql_num_rows(mysql_query("SELECT `id` FROM `reports` WHERE `receiver_userid` = '".$userid."' AND `is_new` = '1'"));
		include("include/config.php");
{/php}
		<td width="280" valign="top">
			<table class="vis" width="280" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr><th colspan="2">Informa&ccedil;&otilde;es da conta <span style="float:right;"><a id="hide_info_acc" href="javascript:hide_info_acc()">Esconder</a><a id="hide_cancel_info_acc" href="javascript:show_info_acc()" style="display:none;">Mostrar</a></span></th></tr>
				<tr id="info_acc_points"><td width="120">Pontos:</td><td align="center">{php}echo format_number($st['points']);{/php}&nbsp;|&nbsp;<b>{php}echo format_number($st['rang']);{/php}</b></td></tr>
				<tr id="info_acc_villages"><td>Aldeias:</td><td align="center">{php}echo format_number($st['villages']);{/php}</td></tr>
				<tr id="info_acc_hives"><td>Saque:</td><td align="center">{php}echo format_number($st['hives_total']);{/php}&nbsp;|&nbsp;<b>{php}if($st['hives_rank'] <= '20'){echo $st['hives_rank'];}{/php}</b></td></tr>
				<tr id="info_acc_nr_reports"><td>Relat&oacute;rios:</td><td align="center">{php}echo $numar_rapoarte;{/php}</td></tr>
				<tr id="info_acc_nr_reports_new"><td>Relat&oacute;rios novos:</td><td align="center">{php}echo $numar_rapoarte_necitite;{/php}</td>
				<tr id="info_acc_ip"><td>IP atual:</td><td align="center">{php} echo $_SERVER['REMOTE_ADDR']; {/php}</td></tr>
{php}
		if($st['ally'] > 0){
			$trib = mysql_query("SELECT * FROM `ally` WHERE `id` = '".$st['ally']."'");
			$exista = mysql_num_rows($trib);
			if($exista == '1'){
				$trib = mysql_fetch_assoc($trib);
				echo '<tr><th colspan="2">Informa&ccedil;&otilde;es da tribo <span style="float:right;"><a id="hide_info_ally" href="javascript:hide_info_ally()">Esconder</a><a id="hide_cancel_info_ally" href="javascript:show_info_ally()" style="display:none;">Mostrar</a></span></th></tr>';
				echo '<tr id="info_ally_name"><td>Nome:</td><td align="center">'.stripslashes(entparse($trib['name'])).'</td></tr>';
				echo '<tr id="info_ally_short"><td>Abrevia&ccedil;&atilde;o:</td><td align="center">'.stripslashes(entparse($trib['short'])).'</td></tr>';
				echo '<tr id="info_ally_members"><td>Membros:</td><td align="center">'.$trib['members'].'</td></tr>';
				echo '<tr id="info_ally_points"><td>Pontos:</td><td align="center">'.format_number($trib['points']).'&nbsp;|&nbsp;<b>'.$trib['rank'].'</b></td></tr>';
			}
		}
{/php}
				<tr><th colspan="2">Oponentes derrotados <span style="float:right;"><a id="hide_button_inamici_invinsi" href="javascript:hide_inamici_invinsi()">Esconder</a><a id="show_button_inamici_invisi" href="javascript:show_inamici_invinsi()" style="display:none;">Mostrar</a></span></th></tr>
				<tr id="agresor"><td>Atacante:</td><td align="center">{php} echo format_number($st['killed_units_att'])." |<b> ".$st['killed_units_att_rank']; {/php} </b></td></tr>
				<tr id="aparator"><td>Defensor:</td><td align="center">{php} echo format_number($st['killed_units_def'])." |<b> ".$st['killed_units_def_rank']; {/php} </b></td></tr>
				<tr id="total"><td>Total:</td><td align="center">{php} echo format_number($st['killed_units_altogether'])." |<b> ".$st['killed_units_altogether_rank']; {/php} </b></td></tr>

				<tr><th colspan="2">&Uacute;ltimos 5 acessos <span style="float:right;"><a id="hide_logs5_button" href="javascript:hide_logs5()">Esconder</a><a id="show_logs5_button" href="javascript:show_logs5()" style="display:none;">Mostrar</a></span></th></tr>
{php}
		$logari5 = mysql_query("SELECT * FROM `logins` WHERE `userid` = '".$userid."' ORDER BY `time` DESC LIMIT 5");
		$logari5_rows = mysql_num_rows($logari5);
		while($log5 = mysql_fetch_assoc($logari5)){
			$flalo = $i++ + 1;
			echo '<tr id="logs5_'.$flalo.'"><td>IP:&nbsp;'.$log5['ip'].'</td><td align="center">'.date("d.m.Y H:i:s", $log5['time']).'</td></tr>';
      }
      {/php}

				<tr><th colspan="2"><center><a href="game.php?village={$village.id}&screen=overview&info_acc=hide" onclick="return confirm('Est&aacute; op&ccedil;&atilde;o pode ser reativada em suas configura&ccedil;&otilde;es.');">Esconder / Hide</a></center></th></tr>
			</table>
		</td>
		<script type="text/javascript">
			function hide_info_acc() {ldelim}
				gid("hide_info_acc").style.display = 'none';
				gid("hide_cancel_info_acc").style.display = '';
				gid("info_acc_points").style.display='none';
				gid("info_acc_villages").style.display='none';
				gid("info_acc_hives").style.display='none';
				gid("info_acc_nr_reports").style.display='none';
				gid("info_acc_nr_reports_new").style.display='none';
				gid("info_acc_ip").style.display='none';
				createCookie('info_acc','1',365);
			{rdelim}
			function show_info_acc() {ldelim}
				gid("hide_info_acc").style.display = '';
				gid("hide_cancel_info_acc").style.display = 'none';
				gid("info_acc_points").style.display='';
				gid("info_acc_villages").style.display='';
				gid("info_acc_hives").style.display='';
				gid("info_acc_nr_reports").style.display='';
				gid("info_acc_nr_reports_new").style.display='';
				gid("info_acc_ip").style.display='';
				createCookie('info_acc','0',365);
			{rdelim}
			function hide_info_ally() {ldelim}
				gid("hide_info_ally").style.display = 'none';
				gid("hide_cancel_info_ally").style.display = '';
				gid("info_ally_name").style.display='none';
				gid("info_ally_short").style.display='none';
				gid("info_ally_members").style.display='none';
				gid("info_ally_points").style.display='none';
				createCookie('info_ally','1',365);
			{rdelim}
			function show_info_ally() {ldelim}
				gid("hide_info_ally").style.display = '';
				gid("hide_cancel_info_ally").style.display = 'none';
				gid("info_ally_name").style.display='';
				gid("info_ally_short").style.display='';
				gid("info_ally_members").style.display='';
				gid("info_ally_points").style.display='';
				createCookie('info_ally','0',365);
			{rdelim}
			function hide_inamici_invinsi() {ldelim}
				gid("hide_button_inamici_invinsi").style.display = 'none';
				gid("show_button_inamici_invisi").style.display = '';
				gid("agresor").style.display = 'none';
				gid("aparator").style.display = 'none';
				gid("total").style.display = 'none';
				createCookie('inamici_invinsi','1',365);
			{rdelim}
			function show_inamici_invinsi() {ldelim}
				gid("hide_button_inamici_invinsi").style.display = '';
				gid("show_button_inamici_invisi").style.display = 'none';
				gid("agresor").style.display = '';
				gid("aparator").style.display = '';
				gid("total").style.display = '';
				createCookie('inamici_invinsi','0',365);
			{rdelim}
			function hide_logs5() {ldelim}
				gid("hide_logs5_button").style.display = 'none';
				gid("show_logs5_button").style.display = '';
			{php}
				if($logari5_rows >= 1) { echo "gid(\"logs5_1\").style.display = 'none';\r\n"; }
				if($logari5_rows >= 2) { echo "gid(\"logs5_2\").style.display = 'none';\r\n"; }
				if($logari5_rows >= 3) { echo "gid(\"logs5_3\").style.display = 'none';\r\n"; }
				if($logari5_rows >= 4) { echo "gid(\"logs5_4\").style.display = 'none';\r\n"; }
				if($logari5_rows >= 5) { echo "gid(\"logs5_5\").style.display = 'none';\r\n"; }
			{/php}
				createCookie('logs5','1',365);
			{rdelim}
			function show_logs5() {ldelim}
				gid("hide_logs5_button").style.display = '';
				gid("show_logs5_button").style.display = 'none';
			{php}
				if($logari5_rows >= 1) { echo "gid(\"logs5_1\").style.display = '';\r\n"; }
				if($logari5_rows >= 2) { echo "gid(\"logs5_2\").style.display = '';\r\n"; }
				if($logari5_rows >= 3) { echo "gid(\"logs5_3\").style.display = '';\r\n"; }
				if($logari5_rows >= 4) { echo "gid(\"logs5_4\").style.display = '';\r\n"; }
				if($logari5_rows >= 5) { echo "gid(\"logs5_5\").style.display = '';\r\n"; }
			{/php}
				createCookie('logs5','0',365);
			{rdelim}
		</script>
{php} } {/php}
		<td valign="top">
			<table width="100%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr>
					<th><center>
{php}
	if($st['stufen'] == 'yes' || $_COOKIE['label'] == '1'){
		echo '<a href="game.php?village='.$vill.'&screen=overview&stufen=no">Esconder n&iacute;veis dos edif&iacute;cios</a>';
	}else{
		echo '<a href="game.php?village='.$vill.'&screen=overview&stufen=yes">Mostrar n&iacute;veis dos edif&iacute;cios</a>';
	}
{/php}
					</center></th>
					<th><center><a href="game.php?village={$village.id}&screen=overview&overview=old">Visualiza&ccedil;&atilde;o cl&aacute;ssica da aldeia</a></center></th>
				</tr>
			</table><br />
			<table cellspacing="0" cellpadding="0" align="center" style="border:2px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr>
					<td>
						<div style="position:relative">
{php}
	if($hora >= 20 || $hora < 8){
		$night = "visual_night";
	}else{
		$night = "visual";
	}
	echo "<img width=\"600\" height=\"418\" src=\"../$graphic/".$night."/back_none.jpg\" alt=\"\" />";
	while($row = mysql_fetch_array($sql3)){
	   	if($row['main'] < 5){
			echo"<img class=\"edf_main_flag\" src=\"../$graphic/".$night."/mainflag1.gif\"/>";
			if($main == ".png"){
				echo"<img class=\"edf_main\" src=\"../$graphic/".$night."/main1.png\" alt=\"Edif&iacute;cio Principal\"/>";
			}
			if($main == ".gif"){
				echo"<img class=\"edf_main\" src=\"../$graphic/".$night."/main1.gif\" alt=\"Edif&iacute;cio Principal\"/>";
			}
		}
		if($row['main'] >= 5 && $row['main'] < 15){
			echo"<img class=\"edf_main_flag\" src=\"../$graphic/".$night."/mainflag2.gif\"/>";
			if($main == ".png"){
				echo"<img class=\"edf_main\" src=\"../$graphic/".$night."/main2.png\" alt=\"Edif&iacute;cio Principal\"/>";
			}
			if($main == ".gif"){
				echo"<img class=\"edf_main\" src=\"../$graphic/".$night."/main2.gif\" alt=\"Edif&iacute;cio Principal\"/>";
			}	
		}
		if($row[main] >= 15){
			echo"<img class=\"edf_main_flag\" src=\"../$graphic/".$night."/mainflag3.gif\"/>";
			if($main == ".png"){
				echo"<img class=\"edf_main\" src=\"../$graphic/".$night."/main3.png\" alt=\"Edif&iacute;cio Principal\"/>";
			}
			if($main == ".gif"){
				echo"<img class=\"edf_main\" src=\"../$graphic/".$night."/main3.gif\" alt=\"Edif&iacute;cio Principal\"/>";
			}	
		}

		if($row[farm] < 10){
			/* NADA */
		}
		if($row[farm] >= 10 && $row[farm] < 20){
			echo "<img class=\"edf_farm\" src=\"../$graphic/".$night."/farm2".$ext4."\" alt=\"Fazenda\"/>";
		}
		if($row[farm] >= 20){
			echo "<img class=\"edf_farm\" src=\"../$graphic/".$night."/farm3".$ext4."\" alt=\"Fazenda\"/>";	
			echo "<img class=\"edf_farm_field\" src=\"../$graphic/".$night."/farm3_field.png\" alt=\"\" />";
		}

		if($row[wall] == 0){
			$aaa = mysql_query("SELECT * FROM build WHERE villageid ='".$vill."' AND building = 'wall'");
			$bbb = mysql_num_rows($aaa);
			if($bbb == 1){
				echo "<img class=\"edf_wall\" src=\"../$graphic/".$night."/wall0.gif\" alt=\"Muralha\"/>";
			}
		}
		if($row[wall] < 5 && $row[wall] != 0){
			echo "<img class=\"edf_wall\" src=\"../$graphic/".$night."/wall1.png\" alt=\"Muralha\"/>";
		}
		if($row[wall] >= 5 && $row[wall] < 15){
			echo "<img class=\"edf_wall\" src=\"../$graphic/".$night."/wall2.png\" alt=\"Muralha\"/>";
		}
		if($row[wall] >= 15){
			echo "<img class=\"edf_wall\" src=\"../$graphic/".$night."/wall3.png\" alt=\"Muralha\"/>";
		}

		if($row[place] == 0){
			$aaa = mysql_query("SELECT * FROM build WHERE villageid ='".$vill."' AND building = 'place'");
			$bbb = mysql_num_rows($aaa);
			if($bbb == 1){
				echo "<img class=\"edf_place\" src=\"../$graphic/".$night."/place0.gif\" alt=\"Praa de Reuni&atilde;o\"/>";
			}
		}
		if($row[place] == 1){
			echo "<img class=\"edf_place\" src=\"../$graphic/".$night."/place1".$barracks."\" alt=\"Praa de Reuni&atilde;o\"/>";
		}

		if($row[statue] == 0){
		$aaa = mysql_query("SELECT * FROM build WHERE villageid ='".$vill."' AND building = 'statue'");
		$bbb = mysql_num_rows($aaa);
		if($bbb == 1){
			echo "<img class=\"edf_statue\" src=\"../$graphic/".$night."/statue0.gif\" alt=\"Estatua\"/>";
			}
		}
		if($row[statue] == 1){
			echo "<img class=\"edf_statue\" src=\"../$graphic/".$night."/statue1.png\" alt=\"Estatua\"/>";
		}

		if($row[hide] == 0){
			$aaa = mysql_query("SELECT * FROM build WHERE villageid ='".$vill."' AND building = 'hide'");
			$bbb = mysql_num_rows($aaa);
			if($bbb == 1){
				echo "<img class=\"edf_hide\" src=\"../$graphic/".$night."/hide0.png\" alt=\"Esconderijo\"/>";
			}
		}
		if($row[hide] >=1 && $row[hide] != 0){
			echo "<img class=\"edf_hide\" src=\"../$graphic/".$night."/hide1.png\" alt=\"Esconderijo\"/>";
		}

		if($row[market] == 0){
			$aaa = mysql_query("SELECT * FROM build WHERE villageid ='".$vill."' AND building = 'market'");
			$bbb = mysql_num_rows($aaa);
			if($bbb == 1){
				echo "<img class=\"edf_market\" src=\"../$graphic/".$night."/market0.gif\" alt=\"Mercado\"/>";
			}
		}
		if($row[market] < 5 && $row[market] != 0){
			echo "<img class=\"edf_market\" src=\"../$graphic/".$night."/market1.png\" alt=\"Mercado\"/>";
		}
		if($row[market] >= 5 && $row[market] < 20){
			echo "<img class=\"edf_market\" src=\"../$graphic/".$night."/market2.png\" alt=\"Mercado\"/>"; 	
		}
		if($row[market] >= 20){
			echo "<img class=\"edf_market\" src=\"../$graphic/".$night."/market3.png\" alt=\"Mercado\"/>";
		}

		if($row[wood] == 0){
			$aaa = mysql_query("SELECT * FROM build WHERE villageid ='".$vill."' AND building = 'wood'");
			$bbb = mysql_num_rows($aaa);
			if($bbb == 1){
				echo "<img class=\"edf_wood\" src=\"../$graphic/".$night."/wood0.gif\" alt=\"Bosque\"/>";
			}
		}
		if($row[wood] < 10 && $row[wood] != 0){
			echo "<img class=\"edf_wood\" src=\"../$graphic/".$night."/wood1".$ext."\" alt=\"Bosque\"/>";
		}
		if($row[wood] >=10 && $row[wood] < 20){
			echo "<img class=\"edf_wood\" src=\"../$graphic/".$night."/wood2".$ext."\" alt=\"Bosque\"/>";	
		}
		if($row[wood] >= 20){
			echo "<img class=\"edf_wood\" src=\"../$graphic/".$night."/wood3".$ext."\" alt=\"Bosque\"/>";
		}

		if($row[iron] == 0){
			$aaa = mysql_query("SELECT * FROM build WHERE villageid ='".$vill."' AND building = 'iron'");
			$bbb = mysql_num_rows($aaa);
			if($bbb == 1){
				echo "<img class=\"edf_iron\" src=\"../$graphic/".$night."/iron0.gif\" alt=\"Mina de Ferro\"/>";
			}
		}
		if($row[iron] < 10 && $row[iron] != 0){
			echo "<img class=\"edf_iron\" src=\"../$graphic/".$night."/iron1".$ext3."\" alt=\"Mina de Ferro\"/>";
		}
		if($row[iron] >=10 && $row[iron] < 20){
			echo "<img class=\"edf_iron\" src=\"../$graphic/".$night."/iron2".$ext3."\" alt=\"Mina de Ferro\"/>";
		}
		if($row[iron] >= 20){
			echo "<img class=\"edf_iron\" src=\"../$graphic/".$night."/iron3".$ext3."\" alt=\"Mina de Ferro\"/>";
		}

		if($row[stone] == 0){
			$aaa = mysql_query("SELECT * FROM build WHERE villageid ='".$vill."' AND building = 'stone'");
			$bbb = mysql_num_rows($aaa);
			if($bbb == 1){
				echo "<img class=\"edf_stone\" src=\"../$graphic/".$night."/stone0.gif\" alt=\"Po&ccedil;o de argila\"/>";
			}
		}
		if($row[stone] < 10 && $row[stone] != 0){
			echo "<img class=\"edf_stone\" src=\"../$graphic/".$night."/stone1".$ext2."\" alt=\"Po&ccedil;o de argila\"/>";
		}
		if($row[stone] >= 10 && $row[stone] < 20){
			echo "<img class=\"edf_stone\" src=\"../$graphic/".$night."/stone2".$ext2."\" alt=\"Po&ccedil;o de argila\"/>";
		}
		if($row[stone] >= 20){
			echo "<img class=\"edf_stone\" src=\"../$graphic/".$night."/stone3".$ext2."\" alt=\"Po&ccedil;o de argila\"/>";	
		}

		if($row[storage] < 10){
			echo "<img class=\"edf_storage\" src=\"../$graphic/".$night."/storage1.png\" alt=\"Armaz&eacute;m\"/>";
		}
		if($row[storage] >=10 && $row[storage] < 20){
			echo "<img class=\"edf_storage\" src=\"../$graphic/".$night."/storage2.png\" alt=\"Armaz&eacute;m\"/>";
		}
		if($row[storage] >= 20){
			echo "<img class=\"edf_storage\" src=\"../$graphic/".$night."/storage3.png\" alt=\"Armaz&eacute;m\"/>";
		}

		if($row[smith] == 0){
			$aaa = mysql_query("SELECT * FROM build WHERE villageid ='".$vill."' AND building = 'smith'");
			$bbb = mysql_num_rows($aaa);
			if($bbb == 1){
				echo "<img class=\"edf_smith\" src=\"../$graphic/".$night."/smith0.gif\" alt=\"Ferreiro\"/>";
			}
		}
		if($row[smith] < 5 && $row[smith] != 0){
			echo "<img class=\"edf_smith\" src=\"../$graphic/".$night."/smith1.png\" alt=\"Ferreiro\"/>";
		}
		if($row[smith] >=5 && $row[smith] < 15){
			echo "<img class=\"edf_smith\" src=\"../$graphic/".$night."/smith2.png\" alt=\"Ferreiro\"/>";
		}
		if($row[smith] >= 15){
			echo "<img class=\"edf_smith\" src=\"../$graphic/".$night."/smith3.png\" alt=\"Ferreiro\"/>";
		}
		if($n_smith > 0){
			echo "<img class=\"pic_smith_anim\" src=\"../graphic/".$night."/smith_anim.gif\" alt=\"Ferreiro\" />";
		}

		if($row[barracks] == 0){
			$aaa = mysql_query("SELECT * FROM build WHERE villageid ='".$vill."' AND building = 'barracks'");
			$bbb = mysql_num_rows($aaa);
			if($bbb == 1){
				echo "<img class=\"edf_barracks\" src=\"../$graphic/".$night."/barracks0.gif\" alt=\"Quartel\"/>";
			}
		}
		if($row[barracks] < 5 && $row[barracks] != 0){
			echo "<img class=\"edf_barracks\" src=\"../$graphic/".$night."/barracks1.png\" alt=\"Quartel\"/>";
		}
		if($row[barracks] >= 5 && $row[barracks] < 20){
			echo "<img class=\"edf_barracks\" src=\"../$graphic/".$night."/barracks2.png\" alt=\"Quartel\"/>";
		}
		if($row[barracks] >= 20){
			echo "<img class=\"edf_barracks\" src=\"../$graphic/".$night."/barracks3.png\" alt=\"Quartel\"/>";	
		}

		if($row[snob] == 0){
			$aaa = mysql_query("SELECT * FROM build WHERE villageid ='".$vill."' AND building = 'snob'");
			$bbb = mysql_num_rows($aaa);
			if($bbb == 1){
				echo "<img class=\"edf_snob\" src=\"../$graphic/".$night."/snob0.gif\" alt=\"Academia\"/>";
			}
		}
		if($row[snob] >= 1){
			echo "<img class=\"edf_snob\" src=\"../$graphic/".$night."/snob1".$snob."\" alt=\"Academia\"/>";
		}

		if($row[garage] == 0){
			$aaa = mysql_query("SELECT * FROM build WHERE villageid ='".$vill."' AND building = 'garage'");
			$bbb = mysql_num_rows($aaa);
			if($bbb == 1){
				echo "<img class=\"edf_garage\" src=\"../$graphic/".$night."/garage0.gif\" alt=\"Oficina\"/>";
			}
		}
		if($row[garage] < 5 && $row[garage] != 0){
			echo "<img class=\"edf_garage\" src=\"../$graphic/".$night."/garage1".$garage."\" alt=\"Oficina\"/>";
		}
		if($row[garage] >= 5 && $row[garage] < 10){
			echo "<img class=\"edf_garage\" src=\"../$graphic/".$night."/garage2".$garage."\" alt=\"Oficina\"/>";
		}
		if($row[garage] >= 10){
			echo "<img class=\"edf_garage\" src=\"../$graphic/".$night."/garage3".$garage."\" alt=\"Oficina\"/>";
		}

		if($row[stable] == 0){
			$aaa = mysql_query("SELECT * FROM build WHERE villageid ='".$vill."' AND building = 'stable'");
			$bbb = mysql_num_rows($aaa);
			if($bbb == 1){
				echo "<img class=\"edf_stable\" src=\"../$graphic/".$night."/stable0.gif\" alt=\"Est&aacute;bulo\"/>";
			}
		}
		if($row[stable] < 5 && $row[stable] != 0){
			echo "<img class=\"edf_stable\" src=\"../$graphic/".$night."/stable1".$stable."\" alt=\"Est&aacute;bulo\"/>";
		}
		if($row[stable] >= 5 && $row[stable] < 10){
			echo "<img class=\"edf_stable\" src=\"../$graphic/".$night."/stable2".$stable."\" alt=\"Est&aacute;bulo\"/>";
		}
		if($row[stable] >= 10){
			echo "<img class=\"edf_stable\" src=\"../$graphic/".$night."/stable3".$stable."\" alt=\"Est&aacute;bulo\"/>";
		}
		
		$rand = rand(0, 5);
		if($rand == 4){
			echo "<img class=\"pic_npc_juggler\" src=\"../$graphic/".$night."/juggler.gif".$juggler."\" alt=\"\"/>";
		}
		$rand = rand(0, 5);
		if($rand == 1){
			echo "<img class=\"pic_npc_guard\" src=\"../$graphic/".$night."/guard.gif".$guard."\" alt=\"\"/>";
		}
		$rand = rand(0, 5);
		if($rand == 2){
			echo "<img class=\"pic_npc_conversation\" src=\"../$graphic/".$night."/conversation.gif".$conversation."\" alt=\"\"/>";
		}
		$rand = rand(0, 0);
		if($rand == 0 && $aa1){
			echo "<img class=\"pic_npc_farmer\" src=\"../$graphic/".$night."/farmer.gif".$conversation."\" alt=\"\"/>";
	    }
	}
	echo "<img class=\"edf_church\" src=\"../$graphic/".$night."/church_disabled.png\" alt=\"\" />";
	if($dia >= '1' && $mes == '12' || $dia <= '10' && $mes == '1'){
		echo "<img class=\"pic_christmas_tree\" src=\"../$graphic/".$night."/christmas_tree.png\" alt=\"\" />";
	}
{/php}
							<img class="empty" src="../graphic/map/empty.png" alt="" usemap="#map" />
							<map name="map" id="map">
{php}
	$_from = $this->_tpl_vars['built_builds'];
	if(!is_array($_from) && !is_object($_from)){
		settype($_from, 'array');
	}
	if(count($_from)):
		foreach($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dbname']):
			if($this->_tpl_vars['dbname'] == 'main'):
{/php}
								<area shape="poly" coords="373,187,417,129,407,72,329,65,306,99,311,150" href="game.php?village={$village.id}&screen={$dbname}" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}"/>
{php}
			endif;
			if($this->_tpl_vars['dbname'] == 'barracks'):
{/php}
								<area shape="poly" coords="392,289,444,313,506,283,481,235,442,216,392,252" href="game.php?village={$village.id}&screen={$dbname}" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}"/>
{php}
			endif;
			if($this->_tpl_vars['dbname'] == 'stable'):
{/php}
								<area shape="poly" coords="64,241,70,265,150,307,189,289,184,232,99,202" href="game.php?village={$village.id}&screen={$dbname}" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}"/>
{php}
			endif;
			if($this->_tpl_vars['dbname'] == 'garage'):
{/php}
								<area shape="poly" coords="284,358,362,361,402,321,369,283,346,278,291,320" href="game.php?village={$village.id}&screen={$dbname}" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}"/>
{php}
			endif;
			if($this->_tpl_vars['dbname'] == 'snob'):
{/php}
								<area shape="poly" coords="206,149,257,125,229,60,185,80,156,111" href="game.php?village={$village.id}&screen={$dbname}" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}"/>
{php}
			endif;
			if($this->_tpl_vars['dbname'] == 'smith'):
{/php}
								<area shape="poly" coords="174,335,222,361,271,342,283,301,216,262" href="game.php?village={$village.id}&screen={$dbname}" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}"/>
{php}
			endif;
			if($this->_tpl_vars['dbname'] == 'place'):
{/php}
								<area shape="poly" coords="315,271,379,275,401,229,375,206,343,207" href="game.php?village={$village.id}&screen={$dbname}" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}"/>
{php}
			endif;
			if($this->_tpl_vars['dbname'] == 'statue'):
{/php}
								<area shape="poly" coords="277,231,256,265,266,285,292,287,306,266" href="game.php?village={$village.id}&screen={$dbname}" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}"/>
{php}
			endif;
			if($this->_tpl_vars['dbname'] == 'market'):
{/php}
								<area shape="poly" coords="214,149,234,228,313,230,330,169,273,122" href="game.php?village={$village.id}&screen={$dbname}" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}"/>
{php}
			endif;
			if($this->_tpl_vars['dbname'] == 'wood'):
{/php}
								<area shape="poly" coords="472,379,523,417,583,373,528,330" href="game.php?village={$village.id}&screen={$dbname}" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}"/>
{php}
			endif;
			if($this->_tpl_vars['dbname'] == 'stone'):
{/php}
								<area shape="poly" coords="34,300,0,349,15,399,67,417,91,402,92,341" href="game.php?village={$village.id}&screen={$dbname}" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}"/>
{php}
			endif;
			if($this->_tpl_vars['dbname'] == 'iron'):
{/php}
								<area shape="poly" coords="0,55,45,90,93,58,89,6,39,9" href="game.php?village={$village.id}&screen={$dbname}" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}"/>
{php}
			endif;
			if ($this->_tpl_vars['dbname'] == 'farm'):
{/php}
								<area shape="poly" coords="456,0,477,41,526,75,583,88,597,18,597,0" href="game.php?village={$village.id}&screen={$dbname}" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}"/>
{php}
			endif;
			if ($this->_tpl_vars['dbname'] == 'storage'):
{/php}
								<area shape="poly" coords="96,192,153,218,195,215,193,148,133,121" href="game.php?village={$village.id}&screen={$dbname}" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}"/>
{php}
			endif;
			if ($this->_tpl_vars['dbname'] == 'hide'):
{/php}
								<area shape="poly" coords="241,80,261,113,294,93,268,63" href="game.php?village={$village.id}&screen={$dbname}" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}"/>
{php}
			endif;
			if ($this->_tpl_vars['dbname'] == 'wall'):
{/php}
								<area shape="poly" coords="428,333,430,382,472,363,470,318" href="game.php?village={$village.id}&screen={$dbname}" title="{php} echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); {/php}"/>
{php}
			endif;
		endforeach;
	endif;
	unset($_from);
{/php}
							</map>

{php}
	if($st['stufen'] == 'yes'){
		if($hora >= 20 || $hora < 8){
			$this->_tpl_vars['label'] = "label_night";
		}else{
			$this->_tpl_vars['label'] = "label";
		}

		$_from = $this->_tpl_vars['built_builds'];
		if(!is_array($_from) && !is_object($_from)){
			settype($_from, 'array');
		}
		if(count($_from)):
			foreach($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dbname']):
				if($this->_tpl_vars['dbname'] == 'main'):
{/php}
							<div id="label_{$dbname}" class="label_{$dbname}">
								<div class="{$label}">
									<a href="game.php?village={$village.id}&screen={$dbname}">
										<img src="../graphic/buildings/{$dbname}.png" class="middle" alt="{$cl_builds->get_name($dbname)}" /> {$village.$dbname}
									</a><br />
{php}
					if($n_main > 0){
{/php}
									<span style="font-size:7px;font-weight:bold;color:#FFFFFF;"><span class="timer">{php}echo $aus_main;{/php}</span></span>
{php}
					}
{/php}
								</div>
							</div>
{php}
					endif;
					if ($this->_tpl_vars['dbname'] == 'barracks'):
{/php}
							<div id="label_{$dbname}" class="label_{$dbname}">
								<div class="{$label}">
									<a href="game.php?village={$village.id}&screen={$dbname}">
										<img src="../graphic/buildings/{$dbname}.png" class="middle" alt="{$cl_builds->get_name($dbname)}" /> {$village.$dbname}
									</a><br />
{php}
						if($n_barracks > 0){
{/php}
									<span style="font-size:7px;font-weight:bold;color:#FFFFFF;"><span class="timer">{php}echo $aus_barracks;{/php}</span></span>
{php}
						}
{/php}
								</div>
							</div>
{php}
					endif;
					if($this->_tpl_vars['village']['barracks'] == 0):
						if($row[barracks] == 0):
							$aaa = mysql_query("SELECT * FROM build WHERE villageid ='".$vill."' AND building = 'barracks'");
							$bbb = mysql_num_rows($aaa);
							if($bbb == 1):
{/php}
							<div id="label_barracks" class="label_barracks">
								<div class="{$label}">
									<span style="font-size:7px;font-weight:bold;color:#FFFFFF;"><span class="timer">{php}echo $barracks_end;{/php}</span></span>
								</div>
							</div>
{php}
							endif;
						endif;
					endif;
					if($this->_tpl_vars['dbname'] == 'stable'):
{/php}
							<div id="label_{$dbname}" class="label_{$dbname}">
								<div class="{$label}">
									<a href="game.php?village={$village.id}&screen={$dbname}">
										<img src="../graphic/buildings/{$dbname}.png" class="middle" alt="{$cl_builds->get_name($dbname)}" /> {$village.$dbname}
									</a><br />
{php}
						if($n_stable > 0){
{/php}
									<span style="font-size:7px;font-weight:bold;color:#FFFFFF;"><span class="timer">{php}echo $aus_stable;{/php}</span></span>
{php}
						}
{/php}
								</div>
							</div>
{php}
					endif;
					if($this->_tpl_vars['village']['stable'] == 0):
						if($row[stable] == 0):
							$aaa = mysql_query("SELECT * FROM build WHERE villageid ='".$vill."' AND building = 'stable'");
							$bbb = mysql_num_rows($aaa);
							if($bbb == 1):
{/php}
							<div id="label_stable" class="label_stable">
								<div class="{$label}">
									<span style="font-size:7px;font-weight:bold;color:#FFFFFF;"><span class="timer">{php}echo $stable_end;{/php}</span></span>
								</div>
							</div>
{php}
							endif;
						endif;
					endif;
					if($this->_tpl_vars['dbname'] == 'garage'):
{/php}
							<div id="label_{$dbname}" class="label_{$dbname}">
								<div class="{$label}">
									<a href="game.php?village={$village.id}&screen={$dbname}">
										<img src="../graphic/buildings/{$dbname}.png" class="middle" alt="{$cl_builds->get_name($dbname)}" /> {$village.$dbname}
									</a><br />
{php}
						if($n_garage > 0){
{/php}
									<span style="font-size:7px;font-weight:bold;color:#FFFFFF;"><span class="timer">{php}echo $aus_garage;{/php}</span></span>
{php}
						}
{/php}
								</div>
							</div>
{php}
					endif;
					if($this->_tpl_vars['village']['garage'] == 0):
						if($row[garage] == 0):
							$aaa = mysql_query("SELECT * FROM build WHERE villageid ='".$vill."' AND building = 'garage'");
							$bbb = mysql_num_rows($aaa);
							if($bbb == 1):
{/php}
							<div id="label_garage" class="label_garage">
								<div class="{$label}">
									<span style="font-size:7px;font-weight:bold;color:#FFFFFF;"><span class="timer">{php}echo $garage_end;{/php}</span></span>
								</div>
							</div>
{php}
							endif;
						endif;
					endif;
					if($this->_tpl_vars['dbname'] == 'snob'):
{/php}
							<div id="label_{$dbname}" class="label_{$dbname}">
								<div class="{$label}">
									<a href="game.php?village={$village.id}&screen={$dbname}">
										<img src="../graphic/buildings/{$dbname}.png" class="middle" alt="{$cl_builds->get_name($dbname)}" /> {$village.$dbname}
									</a><br />
{php}
						if($n_snob > 0){
{/php}
									<span style="font-size:7px;font-weight:bold;color:#FFFFFF;"><span class="timer">{php}echo $aus_snob;{/php}</span></span>
{php}
						}
{/php}
								</div>
							</div>
{php}
					endif;
					if($this->_tpl_vars['village']['snob'] == 0):
						if($row[snob] == 0):
							$aaa = mysql_query("SELECT * FROM build WHERE villageid ='".$vill."' AND building = 'snob'");
							$bbb = mysql_num_rows($aaa);
							if($bbb == 1):
{/php}
							<div id="label_snob" class="label_snob">
								<div class="{$label}">
									<span style="font-size:7px;font-weight:bold;color:#FFFFFF;"><span class="timer">{php}echo $snob_end;{/php}</span></span>
								</div>
							</div>
{php}
							endif;
						endif;
					endif;
					if($this->_tpl_vars['dbname'] == 'smith'):
{/php}
							<div id="label_{$dbname}" class="label_{$dbname}">
								<div class="{$label}">
									<a href="game.php?village={$village.id}&screen={$dbname}">
										<img src="../graphic/buildings/{$dbname}.png" class="middle" alt="{$cl_builds->get_name($dbname)}" /> {$village.$dbname}
									</a><br />
{php}
						if($n_smith > 0){
{/php}
									<span style="font-size:7px;font-weight:bold;color:#FFFFFF;"><span class="timer">{php}echo $aus_smith;{/php}</span></span>
{php}
						}
{/php}
								</div>
							</div>
{php}
					endif;
					if($this->_tpl_vars['village']['smith'] == 0):
						if($row[smith] == 0):
							$aaa = mysql_query("SELECT * FROM build WHERE villageid ='".$vill."' AND building = 'smith'");
							$bbb = mysql_num_rows($aaa);
							if($bbb == 1):
{/php}
							<div id="label_smith" class="label_smith">
								<div class="{$label}">
									<span style="font-size:7px;font-weight:bold;color:#FFFFFF;"><span class="timer">{php}echo $smith_end;{/php}</span></span>
								</div>
							</div>
{php}
							endif;
						endif;
					endif;
					if($this->_tpl_vars['dbname'] == 'place'):
{/php}
							<div id="label_{$dbname}" class="label_{$dbname}">
								<div class="{$label}">
									<a href="game.php?village={$village.id}&screen={$dbname}">
										<img src="../graphic/buildings/{$dbname}.png" class="middle" alt="{$cl_builds->get_name($dbname)}" /> {$village.$dbname}
									</a>
								</div>
							</div>
{php}
					endif;
					if($this->_tpl_vars['village']['place'] == 0):
						if($row[place] == 0):
							$aaa = mysql_query("SELECT * FROM build WHERE villageid ='".$vill."' AND building = 'place'");
							$bbb = mysql_num_rows($aaa);
							if($bbb == 1):
{/php}
							<div id="label_place" class="label_place">
								<div class="{$label}">
									<span style="font-size:7px;font-weight:bold;color:#FFFFFF;"><span class="timer">{php}echo $place_end;{/php}</span></span>
								</div>
							</div>
{php}
							endif;
						endif;
					endif;
					if($this->_tpl_vars['dbname'] == 'statue'):
{/php}
							<div id="label_{$dbname}" class="label_{$dbname}">
								<div class="{$label}">
									<a href="game.php?village={$village.id}&screen={$dbname}">
										<img src="../graphic/buildings/{$dbname}.png" class="middle" alt="{$cl_builds->get_name($dbname)}" /> {$village.$dbname}
									</a><br />
{php}
						if($n_statue > 0){
{/php}
									<span style="font-size:7px;font-weight:bold;color:#FFFFFF;"><span class="timer">{php}echo $aus_statue;{/php}</span></span>
{php}
						}
{/php}
								</div>
							</div>
{php}
					endif;
					if($this->_tpl_vars['village']['statue'] == 0):
						if($row[statue] == 0):
							$aaa = mysql_query("SELECT * FROM build WHERE villageid ='".$vill."' AND building = 'statue'");
							$bbb = mysql_num_rows($aaa);
							if($bbb == 1):
{/php}
							<div id="label_statue" class="label_statue">
								<div class="{$label}">
									<span style="font-size:7px;font-weight:bold;color:#FFFFFF;"><span class="timer">{php}echo $statue_end;{/php}</span></span>
								</div>
							</div>
{php}
							endif;
						endif;
					endif;
					if($this->_tpl_vars['dbname'] == 'market'):
{/php}
							<div id="label_{$dbname}" class="label_{$dbname}">
								<div class="{$label}">
									<a href="game.php?village={$village.id}&screen={$dbname}">
										<img src="../graphic/buildings/{$dbname}.png" class="middle" alt="{$cl_builds->get_name($dbname)}" /> {$village.$dbname}
									</a><br />
{php}
						$sql = "SELECT * FROM villages WHERE id =".$_GET[village];
						$res = mysql_query($sql);
						while($row = mysql_fetch_assoc($res)){
							$dealers = $row[dealers_outside];
							$market = $row[market];
							$bonus = $row[bonus];
						}
						if($bonus == '1'){
							include("include/bonus/dealers_bonus.php");
						}else{
							include("include/configs/dealers.php");
						}
						$dealers_in = $arr_dealers[$market] - $dealers;
{/php}
									<span style="font-size:7px;font-weight:bold;color:#FFFFFF;">{php}echo $dealers_in; {/php}/{php}echo $arr_dealers[$market];{/php}</span>
								</div>
							</div>
{php}
					endif;
					if($this->_tpl_vars['village']['market'] == 0):
						if($row[market] == 0):
							$aaa = mysql_query("SELECT * FROM build WHERE villageid ='".$vill."' AND building = 'market'");
							$bbb = mysql_num_rows($aaa);
							if($bbb == 1):
{/php}
							<div id="label_market" class="label_market">
								<div class="{$label}">
									<span style="font-size:7px;font-weight:bold;color:#FFFFFF;"><span class="timer">{php}echo $market_end;{/php}</span></span>
								</div>
							</div>
{php}
							endif;
						endif;
					endif;
					if($this->_tpl_vars['dbname'] == 'wood'):
{/php}
							<div id="label_{$dbname}" class="label_{$dbname}">
								<div class="{$label}">
									<a href="game.php?village={$village.id}&screen={$dbname}">
										<img src="../graphic/buildings/{$dbname}.png" class="middle" alt="{$cl_builds->get_name($dbname)}" /> {$village.$dbname}
									</a>
								</div>
							</div>
{php}
					endif;
					if($this->_tpl_vars['village']['wood'] == 0):
						if($row[wood] == 0):
							$aaa = mysql_query("SELECT * FROM build WHERE villageid ='".$vill."' AND building = 'wood'");
							$bbb = mysql_num_rows($aaa);
							if($bbb == 1):
{/php}
							<div id="label_wood" class="label_wood">
								<div class="{$label}">
									<span style="font-size:7px;font-weight:bold;color:#FFFFFF;"><span class="timer">{php}echo $wood_end;{/php}</span></span>
								</div>
							</div>
{php}
							endif;
						endif;
					endif;
					if($this->_tpl_vars['dbname'] == 'stone'):
{/php}
							<div id="label_{$dbname}" class="label_{$dbname}">
								<div class="{$label}">
									<a href="game.php?village={$village.id}&screen={$dbname}">
										<img src="../graphic/buildings/{$dbname}.png" class="middle" alt="{$cl_builds->get_name($dbname)}" /> {$village.$dbname}
									</a>
								</div>
							</div>
{php}
					endif;
					if($this->_tpl_vars['village']['stone'] == 0):
						if($row[stone] == 0):
							$aaa = mysql_query("SELECT * FROM build WHERE villageid ='".$vill."' AND building = 'stone'");
							$bbb = mysql_num_rows($aaa);
							if($bbb == 1):
{/php}
							<div id="label_stone" class="label_stone">
								<div class="{$label}">
									<span style="font-size:7px;font-weight:bold;color:#FFFFFF;"><span class="timer">{php}echo $stone_end;{/php}</span></span>
								</div>
							</div>
{php}
							endif;
						endif;
					endif;
					if($this->_tpl_vars['dbname'] == 'iron'):
{/php}
							<div id="label_{$dbname}" class="label_{$dbname}">
								<div class="{$label}">
									<a href="game.php?village={$village.id}&screen={$dbname}">
										<img src="../graphic/buildings/{$dbname}.png" class="middle" alt="{$cl_builds->get_name($dbname)}" /> {$village.$dbname}
									</a>
								</div>
							</div>
{php}
					endif;
					if($this->_tpl_vars['village']['iron'] == 0):
						if($row[iron] == 0):
							$aaa = mysql_query("SELECT * FROM build WHERE villageid ='".$vill."' AND building = 'iron'");
							$bbb = mysql_num_rows($aaa);
							if($bbb == 1):
{/php}
							<div id="label_iron" class="label_iron">
								<div class="{$label}">
									<span style="font-size:7px;font-weight:bold;color:#FFFFFF;"><span class="timer">{php}echo $iron_end;{/php}</span></span>
								</div>
							</div>
{php}
							endif;
						endif;
					endif;
					if($this->_tpl_vars['dbname'] == 'farm'):
{/php}
							<div id="label_{$dbname}" class="label_{$dbname}">
								<div class="{$label}">
									<a href="game.php?village={$village.id}&screen={$dbname}">
										<img src="../graphic/buildings/{$dbname}.png" class="middle" alt="{$cl_builds->get_name($dbname)}" /> {$village.$dbname}
									</a>
								</div>
							</div>
{php}
					endif;
					if($this->_tpl_vars['dbname'] == 'storage'):
					/*$this->_tpl_vars['wood_sec'] = $this->_tpl_vars['wood_prod_overview'] / 60;
					$this->_tpl_vars['stone_sec'] = $this->_tpl_vars['wood_prod_overview'] / 60;
					$this->_tpl_vars['iron_sec'] = $this->_tpl_vars['wood_prod_overview'] / 60;*/
{/php}
							<div id="label_{$dbname}" class="label_{$dbname}">
								<div class="{$label}">
									<a href="game.php?village={$village.id}&screen={$dbname}">
										<img src="../graphic/buildings/{$dbname}.png" class="middle" alt="{$cl_builds->get_name($dbname)}" /> {$village.$dbname}<br />
										<span style="font-size:7px;font-weight:bold;color:#FFFFFF;">
										{if $wood_sec == '0' && $stone_sec == '0' && $iron_sec == '0'}
											<!--span style="font-size:7px;font-weight:bold;color:#E41B17;"> CHEIO </span-->
										{elseif $wood_sec > $stone_sec}
											<span class="timer">{$wood_sec|format_time}</span> 
										{elseif $stone_sec > $iron_sec}
											<span class="timer">{$stone_sec|format_time}</span> 
										{elseif $iron_sec > $wood_sec}
											<span class="timer">{$iron_sec|format_time}</span> 
										{elseif $wood_sec > $iron_sec}
											<span class="timer">{$wood_sec|format_time}</span> 
										{elseif $iron_sec > $stone_sec}
											<span class="timer">{$iron_sec|format_time}</span> 
										{elseif $stone_sec > $wood_sec}
											<span class="timer">{$stone_sec|format_time}</span> 
										{elseif $stone_sec == $wood_sec}
											<span class="timer">{$stone_sec|format_time}</span> 
										{/if}
										</span>
									</a>
								</div>
							</div>
{php}
					endif;
					if($this->_tpl_vars['dbname'] == 'hide'):
{/php}
							<div id="label_{$dbname}" class="label_{$dbname}">
								<div class="{$label}">
									<a href="game.php?village={$village.id}&screen={$dbname}">
										<img src="../graphic/buildings/{$dbname}.png" class="middle" alt="{$cl_builds->get_name($dbname)}" /> {$village.$dbname}
									</a>
								</div>
							</div>
{php}
					endif;
					if($this->_tpl_vars['village']['hide'] == 0):
						if($row[hide] == 0):
							$aaa = mysql_query("SELECT * FROM build WHERE villageid ='".$vill."' AND building = 'hide'");
							$bbb = mysql_num_rows($aaa);
							if($bbb == 1):
{/php}
							<div id="label_hide" class="label_hide">
								<div class="{$label}">
									<span style="font-size:7px;font-weight:bold;color:#FFFFFF;"><span class="timer">{php}echo $hide_end;{/php}</span></span>
								</div>
							</div>
{php}
					endif;
					if($this->_tpl_vars['dbname'] == 'statue'):
{/php}
							<div id="label_{$dbname}" class="label_{$dbname}">
								<div class="{$label}">
									<a href="game.php?village={$village.id}&screen={$dbname}">
										<img src="../graphic/buildings/{$dbname}.png" class="middle" alt="{$cl_builds->get_name($dbname)}" /> {$village.$dbname}
									</a>
								</div>
							</div>
{php}
							endif;
						endif;
					endif;
					if($this->_tpl_vars['village']['statue'] == 0):
						if($row[statue] == 0):
							$aaa = mysql_query("SELECT * FROM build WHERE villageid ='".$vill."' AND building = 'statue'");
							$bbb = mysql_num_rows($aaa);
							if($bbb == 1):
{/php}
							<div id="label_statue" class="label_statue">
								<div class="{$label}">
									<span style="font-size:7px;font-weight:bold;color:#FFFFFF;"><span class="timer">{php}echo $statue_end;{/php}</span></span>
								</div>
							</div>
{php}
							endif;
						endif;
					endif;
					if($this->_tpl_vars['dbname'] == 'wall'):
{/php}
							<div id="label_{$dbname}" class="label_{$dbname}">
								<div class="{$label}">
									<a href="game.php?village={$village.id}&screen={$dbname}">
										<img src="../graphic/buildings/{$dbname}.png" class="middle" alt="{$cl_builds->get_name($dbname)}" /> {$village.$dbname}
									</a>
								</div>
							</div>
{php}
					endif;
					if($this->_tpl_vars['village']['wall'] == 0):
						if($row[wall] == 0):
							$aaa = mysql_query("SELECT * FROM build WHERE villageid ='".$vill."' AND building = 'wall'");
							$bbb = mysql_num_rows($aaa);
							if($bbb == 1):
{/php}
							<div id="label_wall" class="label_wall">
								<div class="{$label}">
									<span style="font-size:7px;font-weight:bold;color:#FFFFFF;"><span class="timer">{php}echo $wall_end;{/php}</span></span>
								</div>
							</div>
{php}
							endif;
						endif;
					endif;
				endforeach;
			endif;
			unset($_from);
		}
{/php}
					  </div>
						<script type="text/javascript">overviewShowLevel();</script>
					</td>
				</tr>
			</table>
		{if count($my_movements) > 0}<br />
{php}
		$num_my_movements = mysql_num_rows(mysql_query("SELECT * FROM `movements` WHERE `send_from_village` = '".$_GET['village']."'"));
{/php}
			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr>
					<th width="52%">Próprios comandos ({php}echo $num_my_movements;{/php})</th>
					<th width="33%">Chegada</th>
					<th width="15%">Chegada em</th>
				</tr>
			{foreach from=$my_movements item=array}
				<tr>
					<td><img src="../graphic/command/{$array.type}.png" alt="" /> <a href="game.php?village={$village.id}&amp;screen=info_command&amp;id={$array.id}&amp;type=own">{$array.message|replace:"Angriff auf":"Ataque &agrave;"|replace:"Rückkehr von":"Retorno de"|replace:"Rückzug von":"Retirada de"|replace:"Unterstützung für":"Apoio &agrave;"}</a></td>
					<td>{$array.end_time|format_date|replace:"heute um":"hoje &agrave;s"|replace:"Uhr":""|replace:"am":"em"|replace:"um":"&agrave;s"|replace:"morgen":"amanh&atilde;"}</td>
					<td><span class="timer">{$array.arrival_in+1|format_time}</span></td>
					{if $array.can_cancel}
					<td><a href="game.php?village={$village.id}&amp;screen=place&amp;action=cancel&amp;id={$array.id}&amp;h={$hkey}">cancelar</a></td>
					{/if}
				</tr>
			{/foreach}
			</table>
		{/if}
		{if count($other_movements) > 0}<br />
{php}
		$num_other_movements = mysql_num_rows(mysql_query("SELECT * FROM `movements` WHERE `to_village` = '".$this->_tpl_vars['village']['id']."' AND `type` != 'cancel'"));
{/php}
			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr>
					<th width="52%">Origem ({php}echo $num_other_movements;{/php})</th>
					<th width="33%">Chegada</th>
					<th width="15%">Chegada em</th>
				</tr>
			{foreach from=$other_movements item=array}
				<tr>
					<td><a href="game.php?village={$village.id}&amp;screen=info_command&amp;id={$array.id}&amp;type=other"><img src="../graphic/command/{$array.type}.png"> {$array.message}</a></td>
					<td>{$array.end_time|format_date|replace:"heute um":"hoje &agrave;s"|replace:"Uhr":""|replace:"am":"em"|replace:"um":"&agrave;s"|replace:"morgen":"amanh&atilde;"}</td>
					<td><span class="timer">{$array.arrival_in+1|format_time}</span></td>
				</tr>
			{/foreach}
		</table>
		{/if}
		</td>
		<td valign="top" width="100%">
			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr><th colspan="2">Produ&ccedil;&atilde;o</th></tr>
				<tr class="nowrap"><td width="70"><img src="../graphic/icons/wood.png" title="Madeira" alt="" /> Madeira</td><td><strong>{$wood_prod_overview}</strong> por {if $speed > 10}minuto{else}hora{/if}</td></tr>
				<tr class="nowrap">
				  <td><img src="../graphic/icons/stone.png" title="Argila" alt="" /> Argila</td><td><strong>{$stone_prod_overview}</strong> por {if $speed > 10}minuto{else}hora{/if}</td></tr>
				<tr class="nowrap"><td><img src="../graphic/icons/iron.png" title="Ferro" alt="" /> Ferro</td><td><strong>{$iron_prod_overview}</strong> por {if $speed > 10}minuto{else}hora{/if}</td></tr>
			</table><br />
	
			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr><th>Unidades <span style="float:right;font-size:9px;"><a href="game.php?village={$village.id}&amp;screen=train">&raquo; Recrutar</a></span></th></tr>
{php}
		$_from = $this->_tpl_vars['in_village_units'];
		if(!is_array($_from) && !is_object($_from)){
			settype($_from, 'array');
		}
		if(count($_from)):
			foreach($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['num']):
{/php}
{if $dbname == 'unit_knight'}
{php}
	$pala_name = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id = '".$userid."'"));
	echo '<tr><td><img src="../graphic/unit/unit_knight.png"> '.$pala_name['knight_name'].'</td></tr>';
{/php}
{else}
	<tr><td><img src="../graphic/unit/{$dbname}.png"> <b>{$num}</b> {$cl_units->get_name($dbname)}</td></tr>
{/if}
{php}
			endforeach;
		endif;
		unset($_from);
{/php}
			</table><br />
		{if $village.agreement != 100}
			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr><th width="50%">Lealdade:</th><td align="center">{$village.agreement}%</td></tr>
			</table>
		{/if}
		</td>
	</tr>
</table>