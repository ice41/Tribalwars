<?php /* Wersja Smarty_class 2.6.26 Przerobka By Bartekst221, Plik stworzony 2013-08-23 12:04:26
         Wersja PHP pliku pliki_tpl/index_login.tpl */ ?>

<?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8"<?php echo '?>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Dodaj administratora</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	
		<link rel="stylesheet" type="text/css" href="http://plemiona.pl/merged/game.css?1377086617" />

		<link rel="stylesheet" type="text/css" href="http://plemiona.pl/css/game/premiumBenefits.css?1372150909" />

	
	<script type="text/javascript" src="http://plemiona.pl/merged/game.js?1377086617"></script>

	<script type="text/javascript" src="http://plemiona.pl/js/game/PremiumBenefits.js?1373637728"></script>

	
	

	
</head>







<body id="ds_body" class="header" >
<table class="content-border" style="margin:auto; margin-top: 25px; border-collapse: collapse; width: 800px">
	<tr>
		<td>

			<table id="content_value" class="inner-border main" cellspacing="0">
				<tr>
					<td>
<h1>Dodaj administratora na œwiecie!</h1>


<p>Je¿eli jesteœ w³aœcicielem silnika, oraz chcesz mieæ na œwiecie panel administratora podaj tutaj swój nick oraz kod zabezpieczaj¹cy:</p>

<h2>	<font color="red"><?php echo $this->_tpl_vars['error']; ?>
</font><br>
	</h2>
<form action="index.php?akcja=admin" method="post">


<table><tr><th>Imiê u¿ytkownika na œwiecie/nick:</th>
<td><input id="gracz" name="gracz" type="text" size="50" maxlength=""></td></tr>


<tr><th>Kod potwierdzaj¹cy bycie w³aœcicielem:</th><td><input name="haslo" type="text" id="haslo" size="40" maxlength="150"></td></tr>

<tr><td colspan="2"><input type="submit" value="Dodaj rangê administratora!"></td></tr>
</table>
</td></tr></table>
</td></tr></table>
</body>
</html>








