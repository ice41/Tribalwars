<?php
/*******************************************/
/*********** KONFIGURATIONSDATEI ***********/
/******* von Die-Staemme Lan Version *******/
/*********** by Thomas Maninger ************/
/********** (Ingame: DBGTMaster) ***********/
/*******************************************/

/**********************************************************

Es wird empfohlen, w?hrend des laufen der Runde m?glichst
keine Einstellungen in der Konfigurationsdatei zu ver?ndern,
da ansonsten kein 100% funktionsfreies laufen der aktuellen
Runde garantiert werden kann.
Einstellungen des Speedes, Einheitengeschwindigkeit k?nnen
aber jederzeit ge?ndert werden.

**********************************************************/ 
//Id serwera:
$config['__SERVER__ID'] = 2;

// Datenbankverbindung:
$config['db_host'] = 'localhost';
$config['db_user'] = 'root';
$config['db_pw'] = 'plemionka';
$config['db_name'] = 'lan_'.$config['__SERVER__ID'];

// Passwort f?r Administration
$config['master_pw'] = 'plemionka_admin.php';

// Spielegeschwindigkeit, je h?her, desto schneller l?uft das Spiel
$config['speed'] = 10000;

// Nach wie vielen D?rfern soll immer ein Fl?chtlingslager erstellt werden?
// Mit der Angabe "-1" werden keine Fl?chtlingslager automatisch erstellt.
$config['count_create_left'] = -1;

// Wie viel D?rfer muss ein Spieler mindestens haben? Wenn z.b.: nun die Zahl
// 5 angegegen wird, so hat der Spieler am Start sofort 5 D?rfer. Sollte er
// eines verlieren, so bekommt er ein 5 wieder dazu!
// Nicht den Wert "0" verwenden!
// ?bertreibt bitte nicht mit "4000" oder sonst was, da der erste Login
// ansonsten ewig dauert!
$config['min_villages'] = 1;

// ACHTUNG: Diese Einstellung wird erst wirksam, wenn in der Administration ein Reset
// oder Softreset durchgef?hrt wird.
$config['map_incircle'] = 0;

// Was f?r einen Namen haben automatisch erstellte Fl?chtlingslager?
$config['left_name'] = 'Opuszczona wioska';

// Soll man beim erstellen eines neues Dorfes die Himmelsrichtung aussuchen d?rfen?
// true oder false
$config['village_choose_direction'] = true;

// Grundverteidiung von jedem Dorf.
$config['reason_defense'] = 50;

// Was f?r ein Faktor gilt bei Sp?her? Der Wert "2" beudetet: Wenn der Verteidiger 2x
// mehr Sp?her als der Angreifer hat, so sterben alle Sp?her des Angreifers
// (Verh?ltnis 2:1). Bei Wert "3" ist es dann ein Verh?ltnis "3:1" und beudetet, dass
// der Verteidiger drei fach mehr Sp?her braucht, damit der Angreifer alle Sp?her verliert.
$config['factor_spy'] = 2;

// Bis nach wie vielen Minuten kann ein Angriff / Unterst?tzung abgebrochen werden?
// ACHTUNG: Dieser Wert ist nicht Speedabh?ndig! Dass hei?t, bei 10 Minuten 
// Abbruchszeit sind es bei einer Spielegeschwindigkeit von 300 immer noch 10 Minuten!
$config['cancel_movement'] = 5;

// Geschwindigkeit der Einheiten. Je kleiner der Wert ist, desto langsamer werden die
// Einheiten. Normalgeschwindigkeit hat den Wert "1".
$config['movement_speed'] = 0.1;

// Soll die Moral aktiv sein oder nicht???
// true => Moral ist aktiv
// false => Moral ist nicht aktiv
$config['moral_activ'] = true;

// Bis wie viel % darf die Moral maximal sinken?? Der Standartwert ist 35%. Als wert
// bloss die Zahl angeben ohne die das "%" Zeichen!
$config['min_moral'] = 35;


// Um wie viel Zustimmung soll die Zustimmung pro Stunde steigen? Der Standartwert
// ist 1! Um so kleiner die Zahl, desto langsamer steigst die Zustimmung! (z.B.: 0.5)
$config['agreement_per_hour'] = 3;

// Wie viel Minuten gilt der Anf?ngerschutz f?r ein neues Dorf? Wenn es keinen
// Anf?ngerschutz geben soll, dann den Wert -1 eingeben.
$config['noob_protection'] = -1;

// Wie viel Minuten brauchen die H?ndler pro Feld?
$config['dealer_time'] = 0.001;

// Bis nach wie vielen Minuten k?nnen die H?ndler abgebrochen werden?
// ACHTUNG: Dieser Wert ist nicht Speedabh?ndig! Dass hei?t, bei 5 Minuten 
// Abbruchszeit sind es bei einer Spielegeschwindigkeit von 300 immer noch 5 Minuten!
$config['cancel_dealers'] = 5;

// Styl szlachty:
// 0 => Suma poziomów pa³aców ze wszystkich wiosek gracza wyznacza limit szlachty
// 1 => Iloœæ wybitych monet wyznacza limit szlachty (tak jak na plemiona.pl)
$config['ag_style'] = 1;

// Bauernhof Style:
// 0 => Wenn der Bauernhof bist Stufe 30 ausgebaut ist, so ist geht er bis 22782 (S1).
// 1 => Wenn der Bauernhof bist Stufe 30 ausgebaut ist, so ist geht er bis 24000 (SDS)
$config['bh_style'] = 1;

// K?nnen Staemme erstellt werden?
// true => JA
// false => NEIN
$config['create_ally'] = true;

// K?nnen Staemme verlassen / Spieler entlassen / Spieler eingeladen werden?
// true => JA
// false => NEIN
$config['leave_ally'] = true;

// K?nnen Staemme aufgel?st werden?
// true => JA
// false => NEIN
$config['close_ally'] = true;

// Es kann eingestellt werden, dass es x fixe Staemme gibt, bei dennen automatisch
// Spieler zugeordnert werden. Beim ersten Login wird jeder Spieler einen Stamm zugeordnet!
// Es wird empfohlen, dass Aufl?sen, beitreten,... von Staemmen zu deaktivieren! Die Staemme
// m?ssen davor erstellt werden!
// Funktion aktivieren?
// true => JA
// false => NEIN
$config['auto_ally'] = false;

// Wenn dieser Wert auf true ist, dann k?nnen im Spiel keine Aktionen ausgef?hrt werden.
// Dies dient zum Beispiel dazu, wenn irgendwelche Vorbereitungen gemacht werden m?ssen
// und niemand etwas bauen etc. soll. St?mme k?nnen aber trotzdem erstellt werden!
$config['no_actions'] = false;

// Wenn dieser Wert auf true ist, k?nnen keine weiteren D?rfer erstellt werden. Auch wenn
// ein Spieler aufgeadelt wird, kann er keine weiteren D?rfer erstellen.
$config['not_more_villages'] = false;

// Koszt monety, potrzebnej do wytwarzania szlachty:
$config['koszt_monety'] = array(
    'wood' => '28000',
	'stone' => '30000',
	'iron' => '25000'
    );
	
//Zk³adanie kont i wiosek ('true' => tak,'false' => nie):
$config['create_users_and_villages'] = true;

//Liczba opuszczonych wiosek, które zostan¹ utworzone, po tym jak jakiœ gracz za³o¿y konto:
$config['opuszczone_na_gracza'] = 2;

//Samorozwój wiosek barbarzyñskich:
$config['rozwoj_barbar_wiosek'] = false;

//Ulepszaj opuszczone wioski do (punkty):
$config['rozwoj_barabar_punkty'] = 12153;

//Czêstotliwoœæ bota:
$config['bot_barbar_rad'] = 1;
?>