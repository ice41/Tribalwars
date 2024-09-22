<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Triburile - Jocul online</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="start.css" />
                <LINK rel="shortcut icon" href="graphic/index/rabe.png" type="image/x-icon">
		<meta name="description" content="Triburile este un joc online, care se petrece in evul mediu. Fiecare jucator este stapanul unui mic sat, pe care il aduce la faima si putere." />
		<meta name="keywords" content="Browsergame, Browsergames, Browserspiel, Onlinespiel, Onlinegame, Mittelalter, Ritter, Burg, Burgen, Dorf, Krieg, Kampf, K&auml;mpfen, Ruhm, Ehre, Die St&auml;mme" />
		<link rel="stylesheet" type="text/css" href="index.css?1232382056" />
									<script type="text/javascript">
		if(top!=self)
			top.location=self.location;
		</script>
	</head>

	<body>
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
				<span class="paladin"><img src="graphic/index/bg-paladin.png" alt="" /></span>			</div><div id="content">
  <div class="container-block-full">
    <div class="container-top-full"></div>
    <div class="container">
      <div class="info-block register">
        <h2 class="register">
         Statistici
        </h2>
        <div style="margin-top: 50px;">
<?php
	include ("$server/include/config.php");
	include ("$server/include/configs/farm_limits.php");
	include ("$server/include/configs/max_storage.php");
?>

<table class="vis" style="border:1px solid #000" width="450" align="center">
					<tr>
						<td>
				Viteza: <b><?php echo number_format($config['speed'], 0, '.', '.'); ?>x</b><br />
				
				Ferma: <b><?php echo number_format($arr_farm[$config['max_level_farm']], 0, '.', '.'); ?></b><br />
				
				Magazie: <b><?php echo number_format($arr_maxstorage[$config['max_level_storage']], 0, '.', '.'); ?></b><br />
				
				Protecite Incepator: <b><?php echo $config['noob_protection_v1']; ?> minute</b><br />
				
						<?php if ($config['member_limit']) { ?>
				Limita membri trib: <b><?php echo $config['member_limit']; ?></b><br />
						<?php } ?>
						
						<?php if ($config['max_villages']) { ?>
			    Limita de sate: <b><?php echo $config['max_villages']; ?></b><br />
						<?php } ?>

                Viteza unitatilor: <b><?php echo $config['movement_speed']; echo($config['movement_speed'] == '') ? "necunoscut" : "" ; ?></b><br/>	

				Moral:  <?php
echo($config['moral_activ'] == '0') ? "inactiv\n" : "" ;
echo($config['moral_activ'] == 1) ? "activ \n" : "";
echo($config['moral_activ'] == '') ? "necunoscut" : "" ;
?>
						</td>
					</tr>
</table>	
{php}
echo '<h1>Top 5 Jucatori</h1><br /><br /><table class="vis" width="100%">
<tr><th>Rank</th><th>Nume</th><th>Trib</th><th>Puncte</th><th>Sate</th></tr>';
function user_to_ally($id) {
    $sql = mysql_fetch_array(mysql_query("SELECT `short` FROM `ally` WHERE `id` = $id"));
    return $sql[0];
}
$rank = 1;
$sat = $this->_tpl_vars["village"]["id"];
$sql = mysql_query("SELECT `id`,`username`,`points`,`villages`,`ally` FROM `users` ORDER by `points` DESC LIMIT 0,5");
while ($user = mysql_fetch_array($sql)) {
    $trib = '';
    if ($user[ally] <> -1) {
        $trib = '<a href="game.php?village='.$sat.'&screen=info_ally">'.user_to_ally($user[ally]).'</a>';
    }
    echo '
    <tr>
        <td>'.$i.'</td>
        <td><a href="game.php?village='.$sat.'&screen=info_player&id='.$user[id].'>'.$user[username].'</a></td>
        <td>'.$trib.'</td>
        <td>'.format_number($user[villages]).'</td>
        <td>'.format_number($user[points]).'</td>
    </tr>';
    $rank++;
}
echo '</table>'; 	
{/php}		
		
       </div>
      </div>
    </div>
    <div class="container-bottom-full"></div>
  </div>
</div>
			<div class="closure">
                                
                			</div></div><!-- main -->
</body>
</html>