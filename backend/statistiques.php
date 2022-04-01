<?php
require('config.php');

//Récupère les quantités consommées pour chaque nutriment
$sql1 = "SELECT nutrition.nom as Nutriment, consommation.quantite * composition.ratio as Quantite  
FROM consommation 
INNER JOIN composition 
ON consommation.id_ali = composition.id_ali
INNER JOIN nutrition 
ON composition.id_nutri = nutrition.id_nutri
GROUP BY composition.id_nutri" 
$sql2 = 