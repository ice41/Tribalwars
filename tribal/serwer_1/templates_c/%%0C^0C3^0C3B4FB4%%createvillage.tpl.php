<?php /* Smarty version 2.6.14, created on 2014-07-03 02:38:03
         compiled from createvillage.tpl */ ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>A constru��o de uma nova aldeia</title>
<link rel="stylesheet" type="text/css" href="stamm.css" />
<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
<script src="/js/script.js?1159978916" type="text/javascript"></script>
</head>

<body>
<table class="main" width="800" align="center"><tr><td>
<h3>A constru��o de uma nova aldeia</h3>

<?php if (! empty ( $this->_tpl_vars['ennobled_by'] )): ?>
<p>Sua aldeia foi conquistada por <strong><?php echo $this->_tpl_vars['ennobled_by']; ?>
</strong>. Pode iniciar recome�ar de in�cio, talvez desta vez a ter sucesso :)</p>
<?php endif;  if (! $this->_tpl_vars['can_create_village']): ?>
	<font color="red"><b>Nota:<b>O limite de aldeias neste mundo foi alcan�ado deve selecionar outro mundo.</font><br>
	<?php else: ?>
	<?php if (! $this->_tpl_vars['create_users_and_villages']): ?>
	<font color="red"><b>Nota:<b> Aldeias de constru��o neste mundo foi suspenso temporariamente, aguarde a reabertura...</font><br>
	<?php endif;  endif; ?>

<h4>Em que dire��o do mundo quer criar a sua aldeia?</h4>

<table class="vis"><tr><td width="200">
<form action="create_village.php?action=create" method="post">
<label><input type="radio" name="direction" value="R" checked="checked" />Aleat�riamente</label><br />
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