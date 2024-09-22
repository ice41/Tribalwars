<?php include 'include/config.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Triburile - Jocul online</title>
<link rel="stylesheet" type="text/css" href="start.css" />
		<meta name="description" content="Die St&auml;mme ist ein Browsergame. Jeder Spieler ist Herrscher eines kleinen Dorfes, dem er zu Ruhm und Macht verhelfen soll." />
		<meta name="keywords" content="Browsergame, Browsergames, Browserspiel, Onlinespiel, Onlinegame, Mittelalter, Ritter, Burg, Burgen, Dorf, Krieg, Kampf, K&auml;mpfen, Ruhm, Ehre, Die St&auml;mme" />
		<link rel="stylesheet" type="text/css" href="index.css?1232382056" />
		<!--[if lt IE 7]>
		<link rel="stylesheet" type="text/css" href="index_ie6.css" media="screen"/>
		<![endif]-->
									<script type="text/javascript">
		if(top!=self)
			top.location=self.location;
		</script>
				<style type="text/css">
		
			

		
		</style>
	</head>

<body >

<div id="index_body">
			<div id="main">
			<div id="header">
				<h1><a href="/index.php" style="background:url(graphic/index/bg-logo.jpg) no-repeat 100% 0;">Triburile - Jocul online</a></h1>
				<div class="navigation">
					<div class="navigation-holder">
						<div class="navigation-wrapper">
							<div id="navigation_span">
								<a href="http://wiki.triburile.ro/">Wiki</a> - <a href="/help/index.php">Ajutor</a>  - <a href="rules.php">Reguli de joc</a>  - <a href="/forum">Forum</a>  - <a href="support.php">Suport</a>  - <a href="team.php">Echipa</a>  - <a href="stats.php">Statistic&#259;</a>
							</div>
						</div>
				</div>
				</div>
							</div><div class="container-block-full">
			<div class="container-top-full"></div>
				<div class="container">
					<table>
						<tr>
							<td valign="top">
								<table class="vis" style="margin:0 18px 0 12px;">
																			<tr>
											<td  style="width:65px;"><a href="stats.php">Lumea 1</a></td>
										</tr>
												
																	</table>
							</td>
							<td valign="top">
								<h2>Set&#259;rile lumii Lumea 1</h2>
								<h3><a href="guest.php" target="_top">&raquo; Intrare vizitator</a> <a href="stats.php" target="_top">&raquo; Statistic&#259;</a></h3><br />

<table width="80%" border="0" class="vis">
<tbody><tr>
<th colspan="2">Set&#259;ri</th>
</tr>

<tr>
<td width="50%">Vitez&#259; de joc</td>
<td width="50%"><?php echo $config['speed']; echo($config['speed'] == '') ? "necunoscut" : "" ;?></td>
</tr>

<tr>
<td>Rapiditatea unit&#259;&#355;ilor</td>
<td><?php echo $config['movement_speed']; echo($config['movement_speed'] == '') ? "necunoscut" : "" ; ?></td>
</tr>

<tr>
<td>Moral</td>
<td>
<?php
echo($config['moral_activ'] == '0') ? "inactiv\n" : "" ;
echo($config['moral_activ'] == 1) ? "activ \n" : "";
echo($config['moral_activ'] == '') ? "necunoscut" : "" ;
?>
</td>
</tr>

<tr>
<td>Ap&#259;rarea de baz&#259;</td>
<td><?php echo $config['reason_defense']; echo($config['reason_defense'] == '') ? "necunoscut" : "" ; ?></td>
</tr>

<tr>                                              
<td>Pornire la atac</td>
<td><?php if($config['cancel_movement'] == ''){ echo 'necunoscut';}else{
echo ''.$config['cancel_movement'].' Minute';
echo($config['cancel_movement'] == 1) ? "\n" : "n\n" ; }?></td>
</tr>

<tr>
<td>Timpul de plecare pentru negustori</td>
<td><?php if($config['dealer_time'] == ''){ echo 'necunoscut';}else{
echo ''.$config['dealer_time'].' Minute';
echo($config['dealer_time'] == 1) ? "\n" : "n\n" ;
echo 'pro Feld'; } ?></td>
</tr>
                                                              
<tr>
<td>Timpul de sosire pentru negustori</td>
<td><?php if($config['cancel_dealers'] == ''){ echo 'necunoscut';}else{
echo ''.$config['cancel_dealers'].' Minute';
echo($config['cancel_dealers'] == 1) ? "\n" : "n\n" ;
echo 'pro Feld'; } ?></td>
</tr>


<tr>
<td>Ap&#259;rare pentru &#238;ncep&#259;tori &#238;mpotriva atacurilor</td>
<td><?php if($config['noob_protection'] == ''){ echo 'necunoscut';}else{
echo($config['noob_protection'] != -1 and $config['noob_protection'] != 0) ? ''.$config['noob_protection'].' Minute' : "" ;
echo($config['noob_protection'] > 1) ? 'n' : "" ;
echo($config['noob_protection'] == -1 || $config['noob_protection'] == 0) ? "inactiv" : "" ; }?>
</td>
</tr>

<tr>
<td>Capacitatea fermei</td>
<td><?php if($config['bh_style'] == ''){ echo 'necunoscut';}else{
echo($config['bh_style'] == 2) ? 'Wenn der Bauernhof bist Stufe 30 ausgebaut ist, so geht er bis 22782 Pl&auml;tze (S1)' : "" ;
echo($config['bh_style'] == 1) ? 'Wenn der Bauernhof bist Stufe 30 ausgebaut ist, so geht er bis 24000 Pl&auml;tze (SDS)' : "" ; } ?>
</td>
</tr>



</tbody></table>
<table width="80%" border="0" class="vis">
<tbody><tr>
<th colspan="2">Genera&#355;ie de nobili</th>
</tr>

<tr>
<td width="50%">Steigende AG-Preise</td>
<td width="50%"><?php
if($config['ag_style'] == ''){ echo 'necunoscut';}else{
echo($config['ag_style'] == 0) ? "pro Dorf k&ouml;nnen so viele AGs gebaut werden, so hoch wie der Adelshof ist (S1)" : "";
echo($config['ag_style'] == 1) ? "pro Dorf k&ouml;nnen so viele AGs gebaut werden, so hoch wie der Adelshof ist (S1)" : "";
echo($config['ag_style'] == 2) ? "Goldm&uuml;nzen" : ""; }?></td>
</tr>

<tr>
<td>Pierderea adeziunii prin genera&#355;ii nobile maxime</td>
<td><?php if($config['agreement_max'] == ''){ echo 'necunoscut';}else{ echo $config['agreement_max']; }  ?></td>
</tr>

<tr>
<td>Pierderea adeziunii prin genera&#355;ii nobile minime</td>
<td><?php if($config['agreement_min'] == ''){ echo 'necunoscut';}else{ echo $config['agreement_min']; }  ?></td>
</tr>

<tr>
<td>Cre&#351;terea adeziunii pe minut</td>
<td><?php if($config['agreement_per_hour'] == '' and $config['speed'] == ''){ echo 'necunoscut';}else{
$agreement_per_second = (1/(3600/$config['agreement_per_hour'])) * $config['speed'];
echo $agreement_per_second; } ?></td>
</tr>

<tr>
<td>Cre&#351;terea adeziunii per or&#259;</td>
<td><?php if($agreement_per_second == ''){ echo 'necunoscut';}else{
$agreement_per_hour = $agreement_per_second * 3600; echo $agreement_per_hour;} ?></td>
</tr>

</tbody></table>
<table width="80%" border="0" class="vis">
<tbody><tr>
<th colspan="2">Triburi</th>
</tr>
                                                      
<tr>
<td width="50%">Crearea de triburi</td>
<td width="50%"><?php if($config['create_ally'] == ''){ echo 'necunoscut';}else{
echo($config['create_ally'] == true) ? "activ" : "";
echo($config['create_ally'] == false) ? "inactiv" : "";}?></td>
</tr>

<tr>
<td>Par&#259;sirea tribului</td>
<td><?php if($config['leave_ally'] == ''){ echo 'necunoscut';}else{
echo($config['leave_ally'] == true) ? "activ" : "";
echo($config['leave_ally'] == false) ? "inactiv" : "";}?></td>
</tr>
                             
<tr>
<td>Dizolvarea triburilor</td>
<td><?php if($config['close_ally'] == ''){ echo 'necunoscut';}else{
echo($config['close_ally'] == true) ? "activ" : "";
echo($config['close_ally'] == false) ? "inactiv" : "";}?></td>
</tr>
        
<tr>
<td>Trib automat</td>
<td><?php if($config['auto_ally'] != false  and $config['auto_ally'] != true){ echo 'necunoscut';}else{
echo($config['auto_ally'] == true) ? "activ" : "";
echo($config['auto_ally'] == false) ? "inactiv" : "";} ?></td>
</tr>

</tbody></table>

<table width="80%" border="0" class="vis">
<tbody><tr>
<th colspan="2">Configura&#355;ie</th>
</tr>

<tr>
<td width="50%">Nach wie vielen D&ouml;rfern wird ein Barbarendorf erstellt</td>
<td width="50%"><?php if($config['count_create_left'] == ''){ echo 'unknown';}else{
echo ($config['count_create_left'] > 1) ? 'nach '.$config['count_create_left'].' D&ouml;rfer' : "";
echo ($config['count_create_left'] == 1) ? 'nach einem Dorf' : "";
echo ($config['count_create_left'] == -1) ? 'inaktiv' : "";
}?></td>
</tr>

<tr>
<td>Grafica harta</td>
<td><?php if($config['map_design'] == ''){ echo 'unknown';}else{
echo ($config['map_design'] == 0) ? "alte Kartengrafik" : "";
echo($config['map_design'] == 1) ? "neue Kartengrafik" : ""; }?></td>
</tr>

<tr>       
<td>Himmelsrichtungswahl</td>
<td><?php if($config['village_choose_direction'] == ''){ echo 'unknown';}else{
echo ($config['village_choose_direction'] == true) ? "aktiv" : "";
echo($config['village_choose_direction'] == false) ? "inaktiv" : ""; }?></td>
</tr>

<tr>
<td>Spielgeschehen gestoppt/ Keine Aktionen m&ouml;glich</td>
<td><?php if($config['no_actions'] != true and $config['no_actions'] != false){ echo 'unknown';}else{
echo ($config['no_actions'] == true) ? "aktiv" : "";
echo($config['no_actions'] == false) ? "inaktiv" : ""; }?></td>
</tr>

<tr>
<td>Wird ein Angriff als Besuch angesehen</td>
<td><?php if($config['attack_visit'] == ''){ echo 'unknown';}else{
echo ($config['attack_visit'] == true) ? "aktiv" : "";
echo($config['attack_visit'] == false) ? "inaktiv" : ""; }?></td>
</tr>

                              
</tbody></table>
<br />
</td>

</td></tr></table>
</td></tr></table>
</div>
			<div class="container-bottom-full"></div>
		 </div>
		</div><!-- content -->
					<div class="closure">

                                
                			</div>	</body>
</html>