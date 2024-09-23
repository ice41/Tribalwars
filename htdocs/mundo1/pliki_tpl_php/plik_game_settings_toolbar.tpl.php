<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2024-09-23 02:17:54
         Wersja PHP pliku pliki_tpl/game_settings_toolbar.tpl */ ?>
<h3>Editar barra de Atalhos</h3>
<p>Ao digitar [akuvillage] no campo de endereço da nova barra de ferramentas, exibe o id da aldeia atual.</p>

<table class="vis">
	<tr>
		<th>Título</th>
		<th>Foto</th>
		<th>Link</th>
		<th>Compartilhar</th>
	</tr>
	<?php $_from = $this->_tpl_vars['toolbar_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['tool_info']):
?>
		<tr>
			<td><span class="link"><?php echo $this->_tpl_vars['tool_info']['nazwa']; ?>
</span></td>
			<td><img src="<?php echo $this->_tpl_vars['tool_info']['obrazek']; ?>
" alt="ERR" title="<?php echo $this->_tpl_vars['tool_info']['nazwa']; ?>
" style="width: 16px;height: 16px;"/></td>
			<td><a href="<?php echo $this->_tpl_vars['tool_info']['link']; ?>
"/><?php echo $this->_tpl_vars['tool_info']['link']; ?>
</a></td>
			<td>
				<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=settings&mode=toolbar&action=del_tool&id=<?php echo $this->_tpl_vars['tid']; ?>
&h=<?php echo $this->_tpl_vars['hkey']; ?>
"/><img src="/ds_graphic/delete.png" alt="excluir" title="excluir"/></a>&nbsp;
				<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=settings&mode=toolbar&action=replace_down&id=<?php echo $this->_tpl_vars['tid']; ?>
&h=<?php echo $this->_tpl_vars['hkey']; ?>
"/><img src="/ds_graphic/overview/down.png" alt="Deslize para baixo" title="Deslize para baixo"/></a>&nbsp;
				<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=settings&mode=toolbar&action=replace_up&id=<?php echo $this->_tpl_vars['tid']; ?>
&h=<?php echo $this->_tpl_vars['hkey']; ?>
"/><img src="/ds_graphic/overview/up.png" alt="Deslize para cima" title="Deslize para cima"/></a>&nbsp;
			</td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>
<br>
<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=settings&mode=toolbar&action=reset_toolbar&h=<?php echo $this->_tpl_vars['hkey']; ?>
"/>
	Redefinir a barra de atalhos
</a>
<br><br>

<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=settings&mode=toolbar&action=add_tolbar&h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="POST">
	<table class="vis">
		<tr>
			<th colspan="2">
				Adicionar uma nova barra de atalhos
			</th>
		</tr>
		<tr>
			<td>
				Nome:
			</td>
			<td>
				<input type="text" name="name" value="" style="width: 300px;"/>
			</td>
		</tr>
		<tr>
			<td>
				Link para a imagem:
			</td>
			<td>
				<input type="text" name="img_link" value="" style="width: 300px;"/>
			</td>
		</tr>
		<tr>
			<td>
				Link:
			</td>
			<td>
				<input type="text" name="link" value="" style="width: 300px;"/>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="sub" value="Adicionar"/>
			</td>
		</tr>
	</table>
</form>