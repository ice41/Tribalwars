<br>
<table>
	<tr>
		<td width="600" valign="top" valign="top">
			<table class="vis" width="100%">
				<tr>
				    <th colspan="2">
					Budynki
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
										<div style="position: relative; width: 600px;height: 418px; background-image: url(graphic/visual/back_none.jpg);"/>
											<img class="empty" src="graphic/map/empty.png" alt="" usemap="#mapa" />
											<map name="mapa" id="mapa">
												{foreach from=$cl_builds->get_array('dbname') item=dbname key=id}
													{if $village.$dbname > 0}
														{if $cl_builds->get_maxstage($dbname) == 1}
															<area shape="poly" coords="{$builds_graphic_coords.$dbname}" href="game.php?village={$village.id}&screen={$dbname}" alt="{$cl_builds->get_name($dbname)}" title="{$cl_builds->get_name($dbname)}"/>
															<img class="align_{$dbname}" src="graphic/visual/{$dbname}1.{if $anims}gif{else}png{/if}" alt=""/>
															{if $labels}
																<label class="stagetip label_{$dbname}"><a href="game.php?village={$village.id}&screen={$dbname}">{$village.$dbname}</a></label>
															{/if}
														{else}
															{if $dbname == 'snob' || $dbname == 'hide'}
																<area shape="poly" coords="{$builds_graphic_coords.$dbname}" href="game.php?village={$village.id}&screen={$dbname}" alt="{$cl_builds->get_name($dbname)}" title="{$cl_builds->get_name($dbname)}"/>
																<img class="align_{$dbname}" src="graphic/visual/{$dbname}1.{if $anims}gif{else}png{/if}" alt=""/>
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
																		<img class="align_mainflag" src="graphic/visual/mainflag3.gif" alt=""/>
																	{/if}
																	<img class="align_{$dbname}" src="graphic/visual/{$dbname}3.{if $anims}gif{else}png{/if}" alt=""/>
																	{if $labels}
																		<label class="stagetip label_{$dbname}"><a href="game.php?village={$village.id}&screen={$dbname}">{$village.$dbname}</a></label>
																{/if}
																{else}
																	{if $aktu_build_prc > 0.2}
																		<area shape="poly" coords="{$builds_graphic_coords.$dbname}" href="game.php?village={$village.id}&screen={$dbname}" alt="{$cl_builds->get_name($dbname)}" title="{$cl_builds->get_name($dbname)}"/>
																		{if $dbname == 'main'}
																			<img class="align_mainflag" src="graphic/visual/mainflag2.gif" alt=""/>
																		{/if}
																		<img class="align_{$dbname}" src="graphic/visual/{$dbname}2.{if $anims}gif{else}png{/if}" alt=""/>
																		{if $labels}
																			<label class="stagetip label_{$dbname}"><a href="game.php?village={$village.id}&screen={$dbname}">{$village.$dbname}</a></label>
																		{/if}
																	{else}
																		<area shape="poly" coords="{$builds_graphic_coords.$dbname}" href="game.php?village={$village.id}&screen={$dbname}" alt="{$cl_builds->get_name($dbname)}" title="{$cl_builds->get_name($dbname)}"/>
																		{if $dbname == 'main'}
																			<img class="align_mainflag" src="graphic/visual/mainflag1.gif" alt=""/>
																		{/if}
																		<img class="align_{$dbname}" src="graphic/visual/{$dbname}1.{if $anims}gif{else}png{/if}" alt=""/>
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
														{if $anims}
															<img class="align_{$dbname}" src="graphic/visual/{$dbname}0.gif" alt=""/>
														{/if}
														{php}
															endif;
														{/php}
													{/if}
												{/foreach}
										
												{if $anims}
													<img class="align_conversation" src="graphic/visual/conversation.gif" alt=""/>
													<img class="align_farmer" src="graphic/visual/farmer.gif" alt=""/>
													<img class="align_guard" src="graphic/visual/guard.gif" alt=""/>
													<img class="align_juggler" src="graphic/visual/juggler.gif" alt=""/>
												{/if}
											</map>
										</div>
									</td>	
								</tr>
							</table>
						</td>					
					</tr>
					<tr>
						<td colspan="2">
							<a href="game.php?village={$village.id}&screen=overview&akcja=o_anims">
								<span style="text-align:right;">
									{if $anims}
										Wy³¹czyæ animacje
									{else}
										W³¹czyæ animacje
									{/if}
								</span>
							</a>
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
								<a href="game.php?village={$village.id}&screen={$dbname}"><img src="graphic/buildings/{$dbname}.png"> {$cl_builds->get_name($dbname)}</a>
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
												<img src="graphic/command/{$array.type}.png"> {$pl->pl_text($array.message)}
											</a>
										</td>
										<td>
											{$pl->format_date($array.end_time)}
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
												<img src="graphic/command/{$array.type}.png"> {$pl->pl_text($array.message)}
											</a>
										</td>
										<td>
											{$pl->format_date($array.end_time)}
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
			<table class="vis" width="100%">
				<tr>
					<th colspan="2">
						Produkcja
					</th>
				</tr>
				<tr>
					<td width="80">
						<img src="graphic/holz.png" title="Drewno" alt="" />
						Drewno
					</td>
					<td>
						<strong>
							{$wood_per_hour|number_format}
						</strong> 
						 na Godzinê
					</td>
				</tr>
				<tr>
					<td width="80">
						<img src="graphic/lehm.png" title="Ceg³y" alt="" />
						 Glina
					</td>
					<td>
						<strong>
							{$stone_per_hour|number_format}
						</strong>
						 na Godzinê
					</td>
				</tr>
				<tr>
					<td width="80">
						<img src="graphic/eisen.png" title="¯elazo" alt="" />
						 ¯elazo
					</td>
					<td>
						<strong>
							{$iron_per_hour|number_format}
						</strong>
						 na Godzinê
					</td>
				</tr>
			</table>
			<br />
			<table class="vis" width="100%">
				<tr>
					<th>
						Jednostki
					</th>
				</tr>
                {foreach from=$in_village_units item=num key=dbname}
                	<tr>
						<td>
							<img src="graphic/unit/{$dbname}.png"> 
							<b>
								{$num}
							</b> 
							{if $dbname == 'unit_paladin'}
								{$pala_name}
							{else}
								{$cl_units->get_name($dbname)}
							{/if}
						</td>
					</tr>
                {/foreach}
			</table>
			<br />
			{if $village.agreement!="100"}
				<table class="vis" width="100%">
					<tr>
						<th>
							Poparcie:
						</th>
						<th>
							{$village.agreement}
						</th>
					</tr>
				</table>
				<br />
			{/if}
		</td>
	</tr>
</table>
