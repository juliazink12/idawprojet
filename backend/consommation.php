<?php
require('config.php');

function get_conso($conn){
    //récupère les aliments
    $stmt = $conn->prepare("SELECT nom FROM aliment INNER JOIN consommation ON aliment.id_ali = consommation.id_ali");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

$result = get_conso($conn);
exit(json_encode($result));