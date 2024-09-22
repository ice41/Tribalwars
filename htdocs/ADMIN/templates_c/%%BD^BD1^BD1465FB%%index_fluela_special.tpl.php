<?php /* Smarty version 2.6.14, created on 2016-12-23 20:08:36
         compiled from index_fluela_special.tpl */ ?>
<h2>Sate parasite surpriza</h2>

<a href="index.php?screen=fluela_special" />Creati sate parasite</a> - <a href="index.php?screen=fluela_special&action=editmes" />Editati sate parasite</a>
<br /><br />
<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<font class="error"><?php echo $this->_tpl_vars['error']; ?>
</font><br /><br />
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['new_version'] )): ?>
	<?php echo $this->_tpl_vars['new_version']; ?>
<br /><br />
<?php else: ?>
<?php if ($this->_tpl_vars['aktion'] == 'create'): ?>
<?php if ($this->_tpl_vars['success']): ?>
	Fl&uuml;chtlingslager wurden erfolgreich erstellt/bearbeitet!
<?php else: ?>
	<form method="POST" action="index.php?screen=fluela_special&action=creater" name="dorf" onSubmit="this.submit.disabled=true;">
		<table class="vis">
			<tr>
				<th colspan="2">Creati sate parasite</th>
			</tr>
			<tr>
				<td width="350">Cate sate parasite doriti sa creati?<br />(maxim 250)</td>
				<td><input type="text" name="num" value="0"></td>
			</tr>
			<tr><td>
			<table class="vis">
				<tr>
				<td>
				<table class="vis">
					<tr>
					<th>Cladire</th><th>Nivel</th>
					</tr>
					<?php $_from = $this->_tpl_vars['buildings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['arr']):
?>
						<tr>
							<td><img src="../graphic/buildings/<?php echo $this->_tpl_vars['dbname']; ?>
.png"> <?php echo $this->_tpl_vars['arr']['name']; ?>
:</td>
							<td><input type="text" size="4" name="<?php echo $this->_tpl_vars['dbname']; ?>
" value="<?php echo $this->_tpl_vars['arr']['std_lvl']; ?>
"></td>
						</tr>
					<?php endforeach; endif; unset($_from); ?>
				</table>
			</table>
			</td><td valign="top"><table class="vis" valign="top">
		<tr>
		<th>Unitate</th><th>Numar</th>
		</tr>
		<?php $_from = $this->_tpl_vars['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['arr']):
?>
			<tr>
				<td><img src="../graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png"> <?php echo $this->_tpl_vars['arr']['name']; ?>
:</td>
				<td><input type="text" size="5" name="<?php echo $this->_tpl_vars['dbname']; ?>
" value="<?php echo $this->_tpl_vars['arr']['std_einheiten']; ?>
"></td>
			</tr>
		<?php endforeach; endif; unset($_from); ?></table>
		</td></tr>
		<tr>
		<td colspan="2"><b>Alte optiuni:</b> <input type="checkbox" name="barbar" id="aX_barbar" value="yes" onChange="barbarendorf()"/><label for="aX_barbar">Sat parasit</label></td>
		</tr>
			<tr>
				<td colspan="2"><input type="hidden" name="welche_akt" value="Creati" /><input type="submit" name="submit" value="Creati" onload="this.disabled=false;"> Procesul <u>poate</u> cateva secunde!</td>
			</tr>

		</table>
	</form>
	<script type="text/javascript" src="templates/fluela_special.js"></script>
<?php endif; ?>
<?php elseif ($this->_tpl_vars['edit_output'] != ""): ?>
<?php echo $this->_tpl_vars['edit_output']; ?>

<?php elseif ($this->_tpl_vars['aktion'] == 'edit'): ?>
<form method="POST" action="index.php?screen=fluela_special&action=creater" onSubmit="this.submit.disabled=true;">
		<table class="vis">
			<tr>
				<th colspan="2">Sat parasit #<?php echo $this->_tpl_vars['id']; ?>
 editati</th>
			</tr>
			<tr>
				<td colspan="2"><b>ID:</b> #<?php echo $this->_tpl_vars['id']; ?>
<br /><b>Koordinaten:</b> <?php echo $this->_tpl_vars['xy']; ?>
<br /><b>Punkte:</b> <?php echo $this->_tpl_vars['points']; ?>
</td>
			</tr>
						<tr><td>
			<table class="vis">
				<tr>
				<td>
				<table class="vis">
					<tr>
					<th>Geb&auml;ude</th><th>Stufe</th>
					</tr>
					<?php $_from = $this->_tpl_vars['buildings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['arr']):
?>
						<tr>
							<td><img src="../graphic/buildings/<?php echo $this->_tpl_vars['dbname']; ?>
.png"> <?php echo $this->_tpl_vars['arr']['name']; ?>
:</td>
							<td><input type="text" size="4" name="<?php echo $this->_tpl_vars['dbname']; ?>
" value="<?php echo $this->_tpl_vars['arr']['std_lvl']; ?>
"></td>
						</tr>
					<?php endforeach; endif; unset($_from); ?>
				</table>
			</table>
			</td><td valign="top"><table class="vis" valign="top">
		<tr>
		<th>Einheit</th><th>Anzahl</th>
		</tr>
		<?php $_from = $this->_tpl_vars['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['arr']):
?>
			<tr>
				<td><img src="../graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png"> <?php echo $this->_tpl_vars['arr']['name']; ?>
:</td>
				<td><input type="text" size="5" name="<?php echo $this->_tpl_vars['dbname']; ?>
" value="<?php echo $this->_tpl_vars['arr']['std_einheiten']; ?>
"></td>
			</tr>
		<?php endforeach; endif; unset($_from); ?></table>
		</td></tr>
		<tr>
		<td colspan="2"><b>Sonstige Optionen:</b> <input type="checkbox" name="barbar" id="aX_barbar" value="yes" onChange="barbarendorf()"/><label for="aX_barbar">Barbarendorf</label></td>
		</tr>
			<tr>
				<td colspan="2"><input type="hidden" name="vid" value="<?php echo $this->_tpl_vars['id']; ?>
" /><input type="hidden" name="welche_akt" value="Bearbeiten" /><input type="submit" name="submit" value="Bearbeiten" onload="this.disabled=false;"></td>
			</tr>

		</table>
	</form>
	<script type="text/javascript" src="templates/fluela_special.js"></script>
	<script type="text/javascript"><?php echo $this->_tpl_vars['dowhattodo']; ?>
</script>
<?php endif; ?>
<?php endif; ?>