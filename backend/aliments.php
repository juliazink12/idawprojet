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
  echo($id_type);
  $stmt->bindParam(':id_type', $id_type);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function get_aliments_type_bs($conn){
  // récupère les aliments d'un type choisi
  $stmt = $conn->prepare("SELECT aliment.nom FROM aliment where type LIKE CONCAT('%', :typename, '%')");
  $type =  $_GET['type'];
  $stmt->bindValue(':typename', $type, PDO::PARAM_STR);
  $stmt->execute();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row['nom'];
  }
  return $data;
}

if(isset($_GET['type'])){
  $type = $_GET['type'];
  $result =  get_aliments_type_bs($conn);
}


exit(json_encode($result));