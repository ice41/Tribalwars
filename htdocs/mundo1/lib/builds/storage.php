<?php 
$name = 'Armazém';
$drewno = '60';
$glina = '50';
$zelazo = '40';
$zagroda = '0';
$max = '30';
$opis = "As recursos são colocadas no Armazem.Quanto maior o nivel, mais pode matérias-primas pode armazenar.";
$cl_builds->add_build($name,"storage");
$cl_builds->set_woodprice($drewno,"1.265");
$cl_builds->set_stoneprice($glina,"1.27");
$cl_builds->set_ironprice($zelazo,"1.245");
$cl_builds->set_bhprice($zagroda,"1");
$cl_builds->set_time("1224","1.2");
$cl_builds->set_points("6","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage($max);
$cl_builds->set_specials(array());
$cl_builds->set_description($opis);

?>