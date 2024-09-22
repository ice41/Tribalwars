<?php /* Smarty version 2.6.14, created on 2019-08-03 22:32:08
         compiled from game_settings_settings.tpl */ ?>
<?php  
	$userid = $this->_tpl_vars['user']['id'];
	$village = $this->_tpl_vars['village']['id'];
	if($_GET['action'] == 'settings_change'){
		$screen_width = $_POST['screen_width'];
		settype($screen_width, "integer");
		if($_POST['dyn_menu']){ $stat1 = '1'; }else{ $stat1 = '0'; }
		if($_POST['show_toolbar']) { $stat2 = '1'; }else{ $stat2 = '0'; }
		if($_POST['winter']){ $stat3 = 'winter'; }else{ $stat3 = ''; }
		if($_POST['show_announcements']){ $stat4 = '1'; }else{ $stat4 = '0'; }
		if($_POST['show_info_acc']){ $stat5 = '1'; }else{ $stat5 = '0'; }
		if($_POST['confirm_queue']){ $stat6 = '1'; }else{ $stat6 = '0'; }
		$map_size = $_POST['map_size'];
		settype($map_size, "integer");
		$minimap_size = $_POST['minimap_size'];
		settype($minimap_size, "integer");

		mysql_query("UPDATE users SET dyn_menu = '".$stat1."' WHERE id = '".$userid."'");
		mysql_query("UPDATE users SET show_toolbar = '".$stat2."' WHERE id = '".$userid."'"); 
		mysql_query("UPDATE users SET winter = '".$stat3."' WHERE id = '".$userid."'");
		mysql_query("UPDATE users SET show_announcements = '".$stat4."' WHERE id = '".$userid."'");
		mysql_query("UPDATE `users` SET `info_acc_show` = '".$stat5."' WHERE `id` = '".$userid."'");
		mysql_query("UPDATE users SET confirm_queue = '".$stat6."' WHERE id = '".$userid."'");		
		mysql_query("UPDATE users SET map_size = '".$map_size."' WHERE id = '".$userid."'");
		mysql_query("UPDATE users SET minimap_size = '".$minimap_size."' WHERE id = '".$userid."'");
		mysql_query("UPDATE users SET window_width = '".$screen_width."' WHERE id = '".$userid."'" );
		die(header("Location: game.php?village=$village&screen=settings&mode=settings"));
	}
	$show_1 = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$userid."'"));
 ?>
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=settings&amp;action=settings_change&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr><th colspan="2">Prefer&ecirc;ncias</th></tr>
	<tr><td>Largura da janela:</td><td><input type="text" name="screen_width" size="4" maxlength="4" value="<?php echo $this->_tpl_vars['user']['window_width']; ?>
" /> pixels</td></tr>
	<tr><td>Menu din&acirc;mico:</td><td><input type="checkbox" name="dyn_menu"  <?php if ($this->_tpl_vars['user']['dyn_menu'] == 1): ?>checked<?php endif; ?>/> Marque para abilitar o menu din&acirc;mico.</td></tr>
	<tr><td>Barra de acesso r&aacute;pido:</td><td><input type="checkbox" name="show_toolbar"  <?php if ($this->_tpl_vars['user']['show_toolbar'] == 1): ?>checked<?php endif; ?>/> Marque para abilitar a barra de acesso r&aacute;pido.</td></tr>
	<tr><td>Gr&aacute;fico de inverno:</td><td><input type="checkbox" name="winter" <?php if ($this->_tpl_vars['w'] == 'winter'): ?>checked<?php endif; ?>/> Marque para abilitar o gr&aacute;fico de inverno.</td></tr>
	<tr><td>Tamanho do mapa:</td><td><select name="map_size">
		<option label="Pequeno" value="7" <?php if ($this->_tpl_vars['user']['map_size'] == 7): ?>selected="selected"<?php endif; ?>>Pequeno</option>
		<option label="Pad&atilde;o" value="9" <?php if ($this->_tpl_vars['user']['map_size'] == 9): ?>selected="selected"<?php endif; ?>>Pad&atilde;o</option>
		<option label="M&eacute;dio" value="11" <?php if ($this->_tpl_vars['user']['map_size'] == 11): ?>selected="selected"<?php endif; ?>>M&eacute;dio</option>
		<option label="Grande" value="13" <?php if ($this->_tpl_vars['user']['map_size'] == 13): ?>selected="selected"<?php endif; ?>>Grande</option>
		<option label="Gigante" value="17" <?php if ($this->_tpl_vars['user']['map_size'] == 17): ?>selected="selected"<?php endif; ?>>Gigante</option>
	</select></td></tr>
	<tr><td>Tamanho do minimapa:</td><td><select name="minimap_size">
		<option label="Pequeno" value="235" <?php if($show_1['minimap_size']=='235'){ ?>selected="selected"<?php } ?>>Pequeno</option>
		<option label="M&eacute;dio" value="275" <?php if($show_1['minimap_size']=='275'){ ?>selected="selected"<?php } ?>>M&eacute;dio</option>
		<option label="Grande" value="325" <?php if($show_1['minimap_size']=='325'){ ?>selected="selected"<?php } ?>>Grande</option>
	</select></td></tr>
	<tr><td>Informa&ccedil;&otilde;es da conta:</td><td><input type="checkbox" name="show_info_acc" <?php if($show_1['info_acc_show']== '1'){echo 'checked';} ?> /> Marque para exibir as informa&ccedil;&otilde;es da sua conta.</td></tr>
	<tr><td>An&uacute;ncios:</td><td><input type="checkbox" name="show_announcements" <?php if($show_1['show_announcements'] == 1){echo 'checked';} ?> /> Marque para mostrar os an&uacute;ncios.</td></tr>
	<tr><td>Confirmar custos:</td><td><input type="checkbox" name="confirm_queue" <?php if ($this->_tpl_vars['user']['confirm_queue'] == 1): ?>checked<?php endif; ?> />  Confirmar custos adicionais nas constru&ccedil;&otilde;es.</td></tr>
	<tr><th colspan="2"><div align="right"><input type="submit" value="Ok" class="button" /></div></th></tr>
</table>
</form>