<?php /* Smarty version 2.6.14, created on 2012-03-15 17:46:36
         compiled from help_server_info.tpl */ ?>
<h2>Ustawienia œwiata <?php echo $this->_tpl_vars['serwerid']; ?>
</h2>

<table class="vis" width="100%">
	<tbody>
		<tr>
			<th colspan="2">Ustawienia</th>
		</tr>
		<tr>
			<td width="50%">Prêdkoœæ gry</td>
			<td width="50%"><?php echo $this->_tpl_vars['speed']; ?>
</td>
		</tr>
		<tr>
			<td>Prêdkoœæ jednostek</td>
			<td><?php echo $this->_tpl_vars['units_speed']; ?>
</td>
		</tr>
		<tr>
			<td>Burzenie budynków</td>
			<td><?php if (! $this->_tpl_vars['buildings_destroy']): ?>Nie<?php endif; ?>aktywne</td>
		</tr>
		<tr>
			<td>Morale</td>
			<td><?php if (! $this->_tpl_vars['morals']): ?>Nie<?php endif; ?>aktywny</td>
		</tr>
		<tr>
			<td>Regu³a zagrody</td>
			<td>nieaktywne</td>
		</tr>
		<tr>
			<td>Obrona gruntowa</td>
			<td><?php echo $this->_tpl_vars['basic_village_defense']; ?>
</td>
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
			<td><?php if ($this->_tpl_vars['max_tech_level'] > 1): ?>rozbudowany (maks. <?php echo $this->_tpl_vars['max_tech_level']; ?>
 poziomów)<?php else: ?>prosty (niezbadane / zbadane)<?php endif; ?></td>
		</tr>
		<tr>
			<td>Koœció³</td>
			<td>nieaktywne</td>
		</tr>
		<tr>
			<td>Odznaczenia</td>
			<td><?php if (! $this->_tpl_vars['display_awards']): ?>nie<?php endif; ?>aktywne</td>
		</tr>
		<tr>
			<td>Rozwój wiosek barbarzyñskich</td>
			<td>
				<?php if ($this->_tpl_vars['bot_barbar_disp']): ?>
					aktywny (do <?php echo $this->_tpl_vars['bot_barbar_limit']; ?>
 punktów)
				<?php else: ?>
					nieaktywne
				<?php endif; ?>
			</td>
		</tr>
		<tr>
			<td>Osady koczownicze</td>
			<td>ulepszone osady koczowników</td>
		</tr>
		<tr>
			<td>Czas na przerwanie ataku</td>
			<td><?php echo $this->_tpl_vars['time_att_pz']; ?>
 minut</td>
		</tr>
		<tr>
			<td>Czas przerwania dla kupca</td>
			<td><?php echo $this->_tpl_vars['cancel_dealers']; ?>
 minut</td>
		</tr>
		<tr>
			<td>Bonus nocny</td>
			<td><?php if ($this->_tpl_vars['noc']): ?>aktywny od 0:00 do 8:00<?php else: ?>nieaktywne<?php endif; ?></td>
		</tr>
		<tr>
			<td>Ochrona dla nowych graczy</td>
			<td>
				<?php if ($this->_tpl_vars['protect_new_users'] != '-1'):  echo $this->_tpl_vars['protect_new_users']; ?>
 Dni<?php else: ?>Bez ochrony<?php endif; ?>
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
			<td width="50%"><?php if (! $this->_tpl_vars['archers']): ?>Nie<?php endif; ?>aktywny</td>
		</tr>
		<tr>
			<td>Zwiad</td>
			<td>Zwiadowcy mog¹ wykrywaæ wojska, budynki i surowce<br>oraz jednostki poza wiosk¹</td>
		</tr>
		<tr>
			<td>Rycerz</td>
			<td><?php if (! $this->_tpl_vars['paladin']): ?>Nie<?php endif; ?>aktywny<?php if (! $this->_tpl_vars['paladin']): ?>.<?php else: ?>, mo¿e znajdowaæ przedmioty.<?php endif; ?></td>
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
				<?php echo $this->_tpl_vars['snob_text']; ?>

			</td>
		</tr>
		<tr>
			<td>Tanie odnawianie szlachciców</td>
			<td>Aktywne</td>
		</tr>					
		<tr>
			<td>Maksymalny zasiêg szlachcica</td>
			<td><?php if ($this->_tpl_vars['snob_range'] != '-1'):  echo $this->_tpl_vars['snob_range']; ?>
 pól<?php else: ?>bez ograniczenia<?php endif; ?></td>
		</tr>
		<tr>
			<td>Utrata poparcia po napadzie szlachcica</td>
			<td><?php echo $this->_tpl_vars['pop_min']; ?>
-<?php echo $this->_tpl_vars['pop_max']; ?>
</td>
		</tr>
		<tr>
			<td>Wzrost poparcia na godzinê</td>
			<td><?php echo $this->_tpl_vars['pop_per_hour']; ?>
</td>
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
			<td><?php if (! $this->_tpl_vars['village_choose_direction']): ?>nie<?php endif; ?>aktywne</td>
		</tr>					
		<tr>
			<td>Data rozpoczêcia</td>
			<td><?php echo $this->_tpl_vars['server_start']; ?>
</td>
		</tr>
	</tbody>
</table>