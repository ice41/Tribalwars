<?php 
$name = 'Bosque';
$drewno = '50';
$glina = '60';
$zelazo = '40';
$zagroda = '5';
$max = '30';
$opis = "Aqui, a madeira é processada por madeira nas florestas circundantes, que são necessárias anteriormente para a construção da aldeia, bem como para o armamento das tropas.Quanto maior o nivel da serraria, maior a produção de madeira";
$cl_builds->add_build($name,"wood");
$cl_builds->set_woodprice($drewno,"1.25");
$cl_builds->set_stoneprice($glina,"1.275");
$cl_builds->set_ironprice($zelazo,"1.245");
$cl_builds->set_bhprice($zagroda,"1.15");
$cl_builds->set_time("900","1.2");
$cl_builds->set_points("6","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage($max);
$cl_builds->set_specials(array());
$cl_builds->set_description($opis);
?>