<br>
<table>
<tr>
  <td width="600" valign="top" valign="top">
   <table class="vis" width="100%">
        <tr>
                <th colspan="2">
          <i>Budynki</i>
         </th>
        </tr>
        {if $style == 'new'}
         <tr>
          <td width="60%">
           <a href="game.php?village={$village.id}&screen=overview&akcja=o_labels"><span>{if $labels}Ukryj poziomy budynków{else}Poka¿ poziomy budynków{/if}</span></a>
          </td>
          <td>
          <a href="game.php?village={$village.id}&screen=overview&akcja=o_style"><span style="text-align:right;">Do klasycznego przegl¹du wioski</span></a>
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
			         {if $dbname == 'barracks' || $dbname == 'wall' || $dbname == 'market' || $dbname == 'storage'}
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
			         {if $dbname == 'barracks' || $dbname == 'wall' || $dbname == 'market' || $dbname == 'storage'}
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
			         {if $dbname == 'barracks' || $dbname == 'wall' || $dbname == 'market' || $dbname == 'storage'}
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
                 Do graficznego przegl¹du wioski
                </span>
           </a>
          </td>
         </tr>
         {foreach from=$built_builds item=dbname key=id}
          <tr>
           <td>
                <a href="game.php?village={$village.id}&screen={$dbname}"><img src="/ds_graphic/buildings/{$dbname}.png"> {$cl_builds->get_name($dbname)}</a>
                 (Poziom {$village.$dbname})
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
                 <th>Inne rozkazy ({php}echo count($this->_tpl_vars['other_movements']);{/php})</th>
                 <th>Na miejscu</th>
                 <th>Na miejscu za</th>
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
                 <th>W³asne rozkazy ({php}echo count($this->_tpl_vars['my_movements']);{/php})</th>
                 <th>Na miejscu</th>
                 <th>Na miejscu za</th>
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
                         Przerwij
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
           <i>Ochrona pocz¹tkowa</i>
          </th>
         </tr>
         <tr>
          <td>
           Koñczy siê {$noob_end}
          </td>
         </tr>
        </table>
        <br />
   {/if}
   <table class="vis" width="100%">
        <tr>
         <th colspan="2">
          <i>Produkcja</i>
         </th>
        </tr>
        <tr>
         <td width="80">
          <span class="icon header wood"> </span>
          Drewno
         </td>
         <td>
          <strong>
           {$wood_per_hour|format_number}
          </strong>
           na godzinê
         </td>
        </tr>
        <tr>
         <td width="80">
          <span class="icon header stone"> </span>
           Glina
         </td>
         <td>
          <strong>
           {$stone_per_hour|format_number}
          </strong>
           na godzinê
         </td>
        </tr>
        <tr>
         <td width="80">
          <span class="icon header iron"> </span>
           ¯elazo
         </td>
         <td>
          <strong>
           {$iron_per_hour|format_number}
          </strong>
           na godzinê
         </td>
        </tr>
   </table>
   <br />
   <table class="vis" width="100%">
        <tr>
         <th>
          <i>Jednostki</i>
         </th>
        </tr>
                                {foreach from=$in_village_units item=num key=dbname}
                                 <tr>
          <td>
           <img src="/ds_graphic/unit/{$dbname}.png">
           <b>
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
         <td><a href="game.php?village={$village.id}&amp;screen=train&mode=train">» rekrutowaæ</a></td>
        </tr>
   </table>
   <br />
   <table class="vis" width="100%">
        <tr>
         <th>
          <i>Przynale¿noœæ do grupy</i>
         </th>
        </tr>
        {if $village.group === 'all'}
         <tr>
          <td>
           <a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=groups">» opracuj</a>
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
           <a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=groups">» opracuj</a>
          </td>
         </tr>
        {/if}
   </table>
   <br />
   {if $village.agreement!="100"}
        <table class="vis" width="100%">
         <tr>
          <th>
           <i>Poparcie</i>
          </th>
          <th style="color: {$color}">
           {$village.agreement}
          </th>
         </tr>
        </table>
        <br />
   {/if}
  </td>
</tr>
</table>