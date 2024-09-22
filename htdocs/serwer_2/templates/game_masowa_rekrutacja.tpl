<form action="game.php?village={$village.id}&amp;screen=masowa_rekrutacja&amp;action=trenuj" method="post">
	{if $sekcja}
    <table class="vis" width="100%">
	    <tr>
		    <td>
			    {$sekcja_wiosek} 
			</td>
		</tr>
	</table>
	{/if}
    <table class="vis" width="100%">
        <tr>
		    <th>Osada</th>
			<th>Surowce</th>
			<th>
				<img src="graphic/face.png"/>
			</th>
            {foreach from=$units item=unit key=key}
                <th width="50">
					<img src="graphic/unit/{$key}.png" />
				</th>
            {/foreach}
            </tr>

            {foreach from=$masowa_rek_wioski item=wioska}
		        <tr{if $wioska.id == $village.id} class="lit"{/if}>
		            <td>
						{$bonus->get_bonus_mini_image($wioska.bonus)}
                        <a href="game.php?village={$wioska.id}&screen=barracks">
							{$wioska.name} ({$wioska.x}|{$wioska.y}) K{$wioska.continent}
						</a>
                    </td>
			        <td>
						<img src="graphic/holz.png"/>&nbsp;{$wioska.r_wood|format_number}<br>
			            <img src="graphic/lehm.png"/>&nbsp;{$wioska.r_stone|format_number}<br>
			            <img src="graphic/eisen.png"/>&nbsp;{$wioska.r_iron|format_number}<br>
			        </td>
		            <td>
		                <img src="graphic/face.png"/>&nbsp;
						{$wioska.wolni_osadnicy|format_number}
		            </td>
			
		            {foreach from=$units item=unit key=key}
                        <td>
		        	        {if $cl_units->get_recruits_counts($wioska.id,$key) === true}
					            <center><img src="graphic/dots/green.png"/>{$wioska.$key}</center>
							{else}
								<center><img src="graphic/dots/grey.png"/>&nbsp;{$wioska.$key}</center>
							{/if}
									
                            {php}if ($this->_tpl_vars['wioska']['tech_'.$this->_tpl_vars['key']] > 0):
								$this->_tpl_vars['max_units_cbr'] = $this->_tpl_vars['cl_units']->max_unit_can_be_recruited($this->_tpl_vars['wioska']['r_stone'],$this->_tpl_vars['wioska']['r_wood'],$this->_tpl_vars['wioska']['r_iron'],$this->_tpl_vars['wioska']['wolni_osadnicy'],$this->_tpl_vars['unit']['koszt_stone'],$this->_tpl_vars['unit']['koszt_wood'],$this->_tpl_vars['unit']['koszt_iron'],$this->_tpl_vars['unit']['koszt_bh']); {/php}
								{if $cl_units->czy_spelniono_wymagania($wioska.budynki,$cl_units->get_needed($key))}
									{if $wioska.budynki[$unit.rekrutuj_w] > 0}
										<center>
											<input name="massrek_{$wioska.id}-{$key}" type="text" size="4" maxlength="5" id="massrek_{$wioska.id}-{$key}" />
										</center>
										<center>
											<span class="click" onclick="insertNumId('massrek_{$wioska.id}-{$key}', '{$max_units_cbr}');countCoins();return false;">
												<span class="link">
													({$max_units_cbr|format_number})
												</span>
											</span>
										</center>
									{else}
										<INPUT READONLY NAME="massrek_{$wioska.id}-{$key}" size="4" style="background: rgb(222,222,222); border-color: rgb(188,99,55); margin-left: 1px; border: 1px" >
									{/if}
								{else}
									<INPUT READONLY NAME="massrek_{$wioska.id}-{$key}" size="4" style="background: rgb(222,222,222); border-color: rgb(188,99,55); margin-left: 1px; border: 1px" >
								{/if}
				            {php}else:{/php}
									<INPUT READONLY NAME="massrek_{$wioska.id}-{$key}" size="4" style="background: rgb(222,222,222); border-color: rgb(188,99,55); margin-left: 1px; border: 1px" >
					        {php}endif;{/php}
			            </td>
                    {/foreach}
		        </tr>
            {/foreach}
		    <tr>
		        <td colspan=15 style="height:24px;">
		            <input type="submit" name="submitex" value="trenuj" style="margin-top:1px; width:100px;"/>
	     	    </td>
		    <tr>
        </table>
    </form>