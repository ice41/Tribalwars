<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Destinata&aacute;rios - Empire of War</title>
	<link rel="stylesheet" type="text/css" href="../css/game.css" />
	<script src="../js/script.js" type="text/javascript"></script>
</head>
<body>
{if !empty($userlist)}
	<script type="text/javascript">insertAdresses('{$userlist};', true);</script>
{/if}
{if $clear}
	<script type="text/javascript">opener.document.forms["header"].to.value = "";</script>
{/if}
<table class="main" width="100%" cellspacing="0">
	<tr><td><a href="igm_to.php?insert=ally">Toda tribo</a></td></tr>
	<tr><td><a href="igm_to.php?clear">Limpar remetentes</a></td></tr>
</table>
</body>
</html>