<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Estabelecendo uma nova aldeia</title>
<link rel="stylesheet" type="text/css" href="stamm.css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="/js/script.js?1159978916" type="text/javascript"></script>
</head>

<body>
<table class="main" width="800" align="center"><tr><td>
<h3>Construindo uma nova aldeia</h3>

{if !empty($ennobled_by)}
<p>Sua aldeia foi conquistada por <strong>{$ennobled_by}</strong>. Pode começar tudo desde o início na periferia do mundo, pode ter sucesso desta vez :)</p>
{/if}
{if !$can_create_village}
	<font color="red"><b>Atenção:<b> O limite das aldeias neste mundo foi alcançado, escolha um mundo diferente.</font><br>
	{else}
	{if !$create_users_and_villages}
	<font color="red"><b>Atenção:<b> Fundar novas aldeias neste mundo foi temporariamente suspenso, por favor, espere...</font><br>
	{/if}
{/if}

<h4>Em que direção do mundo deseja criar sua aldeia?</h4>

<table class="vis"><tr><td width="200">
<form action="create_village.php?action=create" method="post">
<label><input type="radio" name="direction" value="R" checked="checked" />Acidentalmente</label><br />
<label><input type="radio" name="direction" value="OW" />Nordeste</label><br />
<label><input type="radio" name="direction" value="OZ" />Noroeste</label><br />
<label><input type="radio" name="direction" value="PW" />Sudeste</label><br />
<label><input type="radio" name="direction" value="PZ" />Sudoeste</label><br />
<br /><input type="submit" value="Criar" />
</form>

</td><td>
<img src="/ds_graphic/compass.png" alt="" />
</td></tr></table>



</td></tr></table>
<script type="text/javascript">setImageTitles();</script>
</body>
</html>
