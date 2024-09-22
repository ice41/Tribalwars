<?php /* Smarty version 2.6.14, created on 2012-03-18 18:25:19
         compiled from game_ulubione.tpl */ ?>
<h3>Ulubione</h3>

<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<font class="error"><?php echo $this->_tpl_vars['error']; ?>
</font>
<?php endif; ?>

<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=ulubione&action=dodaj_do_ulub&h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="POST"/>
	<table class="vis">
		<tr>
			<th colspan="2">Dodaæ wioskê</th>
		</tr>
		<tr>
			<td>x: <input type="text" name="x" value="" size="5" /></td>
			<td>y: <input type="text" name="y" value="" size="5" /></td>
		</tr>
	</table>
	<input type="submit" name="sub" value="Dodaj"/>
</form>

<br>

<?php if (count ( $this->_tpl_vars['ulubione'] ) > 0): ?>
	<table class="vis">
		<tr>
			<th width="300">Nazwa wioski</th>
			<th></th>
		</tr>
		<?php $_from = $this->_tpl_vars['ulubione']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['village_id'] => $this->_tpl_vars['click_link']):
?>
			<tr>
				<td>
					<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_village&id=<?php echo $this->_tpl_vars['village_id']; ?>
"/>
						<?php echo $this->_tpl_vars['click_link']; ?>

					</a>
				</td>
				<td>
					<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=ulubione&action=usun_ulub&id=<?php echo $this->_tpl_vars['village_id']; ?>
&h=<?php echo $this->_tpl_vars['hkey']; ?>
"/>
						<img src="graphic/delete.png" alt="usuñ"/>
					</a>
				</td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>
<?php endif; ?>