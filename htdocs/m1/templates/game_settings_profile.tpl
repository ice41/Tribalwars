<form action="game.php?village={$village.id}&amp;screen=settings&amp;action=change_profile&amp;h={$hkey}" enctype="multipart/form-data" method="post">
	<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><th colspan="2">Dados pessoais</th></tr>
		<tr>
			<td>Nascimento:</td>
            <td>
                <input name="day" type="text" size="2" maxlength="2" value="{$profile.b_day}" />
                    <select name="month">
                        <option value="1" {if $profile.b_month==1}selected{/if}>Janeiro</option>
                        <option value="2" {if $profile.b_month==2}selected{/if}>Fevereiro</option>
                        <option value="3" {if $profile.b_month==3}selected{/if}>Mar&ccedil;o</option>
                        <option value="4" {if $profile.b_month==4}selected{/if}>Abril</option>
                        <option value="5" {if $profile.b_month==5}selected{/if}>Maio</option>
                        <option value="6" {if $profile.b_month==6}selected{/if}>Junho</option>
                        <option value="7" {if $profile.b_month==7}selected{/if}>Julho</option>
                        <option value="8" {if $profile.b_month==8}selected{/if}>Agosto</option>
                        <option value="9" {if $profile.b_month==9}selected{/if}>Setembro</option>
                        <option value="10" {if $profile.b_month==10}selected{/if}>Outubro</option>
                        <option value="11" {if $profile.b_month==11}selected{/if}>Novembro</option>
                        <option value="12" {if $profile.b_month==12}selected{/if}>Dezembro</option>
                    </select>
                <input name="year" type="text" size="4" maxlength="4" value="{$profile.b_year}" />
			</td>
		</tr>
		<tr>
            <td>Sexo:</td>
			<td>
				<label><input type="radio" name="sex" value="f" {if $profile.sex=='f'}checked="checked"{/if} /> Feminino</label>
                <label><input type="radio" name="sex" value="m" {if $profile.sex=='m'}checked="checked"{/if} /> Masculino</label>
                <label><input type="radio" name="sex" value="x" {if $profile.sex=='x'}checked="checked"{/if} /> n&atilde;o especificado</label>
			</td>
		</tr>
		<tr>
			<td>Localidade:</td>
			<td><input name="home" type="text" size="40" maxlength="32" value="{$profile.home}" /></td>
		</tr>
		<tr><th colspan="2">Bras&atilde;o</th></tr>
        <tr>
			<td colspan="2">
			{if !empty($user.image)}
				<img src="graphic/player/{$user.image}" alt="Bras&atilde;o" /><br />
				<input name="del_image" type="checkbox" /> Apagar<br />
			{/if}
				<input name="image" type="file" size="40" accept="image/*" class="clean" maxlength="1048576" /><br />
				<span style="font-size: xx-small">max. 240x180, max. 120kByte, (jpg, jpeg, png, gif)</span>
			</td>
		</tr>
		<tr><th colspan="2"><div align="right"><input type="submit" value="Ok" class="button" /></div></th></tr>
	</table><br />
</form>

<form action="game.php?village={$village.id}&amp;screen=settings&amp;action=change_text&amp;h={$hkey}" method="post">
	<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><th>Texto pessoal</th></tr>
		<tr><td>{$profile.personal_text|bb_format}</td></tr>
		<tr id="bbcode">
			<td>
				<div style="text-align: left; overflow: visible;">
					<a id="bb_button_bold" title="Negrito" href="#" onclick="BBCodes.insert('[b]', '[/b]');return false;">
						<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll 0px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
					</a>
					<a id="bb_button_italic" title="Italico" href="#" onclick="BBCodes.insert('[i]', '[/i]');return false;">
						<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll -20px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
					</a>
					<a id="bb_button_underline" title="Sublinhado" href="#" onclick="BBCodes.insert('[u]', '[/u]');return false;">
						<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll -40px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
					</a>
					<a id="bb_button_strikethrough" title="Riscado" href="#" onclick="BBCodes.insert('[s]', '[/s]');return false;">
						<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll -60px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
					</a>
					<a id="bb_button_quote" title="Comentar" href="#" onclick="BBCodes.insert('[quote=[player]{$user.username}[/player]]', '[/quote]');return false;">
						<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll -140px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
					</a>
					<a id="bb_button_url" title="URL" href="#" onclick="BBCodes.insert('[url]', '[/url]');return false;">
						<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll -160px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
					</a>
					<a id="bb_button_spoiler" title="Spoiler" href="#" onclick="BBCodes.insert('[spoiler]', '[/spoiler]');return false;">
						<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll -260px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
					</a>
					<a id="bb_button_player" title="Jogador" href="#" onclick="BBCodes.insert('[player]', '[/player]');return false;">
						<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll -80px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
					</a>
					<a id="bb_button_tribe" title="Tribo" href="#" onclick="BBCodes.insert('[ally]', '[/ally]');return false;">
						<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll -100px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
					</a>
					<a id="bb_button_coord" title="Cordenadas" href="#" onclick="BBCodes.insert('[coord]', '[/coord]');return false;">
						<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll -120px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
					</a>
					{literal}
					<script type="text/javascript">
						$(document).ready(function(){
							BBCodes.init({target : '#message'});
						});
					</script>
					{/literal}
				</div>
			</td>
		</tr>
		<tr><td><textarea id="message" name="personal_text" cols="87" rows="10">{$profile.personal_text}</textarea></td></tr>
		<tr><th><div align="right"><input type="submit" name="send" class="button" value="Ok" /></div></th></tr>
	 </table>
</form>