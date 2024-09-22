<h3><center>{if !empty($err)}	<font color="red">{$err}</font>{/if}</center></h3><form action="admin.php?screen=toplist&akcja=dodaj_topke" method="post" onsubmit="return validateReplyForm(this)">	<table class="vis" width="50%">		<tr>			<th>Panel dodania toplisty do strony g³ównej:</th>		

		</tr>

<tr><td>
				<strong>Link toplisty:</strong>
<input id="link" name="link" class="text" value="" type="text">
			</td>

									</tr>
<tr><td>
				<strong>Obraz toplisty:</strong>
<input id="obraz" name="obraz" class="text" value="" type="text">
			</td>

									</tr>		


		
			<tr><td><center><input name="sub" type="submit" value="Dodaj topliste" class="btn btn-success btn-small"/></center></td></tr>
		

				

</form>



	





</table>
					<center>	
	<table class="vis">	<tr><th>Toplisty które s¹ na tej stronie:</th></tr>																			
						
						{foreach from=$toplisty item=toplista key=id}
														<tr><td><strong>Top lista dodana: {$toplista.data}<a href="admin.php?screen=toplist&akcja=usun_topke&oid={$id}"><img src="ds_graphic/delete.png" alt="Usuñ" title="Usuñ tê toplistê"></a></strong><a href="{$toplista.link}"><img src="{$toplista.obraz}"/></a></td></tr>															
													{/foreach}
																																



</div>

</table>