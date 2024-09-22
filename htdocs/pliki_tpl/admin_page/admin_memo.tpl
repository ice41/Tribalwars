<h3>
<center>{if !empty($err)}	<font color="red">{$err}</font>
{/if}
</center></h3><form action="admin.php?screen=memo&akcja=dodaj_notke" method="post" onsubmit="return validateReplyForm(this)">
	<table class="vis">		<tr>			<th>Adicionar uma nova nota!</th>		

		</tr>
<tr><th>Seu apelido:</th></tr>
<tr><td>					
				<input id="tworca" name="tworca" class="text" value="{$user.nazwa}" type="text" size="63">
			</td></tr>

					
				</tr>		
<tr><th>Nome da nota:</th></tr>
<tr><td><input id="nazwa" name="nazwa" class="text" value="" type="text" size="63"></td>
																											</tr><tr>

<tr><th>conteúdo do memorando:</th></tr>
<tr><td><textarea style="height:200px;width:400px;" id="message" name="tekst" onkeyup="liveValidateReplyForm(this)"></textarea></td></tr>
		
	<tr><td><center><input name="sub" type="submit" value="Adicione uma anotação" class="btn btn-success btn-small"/><input type="reset" value="Redefinir dados" class="btn btn-danger btn-small"/></center></td></tr>

				

</form>

</table>


{foreach from=$notki item=memo key=id}


<table class="vis" width="108%">
<tr><th>ID</th></tr>
<tr><td><strong>{$memo.id}</td></tr>
<tr><th>Adicionado por</th></tr>
<tr><td><strong>{$memo.tworca}</td></tr>
<tr><th>Adicionado</th></tr>
<tr><td><strong>{$memo.date}</td></tr>
<tr><th>Nome</th></tr>
<tr><td><strong>{$memo.nazwa}</td></tr>
<tr><th>Tre��</th></tr>
<tr><td><strong>{$memo.tekst}</td></tr>
<tr><th>Usu�</th></tr>
<tr><td><strong><a href="admin.php?screen=memo&akcje=usun_notke&oid={$id}"><img src="ds_graphic/delete.png" alt="usu�"></a></td></tr>
</table>			
					<hr>							{/foreach}
																																




