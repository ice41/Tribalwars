<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2023-02-27 00:33:47
         Wersja PHP pliku pliki_tpl/game_edytuj_kolory_graczy.tpl */ ?>
<h2>Zaznacz gracza na mapie</h2>

<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<font class="error"/><?php echo $this->_tpl_vars['error']; ?>
</font><br><br>
<?php endif; ?>

<?php echo '
	<script type="text/javascript">
	function show_color_picker() {
		$(\'#color_picker\').toggle();
		}
	</script>
'; ?>


<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=edytuj_kolory_graczy&akcja=dodaj_gracza&h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
	<table class="vis">
		<tbody>
			<tr>
				<td>
					<a href="javascript:show_color_picker()">Mude a cor</a>
				</td>
				<td style="background-color: rgb(127, 254, 127); background-image: none;" id="color" width="30"></td>
				<td>nome do jogador:</td>
				<td>
					<input name="gracz" value="<?php echo $this->_tpl_vars['value']; ?>
" type="text">
				</td>
				<td>
					<input value="Marca" type="submit">
				</td>
			</tr>
		</tbody>
	</table>
		
	<?php echo '
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
			$("#color").css(\'background-color\', "rgb("+r+", "+g+", "+b+")");
			$("#color").css(\'background-image\',\'none\');
			if (ignore_transparency !== true)
				$(\'#trans_color_input\').attr(\'checked\', false);
				}
				
		function color_picker_ok() {
			color_picker_change(false);
			}
		</script>
	'; ?>


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

<?php if (count ( $this->_tpl_vars['odznaczeni'] ) > 0): ?>
	<table class="vis">
		<tr>
		    <th width="250">Nome do jogador</th>
			<th width="45">Cor</th>
			<th></th>
		</tr>
		<?php $_from = $this->_tpl_vars['odznaczeni']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['odznaczenie']):
?>
		    <tr>
		        <td>
					<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_player&id=<?php echo $this->_tpl_vars['odznaczenie']['do_gracz_id']; ?>
"/><?php echo $this->_tpl_vars['odznaczenie']['do_gracz_name']; ?>
</a>
				</td>
				<td style="background-color: rgb(<?php echo $this->_tpl_vars['odznaczenie']['kolor']; ?>
); background-image: none;" width="30"></td>
				<td>
					<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=edytuj_kolory_graczy&akcja=usun_gracza&id=<?php echo $this->_tpl_vars['odznaczenie']['id']; ?>
">
						 <img src="/ds_graphic/delete.png" alt="Excluir"/>
					</a>
				</td>
		    </tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>
<?php endif; ?>