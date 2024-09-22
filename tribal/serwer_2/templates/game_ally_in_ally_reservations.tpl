{if $show_res_log}
	<div id="noblelog_filter">
		<p>Kliknij jeden z linków, aby wyœwietliæ jedynie te pozycje, które ciê interesuj¹.</p>
		<p>Wpisy w dzienniku dotycz¹ jedynie ostatnich 5 dni.</p>
	</div>

	<table class="vis" style="width: 100%;">
		<tbody>
			<tr>
				<th width="150">Data</th>
				<th width="200">Nazwa wioski</th>
				<th width="200">Gracz</th>
				<th width="200">Akcja</th>
			</tr>
			{foreach from=$game_rezerwacje_log item=rezerwacja}
				<tr>
					<td>{$pl->pl_date($rezerwacja.last_edit)}</td>
					<td>{$rezerwacja.link}</td>
					<td>
						<a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$rezerwacja.od_gracza}">{$rezerwacja.od_gname}</a> [<a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$rezerwacja.plemie}">{$rezerwacja.od_allyname}</a>]
					</td>
					<td>
					{if $rezerwacja.proces == 0}
						Zarezerwowane
					{/if}
					{if $rezerwacja.proces == 1}
						Wygas³o
					{/if}
					{if $rezerwacja.proces == 2}
					 	Usuniêto
					{/if}
					{if $rezerwacja.proces == 3}
						Zrealizowane
					{/if}
					</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
	<br>
	<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=reservations&rlog=0">» Wróæ do planera podbojów</a>
{else}
	<script type="text/javascript" src="ScriptAPI.js?1321542728"></script>

	<div style="width: 98%; position: relative; left: 10px;">
		<div id="reservation_info">
			<table>
				<tr>
					<td valign="top" width="200">
						<div id="settings">
							<h4>Ustawienia</h4>
							<div id="limit_info">
								<p>
									Limit rezerwacji: {$reservations_maxcount} wiosek<br>Limit czasu: {$reservations_maxday} dni
								</p>
								{if $is_user_admin}
									<p id="edit_reservation">
										<span style="font-weight:bold; color: #804000; cursor: pointer;" onclick="switchDisplay('limit_info');switchDisplay('limit_edit')">» Edytuj ustawienia</span>
									</p>
								{/if}
							</div>
						
							{if $is_user_admin}
								<div id="limit_edit" style="display:none;">
									<form action="game.php?village={$village.id}&amp;screen=ally&amp;mode=reservations&amp;action=save_reservation_settings&amp;h={$hkey}&page={$aktupage}&sort={$sort}&order={$order}&filter={$filter}" method="post">
										<p>
											<label for="reservation_limit">Limit rezerwacji:</label>
											<input id="reservation_limit" name="reservation_limit" value="{$reservations_maxcount}" size="3" type="text"><br>
											<label for="reservation_time">Limit czasu:</label>
											<input id="reservation_time" name="reservation_time" value="{$reservations_maxday}" size="3" type="text"><br>
										</p>
										<p>

											<input value="Zmieñ" type="submit">
											<input value="Anuluj" onclick="switchDisplay('limit_info');switchDisplay('limit_edit')" type="button">
										</p>
									</form>
								</div>
							{/if}
						</div>
					</td>
					<td valign="top" width="300">
						<div id="partners">
							<h4>Dzielisz planer podbojów z:</h4>
							{if count($partners) > 0}
								<table>
									{foreach from=$partners item=partner}
										<tr>
											<td>
												<a href="game.php?village={$village.id}&screen=info_ally&id={$partner.do_plemienia}"/>
													{$partner.nazwa}&nbsp;[{$partner.skrot}]&nbsp;&nbsp;&nbsp;&nbsp;
												</a>
											</td>
											<td>
												{if $is_user_admin}
													<a href="game.php?village={$village.id}&screen=ally&mode=reservations&action=del_partner&h={$hkey}&id={$partner.id}&page={$aktupage}&sort={$sort}&order={$order}&filter={$filter}"/>
														Zakoñcz
													</a>
												{/if}
											</td>
										</tr>
									{/foreach}
								</table>
							{/if}
							{if $is_user_admin}
								<p id="edit_partners">
									<span style="font-weight:bold; color: #804000; cursor: pointer;" onclick="switchDisplay('event_zpr_disp')">» Edytuj partnerów</a>
								</p>
								<div id="event_zpr_disp" style="display:none;position:absolute;">
									<div style="width: 300px;">
										<table collspacing="0" collpadding="0" class="{if $graphic == '1'}content-border{else}main{/if}" id="partners_open">
											<tr>
												<th>
													<span style="font-weight:bold; color: #804000; cursor: pointer;" onclick="switchDisplay('event_zpr_disp')">Zamkn¹æ</a>
												</th>
											</tr>
											<tr>
												<td>
													<h4 style="margin-top: 2px;">Zaproœ nowe plemiê do planera podbojów</h4>
													<p>Wpisz skrótow¹ nazwê plemienia, z którym ma byæ wspó³dzielony planer podbojów:</p>
													<form action="game.php?village={$village.id}&amp;screen=ally&amp;mode=reservations&amp;action=add_partner&amp;h={$hkey}&page={$aktupage}&sort={$sort}&order={$order}&filter={$filter}" method="POST">
														<input maxlength="6" name="partner_ally" type="text">
														<input value="Dodaj" type="submit">
													</form>
													<br><br>
												</td>
											</tr>
										</table>
									</div>
								</div>
							{/if}
						</div>
					</td>
				</tr>
			</table>
		</div>
	
		{if !empty($err)}
			<font class="error"/>{$err}</font>
		{/if}
				
		<div id="reservations">
			<div style="padding-bottom: 3px;" align="center">
				<div class="groups">
					Filtruj rezerwacje: 
					{if $filter == 'own'}
							<b>&gt;Twoje&lt;</b>
					{else}
						<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=reservations&sort={$sort}&order={$order}&filter=own">
							[Twoje]
						</a>
					{/if}
					{if $filter == 'own_ally'}
						<b>&gt;Plemiê&lt;</b>
					{else}
						<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=reservations&sort={$sort}&order={$order}&filter=own_ally">
							[Plemiê]
						</a>
					{/if}
					{if $filter == 'other_ally'}
						<b>&gt;Sprzymierzeñcy&lt;</b>
					{else}
						<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=reservations&sort={$sort}&order={$order}&filter=other_ally">
							[Sprzymierzeñcy]
						</a>
					{/if}
					{if $filter == 'all'}
						<b>&gt;Wszystkie&lt;</b>
					{else}
						<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=reservations&sort={$sort}&order={$order}&filter=all">
							[Wszystkie]
						</a>
					{/if}
				</div>								
			</div>
						
			<form action="game.php?village={$village.id}&amp;screen=ally&amp;mode=reservations&amp;action=submit&amp;h={$hkey}&page={$aktupage}&sort={$sort}&order={$order}&filter={$filter}" method="post">
				<table class="vis" style="width: 100%;">
					{if $sekcja_rezerwacje}
						<thead>
							<tr>
								<td colspan="9"/>{$sekcja_rezerwacje_content}</td>
							</tr>
						</thead>
					{/if}
					<thead>
						<tr class="nowrap">
							<th><img src="/ds_graphic/delete.png" title="Usuñ kilka naraz" alt="Usuñ kilka naraz"></th>
							<th>Nazwa wioski</th>
							<th>Punkty</th>
							<th>W³aœciciel</th>
							<th>Rezerwacja dokonana przez 
								<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=reservations&amp;page={$aktupage}&amp;sort=od_gname&amp;order=ASC&filter={$filter}">
									<img src="/ds_graphic/oben.png" alt="Sortuj rosn¹co" title="Sortuj rosn¹co">
								</a> 
								<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=reservations&amp;page={$aktupage}&amp;sort=od_gname&amp;order=DESC&filter={$filter}">
									<img src="/ds_graphic/unten.png" alt="Sortuj malej¹co" title="Sortuj malej¹co">
								</a>
							</th>
							<th>Data wygaœniêcia 
								<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=reservations&amp;page={$aktupage}&amp;sort=koniec&amp;order=ASC&filter={$filter}">
									<img src="/ds_graphic/oben.png" alt="Sortuj rosn¹co" title="Sortuj rosn¹co">
								</a> 
								<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=reservations&amp;page={$aktupage}&amp;sort=koniec&amp;order=DESC&filter={$filter}">
									<img src="/ds_graphic/unten.png" alt="Sortuj malej¹co" title="Sortuj malej¹co">
								</a>
							</th>
							<th></th>
						</tr>
					</thead>
					<tfoot>
						{foreach from=$rezerwacje item=info}
								<tr id="reservation_{$info.id}">
								<td>
									{if $is_user_admin && $info.od_plemienia == $user.ally}
										<input name="ids[]" value="{$info.id}" type="checkbox">
									{/if}
								</td>
								<td>{$info.link}</td>
								<td>{$info.village.points|number_format}</td>
								<td>
									{if !empty($info.owner_name)}
										<a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$info.village.userid}"/>{$info.owner_name}</a>
									{/if}
								</td>
								<td>
									<a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$info.od_gracza}">{$info.od_gname}</a> [<a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$info.od_plemienia}">{$info.od_allyname}</a>]
								</td>

								<td>{$pl->pl_date($info.koniec)}</td>
								<td style="white-space: nowrap;">
									<img src="/ds_graphic/show_comment_disabled.png" alt="Brak komentarzy" title="Brak komentarzy">
									<a href="game.php?village={$village.id}&amp;screen=map&amp;x={$info.village.x}&amp;y={$info.village.y}">
										<img src="/ds_graphic/map_center.png" alt="Scentruj mapê" title="Scentruj mapê">
									</a>
									{if $is_user_admin}
										<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=reservations&amp;action=delete_reservations&amp;h={$hkey}&amp;id={$info.id}&page={$aktupage}&sort={$sort}&order={$order}&filter={$filter}">
											<img src="/ds_graphic/delete.png" alt="Skasuj" title="Skasuj">
										</a>
									{/if}
								</td>
							</tr>
						{/foreach}
						{if $is_user_admin}
							<tr>
								<td>
									{if $is_user_admin}
										<input name="all" onclick="selectAll(this.form, this.checked)" type="checkbox">
									{/if}
								</td>
								<td>
									{if $is_user_admin}
										<input name="delete_claims" value="Usuñ zaznaczone" onclick="return confirm('Czy na pewno chcesz anulowaæ wybrane rezerwacje?')" type="submit">
									{/if}
								</td>
								<td colspan="3" align="center">
								</td>
								<td colspan="2"></td>
							</tr>
						{/if}
					</tfoot>
				</table>
			</form>
		
			<div>
			
				<div style="float: left;">
					<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=reservations&rlog=1">» Poka¿ dziennik</a>
				</div>
				
				<div style="float: right;">
					<form action="game.php?village={$village.id}&amp;screen=ally&amp;mode=reservations&amp;action=save_page_size&amp;h={$hkey}&page={$aktupage}&sort={$sort}&order={$order}&filter={$filter}" method="post">
						<label for="reservation_page_size">Liczba rezerwacji na stronê:</label>
						<input name="reservation_page_size" value="{$user.rezerwacje_nstr}" size="3" type="text">
						<input value="OK" type="submit">
					</form>
				</div>
			
			</div>
		
			<br style="clear: both;">
		
			<div id="add_reservations" style="float: left;">
				<h4>Dodaj now¹ rezerwacjê</h4>

				<form name="rezerwacje" action="game.php?village={$village.id}&amp;screen=ally&amp;mode=reservations&amp;action=new_reservations&amp;h={$hkey}" method="post">
					<input type="hidden" value="none" name="typ_akcji"/>
					<p class="add_village_reservation">
						{if $double_reservations}
							{foreach from=$reservations_vals item=array}
								<p class="add_village_reservation">
									x:<input size="5" name="x[]" type="text" value="{$array.x}" maxlength="3">
									y:<input size="5" name="y[]" type="text" value="{$array.y}" maxlength="3">
								</p>
							{/foreach}
							{if $add_new}
								<p class="add_village_reservation">
									x:<input size="5" name="x[]" type="text" maxlength="3">
									y:<input size="5" name="y[]" type="text" maxlength="3">
								</p>
							{/if}
						{else}
							<p class="add_village_reservation">
								x:<input size="5" name="x[]" type="text" maxlength="3" value="{$xval}">
								y:<input size="5" name="y[]" type="text" maxlength="3" value="{$yval}">
							</p>
						{/if}
					</p>
					
					<span style="font-weight:bold; color: #804000; cursor: pointer;" onclick="insertUnit(document.forms['rezerwacje'].typ_akcji,'add_new');document.forms['rezerwacje'].submit();">
						<img src="/ds_graphic/plus.png" alt="Dodaj nastêpn¹ rezerwacjê" title="Dodaj nastêpn¹ rezerwacjê">
						Dodaj nastêpn¹ rezerwacjê
					</span>
					
					<p>
						<input id="save_reservations" value="Zarezerwuj wioskê" onclick="insertUnit(document.forms['rezerwacje'].typ_akcji,'add_reserv');" type="submit">
					</p>
				</form>
			</div>
			
			<div id="reservation_search" style="float: left; padding-left: 49px;">
				<h4>Szukaj rezerwacji</h4>
				<form name="szukaj_rezerwacji" action="game.php?village={$village.id}&amp;screen=ally&amp;mode=reservations" method="post">
					<input value="false" name="reservation_search_coords" type="hidden">
				
					<span id="search_village_else">
						<input id="search_village_text" size="20" name="filter" type="text">
					</span>
				
					<span id="search_village_coords" style="display: none;">
						x:<input id="input_search_coords_x" size="5" name="x" maxlength="3" type="text">
						y:<input id="input_search_coords_y" size="5" name="y" maxlength="3" type="text">
					</span>
				
					<select id="group_id" name="group_id">
						<optgroup label="Wioska">
							<option value="village_name" onclick="insertUnit(document.forms['szukaj_rezerwacji'].reservation_search_coords,'false');switchon('search_village_else');switchoff('search_village_coords');">Nazwa</option>
							<option value="village_coords" onclick="insertUnit(document.forms['szukaj_rezerwacji'].reservation_search_coords,'true');switchoff('search_village_else');switchon('search_village_coords');">Wspó³rzêdne</option>
						</optgroup>
						<optgroup label="Gracz">
							<option value="creator_name" onclick="insertUnit(document.forms['szukaj_rezerwacji'].reservation_search_coords,'false');switchon('search_village_else');switchoff('search_village_coords');">Rezerwacja dokonana przez</option>
							<option value="owner_name" onclick="insertUnit(document.forms['szukaj_rezerwacji'].reservation_search_coords,'false');switchon('search_village_else');switchoff('search_village_coords');">W³aœciciel</option>
						</optgroup>
						<optgroup label="Skrót nazwy plemienia">

							<option value="creator_ally_tag" onclick="insertUnit(document.forms['szukaj_rezerwacji'].reservation_search_coords,'false');switchon('search_village_else');switchoff('search_village_coords');">Rezerwacja dokonana przez</option>
							<option value="owner_ally_tag" onclick="insertUnit(document.forms['szukaj_rezerwacji'].reservation_search_coords,'false');switchon('search_village_else');switchoff('search_village_coords');">W³aœciciel</option>
						</optgroup>
					</select>
					<br>
					<input name="search_reservations_is" value="Szukaj" style="margin-top: 4px;" type="submit">
				</form>
			</div>
			<br style="clear: both;">
		</div>
	</div>
{/if}