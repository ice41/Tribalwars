<?php
// Date despre server
$config['db_host'] = 'localhost';
$config['db_user'] = 'root';
$config['db_pw'] = '';
$config['db_name'] = 'lan';

// Parola pentru administrator
$config['master_pw'] = 'pass';

// Viteza serverului
$config['speed'] = 500;

// Design harta joc
$config['map_design'] = 1;

// ----
$config['count_create_left'] = 6;

// Numarul minin de sate la un jucator
$config['min_villages'] = 1;

// Aceasta optiune va aranja satele de pe harta in cerc
$config['map_incircle'] = 0;

// Numele unui sat care nu are proprietar
$config['left_name'] = 'Sat de Barbari';

// Permite jucatorului sa aleaga directia satului
$config['village_choose_direction'] = 1;

// ---
$config['reason_defense'] = 50;

// ---
$config['factor_spy'] = 3;

// La cate minute poti opri o comanda
$config['cancel_movement'] = 30;

// Viteza trupelor
$config['movement_speed'] = 0.2;

// Moral intre jucatori
$config['moral_activ'] = 1;

// Moral minim
$config['min_moral'] = 35;

// Cu cat creste adeziunea unui sat pe ora
$config['agreement_per_hour'] = 0.05;

// Protectie pentru incepatori
$config['noob_protection'] = 60;

// Cat timp face un negustor pe o parcela
$config['dealer_time'] = 5;

// La cat timp poti anula o comanda a negustorilor
$config['cancel_dealers'] = 5;

// ---
$config['ag_style'] = 1;

// ---
$config['bh_style'] = 1;

// Permite oricarui jucator sa creeze un trib
$config['create_ally'] = 1;

// Permite jucatorilor sa paraseasca un trib
$config['leave_ally'] = 1;

// Permite Fondatorului sa dizolve un trib
$config['close_ally'] = 1;

//Un jucator cand isi primu sat,sa il dea automat intrun trib
$config['auto_ally'] = 0;

// ---
$config['no_actions'] = 0;

// Nu se mai construiesc alte sate (optiune ce impiedica inceperea noilor conturi)
$config['not_more_villages'] = 0;

// ---
$config['ip_control'] = 0;


/*Schnellleiste
 * Nach wie vielen Einträgen soll in der Schnellleiste ein Umbruch erfolgen?
*/
$config['quickbar'] = 10;

// Zustimmung: Um wie viel soll sie maximal sinken?
$config['agreement_max'] = 35;

// Zustimmung: Um wie viel soll sie minimal sinken?
$config['agreement_min'] = 20;

//Wie viel Spieler sollen in der Schnellen Rangliste angezeigt werden?
$config['set_player'] = 5;
?>
