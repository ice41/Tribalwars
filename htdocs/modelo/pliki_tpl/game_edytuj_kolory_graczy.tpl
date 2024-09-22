<h2>Zaznacz gracza na mapie</h2>

{if !empty($error)}
	<font class="error"/>{$error}</font><br><br>
{/if}

{literal}
	<script type="text/javascript">
	function show_color_picker() {
		$('#color_picker').toggle();
		}
	</script>
{/literal}

<form action="game.php?village={$village.id}&screen=edytuj_kolory_graczy&akcja=dodaj_gracza&h={$hkey}" method="post">
	<table class="vis">
		<tbody>
			<tr>
				<td>
					<a href="javascript:show_color_picker()">Mude a cor</a>
				</td>
				<td style="background-color: rgb(127, 254, 127); background-image: none;" id="color" width="30"></td>
				<td>nome do jogador:</td>
				<td>
					<input name="gracz" value="{$value}" type="text">
				</td>
				<td>
					<input value="Marca" type="submit">
				</td>
			</tr>
		</tbody>
	</table>
		
	{literal}
		<script type="text/javascript">
		function color_picker_choose(r, g, b, ignore_transparency) {
			$("#color_picker_r").val(r);
			$("#color_picker_g").val(g);
			$("#color_picker_b").val(b);
			color_picker_change(ignore_transparency);
			}

		function color_picker_change(ignore_transparency) {
			var r = $("#color_picker_r").val();
			var g = $("#color_picker_g").val();
			var b = $("#color_picker_b").val();
			$("#color").css('background-color', "rgb("+r+", "+g+", "+b+")");
			$("#color").css('background-image','none');
			if (ignore_transparency !== true)
				$('#trans_color_input').attr('checked', false);
				}
				
		function color_picker_ok() {
			color_picker_change(false);
			}
		</script>
	{/literal}

	<table id="color_picker" style="border-spacing: 0px; display: table;">
		<tbody>
			<tr>
				<td>czerwony:</td>
				<td>
					<input onclick="this.focus()" name="color_picker_r" id="color_picker_r" style="font-size: 10px;" onchange="color_picker_change()" onkeyup="color_picker_change()" size="4" type="text">
				</td>
				<td style="background-color: rgb(0, 0, 0); background-image: none;" onclick="color_picker_choose(0,0,0)" width="15">&nbsp;</td>
				<td style="background-color: rgb(0, 0, 127); background-image: none;" onclick="color_picker_choose(0,0,127)" width="15">&nbsp;</td>
				<td style="background-color: rgb(0, 0, 254); background-image: none;" onclick="color_picker_choose(0,0,254)" width="15">&nbsp;</td>
				<td style="background-color: rgb(0, 127, 0); background-image: none;" onclick="color_picker_choose(0,127,0)" width="15">&nbsp;</td>
				<td style="background-color: rgb(0, 127, 127); background-image: none;" onclick="color_picker_choose(0,127,127)" width="15">&nbsp;</td>
				<td style="background-color: rgb(0, 127, 254); background-image: none;" onclick="color_picker_choose(0,127,254)" width="15">&nbsp;</td>
				<td style="background-color: rgb(0, 254, 0); background-image: none;" onclick="color_picker_choose(0,254,0)" width="15">&nbsp;</td>
				<td style="background-color: rgb(0, 254, 127); background-image: none;" onclick="color_picker_choose(0,254,127)" width="15">&nbsp;</td>
				<td style="background-color: rgb(0, 254, 254); background-image: none;" onclick="color_picker_choose(0,254,254)" width="15">&nbsp;</td>
			</tr>
			<tr>
				<td>zielony:</td>
				<td>
					<input onclick="this.focus()" name="color_picker_g" id="color_picker_g" style="font-size: 10px;" onchange="color_picker_change()" onkeyup="color_picker_change()" size="4" type="text">
				</td>
				<td style="background-color: rgb(127, 0, 0); background-image: none;" onclick="color_picker_choose(127,0,0)" width="15">&nbsp;</td>
				<td style="background-color: rgb(127, 0, 127); background-image: none;" onclick="color_picker_choose(127,0,127)" width="15">&nbsp;</td>
				<td style="background-color: rgb(127, 0, 254); background-image: none;" onclick="color_picker_choose(127,0,254)" width="15">&nbsp;</td>
				<td style="background-color: rgb(127, 127, 0); background-image: none;" onclick="color_picker_choose(127,127,0)" width="15">&nbsp;</td>
				<td style="background-color: rgb(127, 127, 127); background-image: none;" onclick="color_picker_choose(127,127,127)" width="15">&nbsp;</td>
				<td style="background-color: rgb(127, 127, 254); background-image: none;" onclick="color_picker_choose(127,127,254)" width="15">&nbsp;</td>
				<td style="background-color: rgb(127, 254, 0); background-image: none;" onclick="color_picker_choose(127,254,0)" width="15">&nbsp;</td>
				<td style="background-color: rgb(127, 254, 127); background-image: none;" onclick="color_picker_choose(127,254,127)" width="15">&nbsp;</td>
				<td style="background-color: rgb(127, 254, 254); background-image: none;" onclick="color_picker_choose(127,254,254)" width="15">&nbsp;</td>
			</tr>
			<tr>
				<td>niebieski:</td>
				<td>
					<input onclick="this.focus()" name="color_picker_b" id="color_picker_b" style="font-size: 10px;" onchange="color_picker_change()" onkeyup="color_picker_change()" size="4" type="text">
				</td>
				<td style="background-color: rgb(254, 0, 0); background-image: none;" onclick="color_picker_choose(254,0,0)" width="15">&nbsp;</td>
				<td style="background-color: rgb(254, 0, 127); background-image: none;" onclick="color_picker_choose(254,0,127)" width="15">&nbsp;</td>
				<td style="background-color: rgb(254, 0, 254); background-image: none;" onclick="color_picker_choose(254,0,254)" width="15">&nbsp;</td>
				<td style="background-color: rgb(254, 127, 0); background-image: none;" onclick="color_picker_choose(254,127,0)" width="15">&nbsp;</td>
				<td style="background-color: rgb(254, 127, 127); background-image: none;" onclick="color_picker_choose(254,127,127)" width="15">&nbsp;</td>
				<td style="background-color: rgb(254, 127, 254); background-image: none;" onclick="color_picker_choose(254,127,254)" width="15">&nbsp;</td>
				<td style="background-color: rgb(254, 254, 0); background-image: none;" onclick="color_picker_choose(254,254,0)" width="15">&nbsp;</td>
				<td style="background-color: rgb(254, 254, 127); background-image: none;" onclick="color_picker_choose(254,254,127)" width="15">&nbsp;</td>
				<td style="background-color: rgb(254, 254, 254); background-image: none;" onclick="color_picker_choose(254,254,254)" width="15">&nbsp;</td>
			</tr>
		</tbody>
	</table>
	
	<script type="text/javascript">
		$("#color_picker_r").val(255);
		$("#color_picker_g").val(0);
		$("#color_picker_b").val(255);
		color_picker_change();
	</script>
</form>

<br>
<br>

{if count($odznaczeni) > 0}
	<table class="vis">
		<tr>
		    <th width="250">Nome do jogador</th>
			<th width="45">Cor</th>
			<th></th>
		</tr>
		{foreach from=$odznaczeni item=odznaczenie}
		    <tr>
		        <td>
					<a href="game.php?village={$village.id}&screen=info_player&id={$odznaczenie.do_gracz_id}"/>{$odznaczenie.do_gracz_name}</a>
				</td>
				<td style="background-color: rgb({$odznaczenie.kolor}); background-image: none;" width="30"></td>
				<td>
					<a href="game.php?village={$village.id}&screen=edytuj_kolory_graczy&akcja=usun_gracza&id={$odznaczenie.id}">
						 <img src="/ds_graphic/delete.png" alt="Excluir"/>
					</a>
				</td>
		    </tr>
		{/foreach}
	</table>
{/if}