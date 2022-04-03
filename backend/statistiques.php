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

function get_percentages($sonn){
    $sql = "SELECT nutrition.nom as Nutriment, consommation.quantite * composition.ratio as Quantite  
FROM consommation 
INNER JOIN composition 
ON consommation.id_ali = composition.id_ali
INNER JOIN nutrition 
ON composition.id_nutri = nutrition.id_nutri
GROUP BY composition.id_nutri";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function get_raw_values($sonn){
    $sql = "";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function get_nutrient_distribution($sonn){
    $sql = "";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
switch($_GET["type_stat"]) {
    case 'percentages':
        $result = get_percentages($sonn);
        break;
    case 'raw_values':
        $result = get_raw_values($sonn);
        break;
    case 'distribution':
        $result = get_nutrient_distribution($sonn);
        break;     
}
exit(json_encode($result));