<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2024-09-23 01:04:15
         Wersja PHP pliku pliki_tpl/game_overview_villages_incomings.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_time', 'game_overview_villages_incomings.tpl', 24, false),)), $this); ?>
<?php if ($this->_tpl_vars['sekcja_rozkazy']): ?>
	<table class="vis">
		<tr>
			<td>
				<?php echo $this->_tpl_vars['sekcja_rozkazy_content']; ?>
 
			</td>
		</tr>
	</table>
<?php endif; ?>
<?php if (count ( $this->_tpl_vars['other_movements'] ) > 0): ?>
<table class="vis">
<tr><th>Ordem</th><th>Objetivo</th><th>Origem</th><th>No local</th><th>No local às</th>
</tr>
	<?php $_from = $this->_tpl_vars['other_movements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['array']):
?>
		<tr<?php if ($this->_tpl_vars['array']['parzysta_liczba']): ?> class="row_b"<?php else: ?> class="row_a"<?php endif; ?>>
		<td>
		
		<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_command&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;type=other"><?php echo $this->_tpl_vars['array']['message']; ?>
</a>
		
		</td>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['array']['to_village']; ?>
&ampscreen=overview"><?php echo $this->_tpl_vars['array']['to_villagename']; ?>
</a></td>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['array']['send_from_user']; ?>
"><?php echo $this->_tpl_vars['array']['send_from_username']; ?>
</a></td>
		<td><?php echo $this->_tpl_vars['pl']->format_date($this->_tpl_vars['array']['end_time']); ?>
</td>
		<td><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>
<?php else: ?>
<br>
Ninguém está enviando tropas para si no momento.
<?php endif; ?>