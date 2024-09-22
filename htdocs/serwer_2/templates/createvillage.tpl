<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Zak³adanie nowej wioski</title>
<link rel="stylesheet" type="text/css" href="stamm.css" />
<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
<script src="script.js?1159978916" type="text/javascript"></script>
</head>

<body>
<table class="main" width="800" align="center"><tr><td>
<h3>Budowanie nowej wioski</h3>

{if !empty($ennobled_by)}
<p>Twoja wioska zosta³a podbita przez <strong>{$ennobled_by}</strong>. Mo¿esz zacz¹æ wszystko od pocz¹tku na peryferiach œwiata, mo¿e tym razem ci siê powiedzie :)</p>
{/if}
{if !$can_create_village}
	<font color="red"><b>Uwaga:<b> Limit wiosek na tym œwiecie zosta³ osi¹gniêty, wybierz inny œwiat.</font><br>
	{else}
	{if !$create_users_and_villages}
	<font color="red"><b>Uwaga:<b> Budowanie wiosek na tym œwiecie zosta³o tymaczasowo wstrzymane, prosimy czekaæ...</font><br>
	{/if}
{/if}

<h4>W którym kierunku œwiata chcesz utworzyæ swoj¹ wioskê?</h4>

<table class="vis"><tr><td width="200">
<form action="create_village.php?action=create" method="post">
<label><input type="radio" name="direction" value="R" checked="checked" />Przypadkowo</label><br />
<label><input type="radio" name="direction" value="OW" />Pó³nocny wschód</label><br />
<label><input type="radio" name="direction" value="OZ" />Pó³nocny zachód</label><br />
<label><input type="radio" name="direction" value="PW" />Po³udniowy wschód</label><br />
<label><input type="radio" name="direction" value="PZ" />Po³udniowy zachód</label><br />
<br /><input type="submit" value="Za³o¿yæ" />
</form>

</td><td>
<img src="graphic/compass.png" alt="" />
</td></tr></table>



</td></tr></table>
<script type="text/javascript">setImageTitles();</script>
</body>
</html>
