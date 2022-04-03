<?php
require('config.php');

function get_aliments($conn){
  //récupère les aliments
  $stmt = $conn->prepare("SELECT DISTINCT id_ali, aliment.nom FROM aliment");
  $stmt->execute();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row['nom'];
  }
  return $data;
  }
function get_aliments_q($conn){
  //récupère les aliments
  $query = $_GET['q'];
  $stmt = $conn->prepare("SELECT nom FROM aliment WHERE nom LIKE CONCAT('%', :nom, '%')");
  $stmt->bindValue(':nom', $query, PDO::PARAM_STR);
  $stmt->execute();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row['nom'];
  }
  return $data;
  }  
function get_aliments_type($conn){
  // récupère les aliments d'un type choisi
  $stmt = $conn->prepare("SELECT DISTINCT id_ali, aliment.nom FROM aliment WHERE aliment.id_type= :id_type");
  $id_type = $_GET['id_type'];
  // echo($id_type);
  $stmt->bindParam(':id_type', $id_type);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
function get_type($conn){
  // récupère les aliments d'un type choisi
  $stmt = $conn->prepare("SELECT DISTINCT id_ali, aliment.type FROM aliment where type LIKE CONCAT('%', :typename, '%')");
  $type =  $_GET['type'];
  $stmt->bindValue(':typename', $type, PDO::PARAM_STR);
  $stmt->execute();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row['type'];
  }
  return $data;
  }

if(isset($_GET['type'])){
  $result =  get_type($conn);
}
else if(isset($_GET['q'])){
  $q = $_GET['q'];
  // echo($q);
  $result =  get_aliments_q($conn);
}
else{
  $result = get_aliments($conn);
}
exit(json_encode($result));