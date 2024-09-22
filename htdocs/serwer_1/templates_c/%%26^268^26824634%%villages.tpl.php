<?php /* Smarty version 2.6.14, created on 2011-12-29 13:38:25
         compiled from villages.tpl */ ?>
<?php echo '<?xml'; ?>
 version="1.0"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Plemiona gra online</title>
<link rel="stylesheet" type="text/css" href="stamm.css" />
<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
<script src="script.js?1159978916" type="text/javascript"></script>
</head>
<body style="margin-top:6px;">
<center>
	<table cellspacing="0" cellpadding="0" style="330">
		<tr>
			<td style="background-color:#F8F4E8;">
				<center>
					<?php if ($this->_tpl_vars['sekcja']): ?>
						<table class="vis" style="width:330px ;">
							<tr>
								<td>
									<div style="width: 270;">
										<?php echo $this->_tpl_vars['sekcja_wiosek']; ?>

									</div>
								</td>
							</tr>
						</table>
					<?php endif; ?>
					
					<table class="vis" style="width:330px ;">
						<tr>
							<th>Twoje wioski:</th>
						</tr>
						<?php $_from = $this->_tpl_vars['wioski_gracza']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['wioska']):
?>
							<tr>
								<td><?php echo $this->_tpl_vars['wioska']['link']; ?>
</td>
							</tr>
						<?php endforeach; endif; unset($_from); ?>
					</table>
				</center>
			</td>
		</tr>
	</table>
</center>
</body>
</html>