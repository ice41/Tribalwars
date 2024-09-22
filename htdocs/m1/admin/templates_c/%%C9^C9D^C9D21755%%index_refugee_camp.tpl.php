<?php /* Smarty version 2.6.14, created on 2012-11-14 12:01:52
         compiled from index_refugee_camp.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'index_refugee_camp.tpl', 4, false),)), $this); ?>
<h2>Sate parasite</h2>

<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<font class="error"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['error'])) ? $this->_run_mod_handler('replace', true, $_tmp, "Die Anzahl der zu erstellende Flüchtlingslager muss größer als 0 sein!", "Maximul de sate care poate fi adaugat este 250 si minimul este 1!") : smarty_modifier_replace($_tmp, "Die Anzahl der zu erstellende Flüchtlingslager muss größer als 0 sein!", "Maximul de sate care poate fi adaugat este 250 si minimul este 1!")))) ? $this->_run_mod_handler('replace', true, $_tmp, "Die Anzahl der zu erstellende Flüchtlingslager muss kleiner als 250 sein!", "Maximul de sate care poate fi adaugat este 250 si minimul este 1!") : smarty_modifier_replace($_tmp, "Die Anzahl der zu erstellende Flüchtlingslager muss kleiner als 250 sein!", "Maximul de sate care poate fi adaugat este 250 si minimul este 1!")))) ? $this->_run_mod_handler('replace', true, $_tmp, "Die Anzahl muss aus einer Zahl bestehen. (keine Kommastellen!)", "Trebuie sa introduceti cifre nu litere!") : smarty_modifier_replace($_tmp, "Die Anzahl muss aus einer Zahl bestehen. (keine Kommastellen!)", "Trebuie sa introduceti cifre nu litere!")); ?>
</font><br /><br />
<?php endif; ?>
<?php if ($this->_tpl_vars['success']): ?>
	Satele parasite au fost adaugate cu succes!
<?php else: ?>
	<form method="post" action="index.php?screen=refugee_camp&amp;action=create" onSubmit="this.submit.disabled=true;">
		<table class="vis">
			<tr>
				<th colspan="2">Baga sate parasite</th>
			</tr>
			<tr>
				<td width="350">Cate sate parasite doriti sa bagati?(maxim 250)</td>
				<td><input type="text" name="num" value="0"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Baga sate parasite" onload="this.disabled=false;"></td>
			</tr>

		</table>
	</form>
<?php endif; ?>
<br />
<h2>Cate sate sunt</h2>
<?php if ($this->_tpl_vars['deleteSuccess'] != ''): ?>
<font class="error"><?php echo $this->_tpl_vars['deleteSuccess']; ?>
</font>
<?php endif; ?>
<?php if ($this->_tpl_vars['fluela'] == 0): ?>Satele parasite au fost sterse cu succes!<?php else: ?>
<form method="post" action="index.php?screen=refugee_camp&action=delete" onSubmit="this.submit.disabled=true;">
    <table width="419" class="vis">
      <tr>
        <th colspan="2">Cate sate sunt:</th>
      </tr>
      <tr>
        <td width="248">Sunt</td>
        <td width="159"><b><?php echo $this->_tpl_vars['fluela']; ?>
 </b>sate parasite</td>
      </tr>
      <tr>
        <td width="248">Bifeaza ca sa stergi toate satele parasite:</td>
        <td width="159"><input type="checkbox" name="confirm" value="confirm"></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="Sterge"</td>
      </tr>
    </table>
</form>
<?php endif; ?>