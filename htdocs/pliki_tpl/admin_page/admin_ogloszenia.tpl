<h3>
<center>{if !empty($err)}	<font color="red">{$err}</font>
{/if}
</center></h3><form action="admin.php?screen=ogloszenia&akcja=dodaj_ogloszenie" method="post" onsubmit="return validateReplyForm(this)">
	<table class="vis">		<tr>			<th>Painel para adicionar um anuncio a pagina inicial:</th>		

		</tr>

<tr><td>					<a title="Aprofundamento" href="javascript: insertBBcode('message', '<b>', '</b>');">
			<div style="float: left; background:url(ds_graphic/bb/bb_b.png) no-repeat 0px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 4px; width: 20px; height: 20px; margin-top: 3px; margin-bottom: 3px;"></div>
			</a>
					<a title="Kursywa" href="javascript: insertBBcode('message', '<i>', '</i>');">
			<div style="float: left; background:url(ds_graphic/bb/bb_i.png) no-repeat 0px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 4px; width: 20px; height: 20px; margin-top: 3px; margin-bottom: 3px;"></div>
			</a>
					<a title="Podkre�lenie" href="javascript: insertBBcode('message', '<u>', '</u>');">
			<div style="float: left; background:url(ds_graphic/bb/bb_u.png) no-repeat 0px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 4px; width: 20px; height: 20px; margin-top: 3px; margin-bottom: 3px;"></div>
			</a>
					<a title="Przekre�lenie" href="javascript: insertBBcode('message', '<s>', '</s>');">
			<div style="float: left; background:url(ds_graphic/bb/bb_s.png) no-repeat 0px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 4px; width: 20px; height: 20px; margin-top: 3px; margin-bottom: 3px;"></div>
			</a>

					<a title="Link" href="javascript: insertBBcode('message', '<a href=>', '</a>');">
			<div style="float: left; background:url(ds_graphic/bb/bb_url.png) no-repeat 0px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 4px; width: 20px; height: 20px; margin-top: 3px; margin-bottom: 3px;"></div>
			</a>
					<a title="Tabela" href="javascript: insertBBcode('message', '<table><tr><th>', '</tr></th></table>');">
			<div style="float: left; background:url(ds_graphic/bb/bb_table.png) no-repeat 0px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 4px; width: 20px; height: 20px; margin-top: 3px; margin-bottom: 3px;"></div>
			</a>
					<a title="Obraz" href="javascript: insertBBcode('message', '<img src=', '/>');">
			<div style="float: left; background:url(ds_graphic/bb/bb_img.png) no-repeat 0px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 4px; width: 20px; height: 20px; margin-top: 3px; margin-bottom: 3px;"></div>
			</a>
					<a title="Kolor" href="javascript: insertBBcode('message', '<font color=>', '</font>');">
			<div style="float: left; background:url(ds_graphic/bb/bb_color.png) no-repeat 0px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 4px; width: 20px; height: 20px; margin-top: 3px; margin-bottom: 3px;"></div>
			</a>
					<a title="Akcja specialna - Wi�cej" href="javascript: insertBBcode('message', '<p><small><a href=>�wi�cej', '</a></small>');">
			<div style="float: left; background:url(ds_graphic/bb/bb_w.png) no-repeat 0px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 4px; width: 20px; height: 20px; margin-top: 3px; margin-bottom: 3px;"></div>
			</a><br>
				<textarea style="height:200px;width:400px;" id="message" name="ogl_val" onkeyup="liveValidateReplyForm(this)" class="btn"></textarea>
			</td></tr>

					
				</tr>		
<tr><td valign="top" width="20px">
<input type="checkbox" name="ogl_typ" value="1" onclick="document.getElementById('nazwa').style.display = this.checked ? 'none' : 'block'; this.form.elements['ogl_nazwa'].disabled = this.checked" />O anúncio pretende ser global</td>
																											</tr><tr>

<tr><td><div id="nazwa"><strong>Selecione um nome de anuncio:</strong><input id="ogl_nazwa" name="ogl_nazwa" class="text" value="" type="text" ></div>

</td></tr>		
			<tr><td><center><input name="sub" type="submit" value="Adicionar anuncio" class="btn btn-success btn-small"/>
<input type="reset" value="Limpar dados" class="btn btn-danger btn-small"/></center></td></tr>
		
	

				

</form>









</table>




{if count($ogloszenia) > 0}						
	<table>	<tr><th>Podgl�d istniej�cych og�osze�:</th></tr>	<tr><td>																		
		<div class="footer-holder">				
						{foreach from=$ogloszenia item=ogloszenie key=id}
							<div>
								<span class="{if $ogloszenie.typ != 0}global-{/if}news">{$ogloszenie.nazwa}</span>
								<strong>{$ogloszenie.data} <a href="admin.php?screen=ogloszenia&akcja=usun_ogloszenie&oid={$id}"/>Usu�</a></strong>
								<p>{$ogloszenie.text}</p>
										</div>
				
													{/foreach}
																																



</div>

</td></tr></table>{/if}











</table></table></table>
