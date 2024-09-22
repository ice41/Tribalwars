<?php

$cl_builds = new builds();



//////////// Zeitfaktor vom Bau der Gebäude ////////////



$cl_builds->set_mainfactor("1.00","0.952381");



////////////////// BAUSCHLEIF KOSTEN ///////////////////



$cl_builds->set_buildsharpens("1.25","20");



///////////////////// Alle Gebäude /////////////////////



$cl_builds->add_build("Cl&#259;direa principal&#259;","main");

$cl_builds->set_woodprice("90","1.26");

$cl_builds->set_stoneprice("80","1.275");

$cl_builds->set_ironprice("70","1.26");

$cl_builds->set_bhprice("5","1.17");

$cl_builds->set_time("1080","1.2");

$cl_builds->set_points("10","1.2");

$cl_builds->set_needbuilds(array());

$cl_builds->set_maxstage("30");

$cl_builds->set_specials(array());

$cl_builds->set_description("&#206;n cl&#259;direa principal&#259; pot fi construite cl&#259;diri noi sau imbun&#259;t&#259;&#355;ite cl&#259;dirile existente. Cu c&#226;t este mai &#238;nalt nivelul, cu at&#226;t mai repede pot fi construite cl&#259;diri noi. &#206;n momentul &#238;n care cl&#259;direa principal&#259; a atins nivelul 15, ai posibilitatea s&#259; demolezi cl&#259;diri.");



$cl_builds->add_build("Cazarm&#259;","barracks");

$cl_builds->set_woodprice("200","1.26");

$cl_builds->set_stoneprice("170","1.28");

$cl_builds->set_ironprice("90","1.26");

$cl_builds->set_bhprice("7","1.17");

$cl_builds->set_time("1800","1.2");

$cl_builds->set_points("16","1.2");

$cl_builds->set_needbuilds(array("main"=>"3"));

$cl_builds->set_maxstage("25");

$cl_builds->set_specials(array());

$cl_builds->set_description("&#206;n cazarm&#259; &#238;ti po&#355;i recruta infanteria. Cu c&#226;t este mai &#226;nalt nivelul de extindere al cazarmei, cu at&#226;t mai repede po&#355;i s&#259;-&#355;i instruie&#351;ti trupele.");



$cl_builds->add_build("Grajd","stable");

$cl_builds->set_woodprice("270","1.26");

$cl_builds->set_stoneprice("240","1.28");

$cl_builds->set_ironprice("260","1.26");

$cl_builds->set_bhprice("8","1.17");

$cl_builds->set_time("6000","1.2");

$cl_builds->set_points("20","1.2");

$cl_builds->set_needbuilds(array("main"=>"10","barracks"=>"5","smith"=>"5"));

$cl_builds->set_maxstage("20");

$cl_builds->set_specials(array());

$cl_builds->set_description("&#206;n grajd &#238;ti po&#355;i instrui c&#259;l&#259;reti. Cu c&#226;t este mai &#238;nalt nivelul grajdului, cu at&#226;t mai repede &#238;ti po&#355;i instrui trupele.");



$cl_builds->add_build("Atelier","garage");

$cl_builds->set_woodprice("300","1.26");

$cl_builds->set_stoneprice("240","1.28");

$cl_builds->set_ironprice("260","1.26");

$cl_builds->set_bhprice("8","1.16");

$cl_builds->set_time("6000","1.2");

$cl_builds->set_points("24","1.2");

$cl_builds->set_needbuilds(array("main"=>"10","smith"=>"10"));

$cl_builds->set_maxstage("15");

$cl_builds->set_specials(array());

$cl_builds->set_description("&#206;n atelier &#238;ti po&#355;i fabrica armele. Cu c&#226;t este mai ridicat nivelul de dezvoltare al atelierului, cu at&#226;t mai repede iti poti instrui trupele.");



$cl_builds->add_build("Curte nobil&#259;","snob");

$cl_builds->set_woodprice("15000","2");

$cl_builds->set_stoneprice("25000","2");

$cl_builds->set_ironprice("10000","2");

$cl_builds->set_bhprice("80","1.17");

$cl_builds->set_time("64800","1.2");

$cl_builds->set_points("512","1.2");

$cl_builds->set_needbuilds(array("main"=>"20","smith"=>"20","market"=>"10"));

$cl_builds->set_maxstage("3");

$cl_builds->set_specials(array());

$cl_builds->set_description("&#206;n curtea nobil&#259; po&#355;i crea genera&#355;ii de nobili, cu care po&#355;i cuceri alte sate.");



$cl_builds->add_build("Fier&#259;rie","smith");

$cl_builds->set_woodprice("220","1.26");

$cl_builds->set_stoneprice("180","1.275");

$cl_builds->set_ironprice("240","1.26");

$cl_builds->set_bhprice("40","1.17");

$cl_builds->set_time("6000","1.2");

$cl_builds->set_points("19","1.2");

$cl_builds->set_needbuilds(array("main"=>"5","barracks"=>"1"));

$cl_builds->set_maxstage("20");

$cl_builds->set_specials(array());

$cl_builds->set_description("&#206;n fier&#259;rie se cercetez&#259; si se &#238;mbun&#259;t&#259;&#355;esc armele. Cu c&#226;t este mai &#238;nalt nivelul de dezvoltare al fier&#259;riei, cu at&#226;t mai bine po&#355;i perfec&#355;iona armele. Pe de alt&#259; parte se si scurteaz&#259; perioada de inova&#355;ie.");



$cl_builds->add_build("Pia&#355;a central&#259;","place");

$cl_builds->set_woodprice("10","1.2");

$cl_builds->set_stoneprice("40","1.2");

$cl_builds->set_ironprice("30","1.2");

$cl_builds->set_bhprice("0","1.17");

$cl_builds->set_time("2000","1.2");

$cl_builds->set_points("0","1.2");

$cl_builds->set_needbuilds(array());

$cl_builds->set_maxstage("1");

$cl_builds->set_specials(array());

$cl_builds->set_description("&#206;n pia&#355;a central&#259; se &#238;nt&#226;lnesc solda&#355;ii t&#259;i. Aici po&#355;i da comenzile de atac &#351;i &#238;&#355;i po&#355;i stabili trupele.");



$cl_builds->add_build("T&#226;rg","market");

$cl_builds->set_woodprice("100","1.26");

$cl_builds->set_stoneprice("100","1.275");

$cl_builds->set_ironprice("100","1.26");

$cl_builds->set_bhprice("20","1.17");

$cl_builds->set_time("2700","1.2");

$cl_builds->set_points("10","1.2");

$cl_builds->set_needbuilds(array("main"=>"3","storage"=>"2"));

$cl_builds->set_maxstage("25");

$cl_builds->set_specials(array());

$cl_builds->set_description("La t&#226;rg po&#355;i negocia cu al&#355;i juc&#259;tori sau le po&#355;i trimite materii prime.");



$cl_builds->add_build("T&#259;ietori de lemne","wood");

$cl_builds->set_woodprice("50","1.25");

$cl_builds->set_stoneprice("60","1.275");

$cl_builds->set_ironprice("40","1.245");

$cl_builds->set_bhprice("5","1.15");

$cl_builds->set_time("900","1.2");

$cl_builds->set_points("6","1.2");

$cl_builds->set_needbuilds(array());

$cl_builds->set_maxstage("30");

$cl_builds->set_specials(array());

$cl_builds->set_description("T&#259;ietorii de lemne lucreaz&#259; &#238;n p&#259;duri dese &#238;n afara satului t&#259;u, taie lemnul masiv, necesar pentru construc&#355;ia coloniei tale c&#226;t &#351;i pentru &#238;narmarea ostirii tale. Cu c&#226;t este mai &#226;nalt nivelul de dezvoltare a t&#259;ietorilor de lemne, cu at&#226;t mai mult lemn poate fi produs.");



$cl_builds->add_build("Mina de argil&#259;","stone");

$cl_builds->set_woodprice("65","1.27");

$cl_builds->set_stoneprice("50","1.265");

$cl_builds->set_ironprice("40","1.24");

$cl_builds->set_bhprice("10","1.14");

$cl_builds->set_time("900","1.2");

$cl_builds->set_points("6","1.2");

$cl_builds->set_needbuilds(array());

$cl_builds->set_maxstage("30");

$cl_builds->set_specials(array());

$cl_builds->set_description("&#206;n mina de argil&#259; muncitorii t&#259;i exploateaz&#259; argila necesar&#259; pentru construc&#355;ia satului t&#259;u. Cu c&#226;t este mai &#238;nalt nivelul, cu at&#226;t mai mult&#259; argil&#259; va fi prelucrat&#259;.");



$cl_builds->add_build("Mina de fier","iron");

$cl_builds->set_woodprice("75","1.25");

$cl_builds->set_stoneprice("65","1.275");

$cl_builds->set_ironprice("70","1.24");

$cl_builds->set_bhprice("10","1.17");

$cl_builds->set_time("1080","1.2");

$cl_builds->set_points("6","1.2");

$cl_builds->set_needbuilds(array());

$cl_builds->set_maxstage("30");

$cl_builds->set_specials(array());

$cl_builds->set_description("&#206;n mina de fier muncitorii t&#259;i exploateaz&#259; fierul necesar pentru r&#259;zboi. Cu c&#226;t creste nivelul minei, cu at&#226;t mai mult fier se produce.");



$cl_builds->add_build("Ferm&#259;","farm");

$cl_builds->set_woodprice("45","1.3");

$cl_builds->set_stoneprice("40","1.32");

$cl_builds->set_ironprice("30","1.29");

$cl_builds->set_bhprice("0","1");

$cl_builds->set_time("1440","1.2");

$cl_builds->set_points("5","1.2");

$cl_builds->set_needbuilds(array());

$cl_builds->set_maxstage("30");

$cl_builds->set_specials(array());

$cl_builds->set_description("Ferma &#238;&#355;i aprovizioneaz&#259; muncitorii &#351;i trupele cu hran&#259;. F&#259;r&#259; extinderea fermei nu-&#355;i poate cre&#351;te nici satul. Cu c&#226;t mai &#238;nalt este nivelul fermei, cu at&#226;t mai mul&#355;i locuitori pot fi aproviziona&#355;i.");



$cl_builds->add_build("Magazie","storage");

$cl_builds->set_woodprice("60","1.265");

$cl_builds->set_stoneprice("50","1.27");

$cl_builds->set_ironprice("40","1.245");

$cl_builds->set_bhprice("0","1");

$cl_builds->set_time("1224","1.2");

$cl_builds->set_points("6","1.2");

$cl_builds->set_needbuilds(array());

$cl_builds->set_maxstage("30");

$cl_builds->set_specials(array());

$cl_builds->set_description("&#206;n magazie pot fi depozitate materiile prime produse. Cu c&#226;t mai &#238;nalt este nivelul magaziei, se m&#259;re&#351;te &#351;i capacitatea de depozitare a materiilor prime.");



$cl_builds->add_build("Ascunz&#259;toare","hide");

$cl_builds->set_woodprice("50","1.25");

$cl_builds->set_stoneprice("60","1.25");

$cl_builds->set_ironprice("50","1.25");

$cl_builds->set_bhprice("2","1.20");

$cl_builds->set_time("2160","1.2");

$cl_builds->set_points("5","1.2");

$cl_builds->set_needbuilds(array());

$cl_builds->set_maxstage("10");

$cl_builds->set_specials(array("catapult_protection"));

$cl_builds->set_description("&#206;n beci se ascund materiile prime, pentru ca du&#351;manii sa nu le poat&#259; jefui. Nici spionii str&#259;ini nu au posibilitatea s&#259; descopere c&#226;te materii prime se g&#259;sesc &#238;n ascunz&#259;toare.");



$cl_builds->add_build("Zid","wall");

$cl_builds->set_woodprice("50","1.26");

$cl_builds->set_stoneprice("100","1.275");

$cl_builds->set_ironprice("20","1.26");

$cl_builds->set_bhprice("5","1.18");

$cl_builds->set_time("3600","1.2");

$cl_builds->set_points("8","1.2");

$cl_builds->set_needbuilds(array("barracks"=>"1"));

$cl_builds->set_maxstage("20");

$cl_builds->set_specials(array());

$cl_builds->set_description("Zidul &#238;&#355;i ap&#259;r&#259; satul de trupe str&#259;ine. Prin construirea zidului &#238;&#355;i &#238;mbun&#259;t&#259;&#355;e&#351;ti puterea de ap&#259;rare a p&#259;m&#226;ntului si a trupelor.");


?>

