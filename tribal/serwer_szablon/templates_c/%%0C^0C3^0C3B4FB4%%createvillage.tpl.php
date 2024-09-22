<?php /* Smarty version 2.6.14, created on 2012-04-29 17:49:27
         compiled from createvillage.tpl */ ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Zakładanie nowej wioski</title>
<link rel="stylesheet" type="text/css" href="stamm.css" />
<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
<script src="/js/script.js?1159978916" type="text/javascript"></script>
</head>

<body>
<table class="main" width="800" align="center"><tr><td>
<h3>Budowanie nowej wioski</h3>

<?php if (! empty ( $this->_tpl_vars['ennobled_by'] )): ?>
<p>Twoja wioska została podbita przez <strong><?php echo $this->_tpl_vars['ennobled_by']; ?>
</strong>. Możesz zacząć wszystko od początku na peryferiach świata, może tym razem ci się powiedzie :)</p>
<?php endif;  if (! $this->_tpl_vars['can_create_village']): ?>
	<font color="red"><b>Uwaga:<b> Limit wiosek na tym świecie został osiągnięty, wybierz inny świat.</font><br>
	<?php else: ?>
	<?php if (! $this->_tpl_vars['create_users_and_villages']): ?>
	<font color="red"><b>Uwaga:<b> Budowanie wiosek na tym świecie zostało tymaczasowo wstrzymane, prosimy czekać...</font><br>
	<?php endif;  endif; ?>

<h4>W którym kierunku świata chcesz utworzyć swoją wioskę?</h4>

<table class="vis"><tr><td width="200">
<form action="create_village.php?action=create" method="post">
<label><input type="radio" name="direction" value="R" checked="checked" />Przypadkowo</label><br />
<label><input type="radio" name="direction" value="OW" />Północny wschód</label><br />
<label><input type="radio" name="direction" value="OZ" />Północny zachód</label><br />
<label><input type="radio" name="direction" value="PW" />Południowy wschód</label><br />
<label><input type="radio" name="direction" value="PZ" />Południowy zachód</label><br />
<br /><input type="submit" value="Założyć" />
</form>

</td><td>
<img src="graphic/compass.png" alt="" />
</td></tr></table>



</td></tr></table>
<script type="text/javascript">setImageTitles();</script>
</body>
</html>