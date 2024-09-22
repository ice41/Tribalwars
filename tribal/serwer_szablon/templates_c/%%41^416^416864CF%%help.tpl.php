<?php /* Smarty version 2.6.14, created on 2012-03-11 19:08:56
         compiled from help.tpl */ ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8"<?php echo '?>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Plemiona - Pomoc - Świat <?php echo $this->_tpl_vars['serwerid']; ?>
</title>
		<meta http-equiv="content-type" content="text/html; charset=windows-1250" />

		<link rel="stylesheet" type="text/css" href="game.css?1331133567" />
		<link rel="stylesheet" type="text/css" href="styl.css?1331133567" />
		<script src="script.js?1159978916" type="text/javascript"></script>

	</head>

	<body id="ds_body" class="header" >
		<table align="center" style="margin:auto; margin-top: 15px; width: 820px;padding:5px;">
			<tr>
				<td>
					<table class="content-border" id="content_value" style="border-collapse: collapse; width: 100%; padding: 10px;">
						<tr>
							<td>
								<h3>Plemiona - Pomoc</h3>
								
								<table>
									<tbody>
										<tr>
											<td valign="top">
												<table class="vis modemenu" style="width: 125px;">
													<tbody>	
														<?php $_from = $this->_tpl_vars['modes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link'] => $this->_tpl_vars['f_mode']):
?>
															<tr>
																<?php if ($this->_tpl_vars['f_mode'] == $this->_tpl_vars['mode']): ?>
																	<td width="100" class="selected">
																		<a href="help.php?mode=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php echo $this->_tpl_vars['link']; ?>
 </a>
																	</td>
																<?php else: ?>
																	<td width="100">
																		<a href="help.php?mode=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php echo $this->_tpl_vars['link']; ?>
 </a>
																	</td>
																<?php endif; ?>
															</tr>
														<?php endforeach; endif; unset($_from); ?>
													</tbody>
												</table>
											</td>
											<td valign="top">
												<?php if (in_array ( $this->_tpl_vars['mode'] , $this->_tpl_vars['modes'] )): ?>
													<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "help_".($this->_tpl_vars['mode']).".tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
												<?php endif; ?>
											</td>
										</tr>
									</tbody>
								</table>
								
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>