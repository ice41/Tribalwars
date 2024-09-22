<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2023-02-26 21:26:52
         Wersja PHP pliku pliki_tpl/game_memo.tpl */ ?>

<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<font class="error"><?php echo $this->_tpl_vars['error']; ?>
</font>
<?php endif; ?>

	                                <script type="text/javascript">
//<![CDATA[
	Memo.messages = {
		confirmSubmit : "Tem alterações não salvas em outras abas que serão perdidas se salvar esta aba.",
		tabNameLength : "O nome pode conter até 16 caracteres",
		tabNameEmpty : "Deve digitar um nome!",
		charsAvailable : "Personagens disponíveis: %1",
		charsTooMuch : "Excesso de caracteres: %1",
		cannotDeleteLast : "Não pode excluir este marcador."
	};
//]]>
</script>


<h2 style="float:left">Notas</h2>

<input id="add_tab_url" value="" type="hidden">
<input id="remove_tab_url" value="" type="hidden">
<input id="rename_tab_url" value="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;ajaxaction=rename_tab&amp;screen=memo" type="hidden">
<input id="remove_confirmation" value="Tem certeza de que deseja excluir este marcador? Seu conteúdo será perdido!" type="hidden">
<input id="too_many_tabs_message" value="Não pode ter mais de 5 abas por vez." type="hidden">
<input id="rename_tab_prompt" value="Nome da nova guia:" type="hidden">

<div id="tab-bar">
			<div id="tab_<?php echo $this->_tpl_vars['user']['id']; ?>
" class="memo-tab  memo-tab-selected"><span class="memo-tab-label"><strong>Nova aba</strong></span></div>
	</div>

<div id="memo_<?php echo $this->_tpl_vars['user']['id']; ?>
" class="memo_container" style="">
<div class="memo_script" style="clear: both;">
					<a class="btn edit_link" href="#" onclick="Memo.toggleEdit(); return false">Editar</a>
		<a class="btn rename_link" href="#" onclick="Memo.renameTab(); return false">Renomear</a>
		
		<br>
	
	<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=memo&amp;action=edit&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
		<input name="tab_id" value="<?php echo $this->_tpl_vars['user']['id']; ?>
" type="hidden">
		<table class="vis" style="margin-top: 5px;" width="100%">
						<tbody><tr>
				<td colspan="2">
					<strong>Dica:</strong> pode usar até 5.000 caracteres.
				</td>
			</tr>
									<tr class="show_row"><td colspan="2">
<?php echo $this->_tpl_vars['memo_viev']; ?>


							</td></tr>
			<tr class="bbcodes" style="display:none;">
				<td colspan="2"><div id="bb_bar" style="text-align:left; overflow:visible; ">
														<a id="bb_button_bold" title="Pogrubienie" href="#" onclick="BBCodes.insert('[b]', '[/b]');return false;">
													<span style="display:inline-block; zoom:1; *display:inline; background:url(https://www.tribalwars.net/graphic//bbcodes/bbcodes.png?1) no-repeat 0px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
												</a>
																			<a id="bb_button_italic" title="Itálico" href="#" onclick="BBCodes.insert('[i]', '[/i]');return false;">
													<span style="display:inline-block; zoom:1; *display:inline; background:url(https://www.tribalwars.net/graphic//bbcodes/bbcodes.png?1) no-repeat -20px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
												</a>
																			<a id="bb_button_underline" title="Podkre�lenie" href="#" onclick="BBCodes.insert('[u]', '[/u]');return false;">
													<span style="display:inline-block; zoom:1; *display:inline; background:url(https://www.tribalwars.net/graphic//bbcodes/bbcodes.png?1) no-repeat -40px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
												</a>
																			<a id="bb_button_strikethrough" title="Przekre�lenie" href="#" onclick="BBCodes.insert('[s]', '[/s]');return false;">
													<span style="display:inline-block; zoom:1; *display:inline; background:url(https://www.tribalwars.net/graphic//bbcodes/bbcodes.png?1) no-repeat -60px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
												</a>
																			<a id="bb_button_quote" title="Cytuj" href="#" onclick="BBCodes.insert('[quote=Author]', '[/quote]');return false;">
													<span style="display:inline-block; zoom:1; *display:inline; background:url(https://www.tribalwars.net/graphic//bbcodes/bbcodes.png?1) no-repeat -140px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
												</a>
																												<a id="bb_button_spoiler" title="Spoiler" href="#" onclick="BBCodes.insert('[spoiler]', '[/spoiler]');return false;">
													<span style="display:inline-block; zoom:1; *display:inline; background:url(https://www.tribalwars.net/graphic//bbcodes/bbcodes.png?1) no-repeat -260px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
												</a>
																												<a id="bb_button_url" title="Link" href="#" onclick="BBCodes.insert('[url]', '[/url]');return false;">
													<span style="display:inline-block; zoom:1; *display:inline; background:url(https://www.tribalwars.net/graphic//bbcodes/bbcodes.png?1) no-repeat -160px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
												</a>
																			<a id="bb_button_player" title="Gracz" href="#" onclick="BBCodes.insert('[player]', '[/player]');return false;">
													<span style="display:inline-block; zoom:1; *display:inline; background:url(https://www.tribalwars.net/graphic//bbcodes/bbcodes.png?1) no-repeat -80px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
												</a>
																			<a id="bb_button_tribe" title="Plemi�" href="#" onclick="BBCodes.insert('[ally]', '[/ally]');return false;">
													<span style="display:inline-block; zoom:1; *display:inline; background:url(https://www.tribalwars.net/graphic//bbcodes/bbcodes.png?1) no-repeat -100px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
												</a>
																												<a id="bb_button_coord" title="Koordynaty" href="#" onclick="BBCodes.insert('[coord]', '[/coord]');return false;">
													<span style="display:inline-block; zoom:1; *display:inline; background:url(https://www.tribalwars.net/graphic//bbcodes/bbcodes.png?1) no-repeat -120px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
												</a>
																												<a id="bb_button_report_display" title="Raport" href="#" onclick="BBCodes.insert('[report_display]', '[/report_display]');return false;">
													<span style="display:inline-block; zoom:1; *display:inline; background:url(https://www.tribalwars.net/graphic//bbcodes/bbcodes.png?1) no-repeat -240px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
												</a>
																												<a id="bb_button_size" title="Rozmiary czcionek" href="#" onclick="$('#bb_sizes').slideToggle(); BBCodes.placePopcusto(); return false;">
													<span style="display:inline-block; zoom:1; *display:inline; background:url(https://www.tribalwars.net/graphic//bbcodes/bbcodes.png?1) no-repeat -220px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
												</a>
																			<a id="bb_button_image" title="Obraz" href="#" onclick="BBCodes.insert('[img]', '[/img]');return false;">
													<span style="display:inline-block; zoom:1; *display:inline; background:url(https://www.tribalwars.net/graphic//bbcodes/bbcodes.png?1) no-repeat -180px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
												</a>
																			<a id="bb_button_color" title="Kolor" href="#" onclick="BBCodes.colorPickerToggle(); BBCodes.placePopcusto(); return false">
													<span style="display:inline-block; zoom:1; *display:inline; background:url(https://www.tribalwars.net/graphic//bbcodes/bbcodes.png?1) no-repeat -200px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
												</a>
																			<a id="bb_button_table" title="Lista" href="#" onclick="BBCodes.insert('[table]\n[**]head1', '[||]head2[/**]\n[*]test1[|]test2\n[/table]');return false;">
													<span style="display:inline-block; zoom:1; *display:inline; background:url(https://www.tribalwars.net/graphic//bbcodes/bbcodes.png?1) no-repeat -280px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
												</a>
																			<a id="bb_button_claim" title="Zarezerwuj" href="#" onclick="BBCodes.insert('[claim]', '[/claim]');return false;">
													<span style="display:inline-block; zoom:1; *display:inline; background:url(https://www.tribalwars.net/graphic//bbcodes/bbcodes.png?1) no-repeat -340px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
												</a>
																			<a id="bb_button_units" title="Jednostki" href="#" onclick="BBCodes.unitPickerToggle(event); return false">
													<span style="display:inline-block; zoom:1; *display:inline; background:url(https://www.tribalwars.net/graphic//bbcodes/bbcodes.png?1) no-repeat -300px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
												</a>
																			<a id="bb_button_building" title="Edifícios" href="#" onclick="BBCodes.buildingPickerToggle(event); return false">
													<span style="display:inline-block; zoom:1; *display:inline; background:url(https://www.tribalwars.net/graphic//bbcodes/bbcodes.png?1) no-repeat -320px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
												</a>
									

				<table id="bb_sizes" style="display: none; clear:both; white-space:nowrap;">
					<tbody><tr>
						<td>
							<a href="#" onclick="BBCodes.insert('[size=6]', '[/size]');$('#bb_sizes').slideToggle(); return false;">� Bardzo ma�y</a><br>
							<a href="#" onclick="BBCodes.insert('[size=7]', '[/size]');$('#bb_sizes').slideToggle(); return false;">� Ma�y</a><br>
							<a href="#" onclick="BBCodes.insert('[size=9]', '[/size]');$('#bb_sizes').slideToggle(); return false;">� Normalna</a><br>
							<a href="#" onclick="BBCodes.insert('[size=12]', '[/size]');$('#bb_sizes').slideToggle(); return false;">� Du�y</a><br>
							<a href="#" onclick="BBCodes.insert('[size=20]', '[/size]');$('#bb_sizes').slideToggle(); return false;">� Bardzo du�y</a><br>
						</td>
					</tr>
				</tbody></table>

				<div id="bb_color_picker" style="display: none; clear:both;">
					<div class="popup_menu" style="cursor:default"><a onclick="$('#bb_color_picker').toggle();return false;" href="#">Zamkn��</a></div>
					<div id="bb_color_picker_colors">
						<div id="bb_color_picker_c0" style="background:#f00"></div>
						<div id="bb_color_picker_c1" style="background:#ff0"></div>
						<div id="bb_color_picker_c2" style="background:#0f0"></div>
						<div id="bb_color_picker_c3" style="background:#0ff"></div>
						<div id="bb_color_picker_c4" style="background:#00f"></div>
						<div id="bb_color_picker_c5" style="background:#f0f"></div>
						<br>
					</div>
					<div id="bb_color_picker_tones">
						<div id="bb_color_picker_10"></div><div id="bb_color_picker_11"></div><div id="bb_color_picker_12"></div><div id="bb_color_picker_13"></div><div id="bb_color_picker_14"></div><div id="bb_color_picker_15"></div><br style="clear: both">
						<div id="bb_color_picker_20"></div><div id="bb_color_picker_21"></div><div id="bb_color_picker_22"></div><div id="bb_color_picker_23"></div><div id="bb_color_picker_24"></div><div id="bb_color_picker_25"></div><br style="clear: both">
						<div id="bb_color_picker_30"></div><div id="bb_color_picker_31"></div><div id="bb_color_picker_32"></div><div id="bb_color_picker_33"></div><div id="bb_color_picker_34"></div><div id="bb_color_picker_35"></div><br style="clear: both">
						<div id="bb_color_picker_40"></div><div id="bb_color_picker_41"></div><div id="bb_color_picker_42"></div><div id="bb_color_picker_43"></div><div id="bb_color_picker_44"></div><div id="bb_color_picker_45"></div><br style="clear: both">
						<div id="bb_color_picker_50"></div><div id="bb_color_picker_51"></div><div id="bb_color_picker_52"></div><div id="bb_color_picker_53"></div><div id="bb_color_picker_54"></div><div id="bb_color_picker_55"></div><br style="clear: both">
					</div>
					<div id="bb_color_picker_preview">Text</div>
					<input id="bb_color_picker_tx" type="text"><input value="OK" id="bb_color_picker_ok" onclick="BBCodes.colorPickerToggle(true);return false;" type="button">
				</div>

				
				<script type="text/javascript">
				//<![CDATA[
					$(document).ready(function(){
						BBCodes.init({
							target : '#message',
							ajax_unit_url: 'ajax/unit_bb.php',
							ajax_building_url: 'ajax/build_bb.php'
						});
					});
				//]]>
				</script>
				

				</div></td>
			</tr>
			<tr class="edit_row" style="display:none">
				<td colspan="2">
					<textarea id="message_<?php echo $this->_tpl_vars['user']['id']; ?>
" name="memo" cols="80" rows="25"><?php echo $this->_tpl_vars['memo_bb']; ?>
</textarea>
				</td>
			</tr>
			<tr class="char-counter" style="display: none;">
				<td colspan="2">
					<span class="chars_left" style="font-weight: bold; color: black;">Personagens disponíveis: </span>
				</td>
			</tr>
			<tr class="submit_row" style="display:none">
				<td>
					<input id="submit_memo_<?php echo $this->_tpl_vars['user']['id']; ?>
" class="btn" value="Salvar" type="submit">
					<input class="btn" value="Cancelar" onclick="this.form.reset(); Memo.toggleEdit()" type="button">
				</td>
				<td align="right">
					
				</td>
			</tr>
		</tbody></table>
	</form>
</div>
</div>
<script type="text/javascript">
//<![CDATA[
	var tab_id = '#message_<?php echo $this->_tpl_vars['user']['id']; ?>
';
	var premium = true;
	var char_limit = 5000;

	
	$('document').ready(function() {
		Memo.init([{"id":"<?php echo $this->_tpl_vars['user']['id']; ?>
","title":"<?php echo $this->_tpl_vars['user']['memo_name']; ?>
","memo":"<?php echo $this->_tpl_vars['memo_bb']; ?>
","memo_bb":"<?php echo $this->_tpl_vars['memo_viev']; ?>
"}],false, false);

		var current_value = $(tab_id).val().length
		Memo.setCharsLeft(char_limit, current_value);

		/* Pesquisa Comprimento do conteúdo a cada 1/4 seg.Usado porque o JS Onchange não pode lidar adequadamente
		com inserções de cópia/pasta e bbcode.*/

		$(function() {
			window.charCount = 0;
			setInterval(function() {

			/* javascript works with \n for carriage returns, while php uses \r\n
			to make validation line up with the backend, \n is replaced with \r\n*/
			var c = $('#memo_' + Memo.selectedTab + " textarea").val().replace(new RegExp("\n","g"), "\r\n").length;
				if(c != window.charCount) {
					window.charCount = c;
					Memo.setCharsLeft(char_limit, c);
				}
			}, 250);
		});

		$(".memo_script").slideDown();
	});
	
//]]>
</script>

<div id="bbcode-holder" style="display: none">
														
				
</div>