<h2>Sate parasite</h2>

{if !empty($error)}
	<font class="error">{$error|replace:"Die Anzahl der zu erstellende Flüchtlingslager muss größer als 0 sein!":"Maximul de sate care poate fi adaugat este 250 si minimul este 1!"|replace:"Die Anzahl der zu erstellende Flüchtlingslager muss kleiner als 250 sein!":"Maximul de sate care poate fi adaugat este 250 si minimul este 1!"|replace:"Die Anzahl muss aus einer Zahl bestehen. (keine Kommastellen!)":"Trebuie sa introduceti cifre nu litere!"}</font><br /><br />
{/if}
{if $success}
	Satele parasite au fost adaugate cu succes!
{else}
	<form method="post" action="index.php?screen=refugee_camp&amp;action=create" onSubmit="this.submit.disabled=true;">
		<table class="vis">
			<tr>
				<th colspan="2">Baga sate parasite</th>
			</tr>
			<tr>
				<td width="350">Cate sate parasite doriti sa bagati?(maxim 250)</td>
				<td><input type="text" name="num" value="0"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Baga sate parasite" onload="this.disabled=false;"></td>
			</tr>

		</table>
	</form>
{/if}
<br />
<h2>Cate sate sunt</h2>
{if $deleteSuccess != ''}
<font class="error">{$deleteSuccess}</font>
{/if}
{if $fluela == 0}Satele parasite au fost sterse cu succes!{else}
<form method="post" action="index.php?screen=refugee_camp&action=delete" onSubmit="this.submit.disabled=true;">
    <table width="419" class="vis">
      <tr>
        <th colspan="2">Cate sate sunt:</th>
      </tr>
      <tr>
        <td width="248">Sunt</td>
        <td width="159"><b>{$fluela} </b>sate parasite</td>
      </tr>
      <tr>
        <td width="248">Bifeaza ca sa stergi toate satele parasite:</td>
        <td width="159"><input type="checkbox" name="confirm" value="confirm"></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="Sterge"</td>
      </tr>
    </table>
</form>
{/if}