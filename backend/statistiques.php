<?php
require('config.php');

//Récupère les quantités consommées pour chaque nutriment
$sql1 = "SELECT nutrition.nom as Nutriment, consommation.quantite * composition.ratio as Quantite  
FROM consommation 
INNER JOIN composition 
ON consommation.id_ali = composition.id_ali
INNER JOIN nutrition 
ON composition.id_nutri = nutrition.id_nutri
GROUP BY composition.id_nutri" ;

function get_percentages($conn){
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
function get_glucides($conn){
    $sql = "SELECT SUM(consommation.quantite*composition.ratio) as glucides FROM consommation JOIN composition USING (id_ali) 
    WHERE composition.id_ali = consommation.id_ali AND composition.id_nutri = 1 
    AND (consommation.date BETWEEN date_sub(now(),INTERVAL 1 WEEK) AND now());";
    $sql_semaine="SELECT consommation.date as `date consommation`, nutrition.nom as Nutriment, 
    consommation.quantite * composition.ratio * 0.01 as `Quantite(g)` , 
    consommation.quantite * composition.ratio / recommandation.quantite as `pourcentage recommandation`, recommandation.quantite as `Qte Rec`
    FROM consommation
    INNER JOIN composition ON consommation.id_ali = composition.id_ali
    INNER JOIN nutrition ON composition.id_nutri = nutrition.id_nutri
    INNER JOIN recommandation ON nutrition.id_nutri = recommandation.id_nutri
    GROUP BY composition.id_nutri,DAY(consommation.date),recommandation.TRANCHE_AGE
    HAVING recommandation.tranche_age= :tranche_age
    AND composition.id_nutri = 1
    AND consommation.date >= DATE_ADD(CURDATE(), INTERVAL -7 DAY) 
    AND  consommation.date <= CURDATE()";
    $stmt = $conn->prepare($sql_semaine);
    $stmt->bindValue(':tranche_age', ">=4", PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function get_proteines($conn){
    $sql = "SELECT SUM(consommation.quantite*composition.ratio) as proteines FROM consommation JOIN composition USING (id_ali) 
    WHERE composition.id_ali = consommation.id_ali AND composition.id_nutri = 2 
    AND (consommation.date BETWEEN date_sub(now(),INTERVAL 1 WEEK) AND now());";
    $sql_semaine="SELECT consommation.date as `date consommation`, nutrition.nom as Nutriment, 
    consommation.quantite * composition.ratio * 0.01 as `Quantite(g)` , 
    consommation.quantite * composition.ratio / recommandation.quantite as `pourcentage recommandation`, recommandation.quantite as `Qte Rec`
    FROM consommation
    INNER JOIN composition ON consommation.id_ali = composition.id_ali
    INNER JOIN nutrition ON composition.id_nutri = nutrition.id_nutri
    INNER JOIN recommandation ON nutrition.id_nutri = recommandation.id_nutri
    GROUP BY composition.id_nutri,DAY(consommation.date),recommandation.TRANCHE_AGE
    HAVING recommandation.tranche_age= :tranche_age
    AND composition.id_nutri = 2
    AND consommation.date >= DATE_ADD(CURDATE(), INTERVAL -7 DAY) 
    AND  consommation.date <= CURDATE()";
    $stmt = $conn->prepare($sql_semaine);
    $stmt->bindValue(':tranche_age', ">=4", PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function get_lipides($conn){
    $sql = "SELECT SUM(consommation.quantite*composition.ratio) as lipides FROM consommation JOIN composition USING (id_ali) 
    WHERE composition.id_ali = consommation.id_ali AND composition.id_nutri = 3 
    AND (consommation.date BETWEEN date_sub(now(),INTERVAL 1 WEEK) AND now());";
    $sql_semaine="SELECT consommation.date as `date consommation`, nutrition.nom as Nutriment, 
    consommation.quantite * composition.ratio * 0.01 as `Quantite(g)` , 
    consommation.quantite * composition.ratio / recommandation.quantite as `pourcentage recommandation`, recommandation.quantite as `Qte Rec`
    FROM consommation
    INNER JOIN composition ON consommation.id_ali = composition.id_ali
    INNER JOIN nutrition ON composition.id_nutri = nutrition.id_nutri
    INNER JOIN recommandation ON nutrition.id_nutri = recommandation.id_nutri
    GROUP BY composition.id_nutri,DAY(consommation.date),recommandation.TRANCHE_AGE
    HAVING recommandation.tranche_age= :tranche_age
    AND composition.id_nutri = 3
    AND consommation.date >= DATE_ADD(CURDATE(), INTERVAL -7 DAY) 
    AND  consommation.date <= CURDATE()";
    $stmt = $conn->prepare($sql_semaine);
    $stmt->bindValue(':tranche_age', ">=4", PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function get_raw_values($conn){
    $sql = "";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function get_distribution($conn){
    $sql = "SELECT SUM(consommation.quantite*composition.ratio) as nutriments FROM consommation JOIN composition USING (id_ali) WHERE composition.id_ali = consommation.id_ali AND (consommation.date BETWEEN date_sub(now(),INTERVAL 1 WEEK) AND now())
GROUP BY composition.id_nutri;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_glucides_raw($conn){
    $sql = "SELECT SUM(consommation.quantite*composition.ratio) as glucides FROM consommation JOIN composition USING (id_ali) WHERE composition.id_ali = consommation.id_ali AND composition.id_nutri = 1 AND (consommation.date BETWEEN date_sub(now(),INTERVAL 1 WEEK) AND now());";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function get_proteines_raw($conn){
    $sql = "SELECT SUM(consommation.quantite*composition.ratio) as proteines FROM consommation JOIN composition USING (id_ali) WHERE composition.id_ali = consommation.id_ali AND composition.id_nutri = 2 AND (consommation.date BETWEEN date_sub(now(),INTERVAL 1 WEEK) AND now());";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function get_lipides_raw($conn){
    $sql = "SELECT SUM(consommation.quantite*composition.ratio) as lipides FROM consommation JOIN composition USING (id_ali) WHERE composition.id_ali = consommation.id_ali AND composition.id_nutri = 3 AND (consommation.date BETWEEN date_sub(now(),INTERVAL 1 WEEK) AND now());";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
if(isset($_GET["type_stat"])){
    switch($_GET["type_stat"]) {
        case 'glucides_pct':
            $result = get_glucides($conn);
            break;
        case 'lipides_pct':
            $result = get_lipides($conn);
            break;
        case 'proteines_pct':
            $result = get_proteines($conn);
            break;
        case 'distrib':
            $result = get_distribution($conn);
            break;     
        case 'glu_raw':
            $result = get_glucides_raw($conn);
            break;  
        case 'prot_raw':
            $result = get_proteines_raw($conn);
            break;  
        case 'lip_raw':
            $result = get_lipides_raw($conn);
            break;  
    }
}
exit(json_encode($result));