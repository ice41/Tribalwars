<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2023-02-26 21:19:58
         Wersja PHP pliku pliki_tpl/game_report.tpl */ ?>
<h2>Raporty</h2>
<?php 
$this->_tpl_vars['pl_trans'] = array("all" => "Todas os relatórios","attack" => "Ataques","defense" => "Defesa","support" => "Apoio","trade" => "Trocas","other" => "Outro");
 ?>
<table>
	<tr>
		<td valign="top">
			<table class="vis" width="75">
				<?php $_from = $this->_tpl_vars['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['f_name'] => $this->_tpl_vars['f_mode']):
?>
					<?php if ($this->_tpl_vars['f_mode'] == $this->_tpl_vars['mode']): ?>
						<tr>
							<td class="selected" width="120">
								<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php echo $this->_tpl_vars['pl_trans'][$this->_tpl_vars['f_mode']]; ?>
</a>
							</td>
						</tr>
					<?php else: ?>
		                <tr>
		                    <td width="120">
								<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php echo $this->_tpl_vars['pl_trans'][$this->_tpl_vars['f_mode']]; ?>
</a>
							</td>
						</tr>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			</table>
		</td>
		<td valign="top" width="100%">
			
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_report_".($this->_tpl_vars['do']).".tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</td>
	</tr>
</table>