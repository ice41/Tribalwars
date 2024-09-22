<?php /* Smarty version 2.6.14, created on 2010-12-17 10:27:50
         compiled from index_startpage.tpl */ ?>
<h2>Pagina principala</h2>

<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<font class="error"><?php echo $this->_tpl_vars['error']; ?>
</font><br /><br />
<?php endif; ?>

<form method="POST" action="index.php?screen=startpage&action=add" onSubmit="this.submit.disabled=true;">
	<table class="vis" width="450">
		<tr>
			<th colspan="2">Adauga anunt</th>
		</tr>
		<tr>
			<td width="50">Text:</td>
			<td><textarea cols="45" rows="3" name="text"></textarea></td>
		</tr>
		<tr>
			<td>Link:</td>
			<td><input type="text" name="link" size="70"></td>
		</tr>
		<tr>
			<td>Grafik:</td>
			<td>
				<table cellspacing="0">
					<tr>
						<td>
							<input type="radio" name="graphic" value="global">
						</td>
						<td width="50">
							<img src="../graphic/minibutton/global.png">
						</td>
						
						<td width="20">
							<input type="radio" name="graphic" value="sds">
						</td>
						<td width="50">
							<img src="../graphic/minibutton/sds.png">
						</td>
					
						<td width="20">
							<input type="radio" name="graphic" value="usds">
						</td>
						<td width="50">
							<img src="../graphic/minibutton/usds.png">
						</td>
						
						<td width="20">
							<input type="radio" name="graphic" value="w1">
						</td>
						<td width="50">
							<img src="../graphic/minibutton/w1.png">
						</td>
						
						<td width="20">
							<input type="radio" name="graphic" value="m1">
						</td>
						<td width="50">
							<img src="../graphic/minibutton/m1.png">
						</td>
					</tr>
				</table>
			</td>	
		</tr>
		<tr>
			<td align="right" colspan="2"><input type="submit" name="submit" value="Adauga anuntul"></td>
		</tr>
	</table>
</form>
<br />
<table class="vis" width="450">
	<tr>
		<th colspan="2">Anunturi salvate deja</th>
	</tr>
	<?php $_from = $this->_tpl_vars['announcement']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['f_id'] => $this->_tpl_vars['item']):
?>
		<tr>
			<td><img src="../graphic/minibutton/<?php echo $this->_tpl_vars['announcement'][$this->_tpl_vars['f_id']]['graphic']; ?>
.png"></td>
			<td width="100%">
				<?php echo $this->_tpl_vars['announcement'][$this->_tpl_vars['f_id']]['text']; ?>
<br />
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<?php if (! empty ( $this->_tpl_vars['announcement'][$this->_tpl_vars['f_id']]['link'] )): ?>
							<td align="left" style="font-size: xx-small;"><a href="<?php echo $this->_tpl_vars['announcement'][$this->_tpl_vars['f_id']]['link']; ?>
">&raquo; mehr</a></td>
						<?php endif; ?>
						<td align="right" style="font-size: xx-small;"><?php echo $this->_tpl_vars['announcement'][$this->_tpl_vars['f_id']]['time']; ?>
</td>
					</tr>
				</table>
			</td>
			<td><a href="index.php?screen=startpage&action=drop&id=<?php echo $this->_tpl_vars['announcement'][$this->_tpl_vars['f_id']]['id']; ?>
">Sterge</td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>
<br /><br />
<form method="POST" action="index.php?screen=startpage&action=locked_login">
<table class="vis">
	<tr>
		<th colspan="2">Blocheaza login</th>
	</tr>
	<tr>
		<td>Blocheaza login pe server?</td>
		<td><input type="radio" name="login_locked" value="yes" <?php if ($this->_tpl_vars['login']['login_locked'] == 'yes'): ?>checked<?php endif; ?>> Da<br /><input type="radio" name="login_locked" value="no" <?php if ($this->_tpl_vars['login']['login_locked'] == 'no'): ?>checked<?php endif; ?>> Nu</td>
	</tr>
	<tr>
		<td align="right" colspan="2"><input type="submit" value="OK"></td>
	</tr>
</table>
</form>