<br />
	<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><th>Submenu</th></tr>
		{foreach from=$links item=f_mode key=f_name}
	         {if $f_name=='Befehl'}
    	        {assign var='f_name' value='Comandos'}
        	 {/if}
	         {if $f_name=='Truppen'}
    	        {assign var='f_name' value='Tropas'}
        	 {/if}
			 {if $f_name=='Simulator'}
    	        {assign var='f_name' value='Simulador'}
        	 {/if}
		<tr>
			<td {if $f_mode==$mode}class="selected"{/if}>
				<a href="game.php?village={$village.id}&amp;screen=place&amp;mode={$f_mode}">{if $f_mode==$mode}&raquo; {/if}{$f_name}</a>
			</td>
		</tr>
		{/foreach}
	</table>
</td>
<td width="80%">
	<table>
		<tr>
			<td><img src="../graphic/build/place.jpg" title="Pra&ccedil;a de reuni&atilde;o" alt="" /></td>
			<td>
				<h2>Pra&ccedil;a de reuni&atilde;o ({$village.place|nivel})</h2>
				{$description}
			</td>
		</tr>
	</table>
	{if $show_build}
	<table width="100%">
		<tr>
			<td valign="top" width="100%">
			{if in_array($mode,$allow_mods)}
				{include file="game_place_$mode.tpl" title=foo}
			{/if}
			</td>
		</tr>
	</table>
	{/if}
</td>