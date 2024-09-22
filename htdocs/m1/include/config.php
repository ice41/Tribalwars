<?php

/*******************************************/
/********* CENTRO DE CONFIGURAÇÕES *********/
/************* Br-TWLan v1.3R2 *************/
/************* Felipe Medeiros *************/
/*******************************************/

/**********************************************************

Es wird empfohlen, während des laufen der Runde möglichst
keine Einstellungen in der Konfigurationsdatei zu verändern,
da ansonsten kein 100% funktionsfreies laufen der aktuellen
Runde garantiert werden kann.
Einstellungen des Speedes, Einheitengeschwindigkeit können
aber jederzeit geändert werden.

**********************************************************/ 

// Datenbankverbindung:
$config['db_host'] = 'localhost';
$config['db_user'] = 'root';
$config['db_pw'] = '';
$config['db_name'] = 'm1';

// Passwort für Administration
$config['master_pw'] = 'editme';

// Spielegeschwindigkeit, je höher, desto schneller läuft das Spiel
$config['speed'] = 750000;
// ADDED
/*$steig = "4"; // Alle 5 Sekunden
$start = 100;	// Time to start
$end = 3000;		// Bei wie viel Speed aufh ren zu steigen?
$more = round((time()-$start)/$steig);
$config['speed'] += $more;
if($config['speed'] > $end){
	$config['speed'] = $end;
}*/
////////

// Welches MAP Design soll verwendet werden?
// 0 => Das alte Design
// 1 => Das neue Design
$config['map_design'] = 1;

// Nach wie vielen Dörfern soll immer ein Flüchtlingslager erstellt werden?
// Mit der Angabe "-1" werden keine Flüchtlingslager automatisch erstellt.
$config['count_create_left'] = 1;

// Wie viel Dörfer muss ein Spieler mindestens haben? Wenn z.b.: nun die Zahl
// 5 angegegen wird, so hat der Spieler am Start sofort 5 Dörfer. Sollte er
// eines verlieren, so bekommt er ein 5 wieder dazu!
// Nicht den Wert "0" verwenden!
// übertreibt bitte nicht mit "4000" oder sonst was, da der erste Login
// ansonsten ewig dauert!
$config['min_villages'] = 100;

// ACHTUNG: Diese Einstellung wird erst wirksam, wenn in der Administration ein Reset
// oder Softreset durchgeführt wird.
$config['map_incircle'] = 0;

// Was für einen Namen haben automatisch erstellte Flüchtlingslager?
$config['left_name'] = 'Aldeia abandonada';

// Soll man beim erstellen eines neues Dorfes die Himmelsrichtung aussuchen d rfen?
// true oder false
$config['village_choose_direction'] = true;

// Grundverteidiung von jedem Dorf.
$config['reason_defense'] = 50;

// Was für ein Faktor gilt bei Späher? Der Wert "2" beudetet: Wenn der Verteidiger 2x
// mehr Späher als der Angreifer hat, so sterben alle Späher des Angreifers
// (Verhältnis 2:1). Bei Wert "3" ist es dann ein Verhältnis "3:1" und beudetet, dass
// der Verteidiger drei fach mehr Späher braucht, damit der Angreifer alle Späher verliert.
$config['factor_spy'] = 2;

// Bis nach wie vielen Minuten kann ein Angriff / Unterstützung abgebrochen werden?
// ACHTUNG: Dieser Wert ist nicht Speedabhändig! Dass heißt, bei 10 Minuten 
// Abbruchszeit sind es bei einer Spielegeschwindigkeit von 300 immer noch 10 Minuten!
$config['cancel_movement'] = 10;

// Geschwindigkeit der Einheiten. Je kleiner der Wert ist, desto langsamer werden die
// Einheiten. Normalgeschwindigkeit hat den Wert "1".
$config['movement_speed'] = 0.05;

// Soll die Moral aktiv sein oder nicht???
// true => Moral ist aktiv
// false => Moral ist nicht aktiv
$config['moral_activ'] = true;

// Bis wie viel % darf die Moral maximal sinken?? Der Standartwert ist 35%. Als wert
// bloss die Zahl angeben ohne die das "%" Zeichen!
$config['min_moral'] = 35;


// Um wie viel Zustimmung soll die Zustimmung pro Stunde steigen? Der Standartwert
// ist 1! Um so kleiner die Zahl, desto langsamer steigst die Zustimmung! (z.B.: 0.5)
$config['agreement_per_hour'] = 100;
// ADDED: the next line will correctly implement 'agreement per hour'
$config['agreement_per_hour'] /= $config['speed'];

// Wie viel Minuten gilt der Anfängerschutz für ein neues Dorf? Wenn es keinen
// Anfängerschutz geben soll, dann den Wert -1 eingeben.
$config['noob_protection'] = -1;	/* NÃO ALTERAR! */
$config['noob_protection_v1'] = 60; /* PROTEÇÃO DE INICIANTES V2 */

// Proteção após a noblagem
$config['ennobled_protection'] = 20;

// Wie viel Minuten brauchen die Händler pro Feld?
$config['dealer_time'] = 5;

// Bis nach wie vielen Minuten können die Händler abgebrochen werden?
// ACHTUNG: Dieser Wert ist nicht Speedabhändig! Dass heißt, bei 5 Minuten 
// Abbruchszeit sind es bei einer Spielegeschwindigkeit von 300 immer noch 5 Minuten!
$config['cancel_dealers'] = 5;

// Welche AG Style soll verwendet werden?
// 0 => pro Dorf können so viele AGs gebaut werden, so hoch wie der Adelshof ist (S1)
// 1 => Es können so viele AGs gebaut werden, so hoch die Summe aller Adelshöfer ist (SDS)
$config['ag_style'] = 2;

// Bauernhof Style:
// 0 => Wenn der Bauernhof bist Stufe 30 ausgebaut ist, so ist geht er bis 22782 (S1).
// 1 => Wenn der Bauernhof bist Stufe 30 ausgebaut ist, so ist geht er bis 24000 (SDS)
$config['bh_style'] = 1;

//Tipo do Armazém
$config['arm_style'] = 1;

// Können Staemme erstellt werden?
// true => JA
// false => NEIN
$config['create_ally'] = true;

// Können Staemme verlassen / Spieler entlassen / Spieler eingeladen werden?
// true => JA
// false => NEIN
$config['leave_ally'] = true;

// Können Staemme aufgelöst werden?
// true => JA
// false => NEIN
$config['close_ally'] = true;

// Es kann eingestellt werden, dass es x fixe Staemme gibt, bei dennen automatisch
// Spieler zugeordnert werden. Beim ersten Login wird jeder Spieler einen Stamm zugeordnet!
// Es wird empfohlen, dass Auflösen, beitreten,... von Staemmen zu deaktivieren! Die Staemme
// m ssen davor erstellt werden!
// Funktion aktivieren?
// true => JA
// false => NEIN
$config['auto_ally'] = false;

//Membros por tribo 
$config['members_ally'] = 10;

// Wenn dieser Wert auf true ist, dann können im Spiel keine Aktionen ausgeführt werden.
// Dies dient zum Beispiel dazu, wenn irgendwelche Vorbereitungen gemacht werden müssen
// und niemand etwas bauen etc. soll. Stämme können aber trotzdem erstellt werden!
$config['no_actions'] = false;

// Wenn dieser Wert auf true ist, können keine weiteren Dörfer erstellt werden. Auch wenn
// ein Spieler aufgeadelt wird, kann er keine weiteren Dörfer erstellen.
$config['not_more_villages'] = false;

// Soll es eine IP Beschränkung geben?
$config['ip_control'] = false;

// Welche Netzwerk IPs dürfen auf die LAN zugreifen? Diese Option ist nur relevant, wenn
// $config['ip_control'] auf "true" gestellt ist.
$allow_ips[] = "192.168.0.1";
$allow_ips[] = "192.168.0.2";
$allow_ips[] = "192.168.0.3";
$allow_ips[] = "192.168.0.4";

/*Schnellleiste
 * Nach wie vielen Einträgen soll in der Schnellleiste ein Umbruch erfolgen?
*/
$config['quickbar'] = 10;

// Zustimmung: Um wie viel soll sie maximal sinken?
$config['agreement_max'] = 35;

// Zustimmung: Um wie viel soll sie minimal sinken?
$config['agreement_min'] = 20;

//Espeço de tempo entre a ação de recomeçar
$config['new_begin_time'] = 60;			//TEMPO EM MINUTOS!

//Outros
$config['max_level_storage'] = 30;		//Level máximo do armazém
$config['max_level_farm'] = 30;			//Level maximo da fazenda

/* MODO NOTURNO */
$config['sleep_time'] = 72;					//tempo em horas para o modo noturno
$config['sleep_reactive_time'] = 20;		//tempo em minutos para desetivar o modo noturno
$config['sleep_used'] = 30;					//tempo em minutos do intervalo entre o uso do modo noturno
$config['sleep_last_attack'] = 15;			//tempo em minutos do ultimo ataque para que seja possivel ativar o modo noturno
$config['sleep_noob_interval'] = 10;		//intervalo de tempo após fim da proteção

/* LIMITE DE ALDEIAS */
$config['village_limit'] = false;	//Ativa/Desativa função
$config['villages_limit'] = 150;	//Limite de aldeias

/* CONFIGURAÇÕES DO AUTO BUILD */
$config['auto_build']['key'] = 'brtwlan';
$config['auto_build']['refresh'] = 1;
$config['auto_build']['grow_time'] = 5;
$config['auto_build']['max_points'] = 6500;

//Envio de apoio a outras aldeias
$config['send_support'] = true;

?>