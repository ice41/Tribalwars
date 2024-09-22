<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Uczestnictwo</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />

		<link rel="stylesheet" type="text/css" href="stamm.css?1323952898" />

	
	
	
	</head>

<body style="margin-top:6px;">
<table style="margin:auto; margin-top: 25px; border:1px solid brown; width: 100%;background:url(/ds_graphic/background/main_bg.jpg);">
	<tr>
		<td>

			<table id="content_value" style="background:url(/ds_graphic/background/main_bg.jpg);" cellspacing="0">
				<tr>
					<td>

<h1><img src="/ds_graphic/rabe_38x40.png" alt="" /> Uczestnictwo</h1>

<b>Opis:</b>
<table class="vis" style="border:1px solid #000" width="400"><tr><td>
<font color="#9933CC">Styl 4.0 (wioski koczownicze,{if $monety}monety{/if}{if $poziom_pałacu}Pałac ma 3 poziomy{/if}, łucznicy, łucznicy konni, rycerz z przedmiotami,<b>bez kościoła</b>)</font><br>

noc: z bonusem nocnym<br><font color="red">Prędkość: {$speed}</font>
</td></tr></table>

{if $rejestracja_nowych_graczy}
<p>Czy chcesz uczestniczyć na  <strong>Świat {$serwer}</strong>?</p>




<form method="post" action="uczestnictwo.php?action=accept_uczestnictwo">
		<input type="submit" value="Uczestnictwo" />
</form>
{else}
<h4><font color="red">{$err}</font></h4>
{/if}

</td></tr></table>
</td></tr></table><script type="text/javascript">setImageTitles();</script>
</body>
</html>
