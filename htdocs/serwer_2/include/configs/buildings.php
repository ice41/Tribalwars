<?php
$cl_builds = new builds();
//////////// Zeitfaktor vom Bau der Gebäude ////////////
$cl_builds->set_mainfactor("1.00","0.952381");
////////////////// BAUSCHLEIF KOSTEN ///////////////////
$cl_builds->set_buildsharpens("1.25","20");
///////////////////// Alle Gebäude /////////////////////
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
$cl_builds->set_description("W ratuszu mo¿na rozbudowywaæ ju¿ istniej¹ce budynki lub budowaæ nowe. Im wiêkszy stopieñ rozbudowania, tym szybciej s¹ budowane budynki. Po wybudowaniu ratusza do piêtnastego poziomu mo¿esz burzyæ inne budynki. Pod list¹ budynków znajduje siê równie¿ miejsce, w którym mo¿emy zmieniæ nazwê wioski.");
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
$cl_builds->set_description("W koszarach mo¿esz rekrutowaæ piechotê. Im wiêkszy stopieñ rozbudowania, tym szybciej przebiega rekrutacja.");
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
$cl_builds->set_description("W stajni mo¿esz rekrutowaæ jeŸdŸców. Im wiêkszy stopieñ rozbudowania stajni, tym szybciej przebiega rekrutacja.");
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
$cl_builds->set_description("W warsztacie mo¿esz produkowaæ broñ oblê¿nicz¹. Im wiêkszy stopieñ rozbudowania, tym szybciej s¹ produkowane wojska.");
$cl_builds->add_build("Pa³ac","snob");
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
$cl_builds->set_description("W pa³acu mo¿esz rekrutowaæ szlachciców do przejmowania innych wiosek.");
$cl_builds->add_build("KuŸnia","smith");
$cl_builds->set_woodprice("220","1.26");
$cl_builds->set_stoneprice("180","1.275");
$cl_builds->set_ironprice("240","1.26");
$cl_builds->set_bhprice("40","1.17");
$cl_builds->set_time("6000","1.2");
$cl_builds->set_points("19","1.2");
$cl_builds->set_needbuilds(array("main"=>"5","barracks"=>"1"));
$cl_builds->set_maxstage("20");
$cl_builds->set_specials(array());
$cl_builds->set_description("Jednostki s¹ badane w kuŸni. Im wiêkszy stopieñ rozbudowania kuŸni, tym lepsze jednostki mo¿na badaæ. Dodatkowo zmniejsza siê czas badania. Liczba mo¿liwych badañ jest ograniczona. Technologie ju¿ zbadane mo¿na zlikwidowaæ, by zrobiæ miejsce na inne. Przy likwidacji nie otrzymuje siê surowców.");
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
$cl_builds->set_description("Na placu stoj¹ wszystkie wojska. Tutaj mo¿esz wydawaæ rozkazy i przesuwaæ wojska.");
$cl_builds->add_build("Piedesta³","statue");
$cl_builds->set_woodprice("220","1");
$cl_builds->set_stoneprice("220","1");
$cl_builds->set_ironprice("220","1");
$cl_builds->set_bhprice("10","1");
$cl_builds->set_time("600","1");
$cl_builds->set_points("24","1");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage("1");
$cl_builds->set_specials(array());
$cl_builds->set_description("Mieszkañcy wioski oddaj¹ ho³d rycerzowi na piedestale. Je¿eli twój rycerz polegnie w walce, tutaj mo¿esz mianowaæ nowego wojownika do rangi rycerza.");


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
$cl_builds->set_description("Tutaj mo¿esz handlowaæ z innymi graczami lub przesy³aæ surowce.");
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
$cl_builds->set_description("Tutaj drwale obrabiaj¹ drewno œciête w okolicznych lasach, które jest potrzebne zarówno do budowy wioski, jak i do uzbrojenia wojsk. Im wiêkszy stopieñ rozbudowania tartaku, tym wiêksza produkcja drewna");
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
$cl_builds->set_description("W cegielni pracownicy wydobywaj¹ glinê na rozbudowê wioski. Im wiêkszy stopieñ rozbudowania cegielni, tym wiêcej wydobywa siê gliny.");
$cl_builds->add_build("Huta ¿elaza","iron");
$cl_builds->set_woodprice("75","1.25");
$cl_builds->set_stoneprice("65","1.275");
$cl_builds->set_ironprice("70","1.24");
$cl_builds->set_bhprice("10","1.17");
$cl_builds->set_time("1080","1.2");
$cl_builds->set_points("6","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage("30");
$cl_builds->set_specials(array());
$cl_builds->set_description("W hucie ¿elaza Twoi pracownicy wytapiaj¹ ¿elazo. Im wy¿szy stopieñ rozbudowania huty, tym wiêcej ¿elaza mo¿na przy jej pomocy pozyskiwaæ.");
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
$cl_builds->set_description("Zagroda wy¿ywia twoich pracowników i wojska. Bez rozbudowania zagrody twoja wioska nie mo¿e siê rozrastaæ. Im wiêkszy stopieñ rozbudowania, tym wiêcej mieszkañców mo¿e byæ wy¿ywionych.");
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
$cl_builds->set_description("W spichlerzu s¹ umieszczane surowce. Im wiêkszy stopieñ rozbudowania, tym wiêcej mo¿esz umieszczaæ w nim surowców.");
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
$cl_builds->set_description("W schowku mo¿na chowaæ surowce, tak, ¿eby przeciwnik nie móg³ ich spl¹drowaæ. Nawet zwiadowcy przeciwnika nie mog¹ siê dowiedzieæ, ile surowców ukryto w schowku.");
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
$cl_builds->set_description("Mur obronny chroni wioskê przed przeciwnikiem. Dziêki niemu wzrasta si³a obrony wojsk i obrona ogólna wioski.");
?>
