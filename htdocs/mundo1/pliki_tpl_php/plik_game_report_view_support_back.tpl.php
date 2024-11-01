<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2023-02-26 21:23:22
         Wersja PHP pliku pliki_tpl/game_report_view_support_back.tpl */ ?>
<table width="100%" class="vis"> 
	<tr>
		<th>Proprietário do suporte:</th>
		<th>
			<?php if (! empty ( $this->_tpl_vars['support_owner']['username'] )): ?>
				<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['support_owner']['uid']; ?>
"><?php echo $this->_tpl_vars['support_owner']['username']; ?>
</a>
			<?php else: ?>
				<b>Não existe</b>
			<?php endif; ?>
		</th>
	</tr> 
	<tr>
		<td>Aldeia:</td>
		<td>
			<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['support_owner']['vid']; ?>
"><?php echo $this->_tpl_vars['support_owner']['villagename']; ?>
 (<?php echo $this->_tpl_vars['support_owner']['x']; ?>
|<?php echo $this->_tpl_vars['support_owner']['y']; ?>
) K<?php echo $this->_tpl_vars['support_owner']['continent']; ?>
</a>
		</td>
	</tr> 
	<tr>
		<th>Jogador apoiado:</th>
		<th>
			<?php if (! empty ( $this->_tpl_vars['support_target']['username'] )): ?>
				<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['support_target']['uid']; ?>
"><?php echo $this->_tpl_vars['support_target']['username']; ?>
</a>
			<?php else: ?>
				<b>Não existe</b>
			<?php endif; ?>
		</th>
	</tr> 
	<tr>
		<td>Aldeia:</td>
		<td>
			<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['support_target']['vid']; ?>
"><?php echo $this->_tpl_vars['support_target']['villagename']; ?>
 (<?php echo $this->_tpl_vars['support_target']['x']; ?>
|<?php echo $this->_tpl_vars['support_target']['y']; ?>
) K<?php echo $this->_tpl_vars['support_target']['continent']; ?>
</a>
		</td>
	</tr> 
</table>

<h4>Unidades:</h4> 
<table class="vis"> 
	<tr> 
	    <?php $_from = $this->_tpl_vars['cl_units']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
			<th width="35"><img src="/ds_graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" alt="" /></th>
		<?php endforeach; endif; unset($_from); ?>
	</tr> 
	<tr> 
		<?php $_from = $this->_tpl_vars['support_units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num_units']):
?>
			<?php if ($this->_tpl_vars['num_units'] > 0): ?>
				<td><?php echo $this->_tpl_vars['num_units']; ?>
</td>
			<?php else: ?>
				<td class="hidden">0</td>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
	</tr> 
</table>