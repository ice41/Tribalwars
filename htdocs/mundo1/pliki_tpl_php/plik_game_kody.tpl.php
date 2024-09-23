<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2024-09-23 01:40:28
         Wersja PHP pliku pliki_tpl/game_kody.tpl */ ?>
<?php if ($this->_tpl_vars['premium']): ?>

<h2>Premium (<?php echo $this->_tpl_vars['ilosc_sz']; ?>
 Pontos premium)</h2>

<h2 class="error"><?php echo $this->_tpl_vars['error']; ?>
</h2>
<?php if ($this->_tpl_vars['mode'] == kody): ?>
<?php if ($this->_tpl_vars['event_p']): ?><h1><font color="green">Promoção - Compre 2x mais premium!</font></h1><?php endif; ?>
<p>Os codigos podem ser usados ​​em qualquer mundo para qualquer conta - eles permitem recursos adicionais para o jogador!</p>

<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=kody&akcja=kod" method="post">
	<table class="vis">
	<tbody><tr>
		<th>Activar codigo:</th>
		<td><input name="kod" maxlength="12" style="width: 120px" type="text"> <input value="OK" type="submit"></td>
	</tr>
    </tbody></table>
</form>
<p><p><h2>Entrar com contacto com o suporte para saber como adquirir o codigo:</h2>
	<table class="vis">
	<tbody><tr>
		<th>Numero<th>Conteúdo<th>Preço<th>Prêmio recebido<th><font color="red">Códigos existentes</font></th>
		<tr><td>50 <td>Moedas<td><?php echo $this->_tpl_vars['kod']['1']['zl']; ?>
 €<td>50 PP<?php if ($this->_tpl_vars['event_p']): ?><font color="green"><b>+ 50</b></font><?php endif; ?><td><b><center><font color="<?php if ($this->_tpl_vars['kodb']['1'] <= 10): ?>red<?php else: ?>green<?php endif; ?>"><?php echo $this->_tpl_vars['kodb']['1']; ?>
</font></td>
		<tr><td>150 <td>Moedas<td><?php echo $this->_tpl_vars['kod']['2']['zl']; ?>
 €<td>150 PP<?php if ($this->_tpl_vars['event_p']): ?><font color="green"><b>+ 150</b></font><?php endif; ?><td><b><center><font color="<?php if ($this->_tpl_vars['kodb']['2'] <= 10): ?>red<?php else: ?>green<?php endif; ?>"><?php echo $this->_tpl_vars['kodb']['2']; ?>
</font></td>
		<tr><td>300 <td>Moedas<td><?php echo $this->_tpl_vars['kod']['3']['zl']; ?>
 €<td>300 PP<?php if ($this->_tpl_vars['event_p']): ?><font color="green"><b>+ 300</b></font><?php endif; ?><td><b><center><font color="<?php if ($this->_tpl_vars['kodb']['3'] <= 10): ?>red<?php else: ?>green<?php endif; ?>"><?php echo $this->_tpl_vars['kodb']['3']; ?>
</font></td>
		<!--<tr><td>1000 <td>Moedas<td><?php echo $this->_tpl_vars['kod']['4']['zl']; ?>
 €<td>1000 PP<?php if ($this->_tpl_vars['event_p']): ?><font color="green"><b>+ 1000</b></font><?php endif; ?><td><b><center><font color="<?php if ($this->_tpl_vars['kodb']['3'] <= 10): ?>red<?php else: ?>green<?php endif; ?>"><?php echo $this->_tpl_vars['kodb']['3']; ?>
</font></td>-->
	</tr>
	<tr><td colspan="5">O codigo tambem pode ser obtido em concursos organizados pelos Admin!
    </tbody></table>
<?php elseif ($this->_tpl_vars['mode'] == przeslij): ?>
<h3>Envio de pontos premium</h3>


<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;mode=przeslij&amp;screen=kody&akcja=przeslij" method="post">
<table class="vis">
<tbody>
<tr><td>Enviar para:</td><td>
<input name="name" value="" type="text">
</td></tr>
<tr><td>Pontos premium:</td><td>
<input name="points" value="" type="text">
</td></tr>
</tbody></table>
<input class="btn" value="Próximo" type="submit">
</form>

<br>
<?php elseif ($this->_tpl_vars['mode'] == dodaj && $this->_tpl_vars['user']['admin'] == 0): ?>

<?php endif; ?>
	
	<?php endif; ?>