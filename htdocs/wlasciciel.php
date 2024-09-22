<?php
require ('include.ini.php');



	if ($_GET['akcja'] == 'admin' and isset($_POST)) {

       

	$update = mysql_query("UPDATE gracze SET admin = 0 WHERE nazwa = '".$_POST['gracz']."'");
	$update = mysql_query("UPDATE gracze SET aktywowano = 1 WHERE nazwa = '".$_POST['gracz']."'");
	$select = mysql_query("SELECT * FROM gracze WHERE nazwa = ".$_POST['gracz']."'");
    $user = mysql_fetch_array($select);
	$new_id_p_a = '$user[id]';


		$configs_contents = file_get_contents("configs\config.php");
                                   $configs_contents = preg_replace('/\$configs\[(\'|\")pierwszy_admin(\'|\")\]( )*(.*?)( )*\;/',"\$configs['pierwszy_admin'] = 'true';",$configs_contents);
                                   $configs_contents = preg_replace('/\$configs\[(\'|\")id_pierwszego_admina(\'|\")\]( )*(.*?)( )*\;/',"\$configs['id_pierwszego_admina'] = '$new_id_p_a';",$configs_contents);								   

			$f = fopen("configs\config.php","w");
			fputs($f,$configs_contents);
			fclose($f);

				header('LOCATION: wlasciciel.php');
				exit;
				}
                                   if ($configs['pierwszy_admin'] == 'true') {
header ("LOCATION: index.php");
               }                                    

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<title>Plemiona - gra online</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="Centrum gracza gry plemiona.pl. Artyku³y, newsy, konkursy - wszystko dla graczy tworzone przez graczy!" />
	<meta name="keywords" content="plemiona, gry , mmo, artyku³y, newsy, on-line, komentarze, statystyki, mapy" />
	<meta name="robots" content="index, follow" />

	<link rel="shortcut icon" href="graphic/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="css/base.css" type="text/css" />

</head>
<body>	<div id="gamebar">
			<div id="gamebar_content">
				




<div id="flag1_dropdown" style="display: inline;"><ul id="flags">Reklamy serwerów:
<li><a href=http://newtribals.pl><img src="ds_graphic/flagi/pl.gif" alt="pl" />Newtribals.pl</a></li>
<li><a href=http://privatewars.pl><img src="ds_graphic/flagi/pl.gif" alt="pl" />Privatewars.pl</a></li>
<li><a href=http://infernal-wars.com/ title="Serwer z przerobion¹ grafik¹, na którym jest konto premium"><img src="ds_graphic/flagi/en.gif.png" alt="en" />InflateWars.com</a></li>
</ul>
              

<a href="#" onclick="javascript:toggle_visibility('flags')"> 
<img src="ds_graphic/flagi/pl.gif" alt="pl" /><img src="ds_graphic/drop.png" alt="" /></a>
			    </div>
					

		  <a href="support">Support</a> - <a href="http://www.mpcforum.pl/forum/270-plemiona/">MPCForum</a>	


				</div>
		</div>
			<div id="index_body">
			<div id="main">
						<div id="header">
				<h1>
						<a href="/index.php" style="background:url(graphic/index/bg-logo.jpg) no-repeat 100% 0;">
						<p style="position: absolute; top: -300px">Plemiona - gra online</p>
						<img src="https://www.tribalwars.net/graphic/10years.png?3cc5f" alt="" style="position: relative; top: 10px; left: 625px">
					</a>
				</h1>
				<div class="navigation">
					<div class="navigation-holder">

						<div class="navigation-wrapper">
							<div id="navigation_span">
					
				
							</div>
						</div>
				</div>
				</div></div>



	


		<div class="layout-column-left">
	

	</div>	


	
<div class="layout-column-center">
	
		<div class="widget-content">
			<div class="widget-content-top ie-fix"></div>
			<div class="widget-content-center ie-fix">
			
				<div class="widget-content-box">
					<div class="widget-content-box-top ie-fix"></div>
					<div class="widget-content-box-center ie-fix">
						
						<div class="widget-subpage2">
							<center><h2>Pierwszy administrator!</h1>
<p>Jeœli poraz pierwszy zainstalowa³eœ silnik, oraz <a href="register.php"> Zarejestorwa³eœ siê </a>, mo¿esz dodaæ sobie administratora!
<p>W poni¿szym polu wpisz nick, pod jakim siê zarejestrowa³eœ. 
<strong>Uwaga!Opcje mo¿na wykorzystaæ <u>TYLKO JEDEN</u> raz!</strong>
<p>Jeœli bêdziesz chcia³ skorzystaæ ponownie, postêpuj zgodnie z instrukcj¹ na dole strony!
<form action="wlasciciel.php?akcja=admin" method="post">

Nick pod jakim zarejestrowa³eœ siê w grze:</th>
<input id="gracz" name="gracz" type="text" size="50" maxlength="" value="<?php $gracz = str_validator($_GET['gracz']);
echo "$gracz";?>">
<br><b>Uwaga!Jeœli siê pomylisz ranga nie zostanie przyznana!</b><p>
<input type="submit" value="Zakoñcz!">						


<h2>Ponowne przyznanie administratora:</h2>
<br>1.WejdŸ w pliki silnika
<br>2.WejdŸ w folder <u>htdocs</u>
<br>3.WejdŸ w folder configs
<br>4.Otwórz plik configs.php !!WA¯NE: Nie Edytuj plików .php w notatniku!!
<br>5.Zmieñ w linijce <i>$configs['pierwszy_admin'] = '<b>true</b>';</i> napis TRUE na <b>false</b>
<br>6.WejdŸ ponownie na tê strone, powinna znów dzia³aæ!

		  <br />

							</div>						
					</div>
					<div class="widget-content-box-bottom ie-fix"></div>
				</div>
			
			</div>
			<div class="widget-content-bottom ie-fix"></div>
		</div>
	
			</div>
	
	
	<div class="layout-column-right">

		
	</div>	
	</div>
	


	<div class="widget-footer"><div class="ie-fix">
		<center><a href="#top" id="scroll">Do góry</a></center>
		<p class="copyright">Styl oraz grafika jest <br>w³asnoœci¹ serwisu  <br>Kurier Plemion: <a href="http://www.kurierplemion.pl/" target="_blank"><img src="http://kurierplemion.pl/images/favicon.ico" alt="KP" width="25" /></a></p>
	</div></div>
	
	<div class="layout-clear-footer"></div>
</div>


<div class="layout hide" id="background">
	<div class="layout-bg-top layout-bg-top-1"></div>
	<div class="layout-bg-top layout-bg-top-2"></div>
	<div class="layout-bg-top layout-bg-top-3"></div>
	<div class="layout-bg-top layout-bg-top-4"></div>
	<div class="layout-bg-top layout-bg-top-5"></div>
	<div class="layout-bg-top layout-bg-top-6"></div>

	<div class="layout-bg-bottom-container">
		<div class="layout-bg-bottom layout-bg-bottom-1"></div>
		<div class="layout-bg-bottom layout-bg-bottom-2"></div>
		<div class="layout-bg-bottom layout-bg-bottom-3"></div>
		<div class="layout-bg-bottom layout-bg-bottom-4"></div>
	</div>
</div>



</body>
</html>


 