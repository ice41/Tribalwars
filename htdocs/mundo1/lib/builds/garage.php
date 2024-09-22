<?php 
$name = 'Oficina';
$drewno = '300';
$glina = '240';
$zelazo = '260';
$zagroda = '8';
$max = '15';
$opis = "Pode produzir armas de cerco na oficina. Quanto maior o nivel, mais rápido são produzidas.";
$cl_builds->add_build($name,"garage");
$cl_builds->set_woodprice($drewno,"1.26");
$cl_builds->set_stoneprice($glina,"1.28");
$cl_builds->set_ironprice($zelazo,"1.26");
$cl_builds->set_bhprice($zagroda,"1.16");
$cl_builds->set_time("6000","1.2");
$cl_builds->set_points("24","1.2");
$cl_builds->set_needbuilds(array("main"=>"10","smith"=>"10"));
$cl_builds->set_maxstage($max);
$cl_builds->set_specials(array());
$cl_builds->set_description($opis);
?>