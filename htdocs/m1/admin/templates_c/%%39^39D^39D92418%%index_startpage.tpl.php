<?php /* Smarty version 2.6.14, created on 2012-11-14 12:01:49
         compiled from index_startpage.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'index_startpage.tpl', 4, false),)), $this); ?>
<h2>Pagina de start </h2>

<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<font class="error"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['error'])) ? $this->_run_mod_handler('replace', true, $_tmp, "Kein Text eingetragen.", "Trebuie sa contina un text.") : smarty_modifier_replace($_tmp, "Kein Text eingetragen.", "Trebuie sa contina un text.")))) ? $this->_run_mod_handler('replace', true, $_tmp, "Keine Grafik ausgewählt.", "Trebuie sa aibe si o poza.") : smarty_modifier_replace($_tmp, "Keine Grafik ausgewählt.", "Trebuie sa aibe si o poza.")); ?>
</font><br /><br />
<?php endif; ?>

<form method="POST" action="index.php?screen=startpage&action=add" onSubmit="this.submit.disabled=true;">
	<table class="vis" width="450">
		<tr>
			<th colspan="2">Adauga anunt pe prima pagina</th>
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
			<td>Poza:</td>
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
			<td align="right" colspan="2"><input type="submit" name="submit" value="Adauga"></td>
		</tr>
	</table>
</form>
<table class="vis" width="450">
	<tr>
		<th colspan="3">Anunturi introduse pe prima pagina</th>
	</tr>
	<?php $_from = $this->_tpl_vars['announcement']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['f_id'] => $this->_tpl_vars['item']):
?>
		<tr>
			<td width="8%"><img src="../graphic/minibutton/<?php echo $this->_tpl_vars['announcement'][$this->_tpl_vars['f_id']]['graphic']; ?>
.png"></td>
			<td width="70%">
<?php echo $this->_tpl_vars['announcement'][$this->_tpl_vars['f_id']]['text']; ?>
<br />
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<?php if (! empty ( $this->_tpl_vars['announcement'][$this->_tpl_vars['f_id']]['link'] )): ?>
							<td align="left" style="font-size: xx-small;"><a href="<?php echo $this->_tpl_vars['announcement'][$this->_tpl_vars['f_id']]['link']; ?>
">&raquo; mai multe detalii</a></td>
						<?php endif; ?>
						<td align="right" style="font-size: xx-small;"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['announcement'][$this->_tpl_vars['f_id']]['time'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'heute um', 'astazi la') : smarty_modifier_replace($_tmp, 'heute um', 'astazi la')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Uhr', "") : smarty_modifier_replace($_tmp, 'Uhr', "")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'am', 'pe') : smarty_modifier_replace($_tmp, 'am', 'pe')))) ? $this->_run_mod_handler('replace', true, $_tmp, ' um', ".2010 la ora") : smarty_modifier_replace($_tmp, ' um', ".2010 la ora")); ?>
</td>
					</tr>
				</table>
			</td>
		  <td width="22%"><a href="index.php?screen=startpage&action=drop&id=<?php echo $this->_tpl_vars['announcement'][$this->_tpl_vars['f_id']]['id']; ?>
">Sterge anuntu</td>
  </tr>
	<?php endforeach; endif; unset($_from); ?>
</table>
<br /><br />