<?php 
$name = 'Mina de Ferro';
$drewno = '75';
$glina = '65';
$zelazo = '70';
$zagroda = '10';
$max = '30';
$opis = "Nas siderúrgicas, seus trabalhadores fundem o ferro. Quanto maior o nível de atualização do fundidor, mais ferro ele pode produzir.";
$cl_builds->add_build($name,"iron");
$cl_builds->set_woodprice($drewno,"1.25");
$cl_builds->set_stoneprice($glina,"1.275");
$cl_builds->set_ironprice($zelazo,"1.24");
$cl_builds->set_bhprice($zagroda,"1.17");
$cl_builds->set_time("1080","1.2");
$cl_builds->set_points("6","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage($max);
$cl_builds->set_specials(array());
$cl_builds->set_description($opis);
?>