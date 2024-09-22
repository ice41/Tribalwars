<?php

$cl_units = new units();



//////////// Zeitfaktor vom Bau der Einehiten ////////////



$cl_units->set_unitfactor("0.665","0.94355");



///////////////////// Alle EINHEITEN /////////////////////



$cl_units->add_unit("L&#259;ncieri","unit_spear");

$cl_units->set_woodprice("50");

$cl_units->set_stoneprice("30");

$cl_units->set_ironprice("10");

$cl_units->set_bhprice("1");

$cl_units->set_time("1000");

$cl_units->set_att("10","1.045");

$cl_units->set_def("15","1.045");

$cl_units->set_defcav("45","1.045");

$cl_units->set_defarcher("20","1.045");

$cl_units->set_speed("720");

$cl_units->set_booty("25");

$cl_units->set_needed(array());

$cl_units->set_recruit_in("barracks");

$cl_units->set_specials(array());

$cl_units->set_group("foot");

$cl_units->set_col("A");

$cl_units->set_attType("def");

$cl_units->set_description("Lancierul este cea mai simpl&#259; unitate de lupt&#259;. El este foarte eficient &#238;n ap&#259;rarea contra c&#259;l&#259;re&#355;ilor.");



$cl_units->add_unit("Lup&#355;or cu spada","unit_sword");

$cl_units->set_woodprice("30");

$cl_units->set_stoneprice("30");

$cl_units->set_ironprice("70");

$cl_units->set_bhprice("1");

$cl_units->set_time("1500");

$cl_units->set_att("25","1.045");

$cl_units->set_def("50","1.045");

$cl_units->set_defcav("25","1.045");

$cl_units->set_defarcher("40","1.045");

$cl_units->set_speed("900");

$cl_units->set_booty("15");

$cl_units->set_needed(array("smith"=>"1"));

$cl_units->set_recruit_in("barracks");

$cl_units->set_specials(array());

$cl_units->set_group("foot");

$cl_units->set_col("A");

$cl_units->set_attType("def");

$cl_units->set_description("Lup&#355;orul cu spada este util &#238;n primul r&#226;nd pentru ap&#259;rarea &#238;mpotriva infanteriei. Este din pacate relativ &#238;ncet.");



$cl_units->add_unit("Lupt&#259;tor cu toporul","unit_axe");

$cl_units->set_woodprice("60");

$cl_units->set_stoneprice("30");

$cl_units->set_ironprice("40");

$cl_units->set_bhprice("1");

$cl_units->set_time("1250");

$cl_units->set_att("40","1.0455");

$cl_units->set_def("10","1.045");

$cl_units->set_defcav("5","1.045");

$cl_units->set_defarcher("10","1.045");

$cl_units->set_speed("720");

$cl_units->set_booty("10");

$cl_units->set_needed(array("smith"=>"2"));

$cl_units->set_recruit_in("barracks");

$cl_units->set_specials(array());

$cl_units->set_group("foot");

$cl_units->set_col("A");

$cl_units->set_attType("off");

$cl_units->set_description("Lupt&#259;torii cu toporul sunt trupe ofensive puternice. Cu strig&#259;t de atac se arunc&#259; ace&#351;ti r&#259;zboinici s&#259;lbatici &#238;n lupta &#238;mpotriva trupelor du&#351;mane.");



$cl_units->add_unit("Arca&#351;","unit_archer");

$cl_units->set_woodprice("100");

$cl_units->set_stoneprice("30");

$cl_units->set_ironprice("60 ");

$cl_units->set_bhprice("1");

$cl_units->set_time("1250");

$cl_units->set_att("15","1.045");

$cl_units->set_def("50","1.045");

$cl_units->set_defcav("40","1.045");

$cl_units->set_defarcher("5","1.045");

$cl_units->set_speed("1080");

$cl_units->set_booty("10");

$cl_units->set_needed(array("barracks"=>"5","smith"=>"5" ));

$cl_units->set_recruit_in("barracks");

$cl_units->set_specials(array(""));

$cl_units->set_group("foot");

$cl_units->set_col("A");

$cl_units->set_description("Arca&#351;ul este un ap&#259;r&#259;tor efectiv. P&#226;na &#351;i cele mai tari armuri cedeaz&#259; ploii de s&#259;ge&#355;i.");



$cl_units->add_unit("Spion","unit_spy");

$cl_units->set_woodprice("50");

$cl_units->set_stoneprice("50");

$cl_units->set_ironprice("20");

$cl_units->set_bhprice("2");

$cl_units->set_time("1250");

$cl_units->set_att("0","1.045");

$cl_units->set_def("2","1.045");

$cl_units->set_defcav("1","1.045");

$cl_units->set_defarcher("2","1.045");

$cl_units->set_speed("360");

$cl_units->set_booty("0");

$cl_units->set_needed(array("stable"=>1));

$cl_units->set_recruit_in("stable");

$cl_units->set_specials(array());

$cl_units->set_group("cav");

$cl_units->set_col("B");

$cl_units->set_attType("spy");

$cl_units->set_description("Spionul se furi&#351;eaz&#259; &#238;n satele du&#351;mane, pentru a aduna informa&#355;ii pre&#355;ioase.");



$cl_units->add_unit("Cavalerie u&#351;oar&#259;","unit_light");

$cl_units->set_woodprice("125");

$cl_units->set_stoneprice("100");

$cl_units->set_ironprice("250");

$cl_units->set_bhprice("4");

$cl_units->set_time("2400");

$cl_units->set_att("130","1.045");

$cl_units->set_def("30","1.045");

$cl_units->set_defcav("40","1.045");

$cl_units->set_defarcher("30","1.045");

$cl_units->set_speed("390");

$cl_units->set_booty("80");

$cl_units->set_needed(array("stable"=>3));

$cl_units->set_recruit_in("stable");

$cl_units->set_specials(array());

$cl_units->set_group("cav");

$cl_units->set_col("B");

$cl_units->set_attType("off");

$cl_units->set_description("Cavaleria u&#351;oar&#259; este &#238;n primul r&#226;nd util&#259; pentru atacuri prin surprindere &#238;mpotriva satelor du&#351;mane.");



$cl_units->add_unit("Arca&#351; c&#259;l&#259;re&#355;","unit_marcher");

$cl_units->set_woodprice("250");

$cl_units->set_stoneprice("100");

$cl_units->set_ironprice("150 ");

$cl_units->set_bhprice("5");

$cl_units->set_time("1250");

$cl_units->set_att("120","1.045");

$cl_units->set_def("40","1.045");

$cl_units->set_defcav("30","1.045");

$cl_units->set_defarcher("50","1.045");

$cl_units->set_speed("600");

$cl_units->set_booty("50");

$cl_units->set_needed(array("stable"=>"5" ));

$cl_units->set_recruit_in("stable");

$cl_units->set_specials(array(""));

$cl_units->set_group("cav");

$cl_units->set_col("B");

$cl_units->set_description("Arca&#351;ul c&#259;l&#259;re&#355; este util, prin &#355;intirea precis&#259;, pentru eliminarea arca&#351;ilor du&#351;mani de pe ziduri.");



$cl_units->add_unit("Cavalerie grea","unit_heavy");

$cl_units->set_woodprice("200");

$cl_units->set_stoneprice("150");

$cl_units->set_ironprice("600");

$cl_units->set_bhprice("6");

$cl_units->set_time("3600");

$cl_units->set_att("150","1.045");

$cl_units->set_def("200","1.045");

$cl_units->set_defcav("80","1.045");

$cl_units->set_defarcher("180","1.045");

$cl_units->set_speed("450");

$cl_units->set_booty("50");

$cl_units->set_needed(array("stable"=>"10","smith"=>"15"));

$cl_units->set_recruit_in("stable");

$cl_units->set_specials(array());

$cl_units->set_group("cav");

$cl_units->set_col("B");

$cl_units->set_attType("def");

$cl_units->set_description("Cavaleria grea este elita trupelor tale. &#206;n majoritate nobili, c&#259;l&#259;re&#355;ii dispun de arme puternice &#351;i armuri tari.");



$cl_units->add_unit("Berbec","unit_ram");

$cl_units->set_woodprice("300");

$cl_units->set_stoneprice("200");

$cl_units->set_ironprice("200");

$cl_units->set_bhprice("5");

$cl_units->set_time("1250");

$cl_units->set_att("2","1.045");

$cl_units->set_def("20","1.045");

$cl_units->set_defcav("50","1.045");

$cl_units->set_defarcher("20","1.045");

$cl_units->set_speed("1200");

$cl_units->set_booty("0");

$cl_units->set_needed(array("garage"=>"1"));

$cl_units->set_recruit_in("garage");

$cl_units->set_specials(array());

$cl_units->set_group("foot");

$cl_units->set_col("C");

$cl_units->set_attType("off");

$cl_units->set_description("Berbecul te ajut&#259; la atacuri, cu el po&#355;i distruge zidul du&#351;manului.");



$cl_units->add_unit("Catapult&#259;","unit_catapult");

$cl_units->set_woodprice("320");

$cl_units->set_stoneprice("400");

$cl_units->set_ironprice("100");

$cl_units->set_bhprice("8");

$cl_units->set_time("1250");

$cl_units->set_att("100","1.045");

$cl_units->set_def("100","1.045");

$cl_units->set_defcav("50","1.045");

$cl_units->set_defarcher("100","1.045");

$cl_units->set_speed("1440");

$cl_units->set_booty("0");

$cl_units->set_needed(array("garage"=>"2","smith"=>"12"));

$cl_units->set_recruit_in("garage");

$cl_units->set_specials(array());

$cl_units->set_group("foot");

$cl_units->set_col("C");

$cl_units->set_attType("undefined");

$cl_units->set_description("Catapulta o folose&#351;ti pentru distrugerea cl&#259;dirilor du&#351;mane");



$cl_units->add_unit("Genera&#355;ie de nobili","unit_snob");

$cl_units->set_woodprice("28000");

$cl_units->set_stoneprice("30000");

$cl_units->set_ironprice("25000");

$cl_units->set_bhprice("100");

$cl_units->set_time("12500");

$cl_units->set_att("30","1.045");

$cl_units->set_def("100","1.045");

$cl_units->set_defcav("50","1.045");

$cl_units->set_defarcher("100","1.045");

$cl_units->set_speed("1800");

$cl_units->set_booty("0");

$cl_units->set_needed(array("main"=>20,"smith"=>20,"market"=>10));

$cl_units->set_recruit_in("snob");

$cl_units->set_specials(array("no_investigate"));

$cl_units->set_group("foot");

$cl_units->set_col("D");

$cl_units->set_attType("undefined");

$cl_units->set_description("Cei de vi&#355;a nobila pot mic&#351;ora prin atacuri asentimentul trupelor du&#351;mane. &#206;n final poate fi cucerit satul. Costurile pentru nobilime cresc cu fiecare sat cucerit si cu fiecare generatie nobil&#259; existent&#259; sau &#238;n curs de formare.");



$cl_units->add_unit("Arca&#351; c&#259;l&#259;re&#355;","unit_marcher");

$cl_units->set_woodprice("250");

$cl_units->set_stoneprice("100");

$cl_units->set_ironprice("150 ");

$cl_units->set_bhprice("5");

$cl_units->set_time("1250");

$cl_units->set_att("120","1.045");

$cl_units->set_def("40","1.045");

$cl_units->set_defcav("30","1.045");

$cl_units->set_defarcher("50","1.045");

$cl_units->set_speed("600");

$cl_units->set_booty("50");

$cl_units->set_needed(array("stable"=>"5" ));

$cl_units->set_recruit_in("stable");

$cl_units->set_specials(array(""));

$cl_units->set_group("cav");

$cl_units->set_col("B");

$cl_units->set_description("Arca&#351;ul c&#259;l&#259;re&#355; este util, prin &#355;intirea precis&#259;, pentru eliminarea arca&#351;ilor du&#351;mani de pe ziduri.");?>