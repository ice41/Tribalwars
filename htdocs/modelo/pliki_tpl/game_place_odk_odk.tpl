

	
	<table class="vis">	<tr><th>Lista de Descobertas de Aldeias:</th></tr>																			
			
						{foreach from=$odkrycia item=o key=id}
							{if $o.wioska == $village.id}
						<tr><td>		
				<b><img src="../ds_graphic/secret_scroll_15x15.png"> {if $o.typ == 1}Fortaleza estrela{/if} {if $o.typ == 2}Pólvora{/if} {if $o.typ == 3}Ocupado{/if} {if $o.typ == 4}Decimais{/if} {if $o.typ == 5}relógio de sol{/if} {if $o.typ == 6}Muszkiet{/if} {if $o.typ == 7}republicanismo clássico{/if} {if $o.typ == 8}Cifra{/if} {if $o.typ == 9}Cartografia{/if} {if $o.typ == 10}Pintura em perspectiva{/if} {if $o.typ == 11}Anatomia{/if} {if $o.typ == 12}Regra de gravação dupla{/if}
							</td></tr>	{/if}					
							{/foreach}
																																





</table>