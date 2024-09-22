

<br>
<table>
<tr>
  <td width="600" valign="top" valign="top">
   <table class="vis" width="100%">
        <tr>
                <th colspan="2">
          <i>Edifícios</i>
         </th>
        </tr>
        {if $style == 'new'}
         <tr>
          <td width="60%">
           <a href="game.php?village={$village.id}&screen=overview&akcja=o_labels"><span>{if $labels}Ocultar níveis de construção{else}Mostrar níveis de construção{/if}</span></a>
          </td>
          <td>
          <a href="game.php?village={$village.id}&screen=overview&akcja=o_style"><span style="text-align:right;">Visão geral clássica da aldeia</span></a>
          </td>
         </tr>
         <tr>
          <td colspan="2">
           <table cellpadding="5">
                <tr>
                 <td>
                  <div style="position: relative; width: 600px;height: 418px; background-image: url(/ds_graphic/{$visual}/back_none.jpg);"/>
                   <img class="empty" src="/ds_graphic/map/empty.png" alt="" usemap="#mapa" />
                   <map name="mapa" id="mapa">
                        {foreach from=$cl_builds->get_array('dbname') item=dbname key=id}
                         {if $village.$dbname > 0}
                          {if $cl_builds->get_maxstage($dbname) == 1}
                           <area shape="poly" coords="{$builds_graphic_coords.$dbname}" href="game.php?village={$village.id}&screen={$dbname}" alt="{$cl_builds->get_name($dbname)}" title="{$cl_builds->get_name($dbname)}"/>
                            {if $dbname == 'place'}
				   <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}1.{$barracks}" alt=""/></a>
                            {/if}
		            {if $dbname == 'snob'}
				   <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}1.{$snob}" alt=""/></a>
                            {/if}
		            {if $dbname == 'statue'}
				   <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}1.png" alt=""/></a>
                            {/if}
		            {if $dbname == 'church'}
				   <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}3.png" alt=""/></a>
                            {/if}							
		           {if $labels}
                                <label class="stagetip label_{$dbname}"><a href="game.php?village={$village.id}&screen={$dbname}">{$village.$dbname}</a></label>
								
                           {/if}
                          {else}
                           {if $dbname == 'snob' || $dbname == 'hide'}
                                <area shape="poly" coords="{$builds_graphic_coords.$dbname}" href="game.php?village={$village.id}&screen={$dbname}" alt="{$cl_builds->get_name($dbname)}" title="{$cl_builds->get_name($dbname)}"/> 
					   <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}1.png" alt=""/></a>
					  {if $labels}
                                 <label class="stagetip label_{$dbname}"><a href="game.php?village={$village.id}&screen={$dbname}">{$village.$dbname}</a></label>
                                {/if}
                           {else}
                                {php}
                                 $this->_tpl_vars['aktu_build_prc'] = $this->_tpl_vars['village'][$this->_tpl_vars['dbname']] / $this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['dbname']);
                                {/php}
                                {if $aktu_build_prc > 0.5}
                                 <area shape="poly" coords="{$builds_graphic_coords.$dbname}" href="game.php?village={$village.id}&screen={$dbname}" alt="{$cl_builds->get_name($dbname)}" title="{$cl_builds->get_name($dbname)}"/>
                                 {if $dbname == 'main'}
                                  <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_mainflag" src="/ds_graphic/{$visual}/mainflag3.gif" alt=""/></a>
                                 {/if}
				 {if $dbname == 'main'}
                 <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}3.{$main}" alt=""/></a>
				 {/if}
				 {if $dbname == 'smith'}
                 <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}3.{$smith}" alt=""/></a>
				 {/if}
				 {if $dbname == 'garage'}
                 <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}3.{$garage}" alt=""/></a>
				 {/if}
				 {if $dbname == 'stable'}
                 <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}3.{$stable}" alt=""/></a>
				 {/if}
				 
				 {if $dbname == 'wood'}
                 <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}3.{$wood}" alt=""/></a>
				 {/if}
				 {if $dbname == 'stone'}
                 <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}3.{$stone}" alt=""/></a>
				 {/if}
				 {if $dbname == 'iron'}
                 <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}3.{$iron}" alt=""/></a>
				 {/if}
				 {if $dbname == 'farm'}
                 <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}3.{$farm}" alt=""/></a>
				 {/if}
			         {if $dbname == 'barracks' || $dbname == 'wall' || $dbname == 'market' || $dbname == 'church' || $dbname == 'storage'}
				  <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}3.png" alt=""/></a>
			         {/if}
				{if $labels}
                                  <label class="stagetip label_{$dbname}"><a href="game.php?village={$village.id}&screen={$dbname}">{$village.$dbname}</a></label>
                                {/if}
                                {else}
                                 {if $aktu_build_prc > 0.2}
                                  <area shape="poly" coords="{$builds_graphic_coords.$dbname}" href="game.php?village={$village.id}&screen={$dbname}" alt="{$cl_builds->get_name($dbname)}" title="{$cl_builds->get_name($dbname)}"/>
                                  {if $dbname == 'main'}
                                   <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_mainflag" src="/ds_graphic/{$visual}/mainflag2.gif" alt=""/></a>
                                  {/if}
				 {if $dbname == 'main'}
                 <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}2.{$main}" alt=""/></a>
				 {/if}
				 {if $dbname == 'smith'}
                 <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}2.{$smith}" alt=""/></a>
				 {/if}
				 {if $dbname == 'garage'}
                 <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}2.{$garage}" alt=""/></a>
				 {/if}
				 {if $dbname == 'stable'}
                 <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}2.{$stable}" alt=""/></a>
				 {/if}
				 {if $dbname == 'church'}
                 <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}2.{$church}" alt=""/></a>
				 {/if}
				 {if $dbname == 'wood'}
                 <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}2.{$wood}" alt=""/></a>
				 {/if}
				 {if $dbname == 'stone'}
                 <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}2.{$stone}" alt=""/></a>
				 {/if}
				 {if $dbname == 'iron'}
                 <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}2.{$iron}" alt=""/></a>
				 {/if}
				 {if $dbname == 'farm'}
                 <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}2.{$farm}" alt=""/></a>
				 {/if}
			         {if $dbname == 'barracks' || $dbname == 'wall' || $dbname == 'market' || $dbname == 'church' || $dbname == 'storage'}
				  <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}2.png" alt=""/></a>
			         {/if}
				  {if $labels}
                                   <label class="stagetip label_{$dbname}"><a href="game.php?village={$village.id}&screen={$dbname}">{$village.$dbname}</a></label>
                                  {/if}
                                 {else}
                                  <area shape="poly" coords="{$builds_graphic_coords.$dbname}" href="game.php?village={$village.id}&screen={$dbname}" alt="{$cl_builds->get_name($dbname)}" title="{$cl_builds->get_name($dbname)}"/>
                                  {if $dbname == 'main'}
                                   <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_mainflag" src="/ds_graphic/{$visual}/mainflag1.gif" alt=""/></a>
                                  {/if}
				 {if $dbname == 'main'}
                 <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}1.{$main}" alt=""/></a>
				 {/if}
				 {if $dbname == 'smith'}
                 <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}1.{$smith}" alt=""/></a>
				 {/if}
				 {if $dbname == 'garage'}
                 <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}1.{$garage}" alt=""/></a>
				 {/if}
				 {if $dbname == 'stable'}
                 <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}1.{$stable}" alt=""/></a>
				 {/if}
                 {if $dbname == 'church'}
                 <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}1.{$church}" alt=""/></a>
				 {/if}
				 {if $dbname == 'wood'}
                 <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}1.{$wood}" alt=""/></a>
				 {/if}
				 {if $dbname == 'stone'}
                 <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}1.{$stone}" alt=""/></a>
				 {/if}
				 {if $dbname == 'iron'}
                 <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}1.{$iron}" alt=""/></a>
				 {/if}
				 {if $dbname == 'farm'}
                 <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}1.{$farm}" alt=""/></a>
				 {/if}
			         {if $dbname == 'barracks' || $dbname == 'wall' || $dbname == 'market' || $dbname == 'church' || $dbname == 'storage'}
				  <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}1.png" alt=""/></a>
			         {/if}
				  {if $labels}
                                   <label class="stagetip label_{$dbname}"><a href="game.php?village={$village.id}&screen={$dbname}">{$village.$dbname}</a></label>
                                  {/if}
                                 {/if}
                                {/if}
                           {/if}
                          {/if}
                         {else}
                          {php}
                           if (get_counts_on_build($this->_tpl_vars['village']['id'],$this->_tpl_vars['dbname']) > 0):
                          {/php}
                           <img class="align_{$dbname}" src="/ds_graphic/{$visual}/{$dbname}0.gif" alt=""/>
                          {php}
                           endif;
                          {/php}
                         {/if}
                        {/foreach}
                
                        
			{if $anim == 1}
                         <a href="game.php?village={$village.id}&screen={$dbname}"><img class="align_conversation" src="/ds_graphic/{$visual}/conversation.gif" alt=""/>
                        {/if}
			{if $anim == 2}
                         <img class="align_juggler" src="/ds_graphic/{$visual}/juggler.gif" alt=""/>
                        {/if}
            {if $anim == 3}
			 <img class="align_guard" src="/ds_graphic/{$visual}/guard.gif" alt=""/>
                        {/if}
			{if $village.r_bh < $max_bh}
			 <img class="align_farmer" src="/ds_graphic/{$visual}/farmer.gif" alt=""/>
                        {/if}
                   </map>
                  </div>
                 </td>
                </tr>
           </table>
          </td> 
         </tr>
        
        {elseif $style == 'classic'}
         <tr>
          <td>
           <a href="game.php?village={$village.id}&screen=overview&akcja=o_style">
                <span style="text-align:right;">
                 Para uma visão geral gráfica da aldeia
                </span>
           </a>
          </td>
         </tr>
         {foreach from=$built_builds item=dbname key=id}
          <tr>
           <td>
                <a href="game.php?village={$village.id}&screen={$dbname}"><img src="/ds_graphic/buildings/{$dbname}.png"> {$cl_builds->get_name($dbname)}</a>
                 (Nível {$village.$dbname})
                </td>
          </tr>
         {/foreach}
        {/if}

        <tr>
         {* Andere Angriffe auf das aktuelle Dorf *}
         {if count($other_movements)>0}
          <td colspan="2">
           <table class="vis" width="100%">
                <tr>
                 <th>Outras ordens ({php}echo count($this->_tpl_vars['other_movements']);{/php})</th>
                 <th>No local</th>
                 <th>No local às</th>
                </tr>
                {foreach from=$other_movements item=array}
                 <tr>
                  <td>
                   <a href="game.php?village={$village.id}&amp;screen=info_command&amp;id={$array.id}&amp;type=other">
                        <img src="/ds_graphic/command/{$array.type}.png"> {$array.message}
                   </a>
                  </td>
                  <td>
                   {$array.end_time}
                  </td>
                  {if $array.arrival_in<0}
                   <td>
                        {$array.arrival_in|format_time}
                   </td>
                  {else}
                   <td>
                        <span class="timer">
                         {$array.arrival_in|format_time}
                        </span>
                   </td>
                  {/if}
                 </tr>
                {/foreach}
           </table>
          </td>
         {/if}
        </tr>
        <tr>
         {* Eigene losgeschickte Angriffe *}
         {if count($my_movements)>0}
          <td colspan="2">
          <br>
           <table class="vis" width="100%">
                <tr>
                 <th>Próprias Ordens ({php}echo count($this->_tpl_vars['my_movements']);{/php})</th>
                 <th>No local</th>
                 <th>No local às</th>
                </tr>
                {foreach from=$my_movements item=array}
                 <tr>
                  <td>
                   <a href="game.php?village={$village.id}&amp;screen=info_command&amp;id={$array.id}&amp;type=own">
                        <img src="/ds_graphic/command/{$array.type}.png"> {$array.message}
                   </a>
                  </td>
                  <td>
                   {$array.end_time}
                  </td>
                  {if $array.arrival_in<0}
                   <td>
                        {$array.arrival_in|format_time}
                   </td>
                  {else}
                   <td>
                        <span class="timer">
                         {$array.arrival_in|format_time}
                        </span>
                   </td>
                  {/if}
                  {if $array.can_cancel}
                   <td>
                        <a href="game.php?village={$village.id}&amp;screen=place&amp;action=cancel&amp;id={$array.id}&amp;h={$hkey}">
                         Cancelar
                        </a>
                   </td>
                  {/if}
                 </tr>
                {/foreach}
           </table>
          </td>
         {/if}
        </tr>
   </table>
  </td>

  <td valign="top" {if $style == 'new'}width="100%{/if}{if $style == 'classic'}width="40%{/if}">
   {if $noob}
        <table class="vis" width="100%">
         <tr>
          <th>
           <i>Proteção inicial</i>
          </th>
         </tr>
         <tr>
          <td>
           acaba {$noob_end}
          </td>
         </tr>
        </table>
        <br />
   {/if}
<div id="show_prod" class="vis moveable widget">
	<h4 class="head">
		<img style="float: right; cursor: pointer;" onclick="return VillageOverview.toggleWidget( 'show_prod', this );" src="graphic/minus.png">		Produção
	</h4>
	<div class="widget_content" style="display: block;"><table width="100%">
			<tbody><tr class="nowrap">
			<td width="70">
								<a href="game.php?village={$village.id}&amp;screen=wood"><span class="icon header wood"> </span></a> Madeira
							</td>
			<td>
				<strong> {$wood_per_hour|format_number}</strong> por hora			</td>
		</tr>
			<tr class="nowrap">
			<td width="70">
								<a href="game.php?village={$village.id}&amp;screen=stone"><span class="icon header stone"> </span></a> Argila
							</td>
			<td>
				<strong> {$stone_per_hour|format_number}</strong> por hora			</td>
		</tr>
			<tr class="nowrap">
			<td width="70">
								<a href="game.php?village={$village.id}&amp;screen=iron"><span class="icon header iron" > </span></a> Ferro
							</td>
			<td>
				<strong> {$iron_per_hour|format_number}</strong> por hora			</td>
		</tr>
			<tr>
		
	</tr>
	</tbody></table>
</div>
</div>

<div style="opacity: 1;" id="show_units" class="vis moveable widget">
	<h4 class="head">
		<img style="float: right; cursor: pointer;" onclick="return VillageOverview.toggleWidget( 'show_units', this );" src="graphic/minus.png">		Unidades
	</h4>
	<div class="widget_content" style="display: block;"><table class="vis" width="100%">
					<tbody>
                                {foreach from=$in_village_units item=num key=dbname}
                                 <tr>
          <td>
           <a href="#" class="unit_link" onclick="return UnitPopup.open(event, '{$dbname}')"><img src="/ds_graphic/unit/{$dbname}.png">
           <b></a>
                {$num}
           </b>
           {if $dbname === 'unit_paladin'}
                {$pala_name}
           {else}
                {$cl_units->get_name($dbname)}
           {/if}
          </td>
         </tr>
                                {/foreach}
        <tr>
         <td><a href="game.php?village={$village.id}&amp;screen=train&mode=train">Recrutar</a></td>
        </tr>
	</tbody></table>
</div>
</div>
<script type="text/javascript" src="/js/unit_popup.js"></script>
{literal}<script type="text/javascript">
//<![CDATA[
	$(function() {
		UnitPopup.unit_data = {"spear":{"name":"Lanceiro\u00f3w","desc":"Lanceiro é o mais simples\u0105 unidade\u0105. É eficaz na defesa contra eles\u017ada.","wood":50,"stone":30,"iron":10,"pop":1,"speed":0.0009259259259,"attack":10,"attack_buildings":null,"defense":15,"defense_cavalry":45,"defense_archer":20,"carry":25,"type":"infantry","image":"unit\/unit_spear.png","prod_building":"barracks","attackpoints":4,"defpoints":1,"build_time":1020,"shortname":"Lança","count":"40","reqs":[{"building_id":"barracks","building_link":"\/game.php?village=5886&amp;screen=barracks","name":"Koszary","level":1}]},"sword":{"name":"Espadachim\u00f3w","desc":"Espadachim s\u0105 eficaz contra a infantaria. Jogada\u0105 si\u0119 porém bem devagar.","wood":30,"stone":30,"iron":70,"pop":1,"speed":0.0007575757576,"attack":25,"attack_buildings":null,"defense":50,"defense_cavalry":15,"defense_archer":40,"carry":15,"type":"infantry","image":"unit\/unit_sword.png","prod_building":"barracks","attackpoints":5,"defpoints":2,"build_time":1500,"shortname":"Espada","count":"21","reqs":[{"building_id":"smith","building_link":"\/game.php?village=5886&amp;screen=smith","name":"Ku\u017ania","level":1}]},"axe":{"name":"Viking\u00f3w","desc":"Viking to mocna jednostka atakuj\u0105ca. Jak szaleni atakuj\u0105 wioski przeciwnik\u00f3w.","wood":60,"stone":30,"iron":40,"pop":1,"speed":0.0009259259259,"attack":40,"attack_buildings":null,"defense":10,"defense_cavalry":5,"defense_archer":10,"carry":10,"type":"infantry","image":"unit\/unit_axe.png","prod_building":"barracks","attackpoints":1,"defpoints":4,"build_time":1320,"shortname":"Top\u00f3r","count":"10","reqs":[{"building_id":"smith","building_link":"\/game.php?village=5886&amp;screen=smith","name":"Ku\u017ania","level":2}],"tech_costs":{"wood":700,"stone":840,"iron":820}},"knight":{"name":"Paladino","desc":"Paladino chroni twoj\u0105 wiosk\u0119, jak r\u00f3wnie\u017c twoich sprzymierze\u0144c\u00f3w, przed obcymi napadami. Ka\u017cdy gracz mo\u017ce posiada\u0107 tylko jednego rycerza.","wood":20,"stone":20,"iron":40,"pop":10,"speed":0.001666666667,"attack":150,"attack_buildings":null,"defense":250,"defense_cavalry":400,"defense_archer":150,"carry":100,"type":"cavalry","image":"unit\/unit_knight.png","prod_building":"statue","attackpoints":40,"defpoints":20,"build_time":21600,"shortname":"Paladino"}};
		UnitPopup.init();
			});
//]]>
</script>{/literal}
			<script type="text/javascript" src="./js/promo_popup.js?1378724545"></script>
			<script type="text/javascript" src="./js/overniew.js?1378724545"></script>			
<div id="inline_popup" class="hidden" style="width:700px;">
	<div id="inline_popup_menu">
		<span id="inline_popup_title"></span>
		<a id="inline_popup_close" href="javascript:inlinePopupClose()">X</a>
	</div>
	<div id="inline_popup_main" style="height: auto;">
		<div id="inline_popup_content"></div>
	</div>
</div>

<div id="unit_popup_template" style="display: none">
		<div class="inner-border main content-border" style="border: none; font-weight: normal">
			<table style="float: left;width:450px">
			<tr>
				<td>
					<p class="unit_desc"></p>
				</td>
			</tr>
			<tr>
				<td>
					<table style="border: 1px solid #DED3B9;" class="vis" width="100%">
						<tr>
							<th width="180">Koszta</th>
							<th>População</th>
							<th>Velocidade</th>
							<th>Carregar</th>
						</tr>
						<tr class="center">
							<td><nobr><span class="icon header wood"> </span><span class="unit_wood"></span></nobr> <nobr><span class="icon header stone"> </span><span class="unit_stone"></span></nobr> <nobr><span class="icon header iron" > </span><span class="unit_iron"></span></nobr></td>
							<td><span class="icon header population"> </span><span class="unit_pop"></span></td>
							<td id="unit_speed"></td>
							<td class="unit_carry"></td>
						</tr>
					</table>
					<br />

					<table class="vis event_loot" style="display: none; width: 100%">
						<tr>
							<th colspan="2">Detalhes do evento</th>
						</tr>
						<tr>
							<td>Carregar:</td>
							<td><span class="unit_event_loot"></span> <span class="unit_event_res_name"></span></td>
					</table>
					<br />

					<table class="vis has_levels_only" style="border: 1px solid #DED3B9;text-align:center" class="vis"  width="100%">
						<tr><th colspan="3">Estatísticas de batalha</th></tr>
						<tr><td align="left">A força do ataque</td><td width="20px"><img src="../ds_graphic/unit/att.png?1bdd4" alt="A força do ataque" /></td><td><span class="unit_attack"></span></td></tr>
						<tr><td align="left">Defesa em geral</td><td><img src="../ds_graphic/unit/def.png?12421" alt="Defesa em geral" /></td><td><span class="unit_defense"></span></td></tr>
						<tr><td align="left">Defesa contra cavalaria</td><td><img src="../ds_graphic/unit/def_cav.png?46b3d" alt="Defesa contra cavalaria" /></td><td><span class="unit_defense_cavalry"></span></td></tr>
												<tr><td align="left">Defesa contra arqueiros</td><td><img src="../ds_graphic/unit/def_archer.png?faccf" alt="Defesa contra arqueiros" /></td><td><span class="unit_defense_archer"></span></td></tr>
											</table>
					<br />

					<div class="show_if_has_reqs">
						<table class="vis" width="100%">
							<tr><th id="reqs_count" colspan="1">Requisitos para poder pesquisar uma unidade</th></tr>
							<tr id="reqs"></tr>
						</table>
						<br />
					</div>

					<table class="unit_tech vis unit_tech_levels"  width="100%">
						<tr style="text-align:center">
							<th>Nível tecnológico</th>
							<th width="350">Custos de teste (se necessário)</th>
							<th width="30" style="text-align:center"><img src="../ds_graphic/unit/att.png?1bdd4" alt="A força do ataque" /></th>
							<th width="30" style="text-align:center"><img src="../ds_graphic/unit/def.png?12421" alt="Defesa em geral" /></th>
							<th width="30" style="text-align:center"><img src="../ds_graphic/unit/def_cav.png?46b3d" alt="Defesa contra cavalaria" /></th>
							<th width="30" style="text-align:center"><img src="../ds_graphic/unit/def_archer.png?faccf" alt="Defesa contra arqueiros" /></th>						</tr>
						<tr id="unit_tech_prototype" style="display: none;text-align:center">
							<td class="tech_level"></td>
							<td>
								<span class="grey tech_researched">já pesquisado</span>
								<span class="tech_res_list">
									<span class="icon header wood"> </span><span class="tech_wood"></span> <span class="icon header stone"> </span><span class="tech_stone"></span> <span class="icon header iron" > </span><span class="tech_iron"></span>
								</span>
							</td>
							<td class="tech_att"></td>
							<td class="tech_def"></td>
							<td class="tech_def_cav"></td>
														<td class="tech_def_archer"></td>
													</tr>
					</table>
					<table class="vis unit_tech unit_tech_cost"  width="100%">
						<tr><th>Custos de teste (se necessário)</th></tr>
						<tr><td><span class="icon header wood"> </span><span class="tech_cost_wood"></span> <span class="icon header stone"> </span><span class="tech_cost_stone"></span> <span class="icon header iron" > </span><span class="tech_cost_iron"></span></td></tr>
					</table>
				</td>
			</tr>
		</table>
		<img style="margin-top: 60px; max-width: 200px; display: none" id="unit_image" src="graphic/map/empty.png" alt="" />
		</div>
	</div>

<div id="show_group" class="vis moveable widget">
	<h4 class="head">
		<img style="float: right; cursor: pointer;" onclick="return VillageOverview.toggleWidget( 'show_group', this );" src="graphic/minus.png">		Grupo
	</h4>
	<div class="widget_content" style=""><table class="vis" width="100%">
		<tbody>        {if $village.group === 'all'}
         <tr>
          <td>
           <a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=grocusto">Adicionar</a>
          </td>
         </tr>
        {else}
         <tr>
          <td>
           {$village.group}
          </td>
         </tr>
         <tr>
          <td>
           <a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=grocusto">Adicionar</a>
          </td>
         </tr>
        {/if}
	</tbody></table>
</div>
</div>


   <br />
   <br />
 {literal}  <style>
   .green-bar {
    height: 5px;
    background-color: green;
}
.yellow-bar {
    height: 5px;
    background-color: yellow;
}
.orange-bar {
    height: 5px;
    background-color: orange;
}
.red-bar {
    height: 5px;
    background-color: red;
}
   </style>
 

   {/literal}
   
<div id="show_agreement" class="vis moveable widget">
	<h4 class="head">
		<img style="float: right; cursor: pointer;" onclick="return VillageOverview.toggleWidget( 'show_agreement', this );" src="graphic/minus.png">		Moral
	</h4>
	<div class="widget_content" style=""><table class="vis" width="100%">
		<tbody>    <tr>              <div id="pop"><t{if $color == yellow}h{else}d{/if} style="color: {$color}">
           <center>{$village.agreement} / <font color="green">100</font>
	</center>
		    <div class="{$color}-bar" style=" width: {$village.agreement}%;">
          </td></div></tr>
	</tbody></table>
</div>
</div>  


{if $village.bonus == 0 && $premium}<div id="show_b" class="vis moveable widget">
	<h4 class="head">
		<img style="float: right; cursor: pointer;" onclick="return VillageOverview.toggleWidget( 'show_b', this );" src="graphic/minus.png">		Resgatar um bônus de aldeia!
	</h4>
	<div class="widget_content" style=""><table class="vis" width="100%">
		<tbody>    <tr>              
		
		Se quiser comprar um bônus para aldeia, deve ter Pontos Premium :<center><a href="game.php?village={$village.id}&screen=kody">códigos</a></center>
		{if $user.premium_p >= 50}
		<form action="game.php?village={$village.id}&screen=overview&akcja=bonus" method="post">
		<td>Pontos premium: <b>{$ilosc_sz}</b></td><tr><td><b>Um bônus custa 50 Premium!</b></td>
		<tr><th>Escolha um bônus:</th>
		<tr><td><input type="radio" name="bonus" value="1" checked="checked"/> Aumento da capacidade da fazenda e comerciantes
        <tr><td><input type="radio" name="bonus" value="2" /> Aumento da produção de recursos (todos os recursos)
		<tr><td><input type="radio" name="bonus" value="3" /> Mais produção de madeira
		<tr><td><input type="radio" name="bonus" value="4" /> Mais produção de argila
		<tr><td><input type="radio" name="bonus" value="5" /> Aumento da produção de ferro
		<tr><td><input type="radio" name="bonus" value="6" /> Treinamento mais rápido no quartel
		<tr><td><input type="radio" name="bonus" value="7" /> Treinamento mais rápido nos estábulos
		<tr><td><input type="radio" name="bonus" value="8" /> Produção mais rápida na oficina
		<tr><td><input type="radio" name="bonus" value="9" /> Mais população
		<tr><td><center><input type="submit" class="btn btn-build" value="Comprar Bônus!"/>	</center>	
		</form>
		{/if}
		</tr>
	</tbody></table>
</div>
</div>  {/if}

</table>
<script>
                    $( function() {ldelim} if( document.location.hash == "#bonus_1_dodany" ) UI.SuccessMessage( "O bônus foi adicionado!", 3000 ); {rdelim});	
					$( function() {ldelim} if( document.location.hash == "#bonus_2_dodany" ) UI.SuccessMessage( "O bônus foi adicionado!", 3000 ); {rdelim});
					$( function() {ldelim} if( document.location.hash == "#bonus_3_dodany" ) UI.SuccessMessage( "O bônus foi adicionado!", 3000 ); {rdelim});
					$( function() {ldelim} if( document.location.hash == "#bonus_4_dodany" ) UI.SuccessMessage( "O bônus foi adicionado!", 3000 ); {rdelim});
					$( function() {ldelim} if( document.location.hash == "#bonus_5_dodany" ) UI.SuccessMessage( "O bônus foi adicionado!", 3000 ); {rdelim});
					$( function() {ldelim} if( document.location.hash == "#bonus_6_dodany" ) UI.SuccessMessage( "O bônus foi adicionado!", 3000 ); {rdelim});
					$( function() {ldelim} if( document.location.hash == "#bonus_7_dodany" ) UI.SuccessMessage( "O bônus foi adicionado!", 3000 ); {rdelim});
					$( function() {ldelim} if( document.location.hash == "#bonus_8_dodany" ) UI.SuccessMessage( "O bônus foi adicionado!", 3000 ); {rdelim});
					$( function() {ldelim} if( document.location.hash == "#bonus_9_dodany" ) UI.SuccessMessage( "O bônus foi adicionado!", 3000 ); {rdelim});

</script>