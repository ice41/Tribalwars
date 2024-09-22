<form action="game.php?village={$village.id}&amp;screen=settings&amp;action=change_profile&amp;h={$hkey}" enctype="multipart/form-data" method="post">
	<table class="vis">
		<tr>
			<th colspan="2">
				Ustawienia
			</th>
		</tr>
        <tr>
			<td>
				Data urodzenia:
			</td>
			<td>
				<input name="day" type="text" size="2" maxlength="2" value="{$profile.b_day}" />
                    <select name="month">
						<option label="Styczeñ" value="1" {if $profile.b_month==1}selected{/if}>Styczeñ</option>
						<option label="Luty" value="2" {if $profile.b_month==2}selected{/if}>Luty</option>
						<option label="Marzec" value="3" {if $profile.b_month==3}selected{/if}>Marzec</option>
						<option label="Kwiecieñ" value="4" {if $profile.b_month==4}selected{/if}>Kwiecieñ</option>
						<option label="Maj" value="5" {if $profile.b_month==5}selected{/if}>Maj</option>
						<option label="Czerwiec" value="6" {if $profile.b_month==6}selected{/if}>Czerwiec</option>
						<option label="Lipiec" value="7" {if $profile.b_month==7}selected{/if}>Lipiec</option>
						<option label="Sierpieñ" value="8" {if $profile.b_month==8}selected{/if}>Sierpieñ</option>
						<option label="Wrzesieñ" value="9" {if $profile.b_month==9}selected{/if}>Wrzesieñ</option>
						<option label="PaŸdziernik" value="10" {if $profile.b_month==10}selected{/if}>PaŸdziernik</option>
						<option label="Listopad" value="11" {if $profile.b_month==11}selected{/if}>Listopad</option>
						<option label="Grudzieñ" value="12" {if $profile.b_month==12}selected{/if}>Grudzieñ</option>
					</select>
				<input name="year" type="text" size="4" maxlength="4" value="{$profile.b_year}" />
			</td>
		</tr>
        <tr>
			<td>
				P³eæ:
			</td>
			<td>
			    <label>
					<input type="radio" name="sex" value="f" {if $profile.sex=='f'}checked="checked"{/if} />
						Kobieta
				</label>
				<label>
					<input type="radio" name="sex" value="m" {if $profile.sex=='m'}checked="checked"{/if} />
						Mê¿czyzna
				</label>
				<label>
					<input type="radio" name="sex" value="x" {if $profile.sex=='x'}checked="checked"{/if} />
						Nie podajê
				</label>
			</td>
		</tr>
		<tr>
			<td>
				Miejsce zamieszkania:
			</td>
			<td>
				<input name="home" type="text" size="24" maxlength="32" value="{$profile.home}" />
			</td>
		</tr>
		<tr>
			<td>
				God³o osobiste:
			</td>
			<td>
			    {if !empty($user.image)}
					<img src="graphic/player/{$user.image}" alt="Wappen" />
					<br />
					<input name="del_image" type="checkbox" />
					Wappen löschen
					<br />
				{/if}
	           	<input name="image" type="file" size="40" accept="image/*" maxlength="1048576" />
				<br />
				<span style="font-size: xx-small">maks. 240x180, maks. 120kByte, (jpg, jpeg, png, gif)</span>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="OK" />
			</td>
		</tr>
	</table>
	<br />
</form>

<form action="game.php?village={$village.id}&amp;screen=settings&amp;action=change_text&amp;h={$hkey}" method="post">
	<table class="vis">
		<tr>
			<th colspan="2">
				Tekst osobisty:
			</th>
		</tr>
		<tr>
			<td colspan="2">
				<textarea name="personal_text" cols="50" rows="10">{$profile.personal_text}</textarea>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="send" value="OK" />
			</td>
			<td align="right">

			</td>
		</tr>
	</table>
</form>