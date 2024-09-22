<?php 
$name = 'Fazenda';
$drewno = '45';
$glina = '40';
$zelazo = '30';
$zagroda = '0';
$max = '30';
$opis = "A fazenda espalha seus funcionários e o exército.Sem expandir a fazenda, sua aldeia não pode crescer.Quanto maior o nivel, mais população pode ter.";
$cl_builds->add_build($name,"farm");
$cl_builds->set_woodprice($drewno,"1.3");
$cl_builds->set_stoneprice($glina,"1.32");
$cl_builds->set_ironprice($zelazo,"1.29");
$cl_builds->set_bhprice($zagroda,"1");
$cl_builds->set_time("1440","1.2");
$cl_builds->set_points("5","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage($max);
$cl_builds->set_specials(array());
$cl_builds->set_description($opis);

?>