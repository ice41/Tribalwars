<?
$cl_builds = new builds();

//////////// Zeitfaktor vom Bau der Gebäude ////////////
$cl_builds->set_mainfactor("1.00","0.952381");

////////////////// BAUSCHLEIF KOSTEN ///////////////////
$cl_builds->set_buildsharpens("1.25","20");

////////////////// Todos os Edifícios //////////////////
$cl_builds->add_build("Edif&iacute;cio Principal","main");
$cl_builds->set_woodprice("90","1.26");
$cl_builds->set_stoneprice("80","1.275");
$cl_builds->set_ironprice("70","1.26");
$cl_builds->set_bhprice("5","1.17");
$cl_builds->set_time("1080","1.2");
$cl_builds->set_points("10","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage("30");
$cl_builds->set_specials(array());
$cl_builds->set_description("No Edif&iacute;cio Principal voc&ecirc; pode construir ou melhorar outros edif&iacute;cios. Quanto maior o n&iacute;vel, mais r&aacute;pida ser&aacute; a constru&ccedil;&atilde;o de edif&iacute;cios. Assim que o Edif&iacute;cio Principal estiver no n&iacute;vel 15 voc&ecirc; poder&aacute; demolir edifícios nesta aldeia");

$cl_builds->add_build("Quartel","barracks");
$cl_builds->set_woodprice("200","1.26");
$cl_builds->set_stoneprice("170","1.28");
$cl_builds->set_ironprice("90","1.26");
$cl_builds->set_bhprice("7","1.17");
$cl_builds->set_time("1800","1.2");
$cl_builds->set_points("16","1.2");
$cl_builds->set_needbuilds(array("main"=>"3"));
$cl_builds->set_maxstage("25");
$cl_builds->set_specials(array());
$cl_builds->set_description("No Quartel voc&ecirc; pode recrutar sua infantaria. Quanto maior o seu n&iacute;vel, mais rapidamente poder&atilde;o ser recrutadas novas tropas. ");

$cl_builds->add_build("Est&aacute;bulo","stable");
$cl_builds->set_woodprice("270","1.26");
$cl_builds->set_stoneprice("240","1.28");
$cl_builds->set_ironprice("260","1.26");
$cl_builds->set_bhprice("8","1.17");
$cl_builds->set_time("6000","1.2");
$cl_builds->set_points("20","1.2");
$cl_builds->set_needbuilds(array("main"=>"10","barracks"=>"5","smith"=>"5"));
$cl_builds->set_maxstage("20");
$cl_builds->set_specials(array());
$cl_builds->set_description("No Estábulo voc&ecirc; pode formar novos cavaleiros. Quanto maior o seu n&iacute;vel, mais rapidamente poder&atilde;o ser recrutadas novas tropas. ");

$cl_builds->add_build("Oficina","garage");
$cl_builds->set_woodprice("300","1.26");
$cl_builds->set_stoneprice("240","1.28");
$cl_builds->set_ironprice("260","1.26");
$cl_builds->set_bhprice("8","1.16");
$cl_builds->set_time("6000","1.2");
$cl_builds->set_points("24","1.2");
$cl_builds->set_needbuilds(array("main"=>"10","smith"=>"10"));
$cl_builds->set_maxstage("15");
$cl_builds->set_specials(array());
$cl_builds->set_description("Na Oficina podem ser produzidas m&aacute;quinas de guerra. Quanto maior for o n&iacute;vel da Oficina, mais r&aacute;pido ser&atilde;o produzidas novas m&aacute;quinas. ");

$cl_builds->add_build("Academia","snob");
$cl_builds->set_woodprice("15000","2");
$cl_builds->set_stoneprice("25000","2");
$cl_builds->set_ironprice("10000","2");
$cl_builds->set_bhprice("80","1.17");
$cl_builds->set_time("64800","1.2");
$cl_builds->set_points("512","1.2");
$cl_builds->set_needbuilds(array("main"=>"20","smith"=>"20","market"=>"10"));
if($config['ag_style'] <= 1){
	$cl_builds->set_maxstage("3");
}else{
	$cl_builds->set_maxstage("1");
}
$cl_builds->set_specials(array());
$cl_builds->set_description("Na Academia voc&ecirc; pode formar Nobres, com os quais poder&aacute; conquistar outras aldeias ");

$cl_builds->add_build("Ferreiro","smith");
$cl_builds->set_woodprice("220","1.26");
$cl_builds->set_stoneprice("180","1.275");
$cl_builds->set_ironprice("240","1.26");
$cl_builds->set_bhprice("40","1.17");
$cl_builds->set_time("6000","1.2");
$cl_builds->set_points("19","1.2");
$cl_builds->set_needbuilds(array("main"=>"5","barracks"=>"1"));
$cl_builds->set_maxstage("20");
$cl_builds->set_specials(array());
$cl_builds->set_description("No Ferreiro voc&ecirc; pode pesquisar e melhorar suas armas. Quanto maior o n&iacute;vel do Ferreiro melhores ser&atilde;o as armas que voc&ecirc; poder&aacute; pesquisar e menores ser&atilde;o as dura&ccedil;&otilde;es de tais pesquisas. O n&uacute;mero total de pesquisas &eacute; limitado. Pesquisas podem ser revocadas, mas tenha cuidado: nenhum dos recursos j&aacute; utilizados ser&atilde;o devolvidos.");

$cl_builds->add_build("Pra&ccedil;a de Reuni&atilde;o","place");
$cl_builds->set_woodprice("10","1.2");
$cl_builds->set_stoneprice("40","1.2");
$cl_builds->set_ironprice("30","1.2");
$cl_builds->set_bhprice("0","1.17");
$cl_builds->set_time("2000","1.2");
$cl_builds->set_points("0","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage("1");
$cl_builds->set_specials(array());
$cl_builds->set_description("Na Pra&ccedil;a de Reuni&otilde;es encontram-se seus guerreiros antes da batalha. Aqui voc&ecirc; poder&aacute; comandar ataques e mover suas tropas.");

$cl_builds->add_build("Mercado","market");
$cl_builds->set_woodprice("100","1.26");
$cl_builds->set_stoneprice("100","1.275");
$cl_builds->set_ironprice("100","1.26");
$cl_builds->set_bhprice("20","1.17");
$cl_builds->set_time("2700","1.2");
$cl_builds->set_points("10","1.2");
$cl_builds->set_needbuilds(array("main"=>"3","storage"=>"2"));
$cl_builds->set_maxstage("25");
$cl_builds->set_specials(array());
$cl_builds->set_description("No Mercado voc&ecirc; pode negociar com outros jogadores. ");

$cl_builds->add_build("Bosque","wood");
$cl_builds->set_woodprice("50","1.25");
$cl_builds->set_stoneprice("60","1.275");
$cl_builds->set_ironprice("40","1.245");
$cl_builds->set_bhprice("5","1.15");
$cl_builds->set_time("900","1.2");
$cl_builds->set_points("6","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage("30");
$cl_builds->set_specials(array());
$cl_builds->set_description("Os lenhadores cortam madeira dos bosques que rodeiam as aldeias. Tal madeira &eacute; necess&aacute;ria para o desenvolvimento da pr&oacute;pria aldeia, assim como para o fortalecimento do ex&eacute;rcito. Quanto mais alto o n&iacute;vel dos lenhadores, mais madeira ser&aacute; produzida.");

$cl_builds->add_build("Po&ccedil;o de Argila","stone");
$cl_builds->set_woodprice("65","1.27");
$cl_builds->set_stoneprice("50","1.265");
$cl_builds->set_ironprice("40","1.24");
$cl_builds->set_bhprice("10","1.14");
$cl_builds->set_time("900","1.2");
$cl_builds->set_points("6","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage("30");
$cl_builds->set_specials(array());
$cl_builds->set_description("No Po&ccedil;o de Argila trabalham muitos de seus homens afim de prover sua aldeia com a importante argila. Quanto maior for o seu n&iacute;vel, maior ser&aacute; sua capacidade de produ&ccedil;&atilde;o.");

$cl_builds->add_build("Mina de Ferro","iron");
$cl_builds->set_woodprice("75","1.25");
$cl_builds->set_stoneprice("65","1.275");
$cl_builds->set_ironprice("70","1.24");
$cl_builds->set_bhprice("10","1.17");
$cl_builds->set_time("1080","1.2");
$cl_builds->set_points("6","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage("30");
$cl_builds->set_specials(array());
$cl_builds->set_description("Da Mina de Ferro &eacute; extraído o material chave para as batalhas. Quanto maior for o seu n&iacute;vel, maior ser&aacute; sua capacidade de produ&ccedil;&atilde;o.");

$cl_builds->add_build("Fazenda","farm");
$cl_builds->set_woodprice("45","1.3");
$cl_builds->set_stoneprice("40","1.32");
$cl_builds->set_ironprice("30","1.29");
$cl_builds->set_bhprice("0","1");
$cl_builds->set_time("1440","1.2");
$cl_builds->set_points("5","1.2");
$cl_builds->set_needbuilds(array());
if($config['bh_style'] == 0){
	$cl_builds->set_maxstage("40");
}elseif($config['bh_style'] == 1){
	$cl_builds->set_maxstage("30");
}
$cl_builds->set_specials(array());
$cl_builds->set_description("A Fazenda prov&ecirc; sustento &agrave; seus trabalhadores e tropas. Sem o desenvolvimento da Fazenda a sua aldeia n&atilde;o crescer&aacute;. Quanto maior o n&iacute;vel da Fazenda, mais habitantes estar&atilde;o &agrave; sua disposi&ccedil;&atilde;o.");

$cl_builds->add_build("Armaz&eacute;m","storage");
$cl_builds->set_woodprice("60","1.265");
$cl_builds->set_stoneprice("50","1.27");
$cl_builds->set_ironprice("40","1.245");
$cl_builds->set_bhprice("0","1");
$cl_builds->set_time("1224","1.2");
$cl_builds->set_points("6","1.2");
$cl_builds->set_needbuilds(array());
if($config['arm_style'] == 0){
	$cl_builds->set_maxstage("31");
}elseif($config['arm_style'] == 1){
	$cl_builds->set_maxstage("30");
}
$cl_builds->set_specials(array());
$cl_builds->set_description("No Armaz&eacute;m s&atilde;o estocados os recursos produzidos pela aldeia. Quanto maior for o n&iacute;vel do Armaz&eacute;m, maior ser&aacute; a sua capacidade de armazenamento.");

$cl_builds->add_build("Esconderijo","hide");
$cl_builds->set_woodprice("50","1.25");
$cl_builds->set_stoneprice("60","1.25");
$cl_builds->set_ironprice("50","1.25");
$cl_builds->set_bhprice("2","1.20");
$cl_builds->set_time("2160","1.2");
$cl_builds->set_points("5","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage("10");
$cl_builds->set_specials(array("catapult_protection"));
$cl_builds->set_description("No Esconderijo s&atilde;o escondidos recursos que, em caso de ataque inimigo, n&atilde;o poder&atilde;o ser roubados. Os Exploradores inimigos tamb&eacute;m n&Atilde;o podem descobrir quantos recursos est&atilde;o guardados no Esconderijo.");

$cl_builds->add_build("Muralha","wall");
$cl_builds->set_woodprice("50","1.26");
$cl_builds->set_stoneprice("100","1.275");
$cl_builds->set_ironprice("20","1.26");
$cl_builds->set_bhprice("5","1.18");
$cl_builds->set_time("3600","1.2");
$cl_builds->set_points("8","1.2");
$cl_builds->set_needbuilds(array("barracks"=>"1"));
$cl_builds->set_maxstage("20");
$cl_builds->set_specials(array());
$cl_builds->set_description("A Muralha oferece prote&ccedil;&atilde;o contra tropas inimigas. Por meio dela s&atilde;o aumentadas tanto a defesa b&aacute;sica da aldeia como a for&ccedil;a defensiva de suas tropas.");
?>