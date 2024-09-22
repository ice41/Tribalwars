<h2>Sate parasite</h2>

{if !empty($error)}
	<font class="error">{$error}</font><br /><br />
{/if}
{if $success}
	Satele de barbari au fost create!
{else}
	<form method="post" action="index.php?screen=refugee_camp&amp;action=create" onSubmit="this.submit.disabled=true;">
		<table class="vis">
			<tr>
				<th colspan="2">Creati sate parasite</th>
			</tr>
			<tr>
				<td width="350">Cate sate parasite doriti sa creati?<br />(maxim 250)</td>
				<td><input type="text" name="num" value="0"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Creaza" onload="this.disabled=false;"> Procesul poate dura in jur de 5 secunde!</td>
			</tr>

		</table>
	</form>
{/if}
<br />
<h2>Sterge sate parasite</h2>
{if $deleteSuccess != ''}
<font class="error">{$deleteSuccess}</font>
{/if}
{if $fluela == 0}
<font class="error">Nu au fost sate parasite create!</font>
{else}
<form method="post" action="index.php?screen=refugee_camp&action=delete" onSubmit="this.submit.disabled=true;">
    <table class="vis">
      <tr>
        <th colspan="2">Sterge sate parasite</th>
      </tr>
      <tr>
        <td width="200">Numere de sate parasite:</td>
        <td width="50"><b>{$fluela}</b></td>
      </tr>
      <tr>
        <td width="200">Stergele pe toate</td>
        <td width="50"><input type="checkbox" name="confirm" value="confirm"></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="Sterge"</td>
      </tr>
    </table>
  </form>
{/if}