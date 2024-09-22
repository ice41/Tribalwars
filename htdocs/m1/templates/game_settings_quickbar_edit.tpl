<h3>Editar</h3>
{php}
if(empty($_POST['name']) && $_GET['confirm'] == 'yes'){
      echo "<div class=\"error\">Voc&ecirc; deve digitar um nome.</div><br />";
}else{
	if(empty($_POST['href']) && $_GET['confirm'] == 'yes'){
    	  echo "<div class=\"error\">Voc&ecirc; deve digitar uma URL.</div><br />";
	}
}
{/php}
<form method="post" action="game.php?village={$village.id}&screen=settings&mode=quickbar&action=edit&confirm=yes&id={$id}">
	<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr>
			<td width="70">Nome: </td>
			<td align="center"><input type="text" name="name" size="35" value="{$name}"></td>
		</tr>
		<tr>
			<td width="70">Imagem: </td>
			<td><input type="text" name="img" size="35" value="{$img}" /></td>
		</tr>
		<tr>
			<td width="70">URL: </td>
			<td align="center"><input type="text" name="href" size="35" value="{$href}"></td>
		</tr>
		<tr><td colspan="2"><label><input type="checkbox" name="newWindow" {if $target == 1} checked="checked"{/if}> abrir em nova p&aacute;gina</label></td></tr>
		<tr><th colspan="2"><span style="float:right;"><input type="submit" value="Ok" class="button" /></span></th></tr>
	</table>
</form>