<?php /* Smarty version 2.6.14, created on 2014-07-06 22:48:23
         compiled from game_ally_in_ally_kontrakty.tpl */ ?>
<p>
	Nesta p�gina pode gerenciar rela��es diplom�ticas com outras tribos. Configura��es<strong> n�o est�o em vigor, o que s�o, na pr�tica</strong>, aldeias s�o retratados em cores diferentes para distinguir �press�o. Essas rela��es s�o vis�veis apenas para os membros da tribo e pode ser alterado voc� s�o as �nicas pessoas em que os direitos relevantes na tribo.
</p>
<?php if (! empty ( $this->_tpl_vars['err'] )): ?>
	<font class="error"/><?php echo $this->_tpl_vars['err']; ?>
</font>
<?php endif; ?>
<table id="partners" class="vis" width="100%">
	<tbody>
		<tr>
			<th colspan="2">Aliados</th>
		</tr>
			
		<?php $_from = $this->_tpl_vars['kontrakty']['partner']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['kontrakt']):
?>
			<tr>
				<td>
					<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_ally&amp;id=<?php echo $this->_tpl_vars['kontrakt']['do_plemienia']; ?>
"><?php echo $this->_tpl_vars['kontrakt']['do_plemienia_tag']; ?>
</a>
				</td>
				<?php if ($this->_tpl_vars['dyplomata']): ?>
					<td>
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=kontrakty&amp;action=cancel_contract&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
&amp;id=<?php echo $this->_tpl_vars['kontrakt']['id']; ?>
">fora a final</a>
					</td>
				<?php endif; ?>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
		
		<tr>
			<td colspan="2" style="background: transparent none repeat scroll 0%; height: 12px;"></td>
		</tr>

		<tr>
			<th colspan="2">Pactos de n�o-agress�o</th>
		</tr>
		
		<?php $_from = $this->_tpl_vars['kontrakty']['nap']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['kontrakt']):
?>
			<tr>
				<td>
					<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_ally&amp;id=<?php echo $this->_tpl_vars['kontrakt']['do_plemienia']; ?>
"><?php echo $this->_tpl_vars['kontrakt']['do_plemienia_tag']; ?>
</a>
				</td>
				<?php if ($this->_tpl_vars['dyplomata']): ?>
					<td>
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=kontrakty&amp;action=cancel_contract&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
&amp;id=<?php echo $this->_tpl_vars['kontrakt']['id']; ?>
">fora a final</a>
					</td>
				<?php endif; ?>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
		
		<tr>
			<td colspan="2" style="background: transparent none repeat scroll 0%; height: 12px;"></td>
		</tr>
		
		<tr>
			<th colspan="2">Inimigos</th>
		</tr>
		
		<?php $_from = $this->_tpl_vars['kontrakty']['enemy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['kontrakt']):
?>
			<tr>
				<td>
					<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_ally&amp;id=<?php echo $this->_tpl_vars['kontrakt']['do_plemienia']; ?>
"><?php echo $this->_tpl_vars['kontrakt']['do_plemienia_tag']; ?>
</a>
				</td>
				<?php if ($this->_tpl_vars['dyplomata']): ?>
					<td>
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=kontrakty&amp;action=cancel_contract&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
&amp;id=<?php echo $this->_tpl_vars['kontrakt']['id']; ?>
">zako�cz</a>
					</td>
				<?php endif; ?>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
	</tbody>
</table>
<?php if ($this->_tpl_vars['dyplomata']): ?>
	<br style="clear: both;">
	<h3>Adicionar Rela��o com uma tribo</h3>
	<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=kontrakty&amp;action=add_contract&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
		<label for="tag">Abreviatura da Tribo:</label> 
		<input name="tag" type="text">
		<select name="type">
			<option value="partner">Aliado</option>
			<option value="nap">Pacto de n�o-agress�o</option>

			<option value="enemy">Inimigo</option>
		</select>
		<input value="OK" type="submit">
	</form>
<?php endif; ?>