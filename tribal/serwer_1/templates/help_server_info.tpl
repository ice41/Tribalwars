<h2>Ustawienia œwiata {$serwerid}</h2>

<table class="vis" width="100%">
	<tbody>
		<tr>
			<th colspan="2">Ustawienia</th>
		</tr>
		<tr>
			<td width="50%">Prêdkoœæ gry</td>
			<td width="50%">{$speed}</td>
		</tr>
		<tr>
			<td>Prêdkoœæ jednostek</td>
			<td>{$units_speed}</td>
		</tr>
		<tr>
			<td>Burzenie budynków</td>
			<td>{if !$buildings_destroy}Nie{/if}aktywne</td>
		</tr>
		<tr>
			<td>Morale</td>
			<td>{if !$morals}Nie{/if}aktywny</td>
		</tr>
		<tr>
			<td>Regu³a zagrody</td>
			<td>nieaktywne</td>
		</tr>
		<tr>
			<td>Obrona gruntowa</td>
			<td>{$basic_village_defense}</td>
		</tr>
		<tr>
			<td>milisekundy</td>
			<td>Nieaktywny</td>
		</tr>
		<tr>
			<td>Ograniczenie straszaków</td>
			<td>nieaktywne</td>
		</tr>
		<tr>
			<td>System badañ</td>
			<td>{if $max_tech_level > 1}rozbudowany (maks. {$max_tech_level} poziomów){else}prosty (niezbadane / zbadane){/if}</td>
		</tr>
		<tr>
			<td>Koœció³</td>
			<td>nieaktywne</td>
		</tr>
		<tr>
			<td>Odznaczenia</td>
			<td>{if !$display_awards}nie{/if}aktywne</td>
		</tr>
		<tr>
			<td>Rozwój wiosek barbarzyñskich</td>
			<td>
				{if $bot_barbar_disp}
					aktywny (do {$bot_barbar_limit} punktów)
				{else}
					nieaktywne
				{/if}
			</td>
		</tr>
		<tr>
			<td>Osady koczownicze</td>
			<td>ulepszone osady koczowników</td>
		</tr>
		<tr>
			<td>Czas na przerwanie ataku</td>
			<td>{$time_att_pz} minut</td>
		</tr>
		<tr>
			<td>Czas przerwania dla kupca</td>
			<td>{$cancel_dealers} minut</td>
		</tr>
		<tr>
			<td>Bonus nocny</td>
			<td>{if $noc}aktywny od 0:00 do 8:00{else}nieaktywne{/if}</td>
		</tr>
		<tr>
			<td>Ochrona dla nowych graczy</td>
			<td>
				{if $protect_new_users != '-1'}{$protect_new_users} Dni{else}Bez ochrony{/if}
			</td>
		</tr>
		<tr>
			<td>Maksymalny stosunek atakuj¹cych do obroñców</td>
			<td>Bez ograniczenia</td>
		</tr>
	</tbody>
</table>

<table class="vis" width="98%">
	<tbody>
		<tr>
			<th colspan="2">Jednostki</th>
		</tr>
		<tr>
			<td width="50%">£ucznicy</td>
			<td width="50%">{if !$archers}Nie{/if}aktywny</td>
		</tr>
		<tr>
			<td>Zwiad</td>
			<td>Zwiadowcy mog¹ wykrywaæ wojska, budynki i surowce<br>oraz jednostki poza wiosk¹</td>
		</tr>
		<tr>
			<td>Rycerz</td>
			<td>{if !$paladin}Nie{/if}aktywny{if !$paladin}.{else}, mo¿e znajdowaæ przedmioty.{/if}</td>
		</tr>
	</tbody>
</table>

<table class="vis" width="98%">
	<tbody>
		<tr>
			<th colspan="2">Szlachcic</th>
		</tr>

		<tr>
			<td width="50%">Rosn¹ce ceny szlachciców</td>
			<td width="50%">
				{$snob_text}
			</td>
		</tr>
		<tr>
			<td>Tanie odnawianie szlachciców</td>
			<td>Aktywne</td>
		</tr>					
		<tr>
			<td>Maksymalny zasiêg szlachcica</td>
			<td>{if $snob_range != '-1'}{$snob_range} pól{else}bez ograniczenia{/if}</td>
		</tr>
		<tr>
			<td>Utrata poparcia po napadzie szlachcica</td>
			<td>{$pop_min}-{$pop_max}</td>
		</tr>
		<tr>
			<td>Wzrost poparcia na godzinê</td>
			<td>{$pop_per_hour}</td>
		</tr>
	</tbody>
</table>

<table class="vis" width="98%">
	<tbody>
		<tr>
			<th colspan="2">Konfiguracja</th>
		</tr>
		<tr>
			<td>Limit cz³onków plemienia</td>
			<td>nieaktywne</td>
		</tr>
		<tr>
			<td width="50%">Ranking pokonanych przeciwników</td>
			<td width="50%">aktywny</td>
		</tr>
		<tr>
			<td>Zastêpstwo</td>
			<td>nieaktywny</td>
		</tr>					
		<tr>
			<td>Wybór kierunku</td>
			<td>{if !$village_choose_direction}nie{/if}aktywne</td>
		</tr>					
		<tr>
			<td>Data rozpoczêcia</td>
			<td>{$server_start}</td>
		</tr>
	</tbody>
</table>
