<?php
/**
Do zrobienia:
rozkodowaæ raporty
rozkodowaæ wiadomoœci
sprawdziæ czy jest wszêdzie bb codes i walidacja POST i GET
ikony w raportach, czy jest ³up, czy nie ma
naprawiæ system bitwy
przestawiæ dodatkowe koszty budowy w lib/builds.php
zrobic auto dodawanie krzaków
usprawniæ awards.php - wybieranie tylko odpowiednich rekordów z bazy
**/

//Id serwera:
$config['__SERVER__ID'] = 2;

//Konfiguracja bazy danych:
$config['db_host'] = 'localhost';
$config['db_user'] = 'root';
$config['db_pw'] = 'plemionka';
$config['db_name'] = 'lan_'.$config['__SERVER__ID'];

//Passy do admina
$config['master_pw'] = 'voropi4141';

//Szybkoœæ serwera
$config['speed'] = 500;

//Standardowa nazwa wioski opuszczonej
$config['left_name'] = 'Opuszczona wioska';

//Mo¿liwoœæ wyboru kierunku wioski (true => tak, false => nie)
$config['village_choose_direction'] = true;

//Obrona gruntowa wioski.
$config['reason_defense'] = 10;

//Czas na anulowanie ataku
$config['cancel_movement'] = 10;

//Szybkoœæ jednostek
$config['movement_speed'] = 0.1;

//Morale (true => tak, false => nie)
$config['moral_activ'] = false;

//Minimalna iloœæ morali w procentach
$config['min_moral'] = 30;

//Czy mo¿na burzyæ budynki? (true => tak, false => nie)
$config['destroy_mode_main'] = true;

//Iloœæ poparcia wzrastaj¹cego w wioskach na godzinê
//UWAGA: wprowadzona wartoœæ poni¿ej zostanie pomno¿ona przez szybkoœæ serwera
$config['agreement_per_hour'] = 1;

//Ochrona pocz¹tkowa graczy w minutach
//Wpisuj¹c -1 bez ochrony
$config['noob_protection'] = -1;

//Szybkoœæ kupców, 1 pole na minutê
$config['dealer_time'] = 12;

//Czas na anulowanie kupca
$config['cancel_dealers'] = 5;

// Styl szlachty:
// 0 => Suma poziomów pa³aców ze wszystkich wiosek gracza wyznacza limit szlachty
// 1 => Iloœæ wybitych monet wyznacza limit szlachty (tak jak na plemiona.pl)
$config['ag_style'] = 1;

//Styl zagrody:
// 0 => Na 30 poziomie zagroda mieœci 22782 ludzi (S1).
// 1 => Na 30 poziomie zagroda mieœci 24000 ludzi (S1).
$config['bh_style'] = 1;

//Mo¿liwoœæ za³o¿enia sojuszu (true => tak, false => nie)
$config['create_ally'] = true;

//Mo¿liwoœæ opuszczenia sojuszu (true => tak, false => nie)
$config['leave_ally'] = true;

//Mo¿liwoœæ rozwi¹zania sojuszu (true => tak, false => nie)
$config['close_ally'] = true;

//Maksymalny zasiêg szlachcica:
//Wpisuj¹c wartoœæ -1 zasiêg jest bez ograniczenia
$config['snob_range'] = 100;

//Brak akcji
$config['no_actions'] = false;

$config['not_more_villages'] = false;

// Koszt monety, potrzebnej do wytwarzania szlachty:
$config['koszt_monety'] = array(
    'wood' => '28000',
	'stone' => '30000',
	'iron' => '25000'
    );
	
// Bonus nocny (true => tak, false => nie)
$config['noc'] = false;

//Godzina w³¹czenia grafiki nocnej
$config['noc_poczatek'] = 22;

//Godzina wy³¹czenia grafiki nocnej
$config['noc_koniec'] = 8;	
	
//Zk³adanie kont i wiosek ('true' => tak,'false' => nie):
$config['create_users_and_villages'] = true;

//Liczba opuszczonych wiosek, które zostan¹ utworzone, po tym jak jakiœ gracz za³o¿y konto:
$config['opuszczone_na_gracza'] = 2;

//Samorozwój wiosek barbarzyñskich:
$config['rozwoj_barbar_wiosek'] = false;

//Ulepszaj opuszczone wioski do (punkty):
$config['rozwoj_barabar_punkty'] = 5000;

//Czêstotliwoœæ bota:
$config['bot_barbar_rad'] = 1;

//Odznaczenia (true => tak, false => nie)
$config['awards'] = true;

//Minimalna wartoœæ poparcia zbijanego przez szlachcica:
$config['pop_min'] = 20;

//Minimalna wartoœæ poparcia zbijanego przez szlachcica (gdy w armii znajdujê siê rycerz z przedmiotem "Ber³o vasca"):
$config['pop_min_paladin'] = 30;

//Maksymalna wartoœæ poparcia zbijanego przez szlachcica:
$config['pop_max'] = 35;


//Produkcja surowców na godzinê - 'level' => 'value' 
$arr_production = array(
	"0"=>"5",
	"1"=>"30",
	"2"=>"35",
	"3"=>"41",
	"4"=>"47",
	"5"=>"55",
	"6"=>"64",
	"7"=>"74",
	"8"=>"86",
	"9"=>"100",
	"10"=>"117",
	"11"=>"136",
	"12"=>"158",
	"13"=>"184",
	"14"=>"214",
	"15"=>"249",
	"16"=>"289",
	"17"=>"337",
	"18"=>"391",
	"19"=>"455",
	"20"=>"530",
	"21"=>"616",
	"22"=>"717",
	"23"=>"833",
	"24"=>"969",
	"25"=>"1127",
	"26"=>"1311",
	"27"=>"1525",
	"28"=>"1774",
	"29"=>"2063",
	"30"=>"2400"
	);

//Dodatkowa si³a obrony:	
$arr_wall_bonus = array(
	"0"=>"0.00",
	"1"=>"0.04",
	"2"=>"0.08",
	"3"=>"0.12",
	"4"=>"0.16",
	"5"=>"0.20",
	"6"=>"0.24",
	"7"=>"0.29",
	"8"=>"0.34",
	"9"=>"0.39",
	"10"=>"0.44",
	"11"=>"0.49",
	"12"=>"0.55",
	"13"=>"0.60",
	"14"=>"0.66",
	"15"=>"0.72",
	"16"=>"0.79",
	"17"=>"0.85",
	"18"=>"0.92",
	"19"=>"0.99",
	"20"=>"1.07",
	);
	
//Dodatkowa obrona gruntowa wioski
$arr_basic_defense = array(
	"0"=>"0",
	"1"=>"70",
	"2"=>"120",
	"3"=>"170",
	"4"=>"220",
	"5"=>"270",
	"6"=>"320",
	"7"=>"370",
	"8"=>"420",
	"9"=>"470",
	"10"=>"520",
	"11"=>"570",
	"12"=>"620",
	"13"=>"670",
	"14"=>"720",
	"15"=>"760",
	"16"=>"820",
	"17"=>"870",
	"18"=>"920",
	"19"=>"970",
	"20"=>"1020",
	);
	
//Pojemnoœæ spichlerza w zalerznoœci od poziomu jego rozbudowy:
$arr_maxstorage = array(
	"1"=>"1000",
	"2"=>"1229",
	"3"=>"1512",
	"4"=>"1859",
	"5"=>"2285",
	"6"=>"2810",
	"7"=>"3454",
	"8"=>"4247",
	"9"=>"5222",
	"10"=>"6420",
	"11"=>"7893",
	"12"=>"9705",
	"13"=>"11932",
	"14"=>"14670",
	"15"=>"18037",
	"16"=>"22177",
	"17"=>"27266",
	"18"=>"33523",
	"19"=>"41217",
	"20"=>"50675",
	"21"=>"62305",
	"22"=>"76604",
	"23"=>"94184",
	"24"=>"115798",
	"25"=>"142373",
	"26"=>"175047",
	"27"=>"215219",
	"28"=>"264611",
	"29"=>"325337",
	"30"=>"400000"
	);

//Pojemnoœæ kryjówki w zaleznoœci od poziomu jej rozbudowy:	
$arr_maxhide = array(
	"1"=>"100",
	"2"=>"135",
	"3"=>"183",
	"4"=>"247",
	"5"=>"333",
	"6"=>"450",
	"7"=>"333",
	"8"=>"822",
	"9"=>"1110",
	"10"=>"1500"
	);

//Pojemnoœæ zagrody w zaleznoœci od poziomu jej rozbudowy:	
if ($config['bh_style'] == 0) {
	$arr_farm = array(
		"1"=>"250",
		"2"=>"280",
		"3"=>"328",
		"4"=>"384",
		"5"=>"449",
		"6"=>"526",
		"7"=>"615",
		"8"=>"720",
		"9"=>"842",
		"10"=>"986",
		"11"=>"1153",
		"12"=>"1349",
		"13"=>"1579",
		"14"=>"1847",
		"15"=>"2161",
		"16"=>"2529",
		"17"=>"2959",
		"18"=>"3462",
		"19"=>"4050",
		"20"=>"4739",
		"21"=>"5545",
		"22"=>"6488",
		"23"=>"7591",
		"24"=>"8881",
		"25"=>"10391",
		"26"=>"12157",
		"27"=>"14224",
		"28"=>"16642",
		"29"=>"19472",
		"30"=>"22782",
		"31"=>"24642",
		"32"=>"26642",
		"33"=>"47000"
		);
	} elseif ($config['bh_style']==1) {
	$arr_farm = array(
		"1"=>"240",
		"2"=>"281",
		"3"=>"329",
		"4"=>"386",
		"5"=>"452",
		"6"=>"530",
		"7"=>"622",
		"8"=>"729",
		"9"=>"854",
		"10"=>"1002",
		"11"=>"1174",
		"12"=>"1376",
		"13"=>"1613",
		"14"=>"1891",
		"15"=>"2216",
		"16"=>"2598",
		"17"=>"3045",
		"18"=>"3569",
		"19"=>"4183",
		"20"=>"4904",
		"21"=>"5748",
		"22"=>"6737",
		"23"=>"7896",
		"24"=>"9255",
		"25"=>"10848",
		"26"=>"12715",
		"27"=>"14904",
		"28"=>"17469",
		"29"=>"20476",
		"30"=>"24000",
		"31"=>"24642",
		"32"=>"26472",
		"33"=>"47000"
		);

	}
	
//Budynki, które musz¹ mieæ co najmniej pierwszy stopieñ rozbudowy:
$arr_builds_starts_by_one = array("main","farm","storage","hide","place");

//Iloœæ kupców w wiosce w zaleznoœci od poziomu rozbudowy rynku:	
$arr_dealers = array(
	0=>0,
	1=>1,
	2=>2,
	3=>3,
	4=>4,
	5=>5,
	6=>6,
	7=>7,
	8=>8,
	9=>6,
	10=>10,
	11=>11,
	12=>14,
	13=>19,
	14=>26,
	15=>35,
	16=>46,
	17=>59,
	18=>74,
	19=>91,
	20=>110,
	21=>131,
	22=>154,
	23=>179,
	24=>206,
	25=>235
	);
	
//Ustawienia przedmiotów rycerza:
$pala_bonus = array (
	'unit_spear' => array(1.3,1.2,'Halabarda szwajcarska'),
	'unit_sword' => array(1.4,1.3,'D³ugi miecz Ulricha'),
	'unit_axe' => array(1.4,1.3,'Wojowniczy topór Thorgarda'),
	'unit_archer' => array(1.3,1.2,'Wielki ³uk Edwarda'),
	'unit_spy' => array(1,1,'Luneta Kalida'),
	'unit_light' => array(1.3,1.2,'Lanca Mieszka'),
	'unit_marcher' => array(1.3,1.2,'£uk refleksyjny Khana'),
	'unit_heavy' => array(1.3,1.2,'Flaga Baptysty'),
	'unit_ram' => array(1,1,'Wekiera Carlosa'),
	'unit_catapult' => array(1,10,'Ogieñ olimpijski'),
	'unit_snob' => array(1.3,1.2,'Ber³o Vasca'),
	);
?>