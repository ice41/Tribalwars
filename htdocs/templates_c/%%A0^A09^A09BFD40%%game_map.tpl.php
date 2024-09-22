<?php /* Smarty version 2.6.14, created on 2011-06-18 10:33:47
         compiled from game_map.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'game_map.tpl', 49, false),)), $this); ?>
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

<h2>Continent <?php echo $this->_tpl_vars['continent']; ?>
</h2>

<table collspacing="1" collpadding="0"><tr><td valign="top">

	<table><tr style="padding: 0px 0px;"><td valign="top" style="padding: 0px 0px;"><table cellspacing="1" cellpadding="0" style="background-color: #f4e4bc; border: 1px solid rgb(128, 64, 0);"><tr><td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']-$this->_tpl_vars['map']['size']+1; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']+$this->_tpl_vars['map']['size']-1; ?>
"><img src="graphic/map/map_nw.png" style="z-index:1; position:relative;" alt="map/map_nw.png"/></a></td><td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']+$this->_tpl_vars['map']['size']-1; ?>
"><img src="graphic/map/map_n.png" style="z-index:1; position:relative;" alt="map/map_n.png"/></a></td><td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']+$this->_tpl_vars['map']['size']-1; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']+$this->_tpl_vars['map']['size']-1; ?>
"><img src="graphic/map/map_ne.png" style="z-index:1; position:relative;" alt="map/map_ne.png"/></a></td></tr><tr><td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']-$this->_tpl_vars['map']['size']+1; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']; ?>
"><img src="graphic/map/map_w.png" style="z-index:1; position:relative;" alt="map/map_w.png"/></a></td><td>
	
		<table style="background-color: #f8edce; border: 1px solid #f8edce; border-spacing: 0px;" cellspacing="0" cellpadding="0" class="map">
	
		<?php $_from = $this->_tpl_vars['y_coords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['y']):
?>
			<tr style="padding: 0px 0px;cursor: move;">
				<td width="20" style="padding: 0px 0px;"><?php echo $this->_tpl_vars['y']; ?>
</td>
				
			<?php $_from = $this->_tpl_vars['x_coords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['x']):
?>
				<?php if (! $this->_tpl_vars['cl_map']->getVillage($this->_tpl_vars['x'],$this->_tpl_vars['y'])): ?>
					<?php 
						$rand = rand(0,10);
					 ?>
					<td style="padding: 0px 0px;" id="tile_<?php echo $this->_tpl_vars['x']; ?>
_<?php echo $this->_tpl_vars['y']; ?>
" class="<?php echo $this->_tpl_vars['cl_map']->getClass($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
"><img src="graphic/map/
					<?php 
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
					 ?>
					" alt="" /></td>
				<?php else: ?>

         <td "id="tile_<?php echo $this->_tpl_vars['x']; ?>
_<?php echo $this->_tpl_vars['y']; ?>
" class="<?php echo $this->_tpl_vars['cl_map']->getClass($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
" style="background-color:rgb(<?php echo $this->_tpl_vars['cl_map']->getColor($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
)"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['cl_map']->getvillageid($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
"><img src="graphic/map/<?php echo $this->_tpl_vars['cl_map']->graphic($this->_tpl_vars['x'],$this->_tpl_vars['y']);  if (get_bonus($this->_tpl_vars[x], $this->_tpl_vars[y])) echo 'b.png'; ?>" onmouseover="map_popup('<?php echo $this->_tpl_vars['cl_map']->getVillage($this->_tpl_vars['x'],$this->_tpl_vars['y'],'name'); ?>
 (<?php echo $this->_tpl_vars['x']; ?>
|<?php echo $this->_tpl_vars['y']; ?>
) K <?php echo $this->_tpl_vars['cl_map']->getcon($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
', <?php echo $this->_tpl_vars['cl_map']->getvillage($this->_tpl_vars['x'],$this->_tpl_vars['y'],'points'); ?>
, <?php echo ((is_array($_tmp=$this->_tpl_vars['cl_map']->playerinfo($this->_tpl_vars['x'],$this->_tpl_vars['y']))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Punkte', 'Puncte') : smarty_modifier_replace($_tmp, 'Punkte', 'Puncte')); ?>
, <?php echo ((is_array($_tmp=$this->_tpl_vars['cl_map']->getally($this->_tpl_vars['x'],$this->_tpl_vars['y']))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Punkte', 'Puncte') : smarty_modifier_replace($_tmp, 'Punkte', 'Puncte')); ?>
, false, <?php echo $this->_tpl_vars['x']; ?>
, <?php echo $this->_tpl_vars['y']; ?>
, <?php echo $this->_tpl_vars['village']['id']; ?>
, <?php echo $this->_tpl_vars['cl_map']->getvillage($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
)" onmouseout="map_kill()" alt="" /></a></td>	

                <?php endif; ?>
          
			<?php endforeach; endif; unset($_from); ?>
			
			</tr>
		<?php endforeach; endif; unset($_from); ?>
			
		<tr >
			<td height="20"></td>
			<?php $_from = $this->_tpl_vars['x_coords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['x']):
?>
				<td><?php echo $this->_tpl_vars['x']; ?>
</td>
			<?php endforeach; endif; unset($_from); ?>
	</tr></table></td><td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']+$this->_tpl_vars['map']['size']-1; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']; ?>
"><img src="graphic/map/map_e.png" style="z-index:1; position:relative;" alt="map/map_e.png"/></a></td></tr><tr><td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']-$this->_tpl_vars['map']['size']+1; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']-$this->_tpl_vars['map']['size']+1; ?>
"><img src="graphic/map/map_sw.png" style="z-index:1; position:relative;" alt="map/map_sw.png"/></a></td><td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']-$this->_tpl_vars['map']['size']+1; ?>
"><img src="graphic/map/map_s.png" style="z-index:1; position:relative;" alt="map/map_s.png"/></a></td><td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']+$this->_tpl_vars['map']['size']-1; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']-$this->_tpl_vars['map']['size']+1; ?>
"><img src="graphic/map/map_se.png" style="z-index:1; position:relative;" alt="map/map_se.png"/></a></td></tr></table></td><td valign="top">
	
	</td></tr></table>
	
</td><td valign="top">

	<table><tr><td valign="top"><table cellspacing="1" cellpadding="0" style="background-color: #f4e4bc; border: 1px solid rgb(128, 64, 0);"><tr><td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']-50; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']+50; ?>
"><img src="graphic/map/map_nw.png" style="z-index:1; position:relative;" alt="map/map_nw.png"/></a></td><td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']+50; ?>
"><img src="graphic/map/map_n.png" style="z-index:1; position:relative;" alt="map/map_n.png"/></a></td><td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']+50; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']+50; ?>
"><img src="graphic/map/map_ne.png" style="z-index:1; position:relative;" alt="map/map_ne.png"/></a></td></tr><tr><td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']-50; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']; ?>
"><img src="graphic/map/map_w.png" style="z-index:1; position:relative;" alt="map/map_w.png"/></a></td><td>

	<form method="POST" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=map&action=bigMapOnclick">	
		<input type="hidden" name="startX" id="startX" value="<?php echo $this->_tpl_vars['xs']; ?>
" />
		<input type="hidden" name="startY" id="startY" value="<?php echo $this->_tpl_vars['ys']; ?>
" />
		<div style="position:relative; padding:0px">
			<div style="position:absolute;z-index:100">
				<input type="image" class="noneStyle" src="graphic/map/empty.png" style="cursor: move;width:251px;height:250px;margin:0px;padding:0px" />
			</div>
			<img src="graphic/continent/<?php echo $this->_tpl_vars['user']['id']; ?>
-<?php echo $this->_tpl_vars['conmap']; ?>
-<?php echo $this->_tpl_vars['contime']; ?>
.png">
			<div id="bigMapRect" style="z-index:10; position:absolute; top:<?php echo $this->_tpl_vars['bigMapRectTop']; ?>
px; left:<?php echo $this->_tpl_vars['bigMapRectLeft']; ?>
px; width:<?php echo $this->_tpl_vars['mapSize']*5-1; ?>
px; height:<?php echo $this->_tpl_vars['mapSize']*5-1; ?>
px; border: 1px solid rgb(213, 227, 174);"></div>
		</div>
	</form>
	
	</td><td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']+50; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']; ?>
"><img src="graphic/map/map_e.png" style="z-index:1; position:relative;" alt="map/map_e.png"/></a></td></tr><tr><td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']-50; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']-50; ?>
"><img src="graphic/map/map_sw.png" style="z-index:1; position:relative;" alt="map/map_sw.png"/></a></td><td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']-50; ?>
"><img src="graphic/map/map_s.png" style="z-index:1; position:relative;" alt="map/map_s.png"/></a></td><td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']+50; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']-50; ?>
"><img src="graphic/map/map_se.png" style="z-index:1; position:relative;" alt="map/map_se.png"/></a></td></tr></table></td><td valign="top">
	</td></tr></table>

<table class="vis" width="100%"> 
        <tr> 
            <th colspan="2">Centrarea h&#259;r&#355;ii</th> 
        </tr> 
        <tr> 
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map" method="post">
            <td class="nowrap"> 
                            x:&nbsp;<input type="text" name="x" id="inputx" value="<?php echo $this->_tpl_vars['map']['x']; ?>
" size="5" onkeyup="xProcess('inputx', 'inputy')" /> 
                y:&nbsp;<input type="text" name="y" id="inputy" value="<?php echo $this->_tpl_vars['map']['y']; ?>
" size="5" /> 
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