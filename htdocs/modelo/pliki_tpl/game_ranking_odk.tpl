<h3>Descobertas conquistadas da civilização ({$odk})</h3>
	<table class="vis">	<tr><th>Descoberta</th><th>Proprietário<th>Localizacao<th>Tribo</tr>																			
			
						{foreach from=$odkrycia item=o key=id}
							{php}
							
$vid = $this->_tpl_vars['o']['wioska'];
$v = sql("SELECT * FROM `villages` WHERE `id` = $vid","assoc");
if ($v['userid'] != -1) {
$pid = $v['userid'];
$p = sql("SELECT * FROM `users` WHERE `id` = $pid","assoc");
  
$aid = $p['ally'];
$a = sql("SELECT * FROM `ally` WHERE `id` = $aid","assoc");  }
							{/php}

							<tr><td>		
				<b><img src="../ds_graphic/secret_scroll_18x18.png"> {if $o.typ == 1}Fortaleza Estelar{/if} {if $o.typ == 2}Pólvora{/if} {if $o.typ == 3}Ocupado{/if} {if $o.typ == 4}decimais{/if} {if $o.typ == 5}relógio de sol{/if} {if $o.typ == 6}Mosquete{/if} {if $o.typ == 7}Republicanismo clássico{/if} {if $o.typ == 8}Szyfr{/if} {if $o.typ == 9}Cartografia{/if} {if $o.typ == 10}Pintura em perspectiva{/if} {if $o.typ == 11}Aanatomia/if} {if $o.typ == 12}Regra de gravação dupla{/if}
</td><td>{php}if ($v['userid'] != -1) {{/php}<a href="game.php?village={$village.id}&screen=info_player&id={php} echo $pid;{/php}">{php} echo $p['username'];{/php}</a>{php}} else {{/php} barbaros {php}}{/php}  </td>

<td><a href="game.php?village={$village.id}&screen=info_village&id={php} echo $vid;{/php}">{php} echo ''.$v['name'].' ('.$v['x'].'|'.$v['y'].') K'.$v['continent'].'';{/php}</a>   </td>

<td>{php}if ($v['userid'] != -1) {{/php}{php}if ($p['ally'] != -1) {{/php}<a href="game.php?village={$village.id}&screen=info_ally&id={php} echo $a['id'];{/php}">{php}$tests = stripslashes(urldecode($a['name']));
echo $tests;{/php} ({php}$tests = stripslashes(urldecode($a['short']));echo $tests;{/php})</a>{php}} else {{/php}Sem adulteracao{php}}{/php}

{php}} else {{/php} Sem uma tribo {php}}{/php}

      </tr>						
							{/foreach}
																																
</table>