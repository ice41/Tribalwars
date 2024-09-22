{if $premium}

<h2>Premium ({$ilosc_sz} Pontos premium)</h2>

<h2 class="error">{$error}</h2>
{if $mode == kody}
{if $event_p}<h1><font color="green">Promoção - Compre 2x mais premium!</font></h1>{/if}
<p>Os codigos podem ser usados ​​em qualquer mundo para qualquer conta - eles permitem recursos adicionais para o jogador!</p>

<form action="game.php?village={$village.id}&screen=kody&akcja=kod" method="post">
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
		<th>Conteúdo<th>Numero<th>Despesa<th>Prêmio recebido<th><font color="red">Códigos existentes</font></th>
		<tr><td>{$kod.1.tresc}<td>{$kod.1.numer}<td>{$kod.1.zl} €<td>50 {if $event_p}<font color="green"><b>+ 50</b></font>{/if}<td><b><center><font color="{if $kodb.1 <= 10}red{else}green{/if}">{$kodb.1}</font></td>
		<tr><td>{$kod.2.tresc}<td>{$kod.2.numer}<td>{$kod.2.zl} €<td>150 {if $event_p}<font color="green"><b>+ 150</b></font>{/if}<td><b><center><font color="{if $kodb.2 <= 10}red{else}green{/if}">{$kodb.2}</font></td>
		<tr><td>{$kod.3.tresc}<td>{$kod.3.numer}<td>{$kod.3.zl} €<td>300 {if $event_p}<font color="green"><b>+ 300</b></font>{/if}<td><b><center><font color="{if $kodb.3 <= 10}red{else}green{/if}">{$kodb.3}</font></td>
		<tr><td>{$kod.3.tresc}<td>{$kod.4.numer}<td>{$kod.3.zl} €<td>1000 {if $event_p}<font color="green"><b>+ 1000</b></font>{/if}<td><b><center><font color="{if $kodb.4 <= 10}red{else}green{/if}">{$kodb.4}</font></td>
	</tr>
	<tr><td colspan="5">O codigo tambem pode ser obtido em concursos organizados pelos Admin!
    </tbody></table>
{elseif $mode == przeslij}
<h3>Envio de pontos premium</h3>


<form action="game.php?village={$village.id}&amp;mode=przeslij&amp;screen=kody&akcja=przeslij" method="post">
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
{elseif $mode == dodaj && $user.admin == 0}

{/if}
	
	{/if}
