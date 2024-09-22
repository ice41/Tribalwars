<?php 
$name = 'Praça';
$drewno = '10';
$glina = '40';
$zelazo = '30';
$zagroda = '0';
$max = '1';
$opis = "Todas as tropas estão na praça. Aqui pode dar ordens e mover as tropas.";
$cl_builds->add_build($name,"place");
$cl_builds->set_woodprice($drewno,"1.2");
$cl_builds->set_stoneprice($glina,"1.2");
$cl_builds->set_ironprice($zelazo,"1.2");
$cl_builds->set_bhprice($zagroda,"1.17");
$cl_builds->set_time("2000","1.2");
$cl_builds->set_points("0","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage($max);
$cl_builds->set_specials(array());
$cl_builds->set_description($opis);
?>