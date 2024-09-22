<?php 
$name = 'Igreja';
$drewno = '16000';
$glina = '20000';
$zelazo = '5000';
$zagroda = '1000';
$max = '1';
$opis = "Na igreja pode recrutar unidades defensivas - Monges.";
$cl_builds->add_build($name,"church");
$cl_builds->set_woodprice($drewno,"1.26");
$cl_builds->set_stoneprice($glina,"1.28");
$cl_builds->set_ironprice($zelazo,"1.26");
$cl_builds->set_bhprice($zagroda,"1.17");
$cl_builds->set_time("64000","1.2");
$cl_builds->set_points("10","1.2");
$cl_builds->set_needbuilds(array("main"=>"5","farm"=>"5"));
$cl_builds->set_maxstage($max);
$cl_builds->set_specials(array());
$cl_builds->set_description($opis);
?>