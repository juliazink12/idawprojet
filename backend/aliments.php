<?php
require('config.php');

function get_aliments($conn){
    //récupère les aliments
    $stmt = $conn->prepare("SELECT aliment.nom FROM aliment");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    }
function get_aliments_type($conn){
  // récupère les aliments d'un type choisi
  $stmt = $conn->prepare("SELECT aliment.nom FROM aliment WHERE aliment.id_type= :id_type");
  $id_type = $_GET['id_type'];
  $stmt->bindParam(':id_type', $id_type);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$result =  get_aliments($conn);
if(isset($_GET['set_type']) && isset($_GET['id_type'])){
  $set_type = $_GET['set_type'];
  if($set_type == 1){
    $result =  get_aliments_type($conn);
  }
}
exit(json_encode($result));