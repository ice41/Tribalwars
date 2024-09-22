<?php 
$name = 'Esconderijo';
$drewno = '50';
$glina = '60';
$zelazo = '50';
$zagroda = '2';
$max = '10';
$opis = "Os recursos podem ser escondidos no esconderijo para que o inimigo não possa saqueá-los. Mesmo os batedores inimigos não podem saber quantos recursos estão escondidos no esconderijo.";
$cl_builds->add_build($name,"hide");
$cl_builds->set_woodprice($drewno,"1.25");
$cl_builds->set_stoneprice($glina,"1.25");
$cl_builds->set_ironprice($zelazo,"1.25");
$cl_builds->set_bhprice($zagroda,"1.20");
$cl_builds->set_time("2160","1.2");
$cl_builds->set_points("5","1.2");
$cl_builds->set_needbuilds(array());
$cl_builds->set_maxstage($max);
$cl_builds->set_specials(array("catapult_protection"));
$cl_builds->set_description($opis);
?>