<?php
$cl_builds = new builds();
//////////// Zeitfaktor vom Bau der Geb�ude ////////////
$cl_builds->set_mainfactor("1.00","0.952381");
////////////////// BAUSCHLEIF KOSTEN ///////////////////
$cl_builds->set_buildsharpens("1.25","20");
///////////////////// Alle Geb�ude /////////////////////
$cl_builds->add_build("Ratusz","main");
$cl_builds->set_woodprice("90","1.26");
$cl_builds->set_stoneprice("80","1.275");
$cl_builds->set_ironprice("70","1.26");
$cl_builds->set_bhprice("5","1.17");
$cl_builds->set_time("1080","1.2");
$cl_builds->set_points("10","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage("30");
$cl_builds->set_specials(array());
$cl_builds->set_description("W ratuszu mo�na rozbudowywa� ju� istniej�ce budynki lub budowa� nowe. Im wi�kszy stopie� rozbudowania, tym szybciej s� budowane budynki. Po wybudowaniu ratusza do pi�tnastego poziomu mo�esz burzy� inne budynki. Pod list� budynk�w znajduje si� r�wnie� miejsce, w kt�rym mo�emy zmieni� nazw� wioski.");
$cl_builds->add_build("Koszary","barracks");
$cl_builds->set_woodprice("200","1.26");
$cl_builds->set_stoneprice("170","1.28");
$cl_builds->set_ironprice("90","1.26");
$cl_builds->set_bhprice("7","1.17");
$cl_builds->set_time("1800","1.2");
$cl_builds->set_points("16","1.2");
$cl_builds->set_needbuilds(array("main"=>"3"));
$cl_builds->set_maxstage("25");
$cl_builds->set_specials(array());
$cl_builds->set_description("W koszarach mo�esz rekrutowa� piechot�. Im wi�kszy stopie� rozbudowania, tym szybciej przebiega rekrutacja.");
$cl_builds->add_build("Stajnia","stable");
$cl_builds->set_woodprice("270","1.26");
$cl_builds->set_stoneprice("240","1.28");
$cl_builds->set_ironprice("260","1.26");
$cl_builds->set_bhprice("8","1.17");
$cl_builds->set_time("6000","1.2");
$cl_builds->set_points("20","1.2");
$cl_builds->set_needbuilds(array("main"=>"10","barracks"=>"5","smith"=>"5"));
$cl_builds->set_maxstage("20");
$cl_builds->set_specials(array());
$cl_builds->set_description("W stajni mo�esz rekrutowa� je�d�c�w. Im wi�kszy stopie� rozbudowania stajni, tym szybciej przebiega rekrutacja.");
$cl_builds->add_build("Warsztat","garage");
$cl_builds->set_woodprice("300","1.26");
$cl_builds->set_stoneprice("240","1.28");
$cl_builds->set_ironprice("260","1.26");
$cl_builds->set_bhprice("8","1.16");
$cl_builds->set_time("6000","1.2");
$cl_builds->set_points("24","1.2");
$cl_builds->set_needbuilds(array("main"=>"10","smith"=>"10"));
$cl_builds->set_maxstage("15");
$cl_builds->set_specials(array());
$cl_builds->set_description("W warsztacie mo�esz produkowa� bro� obl�nicz�. Im wi�kszy stopie� rozbudowania, tym szybciej s� produkowane wojska.");
$cl_builds->add_build("Pa�ac","snob");
$cl_builds->set_woodprice("15000","2");
$cl_builds->set_stoneprice("25000","2");
$cl_builds->set_ironprice("10000","2");
$cl_builds->set_bhprice("80","1.17");
$cl_builds->set_time("64800","1.2");
$cl_builds->set_points("512","1.2");
$cl_builds->set_needbuilds(array("main"=>"20","smith"=>"20","market"=>"10"));
if ($config['ag_style'] == 0) {
	$cl_builds->set_maxstage("3");
	}
if ($config['ag_style'] == 1) {
	$cl_builds->set_maxstage("1");
	}
$cl_builds->set_specials(array());
$cl_builds->set_description("W pa�acu mo�esz rekrutowa� szlachcic�w do przejmowania innych wiosek.");
$cl_builds->add_build("Ku�nia","smith");
$cl_builds->set_woodprice("220","1.26");
$cl_builds->set_stoneprice("180","1.275");
$cl_builds->set_ironprice("240","1.26");
$cl_builds->set_bhprice("40","1.17");
$cl_builds->set_time("6000","1.2");
$cl_builds->set_points("19","1.2");
$cl_builds->set_needbuilds(array("main"=>"5","barracks"=>"1"));
$cl_builds->set_maxstage("20");
$cl_builds->set_specials(array());
$cl_builds->set_description("Jednostki s� badane w ku�ni. Im wi�kszy stopie� rozbudowania ku�ni, tym lepsze jednostki mo�na bada�. Dodatkowo zmniejsza si� czas badania. Liczba mo�liwych bada� jest ograniczona. Technologie ju� zbadane mo�na zlikwidowa�, by zrobi� miejsce na inne. Przy likwidacji nie otrzymuje si� surowc�w.");
$cl_builds->add_build("Plac","place");
$cl_builds->set_woodprice("10","1.2");
$cl_builds->set_stoneprice("40","1.2");
$cl_builds->set_ironprice("30","1.2");
$cl_builds->set_bhprice("0","1.17");
$cl_builds->set_time("2000","1.2");
$cl_builds->set_points("0","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage("1");
$cl_builds->set_specials(array());
$cl_builds->set_description("Na placu stoj� wszystkie wojska. Tutaj mo�esz wydawa� rozkazy i przesuwa� wojska.");
$cl_builds->add_build("Piedesta�","statue");
$cl_builds->set_woodprice("220","1");
$cl_builds->set_stoneprice("220","1");
$cl_builds->set_ironprice("220","1");
$cl_builds->set_bhprice("10","1");
$cl_builds->set_time("600","1");
$cl_builds->set_points("24","1");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage("1");
$cl_builds->set_specials(array());
$cl_builds->set_description("Mieszka�cy wioski oddaj� ho�d rycerzowi na piedestale. Je�eli tw�j rycerz polegnie w walce, tutaj mo�esz mianowa� nowego wojownika do rangi rycerza.");


$cl_builds->add_build("Rynek","market");
$cl_builds->set_woodprice("100","1.26");
$cl_builds->set_stoneprice("100","1.275");
$cl_builds->set_ironprice("100","1.26");
$cl_builds->set_bhprice("20","1.17");
$cl_builds->set_time("2700","1.2");
$cl_builds->set_points("10","1.2");
$cl_builds->set_needbuilds(array("main"=>"3","storage"=>"2"));
$cl_builds->set_maxstage("25");
$cl_builds->set_specials(array());
$cl_builds->set_description("Tutaj mo�esz handlowa� z innymi graczami lub przesy�a� surowce.");
$cl_builds->add_build("Tartak","wood");
$cl_builds->set_woodprice("50","1.25");
$cl_builds->set_stoneprice("60","1.275");
$cl_builds->set_ironprice("40","1.245");
$cl_builds->set_bhprice("5","1.15");
$cl_builds->set_time("900","1.2");
$cl_builds->set_points("6","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage("30");
$cl_builds->set_specials(array());
$cl_builds->set_description("Tutaj drwale obrabiaj� drewno �ci�te w okolicznych lasach, kt�re jest potrzebne zar�wno do budowy wioski, jak i do uzbrojenia wojsk. Im wi�kszy stopie� rozbudowania tartaku, tym wi�ksza produkcja drewna");
$cl_builds->add_build("Cegielnia","stone");
$cl_builds->set_woodprice("65","1.27");
$cl_builds->set_stoneprice("50","1.265");
$cl_builds->set_ironprice("40","1.24");
$cl_builds->set_bhprice("10","1.14");
$cl_builds->set_time("900","1.2");
$cl_builds->set_points("6","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage("30");
$cl_builds->set_specials(array());
$cl_builds->set_description("W cegielni pracownicy wydobywaj� glin� na rozbudow� wioski. Im wi�kszy stopie� rozbudowania cegielni, tym wi�cej wydobywa si� gliny.");
$cl_builds->add_build("Huta �elaza","iron");
$cl_builds->set_woodprice("75","1.25");
$cl_builds->set_stoneprice("65","1.275");
$cl_builds->set_ironprice("70","1.24");
$cl_builds->set_bhprice("10","1.17");
$cl_builds->set_time("1080","1.2");
$cl_builds->set_points("6","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage("30");
$cl_builds->set_specials(array());
$cl_builds->set_description("W hucie �elaza Twoi pracownicy wytapiaj� �elazo. Im wy�szy stopie� rozbudowania huty, tym wi�cej �elaza mo�na przy jej pomocy pozyskiwa�.");
$cl_builds->add_build("Zagroda","farm");
$cl_builds->set_woodprice("45","1.3");
$cl_builds->set_stoneprice("40","1.32");
$cl_builds->set_ironprice("30","1.29");
$cl_builds->set_bhprice("0","1");
$cl_builds->set_time("1440","1.2");
$cl_builds->set_points("5","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage("30");
$cl_builds->set_specials(array());
$cl_builds->set_description("Zagroda wy�ywia twoich pracownik�w i wojska. Bez rozbudowania zagrody twoja wioska nie mo�e si� rozrasta�. Im wi�kszy stopie� rozbudowania, tym wi�cej mieszka�c�w mo�e by� wy�ywionych.");
$cl_builds->add_build("Spichlerz","storage");
$cl_builds->set_woodprice("60","1.265");
$cl_builds->set_stoneprice("50","1.27");
$cl_builds->set_ironprice("40","1.245");
$cl_builds->set_bhprice("0","1");
$cl_builds->set_time("1224","1.2");
$cl_builds->set_points("6","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage("30");
$cl_builds->set_specials(array());
$cl_builds->set_description("W spichlerzu s� umieszczane surowce. Im wi�kszy stopie� rozbudowania, tym wi�cej mo�esz umieszcza� w nim surowc�w.");
$cl_builds->add_build("Schowek","hide");
$cl_builds->set_woodprice("50","1.25");
$cl_builds->set_stoneprice("60","1.25");
$cl_builds->set_ironprice("50","1.25");
$cl_builds->set_bhprice("2","1.20");
$cl_builds->set_time("2160","1.2");
$cl_builds->set_points("5","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage("10");
$cl_builds->set_specials(array("catapult_protection"));
$cl_builds->set_description("W schowku mo�na chowa� surowce, tak, �eby przeciwnik nie m�g� ich spl�drowa�. Nawet zwiadowcy przeciwnika nie mog� si� dowiedzie�, ile surowc�w ukryto w schowku.");
$cl_builds->add_build("Mur obronny","wall");
$cl_builds->set_woodprice("50","1.26");
$cl_builds->set_stoneprice("100","1.275");
$cl_builds->set_ironprice("20","1.26");
$cl_builds->set_bhprice("5","1.18");
$cl_builds->set_time("3600","1.2");
$cl_builds->set_points("8","1.2");
$cl_builds->set_needbuilds(array("barracks"=>"1"));
$cl_builds->set_maxstage("20");
$cl_builds->set_specials(array());
$cl_builds->set_description("Mur obronny chroni wiosk� przed przeciwnikiem. Dzi�ki niemu wzrasta si�a obrony wojsk i obrona og�lna wioski.");
?>
