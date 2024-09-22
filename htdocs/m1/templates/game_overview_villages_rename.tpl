<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr><th align="left" width="50">Comando</th><th align="left" width="150">Descri&ccedil;&atilde;o</th><th align="left" width="100">Resultado</th></tr>
	<tr><td align="center">{literal}{NR_0}{/literal}</td><td>Numera as aldeias colocando 0 no inicio.</td><td align="center">001, 002, 003</td></tr>
	<tr><td align="center">{literal}{NR}{/literal}</td><td>Numera as aldeias.</td><td align="center">1, 2, 3</td></tr>
	<tr><td align="center">{literal}{X}{/literal}</td><td>Cordenada X da aldeia.</td><td align="center">535, 554, 534</td></tr>
	<tr><td align="center">{literal}{Y}{/literal}</td><td>Cordenada Y da aldeia.</td><td align="center">553, 545, 543</td></tr>
	<tr><td align="center">{literal}{X|Y}{/literal}</td><td>Cordenada X e Y da aldeia.</td><td align="center">535|553, 554|545, 534|543</td></tr>
	<tr><td align="center">{literal}{K}{/literal}</td><td>Continente da aldeia.</td><td align="center">55, 26, 99</td></tr>
</table><br />
{php}
	$name = $_POST['name'];
	$buton = $_POST['buton'];
	$vill = $this->_tpl_vars['village']['id'];
	if($buton){
		if(empty($name) || strlen($name) < 4 || strlen($name) > 30){
			$this->_tpl_vars['error'] = 'O nome da aldeia deve conter entre 4 e 30 caracteres!';
		}else{
			header("Location: game.php?village=$vill&screen=overview_villages&mode=rename");
		}
	}
{/php}
<form action="game.php?village={$village.id}&screen=overview_villages&mode=rename" method="post">
	<table class="vis" width="60%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><th colspan="3">Renoemar</th></tr>
		{if !empty($error)}
		<tr><td colspan="3"><div class="error">{$error}</div></td></tr>
		{/if}
		<tr>
			<td>Nome:</td>
			<td align="center"><input type="text" style="text-align:center;width:100%;font-size:25px" name="name" size="30" /></td>
			<td align="center"><input type="submit" name="buton" class="button" value="Ok" /></div></td>
		</tr>
	</table>
</form>
