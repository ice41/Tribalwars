<h2 class="error">{$err}</h2>
<form action="admin.php?screen=rules&akcja=nowa_kategoria" method="post" onsubmit="return validateReplyForm(this)">
	<table class="vis">		<tr>			<th>Dodaj now¹ kategoriê dla zasad</th>		

		</tr>



					
				</tr>		
<tr><td valign="top" width="20px">
Nazwa kategorii<input id="nazwa" name="nazwa" class="text" value="" type="text" ></td>
																											</tr><tr>

<tr><td><div id="nazwa"><strong>Wybierz numer kategorii:</strong><input id="typ" name="typ" class="text" value="" type="text" ></div>

</td></tr>		
			<tr><td><center><input name="sub" type="submit" value="Dodaj kategoriê" class="btn btn-success btn-small"/>
</center></td></tr>
		
	

				

</form>
<form action="admin.php?screen=rules&akcja=nowa_zasada" method="post" onsubmit="return validateReplyForm(this)">
	<table class="vis">		<tr>			<th>Dodaj now¹ zasadê:</th>		

		</tr>

<tr><td>
<br>
				<textarea style="height:200px;width:400px;" id="text" name="text" onkeyup="liveValidateReplyForm(this)" class="btn">Treœæ nowej zasady</textarea>
			</td></tr>

					
				</tr>		
<tr><td valign="top" width="20px">
<strong>Wybierz kategoriê do której przypiszesz zasadê:</strong>
{foreach from=$zasady item=z key=id}

<p><input type="radio" name="kt" value="{$z.typ}"><h>§{$z.typ}) {$z.nazwa}</h>
{/foreach}

																											</tr>

		
			<tr><td><center><input name="sub" type="submit" value="Dodaj zasadê" class="btn btn-success btn-small"/>
</center></td></tr>
		
	

		

</form>
