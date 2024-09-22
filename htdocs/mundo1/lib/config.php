<?php
/**
Façam:
Relatórios decodificados
decodificado
Verifique se há códigos BB e postagem de validação e obtenha
ícones nos relatórios se há um `` up ou não
Consertar o sistema de batalha
Mostre custos adicionais de construção em lib/builds.php
Faça um carro adicionando arbusto
Awards.Php aprimorados - selecionando apenas os registros apropriados da base
**/

//Id serwera:
$config['__SERVER__ID'] = 1;

//Konfiguracja bazy danych:
$config['db_host'] = 'localhost';
$config['db_user'] = 'root';
$config['db_pw'] = 'plemionka';
$config['db_name'] = 'lan_'.$config['__SERVER__ID'];

//Passy do admina
$config['master_pw'] = 'voropi4141';

// Número de aldeias para novos jogadores!!!!!!!!!!!!!!!!!!!!!!!!!!!
$config['wioski_na_start'] = 1;

//Igreja e monges
$config['kosciol_i_mnisi'] = true;
//Opcje dodatkowe
$conf['opcja1'] = '../ds_graphic/unit/unit_ram.png';
$conf['opcja2'] = 'Os arietes são fortes como defesa contra a cavalaria.';
$conf['opcja3'] = 'green';
$conf['opcja4'] = 'ice41 team';
$conf['opcja5'] = 'Bem vindo a este novo mundo';
$conf['opcja6'] = 'divirta-se e nunca use trapaças!';
$config1 = $conf;
// dica da semana
//Imagem:
$config['powitalna']['wsk_tyg_img'] = $config1['opcja1'];
//tekst
$config['powitalna']['wsk_tyg_text'] = $config1['opcja2'];
$config['powitalna']['kolor'] = $config1['opcja3'];

// servidor rápido
$config['speed'] = 2500;

// mundo com funções preliminares pré -premium;
$config['premium'] = true;
// Funções premium - dados
// números
$config['kod']['1']['numer'] = 'XXXXX';
$config['kod']['2']['numer'] = 'XXXXX';
$config['kod']['3']['numer'] = 'XXXXX';
//Treści
$config['kod']['1']['tresc'] = 'XXXXXXX';
$config['kod']['2']['tresc'] = 'XXXXXXX';
$config['kod']['3']['tresc'] = 'XXXXXXX';
$config['kod']['4']['tresc'] = 'XXXXXXX';
//Koszty
$config['kod']['1']['zl'] = 'X,XX';
$config['kod']['2']['zl'] = 'X,XX';
$config['kod']['3']['zl'] = 'XX,XX';
$config['kod']['4']['zl'] = 'XX,XX';

// Configurações de liderança do sistema
//Remetente
$config['mail']['nadawca'] = $config1['opcja4'];
//Ustawienia wiodomości powitalnej
$config['mail']['temat'] = $config1['opcja5'];	
$config['mail']['text'] = $config1['opcja6'];

// Nome padrão da vila abandonada
$config['left_name'] = 'Aldeia Bárbara';

// Possibilidade de escolher a direção da vila (true => sim, false => não)
$config['village_choose_direction'] = true;

// defesa terrestre da vila.
$config['reason_defense'] = 10;

// Hora de cancelar o ataque
$config['cancel_movement'] = 10;

// rapidamente
$config['movement_speed'] = 5;

// moral (true => sim, false => não)
$config['moral_activ'] = true;

// moral mínimo como porcentagem
$config['min_moral'] = 10;

// Você pode destruir edifícios?(True => sim, false => não)
$config['destroy_mode_main'] = true;

// Número de apoio nas aldeias por horas
// Nota: O valor introduzido abaixo será multiplicado pelo servidor rapidamente
$config['agreement_per_hour'] = 1;

// Proteção inicial dos jogadores em minutos
// Digite -1 sem proteção
$config['noob_protection'] = 180;

// Rapidamente, comprar, 1 campo por minuto
$config['dealer_time'] = 5;

// Hora de cancelar o comprador
$config['cancel_dealers'] = 5;

// estilo nobreza:
// 0 => A soma dos níveis de todos os níveis de todas as aldeias do jogador determina o limite de nobreza
// 1 => O número de moedas quebradas determina o limite de nobreza (assim como no Plemiona.pl)
$config['ag_style'] = 1;

// Estilo agrícola:
// 0 => No nível 30, a fazenda de 22782 pessoas (S1).
// 1 => No nível 30, uma fazenda de 24.000 pessoas (S1).
$config['bh_style'] = 1;

// Possibilidade de aliança (true => sim, false => não)
$config['create_ally'] = true;

// Possivelmente deixando a aliança (true => sim, false => não)
$config['leave_ally'] = true;

// Possibilidade de soluções de aliança (true => sim, false => não)
$config['close_ally'] = false;

// faixa máxima do nobre:
// Digite o intervalo de valor -sem restrição
$config['snob_range'] = 100;

// sem ação
$config['no_actions'] = false;

$config['not_more_villages'] = false;

// Custo das moedas:
$config['m_wood'] = '28000';
$config['m_stone'] = '30000';
$config['m_iron'] = '25000';
// custo da moeda necessária para produzir a nobreza:
$config['koszt_monety'] = array(
    'wood' => ''.$config['m_wood'].'',
	'stone' => ''.$config['m_stone'].'',
	'iron' => ''.$config['m_iron'].''
    );
	
// bônus noturno (true => sim, false => não)
$config['noc'] = true;

// Hora de gráficos noturnos
$config['noc_poczatek'] = 22;

// Hora de gráficos noturnos
$config['noc_koniec'] = 8;	
	
// acaso de veio e aldeias ('true' => sim, 'false' => não):
$config['create_users_and_villages'] = true;

// Número de aldeias abandonadas que serão criadas após a conta de um jogador:
$config['opuszczone_na_gracza'] = 2;

// Samorozój Barbarzyn Villages:
$config['rozwoj_barbar_wiosek'] = false;

// Melhora as aldeias abandonadas para (pontos):
$config['rozwoj_barabar_punkty'] = 5000;

// cz�stotliwo�� throw:
$config['bot_barbar_rad'] = 1;

// decorações (true => sim, false => não)
$config['awards'] = true;

// Valor mínimo de suporte quebrado por um nobre:
$config['pop_min'] = 20;

// Valor mínimo de apoio quebrado por um nobre (quando um cavaleiro com o assunto de "ber�o vasca"):
$config['pop_min_paladin'] = 30;

// Valor máximo de suporte quebrado por um nobre:
$config['pop_max'] = 35;


// Produção de matérias -primas por hora - 'nível' => 'valor'
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

//Dodatkowa si�a obrony:	
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
	
//Pojemno�� spichlerza w zalerzno�ci od poziomu jego rozbudowy:
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

//Pojemno�� kryj�wki w zalezno�ci od poziomu jej rozbudowy:	
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

//Pojemno�� zagrody w zalezno�ci od poziomu jej rozbudowy:	
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
	
// Edifícios, que você deve ter pelo menos o primeiro nivel de expansão:
$arr_builds_starts_by_one = array("main","farm","storage","hide","place");

//Ilo�� kupc�w w wiosce w zalezno�ci od poziomu rozbudowy rynku:	
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
	
// Configurações dos itens do cavaleiro:
$pala_bonus = array (
	'unit_spear' => array(1.3,1.2,'alabarda suíça'),
	'unit_sword' => array(1.4,1.3,'Espada de Ulrich'),
	'unit_axe' => array(1.4,1.3,'Machado de Guerra de Thorgard'),
	'unit_archer' => array(1.3,1.2,'Grande Arco de Edward'),
	'unit_spy' => array(1,1,'Escopo Kalid'),
	'unit_light' => array(1.3,1.2,'Lança de Mieszko'),
	'unit_marcher' => array(1.3,1.2,'Arco recurvo de Khan'),
	'unit_heavy' => array(1.3,1.2,'O lago batista'),
	'unit_ram' => array(1,1,'Wekiera Carlosa'),
	'unit_catapult' => array(1,10,'fogo olimpico'),
	'unit_snob' => array(1.3,1.2,'Bero Vasca'),
	);
?>