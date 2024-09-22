<?php /* Smarty version 2.6.14, created on 2016-08-26 20:49:50
         compiled from game_settings_toolbar.tpl */ ?>
<h3>Edytuj pasek narzêdzi</h3><p>Wpisuj¹c w pole adresu nowego paska narzêdzi [akuvillage] wyœwietlasz id aktualnej wioski.</p><table class="vis">	<tr>		<th>Tytu³</th>		<th>Obrazek</th>		<th>Link</th>		<th>Akcja</th>	</tr>	<?php $_from = $this->_tpl_vars['toolbar_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['tool_info']):
?>		<tr>			<td><span class="link"><?php echo $this->_tpl_vars['tool_info']['nazwa']; ?>
</span></td>			<td><img src="<?php echo $this->_tpl_vars['tool_info']['obrazek']; ?>
" alt="ERR" title="<?php echo $this->_tpl_vars['tool_info']['nazwa']; ?>
" style="width: 16px;height: 16px;"/></td>			<td><a href="<?php echo $this->_tpl_vars['tool_info']['link']; ?>
"/><?php echo $this->_tpl_vars['tool_info']['link']; ?>
</a></td>			<td>				<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=settings&mode=toolbar&action=del_tool&id=<?php echo $this->_tpl_vars['tid']; ?>
&h=<?php echo $this->_tpl_vars['hkey']; ?>
"/><img src="/ds_graphic/delete.png" alt="usuñ" title="usuñ"/></a>&nbsp;				<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=settings&mode=toolbar&action=replace_down&id=<?php echo $this->_tpl_vars['tid']; ?>
&h=<?php echo $this->_tpl_vars['hkey']; ?>
"/><img src="/ds_graphic/overview/down.png" alt="Przesuñ w dó³" title="Przesuñ w dó³"/></a>&nbsp;				<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=settings&mode=toolbar&action=replace_up&id=<?php echo $this->_tpl_vars['tid']; ?>
&h=<?php echo $this->_tpl_vars['hkey']; ?>
"/><img src="/ds_graphic/overview/up.png" alt="Przesuñ w górê" title="Przesuñ w górê"/></a>&nbsp;			</td>		</tr>	<?php endforeach; endif; unset($_from); ?></table><br><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=settings&mode=toolbar&action=reset_toolbar&h=<?php echo $this->_tpl_vars['hkey']; ?>
"/>	» Zresetuj pasek narzêdzi</a><br><br><form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=settings&mode=toolbar&action=add_tolbar&h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="POST">	<table class="vis">		<tr>			<th colspan="2">				Dodaj nowy pasek narzêdzi			</th>		</tr>		<tr>			<td>				Nazwa:			</td>			<td>				<input type="text" name="name" value="" style="width: 300px;"/>			</td>		</tr>		<tr>			<td>				Link do obrazka:			</td>			<td>				<input type="text" name="img_link" value="" style="width: 300px;"/>			</td>		</tr>		<tr>			<td>				Link:			</td>			<td>				<input type="text" name="link" value="" style="width: 300px;"/>			</td>		</tr>		<tr>			<td colspan="2">				<input type="submit" name="sub" value="Dodaj"/>			</td>		</tr>	</table></form>