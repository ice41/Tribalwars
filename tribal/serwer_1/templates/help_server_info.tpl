<h2>Ustawienia �wiata {$serwerid}</h2>

<table class="vis" width="100%">
	<tbody>
		<tr>
			<th colspan="2">Ustawienia</th>
		</tr>
		<tr>
			<td width="50%">Pr�dko�� gry</td>
			<td width="50%">{$speed}</td>
		</tr>
		<tr>
			<td>Pr�dko�� jednostek</td>
			<td>{$units_speed}</td>
		</tr>
		<tr>
			<td>Burzenie budynk�w</td>
			<td>{if !$buildings_destroy}Nie{/if}aktywne</td>
		</tr>
		<tr>
			<td>Morale</td>
			<td>{if !$morals}Nie{/if}aktywny</td>
		</tr>
		<tr>
			<td>Regu�a zagrody</td>
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
			<td>Ograniczenie straszak�w</td>
			<td>nieaktywne</td>
		</tr>
		<tr>
			<td>System bada�</td>
			<td>{if $max_tech_level > 1}rozbudowany (maks. {$max_tech_level} poziom�w){else}prosty (niezbadane / zbadane){/if}</td>
		</tr>
		<tr>
			<td>Ko�ci�</td>
			<td>nieaktywne</td>
		</tr>
		<tr>
			<td>Odznaczenia</td>
			<td>{if !$display_awards}nie{/if}aktywne</td>
		</tr>
		<tr>
			<td>Rozw�j wiosek barbarzy�skich</td>
			<td>
				{if $bot_barbar_disp}
					aktywny (do {$bot_barbar_limit} punkt�w)
				{else}
					nieaktywne
				{/if}
			</td>
		</tr>
		<tr>
			<td>Osady koczownicze</td>
			<td>ulepszone osady koczownik�w</td>
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
			<td>Maksymalny stosunek atakuj�cych do obro�c�w</td>
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
			<td width="50%">�ucznicy</td>
			<td width="50%">{if !$archers}Nie{/if}aktywny</td>
		</tr>
		<tr>
			<td>Zwiad</td>
			<td>Zwiadowcy mog� wykrywa� wojska, budynki i surowce<br>oraz jednostki poza wiosk�</td>
		</tr>
		<tr>
			<td>Rycerz</td>
			<td>{if !$paladin}Nie{/if}aktywny{if !$paladin}.{else}, mo�e znajdowa� przedmioty.{/if}</td>
		</tr>
	</tbody>
</table>

<table class="vis" width="98%">
	<tbody>
		<tr>
			<th colspan="2">Szlachcic</th>
		</tr>

		<tr>
			<td width="50%">Rosn�ce ceny szlachcic�w</td>
			<td width="50%">
				{$snob_text}
			</td>
		</tr>
		<tr>
			<td>Tanie odnawianie szlachcic�w</td>
			<td>Aktywne</td>
		</tr>					
		<tr>
			<td>Maksymalny zasi�g szlachcica</td>
			<td>{if $snob_range != '-1'}{$snob_range} p�l{else}bez ograniczenia{/if}</td>
		</tr>
		<tr>
			<td>Utrata poparcia po napadzie szlachcica</td>
			<td>{$pop_min}-{$pop_max}</td>
		</tr>
		<tr>
			<td>Wzrost poparcia na godzin�</td>
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
			<td>Limit cz�onk�w plemienia</td>
			<td>nieaktywne</td>
		</tr>
		<tr>
			<td width="50%">Ranking pokonanych przeciwnik�w</td>
			<td width="50%">aktywny</td>
		</tr>
		<tr>
			<td>Zast�pstwo</td>
			<td>nieaktywny</td>
		</tr>					
		<tr>
			<td>Wyb�r kierunku</td>
			<td>{if !$village_choose_direction}nie{/if}aktywne</td>
		</tr>					
		<tr>
			<td>Data rozpocz�cia</td>
			<td>{$server_start}</td>
		</tr>
	</tbody>
</table>
