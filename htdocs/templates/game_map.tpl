<div id="info" style="position:absolute; top:0px; left:0px; width:350px; height:1px; visibility: hidden; z-index:10">
<table class="vis" style="background-color: #e5d7b2; width:auto">
<tr><th id="info_title" colspan="2">title</th></tr>
<tr><td id="bonusbild"></td><td id='bonus'></td></tr>
<tr><td>Puncte:</td><td id="info_points">points</td></tr>
<tr id="info_owner_row"><td>Proprietar:</td><td id="info_owner">owner</td></tr>
<tr id="info_left_row"><td colspan="2">p&#259;r&#259;sit</td></tr>
<tr id="info_ally_row"><td>Trib:</td><td id="info_ally">ally</td></tr>
<tr id="info_village_groups_row"><td>Grupe:</td><td id="info_village_groups">village_groups</td></tr>
<tr><td>Moral:</td><td id='moral'></td></tr>
</table>
</div>

<h2>Continent {$continent}</h2>

<table collspacing="1" collpadding="0"><tr><td valign="top">

	<table><tr style="padding: 0px 0px;"><td valign="top" style="padding: 0px 0px;"><table cellspacing="1" cellpadding="0" style="background-color: #f4e4bc; border: 1px solid rgb(128, 64, 0);"><tr><td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$map.x-$map.size+1}&amp;y={$map.y+$map.size-1}"><img src="graphic/map/map_nw.png" style="z-index:1; position:relative;" alt="map/map_nw.png"/></a></td><td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$map.x}&amp;y={$map.y+$map.size-1}"><img src="graphic/map/map_n.png" style="z-index:1; position:relative;" alt="map/map_n.png"/></a></td><td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$map.x+$map.size-1}&amp;y={$map.y+$map.size-1}"><img src="graphic/map/map_ne.png" style="z-index:1; position:relative;" alt="map/map_ne.png"/></a></td></tr><tr><td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$map.x-$map.size+1}&amp;y={$map.y}"><img src="graphic/map/map_w.png" style="z-index:1; position:relative;" alt="map/map_w.png"/></a></td><td>
	
		<table style="background-color: #f8edce; border: 1px solid #f8edce; border-spacing: 0px;" cellspacing="0" cellpadding="0" class="map">
	
		{foreach from=$y_coords item=y}
			<tr style="padding: 0px 0px;cursor: move;">
				<td width="20" style="padding: 0px 0px;">{$y}</td>
				
			{foreach from=$x_coords item=x}
				{if !$cl_map->getVillage($x,$y)}
					{php}
						$rand = rand(0,10);
					{/php}
					<td style="padding: 0px 0px;" id="tile_{$x}_{$y}" class="{$cl_map->getClass($x,$y)}"><img src="graphic/map/
					{php}
						if($rand <=8)
						{
							echo "gras4.png";
						}					
						else if($rand==9)
						{
							echo "forest0000.png";
						}
						if ($rand==10)
						{
							echo "see.png";
						}
					{/php}
					" alt="" /></td>
				{else}

         <td "id="tile_{$x}_{$y}" class="{$cl_map->getClass($x,$y)}" style="background-color:rgb({$cl_map->getColor($x,$y)})"><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$cl_map->getvillageid($x,$y)}"><img src="graphic/map/{$cl_map->graphic($x,$y)}{php}if (get_bonus($this->_tpl_vars[x], $this->_tpl_vars[y])) echo 'b.png';{/php}" onmouseover="map_popup('{$cl_map->getVillage($x,$y,"name")} ({$x}|{$y}) K {$cl_map->getcon($x,$y)}', {$cl_map->getvillage($x,$y,points)}, {$cl_map->playerinfo($x,$y)|replace:'Punkte':'Puncte'}, {$cl_map->getally($x,$y)|replace:'Punkte':'Puncte'}, false, {$x}, {$y}, {$village.id}, {$cl_map->getvillage($x,$y)})" onmouseout="map_kill()" alt="" /></a></td>	

                {/if}
          
			{/foreach}
			
			</tr>
		{/foreach}
			
		<tr >
			<td height="20"></td>
			{foreach from=$x_coords item=x}
				<td>{$x}</td>
			{/foreach}
	</tr></table></td><td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$map.x+$map.size-1}&amp;y={$map.y}"><img src="graphic/map/map_e.png" style="z-index:1; position:relative;" alt="map/map_e.png"/></a></td></tr><tr><td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$map.x-$map.size+1}&amp;y={$map.y-$map.size+1}"><img src="graphic/map/map_sw.png" style="z-index:1; position:relative;" alt="map/map_sw.png"/></a></td><td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$map.x}&amp;y={$map.y-$map.size+1}"><img src="graphic/map/map_s.png" style="z-index:1; position:relative;" alt="map/map_s.png"/></a></td><td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$map.x+$map.size-1}&amp;y={$map.y-$map.size+1}"><img src="graphic/map/map_se.png" style="z-index:1; position:relative;" alt="map/map_se.png"/></a></td></tr></table></td><td valign="top">
	
	</td></tr></table>
	
</td><td valign="top">

	<table><tr><td valign="top"><table cellspacing="1" cellpadding="0" style="background-color: #f4e4bc; border: 1px solid rgb(128, 64, 0);"><tr><td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$map.x-50}&amp;y={$map.y+50}"><img src="graphic/map/map_nw.png" style="z-index:1; position:relative;" alt="map/map_nw.png"/></a></td><td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$map.x}&amp;y={$map.y+50}"><img src="graphic/map/map_n.png" style="z-index:1; position:relative;" alt="map/map_n.png"/></a></td><td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$map.x+50}&amp;y={$map.y+50}"><img src="graphic/map/map_ne.png" style="z-index:1; position:relative;" alt="map/map_ne.png"/></a></td></tr><tr><td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$map.x-50}&amp;y={$map.y}"><img src="graphic/map/map_w.png" style="z-index:1; position:relative;" alt="map/map_w.png"/></a></td><td>

	<form method="POST" action="game.php?village={$village.id}&screen=map&action=bigMapOnclick">	
		<input type="hidden" name="startX" id="startX" value="{$xs}" />
		<input type="hidden" name="startY" id="startY" value="{$ys}" />
		<div style="position:relative; padding:0px">
			<div style="position:absolute;z-index:100">
				<input type="image" class="noneStyle" src="graphic/map/empty.png" style="cursor: move;width:251px;height:250px;margin:0px;padding:0px" />
			</div>
			<img src="graphic/continent/{$user.id}-{$conmap}-{$contime}.png">
			<div id="bigMapRect" style="z-index:10; position:absolute; top:{$bigMapRectTop}px; left:{$bigMapRectLeft}px; width:{$mapSize*5-1}px; height:{$mapSize*5-1}px; border: 1px solid rgb(213, 227, 174);"></div>
		</div>
	</form>
	
	</td><td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$map.x+50}&amp;y={$map.y}"><img src="graphic/map/map_e.png" style="z-index:1; position:relative;" alt="map/map_e.png"/></a></td></tr><tr><td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$map.x-50}&amp;y={$map.y-50}"><img src="graphic/map/map_sw.png" style="z-index:1; position:relative;" alt="map/map_sw.png"/></a></td><td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$map.x}&amp;y={$map.y-50}"><img src="graphic/map/map_s.png" style="z-index:1; position:relative;" alt="map/map_s.png"/></a></td><td align="center"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$map.x+50}&amp;y={$map.y-50}"><img src="graphic/map/map_se.png" style="z-index:1; position:relative;" alt="map/map_se.png"/></a></td></tr></table></td><td valign="top">
	</td></tr></table>

<table class="vis" width="100%"> 
        <tr> 
            <th colspan="2">Centrarea h&#259;r&#355;ii</th> 
        </tr> 
        <tr> 
<form action="game.php?village={$village.id}&amp;screen=map" method="post">
            <td class="nowrap"> 
                            x:&nbsp;<input type="text" name="x" id="inputx" value="{$map.x}" size="5" onkeyup="xProcess('inputx', 'inputy')" /> 
                y:&nbsp;<input type="text" name="y" id="inputy" value="{$map.y}" size="5" /> 
                        </td> 
            <td> 
                <input type="submit" value="OK" /> 
            </td> 
        </tr> 
    </table>  
</form> 
</td></tr></table>
<br />
<table style="border:solid 1px #8c5f0d; background-color: #f4e4bc; margin-left: 0px; border-collapse:separate; text-align:left;">
<tbody>
<tr class="nowrap">
<td class="small">Standard:</td>
<td width="10" style="background-color: rgb(255, 255, 255);"/>
<td class="small">Ales</td>
<td width="10" style="background-color: rgb(240, 200, 0);"/>
<td class="small">Sate proprii</td>
<td width="10" style="background-color: rgb(0, 0, 244);"/>
<td class="small">Tribul meu</td>
<td width="10" style="background-color: rgb(150, 150, 150);"/>
<td class="small">Sate p&#259;r&#259;site</td>
<td width="10" style="background-color: rgb(180, 0, 0);"/>
<td class="small">Altele</td>
</tr>
<tr class="nowrap">
<td class="small">Trib:</td>
<td width="10" style="background-color: rgb(0, 160, 244);"/>
<td class="small">Alia&#355;i</td>
<td width="10" style="background-color: rgb(128, 0, 128);"/>
<td class="small">Pact de neatacare (PNA)</td>
<td width="10" style="background-color: rgb(244, 0, 0);"/>
<td class="small">Du&#351;mani</td>
</tr>
</table>